<!DOCTYPE html>
  <html lang="en">
  <?php
  session_start();
  include('connect.php');

  // $user_id = $_SESSION['id'];
  $user_id = '11111';
   $count_sql="SELECT * from notif where message_status='Delivered' AND user_id='$user_id' ";

          $result = mysqli_query($db, $count_sql);

          $count = 0;

          while ($row = mysqli_fetch_assoc($result)) {                             

            $count++;

                              }


function timeago($datetime, $full = false) {
  date_default_timezone_set('Asia/Manila');
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);
  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;
  $string = array(
    'y' => 'yr',
    'm' => 'mon',
    'w' => 'week',
    'd' => 'day',
    'h' => 'hr',
    'i' => 'min',
    's' => 'sec',
  );
  foreach ($string as $k => &$v) {
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    } 
    else {
      unset($string[$k]);
    }
  }
  if (!$full) {
    $string = array_slice($string, 0, 1);
  }
  
  return $string ? implode(', ', $string) . '' : 'just now';
}


    if (isset($_POST['savechanges'])) {

      $datefrom= $_POST['datefrom'];
      $dateto= $_POST['dateto'];
      $item_no = $_POST['item_no'];
      $quantity = $_POST['quantity'];

      $res=mysqli_query($db,"SELECT * from item_list where item_code='$item_no'");
      while($row = mysqli_fetch_assoc($res)){
       $unit = $row['unit'];
       $item_code = $row['item_code'];
       $item_name = $row['item_name'];
      }

      $result=mysqli_query($db,"INSERT into item_inventory (id, item_code, unit, item_name, datefrom, dateto, received_qty, issuance_mabini, issuance_apokon, balance) values (id, '$item_code', '$unit', '$item_name', '$datefrom', '$dateto', '$quantity', '0', '0', '$quantity')");

                              if($result){
                               echo '<script>
                                    alert("Succesful");
                                  </script>';
                              }else{
                               echo '<script>
                                      alert("Failed");
                                    </script>';
                              }
      echo "<meta http-equiv='refresh' content='1'>";
                        
    }

    if (isset($_POST['update'])) {

      $dfrom= $_POST['dfrom'];
      $dto= $_POST['dto'];
      $itm_cd = $_POST['itm_cd'];
      $rec_qty = $_POST['rec_qty'];
      $new_id = $_POST['id'];

      $res=mysqli_query($db,"SELECT * from item_list where item_code='$itm_cd'");
      while($row = mysqli_fetch_assoc($res)){
       $new_unit = $row['unit'];
       $itm_cd2 = $row['item_code'];
       $itm_nm2 = $row['item_name'];
      }

      $result=mysqli_query($db,"UPDATE item_inventory set datefrom='$dfrom', dateto='$dto', unit='$new_unit', item_code='$itm_cd2', item_name='$itm_nm2', received_qty='$rec_qty', balance='$rec_qty' where id='$new_id'");

                              if($result){
                               echo '<script>
                                    alert("Succesful");
                                  </script>';
                              }else{
                               echo '<script>
                                      alert("Failed");
                                    </script>';
                              }
      echo "<meta http-equiv='refresh' content='1'>";
                        
    }
    
    if (isset($_POST['distribute'])) {

      $item_id= $_POST['id'];
      $campus= $_POST['campus'];
      (int)$distribute = $_POST['num'];
      (int)$bal = $_POST['bal'];
      $diff = $bal-$distribute; 

     if($diff<'0'){
        echo '<script>
              alert("Error! The quantity to be distributed must not exceed the current balance");
              </script>';
     } else{
      if ($campus=='Apokon') {
        $result2=mysqli_query($db,"UPDATE item_inventory set issuance_apokon=issuance_apokon+'$distribute', balance='$diff' where id='$item_id'");

                              if($result2){
                               echo '<script>
                                    alert("Succesful");
                                  </script>';
                              }else{
                               echo '<script>
                                      alert("Failed");
                                    </script>';
                              }
      } if ($campus=='Mabini') {
        $result2=mysqli_query($db,"UPDATE item_inventory set issuance_mabini=issuance_mabini+'$distribute', balance='$diff' where id='$item_id'");

                              if($result2){
                               echo '<script>
                                    alert("Succesful");
                                  </script>';
                              }else{
                               echo '<script>
                                      alert("Failed");
                                    </script>';
                              }
      }

      
      echo "<meta http-equiv='refresh' content='1'>";
                        
    }
  }

  ?>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content=""> 
      <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
      <!-- Twitter meta-->
      <meta property="twitter:card" content="summary_large_image">
      <meta property="twitter:site" content="@pratikborsadiya">
      <meta property="twitter:creator" content="@pratikborsadiya">
      <!-- Open Graph Meta-->
      <meta property="og:type" content="website">
      <meta property="og:site_name" content="Vali Admin">
      <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
      <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
      <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
      <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
      <title>Supplies and Equipment</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" type="text/css" href="css/clinic_style.css">
      <link rel="stylesheet" type="text/css" href="css/upstyle.css">

      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
  <!--Jquery -->
   <!--    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />




      </head>
        <body class="app sidebar-mini rtl">
        <!-- Navbar-->

        
     <header class="app-header">
    
   
      </header>

      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
      <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="image/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">USEP CLINIC</p>
          </div>
        </div>

        <hr>

       <ul class="app-menu font-sec">
       
          <li><a class="app-menu__item" href="Admin-Dashboard.php"><i class="app-menu__icon fa fa-chart-bar"></i><span class="app-menu__label">Dashboard</span></a></li>
           <li><a class="app-menu__item" href="Admin-PatientList.php"><i class="app-menu__icon fas fa-user-alt"></i><span class="app-menu__label">Patient</span></a></li>


          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Consultation</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-NewConsultation.php">New Consultation</a></li>
              <li><a class="treeview-item" href="Admin-ListOfConsultation.php">List of Consultation</a></li>
            </ul>
          </li>

 
          <li><a class="app-menu__item" href="Admin-Appointment.php"><i class="app-menu__icon fa fa-calendar-alt"></i><span class="app-menu__label">Appointment</span></a></li>
          <li><a class="app-menu__item" href="Admin-Prescription.php"><i class="app-menu__icon fas fa-prescription"></i><span class="app-menu__label">Prescription</span></a></li>

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-file-medical"></i><span class="app-menu__label">Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Request.php">Medical Certificate</a></li>
              <li><a class="treeview-item" href="Admin-MedicalRecordCert.php">Medical Records Certification</a></li>
              <li><a class="treeview-item" href="Admin-RequestHistory.php">Request History</a></li>
            </ul>
          </li>


          <li class="p-2 sidebar-label"><span class="app-menu__label">INVENTORY</span></li>

           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-tools"></i><span class="app-menu__label">Equipment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Supplies&Equipment.php">Supply & Equipment List</a></li>
              <li><a class="treeview-item" href="Admin-Stock-Supplies&Equipment.php">Inventory</a></li>
            </ul>
          </li>

          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-clipboard-list"></i><span class="app-menu__label">Item</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ItemUnit.php">Item Unit</a></li>
              <li><a class="treeview-item" href="Admin-ItemList.php">Item List</a></li>
              <li><a class="treeview-item active" href="Admin-ItemInventory.php">Item Inventory</a></li>
              <li><a class="treeview-item" href="Admin-ItemStock.php">Overall Stock</a></li>
            </ul>
          </li>

          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Admin-MedicalPersonnel.php"><i class="app-menu__icon  fas fa-user-nurse"></i><span class="app-menu__label">Medical Personnel</span></a></li>
          <li><a class="app-menu__item" href="Clinic_Admin_Announcements.php"><i class="app-menu__icon fas fa-bullhorn"></i><span class="app-menu__label">Announcement</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-notes-medical"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ConsultationReports.php">Consultation Reports</a></li>
              <li><a class="treeview-item" href="Admin-RequestReports.php">Request Reports</a></li>
              <li><a class="treeview-item" href="Admin-ServicesSummaryReports.php">Medical Services Summary Reports</a></li>
              <li><a class="treeview-item" href="Admin-DentalSummaryReports.php">Dental Services Summary Reports</a></li>
            </ul>
          </li>
        
          
        </ul>
      </aside>


       <!--navbar-->

          <main class="app-content">
            
        <div class="app-title">
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Hi, Jet</a>
              </li>
             <!-- <li class="app-search">
                   <input class="app-search__input" type="search" placeholder="Search">
                  <button class="app-search__button"><i class="fa fa-search"></i></button>
              </li>-->  
  <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $count;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $count;  ?> new notifications.</li>
              <div class="app-notification__content">

                <?php 
                $count_sql="SELECT * from notif where message_status='Delivered'AND user_id='$user_id'  order by time desc";

                $result = mysqli_query($db, $count_sql);

                while ($row = mysqli_fetch_assoc($result)) { 
                  $intval = intval(trim($row['time']));
                  if ($row['message_status']=='Delivered' && $row['user_id']=='$user_id') {

                    
                    echo'
                  <b><li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">'.$row['message_body'].'</p>
                      <p class="app-notification__meta">'.timeago($row['time']).'</p>
                      <p class="app-notification__message"><form method="POST" action="notif_stat.php">
                      <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                      <input type="submit" name="open_notif" value="Open Message">
                      </form></p>
                    </div></a></li></b>
                    ';
                  }else{
                    echo'
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">'.$row['message_body'].'</p>
                      <p class="app-notification__meta">'.timeago($row['time']).'</p>
                      <p class="app-notification__message"><form method="POST" action="notif_stat.php">
                      <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                      <input type="submit" name="open_notif" value="Open Message">
                      </form></p>
                    </div></a></li>
                    ';
                  }
                  

                                    }
                ?>
            </ul>
          </li>
              
                 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
              <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
      
          </ul>
        </div>
        <div class="red"> 
          
        </div>



      <!-- Navbar-->
       

         <!--<div class="page-error tile">-->
          <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <h4 class="mb-3 line-head">Item Inventory</h4>
                  </div>
                  <br>
                  <div class="row">
                 
                 
                    <div class="col-auto">

                    <div class="inline-block">
                    Unit <br>
                    <select class="bootstrap-select" name="filterunit" id="filterunit" style="width: 150px;">
                                        <option class="select-item" value="all" selected="selected">All</option>
                                              <?php
                                           $result=mysqli_query($db, "SELECT * FROM item_unit");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $value= $res['unit_id']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['unit'];?></option>
                                              <?php } ?>
                     </select>  
                    </div>
                    &emsp;
                    <div class="inline-block">
                    Date <br>
                    <input type="date" class="bootstrap-select" name="filterdate" id="filterdate" style="width: 100%;">

                      </div>

           
                      </div>

                      <div class="col">
                        <br>  

                          
                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify" type="submit" id="export-button2" ><i class="fas fa-download"></i> Export</button></div>
                           
                         <!--   <div class="inline-block float ml-2 mt-1"><button class="btn btn-warning btn-sm verify" data-toggle="modal" data-target="#" style="width: 100%;"><i class="fas fa-print" data-toggle="modal" data-target="#"></i> Print </button></div> -->
                           
                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-warning btn-sm verify text-white" style="width: 100%;" id="print_att2"><i class="fas fa-print"></i> Print </button></div>

                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-success btn-sm verify" data-toggle="modal" data-target="#AddNewStock" style="width: 100%;"><i class="fas fa-plus" data-toggle="modal" data-target="#AddNewStock"></i> New Stock </button></div>

                      </div>

                  </div>
                </div>
              <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div class="calldiv" id="calldiv" style="display: compact">
                   <table class="head">
                     <thead>
                      <tr>
                      <th><img src="image/logo.png" width="100"></th>
                      <th width="100"></th>
                      <th><center><p>Republic of the Philippines</p>
                      <p> UNIVERSITY OF SOUTHEASTERN PHILIPPINES</p>
                      <p> Tagum-Mabini Campus</p>
                      <p> Apokon, Tagum City</p>
                      <br>
                      <p style="font-size: 20px"> Item Inventory </p></center></th>
                      <th width="100"></th>
                      <th width="100"></th>
                      </tr>                       
                     </thead>
                   </table>
                   <table class="table table-hover table-bordered reports-list" id="table2excel2">
                    <thead>
                      <tr>
                      
                      <th>Time Period</th>
                      <th>Item Code</th>
                      <th>Unit</th>
                      <th>Item Name</th>
                      <th width="30px">Received for the Period</th>
                      <th>Issuance (Mabini Clinic)</th>
                      <th>Issuance (Apokon)</th>
                      <th>Balance</th>
                      <th class="max action-column" width="100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 
          
                $sql = "SELECT item_inventory.*, item_unit.unit as unit_name from item_inventory join item_unit on item_unit.unit_id=item_inventory.unit where item_inventory.balance!='0'";

                if($result1 = mysqli_query($db, $sql)){
                 while ($row = mysqli_fetch_assoc($result1)) {
                            $stock_id = $row['id'];
                            $date_from =date_create($row['datefrom']);
                            $date_to =date_create($row['dateto']);
                            $date1 = date_format($date_from,"F d, Y");
                            $date2 = date_format($date_to,"F d, Y");

                  ?>
                              <tr>
                  
                    <td><?php echo $date1.' - '.$date2 ;?></td>
                    <td><?php echo $row['item_code'];?></td>
                    <td><?php echo $row['unit_name'];?></td>
                    <td><?php echo $row['item_name'];?></td>
                    <td><?php echo $row['received_qty'];?></td>
                    <td><?php echo $row['issuance_mabini'];?></td>
                    <td><?php echo $row['issuance_apokon'];?></td>
                    <td><?php echo $row['balance'];?></td>
                    <td class="action-column">

                        <a class="btn btn-warning btn-sm" data-toggle="modal" href="#UpdateStock<?php echo $stock_id; ?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" href="#DistributeItem<?php echo $stock_id; ?>">Release</a>
                        <?php include ('fetch_inventory.php') ?>
                        


                    </td>
                              </tr>
                             
                      <?php }}
                
                  ?>

                  

                   </tbody>
                  </table>
                </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>  

