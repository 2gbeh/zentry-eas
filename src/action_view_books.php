<?PHP
$tb = 'book';

if ($_GET['e'] == true) {
	goto_page('edit_book.php?e=true&q=' . $_GET['q']);
}

if ($_GET['d'] == true)
{
	$db_res = sql_delete($db_con, $tb , 'ID', $_GET['q']);
	
	if ($db_res > 0) {
		$error = 'Record deleted successfully';
		$errno = 200;
	}	else	{
		$error = 'Deleted record no longer exist';
		$errno = 300;
	}
}

$size = sql_count($db_con, $tb);
$pager = new Pager($size, 20);
$sql_stmt = 'SELECT * FROM `'.$tb.'` ORDER BY id ASC '.$pager->clause;

$db_res = sql_query($db_con, $sql_stmt);

if (is_array($db_res))
{		
	$sn = $pager->off; $row = ''; $rows = '';	
	foreach ($db_res as $key => $value)
	{
		$sn += 1;
		
		$row = '<tr>
			<td>'. $sn .'</td>
			<td nw>'. ucwords($value['book']) .'</td>
			<td>'. enum_f($enum_class, $value['class']) .'</td>
			<td>'. enum_f($enum_grade, $value['grade']) .'</td>
			<td>'. money_f($value['stock']) .'</td>
			<td>'. money_f($value['disc']) .'</td>
			<td>'. money_f($value['supply']) .'</td>
			<td nw>'. date_f($value['DATE']) .'</td>
			<td nw>'. time_f($value['DATE']) .'</td>
			<td nw ar>
				<button class="btn btn-pri" onClick="onEdit('.$value['ID'].')" title="Edit">&#9998;</button> 
				<button class="btn btn-sec" onClick="onDelete('.$value['ID'].')" title="Delete">&#10006;</button>
			</td>
		</tr>';

		$rows .= $row;
	}
}
?>