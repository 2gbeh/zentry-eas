<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'List of Credit Notes under ' . $zone; include_once 'inc/nav.php'; ?>
  
    <table class="tmp-table" border="0">
      <tr>
        <th width="1">#</th>
        <th>Card No.</th>
        <th>Transaction Date</th>
        <th>Entry Date</th>
        <th nw>
        	<a href="view_zones.php" target="_new">
          	Zone-Session No.
          </a>
        </th>
        <th>Serial No.</th>
        <th>Total Books</th>
        <th>NET Credits (&#8358;)</th>
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