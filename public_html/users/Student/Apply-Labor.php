<?php 
include('../../conn.php');
include '../../php/notification-timeago.php'; 
session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Student'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../index.php";';
    echo '</script>';
  }
  if ($_SESSION['sl_status'] == 'Hired'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "index.php";';
    echo '</script>';
  }
  if (!isset($_GET['stat'])){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "Home-Labor.php";';
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
      <link rel="stylesheet" type="text/css" href="../../css/main_main.css">
          <link rel="stylesheet" type="text/css" href="../../css/upstyle_main.css">
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="../../js/jquery-3.3.1.min.js"></script>
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
                  if (strlen($_SESSION['org_id'])){
                    echo '
                        <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                          <li><a class="treeview-item" href="Home-Orgs.php">Home</a></li>
                          <li><a class="treeview-item" href="Org-files.php">Organization Files</a></li>
                          <li><a class="treeview-item" href="Accre-files.php">Re-Accreditation Files</a></li>
                          <li><a class="treeview-item" href="Oath-files.php">Oath of Office</a></li>
                        </ul>
                      </li>
            
                    ';
            
            
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



          <li><a class="app-menu__item" href="ReqGoodMoral.html"><i class="app-menu__icon fa fa-envelope-o"></i><span class="app-menu__label">Request for Good Moral</span></a></li>


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
    <div class="red"></div>
      <!-- Navbar-->




      <form id="studentapplicationform" method="post" enctype="multipart/form-data">
        <div class="row">   

        <div class="col-md">
          <div style="background-color: #C12C32; padding: 8px 10px;"> </div>
          <div class="tile">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="tile-title">Student Labor Application</h3>
              </div>
              <div class="col-sm-6">
                <input class="form-control" id="sampstudent_id" name="sampstudent_id" type="text" value="<?php echo $_SESSION['id'] ?>" hidden>
              </div>
            </div>
              
              
            <div class="tile-footer"></div>
            <div class="tile-body" > 

                <div class="row">
                    <div class="col-sm-2">               
                        <h6 class="font-weight-bold">Type of Student Labor:</h6>
                    </div>
                    <div class="col-sm-2">  
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="labor_type" value="Paid Labor (SL)" required> Paid Labor (SL)
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="labor_type" value="Unpaid Labor (SL)" required> Unpaid Labor (SL)
                        </label>
                      </div>
                    </div>

                    <div class="col-sm-1">               
                      <h6 class="font-weight-bold">Class:</h6>
                    </div>
                    <div class="col-sm-2">  
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="labor_class" value="Day" required> Day
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="labor_class" value="Evening" required> Evening
                        </label>
                      </div>
                    </div>

                    <div class="col-sm-1">               
                      <h6 class="font-weight-bold">Status:</h6>
                    </div>
                    <div class="col-sm-2">  
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="labor_status" value="New" required> New
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="labor_status" value="Renewal" required> Renewal
                        </label>
                      </div>
                    </div>
                </div>

                <br>
                <br>

                <div class="row">
                  <div class="col-sm-6">               
                    <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2 fetched-data" id="student_name"></span></h6>
                  </div>
                  <div class="col-sm-3">               
                    <h6 class="font-weight-bold">Course & Year: <span class="font-weight-lighter ml-2 fetched-data" id="student_course_year"></span></h6>
                    <input type="hidden" name="year_level" id="year-level">
                  </div>
                </div>

                <h6 class="font-weight-bold">Address:<span class="font-weight-lighter ml-2 fetched-data" id="student_address"></span></h6>
              
                <div class="row">
                  <div class="col-sm-6">               
                  <h6 class="font-weight-bold">Contact No.: <span class="font-weight-lighter ml-2 fetched-data" id="student_contact"></span></h6>
                  </div>
                  <div class="col-sm-3">               
                  <h6 class="font-weight-bold">Email Address: <span class="font-weight-lighter ml-2 fetched-data" id="student_email"></span></h6>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">               
                  <h6 class="font-weight-bold">Birth Date: <span class="font-weight-lighter ml-2 fetched-data" id="student_bday"></span></h6>
                  </div>
                  <div class="col-sm-3">               
                  <h6 class="font-weight-bold">Birth Place: <span class="font-weight-lighter ml-2 fetched-data" id="student_birth_place"></span></h6>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-sm-6">
                    <p style="font-weight: bolder;">Semester & School Year Covered:</p>
                    <select class="form-control" name="sem_year" required>
                      <option selected value="">Select an option</option>
                      <?php 
                          $query=mysqli_query($conn,"select * from list_of_semester WHERE status = 'Active'");
                          while($row=mysqli_fetch_array($query)){
                            echo'
                              <option value="'.$row['semester'].' '.$row['year'].'">'.$row['semester'].' '.$row['year'].'</option>
                            ';
                          }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-sm-6">
                      <p style="font-weight: bolder;">Time Available: <br>
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          From <input class="form-control" type="time" id="time_from" name="time_from">
                        </div>
                        <div class="form-group col-sm-6">
                        
                          To <input class="form-control" type="time" id="time_to" name="time_to">
                        </div>
                      </div>
                      </p>
                  </div>
                </div>


                <h5 class="font-weight-bold">Attach:</h5>
                <div class="row">
                  <div class="form-group col-sm-3">
                    <p style="font-weight: bolder;">Certificate of Grades 
                      <input class="form-control-file check-file" id="student_grades" type="file" name="student_grades" aria-describedby="fileHelp" required><small class="form-text text-muted" id="fileHelp"></small>
                    </p>
                  </div>
                  <div class="form-group col-sm-3">
                    <p style="font-weight: bolder;">Current COR 
                      <input class="form-control-file check-file" id="current_cor" type="file" name="current_cor" aria-describedby="current_cor" required><small class="form-text text-muted" id="current_cor"></small>
                    </p>
                  </div>
                  <div class="form-group col-sm-3">
                    <p style="font-weight: bolder;">Letter of Intent For Faculty/Unit Head
                      <input class="form-control-file check-file" id="letter_unit_head" type="file" name="letter_unit_head" aria-describedby="letter_unit_head" required><small class="form-text text-muted" id="letter_unit_head"></small>
                    </p>
                  </div>
                  <div class="form-group col-sm-3">
                    <p style="font-weight: bolder;">Letter of Intent For OSAS head
                      <input class="form-control-file check-file" id="letter_osas_head" type="file" name="letter_osas_head" aria-describedby="letter_osas_head" required><small class="form-text text-muted" id="letter_osas_head"></small>
                    </p>
                  </div>
                </div>


                <div class="row">
                  <div class="form-group col-sm-6">
                    <p style="font-weight: bolder;">Proposed College/ Unit of Assignment:
                      
                    <select class="form-control" name="assignment" required>
                      <option selected value="">Select an option</option>
                      <?php 
                          $query=mysqli_query($conn,"call MainGetJobHiringsDropdown()");
                          while($row=mysqli_fetch_array($query)){
                            echo'
                              <option value="'.$row['requisition_id'].'">'.$row['office_name'].'</option>
                            ';
                          }
                      ?>
                    </select>
                    </p>
                  </div>
                </div>


              <div class="tile-footer"></div>
                <button class="btn btn-success" type="submit">Submit</button>
                <a class="btn btn-primary" href="Home-Labor.php">Cancel</a>

          </div>
        </div>
      </div>
    </div>

    </form>

  </main>
    <!-- Essential javascripts for application to work-->
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
            message: "Disable Successfuly!",
            icon: 'fa fa-check' 
          },{
            type: "info"
          });
        });

        $('#selectAll').click(function (e) {
           $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        });
        //Google Analytics
        if(document.location.hostname == 'pratikborsadiya.in') {
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-72504830-1', 'auto');
          ga('send', 'pageview');
        }

        $(document).ready(function($){

          
              $.ajax({
                  url:"../../php/O-StudentDefault/getStudentInfoForStudentLaborApplication.php",
                  method:"POST",
                  data:{},
                  success:function(response)
                    {
                      try {
                        var obj = JSON.parse(response);
                          $('#student_name').text(obj[0].fullname);
                          $('#student_address').text(obj[0].full_address);
                          $('#student_course_year').text(obj[0].course_year);
                          $('#year-level').val(obj[0].year_level);
                          $('#student_contact').text(obj[0].contact);
                          $('#student_email').text(obj[0].email_add);
                          $('#student_bday').text(obj[0].bday);
                          $('#student_birth_place').text(obj[0].birth_place);
                      } catch (e) {
                        alert("Server error. Reload page."+response);
                      }
                    },
                  error: function(response){
                    $('.fetched-data').text('');
                    alert("fail" + JSON.stringify(response));
                  }
                });

          $('#studentapplicationform').submit(function(e){

                // Get form
                var form = $('#studentapplicationform')[0];
         
                // FormData object 
                var data = new FormData(form);

           var file_flag = true;

            $( ".check-file" ).each(function( index ) {
                file_flag = checkFile($(this).val());
                if (!file_flag){
                  $(this).val('');
                  return false;
                }
            });
            e.preventDefault();
            if (file_flag){$.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "../../php/O-StudentDefault/sendStudentLaborApplicationForm.php",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 800000,
                    success: function (data) {
                        swal({
                            title: "You're application has been sent!",
                            text: "You can only submit an application one at a time. Monitor the status of your application through your notifications",
                            type: "warning",
                            showCancelButton: false,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Okay, I got it!',
                            closeOnConfirm: false,
                            //closeOnCancel: false
                          },
                          function(){
                            window.location = "Home-Labor.php";
                          });    
                    },
                    error: function (e) {
                      alert("fail" + JSON.stringify(e));
                    }
                });
            } else {
              swal({
                              title: "Invalid Files!",
                              text: "All files must be in pdf format.",
                              icon: "warning",
                              buttons: false,
                              timer: 1800,
                              closeOnClickOutside: false,
                                closeOnEsc: false,
                          });
            }
          });


        function checkFile(file) {
          var extension = file.substr((file.lastIndexOf('.') +1));
          if (!/(pdf)$/ig.test(extension)) {
            return false;
          }
          return true;
        }


        });
      </script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
     
  </body>
</html>