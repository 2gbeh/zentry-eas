<aside>
  <section class="account">
    <table border="0">
      <tr valign="bottom">
        <td rowspan="2">
          <div class="thumb">&nbsp;</div>
        </td>
        <td>
          <div class="name">Welcome, <b><?php echo $_USER['username']; ?></b></div>
        </td>
      </tr>
      <tr>
        <td>
          <a href="#" title="Edit"><i class="fas fa-caret-down"></i></a>        
          <var class="bulb" id="bulb">&nbsp;</var>
          <span class="username"><?php echo $_USER['email']; ?></span>
        </td>
      </tr>
    </table>
    <?php 
			if (Anum::elapsed()) 
				goto_page('anum.php?err=Software license expired. Activation required.');
			else
				echo Anum::meter(); 				
		?>
  </section>
  
  <section class="menu">
    <div class="divide">Menu</div>
    <ul>
<!--    
      <li>
        <a href="dashboard.php">
          <i class="fa fa-home"></i>
          <span class="label">Dashboard</span>
        </a>
      </li>
-->
    	<?php 
				$aside_buf = '';
				foreach ($list_aside_top as $assoc)
				{
					$var = is_numeric($assoc[3]) && $assoc[3]> 0? '<var>'.number_format($assoc[3]).'</var>': '';
					$aside_buf .= '<li>
						<a href="'.$assoc[0].'">
							<table border="0">
								<tr valign="top">
									<td width="1"><i class="'.$assoc[1].'"></i></td>
									<td><span class="label">'.$assoc[2].'</span></td>
									<td width="1" align="right">'.$var.'</td>    
								</tr>
							</table>
						</a>
					</li>';
				}			
				echo $aside_buf; 
			?>
		</ul>    
    
    <div class="divide">Settings</div>
    <ul>
    	<?php 
				$aside_buf = '';
				foreach ($list_aside_end as $assoc)
				{
					$var = is_numeric($assoc[3])? '<var>'.$assoc[3].'</var>': $assoc[3];
					$new = substr($assoc[0],0,4) == 'http'? 'target="_blank"': '';
					$aside_buf .= '<li>
						<a href="'.$assoc[0].'" '.$new.'>
							<table border="0">
								<tr valign="top">
									<td width="1"><i class="'.$assoc[1].'"></i></td>
									<td><span class="label">'.$assoc[2].'</span></td>
									<td width="1" align="right">'.$var.'</td>    
								</tr>
							</table>
						</a>
					</li>';
				}			
				echo $aside_buf; 
			?>
      <li>
        <a onClick="onLogout()">
          <table border="0">
            <tr valign="top">
              <td width="1"><i class="fa fa-sign-out-alt"></i></td>
              <td><span class="label">Sign out</span></td>
              <td width="1" align="right"></td>    
            </tr>
          </table>
        </a>
      </li>      
    </ul>
  </section>
</aside>