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
      <link href="http://fonts.cdnfonts.com/css/olde-english" rel="stylesheet">  
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="cssg/all.min.css">
      <link rel="stylesheet" type="text/css" href="cssg/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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


  if(isset($_POST['submitEval'])){

    $course_year = $_POST['stud_id'];
    $date_eval= $_POST['date_eval'];
    $guidance_code = $_POST['guidance_code'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $comment = $_POST['comment'];

    $sql="INSERT into counselling_evaluation(Student_id, eval_date, eval_code, radio_q1, radio_q2, radio_q3, comments) values ('$course_year','$date_eval','$guidance_code','$question1','$question2','$question3','$comment')";

if(mysqli_multi_query($conn,$sql)){

$result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, time, link, message_status) values (NULL,'$admin_id', 'A new counselling evaluation has been submitted.',now(),'Guidance_Evaluation_Reports.php', 'Delivered')");

  if($result){

 echo '<script>
        swal({
            title: "Evaluation Form Submitted!",
            text: "Server Request Successful!",
            icon: "success",
            buttons: false,
            timer: 1800,
            closeOnClickOutside: true,
              closeOnEsc: false,
        })
         setTimeout(myFunction, 1800);
      </script>';
      ?>
      <script>
        function myFunction() {
          window.location="Guidance_Student_Evaluation.php";
        }
      </script><?php
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
    }}
  }
      ?>

      <div class="row d-flex justify-content-center">
          <div class="col-md-11">
            <a class="float-right" href="Guidance_Student_Evaluation.php"><i class="fas fa-arrow-left"> Back</i></a>
                <div>
                <div>
                <div class="float-left"><h4>EVALUATION OF TELECOUNSELLING SERVICES </h4></div><br><br>
                <h6>Good day! You are viewing this online form since you've undergone Telecounselling services from the University Assessment and Guidance Center. We would like to request for your feedback regarding your experience of this service.</h6>
                  </div><br>
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
                  <?php
 
    $sql="SELECT student.Student_id, student.year_level, course.title FROM student join course USING(course_id) where Student_id='$id' ";
    $result1 = $conn->query($sql);
      if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {

    $stud_id = $row['Student_id'];
    $course = $row['title'];
    $year = $row['year_level'];
  }}

                  ?>
                  <div class="col-sm">
                        <div style="background-color: #193541; padding: 20px 10px;">
                          <div class="info" style="color: #FFFFFF;"><h5>Evaluation Form</h5>
                          </div>
                        </div>
                        <div class="tile" style="border-width: 3px; border-style: solid; border-color: #193541; text-align: justify; ">
                          <h6>INSTRUCTION! Please answer the evaluation form honestly. Evaluate the offices based on the level of your satisfaction in their respective services. Items with ** badges are required fields. The evaluation form cannot be submitted unless all required fields are answered. Once done in answering the form, click/tap the Submit button on the buttom of the page to submit the evaluation.</h6><br>
                    <form method="POST">      
                    <div class="tile" style="border-width: 2px; border-style: solid; border-radius: 10px;">
                    <div class="form-group">
                    <label for="exampleInputcourseyear"><h6>Course and Year: **</h6></label>
                    <input class="form-control" id="course_year" type="text" value="<?php echo $course." - ".$year ?>" name="course_year" aria-describedby="Course and Year" placeholder="Enter Course and Year">
                    <input class="form-control" id="stud_id" type="hidden" value="<?php echo $stud_id ?>" name="stud_id">
                    </div>
                    </div>
                    <div class="tile" style="border-width: 2px; border-style: solid; border-radius: 10px;">
                    <div class="form-group">
                    <label for="exampleInputdate"><h6>Date: **</h6></label>
                    <input class="form-control" id="date_eval" type="date" name="date_eval" aria-describedby="date" value="<?php echo date('Y-m-d');?>" readonly="">
                    </div>
                    </div>

                    <div class="tile" style="border-width: 2px; border-style: solid; border-radius: 10px;">
                    <div class="form-group">
                    <label for="exampleInputcode"><h6>Guidance Services (CODE): **</h6></label>
                    <input class="form-control" id="guidance_code" name="guidance_code" type="text" aria-describedby="code" placeholder="Enter Code" required="">
                    </div>
                    </div>
                    
                          <h6>Rate the services rendered using the following scales:</h6><br>
                          <h6>1 - Poor&emsp;&emsp;&emsp;2 - Fair&emsp;&emsp;&emsp;3 - Satisfactory&emsp;&emsp;&emsp;4 - Very Satisfactory&emsp;&emsp;&emsp;5 - Excellent</h6><br>

                          <center><div class="col-md-11"></center>
                            <div class="tile" style="border-width: 2px; border-style: solid; border-radius: 10px;">
                              <div class="info"><h6>Quality (Effectiveness) of the Service: **</h6></div><br>
                              <fieldset class="form-group">
                    <div class="form-check" >
                      <label class="form-check-label" id="question1" name="question1">
                        <input class="form-check-input" id="optionsRadios1" type="radio" name="question1" required="" value="Poor">1 - Poor
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="optionsRadios2" type="radio" name="question1" required="" value="Fair">2 - Fair
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="optionsRadios3" type="radio" name="question1" required="" value="Satisfactory">3 - Satisfactory
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="optionsRadios4" type="radio" name="question1" required="" value="Very Satisfactory">4 - Very Satisfactory
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="optionsRadios5" type="radio" name="question1" required="" value="Excellent">5 - Excellent
                      </label>
                    </div>
                  </fieldset>
                            </div>

                            <div class="tile" style="border-width: 2px; border-style: solid; border-radius: 10px;">
                              <div class="info"><h6>Timeliness (Waiting Period): **</h6></div><br>
                              <fieldset class="form-group">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" id="Radios1" type="radio" name="question2" value="Poor" required="">1 - Poor
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="Radios2" type="radio" name="question2" value="Fair">2 - Fair
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="Radios3" type="radio" name="question2" value="Satisfactory">3 - Satisfactory
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="Radios4" type="radio" name="question2" value="Very Satisfactory">4 - Very Satisfactory
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="Radios5" type="radio" name="question2" value="Excellent">5 - Excellent
                      </label>
                    </div>
                  </fieldset>
                            </div>

                            <div class="tile" style="border-width: 2px; border-style: solid; border-radius: 10px;">
                              <div class="info"><h6>Client/Student's Satisfaction: **</h6></div><br>
                              <fieldset class="form-group">
                    <div class="form-check">
                      <label class="form-check-label" id="question3">
                        <input class="form-check-input" id="optionsRad1" type="radio" name="question3" value="Poor" required="">1 - Poor
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="optionsRad2" type="radio" name="question3" value="Fair">2 - Fair
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="optionsRad3" type="radio" name="question3" value="Satisfactory">3 - Satisfactory
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="optionsRad4" type="radio" name="question3" value="Very Satisfactory">4 - Very Satisfactory
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="optionsRad5" type="radio" name="question3" value="Excellent">5 - Excellent
                      </label>
                    </div>
                  </fieldset>
                            </div>

                    <div class="tile" style="border-width: 2px; border-style: solid; border-radius: 10px;">
                    <div class="form-group">
                    <label for="exampleInputcomments"><h6>Other comments and suggestions:</h6></label>
                    <input class="form-control" id="comment" name="comment" type="text" aria-describedby="comments" placeholder="Enter Comments">
                    </div>
                    </div>
                            <center>
                              <button class="btn btn-success" type="submit" name="submitEval">Submit</button>&emsp;&emsp;&emsp;
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
      <script>

