<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Manage Distributors'; include_once 'inc/nav.php'; ?>
  
    <table class="tmp-table" border="0">
      <tr>
        <th>&nbsp;</th>      	
        <th width="1">#</th>
        <th>Title</th>
        <th>Full Name</th>
        <th>Sex</th>
        <th>Email Address</th>        
        <th>Phone Number</th>
        <th>Location</th>
        <th>RETINKEN Zone</th>
        <th>Reg. Date</th>
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