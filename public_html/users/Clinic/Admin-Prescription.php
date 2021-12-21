   <!DOCTYPE html>
  <?php include('connect.php');
session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'Clinic'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($db,"SELECT count(*) as cnt from notif where (user_id='$id' and office_id = 3) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}


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
  <html lang="en">

    <head>
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
      <link rel="icon" href="../../images/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Clinic Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
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

           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-calendar"></i><span class="app-menu__label">Appointment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Appointment.php">List of Appointment</a></li>
              <li><a class="treeview-item active" href="Admin-CancellationOfAppointment.php">Cancellation of Appointment</a></li>
            </ul>
          </li>
     
          <li><a class="app-menu__item active" href="Admin-Prescription.php"><i class="app-menu__icon fas fa-prescription"></i><span class="app-menu__label">Prescription</span></a></li>

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-file-medical"></i><span class="app-menu__label">Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Request.php">Medical Certificate</a></li>
              <li><a class="treeview-item" href="Admin-MedicalRecordCert.php">Medical Records Certification</a></li>
            </ul>
          </li>


          <li class="p-2 sidebar-label"><span class="app-menu__label">INVENTORY</span></li>

           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-tools"></i><span class="app-menu__label">Equipment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Supplies&Equipment.php">Supply & Equipment List</a></li>
              <li><a class="treeview-item" href="Admin-Stock-Supplies&Equipment.php">Inventory</a></li>
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
                  $count_sql="SELECT * from notif where (user_id=$id and office_id = 3)  order by time desc";
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
                <h3 class="mb-3 line-head">Prescription</h3>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-auto">

                     
                  <div class="inline-block">
                    <b>Consultation type</b>
                    <br>
                    <select class="bootstrap-select" style="height: 35px;width: 160px" data-table="reports-list">
                        <option class="select-item" value="1" selected="selected">All</option>
                        <option class="select-item" value="Medical Consultation">Medical Consultation</option>
                        <option class="select-item" value="Dental Consultation">Dental Consultation</option>
                      </select>
                    </div>
                    
           
                      </div>

                      <div class="col">
                        <br>  

                       
                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-warning btn-sm verify" style="width: 100%;" id="print_att"><i class="fas fa-print"></i> Print </button></div>
                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalLong1"><i class="fas fa-plus"></i> Add Prescription</button></div> 

                          

                      </div>


                  </div>
                </div>
                   <div class="table-bd">
          <div class="table-responsive">
            <div id="table_clone" style="display: compact; border-color:#000000;">
              <div class="head101" style="line-height: normal;">

        <p><img src="image/logo.png" width="100"> </p><center>
                        <p style="margin-top:-12%; font-family:Calibri;">Republic of the Philippines</p>
                        <p style="font-family: Old English Text MT;"> University of Southeastern Philippines</p>
                        <p style="font-family:Calibri;"> Tagum - Mabini Campus</p>
                        <p style="font-family:Calibri;"> Apokon, Tagum City</p>
                      <br>
                  <p style="font-family:Calibri; margin-top:2%;">Prescription List</p></center></th>
       </div>
                  <table class="table table-hover table-bordered reports-list" id="sampleTable2">
                    <thead style="font-family: Calibri; ">
                      <tr>
                      <th>Prescription ID</th>
                      <th>Patient ID</th>
                      <th class="max">Patient Name</th>
                      <th>Type</th>
                      <th class="max">Prescription</th>
                      <th>Date of Prescription</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 
          
          $stat = "Completed";

          
          $sql = "SELECT prescription_list.*, consultation_type.consultation_type as type from prescription_list join consultation_type on consultation_type.type_id=prescription_list.consultation_type";

          $res = $db->query($sql);
                    $cnt=1;
                    while($row = $res->fetch_assoc()) {
                      ?>

                    <tr style="font-family: Calibri"> 

                    <td><?php echo htmlentities($row['prescription_id']);?></td> 
                    <td><?php echo htmlentities($row['patient_id']);?></td>
                    <td><?php echo htmlentities($row['patient_name']);?></td>
                    <td><?php echo htmlentities($row['type']);?></td>
                    <td><?php echo htmlentities($row['prescription_details']);?></td>
                    <td><?php echo htmlentities($row['date']);?></td>
                    
                   
                     


                      

                    </tr>
            <?php
  
  }?>
                  </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>  




<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
<div class="modal fade " id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Prescription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      
                      <div class="modal-body c">
                          <h5 class="mb-3 line-head"><center>SELECT PATIENT</h5></center>
                            <h6 class="font-weight-bold">Consultation ID: </h6> 
                              <div class="">
                        
                                <select  name="conid" id="conid" class="form-control" style="height: 38px;width: 300px;" data-table="reports-list">
                                          
                                                 <?php
                                                 $stats="Completed";

                                                  $sql=mysqli_query($db,"SELECT consultation_id, name FROM `consultation_details` WHERE UPPER(consultation_status)=UPPER('$stats')");
                                                  ?>
                                                 
                                                  <option class="select-item" value="" selected disabled>Select Consultation ID</option>
                                                  <?php
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <div class="col-md-8">
                                                  <option class="select-item" value="<?php echo htmlentities($result['consultation_id']);?>"><?php echo htmlentities($result['consultation_id']);?> - <?php echo htmlentities($result['name']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                                                  </select> 
                                                  </div>
                                     

                                                <br>

                              <div class="calldivconsult">
                        
                            
                              <h6 class="font-weight-bold">Consultation Type: </h6> 
                              <input type="text" name="type" id="type" disabled="" style="height: 38px; width: 300px;">
                              <br><br>
                                <h6 class="font-weight-bold">Problem:</h6> 
                                <textarea name="cc" id="cc" rows="4" disabled="" style="width: 425px;"></textarea>
                                </div>

                                <br><br>
                                <h5 class="mb-3 line-head"><center>PRESCRIPTION</center></h5><br>
                               <div class=""> 

                                  <h6>Medication:</h6>
                                    <div class="row">
                                      <div class="col">
                                        <div class="form-group">
                                          <select  name="art_fotoselect" id="Prname" class="form-control" style="height: 38px; width: 300px;" data-table="reports-list" disabled="">
                                          <option class="select-item" selected disabled>Select Medication</option>
                                                 <?php
                                                  $date_count=0;
                                                  $sql=mysqli_query($db,"select item_list.item_name, item_unit.unit as u, item_inventory.datefrom as datefrom, item_inventory.dateto as dateto, item_inventory.balance from item_list LEFT JOIN item_inventory ON item_inventory.item_code=item_list.item_code left JOIN item_unit ON item_list.unit=item_unit.unit_id WHERE item_inventory.balance > 0");

                                                  while($result=mysqli_fetch_array($sql))
                                                  { $date_count++;     
                                                    $date =date_create($row['datefrom']);
                                                    $date1 = date_format($date,"F d, Y");
                                                  ?>

                                                  <option class="select-item" value="<?php echo htmlentities($result['datefrom'])." ".htmlentities($result['item_name']);?>"><?php echo htmlentities($result['datefrom']);?> — <?php echo htmlentities($result['item_name']);?></option>
                                        
                                                  <?php }/*<input type="text" name="date" value="<?php echo $result['datefrom'];?>">*/
                                                  
                                                  ?>
                                          </select>
                                        </div>
                                      </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                                <input type="number" min="1" id="PrescQuan" disabled required="" placeholder="Qty" style="height: 36px; width: 50px; margin-left: -35%; ">
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <button type="button" name="Add" id="Add" class="btn btn-success" disabled="" style="margin-left: -75%;">Add</button>
                                        </div>
                                    </div>
                                </div>
 
                                      <div class="form-row">
                                      <div class="form-group col-md-12">
                                        <style type="text/css">
                                          .tclass td{
                                              padding-left: 10px;
                                          }
                                        </style>

                                        
                                         <input type="button" name="clear" id="clear" value="clear" class="btn btn-danger btn-sm" hidden="" style="margin-bottom: 2%;">

                                        <div class="calltable">
                                        </div>

                                       
                                        <div class="">
                                          <textarea style="width: 425px; margin-top: 2%;" class="form-control rounded-10" name="addMedication" id="addMedication" rows="4" placeholder="If medication is unavailable, type it here"></textarea>
                                      </div>
                                        
                                      <!-- <table id="myTable" class="tclass">
                                        <tbody>
                                          <tr>
                                        
                                          </tr>
                                        </tbody>
                                      </table> -->
                                      <br>
                                


                                     <h6>Prescribing Doctor:</h6>
                                    
                                            <select  name="doctor" id="doctor" class="form-control" style="height: 38px;width: 300px" data-table="reports-list">

                                                 <?php
                                                 $Doctor="Doctor";
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"SELECT staff_id, fullname, extension FROM staffdetails WHERE UPPER(position) = UPPER('Doctor')");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['staff_id']);?>"><?php echo htmlentities($result['fullname']);?>, <?php echo htmlentities($result['extension']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                                                  </select>
                              
                            
                        </div>
                          </div>
                      </div>
                  
                      <div class="modal-footer">
                        <button type="submit" name="save" id="save" class="btn btn-success" disabled="" >Save</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
  <!-- <script>
