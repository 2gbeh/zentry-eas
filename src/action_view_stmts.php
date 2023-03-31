<?PHP
$tb = 'stmt';
$enum_school = sql_column($db_con, 'school', 'school');

if ($_GET['e'] == true) {
	goto_page('edit_stmt.php?e=true&q=' . $_GET['q']);
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
if ($_GET['v'] == true)
	$sql_stmt = 'SELECT * FROM `'.$tb.'` WHERE card_no="'.$_GET['q'].'" ORDER BY ID DESC '.$pager->clause;
else
	$sql_stmt = 'SELECT * FROM `'.$tb.'` ORDER BY ID DESC '.$pager->clause;

$db_res = sql_query($db_con, $sql_stmt);

if (is_array($db_res))
{		
	$sn = $pager->off; $row = ''; $rows = '';	
	foreach ($db_res as $key => $value)
	{
		$sn += 1;
		
		$stmt_type = enum_f($enum_stmt, $value['stmt_type']);
		$stmt_no = $value['stmt_no'];
		$stmt_buf = $stmt_type.'<br/>#'.$stmt_no;
		
		$row = '<tr>
			<td>'. $sn .'</td>	
			<td>'. $value['card_no'] .'</td>
			<td>'. $value['batch_no'] .'</td>			
			<td>'. enum_f($enum_school, $value['school_id']) .'</td>
			<td>'. money_f($value['bf']) .'</td>			
			<td>'. $value['reg_date'] .'</td>
			<td>'. $stmt_buf .'</td>
			<td>'. money_f($value['debit']) .'</td>
			<td>'. money_f($value['credit']) .'</td>
			<td>'. money_f($value['bal']) .'</td>
			<td nw ar>
				<button class="btn btn-pri" onClick="onEdit('.$value['ID'].')" title="Edit">&#9998;</button> 
				<button class="btn btn-sec" onClick="onDelete('.$value['ID'].')" title="Delete">&#10006;</button>
			</td>
		</tr>';

		$rows .= $row;
	}
}
?>