<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'List of Receipts under ' . $zone; include_once 'inc/nav.php'; ?>
  
    <table class="tmp-table" border="0">
      <tr>
        <th width="1">#</th>
        <th nw>
        	<a href="view_zones.php" target="_new">
          	Zone-Session No.
          </a>
        </th>         
        <th>Card No.</th>
        <th>Serial No.</th>             
        <th>Amount Paid</th>
        <th>Transaction Date</th>
        <th>Entry Date/Time</th>
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