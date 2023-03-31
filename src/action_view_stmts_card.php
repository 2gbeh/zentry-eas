<?PHP
$tb = 'stmt';
$enum_school = sql_column($db_con, 'school', 'school');

if ($_GET['v'] == true) {
	goto_page('view_stmts.php?v=true&q=' . $_GET['q']);
}

if ($_GET['d'] == true)
{
	$batch_no = sql_cell($db_con, $tb, 'batch_no', 'ID', $_GET['q']);
	$db_res = sql_delete($db_con, $tb, 'batch_no', $batch_no);
	
	if ($db_res > 0) {
		$error = 'Record deleted successfully';
		$errno = 200;
	}	else	{
		$error = 'Deleted record no longer exist';
		$errno = 300;
	}	
}

$size = sql_distinct_count($db_con, $tb, 'batch_no');
$pager = new Pager($size, 20);
$sql_stmt = 'SELECT * FROM `'.$tb.'` GROUP BY batch_no ORDER BY ID DESC '.$pager->clause;

$db_res = sql_query($db_con, $sql_stmt);

if (is_array($db_res))
{		
	$sn = $pager->off; $row = ''; $rows = '';	
	foreach ($db_res as $key => $value)
	{
		$sn += 1;
		$totaled = Util::totaled_stmt($db_con, 'batch_no', $value['batch_no']);
		//var_dump($totaled);		
		
		$row = '<tr>
			<td nw>
				<button class="btn btn-alt" onClick="onView('.$value['card_no'].')" title="View">&#128065;</button>
			</td>			
			<td>'. $sn .'</td>	
			<td>'. $value['card_no'] .'</td>
			<td>'. $value['batch_no'] .'</td>			
			<td>'. enum_f($enum_school, $value['school_id']) .'</td>
			<td>'. $totaled->tot .'</td>
			<td>'. money_f($totaled->bal) .'</td>						
			<td nw>'. date_f($value['DATE']) .'</td>
			<td nw>'. time_f($value['DATE']) .'</td>
			<td nw ar>
				<button class="btn btn-sec" onClick="onDelete('.$value['ID'].')" title="Delete">&#10006;</button>
			</td>
		</tr>';

		$rows .= $row;
	}
}
?>