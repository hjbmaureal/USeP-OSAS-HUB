<?php 
  include('../../conn.php');
  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Student'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where user_id='$id' and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}
  
  $job_count = 0;

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
      <link rel="icon" href="../../images/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Student Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="cssm/main.css">
      <link rel="stylesheet" type="text/css" href="cssm/home.css">
      <link rel="stylesheet" type="text/css" href="cssm/upstyle.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="cssm/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
 <body class="app sidebar-mini rtl" onload="initClock()">
      <!-- Navbar-->

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
  <link rel="stylesheet" href="../../css/owl.carousel.min.css">
<link rel="stylesheet" href="../../css/owl.theme.default.min.css">
  <style type="text/css">
    .img{
      width: 130px;
      height: 130px;
    }
  </style>
        
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
          <li><a class="treeview-item" href="index.php" hidden="">Home</a></li>
          <li><a class="treeview-item active" href="Discipline-Complaints.php">Complaints</a></li>
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
        <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Labor Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
        <li><a class="treeview-item active" href="Home-Labor.php">Home</a></li>
        <li><a class="treeview-item" href="Labor-DTR.php">DTR</a></li>
        <li><a class="treeview-item" href="Labor-Accomplishments.php">Accomplishment Reports</a></li>


        </ul>
        </li>

        ';


      } else {
        echo '
        <li><a class="app-menu__item active" href="Home-Labor.php"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Student Labor Services</span></a></li>
        ';
      }

      ?>



      <li><a class="app-menu__item" href="ReqGoodMoral_Student.php"><i class="app-menu__icon fa fa-envelope-o"></i><span class="app-menu__label">Request for Good Moral</span></a></li>

      <li class="p-2 sidebar-label"><span class="app-menu__label">GUIDANCE OFFICE SERVICES</span></li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item active" href="Guidance_StudentUI.php">Home</a></li>
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
            <li><a class="treeview-item" href="Clinic_Privacy_Policy.php">Consultation</a></li>
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

    <div class="red"></div>
 
  <div class="landingpage">

      <!--home-->     
      <section id="home" style="background-image: url('image/home.svg'); background-repeat: no-repeat; background-size: 100% 100%;">
        <div class="shortcuts">
          <ul class="shortcut">
            <li class="shortcut_links"><a class="open" href="#home" style=" text-decoration: none;">Home</a></li>&emsp;
            <li class="shortcut_links"><a class="link" href="#about" style=" text-decoration: none;">About</a></li>&emsp;
            <li class="shortcut_links"><a class="link" href="#mandate" style=" text-decoration: none;">Mandate</a></li>&emsp;
            <li class="shortcut_links"><a class="link" href="#personnel" style=" text-decoration: none;">Personnel</a></li>&emsp;
          </ul>
        </div>

        <div class="story">
          <p>
          <img src="image/OSASMAIN.svg" alt="img">
          </p>
        </div>

        <div class="about">
          <h1>Student's Affair & Services</h1>
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
          <h2>About the office</h2>
          <p>The OSAS, being a major support service arm of the University, is the destined to work for the attainment of the institution’s development goals. Its success depends on the effectiveness of the OSS current staff and its ability to cause fruitful coordination between and among those concerned in the process of program/project implementation, especially the student leaders, faculty advisers and University officials.</p>
        </div>

        <div class="organization">
          <h2>Organizational Structure</h2>
          <div class="frame">
            <img id="myImg" src="image/osastructure.png" alt="Office of the Student's Affair & Services-Tagum unit" style="width: 100%; padding-top: -500px;">
          </div>
        </div>
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="white" fill-opacity="1" d="M0,192L30,170.7C60,149,120,107,180,90.7C240,75,300,85,360,117.3C420,149,480,203,540,213.3C600,224,660,192,720,160C780,128,840,96,900,74.7C960,53,1020,43,1080,37.3C1140,32,1200,32,1260,37.3C1320,43,1380,53,1410,58.7L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>


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
        <div class="vision">
            <h3><i class="far fa-eye"></i> VISION</h3>
            The OSAS envisions to become an effective channel for the development of leadership that shall enhance the identity and sharpening of talents in the areas of student government, student organization, campus publication, culture and sports.
        </div>
        <div class="mission">
            <h3><i class="fas fa-rocket"></i> MISSION</h3>
            Along with USEP’s mission, the OSAS will provide developmental activities that will enhance the balanced development of the individual and to make him become an effective leader in his chosen career, imbued with nationalism and culture identity.
        </div>
        <div class="goal">
            <h3><i class="fas fa-bullseye"></i> GOALS</h3>
            <p>The OSAS shall strive to contribute to the University’s effort in student development. Specially, it aims to achieve all the following
              <span id="dots">...</span>
              <span id="more">:
                <br><i class="fas fa-check"></i> To closely coordinate with the other OSAS units and other various units from all campuses for the delivery of quality services in health, guidance, library and other components.
                <br><i class="fas fa-check"></i> To provide effective advising to fraternities, clubs, societies, and other student groupings, to make them effective learning organizations.
                <br><i class="fas fa-check"></i> To enhance proactive strategies in the campaign against illegal drug use, sexual harassment, AIDS and other dreaded disease.
                <br><i class="fas fa-check"></i> To enhance coordination with instructional staff in the conduct of extra-curricular events for wholesome student development.
                <br><i class="fas fa-check"></i> To initiate innovative approach in the management of accommodation units for the enhancement of effective student development.
                <br><i class="fas fa-check"></i> To provide the studentry with alternative recreation facilities for the enhancement of socio-cultural development.
                <br><i class="fas fa-check"></i> To initiate change for the effective and efficient administration of student scholarships.
                <br><i class="fas fa-check"></i> To provide a systematic storage of student organization documents for future reference.
                <br><i class="fas fa-check"></i> To generate a workable and functional sports development program for the talented students.
                <br><i class="fas fa-check"></i> To promote the University through cultural performances.
                <br><i class="fas fa-check"></i> To provide alternative professional services for the conduct of sports and cultural activities.
                <br><i class="fas fa-check"></i> o promote wholesome communication between USEP officials/faculty/staff and student leaders on the matters affecting them.
                <br><i class="fas fa-check"></i> To bring in external resources for student development via networking with program graduates and NGO’s.
                <br><i class="fas fa-check"></i> To work with barangay and LGU officials for the improvement of students’ board and lodging facilities.
              </span></p>
                <button onclick="myFunction()" id="myBtn">Read more</button>
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

      <!--personnel-->
    <section id="personnel" style="background-image: url('image/home.png'); background-repeat: no-repeat;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e7e5e5" fill-opacity="1" d="M0,0L60,48C120,96,240,192,360,240C480,288,600,288,720,266.7C840,245,960,203,1080,181.3C1200,160,1320,160,1380,160L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
        <div class="personnel">
          <h2>Staff and Personnel</h2>
          <div class="staff"><img src="image/OSAS-staff/1.png" alt="img" style="width: 80%;"></div>
          <div class="staff"><img src="image/OSAS-staff/2.png" alt="img" style="width: 80%;"></div>
        </div>
      </section>

       

      </div>

      <main class="app-content">
        <div class="row">
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
                         $sql = mysqli_query($conn,"SELECT * FROM viewresponse WHERE response_status = 'On Going' AND (viewresponse.student_id = '$id' OR viewresponse.defendant = '$id') ORDER BY schedule_date, time_from ASC LIMIT $limit");
                  
                            while($row = mysqli_fetch_array($sql)) {     
                              ?>

                <div class="fc-event">
                <p class="font-weight-bold" >NAME: &emsp; <?php echo $row['fullname'].'<br>'.'DEFENDANT: &emsp;' .$row['Person_Complained'].'<br>'.'DATE: &emsp;' .$row['schedule_date'].'<br>'.'TIME: &emsp;' .$row['time_from'].'<br>'.' TYPE: &emsp;'.$row['meeting_type'].' <br>'.'MEETING LINK: &emsp;'.$row['meeting_link'].' <br>'.'MEETING ID: &emsp;'.$row['meeting_id'].' <br>'.'MEETING PASSCODE: &emsp;'.$row['passcode']; ?>
                  </div>

                <?php }?> 
              </div>
            </div>
          </div>
        
      </main>



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
    <script type="text/javascript" src="../../js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/jquery-ui.custom.min.js"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>

    <script type="text/javascript" src="../../js/plugins/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>

     <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
      
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/jquery.vmap.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.vmap.world.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.vmap.sampledata.js"></script>
    <script type="text/javascript" src="js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
      <script type="text/javascript">
        $('#demoNotify').click(function(){
          $.notify({
            title: "Update Complete : ",
            message: "Disable Successfuly!",
            icon: 'fa fa-check' 
          },{
            type: "info"
          });
        });

        function lettersOnly(input){
          var regex = /[^a-z,. ]/gi;
          input.value = input.value.replace(regex, "");
        }
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
      <script type="text/javascript">
           function openForm() {
          document.body.classList.add("myForm");

      }

        function closeForm() {
          document.body.classList.remove("myForm");

      }

      </script>    

