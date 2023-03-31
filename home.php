<?php include_once 'inc/top.php'; ?>
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td>
  <td>  
    <main class="tmp-base">  
			<?php $list_nav_key = 'Session Sales Analysis (select session below) :'; include_once 'inc/nav.php'; ?>     
      
      <form class="tmp-form tmp-form-toolbar" <?php echo FORM_ATTRIB_GET; ?>>
        <table border="0">
          <tr valign="bottom">
            <td>
              <select name="q" required>
                <option disabled selected>Select academic session..</option>
                <?php echo $sess_ddl; ?>
              </select>
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
          <th>#</th>
          <th>Distributor</th>
          <th>Zone</th>
          <th nw>
            <a href="view_zones.php" target="_new">
              Zone-Session No.
            </a>
          </th>          
          <th>Total Supply (&#8358;)</th>
          <th>Total Sales (&#8358;)</th>
          <th>Total Returns (&#8358;)</th>
          <th>Balance (&#8358;)</th>
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