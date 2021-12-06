<?php 
  include('../../conn.php');
  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Student'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../index.php";';
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
      <link rel="stylesheet" type="text/css" href="../../css/upstyle_shy.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="../../css/owl.carousel.min.css">
      <link rel="stylesheet" href="../../css/owl.theme.default.min.css">
      <style type="text/css">
        .img{
          width: 130px;
          height: 130px;
        }
      </style>
        
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
              <li><a class="treeview-item " href="Home-Discipline.php" hidden="">Home</a></li>
              <li><a class="treeview-item" href="Discipline-Complaints.php">Complaints</a></li>
              <li><a class="treeview-item" href="Discipline-HistoryComplaints.php">Complaint Records</a></li>
              <li><a class="treeview-item active" href="Discipline-Response.php">Response</a></li>

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
                                  <li><a class="treeview-item active" href="Labor-Dtr.php">DTR</a></li>
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


<div class="container">
  <div class="row align-items-center">
    <div class="col-sm">
        <!-- separator ayaw tanggal-->
    </div>
    <div class="col-sm-6">

      <div style="background-color:  #193541;  padding: 12px 10px;">
        <div class="info" style="color: #FFFFFF;">
          <center>
            <h5 class="mb-2">DAILY TIME RECORD</h5>
          </center>
        </div>
      </div>

      <div class="tile py-5 py-5">  
        <div class="tile-body">
          <div class="text-center align-center">
            <h3 class="font-weight-bold" id="date"></h3>
            <h3 class="font-weight-bold" id="time"></h3>

          <br><br>

        <!--   <select class="form-control col-sm-6 offset-sm-3" id="course" name="course"> 
            <option disabled>Choose Option</option>
            <option value="TIME IN">TIME IN</option>
            <option value="TIME OUT">TIME OUT</option>
          </select> -->

          <br><br>

          <button class="btn btn-danger btn-lg form-control col-sm-6" style="color: white;" id="log-time" >
              <span id="time-log-status">TIME IN</span>
          </button>  

          <br><br>



          </div>

              <a class="show-history" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">View/Minimize history</a>  
        </div>
      </div>
    </div>
    <!-- separator ayaw tanggal-->
    <div class="col-sm">
    </div>
  </div>
