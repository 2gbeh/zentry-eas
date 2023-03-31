<nav>
  <ul>
    <li>
    	<a href="?">
	      <i class="fa fa-refresh"></i> 
      	Refresh
      </a>
    </li>   
		<?php
			$nav_buf = '';
      foreach ($list_nav[$list_nav_key] as $assoc)
      {
				if (count($assoc) > 0)
				{
					$nav_buf .= '<li>|</li>
					<li>
						<a href="'.$assoc[0].'">
							<i class="'.$assoc[1].'"></i> 
							'.$assoc[2].'
						</a>
					</li>';
				}
      }
			echo $nav_buf;
    ?>
  </ul>
  <span>
    <i class="fa fa-folder-open"></i> &nbsp;
    <b><?php echo $list_nav_key; ?></b>
  </span>
</nav>