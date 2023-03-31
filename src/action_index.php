<?PHP
$tb = 'admin';
$nav = 'view_books.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$post = sanitize_request($_POST);	
	$db_res = sql_select_one($db_con, $tb, 'username', $post['username']);
	
	$errno = 400;	
	if (is_array($db_res))
	{
		if ($post['password'] == $db_res['password']) 
		{
			$_POST = NULL;			
			$error = 'Log in successful';
			$errno = 200;
			
			set_session('user', $db_res);
			goto_page($nav);
		}
		else
			$error = 'Incorrect password';
	}
	else
		$error = 'Username not found';	
}
?>