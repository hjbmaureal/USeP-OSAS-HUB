<?php   
  include('../../conn.php');
  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Student'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;

  if(isset($_POST['submitTask'])){
    $flag = false;
    $id=$_SESSION['id'];
    $period = $_POST['period'];
    $hours = intval($_POST['total_hours']);
    $salary_rate = floatval($_POST['salary_rate']);
    $salary = $hours * $salary_rate;
    $semyear = $_POST['semester_year'];
    $appid = $_POST['applicant_id'];
    $supe = $_POST['supervisor_id'];
    $name = $_SESSION['fullname'];
    $from = $_POST['min_date'];
    $to = $_POST['max_date'];
 
    // var_dump($salary_rate);
    // var_dump($salary);
    // var_dump($hours);

    $flag = mysqli_query($conn,"INSERT INTO notif (message_body,link,office_id) VALUES ('".$name." has submitted an accomplishment report for the period ".$period."', '../users/Osas/Labor-Accomplishment.php', 1)");

    $flag = mysqli_query($conn,"INSERT INTO notif (message_body,link,user_id) VALUES ('".$name." has submitted an accomplishment report for the period ".$period."', '../users/Faculty/Faculty-Accomplishment.php', ".$supe.")");

    foreach ($_POST['taskTextArea'] as $key => $value) {
        $flag = mysqli_query($conn,"INSERT INTO accomplishment_task (applicant_id,student_id,task, date_from, date_to, date_posted) VALUES ($appid,'$id','$value','$from','$to',curdate())");
      }


    $flag = mysqli_query($conn,"INSERT INTO sl_dtr_report (applicant_id, date_from, date_to, semester_year, total_hours, salary) VALUES ($appid,'$from','$to','$semyear',$hours,$salary)");


    if ($flag) {
      header("Location: index.php");
    } else {
      echo '<script>alert("Server Error '.mysqli_connect_error().'")</script>';
    }
  }

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
      <link rel="stylesheet" type="text/css" href="../../css/main_main.css">
      <link rel="stylesheet" type="text/css" href="../../css/upstyle_main.css">
      <link rel="stylesheet" type="text/css" href="../../css/upstyle_shy.css">
      <link rel="stylesheet" href="../../css/owl.carousel.min.css">
      <link rel="stylesheet" href="../../css/owl.theme.default.min.css">
      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      </head>
      <body class="app sidebar-mini rtl" onload="initClock()">
      <!-- Navbar-->
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
                                 <li><a class="treeview-item " href="Home-Labor.php">Home</a></li>
                                  <li><a class="treeview-item" href="Labor-Dtr.php">DTR</a></li>
                                  <li><a class="treeview-item active" href="Labor-Accomplishments.php">Accomplishment Reports</a></li>
            
            
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
            if($result = mysqli_query($conn, "SELECT * FROM list_of_semester")){
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
      <!-- Navbar-->
        <div class="row">
        <div class="col-md">
          <div style="background-color: #C12C32; padding: 8px 10px;"> </div>
          <div class="tile">
            <h3 class="tile-title">Accomplishment Report</h3>
                        <div class="tile-footer"></div>
            <div class="tile-body" > 
                <?php     
                    $result = mysqli_query($conn , "call MainGetDataFromSLView('Labor-Accomplishments.php','$id','','');");
                    $row=mysqli_fetch_array($result);
                ?>
                <div class="row">
                <div class="col-sm">               
                <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"><?php  echo $row['student_name'] ?></span></h6>
                </div>
                <div class="col-sm-6">               
                <h6 class="font-weight-bold">Course and Year Level: <span class="font-weight-lighter ml-2"><?php echo $row['course_yr'] ?></span></h6>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm">               
                <h6 class="font-weight-bold">Class: <span class="font-weight-lighter ml-2"><?php echo $row['class'] ?></span></h6>
                </div>
                <div class="col-sm-6">               
                <h6 class="font-weight-bold">Type of Student Labor: <span class="font-weight-lighter ml-2"><?php echo $row['type'] ?></span></h6>
                </div>
              </div>

                <h6 class="font-weight-bold">UNIT/COLLEGE ASSIGNED: <span class="font-weight-lighter ml-2"><?php echo $row['assigned'] ?></span></h6>

                <br>  


              <form class="form-horizontal" action="" method="POST">
                <input type="hidden" name="salary_rate" value="<?php echo $row['salary_rate'] ?>">
                <input type="hidden" name="semester_year" value="<?php echo $row['semester_year'] ?>">
                <input type="hidden" name="applicant_id" value="<?php echo $row['applicant_id'] ?>">
                <input type="hidden" name="supervisor_id" value="<?php echo $row['requested_by'] ?>">
                <div class="form-group row">
                  <label class="control-label col-sm-3 font-weight-bold">I. &emsp;ACCOMPLISHED TASK for the period</label>

                  <div class="col-sm-4">
                      <div class="input-group input-daterange">

                        <input type="text" id="min-date" class="form-control date-range-filter mx-2 col-sm-5" data-date-format="yyyy-mm-dd" name="min_date" placeholder="From:">


                        <input type="text" id="max-date" class="form-control date-range-filter mx-2 col-sm-5" data-date-format="yyyy-mm-dd" name="max_date" placeholder="To:">

                        <input type="hidden" id="period" name="period">


                        <button type="button" class="btn btn-icon btn-danger btn-md text-white col-sm-2 p-1" id="get-hours">Validate</button>

                      </div>
                  </div>
                  <!-- <div class="col-sm-3">
                    <select class="form-control test-input text-input" id="month" name="month" required> 
                      <option class="select-item" value="" selected="selected">Month</option>
                      <option class="select-item" value="January">January</option>
                      <option class="select-item" value="February">February</option>
                      <option class="select-item" value="March">March</option>
                      <option class="select-item" value="April">April</option>
                      <option class="select-item" value="May">May</option>
                      <option class="select-item" value="June">June</option>
                      <option class="select-item" value="July">July</option>
                      <option class="select-item" value="August">August</option>
                      <option class="select-item" value="September">September</option>
                      <option class="select-item" value="October">October</option>
                      <option class="select-item" value="November">November</option>
                      <option class="select-item" value="December">December</option>
                    </select>
                  </div> -->
                 <div class="col-sm-2">
                  <input type="button" class="btn btn-icon btn-danger btn-md float-right mb-2 ml-1 text-white validate" value="Add Task" id="addTask">
                </div>
                </div>
                <div id="listOfTaskContainer">

                  <div class="form-group row">
                    <label class="control-label col-sm-1 font-weight-bold">1.</label>
                    <div class="col-sm-8">
                      <textarea class="form-control test-input validate" name="taskTextArea[]" rows="4" required disabled></textarea>
                    </div>
                  </div>

                </div>


                <br>
                <div class="form-group row">
                  <label class="control-label col-sm-4 font-weight-bold">II.&emsp;TOTAL NUMBER OF HOURS WORKED: </label>
                  <div class="col-sm-5">
                    <input class="form-control validate" type="text" placeholder="" id="total-hours" name="total_hours" readonly>
                  </div>
                </div>
                <br>
                <br>


<!--                 <div class="row">
                <div class="form-group col-sm-3">
                <img class="e-sign" src="../../images/e-sign/pirma.png"><br>
                <span class="font-weight-lighter "><p class="Signature "></span><br>
                <span class="font-weight-lighter text-capitalize">
                <?php  //echo $row['student_name'] ?></span>
                <p>Student's Signature
                </p>  
                </div> 
              </div>
 -->
              <div class="tile-footer"></div>
            <span class="btn btn-success validate" id="testsubmit">Submit</span>
            <button class="btn btn-success collapse" id="submitfrm" type="submit" name="submitTask">Submit</button>
             <button class="btn btn-primary" type="reset">Cancel</button>

          </form>
        </div>
      </div>
    </div>
  </div>

    <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
      <!-- <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script> -->
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
      
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
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../../js/jquery.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var count = 1;
      const months = ['January','February','March','April','May','June','July','August','September','October','November','December'];


         // Bootstrap datepicker
          $('.input-daterange input').each(function() {
            $(this).datepicker('clearDates');
          });

      $('#addTask').on('click', function(){
        count++;
        var content = '<div class="form-group row"><label class="control-label col-sm-1 font-weight-bold">'+count+'.</label><div class="col-sm-8"><textarea class="form-control test-input" name="taskTextArea[]" rows="4" required></textarea></div></div>';
        $('#listOfTaskContainer').append(content);
      })


      $('#testsubmit').click(function(){
        Swal.fire({
          title: 'Are you sure?',
          text: "You can only send your accomplishment report once per month!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes!'
        }).then((result) => {
          if (result.isConfirmed) {
            var flag = testInput();
            console.log(flag);
            if (flag){
              $('#submitfrm').trigger('click');
            } else {
              Swal.fire("Fill in all input!");
            }
          }
        })


      });

    $(document).on("click","#get-hours",function(){
      let min = $("#min-date").val();
      let max = $("#max-date").val();
      let min_date = new Date(min);
      let max_date = new Date(max);
      let val = months[min_date.getMonth()]+" "+min_date.getDate()+", "+min_date.getFullYear()+" to "+ months[max_date.getMonth()]+" "+max_date.getDate()+", "+max_date.getFullYear();
      $('#period').val(val);
      $('input .form-control').val('');
      $('textarea').val('');
              $.ajax({
                url:"../../php/O-StudentDefault/otherqueries.php",
                method:"POST",
                data:{queryid:5, from: min, to: max},
                success:function(response)
                 {
                      try {
                        var obj = JSON.parse(response);

                        let stat = obj[0].report_status;
                        let hours = obj[0].total_hours;
                        if (stat == 'Report not submitted' && hours !=null){
                          $('#total-hours').val(parseInt(hours)+" hours");
                          $('input').prop("disabled",false);
                          $('textarea').prop("disabled",false);
                        } else if(stat == 'Report not submitted' && hours ==null){
                            Swal.fire(
                              'Error',
                              'You have no DTR for the period <br><b>'+ val +'</b>',
                              'error'
                            );
                          $('#total-hours').val('');
                          $('.validate').prop("disabled","disabled");
                        } else {
                          Swal.fire(
                            'Ooops',
                            'You have already submitted your report for the period <br><b>'+ val +'</b>',
                            'warning'
                          );
                          $('#total-hours').val('');
                          $('.validate').prop("disabled","disabled");
                        }

                      } catch (e) {
                        alert("Server error. Reload page."+e);
                      }                                       
                 },
                error: function(response){
                    alert("fail" + JSON.stringify(response));
                 }
              });
    });

      $('#month').change(function(){
        let val = $(this).val().trim();
        $('input .form-control').val('');
        $('textarea').val('');
              $.ajax({
                url:"../../php/O-StudentDefault/otherqueries.php",
                method:"POST",
                data:{queryid:5, month: val},
                success:function(response)
                 {
                      try {
                        var obj = JSON.parse(response);
                        let stat = obj[0].report_status;
                        let hours = obj[0].total_hours;
                        if (stat == 'Report not submitted' && hours !=null){
                          $('#total-hours').val(parseInt(hours)+" hours");
                          $('input').prop("disabled",false);
                          $('textarea').prop("disabled",false);
                        } else if(stat == 'Report not submitted' && hours ==null){
                            Swal.fire(
                              'Error',
                              'You have no DTR for the month of '+val,
                              'error'
                            );
                          $('#total-hours').val('');
                          $('.validate').prop("disabled","disabled");
                          // $('textarea').prop("disabled","disabled");
                        } else {
                          Swal.fire(
                            'Ooops',
                            'You have already submitted your report for the month of '+val,
                            'warning'
                          );
                          $('#total-hours').val('');
                          $('.validate').prop("disabled","disabled");
                          // $('textarea').prop("disabled","disabled");
                        }

                      } catch (e) {
                        alert("Server error. Reload page."+e);
                      }                                       
                 },
                error: function(response){
                    alert("fail" + JSON.stringify(response));
                 }
              });
      });


    });

    $('.owl-carousel').owlCarousel({
        loop:false  ,
        margin:10,
        nav:true,
        dots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });


    function testInput(){
      var flag = true;
      $( ".test-input" ).each(function( index ) {
        if ($(this).val().trim().length < 1) {
          $(this).focus();
          flag = false;
          return false;
        }
      });
      return flag;  
    }

  </script>

  </body>
</html>
  </body>
</html>