<script type="text/javascript">
      $(document).ready(function() {
      
      //   $('#external-events .fc-event').each(function() {
      
      //     // store data so the calendar knows to render an event upon drop
      //     $(this).data('event', {
      //       title: $.trim($(this).text()), // use the element's text as the event title
      //       stick: true // maintain when user navigates (see docs on the renderEvent method)
      //     });
      
      //     // make the event draggable using jQuery UI
      //     $(this).draggable({
      //       zIndex: 999,
      //       revert: true,      // will cause the event to go back to its
      //       revertDuration: 0  //  original position after the drag
      //     });
      
      //   });
      
      //   $('#calendar').fullCalendar({
      //     header: {
      //       left: 'prev,next today',
      //       center: 'title',
      //       right: 'month,agendaWeek,agendaDay'
      //     },
      //     editable: true,
      //     droppable: true, // this allows things to be dropped onto the calendar
      //     drop: function() {
      //       // is the "remove after drop" checkbox checked?
      //       if ($('#drop-remove').is(':checked')) {
      //         // if so, remove the element from the "Draggable Events" list
      //         $(this).remove();
      //       }
      //     }
      //   });
      
      
      // });

    var calendar = $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      events:'calendarLoad1.php',
      selectable: true,
      editable: true,
    });

  }); function onload(){

}
    </script>
  </body>
</html>
