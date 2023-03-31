<?PHP
$tb = 'school'; 
$tb_2 = 'stmt'; 

if ($_GET['v'] == true) {
	$row = sql_select_id($db_con, $tb, $_GET['q']);
	$zone = $row['school'];
}

$size = sql_count($db_con, $tb);
$pager = new Pager($size, 20);
$sql_stmt = 'SELECT * FROM `'.$tb_2.'` WHERE school_id="'.$_GET['q'].'" ORDER BY ID DESC '.$pager->clause;

$db_res = sql_query($db_con, $sql_stmt);

if (is_array($db_res))
{		
	$sn = $pager->off; $row = ''; $rows = '';	
	foreach ($db_res as $key => $value)
	{
		$sn += 1;
		
		$stmt_type = enum_f($enum_stmt, $value['stmt_type']);
		$stmt_no = $value['stmt_no'];
		$stmt_buf = $stmt_type.'<br/>#'.$stmt_no;
		
		$row = '<tr>
			<td>'. $sn .'</td>	
			<td>'. $value['card_no'] .'</td>
			<td>'. $value['batch_no'] .'</td>			
			<td>'. money_f($value['bf']) .'</td>			
			<td>'. $value['reg_date'] .'</td>
			<td>'. $stmt_buf .'</td>
			<td>'. money_f($value['debit']) .'</td>
			<td>'. money_f($value['credit']) .'</td>
			<td>'. money_f($value['bal']) .'</td>
		</tr>';

		$rows .= $row;
	}
}
?>