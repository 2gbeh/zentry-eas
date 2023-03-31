<?PHP
$tb = 'sale';

if ($_GET['e'] == true) {	
	$_POST = sql_select_id($db_con, $tb, $_GET['q']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$post = sanitize_request($_POST);
	$post['reg_date'] = Util::date_f($_POST['reg_date']);
	
	sql_delete($db_con, $tb, 'serial_no', $post['serial_no']);
	
	$db_res_arr = array();
	foreach ($_POST['book_id'] as $i => $book_id)	
	{	
		$book_row = sql_select_id($db_con, 'book', $book_id);

		if ($book_row['class'] == 1) {
			$new_post = array_merge($post, array(
					'book_id' => $book_id,
					'c1' => $_POST['c1'][$i],
					'c2' => $_POST['c2'][$i],
					'c3' => $_POST['c3'][$i],
					'c4' => $_POST['c4'][$i],
					'c5' => $_POST['c5'][$i],
					'c6' => $_POST['c6'][$i]
				)	
			);
		}
		else {
			$new_post = array_merge($post, array(
					'book_id' => $book_id,
					'c1' => $_POST['c1'][$i],
					'c2' => $_POST['c2'][$i],
					'c3' => $_POST['c3'][$i]
				)	
			);
		}		
	
		$db_res_arr[] = $db_res = sql_insert($db_con, $tb, $new_post);		
		//var_dump($new_post, $db_res);
	}

	if (count($db_res_arr) == count($_POST['book_id']))
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

$enum_serial_alt = sql_column_distinct($db_con, $tb, 'serial_no_alt');
$hint_serial_alt = Enums::datalist($enum_serial_alt, 'hint_serial_alt');

$enum_card = sql_column_distinct($db_con, $tb, 'card_no');
$hint_card = Enums::datalist($enum_card, 'hint_card');

$enum_batch = sql_column_distinct($db_con, $tb, 'batch_no');
$hint_batch = Enums::datalist($enum_batch, 'hint_batch');

$enum_book = sql_column($db_con, 'book', 'book');
$ddl_book = Enums::option($enum_book, $_POST['book_id']);

$db_res = sql_select_all($db_con, 'book');
//var_dump($db_res);
$sn = 0;
$tr = '';
foreach ($db_res as $row)
{
	if ($row['STATUS'] < 1)
	{
		$sn++;
		$tr .= '<tr>
			<td colspan="2">
				<label>#'.$sn.'. Book Title: </label>
				<select name="book_id[]" readonly required>
					<option value="'.$row['ID'].'">'.str_replace('RETINKEN ','',$row['book']).'</option>
				</select>
			</td>
			<td colspan="2">
				<table border="0">
					<tr>';

		$td = '';		
		$j = $row['class'] == 1? 6: 3;
		for ($i = 1; $i <= $j; $i++) {
			$name = 'c'.$i;
			$td .= '<td>
				<label>Class '.$i.': </label>
				<input type="number" name="'.$name.'[]" min="0" value="0" maxlength="3" />
			</td>';
		}
		$tr .= $td.'</tr>
				</table>
			</td>
		</tr>';
	}
}
$excel = $tr;
?>