<?php
session_start();
include('../../conn.php');

  include '../../php/notification-timeago.php'; 
//validating session
   $sql1 = "SELECT staff.*, office.office_name FROM staff 
              JOIN office ON staff.office_id = office.office_id  WHERE staff.office_id='4' AND dept_id='4' AND staff.account_status='Active'"; //admin-staff_id_to
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
          <link rel="stylesheet" type="text/css" href="cssg/all.min.css">
      <link rel="stylesheet" type="text/css" href="cssg/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
      <body class="app sidebar-mini rtl"  onload="initClock()">
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
              <li><a class="treeview-item" href="Guidance_Student_Counselling.php">Counselling</a></li>
              <li><a class="treeview-item" href="Guidance_Student_GroupGuidance.php">Group Guidance Activities</a></li>
              <li><a class="treeview-item active" href="Guidance_Student_Evaluation.php">Evaluation</a></li>
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
                    <img class="rounded-circle" src="data:image/png;base64,<?php echo $_SESSION['photo'] ?>" style="width: 30px; height: 30px;">
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

      <!-- Start Evaluation -->

<?php


  if(isset($_POST['submitForm'])){


    $appntmnt_id= $_POST['filtervenueDate'];
    $campus= $_POST['campus'];
    $title= $_POST['title'];
    $venue = $_POST['venue'];
    $act_date = $_POST['act_date'];
    $content1 = $_POST['content1'];
    $content2 = $_POST['content2'];
    $content3 = $_POST['content3'];
    $content4 = $_POST['content4'];
    $content5 = $_POST['content5'];
    $content6 = $_POST['content6'];
    $content7 = $_POST['content7'];
    $content8 = $_POST['content8'];
    $content9 = $_POST['content9'];
    $content10 = $_POST['content10'];
    $content11 = $_POST['content11'];
    $content12 = $_POST['content12'];
    $content13 = $_POST['content13'];
    $speaker = $_POST['speaker'];
    $topic= $_POST['topic'];
    $resource1 = $_POST['resource1'];
    $resource2 = $_POST['resource2'];
    $resource3 = $_POST['resource3'];
    $resource4 = $_POST['resource4'];
    $resource5 = $_POST['resource5'];
    $resource6 = $_POST['resource6'];
    $resource7 = $_POST['resource7'];
    $comment = $_POST['comment'];

    $sql="INSERT into seminar_evaluation(appointment_id, Student_id,campus, act_title, venue, act_date, content_q1, content_q2, content_q3, content_q4, content_q5, content_q6, content_q7, content_q8, content_q9, content_q10, content_q11, content_q12, content_q13, speaker_name, topic, resource_q1, resource_q2, resource_q3, resource_q4, resource_q5, resource_q6,resource_q7, comments) values ($appntmnt_id, '$id','$campus','$title','$venue','$act_date','$content1','$content2','$content3','$content4','$content5','$content6','$content7','$content8','$content9','$content10','$content11','$content12','$content13','$speaker','$topic','$resource1','$resource2','$resource3','$resource4','$resource5','$resource6','$resource7','$comment')";

    if(mysqli_multi_query($conn,$sql)){

      $result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, time, link, message_status) values (notif_id,'$admin_id', 'A new group guidance evaluation has been submitted.',now(),'Guidance_GroupGuidance_Reports.php', 'Delivered')");

  if($result){

    echo '<script>
        swal({
            title: "Evaluation Form Submitted!",
            text: "Server Request Successful!",
            icon: "success",
            buttons: false,
            timer: 1800,
            closeOnClickOutside: false,
              closeOnEsc: false,
        })
         setTimeout(myFunction, 1800);
          
      </script>';
      ?>
      <script>
        function myFunction() {
          window.location="Guidance_Student_Evaluation.php";
        }
      </script>
      <?php
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
  }
  }
      
      ?>

       <?php
 
    $sql="SELECT  student.first_name, student.last_name, student.middle_name,student.suffix, student.sex, student.year_level, course.title FROM student join course on course.course_id=student.course_id where Student_id='$id'";
    $result1 = $conn->query($sql);
      if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {

    $fname = $row['first_name'];
    $mname = $row['middle_name'];
    $lname = $row['last_name'];
    $sname = $row['suffix'];
    $sex = $row['sex'];
    $course = $row['title'];
    $year = $row['year_level'];
}}
                  ?>

      <div class="row d-flex justify-content-center">
          <div class="col-md-11">
            <a class="float-right" href="Guidance_Student_Evaluation.php"><i class="fas fa-arrow-left"> Back</i></a>
                <div>
                <div>
                <div class="float-left"><h4>SEMINAR/TRAINING EVALUATION FORM</h4></div><br><br>
                <h6>Good day! Thank you for helping the University Assessment and Guidance Center-Tagum to improve the value of its activity/learning session. Please take a moment to answer the items below.</h6>
                  </div>
                  <br>
                      </div>
                      <div class="col-sm">
                        <div style="background-color: #193541; padding: 20px 10px;">
                          <div class="info" style="color: #FFFFFF;"><h5>University of Southeastern Philippines Data Privacy Consent Form</h5>
                          </div>
                        </div>
                        <div class="tile" style="border-width: 3px; border-style: solid; border-color: #193541; ">
                          <h6>In compliance with the Data Privacy Act (DPA) of 2021, and its Implementing Rules and Regulation (IRR) effective since September 8, 2016, I allow USeP to collect and process my personal and sensitive personal information.</h6><br>
                          <h6>Furthermore, I am voluntarily subjecting myself to the data privacy policy of the University. Particular, I agree that USep shall:</h6><br>
                          <h6>1. Collect and process my e-mail address, job title, and reaction about the webinar.</h6><br>
                          <h6>2. Collect and process the aforementioned data solely for the purpose of getting feedback about the webinar.</h6><br>
                          <h6>3. Collect the data using online platform, and</h6><br>
                          <h6>4. Store the data for no longer than necessary or upon the termination of the purpose for which the data are to be utilized;</h6><br>
                          <h6>I am fully aware of my rights, specifically:</h6><br>
                          <h6>5. The existence of my rights to access, correction, as well as the right to lodge a complaint before the National Privacy Commission.</h6><br>
                          <h6>6. That my personal and sensitive personal information shall not be disclosed or trasnferred to any other individuals or entities without my express consent.</h6><br>
                          <h6>By affixing my signature (or by participating in this evaluation process), I hereby agree with the foregoing conditions and subscribe to the University's virtue of upholding the fundamental human right to privacy, in compliance to Republic Act 10173 or the Data PRivacy Act of 2012.</h6><br>
                        </div>
                  </div>
                  <form method="POST">
                  <div class="col-sm">
                        <div style="background-color: #193541; padding: 20px 10px;">
                          <div class="info" style="color: #FFFFFF;"><h5>Seminar/Training Evaluation Form</h5>
                          </div>
                        </div>
                        <div class="tile" style="border-width: 3px; border-style: solid; border-color: #193541; ">
                          <h6>I. INFORMATION</h6><input type="hidden" name="student_id" id="student_id" value=""><br>  
                    <div class="info">

                    <table width="100%" border="2px" style="border-bottom: 0px;" cellpadding="5px" >
                      <tr>
                      <td width="50%">Name of Participant/Respondents:</td>
                      <td width="50%"><input type="text" name="studname" value="<?php echo $fname." ".$mname." ".$lname." ".$sname.' '.$id; ?>" id="studname" style="width: 500px; height: 30px; border-style: hidden;"></td>
                      </tr>
                      <tr>
                      <td>Sex:</td>
                      <td width="50%"><input type="text" name="sex" value="<?php echo $sex ?>" id="sex"  style="width: 500px; height: 30px; border-style: hidden;"></td>
                      </tr>
                      <tr>
                        <td>Campus:</td>
                        <td width="50%"><select  name="campus" value="<?php echo $campus ?>"id="campus" style="width: 500px; height: 30px; border-style: hidden;" required="">
                          <option class="select-item">Select Campus</option>
                          <option class="select-item" value="Obrero">Obrero</option>
                        <option class="select-item"   value="Mintal">Mintal</option>
                        <option class="select-item"  value="Tagum-Mabini">Tagum-Mabini</option>
                       
                            </td>
                          </tr>
                      <tr>
                        <td>Course and Year:</td>
                        <td width="50%"><input type="text" name="course_year" value="<?php echo $course." - ".$year ?>" id="course_year" style="width: 500px; height: 30px; border-style: hidden;"></td>
                      </tr>
                      <tr>
                        <td>Title of Activity:</td>
                        <td width="50%"><select  name="filtervenueDate" id="filtervenueDate" style="width: 500px; height: 30px; border-style: hidden;" required="">
                          <option class="select-item">Select Topic</option>
                        <?php 
                          
                         $sql="SELECT participants.Student_id, group_guidance.appointment_id,group_guidance.topic, group_guidance.appointment_id FROM group_guidance JOIN guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id JOIN participants on participants.grp_guidance_id=group_guidance.grp_guidance_id where guidance_appointments.status_id='1' and LOWER(participants.attendance) like LOWER('attended') and participants.Student_id='$id'";
                          $result = $conn->query( $sql); 
                          if(!$result ) { 
                              die('Could not get data: ' . $conn->connect_error); 
                          }
                          
                          while($row = $result->fetch_assoc()){ 
                       ?>
                                  <option id="<?php echo $row['appointment_id']; ?>" class="select-item" value="<?php echo $row['appointment_id'];?>"><?php echo $row['topic'];?></option>
 
                       <?php } ?>           
                      </select></td>
                      </tr>
                    </table>
                      <div class="venueDate">
                        <table width="100%" border="2px" style="border-top: 0px;" cellpadding="5px" >
                      <tr>
                        <td>Venue:</td>
                        <td width="50%"><input type="text" name="venue" id="venue" value="<?php echo $row['communication_mode']; ?>" style="width: 500px; height: 30px; border-style: hidden;"></td>                      
                      </tr>
                      <tr>
                        <td>Date:</td>
                        <td width="50%"><input type="text" name="act_date" id="act_date" value="<?php echo $row['appointment_date'].' '.$row['appointment_time'];?>" style="width: 500px; height: 30px; border-style: hidden;" required></td>
                      </tr>
                    </table>
                      </div>
                    
                    </div><br>
                    <h6>II. CONTENT OF THE ACTIVITY</h6>
                    <div>On a scale of 1 to 5, 5 being the highest, please rate the session based on the following questions.</div><br>
                    <div class="info">
                    <table width="100%" border="2px" cellpadding="8px" >
                      <tr style="text-align:center; font-size:16px; font-weight: bold;">
                        <td>Questions</td>
                        <td>Ratings</td>
                      </tr>
                      <tr>
                        <td width="60%">1. The activity fully met my expectations.</td>
                        <td align="center" width="40%">
                      <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c1" type="radio" name="content1" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c2" type="radio" name="content1" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c3" type="radio" name="content1" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c4" type="radio" name="content1" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c5" type="radio" name="content1" value="1">1
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2. The scope of the activity was adequate.</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c12" type="radio" name="content2" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c22" type="radio" name="content2" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c32" type="radio" name="content2" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c42" type="radio" name="content2" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c52" type="radio" name="content2" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3. The activity is useful and applicable in a real life settings.</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c13" type="radio" name="content3" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c23" type="radio" name="content3" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c33" type="radio" name="content3" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c43" type="radio" name="content3" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c53" type="radio" name="content3" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>4. The methodologies used were effective</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c14" type="radio" name="content4" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c24" type="radio" name="content4" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c34" type="radio" name="content4" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c44" type="radio" name="content4" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c54" type="radio" name="content4" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>5. I had enough opportunities to express my own ideas.</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c15" type="radio" name="content5" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c25" type="radio" name="content5" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c35" type="radio" name="content5" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c45" type="radio" name="content5" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c55" type="radio" name="content5" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td width="60%">6. The other materials (e.g., videos, presentations) were useful in making
 the activity more interesting,</td>
                        <td width="40%">
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c16" type="radio" name="content6" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c26" type="radio" name="content6" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c36" type="radio" name="content6" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c46" type="radio" name="content6" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c56" type="radio" name="content6" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>7. I gained new and important ideas or insight thru the activity</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c17" type="radio" name="content7" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c27" type="radio" name="content7" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c37" type="radio" name="content7" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c47" type="radio" name="content7" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c57" type="radio" name="content7" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>8. How would you rate the objectives of the activity</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c18" type="radio" name="content11" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c28" type="radio" name="content11" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c38" type="radio" name="content11" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c48" type="radio" name="content11" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c58" type="radio" name="content11" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>9. How would you rate the relevance/importance of the activity</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c19" type="radio" name="content12" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c29" type="radio" name="content12" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c39" type="radio" name="content12" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c49" type="radio" name="content12" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c59" type="radio" name="content12" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                    </table>
                    </div><br>
                    <div class="info">
                    <table width="100%" border="2px" cellpadding="5px" >
                      <tr>
                        <td width="50%">What activity process, session or topic needs further clarification?
                        </td>
                        <td width="50%"><input type="text" name="content8" id="content8" style="width: 500px; height: 35px; border-style: hidden;" required=""></td>
                      </tr>
                      <tr>
                        <td>What are the factors / things that helped me understand the topic s discussed?
                        </td>
                        <td width="50%"><input type="text" name="content9" id="content9" style="width: 500px; height: 35px; border-style: hidden;" required=""></td>
                      </tr>
                      <tr>
                        <td>What are the factors / things that hindered me from participating in the activity?</td>
                        <td width="50%"><input type="text" name="content10" id="content10" style="width: 500px; height: 35px; border-style: hidden;" required=""></td>
                      </tr>
                      <tr>
                        <td>What have you learn in this activity?
                        </td>
                        <td width="50%"><input type="text" name="content13" id="content13" style="width: 500px; height: 35px; border-style: hidden;" required=""></td>
                      </tr>
                    </table>
                  </div><br>
                  <h6>III. RESOURSE PERSON/SESSION PRESENTER</h6>
                    <div>On a scale of 1 to 5, 5 being the highest, please rate the session based on the following questions.</div><br>
                    <div class="form-group">
                      Speaker:&nbsp; <input type="text" value="" id="speaker" name="speaker" style=" text-align: center; width:300px; border-style:solid; border-left: none; border-top: none; border-right: none;" required=""><br>
                    </div>
                    <div class="form-group">
                      Topic:&nbsp; <input type="text" value="" id="topic" name="topic" style=" text-align: center; width:500px; border-style:solid; border-left: none; border-top: none; border-right: none;" required=""><br>
                    </div>
                    <div class="info">
                    <table width="100%" border="2px" cellpadding="8px" >
                      <tr>
                        <td width="60%">1. The presenter displayed a thorough knowledge of the topic and was able to provide insights.</td>
                        <td align="center" width="40%">
                      <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R1" type="radio" name="resource1" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R2" type="radio" name="resource1" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R3" type="radio" name="resource1" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R4" type="radio" name="resource1" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R5" type="radio" name="resource1" value="1">1
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2. The presenter explained and processed the activities thoroughly.</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R12" type="radio" name="resource2" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R22" type="radio" name="resource2" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R32" type="radio" name="resource2" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R42" type="radio" name="resource2" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R52" type="radio" name="resource2" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3. The presenter sustained the attention of the participants and encouraged their participation.</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R13" type="radio" name="resource3" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R23" type="radio" name="resource3" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R33" type="radio" name="resource3" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R43" type="radio" name="resource3" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R53" type="radio" name="resource3" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>4. The presenter was able to create a good learning climate.</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R14" type="radio" name="resource4" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R24" type="radio" name="resource4" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R34" type="radio" name="resource4" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R44" type="radio" name="resource4" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R54" type="radio" name="resource4" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>5. The presenter was able to manage her / his time well.</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R15" type="radio" name="resource5" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R25" type="radio" name="resource5" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R35" type="radio" name="resource5" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R45" type="radio" name="resource5" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R55" type="radio" name="resource5" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>6. The presenter was sensitive to the participants needs.</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R16" type="radio" name="resource6" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R26" type="radio" name="resource6" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R36" type="radio" name="resource6" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R46" type="radio" name="resource6" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R56" type="radio" name="resource6" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>7. How would you rate the speaker of the activity.</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R17" type="radio" name="resource7" value="5" required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R27" type="radio" name="resource7" value="4">4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R37" type="radio" name="resource7" value="3">3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R47" type="radio" name="resource7" value="2">2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R57" type="radio" name="resource7" value="1">1 
                      </label>
                      </div>
                        </td>
                      </tr>
                    </table>
                    </div><br>
                    <div class="info">
                      No printed attendance sheet, no one to buy miscellaneous materials for the activity needed by the resource speaker.   
                    </div><br>
                    <div class="form-group">
                    <label for="comment" style="font-weight: bold;">Comment:</label>
                    <textarea class="form-control" style="border-color: gray;" id="comment" name="comment" rows="3"></textarea>
                    </div><br>                  
                  

                            <center>
                              <button class="btn btn-success" type="submit" name="submitForm">Submit</button>&emsp;&emsp;&emsp;
                              <div class="btn-group"><a class="btn btn-danger" href="Guidance_Student_Evaluation.php">Cancel</a></div>
                            </center>
                        </form>
                        </div>
                  </div>
                </div>
              </div>


        <!--</div>-->




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
       <script type="text/javascript">

                $(document).ready(function(){
                  $("#filtervenueDate").on('change', function(){
                    var id = $(this).val();
                   
                    $.ajax({
                          url:"venueDate.php",
                          type:"POST",
                          data:{id: id},
                          beforeSend:function(){
                            $(".venueDate").html("Working.....");
                          },
                          success:function(data){
                            $(".venueDate").html(data);
                          },
                    });
                    
                
                  });});
                </script>
                <?php  $sql2="SELECT seminar_evaluation.appointment_id from seminar_evaluation JOIN group_guidance on group_guidance.appointment_id= seminar_evaluation.appointment_id WHERE seminar_evaluation.Student_id='$id'";
                                      $result = $conn->query( $sql2); 
                                      if(!$result ) { 
                                      die('Could not get data: ' . $conn->connect_error); 
                                      } ?>
                                     <script type="text/javascript">
                                        $(document).ready(function(){
                                      <?php
                                      while($row = $result->fetch_assoc()){ 
                                          $holder= '#'.$row['appointment_id'];
                                        ?>  
                                      $("<?php echo $holder;?>").prop("hidden", true);
                                      <?php }?>
                                    });
                                    </script>
      <script>
