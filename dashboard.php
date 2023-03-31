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
            <?php echo Charts::macro('Book::Maximum Cost', $macro_numb_max, $macro_rate_max); ?>
            <p></p>
            <?php echo Charts::macro('Book::Minimum Cost', $macro_numb_min, $macro_rate_min); ?>
          </td>   
          <td colspan="1">
            <?php echo Charts::ring('Book::Average Cost', $ring_numb_avg, $ring_rate_avg); ?>
          </td>        
          <td colspan="1">
            <?php echo Charts::ring('Book::Class Stats', 'Primary (1-6)', $ring_rate_pri); ?>
          </td>
          <td colspan="1">
            <?php echo Charts::ring('Book::Class Stats', 'Nursery (1-3)', $ring_rate_nur); ?>
          </td>                    
				</tr>
        <tr>         
          <td colspan="4">
			      <?php echo Charts::column('Zone::Sales Income Generated ('.$sess_yr.')', $col_labels, $col_values, true); ?>
          </td>          
				</tr>      
      </table>      
    </main>    
</td></tr></table> <!-- end of frame -->
<?php include_once 'inc/footer.php'; ?>
<?php include_once 'inc/end.php'; ?>