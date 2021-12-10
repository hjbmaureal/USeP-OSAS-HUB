  <!DOCTYPE html>
  <html lang="en">
   <?php 
  
   include('conn.php');
   include('session_faculty.php');
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
      <link rel="stylesheet" type="text/css" href="cssg/main.css">
      <link rel="stylesheet" type="text/css" href="cssg/home.css">
      <link rel="stylesheet" type="text/css" href="cssg/upstyle.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="cssg/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
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
          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item active" href="Guidance_Faculty.php">Home</a></li>  
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
        <div class="red"> 
          
        </div>


      <!-- Navbar-->

         <!--<div class="page-error tile">-->
 
           </div>   
      </form>


      <div class="landingpage">

      <!--home-->     
      <section id="home" style="background-image: url('image/home.svg'); background-repeat: no-repeat; background-size: 100% 100%;">
        <div class="shortcuts">
          <ul class="shortcut">
            <li class="shortcut_links"><a class="open" href="#home" style=" text-decoration: none;">Home</a></li>&emsp;
            <li class="shortcut_links"><a class="link" href="#about" style=" text-decoration: none;">About</a></li>&emsp;
            <li class="shortcut_links"><a class="link" href="#mandate" style=" text-decoration: none;">Mandate</a></li>&emsp;
            <li class="shortcut_links"><a class="link" href="#flow" style=" text-decoration: none;">Process</a></li>&emsp;
          </ul>
        </div>

        <div class="story">
          <p>
          <img src="image/guidance.svg" alt="img">
          </p>
        </div>

        <div class="about">
          <h1>University Assessment and Guidance Center</h1>
          <p>The portal allows you to view your records and request documents through the internet.</p>
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
          <h2>About</h2>
          <p>The University Assessment and Guidance Center (UAGC), adheres to the Mental Health Law requiring both public and private institutions to develop guidelines and standards on age-appropriate evidenced-based mental health programs (RA 11036, Sec.34). In response to this, UAGC is spearheading the creation of mental health and well-being to the students and other stakeholders.<br><br>
          “We provide a welcoming atmosphere where the Personnel are approachable and accommodating. Hence, in order to ensure systematic, efficient and effective delivery of guidance services, guidelines have to be delineated and observed, especially in dealing with the different stakeholders of the University.”
          </p>
        </div>

        <div class="organization">
          <h2>UAGC OBJECTIVES</h2>
          1. To reinforce Me resiliency of the students;<br> 
          2. To help the student acquire effective methods for stress management that pertains to personal, social, academics, finances, and access to mental health services;<br> 
          3. To assist students in their transitions as theey move to upper levels;<br>
          4. To support the students in assessing then own abilities, interests, and personality traits as they develop and attain maximum utization of   their potential intervanions;<br> 
          5. To assist students in making decisions and choices in life, promoting their growth toward self-direction, thus, live a more meaningful life;<br> 
          6. To make counseling sessions available, to help students perform better accedemically, and to cope with their emotions and be more effective in their relationships with others.<br>
          7. To assist students enrolled in the Advanced Studies in managing their personal, academic, and work/career life.
        </div>
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="white" fill-opacity="1" d="M0,192L30,170.7C60,149,120,107,180,90.7C240,75,300,85,360,117.3C420,149,480,203,540,213.3C600,224,660,192,720,160C780,128,840,96,900,74.7C960,53,1020,43,1080,37.3C1140,32,1200,32,1260,37.3C1320,43,1380,53,1410,58.7L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>


     
      </section>

<!--mandate-->
      <section id="mandate">

        <div class="vision">
            <h3><i class="far fa-eye"></i> VISION</h3>
            In line with the University’s vision of promoting well-being of its constituents, the University Assessment and Guidance Center envisions itself to be a dynamic instrument in providing services for the total human development of its clientele.
        </div>
        <div class="mission">
            <h3><i class="fas fa-rocket"></i> MISSION</h3>
            The University Assessment and Guidance Center commits itself to respond to the needs of its clientele by providing effective, efficient and systematic delivery of its services.
        </div>
        <div class="goal">
            <h3><i class="fas fa-bullseye"></i> GOALS</h3>
            <p>
              It is the primary goal of the University Assessment and Guidance Center to serve all students to contribute to their development and enrichment as individuals and as productive members of the global community.
            </p>
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

      <section id="flow">
        <center>
        <h2>Process Flow</h2>
        <img src="image/flow.png" width="50%" class="process">
      </center>
      </section>

      <section id="counter">
        <div class="pending">
          <div class="count">
            
    <?php 
            $count_sql="SELECT * from referral_form where status_id ='2' AND staff_id ='$faculty_id'";

          if($result = mysqli_query($conn, $count_sql)){

          $count = 0;

          while ($row = mysqli_fetch_assoc($result)) {                             

            $count++;

                              }}
        ?>

            <h2><?php echo $count;  ?></h2>
            Pending Referral Forms<br><br>
            <a class="link" href="Guidance_Faculty_Referrals.php">Review</a>
          </div>
        </div>

        <div class="new">
          <div class="count">
           <?php 
            $count_sql="SELECT * from referral_form where status_id ='3' AND staff_id ='$faculty_id'";

          if($result = mysqli_query($conn, $count_sql)){

          $count3 = 0;

          while ($row = mysqli_fetch_assoc($result)) {                             

            $count3++;

                              }}
        ?>
            <h2><?php echo $count3;  ?></h2>
            On Going Referral Forms<br><br>
            <a class="link" href="Guidance_Faculty_Referrals.php">See evaluation</a>
          </div>
        </div>
      </section>

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
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="jsg/plugins/jquery.vmap.min.js"></script>
    <script type="text/javascript" src="jsg/plugins/jquery.vmap.world.js"></script>
    <script type="text/javascript" src="jsg/plugins/jquery.vmap.sampledata.js"></script>
    <script type="text/javascript" src="jsg/plugins/moment.min.js"></script>
    <script type="text/javascript" src="jsg/plugins/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="jsg/plugins/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script type="text/javascript">

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

    </body>
  </html>