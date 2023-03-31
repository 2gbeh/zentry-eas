<?PHP
$tb = 'credit'; 
$tb_2 = 'school'; 
$tb_3 = 'book'; 

$nav = 'view_credits.php';

if ($_GET['v'] == true) 
{
	$row_q = sql_select_id($db_con, $tb, $_GET['q']);
	$serial_no = $row_q['serial_no'];
	$serial_no_alt = $row_q['serial_no_alt'];
	$sch_id = $row_q['school_id'];	
	$card_no = $row_q['card_no'];	
	$reg_date = date_t($row_q['reg_date'], 'd/m/Y');		
	
	$row_sch = sql_select_id($db_con, $tb_2, $sch_id);
	$sch_no = $row_sch['phone'];
	$sch_name = $row_sch['school'];	
	$sch_addr = $row_sch['address'];	
	$sch_head = $row_sch['principal'];		
		
	$sql_stmt = 'SELECT * FROM `'.$tb.'` WHERE serial_no="'.$serial_no.'" ORDER BY ID ASC';
	
	$db_res = sql_query($db_con, $sql_stmt);
	
	//var_dump($row_q, $row_sch, $db_res);
	
	if (is_array($db_res))
	{		
		$rows_join = ''; $total_join = 0;
		
		$sn = 0; $row = ''; $rows = '';	
		foreach ($db_res as $key => $value)
		{
					$row_bk = sql_select_id($db_con, $tb_3, $value['book_id']);
					if ($row_bk['class'] == 1)
					{			
						$sn += 1;			
						$totaled = Util::totaled_by_row($db_con, $tb, 'ID', $value['ID']);
						$total = (array)current($totaled);
						//var_dump($totaled);
						
						$row = '<tr>
							<td>'.$sn.'.</td>
							<td class="nw">'.$row_bk['book'].'</td>
							
							<td>'.money_f($value['c1']).'</td>
							<td>'.money_f($value['c2']).'</td>
							<td>'.money_f($value['c3']).'</td>
							<td>'.money_f($value['c4']).'</td>
							<td>'.money_f($value['c5']).'</td>
							<td>'.money_f($value['c6']).'</td>
							
							<td>'.money_f($total['qty']).'</td>
							<td>'.money_f($total['unit']).'</td>
							<td>'.money_f($total['stock']).'</td>
							<td class="ar">'.money_f($total['disc']).' &nbsp; &nbsp; Disc</td>
							<td>'.money_f($total['supply']).'</td>
						</tr>';
						
						$total_join += $total['supply'];
						$rows .= $row;
					}
		}
		$rows_join = $rows.'<tr><td colspan="13">&nbsp;</td></tr>';

		$sn = 0; $row = ''; $rows = '';	
		foreach ($db_res as $key => $value)
		{
					$row_bk = sql_select_id($db_con, $tb_3, $value['book_id']);
					if ($row_bk['class'] == 2)
					{			
						$sn += 1;			
						$totaled = Util::totaled_by_row($db_con, $tb, 'ID', $value['ID']);
						$total = (array)current($totaled);
						//var_dump($totaled);
						
						$row = '<tr>
							<td>'.$sn.'.</td>
							<td class="nw">'.$row_bk['book'].'</td>
							
							<td>'.money_f($value['c1']).'</td>
							<td>'.money_f($value['c2']).'</td>
							<td>'.money_f($value['c3']).'</td>
							<td class="null">&nbsp;</td>
							<td class="null">&nbsp;</td>
							<td class="null">&nbsp;</td>
							
							<td>'.money_f($total['qty']).'</td>
							<td>'.money_f($total['unit']).'</td>
							<td>'.money_f($total['stock']).'</td>
							<td class="ar">'.money_f($total['disc']).' &nbsp; &nbsp; Disc</td>
							<td>'.money_f($total['supply']).'</td>
						</tr>';
			
						$total_join += $total['supply'];
						$rows .= $row;
					}
		}		
		$rows_join .= $rows;		
	}
}
?>