</div>  

      <?php 
        $data = array();
        $query=mysqli_query($conn,"call MainStudentOtherQueries('$id',2);");
        while($row=mysqli_fetch_array($query))
          {
            $data = $row;
          }
      ?>
      <div class="row collapse show" id="collapseExample">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="row">
                <div class="float-left col-sm-6">
                  <h4>DTR</h4>
                </div>
               <!--  <div class="float-right col-sm-6">
                  <h6>
                    <span class="text-danger col-sm-3">Date & Time: </span> 
                    <span class="col-sm-3" id="date"></span> 
                    <span class="col-sm-3" id="time"></span>
                    <button class="btn btn-danger col-sm-3" id="log-time" style="color: white;"> 
                      <span id="time-log-status">TIME IN</span> 
                    </button>
                  </h6>
                </div> -->
              </div>
              <br><br>
              <div class="table-bd">
                <div class="col-sm-12 border rounded table-responsive">
                  <table class="table table-borderless text-left">
                    <tbody>
                       <tr>
                        <td>SL ID</td>
                        <td>: <span class="font-weight-bold" id="sl-id"><?php echo $data[0] ?></span> </td>
                        <td>Name</td>
                        <td>: <span class="font-weight-bold" id="sl-name"><?php echo $data[1] ?></span> </td>
                        <td>College-Course</td>
                        <td>: <span class="font-weight-bold" id="sl-college-course"><?php echo $data[2] ?></span> </td>
                        <td>Yearlevel</td>
                        <td>: <span class="font-weight-bold" id="sl-yearlevel"><?php echo $data[3] ?></span> </td>
                      </tr>
                      <tr>
                        <td>Semester</td>
                        <td>: <span class="font-weight-bold" id="sl-sem"><?php echo $data[4] ?></span> </td>
                        <td>Labor Type</td>
                        <td>: <span class="font-weight-bold" id="sl-type"><?php echo $data[5] ?></span> </td>
                        <td>Labor Class</td>
                        <td>: <span class="font-weight-bold" id="sl-class"><?php echo $data[6] ?></span> </td>
                        <td>Labor Status</td>
                        <td>: <span class="font-weight-bold" id="sl-status"><?php echo $data[7] ?></span> </td>
                      </tr>
                      <tr>
                        <td>Assigned Office</td>
                        <td>: <span class="font-weight-bold" id="sl-office"><?php echo $data[8] ?></span> </td>
                        <td>Supervisor</td>
                        <td>: <span class="font-weight-bold" id="sl-supervisor"><?php echo $data[9] ?></span> </td>
                        <td>Starting Date</td>
                        <td>: <span class="font-weight-bold" id="sl-start-date"><?php echo $data[10] ?></span> </td>
                        <td>Ending Date</td>
                        <td>: <span class="font-weight-bold" id="sl-end-date"><?php echo $data[11] ?></span> </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-1 text-center h6 mt-2">
                      <span>Filter</span>
                    </div>
                    <div class="input-group input-daterange col-sm-6">

                      <input type="text" id="min-date" class="form-control date-range-filter mx-2" data-date-format="yyyy-mm-dd" placeholder="From:">


                      <input type="text" id="max-date" class="form-control date-range-filter mx-2" data-date-format="yyyy-mm-dd" placeholder="To:">

                    </div>
                </div>
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered table-sm" id="student-dtr-tbl">
                    <thead>
                      <tr>
                        <th class="collapse"></th>
                        <th class="collapse"></th>
                        <th>Date</th>
                        <th>Time Period</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Task Performed</th>
                        <th>Hours Accumulated (hh:mm)</th>
                        <th>Salary Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th class="collapse"></th>
                        <th class="collapse"></th>
                        <th colspan="5" class="text-right">Total Hours</th>
                        <th class="text-left" colspan="2" id="total-hours"></th>
                      </tr>
                        
                    </tfoot>
                  </table>
                </div>                
              </div>
            </div>
          </div>
        </div>
      </div>
