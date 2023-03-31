<?PHP
$tb = 'school';

$enum_school = sql_column($db_con, $tb, 'school');
asort($enum_school);
$hint_school = Enums::datalist($enum_school, 'hint_school');

if ($_GET['e'] == true) {
	goto_page('edit_school.php?e=true&q=' . $_GET['q']);
}

if ($_GET['d'] == true)
{
	# Transaction Delete
	$tb_arr = array('sale','credit','stmt','receipt');
	foreach ($tb_arr as $tb_e)
		sql_delete($db_con, $tb_e, 'school_id', $_GET['q']);	
		
	$db_res = sql_delete($db_con, $tb, 'ID', $_GET['q']);
	
	if ($db_res > 0) {
		$error = 'Record deleted successfully';
		$errno = 200;
	}	else {
		$error = 'Deleted record no longer exist';
		$errno = 300;
	}	
}

if ($_GET['v'] == true)
	$sql_stmt = 'SELECT * FROM `'.$tb.'` WHERE school="'.$_GET['q'].'"';
else 
{
	$size = sql_count($db_con, $tb);
	$pager = new Pager($size, 20);	
	$sql_stmt = 'SELECT * FROM `'.$tb.'` ORDER BY school ASC '.$pager->clause;
}

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
			<td>'. Util::zone_f($db_con, $value['zone_id']) .'</td>
			<td nw ar>
				<button class="btn btn-pri" onClick="onEdit('.$value['ID'].')" title="Edit">&#9998;</button> 
				<button class="btn btn-sec" onClick="onDelete('.$value['ID'].')" title="Delete">&#10006;</button>
			</td>
		</tr>';

		$rows .= $row;
	}
}
?>