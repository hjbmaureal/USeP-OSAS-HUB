 <?php
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
 ?>
  <!DOCTYPE html>
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
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">  
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
              <li><a class="treeview-item active" href="Admin-ConsultationReports.php">Consultation Reports</a></li>
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
                <div class="float-left"><h4>Consultation Reports</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-auto">

                     
                    <div class="inline-block">
                     <form enctype="multipart/form-data" id="fm" method="post" novalidate>

                    <b>Date From</b>

                    <input  type="text"  name="From" id="From" value="" class="bootstrap-select" placeholder="Select Date">

                    <b>Date End</b>
                    <input  type="text" name="To" id="To" value="" class="bootstrap-select" placeholder="Select Date" >

                    <input type="submit" name="range" id="range" value="Filter" class="btn btn-danger btn-sm verify">

                    <b>Course/Department</b>
                    <select class="bootstrap-select" data-table="reports-list">
                        <option class="select-item" value="1" selected="selected">All</option>

                         <?php
                                                 
                                                  $sql=mysqli_query($db,"select * from course where status='Active'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['title']);?>"><?php echo htmlentities($result['title']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                    </select>
                    

                  <div class="inline-block">
                    <div class="">
                      <b>Consultation type</b>
                                            <select class="bootstrap-select" data-table="reports-list">
                                                <option value="">All</option>
                                                <option value="Medical Consultation">Medical Consultation</option>
                                                <option value="Dental Consultation">Dental Consultation</option>
                                            </select>
                                        </div>
                   
                    <select class="bootstrap-select" data-table="reports-list" hidden="">
                        <option class="select-item" value="1" selected="selected">All</option>
                         <?php
                                                
                                                  $sql=mysqli_query($db,"select * from semester where status='Active'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['semester_name']);?>"><?php echo htmlentities($result['semester_name']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                      </select>
                    </div>
                    </form>


                    <select class="bootstrap-select" data-table="reports-list" hidden="">
                        <option class="select-item" value="1" selected="selected">All</option>
                        <?php
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from school_year where status='Active'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['schoolyear']);?>"><?php echo htmlentities($result['schoolyear']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                      </select>
                    </div>

                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;

                    
                      <div class="col-sm">
                        <input type="text" name="dateSelected" id="dateSelected" value="" disabled style='border-style: none;background: transparent;letter-spacing: 1px; width: 500px; font-weight: bolder; font-size: 17px; margin-left: -15px;'>

                         
                          
                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify"  onClick="Export()" style="width: 100%;"><i class="fas fa-download" data-toggle="modal" data-target="#RequestModal"></i> Export </button></div>
                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-warning btn-sm verify" style="width: 100%;" id="print_att"><i class="fas fa-print"></i> Print </button></div>

                       </div>  

     <!--   <button class="btn btn-danger btn-sm verify" id="demoNotify" href="#" >Verify</button>-->
       
                     

            </div>
            </div>
            <div class="table-bd">
            <div class="table-responsive">
            <br>
				  									
    <div id="table_clone" style="display: compact">
          
    <table  class="head">
		<thead>
      <tr>
        <th rowspan="5"><img src="image/logo.png" width="100"></th>
      </tr>
        <th colspan="7"><h4 style="font-family: Arial;"><center>Republic of the Philippines</center></h4></th>
      </tr>
      <tr>
        <th colspan="7"><h4 style="font-family: Old English Text MT;"><center>University of Southeastern Philippines</center></h4></th>
      </tr>
      <tr>
        <th colspan="7"><h4 style="font-family: Arial;"><center>Tagum-Mabini Campus</center></h4></th>
      </tr>
      <tr>
        <th colspan="7"><h4 style="font-family: Arial;"><center>Apokon, Tagum City</center></h4></th>
      </tr>
      <tr>
        <th rowspan="5"><img src="image/logo.png" width="100" hidden=""></th>
      </tr>
			<tr>
	
			<th width="100"></th>
      <th width="100"></th>
      <th width="100"></th>
      <th width="100"></th>
			<th width="100"></th>
			<th width="100"></th>
      <th width="100"></th>
      <th width="100"></th>
			</tr>
      
			</thead>
			</table>
			<table class="heads" style="border-collapse: collapse;">
      <tr>
      <th width="120"></th>
      <th width="120"></th>
      <th width="120"></th>
      <th width="120"></th>
      <th width="120"></th>
      <th width="120"></th>
      <th width="120"></th>
      <th width="120"></th>
      </tr>
      <tr>
        <th colspan="8" style="font-family: Arial; color: red;"><h4 style="font-size: 16px;"><center>Medical-Dental Consultation Reports</center></h4></th>
      </tr>
      </table>
      <br>
      
                  <table class="table table-hover table-bordered reports-list" id="myTable">
        
                   <thead>



                      <tr style="text-align: center;">
                      <th>Patient ID</th>
                      <th>Patient Name</th>
                      <th class="max">Course/Department</th>
                      <th>Complaint</th>
                      <th>Type of Consultation</th>
                      <th>Mode of Communication <br>(1st Option)</th>
                      <th>Mode of Communication <br>(2nd Option)</th>
                      <th class="max">Treatment</th>
                      <th>Date of Consultation</th>
                      
                    </tr>
                  </thead>
                  <tbody id="Table">  
  


                    <?php 
                      $db = mysqli_connect("localhost","root","","osasdb_latest4");
                      $stat = "Completed";

                      $cou = 0;
                        if(isset($_REQUEST['From'])){
                          $from=$_POST['From'];
                          $to=$_POST['To'];
                            if($from!=""&&$to!=""){
                              echo "<script> document.getElementById('dateSelected').value ='Date Selected: ".$_POST['From']." to ".$_POST['To']."';</script>";
                               $sql = "SELECT consultation.id,consultation.patient_id,CONCAT(student.first_name,' ',student.last_name) as fullname,course.title,consultation_type.consultation_type,consultation.communication_mode_first_option,consultation.communication_mode_second_option, consultation.appointment_date, consultation.semester, consultation.school_year, consultation.problems, consultation.treatment
                                from consultation join consultation_type on consultation.consultation_type=consultation_type.type_id inner join student  on consultation.patient_id=student.Student_id inner join course on student.course_id=course.course_id  WHERE appointment_date between '".$_POST['From']."' and '".$_POST['To']."' and consultation.status='$stat' order by appointment_date";
                            }else{
                            echo "<script>alert('Please Select The Dates')</script>";


                          $sql = "SELECT consultation.id,consultation.patient_id,CONCAT(student.first_name,' ',student.last_name) as fullname,course.title,consultation_type.consultation_type,consultation.communication_mode_first_option,consultation.communication_mode_second_option, consultation.appointment_date, consultation.semester, consultation.school_year, consultation.problems, consultation.treatment
                          from consultation join consultation_type on consultation.consultation_type=consultation_type.type_id inner join student  on consultation.patient_id=student.Student_id inner join course on student.course_id=course.course_id  WHERE consultation.status='$stat' order by appointment_date";

                            }
                         }else{
                          $sql = "SELECT consultation.id,consultation.patient_id,CONCAT(student.first_name,' ',student.last_name) as fullname,course.title,consultation_type.consultation_type,consultation.communication_mode_first_option,consultation.communication_mode_second_option, consultation.appointment_date, consultation.semester, consultation.school_year, consultation.problems, consultation.treatment
                          from consultation join consultation_type on consultation.consultation_type=consultation_type.type_id inner join student  on consultation.patient_id=student.Student_id inner join course on student.course_id=course.course_id  WHERE consultation.status='$stat' order by appointment_date";

                            
                         }

                          

                        


                    $res = $db->query($sql);
                    $cnt=1;
                    while($row = $res->fetch_assoc()) {
                      ?>

                    <tr>
                    <td> <?php echo htmlentities($row['patient_id']);?></td>
                    <td> <?php echo htmlentities($row['fullname']);?></td>
                    <td><?php echo htmlentities($row['title']);?></td>
                    <td> <?php echo htmlentities($row['problems']);?></td>
                    <td><?php echo htmlentities($row['consultation_type']);?></td>
                    <td> <?php echo htmlentities($row['communication_mode_first_option']);?></td>
                    <td> <?php echo htmlentities($row['communication_mode_second_option']);?></td>     
                    <td> <?php echo htmlentities($row['treatment']);?></td>
                    <td><?php echo htmlentities($row['appointment_date']);?></td>
                    
                     

                    </tr>
            <?php
  
  }?>
                   
                  </table>				  </div>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
      <script>

        $(document).ready(function(){
            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
            });
            $(function(){
                $("#From").datepicker();
                $("#To").datepicker();

            });

        });

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

table{
 font-size: 10px;
 font-family: Arial;
 
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

	  .heads {
  	  margin-top:5%;
  	  font-size:12px;
      font-family: Arial;
  	  }

	   table.reports-list {
			border-collapse:collapse;
			margin-top:-3%;
		  }

      table.reports-list td,table.reports-list th {
			 border:1px solid;
			 font-size: 12px;
       font-family: Arial;
		  }

	   table.reports-list th {
		  width:100%;
		  }

  		.text-center {
  			text-align:center
  		}

  		td {
  		text-align:center;
  		}

  		h3 {
  		display:none;
  		}	

      th {
        font-size: 12px;
      }

  	 .dataTables_info {
  		display:none;
  		}

  	 .dataTables_filter {
  		display:none;
  		}

  	 .dataTables_paginate {
  		display:none;
  		}

  	 .dataTables_length {
  		display:none;
  		}

</style>

</noscript>



</script>
			 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
            <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('myTable'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 800
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("ConsultationReports.pdf");
                }
            });
        }
    </script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#myTable').DataTable();</script>
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