</main>
<!-- Modal -->
<form id="task-frm">
  <div class="modal fade" id="add-task-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="task">What did you do in these period?</label>
              <input type="text" class="form-control" id="task" aria-describedby="task-txt" maxlength="200" placeholder="Enter task">
              <small id="task-txt" class="form-text text-muted"><span id="char-left">0</span>/200</small>
            </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
                     

        

      <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
      <!-- Google analytics script-->
      <script src="../../js/owl.carousel.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
      <script type="text/javascript">

        if(document.location.hostname == 'pratikborsadiya.in') {
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-72504830-1', 'auto');
          ga('send', 'pageview');
        }

        $(function() {
            var interval = setInterval(function() {
              var momentNow = moment();
              $('#date').html(momentNow.format('dddd').substring(0,3) + ' - ' + momentNow.format('MMMM DD, YYYY'));  
              $('#time').html(momentNow.format('hh:mm:ss A'));
            }, 100);
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


      $(document).ready(function(){
          let cur_sem = $('#sl-sem').text().trim();
          var applicant = parseInt($('#sl-id').text().trim());
          var current_dtr_id = 0;
          var first_row_id = 0;

          var tbl = $('#student-dtr-tbl').DataTable({
            serverside: false,
              ajax : {
                url : "../../php/O-StudentDefault/otherqueries.php",
                data : function ( d ) {
                    d.app_id = applicant;
                    d.sem_year = cur_sem;
                    d.queryid = 2;
                },
                dataSrc : "",
                error: function(response){
                    
                      Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Server Error!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
              },
              columns : [
                { data : "id", className: "collapse" },
                { data : "formatted_date", className: "collapse" },
                { data : "date_logged" },
                { data : "time_period" },
                { data : "time_in" },
                { data : "time_out" },
                { 
                  data : null,
                  className: "text-center",
                  render : function ( data, type, row){
                    var task_performed = row['task'];
                    var str = '';

                    if (task_performed!=null) {
                      str = task_performed;
                    } else {
                      str = '<div class="row"><div class="col-sm-2"><span class="text-warning btn update-task"><h4><i class="fas fa-edit"></i></h4></span></div><div class="col-sm-10"><input type="text" class="form-control" disabled></div></div>';
                    }

                    return str;
                  }
                },
                { data : "diff" },
                { data : "stat" }
              ],
              responsive : true,
              ordering : false,
              initComplete: function () {
                getDTRState();
                getTotalHours();
              }
          });


          $(document).on("click",".update-task",function(){
            var currentRow = $(this).closest("tr");
            current_dtr_id = parseInt(currentRow.find("td:eq(0)").text());
            $('#add-task-modal').modal('toggle');
          });


          $('#task').keyup(function(){
            $('#char-left').text($(this).val().length);
          });


          function getDTRState(){
            var first_row = tbl.row(0).data();
            var stat = (first_row===undefined) ? null : first_row.time_out;
            first_row_id = (first_row===undefined) ? 1 : first_row.id;
            if (first_row===undefined){
              $('#time-log-status').text('TIME IN');
            } else if (stat==null){
              $('#time-log-status').text('TIME OUT');
            }
          }


          function addTimes(times) {
            let duration = 0;
            times.forEach(time => {
              duration = duration + moment.duration(time).as('milliseconds')
            });
            return  moment.utc(duration).format("HH:mm")
          }


          function getTotalHours(){
            var times = [];
            $('#student-dtr-tbl tr').each(function(){
                  $(this).find('td:eq(7)').each(function(){
                    times.push($(this).text().trim());
                    console.log($(this).text().trim());
                      //do your stuff, you can use $(this) to get current cell
                  })
              })
            var total = addTimes(times);
            $('#total-hours').text(total);

          }

          $(document).on('keyup','input[type=search]',function(){
                getTotalHours();
          });


         // Bootstrap datepicker
          $('.input-daterange input').each(function() {
            $(this).datepicker('clearDates');
          });

          // Extend dataTables search
          $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
              var min = $('#min-date').val();
              var max = $('#max-date').val();
              var createdAt = data[1] || 0; // Our date column in the table

              if (
                (min == "" || max == "") ||
                (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
              ) {
                return true;
              }
              return false;
            }
          );

          // Re-draw the table when the a date range filter changes
          $('.date-range-filter').change(function() {
            tbl.draw();
                  getDTRState();
                  getTotalHours();
          });

          $('#student-dtr-tbl_filter').hide();


          $('#log-time').click(function(){
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, I\'m sure!'
            }).then((result) => {
              if (result.isConfirmed) {
                var first_row = tbl.row(0).data();
               // var stat = first_row.time_out;
                first_row_id = (first_row===undefined) ? 1 : first_row.id;
                var time_stat = $('#time-log-status').text().trim();
                var no = (time_stat=='TIME IN') ? 1 : 3;

                $.ajax({
                  url:"../../php/O-StudentDefault/dtrLogTime.php",
                  method:"POST",
                  data:{app_id:applicant, queryid:no, table_id:first_row_id, cursem:cur_sem},
                  success:function(response)
                    {
                      //console.log(no);
                      // if (no==1){
                      //   $('#time-log-status').text('TIME OUT');
                      // } 
                      // if (no==3){
                      //   $('#time-log-status').text('TIME IN');
                      // }
                      // $('#student-dtr-tbl').DataTable().ajax.reload();
                      Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Time logged successfully!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                      .then(() => {
                          location.reload(true);
                      })
                       // function () {
                       // };
                    },
                  error: function(response){
                      Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Server Error!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    console.log("fail" + JSON.stringify(response));
                  }
                });  
              }
            });
          });



          $('#task-frm').submit(function(e){
            e.preventDefault();
            var tsk = $('#task').val().trim();
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, save it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url:"../../php/O-StudentDefault/dtrLogTime.php",
                  method:"POST",
                  data:{queryid:2,id:current_dtr_id,task_performed:tsk},
                  success:function(response)
                    {
                      Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Task added successfully',
                        showConfirmButton: false,
                        timer: 1500
                      })
                      tbl.ajax.reload();
                    },
                  error: function(response){
                      Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Server Error!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    console.log("fail" + JSON.stringify(response));
                  }
                });

                $('#add-task-modal').modal('toggle');
              }
            })
          });

      });





      </script>

     
  </body>
</html>
