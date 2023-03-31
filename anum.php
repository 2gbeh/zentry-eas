<?php include_once 'inc/top.php'; ?>  
  <main class="tmp-landing">
    <form class="tmp-form tmp-form-login" <?php echo FORM_ATTRIB; ?>>
      <fieldset>      
				<legend><?php echo $page_ctx_title; ?></legend>
        
        <?php echo Anum::scanner(); ?>  
        
      </fieldset>
    </form>

<?php include_once 'inc/base.php'; ?>