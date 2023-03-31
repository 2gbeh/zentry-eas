<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'List of Schools under ' . $under; include_once 'inc/nav.php'; ?>
  
    <table class="tmp-table" border="0">
      <tr>
        <th width="1">#</th>
        <th nw>School Name</th>
        <th nw>Sort Code</th>
        <th>Title</th>
        <th nw>Principal</th>
        <th>Email Address</th>
        <th>Phone Number</th>
        <th>Home Address</th>
        <th>Location</th>
        <th ar>&nbsp;</th>              
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