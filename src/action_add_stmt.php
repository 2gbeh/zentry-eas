<?PHP
$tb = 'stmt';

if (isset($_GET['c']))
{
	$q = $_GET['c'];
	$row = Util::last_stmt($db_con, $q);
	$_POST['card_no'] = $q;	
	$_POST['batch_no'] = $row['batch_no'];
	$_POST['school_id'] = $row['school_id'];
	$_POST['bf'] = $row['bf'];
}

if (isset($_GET['s']))
{
	$q = $_GET['s'];
	$disable_dr = $q == 1 || $q == 3? 'disabled': '';
	$disable_cr = $q == 2? 'disabled': '';	
	$_POST['stmt_type'] = $q;
}

if (isset($_GET['dr']))
{
	$_POST['debit'] = $_GET['dr'];
	$_POST['bal'] = $_POST['bf'] + $_GET['dr'];		
}

if (isset($_GET['cr']))
{
	$_POST['credit'] = $_GET['cr'];
	$_POST['bal'] = $_POST['bf'] - $_GET['cr'];	
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
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

$enum_school = sql_column($db_con, 'school', 'school');
$ddl_school = Enums::option($enum_school, $_POST['school_id']);

$enum_card = sql_column_distinct($db_con, $tb , 'card_no');
$hint_card = Enums::datalist($enum_card, 'hint_card');

$enum_batch = sql_column_distinct($db_con, $tb , 'batch_no');
$hint_batch = Enums::datalist($enum_batch, 'hint_batch');

$ddl_stmt = Enums::option($enum_stmt, $_POST['stmt_type']);
								
$enum_stmt = sql_column_distinct($db_con, $tb , 'stmt_no');
$hint_stmt = Enums::datalist($enum_stmt, 'hint_stmt');

?>