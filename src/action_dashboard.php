<?PHP
# BOOK STATS
$tb = 'book';
$row = sql_select_all($db_con, $tb);
$t = count($row);

$x = sql_select_count($db_con, $tb, 'class', 1);
$ring_rate_pri = round(($x * 100) / $t);

$x = sql_select_count($db_con, $tb, 'class', 2);
$ring_rate_nur = round(($x * 100) / $t);

$cost_arr = array();
foreach ($row as $assoc)
	array_push($cost_arr, (int) $assoc['stock']);	

$max = max($cost_arr);
$macro_numb_max = '&#8358; '.money_f($max);
$x = sql_select_count($db_con, $tb, 'stock', $max);
$macro_rate_max = round(($x * 100) / $t);

$min = min($cost_arr);
$macro_numb_min = '&#8358; '.money_f($min);
$x = sql_select_count($db_con, $tb, 'stock', $min);
$macro_rate_min = round(($x * 100) / $t);

$avg = array_sum($cost_arr) / count($cost_arr);
$avg = round($avg);
$ring_numb_avg = '&#8358; '.money_f($avg);
$ring_rate_avg = round(($avg * 100) / $max);

# ZONE STATS
$tb = 'zone';
$row = sql_select_all($db_con, $tb);
$sess_yr = date('Y') - 1 .'/'. date('Y');
$col_labels = $col_values = array();
$i = 0;
foreach ($row as $assoc) 
{
	array_push($col_labels, $assoc['abbr']);	
	$total = Util::ssa($db_con, $assoc['ID'], $sess_yr);
	array_push($col_values, $total['supply']);
}
//var_dump($col_labels,$col_values);
?>