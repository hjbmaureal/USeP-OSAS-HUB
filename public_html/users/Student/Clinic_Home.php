  <!DOCTYPE html>
  <html lang="en">
  <?php
  session_start();
  include('connect.php');
  include('conn.php');
  if(!isset($_SESSION['id'])){
  echo '<script> alert("Please Login first!!!") 
  window.location="../../index.php";
  </script>';
    
}

$id = $_SESSION['id'];

$count = 0;
  $job_count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where user_id='$id' and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}

$query2=mysqli_query($conn,"SELECT count(*) as cnt from job_hiring_announcement");
  while($row=mysqli_fetch_array($query2)){ $job_count = ($row['cnt']==0) ? '' : $row['cnt'] ;}


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
      <title>USeP Student Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="cssc/main.css">
      <link rel="stylesheet" type="text/css" href="cssc/home.css">
      <link rel="stylesheet" type="text/css" href="cssc/upstyle.css">
      <link rel="stylesheet" type="text/css" href="../../css/custom.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="cssc/all.min.css">
      <link rel="stylesheet" type="text/css" href="cssc/fontawesome.min.css">
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
              <li><a class="treeview-item " href="Home-Discipline.php">Home</a></li>
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
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_StudentUI.php">Home</a></li>
              <li><a class="treeview-item" href="Guidance_Student_Counselling.php">Counselling</a></li>
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
           <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item active" href="Clinic_Home.php">Home</a></li>
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
                  $count_sql="SELECT * from notif where user_id='$id' order by time desc";
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
 
           </div>   
      </form>

      <!---<div class="row">
