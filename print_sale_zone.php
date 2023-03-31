<?php include_once 'inc/top_print.php'; ?>  
<main class="prt">
<table border="0" class="prt-thead">
<caption>
	<a href="<?php echo $nav; ?>">Return</a> | 
	<a href="javascript:void(0)" onClick="window.print()">Print</a>  
	<div class="title"><?php echo $page_ctx_title; ?></div>  
</caption>
<tr>
	<th width="1" class="nw">Sales Rep.:</th>
	<td><?php echo $rep_bio; ?></td>
</tr>
<tr>
	<th width="1" class="nw">Zone:</th>
	<td><?php echo $zone_bio; ?></td>
	<th width="1" class="nw">Zone-Session No.:</th>
	<td><?php echo $batch_no; ?></td>
	<th  width="1" class="nw">DATE:</th>
	<td><?php echo $reg_date; ?></td>    
</tr>
</table>
<p></p>

<table border="5" class="prt-tbody">
<tr>
	<th rowspan="2" width="1">&nbsp;</th>
	<th rowspan="2" class="nw">BOOK</th>
	<th colspan="6">CLASS</th>
	<th rowspan="2">TOTAL <br/>BOOKS</th>
	<th rowspan="2">RATE <br/>&#8358;</th>
	<th rowspan="2">AMOUNT <br/>&#8358; (GROSS)</th>
	<th rowspan="2">DISCOUNT <br/>&#8358;</th>
	<th>BALANCE</th>
</tr>
<tr class="bb">
	<th>1</th>
	<th>2</th>
	<th>3</th>
	<th>4</th>
	<th>5</th>
	<th>6</th>
	<th>&#8358; (NET) K</th>
</tr>
<?php echo $rows_join; ?>
<!--<tr>
	<td>1.</td>
	<td class="nw">Basic Mathematics</td>
	<td>10</td>
	<td>10</td>
	<td>10</td>
	<td>10</td>
	<td>10</td>
	<td>10</td>
	<td>60</td>
	<td>1,100</td>
	<td>66,000</td>
	<td class="ar">8,400 &nbsp; &nbsp; Disc</td>
	<td>57,600</td>
</tr>
<tr>
	<td>2.</td>
	<td class="nw">Basic English Reader</td>
	<td>10</td>
	<td>10</td>
	<td>10</td>
	<td class="null">&nbsp;</td>
	<td class="null">&nbsp;</td>
	<td class="null">&nbsp;</td>
	<td>60</td>
	<td>1,100</td>
	<td>66,000</td>
	<td class="ar">8,400 &nbsp; &nbsp; Disc</td>
	<td>57,600</td>
</tr>
--><tr>
	<td colspan="12"><div class="ar t_label">TOTAL &#8358;</div></td>
	<td><div class="t_value"><?php echo money_f($total_join); ?></div></td>    
</tr>
</table>
</main>
<?php include_once 'inc/base_print.php'; ?>  