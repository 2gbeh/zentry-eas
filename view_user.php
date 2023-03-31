<?php include_once 'inc/top.php'; ?>  
<table border="0"><tr valign="top"><td width="310"> <!-- start of frame -->
		<?php include_once 'inc/aside.php'; ?>  
  </td><td>
  <main class="tmp-base">     
		<?php $list_nav_key = 'Distributor Profile'; include_once 'inc/nav.php'; ?>
    
    <section class="tmp-profile">
      <ul>
        <li>
        	<img src="<?php echo $dir . $row['passport']; ?>" alt="" />
          <div class="action">
            <button class="btn btn-sec" onClick="onDelete(<?php echo $row['ID']; ?>)" title="Delete">
            	<i class="fa fa-trash"></i>
            </button> &nbsp;
            <button class="btn btn-pri" onClick="onEdit(<?php echo $row['ID']; ?>)" title="Edit">
            	<i class="fa fa-pencil-alt"></i>
            </button>        
          </div>          
        </li>
        <li>
          <table border="0">
            <tr>
              <td><i class="fa fa-user-alt"></i></td>
              <td>
                <?php echo $row['title'].' '.ucwords($row['surname']); ?>
                <label>Surname</label>
              </td>
            </tr>
            <tr>
              <td><i class="fas fa-address-book"></i></td>
              <td>
                <?php echo ucwords($row['names']); ?>
                <label>Other Names</label>
              </td>
            </tr>         
            <tr>
              <td><i class="fa fa-transgender-alt"></i></td>
              <td>
                <?php echo enum_f(Lists::GENDER, $row['gender']); ?>
                <label>Gender</label>
              </td>
            </tr>
            <tr>
              <td><i class="fas fa-paper-plane"></i></td>
              <td>
                <?php echo null_f($row['email']); ?>
                <label>Email Address</label>
              </td>
            </tr>
            <tr>
              <td><i class="fas fa-phone fa-flip-horizontal"></i></td>
              <td>
                <?php echo $row['phone']; ?>
                <label>Phone Number</label>
              </td>
            </tr>
          </table>        
        </li>
        <li>
          <table border="0">
            <tr>
              <td><i class="fa fa-home"></i></td>
              <td>
                <?php echo $row['address']; ?>
                <label>Home Address</label>
              </td>
            </tr>
            <tr>
              <td><i class="fas fa-city"></i></td>
              <td>
                <?php echo enum_f(Lists::STATE, $row['state']); ?> State
                <label>State of Residence</label>
              </td>
            </tr>
            <tr>
              <td><i class="fas fa-map-marker-alt"></i></td>
              <td>
                <?php echo Util::zone_f($db_con, $row['zone_id']); ?>
                <label>RETINKEN Zone</label>
              </td>
            </tr>          
            <tr>
              <td><i class="fa fa-calendar-day"></i></td>
              <td>
                <?php echo date_f($row['reg_date']); ?>
                <label>Date Registered</label>
              </td>
            </tr>
            <tr>
              <td><i class="fa fa-calendar-alt"></i></td>
              <td>
                <?php echo $row['DATE']; ?>
                <label>Date Captured</label>
              </td>
            </tr>            
          </table>        
        </li>                
      </ul>
    </section>
  </main>    
</td></tr></table> <!-- end of frame -->
<?php include_once 'inc/footer.php'; ?>
<?php include_once 'inc/end.php'; ?>


