<?php 
  session_start();
   include('../../conn.php');
  
  
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

          $result1 = mysqli_query($conn, $count_sql);

          $count = 0;

          while ($row = mysqli_fetch_assoc($result1)) {                             

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
      <title>USeP Faculty Head Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../../css/main2.css">
          <link rel="stylesheet" type="text/css" href="../../css/upstyle2.css">
          <link rel="stylesheet" type="text/css" href="../../css/upstyle_shy.css">
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
      <body class="app sidebar-mini rtl" onload="initClock()">
      <!-- Navbar-->

        
      <header class="app-header">
    
   
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
                <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Labor Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a class="treeview-item " href="Home-Labor.php">Home</a></li>
                    <li><a class="treeview-item active" href="Labor-Requisition.php">Requisition Form</a></li>
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
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="facultyHome.php">Home</a></li>
              <li><a class="treeview-item" href="facultyClinic_Privacy_Policy.php">Consultation</a></li>
              <li><a class="treeview-item" href="facultyConsultationHistory.php">Consultation History</a></li>
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
            if($result = mysqli_query($conn, "SELECT * FROM list_of_semester WHERE status = 'Active'")){
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


   <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $count;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $count;  ?> new notifications.</li>

              <div class="app-notification__content">
                  <?php

                $count_sql="SELECT * from notif where user_id=$faculty_id  order by time desc";

                $result2 = mysqli_query($conn, $count_sql);

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
              <li class="app-notification__footer"><a href="facultySeeAllNotif.php">See all notifications.</a></li>
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
    <div class="red"></div>

        
      <br>
      

         <!--<div class="page-error tile">-->

       <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <div class="float-left"><h4>Requisition Forms History</h4></div>
                  </div>
                  <br><br>
                </div>
                  <div class="table-bd">
                    <div class="table-responsive">
                      <br>
                      <table class="table table-hover table-bordered" id="requisition-history">
                        <thead>
                          <tr>
                            <th>Requisition ID</th>
                            <th>Date Submitted</th>
                            <th>SL Needed</th>
                            <th>No. of Applicants</th>
                            <th>No. Hired</th>
                            <th>Status</th>
                            <th>Form</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>  
    </main>


                    <div class="modal fade " id="view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Requisition</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                           <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th style="border: 1px solid #404040;" rowspan="5"><img src="../../images/logo.png" width="100px;"></th> 
                                      <th style="border: 1px solid #404040;" rowspan="5" class="text-center">
                                        <span class="fs-11 d-block">Republic of the Philippines</span>
                                        <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span>
                                        <span class="fs-11 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                        <span class="fs-11 d-block">Telephone: (082) 227-8192</span>
                                        <span class="fs-11 d-block">Website: www.usep.edu.ph</span>
                                        <span class="fs-11 d-block">Email: president@usep.edu.ph</span>
                                      </th>  
                                      <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="">Form No. </th>
                                      <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">FM-USeP-HSC-01
                                      </th>
                                    </tr>
                                    <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Issue Status  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;"colspan="2">02</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Revision No.  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Date Effective  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01 March 2018
                                     </th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Approved by </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">President
                                     </th>
                                   </tr>
                                   <tr>
                                    <th  style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">STUDENT LABOR REQUISITION FORM
                                    </th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                          </div>
                        </div>  



                        <div class="row p-5">
                          <div class="col-md-12">
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                </thead>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;" colspan="2">Request Date: <u><span class="fetched-text-data" id="_date_submitted"></span></u></th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;" width="50%">College/Unit: <br><u><span class="fetched-text-data" id="_college_unit"></span></u></th>
                                  <th style="border: 2px solid #6b6b6b;" width="50%">Requested by: Head of Unit/College<br>
                                    <u><span class="fetched-text-data" id="_college_unit_head"></span></u>
                                  </th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">Department/Division: <br><u><span class="fetched-text-data" id="_dept_div"></span></u></th>
                                  <th style="border: 2px solid #6b6b6b;" rowspan="2">Requested by: Head of Department/Division<br>
                                    <u><span class="fetched-text-data" id="_dept_div_head"></span></u>
                                  </th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">No. of SL: <input class="form-control fc2 w-50 pl-2 fetched-input-data" type="text" id="_no_of_sl" disabled=""></th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">
                                    JOB DETAILS:
                                    <p>Tenure: Temporary</p>

                                    <p>Length of Service (months): <input class="form-control fc2 w-25 pl-2 fetched-input-data" type="text" id="_length_of_service" disabled=""></p>
                                  </th>
                                  <th style="border: 2px solid #6b6b6b;">
                                    Qualification required/desired:
                                    <p>1.) <input class="form-control fc2 w-75 pl-2 fetched-input-data" type="text" id="_qualification1" disabled=""><br>
                                     2.) <input class="form-control fc2 w-75 pl-2 fetched-input-data" type="text" id="_qualification2" disabled=""><br>
                                     3.) <input class="form-control fc2 w-75 pl-2 fetched-input-data" type="text" id="_qualification3" disabled=""><br>
                                   </p>

                                   <p>Special skill (if required:)
                                    <input class="form-control fc2 w-100 pl-2 fetched-input-data" type="text" id="_skill1" disabled="">
                                    <input class="form-control fc2 w-100 pl-2 fetched-input-data" type="text" id="_skill2" disabled="">
                                  </p>

                                </th>
                              </tr>
                              <tr>
                                <th style="border: 2px solid #6b6b6b;">
                                  Reason for requirement: (Tick the appropriate)
                                  <br><input type="checkbox" class="mr-1 fetched-chkbox-data" id="_additional_workload_reason" disabled="">Additional work Load (Quantify it) 
                                  <br><input type="checkbox" class="mr-1 fetched-chkbox-data" id="_reduction_workload_reason" disabled="">For reduction in work Load (Quantify it)
                                  <br><input type="checkbox" class="mr-1 fetched-chkbox-data"  id="_skill_saturation_reason" disabled="">Existing Members reached saturation level in 
                                  <br class="ml-5">Knowledge and Skill
                                </th>
                                <th style="border: 2px solid #6b6b6b;">
                                 Resignation/Termination/Death/Re-location (for whom)
                                 <br>
                                 Any other reason, please specify
                                 <br>
                                 <u class="fc2 w-75" ><span class="fetched-text-data" id="_other_reason"></span></u>
                               </th>
                             </tr>
                             <tr>
                              <th style="border: 2px solid #6b6b6b;">Assessed by: </th>
                              <th style="border: 2px solid #6b6b6b;" class="text-center"><u style="margin-top: -10px">
                                <img id="assessor_signature" class="e-sign" height="150" width="150" style="margin-bottom:-70px; margin-top:-50px; position:relative; margin-right:60px; margin-left: 60px" src="../../images/transparentbg.png" /><br>
                                <span class="fetched-text-data text-uppercase" id="_assessed_by"></span></u></th>
                            </tr>
                            <tr>
                              <th style="border: 2px solid #6b6b6b;">Approved / Not approved:</th>
                              <th style="border: 2px solid #6b6b6b;"><u><span class="fetched-text-data" id="_status"></span></u></th>
                            </tr>
                          </table>
                        </div>


                                </div>
                              </div> 
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                    </div>

            <!-- Fill up Requisition Form Modal -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="reqform">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <form id="requisitionfrm">  
                            <div class="modal-header">
                              <h5 class="tile-title">Student Labor Requisition Form</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body"> 
                              <div class="row">
                                  <div class="col-sm">
                                    <div class="form-group">
                                      <label class="control-label">Select Office:</label><br>
                                        <div class="row mb-2">
                                          <div class="col-sm-6">
                                             Requested by Head of Unit/College
                                          <input class="form-control mb-1 fetched-data" type="text" id="head_office" name="head_office" disabled>
                                          </div>
                                          <div class="col-sm-6">
                                             Requested by Unit/College
                                          <input class="form-control mb-1 fetched-data" type="text" id="head_office_name" name="head_office_name" disabled>
                                          </div>
                                        </div>
                                        <div class="row mb-2">
                                          <div class="col-sm-6">
                                             Requested by Head of Department/Division
                                          <input class="form-control mb-1 fetched-data" type="text" id="head_dept" name="head_dept" disabled>
                                          </div>
                                          <div class="col-sm-6">
                                             Requested by Department/Division
                                          <input class="form-control mb-1 fetched-data" type="text" id="head_dept_name" name="head_dept_name" disabled>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row m-2">
                                  <div class="col-sm-6">
                                    <div class="form-group row">
                                     <label class="control-label blck">No. of SL:</label>
                                      <input class="form-control d-inline ml-3" style="width:200px;" type="number" placeholder="" id="sl_no" name="sl_no" required>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group row">
                                      <label class="control-label">Length of Service (months):</label>
                                      <input class="form-control d-inline ml-3" style="width:50px;" type="text" placeholder="" name="service_length">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                      <div class="col-sm">
                                        <div class="form-group">
                                          <label class="control-label">Qualification required/Desire:</label>
                                          <br>1.) <input class="form-control d-inline w-75 mb-1" type="text" id="qualification1" name="qualification1"><br>
                                          2.) <input class="form-control d-inline w-75 mb-1" type="text" id="qualification2" name="qualification2"><br>
                                          3.) <input class="form-control d-inline w-75 mb-1" type="text" id="qualification3" name="qualification3"><br>
                                        </div>
                                      </div>

                                      <div class="col-sm">
                                        <div class="form-group">
                                          <label class="control-label">Special Skill (if required):</label>
                                          <br>1.) <input class="form-control d-inline w-75 mb-1" type="text" id="skill1" name="skill1"><br>
                                          2.) <input class="form-control d-inline w-75 mb-1" type="text" id="skill2" name="skill2"><br>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm">
                                        <div class="form-group">
                                          <label class="control-label">Reason for requirement:</label>
                                          <br><input type="checkbox" class="mr-1" value="1" name="additional_workload">Additional work Load (Quantify it) 
                                          <br><input type="checkbox" class="mr-1" value="1" name="reduction_workload">For reduction in work Load (Quantify it)
                                          <br><input type="checkbox" class="mr-1"value="1" name="skill_saturation">Existing Members reached saturation level in Knowledge and Skill
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm">
                                        <div class="form-group">
                                          <label class="control-label">Resignation/Termination/Death/Re-location (for whom)</label><br>
                                          <label class="control-label">Any other reason, please specify</label>
                                          <br><input class="form-control d-inline mb-1" type="text" name="other_reason"><br>
                                        </div>
                                      </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" >Submit</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                          </form>                           
                        </div>
                      </div>
                    </div>  

            <!-- Edit up Requisition Form Modal -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="editreqform">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <form id="editrequisitionfrm">  
                            <div class="modal-header">
                              <h5 class="tile-title">Student Labor Requisition Form</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="requisition_id" id="requisition_id"> 
                              <div class="row">
                                  <div class="col-sm">
                                    <div class="form-group">
                                      <label class="control-label">Select Office:</label><br>
                                        <div class="row mb-2">
                                          <div class="col-sm-6">
                                             Requested by Head of Unit/College
                                          <input class="form-control mb-1 fetched-data" type="text" id="edit_head_office" name="edit_head_office" disabled>
                                          </div>
                                          <div class="col-sm-6">
                                             Requested by Unit/College
                                          <input class="form-control mb-1 fetched-data" type="text" id="edit_head_office_name" name="edit_head_office_name" disabled>
                                          </div>
                                        </div>
                                        <div class="row mb-2">
                                          <div class="col-sm-6">
                                             Requested by Head of Department/Division
                                          <input class="form-control mb-1 fetched-data" type="text" id="edit_head_dept" name="edit_head_dept" disabled>
                                          </div>
                                          <div class="col-sm-6">
                                             Requested by Department/Division
                                          <input class="form-control mb-1 fetched-data" type="text" id="edit_head_dept_name" name="edit_head_dept_name" disabled>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row m-2">
                                  <div class="col-sm-6">
                                    <div class="form-group row">
                                     <label class="control-label blck">No. of SL:</label>
                                      <input class="form-control d-inline ml-3" style="width:200px;" type="number" placeholder="" id="edit_sl_no" name="edit_sl_no" required>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group row">
                                      <label class="control-label">Length of Service (months):</label>
                                      <input class="form-control d-inline ml-3" style="width:50px;" type="text" name="edit_service_length" id="edit_service_length" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                      <div class="col-sm">
                                        <div class="form-group">
                                          <label class="control-label">Qualification required/Desire:</label>
                                          <br>1.) <input class="form-control d-inline w-75 mb-1" type="text" id="edit_qualification1" name="edit_qualification1" required><br>
                                          2.) <input class="form-control d-inline w-75 mb-1" type="text" id="edit_qualification2" name="edit_qualification2"><br>
                                          3.) <input class="form-control d-inline w-75 mb-1" type="text" id="edit_qualification3" name="edit_qualification3"><br>
                                        </div>
                                      </div>

                                      <div class="col-sm">
                                        <div class="form-group">
                                          <label class="control-label">Special Skill (if required):</label>
                                          <br>1.) <input class="form-control d-inline w-75 mb-1" type="text" id="edit_skill1" name="edit_skill1" required><br>
                                          2.) <input class="form-control d-inline w-75 mb-1" type="text" id="edit_skill2" name="edit_skill2"><br>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm">
                                        <div class="form-group">
                                          <label class="control-label">Reason for requirement:</label>
                                          <br><input type="checkbox" class="mr-1" value="1" name="edit_additional_workload" id="edit_additional_workload">Additional work Load (Quantify it) 
                                          <br><input type="checkbox" class="mr-1" value="1" name="edit_reduction_workload" id="edit_reduction_workload">For reduction in work Load (Quantify it)
                                          <br><input type="checkbox" class="mr-1"value="1" id="edit_skill_saturation" name="edit_skill_saturation">Existing Members reached saturation level in Knowledge and Skill
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm">
                                        <div class="form-group">
                                          <label class="control-label">Resignation/Termination/Death/Re-location (for whom)</label><br>
                                          <label class="control-label">Any other reason, please specify</label>
                                          <br><input class="form-control d-inline mb-1" type="text" name="edit_other_reason" id="edit_other_reason"><br>
                                        </div>
                                      </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" >Submit</button>
                            </div>
                          </form>                           
                        </div>
                      </div>
                    </div>



      <!-- Essential javascripts for application to work-->
      
      <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
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
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>  <!-- Google analytics script-->
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>  <!-- Google analytics script--> <!-- Google analytics script-->
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
        $(document).ready( function(){
          var currentreq_id = 0;
          GetFacultyHeadInfo();
          var tbl = $('#requisition-history').DataTable({
              serverside: false,
              ajax : {
                url : "../../php/M-FacultyHead/getRequisitionFormHistory.php",
                data : "",
                dataSrc : "",
                error: function(response){
                    alert(response);
                }
              },
              columns : [
                { data : "requisition_id"},
                { data : "date_submitted"},
                { data : "no_of_sl"},
                { data : "no_of_applicants"},
                { data : "no_of_hired"},
                { data : "requisition_status", className: "check-stat"},
                { 
                  data : null,
                  render : function ( data, type, row){
                    return'<button class="btn btn-info btn-sm view-form mr-2" id="'+row['requisition_id']+'" data-toggle="modal" data-target="#view-modal" ><i class="fas fa-eye"></i></button><a class="btn btn-danger btn-sm" href="Print-Requisition.php?reqid='+row['requisition_id']+'" target="_blank"><i class="fas fa-print"></i></a>';
                  }
                },
                {
                  data : null,
                  render : function ( data, type, row){
                    var stat = row['requisition_status'];
                    var str = '';
                    if (stat == 'Pending'){
                      str = '<button class="btn btn-danger btn-sm edit-req-form" data-toggle="modal" data-target="#editreqform" id="'+row['requisition_id']+'"><i class="fas fa-edit"></i></button>';
                    } else {
                      str = '<button class="btn btn-secondary btn-sm" disabled><i class="fas fa-edit"></i></button>';
                    }
                    return str;
                  }
                }
              ],
              dom: 'Bfrtip',
              buttons: [
                    {
                        text: 'ADD <i class="fa fa-plus pl-3" aria-hidden="true"></i>',
                        className : 'btn btn-danger btn-sm',
                        action: function ( e, dt, node, config ) {
                          var count = 0;
                          $( ".check-stat" ).each(function( index ) {
                            if (($(this).text()!='Completed' && $(this).text()!='Not Approved' ) && index > 0){
                              count++;
                            }
                          });
                          if (count > 0){
                            swal("Oops!", "You cannot submit another requisition form as long as you still have an on going form!", "warning");
                          } else {
                            $('#reqform').modal('toggle');
                          }
                        }
                    }
                ]
          });


          function GetFacultyHeadInfo(){
            $.ajax({
                  url:"../../php/M-FacultyHead/getHeadInfo.php",
                  method:"POST",
                  data:{},
                  success:function(response)
                    {
                      try {
                        var obj = JSON.parse(response);
                          if(obj[0].office_type=='Office'){
                            $('#head_office').val(obj[0].fullname);
                            $('#head_office_name').val(obj[0].name);
                            $('#edit_head_office').val(obj[0].fullname);
                            $('#edit_head_office_name').val(obj[0].name);
                          } else {
                            $('#head_dept').val(obj[0].fullname);
                            $('#head_dept_name').val(obj[0].name);
                            $('#edit_head_dept').val(obj[0].fullname);
                            $('#edit_head_dept_name').val(obj[0].name);
                          }
                      } catch (e) {
                        $('.fetched-data').val('');
                      }
                    },
                  error: function(response){
                    $('.fetched-data').val('');
                    alert("fail" + JSON.stringify(response));
                  }
              });
          }

          $(document).on("submit","#requisitionfrm",function(e){
             e.preventDefault();
            $.ajax({
                url:"../../php/M-FacultyHead/submitRequisitionForm.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(response)
                 {
                    if (response.length == 0){
                      swal("Success!", "Your requisition form has been sent successfully to OSAS. Check your notifications daily for updates!", "success");
                      $('#reqform').modal('toggle');
                      $("#requisitionfrm")[0].reset();
                      tbl.ajax.reload();
                    } else {
                      swal("Server Error!", "An error has occurred. Application was not submitted Successfuly. Please fill it again.", "warning");
                      console.log("An error has occurred. Application was not submitted Successfuly. Please fill it again. Error :"+response);
                    }                                          
                 },
                error: function(response){
                    swal("Server Error!", "An error has occurred. Application was not submitted Successfuly. Please fill it again.", "warning");
                    console.log("fail" + JSON.stringify(response));
                 }
                });
          });


          $(document).on("click",".view-form",function(){
              resetInfo();
              currentreq_id = $(this).attr("id");
              getRequisitionInfo('view');
          });

          function getRequisitionInfo(action){
            $('#assessor_signature').attr('src','../../images/transparentbg.png');
              $.ajax({
                    url:"../../php/M-Admin/getRequisitionFormInfo.php",
                    method:"POST",
                    data:{req_id:currentreq_id},
                    success:function(response)
                      {
                        try {
                          var obj = JSON.parse(response);
                          if (action=='view'){
                            $('#_date_submitted').text(obj[0].date_submitted);
                            if (obj[0].office_type == 'Office') {
                                $('#_college_unit').text(obj[0].office_name);
                                $('#_college_unit_head').text(obj[0].fullname);
                            } else {
                                $('#_dept_div').text(obj[0].office_name);
                                $('#_dept_div_head').text(obj[0].fullname);
                            }
                            $('#_no_of_sl').val(obj[0].no_of_sl);
                            $('#_length_of_service').val(obj[0].length_of_service);
                            $('#_qualification1').val(obj[0].qualification1);
                            $('#_qualification2').val(obj[0].qualification2);
                            $('#_qualification3').val(obj[0].qualification3);
                            $('#_skill1').val(obj[0].skill1);
                            $('#_skill2').val(obj[0].skill2);
                            if (obj[0].additional_workload_reason == 1){
                              $('#_additional_workload_reason').prop("checked","true");
                            }
                            if (obj[0].reduction_in_workload_reason == 1){
                              $('#_reduction_workload_reason').prop("checked","true");
                            }
                            if (obj[0].reached_saturation_reason   == 1){
                              $('#_skill_saturation_reason').prop("checked","true");
                            }
                            if (obj[0].other_reason.length > 0) {
                              $('#_other_reason').text(obj[0].other_reason);
                            }
                            if (obj[0].assessed_by != null) {
                              $('#assessor_signature').attr('src','data:image/jpeg;base64,'+obj[0].assessor_signature);
                              $('#_assessed_by').text(obj[0].assessed_name);
                            }
                            if (obj[0].date_approved_disapproved != null) {
                              $('#_status').text(obj[0].requisition_status);
                            }
                          } else {
                            if (obj[0].office_type == 'Office') {
                                $('#edit_head_office').val(obj[0].office_name);
                                $('#edit_head_office_name').val(obj[0].fullname);
                            } else {
                                $('#edit_head_dept').val(obj[0].office_name);
                                $('#edit_head_dept_name').val(obj[0].fullname);
                            }
                            $('#edit_sl_no').val(obj[0].no_of_sl);
                            $('#edit_service_length').val(obj[0].length_of_service);
                            $('#edit_qualification1').val(obj[0].qualification1);
                            $('#edit_qualification2').val(obj[0].qualification2);
                            $('#edit_qualification3').val(obj[0].qualification3);
                            $('#edit_skill1').val(obj[0].skill1);
                            $('#edit_skill2').val(obj[0].skill2);
                            if (obj[0].additional_workload_reason == 1){
                              $('#edit_additional_workload').prop("checked","true");
                            }
                            if (obj[0].reduction_in_workload_reason == 1){
                              $('#edit_reduction_workload').prop("checked","true");
                            }
                            if (obj[0].reached_saturation_reason   == 1){
                              $('#edit_skill_saturation').prop("checked","true");
                            }
                            if (obj[0].other_reason.length > 0) {
                              $('#edit_other_reason').text(obj[0].other_reason);
                            }
                          }
                            
                        } catch (e) {
                          swal("Server Error!", "An error occurred. Please reload page and redo your actions.", "warning");

                          console.log("Data failed to load. Error :"+e);
                        }
                      },
                    error: function(response){
                      swal("Server Error!", "An error occurred. Please reload page and redo your actions.", "warning");
                      console.log("An error occurred :" + JSON.stringify(response));
                    }
              });
          }

          $(document).on("click",".edit-req-form",function(){
            var currentRow = $(this).closest("tr");
            currentreq_id =  currentRow.find("td:eq(0)").text();
            $('#requisition_id').val(currentreq_id);
              getRequisitionInfo('edit');

          });

          $(document).on("submit","#editrequisitionfrm",function(e){
            e.preventDefault();
            $.ajax({
                url:"../../php/M-FacultyHead/updateRequisitionForm.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(response)
                 {
                    if (response.length == 0){
                      swal("Success!", "Your requisition form has been editted.", "success");
                      $('#editreqform').modal('toggle');
                      $("#editrequisitionfrm")[0].reset();
                      tbl.ajax.reload();
                    } else {
                      swal("Server Error!", "An error has occurred. Application was not submitted Successfuly. Please fill it again.", "warning");
                      $('#editreqform').modal('toggle');
                      $("#editrequisitionfrm")[0].reset();
                      console.log("An error has occurred. Application was not submitted Successfuly. Please fill it again. Error :"+response);
                    }                                          
                 },
                error: function(response){
                    $('#editreqform').modal('toggle');
                    $("#editrequisitionfrm")[0].reset();
                    swal("Server Error!", "An error has occurred. Application was not submitted Successfuly. Please fill it again.", "warning");
                    console.log("fail" + JSON.stringify(response));
                 }
                });

          });

          function resetInfo(){
            $('.fetched-input-data').val('');
            $('.fetched-text-data').text('');
            $('.fetched-chkbox-data').prop("checked",false);
          }

        });
      </script>
    </body>
  </html>