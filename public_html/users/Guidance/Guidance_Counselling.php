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
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where (user_id='$admin_id' AND office_id = 4) and message_status='Delivered'");
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
  <!--  TITLE -->
    <link rel="icon" href="../../images/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Guidance Admin Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">
          <!-- FILTER LINK -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
      <!-- DATEPICKER --> 
          <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
     <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <!-- DISABLE DATE AND TIME SCRIPT -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
      <script src="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/js/bootstrap-datetimepicker.js"></script>
      <link href="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
       <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../css/upstyle.css">
    <link rel="stylesheet" type="text/css" href="../../css/custom.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet"/> -->
      <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->
 


 <style>
   .form-control select {
width: 1px !important;
}

    input{
    font-size: 13px;
  }

  @page{
    size: letter;
  }
  @media print {
    body * {
      visibility: hidden;
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
        <img class="app-sidebar__user-avatar" src="../../images/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">COORDINATOR</p>
            <p style="text-align: center;" class="app-sidebar__user-name font-sec" >HUB</p>
          </div>
      </div>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fas fa-home"></i><span class="app-menu__label">Home</span></a></li>
          <li class="treeview"><a class="app-menu__item active" href="Guidance_Counselling.php" data-toggle="treeview"><i class="app-menu__icon far fa-sticky-note"></i><span class="app-menu__label">Counselling</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item active" href="Guidance_Counselling.php">List of Counselling Sessions</a></li>
              <li><a class="treeview-item" href="Guidance_GroupCounselling.php">Group Guidance</a></li>
              <li><a class="treeview-item" href="Guidance_NewForms.php">New Submitted Intake Forms</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Referrals.php" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Referrals</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Referrals.php">List of Referral Forms</a></li>
            </ul>
          </li>
          <li><a class="app-menu__item" href="Guidance_Admin_Records.php"><i class="app-menu__icon fas fa-vcard"></i><span class="app-menu__label">Student Records</span></a></li>
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
            if($result = mysqli_query($conn, "SELECT * FROM list_of_semester where status='Active'")){
              while($row = mysqli_fetch_array($result)){
                $currSemesterYear = $row['semester'] .' '. $row['year'];
                echo '
                  <li>
                    <div class="appnavlevel" style="color: black;">
                      <span class="semesterYear">'.$row['semester'].'</span>
                    </div>
                  </li>
                  <li>
                    <div class="appnavlevel" style="color: black;">
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
                  $count_sql="SELECT * from notif where (user_id=$admin_id AND office_id = 4)  order by time desc";
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


<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div>
              <div class="float-left"><h4>New Counselling Requests</h4></div>
                </div>
                <br><br>
                <div class="table-bd">

                 <!--Table for New Submitted Intake Formss-->
                <table class="table table-hover table-bordered" id="home-table">
                  <thead>
                    <tr>
                    <th>Date Filed</th>
                    <th >ID Number</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year & Section</th>
                    <th>Mode of Communication</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
          $sql1="SELECT indv_counselling.counselling_id, indv_counselling.intake_id, indv_counselling.appointment_id, intake_form.Student_id, guidance_appointments.date_filed, guidance_appointments.appointment_date, guidance_appointments.appointment_time, student.first_name, student.middle_name, student.last_name, student.year_level, student.section, course.title, mode_of_communication.communication_mode, _status.status from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.status_id = '2'";
          if($result1 = mysqli_query($conn, $sql1)){
          while ($row = mysqli_fetch_assoc($result1)) {

                                echo'<tr>
                                  <td>'. $row['date_filed'].'</td>
                                  <td>'. $row['Student_id'].'</td>
                                  <td>'. $row['first_name'].'  
                                  '. $row['last_name'].'</td> 
                                  <td>'. $row['title'].'</td>
                                  <td>'. $row['year_level'].'- 
                                  '. $row['section'].'</td>
                                  <td>'. $row['communication_mode'].'</td>
                                  <td>'. $row['status'].'</td>
                                  <td>
                                   <a id='.$row['appointment_id'].' type="button" class="btn btn-info btn-sm viewbutton" data-id='.$row['appointment_id'].' ><i class="fas fa-eye" aria-hidden="true" style="color:white;width:15px"></i></a>
                                  <a id='.$row['appointment_id'].' type="button" class="btn btn-warning btn-sm updatebutton" data-id='.$row['appointment_id'].' ><i class="fas fa-pencil-square-o" aria-hidden="true" style="color:white; width:15px"></i></a>&nbsp;
                                  </td>
                                </tr>';}}

       ?>
                  </tbody>
                </table>
              </div>
            </div><br>
            </div>
          </div>
        </div>


      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div>
              <div class="float-left"><h4>List of Counselling Sessions</h4></div>
                </div>
                <br><br> 
                <div>
      <div class="inline-block">
                    Month
                    <br>
                  <select class="bootstrap-select" id="filter_month">
                      <option class="select-item" value="all" selected="selected">All</option>
                      <option class="select-item" value="01" >January</option>
                      <option class="select-item" value="02">February</option>
                      <option class="select-item" value="03">March</option>
                      <option class="select-item" value="04">April</option>
                      <option class="select-item" value="05">May</option>
                      <option class="select-item" value="06">June</option>
                      <option class="select-item" value="07">July</option>
                      <option class="select-item" value="08">August</option>
                      <option class="select-item" value="09">September</option>
                      <option class="select-item" value="10">October</option>
                      <option class="select-item" value="11">November</option>
                      <option class="select-item" value="12">December</option>
                    </select>
                  </div>
                      <div class="inline-block">
                    Status
                    <br>
                    <select class="bootstrap-select" name="filterstatus" id="filterstatus">
                        <option class="select-item" value="all" selected="selected">All</option>
                       <?php
                          $result=mysqli_query($conn, "SELECT * FROM _status where status_id !='2' and status_id !='4' and status_id !='5'");               
                          while($res = mysqli_fetch_array($result)) { 
                           
                              $value= $res['status_id']; ?>
                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['status'];?></option>
                        <?php } ?>
                      </select>
                    </div>
      <div class="inline-block">
                    Course
                    <br>
                  <select class="bootstrap-select" id="filtcourse">
                    <option class="select-item" value="all" selected="selected">All</option>
                       <?php
                                           $result=mysqli_query($conn, "SELECT * FROM course");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $value= $res['course_id']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['name'];?></option>
                                              <?php } ?>
                    </select>
                   </div>
                </div>
                <div class="table-bd">

             
               <!--Table for List of Intake Formss-->
              <div class="table-responsive">
                <!--Table for List of Submitted Intake Formss-->
                <div class="divFilter">
                <table class="table table-hover table-bordered" id="show-table">
                  <thead>
                    <tr>
                    <th>Date Filed</th>
                    <th >ID Number</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year & Section</th>
                    <th>Mode of Communication</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
<?php 
          $sql2="SELECT _status.status_id as statID, indv_counselling.counselling_id, indv_counselling.intake_id, indv_counselling.appointment_id, intake_form.Student_id, guidance_appointments.date_filed, guidance_appointments.appointment_date, guidance_appointments.appointment_time, student.first_name, student.middle_name, student.last_name, student.year_level, student.section, course.title, mode_of_communication.communication_mode, _status.status from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.status_id != '2' ORDER by statID DESC";
          if($result2 = mysqli_query($conn, $sql2)){
          while ($row = mysqli_fetch_assoc($result2)) {

                                echo'<tr>
                                  <td>'. $row['date_filed'].'</td>
                                  <td>'. $row['Student_id'].'</td>
                                  <td>'. $row['first_name'].'  
                                  '. $row['last_name'].'</td> 
                                  <td>'. $row['title'].'</td>
                                  <td>'. $row['year_level'].'- 
                                  '. $row['section'].'</td>
                                  <td>'. $row['communication_mode'].'</td>
                                  <td>'. $row['status'].'</td>
                                  <td>';
                                    if ($row['statID']=='1') {
                                  ?>
                                  <a id="<?php echo $row['appointment_id']; ?>" type="button" class="btn btn-info btn-sm seebutton" data-id="<?php echo $row['appointment_id']; ?>" ><i class="fas fa-eye" aria-hidden="true" style="color:white;width:12px"></i></a>
                                  <button type="button" disabled="disabled" class="btn btn-warning btn-sm updatestatus" a id="<?php echo $row['appointment_id'];?>"  data-id="<?php echo $row['appointment_id']; ?>"><i class="fas fa-pencil-square-o" aria-hidden="true" style="color:white;width:12px"></i></button>
                                
                                <?php }else{ ?>
                                  <a id="<?php echo $row['appointment_id']; ?>" type="button" class="btn btn-info btn-sm seebutton" data-id="<?php echo $row['appointment_id']; ?>" ><i class="fas fa-eye" aria-hidden="true" style="color:white;width:12px"></i></a>
                                  <a id="<?php echo $row['appointment_id'];?>" type="button" class="btn btn-warning btn-sm updatestatus" data-id="<?php echo $row['appointment_id']; ?>" ><i class="fas fa-pencil-square-o" aria-hidden="true" style="color:white;width:12px"></i></a>
                                <?php }?>
                                  </td>
                                </tr><?php }}

       ?>
                  </tbody>
                </table>
                </div>
              </div>
            </div><br>
            </div>
          </div>
        </div>
      </div>

  <!--Set Appointment Modal -->
                <?php 

                  if(isset($_POST['savechanges'])){
                      $appointment = $_POST['appointment_id3'];
                      $newDate = date('Y-m-d',strtotime($_POST['appointment_date3']));
                      $newTime = date('H:i',strtotime($_POST['appointment_date3']));
                      $student_id = $_POST['student_id3'];

                      $query = "UPDATE `guidance_appointments` SET `appointment_date`='$newDate',`appointment_time`='$newTime',`status_id`=3 WHERE appointment_id = '$appointment'";
                      
                      if(mysqli_query($conn,$query))
                      {
                            /*Get Cred from database*/

                            $cred = "SELECT last_name, first_name, middle_name, email_add, appointment_date, appointment_time, mode_of_communication.communication_mode FROM guidance_appointments left join indv_counselling on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT JOIN mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join intake_form on indv_counselling.intake_id = intake_form.intake_id LEFT JOIN student on intake_form.Student_id=student.Student_id WHERE guidance_appointments.appointment_id='$appointment'";
                            if($cd=mysqli_query($conn,$cred)){
                              while ($creds = mysqli_fetch_assoc($cd)) {
                            /*Send schedule to Google callendar*/
                            $newTime = date('H:i',strtotime('+4 hours', $_POST['appointment_date3']));
                            $from_name = "Guidance Office";        
                            $from_address = "lloydsryan30@gmail.com";        
                            $to_name = $creds['last_name'].', '.$creds['first_name'].' '.$creds['middle_name'];        
                            $to_address = $creds['email_add'];          
                            $startTime = $creds['appointment_date'].' '.$newTime;  
                            $endTime = "";    
                            $subject = "Guidance Meeting Schedule";   
                            $description = "Guidance Meeting Schedule";    
                            $location = $creds['communication_mode'];    
                            $domain = 'gmail.com';
                            
                            //Create Email Headers
                            $mime_boundary = "----Meeting Booking----".MD5(TIME());

                            $headers = "From: ".$from_name." <".$from_address.">\n";
                            $headers .= "Reply-To: ".$from_name." <".$from_address.">\n";
                            $headers .= "MIME-Version: 1.0\n";
                            $headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
                            $headers .= "Content-class: urn:content-classes:calendarmessage\n";
                            
                            //Create Email Body (HTML)
                            $message = "--$mime_boundary\r\n";
                            $message .= "Content-Type: text/html; charset=UTF-8\n";
                            $message .= "Content-Transfer-Encoding: 8bit\n\n";
                            $message .= "<html>\n";
                            $message .= "<body>\n";
                            
                            $message .= 'Group Guidance Meeting';
                            
                            $message .= "</body>\n";
                            $message .= "</html>\n";
                            $message .= "--$mime_boundary\r\n";

                            //Event setting
                            $ical = 'BEGIN:VCALENDAR' . "\r\n" .
                            'PRODID:-//Microsoft Corporation//Outlook 10.0 MIMEDIR//EN' . "\r\n" .
                            'VERSION:2.0' . "\r\n" .
                            'METHOD:REQUEST' . "\r\n" .
                            'BEGIN:VTIMEZONE' . "\r\n" .
                            'TZID:Eastern Time' . "\r\n" .
                            'BEGIN:STANDARD' . "\r\n" .
                            'DTSTART:20091101T020000' . "\r\n" .
                            'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=1SU;BYMONTH=11' . "\r\n" .
                            'TZOFFSETFROM:-0400' . "\r\n" .
                            'TZOFFSETTO:-0500' . "\r\n" .
                            'TZNAME:EST' . "\r\n" .
                            'END:STANDARD' . "\r\n" .
                            'BEGIN:DAYLIGHT' . "\r\n" .
                            'DTSTART:20090301T020000' . "\r\n" .
                            'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=2SU;BYMONTH=3' . "\r\n" .
                            'TZOFFSETFROM:-0500' . "\r\n" .
                            'TZOFFSETTO:-0400' . "\r\n" .
                            'TZNAME:EDST' . "\r\n" .
                            'END:DAYLIGHT' . "\r\n" .
                            'END:VTIMEZONE' . "\r\n" .  
                            'BEGIN:VEVENT' . "\r\n" .
                            'ORGANIZER;CN="'.$from_name.'":MAILTO:'.$from_address. "\r\n" .
                            'ATTENDEE;CN="'.$to_name.'";ROLE=REQ-PARTICIPANT;RSVP=TRUE:MAILTO:'.$to_address. "\r\n" .
                            'LAST-MODIFIED:' . date("Ymd\TGis") . "\r\n" .
                            'UID:'.date("Ymd\TGis", strtotime($startTime)).rand()."@".$domain."\r\n" .
                            'DTSTAMP:'.date("Ymd\TGis"). "\r\n" .
                            'DTSTART;TZID="Pacific Daylight":'.date("Ymd\THis", strtotime($startTime)). "\r\n" .
                            'DTEND;TZID="Pacific Daylight":'.date("Ymd\THis", strtotime($endTime)). "\r\n" .
                            'TRANSP:OPAQUE'. "\r\n" .
                            'SEQUENCE:1'. "\r\n" .
                            'SUMMARY:' . $subject . "\r\n" .
                            'LOCATION:' . $location . "\r\n" .
                            'CLASS:PUBLIC'. "\r\n" .
                            'PRIORITY:5'. "\r\n" .
                            'BEGIN:VALARM' . "\r\n" .
                            'TRIGGER:-PT15M' . "\r\n" .
                            'ACTION:DISPLAY' . "\r\n" .
                            'DESCRIPTION:Reminder' . "\r\n" .
                            'END:VALARM' . "\r\n" .
                            'END:VEVENT'. "\r\n" .
                            'END:VCALENDAR'. "\r\n";
                            $message .= 'Content-Type: text/calendar;name="meeting.ics";method=REQUEST'."\n";
                            $message .= "Content-Transfer-Encoding: 8bit\n\n";
                            $message .= $ical;

                            if(mail($to_address, $subject, $message, $headers)){
                                echo "success";
                            }else{
                                echo "error";
                            }
                        newNotif($conn,$student_id);
                         echo '<script>
                          swal({
                              title: "Changes Saved!",
                              text: "Server Request Successful!",
                              icon: "success",
                              buttons: false,
                              timer: 1800,
                              closeOnClickOutside: false,
                                closeOnEsc: false,
                          })
                        </script>';}}
                        
                      }else{
                        echo '<script>
                          swal({
                            title: "Something went wrong...",
                            text: "Server Request Failed!",
                            icon: "error",
                            buttons: false,
                            timer: 1800,
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                          })
                        </script>';
                      }
                        echo "<meta http-equiv='refresh' content='2'>"
                        ;
                    }
                  function newNotif($conn,$student_id){

                        $result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, time, link, message_status) values (notif_id,'$student_id', 'The admin has set your counselling schedule.',now(),'Guidance_Student_Counselling.php', 'Delivered')");

                              if($result){
                              
                              }else{
                            
                              }
                    }
                ?>

  <!-- Updated Status -->
                <?php 

                  if(isset($_POST['update'])){
                      $counsel_id = $_POST['counsel_id'];
                      $appoint_id = $_POST['appoint_id'];
                      $date_com = $_POST['date_completed'];
                      $concern = $_POST['concerns'];
                      $status_id = $_POST['status3'];
                      $stud_id = $_POST['student_id'];

                      $query = "UPDATE guidance_appointments SET status_id = '$status_id', date_completed = '$date_com' WHERE appointment_id = $appoint_id";

    if(mysqli_multi_query($conn,$query)){

    $sql2="UPDATE indv_counselling set remarks='$concern' where counselling_id=$counsel_id AND appointment_id = $appoint_id;";

    if(mysqli_multi_query($conn,$sql2)){
      newNotif2($conn,$stud_id);
      echo '<script>
        swal({
            title: "Status Updated Successfully!",
            text: "Server Request Successful!",
            icon: "success",
            buttons: false,
            timer: 1800,
            closeOnClickOutside: false,
              closeOnEsc: false,
        })
      </script>';
    }else{
      echo '<script>
        swal({
          title: "Something went wrong...",
          text: "Server Request Failed!",
          icon: "error",
          buttons: false,
          timer: 1800,
          closeOnClickOutside: false,
          closeOnEsc: false,
        })
      </script>';
    }
    
    }else{

      echo '<script>
        swal({
          title: "Something went wrong...",
          text: "Server Request Failed!",
          icon: "error",
          buttons: false,
          timer: 1800,
          closeOnClickOutside: false,
          closeOnEsc: false,
        })
      </script>';

    }
    echo "<meta http-equiv='refresh' content='2'>";
  }
          function newNotif2($conn,$stud_id){

                        $result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, _time, link, message_status) values (notif_id,'$stud_id', 'Your counselling is now finished.',now(),'Guidance_Student_Counselling.php', 'Delivered')");

                              if($result){
                              
                              }else{
                                
                              }
                    }

                ?>

 <div class="modal fade" id="setAppointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">SET APPOINTMENT</h5>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                      <div class="modal-body">
                        <div class="container"> 
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name</label><input class="form-control" type="text" name="first_name3" id="first_name3" readonly=""><input type="hidden" name="counselling_id3" id="counselling_id3" readonly=""><input type="hidden" name="appointment_id3" id="appointment_id3" readonly=""><input type="hidden" name="student_id3" id="student_id3" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course & Year</label><input class="form-control" type="text" name="course_year3" id="course_year3" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label">Mode of Communication</label><input class="form-control" type="text" name="mode_name3" id="mode_name3" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="linklabel" hidden="">Link</label><input class="form-control" type="text" name="link" id="link" readonly="" hidden="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="codelabel" hidden="">Code</label><input class="form-control" type="text" name="code" id="code" readonly="" hidden="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                 <input type="text"name="appointment_date3" id="appointment_date3" class="form-control datepicker" onkeydown="return false" placeholder="YY-MM-DD" autocomplete="off" required="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                             <!--  <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" name="appointment_time3" id="appointment_time3" >
                                </div> -->
                            </div>
                          </div>                        
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="savechanges" class="btn btn-success">SAVE CHANGES</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>

<div class="modal fade" id="view-setAppointment"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">SET APPOINTMENT</h5>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="container"> 

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name</label><input class="form-control" type="text" name="first_name2" id="first_name2" readonly=""><input type="hidden" name="counselling_id2" id="counselling_id2" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course & Year</label><input class="form-control" type="text" name="course_year2" id="course_year2" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label">Mode of Communication</label><input class="form-control" type="text" name="mode_name2" id="mode_name2" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="vlinklabel" hidden="">Link</label><input class="form-control" type="text" name="vlink" id="vlink" readonly="" hidden="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="codelabel" hidden="">Code</label><input class="form-control" type="text" name="vcode" id="vcode" readonly="" hidden="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                  <input class="form-control" type="date" name="appointment_date2" id="appointment_date2" readonly="" >
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" name="appointment_time2" id="appointment_time2" disabled="">
                                </div>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>

<!-- Update Status -->

<div class="modal fade" id="updatestatus" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 600px;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">EDIT STATUS OF COUNSELLING</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                      <div class="modal-body c">
                        <div class="container"> 
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date Filed:</label>
                                  <input type="text" name="date_filed" id="date_filed3" class="form-control datepicker" onkeydown="return false" placeholder="MM/DD/YY" autocomplete="off" required="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">ID Number:</label><input class="form-control" type="text" name="student_id" id="student_id" placeholder="" readonly="">
                                </div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name:</label><input class="form-control" type="text" name="first_name4" id="first_name4" placeholder="" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course:</label><input class="form-control" type="text" name="course" id="course3" placeholder="" readonly="">
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Year Level & Section:</label><input class="form-control" type="text" name="year_section3" id="year_section3" placeholder="" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">Status of Counselling:</label>
                                    <select class="form-control" id="status3" name="status3" required="">
                                      <option selected="">ON GOING</option>
                                      <option value="1">COMPLETED</option>
                                    </select>
                                  </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date Completed:</label>
                                  <input class="form-control" type="date" name="date_completed" id="date_completed" required="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Concerns/Remarks:</label>
                                  <textarea id="concerns" name="concerns" rows="4" cols="60" required=""></textarea>
                                  <input type="hidden" name="counsel_id" id="counsel_id" readonly=""><input type="hidden" name="appoint_id" id="appoint_id" readonly="">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="update" class="btn btn-success">UPDATE</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>

<!--  End updated status -->

<!-- <div id="myModal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notifications</h5>
            </div>
            <div class="modal-body">
                <p>You have <?php echo $count2;  ?> unread notifications</p><br>
                
                   
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div> -->

      <!--</div>-->
    </main>
<?php  
      if ($count2!=0) { ?>
        <script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
      <?php
    }
      ?>

    <script type="text/javascript">
       //prevent form resubmission
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }

            $('#home-table').DataTable();
            $('#show-table').DataTable();

// required SET APPOINTMENT

/*$(document).ready(function(){
$('input[name=appointment_date3]').blur(function(){
if($(this).val().length == 0){
document.getElementById('appointment_date3').style.backgroundColor='#FFCECE';
document.getElementById('appointment_date3').style.border='1px solid red';
}});
});
$(document).ready(function(){
$('input[name=appointment_time3]').blur(function(){
if($(this).val().length == 0){
document.getElementById('appointment_time3').style.backgroundColor='#FFCECE';
document.getElementById('appointment_time3').style.border='1px solid red';
}});
});


//required fields UPDATE STATUS

$(document).ready(function(){
$('select[name=status3]').blur(function(){
if($(this).val().length == 0){
document.getElementById('status3').style.backgroundColor='#FFCECE';
document.getElementById('status3').style.border='1px solid red';
}});
});
$(document).ready(function(){
$('input[name=date_completed]').blur(function(){
if($(this).val().length == 0){
document.getElementById('date_completed').style.backgroundColor='#FFCECE';
document.getElementById('date_completed').style.border='1px solid red';
}});
});
$(document).ready(function(){
$('textarea').blur(function(){
if($(this).val().length == 0){
document.getElementById('concerns').style.backgroundColor='#FFCECE';
document.getElementById('concerns').style.border='1px solid red';
}});
});*/

//view schedule

     $(document).on('click', '.viewbutton', function(){
        var counselling_id = $(this).attr("data-id");  
        console.log(counselling_id);

      $.ajax({  
         url: 'fetch_counselling.php',
        method: 'POST',
        dataType: 'JSON',
        data:{
        counselling_id: counselling_id,
        },
        success: function(data){

      //student table
          $('#counselling_id2').val(data[0]);
          $('#first_name2').val(data[1]);
          $('#course_year2').val(data[2]);
          $('#mode_name2').val(data[3]);
          $('#appointment_date2').val(data[4]);
          $('#appointment_time2').val(data[5]);
          if (data[11]!=='' && data[11]!==null) {
            $("#vlink").prop('hidden', false);
            $("#vlinklabel").prop('hidden', false);
            $('#vlink').val(data[11]);
          }
          if (data[12]!=='' && data[12]!==null) {
            $("#vcode").prop('hidden', false);
            $("#vcodelabel").prop('hidden', false);
            $('#vcode').val(data[12]);
          }
            

      
        }, error: function(errorThrown){
                console.log("error!");
            }

    })
    
  $('#view-setAppointment').modal('show');  
});

     $(document).on('click', '.seebutton', function(){
        var counselling_id = $(this).attr("data-id");  
        console.log(counselling_id);

      $.ajax({  
         url: 'fetch_counselling.php',
        method: 'POST',
        dataType: 'JSON',
        data:{
        counselling_id: counselling_id,
        },
        success: function(data){

      //student table
          $('#counselling_id2').val(data[0]);
          $('#first_name2').val(data[1]);
          $('#course_year2').val(data[2]);
          $('#mode_name2').val(data[3]);
          $('#appointment_date2').val(data[4]);
          $('#appointment_time2').val(data[5]);
           if (data[11]!=='' && data[11]!==null) {
            $("#link").prop('hidden', false);
            $("#linklabel").prop('hidden', false);
            $('#link').val(data[11]);
          }
          if (data[12]!=='' && data[12]!==null) {
            $("#code").prop('hidden', false);
            $("#codelabel").prop('hidden', false);
            $('#code').val(data[12]);
          }

      
        }, error: function(errorThrown){
                console.log("error!");
            }

    })
    
  $('#view-setAppointment').modal('show');  
});

//updateeee

    $(document).on('click', '.updatebutton', function(){
        var counselling_id = $(this).attr("id");  
        console.log(counselling_id);

      $.ajax({  
         url: 'fetch_updateAppointment.php',
        method: 'POST',
        dataType: 'JSON',
        data:{
        counselling_id: counselling_id,
        },
        success: function(data){

      //student table

          $('#counselling_id3').val(data[0]);
          $('#appointment_id3').val(data[1]);
          $('#first_name3').val(data[2]);
          $('#course_year3').val(data[3]);
          $('#mode_name3').val(data[4]);
          $('#appointment_date3').val(data[5]+' '+data[6]);
          /*$('#appointment_time3').val(data[6]);*/
          if (data[12]!=='' && data[12]!==null) {
            $("#link").prop('hidden', false);
            $("#linklabel").prop('hidden', false);
            $('#link').val(data[12]);
          }
          if (data[13]!=='' && data[13]!==null) {
            $("#code").prop('hidden', false);
            $("#codelabel").prop('hidden', false);
            $('#code').val(data[13]);
          }
      
        }, error: function(errorThrown){
                console.log("error!");
            }
    })
    
  $('#setAppointment').modal('show');  
});

// set into completed

    $(document).on('click', '.updatestatus', function(){
        var counselling_id = $(this).attr("id");  
        console.log(counselling_id);

      $.ajax({  
         url: 'fetch_updateAppointment.php',
        method: 'POST',
        dataType: 'JSON',
        data:{
        counselling_id: counselling_id,
        },
        success: function(data){

      //student table
      $('#counsel_id').val(data[0]);
          $('#appoint_id').val(data[1]);
          $('#date_filed3').val(data[9]);
          $('#student_id').val(data[8]);
          $('#first_name4').val(data[2]);
          $('#course3').val(data[10]);
          $('#year_section3').val(data[11]);
      
        }, error: function(errorThrown){
                console.log("error!");
            }
    })
    
  $('#updatestatus').modal('show');  
});

    </script>
      <script type="text/javascript">
                $(document).ready(function(){
                  /*STATUS*/
                  $("#filter_month").on('change', function(){
                    var month = $("#filter_month").val();
                    var course = $("#filtcourse").val();
                    var status = $("#filterstatus").val();
                    /*alert(month);*/
                    $.ajax({
                          url:"filter_Guidance_Counselling.php",
                          type:"POST",
                          data:{month : month, course: course, status:status},
                          beforeSend:function(){
                            $(".divFilter").html("Working.....");
                          },
                          success:function(data){
                            $(".divFilter").html(data);
                          },
                    });
                
                  });
                  $("#filtcourse").on('change', function(){
                    var month = $("#filter_month").val();
                    var course = $("#filtcourse").val();
                    var status = $("#filterstatus").val();
                    /*alert(value);*/
                    $.ajax({
                          url:"filter_Guidance_Counselling.php",
                          type:"POST",
                          data:{month : month, course: course, status:status},
                          beforeSend:function(){
                            $(".divFilter").html("Working.....");
                          },
                          success:function(data){
                            $(".divFilter").html(data);
                          },
                    });
                
                  });
                  $("#filterstatus").on('change', function(){
                    var month = $("#filter_month").val();
                    var course = $("#filtcourse").val();
                    var status = $("#filterstatus").val();
                    /*alert(status);*/
                    $.ajax({
                          url:"filter_Guidance_Counselling.php",
                          type:"POST",
                          data:{month : month, course: course, status:status},
                          beforeSend:function(){
                            $(".divFilter").html("Working.....");
                          },
                          success:function(data){
                            $(".divFilter").html(data);
                          },
                    });
                
                  });
                });
              </script>
              <!-- DATEPICKER -->
<?php 
                 $results[]= '';$disableTimeArr[]=''; $i=0;$count=0;
                $from= date('Y-m-d'); 
                $sql="SELECT DATE_FORMAT(appointment_date, '%d') as dy,appointment_date, appointment_time FROM `guidance_appointments` WHERE appointment_date > '$from'";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){

                  /*collect all schedule by hours(format-11/27/2021:8)*/
                  $hourholder=date('H', strtotime($row['appointment_time']));
                  $hourRemoveLeadingZero=ltrim($hourholder, "0");
                  $dateholder=date('m/d/Y',strtotime($row['appointment_date']));
                  $timeToDisableVar=$dateholder.':'.$hourRemoveLeadingZero;
                  $disableTimeArr[]='"'.$timeToDisableVar.'"';
                  
                  /*count the number of schedule, if >= 6 disable dates*/
                  $sql2="SELECT DATE_FORMAT(appointment_date, '%d') as dy, appointment_date FROM `guidance_appointments` WHERE  appointment_date > '$from' and DATE_FORMAT(appointment_date, '%d')";
                $result2 = mysqli_query($conn, $sql2);
               
                while($row2 = mysqli_fetch_assoc($result2)){
                  if ($row['dy']==$row2['dy']) {
                    $count++;
                    if ($count==6) {
                      $time= strtotime($row['appointment_date']);
                    $holder=date('d-m-Y', $time);
                    $results[] = '"'.$holder.'"';
                    }
                    # code...
                  }
                  
                }
                    
                } 
                $results=array_filter($results);
                $totaldayslist= implode(", ", $results);
                $disableTimeArr=array_filter($disableTimeArr);
                $timeToDisable= implode(", ", $disableTimeArr);
                ?>
                <!-- DISABLE DATESCHEDULE -->
<script type="text/javascript">
    var disabledtimes_mapping = [<?php echo $timeToDisable;?>];
    var datesForDisable = [<?php echo $totaldayslist;?>];
function formatDate(datestr)
{
    var date = new Date(datestr);
    var day = date.getDate(); day = day>9?day:"0"+day;
    var month = date.getMonth()+1; month = month>9?month:"0"+month;
    return month+"/"+day+"/"+date.getFullYear();
}

$(".datepicker").datetimepicker({
    format: 'yyyy/mm/dd hh:ii',
    startDate: new Date(),
    datesDisabled: datesForDisable,
    daysOfWeekDisabled: [0,6],
    autoclose: true,
    onRenderHour:function(date){
  if(disabledtimes_mapping.indexOf(formatDate(date)+":"+date.getUTCHours())>-1)
    {
        return ['disabled'];
    }
    }
});</script>
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