<?php
error_reporting(0);
 include('connect.php');

  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'Clinic'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($db,"SELECT count(*) as cnt from notif where (user_id='$id' or office_id = 3) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}
 $column_count = 2;
 $months = ['','JANUARY','FEBRUARY','MARCH','APRIL','MAY','JUNE','JULY','AUGUST','SEPTEMBER','OCTOBER','NOVEMBER','DECEMBER'];
 $totals = [];
 $totals2 = [];
$overall = 0;
$overall2 = 0;
 ?>
<!DOCTYPE html>
<html lang="en"><head>
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
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
<style>
  #registered{
    display:block;
  }
  #ext {
    display: none;
  
  }
    #services {
    display: none;
  }
  </style>
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
<header class="app-header"> </header>
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
              <li><a class="treeview-item" href="Admin-CancellationOfAppointment.php">Cancellation of Appointment</a></li>
            </ul>
          </li>
     
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
          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-notes-medical"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ConsultationReports.php">Consultation Reports</a></li>
              <li><a class="treeview-item" href="Admin-RequestReports.php">Request Reports</a></li>
              <li><a class="treeview-item active" href="Admin-ServicesSummaryReports.php">Medical Services Summary Reports</a></li>
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
  <div class="red"> </div>
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
           
              <div class="">
               
                  <h3 class="mb-3 line-head">Summary Report of Medical Services</h3>

              
               <br>
              </div>
           

            <div class="col-sm">
              <div class="inline-block float ml-2 mt-1">
                <button class="btn btn-danger btn-sm verify" type="submit" id="export-button2" ><i class="fas fa-download"></i> Export</button>
              </div>
              <div class="inline-block float ml-2 mt-1">
                <button class="btn btn-warning btn-sm verify" style="width: 100%;" id="print_att"><i class="fas fa-print"></i> Print </button>
              </div>

              <div class="inline-block float ml-2 mt-1"><button class="btn btn-success btn-sm verify" data-toggle="modal" data-target="#addentry" style="width: 100%;"><i class="fas fa-plus" data-toggle="modal" data-target="#k"></i>&emsp;Add Entry </button></div>

            </div>
             
        <div class="col-md-sm">
        
              <form class="row" method="post" enctype="multipart/form-data">
                 <div class="form-group col-md-2">
                  <input class="form-control" name="dates" id="dates" type="text" placeholder="Enter Year" value='<?php echo $_POST['dates'] ?>'>
                </div>
                <div class="form-group col-md-sm align-self-end">
                  <button class="btn btn-primary" type="submit" name="filter"><i class="fa fa-fw fa-lg fa-filter"></i>Filter</button>
                </div>
              </form>
            
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
                 <p style="font-family:Calibri; margin-top:2%;">MEDICAL SERVICES: <?php echo date("Y");?></p>
                 <p style="font-family:Calibri; font-weight:bold;">As of <?php echo date("F Y");?></p>
                </center>
              </div>
            
             <table  class="head">
                <thead>
                  <tr>
                    <th><img src="image/logo.png" width="100"></th>
                    <th width="100"></th>
                    <th><center>
                        <p>Republic of the Philippines</p>
                        <p> UNIVERSITY OF SOUTHEASTERN PHILIPPINES</p>
                        <p> Tagum-Mabini Campus</p>
                        <p> Apokon Tagum City</p>
                      </center></th>
                    <th width="100"></th>
                    <th width="100"></th>
                  </tr>
                </thead>
              </table>
              <table class="heads">
                <tr>
                 
                  <th class="hh2"><h4>
                      <center>
                        Summary Report of Medical Services
            <br>
                      </center>
                    </h4></th>
                </tr>
               
              </table>
              <table class="table table-hover table-bordered reports-list" id="myTable">
                <thead>
                  <tr>
                    <th width="250">Months</th>
                    <?php
                        if($result = mysqli_query($db, "SELECT c.course_id AS id, c.title AS enrolled_office, c.degree, COUNT(con.patient_id) + COUNT(cert.request_id) + COUNT(e.transaction_id) AS count, 'Course' AS type, 1 as _order FROM course AS c LEFT JOIN student AS s ON s.course_id = c.course_id AND s.type = 'Undergraduate' LEFT JOIN consultation AS con ON con.patient_id = s.student_id AND con.status = 'Completed' AND con.consultation_type = 3 LEFT JOIN clinic_certificate_requests as cert on cert.user_id=s.student_id and cert.status = 'Completed' AND MONTH(cert.date_requested) = 12 and cert.request_type = 'Medical Certificate' LEFT JOIN extension_services_log as e on e.ext_id_number = s.student_id and e.patient_type = 'Registered' and e.mservice_id = 19 AND MONTH(date_avail) = 12 GROUP BY c.course_id HAVING c.degree = 'Bachelor' UNION SELECT DISTINCT co.college_id AS id, CONCAT(co.title, '-M') AS enrolled_office, c.degree, COUNT(con.patient_id) + COUNT(cert.request_id) + COUNT(e.transaction_id) AS count, 'College' AS type, 1 as _order FROM college AS co LEFT JOIN course AS c ON co.college_id = c.college_id AND c.degree = 'Masteral' LEFT JOIN student AS s ON s.course_id = c.course_id AND s.type != 'Undergraduate' LEFT JOIN consultation AS con ON con.patient_id = s.student_id AND con.status = 'Completed' AND con.consultation_type = 3 LEFT JOIN clinic_certificate_requests as cert on cert.user_id=s.student_id and cert.status = 'Completed' AND MONTH(cert.date_requested) = 12 and cert.request_type = 'Medical Certificate' LEFT JOIN extension_services_log as e on e.ext_id_number = s.student_id and e.patient_type = 'Registered' and e.mservice_id = 19 AND MONTH(date_avail) = 12 GROUP BY c.college_id UNION SELECT DISTINCT co.college_id AS id, CONCAT(co.title, '-D') AS enrolled_office, c.degree, COUNT(con.patient_id) + COUNT(cert.request_id) + COUNT(e.transaction_id) AS count, 'College' AS type, 1 as _order FROM college AS co LEFT JOIN course AS c ON co.college_id = c.college_id AND c.degree = 'Doctorate' LEFT JOIN student AS s ON s.course_id = c.course_id AND s.type != 'Undergraduate' LEFT JOIN consultation AS con ON con.patient_id = s.student_id AND con.status = 'Completed' AND con.consultation_type = 3 LEFT JOIN clinic_certificate_requests as cert on cert.user_id=s.student_id and cert.status = 'Completed' AND MONTH(cert.date_requested) = 12 and cert.request_type = 'Medical Certificate' LEFT JOIN extension_services_log as e on e.ext_id_number = s.student_id and e.patient_type = 'Registered' and e.mservice_id = 19 AND MONTH(date_avail) = 12 GROUP BY c.course_id UNION SELECT '' AS id, 'Faculty' AS enrolled_office, '' as degree, COUNT(con.patient_id) + COUNT(cert.request_id) + COUNT(e.transaction_id) AS count, 'Faculty' AS type, 2 as _order FROM staff as s LEFT JOIN consultation as con on con.patient_id = s.staff_id and con.status = 'Completed' AND con.consultation_type = 3 LEFT JOIN clinic_certificate_requests as cert on cert.user_id=s.staff_id and cert.status = 'Completed' AND MONTH(cert.date_requested) = 12 and cert.request_type = 'Medical Certificate' LEFT JOIN extension_services_log as e on e.ext_id_number = s.staff_id and e.patient_type = 'Registered' and e.mservice_id = 19 AND MONTH(date_avail) = 12 WHERE s.type IN ('Faculty','Faculty Head','Coordinator') UNION SELECT '' AS id, 'Staff' AS enrolled_office, '' as degree, COUNT(con.patient_id) + COUNT(cert.request_id) + COUNT(e.transaction_id) AS count, 'Staff' AS type, 3 as _order FROM staff as s LEFT JOIN consultation as con on con.patient_id = s.staff_id and con.status = 'Completed' AND con.consultation_type = 3 LEFT JOIN clinic_certificate_requests as cert on cert.user_id=s.staff_id and cert.status = 'Completed' AND MONTH(cert.date_requested) = 12 and cert.request_type = 'Medical Certificate' LEFT JOIN extension_services_log as e on e.ext_id_number = s.staff_id and e.patient_type = 'Registered' and e.mservice_id = 19 AND MONTH(date_avail) = 12 WHERE s.type = 'Staff' UNION SELECT '' AS id, 'EXT' AS enrolled_office, '' as degree, COUNT(transaction_id) AS count, 'EXT' AS type, 4 as _order FROM extension_services_log WHERE patient_type = 'Extension' AND MONTH(date_avail) = 12 and mservice_id = 19 ORDER BY _order , enrolled_office")){
                          while($row = mysqli_fetch_array($result)){
                              $column_count++;
                                echo '
                                  <th>'.$row['enrolled_office'].'</th>
                                ';
                            }
                          }

                    ?>
                    <th bgcolor="#70ad47" style="color:#FFFFFF">Total</th>
                  </tr>                  
                </thead>
                <tbody>
                    <?php 
                      if (isset($_POST['filter'])){
                        $year = $_POST['dates'];
                        $totals = [$column_count];
                        for ($i=1; $i < count($months); $i++) {
                          $row_count = 0; 
                          $cur_col_count = 1;
                          $counter = 0;
                          echo '<tr>';
                          echo '<td>'.$months[$i].'</td>';
                            if($result = mysqli_query($db, "SELECT c.course_id AS id, c.title AS enrolled_office, c.degree, COUNT(con.patient_id) + COUNT(cert.request_id) + COUNT(e.transaction_id) AS count, 'Course' AS type, 1 AS _order FROM course AS c LEFT JOIN student AS s ON s.course_id = c.course_id AND s.type = 'Undergraduate' LEFT JOIN consultation AS con ON con.patient_id = s.student_id AND con.status = 'Completed' AND con.consultation_type = 3 AND MONTH(con.date_filed) = $i AND YEAR(con.date_filed) = '$year' LEFT JOIN clinic_certificate_requests AS cert ON cert.user_id = s.student_id AND cert.status = 'Completed' AND MONTH(cert.date_requested) = $i AND YEAR(cert.date_requested) = '$year' AND cert.request_type = 'Medical Certificate' LEFT JOIN extension_services_log AS e ON e.ext_id_number = s.student_id AND e.patient_type = 'Registered' AND e.mservice_id = 19 AND MONTH(date_avail) = $i AND YEAR(date_avail) = '$year' GROUP BY c.course_id HAVING c.degree = 'Bachelor' UNION SELECT DISTINCT co.college_id AS id, CONCAT(co.title, '-M') AS enrolled_office, c.degree, COUNT(con.patient_id) + COUNT(cert.request_id) + COUNT(e.transaction_id) AS count, 'College' AS type, 1 AS _order FROM college AS co LEFT JOIN course AS c ON co.college_id = c.college_id AND c.degree = 'Masteral' LEFT JOIN student AS s ON s.course_id = c.course_id AND s.type != 'Undergraduate' LEFT JOIN consultation AS con ON con.patient_id = s.student_id AND con.status = 'Completed' AND con.consultation_type = 3 AND MONTH(con.date_filed) = $i AND YEAR(con.date_filed) = '$year' LEFT JOIN clinic_certificate_requests AS cert ON cert.user_id = s.student_id AND cert.status = 'Completed' AND MONTH(cert.date_requested) = $i AND YEAR(cert.date_requested) = '$year' AND cert.request_type = 'Medical Certificate' LEFT JOIN extension_services_log AS e ON e.ext_id_number = s.student_id AND e.patient_type = 'Registered' AND e.mservice_id = 19 AND MONTH(date_avail) = $i AND YEAR(date_avail) = '$year' GROUP BY c.college_id UNION SELECT DISTINCT co.college_id AS id, CONCAT(co.title, '-D') AS enrolled_office, c.degree, COUNT(con.patient_id) + COUNT(cert.request_id) + COUNT(e.transaction_id) AS count, 'College' AS type, 1 AS _order FROM college AS co LEFT JOIN course AS c ON co.college_id = c.college_id AND c.degree = 'Doctorate' LEFT JOIN student AS s ON s.course_id = c.course_id AND s.type != 'Undergraduate' LEFT JOIN consultation AS con ON con.patient_id = s.student_id AND con.status = 'Completed' AND con.consultation_type = 3 AND MONTH(con.date_filed) = $i AND YEAR(con.date_filed) = '$year' LEFT JOIN clinic_certificate_requests AS cert ON cert.user_id = s.student_id AND cert.status = 'Completed' AND MONTH(cert.date_requested) = $i AND YEAR(cert.date_requested) = '$year' AND cert.request_type = 'Medical Certificate' LEFT JOIN extension_services_log AS e ON e.ext_id_number = s.student_id AND e.patient_type = 'Registered' AND e.mservice_id = 19 AND MONTH(date_avail) = $i AND YEAR(date_avail) = '$year' GROUP BY c.course_id UNION SELECT '' AS id, '' AS enrolled_office, '' AS degree, COUNT(con.patient_id) + COUNT(cert.request_id) + COUNT(e.transaction_id) AS count, 'Faculty' AS type, 2 AS _order FROM staff AS s LEFT JOIN consultation AS con ON con.patient_id = s.staff_id AND con.status = 'Completed' AND con.consultation_type = 3 AND MONTH(con.date_filed) = $i AND YEAR(con.date_filed) = '$year' LEFT JOIN clinic_certificate_requests AS cert ON cert.user_id = s.staff_id AND cert.status = 'Completed' AND MONTH(cert.date_requested) = $i AND YEAR(cert.date_requested) = '$year' AND cert.request_type = 'Medical Certificate' LEFT JOIN extension_services_log AS e ON e.ext_id_number = s.staff_id AND e.patient_type = 'Registered' AND e.mservice_id = 19 AND MONTH(date_avail) = $i AND YEAR(date_avail) = '$year' WHERE s.type IN ('Faculty' , 'Faculty Head', 'Coordinator') UNION SELECT '' AS id, '' AS enrolled_office, '' AS degree, COUNT(con.patient_id) + COUNT(cert.request_id) + COUNT(e.transaction_id) AS count, 'Staff' AS type, 3 AS _order FROM staff AS s LEFT JOIN consultation AS con ON con.patient_id = s.staff_id AND con.status = 'Completed' AND con.consultation_type = 3 AND MONTH(con.date_filed) = $i AND YEAR(con.date_filed) = '$year' LEFT JOIN clinic_certificate_requests AS cert ON cert.user_id = s.staff_id AND cert.status = 'Completed' AND MONTH(cert.date_requested) = $i AND YEAR(cert.date_requested) = '$year' AND cert.request_type = 'Medical Certificate' LEFT JOIN extension_services_log AS e ON e.ext_id_number = s.staff_id AND e.patient_type = 'Registered' AND e.mservice_id = 19 AND MONTH(date_avail) = $i AND YEAR(date_avail) = '$year' WHERE s.type = 'Staff' UNION SELECT '' AS id, '' AS enrolled_office, '' AS degree, COUNT(transaction_id) AS count, 'EXT' AS type, 4 AS _order FROM extension_services_log WHERE patient_type = 'Extension' AND MONTH(date_avail) = $i AND YEAR(date_avail) = '$year' AND mservice_id = 19 ORDER BY _order , enrolled_office")){
                            while($row = mysqli_fetch_array($result)){
                                $row_count++;
                                $people = $row['count'];
                                $totals[$cur_col_count]+=$people;
                                $cur_col_count++;
                                if ($people==0){
                                  echo '
                                    <td></d>
                                  ';
                                } else {
                                  $counter+=$people;
                                  echo '
                                    <td>'.$people.'</d>
                                  ';
                                }
                              }
                            }
                          echo '<th bgcolor="#70ad47" style="color:#FFFFFF">'.$counter.'</th>';
                          echo '</tr>';
                        }
                          
                      } else {
                        for ($i=1; $i < count($months); $i++) { 
                          echo '<tr>';
                          echo '<td>'.$months[$i].'</td>';
                          for ($j=0; $j < $column_count -2; $j++) { 
                            echo '
                              <td></td>
                            ';
                          }
                          echo '<th bgcolor="#70ad47" style="color:#FFFFFF"></th>';
                          echo '</tr>';
                        }
                      }
                    ?>
                  <tr>
                    <th bgcolor="#70ad47" style="color:#FFFFFF"><b>Total</b></th>
                    <?php 


                      if (isset($_POST['filter'])){
                        $overall = 0;
                        for ($i=1; $i < count($totals); $i++) { 
                          $overall+=$totals[$i];
                          echo '
                            <th bgcolor="#70ad47" style="color:#FFFFFF">'.$totals[$i].'</th>
                          ';
                        }
                      } else {
                          for ($j=0; $j < $column_count -2; $j++) { 
                            echo '
                              <th bgcolor="#70ad47" style="color:#FFFFFF"></th>
                            ';
                          }

                      }
                    ?>
                    <th bgcolor="#70ad47" style="color:#FFFFFF"><?php echo $overall ?></th>
                  </tr>
                  <tr>
                    <td colspan="<?php echo ($column_count) ?>"><b>OTHER SERVICES:</b></td>
                  </tr>
                  <?php 
                      if (isset($_POST['filter'])){
                        $year = $_POST['dates'];
                        $totals2 = [$column_count];

                        if($result = mysqli_query($db, "SELECT * FROM clinic_services WHERE service_type = 3 and service_id != 19")){
                          while($row = mysqli_fetch_array($result)){
                              $col = 1;
                              $total_row = 0;
                              $cur_id = $row['service_id'];

                                echo '
                                  <tr>
                                  <td>'.$row['service_name'].'</td>
                                ';
                              if($result2 = mysqli_query($db, "SELECT c.course_id AS id, c.title AS enrolled_office, c.degree, COUNT(e.transaction_id) AS count, 'Course' AS type, 1 AS _order FROM course AS c LEFT JOIN student AS s ON s.course_id = c.course_id AND s.type = 'Undergraduate' LEFT JOIN extension_services_log as e on e.ext_id_number = s.student_id and e.patient_type = 'Registered' and e.mservice_id = $cur_id AND YEAR(date_avail) = '$year' GROUP BY c.course_id HAVING c.degree = 'Bachelor' UNION SELECT DISTINCT co.college_id AS id, CONCAT(co.title, '-M') AS enrolled_office, c.degree, COUNT(e.transaction_id) AS count, 'College' AS type, 1 AS _order FROM college AS co LEFT JOIN course AS c ON co.college_id = c.college_id AND c.degree = 'Masteral' LEFT JOIN student AS s ON s.course_id = c.course_id AND s.type != 'Undergraduate' LEFT JOIN extension_services_log as e on e.ext_id_number = s.student_id and e.patient_type = 'Registered' and e.mservice_id = $cur_id AND YEAR(date_avail) = '$year' GROUP BY c.college_id UNION SELECT DISTINCT co.college_id AS id, CONCAT(co.title, '-D') AS enrolled_office, c.degree, COUNT(e.transaction_id) AS count, 'College' AS type, 1 AS _order FROM college AS co LEFT JOIN course AS c ON co.college_id = c.college_id AND c.degree = 'Doctorate' LEFT JOIN student AS s ON s.course_id = c.course_id AND s.type != 'Undergraduate' LEFT JOIN extension_services_log as e on e.ext_id_number = s.student_id and e.patient_type = 'Registered' and e.mservice_id = $cur_id AND YEAR(date_avail) = '$year' GROUP BY c.course_id UNION SELECT '' AS id, 'Faculty' AS enrolled_office, '' as degree, COUNT(e.transaction_id) AS count, 'Faculty' AS type, 2 AS _order FROM staff as s LEFT JOIN extension_services_log as e on e.ext_id_number = s.staff_id and e.patient_type = 'Registered' and e.mservice_id = $cur_id AND YEAR(date_avail) = '$year' WHERE s.type IN ('Faculty','Faculty Head','Coordinator') UNION SELECT '' AS id, 'Staff' AS enrolled_office, '' as degree, COUNT(e.transaction_id) AS count, 'Staff' AS type, 3 AS _order FROM staff as s LEFT JOIN extension_services_log as e on e.ext_id_number = s.staff_id and e.patient_type = 'Registered' and e.mservice_id = $cur_id AND YEAR(date_avail) = '$year' WHERE s.type = 'Staff' UNION SELECT '' AS id, 'EXT' AS enrolled_office, '' as degree, COUNT(transaction_id) AS count, 'EXT' AS type, 4 AS _order FROM extension_services_log WHERE patient_type = 'Extension' AND YEAR(date_avail) = '$year' and mservice_id = $cur_id ORDER BY _order , enrolled_office")){
                                while($row2 = mysqli_fetch_array($result2)){
                                  $total_cell = $row2['count'];
                                  $totals2[$col]+=$total_cell;
                                  $col++;
                                    if ($total_cell==0){
                                      echo '
                                        <td></d>
                                      ';
                                    } else {
                                      $total_row+=$total_cell;
                                      echo '
                                        <td>'.$total_cell.'</d>
                                      ';
                                    }
                                }
                              }
                              echo '
                                  <th bgcolor="#70ad47" style="color:#FFFFFF">'.$total_row.'</th>
                                  </tr>
                              ';
                            }
                          }

                      } else {
                        if($result = mysqli_query($db, "SELECT * FROM clinic_services WHERE service_type = 3 and service_id != 19")){
                          while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                  <td>'.$row['service_name'].'</td>
                                ';
                                for ($j=0; $j < $column_count -2; $j++) { 
                                  echo '
                                    <td></td>
                                  ';
                                }
                              echo '
                                  <td bgcolor="#70ad47" style="color:#FFFFFF"></td>
                                  </tr>
                              ';
                            }
                          }
                      }
                  ?>
                  <tr>
                    <th bgcolor="#70ad47" style="color:#FFFFFF"><b>Total</b></th>
                    <?php 


                      if (isset($_POST['filter'])){
                        $overall2 = 0;
                        for ($i=1; $i < count($totals2); $i++) { 
                          $overall2+=$totals2[$i];
                          echo '
                            <th bgcolor="#70ad47" style="color:#FFFFFF">'.$totals2[$i].'</th>
                          ';
                        }
                      } else {
                          for ($j=0; $j < $column_count -2; $j++) { 
                            echo '
                              <th bgcolor="#70ad47" style="color:#FFFFFF"></th>
                            ';
                          }

                      }
                    ?>
                    <th bgcolor="#70ad47" style="color:#FFFFFF"><?php echo $overall2 ?></th>
                  </tr>
                </tbody>
              </table>
         <div class="footer1">
        <table > 
  <tr>
    <td><b>     Prepared By: </b></td>
  <td width="100"></td>
  <td width="100"></td>
  <td width="100"></td>
  <td width="100"></td>
  <td><b>     Noted By:</b></td>
  </tr>
