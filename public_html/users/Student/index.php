  <!DOCTYPE html>
  <html lang="en">
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
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" type="text/css" href="css/announcements.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
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
          <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
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
              //  echo $id;
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
          <main class="app-content" style="background-color: transparent;">
            
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
                <span aria-hidden="true">??</span>
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
 

  <h1>ANNOUNCEMENTS</h1><br> 
  <div class="feed">
    <h3 class="tile-title">THIS WEEK</h3>

    <div class="today">
              <p class="d"><i class="fas fa-bullhorn"></i> New posts from OSAS</p>
              <?php
              $legit=date("Y-m-d");
              $real=date_create(date("Y-m-d"));
              $real1=date_sub($real,date_interval_create_from_date_string("7 days"));
              $really1=date_format($real,"Y-m-d");
              $sql2="select announcements.announcement_id,announcements.staff_id,announcements._date,announcements.title,announcements.content, staff.office_id from staff INNER JOIN announcements ON announcements.staff_id=staff.staff_id WHERE staff.office_id=1 AND
                announcements._date BETWEEN '" . $really1 . "' AND  '" . $legit . "' ORDER BY announcements._date DESC";
                $result = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>

              <p class="t"><?php echo $row['title']; ?></p>
              <p class="d"><?php echo $row['_date']; ?></p>

              <?php }?> 
              <div class="lenk"><a href="#osas" class="read" style="text-decoration: none;"><i class="fas fa-arrow-circle-right"></i></a> </div>            
    </div>

    <div class="today">
              <p class="d"><i class="fas fa-bullhorn"></i> New posts from OSAS-Scholarship</p>
              <?php
              $legit=date("Y-m-d");
              $real=date_create(date("Y-m-d"));
              $real1=date_sub($real,date_interval_create_from_date_string("7 days"));
              $really1=date_format($real,"Y-m-d");
              $sql2="select scholarship_announcement.announcement_id,scholarship_announcement.date,scholarship_announcement.title,scholarship_announcement.content from scholarship_announcement WHERE
                scholarship_announcement.date BETWEEN '" . $really1 . "' AND  '" . $legit . "' ORDER BY scholarship_announcement.date DESC";
                $result = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <p class="t"><?php echo $row['title']; ?></p>
              <p class="d"><?php echo $row['date']; ?></p>
              <?php }?> 
              <div class="lenk"><a href="#scholarship" class="read" style="text-decoration: none;"><i class="fas fa-arrow-circle-right"></i></a> </div> 
              
    </div>

    <div class="today">
              <p class="d"><i class="fas fa-bullhorn"></i> New posts from Clinic</p>
              <?php
              $legit=date("Y-m-d");
              $real=date_create(date("Y-m-d"));
              $real1=date_sub($real,date_interval_create_from_date_string("7 days"));
              $really1=date_format($real,"Y-m-d");
              $sql2="select announcements.announcement_id,announcements.staff_id,announcements._date,announcements.title,announcements.content, staff.office_id from staff INNER JOIN announcements ON announcements.staff_id=staff.staff_id WHERE staff.office_id=3 AND
                announcements._date BETWEEN '" . $really1 . "' AND  '" . $legit . "' ORDER BY announcements._date DESC";
                $result = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <p class="t"><?php echo $row['title']; ?></p>
              <p class="d"><?php echo $row['_date']; ?></p>
              <?php }?> 
              <div class="lenk"><a href="#clinic" class="read" style="text-decoration: none;"><i class="fas fa-arrow-circle-right"></i></a> </div> 
              
    </div>

    <div class="today">
              <p class="d"><i class="fas fa-bullhorn"></i> New posts from Guidance Office</p>
              <?php
              $legit=date("Y-m-d");
              $real=date_create(date("Y-m-d"));
              $real1=date_sub($real,date_interval_create_from_date_string("7 days"));
              $really1=date_format($real,"Y-m-d");
              $sql2="select announcements.announcement_id,announcements.staff_id,announcements._date,announcements.title,announcements.content, staff.office_id from staff INNER JOIN announcements ON announcements.staff_id=staff.staff_id WHERE staff.office_id=4 AND
                announcements._date BETWEEN '" . $really1 . "' AND  '" . $legit . "' ORDER BY announcements._date DESC";
                $result = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <p class="t"><?php echo $row['title']; ?></p>
              <p class="d"><?php echo $row['_date']; ?></p>
              <?php }?> 
              <div class="lenk"><a href="#guidance" class="read" style="text-decoration: none;"><i class="fas fa-arrow-circle-right"></i></a> </div> 
              
    </div>
  </div>

  <div class="announcements">
        <div id="osas" class="announcement">
          <div class="news">
            <h3 class="tile-title">Office of Students Affair and Services</h3>
             <?php 
              $sql2="select announcements.announcement_id,announcements.staff_id,announcements._date,announcements.title,announcements.content, staff.office_id from staff INNER JOIN announcements ON announcements.staff_id=staff.staff_id WHERE staff.office_id=1 ORDER BY announcements._date DESC";
                $result = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>          

            <ul class="timeline">
              <li class="event" data-date=<?php echo $row['_date']; ?>>
                <h3><?php echo $row['title']; ?></h3>
                <div class="justnow" <?php if ($row['_date']!=date("Y-m-d")){ echo 'style="display:none;"'; } ?>>
                <i class="far fa-clock"></i> POSTED TODAY
                </div><br>
                  <p><?php echo $row['content']; ?></p>
              </li>
            </ul>  
            <?php }?><center><div style="color: #b3b3b3; font-family: 'Quicksand', sans-serif;"><br><br><p>No more posts to show</p></div></center>
          </div>
        </div>


        <div id="scholarship" class="announcement">
          <div class="news">
            <h3 class="tile-title">OSAS Scholarship</h3>
             <?php 
              $sql2="select scholarship_announcement.announcement_id,scholarship_announcement.date,scholarship_announcement.title,scholarship_announcement.content from scholarship_announcement ORDER BY scholarship_announcement.date DESC";
                $result = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>          

            <ul class="timeline">
              <li class="event" data-date=<?php echo $row['date']; ?>>
                <h3><?php echo $row['title']; ?></h3>
                <div class="justnow" <?php if ($row['date']!=date("Y-m-d")){ echo 'style="display:none;"'; } ?>>
                <i class="far fa-clock"></i> POSTED TODAY
                </div><br>
                  <p><?php echo $row['content']; ?></p>
              </li>
            </ul>  
            <?php }?><center><div style="color: #b3b3b3; font-family: 'Quicksand', sans-serif;"><br><br><p>No more posts to show</p></div></center>
          </div>
        </div>

        <div id="clinic" class="announcement">
          <div class="news">
            <h3 class="tile-title">OSAS Clinic</h3>
             <?php 
              $sql2="select announcements.announcement_id,announcements.staff_id,announcements._date,announcements.title,announcements.content, staff.office_id from staff INNER JOIN announcements ON announcements.staff_id=staff.staff_id WHERE staff.office_id=3 ORDER BY announcements._date DESC";
                $result = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>          

            <ul class="timeline">
              <li class="event" data-date=<?php echo $row['_date']; ?>>
                <h3><?php echo $row['title']; ?></h3>
                <div class="justnow" <?php if ($row['_date']!=date("Y-m-d")){ echo 'style="display:none;"'; } ?>>
                <i class="far fa-clock"></i> POSTED TODAY
                </div><br>
                  <p><?php echo $row['content']; ?></p>
              </li>
            </ul>  
            <?php }?><center><div style="color: #b3b3b3; font-family: 'Quicksand', sans-serif;"><br><br><p>No more posts to show</p></div></center>
          </div>
        </div>

        <div id="guidance" class="announcement">
          <div class="news">
            <h3 class="tile-title">OSAS Guidance</h3>
             <?php 
              $sql2="select announcements.announcement_id,announcements.staff_id,announcements._date,announcements.title,announcements.content, staff.office_id from staff INNER JOIN announcements ON announcements.staff_id=staff.staff_id WHERE staff.office_id=4 ORDER BY announcements._date DESC";
                $result = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>          

            <ul class="timeline">
              <li class="event" data-date=<?php echo $row['_date']; ?>>
                <h3><?php echo $row['title']; ?></h3>
                <div class="justnow" <?php if ($row['_date']!=date("Y-m-d")){ echo 'style="display:none;"'; } ?>>
                <i class="far fa-clock"></i> POSTED TODAY
                </div><br>
                  <p><?php echo $row['content']; ?></p>
              </li>
            </ul>  
            <?php }?><center><div style="color: #b3b3b3; font-family: 'Quicksand', sans-serif;"><br><br><p>No more posts to show</p></div></center>
          </div>
        </div>

  </div>
                     

        

        <!--</div>-->
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
      <?php  
      if ($count!=0) 
        { 
          echo '<script>swal("Notification Alert!", "You have '.$count.' unread notification/s!", "success")</script>';
        }
      ?>
      <!-- Data table plugin-->
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
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