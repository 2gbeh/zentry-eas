<?PHP
class Util
{
	public static function bios ($mysqli) {
		$tb = 'user';
		$arr = array();
		$sql_stmt = 'SELECT * FROM `'.$tb.'`';
		$db_res = sql_query($mysqli, $sql_stmt);
		foreach ($db_res as $row) {
			$id = $row['ID'];
			$title = enum_f(Lists::TITLE,$row['title']);
			$names = ucwords($row['username']);
			$gender = $row['gender'];
			$phone = $row['phone'];
		
			$arr[$id] = $title.' '.$names.' ('.$gender.') - '.$phone;
		}
		return $arr;
	}
	
	public static function bio ($mysqli, $id) {
		$tb = 'user';
		$row = sql_select_id($mysqli, $tb, $id);

		$title = enum_f(Lists::TITLE,$row['title']);
		$names = ucwords($row['username']);
		$gender = $row['gender'];
		$phone = $row['phone'];

		$buf = $title.' '.$names.' ('.$gender.') - '.$phone;
		return $buf;
	}	

	public static function zone_f ($mysqli, $zone_id) {	
		$tb = 'zone';
		$enum_zone = sql_column($mysqli, $tb, 'zone');
		return enum_f($enum_zone, $zone_id);
	}
	
	public static function totaled_by_row ($mysqli, $tb, $field, $value) {
		$tb_2 = 'book';		
		$sql_stmt = 'SELECT book_id, (c1+c2+c3+c4+c5+c6) AS qty FROM `'.$tb.'` WHERE '.$field.'="'.$value.'"';
		$db_res = sql_query($mysqli, $sql_stmt);
		$arrr = $arr = array();
		foreach ($db_res as $row) {		
			$arr['book_id'] = $book_id = $row['book_id'];
			$arr['qty'] = $qty = (int) $row['qty'];
			
			$sql_stmt_2 = 'SELECT stock, disc, supply, class, STATUS FROM `'.$tb_2.'` WHERE `ID`="'.$book_id.'"';
			$db_res_2 = sql_query($mysqli, $sql_stmt_2);
			$row_2 = current($db_res_2);
			$arr['unit'] = $unit = (int) $row_2['stock'];			
			$arr['stock'] = $qty * $unit;
			$arr['disc'] = $qty * (int) $row_2['disc'];
			$arr['supply'] = $qty * (int) $row_2['supply'];
			$arr['class'] = $row_2['class'];
			$arr['status'] = $row_2['STATUS'];						
			array_push($arrr, (object)$arr);
		}
		return $arrr;	
	}
	
	public static function totaled_by_col ($mysqli, $tb, $field, $value) {
		$totaled_by_row = self::totaled_by_row($mysqli, $tb, $field, $value);
		foreach ($totaled_by_row as $row) {
			if (true) {
				$qty += $row->qty;
				$stock += $row->stock;
				$disc += $row->disc;
				$supply += $row->supply;
			}
		}
		$arr['qty'] = $qty;
		$arr['stock'] = $stock;
		$arr['disc'] = $disc;
		$arr['supply'] = $supply;	
		return (object)$arr;			
	}
	
	public static function count_invoice ($mysqli, $tb, $field, $value) {
		$sql_stmt = 'SELECT COUNT(DISTINCT serial_no) AS var FROM `'.$tb.'` WHERE '.$field.'="'.$value.'"';
		$result = sql_query($mysqli, $sql_stmt);		
		if (is_array($result))
			return (int) $result[0]['var'];
		return 0;
	}	
	
	public static function totaled_stmt ($mysqli, $field, $value) {
		$tb = 'stmt';
		$arr['tot'] = 0;
		$arr['bal'] = 0;
				
		$result = sql_select($mysqli, $tb, $field, $value);
		if (is_array($result)) {
			$arr['tot'] = count($result);
			$last = end($result);
			$arr['bal'] = (int) $last['bal'];
		}
		return (object) $arr;
	}	
	
	public static function last_stmt ($mysqli, $card_no) {
		$tb = 'stmt';		
		$sql_stmt = 'SELECT * FROM `'.$tb.'` WHERE card_no="'.$card_no.'" ORDER BY id DESC LIMIT 1';
		$result = sql_query($mysqli, $sql_stmt);	
		return current($result);
	}	
	
	public static function rep ($mysqli, $batch_no) {
		$tb = 'zone';		
		$tb_2 = 'user';
		
		$abbr_arr = explode('/',$batch_no);
		$abbr = $abbr_arr[0];
		
		$row_zone = sql_select_one($mysqli, $tb, 'abbr', $abbr);	
		$arr['zone_bio'] = ucwords($row_zone['zone']) .' ('. strtoupper($row_zone['abbr']) .')';
		$arr['zone_state'] = $row_zone['state'];
		$arr['zone_id'] = $zone_id = $row_zone['ID'];
		
		$row_user = sql_select_one($mysqli, $tb_2, 'zone_id', $zone_id);	
		$arr['user_bio'] = ucwords($row_user['username']) .' ('. $row_user['gender'] .') - '. $row_user['phone'];
		$arr['user_id'] = $row_zone['ID'];
		
		return $arr;
	}							

