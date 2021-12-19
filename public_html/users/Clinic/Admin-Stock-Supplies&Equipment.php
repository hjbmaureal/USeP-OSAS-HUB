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
      <link rel="icon" href="../../images/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Clinic Admin Hub</title>
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


      </head>
        
      <body class="app sidebar-mini rtl" onload="initClock()">
      <!-- Navbar-->

   <script type="text/javascript">
        //CLOCK
      function updateClock(){
        var now = new Date();
        var dname = now.getDay(),
            mo = now.getMonth(),
            dnum = now.getDate(),
            yr = now.getFullYear(),
            hou = now.getHours(),
            min = now.getMinutes(),
            sec = now.getSeconds(),
            pe = "AM";
        
            if(hou >= 12){
              pe = "PM";
            }
            if(hou == 0){
              hou = 12;
            }
            if(hou > 12){
              hou = hou - 12;
            }

            Number.prototype.pad = function(digits){
              for(var n = this.toString(); n.length < digits; n = 0 + n);
              return n;
            }

            var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
            var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
            var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
            for(var i = 0; i < ids.length; i++)
            document.getElementById(ids[i]).firstChild.nodeValue = values[i];
      }

  function initClock(){
        updateClock();
        window.setInterval("updateClock()", 1);
      }
      var myInput = document.getElementById("newPass");
      var letter = document.getElementById("letter");
      var capital = document.getElementById("capital");
      var number = document.getElementById("number");
      var length = document.getElementById("length");
      var special = document.getElementById("special");

      var loadFile = function (event,imgname) {
        console.log("userPic");
        var image = document.getElementById(imgname);
        image.src = URL.createObjectURL(event.target.files[0]);
      };
      </script>
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

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Request.php">Medical Certificate</a></li>
              <li><a class="treeview-item" href="Admin-MedicalRecordCert.php">Medical Records Certification</a></li>
              
            </ul>
          </li>

           <li class="p-2 sidebar-label"><span class="app-menu__label">INVENTORY</span></li>

           <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-tools"></i><span class="app-menu__label">Equipment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Supplies&Equipment.php">Equipment List</a></li>
              <li><a class="treeview-item active" href="Admin-Stock-Supplies&Equipment.php">Inventory</a></li>
            </ul>
          </li>

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-clipboard-list"></i><span class="app-menu__label">Item</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ItemUnit.php">Item Unit</a></li>
              <li><a class="treeview-item" href="Admin-ItemList.php">Item List</a></li>
              <li><a class="treeview-item" href="Admin-ItemInventory.php">Item Inventory</a></li>
              <li><a class="treeview-item" href="Admin-ItemStock.php">Overall Stock</a></li>
            </ul>
          </li> 

          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Admin-MedicalPersonnel.php"><i class="app-menu__icon  fas fa-user-nurse"></i><span class="app-menu__label">Medical Personnel</span></a></li>
          <li><a class="app-menu__item" href="Clinic_Admin_Announcements.php"><i class="app-menu__icon fas fa-bullhorn"></i><span class="app-menu__label">Announcement</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ConsultationReports.php">Consultation Reports</a></li>
              <li><a class="treeview-item" href="Admin-RequestReports.php">Request Reports</a></li>
              <li><a class="treeview-item" href="Admin-ServicesSummaryReports.php">Summary Reports</a></li>
            </ul>
          </li>
        
          
        </ul>
      </aside>


       <!--navbar-->

          <main class="app-content">
            
        <div class="app-title">
      <div><!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      </div>
      <ul class="app-nav">
        <li>
          <a class="appnavlevel">Hi, <?php echo $_SESSION['fullname'] ?></a>
        </li>
        <!-- SEMESTER, TIME, USER DROPDOWN -->
          <?php
            if($result = mysqli_query($db, "SELECT * FROM list_of_semester WHERE status = 'Active'")){
              while($row = mysqli_fetch_array($result)){
                $currSemesterYear = $row['semester'] .' '. $row['year'];
                echo '
                  <li>
                    <div class="appnavlevel" style="color:black;">
                      <span class="semesterYear">'.$row['semester'].'</span>
                    </div>
                  </li>
                  <li>
                    <div class="appnavlevel"style="color:black;">
                      <span class="semesterYear">'.$row['year'].'</span>
                    </div>
                  </li>
                ';
              }
            }
          ?>
          <li>
            <div class="datetime appnavlevel" style="color: black;">
              <div class="date">
                <span id="dayname">Day</span>,
                <span id="month">Month</span>
                <span id="daynum">00</span>,
                <span id="year">Year</span>
              </div>
            </div>
          </li>
          <li>
            <div class="datetime appnavlevel" style="color: black;">
              <div class="time">
                <span id="hour">00</span>:
                <span id="minutes">00</span>:
                <span id="seconds">00</span>
                <span id="period">AM</span>
              </div>
            </div>
          </li>
        <li class="dropdown">
          <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
            <b style="color: red;"><?php echo $count;  ?></b>
            <i class=" fas fa-bell fa-lg mt-2"></i>
          </a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have <?php echo $count;  ?> new notifications.</li>              
              <div class="app-notification__content">                   
                <?php 
                  $count_sql="SELECT * from notif where (user_id=$id or office_id = 3)  order by time desc";
                  $result = mysqli_query($db, $count_sql);
                  while ($row = mysqli_fetch_assoc($result)) { 
                    $intval = intval(trim($row['time']));
                      if ($row['message_status']=='Delivered') {
                        echo'
                            <b><li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                              <div>
                                <p class="app-notification__message">'.$row['message_body'].'</p>
                                <p class="app-notification__meta">'.timeago($row['time']).'</p>
                                <p class="app-notification__message">
                                <form method="POST" action="../../php/change_notif_status.php">
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
                                <p class="app-notification__message"><form method="POST" action="../../php/change_notif_status.php">
                                <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                                <input type="submit" name="open_notif" value="Open Message">
                                </form></p>
                              </div></a></li>
                              ';
                       }                 

                  }
                ?> 
              </div>
            <li class="app-notification__footer">
              <a href="Notifications.php">See all notifications.</a>
            </li>
          </ul>
        </li>
        <li class="dropdown">      
                <a class="app-nav__item" style="width: 48px;" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <img class="rounded-circle" src="data:image/png;base64,<?php echo $_SESSION['photo'] ?>" style="max-width:100%;">
                </a>
                
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                  <li><a class="dropdown-item" href="user-profiles.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                 <li><a class="dropdown-item" href="../../index.php" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
      
      </ul>
    </div>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <form action="../../logout.php"><button class="btn btn-primary" name="logout" id="logoutbtn2" type="submit">Logout</button></form>
            </div>
          </div>
        </div>
      </div>
        <div class="red"> 
          
        </div>



      <!-- Navbar-->

      <script>
        (function(document) {
            'use strict';

            var TableFilter = (function(myArray) {
                var search_input;

                function _onInputSearch(e) {
                    search_input = e.target;
                    var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                    myArray.forEach.call(tables, function(table) {
                        myArray.forEach.call(table.tBodies, function(tbody) {
                            myArray.forEach.call(tbody.rows, function(row) {
                                var text_content = row.textContent.toLowerCase();
                                var search_val = search_input.value.toLowerCase();
                                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                            });
                        });
                    });
                }

                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('bootstrap-select');
                        myArray.forEach.call(inputs, function(input) {
                            input.oninput = _onInputSearch;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    TableFilter.init();
                }
            });

        })(document);
    </script> 
       

         <!--<div class="page-error tile">-->
          <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <h4 class="mb-3 line-head">Medical-Dental Equipment Inventory</h4>
                  </div>
                  <br>
                  <div class="row">

                  <div class="col-auto">

                  <div class="inline-block">
                    <b>Type</b>
                    <br>
                    <select  name="type" id="type" class="bootstrap-select" data-table="reports-list" style="height: 35px;width: 160px">
                      <option value="">All</option>
                                                 <?php
                       
                          $sql=mysqli_query($db,"select * from supply_equipment_type where type != 'Supply'");
                          while($result=mysqli_fetch_array($sql))
                          {    
                          ?>

                      <option class="select-item" value="<?php echo htmlentities($result['type']);?>"><?php echo htmlentities($result['type']);?></option>
                    <?php }
                    
                    ?>
                  </select> 

                </div>

                  &emsp;

                    <div class="inline-block">
                    <b>Date</b> <br>
                    <input type="date" class="bootstrap-select" name="filterdate" id="filterdate" style="width: 100%; height: 35px;">

                      </div>

                      </div>
                  
                      <div class="col">
                        <br>  

                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify" type="submit" id="export-button" style="width: 100%;"><i class="fas fa-download" data-toggle="modal" data-target="#"></i> Export </button></div>
                           
                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-warning btn-sm verify" data-toggle="modal" data-target="#" id="print_att" style="width: 100%;"><i class="fas fa-print" data-toggle="modal" data-target="#"></i> Print </button></div>

                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-success btn-sm verify" data-toggle="modal" data-target="#NewArrival" style="width: 100%;"><i class="fas fa-plus" data-toggle="modal" data-target="#NewArrival"></i> New Arrival </button></div>

                      </div>

                  </div>
                </div>
          <div class="table-bd">
            <div class="table-responsive">
              <div id="table_clone" style="display: compact; border-color:#000000;">
                <div class="head101" style="line-height: normal;">
                  <br>

                <p><img src="image/logo.png" width="100"> </p><center>
                        <p style="margin-top:-12%; font-family:Calibri;">Republic of the Philippines</p>
                        <p style="font-family: Old English Text MT;"> University of Southeastern Philippines</p>
                        <p style="font-family:Calibri;"> Tagum - Mabini Campus</p>
                        <p style="font-family:Calibri;"> Apokon, Tagum City</p>
                      <br>
                       <p style="font-family:Calibri; margin-top:2%;">Medical-Dental Equipment Inventory </p></center></th>
                      </div>  


                  <div class="calldiv" id="calldiv">
                   <table class="table table-hover table-bordered reports-list" id="sampleTable">
                    <thead>
                      <tr>
                
                    
                      <th>Time Period</th>
                      <th>Equipment Code</th>
                      <th>Equipment</th>
                      <th>Quantity Received</th>
                      <th>Functional</th>
                      <th>Semi-functional</th>
                      <th>Non-functional</th>
                      <th>Type</th>
                      <th class="max action-column noEx1" width="100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>


          <?php 
          
               
               $sql = "SELECT supply_equipment_inventory .*, supply_equipment_list.supply_equipment_code as code, supply_equipment_type.type as type from supply_equipment_inventory join supply_equipment_list on supply_equipment_list.id=supply_equipment_inventory.supply_equipment_code join supply_equipment_type on supply_equipment_type.type_id=supply_equipment_inventory.type where supply_equipment_type.type!='Supply'";


                if($result1 = mysqli_query($db, $sql)){
                 while ($row = mysqli_fetch_assoc($result1)) {
                            $eqs_id = $row['id'];
                            $datefrom =date_create($row['date_from']);
                            $dateto =date_create($row['date_to']);
                            $date1 = date_format($datefrom,"F d, Y");
                            $date2 = date_format($dateto,"F d, Y");

                  ?>
                    <tr>
                    <td><?php echo $date1.' - '.$date2 ;?></td>
                    <td><?php echo $row['code'];?></td>
                    <td><?php echo $row['supply_equipment_name'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $row['functional'];?></td>
                    <td><?php echo $row['semi_functional'];?></td>
                    <td><?php echo $row['non_functional'];?></td>
                    <td><?php echo $row['type'];?></td>


                    <td class="action-column noEx1">
                        <a class="btn btn-warning btn-sm" data-toggle="modal" href="#edit<?php echo $eqs_id; ?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" href="#EquipmentCondition<?php echo $eqs_id; ?>" style="color: white;">Condition</a>
                        <?php include ('condition2.php') ?>
                        
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
</div>
</div>

        <div class="row">
          <div class="col">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <h4 class="mb-3 line-head">Medical-Dental Supply Inventory</h4>
                  </div>
                  <br>
                  <div class="row">

                     
                 
                    <div class="col-auto">

                    <div class="inline-block">
                    Date <br>
                    <input type="date" id="filterdateS" placeholder="From" class="bootstrap-select " style="width: 100%;">

                      </div>

           
                      </div>

                       <div class="col">
                        <br>  

                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify" type="submit" id="export-button2" style="width: 100%;"><i class="fas fa-download" data-toggle="modal" data-target="#"></i> Export </button></div>
                           
                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-warning btn-sm verify" id="print_att2" style="width: 100%;"><i class="fas fa-print" data-toggle="modal" data-target="#"></i> Print </button></div>

                      </div>
      

                  </div>
                </div>
                <div class="table-bd">
                <div class="table-responsive">
                 <div id="table_clone1" style="display: compact; border-color:#000000;">
              <div class="head101" style="line-height: normal;">
              <br>
              <p><img src="image/logo.png" width="100"> </p><center>
                        <p style="margin-top:-12%; font-family:Calibri;">Republic of the Philippines</p>
                        <p style="font-family: Old English Text MT;"> University of Southeastern Philippines</p>
                        <p style="font-family:Calibri;"> Tagum - Mabini Campus</p>
                        <p style="font-family:Calibri;"> Apokon, Tagum City</p>
                      <br>
                      <p style="font-family:Calibri; margin-top:2%;">Medical-Dental Supply Inventory </p></center></th>
                      </div>


                  <div class="calldiv2" id="calldiv2">
                   <table class="table table-hover table-bordered reports-list" id="sampleTable2">
                    <thead>
                      <tr>
                
                     
                      <th>Time Period</th>
                      <th>Supply Code</th>
                      <th>Supply</th>
                      <th>Quantity Received</th>
                      <th>Available</th>
                      <th>Consumed</th>
                      <th class="max action-column noEx2" width="100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 
          
                 $sql = "SELECT supply_equipment_inventory .*, supply_equipment_list.supply_equipment_code as scode, supply_equipment_type.type as type from supply_equipment_inventory join supply_equipment_list on supply_equipment_list.id=supply_equipment_inventory.supply_equipment_code join supply_equipment_type on supply_equipment_type.type_id=supply_equipment_inventory.type where supply_equipment_type.type='Supply'";
               

                if($result2 = mysqli_query($db, $sql)){
                 while ($row = mysqli_fetch_assoc($result2)) {
                            $se_id = $row['id'];
                            $dfrom =date_create($row['date_from']);
                            $dto =date_create($row['date_to']);
                            $date_1 = date_format($dfrom,"F d, Y");
                            $date_2 = date_format($dto,"F d, Y");

                  ?>
                              <tr>
                   
                    <td><?php echo $date_1.' - '.$date_2 ;?></td>
                    <td><?php echo $row['scode'];?></td>
                    <td><?php echo $row['supply_equipment_name'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $row['available'];?></td>
                    <td><?php echo $row['consumed'];?></td>
                    <td class="action-column noEx2">

                        <a class="btn btn-warning btn-sm" data-toggle="modal" href="#UpdateSE<?php echo $se_id; ?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" href="#SupplyCondition<?php echo $se_id; ?>" style="color: white;">Condition</a>
                        <?php include ('condition.php') ?>
                        
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
    </div>

      


                <div class="modal fade " id="NewArrival" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Arrival</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                      <div class="modal-body c">
                        <div class="container">
                          
                          <?php
                            $sql1="SELECT condition_id, supply_equipment_condition FROM supply_equipment_condition";
                          ?>

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                    <label for="exampleSelect1">Start Date</label>
                                    <input type="date" id="date_from" name="date_from" placeholder="From" class="bootstrap-select " style="width: 100%;">
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">End Date</label>
                                    <input type="date" id="date_to" name="date_to" placeholder="To" class="bootstrap-select " style="width: 100%;">
                                  </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label for="exampleSelect1">Equipment or Supply</label><br>
                                    <select class="bootstrap-select" name="se_no" id="se_no" style="width: 100%;">
                                    
                                              <?php
                                           $result=mysqli_query($db, "SELECT * FROM supply_equipment_list");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $value= $res['id']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['supply_equipment_name'];?></option>
                                              <?php } ?>
                                    </select>
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label"> Quantity </label>
                                  <input class="form-control" name="qty" id="qty" type="number" placeholder="Enter qty">
                                </div>
                            </div>


                          </div>

                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="AddStock">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
          
          <!-- Button trigger modal -->







<!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
   <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
      <script src="js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
      <script type="text/javascript" src="../js/plugins/jquery.table2excel.js"></script>

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

  <script>
    $('#print_att').click(function(){
   var _c = $('#table_clone').html();
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
    var _c = $('#table_clone1').html();
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
.head101{
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
  <table align="right" style="margin-top:8%; margin-right: 25%;">
    <tr>
      <td align="right" style="font-family: Calibri"><b> &emsp;Prepared By: </b></td>
    </tr>
  </table>

<table align="right" style="margin-top:14%; margin-right: -35%">

<tr>
<?php $connect = mysqli_connect("localhost", "root", "", "osasdb_latest4"); 
    $sql="Select * from staffdetails where office_name='Clinic' AND type='Coordinator'";
    $res = $connect->query($sql);
    
     if($row=mysqli_fetch_array($res)) {
     $title1= $row['title'];
     $name1= $row['fullname'];
     $extension1= $row['extension'];
     $position1= $row['position'];
   }
   ?>

<td style="font-family: Calibri"><b><?php echo $title1 ;?>  <?php echo $name1 ;?>  <?php echo $extension1 ;?></b></td>
</tr>
<tr>
<td>Asst. <?php echo $position1;?>/Instructor I</td>
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

      $( function() {
        $( "#datepicker" ).datepicker();
      } );

    </script>


      <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#sampleTable').DataTable();</script>
      <script type="text/javascript">$('#sampleTable2').DataTable();</script>
      <script type="text/javascript">$('#myTable').DataTable();</script>
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
        $("#export-button").click(function(){
        $("#sampleTable").table2excel({
          // exclude CSS class
          exclude:".noEx1",
          name:"Worksheet Name",
          filename:"Medical-Dental Equipment Inventory",//do not include extension
          fileext:".xls" // file extension
        });

      });
              
      $("#export-button2").click(function(){
        $("#sampleTable2").table2excel({
          // exclude CSS class
          exclude:".noEx2",
          name:"Worksheet Name",
          filename:"Medical-Dental Supply Inventory",//do not include extension
          fileext:".xls" // file extension
        });

      });

      

    </script>


 <script type="text/javascript">

      $(document).ready(function(){
                  /*STATUS*/
                  $("#filterdate").on('change', function(){
                    var filterdate = $("#filterdate").val();

                    $.ajax({
                          url:"filterSEDate.php",
                          type:"POST",
                          data:{fdate : filterdate},
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
               
                  });

             });

            $(document).ready(function(){
                  /*STATUS*/
                  $("#filterdateS").on('change', function(){
                    var filterdateS = $("#filterdateS").val();

                    $.ajax({
                          url:"filterSDate.php",
                          type:"POST",
                          data:{fdate : filterdateS},
                          beforeSend:function(){
                            $(".calldiv2").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv2").html(data);
                          },
                    });
               
                  });

             });
      </script>
          

<?php 


  if (isset($_POST['AddStock'])) {

      $date_from = $_POST['date_from'];
      $date_to = $_POST['date_to'];
      $se_no = $_POST['se_no'];
      $qty = $_POST['qty'];
      $func = $_POST['functional'];
      $semi_func = $_POST['semi_functional'];
      $non_func = $_POST['non_functional'];


      $res=mysqli_query($db,"SELECT * from supply_equipment_list where id='$se_no'");
      while($row = mysqli_fetch_assoc($res)){
       $type = $row['type'];
       $se_code = $row['id'];
       $se_name = $row['supply_equipment_name'];
      }


      $result=mysqli_query($db,"INSERT INTO supply_equipment_inventory (supply_equipment_code, supply_equipment_name, date_from, date_to, qty, type, functional, semi_functional, non_functional) values ('$se_code', '$se_name', '$date_from', '$date_to', '$qty', $type, $qty, '0', '0')");

                              if($result){
                                echo '<script>
                                    swal({
                                    title: "Inserted successfully!",
                                    text: "Supply/Equipment stock added!",
                                    type:"success",
                                    icon: "success",
                                    showConfirmButton: false,
                                    button: false,
                                    closeOnClickOutside: false,
                                    closeOnEsc: false,
                                    }).then(function() {
                                  window.location = "sample.php";
                                })
                                   </script>';
                              }else{
                               echo '<script>
                                  swal({
                                  title: "Something went wrong...",
                                  text: "Server Request Failed!",
                                  type:"error",
                                  icon: "error",
                                  showConfirmButton: false,
                                  button: false,
                                  timer:2000,
                                  closeOnClickOutside: false,
                                  closeOnEsc: false,
                                  })
                                 </script>';
                              }
      echo "<meta http-equiv='refresh' content='1'>";
                        
    }


  if (isset($_POST['update_condition'])) {
    $id = $_POST['id'];
    $total_qty = $_POST['qty']?? null;
    $se_no = $_POST['se_no'];
    $qty_semifunctional = $_POST['qty_semifunctional']?? null;
    $qty_nonfunctional = $_POST['qty_nonfunctional']?? null;
    $total_kuha = $qty_semifunctional + $qty_nonfunctional;
    $diff = $total_qty - $total_kuha;



       if($diff<'0'){
        echo '<script>
              swal({
                title: "Error! The quantity to be distributed must not exceed the current balance",
                text: "Server Request Failed!",
                type:"error",
                icon: "error",
                showConfirmButton: true,
                button: true,
                closeOnClickOutside: true,
                closeOnEsc: true,
                })
              </script>';
     }else{
      $result=mysqli_query($db,"UPDATE supply_equipment_inventory set functional='$diff', semi_functional='$qty_semifunctional', non_functional='$qty_nonfunctional' where id='$id'");

                              if($result){
                                echo '<script>
                                    swal({
                                    title: "Updated successfully!",
                                    text: "Supply/Equipment stock Updated Successfuly!",
                                    type:"success",
                                    icon: "success",
                                    showConfirmButton: false,
                                    button: false,
                                    closeOnClickOutside: false,
                                    closeOnEsc: false,
                                    }).then(function() {
                                  window.location = "sample.php";
                                })
                                   </script>';
                              }else{
                               echo '<script>
                                  swal({
                                  title: "Something went wrong...",
                                  text: "Server Request Failed!",
                                  type:"error",
                                  icon: "error",
                                  showConfirmButton: false,
                                  button: false,
                                  timer:2000,
                                  closeOnClickOutside: false,
                                  closeOnEsc: false,
                                  })
                                 </script>';
                              }
      echo "<meta http-equiv='refresh' content='1'>";


     }


      
                        
    }

  if (isset($_POST['supply_consume'])) {
    $id = $_POST['id'];
    $available = $_POST['available']?? null;
    $se_no = $_POST['se_no'];
    $consume = $_POST['consume']?? null;
    $diff = $available - $consume;
    // var_dump("SELECT * from supply_equipment_inventory where id='$id'");
      $res=mysqli_query($db,"SELECT * from supply_equipment_inventory where id='$id'");
      while($row = mysqli_fetch_assoc($res)){
       $consumed = $row['consumed'];
      }
      $total_consumed = $consume + $consumed;


       if($diff<'0'){
        echo '<script>
                swal({
                title: "Error! The quantity to be consumed must not exceed the available supply",
                text: "Server Request Failed!",
                type:"error",
                icon: "error",
                showConfirmButton: true,
                button: true,
                closeOnClickOutside: true,
                closeOnEsc: true,
                })
                                 </script>';
     }else{
      $result=mysqli_query($db,"UPDATE supply_equipment_inventory set available='$diff', consumed='$total_consumed' where id='$id'");

                              if($result){
                                echo '<script>
                                    swal({
                                    title: "Updated successfully!",
                                    text: "Supply/Equipment stock Updated Successfuly!",
                                    type:"success",
                                    icon: "success",
                                    showConfirmButton: false,
                                    button: false,
                                    closeOnClickOutside: false,
                                    closeOnEsc: false,
                                    }).then(function() {
                                  window.location = "sample.php";
                                })
                                   </script>';
                              }else{
                               echo '<script>
                                  swal({
                                  title: "Something went wrong...",
                                  text: "Server Request Failed!",
                                  type:"error",
                                  icon: "error",
                                  showConfirmButton: false,
                                  button: false,
                                  timer:2000,
                                  closeOnClickOutside: false,
                                  closeOnEsc: false,
                                  })
                                 </script>';
                              }
      echo "<meta http-equiv='refresh' content='1'>";


     }


      
                        
    }

  if (isset($_POST['edit'])) {
    $id = $_POST['n_id'];
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $qty = $_POST['qty'];
    $func = $_POST['functional']?? null;
    $semi_func = $_POST['semi_functional']?? null;
    $non_func = $_POST['non_functional']?? null;

    // var_dump("UPDATE supply_equipment_inventory set date_from='$date_from', date_to='$date_to', qty= '$qty' where id='$id'");
      $result=mysqli_query($db,"UPDATE supply_equipment_inventory set date_from='$date_from', date_to='$date_to', qty= '$qty', functional= qty - (semi_functional + non_functional) where id='$id'");

                              if($result){
                                echo '<script>
                                    swal({
                                    title: "Updated successfully!",
                                    text: "Supply/Equipment stock Updated Successfuly!",
                                    type:"success",
                                    icon: "success",
                                    showConfirmButton: false,
                                    button: false,
                                    closeOnClickOutside: false,
                                    closeOnEsc: false,
                                    }).then(function() {
                                  window.location = "sample.php";
                                })
                                   </script>';
                              }else{
                               echo '<script>
                                  swal({
                                  title: "Something went wrong...",
                                  text: "Server Request Failed!",
                                  type:"error",
                                  icon: "error",
                                  showConfirmButton: false,
                                  button: false,
                                  timer:2000,
                                  closeOnClickOutside: false,
                                  closeOnEsc: false,
                                  })
                                 </script>';
                              }
      echo "<meta http-equiv='refresh' content='1'>";



     }


  if (isset($_POST['EditSE'])) {
    $id = $_POST['n_id'];
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $qty = $_POST['qty'];
    $available = $_POST['available']; 
    $consumed = $_POST['consumed'];

    // var_dump("UPDATE supply_equipment_inventory set date_from='$date_from', date_to='$date_to', qty= '$qty' where id='$id'");
    // $query = "UPDATE table1 SET Qty = Qty - $proc[Item_Qty] WHERE buyer='$user'";
      $result=mysqli_query($db,"UPDATE supply_equipment_inventory set date_from='$date_from', date_to='$date_to', qty= '$qty', available = qty - consumed where id='$id'");

                              if($result){


                                echo '<script>
                                    swal({
                                    title: "Updated successfully!",
                                    text: "Supply/Equipment stock Updated Successfuly!",
                                    type:"success",
                                    icon: "success",
                                    showConfirmButton: false,
                                    button: false,
                                    closeOnClickOutside: false,
                                    closeOnEsc: false,
                                    }).then(function() {
                                  window.location = "sample.php";
                                })
                                   </script>';
                              }else{
                               echo '<script>
                                  swal({
                                  title: "Something went wrong...",
                                  text: "Server Request Failed!",
                                  type:"error",
                                  icon: "error",
                                  showConfirmButton: false,
                                  button: false,
                                  timer:2000,
                                  closeOnClickOutside: false,
                                  closeOnEsc: false,
                                  })
                                 </script>';
                              }
      echo "<meta http-equiv='refresh' content='1'>";



     }

     


?>

    </body>
  </html>