<div class="row">
          <div class="col">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <h4 class="mb-3 line-head">Item Issuance </h4>
                  </div>
                  <br>
                  <div class="row">

                     
                 
                    <div class="col-auto">

                    <div class="inline-block">
                    Unit <br>
                    <select class="bootstrap-select" name="filterunit2" id="filterunit2" style="width: 150px;">
                                        <option class="select-item" value="all" selected="selected">All</option>
                                              <?php
                                           $result2=mysqli_query($db, "SELECT * FROM item_unit");               
                                          while($res2 = mysqli_fetch_array($result2)) {         
                                              $value2= $res2['unit_id']; ?>
                                              <option class="select-item" value="<?php echo $value2; ?>"><?php echo $res2['unit'];?></option>
                                              <?php } ?>
                     </select>  
                    </div>

                    &emsp;
                    <div class="inline-block">
                    Date <br>
                    <input type="date" class="bootstrap-select" name="filterdate2" id="filterdate2" style="width: 100%;">

                      </div>

           
                      </div>

                       <div class="col">
                        <br>  

                        
                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify" name="create_pdf2" type="submit" id="export-button"><i class="fas fa-download"></i> Export</button></div>
                           
                           
                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-warning btn-sm verify text-white" style="width: 100%;" id="print_att"><i class="fas fa-print"></i> Print </button></div>

                      </div>
      

                  </div>
                </div>
                <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div class="calldiv2" id="calldiv2" style="display: compact">
                   <table class="head">
                     <thead>
                      <tr>
                      <th><img src="image/logo.png" width="100"></th>
                      <th width="100"></th>
                      <th><center><p>Republic of the Philippines</p>
                      <p> UNIVERSITY OF SOUTHEASTERN PHILIPPINES</p>
                      <p> Tagum-Mabini Campus</p>
                      <p> Apokon, Tagum City</p>
                      <br>
                      <p style="font-size: 20px"> Item Issuance </p></center></th>
                      <th width="100"></th>
                      <th width="100"></th>
                      </tr>                       
                     </thead>
                   </table>
                   <table class="table table-hover table-bordered reports-list" id="table2excel">
                    <thead>
                      <tr>
                
                      <th>Time Period</th>
                      <th>Item Code</th>
                      <th>Unit</th>
                      <th>Item Name</th>
                      <th>Quantity Received</th>
                      <th>Issuance (Mabini Clinic)</th>
                      <th>Issuance (Apokon)</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 
          
                $sql = "SELECT item_inventory.*, item_unit.unit as unit_name from item_inventory join item_unit on item_unit.unit_id=item_inventory.unit where item_inventory.balance='0'";
                $res = $db->query($sql);
                $cnt=1;

                if ($res->num_rows > 0) {
                while($row = $res->fetch_assoc()) {
                            $date_from =date_create($row['datefrom']);
                            $date_to =date_create($row['dateto']);
                            $date1 = date_format($date_from,"F d, Y");
                            $date2 = date_format($date_to,"F d, Y");
                  ?>
                              <tr>
                    <td><?php echo $date1.' - '.$date2;?></td>
                    <td><?php echo htmlentities($row['item_code']);?></td>
                    <td><?php echo htmlentities($row['unit_name']);?></td>
                    <td><?php echo htmlentities($row['item_name']);?></td>
                    <td><?php echo htmlentities($row['received_qty']);?></td>
                    <td><?php echo htmlentities($row['issuance_mabini']);?></td>
                    <td><?php echo htmlentities($row['issuance_apokon']);?></td>
                    
                              </tr>
                             
                      <?php }}
                
                  ?>

                  

                   </tbody>
                  </table>
                </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>


    
       <div class="modal fade " id="AddNewStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Stock</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <form method="POST">
                      <div class="modal-body c">
                        <div class="container"> 

                        <h5><center>NEW STOCK FOR THE TIME PERIOD</center></h5>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                    <label for="exampleSelect1">Start Date</label>
                                    <input type="date" id="datefrom" name="datefrom" placeholder="From" class="bootstrap-select " style="width: 100%;">
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">End Date</label>
                                    <input type="date" id="dateto" name="dateto" placeholder="To" class="bootstrap-select " style="width: 100%;">
                                  </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label for="exampleSelect1">Item</label><br>
                                    <select class="bootstrap-select" name="item_no" id="item_no" style="width: 100%">
                                        
                                              <?php
                                           $result=mysqli_query($db, "SELECT * FROM item_list");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $value= $res['item_code']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['item_name'];?></option>
                                              <?php } ?>
                                    </select>
                                </div>
                            </div>
                          </div>

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label"> Quantity </label>
                                  <input class="form-control" name="quantity" id="quantity" type="number" placeholder="Enter qty">
                                </div>
                            </div>
                         
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="savechanges" class="btn btn-success">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>







