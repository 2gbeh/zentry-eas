<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Statement of Account'; include_once 'inc/nav.php'; ?>
    
    <form class="tmp-form" <?php echo FORM_ATTRIB; ?>>
      <fieldset>    
        <table class="tmp-grid" border="0">
        	<tr>
          	<td colspan="1">
              <label><x>*</x> Card No.:</label>
              <input type="search" name="card_no" value="<?php echo $_POST['card_no']; ?>" placeholder="Ex. 11252" maxlength="6" list="hint_card" required />
 	            <?php echo $hint_card; ?>
            </td>
          	<td colspan="1">
              <label><x>*</x> School-Session Batch No.: <a title="Ex. SCH-1/2020/2021">(Eg.)</a></label>
              <input type="search" name="batch_no" value="<?php echo $_POST['batch_no']; ?>" placeholder="Ex. SCH-1/2020/2021" maxlength="25" list="hint_batch" required />
 	            <?php echo $hint_batch; ?>
            </td> 
          	<td colspan="2">
              <label><x>*</x> Select Name of School:</label>
              <select name="school_id" required>
                <option></option>
                <?php echo $ddl_school; ?>
              </select>
            </td>              
          </tr>
          <tr>
          	<td colspan="1">
              <label>Balance Carried Forward (B/F):</label>
              <input type="number" name="bf" value="<?php echo alt_f($_POST['bf']); ?>" />            
            </td>
          	<td colspan="1">
              <label><x>*</x> Transaction Date:</label>
              <input type="text" name="reg_date" value="<?php echo $_POST['reg_date']; ?>" placeholder="Ex. <?php echo date('d/m/Y'); ?>" required />
            </td>          
          	<td colspan="1">
              <label><x>*</x> Statement Type:</label>
              <select name="stmt_type" required>
                <option></option>
                <?php echo $ddl_stmt; ?>
              </select>
            </td>
          	<td colspan="1">
              <label><x>*</x> Statement No.:</label>
              <input type="search" name="stmt_no" value="<?php echo $_POST['stmt_no']; ?>" placeholder="Ex. 31951" maxlength="6" list="hint_stmt" required />
              <?php echo $hint_stmt; ?>
            </td>             
          </tr> 
          <tr>
          	<td>&nbsp;</td>          
          	<td colspan="1">
              <label>Debit Amount:</label>
              <input type="number" name="debit" value="<?php echo  alt_f($_POST['debit']); ?>" />
            </td>
          	<td colspan="1">
              <label>Credit Amount:</label>
              <input type="number" name="credit" value="<?php echo  alt_f($_POST['credit']); ?>" />
            </td>            
          	<td colspan="1">
              <label><x>*</x> Balance:</label>
              <input type="number" name="bal" value="<?php echo $_POST['bal']; ?>" required />
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

