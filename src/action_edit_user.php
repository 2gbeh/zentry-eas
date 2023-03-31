<?PHP
$tb = 'user';
$dir = 'uploads/';

if ($_GET['e'] == true) {	
	$_POST = sql_select_id($db_con, $tb, $_GET['q']);
}

//var_dump($_POST, $_FILES);
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$k = 'passport';
	if (strlen($_FILES[$k]['name']) > 4) 
	{
		$row = sql_select_id($db_con, $tb, $_POST['ID']);
		$_POST[$k] = replace_file($row[$k], $_FILES[$k], $dir);
	}
	
	$post = sanitize_request($_POST);
	$post['reg_date'] = Util::date_f($_POST['reg_date']);
	
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

$ddl_title = Enums::option(Lists::TITLE, $_POST['title']);

$ddl_gender = Enums::option(Lists::GENDER, $_POST['gender']);

$ddl_state = Enums::option(Lists::STATE, $_POST['state']);

$enum_zone = sql_column($db_con, 'zone', 'zone');
$ddl_zone = Enums::option($enum_zone, $_POST['zone_id']);
?>