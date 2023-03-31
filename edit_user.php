<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Manage Distributors'; include_once 'inc/nav.php'; ?>
    
    <form class="tmp-form" <?php echo FORM_ATTRIB; ?>>
      <fieldset>    
        <table class="tmp-grid" border="0">
        	<tr>
          	<td colspan="1">
              <label>Upload Passport:</label>
					    <input type="file" name="passport" accept="image/*" />
            </td>
          	<td colspan="1">
              <label>Registration Date:</label>
					    <input type="text" name="reg_date" value="<?php echo alt_f($_POST['reg_date'],date('d/m/Y')); ?>" />
            </td>
            <td colspan="2">&nbsp;</td>
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
              <label><x>*</x> Full Name:</label>
              <input type="text" name="username" value="<?php echo $_POST['username']; ?>" placeholder="(surname first)" required />
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
              <label>Email Address:</label>
              <input type="email" name="email" value="<?php echo $_POST['email']; ?>" placeholder="Ex. example@domain.com" />
            </td>
          	<td colspan="1">
              <label><x>*</x> Phone Number:</label>
              <input type="tel" name="phone" value="<?php echo $_POST['phone']; ?>" placeholder="Ex. +234(0)" maxlength="25" required />
            </td>
          </tr> 
        	<tr>
          	<td colspan="2">
              <label><x>*</x> Home Address:</label>
              <input type="search" name="address" value="<?php echo $_POST['address']; ?>" required />
            </td>
          	<td colspan="1">
              <label><x>*</x> State of Residence:</label>
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