<div class="col-md-6">
          <div class="tile ">
            <center><h4 class="mb-2">CALENDAR</h4></center>
              <div id="calendar"></div>
            </div>
          </div>
      <div class="col-md-6">
              <div style="background-color: #193541; padding: 12px 10px;">
                          <div class="info" style="color: #FFFFFF;"><center><h5 class="mb-2">Upcoming Schedules</h5></center>
                          </div>  
                        </div>
              <div class="tile">
              <div id="external-events">
        <?php
        $limit=5;
    $id=$_SESSION['id'];
          $sql="Select appointment_timefrom, consultation_type.consultation_type,consultation_duration,date_format(consultation.appointment_date,'%M %d, %Y')as appointment_date,CONCAT(student.first_name,' ', student.last_name) as name from consultation join student on consultation.patient_id=student.Student_id join consultation_type on consultation.consultation_type=consultation_type.type_id where consultation.status='Approved' AND consultation.patient_id='$id' order by appointment_date,appointment_timefrom,consultation_duration ASC LIMIT $limit";
       $res = $db->query($sql);
      $cnt=1;
      
      while($row = $res->fetch_assoc()) {
      $appointment_start= new DateTime($row['appointment_timefrom']);
      $appointment_end= new DateTime($row['consultation_duration']);
         ?>
                <div class="fc-event"><h6>  <?php echo htmlentities($row['consultation_type']);?>-<?php echo htmlentities($row['name']);?><br></h6> Date: <?php echo htmlentities($row['appointment_date']);?><br> Time: <?php echo $appointment_start->format('g:i a');?> - <?php echo $appointment_end->format('g:i a');?></div>
        <?php
        }
        if ($res->num_rows == 0) {
        ?>
        
        <div class="fc-event"><h6> No Upcoming Events! </h6></div>
        <?php 
        }
        ?>
           
              </div>
            </div>
          </div>
        </div>
        -->


      <div class="landingpage">

      <!--home-->     
      <section id="home" style="background-image: url('image/home.svg'); background-repeat: no-repeat; background-size: 100% 100%;">
        <div class="shortcuts">
          <ul class="shortcut">
            <li class="shortcut_links"><a class="open" href="#home" style=" text-decoration: none;">Home</a></li>&emsp;
            <li class="shortcut_links"><a class="link" href="#about" style=" text-decoration: none;">About</a></li>&emsp;
            <li class="shortcut_links"><a class="link" href="#mandate" style=" text-decoration: none;">Mandate</a></li>&emsp;
            <li class="shortcut_links"><a class="link" href="#service" style=" text-decoration: none;">Services</a></li>&emsp;
          </ul>
        </div>

        <div class="story">
          <p>
          <svg class="animated" id="freepik_stories-online-doctor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 750 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><style>svg#freepik_stories-online-doctor:not(.animated) .animable {opacity: 0;}svg#freepik_stories-online-doctor.animated #freepik--background-complete--inject-216 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}svg#freepik_stories-online-doctor.animated #freepik--Desk--inject-216 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedLeft;animation-delay: 0s;}svg#freepik_stories-online-doctor.animated #freepik--Device--inject-216 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}svg#freepik_stories-online-doctor.animated #freepik--Hearts--inject-216 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideUp;animation-delay: 0s;}svg#freepik_stories-online-doctor.animated #freepik--speech-bubble--inject-216 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideUp;animation-delay: 0s;}svg#freepik_stories-online-doctor.animated #freepik--character-1--inject-216 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomOut;animation-delay: 0s;}svg#freepik_stories-online-doctor.animated #freepik--character-2--inject-216 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedRight;animation-delay: 0s;}            @keyframes zoomIn {                0% {                    opacity: 0;                    transform: scale(0.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }                    @keyframes lightSpeedLeft {              from {                transform: translate3d(-50%, 0, 0) skewX(20deg);                opacity: 0;              }              60% {                transform: skewX(-10deg);                opacity: 1;              }              80% {                transform: skewX(2deg);              }              to {                opacity: 1;                transform: translate3d(0, 0, 0);              }            }                    @keyframes slideUp {                0% {                    opacity: 0;                    transform: translateY(30px);                }                100% {                    opacity: 1;                    transform: inherit;                }            }                    @keyframes zoomOut {                0% {                    opacity: 0;                    transform: scale(1.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }                    @keyframes lightSpeedRight {              from {                transform: translate3d(50%, 0, 0) skewX(-20deg);                opacity: 0;              }              60% {                transform: skewX(10deg);                opacity: 1;              }              80% {                transform: skewX(-2deg);              }              to {                opacity: 1;                transform: translate3d(0, 0, 0);              }            }        </style><g id="freepik--background-complete--inject-216" class="animable" style="transform-origin: 370.123px 267.277px;"><rect x="102.34" y="101" width="14.11" height="63.25" style="fill: rgb(224, 224, 224); transform-origin: 109.395px 132.625px;" id="el74yzw2edkrl" class="animable"></rect><g id="el6hjdepevg9u"><rect x="102.34" y="101" width="14.11" height="63.25" style="fill: rgb(224, 224, 224); transform-origin: 109.395px 132.625px; transform: rotate(-90deg);" class="animable"></rect></g><path d="M161.92,132.78a5.21,5.21,0,0,1-.1-.85c0-.62-.1-1.45-.18-2.5,0-.56-.08-1.17-.12-1.84s-.22-1.41-.34-2.2a39.3,39.3,0,0,0-1.12-5.43A50.29,50.29,0,0,0,154.2,106,52.26,52.26,0,0,0,91.42,83.75a47.6,47.6,0,0,0-13.21,7.11,58.23,58.23,0,0,0-5.91,5,58.34,58.34,0,0,0-5.11,6,50.34,50.34,0,0,0-7.46,14.37,51.73,51.73,0,0,0,0,32.93,50.57,50.57,0,0,0,7.45,14.37,59.72,59.72,0,0,0,5.11,6.06,60.82,60.82,0,0,0,5.92,5,56.06,56.06,0,0,0,6.4,4.12,55.21,55.21,0,0,0,6.81,3,52.4,52.4,0,0,0,62.78-22.27,50.29,50.29,0,0,0,5.86-13.94,39.3,39.3,0,0,0,1.12-5.43c.12-.79.26-1.52.34-2.2s.08-1.28.12-1.84c.08-1,.14-1.88.18-2.5a5.21,5.21,0,0,1,.1-.85,5,5,0,0,1,0,.85c0,.62,0,1.46-.07,2.52,0,.55,0,1.17-.06,1.85s-.19,1.41-.3,2.22a36,36,0,0,1-1,5.48,50,50,0,0,1-5.74,14.16,52.92,52.92,0,0,1-63.67,22.92,55.89,55.89,0,0,1-6.95-3,57.37,57.37,0,0,1-6.54-4.18,59.7,59.7,0,0,1-6-5.13,59.77,59.77,0,0,1-5.23-6.17,52,52,0,0,1-7.63-14.67,52.87,52.87,0,0,1,0-33.63,51.45,51.45,0,0,1,7.63-14.67,60.63,60.63,0,0,1,5.22-6.16,62,62,0,0,1,6-5.13,49.12,49.12,0,0,1,13.49-7.22,53.32,53.32,0,0,1,28-2.24,53.06,53.06,0,0,1,35.72,25.16,49.84,49.84,0,0,1,5.74,14.15,36.34,36.34,0,0,1,1,5.49c.11.8.24,1.54.3,2.22s0,1.29.06,1.85c0,1.06.06,1.9.07,2.52A5,5,0,0,1,161.92,132.78Z" style="fill: rgb(224, 224, 224); transform-origin: 108.975px 132.704px;" id="eld6ztd4aywl" class="animable"></path><path d="M43.67,249.78s-11.86,4.09.23,29.43,20.58,38,20.58,38,2.11,5.87-2.8,6.64-15.62-1.24-18,4.68c-2.43,6.14,1.92,12.11,10.91,17.49s28.27,17.88,30,19,3.37,3.86.11,4.92-27.53,2.93-25.95,14.4,29.1,22.32,32.08,23.56,3.67,2.55,3.38,4.2-8.5,1.51-15.38,2.32-14.72,3-13.25,9.51,17.56,20.61,57.42,25.61l18.62,1.1,10.57-15.47c20.6-34.5,19.4-55.85,15.15-61s-10.77-.33-15.65,4.59-9.82,11.48-11.3,10.7-2.08-2.13-1.22-5.25,9.23-31.49,1.17-39.79-24.48,9.68-27.32,11.59-4-1.08-3.81-3.12,2.18-25,3.47-35.35S112,300,105.67,298.14c-6.11-1.8-11.12,7.87-14.75,11.27s-7-1.87-7-1.87S79.26,293.07,66.72,268s-23.29-18.07-23.29-18.07" style="fill: rgb(235, 235, 235); transform-origin: 104.173px 349.836px;" id="elrppr4qsv33r" class="animable"></path><path d="M142.52,455c-9.14-18.48-24.83-51.61-38.44-80s-26-54-35-72.56c-4.52-9.24-8.18-16.73-10.73-21.93-1.25-2.57-2.23-4.58-2.91-6L54.68,273c-.16-.35-.23-.54-.23-.54l.29.51.79,1.53c.7,1.38,1.72,3.37,3,5.92,2.61,5.14,6.34,12.61,10.9,21.85C78.58,320.8,91,346.44,104.6,374.8s29.24,61.52,38.29,80.05" style="fill: rgb(224, 224, 224); transform-origin: 98.67px 363.73px;" id="el6yr0gln3qoi" class="animable"></path><path d="M58.59,331.9a6,6,0,0,1,1.29.4c.82.28,2,.73,3.43,1.3,2.88,1.15,6.82,2.83,11.13,4.77l11,5,3.35,1.49a6.09,6.09,0,0,1,1.21.6,5.55,5.55,0,0,1-1.29-.39c-.82-.29-2-.74-3.43-1.33-2.87-1.17-6.78-2.9-11.1-4.84L63.15,334l-3.35-1.47A6.39,6.39,0,0,1,58.59,331.9Z" style="fill: rgb(224, 224, 224); transform-origin: 74.295px 338.68px;" id="eldl1357wuuhm" class="animable"></path><path d="M91.33,344.3c-.15-.06,3-8.33,7-18.47s7.34-18.32,7.49-18.27-3,8.33-7,18.48S91.47,344.36,91.33,344.3Z" style="fill: rgb(224, 224, 224); transform-origin: 98.575px 325.93px;" id="ely1thcb2qj0k" class="animable"></path><path d="M110.27,388.8a6.77,6.77,0,0,1,.79-1.13l2.29-3c1.92-2.5,4.57-6,7.36-9.9s5.19-7.58,6.91-10.23c.81-1.24,1.5-2.29,2-3.14a5.76,5.76,0,0,1,.81-1.11,7,7,0,0,1-.61,1.23c-.43.78-1.07,1.89-1.89,3.24-1.63,2.71-4,6.4-6.79,10.34s-5.5,7.39-7.51,9.83c-1,1.21-1.85,2.19-2.44,2.85A5.83,5.83,0,0,1,110.27,388.8Z" style="fill: rgb(224, 224, 224); transform-origin: 120.35px 374.545px;" id="elwhodn4gisv" class="animable"></path><path d="M78.19,384.1a5.81,5.81,0,0,1,1.27.06l3.45.37c2.9.33,6.9.83,11.32,1.42s8.42,1.16,11.31,1.6l3.42.55a5.34,5.34,0,0,1,1.24.28,5.81,5.81,0,0,1-1.27-.06l-3.44-.37c-2.91-.33-6.91-.83-11.33-1.42s-8.42-1.16-11.31-1.6l-3.42-.55A5.34,5.34,0,0,1,78.19,384.1Z" style="fill: rgb(224, 224, 224); transform-origin: 94.195px 386.24px;" id="el7qft11krwkj" class="animable"></path><path d="M89.92,425.52a8.68,8.68,0,0,1,1.63.08l4.41.46c3.73.41,8.86,1,14.53,1.71s10.81,1.37,14.52,1.88l4.39.64a8.79,8.79,0,0,1,1.6.31,8.3,8.3,0,0,1-1.63-.09l-4.41-.45c-3.73-.41-8.86-1-14.54-1.71s-10.8-1.37-14.51-1.89l-4.39-.63A8.79,8.79,0,0,1,89.92,425.52Z" style="fill: rgb(224, 224, 224); transform-origin: 110.46px 428.059px;" id="el26gza1grzxh" class="animable"></path><path d="M130.05,430.2a10.61,10.61,0,0,1,1-1.46c.72-1,1.65-2.29,2.77-3.86,2.33-3.26,5.54-7.77,8.93-12.86s6.37-9.76,8.49-13.17l2.52-4a10,10,0,0,1,1-1.44,9.16,9.16,0,0,1-.78,1.56c-.54,1-1.34,2.4-2.36,4.13-2,3.46-4.94,8.18-8.35,13.27s-6.67,9.58-9.09,12.79c-1.21,1.6-2.21,2.88-2.92,3.75A9.62,9.62,0,0,1,130.05,430.2Z" style="fill: rgb(224, 224, 224); transform-origin: 142.405px 411.805px;" id="elj108fyjsqao" class="animable"></path><path d="M601.57,446.68c-27.48-16.82-35.52-50.66-36.34-81.45-.13-5.14-1-10.52,1.15-15.17s7.67-8.07,12.4-6.18c3.92,1.56,5.84,5.89,8.2,9.43a30,30,0,0,0,12.72,10.77c3.37,1.5,7.48,2.29,10.59.31,4.28-2.7,4.43-8.85,4.09-13.95q-.95-14.26-1.9-28.52c-.33-5.1-.66-10.31.63-15.25s4.53-9.65,9.3-11.3,11,.79,12.27,5.72c.55,2.05.26,4.23.53,6.34s1.4,4.4,3.45,4.87,4-1.1,5.46-2.69c5-5.46,8.13-12.32,11.07-19.12s5.77-13.75,10.21-19.66,10.78-10.76,18.07-11.62,15.34,3.19,17.62,10.25-1.47,14.64-5.69,20.73a114,114,0,0,1-22.35,24c-1.54,1.24-3.21,2.58-3.71,4.51-.9,3.46,2.53,6.65,5.95,7.56,3.88,1,8,.4,12,.62s8.42,1.73,10.16,5.4c2.4,5.09-1.63,10.82-5.71,14.66a98,98,0,0,1-27.87,18.41c-3.67,1.6-7.54,3-10.41,5.86s-4.42,7.52-2.37,11,6.81,4.35,10.69,3.39,7.28-3.32,10.94-5c6.85-3.07,15.94-3.13,20.8,2.66,3.19,3.81,3.78,9.34,2.58,14.18s-4,9.11-7,13.07c-10.44,13.87-24.19,25.35-40.11,32s-30.91,9.06-47.43,4.12" style="fill: rgb(245, 245, 245); transform-origin: 633.363px 354.174px;" id="eljokexnxx8hc" class="animable"></path><path d="M608.34,426.94c3.59-15.79,8.95-32.76,15.18-50.32l4.65-13c1.54-4.26,3.07-8.48,4.81-12.52a230.66,230.66,0,0,1,11.37-22.63c4-7,8-13.54,11.78-19.61s7.48-11.65,11-16.6a181.27,181.27,0,0,1,18.5-22.08c2.38-2.42,4.28-4.25,5.59-5.46l1.5-1.38a4.33,4.33,0,0,1,.53-.44,3.07,3.07,0,0,1-.46.51l-1.44,1.45c-1.26,1.26-3.13,3.12-5.46,5.58a192.33,192.33,0,0,0-18.22,22.21c-3.51,5-7.14,10.55-10.92,16.63S649,321.9,645.1,328.92a232.5,232.5,0,0,0-11.27,22.56c-1.73,4-3.24,8.21-4.78,12.48l-4.65,13c-6.22,17.55-11.59,34.47-15.22,50.2" style="fill: rgb(224, 224, 224); transform-origin: 650.795px 345.03px;" id="elcdgl7pdve1" class="animable"></path><path d="M633.25,351.06a10.93,10.93,0,0,1-.63-2.15c-.35-1.39-.8-3.42-1.31-5.94-1-5-2.21-12.05-3.48-19.77s-2.56-14.7-3.66-19.71c-.54-2.5-1-4.53-1.34-5.92a10.41,10.41,0,0,1-.42-2.2,10.56,10.56,0,0,1,.77,2.1c.45,1.37,1,3.37,1.64,5.87,1.27,5,2.66,12,3.93,19.7s2.36,14.53,3.21,19.8c.41,2.38.75,4.39,1,6A10.79,10.79,0,0,1,633.25,351.06Z" style="fill: rgb(224, 224, 224); transform-origin: 627.83px 323.215px;" id="elglb3mvfp64" class="animable"></path><path d="M698.11,334.84a14.52,14.52,0,0,1-2.6.47c-1.67.25-4.09.6-7.08,1.13-6,1-14.16,2.7-23.12,4.95s-17,4.68-22.74,6.58c-2.88.93-5.2,1.75-6.8,2.31a14,14,0,0,1-2.52.78,14.52,14.52,0,0,1,2.39-1.13c1.57-.66,3.85-1.58,6.72-2.6,5.71-2.07,13.73-4.58,22.72-6.86a231.37,231.37,0,0,1,23.25-4.69c3-.45,5.45-.7,7.14-.84A13.18,13.18,0,0,1,698.11,334.84Z" style="fill: rgb(224, 224, 224); transform-origin: 665.68px 342.937px;" id="el9auhj38pzj" class="animable"></path><path d="M609.07,425.68a3.18,3.18,0,0,1-.5-.77l-1.26-2.31c-1.09-2-2.59-5-4.4-8.61-3.62-7.33-8.3-17.6-13.31-29s-9.59-21.71-13.05-29.1l-4.12-8.74-1.11-2.39a3,3,0,0,1-.33-.86,3.48,3.48,0,0,1,.5.77c.34.63.75,1.39,1.26,2.31,1.09,2,2.59,4.95,4.4,8.61,3.62,7.33,8.3,17.6,13.31,29s9.59,21.72,13,29.11c1.7,3.59,3.09,6.54,4.12,8.74.45.95.81,1.74,1.11,2.38A3.17,3.17,0,0,1,609.07,425.68Z" style="fill: rgb(224, 224, 224); transform-origin: 590.03px 384.79px;" id="el26tjuwv4z4j" class="animable"></path><path d="M694.55,392.33a3.44,3.44,0,0,1-.84.4l-2.48,1-9.15,3.58c-7.73,3-18.36,7.35-30.09,12.12s-22.41,9-30.21,11.87c-3.89,1.44-7.06,2.57-9.26,3.31l-2.54.83a3.54,3.54,0,0,1-.91.23,3.62,3.62,0,0,1,.85-.41l2.48-1,9.15-3.59c7.73-3,18.35-7.34,30.09-12.12s22.41-9,30.2-11.87c3.9-1.43,7.06-2.56,9.26-3.3l2.54-.84A3.29,3.29,0,0,1,694.55,392.33Z" style="fill: rgb(224, 224, 224); transform-origin: 651.81px 409px;" id="elqjz0ylz8ih" class="animable"></path></g><g id="freepik--Desk--inject-216" class="animable" style="transform-origin: 376px 472.015px;"><path d="M721.89,472c0,.14-154.88.26-345.87.26S30.11,472.17,30.11,472,185,471.77,376,471.77,721.89,471.89,721.89,472Z" style="fill: rgb(38, 50, 56); transform-origin: 376px 472.015px;" id="el59vyvrqi78g" class="animable"></path></g><g id="freepik--Device--inject-216" class="animable" style="transform-origin: 378.785px 305.265px;"><rect x="128.4" y="136.79" width="498.15" height="329.42" rx="14.57" style="fill: rgb(69, 90, 100); transform-origin: 377.475px 301.5px;" id="ellw9pfs3tp3" class="animable"></rect><path d="M108.93,444.94H648.64a0,0,0,0,1,0,0v11a17.8,17.8,0,0,1-17.8,17.8H126.73a17.8,17.8,0,0,1-17.8-17.8v-11A0,0,0,0,1,108.93,444.94Z" style="fill: rgb(69, 90, 100); transform-origin: 378.785px 459.34px;" id="elz2ln8hmwwwd" class="animable"></path><rect x="141.77" y="149.88" width="470.02" height="278.19" style="fill: rgb(38, 50, 56); transform-origin: 376.78px 288.975px;" id="elz9ag9yqlqk8" class="animable"></rect><polygon points="328.37 441.85 335.07 452.5 429.31 452.5 435.53 441.85 328.37 441.85" style="fill: rgb(38, 50, 56); transform-origin: 381.95px 447.175px;" id="eldzt2ayyxfmd" class="animable"></polygon><rect x="151.45" y="159.3" width="451.62" height="267.89" rx="3.27" style="fill: rgb(235, 235, 235); transform-origin: 377.26px 293.245px;" id="eletucpyyywbi" class="animable"></rect><polygon points="603.08 428.54 151.26 428.54 152.09 180.28 603.08 180.28 603.08 428.54" style="fill: rgb(255, 255, 255); transform-origin: 377.17px 304.41px;" id="el7egqcis6s5y" class="animable"></polygon><path d="M189.29,169.64a3.61,3.61,0,1,1-3.61-3.61A3.61,3.61,0,0,1,189.29,169.64Z" style="fill: rgb(38, 50, 56); transform-origin: 185.68px 169.64px;" id="elk02b3qgb8ue" class="animable"></path><path d="M167.43,169.64a3.61,3.61,0,1,1-3.61-3.61A3.61,3.61,0,0,1,167.43,169.64Z" style="fill: rgb(38, 50, 56); transform-origin: 163.82px 169.64px;" id="elhe3ixp5pnxq" class="animable"></path><path d="M178.36,169.64a3.61,3.61,0,1,1-3.6-3.61A3.61,3.61,0,0,1,178.36,169.64Z" style="fill: rgb(38, 50, 56); transform-origin: 174.75px 169.64px;" id="elacrff93c0u8" class="animable"></path><path d="M606.13,441.93c0,.18-103,.32-230,.32s-230-.14-230-.32,103-.33,230.05-.33S606.13,441.75,606.13,441.93Z" style="fill: rgb(38, 50, 56); transform-origin: 376.13px 441.925px;" id="eluotgq4sgzsg" class="animable"></path><rect x="151.45" y="383.47" width="451.7" height="44.93" style="fill: rgb(197, 63, 63); transform-origin: 377.3px 405.935px;" id="elfrpw11qt3gq" class="animable"></rect><g id="ela0n3jmsu9dh"><rect x="151.45" y="383.47" width="451.7" height="44.93" style="fill: rgb(255, 255, 255); opacity: 0.7; transform-origin: 377.3px 405.935px;" class="animable"></rect></g><g id="elzbi2jsvfye"><circle cx="425.3" cy="406.12" r="16.68" style="fill: rgb(197, 63, 63); transform-origin: 425.3px 406.12px; transform: rotate(-80.73deg);" class="animable"></circle></g><path d="M425.3,409.87a3,3,0,0,1-3-3v-6.55a3,3,0,0,1,6,0v6.55A3,3,0,0,1,425.3,409.87Zm0-11.94a2.39,2.39,0,0,0-2.38,2.38v6.55a2.38,2.38,0,0,0,4.76,0v-6.55A2.39,2.39,0,0,0,425.3,397.93Z" style="fill: rgb(255, 255, 255); transform-origin: 425.3px 403.595px;" id="elukymdwkjqp9" class="animable"></path><path d="M425.3,412a5.41,5.41,0,0,1-4.22-1.67c-1.92-2.12-1.61-5.44-1.6-5.58a.32.32,0,1,1,.63.06s-.29,3.19,1.44,5.1a4.81,4.81,0,0,0,3.75,1.46,5,5,0,0,0,3.8-1.46c1.85-1.92,1.74-5.09,1.74-5.12a.31.31,0,0,1,.3-.33.34.34,0,0,1,.33.31c0,.14.11,3.47-1.91,5.58A5.69,5.69,0,0,1,425.3,412Z" style="fill: rgb(255, 255, 255); transform-origin: 425.463px 408.21px;" id="elvm5rmsfy948" class="animable"></path><path d="M425.3,416.59a.32.32,0,0,1-.32-.31v-4.61a.32.32,0,0,1,.32-.32.31.31,0,0,1,.31.32v4.61A.31.31,0,0,1,425.3,416.59Z" style="fill: rgb(255, 255, 255); transform-origin: 425.295px 413.97px;" id="elweiqwt43kzo" class="animable"></path><g id="elu73oes5ptr"><circle cx="336.71" cy="406.12" r="16.68" style="fill: rgb(197, 63, 63); transform-origin: 336.71px 406.12px; transform: rotate(-80.73deg);" class="animable"></circle></g><path d="M331.41,407.77a1.65,1.65,0,1,1,1.65-1.65A1.64,1.64,0,0,1,331.41,407.77Z" style="fill: rgb(255, 255, 255); transform-origin: 331.41px 406.12px;" id="eloz43czwqw6" class="animable"></path><path d="M336.53,407.77a1.65,1.65,0,1,1,0-3.29,1.65,1.65,0,0,1,0,3.29Z" style="fill: rgb(255, 255, 255); transform-origin: 336.402px 406.125px;" id="el82njbwgh3ok" class="animable"></path><path d="M342,407.77a1.65,1.65,0,1,1,1.65-1.65A1.65,1.65,0,0,1,342,407.77Z" style="fill: rgb(255, 255, 255); transform-origin: 342px 406.12px;" id="el4rfw4seeeiu" class="animable"></path><circle cx="381" cy="406.12" r="16.4" style="fill: rgb(197, 63, 63); transform-origin: 381px 406.12px;" id="el71ykurlc8ij" class="animable"></circle><path d="M379.54,401.59a2.83,2.83,0,0,0-4.24.86,1.69,1.69,0,0,0,.4,2.13c1.5,1.48,4.67,4.45,6,5.73a3.38,3.38,0,0,0,2.81.91,2.92,2.92,0,0,0,2-1.23c1.55-2.13-2.17-3.79-2.17-3.79l-1.62,1.71L379,404.25l1.66-1.83Z" style="fill: rgb(255, 255, 255); transform-origin: 380.986px 406.115px;" id="elugwoc8l722f" class="animable"></path><path d="M571.63,223.62h0a17,17,0,0,1-17-17h0a17,17,0,0,1,17-17h0a17,17,0,0,1,17,17h0A17,17,0,0,1,571.63,223.62Z" style="fill: rgb(235, 235, 235); transform-origin: 571.63px 206.62px;" id="el8msburqvm4i" class="animable"></path><path d="M571,206.76a2.72,2.72,0,1,0-1.65,0,4.72,4.72,0,0,0-4,4.66h9.46A4.72,4.72,0,0,0,571,206.76Z" style="fill: rgb(38, 50, 56); transform-origin: 570.08px 206.434px;" id="elyb1cb149fse" class="animable"></path><path d="M576.34,207.56a.38.38,0,0,1-.39-.39v-4.35a.39.39,0,0,1,.78,0v4.35A.38.38,0,0,1,576.34,207.56Z" style="fill: rgb(38, 50, 56); transform-origin: 576.34px 204.995px;" id="el55s7citwmg" class="animable"></path><path d="M578.52,205.39h-4.36a.4.4,0,0,1-.39-.39.39.39,0,0,1,.39-.39h4.36a.39.39,0,0,1,.39.39A.4.4,0,0,1,578.52,205.39Z" style="fill: rgb(38, 50, 56); transform-origin: 576.34px 205px;" id="elk9vwjudq3vr" class="animable"></path><polygon points="260.33 428.48 151.45 427.96 151.45 180.22 260.33 180.22 260.33 428.48" style="fill: rgb(250, 250, 250); transform-origin: 205.89px 304.35px;" id="elwygijymdzhi" class="animable"></polygon><path d="M260.33,426.47c-.15,0-.26-55.13-.26-123.12s.11-123.13.26-123.13.26,55.12.26,123.13S260.47,426.47,260.33,426.47Z" style="fill: rgb(38, 50, 56); transform-origin: 260.33px 303.345px;" id="eleiqj5594e1o" class="animable"></path><path d="M257,380.84c0,.14-23.17.26-51.74.26s-51.76-.12-51.76-.26,23.17-.27,51.76-.27S257,380.69,257,380.84Z" style="fill: rgb(224, 224, 224); transform-origin: 205.25px 380.835px;" id="elo0sc21c9sw" class="animable"></path><path d="M233,244.59V247h-.25v-2.2h-.57v-.22Z" style="fill: rgb(224, 224, 224); transform-origin: 232.59px 245.79px;" id="el68q4gpv6nhw" class="animable"></path><path d="M234.27,244.59V247H234v-2.2h-.57v-.22Z" style="fill: rgb(224, 224, 224); transform-origin: 233.85px 245.79px;" id="ela16cajmidfj" class="animable"></path><path d="M234.85,245.36a.18.18,0,0,1,.19-.18.17.17,0,0,1,.18.18.18.18,0,0,1-.18.19A.19.19,0,0,1,234.85,245.36Zm0,1.48a.19.19,0,0,1,.19-.19.19.19,0,0,1,0,.38A.19.19,0,0,1,234.85,246.84Z" style="fill: rgb(224, 224, 224); transform-origin: 235.04px 246.105px;" id="ele4j9jvnmb07" class="animable"></path><path d="M237.24,246.79V247h-1.7v-.17l1-1c.27-.27.33-.44.33-.6s-.2-.46-.57-.46a.85.85,0,0,0-.67.27l-.17-.15a1.09,1.09,0,0,1,.86-.35c.49,0,.8.25.8.66a1,1,0,0,1-.4.76l-.82.81Z" style="fill: rgb(224, 224, 224); transform-origin: 236.35px 245.769px;" id="elqbuft7sune" class="animable"></path><path d="M239.2,246.3c0,.41-.29.73-.88.73a1.26,1.26,0,0,1-.87-.31l.12-.2a1,1,0,0,0,.75.29c.41,0,.63-.21.63-.5s-.2-.51-.81-.51h-.52l.12-1.21h1.33v.22H238l-.08.77h.31C238.92,245.58,239.2,245.87,239.2,246.3Z" style="fill: rgb(224, 224, 224); transform-origin: 238.325px 245.81px;" id="elmc7nsibnewp" class="animable"></path><path d="M235.49,357.71v2.43h-.25v-2.21h-.57v-.22Z" style="fill: rgb(224, 224, 224); transform-origin: 235.08px 358.925px;" id="el7ovo4yxha39" class="animable"></path><path d="M236.74,357.71v2.43h-.25v-2.21h-.57v-.22Z" style="fill: rgb(224, 224, 224); transform-origin: 236.33px 358.925px;" id="elbb3zogbljju" class="animable"></path><path d="M237.33,358.49a.18.18,0,0,1,.18-.19.19.19,0,0,1,.19.19.2.2,0,0,1-.19.19A.19.19,0,0,1,237.33,358.49Zm0,1.47a.18.18,0,0,1,.18-.18.19.19,0,0,1,.19.18.2.2,0,0,1-.19.2A.19.19,0,0,1,237.33,360Z" style="fill: rgb(224, 224, 224); transform-origin: 237.515px 359.23px;" id="el30yzrzv04ks" class="animable"></path><path d="M240.12,359.5h-.48v.64h-.25v-.64H238v-.18l1.28-1.61h.28l-1.24,1.57h1v-.56h.25v.56h.48Z" style="fill: rgb(224, 224, 224); transform-origin: 239.06px 358.925px;" id="eldabasbcka9" class="animable"></path><path d="M242,359.42c0,.42-.29.74-.88.74a1.26,1.26,0,0,1-.87-.31l.12-.2a1.09,1.09,0,0,0,.75.28c.41,0,.63-.2.63-.5s-.2-.5-.81-.5h-.52l.13-1.22h1.32v.22h-1.11l-.08.77H241C241.7,358.7,242,359,242,359.42Z" style="fill: rgb(224, 224, 224); transform-origin: 241.125px 358.935px;" id="ela993jsa1f48" class="animable"></path><path d="M220.08,239.45H171.52l-.14-21.12a21.26,21.26,0,0,1,21.26-21.41h27.44a21.27,21.27,0,0,1,21.27,21.27h0A21.27,21.27,0,0,1,220.08,239.45Z" style="fill: rgb(235, 235, 235); transform-origin: 206.365px 218.185px;" id="eldsbrsb0s13p" class="animable"></path><path d="M242.8,417.42h-77a9.43,9.43,0,0,1-9.42-9.42v-.41a9.43,9.43,0,0,1,9.42-9.42h77a9.43,9.43,0,0,1,9.42,9.42V408A9.43,9.43,0,0,1,242.8,417.42Zm-77-18.66a8.84,8.84,0,0,0-8.83,8.83V408a8.84,8.84,0,0,0,8.83,8.83h77a8.84,8.84,0,0,0,8.83-8.83v-.41a8.84,8.84,0,0,0-8.83-8.83Z" style="fill: rgb(224, 224, 224); transform-origin: 204.3px 407.795px;" id="eljx3xjsd0idb" class="animable"></path><path d="M248.05,407.5a4.79,4.79,0,1,1-4.79-4.78A4.78,4.78,0,0,1,248.05,407.5Z" style="fill: rgb(197, 63, 63); transform-origin: 243.26px 407.51px;" id="eldwdl4jtmenb" class="animable"></path><path d="M243.14,410.46h0a.15.15,0,0,1-.13-.11l-.62-2.27-2.12-.75a.14.14,0,0,1-.1-.14.14.14,0,0,1,.1-.13l5-1.79a.16.16,0,0,1,.16,0,.13.13,0,0,1,0,.16l-2.17,4.9A.14.14,0,0,1,243.14,410.46Zm-2.39-3.27,1.81.64a.18.18,0,0,1,.09.1l.52,1.94,1.86-4.21Z" style="fill: rgb(255, 255, 255); transform-origin: 242.814px 407.854px;" id="elr680j5ffcgj" class="animable"></path><path d="M242.51,408.12a.16.16,0,0,1-.11-.05.15.15,0,0,1,0-.21l2.8-2.56a.15.15,0,0,1,.2.22l-2.8,2.56A.14.14,0,0,1,242.51,408.12Z" style="fill: rgb(255, 255, 255); transform-origin: 243.896px 406.697px;" id="el6brwggb59gk" class="animable"></path><path d="M178.44,406.2h-.92V406h2.13v.24h-.93v2.39h-.28Z" style="fill: rgb(38, 50, 56); transform-origin: 178.585px 407.315px;" id="elxnamdwoeb68" class="animable"></path><path d="M181.57,406.62l-1,2.21a.67.67,0,0,1-.66.51.68.68,0,0,1-.48-.18l.13-.2a.46.46,0,0,0,.36.15c.17,0,.29-.08.41-.33l.08-.19-.88-2h.28l.74,1.68.75-1.68Z" style="fill: rgb(38, 50, 56); transform-origin: 180.5px 407.965px;" id="elgm0mvq4bwxl" class="animable"></path><path d="M184,407.6a1,1,0,0,1-1,1,.86.86,0,0,1-.75-.39v1.1H182v-2.7h.25V407a.85.85,0,0,1,.76-.41A1,1,0,0,1,184,407.6Zm-.27,0a.74.74,0,1,0-.73.78A.73.73,0,0,0,183.68,407.6Z" style="fill: rgb(38, 50, 56); transform-origin: 183px 407.95px;" id="elogb57q1yp6j" class="animable"></path><path d="M186.22,407.69h-1.66a.74.74,0,0,0,.78.69.8.8,0,0,0,.61-.26l.15.17a1,1,0,0,1-1.8-.69,1,1,0,0,1,1-1,.94.94,0,0,1,1,1Zm-1.66-.2H186a.71.71,0,0,0-1.41,0Z" style="fill: rgb(38, 50, 56); transform-origin: 185.299px 407.647px;" id="el854ig2fd0s" class="animable"></path><path d="M189.25,407.37v1.22H189v-.31a.73.73,0,0,1-.68.33c-.45,0-.72-.23-.72-.57s.19-.56.76-.56H189v-.12a.49.49,0,0,0-.56-.53,1,1,0,0,0-.66.24l-.12-.2a1.25,1.25,0,0,1,.8-.27A.71.71,0,0,1,189.25,407.37ZM189,408v-.32h-.62c-.39,0-.51.15-.51.35s.18.37.5.37A.64.64,0,0,0,189,408Z" style="fill: rgb(38, 50, 56); transform-origin: 188.426px 407.604px;" id="elkx184qui8t" class="animable"></path><path d="M194.22,407.45v1.14H194v-1.12c0-.41-.21-.63-.56-.63a.64.64,0,0,0-.67.72v1h-.26v-1.12c0-.41-.21-.63-.57-.63a.64.64,0,0,0-.67.72v1H191v-2h.25V407a.81.81,0,0,1,.73-.38.7.7,0,0,1,.7.42.86.86,0,0,1,.78-.42A.75.75,0,0,1,194.22,407.45Z" style="fill: rgb(38, 50, 56); transform-origin: 192.612px 407.56px;" id="ele4q7dnf82si" class="animable"></path><path d="M196.68,407.69H195a.74.74,0,0,0,.78.69.8.8,0,0,0,.61-.26l.15.17a1,1,0,0,1-1.8-.69,1,1,0,0,1,1-1,.94.94,0,0,1,1,1Zm-1.66-.2h1.4a.68.68,0,0,0-.7-.66A.69.69,0,0,0,195,407.49Z" style="fill: rgb(38, 50, 56); transform-origin: 195.739px 407.647px;" id="el09x1hhc6q4q4" class="animable"></path><path d="M197,408.37l.12-.21a1.25,1.25,0,0,0,.71.22c.37,0,.53-.13.53-.32,0-.52-1.29-.11-1.29-.9,0-.32.28-.56.79-.56a1.33,1.33,0,0,1,.69.18l-.11.22a1,1,0,0,0-.58-.17c-.36,0-.52.14-.52.33,0,.53,1.28.13,1.28.89,0,.34-.3.56-.81.56A1.32,1.32,0,0,1,197,408.37Z" style="fill: rgb(38, 50, 56); transform-origin: 197.81px 407.605px;" id="elk1g7ciocc3m" class="animable"></path><path d="M198.79,408.37l.12-.21a1.24,1.24,0,0,0,.7.22c.38,0,.53-.13.53-.32,0-.52-1.28-.11-1.28-.9,0-.32.28-.56.78-.56a1.34,1.34,0,0,1,.7.18l-.11.22a1,1,0,0,0-.59-.17c-.35,0-.51.14-.51.33,0,.53,1.28.13,1.28.89,0,.34-.3.56-.81.56A1.32,1.32,0,0,1,198.79,408.37Z" style="fill: rgb(38, 50, 56); transform-origin: 199.6px 407.605px;" id="el31hicyzr19e" class="animable"></path><path d="M202.4,407.37v1.22h-.26v-.31a.73.73,0,0,1-.68.33c-.45,0-.72-.23-.72-.57s.19-.56.76-.56h.63v-.12a.49.49,0,0,0-.56-.53,1,1,0,0,0-.66.24l-.12-.2a1.25,1.25,0,0,1,.81-.27A.71.71,0,0,1,202.4,407.37Zm-.27.63v-.32h-.62c-.38,0-.51.15-.51.35s.19.37.5.37A.63.63,0,0,0,202.13,408Z" style="fill: rgb(38, 50, 56); transform-origin: 201.572px 407.603px;" id="eltuqz1xf7rm" class="animable"></path><path d="M205,406.62v1.73a.87.87,0,0,1-1,1,1.41,1.41,0,0,1-.92-.3l.14-.21a1.17,1.17,0,0,0,.78.27c.5,0,.73-.22.73-.71v-.26a.89.89,0,0,1-.78.39,1,1,0,1,1,0-1.92.9.9,0,0,1,.79.4v-.38Zm-.26.94a.75.75,0,1,0-.75.72A.71.71,0,0,0,204.7,407.56Z" style="fill: rgb(38, 50, 56); transform-origin: 203.841px 407.966px;" id="elpeymbeyhivi" class="animable"></path><path d="M207.43,407.69h-1.65a.73.73,0,0,0,.78.69.78.78,0,0,0,.6-.26l.15.17a1,1,0,0,1-.76.32,1,1,0,0,1-1-1,1,1,0,1,1,1.93,0S207.43,407.66,207.43,407.69Zm-1.65-.2h1.4a.7.7,0,0,0-1.4,0Z" style="fill: rgb(38, 50, 56); transform-origin: 206.515px 407.479px;" id="ele3j3vj1am97" class="animable"></path><path d="M207.81,408.41a.2.2,0,1,1,.4,0,.2.2,0,0,1-.4,0Z" style="fill: rgb(38, 50, 56); transform-origin: 208.01px 408.408px;" id="elxa2zx3mntkd" class="animable"></path><path d="M208.61,408.41a.2.2,0,1,1,.4,0,.2.2,0,0,1-.4,0Z" style="fill: rgb(38, 50, 56); transform-origin: 208.81px 408.408px;" id="elrx27dynsgar" class="animable"></path><path d="M209.4,408.41a.2.2,0,0,1,.2-.21.21.21,0,1,1,0,.41A.2.2,0,0,1,209.4,408.41Z" style="fill: rgb(38, 50, 56); transform-origin: 209.628px 408.405px;" id="elrj7hgjho4i" class="animable"></path><path d="M165.73,409.44a1,1,0,1,1-1.6-1.34l2.16-2.58a.67.67,0,0,1,1-.09.68.68,0,0,1,.08.95l-1.83,2.19h0a.4.4,0,0,1-.48,0,.4.4,0,0,1-.09-.48l1.4-1.69-.19-.16-1.35,1.62h0l-.06.07h0a.63.63,0,0,0,.13.81.62.62,0,0,0,.81,0h0l0,0,0,0h0l1.79-2.14h0a.92.92,0,0,0-.13-1.28.93.93,0,0,0-1.29.09h0l-2.25,2.7h0a1.29,1.29,0,0,0,2,1.64h0l1.81-2.18-.19-.16Z" style="fill: rgb(224, 224, 224); transform-origin: 165.619px 407.663px;" id="elcf68pvj9tg9" class="animable"></path><path d="M226.11,208.59c0,.09-9.18.16-20.5.16s-20.5-.07-20.5-.16,9.17-.16,20.5-.16S226.11,208.5,226.11,208.59Z" style="fill: rgb(38, 50, 56); transform-origin: 205.61px 208.59px;" id="ell0mal09iqv" class="animable"></path><path d="M226.11,213.66c0,.09-9.18.16-20.5.16s-20.5-.07-20.5-.16,9.17-.16,20.5-.16S226.11,213.57,226.11,213.66Z" style="fill: rgb(38, 50, 56); transform-origin: 205.61px 213.66px;" id="el29799mmrlmr" class="animable"></path><path d="M226.11,218.73c0,.09-9.18.16-20.5.16s-20.5-.07-20.5-.16,9.17-.16,20.5-.16S226.11,218.64,226.11,218.73Z" style="fill: rgb(38, 50, 56); transform-origin: 205.61px 218.73px;" id="el25utb8kay3s" class="animable"></path><path d="M226.11,223.8c0,.09-9.18.16-20.5.16s-20.5-.07-20.5-.16,9.17-.16,20.5-.16S226.11,223.71,226.11,223.8Z" style="fill: rgb(38, 50, 56); transform-origin: 205.61px 223.8px;" id="elgt13vewfor5" class="animable"></path><path d="M205.68,228.87a3.52,3.52,0,0,1-.81.06l-2.2.06c-1.87,0-4.44,0-7.28,0s-5.41,0-7.27,0l-2.21-.06a3.38,3.38,0,0,1-.8-.06,4.23,4.23,0,0,1,.8-.06l2.21-.05c1.86,0,4.43,0,7.27,0s5.41,0,7.28,0l2.2.05A4.42,4.42,0,0,1,205.68,228.87Z" style="fill: rgb(38, 50, 56); transform-origin: 195.395px 228.875px;" id="el99dp5msnija" class="animable"></path><path d="M182.26,255.07h30A10.88,10.88,0,0,1,223.19,266v1.33a10.88,10.88,0,0,1-10.88,10.88H171.38a0,0,0,0,1,0,0V266A10.88,10.88,0,0,1,182.26,255.07Z" style="fill: rgb(235, 235, 235); transform-origin: 197.285px 266.64px;" id="elqd1cqu7c94i" class="animable"></path><path d="M215.31,263.84c0,.09-8.07.17-18,.17s-18-.08-18-.17,8.07-.16,18-.16S215.31,263.76,215.31,263.84Z" style="fill: rgb(38, 50, 56); transform-origin: 197.31px 263.845px;" id="el8lils9wd9u2" class="animable"></path><path d="M201.27,269.47a5,5,0,0,1-.86.06l-2.36.05c-2,0-4.75.05-7.79.05s-5.79,0-7.78-.05l-2.36-.05a5.07,5.07,0,0,1-.87-.06,4.37,4.37,0,0,1,.87-.07l2.36,0c2,0,4.74,0,7.78,0s5.8,0,7.79,0l2.36,0A4.31,4.31,0,0,1,201.27,269.47Z" style="fill: rgb(38, 50, 56); transform-origin: 190.26px 269.515px;" id="el3nqghdqmm8f" class="animable"></path><path d="M173.55,327.5v2.43h-.25v-2.21h-.57v-.22Z" style="fill: rgb(224, 224, 224); transform-origin: 173.14px 328.715px;" id="eljcyeanl5628" class="animable"></path><path d="M174.8,327.5v2.43h-.25v-2.21H174v-.22Z" style="fill: rgb(224, 224, 224); transform-origin: 174.4px 328.715px;" id="el1ijvnrtsys2" class="animable"></path><path d="M175.38,328.28a.18.18,0,0,1,.19-.19.19.19,0,0,1,0,.38A.18.18,0,0,1,175.38,328.28Zm0,1.48a.18.18,0,0,1,.19-.19.18.18,0,0,1,.18.19.19.19,0,1,1-.37,0Z" style="fill: rgb(224, 224, 224); transform-origin: 175.568px 329.042px;" id="el14ybyzvrhvk" class="animable"></path><path d="M177.72,329.23c0,.41-.3.72-.88.72a1.29,1.29,0,0,1-.88-.31l.13-.2a1.05,1.05,0,0,0,.75.28c.4,0,.62-.19.62-.49s-.2-.48-.65-.48h-.18v-.18l.68-.85h-1.25v-.22h1.57v.18l-.69.86C177.46,328.57,177.72,328.84,177.72,329.23Z" style="fill: rgb(224, 224, 224); transform-origin: 176.84px 328.725px;" id="el95wxwdhtab" class="animable"></path><path d="M178.07,328.72c0-.78.4-1.24,1-1.24s1,.46,1,1.24-.41,1.23-1,1.23S178.07,329.49,178.07,328.72Zm1.68,0c0-.65-.29-1-.71-1s-.72.36-.72,1,.29,1,.72,1S179.75,329.36,179.75,328.72Z" style="fill: rgb(224, 224, 224); transform-origin: 179.07px 328.715px;" id="elh0spkx892ul" class="animable"></path><g id="el0o5xdb57fnq"><path d="M169.33,298.2h63.18a10.88,10.88,0,0,1,10.88,10.88v1.33a10.88,10.88,0,0,1-10.88,10.88h-52.3a10.88,10.88,0,0,1-10.88-10.88V298.2A0,0,0,0,1,169.33,298.2Z" style="fill: rgb(235, 235, 235); transform-origin: 206.36px 309.745px; transform: rotate(180deg);" class="animable"></path></g><path d="M231.39,306.73c0,.09-11.38.16-25.42.16s-25.43-.07-25.43-.16,11.39-.16,25.43-.16S231.39,306.64,231.39,306.73Z" style="fill: rgb(38, 50, 56); transform-origin: 205.965px 306.73px;" id="el9b024q75i4q" class="animable"></path><path d="M231.39,312.21c0,.09-11.38.16-25.42.16s-25.43-.07-25.43-.16,11.39-.16,25.43-.16S231.39,312.12,231.39,312.21Z" style="fill: rgb(38, 50, 56); transform-origin: 205.965px 312.21px;" id="elxue9b1923i" class="animable"></path><path d="M180.37,341.32h30a10.88,10.88,0,0,1,10.88,10.88v1.33a10.88,10.88,0,0,1-10.88,10.88H169.49a0,0,0,0,1,0,0V352.21A10.88,10.88,0,0,1,180.37,341.32Z" style="fill: rgb(235, 235, 235); transform-origin: 195.37px 352.865px;" id="elvzow4gvyws" class="animable"></path><path d="M214.47,349.72c0,.09-8.54.16-19.08.16s-19.07-.07-19.07-.16,8.54-.16,19.07-.16S214.47,349.63,214.47,349.72Z" style="fill: rgb(38, 50, 56); transform-origin: 195.395px 349.72px;" id="el6sdeu0zakwj" class="animable"></path><path d="M200.85,355.2a4.33,4.33,0,0,1-1,.07l-2.63.05c-2.22,0-5.29.05-8.67.05s-6.46,0-8.68-.05l-2.63-.05a4.33,4.33,0,0,1-1-.07,6.13,6.13,0,0,1,1-.06l2.63-.05c2.22,0,5.29,0,8.68,0s6.45,0,8.67,0l2.63.05A6.13,6.13,0,0,1,200.85,355.2Z" style="fill: rgb(38, 50, 56); transform-origin: 188.545px 355.23px;" id="el0yxltw6huww" class="animable"></path></g><g id="freepik--Hearts--inject-216" class="animable" style="transform-origin: 392.736px 205.543px;"><path d="M718.49,183.64c-1.1-8.91-8.63-17.21-17.61-17.22-5.29,0-10.33,2.77-14,6.64a35.58,35.58,0,0,0-3.54,4.2,37,37,0,0,0-2.65-4.81c-2.79-4.51-7.18-8.22-12.38-9.26-8.79-1.76-17.81,4.9-20.65,13.41s-.47,18.07,4.19,25.73S664.59,220,679.38,225c10.2-1.3,23.86-10.35,29.94-17S719.6,192.54,718.49,183.64Z" style="fill: rgb(197, 63, 63); transform-origin: 682.55px 193.953px;" id="eljl4fg2ylx4l" class="animable"></path><path d="M715.26,199.63H715l-.86-.06-3.32-.27-12.21-1.12.22-.13-5.08,13.25-.31.8-.2-.83c-1.55-6.43-3.28-13.64-5.11-21.23-.56-2.36-1.12-4.67-1.66-6.93l.52.1L677.64,196l-.09.12h-.15L656,193.89l-6.07-.68-1.61-.2a4.24,4.24,0,0,1-.55-.09,2.43,2.43,0,0,1,.56,0l1.61.12,6.09.53,21.46,2-.24.11,9.27-12.84.37-.51.15.62q.81,3.39,1.66,6.92l5.06,21.24-.51,0,5.19-13.22.06-.15.16,0,12.18,1.31,3.31.38.86.12Z" style="fill: rgb(250, 250, 250); transform-origin: 681.515px 197.215px;" id="elu8dr6up8kzp" class="animable"></path><path d="M114.92,215.13c-2-5.75-8.19-10.19-14.15-8.92a13.32,13.32,0,0,0-8.32,6.4,23.82,23.82,0,0,0-1.75,3.29,26.74,26.74,0,0,0-2.45-2.82,13.37,13.37,0,0,0-9.54-4.38c-6.09.09-11.14,5.8-11.81,11.85s2.27,12.07,6.46,16.5a34.24,34.24,0,0,0,21.48,11.13c6.59-2.32,14.38-10.28,17.47-15.53S116.93,220.89,114.92,215.13Z" style="fill: rgb(197, 63, 63); transform-origin: 91.3162px 227.086px;" id="el1rvxnd22u5f" class="animable"></path><path d="M115.06,226.22l-.2,0-.58.09-2.25.29-8.26,1,.12-.12c-.43,2.75-.93,6-1.48,9.52l-.09.58-.25-.53-6.43-13.37-2.09-4.36h.36l-4.36,9.84,0,.09h-.1l-14.56,1.57-4.13.42-1.09.09a2.17,2.17,0,0,1-.38,0,1.34,1.34,0,0,1,.37-.07l1.09-.15,4.11-.52,14.55-1.71-.15.1,4.33-9.85.17-.39.19.39L96,223.55c2.29,4.79,4.46,9.33,6.39,13.39l-.34.05,1.56-9.52,0-.11h.1l8.28-.87,2.26-.22.59,0Z" style="fill: rgb(250, 250, 250); transform-origin: 92.175px 228.16px;" id="el6q30gahus8m" class="animable"></path></g><g id="freepik--speech-bubble--inject-216" class="animable" style="transform-origin: 487.652px 74.6577px;"><rect x="470.09" y="54.41" width="7.84" height="44.89" rx="3.44" style="fill: rgb(224, 224, 224); transform-origin: 474.01px 76.855px;" id="elr3bq1euws3n" class="animable"></rect><rect x="470.09" y="67.82" width="7.84" height="31.47" rx="3.44" style="fill: rgb(197, 63, 63); transform-origin: 474.01px 83.555px;" id="elhdtkwbcui15" class="animable"></rect><rect x="482.94" y="54.41" width="7.84" height="44.89" rx="3.44" style="fill: rgb(224, 224, 224); transform-origin: 486.86px 76.855px;" id="elgjmymeaprf" class="animable"></rect><rect x="482.94" y="74.78" width="7.84" height="24.52" rx="3.44" style="fill: rgb(197, 63, 63); transform-origin: 486.86px 87.04px;" id="els4cj4vrjoad" class="animable"></rect><rect x="497.47" y="54.41" width="7.84" height="44.89" rx="3.44" style="fill: rgb(224, 224, 224); transform-origin: 501.39px 76.855px;" id="elmsdedgv70to" class="animable"></rect><rect x="497.47" y="62.52" width="7.84" height="36.78" rx="3.44" style="fill: rgb(197, 63, 63); transform-origin: 501.39px 80.91px;" id="eleezbetyucor" class="animable"></rect><path d="M474.13,99.3a9.28,9.28,0,0,0,1-.19,3.75,3.75,0,0,0,2.71-3.61c0-.77,0-1.59,0-2.48,0-1.78,0-3.81,0-6,0-4.48,0-9.81,0-15.72,0-3,0-6.06,0-9.28V59.54a8.83,8.83,0,0,0-.16-2.38,3.72,3.72,0,0,0-7.1.2,12.66,12.66,0,0,0-.11,2.41V62.2c0,3.22,0,6.33,0,9.29,0,5.91,0,11.23-.06,15.72,0,2.23,0,4.26,0,6,0,.89,0,1.72,0,2.47a3.64,3.64,0,0,0,.64,1.89,3.83,3.83,0,0,0,2.28,1.56c.64.13,1,.1,1,.13a3.24,3.24,0,0,1-1,0,3.91,3.91,0,0,1-2.41-1.55,3.86,3.86,0,0,1-.72-2c0-.77,0-1.59,0-2.48,0-1.78,0-3.81,0-6,0-4.49,0-9.81-.05-15.72,0-3,0-6.07,0-9.29V58.54a4.79,4.79,0,0,1,.13-1.29,4,4,0,0,1,3.92-3.08A4.08,4.08,0,0,1,478,57a4.48,4.48,0,0,1,.18,1.3V62c0,3.22,0,6.32,0,9.28,0,5.91,0,11.24-.05,15.72,0,2.23,0,4.26,0,6,0,.89,0,1.71,0,2.48a3.89,3.89,0,0,1-2.91,3.71A2.87,2.87,0,0,1,474.13,99.3Z" style="fill: rgb(38, 50, 56); transform-origin: 474.164px 76.741px;" id="eld2fkkahiz5g" class="animable"></path><path d="M487,99.3a9.88,9.88,0,0,0,1-.19,3.75,3.75,0,0,0,2.18-1.68,3.7,3.7,0,0,0,.53-1.93c0-.77,0-1.59,0-2.48,0-1.78,0-3.81,0-6,0-4.48,0-9.81-.05-15.72,0-3,0-6.06,0-9.28V59.54a8.83,8.83,0,0,0-.17-2.38,3.71,3.71,0,0,0-7.09.2,11.89,11.89,0,0,0-.11,2.41V62.2c0,3.22,0,6.33,0,9.29,0,5.91,0,11.23-.05,15.72,0,2.23,0,4.26,0,6,0,.89,0,1.72,0,2.47a3.64,3.64,0,0,0,.63,1.89A3.87,3.87,0,0,0,486,99.17c.63.13,1,.1,1,.13a3.24,3.24,0,0,1-1,0,4,4,0,0,1-2.42-1.55,3.86,3.86,0,0,1-.71-2c0-.77,0-1.59,0-2.48,0-1.78,0-3.81,0-6,0-4.49,0-9.81,0-15.72,0-3,0-6.07,0-9.29V58.54a4.78,4.78,0,0,1,.12-1.29,4.05,4.05,0,0,1,3.93-3.08A4.07,4.07,0,0,1,490.84,57a4.48,4.48,0,0,1,.18,1.3V62c0,3.22,0,6.32,0,9.28,0,5.91,0,11.24-.06,15.72,0,2.23,0,4.26,0,6,0,.89,0,1.71,0,2.48a3.88,3.88,0,0,1-.6,2A3.82,3.82,0,0,1,488,99.21,2.82,2.82,0,0,1,487,99.3Z" style="fill: rgb(38, 50, 56); transform-origin: 486.943px 76.7543px;" id="eleepphogszbi" class="animable"></path><path d="M501.51,99.3a9.28,9.28,0,0,0,1-.19,3.75,3.75,0,0,0,2.71-3.61c0-.77,0-1.59,0-2.48,0-1.78,0-3.81,0-6,0-4.48,0-9.81-.06-15.72,0-3,0-6.06,0-9.28V59.54a8.83,8.83,0,0,0-.16-2.38,3.72,3.72,0,0,0-7.1.2,12.66,12.66,0,0,0-.11,2.41V62.2c0,3.22,0,6.33,0,9.29,0,5.91,0,11.23-.06,15.72,0,2.23,0,4.26,0,6,0,.89,0,1.72,0,2.47a3.64,3.64,0,0,0,.64,1.89,3.83,3.83,0,0,0,2.28,1.56c.64.13,1,.1,1,.13a3.24,3.24,0,0,1-1,0,4,4,0,0,1-2.42-1.55,3.86,3.86,0,0,1-.71-2c0-.77,0-1.59,0-2.48,0-1.78,0-3.81,0-6,0-4.49,0-9.81-.05-15.72,0-3,0-6.07,0-9.29V58.54a4.79,4.79,0,0,1,.13-1.29,4,4,0,0,1,3.92-3.08,4.1,4.1,0,0,1,4.1,2.84,5.29,5.29,0,0,1,.18,1.3v1.23c0,.82,0,1.63,0,2.44,0,3.22,0,6.32,0,9.28,0,5.91,0,11.24-.05,15.72,0,2.23,0,4.26,0,6,0,.89,0,1.71,0,2.48a3.89,3.89,0,0,1-2.92,3.71A2.82,2.82,0,0,1,501.51,99.3Z" style="fill: rgb(38, 50, 56); transform-origin: 501.634px 76.7463px;" id="elg45rggcwl7" class="animable"></path><path d="M487.71,25.38a4.24,4.24,0,0,1,.85,0l2.49.07c.55,0,1.16,0,1.84.09l2.2.3,2.56.37,2.87.71A46.48,46.48,0,0,1,514.41,33a49.93,49.93,0,0,1,14.38,14,48.37,48.37,0,0,1,8.28,29.58c-.08,1.13-.05,2.29-.22,3.44s-.35,2.29-.52,3.46a49.2,49.2,0,0,1-4.67,13.67,52.61,52.61,0,0,1-8.93,12.29,51.62,51.62,0,0,1-12.87,9.24,46.71,46.71,0,0,1-15.68,4.82,30.75,30.75,0,0,1-4.19.35,37.11,37.11,0,0,1-4.22.08,50.71,50.71,0,0,1-8.47-1.07,49.55,49.55,0,0,1-16.87-7.1l.52,0-17.18,6.9-1,.41L443,122q2.61-9.45,5-18.36l.09.45a49.23,49.23,0,0,1-9.17-21,44.59,44.59,0,0,1-.67-10.75,35.1,35.1,0,0,1,.49-5.16q.19-1.27.39-2.52c.16-.82.41-1.62.6-2.43A49.1,49.1,0,0,1,459,34.34a46.82,46.82,0,0,1,11.4-6L473,27.4l2.44-.62,2.23-.55c.71-.14,1.41-.21,2.05-.31,1.3-.17,2.44-.39,3.44-.44l2.53-.09,1.54,0a2.09,2.09,0,0,1,.52,0,2.75,2.75,0,0,1-.52.07l-1.54.12-2.5.17c-1,.08-2.13.33-3.41.52a48.83,48.83,0,0,0-39.06,36.23c-.19.79-.43,1.58-.58,2.39s-.24,1.64-.37,2.47a33.88,33.88,0,0,0-.45,5.07A43.94,43.94,0,0,0,440,83a48.38,48.38,0,0,0,9,20.52l.16.21-.07.25-5,18.37-.73-.65,17.17-6.91.27-.11.24.16a48.64,48.64,0,0,0,16.49,6.93,49.49,49.49,0,0,0,8.28,1,37.9,37.9,0,0,0,4.13-.08,30.77,30.77,0,0,0,4.09-.34,45.8,45.8,0,0,0,15.34-4.69,51,51,0,0,0,12.61-9,52,52,0,0,0,8.77-12,48.56,48.56,0,0,0,4.62-13.38c.17-1.14.35-2.27.52-3.39s.15-2.26.23-3.37a47.66,47.66,0,0,0-8-29.1,49.47,49.47,0,0,0-14-13.91,46.68,46.68,0,0,0-13.67-6.17l-2.84-.75L495,26.15l-2.18-.36c-.67-.07-1.28-.09-1.83-.13l-2.47-.18A5.21,5.21,0,0,1,487.71,25.38Z" style="fill: rgb(38, 50, 56); transform-origin: 487.652px 74.6577px;" id="elgfvymlwmp4m" class="animable"></path></g><g id="freepik--character-1--inject-216" class="animable" style="transform-origin: 431.555px 232.775px;"><path d="M439.37,358l4.32,4.32a2.57,2.57,0,0,0,1.76.73,2.49,2.49,0,0,0,2.5-2.5,2.57,2.57,0,0,0-.73-1.76l-4.32-4.32a2.47,2.47,0,0,0-3.53,0,2.49,2.49,0,0,0-.74,1.76,2.6,2.6,0,0,0,.74,1.77Z" style="fill: rgb(250, 250, 250); transform-origin: 443.29px 358.389px;" id="eljcwbzkotm7q" class="animable"></path><path d="M455.05,292.85a45.18,45.18,0,0,1-9.68,0,45.18,45.18,0,0,1,9.68,0Z" style="fill: rgb(69, 90, 100); transform-origin: 450.21px 292.85px;" id="els150bz7b0de" class="animable"></path><path d="M488.85,181.41c-1.71-5.19,1.38-23.8-2.69-23.83-5.2-.05-3.71,21-3.72,22.92s-2.73,1.86-2.63.16c.14-2.44,1-26.49-4.24-26.07-2.89.23-2.52,5.48-2.52,5.48s1.61,24.06-.85,24.18-3.34-13.92-3.54-18.86c-.2-4.73-2.19-6.61-4.37-5s-1.74,15.83-1.62,20.58.68,17.76-4.81,11.43-12-9.18-14.32-8.73-2.4,3.8-.05,4.89c1.9.88,4.64,3.32,6.62,5.24a30,30,0,0,1,4,5.44,26.15,26.15,0,0,1,3.31,8,16.18,16.18,0,0,0,8.19,10.48h0l-.26,8.82,25.35-2.2.49-16.68c.26-12.75,2.49-21.33,3.83-28.91,2.15-12.09.59-12.46-.86-12.39C491,166.47,490.53,186.47,488.85,181.41Z" style="fill: rgb(183, 136, 118); transform-origin: 468.921px 190.562px;" id="elscpzq2g2wds" class="animable"></path><path d="M488.85,197.77a29.82,29.82,0,0,0-3.48.87,13.41,13.41,0,0,0-6.58,5.27,12.78,12.78,0,0,0-1.17,2.34l-.15.38-.31-.26a20.85,20.85,0,0,0-5.88-3.45c-1.6-.62-2.62-.83-2.6-.92a8.55,8.55,0,0,1,2.73.57,18.69,18.69,0,0,1,6.12,3.35l-.46.13a13,13,0,0,1,1.21-2.46,13.39,13.39,0,0,1,3.38-3.55,13.15,13.15,0,0,1,3.57-1.8,11.34,11.34,0,0,1,2.64-.51A3.29,3.29,0,0,1,488.85,197.77Z" style="fill: rgb(170, 101, 80); transform-origin: 478.765px 202.17px;" id="ellr0cgogj3lo" class="animable"></path><path d="M485.32,215.6a16.68,16.68,0,0,1-6.15,1.72,16.88,16.88,0,0,1-6.39-.15c0-.18,2.85,0,6.31-.45S485.27,215.43,485.32,215.6Z" style="fill: rgb(170, 101, 80); transform-origin: 479.05px 216.566px;" id="elmu3she8f3n" class="animable"></path><path d="M417.28,216.36s13.21,6.75,20.16,16.47,27.94,39.86,27.94,39.86l-3-45.74,32.42-4.2s9.43,46.07,11.64,62c2.06,14.91,1.2,29.58-13.36,37.58-17.18,9.44-36.69-3.31-43.18-8.15-8.06-6-22.94-15.81-22.94-15.81Z" style="fill: rgb(224, 224, 224); transform-origin: 462.275px 271.041px;" id="elbtq2s0uhln" class="animable"></path><polygon points="400.99 210.65 391.74 200.32 351.31 197.22 346.07 205.69 360.24 294.13 353.86 383.47 406.54 383.47 400.99 210.65" style="fill: rgb(197, 63, 63); transform-origin: 376.305px 290.345px;" id="eluqu24kr88y" class="animable"></polygon><g id="elv5peakn5rsd"><g style="opacity: 0.3; transform-origin: 380.879px 370.01px;" class="animable"><path d="M356.3,362.22c1.39-1.48,3.67-3.53,5.7-3.57,14.56-.32,29.43-1.78,44-2.1l.56,26.92-7.09-3.32c-.4-3-.91-6.71-3.7-8-1.58-.75-3.43-.46-5.14-.12-5.26,1-10.48,2.4-15.83,2.73s-10.95-.44-15.44-3.37a9.4,9.4,0,0,1-3.69-4A4.86,4.86,0,0,1,356.3,362.22Z" id="ellbey2cypt1" class="animable" style="transform-origin: 380.879px 370.01px;"></path></g></g><polygon points="391.74 200.32 417.64 217.08 423.12 235.06 428.36 291.12 422.58 348.49 432.56 383.47 406.54 383.47 406.49 369.67 403.71 272.53 400.99 210.65 391.74 200.32" style="fill: rgb(224, 224, 224); transform-origin: 412.15px 291.895px;" id="elnf5h1l453t" class="animable"></polygon><path d="M405.69,285.92a6.32,6.32,0,0,0,.43-.72c.28-.52.67-1.23,1.15-2.13s.94-2.13,1.55-3.5c.28-.69.52-1.45.8-2.25s.59-1.64.82-2.55c2.18-7.2,3.63-17.59,3.32-29.06,0-.89-.06-1.77-.12-2.64v-.15l-.14-.06-4.06-1.71.06.42,4.05-3.25.09-.07v-.1a35.23,35.23,0,0,0-1.85-11.6c-1-3.39-2.13-6.31-3.11-8.71s-1.84-4.28-2.45-5.56c-.3-.64-.54-1.12-.71-1.45a3.28,3.28,0,0,0-.28-.49,3.2,3.2,0,0,0,.2.52l.65,1.49c.56,1.29,1.37,3.19,2.31,5.6s2,5.34,3,8.72a35.31,35.31,0,0,1,1.76,11.44l.09-.17-4.06,3.25-.32.26.38.16,4.05,1.71-.15-.21c.06.85.09,1.73.12,2.61.31,11.42-1.07,21.77-3.16,29-.22.91-.52,1.75-.78,2.55s-.49,1.56-.76,2.25c-.58,1.37-1,2.58-1.47,3.52s-.8,1.63-1.06,2.16A4.94,4.94,0,0,0,405.69,285.92Z" style="fill: rgb(38, 50, 56); transform-origin: 409.521px 248.13px;" id="elualgc2aji2" class="animable"></path><path d="M423.88,322.42a6.71,6.71,0,0,0,.22-.76c.14-.54.32-1.27.55-2.18s.51-2.12.78-3.48.62-2.91.9-4.64.63-3.62.89-5.66.52-4.23.76-6.53c.42-4.61.7-9.7.7-15.05s-.32-10.43-.75-15c-.26-2.3-.48-4.49-.8-6.53s-.59-3.93-.9-5.66-.64-3.27-.92-4.63-.55-2.53-.79-3.48-.42-1.64-.56-2.18a3.5,3.5,0,0,0-.23-.75,6.12,6.12,0,0,0,.13.77c.12.55.27,1.29.47,2.21s.46,2.12.71,3.49.58,2.91.84,4.64.59,3.61.84,5.65.51,4.21.75,6.51c.4,4.6.69,9.67.71,15s-.27,10.4-.66,15c-.23,2.3-.42,4.48-.72,6.52s-.54,3.93-.82,5.65-.58,3.28-.82,4.64-.49,2.54-.7,3.5-.34,1.65-.46,2.2A3.73,3.73,0,0,0,423.88,322.42Z" style="fill: rgb(38, 50, 56); transform-origin: 426.205px 284.155px;" id="el4sug4a8thpm" class="animable"></path><path d="M417.61,369.34a10.17,10.17,0,0,0,1.12,2.33,38.73,38.73,0,0,0,3.55,5.14,38.17,38.17,0,0,0,4.35,4.5,10.16,10.16,0,0,0,2.07,1.56,20,20,0,0,0-1.83-1.82,57.14,57.14,0,0,1-4.2-4.55,54,54,0,0,1-3.63-5A19.81,19.81,0,0,0,417.61,369.34Z" style="fill: rgb(38, 50, 56); transform-origin: 423.155px 376.105px;" id="el4ke72e3dbz" class="animable"></path><g id="ela8tp6hih67s"><g style="opacity: 0.3; transform-origin: 376.55px 278.2px;" class="animable"><path d="M404.68,322.4c-2.74-1.43-6.09-.68-9,.43s-5.75,2.6-8.84,2.57c-4.2,0-10.15-1.57-12.34-5.14a48,48,0,0,1-5.31-13.13c-3.34-15.37-4.1-28.86-7.44-44.24-1.82-8.36-4.13-18-7.23-26-3-7.73-5.8-15.73-8.16-23.68.42,18,.84,36.14,3.62,54,1.8,11.47,4.56,22.77,6.07,34.27,1.29,9.85,1.65,19.8,2,29.73l9.37,11.46,25.83.52,13.49-17.4Z" id="ele2gyqeccquv" class="animable" style="transform-origin: 376.55px 278.2px;"></path></g></g><path d="M311.06,215.59a31.93,31.93,0,0,0-19.6,22.7c-7.58,33.44-20.56,77.91-20.76,92.26-.26,18.27,7.73,30.78,18.16,33.09,8.25,1.82,83-2.27,83-2.27l3.54-31.2-60.59-5.57,8.29-46.33-8.21-64.17Z" style="fill: rgb(224, 224, 224); transform-origin: 323.047px 289.103px;" id="el1t6zpyxxxiv" class="animable"></path><path d="M314.91,214.1l16.75-6.84,19.13-10.34.18.56h0c-2.16,3.7-4.46,10.53-3.65,14.74L362,288.84l-3.33,56-4.81,38.65H305.63l17.49-41.17L314.51,265Z" style="fill: rgb(224, 224, 224); transform-origin: 333.815px 290.205px;" id="elogqmr86dqdp" class="animable"></path><path d="M323.61,273.59a1.87,1.87,0,0,0-.14.51c-.07.4-.17.89-.29,1.49-.25,1.36-.59,3.21-1,5.47-.82,4.69-1.92,11.05-3.15,18.08s-2.23,13.41-3,18.11c-.35,2.27-.64,4.13-.86,5.5l-.2,1.5a1.64,1.64,0,0,0,0,.53,3,3,0,0,0,.13-.52c.09-.39.18-.88.31-1.48.25-1.36.59-3.21,1-5.47.84-4.62,2-11,3.17-18.08s2.26-13.47,3-18.11c.35-2.27.64-4.13.85-5.5.08-.61.14-1.1.19-1.5A3,3,0,0,0,323.61,273.59Z" style="fill: rgb(38, 50, 56); transform-origin: 319.288px 299.185px;" id="elpw7zviclw5c" class="animable"></path><path d="M341.61,202.32s0,.06-.07.18-.09.34-.16.56c-.12.5-.34,1.22-.53,2.18a67.22,67.22,0,0,0-1.28,8.25,93.59,93.59,0,0,0-.32,12.58c.16,4.78.67,10.07,1.39,15.67l0,.18.17,0,5.48,1-.19-.34c-.31.84-.64,1.75-.89,2.68a34.17,34.17,0,0,0,.63,18.58,58.68,58.68,0,0,0,6.43,13.85c2.28,3.7,4.35,6.55,5.77,8.53l1.66,2.25.44.58c.1.12.16.19.17.18a1.94,1.94,0,0,0-.13-.21c-.1-.17-.24-.36-.4-.61l-1.58-2.31c-1.37-2-3.39-4.88-5.63-8.6a59.58,59.58,0,0,1-6.29-13.79,33.94,33.94,0,0,1-.58-18.32c.24-.91.56-1.8.86-2.62l.11-.29-.29-.05-5.48-1,.2.21c-.73-5.59-1.25-10.86-1.45-15.63a98.2,98.2,0,0,1,.21-12.53,75.49,75.49,0,0,1,1.13-8.24c.17-1,.36-1.69.45-2.2,0-.22.08-.41.11-.57A.87.87,0,0,0,341.61,202.32Z" style="fill: rgb(38, 50, 56); transform-origin: 349.739px 245.775px;" id="elj0iphvmgrpn" class="animable"></path><path d="M341.61,280.91V268.69s-.16-3,2.38-2.38,2.06,5.39,2.06,5.39.48,18.58-.63,18.42-1.54-1.59-1.54-1.59v-7.14Z" style="fill: rgb(197, 63, 63); transform-origin: 343.881px 278.173px;" id="elm5hq8sr8x0o" class="animable"></path><path d="M331,281.67a85.93,85.93,0,0,0,13.1,0,85.93,85.93,0,0,0-13.1,0Z" style="fill: rgb(38, 50, 56); transform-origin: 337.55px 281.67px;" id="ely35ajcnxh1m" class="animable"></path><path d="M306.85,222.85a10.64,10.64,0,0,0,1.37.5,33.56,33.56,0,0,1,3.64,1.57,28.33,28.33,0,0,1,9.82,8.38,20.91,20.91,0,0,1,1.93,3.14,19.73,19.73,0,0,1,1.16,3.24,32.93,32.93,0,0,1,1,5.78c.14,1.66.17,3,.18,4a9.81,9.81,0,0,0,0,1.46,6.62,6.62,0,0,0,.16-1.46,38.74,38.74,0,0,0,0-4,30,30,0,0,0-.88-5.87,19.44,19.44,0,0,0-1.16-3.33,21.82,21.82,0,0,0-2-3.23A27.21,27.21,0,0,0,312,224.61a25,25,0,0,0-3.73-1.44A7.2,7.2,0,0,0,306.85,222.85Z" style="fill: rgb(38, 50, 56); transform-origin: 316.506px 236.885px;" id="elqy4c7r7bpu" class="animable"></path><path d="M371.88,361.37a4.35,4.35,0,0,1,0-.59c0-.42.09-1,.16-1.7.15-1.52.37-3.69.65-6.41.61-5.53,1.46-13.32,2.46-22.53l.21.27-22.5-1.91-38-3.35a19.85,19.85,0,0,0-11.11,2.19A22.33,22.33,0,0,0,301.1,329l-.65.5a1,1,0,0,1-.23.15,15.15,15.15,0,0,1,3.44-2.49,19.68,19.68,0,0,1,11.23-2.38l38.05,3.2,22.5,1.95.24,0,0,.24c-1.08,9.19-2,17-2.64,22.51l-.8,6.39c-.09.71-.17,1.27-.22,1.69A3.71,3.71,0,0,1,371.88,361.37Z" style="fill: rgb(38, 50, 56); transform-origin: 337.95px 343.038px;" id="elw3hyyiktmud" class="animable"></path><path d="M355.61,362.2a6.6,6.6,0,0,1-.18-1.31c-.08-.85-.16-2.09-.22-3.62a96,96,0,0,1,2.1-23.75c.33-1.49.62-2.69.86-3.52a5.94,5.94,0,0,1,.41-1.26,6.84,6.84,0,0,1-.21,1.31c-.19.94-.42,2.13-.7,3.54-.56,3-1.22,7.16-1.63,11.79s-.49,8.84-.47,11.88c0,1.45.05,2.66.06,3.61A6.21,6.21,0,0,1,355.61,362.2Z" style="fill: rgb(38, 50, 56); transform-origin: 356.863px 345.47px;" id="elcb5kkxfnl8d" class="animable"></path><path d="M364.19,352.42s.25-.13.74-.13a3.38,3.38,0,0,1,1.94.7,3.22,3.22,0,0,1,1.33,2.76,3.53,3.53,0,0,1-2.15,3.06,3.48,3.48,0,0,1-3.63-.86,3,3,0,0,1-.72-3,3.09,3.09,0,0,1,1.15-1.71,1.34,1.34,0,0,1,.69-.32c0,.05-.22.16-.56.47a3.2,3.2,0,0,0-.92,1.65,2.66,2.66,0,0,0,.7,2.54,3,3,0,0,0,3.11.71,3.09,3.09,0,0,0,1.85-2.6,2.87,2.87,0,0,0-1.07-2.44,3.5,3.5,0,0,0-1.74-.78A6.89,6.89,0,0,1,364.19,352.42Z" style="fill: rgb(38, 50, 56); transform-origin: 364.883px 355.646px;" id="eloo3qe023u98" class="animable"></path><path d="M351,196.66l-.31.19-1,.55L346,199.49l-14.26,7.89h0l-24,10.06a25.78,25.78,0,0,0-12.09,10,34.58,34.58,0,0,0-3.82,7.73A40.3,40.3,0,0,0,289.7,244v0h0c-4.44,19-9.48,40.81-14.37,64-1,5-2,9.92-3,14.79-.25,1.22-.45,2.44-.67,3.65s-.45,2.41-.6,3.62a39.56,39.56,0,0,0-.37,7.2,36.13,36.13,0,0,0,3.18,13.58,25.83,25.83,0,0,0,3.58,5.75,20.23,20.23,0,0,0,5,4.28,21.37,21.37,0,0,0,12.22,3l12.16-.25c7.84-.19,15.15-.42,21.82-.65l31.6-1.15,8.59-.33,2.24-.07h.76l-.76.06-2.23.13-8.59.42c-7.46.35-18.25.83-31.59,1.32-6.67.25-14,.5-21.83.71l-12.17.28a21.82,21.82,0,0,1-12.47-3.05,21.16,21.16,0,0,1-5.14-4.37,26.93,26.93,0,0,1-3.65-5.86,36.62,36.62,0,0,1-3.24-13.77,39.65,39.65,0,0,1,.37-7.29c.15-1.23.39-2.43.6-3.64s.42-2.44.67-3.65c.92-4.88,1.92-9.82,3-14.8,4.89-23.18,9.95-45,14.43-64v0a40.78,40.78,0,0,1,2.12-8.89,34.33,34.33,0,0,1,3.89-7.81,26.09,26.09,0,0,1,12.3-10.11l24.06-10h0l14.32-7.77,3.78-2,1-.51Z" style="fill: rgb(38, 50, 56); transform-origin: 320.988px 280.519px;" id="elpm5s7k3csih" class="animable"></path><rect x="412.05" y="277.01" width="22.86" height="7.13" style="fill: rgb(38, 50, 56); transform-origin: 423.48px 280.575px;" id="el4at6p3stvn2" class="animable"></rect><polygon points="519.45 290.12 443.4 371.24 369.22 371.7 367.46 368.33 440.58 289.11 519.45 290.12" style="fill: rgb(38, 50, 56); transform-origin: 443.455px 330.405px;" id="elejw8jzmjbpu" class="animable"></polygon><path d="M447.57,289.11s4.94,0,6.41,1.72c1.71,2.06,5,6.7-2.18,18.51-2.86,4.73-16.89,21-22.66,37.67-5.39,15.56-2.93,20.7-2.93,20.7L479.73,366l1-1.93s23.27-63,17.11-75C495,283.6,447.19,287.09,447.57,289.11Z" style="fill: rgb(224, 224, 224); transform-origin: 462.264px 326.925px;" id="elh1nm761k89u" class="animable"></path><path d="M488.62,364.4l-57.57.48c-.69-14.58,4.37-25.17,11.9-37.68,2.88-4.79,6.82-8.89,9.69-13.69a36.86,36.86,0,0,0,5.15-16.64c.15-2.34,0-4.87-1.43-6.72s-6.57-1.95-8.79-1a16.78,16.78,0,0,1,8.48-3.13c4.65-.39,42.71-.13,49.79-.07a21.83,21.83,0,0,1,5.05.82c5.16,2.67,6.22,9.7,5.49,14.76-.69,4.79-3.66,9.31-7.39,14.37a48.19,48.19,0,0,0-3,4.52c-3.93,6.81-14.78,25.91-16.73,32.5A30.25,30.25,0,0,0,488.62,364.4Z" style="fill: rgb(250, 250, 250); transform-origin: 473.787px 325.345px;" id="el5eo576olnz5" class="animable"></path><path d="M488.62,364.28l-13.86.11-26.48.22-11.12.1-3.72,0a9.66,9.66,0,0,1-2.08,0c-.05,0-.28,0-.31,0s.08-1.07.07-1.19c0-.5,0-1,0-1.51q0-1.47.09-2.94a50.68,50.68,0,0,1,1.94-11.06c2.14-7.26,5.81-14,9.69-20.42,2.13-3.54,4.77-6.71,7.21-10a41.69,41.69,0,0,0,5.66-10.19A35.73,35.73,0,0,0,458,296.08c.07-2.48-.29-5.88-2.9-7a9.76,9.76,0,0,0-3.75-.66c-.85,0-2.82-.11-3.55.48-.21.16-.1.22.05.18a1.61,1.61,0,0,0,.34-.24c.39-.26.8-.51,1.21-.73a17.33,17.33,0,0,1,4.45-1.67c3.1-.69,6.46-.49,9.62-.52,9.86-.08,19.73,0,29.6,0l11.39.07a26.62,26.62,0,0,1,5.34.51c3,.63,5,3.66,5.88,6.41a18.91,18.91,0,0,1,.5,9.27c-.76,3.91-2.91,7.41-5.14,10.65-2,2.92-4.09,5.74-5.87,8.82-1.22,2.15-2.44,4.29-3.65,6.45-2.89,5.16-5.73,10.36-8.37,15.67-2.27,4.55-4.46,9.06-4.81,14.22a30,30,0,0,0,.21,6.42c0,.16.27.09.24-.07a27.64,27.64,0,0,1,2.15-15.31c2.26-5.15,4.94-10.13,7.63-15.06q3.68-6.75,7.52-13.4c3.73-6.45,9.73-12.08,10.56-19.84.51-4.85-.61-12-5.7-14.17a15.11,15.11,0,0,0-5.51-.81l-4.16,0c-9.69-.06-19.39-.11-29.08-.1-4.18,0-8.36,0-12.54.08-3.79.07-7.42.44-10.8,2.41a11.33,11.33,0,0,0-1.33.88c-.09.07,0,.25.13.21a10.91,10.91,0,0,1,6.85-.1c3,1,3.35,4.6,3.23,7.35a36.88,36.88,0,0,1-6.1,18.47c-1.78,2.7-3.84,5.21-5.77,7.81a79.63,79.63,0,0,0-5,7.75,86.36,86.36,0,0,0-7.24,15.27,52.06,52.06,0,0,0-2.69,19.1.13.13,0,0,0,.13.13l19.45-.16,31-.26,7.11-.06A.13.13,0,1,0,488.62,364.28Z" style="fill: rgb(38, 50, 56); transform-origin: 473.823px 325.329px;" id="el8jbjp41z4yl" class="animable"></path><path d="M485.22,352.38c0,.15-10.15.26-22.68.26s-22.68-.11-22.68-.26,10.16-.26,22.68-.26S485.22,352.24,485.22,352.38Z" style="fill: rgb(38, 50, 56); transform-origin: 462.54px 352.38px;" id="el00tyfqu2sl4j" class="animable"></path><path d="M486.49,344.8c0,.14-10.15.26-22.68.26s-22.68-.12-22.68-.26,10.16-.26,22.68-.26S486.49,344.65,486.49,344.8Z" style="fill: rgb(38, 50, 56); transform-origin: 463.81px 344.8px;" id="elyrx04dhktdk" class="animable"></path><path d="M492.59,336.66c0,.14-10.16.26-22.68.26s-22.68-.12-22.68-.26,10.15-.26,22.68-.26S492.59,336.51,492.59,336.66Z" style="fill: rgb(38, 50, 56); transform-origin: 469.91px 336.66px;" id="elnbqcbodjvj" class="animable"></path><path d="M496.34,329.22c0,.14-10.15.26-22.68.26s-22.68-.12-22.68-.26,10.16-.26,22.68-.26S496.34,329.08,496.34,329.22Z" style="fill: rgb(38, 50, 56); transform-origin: 473.66px 329.22px;" id="el1we9une21s6" class="animable"></path><path d="M498.84,322.42c0,.14-10.15.26-22.67.26s-22.68-.12-22.68-.26,10.15-.26,22.68-.26S498.84,322.27,498.84,322.42Z" style="fill: rgb(38, 50, 56); transform-origin: 476.165px 322.42px;" id="elyddulbrsll" class="animable"></path><path d="M505,313.48c0,.15-10.15.26-22.68.26s-22.68-.11-22.68-.26,10.16-.26,22.68-.26S505,313.34,505,313.48Z" style="fill: rgb(38, 50, 56); transform-origin: 482.32px 313.48px;" id="elhgi67hcsvkd" class="animable"></path><path d="M510.8,304.93c0,.14-10.15.26-22.68.26s-22.68-.12-22.68-.26,10.16-.26,22.68-.26S510.8,304.79,510.8,304.93Z" style="fill: rgb(38, 50, 56); transform-origin: 488.12px 304.93px;" id="el492r2njiq36" class="animable"></path><path d="M510.38,296.8c0,.14-10.15.26-22.67.26S465,296.94,465,296.8s10.15-.26,22.68-.26S510.38,296.65,510.38,296.8Z" style="fill: rgb(38, 50, 56); transform-origin: 487.69px 296.8px;" id="elw5avyt4rlr8" class="animable"></path><path d="M440.58,289.11a1.55,1.55,0,0,1,.31.22l.9.71,3.44,2.8.09.08-.08.09c-6.19,6.77-19.61,21.24-35.18,37.93-10.74,11.77-21.09,21.86-28.58,29.13-3.75,3.64-6.8,6.55-8.92,8.56l-2.46,2.3-.65.58-.23.19s.06-.08.19-.22l.62-.63,2.39-2.37,8.81-8.67c7.42-7.35,17.71-17.45,28.45-29.23,15.57-16.69,29.07-31.08,35.39-37.73l0,.17-3.38-2.89-.86-.75A1.69,1.69,0,0,1,440.58,289.11Z" style="fill: rgb(69, 90, 100); transform-origin: 407.27px 330.405px;" id="elupdrztm4prf" class="animable"></path><path d="M375.34,333.75H386.2s7.34-6.4,9-6.89c3.49-1.05,12.5-2.15,12.5-2.15l-6.15,6.68h0c-1.43,1.54-4.05,2.93-2.5,2.93h11.3s11.55-5.54,13.27-4.53c1.44.85,1.94,2.39.47,4.53s-11.6,7.2-12.77,7.59l-3.31,1,3.11,1,14.73-5.15c.95-.17,2.28-.33,2.71.23a2,2,0,0,1-.08,2.85,62.54,62.54,0,0,1-6.66,5.23s2.35,3.46.4,5.21-7.59,7-7.59,7-.59,2.92-2.34,4.28-21,1.36-22.39,1.36-9.15-4.47-9.15-4.47l-8.45-.63Z" style="fill: rgb(183, 136, 118); transform-origin: 400.709px 344.815px;" id="elw86wuv8sjv" class="animable"></path><path d="M408.92,352.59a5.91,5.91,0,0,0,2.11.29,6.4,6.4,0,0,0,2.3-.41,13,13,0,0,0,2.51-1.33c1.67-1.09,3.16-2.09,4.23-2.84a9.48,9.48,0,0,0,1.68-1.28,10,10,0,0,0-1.85,1c-1.12.67-2.64,1.64-4.31,2.72a13.51,13.51,0,0,1-2.41,1.32,6.73,6.73,0,0,1-2.16.48C409.74,352.61,408.92,352.52,408.92,352.59Z" style="fill: rgb(170, 101, 80); transform-origin: 415.335px 349.953px;" id="eleqs5xeusnqp" class="animable"></path><path d="M408,359.8a2.4,2.4,0,0,0,1.47.82,5.41,5.41,0,0,0,4-.66,16.47,16.47,0,0,0,3.23-2.4c.74-.71,1.14-1.21,1.09-1.25a53.32,53.32,0,0,1-4.54,3.25,5.52,5.52,0,0,1-3.69.75A8.54,8.54,0,0,1,408,359.8Z" style="fill: rgb(170, 101, 80); transform-origin: 412.897px 358.531px;" id="el451dd6hdpfb" class="animable"></path><path d="M402.58,343.85a7.73,7.73,0,0,0,3.05-.24,7.62,7.62,0,0,0,2.89-1,16.63,16.63,0,0,0-3,.55A15.34,15.34,0,0,0,402.58,343.85Z" style="fill: rgb(170, 101, 80); transform-origin: 405.55px 343.258px;" id="elshvzx4fmj7j" class="animable"></path><path d="M328.9,127.28A21.94,21.94,0,0,0,298.77,119c-4.31,2.5-7.9,7-7.61,12,.27,4.7,3.77,8.49,7.07,11.84-5.26,2.19-7.89,8.85-6.17,14.27s7.14,9.25,12.8,9.77,11.37-1.94,15.46-5.9a31.09,31.09,0,0,0,8.08-14.78" style="fill: rgb(38, 50, 56); transform-origin: 310.022px 141.501px;" id="el7ri4c0f5cbb" class="animable"></path><path d="M310.94,139.4a9.13,9.13,0,0,1-2.88.73,13.61,13.61,0,0,1-7.88-1.64,13.87,13.87,0,0,1-4.31-3.61,13.38,13.38,0,0,1-2.63-5.9,16,16,0,0,1,4.13-13.78,17.92,17.92,0,0,1,13.5-5.2,16.42,16.42,0,0,1,11,4.53,10.94,10.94,0,0,1,3.24,7.32,8.67,8.67,0,0,1-.21,2.2c-.05.25-.13.43-.16.55s-.07.18-.08.18a12.34,12.34,0,0,0,.25-2.93,10.94,10.94,0,0,0-3.3-7.06,16.13,16.13,0,0,0-10.74-4.31,17.55,17.55,0,0,0-13.11,5.08,15.59,15.59,0,0,0-4,13.34,12.9,12.9,0,0,0,2.49,5.71A14,14,0,0,0,308,139.92,21.54,21.54,0,0,0,310.94,139.4Z" style="fill: rgb(38, 50, 56); transform-origin: 309.055px 125.085px;" id="elw9z13vs8tja" class="animable"></path><path d="M317.4,143.76a3,3,0,0,1-.69.44,12.27,12.27,0,0,1-2,.91,17.14,17.14,0,0,1-3.2.8,19.81,19.81,0,0,1-4.05.14,18.78,18.78,0,0,1-4-.75,17.54,17.54,0,0,1-3.05-1.27,13.43,13.43,0,0,1-1.87-1.2c-.41-.33-.62-.52-.6-.55s1,.62,2.64,1.42a19.5,19.5,0,0,0,3,1.14,19.6,19.6,0,0,0,7.82.59,19.79,19.79,0,0,0,3.15-.67C316.33,144.22,317.35,143.67,317.4,143.76Z" style="fill: rgb(69, 90, 100); transform-origin: 307.669px 144.187px;" id="el4aq4iya6z5e" class="animable"></path><path d="M291.14,131.88a4.21,4.21,0,0,1,.4-1.2,6.91,6.91,0,0,1,2.12-2.74,10,10,0,0,1,4.87-1.64,24.09,24.09,0,0,1,6.27.3,33.07,33.07,0,0,1,10.71,3.69,27.73,27.73,0,0,1,2.9,1.85,5.06,5.06,0,0,1,1,.8,5.44,5.44,0,0,1-1.09-.64c-.69-.42-1.69-1-3-1.68a35.81,35.81,0,0,0-10.62-3.51,25,25,0,0,0-6.13-.33,9.89,9.89,0,0,0-4.7,1.46,6.92,6.92,0,0,0-2.15,2.53A12.45,12.45,0,0,1,291.14,131.88Z" style="fill: rgb(69, 90, 100); transform-origin: 305.275px 129.579px;" id="elna74ahjdby" class="animable"></path><path d="M321.68,151.94s0,.12-.14.34-.3.51-.54.9a16.54,16.54,0,0,1-2.52,2.94,17.23,17.23,0,0,1-4.82,3.12,17,17,0,0,1-6.91,1.37,16.62,16.62,0,0,1-6.87-1.51,12.81,12.81,0,0,1-4.53-3.54,8.43,8.43,0,0,1-1.67-3.5,5.65,5.65,0,0,1-.13-1.05c0-.24,0-.36,0-.36s.06.5.3,1.36a9,9,0,0,0,1.77,3.32,12.88,12.88,0,0,0,4.44,3.34,16.53,16.53,0,0,0,6.68,1.42,17.12,17.12,0,0,0,6.71-1.29,17.4,17.4,0,0,0,4.76-3A24.22,24.22,0,0,0,321.68,151.94Z" style="fill: rgb(69, 90, 100); transform-origin: 307.615px 155.631px;" id="elrd0hx1abmx" class="animable"></path><path d="M323.59,157.14a9.17,9.17,0,0,1-1.1,1.33c-.74.82-1.84,2-3.3,3.33-.73.67-1.56,1.38-2.48,2.1a15.9,15.9,0,0,1-11.51,3.69,14.26,14.26,0,0,1-8.06-2.78,14.67,14.67,0,0,1-4.23-5.55,12.87,12.87,0,0,1-1.11-4.57,9.69,9.69,0,0,1,0-1.29,2,2,0,0,1,.07-.44,1.55,1.55,0,0,1,0,.45,9.27,9.27,0,0,0,.07,1.26,13.46,13.46,0,0,0,1.23,4.44,14.65,14.65,0,0,0,4.2,5.32,14,14,0,0,0,7.79,2.64,17,17,0,0,0,8.14-1.54,17.46,17.46,0,0,0,3.08-2c.92-.7,1.75-1.39,2.49-2,1.48-1.29,2.62-2.41,3.41-3.19A15.06,15.06,0,0,1,323.59,157.14Z" style="fill: rgb(69, 90, 100); transform-origin: 307.684px 160.3px;" id="ela9wjc20s4db" class="animable"></path><path d="M332,126.68l1.46,1.15c-.59-2.48-3.37-4-5.91-3.78a8.56,8.56,0,0,0-6.09,4.2,20.73,20.73,0,0,0-2.45,7.22c-.78,4.2-1.17,8.68.5,12.6s6,7,10.12,6,6.43-5.51,7.05-9.71A23.57,23.57,0,0,0,332,126.68Z" style="fill: rgb(197, 63, 63); transform-origin: 327.625px 139.145px;" id="elekl2salmgbf" class="animable"></path><path d="M326.27,145.7a6.36,6.36,0,0,1-4,.86,8.42,8.42,0,0,1-2.83-.63c-.73-.29-1-.84-.86-.85a3.47,3.47,0,0,0,1,.51,12.47,12.47,0,0,0,2.73.45A28.49,28.49,0,0,0,326.27,145.7Z" style="fill: rgb(38, 50, 56); transform-origin: 322.407px 145.841px;" id="ele8sj0t55pa" class="animable"></path><path d="M328.3,138.28a21.33,21.33,0,0,1-4.8.11,21.68,21.68,0,0,1-4.78-.41,22.84,22.84,0,0,1,4.8-.11A23.23,23.23,0,0,1,328.3,138.28Z" style="fill: rgb(38, 50, 56); transform-origin: 323.51px 138.134px;" id="elicyng4l69" class="animable"></path><path d="M326.7,130.35c0,.17-1.48,0-3.22-.2a7.72,7.72,0,0,0-2.2.13c-.55.12-.88.26-.92.19s.24-.32.81-.55a5.63,5.63,0,0,1,2.34-.29A8.61,8.61,0,0,1,326.7,130.35Z" style="fill: rgb(38, 50, 56); transform-origin: 323.528px 130.049px;" id="el1ogpkehffgk" class="animable"></path><path d="M336.86,110.29c-.12-4.18,3.76-7.42,7.66-9s8.23-2.11,11.71-4.45c3.08-2.07,5.15-5.3,7.75-7.95a25.8,25.8,0,0,1,43.39,11.84c1.5,6,.48,13-4.22,17-5.46,4.6-13.56,3.58-20.55,2.15s-14.91-2.85-20.75,1.26c-3.52,2.48-5.54,6.51-7.7,10.24s-4.85,7.53-8.92,8.93-9.6-1-9.76-5.32" style="fill: rgb(38, 50, 56); transform-origin: 371.741px 110.96px;" id="elxynjoks9yci" class="animable"></path><path d="M337.14,112.59c.46,3.52-2.08,6.66-4.61,9.14s-5.38,5.11-5.83,8.62c-.52,4.11,2.47,8.15,1.6,12.19-.55,2.57-2.54,4.55-3.75,6.88a14.56,14.56,0,0,0-.75,10.76c1,3.54,2.7,11.44,5.16,14.19,6.8,7.6,17.62,14.16,27.56,16.44s20.26,2.3,30.44,1.67c8.33-.51,17.91-.13,24.86-11.59,3.59-5.94,5.38-13.83,7.29-20.5,1.64-5.75,3.07-11.9,1.35-17.63-1-3.34-3-6.3-4-9.64-1.23-4.17-.78-8.64-1.28-13a29.72,29.72,0,0,0-42.29-23.47" style="fill: rgb(38, 50, 56); transform-origin: 372.173px 143.302px;" id="el8qnywqiwxev" class="animable"></path><path d="M351.31,208s0,.25.05.37Z" style="fill: rgb(183, 136, 118); transform-origin: 351.335px 208.185px;" id="elb5iom1phdn" class="animable"></path><path d="M411.22,127c-.78-11.95-8.74-26.61-20.65-25.32l-37.19,9.49a7,7,0,0,0-6.25,7.12L351.21,206a11.8,11.8,0,0,0,1,4.32c2.76,6.08,11.94,21.55,31.86,15.29,4.88-1.53,7.11-6.87,8.07-12.35,0-.65.27-1.23.28-1.85a59,59,0,0,0,.15-12.32c.07-7.24.06-10.21.06-10.14s15.27-2.57,18.4-22.51C412.62,156.53,412.08,140.28,411.22,127Z" style="fill: rgb(183, 136, 118); transform-origin: 379.588px 164.337px;" id="el4loong7m2os" class="animable"></path><path d="M351.36,208.36c0,.07,0,0,0,0Z" style="fill: rgb(183, 136, 118); transform-origin: 351.36px 208.376px;" id="els8s56th250f" class="animable"></path><path d="M405.23,140a2.55,2.55,0,0,1-2.46,2.58,2.44,2.44,0,0,1-2.64-2.3,2.55,2.55,0,0,1,2.45-2.58A2.45,2.45,0,0,1,405.23,140Z" style="fill: rgb(38, 50, 56); transform-origin: 402.68px 140.14px;" id="elbjsqq9vheap" class="animable"></path><path d="M407.71,135.46c-.32.33-2.26-1.1-5-1.09s-4.76,1.4-5.06,1.06c-.15-.15.18-.75,1.05-1.39a7.05,7.05,0,0,1,4.05-1.26,6.72,6.72,0,0,1,4,1.28C407.58,134.7,407.87,135.31,407.71,135.46Z" style="fill: rgb(38, 50, 56); transform-origin: 402.684px 134.145px;" id="el923xgc29oi5" class="animable"></path><path d="M378,140a2.54,2.54,0,0,1-2.45,2.58,2.44,2.44,0,0,1-2.64-2.3,2.54,2.54,0,0,1,2.45-2.58A2.44,2.44,0,0,1,378,140Z" style="fill: rgb(38, 50, 56); transform-origin: 375.455px 140.14px;" id="el2cj1k6py1c9" class="animable"></path><path d="M380.67,136c-.32.33-2.26-1.1-5-1.08s-4.76,1.39-5.06,1.06c-.15-.15.17-.76,1-1.4a7.06,7.06,0,0,1,4.06-1.26,6.78,6.78,0,0,1,4,1.28C380.54,135.28,380.83,135.88,380.67,136Z" style="fill: rgb(38, 50, 56); transform-origin: 375.643px 134.685px;" id="elg9b6v61yolr" class="animable"></path><path d="M390.7,156.41c0-.16,1.7-.46,4.47-.82.7-.07,1.36-.21,1.48-.69a3.61,3.61,0,0,0-.47-2.08c-.67-1.7-1.36-3.48-2.09-5.35-2.9-7.61-5-13.86-4.7-14s2.91,6,5.81,13.57q1.05,2.82,2,5.38a4,4,0,0,1,.37,2.75,1.73,1.73,0,0,1-1.15,1,4.6,4.6,0,0,1-1.19.17C392.44,156.55,390.71,156.56,390.7,156.41Z" style="fill: rgb(38, 50, 56); transform-origin: 393.514px 144.99px;" id="elnc3tnkgui7o" class="animable"></path><path d="M392.67,189A50.71,50.71,0,0,1,366,181.89s6.74,13.79,26.69,11.88Z" style="fill: rgb(170, 101, 80); transform-origin: 379.345px 187.921px;" id="elosrt9r2qduk" class="animable"></path><path d="M389.55,163a5,5,0,0,0-4.45-1.83,4.55,4.55,0,0,0-3.12,1.68,2.88,2.88,0,0,0-.21,3.28,3.35,3.35,0,0,0,3.61.91,10.55,10.55,0,0,0,3.51-2.11,2.89,2.89,0,0,0,.78-.82.9.9,0,0,0,0-1" style="fill: rgb(170, 101, 80); transform-origin: 385.588px 164.187px;" id="el45p4f9jvsrx" class="animable"></path><path d="M382.61,158.33c.45,0,.46,3,3,5.07s5.74,1.78,5.76,2.2c0,.18-.71.58-2.05.62a7.4,7.4,0,0,1-4.81-1.67,6.45,6.45,0,0,1-2.34-4.25C382.07,159.05,382.4,158.31,382.61,158.33Z" style="fill: rgb(38, 50, 56); transform-origin: 386.761px 162.275px;" id="elnhbd13mjc" class="animable"></path><path d="M381.9,131.21c-.27.75-3,.4-6.24.8s-5.84,1.28-6.27.61c-.19-.32.26-1,1.31-1.75a10.94,10.94,0,0,1,9.53-1.08C381.42,130.27,382,130.85,381.9,131.21Z" style="fill: rgb(38, 50, 56); transform-origin: 375.629px 131.012px;" id="eld9l5vs6dytd" class="animable"></path><path d="M406.68,127.5c-.48.62-2.38,0-4.66,0s-4.2.43-4.65-.22c-.2-.32.11-.94.95-1.54a6.74,6.74,0,0,1,7.5.22C406.63,126.55,406.89,127.19,406.68,127.5Z" style="fill: rgb(38, 50, 56); transform-origin: 402.03px 126.241px;" id="elbvod2ynf2a6" class="animable"></path><path d="M339.47,176.73a17.69,17.69,0,0,0,21-19.57c-.62-4.89-3.26-9.88-1.56-14.51,2.24-6.12,10.83-8,13.11-14.12,1.33-3.56.14-7.71,1.64-11.19,1.41-3.28,4.85-5.16,8.21-6.38s6.95-2,9.76-4.23,4.57-6.32,2.76-9.39a188.79,188.79,0,0,0-43.56,10.58c-3.25,1.22-6.67,2.68-8.59,5.57-2,3.06-1.94,7-1.77,10.68q1.25,26.85,2.5,53.7" style="fill: rgb(38, 50, 56); transform-origin: 367.298px 137.605px;" id="elwch5qe2j5bc" class="animable"></path><path d="M340.72,183.59a1.42,1.42,0,0,1-.33-.21l-.88-.67c-.77-.61-1.91-1.5-3.3-2.74a34.9,34.9,0,0,1-4.69-4.93,18.3,18.3,0,0,1-3.73-8.21,12.47,12.47,0,0,1,2.57-10.48,39.33,39.33,0,0,1,4.65-4,10.84,10.84,0,0,0,3.62-4.94c1.47-4.07.82-8.77,1.39-13.58a27,27,0,0,1,5.65-13.74,18.57,18.57,0,0,1,5.91-4.83,36.68,36.68,0,0,1,7-2.35,16.19,16.19,0,0,0,6.12-3,24,24,0,0,0,4.45-4.9c2.5-3.55,4.35-7.34,6.74-10.5a22.36,22.36,0,0,1,3.93-4.17,15,15,0,0,1,4.65-2.54,10,10,0,0,1,8.86.88,8.16,8.16,0,0,1,3.14,6,6,6,0,0,1-1.2,4.11,3.88,3.88,0,0,1-.81.77c-.2.16-.31.23-.32.21s.08-.1.26-.27a4.59,4.59,0,0,0,.73-.82,5.9,5.9,0,0,0,1-4A7.84,7.84,0,0,0,393,89.1a9.43,9.43,0,0,0-8.37-.69,14.56,14.56,0,0,0-4.43,2.47A22.4,22.4,0,0,0,376.44,95c-2.31,3.11-4.13,6.89-6.66,10.54a24.89,24.89,0,0,1-4.58,5.08,17.05,17.05,0,0,1-6.4,3.19,36.27,36.27,0,0,0-6.82,2.31,17.81,17.81,0,0,0-5.64,4.61A26.32,26.32,0,0,0,340.87,134c-.58,4.65.09,9.43-1.48,13.75A11.71,11.71,0,0,1,335.5,153a40.16,40.16,0,0,0-4.6,3.85,11.91,11.91,0,0,0-2.5,9.9,18.17,18.17,0,0,0,3.51,8,37.82,37.82,0,0,0,4.52,5c1.36,1.26,2.46,2.2,3.19,2.85A9.2,9.2,0,0,1,340.72,183.59Z" style="fill: rgb(69, 90, 100); transform-origin: 362.007px 135.37px;" id="elz30w9aawi" class="animable"></path><path d="M421.62,152.42a4.73,4.73,0,0,0,1.16-1.91,7.36,7.36,0,0,0-1.14-5.85c-.69-1.11-1.62-2.21-2.56-3.46a12,12,0,0,1-2.3-4.46,15.69,15.69,0,0,1-.22-5.53c.21-1.91.59-3.85.84-5.83a22.73,22.73,0,0,0-1.3-11.06,24.81,24.81,0,0,0-4.77-7.81,22.71,22.71,0,0,0-4.73-4c-1.24-.79-2-1.15-2-1.19a2.2,2.2,0,0,1,.55.22,14,14,0,0,1,1.51.8,21.39,21.39,0,0,1,4.9,3.93,24.5,24.5,0,0,1,4.95,7.89,22.91,22.91,0,0,1,1.37,11.29c-.25,2-.64,3.95-.85,5.82a15.22,15.22,0,0,0,.18,5.37,11.68,11.68,0,0,0,2.17,4.31c.92,1.25,1.85,2.38,2.54,3.53a7.42,7.42,0,0,1,1,6.11,3.92,3.92,0,0,1-.89,1.47A2.05,2.05,0,0,1,421.62,152.42Z" style="fill: rgb(38, 50, 56); transform-origin: 413.893px 126.87px;" id="el0zjiz0ck3xho" class="animable"></path><path d="M602.87,383.82c-189.55,0-342.63.12-342.63.26s153.08.26,342.63.26Z" style="fill: rgb(38, 50, 56); transform-origin: 431.555px 384.08px;" id="elcrhk6auv3m6" class="animable"></path></g><g id="freepik--character-2--inject-216" class="animable" style="transform-origin: 550.955px 373.8px;"><rect x="508.07" y="324.94" width="85.53" height="98" style="fill: rgb(235, 235, 235); transform-origin: 550.835px 373.94px;" id="eld22cwq1ceiu" class="animable"></rect><path d="M593.61,422.94s0-.17,0-.47,0-.78,0-1.37c0-1.21,0-3,0-5.3,0-4.64,0-11.41-.06-20,0-17.18-.07-41.65-.11-70.85l.23.23-85.53,0h0l.26-.26c0,36.14,0,69.83,0,98l-.22-.22,62,.11,17.35.06,4.58,0,1.59,0-1.54,0-4.54,0-17.3.05-62.16.12h-.22v-.22c0-28.17,0-61.86,0-98v-.26h.27l85.53,0h.23v.23c-.05,29.26-.09,53.78-.12,71,0,8.58-.05,15.33-.06,20,0,2.29,0,4.05,0,5.25,0,.58,0,1,0,1.34S593.61,422.94,593.61,422.94Z" style="fill: rgb(38, 50, 56); transform-origin: 550.955px 373.8px;" id="el844z2r1aagv" class="animable"></path><path d="M525.59,359.6c1-1.57,1.73-8.08,3.1-7.71,1.73.46-.71,7.37-.88,8s.74.87.87.3c.17-.83,2.12-8.94,3.82-8.32.94.34.33,2.06.33,2.06s-2.75,7.89-1.94,8.16,2.4-4.35,2.92-6,1.34-2,1.92-1.27-.88,5.45-1.35,7-1.87,5.87.55,4.27,4.87-2,5.59-1.6.45,1.49-.44,1.64a10.7,10.7,0,0,0-2.69,1.14,10,10,0,0,0-1.85,1.44,9,9,0,0,0-1.84,2.36,5.63,5.63,0,0,1-3.71,2.75h0l-.72,3L521,373.75l1.37-5.61a55.32,55.32,0,0,0,1.39-10c.4-4.24,1-4.22,1.43-4.06C526.25,354.41,524.56,361.14,525.59,359.6Z" style="fill: rgb(255, 190, 157); transform-origin: 530.966px 364.328px;" id="elcyjnlwbmdj" class="animable"></path><path d="M524.08,365.07a9.6,9.6,0,0,1,1.08.61,4.63,4.63,0,0,1,1.71,2.37,4.05,4.05,0,0,1,.18.88v.15l.13-.06a7.14,7.14,0,0,1,2.28-.61c.59-.06.95,0,.95-.07a2.71,2.71,0,0,0-1-.06,6.57,6.57,0,0,0-2.35.55l.14.09a4.58,4.58,0,0,0-.18-.94,4.52,4.52,0,0,0-.8-1.49,4.33,4.33,0,0,0-1-.93,4.28,4.28,0,0,0-.83-.42C524.2,365.08,524.08,365.05,524.08,365.07Z" style="fill: rgb(235, 153, 110); transform-origin: 527.245px 367.072px;" id="elu2wkumnf1kf" class="animable"></path><path d="M523.61,371.35a5.87,5.87,0,0,0,1.9,1.14,5.74,5.74,0,0,0,2.15.54c0-.06-1-.26-2.07-.73S523.65,371.3,523.61,371.35Z" style="fill: rgb(235, 153, 110); transform-origin: 525.635px 372.188px;" id="elqlvpsx12yjs" class="animable"></path><path d="M521.2,412.82a9,9,0,0,0,4.94-2.09l13.34-11.27-.12,13-2.64.19.74,9.66h41.29l0-.22a14.7,14.7,0,0,0,4.66-9c1-6.43,1.38-16.91,2.27-24.32.64-5.22-.51-12-5.15-14.44L577,372.92h0l-11.29-4.44-14.49.66-9.68,2.72c-2.68,1-5,4.23-6.65,6.6l-8.06,11.23c.09-1.84,3.42-12.9,3.64-13.39l-9.87-4.07s-10.17,22.61-8.8,32.38C512.9,412.73,521.2,412.82,521.2,412.82Z" style="fill: rgb(197, 63, 63); transform-origin: 548.758px 395.395px;" id="elfkyul5lwqxl" class="animable"></path><path d="M570.4,335.16a9.91,9.91,0,0,1,2.72,9.81l0,.08a33.89,33.89,0,0,1-6,11.75c-.24.31-.62.65-1,.47s-.31-.43-.35-.7a28.12,28.12,0,0,1,.36-6.91,17.35,17.35,0,0,0-.2-6.89,6.7,6.7,0,0,0-4.56-4.8,7.3,7.3,0,0,0-4.94.88c-1.52.78-2.86,1.86-4.31,2.76a9.4,9.4,0,0,1-4.78,1.67,4.48,4.48,0,0,1-4.19-2.42c-.67-1.57.22-3.74,1.9-4-1.53-.19-2.33-1.67-2.44-3.21,0,0,.1-2.61,3.88-2.43,0,0,.5-3.91,4.3-2.49,3.4,1.28,3.85,2.28,9.22,1.09,0,0,7.24-1.76,9.45,4.47Z" style="fill: rgb(38, 50, 56); transform-origin: 558.043px 342.87px;" id="eli86i8070fhe" class="animable"></path><path d="M569.49,345.63l-3.35,25.72a7.71,7.71,0,0,1-9,6.6h0a7.73,7.73,0,0,1-6.28-8.6c.26-1.94.46-3.55.48-3.75,0,0-6.47-1.47-6.1-8,.18-3.16,1.08-9.65,2-15.5a12.21,12.21,0,0,1,12.91-10.36l.63,0C567.5,332.65,570.54,338.88,569.49,345.63Z" style="fill: rgb(255, 190, 157); transform-origin: 557.459px 354.891px;" id="elj4arl63x009" class="animable"></path><path d="M551.31,365.5a15.26,15.26,0,0,0,8.69-1.83s-2.34,4.56-8.82,3.53Z" style="fill: rgb(235, 153, 110); transform-origin: 555.59px 365.511px;" id="elpzzoba8rv6" class="animable"></path><path d="M548,347c.11.13.85-.35,1.86-.27s1.7.62,1.82.51,0-.28-.35-.54a2.59,2.59,0,0,0-1.45-.56,2.52,2.52,0,0,0-1.49.37C548.07,346.69,548,346.9,548,347Z" style="fill: rgb(38, 50, 56); transform-origin: 549.863px 346.695px;" id="elheh0dwnw58k" class="animable"></path><path d="M557.69,347.52c.1.13.85-.35,1.85-.28s1.71.63,1.82.51,0-.27-.35-.53a2.52,2.52,0,0,0-1.45-.56,2.42,2.42,0,0,0-1.48.37C557.75,347.25,557.63,347.46,557.69,347.52Z" style="fill: rgb(38, 50, 56); transform-origin: 559.538px 347.21px;" id="elbrrxrb9ow0p" class="animable"></path><path d="M554.06,353.46a6.44,6.44,0,0,0-1.61-.41c-.25,0-.49-.11-.52-.29a1.22,1.22,0,0,1,.22-.74l.89-1.91a32.85,32.85,0,0,0,2.06-5,33.31,33.31,0,0,0-2.45,4.82c-.3.67-.59,1.3-.87,1.91a1.58,1.58,0,0,0-.2,1,.64.64,0,0,0,.4.4,1.23,1.23,0,0,0,.43.09A6.19,6.19,0,0,0,554.06,353.46Z" style="fill: rgb(38, 50, 56); transform-origin: 553.333px 349.29px;" id="elcnbd1bpbomd" class="animable"></path><path d="M557,354.36c-.16,0-.24,1.07-1.23,1.78s-2.14.51-2.15.66.24.23.73.28a2.76,2.76,0,0,0,1.8-.49,2.42,2.42,0,0,0,1-1.5C557.15,354.64,557.05,354.36,557,354.36Z" style="fill: rgb(38, 50, 56); transform-origin: 555.385px 355.724px;" id="el3jfia8ja71g" class="animable"></path><path d="M558.23,342.31c.09.28,1.1.22,2.27.44s2.1.61,2.27.38-.07-.38-.44-.67a3.84,3.84,0,0,0-1.65-.72,4,4,0,0,0-1.8.09C558.43,342,558.2,342.18,558.23,342.31Z" style="fill: rgb(38, 50, 56); transform-origin: 560.527px 342.439px;" id="eliu6a26vv5pr" class="animable"></path><path d="M549,342.51c.16.24.87.05,1.71.1s1.52.26,1.7,0,0-.35-.31-.58a2.31,2.31,0,0,0-1.36-.47,2.36,2.36,0,0,0-1.38.36C549.05,342.17,548.93,342.39,549,342.51Z" style="fill: rgb(38, 50, 56); transform-origin: 550.731px 342.147px;" id="elgrljvqkjgd" class="animable"></path><path d="M568.62,350.43c.12,0,4.59-1,4.13,3.44s-4.83,3.09-4.83,3S568.62,350.43,568.62,350.43Z" style="fill: rgb(255, 190, 157); transform-origin: 570.352px 353.733px;" id="elfjgfhu294qr" class="animable"></path><path d="M569.46,355.28s.07.06.2.14a.78.78,0,0,0,.57.07,2,2,0,0,0,1.07-1.64,2.47,2.47,0,0,0-.11-1.13.91.91,0,0,0-.52-.66.4.4,0,0,0-.48.17c-.07.12-.05.21-.08.22s-.09-.09,0-.27a.49.49,0,0,1,.2-.26.55.55,0,0,1,.44-.07,1.09,1.09,0,0,1,.74.77,2.54,2.54,0,0,1,.15,1.27,2,2,0,0,1-1.33,1.81.84.84,0,0,1-.7-.19C569.45,355.39,569.44,355.29,569.46,355.28Z" style="fill: rgb(235, 153, 110); transform-origin: 570.558px 353.773px;" id="ell3j6xypu7pd" class="animable"></path><path d="M545.89,340.64a9.46,9.46,0,0,0,8.52-1.32c1.68-1.23,3-3.09,5.07-3.56a5.36,5.36,0,0,1,4,.83,10.44,10.44,0,0,1,2.88,3c-1.49,3.24-.9,7-.28,10.51a1.82,1.82,0,0,0,.45,1.07,1.43,1.43,0,0,0,1.81-.27,5.52,5.52,0,0,0,1.41-2.83,18.29,18.29,0,0,0,.46-7.25,12.61,12.61,0,0,0-3-6.56,11.9,11.9,0,0,0-8.1-3.71,14.57,14.57,0,0,0-8.66,2.43,8.59,8.59,0,0,0-3,3" style="fill: rgb(38, 50, 56); transform-origin: 558.135px 340.958px;" id="elmp05wq2bixr" class="animable"></path><path d="M561.27,350.76a.1.1,0,0,0,.13-.08.11.11,0,0,0-.07-.15.11.11,0,0,0-.14.09A.11.11,0,0,0,561.27,350.76Z" style="fill: rgb(235, 153, 110); transform-origin: 561.297px 350.645px;" id="el9q5sq9n75dt" class="animable"></path><path d="M559.38,350.2a.14.14,0,0,0,.14-.11c0-.07,0-.15-.07-.16s-.12,0-.14.1A.13.13,0,0,0,559.38,350.2Z" style="fill: rgb(235, 153, 110); transform-origin: 559.41px 350.064px;" id="el0bpehn8mzeho" class="animable"></path><path d="M558.09,350.07c.06,0,.12-.05.14-.15s0-.19-.07-.2-.13.06-.15.16S558,350.06,558.09,350.07Z" style="fill: rgb(235, 153, 110); transform-origin: 558.119px 349.895px;" id="el88e0c743ak9" class="animable"></path><path d="M560.24,351.9c.06,0,.11,0,.11-.06s0-.07-.1-.08a.13.13,0,0,0-.12.06S560.18,351.9,560.24,351.9Z" style="fill: rgb(235, 153, 110); transform-origin: 560.24px 351.83px;" id="elfr6e46vlisa" class="animable"></path><path d="M558.51,351.37a.12.12,0,0,0,.13-.1.13.13,0,0,0-.09-.15.12.12,0,0,0-.13.11A.12.12,0,0,0,558.51,351.37Z" style="fill: rgb(235, 153, 110); transform-origin: 558.53px 351.245px;" id="elbyan7676ocs" class="animable"></path><path d="M549.42,349.65a.13.13,0,0,0,.14-.09.11.11,0,0,0-.07-.15.11.11,0,0,0-.14.09A.12.12,0,0,0,549.42,349.65Z" style="fill: rgb(235, 153, 110); transform-origin: 549.457px 349.528px;" id="el6wyxjl42olj" class="animable"></path><path d="M548.12,349.44c.06,0,.12-.05.13-.12a.11.11,0,1,0-.13.12Z" style="fill: rgb(235, 153, 110); transform-origin: 548.14px 349.331px;" id="el4monav3okni" class="animable"></path><path d="M550.57,349.76a.11.11,0,0,0,.14-.07.11.11,0,1,0-.14.07Z" style="fill: rgb(235, 153, 110); transform-origin: 550.605px 349.656px;" id="el3xk7byb0rai" class="animable"></path><path d="M549.51,351a.12.12,0,0,0,.16-.06.11.11,0,1,0-.19-.1A.11.11,0,0,0,549.51,351Z" style="fill: rgb(235, 153, 110); transform-origin: 549.577px 350.885px;" id="elc9nb1wrvppr" class="animable"></path><path d="M548.41,350.7a.1.1,0,0,0,.09-.11.1.1,0,0,0-.12-.07.1.1,0,0,0-.09.11A.1.1,0,0,0,548.41,350.7Z" style="fill: rgb(235, 153, 110); transform-origin: 548.395px 350.61px;" id="elql2lyvr59jh" class="animable"></path><path d="M555.39,335.56a4,4,0,0,1-1.6,1.59,6.7,6.7,0,0,1-9.6-2.49,3.93,3.93,0,0,1-.62-2.17,21.15,21.15,0,0,0,.94,2,6.66,6.66,0,0,0,9.09,2.35C554.78,336.18,555.32,335.49,555.39,335.56Z" style="fill: rgb(69, 90, 100); transform-origin: 549.48px 335.367px;" id="elfahts2c9cxn" class="animable"></path><path d="M569.55,336.69a5.37,5.37,0,0,0-2-2.26,6.32,6.32,0,0,0-3.13-.91,15.73,15.73,0,0,0-4.06.48,30.36,30.36,0,0,1-4.12.76,8.13,8.13,0,0,1-3.45-.37,5.18,5.18,0,0,1-2-1.2,1.87,1.87,0,0,1-.51-.68,6.87,6.87,0,0,0,2.63,1.53,8.41,8.41,0,0,0,3.29.24,33.93,33.93,0,0,0,4.06-.79,15.16,15.16,0,0,1,4.2-.45,6.4,6.4,0,0,1,3.3,1.08,4.51,4.51,0,0,1,1.55,1.75C569.56,336.38,569.58,336.69,569.55,336.69Z" style="fill: rgb(69, 90, 100); transform-origin: 559.92px 334.6px;" id="elfdg752ua8pv" class="animable"></path><path d="M571.67,342.11a4.86,4.86,0,0,1-5.28-2.55,19.52,19.52,0,0,0,2.44,1.69A19.85,19.85,0,0,0,571.67,342.11Z" style="fill: rgb(69, 90, 100); transform-origin: 569.03px 340.882px;" id="elqbupg6mvkd8" class="animable"></path><path d="M571.12,345.06c0,.07-.39.05-1-.07a6.88,6.88,0,0,1-2.18-.81,3.93,3.93,0,0,1-1.59-1.76c-.23-.58-.18-1-.12-1s.16.34.45.81a4.63,4.63,0,0,0,1.53,1.48,11.93,11.93,0,0,0,2,.91C570.8,344.84,571.14,345,571.12,345.06Z" style="fill: rgb(69, 90, 100); transform-origin: 568.65px 343.26px;" id="el5cp1982gjrh" class="animable"></path><path d="M539.49,412.47c-.06,0-.11-6.59-.11-14.72s0-14.73.11-14.73.1,6.6.1,14.73S539.55,412.47,539.49,412.47Z" style="fill: rgb(38, 50, 56); transform-origin: 539.485px 397.745px;" id="el3hazo0ckzdq" class="animable"></path><path d="M580.6,377.42a15.59,15.59,0,0,0-2,0,9.23,9.23,0,0,0-4.43,1.48,9.32,9.32,0,0,0-3.09,3.49,18,18,0,0,0-.73,1.83,2.77,2.77,0,0,1,.1-.53,7.67,7.67,0,0,1,.5-1.36,8.9,8.9,0,0,1,3.11-3.61,9,9,0,0,1,4.53-1.45,7.3,7.3,0,0,1,1.45.08A2.33,2.33,0,0,1,580.6,377.42Z" style="fill: rgb(38, 50, 56); transform-origin: 575.475px 380.741px;" id="elfspc5gtp2ad" class="animable"></path><path d="M526.72,388.26a5.58,5.58,0,0,1-.05.62c0,.4,0,1,0,1.69,0,1.42.31,3.38.41,5.57a10.8,10.8,0,0,1-1,5.48,5.59,5.59,0,0,1-1,1.38,3.09,3.09,0,0,1-.47.4,7.86,7.86,0,0,0,1.34-1.85,11.11,11.11,0,0,0,1-5.4c-.1-2.17-.38-4.14-.35-5.58a13.46,13.46,0,0,1,.11-1.7c0-.2.06-.35.08-.45S526.71,388.26,526.72,388.26Z" style="fill: rgb(38, 50, 56); transform-origin: 525.862px 395.83px;" id="el71bbcidzwde" class="animable"></path><path d="M536.83,413.89l.76,8.4h-4l-3.52-.06a25.24,25.24,0,0,1-4,.11.45.45,0,0,1-.18,0,3.62,3.62,0,0,1-.62-.15h0c-.36-.13-.73-.36-.67-.76.17-1.2.89-1.3.89-1.3l.36,0,0-.11c-.55,0-1,0-1.25,0s-.18,0-.19,0-1.4-.17-1.3-.91c.18-1.21.89-1.3.89-1.3l1.16-.08c-.56,0-1,0-1.29,0a.45.45,0,0,1-.18,0s-1.41-.17-1.3-.91c.17-1.21.89-1.31.89-1.31l1-.06c-.46,0-.84,0-1,0s-.18,0-.19,0-1.4-.17-1.29-.91c.17-1.21.89-1.3.89-1.3s2.21-.16,3.73-.23c0,0,1.73-1.55,2.41-1.48,1,.11,6.91,2.29,6.91,2.29Z" style="fill: rgb(255, 190, 157); transform-origin: 529.692px 416.951px;" id="elpi0e2pwj0yd" class="animable"></path><path d="M529.38,419.83a8.62,8.62,0,0,1-2,.18,7.38,7.38,0,0,1-1.95-.06,8.29,8.29,0,0,1,2-.19A7.62,7.62,0,0,1,529.38,419.83Z" style="fill: rgb(235, 153, 110); transform-origin: 527.405px 419.888px;" id="el6z4vfn3mt1j" class="animable"></path><path d="M529.39,417.44a30.28,30.28,0,0,1-5.6.2,15.81,15.81,0,0,1,2.79-.23A16,16,0,0,1,529.39,417.44Z" style="fill: rgb(235, 153, 110); transform-origin: 526.59px 417.526px;" id="elhni2ixp03ij" class="animable"></path><g id="elelrby8zodpg"><g style="opacity: 0.78; transform-origin: 526.39px 415.086px;" class="animable"><path d="M529.19,415a30.28,30.28,0,0,1-5.6.2,15.81,15.81,0,0,1,2.79-.23A16,16,0,0,1,529.19,415Z" style="fill: rgb(235, 153, 110); transform-origin: 526.39px 415.086px;" id="eld42ti7kt63l" class="animable"></path></g></g><path d="M525.72,412.74a4,4,0,0,0,.89.07l2.15.07,2.15.08a3.71,3.71,0,0,0,.89,0,3.55,3.55,0,0,0-.88-.14c-.55-.05-1.31-.1-2.15-.13s-1.61,0-2.16,0A3.34,3.34,0,0,0,525.72,412.74Z" style="fill: rgb(235, 153, 110); transform-origin: 528.76px 412.832px;" id="elro52hhw4lsr" class="animable"></path><path d="M536.72,412.64h.14l.4,0,1.55-.09,5.7-.35c4.82-.29,11.47-.71,18.81-1.08l3.94-.18h.09v-.1c.06-1.6.21-3.16.32-4.65s.25-2.93.37-4.29c.24-2.72.45-5.15.63-7.18s.33-3.64.42-4.77c0-.55.08-1,.11-1.29l0-.33c0-.08,0-.11,0-.11a.66.66,0,0,0,0,.11c0,.08,0,.19,0,.33,0,.31-.08.73-.14,1.28-.11,1.13-.28,2.76-.48,4.77s-.42,4.45-.68,7.17c-.12,1.36-.25,2.8-.38,4.29s-.27,3.05-.34,4.67l.1-.1-3.94.17c-7.35.37-14,.82-18.81,1.15l-5.69.41-1.55.13-.4,0Z" style="fill: rgb(38, 50, 56); transform-origin: 552.96px 400.43px;" id="elolwke8anqtf" class="animable"></path></g><defs>     <filter id="active" height="200%">         <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>                <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>        <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>        <feMerge>            <feMergeNode in="OUTLINE"></feMergeNode>            <feMergeNode in="SourceGraphic"></feMergeNode>        </feMerge>    </filter>    <filter id="hover" height="200%">        <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>                <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>        <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>        <feMerge>            <feMergeNode in="OUTLINE"></feMergeNode>            <feMergeNode in="SourceGraphic"></feMergeNode>        </feMerge>            <feColorMatrix type="matrix" values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 "></feColorMatrix>    </filter></defs></svg>
          </p>
        </div>

        <div class="about">
          <h1>Health Services</h1>
          <p>The portal allows you to view your medical records and schedule appointments to our clinic through the internet.</p>
          <a class="learn-more" href="#about">
            <span class="circle" aria-hidden="true">
              <span class="icon arrow"></span>
            </span>
              <span class="button-text">Learn More</span>
          </a>
        </div>
            
      </section>

