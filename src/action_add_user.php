<?PHP
$tb = 'user';
$dir = 'uploads/';

//var_dump($_POST, $_FILES);
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	if (strlen($_FILES['passport']['name']) > 0)
		$_POST['passport'] = upload_file($_FILES['passport'], $dir);	
	
	$post = sanitize_request($_POST);
	$post['reg_date'] = Util::date_f($_POST['reg_date']);
	
	$db_res = sql_insert($db_con, $tb, $post);
		
	if (is_numeric($db_res))
	{
		$_POST = NULL;
		
		$error = 'Record saved successfully';
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