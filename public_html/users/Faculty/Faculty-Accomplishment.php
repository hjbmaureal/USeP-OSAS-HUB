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


      $sql1 = "SELECT staff.*, office.office_name FROM staff 
              JOIN office ON staff.office_id = office.office_id  WHERE staff.office_id='4' AND staff.account_status='Active'"; //admin-staff_id_to
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
                  $admin_id = $row['staff_id'];
                  $f_name = $row['first_name'];
                  $m_name = $row['middle_name'];
                  $l_name = $row['last_name'];
                  $position = $row['position'];
                  $off = $row['office_name'];
         }
       }


          $count_sql="SELECT * from notif where user_id='$faculty_id' and message_status='Delivered'";

          $result1 = mysqli_query($conn, $count_sql);

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
      <title>USeP Faculty Hub</title>
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
  <body class="app sidebar-mini rtl"onload="initClock()">
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
                <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">FACULTY HUB</p>
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
                    <li><a class="treeview-item " href="Labor-Requisition.php">Requisition Form</a></li>
                    <li><a class="treeview-item" href="Labor-Applicants.php">Student Applicants</a></li>
                    <li><a class="treeview-item" href="Labor-DTR.php">Student DTR</a></li>
                    <li><a class="treeview-item active" href="Faculty-Accomplishment.php">Accomplishment Reports</a></li>
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

   <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $count2;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $count2;  ?> new notifications.</li>

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
              <li class="app-notification__footer"><a href="see_all_notif_faculty.php">See all notifications.</a></li>
            </ul>
          </li>
              
                 <li class="dropdown">
                  <a class="app-nav__item" style="width: 48px;" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <img class="rounded-circle" src="data:image/png;base64,<?php echo $_SESSION['photo'] ?>" style="max-width:100%;">
                </a>
                
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="Guidance_FacultyUser.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
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
                                    <div class="float-left"><h4>Accomplishment Report</h4></div>
                                  </div>
                                  <br><br>
                                  <div class="row">

                                    <div class="col">
                                      <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify " id="print-accomplishment-reports"><i class="fas fa-print"></i>&nbsp; Print</button></div> 
                                    </div>

                                  </div>
                                </div>
                                <div class="table-bd">
                                  <div class="table-responsive">
                                    <br>
                                    <table class="table table-hover table-bordered" id="reports-table">
                                    <thead>
                                        <tr>
                                          <th>SL ID</th>
                                          <th class="max">Full Name</th>
                                          <th>Course</th>
                                          <th>Period</th>
                                          <th class="collapse"></th>
                                          <th class="collapse"></th>
                                          <th>Salary</th>
                                          <th>Salary Status</th>
                                          <th style="width:40px" class="text-center align-middle">Rate</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                     <tr>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td class="collapse"></td>
                                       <td class="collapse"></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                     </tr>
                                   </tfoot>
                                 </table>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>  
                      <?php 
                        if(isset($_POST['submitRating'])){
                          $applicant =$_POST['report_applicant'];
                          $date_from =$_POST['report_date_from'];
                          $date_to =$_POST['report_date_to'];
                          $period = $_POST['report_period'];
                          // var_dump($_POST['report_period']);
                          $n1 =$_POST['n1'];
                          $n2 =$_POST['n2'];
                          $n3 =$_POST['n3'];
                          $n4 =$_POST['n4'];
                          $n5 =$_POST['n5'];
                          $n6 =$_POST['n6'];
                          $n7 =$_POST['n7'];
                          $n8 =$_POST['n8'];
                          $n9 =$_POST['n9'];
                          if(!mysqli_query($conn, "INSERT INTO accomplishment_rating (applicant_id, duty_regularly, instruction_difficulty, time_utilize, routine_work, initiative_creativity, accurate_efficient, good_interpersonal, willing_learn, good_working,date_from,date_to) VALUES ($applicant,'$n1','$n2','$n3','$n4','$n5','$n6','$n7','$n8','$n9','$date_from','$date_to')")){
                            echo ($conn -> error);
                          } else {
                            if(!mysqli_query($conn, "INSERT INTO notif (message_body,link,office_id) VALUES ('A Unit Head has submitted his/her ratings for an applicant for the period $period','../users/Osas/Labor-Accomplishment.php', 1)")){
                              echo ($conn -> error);
                            }                            
                          }
                        }                        
                      ?>
                    <form method="POST" action="">
                     <div class="modal fade " id="view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Accomplishment Report</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>`
                          </div>
                          <div class="modal-body">
                            <input type="text" class="collapse" id="report-applicant-id" name="report_applicant">
                            <input type="text" class="collapse" id="report_date_from" name="report_date_from">
                            <input type="text" class="collapse" id="report_date_to" name="report_date_to">

                            <input type="text" class="collapse" id="report_period" name="report_period">

                            <div class="row pl-4 pr-4 mt-2">
                              <div class="col-sm">

                                <div class="row">
                                  <div class="col-sm">
                                    <div class="form-group fg2">
                                      <label class="control-label cl s12">Name:</label>

                                      <input class="form-control fc2 pl-2 s12"style="width:250px;color:#000;"type="text"disabled="" id="report-applicant-name">

                                      <label class="control-label cl s12 ml-2">Course & Year:</label>

                                      <input class="form-control fc2 pl-2 s12" style="width:150px;color:#000;" type="text" id="report-course-year" disabled="">

                                      <label class="control-label cl s12 ml-2">Class:</label>

                                      <input class="form-control fc2 pl-2 s12" style="width:100px;color:#000;" type="text" id="report-labor-class" disabled="">

                                      <br>

                                      <label class="control-label cl s12">Type of Student Labor:</label>

                                      <input class="form-control fc2 w-10 pl-2 s12" type="text" id="report-labor-type" disabled="">

                                      <br>

                                      <label class="control-label cl s12">Unit/College Assigned:</label>

                                      <input class="form-control fc2 w-50 pl-2 s12" type="text" id="report-assigned-unit" disabled="">
                                    </div>
                                  </div>
                                </div>

                                  <div class="row mt-3 p-7">
                                    <div class="col-sm-12" id="report-tasks-list">
                                      <h6 class="font-weight-bold s12"> I. &emsp;&emsp;&emsp;&emsp;ACCOMPLISHMENT TASK for the period &emsp;&emsp;&emsp;&emsp;<span id="period"></span><br></h6><br>
                                    </div>
                                  </div> 
                                  <div class="row mt-3 p-7 ">
                                    <div class="col-sm">
                                      <h6 class="font-weight-bold s22 d-inline"> II. &emsp;&emsp;&emsp;&emsp;TOTAL NUMBER OF HOURS WORKED: <input class="form-control pl-2 fc2 ml-1 w85 text-center d-inline" style="color: #000;" type="text" value="" disabled="" id="report-total-hours"> <br></h6>
                                    </div>
                                  </div> 

                                  <div class="row mt-3 p-7 ">
                                    <div class="col-sm">
                                      <h6 class="font-weight-bold s22"> III. &emsp;&emsp;&emsp;&emsp;PERFORMANCE RATING: <br></h6>


                                      <div class="table-responsive">
                                        <table class="table table-bordered" >
                                          <thead>
                                            <tr>
                                              <th class="text-center align-middle p-1" style="border: 2px solid #999ea3 !important;" rowspan="2" width="60%">CRITERIA</th>
                                              <th class="text-center align-middle p-1" style="border: 2px solid #999ea3 !important;" colspan="3">SUPERVISOR'S RATING</th>
                                            </tr>
                                            <tr>

                                              <th class="text-center align-middle p-1" style="border: 2px solid #999ea3 !important;" width="15%">Excellent</th>
                                              <th class="text-center align-middle p-1" style="border: 2px solid #999ea3 !important;" width="15%">Satisfactory</th>
                                              <th class="text-center align-middle p-1" style="border: 2px solid #999ea3 !important;" width="15%">Need Improvement</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td style="border: 2px solid #999ea3 !important;">Report on duty regularly</td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n1" value="Excellent"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n1" value="Satisfactory"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n1" value="Need Improvement"></td>
                                            </tr>
                                            <tr>
                                              <td style="border: 2px solid #999ea3 !important;">Follow instruction without much difficulty</td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n2" value="Excellent"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n2" value="Satisfactory"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n2" value="Need Improvement"></td>
                                            </tr>
                                            <tr>
                                              <td style="border: 2px solid #999ea3 !important;">Utilize time wisely/perform task without delay</td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n3" value = "Excellent"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n3" value = "Satisfactory"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n3" value = "Need Improvement"></td>
                                            </tr>
                                            <tr>
                                              <td style="border: 2px solid #999ea3 !important;">Do his/her routine work without being told</td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n4" value = "Excellent"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n4" value = "Satisfactory"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n4" value = "Need Improvement"></td>
                                            </tr>
                                            <tr>
                                              <td style="border: 2px solid #999ea3 !important;">Show initiative & creativity in doing the task</td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n5" value = "Excellent"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n5" value = "Satisfactory"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n5" value = "Need Improvement"></td>
                                            </tr>
                                            <tr>
                                              <td style="border: 2px solid #999ea3 !important;">Accurate & efficientin doing clerical work</td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n6" value = "Excellent"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n6" value = "Satisfactory"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n6" value = "Need Improvement"></td>
                                            </tr>
                                            <tr>
                                              <td style="border: 2px solid #999ea3 !important;">With good interpersonal relationship</td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n7" value = "Excellent"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n7" value = "Satisfactory"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n7" value = "Need Improvement"></td>
                                            </tr>
                                            <tr>
                                              <td style="border: 2px solid #999ea3 !important;">Willing to learn from mistakes and/or new task</td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n8" value = "Excellent"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n8" value = "Satisfactory"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n8" value = "Need Improvement"></td>
                                            </tr>
                                            <tr>
                                              <td style="border: 2px solid #999ea3 !important;">Generally have a good working attitude</td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n9" value = "Excellent"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n9" value = "Satisfactory"></td>
                                              <td class="align-middle text-center" style="border: 2px solid #999ea3 !important;"><input type="radio" name="n9" value = "Need Improvement"></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div> 

                                    </div>
                                  </div>

                                  <div class="row mt-4">
                                    <div class="col-sm">
                                      <div class="form-group fg float-right text-center">
                                        <input class="form-control pl-2 fc2 w200 text-center text-uppercase bg-transparent" style="color: #000;" type="text" id="head-name" readonly>
                                        <br>
                                        <label class="control-label cl text-center">Print Name and Signature</label>
                                      </div>
                                    </div>
                                  </div>

                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="submitRating">Submit</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