<!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
   <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
    
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#sampleTable').DataTable();</script>
      <script type="text/javascript">$('#sampleTable2').DataTable();</script>
    <script type="text/javascript" src="../js/plugins/jquery.table2excel.js"></script>
      <!-- Google analytics script-->
      <script type="text/javascript">
        if(document.location.hostname == 'pratikborsadiya.in') {
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-72504830-1', 'auto');
          ga('send', 'pageview');
        }
      </script>
      <script type="text/javascript">
        $('#demoNotify').click(function(){
          $.notify({
            title: "Update Complete : ",
            message: "Verified Successfuly!",
            icon: 'fa fa-check' 
          },{
            type: "info"
          });
        });
      </script>
      <script>
        <!-- table selection -->
          $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});
      </script>
      <!-- Data table plugin-->

 <script>
    $('#print_att').click(function(){
    var _c = $('#calldiv2').html();
    var ns = $('noscript').clone();
    var nw = window.open('','_blank','width=900,height=600')
    nw.document.write(_c)
    nw.document.write(ns.html())
    nw.document.close()
    nw.print()
    setTimeout(() => {
      nw.close()
    }, 500);
    
  });
    $('#print_att2').click(function(){
    var _c = $('#calldiv').html();
    var ns = $('noscript').clone();
    var nw = window.open('','_blank','width=900,height=600')
    nw.document.write(_c)
    nw.document.write(ns.html())
    nw.document.close()
    nw.print()
    setTimeout(() => {
      nw.close()
    }, 500);
    
  })
