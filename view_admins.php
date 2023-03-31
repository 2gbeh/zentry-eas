<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Admin Account'; include_once 'inc/nav.php'; ?>
  
    <table class="tmp-table" border="0">
      <tr>
        <th width="1">#</th>
        <th>Username</th>
        <th>Email Address</th>
        <th>Phone Number</th>        
        <th>Access Rights</th>
        <th>Date</th>
        <th>Time</th>
        <th>&nbsp;</th>
      </tr>
      
			<tbody>
      	<?php echo $rows; ?>
      </tbody>
    </table>
  </main>    
</td></tr></table> <!-- end of frame -->
<?php include_once 'inc/footer.php'; ?>
<?php include_once 'inc/end.php'; ?>