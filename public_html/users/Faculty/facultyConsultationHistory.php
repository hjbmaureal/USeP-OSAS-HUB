<?php 
  session_start();
   include('connect.php');
  
  
  if(!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Faculty Head'){
    if (!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Faculty'){
      if(!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Staff'){
            echo '<script type="text/javascript">'; 
            echo 'window.location= "../../index.php";';
            echo '</script>';
      }
    } 
  }
  // include('../../php/session_faculty.php');
   $faculty_id= $_SESSION['id'];



          $count_sql="SELECT * from notif where user_id='$faculty_id' and message_status='Delivered'";

          $result1 = mysqli_query($db, $count_sql);

          $count2 = 0;

          while ($row = mysqli_fetch_assoc($result1)) {                             

            $count2++;

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
      <title>USeP Employee Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">
       <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
      <body class="app sidebar-mini rtl"onload="initClock()">
      <!-- Navbar-->

        
      <header class="app-header">

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

           
    
   
      </header>

      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="../../images/logo.png" width="20%" alt="img">
          <div>
            <?php 
            if ($_SESSION['access_level']==1){
              echo '                
                <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">FACULTY HEAD HUB</p>
              ';
            }else{
              echo '                
                <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">EMPLOYEE HUB</p>
              ';
            }
          ?>
            
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
          <?php 
            if ($_SESSION['access_level']==1){
              echo '                
                <li class="p-2 sidebar-label"><span class="app-menu__label">STUDENT\'S AFFAIRS AND SERVICES</span></li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Labor Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a class="treeview-item " href="Home-Labor.php">Home</a></li>
                    <li><a class="treeview-item " href="Labor-Requisition.php">Requisition Form</a></li>
                    <li><a class="treeview-item" href="Labor-Applicants.php">Student Applicants</a></li>
                    <li><a class="treeview-item" href="Labor-DTR.php">Student DTR</a></li>
                    <li><a class="treeview-item" href="Faculty-Accomplishment.php">Accomplishment Reports</a></li>
                  </ul>
                </li>
              ';
            }
          ?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Faculty.php">Home</a></li>  
              <li><a class="treeview-item" href="Guidance_Faculty_Referrals.php">Referral Forms</a></li>
              <li><a class="treeview-item" href="Guidance_Faculty_Acknowledgement.php">Acknowledgement Slip</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="facultyHome.php">Home</a></li>
              <li><a class="treeview-item" href="facultyClinic_Privacy_Policy.php">Consultation</a></li>
              <li><a class="treeview-item active" href="facultyConsultationHistory.php">Consultation History</a></li>
              <li><a class="treeview-item" href="facultyPrescription.php">Prescription</a></li>
              <li><a class="treeview-item" href="facultyRequestMedCert.php">Request for Medical Certificate</a></li>
              <li><a class="treeview-item" href="facultyRequestMedRecsCert.php">Request for Medical Records Certification</a></li>
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

   <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $count2;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $count2;  ?> new notifications.</li>

              <div class="app-notification__content">
                  <?php

                $count_sql="SELECT * from notif where user_id=$faculty_id  order by time desc";

                $result2 = mysqli_query($db, $count_sql);

                while ($row = mysqli_fetch_assoc($result2)) { 
                  $intval = intval(trim($row['time']));
                  if ($row['message_status']=='Delivered') {

                    
                    echo'
                  <b><li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">'.$row['message_body'].'</p>
                      <p class="app-notification__meta">'.timeago($row['time']).'</p>
                      <p class="app-notification__message"><form method="POST" action="../../php/change_notif_status.php">
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

              </a></li>
              </div>
              <li class="app-notification__footer"><a href="see_all_notif_faculty.php">See all notifications.</a></li>
            </ul>
          </li>
              
                 <li class="dropdown">
                  <a class="app-nav__item" style="width: 48px;" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <img class="rounded-circle" src="data:image/png;base64,<?php echo $_SESSION['photo'] ?>" style="width: 30px; height: 30px;">
                    
                </a>
                
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="User_Profiles.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
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
                
                <h3 class="mb-3 line-head">Consultation List</h3>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-auto">

                      
                   <div class="inline-block">
                    Consultation Type
                    <br>
                    <select class="bootstrap-select" id="myInput" data-table="reports-list" style="height: 35px;width: 200px">
                        <option class="select-item" value="" selected="selected">All</option>
                        <option class="select-item" value="Medical Consultation">Medical Consultation</option>
                        <option class="select-item" value="Dental Consultation">Dental Consultation</option>
                      </select>
                    </div>
                    &emsp;

                    <div class="inline-block">
                    Type of Communication
                    <br>
                    <select class="bootstrap-select" id="myInput" data-table="reports-list" style="height: 35px;width: 200px">
                        <option class="select-item" value="" selected="selected">All</option>
                        <?php
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from mode_of_communication");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['communication_mode']);?>"><?php echo htmlentities($result['communication_mode']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                      </select>
                    </div>

                    &emsp;
                                 
                    <div class="inline-block">
                    Status
                    <br>
                    <select class="bootstrap-select" id="myInput" data-table="reports-list" style="height: 35px;width: 200px">
                        <option class="select-item" value="" selected="selected">All</option>
                        <option class="select-item" value="Pending">Pending</option>
                        <option class="select-item" value="Ongoing">Approved</option>
                        <option class="select-item" value="Completed">Completed</option>
                   
                      </select>
                    </div>



                      </div>

                      <div class="col">
                        <br>
                          <div class="inline-block float ml-2 mt-1"><a class="btn btn-success btn-sm verify" href="StudentConsultationHistory.php" style="border-radius: 20px; padding: 5px; font-size: 12px;"><i class="fas fa-refresh"></i> &nbsp;Refresh</a></div>
                      </div>

                    
                    </div>
                  


                   

                    
                     

     <!--   <button class="btn btn-danger btn-sm verify" id="demoNotify" href="#" >Verify</button>-->
       
                     

            </div>
            </div>
            <div class="table-bd">
            <div class="table-responsive">
            <br>
                            
            <div id="table_clone" style="display: compact">
              <table  class="head">

      
                  <table class="table table-hover reports-list" id="sampleTable2">
        
                   <thead>



                      <tr>
                      <th scope="col">Complaint Date</th>
                      <th scope="col">Consultation type</th>
                      <th style="width:20%">Mode of Communication (First Option)</th>
                      <th style="width:20%">Mode of Communication (Second Option)</th>
                      <th scope="col">Appointment Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Status</th>
                      <th style="width: 10%">Cancellation Remarks</th>
                     <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>         <?php 

                     $db = mysqli_connect("localhost","root","","backupdb-3");

                     $uid=$_SESSION['id'];


                        $sql = "SELECT consultation.id,consultation.patient_id,consultation.date_filed,consultation.cancel_request_remarks,consultation_type.consultation_type,consultation.communication_mode_first_option,consultation.communication_mode_second_option, consultation.appointment_date, consultation.status, consultation.appointment_timefrom, consultation.consultation_duration from consultation join consultation_type on consultation.consultation_type=consultation_type.type_id
                          where patient_id='$uid' AND consultation.status != 'Completed'";

                    $res = $db->query($sql);
                    $cnt=1;
                    while($row = $res->fetch_assoc()) {
                    $date =date_create($row['date_filed']);
                    $date1 = date_format($date,"F d, Y");
                      ?>

                    <tr>
                    <td> <?php echo htmlentities($row['date_filed']);?></td>
                    <td> <?php echo htmlentities($row['consultation_type']);?></td>
                    <td class="max"><?php echo htmlentities($row['communication_mode_first_option']);?></td>
                    <td class="max"><?php echo htmlentities($row['communication_mode_second_option']);?></td>
                    <td><?php echo htmlentities($row['appointment_date']);?></td>
                    <td> <?php echo htmlentities($row['appointment_timefrom']);?></td>
                    <td><?php echo htmlentities($row['status']);?></td>
          <td><?php echo htmlentities($row['cancel_request_remarks']);?></td>
                    <td>
                      <?php if ($row['status']== "Completed" || $row['status']== "Pending Cancel Request" ||  $row['status']== "Request Granted" ){ 
           
            ?>
                     <button  class="btn btn-danger btn-sm" style="border-radius: 20px; padding: 5px; font-size: 12px; width: 100%;" disabled="disabled">Cancel</button>
                      <?php }else{
            ?>
             <a class="btn btn-danger btn-sm" data-toggle="modal" style="border-radius: 20px; padding: 5px; font-size: 12px; width: 100%;" href="#exampleModalLong<?php echo $row['id']; ?>">Cancel</a>
            
            
            <?php }
            include("cancelappointment.php");
            ?>
                    </td>
                     

                    </tr>
            <?php
  
  }?>
                  </tbody>
                  </table>      
              </div>
                </div>
              </div>
              </div>
            </div>
          </div>


         <!--<div class="page-error tile">-->

       <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                
                <h3 class="mb-3 line-head">Consultation History</h3>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-auto">

                      
                   <div class="inline-block">
                    Consultation Type
                    <br>
                    <select class="bootstrap-select" id="myInput" data-table="reports-list" style="height: 35px;width: 200px">
                        <option class="select-item" value="" selected="selected">All</option>
                        <option class="select-item" value="Medical Consultation">Medical Consultation</option>
                        <option class="select-item" value="Dental Consultation">Dental Consultation</option>
                      </select>
                    </div>
                    &emsp;

                    <div class="inline-block">
                    Type of Communication
                    <br>
                    <select class="bootstrap-select" id="myInput" data-table="reports-list" style="height: 35px;width: 200px">
                        <option class="select-item" value="" selected="selected">All</option>
                        <?php
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from mode_of_communication");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['communication_mode']);?>"><?php echo htmlentities($result['communication_mode']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                      </select>
                    </div>

                    &emsp;
                                 
                    <div class="inline-block">
                    Status
                    <br>
                    <select class="bootstrap-select" id="myInput" data-table="reports-list" style="height: 35px;width: 200px">
                        <option class="select-item" value="" selected="selected">All</option>
                        <option class="select-item" value="Cancelled">Cancelled</option>
                        <option class="select-item" value="Completed">Completed</option>
                   
                      </select>
                    </div>



                      </div>

                    
                    </div>
                  


                   

                    
                     

     <!--   <button class="btn btn-danger btn-sm verify" id="demoNotify" href="#" >Verify</button>-->
       
                     

            </div>
            </div>
            <div class="table-bd">
            <div class="table-responsive">
            <br>
                            
            <div id="table_clone" style="display: compact">
              <table  class="head">

      
                  <table class="table table-hover reports-list" id="myTable">
        
                   <thead>



                      <tr>
                      <th scope="col">Complaint Date</th>
                      <th scope="col">Consultation type</th>
                      <th scope="col">Mode of Communication (First Option)</th>
                      <th scope="col">Mode of Communication (Second Option)</th>
                      <th scope="col">Appointment Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Status</th>
                      <th class="max">Cancellation Remarks</th>
                    
                    </tr>
                  </thead>
                  <tbody>         <?php 

                     $db = mysqli_connect("localhost","root","","backupdb-3");

                     $uid=$_SESSION['id'];

                        $sql = "SELECT consultation.id,consultation.patient_id,consultation.date_filed,consultation.cancel_request_remarks,consultation_type.consultation_type,consultation.communication_mode_first_option,consultation.communication_mode_second_option, consultation.appointment_date, consultation.status, consultation.appointment_timefrom, consultation.consultation_duration from consultation join consultation_type on consultation.consultation_type=consultation_type.type_id
                          where patient_id='$uid' AND (consultation.status = 'Completed' OR consultation.status = 'Request Granted')";

                    $res = $db->query($sql);
                    $cnt=1;
                    while($row = $res->fetch_assoc()) {
          $date =date_create($row['date_filed']);
              $date1 = date_format($date,"F d, Y");
                      ?>

                    <tr>
                    <td> <?php echo htmlentities($row['date_filed']);?></td>
                    <td> <?php echo htmlentities($row['consultation_type']);?></td>
                    <td><?php echo htmlentities($row['communication_mode_first_option']);?></td>
                    <td><?php echo htmlentities($row['communication_mode_second_option']);?></td>
                    <td>
                     <?php
                        if(empty($row['appointment_date'])){
                          echo '<i>Null</i>';

                        }else{
                          echo $row['appointment_date'];

                        }
                        ?>
                    </td>
                    <td> 
                      <?php
                        if(empty($row['appointment_timefrom'])){
                          echo '<i>Null</i>';

                        }else{
                          echo $row['appointment_timefrom'];

                        }
                        ?>
                    <td>

                        <?php
                        if(($row['status'])=='Request Granted'){
                          echo 'Cancelled';
                        }
                        else{
                          echo 'Completed';

                        }
                        ?>
                        
                    </td>

                    <td>

                        <?php
                        if(empty($row['cancel_request_remarks'])){
                          echo 'N/A';

                        }else{
                          echo $row['cancel_request_remarks'];

                        }
                        ?>
                        
                    </td>

                     

                    </tr>
            <?php
  
  }?>
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

         
                  
                </div>

<?php
if(isset($_POST['cancelappointment'])){     
   $patient_id= $_POST['idx'];
   $mcomment= $_POST['reason'];
  $sql = "Update consultation set status='Pending Cancel Request', reason_cancel='$mcomment', request_cancel_date= now() where id='$patient_id'"; 
   if ($db->query($sql) === TRUE) {

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='Clinic' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);


$admin_id= $request['staff_id'];

$notif_body = " ".$_SESSION['fullname']." filed a request for cancellation of appointment.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status, office_id) values ('$admin_id', '$notif_body',now(),'../users/Clinic/Admin-CancellationOfAppointment.php', 'Delivered', '3')");
  echo '<script>
      swal({
      title: "Cancellation request submitted successfully!",
      text: "Server Request Successful!",
      type:"success",
      icon: "success",
      button: false,
      closeOnClickOutside: false,
      closeOnEsc: false,
      }).then(function() {
    window.location = "StudentConsultationHistory.php";
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
 echo"<meta http-equiv='refresh' content='2'>";
   } 
  
   ?>
      
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
    padding:1%;
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
            html2canvas(document.getElementById('myTable'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("ConsultationReports.pdf");
                }
            });
        }
    </script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="jsc/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="jsc/plugins/dataTables.bootstrap.min.js"></script>
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