<!--about--> 
      <section id="about">
        <div class="office">
          <h2>ABOUT THE OFFICE</h2>
          <p>"The clinic is a health facility where patients can seek primary health and comfort for any sickness or disease. The health staff are government servants. We serve the patients in all forms of illness whenever feasible with our facilities. We are obliged to refer severe cases to higher facilities like hospital and laboratories for further treatment and management. Everyone is encourage to visit the clinic for any health problem to avoid further complication. We believe that prevention is better than cure."</p>
        </div>

        <div class="organization">
          <h2>ORGANIZATIONAL STRUCTURE</h2>
          <div class="frame">
            <img id="myImg" src="image/clinic-org.png" alt="Medical-Dental Organizational Chart of Tagum-Mabini Campus" style="width: 100%; padding-top: -500px;">
          </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="white" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,122.7C384,117,480,75,576,58.7C672,43,768,53,864,85.3C960,117,1056,171,1152,213.3C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>


        <!-- The Modal -->
          <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
            </div>

              <script>
              // Get the modal
              var modal = document.getElementById("myModal");

              // Get the image and insert it inside the modal - use its "alt" text as a caption
              var img = document.getElementById("myImg");
              var modalImg = document.getElementById("img01");
              var captionText = document.getElementById("caption");
              img.onclick = function(){
              modal.style.display = "block";
              modalImg.src = this.src;
              captionText.innerHTML = this.alt;
              }

              // Get the <span> element that closes the modal
              var span = document.getElementsByClassName("close")[0];

              // When the user clicks on <span> (x), close the modal
              span.onclick = function() { 
              modal.style.display = "none";
              }
              </script>
      </section>