</table>
<table align="left" style="margin-top:3%;">
  <td align="left" style="margin-top:10%;"><b><?php $id=$_SESSION['id']; $sql="Select * from staffdetails where staff_id='$id'";
    $res = $db->query($sql);
     if($row=mysqli_fetch_array($res)) {
   
    echo htmlentities($row['title']); echo htmlentities($row['fullname']);?>     <?php     echo htmlentities($row['extension']); }?> </b></td>
  <td width="100"></td>
  <td width="100"></td>
   <td style="margin-top:10%;"><b><?php $sql="Select * from staffdetails where office_name='Clinic' AND position='Nurse'";
    $res = $db->query($sql);
     if($row=mysqli_fetch_array($res)) {
   
    echo htmlentities($row['title']); echo htmlentities($row['fullname']);?>  <?php  echo htmlentities($row['extension']);?></b></td>
  <tr>
    <td align="left" style="margin-top:10%;"><?php echo $_SESSION["office"];?>  <?php  echo htmlentities($row['position']);?>   </td>
   <td width="100"></td>
  <td width="100"></td>
   <td width="100"></td>
  <td width="100"></td>
   <td align="left" style="margin-top:10%;"><?php  echo htmlentities($row['position']); }?> </td>
  </tr>
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
  </div>
  

  <!--</div>-->
