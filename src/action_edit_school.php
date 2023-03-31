<?PHP
$tb = 'school';

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

$enum_school = sql_column($db_con, $tb, 'school');
$hint_school = Enums::datalist($enum_school, 'hint_school');

$ddl_title = Enums::option(Lists::TITLE, $_POST['title']);

$enum_principal = sql_column($db_con, $tb, 'principal');
$hint_principal = Enums::datalist($enum_principal, 'hint_principal');

$ddl_gender = Enums::option(Lists::GENDER, $_POST['gender']);

$ddl_state = Enums::option(Lists::STATE, $_POST['state']);

$enum_zone = sql_column($db_con, 'zone', 'zone');
$ddl_zone = Enums::option($enum_zone, $_POST['zone_id']);
?>