<!--mandate-->

      <section id="mandate">
        <div class="padding">
        <h2 style="text-align: center;">MANDATE</h2>
        <div class="vision">
            <h3><i class="far fa-eye"></i> VISION</h3>
            The University Health Service envisions itself to be the leader in health maintenance in providing basic health care to its all constituents by meeting the needs of each and every patients not only in the primary treatment of ailments and injuries but also in the prevention of illness through easy access of health care and education for each one in the realm of good health practices and behavior.
        </div>
        <div class="mission">
            <h3><i class="fas fa-rocket"></i> MISSION</h3>
            To be the provider of holistic health care for all University constituents by:<br><br>
            <table>
            <tr>
              <td style="vertical-align: text-top;"><i class="fas fa-check"></i></td>
              <td style="padding-left: 10px;">Providing basic health care services in both medical and dental fields in cases if immediate and intermediate needs of the clients.</td>
            </tr>
            <tr>
              <td style="vertical-align: text-top;"><i class="fas fa-check"></i></td>
              <td style="padding-left: 10px;">Promoting fitness and well being through health education on diseases and illnesses and health maintenance values aimed towards prevention rather than treatment.
              </td>
            </tr>
            </table>
        </div>
        </div>
        <div class="wave">
        <div class="padding">
        <div class="goal">
            <h3><i class="fas fa-bullseye"></i> GOALS</h3>
            <table>
            <tr>
              <td style="vertical-align: text-top;"><i class="fas fa-check"></i></td>
              <td style="padding-left: 10px;">To build a healthy community and create an environment conducive for learning and developing intellectual and technical skills to be able to meet high standards of excellence in education.</td>
            </tr>
            <tr>
              <td style="vertical-align: text-top;"><i class="fas fa-check"></i></td>
              <td style="padding-left: 10px;">To build a healthy community and create an environment conducive for learning and developing intellectual and technical skills to be able to meet high standards of excellence in education.
              </td>
            </tr>
            <tr>
              <td style="vertical-align: text-top;"><i class="fas fa-check"></i></td>
              <td style="padding-left: 10px;">To train and educate clients on prevention of illnesses and achieve and good health through health education and training seminars on updates of health maintenance and environmental sanitation.
              </td>
            </tr>
            </table>
        </div>
        </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e7e5e5" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,96C384,75,480,53,576,64C672,75,768,117,864,128C960,139,1056,117,1152,90.7C1248,64,1344,32,1392,16L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>


        <script>
        function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

          if (dots.style.display === "none") {
          dots.style.display = "inline";
          btnText.innerHTML = "Read more"; 
          moreText.style.display = "none";
          } else {
          dots.style.display = "none";
          btnText.innerHTML = "Read less"; 
          moreText.style.display = "inline";
          }
        }
        </script>
      </section>

      <!--services-->
      <section id="services">
        <div class="services" id="service">
          <h2>SERVICES OFFERED</h2>
          <div class="medical">
            <h3><i class="far fa-eye"></i> VISION</h3>
            Free consultation and treatment<br>
            Referral to hospitals for severe cases<br>
            Suturing of minor cuts and wound<br>
            Treatment of emergency cases whenever necessary
          </div>

          <div class="dental">
            <h3><i class="fas fa-tooth"></i> DENTAL</h3>
            Dental Consultation and Treatment<br>
            Extraction<br>
            Dental Filling<br>
          </div>
        </div>
      </section>

      <section id="dash">
        <div class="cal">
        <div class="column" style="padding-left: 30px; padding-right: 30px;">
              <div class="col-lg-24"  id="calendar">
              </div>
        </div>
        </div> 

        <div class="news">
          <div class="column">
      <div>
        <div class="info" style="color: gray; padding-left: 30px;"><h5 class="mb-2"><i class="far fa-calendar-check icon-10x"></i> Events</h5>
        </div>  
      </div>
      
      <div class="tile" style="box-shadow: none; padding: 0px; padding-left: 30px; padding-right: 30px; ">
        <div id="external-events">
          <?php
          $limit=5;
          $sql="Select appointment_timefrom, consultation_type.consultation_type,consultation_duration,date_format(consultation.appointment_date,'%M %d, %Y')as appointment_date,CONCAT(student.first_name,' ', student.last_name) as name from consultation join student on consultation.patient_id=student.Student_id join consultation_type on consultation.consultation_type=consultation_type.type_id where consultation.status='Approved' AND consultation.patient_id='$id' order by appointment_date,appointment_timefrom,consultation_duration ASC LIMIT $limit";
        
          $res = $db->query($sql);
          $cnt=1;
      
          while($row = $res->fetch_assoc()) {
            $appointment_start= new DateTime($row['appointment_timefrom']);
            $appointment_end= new DateTime($row['consultation_duration']);
          ?>
          
            <div class="fc-event" style="background: linear-gradient(to right, rgb(255, 65, 108), rgb(255, 75, 43));"><h6>  <?php echo htmlentities($row['consultation_type']);?>-<?php echo htmlentities($row['name']);?><br></h6> Date: <?php echo htmlentities($row['appointment_date']);?><br> Time: <?php echo $appointment_start->format('g:i a');?> - <?php echo $appointment_end->format('g:i a');?></div>
          
            <?php
          }
            
            if ($res->num_rows == 0) {
            ?>
        
              <div class="fc-event" style="background: linear-gradient(to right, rgb(255, 65, 108), rgb(255, 75, 43)); border: none;"><h6> No Upcoming Events! </h6></div>
              <?php 
            }
              ?>          
        </div>
      </div>
   
  </div>
        </div>
      </section>

      </div>



      
      <script src="jsc/jquery-3.3.1.min.js"></script>
      <script src="jsc/popper.min.js"></script>
      <script src="jsc/bootstrap.min.js"></script>
      <script src="jsc/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="jsc/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="jsc/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="jsc/plugins/sweetalert.min.js"></script>
      <script type="text/javascript">
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="jsc/plugins/jquery.vmap.min.js"></script>
    <script type="text/javascript" src="jsc/plugins/jquery.vmap.world.js"></script>
    <script type="text/javascript" src="jsc/plugins/jquery.vmap.sampledata.js"></script>
    <script type="text/javascript" src="jsc/plugins/moment.min.js"></script>
    <script type="text/javascript" src="jsc/plugins/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="jsc/plugins/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          /*$('#external-events .fc-event').each(function() {
      
          // store data so the calendar knows to render an event upon drop
          $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true // maintain when user navigates (see docs on the renderEvent method)
          });
      
          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
          });
      
        });*/
        var calendar = $('#calendar').fullCalendar({
          editable: true,
          header: {
            left: 'prev,next today',
            center: 'title', 
            right: 'month,agendaWeek,agendaDay'
          },
          events:'calendarstud.php',  
          selectable:true,
          /*droppable: true, // this allows things to be dropped onto the calendar
          drop: function() {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }
          }*/
        });
      
      
      });
    </script>
    <script type="text/javascript">
      function onload(){

      }
       <?php  
          if ($count!=0) { ?>
            <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>
          <?php
        }
          ?>

    </script>
    

      <script type="text/javascript">
           function openForm() {
          document.body.classList.add("myForm");

      }

        function closeForm() {
          document.body.classList.remove("myForm");

      }

      </script>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
      

     <div id="myModal" class="modal fade" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notifications</h5>
            </div>
            <div class="modal-body">
                <p>You have <?php echo $count;  ?> unread notifications</p><br>
                
                   
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>
    </body>
  </html>