</main>

<div class="modal fade" id="addentry" tabindex="-1" role="dialog" aria-labelledby="addentry" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header" style="background-color: #2B4550">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">Add Entry</h5>
        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body c">
        <div class="container">
          <form method="post">
            <div class="form-group row">
              <label class="control-label col-md-4">Patient Type:</label>
              <div class="col-md-8">
                <select  name="patienttype" id="patienttype" class="form-control col-md-8" onChange="showOnChange(event)">
                  <option value="">Select patient type</option>
                  <option value="Registered">Registered</option>
                  <option value="Extension">Extension</option>
                </select>
              </div>
            </div>
            <div id="registered">
              <div class="form-group row">
                <label class="control-label col-md-4">Patient ID No:</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" type="text" name="username" id="username" placeholder="Enter ID No.">
          <span id="availability"></span>
                </div>
              </div>
            </div>
            <div id="ext">
              <div class="form-group row" >
                <label class="control-label col-md-4">Account ID No:</label>
                <div class="col-md-8">
                  <select  name="account" id="account" class="form-control col-md-8" >
                    <?php
                    // Feching active consultation type
                    $sql=mysqli_query($db,"SELECT s.Student_id as id, CONCAT(s.last_name,', ',s.first_name,' ',SUBSTR(s.middle_name,0,1)) AS fullname FROM student as s UNION SELECT st.staff_id as id, CONCAT(st.last_name,', ',st.first_name) AS fullname FROM staff as st ORDER BY fullname");
                    while($result=mysqli_fetch_array($sql))
                    {    
                    ?>
                    <option class="select-item" value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['id']);?>- <?php echo htmlentities($result['fullname']);?> </option>
                    <?php }
                    
                    ?>
                  </select>
          
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-4">Fullname:</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" type="text" name="patientname" id="patientname">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-4">Service Type:</label>
              <div class="col-md-8">
                <select  name="contype" id="contype" class="form-control col-md-8" onChange="show(event)">
                  <option value="">Select service type</option>
                  <option value="19">Consultation Service</option>
                  <option value="3">Medical Services</option>
                </select>
              </div>
            </div>
            <div id="services" class="card" > <br>
              <center>
                <label style="margin:7.5px;"><b>Available Medical Services:</b></label>
              </center>
              <div class="form-group row" style="margin:7.5px;">
        <?php   $sql=mysqli_query($db,"Select * from clinic_services where service_type!=2 AND service_id!=19");
        while($result=mysqli_fetch_array($sql))
                    {
                    ?>
                <div class="col-md-8">
                  <div class="animated-checkbox">
                    <label>
                    <input type="checkbox"  name="medical[]" value="<?php echo htmlentities($result['service_id']);?>" class="form-control col-md-8">
                    <span class="label-text"></span><?php echo htmlentities($result['service_name']);?></label>
                  </div>
                </div>
        <?php }
        ?>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-4">Comment:</label>
              <textarea class="form-control" type="text" name="mcomment" id="mcomment" placeholder="//Comment" rows="5" width></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" name="AddEntry1">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php 