function myFunction() {
  var name = $("#Prname").val();
  var quan = $("#PrescQuan").val();
  var unit = $("#prescunit").val();
  var table = document.getElementById("myTable");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  cell1.innerHTML = name;
  cell2.innerHTML = quan;
  cell3.innerHTML = unit;
  
}
</script> -->

<?php

$db = mysqli_connect("localhost","root","","backupdb-3");

  if(isset($_POST['Submit'])){   
    $name = $_POST['sname'];
    $conid = $_POST['conid'];
    $cc = $_POST['problem'];
    $type = $_POST['type'];
    $prescription = $_POST['text'];
    $guide = $_POST['guide'];
    $doctor = $_POST['doctor'];
    // checker
    if(empty($prescription)) { 

        if(empty($prescription)) {
            echo "<font color='red'>Prescription field is empty.</font><br/>";
        }  
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 

    $s = "SELECT consultation_id from prescription where consultation_id='$name'";
    $resu = $db->query($s);
      if ($resu->num_rows > 0) {

           $sql="UPDATE prescription 
                 set patient_id='$name', consultation_id='$conid', consultation_type='$type',prescription_details='$prescription', dose_interval='$guide',  prescribing_doctor='$doctor',date=now()
                 where consultation_id='$conid'";
           $result5 = $db->query($sql);

           echo '<script>
                  swal({
                  title: "Record Already Existed...",
                  text: "Server Request Failed!",
                  type:"error",
                  icon: "error",
                  button: false,
                  timer:2000,
                  closeOnClickOutside: false,
                  closeOnEsc: false,
                  }).then(function(){

                    window.location = "Admin-Prescription.php";
                    })
                 </script>';

        }



    else { 
        
        //insert syntax
        $result ="INSERT INTO prescription(patient_id,consultation_id,consultation_type,prescription_details,dose_interval,prescribing_doctor,date) VALUES('$name','$conid','$type','$prescription','$guide','$doctor,now())";

          if ($db->query($result) === TRUE) {
       
          echo '<script>
                swal({
                title: "Added successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:2000,
                closeOnClickOutside: false,
                closeOnEsc: false,
                }).then(function() {
              window.location = "Admin-Prescription.php";
            })
     </script>';
         
    
    }else{

    echo '<script>
        swal({
        title: "Something went wrong...",
        text: "Server Request Failed!",
        type:"error",
        icon: "error",
        button: false,
        timer:2000,
        closeOnClickOutside: false,
        closeOnEsc: false,
        })
       </script>';

}
}
}
?>

 
        
<!-- <script>
function getDay(val) {
  type: "POST",
  url: "getDay.php",
  data:'date='+val,
  success: function(data){
    $("#datestatus").html(data);
  }
  });
}

