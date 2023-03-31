<?PHP
$tb = 'receipt';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$post = sanitize_request($_POST);
	$post['reg_date'] = Util::date_f($_POST['reg_date']);
	$serial_no = $_POST['serial_no'];	
	
	# Serial no is null and unique
	$db_res = sql_select_one($db_con, $tb, 'serial_no', $serial_no);
	
	if (is_array($db_res)) {
			$error = 'Receipt Serial No. already exist in records!';
			$errno = 400;
	}
	else {
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
}

$enum_school = sql_column($db_con, 'school', 'school');
$ddl_school = Enums::option($enum_school, $_POST['school_id']);

$enum_batch = sql_column_distinct($db_con, 'sale', 'batch_no');
$hint_batch = Enums::datalist($enum_batch, 'hint_batch');

$enum_card = sql_column_distinct($db_con, 'sale', 'card_no');
$hint_card = Enums::datalist($enum_card, 'hint_card');
?>