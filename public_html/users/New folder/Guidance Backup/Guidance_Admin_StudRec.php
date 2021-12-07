<?php include('../../conn.php');
  /*include 'conn.php';*/
  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'Guidance'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
   $admin_id=$_SESSION['id'];


  $count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where (user_id='$admin_id' or office_id = 2) and message_status='Delivered'");
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
      <link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
      <title>Admin | USeP Virtual Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">

         <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Navbar-->
      <!-- Filter link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src= ></script>
  <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
  <!--generate pdf -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

      <style>

   input{
    font-size: 13px;
  }

  input[type=checkbox][disabled]{
  outline:1px solid black; 
}

  @page{
    size: auto;
  }
  @media print {
    body * {
      visibility: hidden;
    -webkit-print-color-adjust: exact;
    }
    .modal-body * {
      visibility: visible;
      overflow: visible;
    }
    .main * {
      display: none;
    }

    .modal {
      position: absolute;
      left: 0;
      top: 0;
      margin-top: -120px;
      padding: 0;
      visibility: visible;
      overflow: visible !important; /* Remove scrollbar for printing. */
    }
    .modal-dialog {
      visibility: visible !important;
      overflow: visible !important; /* Remove scrollbar for printing. */
    }

  }
  </style>

    </head>
      <body class="app sidebar-mini rtl" onload="initClock()">
      <!-- Navbar-->

        
      <header class="app-header">
    
   
      </header>

      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="image/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">GUIDANCE OFFICE</p>
          </div>
        </div>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="Guidance_Admin.php"><i class="app-menu__icon fas fa-home"></i><span class="app-menu__label">Home</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Counselling.php" data-toggle="treeview"><i class="app-menu__icon far fa-sticky-note"></i><span class="app-menu__label">Counselling</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Counselling.php">List of Counselling Sessions</a></li>
              <li><a class="treeview-item" href="Guidance_GroupCounselling.php">Group Guidance</a></li>
              <li><a class="treeview-item" href="Guidance_NewForms.php">New Submitted Intake Forms</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Referrals.php" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Referrals</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Referrals.php">List of Referral Forms</a></li>
            </ul>
          </li>
          <li><a class="app-menu__item active" href="Guidance_Admin_Records.php"><i class="app-menu__icon fas fa-vcard"></i><span class="app-menu__label">Student Records</span></a></li>
          <li><a class="app-menu__item" href="Guidance_Appointment.php"><i class="app-menu__icon  fas fa-calendar-check-o"></i><span class="app-menu__label">Appointments</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Reports.php" data-toggle="treeview"><i class="app-menu__icon  fas fa-line-chart"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Reports.php">Counselling Reports</a></li>
              <li><a class="treeview-item" href="Guidance_GroupGuidance_Reports.php">Group Guidance Reports</a></li>
              <li><a class="treeview-item" href="Guidance_Evaluation_Reports.php">Evaluation Reports</a></li>
              <li><a class="treeview-item" href="Guidance_Referral_Reports.php">Referral Reports</a></li>
              
            </ul>
          </li>
          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Guidance_Admin_Announcements.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
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
            if($result = mysqli_query($conn, "SELECT * FROM current_semester")){
              while($row = mysqli_fetch_array($result)){
                $currSemesterYear = $row['semester'] .' '. $row['year'];
                echo '
                  <li>
                    <div class="appnavlevel">
                      <span class="semesterYear">'.$row['semester'].'</span>
                    </div>
                  </li>
                  <li>
                    <div class="appnavlevel">
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
                  $count_sql="SELECT * from notif where (user_id=$admin_id or office_id = 2)  order by time desc";
                  $result = mysqli_query($conn, $count_sql);
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
        <div class="red"> 
          
        </div>

      <!-- Navbar-->

         <!--<div class="page-error tile">-->

          <?php
                       $student_id = $_GET['id'];

                       $sql="SELECT intake_form.*, student.*, course.name as course from intake_form 
                              join student on student.Student_id=intake_form.Student_id
                              join course on course.course_id=student.course_id where student.Student_id='$student_id'";
                       $result = mysqli_query($conn, $sql);
                       if($result = mysqli_query($conn,$sql)){
                            $row2 = mysqli_fetch_assoc($result);

                            $image_data=$row2['pic'];

                        }

          ?>

      <div class="row">
          <div class="col-md-12">
                          <a class="float-right" href="Guidance_Admin_Records.php"><i class="fas fa-arrow-left"> Back</i></a>
                                  
                <div class="float-left"><h4>Student Records</h4></div><br><br>         
        <div style="background-color: #C12C32; padding: 5px 10px;"> </div>
          <div class="tile">
                      <div class="container">
                         <div class="row">
                               <div class="col-3">

                                    <div style="height: 150px; width: 150px;border-radius: 50%;margin-left: 40px;">
                                      <?php if ($image_data!='') { ?>
                                        <img style=" vertical-align: middle; max-width: 100%; border-radius: 50%; border: 6px solid  #C12C32;" src="data:image/jpeg;base64,<?php echo base64_encode( $image_data ); ?>" />
                                    <?php  }else{ ?>
                                        <img style=" vertical-align: middle; max-width: 100%; border-radius: 50%; border: 6px solid  #C12C32;" src="image/no_image.png">
                                    <?php }
                                    ?>
                                    </div>
                           </div>
                               
            <div class="col-lg">
                                      <h4><?php echo $row2['first_name'].' '.$row2['middle_name'].' '.$row2['last_name'].' '.$row2['suffix']; ?></h4>
                                      <h5><?php echo $row2['Student_id']; ?></h5>
                                      <h5><?php echo $row2['email_add']; ?></h5>
                                      <h5><?php echo $row2['course']; ?></h5>
                                      <h5><?php echo $row2['year_level'].' '.$row2['section']; ?></h5>
                                    </div>

                            </div>
                         </div>
                        </div>
          </div>
           </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <div class="float-left"><h4>History of Counselling</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-sm">

                     
                  <div class="inline-block">
                    Semester
                    <br>
                    <select class="bootstrap-select">
                        <option class="select-item" value="all" selected="selected">All</option>
                        <?php
                                            $sql="SELECT * FROM semester";
                                            $result = mysqli_query($conn, $sql);

                                           if($result = mysqli_query($conn,$sql)){               
                                                while($res = mysqli_fetch_array($result)) {         
                                                    $value= $res['semester']; ?>
                                                    <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['semester'];?></option>
                                              <?php }
                                              } ?>
                      </select>
                    </div>
                      </div>
                      <div class="col-sm">
                          <div class="inline-block float-right">
                            <button class="btn btn-warning btn-sm verify view-button" style="width: 145px;"><i class="fas fa-eye"></i>&emsp;View Intake Form
                          </button></a>
                      </div>
                  </div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered" id="counselling-table">
                    <thead>
                      <tr>
                      <th>Date Filed</th>
                      <th>Status</th>
                      <th>Date Completed</th>
                      <th class="max">Mode of Communication</th>
                      <th>Evaluation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                      $sql="SELECT intake_form.*, indv_counselling.*, guidance_appointments.*, _status.status, mode_of_communication.communication_mode as mode from intake_form
                                join indv_counselling on indv_counselling.intake_id= intake_form.intake_id
                                join guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id 
                                join _status on _status.status_id=guidance_appointments.status_id 
                                join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id where intake_form.Student_id='$student_id'";
                      $result = mysqli_query($conn, $sql);
                         if($result = mysqli_query($conn,$sql)){
                              while ($row2 = mysqli_fetch_assoc($result)) {

                                echo '<tr>
                                  <td>'. $row2['date_filed'].'</td>
                                  <td>'. $row2['status'].'</td>
                                  <td>'. $row2['date_completed'].'</td>
                                  <td>'. $row2['mode'].'</td> 
                                  <td>'. $row2['remarks'].'</td>
                                 
                                  

                                </tr>';}
                                }
       ?>
                     
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div> 

 <!--View Forms Modal -->
  <div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
<?php

 ?>

   <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">INTAKE FORM
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body" id="printReferral">

        <div class="row">
        <div class="col-md-12">
                <br><br>

                <!--Form Header-->
                <table border="2" width="100%">
                  <tr>
                    <td rowspan="5" width="1%">
                      <div align="center">
                        <img src="image/logo.png" alt="USeP Logo" style="width:100px">
                      </div>
                    </td>
                    <td rowspan="5" width="40%">
                      <div align="center" style="font-family: arial;">
                        
                            Republic of the Philippines <br>
                            <label style="font-family: 'Olde English'; font-size: 23px; font-style: bold">University of Southeastern Philippines</label><br>
                            Iñigo St., Bo. Obrero, Davao City 8000 <br>
                            Telephone: (082) 227-8192 <br>
                            Website: www.usep.edu.ph <br>
                            Email: president@usep.edu.ph
                      </div>
                    </td>
                    <td width="13%" height="2px;">
                       Form No.
                    </td>
                    <td width="15%" height="2px;">
                       FM-USeP-GCS-02
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Issue Status
                    </td>
                    <td width="15%" height="2px;">
                       04
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Revision No.
                    </td>
                    <td width="15%" height="2px;">
                       03
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Date effective
                    </td>
                    <td width="15%" height="2px;">
                       01 November 2020
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Approved by
                    </td>
                    <td width="15%" height="2px;">
                       President
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">
                      <div align="center"><h4>INTAKE FORM</h4></div>
                    </td>
                  </tr>
                </table>
                  <br>
                <div align="center"><h6>Welcome to the</h6></div>
                <div align="center"><h4>UNIVERSITY ASSESSMENT AND GUIDANCE CENTER (UAGC)</h4></div>
                <p align="justify">
                  We want to make your visit to the University Assessment and Guidance Center as comfortable and productive as we can. Your first
                  meeting with one of our counselors will be an “intake interview”. The purpose of the intake interview is to help you clarify you concerns
                  and, if needed, discuss to any additional services that might be helpful to you. <br><br> 
                  We are asking that you complete this form with information to help you and your intake counselor in planning a course of action.

                </p>
                <?php 

                 $q7= ''; 
                 $rd=array();$checked_arr=array();
                 $rd=array("Walk-in","Call-in","Referred");
               include('conn.php');
$id=$student_id;
$intake_id=$row2['intake_id'];
 $sqlselect=mysqli_query($conn,"SELECT *, course.name as crse FROM student join intake_form on intake_form.Student_id=student.Student_id join course on student.course_id=course.course_id join emergency_contact on emergency_contact.student_id= student.student_id LEFT JOIN grantee_history on grantee_history.student_id=student.Student_id LEFT JOIN scholarship_program on scholarship_program.program_id=grantee_history.program_id where student.Student_id='$id'");
if($prorow=mysqli_fetch_array($sqlselect)){
  $image_data=$prorow['e_signature'];
   $q7=$prorow['Q7'];
                  $checked_arr[]=$prorow['intake_type'];
                  $image_data=$prorow['e_signature'];
                ?>
                <div align="center">
                  <?php 
                  foreach($rd as $academic){

                  $checked = "";
                  if(in_array($academic,$checked_arr)){
                    $checked = "checked";
                  }
      
      echo '<input type="radio"value="'.$academic.'" '.$checked.' ><label for="Walk-in"> &emsp;'.$academic.'</label> &emsp;&emsp;&emsp;';
    }
                  ?>
                </div>
            
                <table border="2" width="100%">
                  <tr>
                    <th colspan="4" style="color: white; background-color: black;">A. CLIENT/STUDENT INFORMATION</th>
                  </tr>
                  <tr>
                    <td>1. Title (e.g. Mr, Ms, Mrs)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                             <input type="text" name="title" id="title"  value="" style="border:transparent;" readonly>
                    </td>
                    <td>2. Surname <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                             <input type="text" name="last_name" id="last_name" value="<?php  echo $prorow['last_name'];?>" style="border:transparent;" readonly>
                    </td>
                    <td>3. Given Name/s <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="first_name" id="first_name" style="border:transparent;" value="<?php  echo $prorow['first_name'];?>" readonly>
                    </td>
                    <td>4. Middle Initial <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="middle_name" id="middle_name" style="border:transparent;" value="<?php  echo $prorow['middle_name'];?>" readonly> 
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">5. Course and Year<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="course&year" id="course&year" style="border:transparent;" value="<?php  echo $prorow['crse'].'/'.$prorow['year_level'];?>" readonly>
                    </td>
                    <td colspan="2">6. Contact Number<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="contactno" id="contactno" style="border:transparent;" value="<?php  echo $prorow['phone_number'];?>" readonly>
                    </td>
                  </tr>
                 <tr>
                    <td colspan="2">7. Gender<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="gender" id="gender" style="border:transparent;" value="<?php  echo $prorow['sex'];?>" readonly>
                    </td>
                    <td>8. Age<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="age" id="age" style="border:transparent;" value="<?php  echo $prorow['last_name'];?>" readonly>
                    </td>
                    <td>9. Birthdate<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="bdate" id="bdate" style="border:transparent;"  value="<?php  echo $prorow['birth_date'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">10. Status<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="civil_status" id="civil_status" style="border:transparent;" value="<?php  echo $prorow['civil_status'];?>" readonly>
                    </td>
                    <td>11. Birthplace<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="bplace" id="bplace" style="border:transparent;" value="<?php  echo $prorow['birth_place'];?>" readonly>
                    </td>
                    <td>12. Birth Order<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="birth_order" id="birth_order" style="border:transparent;" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">13. Present Address (Apt/House Number., Street, City/Municipality, Province)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="address" id="address" style="border:transparent;" value="<?php  echo $prorow['house_block_lot_num'].'., '.$prorow['street'].', '.$prorow['city'].', '.$prorow['province'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">14. Provincial Address<br>
                            <input type="text" name="provincial_address" id="provincial_address" style="border:transparent;" value="<?php  echo $prorow['province'];?>" readonly> 
                    </td>
                  </tr>
                  <tr>
                    <td>15. Religion<br>
                            <input type="text" name="religion" id="religion" style="border:transparent;" value="<?php  echo $prorow['religion'];?>" readonly>
                    </td>
                    <td colspan="3">16. Email Address<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="email" id="email" style="border:transparent;" value="<?php  echo $prorow['email_add'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">17. Name of Father<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_name" id="father_name" style="border:transparent;" value="<?php  echo $prorow['father_name'];?>" readonly>
                    </td>
                    <td>18. Occupation<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_occupation" id="father_occupation" style="border:transparent;"  value="<?php  echo $prorow['father_occupation'];?>" readonly>
                    </td>
                    <td>19. Contact No.<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_contact" id="father_contact" style="border:transparent;" value="<?php  echo $prorow['father_contact'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">20. Name of Mother<br>
                            <input type="text" name="mother_name" id="mother_name" style="border:transparent;" value="<?php  echo $prorow['mother_name'];?>" readonly>
                    </td>
                    <td>21. Occupation<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="mother_occupation" id="mother_occupation" style="border:transparent;" value="<?php  echo $prorow['mother_occupation'];?>" readonly>
                    </td>
                    <td>22. Contact No.<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="mother_contact" id="mother_contact" style="border:transparent;" value="<?php  echo $prorow['mother_contact'];?>" readonly>
                    </td>
                  </tr>
                   <tr>
                    <td colspan="4">23. Parent's Present Address (Apt/House Number., Street, City/Municipality, Province)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="parents_address" id="parents_address" style="border:transparent;" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">24. Scholarship currently availed<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="scholarship" id="scholarship" style="border:transparent;" value="<?php  echo $prorow['program_name'];?>" readonly>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">25. Educational Background<br>
                      <table border="2" width="90%" align="center">
                        <tr>
                          <td></td>
                          <td>School</td>
                          <td>Years of Attendance</td>
                          <td>Year Graduated</td>
                        </tr>
                        <tr>
                          <td>Elementary</td>
                          <td><input type="text" name="elementary_school" id="elementary_school" style="border:transparent;width: 100%;" value="<?php echo $prorow['elementary_school']; ?>" readonly></td>
                          <td><input type="text" name="elementary_years" id="elementary_years" style="border:transparent;width: 100%" value="<?php echo $prorow['elem_years_atendance']; ?>" readonly></td>
                          <td><input type="text" name="elementary_graduated" id="elementary_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['elem_year_graduated']; ?>" readonly></td>
                        </tr>
                        <tr>
                          <td>Secondary</td>
                          <td><input type="text" name="secondary_school" id="secondary_school" style="border:transparent;width: 100%" value="<?php echo $prorow['secondary_school']; ?>" readonly></td>
                          <td><input type="text" name="secondary_years" id="secondary_years" style="border:transparent;width: 100%" value="<?php echo $prorow['sec_years_atendance']; ?>" readonly></td>
                          <td><input type="text" name="secondary_graduated" id="secondary_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['sec_year_graduated']; ?>" readonly></td>
                        </tr>
                        <tr>
                          <td>Tertiary</td>
                          <td><input type="text" name="tertiary_school" id="tertiary_school" style="border:transparent;width: 100%" value="<?php echo $prorow['tertiary_school'] ?>" readonly></td>
                          <td><input type="text" name="tertiary_years" id="tertiary_years" style="border:transparent;width: 100%" value="<?php echo $prorow['ter_years_atendance'] ?>" readonly></td>
                          <td><input type="text" name="tertiary_graduated" id="tertiary_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['ter_year_graduated'] ?>" readonly></td>
                        </tr>
                        <tr>
                          <td>Others</td>
                          <td><input type="text" name="others_school" id="others_school" style="border:transparent;width: 100%" value="<?php echo $prorow['other_school'] ?>" readonly></td>
                          <td><input type="text" name="others_years" id="others_years" style="border:transparent;width: 100%" value="<?php echo $prorow['other_years_atendance'] ?>" readonly></td>
                          <td><input type="text" name="others_graduated" id="others_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['other_year_graduated'] ?>" readonly></td>
                        </tr>
                      </table><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">26. Health History<br><br>
                        &emsp;&emsp;Physical Health History (Illnesses, Diseases): <input type="text" name="" value="<?php echo $prorow['hhistory_physical']; ?>" readonly><br><br>
                    
                        &emsp;&emsp;Psychiatric History: <input type="text" name="" value="" style="width: 44.5%;" value="<?php echo $prorow['hhistory_psychiatric']; ?>" readonly><br><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">27. Problems that you are experiencing:<br>
                     <input style="width:100%;height: 100px;"class="intake"type="text" name="pexperiencing" id="pexperiencing" value="<?php echo $prorow['Q1']; ?>" readonly><br>
                    </td>    
                  </tr>
                  <tr>
                    <td colspan="4">28. What is your goal in seeking help?<br><br><br><br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="goal" id="goal" value="<?php echo $prorow['Q2']; ?>" readonly>
                  </tr>
                  <tr>
                    <td colspan="4">29. Is the use/abuse of drugs and/or alcohol related to this problem in any way?<br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="drugs" id="drugs" value="<?php echo $prorow['Q3']; ?>" readonly>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">30. Is there any behavioral problem related?<br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="behavioral_problems" id="behavioral_problems" value="<?php echo $prorow['Q4']; ?>" readonly>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">31. Have you experienced any significant loss/crisis/life change?<br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="crisis" id="crisis" value="<?php echo $prorow['Q5']; ?>" readonly>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">32. Kindly check what you are currently experiencing? <center>
                     <?php }
                            $checked_arr2=array();$rd2=array();
                            $arrayName = array('Anxiousness','Depression','Anger','Confusion','Fear','Loneliness','Despair','Thoughts of suicide','Hurt','Guilt/shame','Withdrawing from others','Relational stress','Martial distress','Parenting struggles','', );
                      $sql = mysqli_query($conn,"SELECT * FROM `chk_intake_q6` WHERE chk_intake_q6.intake_id = '".$prorow['intake_id']."'");
                            $count=mysqli_num_rows($sql);
                            $row=mysqli_fetch_array($sql);
                            $rd2=array($row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13],$row[14]); ?>
                      <div id=“container”>
                        <?php $count=0; ?>
                        <table>

                          <tr >
                            
                              <?php
                          foreach($rd2 as $academic){

                            $checked = "";
                            if($academic!='' || $academic!=null){
                            $checked = "checked";
                            }
      
                            echo '<td style="height: 20px; align: left;"><input style="margin-left: 70px;" type="checkbox" value="'.$academic.'" '.$checked.' ><label for="vehicle1"> '.$arrayName[$count].'</label></td>';
                            if($count==2 || $count==5 || $count==8 || $count==11){
                              echo "</tr>";
                            }
                           $count++; }
                          ?>
                        </table>
                      </div>
                    </center>
                       
                       &emsp;&emsp;33. Other Information you like to share:<input class="intake" type="text" name="Q7" style="border-bottom: 1px solid #555; width: 50%;" value="<?php echo $q7; ?>" readonly><br><br>
                    </td>   
                  </tr>
                  <tr>
                    <th colspan="4" style="color: white; background-color: black;">B. DECLARATION</th>
                  </tr>
                  <tr>
                  <td colspan="4" align="justify">
                      <p>
                        The University Assessment and Guidance Center is committed to non-discrimination with respect to race, creed, religion,
                          age, disability, color, sex, marital status, sexual orientation or political opinions/affiliations. <br><br>
                         Further, we adhere to strict confidentiality. Any information that you provide are strictly confidential, except in life
                        threatening situations, cases of suspected child or elder abuse, or when release is otherwise required by law. In order
                        to provide the best services possible, your counselor may consult with other counselors or professionals. Information
                       about counseling will not appear on your academic records. <br><br>
                          In order to protect your right to confidentiality, your written authorization is required if you want us to provide information
                        about your counseling to another person or agency. If you have any questions, you may ask your intake counselor.
                        </p>
                    </td>
                  </tr>
                    <tr>
                        <!-- CHeck signature from database -->
                    <td colspan="2">34. Client/Student's Signature<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                      <br>
                    <div style="margin-left: 7%;" >
                      <?php if ($image_data!='') { ?>
                         <img style="margin-left: 60px; margin-top: -9%; margin-right: 1px; position: absolute;" width="80" height="80" src="data:image/jpeg;base64,<?php echo base64_encode( $image_data ); ?>" />
                      <?php }else{ ?>
                           <img style="margin-left: 60px; margin-top: -5%; margin-right: 1px; position: absolute;" width="100" height="50" src="image/Defalt_Esig.png" />
                      <?php }?>
                    </div>
                    </td>
                    <td colspan="2">35. Date Accomplished <br><i class="fa fa-caret-left" aria-hidden="true"></i>

                             <input type="text" name="date_accomplished" class="intake datepicker" value="<?php echo $prorow['date_filed']; ?>" id="date_accomplished" placeholder="YYYY/MM/DD" autocomplete="off" readonly><br>
                    </td>
                  </tr>
                </table>
                <br>
            </div><br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="print" class="btn btn-success" onclick="print_specific_referral_content()">Print</button>
          </div>        
        </div>
      </div>
    </div>




  <!--END OF MODAL-->

        

        <!--</div>-->
      </main>
      <!-- Essential javascripts for application to work-->

      <script type="text/javascript">
        
         if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }

          $('#counselling-table').DataTable();


  
     //view forms modal table#1
     $(document).on('click', '.view-button', function(){
        var intake_id = $(this).attr("id");  
        console.log(intake_id);


  $('#view-modal').modal('show');

});

      </script>
  <script type="text/javascript">
  function print_specific_referral_content(){
    var win = window.open('','','left=0,top=0,width=900,height=700,toolbar=0,scrollbars=0,status =0');

    var content = "<html>";
    content += "<body onload=\"window.print(); window.close();\">";
    content += document.getElementById("printReferral").innerHTML ;
    content += "</body>";
    content += "</html>";
    win.document.write(content);
    win.document.close();
}
    </script>
      
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
      
      <script type="text/javascript"></script>
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

    <script type="text/javascript">
   $(document).ready(function(){
    $("input:radio").click(function(){
        return false;
    });
    $("input:checkbox").click(function(){
        return false;
    });
   });
</script>