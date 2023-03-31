<?PHP
$tb = 'sale'; 
$tb_2 = 'school'; 
$tb_3 = 'book'; 

$nav = 'view_sales_zone.php';

if ($_GET['v'] == true) 
{
	$row_q = sql_select_id($db_con, $tb, $_GET['q']);
	$batch_no = $row_q['batch_no'];	
	$reg_date = date_t($row_q['reg_date'], 'd/m/Y');		
	
	$row_rep = Util::rep($db_con, $batch_no);
	$rep_bio = $row_rep['user_bio'];
	$zone_bio = $row_rep['zone_bio'];	
		
	$sql_stmt = 'SELECT * FROM `'.$tb.'` WHERE batch_no="'.$batch_no.'" ORDER BY ID ASC';
	
	$db_res = sql_query($db_con, $sql_stmt);
	
	//var_dump($db_res);
	
	if (is_array($db_res))
	{		
		$rows_join = ''; $total_join = 0;
		
		$book_id_arr = array();
		$sn = 0; $row = ''; $rows = '';	
		$book_id_arr = array();
		foreach ($db_res as $key => $value)
		{
					$book_id = $value['book_id'];
					$row_bk = sql_select_id($db_con, $tb_3, $book_id);
					if ($row_bk['class'] == 1 && ! in_array($book_id,$book_id_arr))
					{
						array_push($book_id_arr, $book_id);
						$sn += 1;			
						$tbbk = Util::totaled_by_book($db_con, $tb, $batch_no, $book_id);

						//var_dump($totaled);
						
						$row = '<tr>
							<td>'.$sn.'.</td>
							<td class="nw">'.$tbbk['book'].'</td>
							
							<td>'.money_f($tbbk['c1']).'</td>
							<td>'.money_f($tbbk['c2']).'</td>
							<td>'.money_f($tbbk['c3']).'</td>
							<td>'.money_f($tbbk['c4']).'</td>
							<td>'.money_f($tbbk['c5']).'</td>
							<td>'.money_f($tbbk['c6']).'</td>
							
							<td>'.money_f($tbbk['total']).'</td>
							<td>'.money_f($tbbk['rate']).'</td>
							<td>'.money_f($tbbk['gross']).'</td>
							<td class="ar">'.money_f($tbbk['disc']).' &nbsp; &nbsp; Disc</td>
							<td>'.money_f($tbbk['net']).'</td>
						</tr>';
						
						$total_join += $tbbk['net'];
						$rows .= $row;
					}
		}
		$rows_join = $rows.'<tr><td colspan="13">&nbsp;</td></tr>';

		$book_id_arr = array();
		$sn = 0; $row = ''; $rows = '';	
		foreach ($db_res as $key => $value)
		{
					$book_id = $value['book_id'];
					$row_bk = sql_select_id($db_con, $tb_3, $book_id);
					if ($row_bk['class'] == 2 && ! in_array($book_id,$book_id_arr))
					{
						array_push($book_id_arr, $book_id);
						$sn += 1;			
						$tbbk = Util::totaled_by_book($db_con, $tb, $batch_no, $book_id);

						//var_dump($totaled);
						
						$row = '<tr>
							<td>'.$sn.'.</td>
							<td class="nw">'.$tbbk['book'].'</td>
							
							<td>'.money_f($tbbk['c1']).'</td>
							<td>'.money_f($tbbk['c2']).'</td>
							<td>'.money_f($tbbk['c3']).'</td>
							<td class="null">&nbsp;</td>
							<td class="null">&nbsp;</td>
							<td class="null">&nbsp;</td>
							
							<td>'.money_f($tbbk['total']).'</td>
							<td>'.money_f($tbbk['rate']).'</td>
							<td>'.money_f($tbbk['gross']).'</td>
							<td class="ar">'.money_f($tbbk['disc']).' &nbsp; &nbsp; Disc</td>
							<td>'.money_f($tbbk['net']).'</td>
						</tr>';
						
						$total_join += $tbbk['net'];
						$rows .= $row;
					}
		}		
		$rows_join .= $rows;		
	}
}
?>