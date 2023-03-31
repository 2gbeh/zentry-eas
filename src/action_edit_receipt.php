<?PHP
$tb = 'receipt';

if ($_GET['e'] == true) {	
	$_POST = sql_select_id($db_con, $tb, $_GET['q']);
	$_POST['reg_date'] = Util::undate_f($_POST['reg_date']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
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

$enum_school = sql_column($db_con, 'school', 'school');
$ddl_school = Enums::option($enum_school, $_POST['school_id']);

$enum_batch = sql_column_distinct($db_con, 'sale', 'batch_no');
$hint_batch = Enums::datalist($enum_batch, 'hint_batch');

$enum_card = sql_column_distinct($db_con, 'sale', 'card_no');
$hint_card = Enums::datalist($enum_card, 'hint_card');
?>