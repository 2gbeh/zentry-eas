<?php include_once 'inc/top.php'; ?>  
  <main class="tmp-landing">
    <form class="tmp-form tmp-form-login" <?php echo FORM_ATTRIB; ?>>
      <fieldset>
            
        <label for="username">Username:</label>
        <div class="overlay">
          <input type="search" name="username" id="username" value="<?php echo $_POST['username']; ?>" placeholder="example@domain.com" required />
          <i class="fa fa-user-alt"></i>
        </div>
        
        <label for="password">Password:</label>
        <div class="overlay">      
          <input type="password" name="password" id="password" value="<?php echo $_POST['password']; ?>" placeholder="**** ****" required />
          <i class="fa fa-lock" onClick="togglePassword()" title="Hide/Show"></i>
        </div>
        
        <button type="submit" class="pri">Log in</button>
      </fieldset>
    </form>
    
<?php include_once 'inc/base.php'; ?>      
