<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Manage Schools'; include_once 'inc/nav.php'; ?>
    
    <form class="tmp-form" <?php echo FORM_ATTRIB; ?>>
      <fieldset>    
        <table class="tmp-grid" border="0">
        	<tr>
          	<td colspan="4">
              <label><x>*</x> School Name:</label>
              <input type="search" name="school" value="<?php echo $_POST['school']; ?>" placeholder="Ex. Dominion Group of Schools" list="hint_school" required />
 	            <?php echo $hint_school; ?>              
            </td>
          </tr>
        	<tr>
          	<td colspan="1">
              <label><x>*</x> Title:</label>
              <select name="title" required>
                <option></option>
                <?php echo $ddl_title; ?>
              </select>
            </td>            
          	<td colspan="3">
              <label><x>*</x> Principal Name:</label>
              <input type="search" name="principal" value="<?php echo $_POST['principal']; ?>" placeholder="(surname first)" list="hint_principal" required />
 	            <?php echo $hint_principal; ?>
            </td>
          </tr>
        	<tr> 
          	<td colspan="1">
              <label><x>*</x> Select Gender:</label>
              <select name="gender" required>
                <option></option>
                <?php echo $ddl_gender; ?>
              </select>
            </td>          
          	<td colspan="2">
              <label>School Email Address:</label>
              <input type="email" name="email" value="<?php echo $_POST['email']; ?>" placeholder="Ex. example@domain.com" />
            </td>
          	<td colspan="2">
              <label><x>*</x> School Phone Number:</label>
              <input type="tel" name="phone" value="<?php echo $_POST['phone']; ?>" placeholder="Ex. +234(0)" maxlength="25" required />
            </td>            
          </tr> 
        	<tr>
          	<td colspan="2">
              <label><x>*</x> School Address:</label>
              <input type="search" name="address" value="<?php echo $_POST['address']; ?>" required />
            </td>
          	<td colspan="1">
              <label><x>*</x> School Location:</label>
              <select name="state" required>
                <option></option>
                <?php echo $ddl_state; ?>
              </select>
            </td>         
          	<td colspan="1">
              <label><x>*</x> RETINKEN Zone:</label>
              <select name="zone_id" required>
                <option></option>
                <?php echo $ddl_zone; ?>
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


