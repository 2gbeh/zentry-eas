<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'My Account'; include_once 'inc/nav.php'; ?>
    
    <form class="tmp-form" <?php echo FORM_ATTRIB; ?>>
      <fieldset>            
        <table class="tmp-grid" border="0">
        	<tr> 
          	<td colspan="4">
              <label>Current Password:</label>
              <div class="overlay">      
                <input type="password" name="password" id="password" value="<?php echo $_POST['password']; ?>" placeholder="**** ****" required />
                <i class="fa fa-eye" onClick="togglePassword()" title="Hide/Show"></i>
              </div>
            </td>
          </tr> 
        	<tr> 
          	<td colspan="2">
              <label>New Password:</label>
              <div class="overlay">      
                <input type="password" name="new_psw" value="<?php echo $_POST['new_psw']; ?>" required />
                <i class="fa fa-lock"></i>
              </div>
            </td>
          	<td colspan="2">
              <label>Re-type New Password:</label>
              <div class="overlay">      
                <input type="password" name="cfm_psw" value="<?php echo $_POST['cfm_psw']; ?>" required />
                <i class="fa fa-lock"></i>
              </div>
            </td>            
          </tr>           
         </table>
        <div class="action">
          <button type="reset" class="sec">Clear</button> &nbsp;
          <button type="submit" class="pri">Update</button>
        </div>
      </fieldset>
    </form>
  </main>    
</td></tr></table> <!-- end of frame -->
<?php include_once 'inc/footer.php'; ?>
<?php include_once 'inc/end.php'; ?>