</script>
<style>

@media screen{
.head{
display:none;}
.heads{
display:none;}
  
.tit{
display:none;}
h2{
display:none;}
tfoot{
display:none;}
}
@media print{
.head{
margin-top:-100%;
display:table-header-group;
margin-bottom:5px;}


}
 
}

@page{
margin-top:-1cm; 
margin-left:1cm;
margin-right:1cm;
margin-bottom:1.5cm;
}
}

.dropdown-menu {
    max-height: 280px;
    overflow-y: auto;
}
</style>
<noscript>
    <table style="margin-top:8%;">
<tr>
<td><b> &emsp;Prepared By: </b></td>
</tr>
</table>
<table align="center" style="margin-top:3%;">
<td align="center" style="margin-top:10%;"><p>Admin</p></td>
<tr>
<td align="center" style="margin-top:10%;"><i>Officer In-charge</i></td>
</tr>
</table>
      <style>
    .heads{
    margin-top:5%;
    margin-left:6%;
    font-size:20px;
    font-weight:bold; 
    }
  table.reports-list{
      width:100%;
      border-collapse:collapse;
      margin-top:1%;
    }
    table.reports-list td,table.reports-list th{
      border:1px solid;
    
    }
    table.reports-list th{
    padding:0.2%;
    }
    .text-center{
      text-align:center
    }
    td{
    text-align:center;
    }
    h3{
    display:none;
    } 
  .dataTables_info{
    display:none;
    }
    .dataTables_filter{
    display:none;
    }
    .dataTables_paginate{
    display:none;
    }
    .dataTables_length{
    display:none;
    }
    .action-column{
      display: none;
    }
    </style>