// required STUDENT SEMINAR EVALUATION

$(document).ready(function(){
$('input[name=act_title]').blur(function(){
if($(this).val().length == 0){
document.getElementById('act_title').style.backgroundColor='#FFCECE';
document.getElementById('act_title').style.border='1px solid red';
}
else{
  document.getElementById('act_title').style.backgroundColor='#FFFF';
  document.getElementById('act_title').style.border='1px solid black';
}});
});
$(document).ready(function(){
$('input[name=act_date]').blur(function(){
if($(this).val().length == 0){
document.getElementById('act_date').style.backgroundColor='#FFCECE';
document.getElementById('act_date').style.border='1px solid red';
}
else{
  document.getElementById('act_date').style.backgroundColor='#FFFF';
  document.getElementById('act_date').style.border='1px solid black';
}});
});
$(document).ready(function(){
$('input[name=content8]').blur(function(){
if($(this).val().length == 0){
document.getElementById('content8').style.backgroundColor='#FFCECE';
document.getElementById('content8').style.border='1px solid red';
}
else{
  document.getElementById('content8').style.backgroundColor='#FFFF';
  document.getElementById('content8').style.border='1px solid black';
}});
});
$(document).ready(function(){
$('input[name=content9]').blur(function(){
if($(this).val().length == 0){
document.getElementById('content9').style.backgroundColor='#FFCECE';
document.getElementById('content9').style.border='1px solid red';
}
else{
  document.getElementById('content9').style.backgroundColor='#FFFF';
  document.getElementById('content9').style.border='1px solid black';
}});
});
$(document).ready(function(){
$('input[name=content10]').blur(function(){
if($(this).val().length == 0){
document.getElementById('content10').style.backgroundColor='#FFCECE';
document.getElementById('content10').style.border='1px solid red';
}
else{
  document.getElementById('content10').style.backgroundColor='#FFFF';
  document.getElementById('content10').style.border='1px solid black';
}});
});
$(document).ready(function(){
$('input[name=speaker]').blur(function(){
if($(this).val().length == 0){
document.getElementById('speaker').style.backgroundColor='#FFCECE';
document.getElementById('speaker').style.border='1px solid red';
}
else{
  document.getElementById('speaker').style.backgroundColor='#FFFF';
  document.getElementById('speaker').style.border='1px solid black';
}});
});
$(document).ready(function(){
$('input[name=topic]').blur(function(){
if($(this).val().length == 0){
document.getElementById('topic').style.backgroundColor='#FFCECE';
document.getElementById('topic').style.border='1px solid red';
}
else{
  document.getElementById('topic').style.backgroundColor='#FFFF';
  document.getElementById('topic').style.border='1px solid black';
}});
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