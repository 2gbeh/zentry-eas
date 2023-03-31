<?PHP
$tb = 'user'; 
$dir = 'uploads/';

if ($_GET['e'] == true) {
	goto_page('edit_user.php?e=true&q=' . $_GET['q']);
}

if ($_GET['d'] == true) {
	goto_page('view_users.php?d=true&q=' . $_GET['q']);
}

if ($_GET['v'] == true)
{
	$row = '';
	$db_res = sql_select_id($db_con, $tb, $_GET['q']);
	if ($db_res) 
	{
		$row = $db_res;
		
		$row['title'] = enum_f(Lists::TITLE, $row['title']);
		
		$name_arr = explode(' ',$row['username']);
		$row['surname'] = $name_arr[0];
		$row['names'] = $name_arr[1].' '.$name_arr[2];
		
		if (substr($row['passport'],0,3) != 'IMG')
			$row['passport'] = 'default.png';
	} 
	else 
	{
		$error = 'Select acccount does not exist';
		$errno = 400;	
	}		
	
}

?>