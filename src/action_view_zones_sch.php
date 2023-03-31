<?PHP
$tb = 'zone'; 
$tb_2 = 'school'; 

if ($_GET['v'] == true) {
	$row = sql_select_id($db_con, $tb, $_GET['q']);
	$under = strtoupper($row['zone']);
}

$size = sql_count($db_con, $tb);
$pager = new Pager($size, 20);
$sql_stmt = 'SELECT * FROM `'.$tb_2.'` WHERE zone_id="'.$_GET['q'].'" ORDER BY school ASC '.$pager->clause;

$db_res = sql_query($db_con, $sql_stmt);

if (is_array($db_res))
{		
	$sn = $pager->off; $row = ''; $rows = '';	
	foreach ($db_res as $key => $value)
	{
		$sn += 1;
		
		$row = '<tr>	
			<td>'. $sn .'</td>
			<td nw>'. ucwords($value['school']) .'</td>
			<td nw>SCH-'. $value['ID'] .'</td>			
			<td>'. enum_f(Lists::TITLE, $value['title']) .'</td>
			<td nw>'. ucwords($value['principal']) .'</td>
			<td>'. null_f($value['email']) .'</td>
			<td>'. $value['phone'] .'</td>
			<td>'. $value['address'] .'</td>
			<td>'. enum_f(Lists::STATE, $value['state']) .'</td>
			<td nw>
				<a href="view_zones_inv.php?v=true&q='.$value['ID'].'" title="Sales Invoice">INV</a> &nbsp;
				<a href="view_zones_cn.php?v=true&q='.$value['ID'].'" title="Credit Note">CN</a> &nbsp;
				<a href="view_zones_rt.php?v=true&q='.$value['ID'].'" title="Receipt">RT</a> &nbsp;
				<a href="view_zones_stmt.php?v=true&q='.$value['ID'].'?" title="Statement of Account">STMT</a>
			</td>				
		</tr>';

		$rows .= $row;
	}
}
?>