</noscript>




      <script type="text/javascript">

        
$("#export-button").click(function(){
  $("#table2excel").table2excel({
    // exclude CSS class
    exclude:".noExl",
    name:"Worksheet Name",
    filename:"Item-Issuance",//do not include extension
    fileext:".xls" // file extension
  });

});
        
$("#export-button2").click(function(){
  $("#table2excel2").table2excel({
    // exclude CSS class
    exclude:".noExl",
    name:"Worksheet Name",
    filename:"Item-Inventory",//do not include extension
    fileext:".xls" // file extension
  });

});


      $(document).ready(function(){
                  /*STATUS*/
                  $("#filterunit").on('change', function(){
                    var filterunit = $("#filterunit").val();
                    var filterdate = $("#filterdate").val();

                    $.ajax({
                          url:"filterInventory.php",
                          type:"POST",
                          data:{funit : filterunit, fdate : filterdate},
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
               
                  });

                  $("#filterdate").on('change', function(){
                    var filterunit = $("#filterunit").val();
                    var filterdate = $("#filterdate").val();

                    $.ajax({
                          url:"filterInventory.php",
                          type:"POST",
                          data:{funit : filterunit, fdate : filterdate},
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
               
                  });

                  $("#filterunit2").on('change', function(){
                    var filterunit2 = $("#filterunit2").val();
                    var filterdate2 = $("#filterdate2").val();

                    $.ajax({
                          url:"filterInventory.php",
                          type:"POST",
                          data:{funit2 : filterunit2, fdate2 : filterdate2},
                          beforeSend:function(){
                            $(".calldiv2").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv2").html(data);
                          },
                    });
               
                  });

                  $("#filterdate2").on('change', function(){
                    var filterunit2 = $("#filterunit2").val();
                    var filterdate2 = $("#filterdate2").val();

                    $.ajax({
                          url:"filterInventory.php",
                          type:"POST",
                          data:{funit2 : filterunit2, fdate2 : filterdate2},
                          beforeSend:function(){
                            $(".calldiv2").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv2").html(data);
                          },
                    });
               
                  });

                });

      $( function() {
        $( "#datepicker" ).datepicker();
      } );

    </script>


    </body>
  </html>