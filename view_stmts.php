<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Statement of Account'; include_once 'inc/nav.php'; ?>
  
    <table class="tmp-table" border="0">
      <tr>
        <th width="1">#</th>
        <th>Card No.</th>
        <th nw>
        	<a href="view_schools.php" target="_new">
          	School-Session No.
          </a>
        </th>
        <th>School Name</th>                
        <th>B/F (&#8358;)</th>
        <th>Transaction Date</th>
        <th>Statement</th>
        <th>Debit (&#8358;)</th>
        <th>Credit (&#8358;)</th>
        <th>Balance (&#8358;)</th>
        <th>&nbsp;</th>
      </tr>
      
			<tbody>
      	<?php echo $rows; ?>
      </tbody>
    </table>   
		<p></p>
    
		<?php echo $pager->nav; ?>
  </main>    
</td></tr></table> <!-- end of frame -->
<?php include_once 'inc/footer.php'; ?>
<?php include_once 'inc/end.php'; ?>