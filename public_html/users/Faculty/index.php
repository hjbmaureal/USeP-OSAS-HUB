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
      <title>FACULTY INTERFACE</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../../css/main.css">
          <link rel="stylesheet" type="text/css" href="../../css/upstyle.css">
      <!-- Font-icon css-->
      <link href="http://fonts.cdnfonts.com/css/olde-english" rel="stylesheet">  
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <style>

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
      <body class="app sidebar-mini rtl"onload="initClock()">
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
                <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">FACULTY HEAD PORTAL</p>
              ';
            }else{
              echo '                
                <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">FACULTY PORTAL</p>
              ';
            }
          ?>
            
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
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
                  <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <i class="text-warning fas fa-user-circle fa-2x"></i>
                  </a>
                      <!-- <a class="app-nav__item" style="width: 48px;" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <img class="rounded-circle" src="data:image/jpeg;base64,<?php echo $_SESSION['photo'] ?>" style="max-width:100%;">
                </a> -->
                
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
        <div class="red"> 
          
        </div>
  <!-- Navbar-->
       

         <!--<div class="page-error tile">-->
        <h4 style="text-align: center;">ANNOUNCEMENTS</h4> <br>


        <div class="row">
            <div class="col-xl">
               <div style="background-color: #C12C32; padding: 8px 10px;"> </div>
              <div class="tile">
                <h3 class="tile-title" >Office of Students Affair and Services</h3>
                <div class="tile-body">Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.</div>
                <div class="tile-footer"><p style="margin-left: 910px;"><a class="btn btn-primary icon-btn" href=""></i>Read More </a></p></div>
              </div>
            </div>


            <div class="col-xl">
              <div style="background-color: #C12C32; padding: 8px 10px;"> </div>
              <div class="tile">
                <h3 class="tile-title" >OSAS Scholarship</h3>
                <div class="tile-body">Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.</div>
                <div class="tile-footer"><p style="margin-left: 910px;"><a class="btn btn-primary icon-btn" href=""></i>Read More </a></p></div>
              </div>
            </div>

        <div class="col-xl">
            <div style="background-color: #C12C32; padding: 8px 10px;"> </div>
            <div class="tile">
                <h3 class="tile-title" >OSAS Guidance</h3>
                <div class="tile-body">Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.</div>
                <div class="tile-footer"><p style="margin-left: 910px;"><a class="btn btn-primary icon-btn" href=""></i>Read More </a></p></div>
            </div>
        </div>

        <div class="col-xl">
            <div style="background-color: #C12C32; padding: 8px 10px;"> </div>
            <div class="tile">
                <h3 class="tile-title" >OSAS Clinic</h3>
                <div class="tile-body">Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.</div>
                <div class="tile-footer"><p style="margin-left: 910px;"><a class="btn btn-primary icon-btn" href=""></i>Read More </a></p></div>
            </div>
        </div>
    </div>

      </main>
      <!-- Essential javascripts for application to work-->
      
      <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/jquery-ui.custom.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>

      <!-- Data table plugin-->
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#sampleTable').DataTable();</script>
      <script type="text/javascript">$('#sampleTable2').DataTable();</script>
      <!-- Google analytics script-->
      
      <?php  
      if ($count!=0) 
        { 
          echo '<script>swal("Notification Alert!", "You have '.$count.' unread notification/s!", "success")</script>';
        }
      ?>
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