</main>



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
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

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
        $(document).ready( function(){
                        
          var tbl = $('#reports-table').DataTable({
              serverside: false,
              ajax : {
                url : "../../php/M-FacultyHead/getHiredApplicantsPerOffice.php",
                data : "",
                dataSrc : "",
                error: function(response){
                    swal({
                            title: "Something went wrong...",
                            text: "Server Request Failed!",
                            icon: "error",
                            buttons: false,
                            timer: 1800,
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                    });
                }
              },
              columns : [
                { data : "applicant_id"},
                { data : "applicant_name"},
                { data : "course"},
                { data : "period"},
                { data : "date_from", className: "collapse"},
                { data : "date_to", className: "collapse"},
                { data : "salary" },
                { data : "salary_status" },
                { 
                  data : null,
                  className: "text-center",
                  render : function ( data, type, row){
                    var status = row['rating_status'];
                    var str = '';
                      if (status==0){
                        str = '<button class="btn btn-success btn-sm view-rating-form" data-toggle="modal" data-target="#view-modal"><i class="fas fa-file-signature"></i></button>';
                      } else {
                        str = '<button class="btn btn-secondary btn-sm" disabled><i class="fas fa-file-signature"></i></button>';
                      }

                    return str;
                  }
                },
                { 
                  data : null,
                  className: "text-center",
                  render : function ( data, type, row){
                    return'<a class="btn btn-danger btn-md" href="../Faculty/Print-Accomplishment.php?appid='+row['applicant_id']+'&date_from='+row['date_from']+'&date_to='+row['date_to']+'&period='+row['period']+'" target="_blank"><i class="fas fa-print"></i></a>';
                  }
                }
              ],
                ordering : false,
                dom: 'Bfrtip',
                buttons: [
                        {
                            text:'PRINT',
                            className: 'btn btn-danger collapse print-tbl',
                            extend: 'print',
                            exportOptions: {
                                columns: [0,1,2,3,4]
                            },
                            title: '',
                            customize: function(win) {
                              $(win.document.body).css('font-size', '10pt').prepend('<header class="text-center"><img src="https://www.usep.edu.ph/op/wp-content/uploads/sites/55/2019/01/usep-logo-small.png" width="100" height="100" class="mb-2" /><br><h4>University of Southeastern Philippines</h4><p>Apokon, Tagum City</p><br><br><h5>List of Accomplishment Reports</h5><header>');
                              $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');  
                            }
                        }
                ],
              initComplete: function () {
                this.api().columns().every( function () {
                    var columnidx = this.index();
                    if (columnidx==0 || columnidx==1 || columnidx == 2 || columnidx == 3 || columnidx == 4){
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
         
                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();

                                selectedoptions = '';
                                  $('select').each(function(){
                                    var tempval = $(this).val();
                                    if (tempval != '' || tempval == null ){
                                      if (selectedoptions.length>0){
                                        selectedoptions += '-';
                                      }
                                      else {
                                        selectedoptions+= ' for ';
                                      }
                                      selectedoptions += tempval;
                                    }
                                  });
                            } );
         
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    }
                } );

              }
          });

          $(document).on("click",".view-rating-form",function(){
            var currentRow = $(this).closest("tr");
            var sl_id =  currentRow.find("td:eq(0)").text();
            var from =  currentRow.find("td:eq(4)").text();
            var to =  currentRow.find("td:eq(5)").text();
            $('.add-on').each(function(){
              $(this).remove();
            });

            $.ajax({
                    url:"../../php/M-FacultyHead/getAccomplishmentReport.php",
                    method:"POST",
                    data:{appid:sl_id, date_from:from, date_to:to},
                    success:function(response)
                      {
                        try {
                          var obj = JSON.parse(response);
                          $('#report-applicant-id').val(sl_id);
                          $('#report_date_from').val(from);
                          $('#report_date_to').val(to);
                          $('#report-applicant-name').val(obj[0].applicant_name);
                          $('#head-name').val(obj[0].staff_requested_by);
                          $('#report-course-year').val(obj[0].course_year);
                          $('#report-labor-class').val(obj[0].labor_class);
                          $('#report-labor-type').val(obj[0].labor_type);
                          $('#report-assigned-unit').val(obj[0].unit_assigned);
                          $('#report-total-hours').val(obj[0].total_hours+" hours");
                          $('#period').text(obj[0].period);
                          $('#report_period').val(obj[0].period);
                          console.log($('#report_period').val());
                          var tasks = obj[0].tasklist.split("#");
                          var str = '';
                          for (var i = 0; i < 8; i++) {
                            if (i < tasks.length) {
                              str = '<h6 class="font-weight-bold s12 add-on"> '+(i+1)+'.<span class="ml-2 font-weight-normal">'+tasks[i]+'</span><br></h6>';
                            } else {
                              str = '<h6 class="font-weight-bold s12 add-on"> '+(i+1)+'.<span class="ml-2 font-weight-normal"></span><br></h6>';
                            }
                              $('#report-tasks-list').append(str);
                          }

                        } catch (e) {
                          alert("Data failed to load.");
                        }
                      },
                    error: function(response){
                      alert("An error occurred :" + JSON.stringify(response));
                    }
            });
          });


            $('#print-accomplishment-reports').click(function(){
              $('.print-tbl').trigger('click');
            });


        });
      </script>
  </body>
</html>