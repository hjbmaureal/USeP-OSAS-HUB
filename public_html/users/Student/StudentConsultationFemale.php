<?php
session_start();
include_once("connect.php");
include("conn.php");
if(!isset($_SESSION['id'])){
  echo '<script> alert("Please Login first!!!") 
  window.location="../../index.php";
  </script>';
    
}
$id = $_SESSION['id'];

$count = 0;
  $job_count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where user_id='$id' and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}

$query2=mysqli_query($conn,"SELECT count(*) as cnt from job_hiring_announcement");
  while($row=mysqli_fetch_array($query2)){ $job_count = ($row['cnt']==0) ? '' : $row['cnt'] ;}


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
      <title>USeP Student Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="cssc/main.css">
          <link rel="stylesheet" type="text/css" href="cssc/upstyle.css">
          <link rel="stylesheet" type="text/css" href="../../css/custom.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="cssc/all.min.css">
      <link rel="stylesheet" type="text/css" href="cssc/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
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
              <li><a class="treeview-item " href="Home-Discipline.php">Home</a></li>
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
           <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Clinic_Home.php">Home</a></li>
              <li><a class="treeview-item active" href="Clinic_Privacy-Policy.php">Consultation</a></li>
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
                  $count_sql="SELECT * from notif where user_id='$id' order by time desc";
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
</script>
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
       

         <!--<div class="page-error tile">-->
 
       


       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">PATIENT RECORD</h3>
            <div class="tile-body">
                                  <form  method="POST" enctype="multipart/form-data">
                                    <br>
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label class=" control-label"><b>Have you ever been admitted/hospitalized?</b></label>
                                        <div class="">
                                            <select class="form-control" name="hospitalized" id="hospitalized" onchange = "EnableDisableTextBox(this)">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>If yes, what illness?</b></label>
                                        <input type="text" class="form-control" name="ill" id="ill" value="">
                                      </div>                             
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>When?</b></label>
                                        <input type="date" class="form-control" name="whenn" id="whenn" value="" >
                                      </div>
                                     <div class="form-group col-md-4">
                                        <label class=" control-label"><b>Have you ever had a surgical operation?</b></label>
                                        <div class="">
                                            <select class="form-control" name="operation" id="operation" onchange = "EnableDisableText(this)">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>If yes, what kind?</b></label>
                                        <input type="text" class="form-control" name="kind" id="kind" value="">
                                      </div> 
                                       <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>When?</b></label>
                                        <input type="date" class="form-control" name="whennn" id="whennn" value="">
                                      </div>
                                   </div>
                                     <br>   
                                     <div class="form-group">
                                      <label for="inputAddress"><b>Have you ever had any of the following infectious diseases?</b></label>
                                    <br>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok" type="checkbox" name="disease[]" value="Measles">
                                      <label class="form-check-label" for="inlineCheckbox1">Measles</label>
                                    </div>
                                    <br>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok1" type="checkbox" name="disease[]" value="German Measles">
                                      <label class="form-check-label" for="inlineCheckbox2">German Measles</label>
                                    </div>
                                    <br>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok2" type="checkbox" name="disease[]" value="Chickenpox">
                                      <label class="form-check-label" for="inlineCheckbox2">Chickenpox</label>
                                    </div>
                                    <br>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok3" type="checkbox" name="disease[]" value="Hepatitis A">
                                      <label class="form-check-label" for="inlineCheckbox2">Hepatitis A</label>
                                    </div>
                                    <br>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok4" type="checkbox" name="disease[]" value="Tetanus">
                                      <label class="form-check-label" for="inlineCheckbox2">Tetanus</label>
                                    </div>
                                    <br>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok5" type="checkbox" name="disease[]" value="Pulmonary Tuberculosis">
                                      <label class="form-check-label" for="inlineCheckbox2">Pulmonary Tuberculosis</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" id="none" type="checkbox" name="disease[]" value="None">
                                      <label class="form-check-label" for="inlineCheckbox2">None</label>
                                    </div>
                                    </div>


                                  <div class="form-group">
                                    <label class="control-label"><b>Do you experience headache, dizziness or syncope(pagkahimatay) at any time?</b></label>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="illness" value="Yes">Yes
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="illness" value="No">No
                                      </label>
                                    </div>
                                  </div>

                                <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label class=" control-label"><b>At what age did you have your first menstruation?</b></label>
                                         <input type="number" class="form-control" name="first" required="required" >
                                      </div>
                                </div>

                               <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>Do you have regular monthly periods?</b></label>
                                         <div class="">
                                            <select class="form-control" name="regular" id="regular" onchange = "EnableDisable(this)">                                  
                                                <option value="No">No</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </div>
                                      </div>                             
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>If no, how often do you have your periods in a year?</b></label>
                                        <input type="number" class="form-control" name="peryear" id="peryear" >
                                      </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>Do you experience dysmenorrhea?</b></label>
                                         <div class="">
                                            <select class="form-control" name="dysmenorrhea" id="dysmenorrhea" >
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                      </div>                             
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>What other premenstrual symptoms do you have?</b></label>
                                        <input type="text" class="form-control" name="premen">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="control-label"><b>Lab Test Results</b><br>
                                    &ensp;&ensp;&ensp;
                                        <input class="form-check-input" type="file" name="file_name[]" multiple>
                                    </label>

                                    </div>
                                  </div>

                                                   
                          <p style="color: black; padding-top: 5px">
                          
                           <input type="checkbox"  name="permission" value="I hereby swear that the above information are true and correct. And therefore, promise to abide by the rules and regulations
                           of the University of Southeastern Philippines-Health Service Division.">
                           I hereby swear that the above information are true and correct. And therefore, promise to abide by the rules and regulations
                           of the University of Southeastern Philippines-Health Service Division.
                         <br><br><br><br>

                            <div class="tile-footer">
                              <button class="btn btn-primary" name="female"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button> 
                            </div>
                        
                        </div>
      </div></form>
   <?php                  
  if(isset($_POST['female'])){   
    $patient_id=$_SESSION['id']; 
    $hospitalized = $_POST['hospitalized'];
    $ill = $_POST['ill'];
    $whenn = $_POST['whenn'];
    $operation = $_POST['operation'];
    $kind = $_POST['kind'];
    $whennn = $_POST['whennn'];
    $checkbox1 = $_POST['disease'];
    $illness = $_POST['illness'];
    $permission = $_POST['permission'];

    $first = $_POST['first'];
    $regular = $_POST['regular'];
    $peryear = $_POST['peryear'];
    $dysmenorrhea = $_POST['dysmenorrhea'];
    $premen = $_POST['premen'];
    $chk="";
    $location="";
    $fillout_date="";
 


    // checker
    if(empty($patient_id)||empty($hospitalized)|| empty($operation)|| empty($disease)|| empty($illness) || empty($permission) || empty($first)|| empty($regular)|| empty($dysmenorrhea)) { 

        
        if(empty($hospitalized)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }  
        
        if(empty($operation)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
              
        if(empty($disease)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        
        if(empty($illness)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
         if(empty($permission)) {
            echo "<font color='red'>Product field is empty.</font><br/>";
        }

          if(empty($first)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }  
        if(empty($regular)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($dysmenorrhea)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
           
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 

    $s = "SELECT patient_id from clinic_patient_info where patient_id='$patient_id'";
    $resu = $db->query($s);
      if ($resu->num_rows > 0) {

           echo '<script>
                  swal({
                  title: "Record Already Existed...",
                  text: "Server Request Failed!",
                  type:"error",
                  icon: "error",
                  button: false,
                  timer:2000,
                  closeOnClickOutside: false,
                  closeOnEsc: false,
                  }).then(function(){

                    window.location = "ClinicComplaint.php";
                    })
                 </script>';

        }

    else { 

      foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }
    foreach ($_FILES['file_name']['name'] as $key => $name){
 
                  $newFilename = $name;
                  move_uploaded_file($_FILES['file_name']['tmp_name'][$key], '../C-Admin/filesuploaded/' . $newFilename);
                   $location .=$newFilename.",";
 }

$in_ch=mysqli_query($db,"INSERT INTO clinic_patient_info(patient_id,admitted,admitted_illness,admitted_illness_start,operation,operation_kind,operation_when,infectious_disease,headaches,swear_clause, lab_tests, fillout_date) VALUES('$patient_id','$hospitalized','$ill','$whenn','$operation','$kind','$whennn','$chk','$illness','$permission', '$location', now())");


if($in_ch==1)  
   {  


      $res ="INSERT INTO clinic_patient_info_female(patient_id,mens_age_start,mens_regular,mens_irregular,dysmenorrhea,pms) VALUES('$patient_id','$first','$regular','$peryear','$dysmenorrhea','$premen')";

            if ($db->query($res) === TRUE) {

           $sql="Update student set patinfo_status='1'  where Student_id='$patient_id'";
           $result5 = $db->query($sql);

          echo '<script>
      swal({
      title: "Added successfully!",
      text: "Server Request Successful!",
      type:"success",
      icon: "success",
      button: false,
      timer:2000,
      closeOnClickOutside: false,
      closeOnEsc: false,
      }).then(function() {
    window.location = "ClinicComplaint.php";
  })
     </script>';

          
    } 
   }
else  
   {  
      echo '<script>
      swal({
      title: "Something went wrong...",
      text: "Server Request Failed!",
      type:"error",
      icon: "error",
      button: false,
      timer:2000,
      closeOnClickOutside: false,
      closeOnEsc: false,
      })
     </script>';  
   } 
}
echo"<meta http-equiv='refresh' content='2'>";

}

    function upload_files($tableName){
   
    $uploadTo = "docs/"; 
    $allowFileExt = array('jpg','png','jpeg','gif','pdf','doc','csv','zip');
    $fileName = array_filter($_FILES['file_name']['name']);
    $fileTempName=$_FILES["file_name"]["tmp_name"];
    $tableName= trim($tableName);
    if(empty($fileName)){ 
       $error="Please Select files..";
       return $error;
     }else if(empty($tableName)){
       $error="You must declare table name";
       return $error;
     }else{
    
     $error=$storeFilesBasename='';

    foreach($fileName as $index=>$file){
         
    $fileBasename = basename($fileName[$index]);
    $filePath = $uploadTo.$fileBasename; 
    $fileExt = pathinfo($filePath, PATHINFO_EXTENSION); 

    if(in_array($fileExt, $allowFileExt)){ 

        // Upload file to server 
        if(move_uploaded_file($fileTempName[$index],$filePath)){ 
        
         // Store Files into database table
         $storeFilesBasename .= "('".$fileBasename."'),"; 
          
         }else{ 
         $error = 'File Not uploaded! try again';

         } 

     }else{

       $error .= $_FILES['file_name']['name'][$index].' - file extensions not allowed<br> ';

     }
    }

    store_files($storeFilesBasename, $tableName);
  }

    return $error;
}
    // File upload configuration 

    function store_files($storeFilesBasename, $tableName){
      global $db;
      if(!empty($storeFilesBasename))
      {
      $value = trim($storeFilesBasename, ',');


       $store="INSERT INTO ".$tableName." (lab_tests) VALUES".$value;

      
      $exec= $db->query($store);
       if($exec){
       
        echo "files are uploaded successfully";
         
       }else{
        echo  "Error: " .  $store . "<br>" . $db->error;
       }
      }
    }


?> 



        
       
        

        <!--</div>-->
      </main>
      <!-- Essential javascripts for application to work-->
      
      <script src="jsc/jquery-3.3.1.min.js"></script>
      <script src="jsc/popper.min.js"></script>
      <script src="jsc/bootstrap.min.js"></script>
      <script src="jsc/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="jsc/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="jsc/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="jsc/plugins/sweetalert.min.js"></script>
      
      <script>
        <!-- table selection -->
          $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});
      </script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="jsc/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="jsc/plugins/dataTables.bootstrap.min.js"></script>
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
    function EnableDisableTextBox(hospitalized) {
        var selectedValue = hospitalized.options[hospitalized.selectedIndex].value;
        var ill = document.getElementById("ill");
        var whenn = document.getElementById("whenn");
        whenn.disabled = selectedValue == "Yes" ? false : true;
        ill.disabled = selectedValue == "Yes" ? false : true;
        
        if (!ill.disabled && !whenn.disabled) {
          whenn.focus();
            ill.focus();
            
        }
    }

     function EnableDisableText(operation) {
        var selectedValue = operation.options[operation.selectedIndex].value;
        var kind = document.getElementById("kind");
        var whennn = document.getElementById("whennn");
        kind.disabled = selectedValue == "Yes" ? false : true;
        whennn.disabled = selectedValue == "Yes" ? false : true;
        if (!ill.disabled && !whennn.disabled) {
            ill.focus();
            whenn.focus();
        }
    }

    function EnableDisable(regular) {
        var selectedValue = regular.options[regular.selectedIndex].value;
        var peryear = document.getElementById("peryear");
        peryear.disabled = selectedValue == "No" ? false : true;
        if (!peryear.disabled) {
            peryear.focus();
        }
    }

     $(document).ready(function(){
   // Check or Uncheck All checkboxes
   $("#checkall").change(function(){
     var checked = $(this).is(':checked');
     if(checked){
       $(".form-check-input").each(function(){
         $(this).prop("checked",false);
       });
     }else{
       $(".form-check-input").each(function(){
         $(this).prop("checked",false);
       });
     }
   });
 
  // Changing state of CheckAll checkbox 
  $(".form-check-input").click(function(){
 
    if($(".form-check-input").length == $(".form-check-input:checked").length) {
      $("#checkall").prop("checked", false);
    } else {
      $("#checkall").prop("checked", false);
    }

  });
});

             $(function(){
  $('#none').on('change',function(){
     var ok = document.getElementById("ok");
     var ok1 = document.getElementById("ok1");
     var ok2 = document.getElementById("ok2");
     var ok3 = document.getElementById("ok3");
     var ok4 = document.getElementById("ok4");
     var ok5 = document.getElementById("ok5");
     if ($(this).prop('checked') === true){
       $('#ok').prop('checked', false);
       $('#ok1').prop('checked', false);
       $('#ok2').prop('checked', false);
       $('#ok3').prop('checked', false);
       $('#ok4').prop('checked', false);
       $('#ok5').prop('checked', false);
     }
  });
  
  $('#ok,#ok1,#ok2,#ok3,#ok4,#ok5').on('change',function(){
      var noone = document.getElementById("noneAboveCheck");
      if ($(this).prop('checked') === true){
         $('#none').prop('checked', false);
      } 
  });
});
</script>
<script type="text/javascript">

</script>
    </body>
  </html>
   