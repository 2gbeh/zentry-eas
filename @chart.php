<?php include_once 'inc/top.php'; ?>
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td>
  <td>  
    <main class="tmp-base"> 
			<?php $list_nav_key = 'Dashboard'; include_once 'inc/nav.php'; ?>
     
      <table class="chart_grid" border="0">
        <tr>
          <td colspan="1">
            <?php echo Charts::macro('Example','N250,000',65); ?>
          </td>
          <td colspan="1">
            <?php echo Charts::macro_demo(2); ?>
          </td>
          <td colspan="1">
            <?php echo Charts::macro_demo(3); ?>
          </td>
          <td colspan="1">
            <?php echo Charts::macro_demo(4); ?>
          </td>
				</tr>
        <tr>
          <td colspan="1">
			      <?php echo Charts::ring_demo(3); ?>
          </td>          
          <td colspan="1">
			      <?php echo Charts::ring_demo(2); ?>
          </td>
          <td colspan="1">
			      <?php echo Charts::postit_demo(); ?>
          </td>        
          <td colspan="1">
			      <?php echo Charts::progress_demo(true); ?>
          </td>  
				</tr>
        <tr>          
          <td colspan="2">
			      <?php echo Charts::bar_demo(); ?>
          </td>
          <td colspan="2">
			      <?php echo Charts::column_demo(); ?>
          </td>          
				</tr>      
        <tr>
          <td colspan="2">
			      <?php echo Charts::splot_demo(); ?>
          </td>
          <td colspan="2">
			      <?php echo Charts::cstick_demo(); ?>
          </td>
				</tr>
      </table>
    </main>    
</td></tr></table> <!-- end of frame -->
<?php include_once 'inc/footer.php'; ?>
<?php include_once 'inc/end.php'; ?>