if(isset($_POST['AddEntry1'])){   
        $service_id = implode(',', $_POST['medical']);
    $chks = implode(',', $_POST['medical']);
     $chk1 = explode(',', $service_id);
      $patient_type= $_POST['patienttype'];
    $service_type= $_POST['contype'];
    if($service_type== '3'){
  foreach ($chk1 as $service_id )
  {    if($patient_type== "Registered"){
     $patient_id= $_POST["username"];
     $patient_name= $_POST["patientname"];
        $mcomment= $_POST["mcomment"];      
    $sql="INSERT INTO extension_services_log(ext_id_number,patient_name,patient_type,mservice_id,log_comments,date_avail) VALUES('$patient_id','$patient_name','$patient_type','$service_id', '$mcomment',NOW())";
    $sql = $db->query($sql);  
  }else if($patient_type== "Extension"){
   $patient_id= $_POST["account"];
     $patient_name= $_POST["patientname"];
        $mcomment= $_POST["mcomment"];    
  $sql="INSERT INTO extension_services_log(ext_id_number,patient_name,patient_type,mservice_id,log_comments,date_avail) VALUES('$patient_id','$patient_name','$patient_type','$service_id', '$mcomment',NOW())";
    $sql = $db->query($sql);  
  }
  }
  }else if($service_type=='19'){
   if($patient_type== "Registered"){
      $patient_id= $_POST['username'];
    $patient_type= $_POST['patienttype'];
        $mcomment= $_POST['mcomment'];
    $service_id= $_POST['contype'];
     $patient_name= $_POST["patientname"];        
    $sql="INSERT INTO extension_services_log(ext_id_number,patient_name,patient_type,mservice_id,log_comments,date_avail) VALUES('$patient_id','$patient_name','$patient_type','$service_id', '$mcomment',NOW())";
    $sql = $db->query($sql);
 }else if($patient_type== "Extension"){
      $patient_id= $_POST['account'];
    $patient_type= $_POST['patienttype'];
        $mcomment= $_POST['mcomment'];
    $service_id= $_POST['contype']; 
     $patient_name= $_POST["patientname"];      
    $sql="INSERT INTO extension_services_log(ext_id_number,patient_name,patient_type,mservice_id,log_comments,date_avail) VALUES('$patient_id','$patient_name','$patient_type','$service_id', '$mcomment',NOW())";
    $sql = $db->query($sql);
    
    }
    }
   if($sql)
  {
  echo '<script>
      swal({
      title: "Inserted successfully!",
      text: "Server Request Successful!",
      type:"success",
      icon: "success",
      button: false,
      closeOnClickOutside: false,
      closeOnEsc: false,
     }).then(function() {
    window.location = "Admin-ServicesSummaryReports.php";
   
  })
     </script>';
  }else {
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
?>


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
    
  })
