<?PHP
$tb = 'admin';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$post = sanitize_request($_POST);
	
	$errno = 400;
	if ($post['password'] == $_USER['password']) 
	{			
		if ($post['password'] == $post['new_psw'])
			$error = 'Current password and new password cannot be the same'; 
		else if ($post['new_psw'] != $post['cfm_psw'])
			$error = 'New password and confirm password does not match';
		else
		{
			$post = array('password' => $post['new_psw']);
			
			$db_res = sql_update($db_con, $tb, $post, 'ID', $_USER['ID']);
			
			if (is_numeric($db_res))
			{
				$_POST = NULL;
				
				$error = 'Password updated successfully. Log in to continue';
				$errno = 200;
				
				session_destroy();
				goto_page('index.php?err=' . $error);
			}
			else
				$error = $db_res;
		}
	}
	else
		$error = 'Current password is incorrect';
}
?>