	public static function totaled_by_book ($mysqli, $tb, $batch_no, $book_id) {
		$tb_2 = 'book';
		$row_bk = sql_select_id($mysqli, $tb_2, $book_id);
		$arr = array();
		$arr['book'] = $row_bk['book'];
		$arr['class'] = $row_bk['class'];
		$arr['rate'] = $rate = $row_bk['stock'];
		
		$sql_stmt = 'SELECT * FROM `'.$tb.'` WHERE batch_no="'.$batch_no.'" AND book_id="'.$book_id.'"';
		$db_res = sql_query($mysqli, $sql_stmt);
		$c1 = $c2 = $c3 = $c4 = $c5 = $c6 = 0;		
		foreach ($db_res as $assoc) {	
			$c1 += $assoc['c1'];
			$c2 += $assoc['c2'];
			$c3 += $assoc['c3'];
			$c4 += $assoc['c4'];
			$c5 += $assoc['c5'];
			$c6 += $assoc['c6']; 
		}
		$arr['c1'] = $c1; $arr['c2'] = $c2; $arr['c3'] = $c3; 
		$arr['c4'] = $c4; $arr['c5'] = $c5; $arr['c6'] = $c6;
		$arr['total'] = $total = $c1 + $c2 + $c3 + $c4 + $c5 + $c6;
		$arr['gross'] = $gross = $total * $rate;
		$arr['disc'] = $disc = $total * $row_bk['disc'];
		$arr['net'] = $gross - $disc;
		
		return $arr;
	}
	 
	public static function totaled_by_zone ($mysqli, $tb, $batch_no) {
		$row = sql_select_one($mysqli, $tb, 'batch_no', $batch_no);
		$arr = array();
		$arr['card_no'] = $row['card_no'];
		$arr['reg_date'] = $row['reg_date'];
		$arr['batch_no'] = $row['batch_no'];
		
		
		$row = sql_select($mysqli, $tb, 'batch_no', $batch_no);
		//var_dump($row);
		$serial_arr = array();
		$t_net = $t_books = $t_book = 0;
		foreach ($row as $assoc)
		{
			$t_book = $assoc['c1'] + $assoc['c2'] + $assoc['c3'] + $assoc['c4'] + $assoc['c5'] + $assoc['c6'];
			$t_books += $t_book;
			if (! in_array($assoc['serial_no'], $serial_arr))
				array_push($serial_arr, $assoc['serial_no']);
				
			$net_row = self::totaled_by_row($mysqli, $tb, 'ID', $assoc['ID']);
			$net_row = current($net_row);
			$t_net += $net_row->supply;
		}
		
		$arr['t_sn'] = count($serial_arr);
		$arr['t_books'] = $t_books;
		$arr['t_net'] = $t_net;
		
		return $arr;
	}	
	
	public static function ssl ($mysqli) {
		$tb = 'sale';		
		$row = sql_distinct ($mysqli, $tb, 'batch_no');
		$arr = array();
		foreach ($row as $value) {
			$len = strlen($value) - 9;
			$sub = substr($value, $len);
			if (! in_array($sub, $arr))
				array_push($arr, $sub);
		}
		return $arr;
	}	
	
	public static function ssa ($mysqli, $zone_id, $sess_yr) {
		$tb = 'zone';		
		$tb_2 = 'sale';
		$tb_3 = 'receipt';		
		$tb_4 = 'credit';		

		$row = sql_select_id($mysqli, $tb, $zone_id);
		$arr['batch_no'] = $batch_no = $row['abbr'] .'/'. $sess_yr;
		
		$total = Util::totaled_by_zone($mysqli, $tb_2, $batch_no);
		$arr['supply'] = $supply = $total['t_net'];
		
		$row = sql_select($mysqli, $tb_3, 'batch_no', $batch_no);
		$sales = 0;
		foreach ($row as $assoc)
			$sales += $assoc['amount'];
		$arr['sales'] = $sales;
		
		$total = Util::totaled_by_zone($mysqli, $tb_4, $batch_no);
		$arr['returns'] = $returns = $total['t_net'];
		
		$arr['bal'] = $sales + $returns - $supply;
		
		return $arr;
	}			
	
	public static function zone_sub ($batch_no) {
		$arr = explode('/', $batch_no);
		return $arr[0];
	}
	
	public static function sess_sub ($batch_no) {
		$arr = explode('/', $batch_no);
		return $arr[1].'/'.$arr[2];
	}	
	
	public static function date_f ($post_date) {
		$d = substr($post_date,0,2);
		$m = substr($post_date,3,2);
		$y = substr($post_date,6,4);
		return $y.'-'.$m.'-'.$d;
	}		
	
	public static function undate_f ($entry_date) {
		$y = substr($entry_date,0,4);
		$m = substr($entry_date,5,2);
		$d = substr($entry_date,8,2);
		return $d.'/'.$m.'/'.$y;
	}		
}
$new_util = new Util();
?>