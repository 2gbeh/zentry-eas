<?PHP
$tb = 'admin';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$post = sanitize_request($_POST);
	
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

$ddl_status = Enums::option(Lists::ADMIN, $_POST['status']);
?>