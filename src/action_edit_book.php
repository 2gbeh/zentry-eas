<?PHP
$tb = 'book';

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

$enum_book = sql_column($db_con, $tb, 'book');
$hint_book = Enums::datalist($enum_book, 'hint_book');

$ddl_class = Enums::option($enum_class, $_POST['class']);

$ddl_grade = Enums::option($enum_grade, $_POST['grade']);
?>