<?PHP
$tb = 'user'; 
$dir = 'uploads/';
$enum_zone = sql_column($db_con, 'zone', 'zone');


if ($_GET['v'] == true) {
	goto_page('view_user.php?v=true&q=' . $_GET['q']);
}

if ($_GET['e'] == true) {
	goto_page('edit_user.php?e=true&q=' . $_GET['q']);
}

if ($_GET['d'] == true)
{
	$db_res = sql_select_id($db_con, $tb, $_GET['q']);
	if (is_array($db_res))
		delete_file($db_res['passport'],$dir);
	
	$db_res = sql_delete($db_con, $tb, 'ID', $_GET['q']);
	
	if ($db_res > 0) {
		$error = 'Record deleted successfully';
		$errno = 200;
	}	else {
		$error = 'Deleted record no longer exist';
		$errno = 300;
	}
	
}

$size = sql_count($db_con, $tb);
$pager = new Pager($size, 20);
$sql_stmt = 'SELECT * FROM `'.$tb.'` ORDER BY username ASC '.$pager->clause;

$db_res = sql_query($db_con, $sql_stmt);

if (is_array($db_res))
{		
	$sn = $pager->off; $row = ''; $rows = '';	
	foreach ($db_res as $key => $value)
	{
		$sn += 1;
		$email_buf = strlen($value['email']) >= 7? '<a href="mailto:'.$value['email'].'">'.$value['email'].'</a>': 'N/A';		
		
		$row = '<tr>
			<td>
				<button class="btn btn-alt" onClick="onView('.$value['ID'].')" title="View">&#128065;</button>							
			</td>		
			<td>'. $sn .'</td>
			<td>'. enum_f(Lists::TITLE, $value['title']) .'</td>
			<td>'. ucwords($value['username']) .'</td>
			<td>'. $value['gender'] .'</td>
			<td>'. $email_buf .'</td>			
			<td>'. $value['phone'] .'</td>
			<td>'. enum_f(Lists::STATE, $value['state']) .'</td>
			<td>'. Util::zone_f($db_con, $value['zone_id']) .'</td>
			<td nw>'. date_f($value['reg_date']) .'</td>
			<td nw ar>
				<button class="btn btn-pri" onClick="onEdit('.$value['ID'].')" title="Edit">&#9998;</button> 
				<button class="btn btn-sec" onClick="onDelete('.$value['ID'].')" title="Delete">&#10006;</button>
			</td>
		</tr>';

		$rows .= $row;
	}
}
?>