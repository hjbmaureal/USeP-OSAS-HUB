  <?php
session_start();
include('../../conn.php');

  include '../../php/notification-timeago.php'; 
//validating session


 if (!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Student'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id = $_SESSION['id'];
  $count = 0;
  $job_count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where user_id='$id' and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}

$query2=mysqli_query($conn,"SELECT count(*) as cnt from job_hiring_announcement");
  while($row=mysqli_fetch_array($query2)){ $job_count = ($row['cnt']==0) ? '' : $row['cnt'] ;}



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
      <link rel="icon" href="imageg/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Student Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="cssg/main.css">
          <link rel="stylesheet" type="text/css" href="cssg/upstyle.css">
      <!-- Font-icon css-->
      <link href="http://fonts.cdnfonts.com/css/olde-english" rel="stylesheet">  
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="cssg/all.min.css">
      <link rel="stylesheet" type="text/css" href="cssg/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script type="text/javascript" src="jsg/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="jsg/plugins/dataTables.bootstrap.min.js"></script>
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
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">STUDENT HUB</p>
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
            <li>
              <a class="app-menu__item" href="Job-Announcements.php">
                <i class="app-menu__icon fa fa-bullhorn"></i>
                <span class="app-menu__label">Job Hirings</span>
                <span class="text-right"><?php 
                if($job_count==0){
                echo '<b style="background-color:#FF0000; padding:4px 6px;font-size:8px; margin-left:10px; border-radius:100%;">0</b>';
                }else{
                echo '<b style="background-color:#FF0000; padding:4px 6px;font-size:8px; margin-left:10px; border-radius:100%;">'.$job_count.'</b>';
                }
                 ?></span>
              </a>
          </li>
          <li class="p-2 sidebar-label"><span class="app-menu__label">STUDENT'S AFFAIRS AND SERVICES</span></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Discipline Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Home-Discipline.php">Home</a></li>
              <li><a class="treeview-item" href="Discipline-Complaints.php">Complaints</a></li>
              <li><a class="treeview-item" href="Discipline-HistoryComplaints.php">Complaint Records</a></li>
              <li><a class="treeview-item" href="Discipline-Response.php">Response</a></li>

            </ul>
          </li>

                <?php 
                $org_select=mysqli_query($conn,"SELECT * from approve_funded where org_pres_gov like '$id%'");
                $org= mysqli_fetch_array($org_select);

                  if (!empty($org)){
                    if($org['type']=='Govt. Funded'){
                      echo '
                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                          <li><a class="treeview-item" href="../M-StudentGov/Home-Orgs.php">Home</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov/Org-files.php">Organization Files</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov/Accre-files.php">Re-Accreditation Files</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov/Oath-files.php">Oath of Office</a></li>
                        </ul>
                      </li>
            
                    ';

                    }else{
                      echo '
                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                          <li><a class="treeview-item" href="../M-StudentGov-NonFunded/Home-Orgs.php">Home</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov-NonFunded/Org-files.php">Organization Files</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov-NonFunded/Accre-files.php">Re-Accreditation Files</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov-NonFunded/Oath-files.php">Oath of Office</a></li>
                        </ul>
                      </li>
            
                    ';
                    }
                    
            
            
                  } else {
                    echo '
                         <li><a class="app-menu__item" href="Home-Orgs.php"><i class="app-menu__icon fa fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services</span></a></li>
                    ';
                  }
            
            ?>

            <?php 
                  if ($_SESSION['sl_status']=='Hired'){
                    echo '
                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Labor Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                  <li><a class="treeview-item" href="Home-Labor.php">Home</a></li>
                                  <li><a class="treeview-item" href="Labor-DTR.php">DTR</a></li>
                                  <li><a class="treeview-item" href="Labor-Accomplishments.php">Accomplishment Reports</a></li>
            
            
                                </ul>
                        </li>
            
                    ';
            
            
                  } else {
                    echo '
                          <li><a class="app-menu__item" href="Home-Labor.php"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Student Labor Services</span></a></li>
                    ';
                  }
            
            ?>

          <li><a class="app-menu__item" href="ReqGoodMoral_Student.php"><i class="app-menu__icon fa fa-envelope-o"></i><span class="app-menu__label">Request for Good Moral</span></a></li>


          <li class="p-2 sidebar-label"><span class="app-menu__label">GUIDANCE OFFICE SERVICES</span></li>
          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_StudentUI.php">Home</a></li>
              <li><a class="treeview-item active" href="Guidance_Student_Counselling.php">Counselling</a></li>
              <li><a class="treeview-item" href="Guidance_Student_GroupGuidance.php">Group Guidance Activities</a></li>
              <li><a class="treeview-item" href="Guidance_Student_Evaluation.php">Evaluation</a></li>
            </ul>
          </li>


            <li class="p-2 sidebar-label"><span class="app-menu__label">SCHOLARSHIP OFFICE SERVICES</span></li>

            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fas fa-handshake-o"></i>
                    <span class="app-menu__label">Scholarship Services  </span>
                    <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="student-scholarship-dashboard.php">Home</a></li>
              <li><a class="treeview-item" href="student-scholarship-data-form.php">Scholarship Data Form</a></li>

            </ul>
            </li>



            <li class="p-2 sidebar-label"><span class="app-menu__label">CLINIC OFFICE SERVICES</span></li>
           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Clinic_Home.php">Home</a></li>
              <li><a class="treeview-item" href="Clinic_Privacy-Policy.php">Consultation</a></li>
              <li><a class="treeview-item" href="StudentConsultationHistory.php">Consultation History</a></li>
              <li><a class="treeview-item" href="Prescription.php">Prescription</a></li>
              <li><a class="treeview-item" href="RequestMedCert.php">Request for Medical Certificate</a></li>
              <li><a class="treeview-item" href="RequestMedRecsCert.php">Request for Medical Records Certification</a></li>

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
                  $count_sql="SELECT * from notif where user_id='$id'  order by time desc";
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
           <?php
          
        if(isset($_SESSION['error'])){
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
           echo '<script>
                          swal({
                              title: "Intake Form Submitted Successfully!",
                              text: "Server Request Successful!",
                              icon: "success",
                              buttons: false,
                              timer: 1800,
                              closeOnClickOutside: false,
                                closeOnEsc: false,
                          })
                        </script>';
          unset($_SESSION['right']);
          echo "<meta http-equiv='refresh' content='2'>";
          unset($_SESSION['success']);
    
      ?>
         <!--    <script>
        $(function() {
         $('#studentdetails').modal('show');
        });
        </script> -->
        <?php
      }
        ?>

        <?php
          
        if(isset($_SESSION['wrong'])){
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
          unset($_SESSION['wrong']);
        }
        if(isset($_SESSION['right'])){
          echo '<script>
                          swal({
                              title: "Appointment Has Been Set!",
                              text: "Server Request Successful!",
                              icon: "success",
                              buttons: false,
                              timer: 1800,
                              closeOnClickOutside: false,
                                closeOnEsc: false,
                          })
                        </script>';
          unset($_SESSION['right']);
          echo "<meta http-equiv='refresh' content='2'>";
        }
    
      ?>
      <!-- History of Counselling -->
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
                    <div class="col-auto">      
                  <div class="inline-block">
                    Status
                    <br>
                     <select class="bootstrap-select" name="filterstatus" id="filterstatus">
                      <option class="select-item" value="all" selected="selected">All</option>
                        <?php
                                           $result=mysqli_query($conn, "SELECT * FROM _status");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $value= $res['status_id']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['status'];?></option>
                                              <?php } ?>
                      </select>
                    </div>
                    <div class="inline-block">
                    Mode of Communication
                    <br>
                    <select class="bootstrap-select" name="filtermode" id="filtermode">
                      <option class="select-item" value="all" selected="selected">All</option>
                        <?php 
                                           $result=mysqli_query($conn, "SELECT * FROM mode_of_communication");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $value= $res['mode_id']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['communication_mode'];?></option>
                                              <?php } ?>
                      </select>
                    </div>
                      </div>
                        <div class="col-sm">
                              <?php 
                               $sqlselect="SELECT intake_form.Student_id as id from intake_form WHERE Student_id='$id'";
                              $sqlid=$conn->query($sqlselect);
                                $count=mysqli_num_rows($sqlid);
                               if (!$count) { ?>
                                  <div class="inline-block float ml-2 mt-1">
                                      <button class="btn btn-warning btn-sm verify" style="width: 130px;" class="text mr-2" data-toggle="modal" a href="#details<?php echo $id; ?>"><i class="fas fa-edit"></i>&nbsp; New Form</button>
                                      <?php include('intakeFormModal.php');?>
                                  </div>
                                     <div class="inline-block float ml-2 mt-1">
                                        <button class="btn btn-success btn-sm verify" id="showModal" style="width: 150px;" name="intake" a href="#studentdetails" class="text mr-2" style="color: white;"  data-toggle="modal" data-target="#studentwarning"><i class="fas fa-plus"></i> &nbsp; New Counselling</button> 
                                        <?php include('intakeFormModal.php');?>
                                    </div>
                                  
                                  </div>
                               <?php }else{ ?>
                                  <div class="inline-block float ml-2 mt-1">
                                      <button disabled="disabled" class="btn btn-warning btn-sm verify" style="width: 130px;" class="text mr-2" data-toggle="modal" a href="#details<?php echo $id; ?>"><i class="fas fa-edit"></i>&nbsp; New Form</button>
                                      <?php include('intakeFormModal.php');?>
                                  </div>
                                  <div class="inline-block float ml-2 mt-1">
                                      <button class="btn btn-success btn-sm verify" id="showModal" style="width: 150px;" name="intake" a href="#studentdetails" class="text mr-2" style="color: white;"  data-toggle="modal" data-target="#studentdetails"><i class="fas fa-plus"></i>&nbsp; New Counselling</button> 
                                      <?php include('intakeFormModal.php');?>
                                  </div>
                               <?php } ?>

                          
                     
                      </div>
                  </div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div class="calldiv">
                  <table class="table table-hover table-bordered" id="sampleTable2">
                    <thead>
                      <tr>
                      <th>Date Filed</th>
                      <th class="max">Mode of Communication</th>                      
                      <th class="max">Date and Time of Appointment</th>
                      <th >Status</th>
                      <th class="max">Date Completed</th>
                    </tr>
                  </thead>
                  <tbody>
                            <?php 
          $sql="SELECT student.Student_id,guidance_appointments.date_filed as a, intake_form.intake_type as b, mode_of_communication.communication_mode as c, guidance_appointments.appointment_date as d, guidance_appointments.appointment_time as e, _status.status as f, guidance_appointments.date_completed as g 
            FROM guidance_appointments 
            LEFT JOIN indv_counselling ON guidance_appointments.appointment_id=indv_counselling.appointment_id 
            LEFT JOIN intake_form ON intake_form.intake_id=indv_counselling.intake_id 
            LEFT JOIN student ON student.Student_id=intake_form.Student_id 
            left JOIN mode_of_communication ON guidance_appointments.mode_id=mode_of_communication.mode_id 
            left JOIN _status ON guidance_appointments.status_id=_status.status_id where student.Student_id='$id'";
          if($result = mysqli_query($conn, $sql)){
          while ($row = mysqli_fetch_assoc($result)) { ?>

                                <tr>
                                  <td><?php echo $row['a'] ?></td>
                                  <td><?php echo $row['c']; ?></td> 
                                  <td><?php echo $row['d'].'  '.$row['e']; ?></td>
                                  <td><?php echo $row['f'];?></td>
                                  <td><?php echo$row['g']; ?></td>
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
        <!--</div>-->
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
              <script type="text/javascript">
                $(document).ready(function(){
                  $("#filterstatus").on('change', function(){
                    var status = $(this).val();
                    var mode = $("#filtermode").val();
                    // alert(value);
                    $.ajax({
                          url:"filterphp.php",
                          type:"POST",
                          data:{status: status, mode: mode},
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
                
                  });

                  $("#filtermode").on('change', function(){
                    var mode = $(this).val();
                    var Status =$("#filterstatus").val();
                    /*alert(value);*/
                    $.ajax({
                          url:"filterphp.php",
                          type:"POST",
                          data:{status: status, mode: mode},
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
                
                  });
                   $("#link").on('change', function(){
                    var mode = $(this).val();
                    /*alert(mode);*/
                    
                    $.ajax({
                          url:"filter_fblink.php",
                          type:"POST",
                          data:{mode: mode},
                          beforeSend:function(){
                            $(".calldivlink").html("Working.....");
                          },
                          success:function(data){
                            $(".calldivlink").html(data);
                          },
                    });
                    
                  });
                });
              </script>
        <!-- INTAKE FORM MODAL -->

      </main>
      <!-- Essential javascripts for application to work-->
      
      <script src="jsg/jquery-3.3.1.min.js"></script>
      <script src="jsg/popper.min.js"></script>
      <script src="jsg/bootstrap.min.js"></script>
      <script src="jsg/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="jsg/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="jsg/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="jsg/plugins/sweetalert.min.js"></script>
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
      <script type="text/javascript" src="jsg/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="jsg/plugins/dataTables.bootstrap.min.js"></script>
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