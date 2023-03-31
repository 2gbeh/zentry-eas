<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Manage Zones'; include_once 'inc/nav.php'; ?>
    
    <form class="tmp-form" <?php echo FORM_ATTRIB; ?>>
      <fieldset>    
        <table class="tmp-grid" border="0">
        	<tr>
          	<td colspan="2">
              <label>Zone Name:</label>
              <input type="search" name="zone" value="<?php echo $_POST['zone']; ?>" placeholder="Ex. Abuja I Marketting Zone" maxlength="50"  list="hint_zone"required />
	            <?php echo $hint_zone; ?>
            </td>
          	<td colspan="1">
              <label>Sort Code:</label>
              <input type="search" name="abbr" value="<?php echo $_POST['abbr']; ?>" placeholder="Ex. ABJ-1" maxlength="15"  list="hint_abbr"required />
	            <?php echo $hint_abbr; ?>
            </td>
          	<td colspan="1">
              <label>State:</label>
              <select name="state" required>
                <option></option>
                <?php echo $ddl_state; ?>
              </select>
            </td>
          </tr>          
         </table>
        <div class="action">
          <input type="hidden" name="ID" value="<?php echo $_POST['ID']; ?>" readonly /> &nbsp;
          <button type="reset" class="sec">Clear</button> &nbsp;
          <button type="submit" class="pri">Update</button>
        </div>
      </fieldset>
    </form>
  </main>    
</td></tr></table> <!-- end of frame -->
<?php include_once 'inc/footer.php'; ?>
<?php include_once 'inc/end.php'; ?>
