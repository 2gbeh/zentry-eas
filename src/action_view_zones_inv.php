<?PHP
$tb = 'school'; 
$tb_2 = 'sale'; 

if ($_GET['v'] == true) {
	$row = sql_select_id($db_con, $tb, $_GET['q']);
	$under = strtoupper($row['school']);
}

$size = sql_distinct_count($db_con, $tb_2, 'serial_no');
$pager = new Pager($size, 20);
$sql_stmt = 'SELECT * FROM `'.$tb_2.'` WHERE school_id="'.$_GET['q'].'" GROUP BY serial_no ORDER BY reg_date DESC '.$pager->clause;

$db_res = sql_query($db_con, $sql_stmt);

if (is_array($db_res))
{		
	$sn = $pager->off; $row = ''; $rows = '';	
	foreach ($db_res as $key => $value)
	{
		$sn += 1;
		$totaled = Util::totaled_by_col($db_con, $tb_2, 'serial_no', $value['serial_no']);
		//var_dump($totaled);
		
		$row = '<tr>
			<td>'. $sn .'</td>
			<td>'. $value['card_no'] .'</td>
			<td nw>'. date_f($value['reg_date']) .'</td>			
			<td nw>'. date_f($value['DATE']) .'</td>			
			<td>'. $value['batch_no'] .'</td>
			<td>'. $value['serial_no'] .'</td>
			<td>'. money_f($totaled->qty) .'</td>
			<td>N '. money_f($totaled->supply) .'</td>
		</tr>';

		$rows .= $row;
	}
}
?>