<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Manage Credit Note'; include_once 'inc/nav.php'; ?>
  
    <table class="tmp-table" border="0">
      <tr>
        <th>&nbsp;</th>      
        <th width="1">#</th>
        <th>Transaction Date</th>
        <th nw>
        	<a href="view_zones.php" target="_new">
          	Zone-Session No.
          </a>
        </th>
        <th>Total Credit Note</th>
        <th>Total Books</th>
        <th>NET Credits (&#8358;)</th>
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