<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Manage Books'; include_once 'inc/nav.php'; ?>
    
    <form class="tmp-form" <?php echo FORM_ATTRIB; ?>>
      <fieldset>    
        <table class="tmp-grid" border="0">
        	<tr>
          	<td colspan="2">
              <label>Book Title:</label>
              <input type="search" name="book" value="<?php echo $_POST['book']; ?>" placeholder="Ex. RETINKEN BASIC MATHEMATICS" maxlength="50"  list="hint_book" required />
              <?php echo $hint_book; ?>
            </td>          
          	<td colspan="1">
              <label>Class:</label>
              <select name="class" required>
                <option></option>
                <?php echo $ddl_class; ?>
              </select>
            </td>
          	<td colspan="1">
              <label>Grade:</label>
              <select name="grade" required>
                <option></option>
                <?php echo $ddl_grade; ?>
              </select>
            </td>
          </tr>
        	<tr>
          	<td colspan="1">
              <label>Stock Price:</label>
              <input type="number" name="stock" value="<?php echo $_POST['stock']; ?>" placeholder="Ex. 1,100" required />
            </td>
          	<td colspan="1">
              <label>Discount:</label>
              <input type="number" name="disc" value="<?php echo $_POST['disc']; ?>" placeholder="Ex. 140" required />
            </td>
          	<td colspan="1">
              <label>Supply Price:</label>
              <input type="number" name="supply" value="<?php echo $_POST['supply']; ?>" placeholder="Ex. 960" required />
            </td>
            <td>&nbsp;</td>
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


