<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Manage Sales Invoice'; include_once 'inc/nav.php'; ?>
    
    <form class="tmp-form tmp-form-toolbar" <?php echo FORM_ATTRIB_GET; ?>>
      <table border="0">
        <tr valign="bottom">
          <td>
          	<input type="search" name="q" placeholder="Search card number.." list="hint_card" required />
            <?php echo $hint_card; ?>
          </td>
          <td align="right" width="1">
            <input type="hidden" name="vv" value="true" />
            <button type="submit" class="pri">Search</button>
          </td>        
        </tr>
      </table>        
    </form>     
  
    <table class="tmp-table" border="0">
      <tr>
        <th width="1">&nbsp;</th>
        <th width="1">#</th>
        <th>School Name</th>
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
        <th>NET Sales (&#8358;)</th>
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