// required SET APPOINTMENT FOR REFERRALS

$(document).ready(function(){
$('input[name=date_eval]').blur(function(){
if($(this).val().length == 0){
document.getElementById('date_eval').style.backgroundColor='#FFCECE';
document.getElementById('date_eval').style.border='1px solid red';
}});
});
$(document).ready(function(){
$('input[name=guidance_code]').blur(function(){
if($(this).val().length == 0){
document.getElementById('guidance_code').style.backgroundColor='#FFCECE';
document.getElementById('guidance_code').style.border='1px solid red';
}});
});
$(document).ready(function(){
$('label[name=question1]').blur(function(){
if($(this).val().length == 0){
document.getElementById('question1').style.backgroundColor='#FFCECE';
document.getElementById('question1').style.border='1px solid red';
}});
});

// required SET APPOINTMENT FOR REFERRALS

$(document).ready(function(){
$('input[name=date_accomplished]').blur(function(){
if($(this).val().length == 0){
document.getElementById('date_accomplished').style.backgroundColor='#FFCECE';
document.getElementById('date_accomplished').style.border='1px solid red';
}});
});
$(document).ready(function(){
$('textarea').blur(function(){
if($(this).val().length == 0){
document.getElementById('concerns').style.backgroundColor='#FFCECE';
document.getElementById('concerns').style.border='1px solid red';
}});
});
      </script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="jsg/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="jsg/plugins/dataTables.bootstrap.min.js"></script>
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