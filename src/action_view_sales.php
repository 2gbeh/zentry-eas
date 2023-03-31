<?PHP
$tb = 'sale'; 

$enum_card = sql_column_distinct($db_con, $tb, 'card_no');
asort($enum_card);
$hint_card = Enums::datalist($enum_card, 'hint_card');

$enum_school = sql_column($db_con, 'school', 'school');

if ($_GET['v'] == true) {
	goto_page('print_sale.php?v=true&q=' . $_GET['q']);
}

if ($_GET['e'] == true) {
	goto_page('edit_sale.php?e=true&q=' . $_GET['q']);
}

if ($_GET['d'] == true)
{
	$serial_no = sql_cell($db_con, $tb, 'serial_no', 'ID', $_GET['q']);
	$db_res = sql_delete($db_con, $tb, 'serial_no', $serial_no);
	
	if ($db_res > 0) {
		$error = 'Record deleted successfully';
		$errno = 200;
	}	else	{
		$error = 'Deleted record no longer exist';
		$errno = 300;
	}	
}

$size = sql_distinct_count($db_con, $tb, 'serial_no');
$pager = new Pager($size, 20);
if ($_GET['vv'] == true)
	$sql_stmt = 'SELECT * FROM `'.$tb.'` WHERE card_no="'.$_GET['q'].'" GROUP BY serial_no ORDER BY reg_date DESC '.$pager->clause;
else 
	$sql_stmt = 'SELECT * FROM `'.$tb.'` GROUP BY serial_no ORDER BY reg_date DESC '.$pager->clause;

$db_res = sql_query($db_con, $sql_stmt);

if (is_array($db_res))
{		
	$sn = $pager->off; $row = ''; $rows = '';	
	foreach ($db_res as $key => $value)
	{
		$sn += 1;
		$totaled = Util::totaled_by_col($db_con, $tb, 'serial_no', $value['serial_no']);
		//var_dump($totaled);
		
		$row = '<tr>
			<td>
				<button class="btn btn-alt" onClick="onView('.$value['ID'].')" title="View">&#128065;</button>							
			</td>			
			<td>'. $sn .'</td>
			<td>'. enum_f($enum_school, $value['school_id']) .'</td>
			<td>'. $value['card_no'] .'</td>
			<td nw>'. date_f($value['reg_date']) .'</td>			
			<td nw>'. date_f($value['DATE']) .'</td>			
			<td>'. $value['batch_no'] .'</td>
			<td>'. $value['serial_no_alt'] .'</td>
			<td>'. money_f($totaled->qty) .'</td>
			<td>N '. money_f($totaled->supply) .'</td>
			<td nw ar>
				<button class="btn btn-pri" onClick="onEdit('.$value['ID'].')" title="Edit">&#9998;</button> 
				<button class="btn btn-sec" onClick="onDelete('.$value['ID'].')" title="Delete">&#10006;</button>
			</td>
		</tr>';

		$rows .= $row;
	}
}
?>