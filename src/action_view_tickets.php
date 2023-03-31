<?PHP
$tb = 'ticket';
$enum_admin = sql_column($db_con, 'admin', 'username');

if ($_GET['e'] == true) {
	goto_page('edit_ticket.php?e=true&q=' . $_GET['q']);
}

if ($_GET['d'] == true)
{
	$db_res = sql_delete($db_con, $tb, 'ID', $_GET['q']);
	
	if ($db_res > 0) {
		$error = 'Record deleted successfully';
		$errno = 200;
	} else {
		$error = 'Deleted record no longer exist';
		$errno = 300;
	}
}

$size = sql_count($db_con, $tb);
$pager = new Pager($size, 20);
$sql_stmt = 'SELECT * FROM `'.$tb.'` ORDER BY id DESC '.$pager->clause;

$db_res = sql_query($db_con, $sql_stmt);

if (is_array($db_res))
{		
	$sn = $pager->off; $row = ''; $rows = '';	
	foreach ($db_res as $key => $value)
	{
		$sn += 1;
		
		$join_date = trim_f($value['DATE']);
		$ticket_id = 'LOG_'.substr($join_date,0,8).'_'.substr($join_date,-6);
		
		$row = '<tr>
			<td>'. $sn .'</td>
			<td>'. ucwords(enum_f($enum_admin, $value['user_id'])) .'</td>
			<td nw>'. $ticket_id .'</td>
			<td>'. $value['message'] .'</td>
			
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