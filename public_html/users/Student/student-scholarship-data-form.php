<?php
 //session script, open for updates for other modules
//  include_once('../../php_/user-session.php');
session_start();
  include_once('../../php/notification-timeago.php'); 
  include_once('../../conn.php');
  //authenticate if logged in and user is the correct user
 /* checkSessionAuth($_SESSION['id'],$_SESSION['usertype']);
  checkSessionTime();*/
  //assign session_id in php var
  $session_id = $_SESSION['id'];

  $count = 0;
    $job_count = 0;
  $query=mysqli_query($conn,"SELECT count(*) AS cnt FROM notif WHERE user_id='$session_id' AND message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){
    $count = $row['cnt'];
  }
  $query2=mysqli_query($conn,"SELECT count(*) as cnt from job_hiring_announcement");
  while($row=mysqli_fetch_array($query2)){ $job_count = ($row['cnt']==0) ? '' : $row['cnt'] ;}

  $semester_year;
  $sql = mysqli_query($conn,"SELECT * FROM list_of_semester WHERE status = 'Active'");
  while($row=mysqli_fetch_assoc($sql)){
    $semester_year = $row['semester'].' '.$row['year'];
    $semester = $row['semester'];
    $year = $row['year'];
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
      <title>USeP Student Hub</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../css/upstyle.css">
    <link rel="stylesheet" type="text/css" href="../../css/custom.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl" onload="initClock()">
    <!-- Navbar-->
    <header class="app-header">
      <!-- CODE HERE -->
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
                $org_select=mysqli_query($conn,"SELECT * from approve_funded where org_pres_gov like '$session_id%'");
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
                <a class="app-menu__item active" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fas fa-handshake-o"></i>
                    <span class="app-menu__label">Scholarship Services  </span>
                    <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="student-scholarship-dashboard.php">Home</a></li>
              <li><a class="treeview-item active" href="student-scholarship-data-form.php">Scholarship Data Form</a></li>

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

    <main class="app-content">
      
      <!-- MARKER FOR USER -->
      <input type="text" id="session_id" value="<?php echo $session_id ?>" hidden readonly>
      <input type="text" id="semester_year" value="<?php echo $semester_year ?>" hidden readonly>
      <!-- navbar -->
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
</script> <!-- END OF NAVBAR -->
      <!-- Main Content -->
      <div class="main-content-student">
        <div class="container-fluid border border-success bg-data-form rounded">
          <form method="POST" class="needs-validation" novalidate id="forms" action="../../php/studentApplyScholar.php">
            <br>
            <!-- FIRST ROW CONTAINING THE TITLE -->
            <div class="row">
              <div class="col-md-12">
                <label for="sdfScholarshipName">Name of Scholarship Program</label>
                <select name="sdfScholarshipName" id="sdfScholarshipName" class="form-control" required>
                  <option value="">Please Select</option>
                  <?php 
                      $query=mysqli_query($conn,"select * from scholarship_program");
                      while($row=mysqli_fetch_array($query)){
                        echo'
                          <option value="'.$row['program_id'].'">'.$row['program_name'].'</option>
                        ';
                      }
                    ?>
                </select>
                <div class="invalid-tooltip">
                  Please enter Program
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <label for="sdfIDNumber">ID Number</label>
                <input name="sdfIDNumber" type="text" id="sdfIDNumber" value="<?php echo $session_id ?>" class="form-control"  required>
              </div>
              <div class="col-sm-12 col-md-6 mb-4">
                <label for="sdfSemesterSY">Semester School Year</label>
                <?php 
                  $query=mysqli_query($conn,"SELECT * from list_of_semester WHERE status = 'active'");
                  while($row=mysqli_fetch_array($query)){
                    echo'
                      <input type="text" class="form-control" value="'.$row['semester'].' '.$row['year'].'" readonly>
                    ';
                  }
                ?>        
              </div>

              <div class="col-sm-12">
                <h6>PERSONAL INFORMATION</h6>
              </div>
              <div class="col-sm-auto col-md-4 pr-5 custom-control custom-radio custom-control-inline">
                <input name="typeOfStudy" type="radio" id="sdfUndergraduate" class="custom-control-input" value="Undergraduate" disabled>
                <label for="sdfUndergraduate" class="custom-control-label">Undergraduate</label>
              </div>
              <div class="col-sm-auto col-md-4 pr-5 custom-control custom-radio custom-control-inline">
                <input name="typeOfStudy" type="radio" id="sdfGraduate" class="custom-control-input" value="Graduate" disabled>
                <label for="sdfGraduate" class="custom-control-label">Graduate</label>
              </div>

              <div class="col-sm-6 col-md-4 pt-2">
                <label for="sdfLastName">Family Name</label>
                <input name="sdfLastName" type="text" id="sdfLastName" class="form-control" placeholder="Last Name..." readonly>
              </div>
              <div class="col-sm-6 col-md-4 pt-2">
                <label for="sdfFirstName">First Name</label>
                <input name="sdfFirstName" type="text" id="sdfFirstName" class="form-control" placeholder="First Name..." readonly>
              </div>
              <div class="col-sm-6 col-md-4 pt-2">
                <label for="sdfMiddleName">Middle Name</label>
                <input name="sdfMiddleName" type="text" id="sdfMiddleName" class="form-control" placeholder="Middle/Maiden Name..." readonly>
              </div>
              <div class="col-sm-2 col-md-4 col-lg-2 pt-2">
                <label for="sdfSex">Sex</label>
                <select name="sdfSex" id="sdfSex" class="form-control" disabled>
                  <option value="">Please Select</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              
              <div class="col-sm-4 col-md-4 col-lg-2 pt-2">
                <label for="sdfDateOfBirth">Date of Birth</label>
                <input name="sdfDateOfBirth" type="date" id="sdfDateOfBirth" class="form-control" readonly>
              </div>

              <div class="col-sm-3 col-md-4 col-lg-2 pt-2">
                <label for="sdfYear">Year</label>
                <select name="sdfYear" id="sdfYear" class="form-control" disabled>
                  <option value="">Please Select</option>
                  <option value="1st Year">1st Year</option>
                  <option value="2nd Year">2nd Year</option>
                  <option value="3rd Year">3rd Year</option>
                  <option value="4th Year">4th Year</option>
                </select>
              </div>
              <div class="col-sm-5 col-md-3 col-lg-2 pt-2">
                <label for="sdfYearCourse">Course</label>
                <select name="sdfYearCourse" id="sdfYearCourse" class="form-control" disabled>
                  <option value="">Please Select</option>
                  <?php 
                    $query=mysqli_query($conn,"select * from course");
                    while($row=mysqli_fetch_array($query)){
                      echo'
                        <option value="'.$row['course_id'].'">'.$row['title'].'</option>
                      ';
                    }
                  ?>
                </select>
              </div>
              <div class="col-sm-4 col-md-3 col-lg-2 pt-2">
                <label for="">College</label>
                <select name="sdfCollege" id="sdfCollege" class="form-control" disabled>
                  <option value="">Please Select</option>
                  <?php 
                      $query=mysqli_query($conn,"select * from college");
                      while($row=mysqli_fetch_array($query)){
                        echo'
                          <option value="'.$row['college_id'].'">'.$row['title'].'</option>
                        ';
                      }
                    ?>
                </select>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-2 pt-2">
                <label for="sdfActiveMobileNumber">Active Mobile Number</label>
                <input name="sdfActiveMobileNumber" type="text" id="sdfActiveMobileNumber" class="form-control" readonly>
              </div>
              <div class="col-sm-6 col-md-12 col-lg-4 pt-2">
                <label for="sdfEmailAdd">E-mail Address</label>
                <input name="sdfEmailAdd" type="email" id="sdfEmailAdd" class="form-control" readonly>
              </div>
              <div class="col-auto pt-4 custom-control custom-radio">
                <label for="" class="form-check-label mr-4">Living with:</label>
                <input name="sdfLivingWith" type="radio" id="sdfLivingWithParents" class="custom-control-input" onclick="isChecked()" value="Parents" readonly>
                <label for="sdfLivingWithParents" class="custom-control-label mr-4">Parents</label>
              </div>
              <div class="col-auto pt-4 custom-control custom-radio">
                <input name="sdfLivingWith" type="radio" id="sdfLivingWithRelatives" class="custom-control-input" onclick="isChecked()" value="Relatives" readonly>
                <label for="sdfLivingWithRelatives" class="custom-control-label mr-4">Relatives</label>
              </div>
              <div class="col-auto pt-4 custom-control custom-radio">
                <input name="sdfLivingWith" type="radio" id="sdfLivingWithFriends" class="custom-control-input" onclick="isChecked()" value="Friends" readonly>
                <label for="sdfLivingWithFriends" class="custom-control-label mr-4">Friends</label>
              </div>
              <div class="col-auto pt-4 custom-control custom-radio">
                <input name="sdfLivingWith" type="radio" id="sdfLivingWithOthers" class="custom-control-input" onclick="isChecked()" value="Others" readonly>
                <label for="sdfLivingWithOthers" class="custom-control-label">Others</label>
              </div>
              
              <div class="col-sm-12 col-md-12 col-lg-9 pt-4">
                <label for="sdfLivingWithSpecify">Others (Please Specify)</label>
                <input name="sdfLivingWithSpecify" type="text" class="form-control" id="sdfLivingWithSpecify" disabled>
              </div>

              <div class="col-sm-12 col-md-12 col-lg-3 pt-4">
                <label for="sdfContactNumber">Contact Number of Guardian/Contact Person</label>
                <input name="sdfContactNumber" type="text" id="sdfContactNumber" class="form-control" readonly>
              </div>

              <div class="col-sm-12 col-lg-12 pt-4">
                <label for="sdfCityAddress">City Address</label>
                <input name="sdfCityAddress" type="text" id="sdfCityAddress" class="form-control" readonly>
              </div>
              
              <div class="col-sm-6 pt-4">
                <label for="sdfParentName">Parent(Father/Mother)</label>
                <input name="sdfParentName" type="text" class="form-control" id="sdfParentName" readonly>
              </div>
              <div class="col-sm-6 pt-4">
                <label for="sdfOccupation">Occupation</label>
                <input name="sdfParentOccupation" type="text" class="form-control" id="sdfOccupation" readonly>
              </div>

              <div class="col-sm-12 pt-4">
                <label for="sdfParentAddress">Parent's Address</label>
                <input name="sdfParentAddress" type="text" class="form-control" id="sdfParentAddress" readonly>
                <small id="parentAddressHelpTooltip" class="form-text text-muted text-center">(If not living with parents)</small>
              </div>

              <div class="col-sm-9 pt-4">
                <label for="sdfParentContactNumber">Parent's Contact Number</label>
                <input name="sdfParentContactNumber" type="text" class="form-control" id="sdfParentContactNumber" readonly>
              </div>
              <div class="col-sm-3 pt-4">
                <small id="sdfTooltip" class="form-text text-muted text-left">
                  (If not living with parents)
                </small>
              </div>
              <div class="col-sm-8 pt-4">
                <label for="sdfSpouse">Spouse</label>
                <input name="sdfSpouse" type="text" class="form-control" id="sdfSpouse" readonly>
              </div>
              <div class="col-sm-4 pt-4">
                <label for="sdfSpouseOccupation">Occupation</label>
                <input name="sdfSpouseOccupation" type="text" class="form-control" id="sdfSpouseOccupation" readonly>
              </div>

              <div class="col-sm-12 pt-4">
                <h5>SCHOLARSHIP PROMISE</h5>
                <p>In consideration of the privilege I enjoy as a scholar/grantee in this institution. I hereby promise and pledge to abide as well the requirements of the University and th egrating institution.</p>
              </div>

              <div class="col-sm-12">
                <button class="btn btn-primary" type="submit" name="submit" id="submit-btn">SUBMIT</button>
                <div class="text-center msg-box">
                  <h3>You are already a Scholar!</h3>
                </div>
                <div class="text-center validmsg-box">
                  <h3>Scholarship waiting for validation...</h3>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../../js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dropzone.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      //JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

      //JQUERY SCRIPTS
      $(document).ready(function(){
        console.log('jquery script')
        //logout
        $('#logout-button').on('click', function(){
          Swal.fire({
            title: 'Do you want to logout?',
            showDenyButton: true,
            denyButtonText: `Cancel`,
            confirmButtonText: `Logout`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              window.location = "../../php_scholarship/user-session.php?logout";
            } else if (result.isDenied) {
              Swal.fire('Cancelled', '', 'info')
            }
          })
        })

        //ADD SCHOLAR DETAILS
        var search_id = $('#sdfIDNumber').val();
        var forValidation;
        $.ajax({
          url: '../../php_scholarship/fetchScholarById.php',
          method: 'POST',
          data: {search_id:search_id},
          dataType: 'JSON',
          success:function(data){
            console.log(data)
            forValidation = data[22];
            if(data[21] != null && !forValidation){
              $('#sdfScholarshipName').val(data[21]);
              document.getElementById('sdfScholarshipName').disabled = true;
              document.getElementById('sdfIDNumber').disabled = true;
              document.getElementById('submit-btn').hidden = true;
              $('.validmsg-box').toggle();

            }else if(data[21] == null && forValidation){
              document.getElementById('sdfScholarshipName').disabled = true;
              document.getElementById('sdfIDNumber').disabled = true;
              document.getElementById('submit-btn').hidden = true;
              $('.msg-box').toggle();

            }else {
              $('.msg-box').toggle();
              $('.validmsg-box').toggle();

            }
            $('input[name="typeOfStudy"][value="'+data[0]+'"]').prop('checked', true);
            $('#sdfLastName').val(data[1]);
            $('#sdfFirstName').val(data[2]);
            $('#sdfMiddleName').val(data[3]);
            $('#sdfSex').val(data[4]);
            $('#sdfDateOfBirth').val(data[5]);
            $('#sdfYear').val(data[6]);
            $('#sdfYearCourse').val(data[7]);
            $('#sdfCollege').val(data[8]);
            $('#sdfActiveMobileNumber').val(data[9]);
            $('#sdfEmailAdd').val(data[10]);
            $('input[name="sdfLivingWith"][value="'+data[11]+'"]').prop('checked', true);
            $('#sdfLivingWithSpecify').val(data[12]);
            $('#sdfContactNumber').val(data[13]);
            $('#sdfCityAddress').val(data[14]);
            $('#sdfParentName').val(data[15]);
            $('#sdfOccupation').val(data[16]);
            $('#sdfParentAddress').val(data[17]);
            $('#sdfParentContactNumber').val(data[18]);
            $('#sdfSpouse').val(data[19]);
            $('#sdfSpouseOccupation').val(data[20]);
          }
        });
      

      })
    </script>
  </body>
</html>