</script> -->
<script>



</script>






        

        <!--</div>-->
      </main>
      <!-- Essential javascripts for application to work-->
      
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
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


   <!-- table selection -->
   <script>
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
    
  })
</script>
<style>

@media screen{
.head{
display:none;}
.heads{
display:none;}
.head101{
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

<table align="right" style="margin-top:18%; margin-right: -35%">

<tr>
<?php $connect = mysqli_connect("localhost", "root", "", "backupdb-3"); 
    $sql="Select * from staffdetails where office_name='Clinic' AND type='Coordinator'";
    $res = $connect->query($sql);
    
     if($row=mysqli_fetch_array($res)) {
     $title1= $row['title'];
     $name1= $row['fullname'];
     $extension1= $row['extension'];
     $position1= $row['position'];
   }
   ?>
<td style="font-family: Calibri"><b><?php echo $title1 ;?>  <?php echo $name1 ;?>, <?php echo $extension1 ;?></b></td>
</tr>
<tr>
<td>Asst. <?php echo $position1;?>/Instructor I</td>
</tr>
</table>
      <style>
    .heads{
    margin-top:5%;
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
    </style>

</noscript>



      </script>






 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
            <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('sampleTable2'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("ListOfConsultation.pdf");
                }
            });
        }
    </script>
    <!-- SEARCH ID -->
    <script type="text/javascript">
        $(document).ready(function(){
          var count=0; 
          var med='';
          var quan='';
          var x='';
          var date='';
          var unit='';
          var itemselect='';
          

          $("#conid").on('change', function(){
                    $("#Prname").prop('disabled', false);
                    
                    var id = $("#conid").val();
                    /*alert(id);*/
                    $.ajax({
                          url:"searConsultationInfo.php",
                          type:"POST",
                          data:{id:id},
                          success:function(data){
                            $(".calldivconsult").html(data);
                          },
                    });
                  });
          
          $("#Add").on('click', function(){
                     
                    
                    var quanselect=$("#PrescQuan").val();
                    var name_holder=$("#Prname").val();
                      itemselect = name_holder.substring(10);
                      date=date+","+name_holder.substring(0,11);
                    var error='';
                    /*alert(med);*/
                   
                              count++;
                              if (count==1) {
                                var name_holder=$("#Prname").val();
                                  itemselect = name_holder.substring(10);
                                med = med+","+itemselect;
                                quan = quan+","+$("#PrescQuan").val();
                              }else{
                                med='';
                                quan='';
                                for (var i = 1; i < count; i++) {
                                  var hold="#medWthtimes"+i;
                                  var hold2="#addedQuan"+i;
                                  med=med+", "+$(hold).val();
                                  quan = quan+","+$(hold2).val();

                                 /* alert(hold2);*/

                                }
                                /*alert(quan);*/
                                var name_holder=$("#Prname").val();
                                  itemselect = name_holder.substring(10);
                                med = med+","+itemselect;
                                quan = quan+","+$("#PrescQuan").val();
                              }
                              /*alert(date);*/
                               $.ajax({
                                      url:"selectedMedication.php",
                                      type:"POST",
                                      data:{med:med, quan:quan, unit:unit, count:count, error:error, date:date},
                                      success:function(data){
                                        $("#guide").prop('disabled', false);
                                        $("#clear").prop('hidden', false);
                                        $(".calltable").html(data);
                                      },
                                });
                             
                  });
                  $("#clear").on('click', function(){
                                  count=0; 
                                   med='';
                                   quan='';
                                   unit='';
                                   error='';
                                   date='';
                               $.ajax({
                                      url:"selectedMedication.php",
                                      type:"POST",
                                      data:{med:med, quan:quan, unit:unit, count:count, error:error},
                                      success:function(data){
                                        $("#guide").prop('disabled', false);
                                        $("#clear").prop('hidden', false);
                                        $(".calltable").html(data);
                                      },
                                });
                               $("#clear").prop('hidden', true);
                             
                  });
          /*for (var i = 1; i <= count; i++) {
            var hold= document.getElementById("checkbox"+i);
            $(x_id_holder).on('click', function(){
                        x=x+","+$("#x"+i).val();
                        alert(x);
                      });
                }*/
          $("#save").on('click', function(){
                    var consultID=$("#conid").val();
                    var patientID=$("#patientID").val();
                    var type= $("#type").val();
                    /*alert(type);*/
                    var addMedication=$("#addMedication").val();
                    var doctor=$("#doctor").val();
                    var hold="#medWthtimes"+count;
                    var updated_med=$(hold).val();
                    /*alert(updated_med);*/
                    var check='';
                    med='';
                    quan='';
                    for (var i = 1; i <= count; i++) {
                      var hold= document.getElementById("checkbox"+i);
                      
                      var medHolder="#medWthtimes"+i;
                      med=med+','+$(medHolder).val();
                      
                      var quanHolder="#addedQuan"+i;
                      quan=quan+","+$(quanHolder).val();
                      if (hold.checked) {
                        check=check+","+'1';
                      }else{
                        check=check+","+'0';
                      }
                    }
                    med=med.substring(1);
                    quan=quan.substring(1);
                    date=date.substring(1);
                    check=check.substring(1);
                    $.ajax({
                          url:"selectedMedication.php",
                          type:"POST",
                          data:{med:med, quan:quan, unit:unit, count:count, check:check, consultID:consultID, patientID:patientID, type:type, addMedication:addMedication, doctor:doctor, updated_med:updated_med, date:date},
                          success:function(data){
                            swal({
                                          title: "Prescription Added Successfuly!",
                                          text: "Server Request Successful!",
                                          type:"success",
                                          icon: "success",
                                          button: false,
                                          closeOnClickOutside: false,
                                          closeOnEsc: false,                                                                                             
                                          },function() {
                                          window.location = "Admin-Prescription.php";

                                      })

                          },
                    });
                  });
          $("#PrescQuan").keyup(function(){
                     
                    var date1='';
                    var quanselect=$("#PrescQuan").val();
                    var name_holder=$("#Prname").val();
                      itemselect = name_holder.substring(10);     
                    var med_length_holder=name_holder.length;
                      date1 = name_holder.substring(0,11);
                       /*alert(date1+" "+itemselect);*/
                          /*alert("kani");*/
                    var error='';
                    /*alert("PrescQuan");*/
                    $.ajax({
                          url:"checkQuantity.php",
                          type:"POST",
                          data:{quanselect:quanselect, itemselect:itemselect, date:date1},
                          success:function(data){
                            /*alert(data);*/
                            if (data.match(/input/g)) {
                              $("#Add").prop('disabled', false);
                             }else{
                              swal({
                                              title: "Insufficient stock",
                                              text: "Please enter a valid qty!",
                                              icon: "error",
                                              buttons: false,
                                              timer: 1800,
                                              closeOnClickOutside: false,
                                              closeOnEsc: false,
                                            });
                              $("#Add").prop('disabled', true);
                             }
                          },
                    });
                  });
          
          $("#guide").on('click', function(){
            /*alert('ere');*/
                    $("#save").prop('disabled', false);
                  });
          $("#doctor").on('click', function(){
            /*alert('ere');*/
                    $("#save").prop('disabled', false);
                  });
          $("#Prname").on('change', function(){
            /*alert('ere');*/
                    $("#PrescQuan").prop('disabled', false);
                  });
        });
    </script>
    <script type="text/javascript">
      document.getElementById('cc').innerHTML = document.getElementById('cc').innerHTML.trim();
    </script>
      <script>
        <!-- table selection -->
          $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});
      </script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#sampleTable').DataTable();</script>
      <script type="text/javascript">$('#sampleTable2').DataTable();</script>
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
    </body>
  </html>
 