<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Manage Schools'; include_once 'inc/nav.php'; ?>
    
    <form class="tmp-form tmp-form-toolbar" <?php echo FORM_ATTRIB_GET; ?>>
      <table border="0">
        <tr valign="bottom">
          <td>
          	<input type="search" name="q" placeholder="Search school name.." list="hint_school" required />
            <?php echo $hint_school; ?>
          </td>
          <td align="right" width="1">
            <input type="hidden" name="v" value="true" />
            <button type="submit" class="pri">Search</button>
          </td>        
        </tr>
      </table>        
    </form>    
  
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
        <th>RETINKEN Zone</th>
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