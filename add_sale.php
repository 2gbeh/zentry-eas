<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Manage Sales Invoice'; include_once 'inc/nav.php'; ?>
    
    <form class="tmp-form" <?php echo FORM_ATTRIB; ?>>
      <fieldset>    
        <table class="tmp-grid" border="0">
        	<tr>
          	<td colspan="1">
              <label>Zone-Session Batch No.: <a title="Ex. ABJ-1/2020/2021">(Eg.)</a></label>
              <input type="search" name="batch_no" value="<?php echo $_POST['batch_no']; ?>" placeholder="Ex. ABJ-1/2020/2021" maxlength="25" list="hint_batch" required />
 	            <?php echo $hint_batch; ?>
            </td>
          	<td colspan="1">
              <label>Invoice Serial No.:</label>
              <input type="search" name="serial_no_alt" value="<?php echo $_POST['serial_no_alt']; ?>" placeholder="Ex. 31951" maxlength="6" list="hint_serial_alt" required />
 	            <?php echo $hint_serial_alt; ?>
            </td>
          	<td colspan="1">
              <label><x>*</x> Unique File No.:</label>
              <input type="search" name="serial_no" value="<?php echo $_POST['serial_no']; ?>" placeholder="Ex. 31951" maxlength="6" required />
            </td>            
            <td>&nbsp;</td>
          </tr>
          <tr>
          	<td colspan="2">
              <label>Select Name of School:</label>
              <select name="school_id" required>
                <option></option>
                <?php echo $ddl_school; ?>
              </select>
            </td>
          	<td colspan="1">
              <label>Card No.:</label>
              <input type="search" name="card_no" value="<?php echo $_POST['card_no']; ?>" placeholder="Ex. 11252" maxlength="6" list="hint_card" required />
 	            <?php echo $hint_card; ?>
            </td>
          	<td colspan="1">
              <label>Transaction Date:</label>
              <input type="text" name="reg_date" value="<?php echo $_POST['reg_date']; ?>" placeholder="Ex. <?php echo date('d/m/Y'); ?>" required />
            </td>
          </tr> 
					<tbody><?php echo $excel; ?></tbody>
         </table>
        <div class="action">
          <button type="reset" class="sec">Clear</button> &nbsp;
          <button type="submit" class="pri">Save</button>
        </div>
      </fieldset>
    </form>
  </main>    
</td></tr></table> <!-- end of frame -->
<?php include_once 'inc/footer.php'; ?>
<?php include_once 'inc/end.php'; ?>

