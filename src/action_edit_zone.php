<?PHP
$tb = 'zone';

if ($_GET['e'] == true) {
	$_POST = sql_select_id($db_con, $tb, $_GET['q']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$post = sanitize_request($_POST);
	
	$db_res = sql_update($db_con, $tb, $post, 'ID', $_POST['ID']);
		
	if (is_numeric($db_res))
	{		
		$error = 'Record updated successfully';
		$errno = 200;
	}
	else
	{
		$error = $db_res;
		$errno = 400;		
	}
}

$enum_zone = sql_column($db_con, $tb, 'zone');
$hint_zone = Enums::datalist($enum_zone, 'hint_zone');

$enum_abbr = sql_column($db_con, $tb, 'abbr');
$hint_abbr = Enums::datalist($enum_abbr, 'hint_abbr');

$ddl_state = Enums::option(Lists::STATE, $_POST['state']);
?>