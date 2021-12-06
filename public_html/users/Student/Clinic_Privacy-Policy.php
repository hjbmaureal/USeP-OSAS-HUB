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
      <link rel="stylesheet" type="text/css" href="cssc/privacy.css">
      <link rel="stylesheet" type="text/css" href="cssc/upstyle.css">
      <link rel="stylesheet" type="text/css" href="../../css/custom.css">

      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="cssc/all.min.css">
      <link rel="stylesheet" type="text/css" href="cssc/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>


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
              <li><a class="treeview-item" href="Clinic_Home.php">Home</a></li>
              <li><a class="treeview-item active" href="Clinic_Privacy-Policy.php">Consultation</a></li>
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
            if($result = mysqli_query($conn, "SELECT * FROM list_of_semester")){
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


      <div class="privacy">

      <!--home-->     
      <section id="privacy">       
        <div class="story">
          <svg class="animated" id="freepik_stories-secure-data" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><style>svg#freepik_stories-secure-data:not(.animated) .animable {opacity: 0;}svg#freepik_stories-secure-data.animated #freepik--background-simple--inject-32 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideDown;animation-delay: 0s;}svg#freepik_stories-secure-data.animated #freepik--Table--inject-32 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;}svg#freepik_stories-secure-data.animated #freepik--Character--inject-32 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}svg#freepik_stories-secure-data.animated #freepik--Shield--inject-32 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideDown;animation-delay: 0s;}svg#freepik_stories-secure-data.animated #freepik--Device--inject-32 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideDown;animation-delay: 0s;}            @keyframes slideDown {                0% {                    opacity: 0;                    transform: translateY(-30px);                }                100% {                    opacity: 1;                    transform: translateY(0);                }            }                    @keyframes slideLeft {                0% {                    opacity: 0;                    transform: translateX(-30px);                }                100% {                    opacity: 1;                    transform: translateX(0);                }            }                    @keyframes zoomIn {                0% {                    opacity: 0;                    transform: scale(0.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }        </style><g id="freepik--background-simple--inject-32" style="opacity: 0; transform-origin: 257.211px 238.897px;" class="animable"><path d="M127.6,317.4c-19.08-4.69-34.23-21.45-38.45-40.64s2-40,14.89-54.84,32-23.71,51.49-25.72c25.2-2.58,52.47,5.29,74.94-6.38,16.25-8.44,26-25.22,38.14-39,16.34-18.55,38.55-32.46,63-36.28s50.9,3.22,68.39,20.69c15.09,15.07,23.22,36.23,25.62,57.41,9.2,81.5-49.63,141.56-81.67,159.44-23.59,13.16-59.18,12.76-86.17,11.73-30.59-1.17-61.42-4.62-90.25-14.91s-55.72-27.88-73.09-53.08" style="fill: rgb(235, 235, 235); transform-origin: 257.211px 238.897px;" id="elk8qvb5lfhz" class="animable"></path></g><g id="freepik--Table--inject-32" class="animable animator-active" style="transform-origin: 249.685px 410.995px;"><path d="M463.3,411c0,.15-95.65.27-213.6.27S36.07,411.17,36.07,411s95.63-.28,213.63-.28S463.3,410.87,463.3,411Z" style="fill: rgb(38, 50, 56); transform-origin: 249.685px 410.995px;" id="elw4fueitbm8" class="animable"></path></g><g id="freepik--Character--inject-32" class="animable" style="transform-origin: 208.217px 286.835px;"><path d="M141.81,347.49l-30.19-30.33,15.18-27.88c15.18-19.44,47.32-18.19,47.32-18.19A184.26,184.26,0,0,1,221.51,274c25.53,5,23.47,21.86,23.47,21.86l3.42,62.57,3.67,50.95-94.15,1.9-16.11-63.75" style="fill: #C53F3F; transform-origin: 181.845px 340.973px;" id="el4tluto34db7" class="animable"></path><path d="M192.53,408.3l-84.33,1A27.41,27.41,0,0,1,83.09,370.2l36.06-66.87L152,325.53,129.59,372l68.26,1.22Z" style="fill: #C53F3F; transform-origin: 139.161px 356.316px;" id="eltijg5wbjxmo" class="animable"></path><path d="M242,285.66l67.67,104.48-39.48,2.58s-23.58-37.15-23.05-36.39C248.08,357.73,242,285.66,242,285.66Z" style="fill: #C53F3F; transform-origin: 275.835px 339.19px;" id="el8g19kugxpzl" class="animable"></path><path d="M150.3,331.54a1.81,1.81,0,0,1,.09-.54c.1-.4.21-.9.36-1.52.31-1.31.77-3.21,1.24-5.57s1-5.2,1.33-8.36a43.77,43.77,0,0,0,0-10.31,27.08,27.08,0,0,0-3.49-9.61,38.89,38.89,0,0,0-5-6.77,47.61,47.61,0,0,0-4.1-4,19.45,19.45,0,0,1-1.58-1.38,2.68,2.68,0,0,1,.46.29c.28.21.73.5,1.25.93a40.2,40.2,0,0,1,4.24,3.87,37.55,37.55,0,0,1,5.16,6.77,27,27,0,0,1,3.6,9.79,43.07,43.07,0,0,1-.08,10.43,83.71,83.71,0,0,1-1.44,8.38c-.52,2.37-1,4.26-1.41,5.56-.18.65-.34,1.15-.45,1.49A3,3,0,0,1,150.3,331.54Z" style="fill: rgb(38, 50, 56); transform-origin: 146.644px 307.51px;" id="elhzlb48dcqg" class="animable"></path><path d="M147.58,335.14a8.41,8.41,0,0,1-.58,1.51c-.4,1-1,2.34-1.77,4-1.53,3.39-3.7,8.05-6.2,13.15s-4.86,9.67-6.61,13c-.88,1.64-1.6,3-2.11,3.87a10.45,10.45,0,0,1-.84,1.39,10,10,0,0,1,.66-1.48c.51-1,1.17-2.34,2-3.95l6.47-13c2.45-5.07,4.68-9.65,6.34-13.08.78-1.61,1.42-2.95,1.92-4A9.45,9.45,0,0,1,147.58,335.14Z" style="fill: rgb(38, 50, 56); transform-origin: 138.525px 353.6px;" id="elo58dypfimz" class="animable"></path><path d="M192.53,408.3s0-.06,0-.17,0-.31,0-.52c.05-.48.12-1.15.2-2,.2-1.78.48-4.31.83-7.5.74-6.47,1.8-15.57,3-26.3l.24.26-24.91,0L128.38,372l-13.2-.08-3.59-.05-.94,0-.32,0a1.34,1.34,0,0,1,.32,0l.94,0,3.59-.05,13.2-.08,43.58-.07,24.91,0h.27l0,.26c-1.32,10.72-2.43,19.82-3.23,26.28-.4,3.18-.73,5.71-1,7.49q-.16,1.26-.27,2l-.08.51C192.55,408.24,192.54,408.3,192.53,408.3Z" style="fill: rgb(38, 50, 56); transform-origin: 153.735px 389.985px;" id="el1okbax1nlps" class="animable"></path><path d="M130.18,372.74a21.3,21.3,0,0,1-1.68-2.11,32.82,32.82,0,0,0-9.82-8.29,25.6,25.6,0,0,1-2.36-1.3,9.33,9.33,0,0,1,2.53,1,27.12,27.12,0,0,1,9.94,8.39A9.78,9.78,0,0,1,130.18,372.74Z" style="fill: rgb(38, 50, 56); transform-origin: 123.25px 366.89px;" id="el4iz7xhtz0s2" class="animable"></path><path d="M249.8,379.36a4.81,4.81,0,0,1-.14-.87c-.07-.61-.16-1.44-.28-2.49-.23-2.16-.54-5.29-.87-9.16-.69-7.75-1.48-18.47-2.18-30.31s-1.19-22.58-1.47-30.35c-.14-3.89-.24-7-.28-9.21,0-1.05,0-1.88-.05-2.5a8.3,8.3,0,0,1,0-.87,5,5,0,0,1,.09.87c0,.61.08,1.45.14,2.5.11,2.22.26,5.35.45,9.19.37,7.77.92,18.49,1.62,30.34s1.44,22.55,2,30.31c.3,3.83.54,7,.71,9.18.08,1,.14,1.88.19,2.49A4.87,4.87,0,0,1,249.8,379.36Z" style="fill: rgb(38, 50, 56); transform-origin: 247.159px 336.48px;" id="ellggnvct6uqb" class="animable"></path><path d="M174.52,322.51a9.73,9.73,0,0,1,.11-1.37c.12-.95.27-2.22.46-3.78.44-3.3,1-7.82,1.74-13.06l.38.24-6.47,4.53-6.58,4.58-.47.33.08-.57c.8-5.19,1.48-9.67,2-13,.26-1.53.46-2.79.62-3.73a7.65,7.65,0,0,1,.28-1.33,7.64,7.64,0,0,1-.12,1.36c-.12.94-.27,2.2-.47,3.75-.45,3.28-1.08,7.77-1.8,13l-.38-.24,6.57-4.6,6.48-4.51.47-.33-.08.57c-.77,5.22-1.44,9.74-1.92,13-.25,1.55-.45,2.82-.6,3.76A8,8,0,0,1,174.52,322.51Z" style="fill: rgb(224, 224, 224); transform-origin: 170.555px 308.93px;" id="elhck9p08ptre" class="animable"></path><path d="M212.16,326.56a7.9,7.9,0,0,1-1-.95c-.65-.7-1.53-1.63-2.61-2.77l-8.93-9.68.43-.15c-.21,2.45-.43,5.11-.66,7.87s-.47,5.5-.68,8l-.05.58-.38-.43-8.69-9.8-2.48-2.86a6.7,6.7,0,0,1-.84-1.07,8.79,8.79,0,0,1,1,1l2.58,2.76,8.82,9.67-.43.15c.21-2.49.43-5.19.67-8s.46-5.42.67-7.87l.05-.57.38.42,8.8,9.81,2.51,2.87A8.44,8.44,0,0,1,212.16,326.56Z" style="fill: rgb(224, 224, 224); transform-origin: 199.215px 320.95px;" id="elicwtqzhqgw" class="animable"></path><path d="M231.1,325.22a6.94,6.94,0,0,1-.68,1.2l-2,3.22-7.14,11.08-.24-.38L228.8,339l7.9-1.33.57-.1L237,338l-7.3,10.86L227.5,352a8.66,8.66,0,0,1-.82,1.09,9.27,9.27,0,0,1,.68-1.18l2-3.2,7.15-11,.25.38-7.9,1.37-7.79,1.32-.57.09.32-.47,7.29-11,2.14-3.15A11.13,11.13,0,0,1,231.1,325.22Z" style="fill: rgb(224, 224, 224); transform-origin: 228.885px 339.155px;" id="elagfzzzr74fo" class="animable"></path><path d="M205.91,344.6a7.15,7.15,0,0,1-.68,1.19l-2,3.23-7.13,11.07-.25-.38,7.78-1.34,7.91-1.34.57-.09-.33.47-7.3,10.87-2.15,3.12a7.2,7.2,0,0,1-.82,1.08,10.2,10.2,0,0,1,.68-1.18c.52-.8,1.2-1.87,2-3.19l7.15-11,.25.38-7.9,1.37-7.79,1.31-.57.1.32-.48,7.29-11c.88-1.3,1.6-2.36,2.15-3.15A9.14,9.14,0,0,1,205.91,344.6Z" style="fill: rgb(224, 224, 224); transform-origin: 203.72px 358.54px;" id="el9378sajojsn" class="animable"></path><path d="M260.34,325a9.7,9.7,0,0,1-.68,1.19l-2,3.23-7.13,11.07-.25-.38,7.78-1.34,7.91-1.34.57-.09-.32.47-7.31,10.87c-.88,1.28-1.6,2.33-2.15,3.11a6.91,6.91,0,0,1-.82,1.09,9.63,9.63,0,0,1,.69-1.18l2-3.19,7.15-11,.25.38-7.9,1.36-7.79,1.32-.56.1.31-.48,7.29-11,2.15-3.15A6.76,6.76,0,0,1,260.34,325Z" style="fill: rgb(224, 224, 224); transform-origin: 258.16px 338.94px;" id="elmrawxkgxmsd" class="animable"></path><path d="M291.74,375.34a8.17,8.17,0,0,1-1-.9L288,371.8l-9.41-9.22.42-.17c-.08,2.46-.16,5.12-.25,7.89s-.2,5.52-.29,8l0,.58-.41-.41-9.16-9.35-2.62-2.73a8.67,8.67,0,0,1-.9-1,8.67,8.67,0,0,1,1,.9l2.72,2.63,9.3,9.22-.43.17c.08-2.5.17-5.2.26-8s.2-5.43.29-7.89l0-.57.4.4,9.27,9.36,2.65,2.74A8,8,0,0,1,291.74,375.34Z" style="fill: rgb(224, 224, 224); transform-origin: 278.56px 370.365px;" id="elh008woiobo6" class="animable"></path><path d="M132.89,308.94a8.88,8.88,0,0,1-.68,1.19l-2,3.23-7.13,11.08-.25-.38,7.78-1.35,7.91-1.33.57-.1-.32.48-7.31,10.86-2.14,3.12a8.16,8.16,0,0,1-.82,1.08,7.65,7.65,0,0,1,.68-1.17l2-3.2c1.81-2.77,4.29-6.57,7.15-11l.25.38-7.9,1.37-7.79,1.32-.56.09.31-.47c2.93-4.4,5.45-8.2,7.29-11l2.15-3.15A8.41,8.41,0,0,1,132.89,308.94Z" style="fill: rgb(224, 224, 224); transform-origin: 130.71px 322.88px;" id="el81po21kz5h" class="animable"></path><path d="M93.35,383.72a7.34,7.34,0,0,1,.92,1l2.44,2.93L105,397.88l-.44.12c.36-2.43.74-5.07,1.15-7.82s.81-5.46,1.18-7.93l.08-.57.36.46,8.06,10.32,2.29,3a8,8,0,0,1,.78,1.11,8.85,8.85,0,0,1-.91-1l-2.4-2.92L107,382.44l.44-.11c-.36,2.47-.75,5.15-1.16,7.93s-.8,5.38-1.17,7.81l-.08.57-.36-.45-8.16-10.34-2.33-3A10.41,10.41,0,0,1,93.35,383.72Z" style="fill: rgb(224, 224, 224); transform-origin: 105.905px 390.16px;" id="els0suwda8ti" class="animable"></path><path d="M183.65,335.3a8.63,8.63,0,0,1-1.36.18l-3.8.33-13.14,1,.16-.42,5.76,5.4,5.83,5.5.42.4-.58,0-13.07.72-3.78.16a7.87,7.87,0,0,1-1.36,0,9.37,9.37,0,0,1,1.35-.17l3.77-.3,13.06-.9-.15.42-5.85-5.48-5.74-5.42-.42-.4.57,0,13.15-.79,3.8-.19A9.14,9.14,0,0,1,183.65,335.3Z" style="fill: rgb(224, 224, 224); transform-origin: 171.19px 341.945px;" id="elrucm0dhgxf" class="animable"></path><path d="M161.49,385.7a11.1,11.1,0,0,1,.94,1l2.49,2.88,8.51,10.06-.44.12c.31-2.44.65-5.08,1-7.83s.71-5.48,1-7.95l.08-.58.36.45L183.71,394l2.35,3a10,10,0,0,1,.8,1.1,8.2,8.2,0,0,1-.93-1l-2.46-2.87-8.4-10,.43-.13c-.31,2.48-.65,5.16-1,7.95s-.7,5.4-1,7.84l-.08.57-.36-.44-8.37-10.18-2.38-3A7.12,7.12,0,0,1,161.49,385.7Z" style="fill: rgb(224, 224, 224); transform-origin: 174.175px 391.93px;" id="elkiknic0nxp" class="animable"></path><path d="M121.88,348.74a8.13,8.13,0,0,1-1.36.18l-3.79.32-13.14,1,.15-.43,5.77,5.41,5.83,5.5.42.4-.58,0-13.07.72-3.78.16A7.87,7.87,0,0,1,97,362a7.84,7.84,0,0,1,1.35-.17l3.77-.3,13.06-.91-.15.43-5.85-5.48-5.75-5.42-.41-.4.57,0,13.15-.8,3.8-.18A8.93,8.93,0,0,1,121.88,348.74Z" style="fill: rgb(224, 224, 224); transform-origin: 109.44px 355.378px;" id="elb8jdch86ij" class="animable"></path><path d="M155.91,384.57a8.1,8.1,0,0,1-1.36.17l-3.8.33-13.14,1,.16-.43,5.76,5.41,5.83,5.5.42.4-.57,0-13.08.71-3.78.17a7.87,7.87,0,0,1-1.36,0,7.84,7.84,0,0,1,1.35-.17l3.77-.3,13.06-.91-.15.43-5.85-5.48L137.43,386l-.42-.39.57,0,13.15-.8,3.81-.18A7.57,7.57,0,0,1,155.91,384.57Z" style="fill: rgb(224, 224, 224); transform-origin: 143.45px 391.211px;" id="el84pd8ho08lh" class="animable"></path><path d="M232.72,293.41a8.63,8.63,0,0,1-1.36.18l-3.8.32-13.13,1,.15-.42,5.76,5.4,5.83,5.5.42.4-.57,0-13.08.72-3.78.16a7.87,7.87,0,0,1-1.36,0,7.84,7.84,0,0,1,1.35-.17l3.77-.3,13.07-.9-.16.42L220,300.25l-5.74-5.42-.42-.4.57,0,13.15-.8,3.81-.18A9,9,0,0,1,232.72,293.41Z" style="fill: rgb(224, 224, 224); transform-origin: 220.26px 300.05px;" id="el9w9vtbgjkct" class="animable"></path><path d="M195.36,384.57s16.82-4.85,22.39-6.27c2.17-.55,11.46,4.35,17.88,8.43,0,0,8.84,5.24,8.13,6.85-.79,1.78-4,1.42-9.25-1,0,0,1.82,5.27-1.75,5.15,0,0,1.77,5.7-1.57,6.29s-4.12-6.68-7.06-7.07-9-.79-9-.79-5.07,8.4-9,9-13-.47-13-.47Z" style="fill: rgb(255, 190, 157); transform-origin: 218.465px 391.8px;" id="elsr6mwcucjy" class="animable"></path><path d="M224.07,385.73a28.61,28.61,0,0,1,4.7,2.65,27.92,27.92,0,0,1,4.42,3.1,55,55,0,0,1-9.12-5.75Z" style="fill: rgb(235, 153, 110); transform-origin: 228.63px 388.605px;" id="elys8disd50ks" class="animable"></path><path d="M223.08,389a35.72,35.72,0,0,1,5.58,2.29A35.85,35.85,0,0,1,234,394a35,35,0,0,1-5.58-2.28A34.26,34.26,0,0,1,223.08,389Z" style="fill: rgb(235, 153, 110); transform-origin: 228.54px 391.5px;" id="elnvg1shb1o2m" class="animable"></path><path d="M224.88,396.81a28,28,0,0,1,7.52,1,28.18,28.18,0,0,1-7.52-1Z" style="fill: rgb(235, 153, 110); transform-origin: 228.64px 397.31px;" id="elc79aa5w0w1b" class="animable"></path><path d="M173.47,211a3.45,3.45,0,0,1-4.87,4.08c-2.28-1.15-2.57-4.3-2.12-6.81s1.3-5.2.25-7.53c-.81-1.78-2.56-2.91-3.92-4.31a11.06,11.06,0,0,1-3.07-9.36,9.29,9.29,0,0,1,6.38-7.3c3.35-.93,7.48.1,10-2.33,1.81-1.76,1.92-4.63,3.32-6.73,2.17-3.26,6.76-3.78,10.64-3.25s7.82,1.78,11.62.83c3.17-.79,5.77-3,8.75-4.36a17.13,17.13,0,0,1,22.3,23.52,11,11,0,0,1-5.31,5.25" style="fill: rgb(38, 50, 56); transform-origin: 197.163px 188.919px;" id="elt7l7kq9rt5d" class="animable"></path><path d="M192.77,293.61h0A19.27,19.27,0,0,0,212,274.07l-.25-18.38s15.44-1.55,16.46-16.85.29-50.61.29-50.61h0A53.32,53.32,0,0,0,174.68,192l-2.36,1.63,1.15,80.94A19.27,19.27,0,0,0,192.77,293.61Z" style="fill: rgb(255, 190, 157); transform-origin: 200.536px 238.143px;" id="eluphps51ebgo" class="animable"></path><path d="M224.46,216a2.29,2.29,0,0,1,0-4.55.77.77,0,0,1,.37,0,2.29,2.29,0,0,1,0,4.55A1.15,1.15,0,0,1,224.46,216Z" style="fill: rgb(38, 50, 56); transform-origin: 224.645px 213.721px;" id="elnviuc4h7mma" class="animable"></path><path d="M227.46,211.06c-.25.26-1.69-1-3.8-1.11s-3.7.88-3.91.6.15-.59.85-1.06a5.19,5.19,0,0,1,6.16.41C227.39,210.46,227.59,211,227.46,211.06Z" style="fill: rgb(38, 50, 56); transform-origin: 223.594px 209.882px;" id="elpr57dxvmj6" class="animable"></path><path d="M203.07,211.58a2.23,2.23,0,1,1-3.1.56A2.23,2.23,0,0,1,203.07,211.58Z" style="fill: rgb(38, 50, 56); transform-origin: 201.801px 213.413px;" id="elkpcflpv3c1s" class="animable"></path><path d="M204.46,211.67c-.26.26-1.7-1-3.8-1.11s-3.7.88-3.92.6c-.11-.13.16-.59.85-1.06a5.19,5.19,0,0,1,6.16.41C204.38,211.07,204.58,211.56,204.46,211.67Z" style="fill: rgb(38, 50, 56); transform-origin: 200.605px 210.492px;" id="elfpiqp2uc5fd" class="animable"></path><path d="M212,229.53c0-.16,1.31-.36,3.45-.54.55,0,1-.13,1.05-.42a3.12,3.12,0,0,0-.31-1.6c-.47-1.43-.94-2.87-1.44-4.38-2-6.23-3.31-11.36-3-11.46s2.17,4.87,4.14,11.1c.46,1.52.91,3,1.34,4.4a3.54,3.54,0,0,1,.18,2.31,1.43,1.43,0,0,1-1,.83,3.27,3.27,0,0,1-.95.07C213.3,229.8,212,229.7,212,229.53Z" style="fill: rgb(38, 50, 56); transform-origin: 214.615px 220.489px;" id="elatq0t1m9the" class="animable"></path><path d="M205,231.49a39.5,39.5,0,0,0,10.18,3.57,5.84,5.84,0,0,1-7,1.94C203.67,235.07,205,231.49,205,231.49Z" style="fill: rgb(255, 255, 255); transform-origin: 209.998px 234.476px;" id="elb3jnih73bta" class="animable"></path><path d="M211.81,255.47a35.69,35.69,0,0,1-19.66-6.76s4.12,11.27,19.47,10.73Z" style="fill: rgb(235, 153, 110); transform-origin: 201.98px 254.084px;" id="el40s31wtnean" class="animable"></path><path d="M228.63,192.1s-9.25,4.7-21.5-1.12c-8-3.82-17.37-5.59-19.39-3.94s-2.29,9.85-10.13,12.4c0,0,.85,15.66-5.41,15.22s-2.82-24.77-2.82-24.77l15.13-7.76,16.61-3.47,15.75,1.91,12.22,3.09Z" style="fill: rgb(38, 50, 56); transform-origin: 198.763px 196.665px;" id="eldve30g4xzhd" class="animable"></path><path d="M173.34,209.63c-.25-.13-10.35-3.69-10.58,6.8s10.34,8.56,10.36,8.26S173.34,209.63,173.34,209.63Z" style="fill: rgb(255, 190, 157); transform-origin: 168.048px 216.983px;" id="elnhvclpl77ki" class="animable"></path><path d="M170,220.64s-.19.13-.5.26a1.82,1.82,0,0,1-1.37,0c-1.1-.43-2-2.21-2-4.1a6.22,6.22,0,0,1,.57-2.61,2.13,2.13,0,0,1,1.41-1.37,1,1,0,0,1,1.07.53c.13.29.06.5.11.52s.23-.17.16-.6a1.2,1.2,0,0,0-.4-.67,1.39,1.39,0,0,0-1-.29,2.57,2.57,0,0,0-1.95,1.58,6.35,6.35,0,0,0-.7,2.91c0,2.11,1.06,4.12,2.56,4.59a2,2,0,0,0,1.68-.24C170,220.9,170,220.66,170,220.64Z" style="fill: rgb(235, 153, 110); transform-origin: 167.7px 216.89px;" id="el5ynwd8gq0ao" class="animable"></path><path d="M168,176.8a5.77,5.77,0,0,1,6.48,2.42,16.26,16.26,0,0,0-3-1.8A17,17,0,0,0,168,176.8Z" style="fill: rgb(38, 50, 56); transform-origin: 171.24px 177.893px;" id="elp405ux909wq" class="animable"></path><path d="M174.31,170.52c.19,0-.1,2.21.26,4.83a20.71,20.71,0,0,0,1.47,4.57s-.44-.37-.88-1.15a9.82,9.82,0,0,1-1.1-3.34A10.91,10.91,0,0,1,174.31,170.52Z" style="fill: rgb(38, 50, 56); transform-origin: 174.965px 175.22px;" id="elhzpwyygrs4" class="animable"></path><path d="M217.4,206c-.06-.12.39-.49,1.24-.83a9.46,9.46,0,0,1,7,.07c.84.36,1.29.73,1.23.85-.13.28-2.15-.51-4.74-.51S217.52,206.31,217.4,206Z" style="fill: rgb(38, 50, 56); transform-origin: 222.135px 205.342px;" id="ell7etz0jh1b" class="animable"></path><path d="M194,203.82c-.06-.12.39-.48,1.24-.83a9.38,9.38,0,0,1,3.51-.63,9.14,9.14,0,0,1,3.51.7c.84.36,1.28.73,1.23.86s-2.15-.51-4.75-.52S194.14,204.1,194,203.82Z" style="fill: rgb(38, 50, 56); transform-origin: 198.744px 203.148px;" id="elt7zsrdn7emr" class="animable"></path><path d="M215.59,207.68a2.87,2.87,0,0,1,0,.62c0,.44,0,1,.05,1.69s0,1.62.06,2.62a9.67,9.67,0,0,0,.5,3.4,8.86,8.86,0,0,0,6.34,5.77,8.38,8.38,0,0,0,2.56.22,8.23,8.23,0,0,0,2.61-.55,8.8,8.8,0,0,0,4.32-3.49,9,9,0,0,0,1.4-5.12c0-1.79,0-3.51,0-5.16l.24.24-13-.12-3.77-.07-1,0-.37,0a10.07,10.07,0,0,1,1.29-.06l3.71-.07,13.14-.12H234v.25c0,1.65,0,3.37,0,5.16a9.44,9.44,0,0,1-1.47,5.4,9.3,9.3,0,0,1-4.58,3.69,8.67,8.67,0,0,1-2.77.57,8.92,8.92,0,0,1-2.69-.25,9.17,9.17,0,0,1-6.58-6.12,9.93,9.93,0,0,1-.44-3.54c0-1,0-1.93.05-2.69s0-1.23.05-1.67A3.76,3.76,0,0,1,215.59,207.68Z" style="fill: rgb(38, 50, 56); transform-origin: 224.73px 215.023px;" id="el7014he2m7em" class="animable"></path><path d="M191.08,207.16s0,.23,0,.62l0,1.69c0,.74,0,1.62.05,2.63a10.23,10.23,0,0,0,.5,3.4,9.14,9.14,0,0,0,2.21,3.49,8.88,8.88,0,0,0,4.13,2.27,8.78,8.78,0,0,0,5.18-.33,8.8,8.8,0,0,0,4.31-3.48,9,9,0,0,0,1.41-5.12c0-1.79,0-3.52,0-5.17l.24.24-13-.12-3.76-.06-1,0-.37,0a10,10,0,0,1,1.28-.06l3.71-.06,13.14-.12h.24v.24c0,1.65,0,3.38,0,5.17a9.5,9.5,0,0,1-1.48,5.4,9.31,9.31,0,0,1-4.57,3.68,8.72,8.72,0,0,1-2.77.57,9,9,0,0,1-2.7-.25,9.26,9.26,0,0,1-4.32-2.43,9.35,9.35,0,0,1-2.26-3.69,9.93,9.93,0,0,1-.44-3.54c0-1,0-1.93.06-2.69s0-1.23,0-1.67A2,2,0,0,1,191.08,207.16Z" style="fill: rgb(38, 50, 56); transform-origin: 200.074px 214.518px;" id="elxmwqmtv48p9" class="animable"></path><path d="M215.81,208.41a23,23,0,0,1-6.9,0,22.18,22.18,0,0,1,6.9,0Z" style="fill: rgb(38, 50, 56); transform-origin: 212.36px 208.405px;" id="elf4ng9ve0yqn" class="animable"></path><path d="M172,208.54a90.51,90.51,0,0,1,9.56-.29,91.42,91.42,0,0,1,9.57.23,84.33,84.33,0,0,1-9.56.29A85.55,85.55,0,0,1,172,208.54Z" style="fill: rgb(38, 50, 56); transform-origin: 181.565px 208.513px;" id="elnk9uz1op5t" class="animable"></path><path d="M274.87,397.25a24.6,24.6,0,0,0,23.4,12.87h0a24.6,24.6,0,0,0,22.61-20.89l5.8-66.39-23.23-5.74-9.49,52S289,390.89,274.87,397.25Z" style="fill: rgb(255, 190, 157); transform-origin: 300.775px 363.641px;" id="eldypprocvcwc" class="animable"></path><path d="M303.24,321.91l.77-11.65s3.29-26.14,3.29-28.7c0-2.94,1.41-3.66,2.5-3.58,1.69.11,2.89,2.2,3,4.73,0,.87-.08,14.69-.08,14.69a31.82,31.82,0,0,1,2.67-3.73c2-2.59,6.84-4.07,11.77-3.91s6.28.64,6.31,2.55a2.45,2.45,0,0,1-1,1.86,4.84,4.84,0,0,1-3.25,1.12c-7.89-.14-10,4.07-10,4.07l-.1,1.53s4.79-3.43,8.61-2a4.51,4.51,0,0,1,1.52.94,6.17,6.17,0,0,1,5.35,9.2,2.56,2.56,0,0,1-2.48,1.55,3.2,3.2,0,0,1-1.39-.85,6.16,6.16,0,0,0-.71-.52l-.88,4.23s-2.49,9.4-3.11,13.62" style="fill: rgb(255, 190, 157); transform-origin: 319.318px 302.517px;" id="elk536cagd53" class="animable"></path><path d="M305.51,321c1.44.4,2.93-.66,3.71-1.94s1.11-2.79,1.79-4.13c2.06-4,7-5.9,8.89-10,.26-.57.4-1.35-.1-1.73s-1.12-.07-1.63.21l-13,7.2" style="fill: rgb(255, 190, 157); transform-origin: 312.653px 312.055px;" id="elyz8yp2chfs" class="animable"></path><path d="M305.16,310.59a6.73,6.73,0,0,1,1.33-.92c.88-.55,2.17-1.31,3.77-2.24l5.65-3.23,1.63-.92a2.92,2.92,0,0,1,2.15-.61,1.23,1.23,0,0,1,.85,1.11,2.6,2.6,0,0,1-.21,1.2,9.63,9.63,0,0,1-1.12,1.88c-1.8,2.34-4.13,3.81-5.81,5.52a11.11,11.11,0,0,0-2.06,2.65c-.49.92-.8,1.88-1.18,2.75a5.23,5.23,0,0,1-3,3.24c-1.07.32-1.67,0-1.63-.06a4,4,0,0,0,1.52-.25,5.07,5.07,0,0,0,2.58-3.16,29.34,29.34,0,0,1,1.11-2.85,11.19,11.19,0,0,1,2.13-2.87c1.72-1.8,4-3.31,5.68-5.48a8.74,8.74,0,0,0,1-1.69c.25-.57.21-1.14-.11-1.2s-.95.21-1.5.52l-1.66.9L310.55,308c-1.64.87-3,1.55-3.9,2A5.69,5.69,0,0,1,305.16,310.59Z" style="fill: rgb(235, 153, 110); transform-origin: 312.853px 311.905px;" id="elvyhsfccz6vq" class="animable"></path><path d="M318.94,301a6,6,0,0,1,.91-2.66,4.72,4.72,0,0,1,2.4-1.74A12,12,0,0,1,326,296a20.23,20.23,0,0,0,3.9-.34,6.25,6.25,0,0,0,2.9-1.45,2.45,2.45,0,0,0,.78-2,1.47,1.47,0,0,0-.26-.76c-.05,0,0,.29.05.77a2.31,2.31,0,0,1-.84,1.75,6.28,6.28,0,0,1-2.74,1.24,21.36,21.36,0,0,1-3.81.28,11.88,11.88,0,0,0-3.89.61,5,5,0,0,0-2.55,2,4.39,4.39,0,0,0-.66,2.08A1.5,1.5,0,0,0,318.94,301Z" style="fill: rgb(235, 153, 110); transform-origin: 326.218px 296.225px;" id="eldwhvvv18kr5" class="animable"></path><path d="M312.73,281.73a14.87,14.87,0,0,0,0,2.75c0,1.88,0,4.13.07,6.61s0,4.73,0,6.61a15.79,15.79,0,0,0,.06,2.75,11.59,11.59,0,0,0,.33-2.74c.12-1.69.2-4,.19-6.62s-.11-4.94-.23-6.63A12.87,12.87,0,0,0,312.73,281.73Z" style="fill: rgb(235, 153, 110); transform-origin: 313.024px 291.09px;" id="ellz86kz7iesc" class="animable"></path><path d="M322.06,304.07a3.22,3.22,0,0,0,.8-.31,2.57,2.57,0,0,1,2.12-.1,1.38,1.38,0,0,1,.72,1.15,7.08,7.08,0,0,1-.13,1.78,3,3,0,0,0,.33,2.16,2.62,2.62,0,0,0,2.1,1.1,3,3,0,0,0,2.16-.94,3.62,3.62,0,0,0,1-1.92,12.11,12.11,0,0,0-.05-3.54,6.9,6.9,0,0,0-.71-2.27c-.28-.5-.54-.69-.56-.67s.16.27.37.76a8.19,8.19,0,0,1,.51,2.24,13,13,0,0,1-.05,3.39,3,3,0,0,1-2.68,2.4,2.09,2.09,0,0,1-1.67-.85,2.62,2.62,0,0,1-.27-1.8,7.2,7.2,0,0,0,.08-1.91,1.77,1.77,0,0,0-1-1.43,2.63,2.63,0,0,0-2.38.26C322.28,303.85,322,304,322.06,304.07Z" style="fill: rgb(235, 153, 110); transform-origin: 326.659px 305.179px;" id="elas7z0hl0eig" class="animable"></path><path d="M329.93,308.49a1.1,1.1,0,0,0,.08.78,2.43,2.43,0,0,0,1.6,1.42,3.19,3.19,0,0,0,3-.94,5.19,5.19,0,0,0,1.35-3.63,6.36,6.36,0,0,0-1.18-3.69,5.94,5.94,0,0,0-2.47-2,5.6,5.6,0,0,0-2.06-.49c-.5,0-.77,0-.77.08a9.35,9.35,0,0,1,2.67.76,5.93,5.93,0,0,1,2.22,1.91,6.06,6.06,0,0,1,1,3.4,4.84,4.84,0,0,1-1.16,3.28,2.81,2.81,0,0,1-2.58.91,2.25,2.25,0,0,1-1.49-1.13C330,308.77,330,308.49,329.93,308.49Z" style="fill: rgb(235, 153, 110); transform-origin: 332.721px 305.351px;" id="eliklh9oaa0q" class="animable"></path><path d="M320.43,317.73a2.19,2.19,0,0,0-1.32,0,5.22,5.22,0,0,0-2.88,1.74l.46.14a14.64,14.64,0,0,0-.3-1.84,11.82,11.82,0,0,0-2.85-5.77,29.93,29.93,0,0,1,2.32,5.89c.14.62.24,1.22.31,1.78l.08.62.39-.49a5.45,5.45,0,0,1,2.55-1.75C319.94,317.82,320.43,317.8,320.43,317.73Z" style="fill: rgb(235, 153, 110); transform-origin: 316.985px 316.145px;" id="elyszltkjalsf" class="animable"></path><path d="M320.68,294.22c-.13.06.4,1,1.62,1.57s2.3.24,2.25.1-1-.13-2-.6S320.81,294.12,320.68,294.22Z" style="fill: rgb(235, 153, 110); transform-origin: 322.606px 295.162px;" id="elqb3wrssthsb" class="animable"></path><path d="M299.24,329.45l29.19,2.09s-4.49,51.65-5.36,59.66-6,20.09-23.83,20.09-21.15-6.07-29.08-18.57c9.35-6.48,24.2-25.83,24.2-25.83Z" style="fill: #C53F3F; transform-origin: 299.295px 370.37px;" id="el39hl7hjxf4" class="animable"></path><path d="M313,336.4a9.85,9.85,0,0,1-.54,1.27l-1.63,3.44L305.07,353l-.29-.35,7.57-2.25,7.69-2.26.56-.16-.27.51-6,11.65-1.77,3.35a7.86,7.86,0,0,1-.69,1.17,10.59,10.59,0,0,1,.54-1.25c.42-.86,1-2,1.64-3.41l5.81-11.73.29.35-7.68,2.28-7.58,2.22-.55.16.26-.51L310.57,341c.73-1.39,1.32-2.53,1.76-3.38A8.27,8.27,0,0,1,313,336.4Z" style="fill: rgb(224, 224, 224); transform-origin: 312.47px 350.53px;" id="elg00rcy9tson" class="animable"></path><path d="M310.24,386.08a8.63,8.63,0,0,1-1.36.18l-3.8.33-13.14,1,.16-.43,5.76,5.4,5.83,5.5.42.4-.58,0-13.07.72-3.78.16a7.87,7.87,0,0,1-1.36,0,8.75,8.75,0,0,1,1.35-.16l3.77-.31,13.06-.9-.15.43-5.85-5.49-5.74-5.42-.42-.39.57,0,13.15-.79,3.81-.19A9,9,0,0,1,310.24,386.08Z" style="fill: rgb(224, 224, 224); transform-origin: 297.78px 392.72px;" id="elu34y6xrjsm9" class="animable"></path></g><g id="freepik--Shield--inject-32" class="animable" style="transform-origin: 332.483px 237.395px;"><path d="M362.21,201.57l-29.77-10.69L303,201.43c-3.76,1.77-7.06,2.84-7.06,6.34v17.46A66,66,0,0,0,305.61,260a60.51,60.51,0,0,0,27.12,23.95c12-3.91,21-14.35,26.55-23.27A66,66,0,0,0,369,225.91v-15.7C369,205.21,366.34,202.77,362.21,201.57Z" style="fill: #C53F3F; transform-origin: 332.47px 237.415px;" id="eleh60k1rqphp" class="animable"></path><g id="elbq142ijddf4"><g style="opacity: 0.3; transform-origin: 314.334px 237.435px;" class="animable" id="elcts84l3zvv6"><path d="M332.73,273.79a48,48,0,0,1-21.45-19.1,52.22,52.22,0,0,1-7.69-27.49V215c0-2.78,1.68-5.38,5-6.93l23.86-8.92v-8.23L303,201.43c-3.09,1.35-7.06,2.84-7.06,6.34v17.46A66,66,0,0,0,305.61,260a60.51,60.51,0,0,0,27.12,23.95Z" id="el5k5xef40712" class="animable" style="transform-origin: 314.334px 237.435px;"></path></g></g><g id="elu1gr4uj3bsp"><g style="opacity: 0.4; transform-origin: 350.728px 237.38px;" class="animable" id="elggfd1wnosic"><path d="M332.73,283.92a36.13,36.13,0,0,0,5.85-2.5A52.72,52.72,0,0,0,351,271.68a66.59,66.59,0,0,0,8.61-11.57A63.5,63.5,0,0,0,369,225l0-14.41c0-7.18-3.7-7.71-6.8-9.06l-29.77-10.69v8.23l24.14,9.07c3.32,1.55,5,4.15,5,6.92v12.25a52.18,52.18,0,0,1-7.69,27.48,47,47,0,0,1-21.17,19Z" id="el09zl6vqmtv9n" class="animable" style="transform-origin: 350.728px 237.38px;"></path></g></g><g id="elhcsjm44nzqh"><path d="M340.34,226.42l0-2.36a7.73,7.73,0,0,0-15.46,0l0,2.4a4.32,4.32,0,0,0-3.68,4.27v13.9a4.32,4.32,0,0,0,4.32,4.32H340a4.32,4.32,0,0,0,4.32-4.32v-13.9A4.32,4.32,0,0,0,340.34,226.42Zm-5.63,14.74h-3.78l.59-2.73a2.29,2.29,0,1,1,2.5,0C334.28,239.45,334.71,241.16,334.71,241.16Zm4-14.76H326.55l0-2.34a6.07,6.07,0,0,1,12.13,0Z" style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 332.76px 232.64px;" class="animable" id="elnjqp9wwvwy"></path></g><path d="M308.42,226.25a9,9,0,0,1-.45-2.42,41.18,41.18,0,0,1-.24-5.93c0-1.16.11-2.26.21-3.26a7,7,0,0,1,.67-2.63,2.94,2.94,0,0,1,1.3-1.31c.41-.19.66-.18.66-.15a3.33,3.33,0,0,0-1.63,1.62,7.32,7.32,0,0,0-.52,2.51c-.08,1-.14,2.09-.17,3.24-.07,2.29,0,4.37.09,5.88A15.67,15.67,0,0,1,308.42,226.25Z" style="fill: rgb(255, 255, 255); transform-origin: 309.14px 218.392px;" id="el2zf8ie1f997" class="animable"></path><path d="M308.85,233.84c-.14,0-.27-.71-.29-1.6s.09-1.61.23-1.61.27.71.29,1.6S309,233.84,308.85,233.84Z" style="fill: rgb(255, 255, 255); transform-origin: 308.82px 232.235px;" id="elb687rvhjyjg" class="animable"></path></g><g id="freepik--Device--inject-32" class="animable" style="transform-origin: 293.65px 368.125px;"><polygon points="279.32 325.23 246.13 407.31 186.28 407.31 186.28 411.02 364.55 411.02 401.02 325.23 279.32 325.23" style="fill: rgb(38, 50, 56); transform-origin: 293.65px 368.125px;" id="eldkj4y2l0jps" class="animable"></polygon><path d="M330.06,373.69c-1.2,4.13-4.7,6.74-7.82,5.84s-4.67-5-3.47-9.13,4.71-6.74,7.83-5.84S331.27,369.56,330.06,373.69Z" style="fill: rgb(250, 250, 250); transform-origin: 324.418px 372.045px;" id="elul82oln0iz" class="animable"></path></g><defs>     <filter id="active" height="200%">         <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>                <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>        <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>        <feMerge>            <feMergeNode in="OUTLINE"></feMergeNode>            <feMergeNode in="SourceGraphic"></feMergeNode>        </feMerge>    </filter>    <filter id="hover" height="200%">        <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>                <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>        <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>        <feMerge>            <feMergeNode in="OUTLINE"></feMergeNode>            <feMergeNode in="SourceGraphic"></feMergeNode>        </feMerge>            <feColorMatrix type="matrix" values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 "></feColorMatrix>    </filter></defs></svg>
        </div>
        <div class="context">
          <form method = "POST">
          <p>The data gathered through this platform will be handeled in accordance with RA 10173 of the Data Privacy Act of 2012, as well as the <a class="link" href="https://www.usep.edu.ph/usep-data-privacy-statement/">Data Privacy of USeP</a>, and will be utilized only for the intended purpose.</p>


          <?php
            $id=$_SESSION['id'];
            $sql="Select *from student where Student_id='$id'";
            $res = $db->query($sql);
            while($row = $res->fetch_assoc()) {
            ?>
          
            <br><input class="form-check-input" type="hidden" name="gender" id="gender" value="<?php echo htmlentities($row['sex']);?>">
            <input class="form-check-input" type="hidden" name="pat" id="pat" value="<?php echo htmlentities($row['patinfo_status']);?>">
      <?php
      
      }?>
                      <div class="btn-group">
                        <button id="open" class="btn btn-primary" type= "Submit" name= "min" >Get Started</button>
                      </div>
                    </div>
                 </div>
              </div>
           </div> 
           
    <?php
      if(isset($_POST['min'])){
      $hehe= $_POST['gender']; 
      $pat = $_POST['pat']; 


      if($pat=="1" && $hehe=="Male"){

        echo '<script>
                  swal({
                  
                  title: "Patient Record existed!",
                  text: "Do you want to Update?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#36c6d3",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "YES",
                  cancelButtonText: "NO"
              }).then(function(result){
                  if(result.value){
                      window.location = "UpdateMaleRecord.php";
                  }else if(result.dismiss == "cancel"){
                     window.location = "ClinicComplaint.php";
                  }

              });
                 </script>';

      }
      if($pat=="1" && $hehe=="Female"){

        echo '<script>
                  swal({
                  title: "Patient Record existed!",
                  text: "Do you want to Update?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#36c6d3",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "YES",
                  cancelButtonText: "NO"
              }).then(function(result){
                  if(result.value){
                      window.location = "UpdateFemaleRecord.php";
                  }else if(result.dismiss == "cancel"){
                     window.location = "ClinicComplaint.php";
                  }

              });
                 </script>';

      }


      if($hehe=="Female" && $pat=="0"){  
        echo "<script type='text/javascript'> document.location = 'StudentConsultationFemale.php'; </script>";
       }
     else if ($hehe=="Male" && $pat=="0"){
        echo "<script type='text/javascript'> document.location = 'StudentConsultationMale.php'; </script>";
              } 
        }   
?>
          </form>
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
    <script src="jsc/plugins/pace.min.js"></script>
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
          events:'calendarview.php',  
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

      function onload(){

      }

    </script>
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
      

    </body>
  </html>