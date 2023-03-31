<?PHP
$tb = 'user'; 
$tb_2 = 'zone'; 
$tb_3 = 'sale'; 
$tb_4 = 'credit';

# Search parameter
$sess_q = $_GET['v'] == true? $_GET['q']: 0;
$sess_row = Util::ssl($db_con);
$sess_ddl = Enums::option($sess_row, $sess_q);
$sess_yr = $sess_row[$sess_q];
//var_dump($sess_q, $sess_row, $sess_ddl, $sess_yr);

# Records
$size = count(sql_select_all($db_con, $tb));
$pager = new Pager($size, 20);
$sql_stmt = 'SELECT * FROM `'.$tb.'` ORDER BY username ASC '.$pager->clause;

$db_res = sql_query($db_con, $sql_stmt);
//var_dump($sql_stmt, $db_res);

if (is_array($db_res))
{		
	$sn = $pager->off; $row = ''; $rows = '';	
	foreach ($db_res as $key => $value)
	{
		$sn += 1;
		$bio = Util::bio($db_con, $value['ID']);
		$zone = Util::zone_f($db_con, $value['zone_id']);
		$total = Util::ssa($db_con, $value['zone_id'], $sess_yr);
		//var_dump($bio, $zone, $total);

		$row = '<tr>		
			<td>'. $sn .'</td>
			<td>'. $bio .'</td>
			<td>'. $zone .'</td>
			<td>'. $total['batch_no'] .'</td>			
			<td nw>N '. money_f($total['supply']) .'</td>
			<td nw>N '. money_f($total['sales']) .'</td>
			<td nw>N '. money_f($total['returns']) .'</td>
			<td nw>N '. money_f($total['bal']) .'</td>
		</tr>';

		$rows .= $row;		
	}
}
?>