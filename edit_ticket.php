<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Help Desk'; include_once 'inc/nav.php'; ?>
    
    <form class="tmp-form" <?php echo FORM_ATTRIB; ?>>
      <fieldset>    
        <table class="tmp-grid" border="0">
        	<tr> 
          	<td colspan="4">
              <label>
              	<var id="char_count_var">0/750</var>
              	Technical Report:
              </label>
              <textarea name="message" placeholder="Type a message.." rows="10" maxlength="750" 
	              onKeyUp="charCount(this, 'char_count_var')" required><?php echo $_POST['message']; ?></textarea>
		          
              <input type="hidden" name="user_id" value="<?php echo $_USER['ID']; ?>" readonly />
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