</script>
<style>
th {
text-align:center;
}
</style>
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
.footer1{
display:none;}  
tfoot{
display:none;}
}
@media print{
.head{
display:none;}
.footer1{
display:none;}  
#addentry{
display:none;}
#hh2{
display:none;}  
.head{
margin-top:-100%;
display:table-header-group;
margin-bottom:5px;}
#modal{
display:none;
}

}
 
}

@page{
margin-top:-1cm; 
margin-left:1cm;
margin-right:1cm;
margin-bottom:1.5cm;
}
}
</style>
<noscript>
     <div class="left">
   <br>
   <br>
   <br>
    <b> &emsp;Prepared By: </b>
  <br>
  <p> &emsp;<?php $id=$_SESSION['id']; $sql="Select * from staffdetails where staff_id='$id'";
    $res = $db->query($sql);
     if($row=mysqli_fetch_array($res)) {
   
    echo htmlentities($row['title']); echo htmlentities($row['fullname']);?> &nbsp;<?php     echo htmlentities($row['extension']); ?>&nbsp;</p>
    </p>
    <p>&emsp; &emsp; &emsp; &emsp;<?php  echo htmlentities($row['position']); }
   ?></p>
   </div>
   <div class="right" style=" margin-left:75%; margin-top:-9%;">
     <b> &emsp;Noted By: </b>
  <p><?php $sql="Select * from staffdetails where office_name='Clinic' AND position='Nurse'";
    $res = $db->query($sql);
     if($row=mysqli_fetch_array($res)) {
   
    echo htmlentities($row['title']); echo htmlentities($row['fullname']);?>&nbsp;
     <?php  echo htmlentities($row['extension']);
   ?></p><p>&emsp;&emsp;&emsp;&emsp;   <?php  echo htmlentities($row['position']); }?></p>
   </div>
<style>
#addentry1{
display:none;}
.footer1{
display:none;}  
.hh2{
display:none;}
.head{
display:none;}
    .heads{
    margin-top:5%;
    margin-left:6%;
    font-size:20px;
    font-weight:bold; 
    }
  table.reports-list{
      width:100%;
      border-collapse:collapse;
      margin-top:-3%;
    }
    table.reports-list td,table.reports-list th{
      border:1px solid;
    
    }
    table.reports-list th{
    padding:0%;
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
    <script type="text/javascript" src="../js/plugins/jquery.table2excel.js"></script>
<script>

$("#export-button2").click(function(){
  $("#myTable").table2excel({
    // exclude CSS class
    exclude:".noExl",
    name:"Worksheet Name",
    filename:"Services_Summary_Report",//do not include extension
    fileext:".xls" // file extension
  });

});

function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}
</script>
<script>
function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
</script>
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<!-- <script type="text/javascript">$('#myTable').DataTable();</script> -->
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
<script>  
 $(document).ready(function(){  
   $('#username').blur(function(){

     var username = $(this).val();

     $.ajax({
      url:'check_id.php',
      method:"POST",
      data:{username:username},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-success">Registered!</span>');
        $('#contype').attr("disabled", false);
        $('#mcomment').attr("disabled", false);
       }
       else
       {
        $('#availability').html('<span class="text-danger">Not Registered. Please Register!</span>');
        $('#contype').attr("disabled", true);
        $('#mcomment').attr("disabled", true);
       }
      }
     })

  });
 });  
</script><script>
  function show(e) {
    var elem = document.getElementById("contype");
    var value = elem.options[elem.selectedIndex].value;
    if(value == "19")
      { 
        document.getElementById('services').style.display = "none";
    
      }
   else if(value == "3")
     {
  
          document.getElementById('services').style.display = "block";
     }
 

  }
</script>
<script>
  function showOnChange(e) {
    var elem = document.getElementById("patienttype");
    var value = elem.options[elem.selectedIndex].value;
    if(value == "Registered")
      { 
      document.getElementById('registered').style.display = "block";
        document.getElementById('ext').style.display = "none";
     $('#account').attr("disabled", true);
      }
   else if(value == "Extension")
     {
        document.getElementById('registered').style.display = "none";
          document.getElementById('ext').style.display = "block";
     }
 

  }
</script>
</body>
</html>
