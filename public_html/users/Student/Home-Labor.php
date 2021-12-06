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
      <link rel="stylesheet" type="text/css" href="../../css/main_main.css">
      <link rel="stylesheet" type="text/css" href="../../css/upstyle_main.css">
      <link rel="stylesheet" type="text/css" href="../../css/upstyle_shy.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
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
    <div class="red"></div>
      <!-- Navbar-->

    
    <span id="current_student_id" class="collapse"></span>
      <!-- Navbar-->
        <div class="row">
            <div class="col-md-6 contents">
              <img src="../../images/waww.png"  alt="Image" class="img-fluid mt-5" >
            </div>
            <div class="col-md-6">
                <div style="background-color:  #193541;  padding: 12px 10px;">
                    <div class="info" style="color: #FFFFFF;">
                      <center>
                        <h5 class="mb-2">HOW TO BE A STUDENT ASSISTANT?</h5>
                      </center>
                    </div>
                </div>
                <div class="tile">  
                  <div class="tile-body">
                    <p style="text-align: center; font-weight: bold;"> Qualification of SL Applicant</p> 
               
                    <p style="font-weight: bold;">
                        • Must be currently enrolled with a load of eighteen (18) units or below.<br>
                        • Must not be a first (1 st) year student, a new transferee, or in his/her last semester as a graduating student. <br>
                        • No failed or incomplete (INC) grade from the previous semester.<br>
                    </p>

                  </div>
                  <br>
                  <div class="tile-body"  >

                    <p style="text-align: center; font-weight: bold;"> Requirements</p> 
               
                    <p style="font-weight: bold;">
                        • Obtain an application form from the OSAS (by clicking the apply now button below).<br>
                        • Fill-in the application form. <br>
                        • Attach a Photocopied certificates of grades (COG) in the form. <br>
                    </p>

                  </div>

                  <br>
                  <div class="tile-body"  ><p style="text-align: center; font-weight: bold;"> Responsibilities of Accepted Student Laborer</p> 
               
                    <p style="font-weight: bold;">
                        • He/she shall commence work after receiving the approved student labor application form from the OSAS.   Supervised by a regular employee, he/she shall accomplish the specified duties and responsibilities in the application form.<br>
                        •   Shall render service based on the specified schedule in the application form.<br>
                        •   Must at all times, observe professional ethics in the work place. <br>
                        •   Should always use the DTR to time in and out. <br>
                    </p>

                  </div>

                  <br>
                  <br>
                    <a class="btn btn-primary icon-btn center submit-btn" style="color: white;"> APPLY NOW</a> 
                  <br>    
               </div>
            </div>

        </div>
  </main>




            
            
        

    <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
      <script type="text/javascript">
        
  $(document).ready(function($){

    $(document).on("click",".submit-btn",function(){
        
              $.ajax({
                url:"../../php/O-StudentDefault/otherqueries.php",
                method:"POST",
                data:{queryid:1},
                success:function(response)
                 {
                      try {
                        var obj = JSON.parse(response);
                        var application_status = obj[0].already_applied;
                        var job_hirings = obj[0].job_hirings;
                        var stat = obj[0].sl_status;
                        if (application_status == 0 && job_hirings > 0 && stat!='Hired'){
                          window.location = "Apply-Labor.php";
                        }
                        if (job_hirings==0) {
                          swal("No Job Hirings!", "There are currently no job postings. Check the job hiring page to be kept up to date!", "warning");
                        } else if (application_status > 0) {
                          swal("Once is enough!", "You can only submit an application form one at a time!", "warning");
                        }
                        if (stat=='Hired'){
                          swal("Oops!", "You are already Hired! Apply again once your contract is done!", "warning");
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

      </script>
      <?php       
          if (isset($_REQUEST['applicationid'])){
             $data = array();
             $applicantid = $_REQUEST['applicationid'];
             $query=mysqli_query($conn,"CALL MainGetApplicationFormInfo($applicantid)");
              while($row=mysqli_fetch_array($query)){
                $student_sign = base64_encode($row['e_signature']);
                $head_sign = base64_encode($row['head_signature']);
                $osas_sign = base64_encode($row['assessor_signature']);
                $picz = ($row['pic']==null) ? '../../images/transparentbg.png' :'data:image/jpeg;base64,'.base64_encode($row['pic']);
                $row['pic'] = $picz;
                $row['e_signature'] = $student_sign;
                $row['head_signature'] = $head_sign;
                $row['assessor_signature'] = $osas_sign;
                $data[] = $row;
              }

              echo '
                <button data-toggle="modal" data-target="#application-form-modal" class="collapse" id="open-contract"></button>
                  <div class="modal fade" id="application-form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Student Labor Form and Contract</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form id="applicant-form">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="table-responsive">
                                          <table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th style="border: 1px solid #404040;" rowspan="5"><img src="../../images/logo.png" width="100px;"></th> 
                                                <th style="border: 1px solid #404040;" rowspan="5" class="text-center">
                                                  <span class="fs-11 d-block">Republic of the Philippines</span>
                                                  <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span>
                                                  <span class="fs-11 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                                  <span class="fs-11 d-block">Telephone: (082) 227-8192</span>
                                                  <span class="fs-11 d-block">Website: www.usep.edu.ph</span>
                                                  <span class="fs-11 d-block">Email: president@usep.edu.ph</span>
                                                </th>  
                                                <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="">Form No. </th>
                                                <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">FM-USeP-HSC-01
                                                </th>
                                              </tr>
                                              <tr>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Issue Status  </th>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;"colspan="2">02</th>
                                             </tr>
                                             <tr>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Revision No.  </th>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01</th>
                                             </tr>
                                             <tr>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Date Effective  </th>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01 March 2018
                                               </th>
                                             </tr>
                                             <tr>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Approved by </th>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">President
                                               </th>
                                             </tr>
                                             <tr>
                                              <th  style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">STUDENT LABOR APPLICATION FORM AND CONTRACT
                                              </th>
                                            </tr>
                                          </thead>
                                        </table>
                                      </div>
                                      </div>
                                    </div>  

                                    <div class="row p-2">
                                      <div class="col-sm-10">
                                        <div class="row"><div style="height:50px"></div></div>
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <div class="form-group fg">
                                              <label class="control-label cl">Type of Student Labor:</label>
                                            </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="form-group fg">
                                              ';

              if ($data[0]['labor_type']=='Paid Labor (SL)'){
                echo '
                                                <div class="form-check ">
                                                  <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" id="paid-labor" name="labor_type" checked readonly>Paid Labor (SL)
                                                  </label>
                                                </div>
                                                <div class="form-check ">
                                                  <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="labor_type" id="unpaid-labor" disabled>Unpaid Labor (SL)
                                                  </label>
                                                </div>

                ';
              } else {
                echo '
                                                <div class="form-check ">
                                                  <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" id="paid-labor" name="labor_type" disabled>Paid Labor (SL)
                                                  </label>
                                                </div>
                                                <div class="form-check ">
                                                  <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="labor_type" id="unpaid-labor" checked>Unpaid Labor (SL)
                                                  </label>
                                                </div>

                ';
              }
              echo '
                                                
                                              </div>
                                          </div>
                                          <div class="col-sm-1">
                                            <div class="form-group fg">
                                              <label class="control-label cl">Class:</label>
                                            </div>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="form-group fg">
              ';
              if ($data[0]['labor_class']=='Day'){
                echo '
                                              <div class="form-check ">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="radio" name="class_type" id="day_class" checked readonly>Day
                                                </label>
                                              </div>
                                              <div class="form-check ">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="radio" name="class_type" id="night_class" disabled>Evening
                                                </label>
                                              </div>
                ';
              } else {
                echo '
                                              <div class="form-check ">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="radio" name="class_type" id="day_class" disabledy>Day
                                                </label>
                                              </div>
                                              <div class="form-check ">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="radio" name="class_type" id="night_class" checked>Evening
                                                </label>
                                              </div>
                ';
              }
              
              echo'
                                            </div>
                                          </div>
                                          <div class="col-sm-1">
                                            <div class="form-group fg">
                                              <label class="control-label cl">Status:</label>
                                            </div>
                                          </div>
                                          <div class="col-sm-1">
                                            <div class="form-group fg">
              ';
              if ($data[0]['labor_status']=='New'){
                echo '
                                              <div class="form-check ">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="radio" name="status_type" id="new_status" checked>New
                                                </label>
                                              </div>
                                              <div class="form-check ">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="radio" name="status_type" id="renew_status" disabled>Renewal
                                                </label>
                                              </div>
                ';
              } else {
                echo '
                                              <div class="form-check ">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="radio" name="status_type" id="new_status" disabled>New
                                                </label>
                                              </div>
                                              <div class="form-check ">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="radio" name="status_type" id="renew_status" checked>Renewal
                                                </label>
                                              </div>
                ';
              }
              echo '


                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lx-2">
                                        <div class="app-form-dp float-right">
                                          <img src="'.$data[0]['pic'].'" style="max-width: 100%;">
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row mt-3 p-2">
                                      <div class="col-sm">
                                        <div class="form-group fg">
                                          <label class="control-label cl">Name:</label>
                                          <input class="form-control pl-2 fc2 blck bg-white applicant-name-upper font-weight-bold" type="text"  value="'.$data[0]['applicant_name'].'" disabled>
                                          <label class="control-label cl">Course & Year:</label>
                                          <input class="form-control pl-2 fc2 blck bg-white font-weight-bold" type="text" id="course-year" value="'.$data[0]['course'].' - '.$data[0]['year_level'].'" disabled>
                                        </div>
                                        <div class="form-group fg">
                                          <label class="control-label cl">Address:</label>
                                          <input class="form-control pl-2 fc2 w1000 bg-white font-weight-bold" type="text" id="address" value="'.$data[0]['full_address'].'"  disabled>
                                        </div>
                                        <div class="form-group fg">
                                          <label class="control-label cl">Phone/Mobile No.:</label>
                                          <input class="form-control pl-2 fc2 w200 bg-white font-weight-bold" type="text" id="phone_num" value="'.$data[0]['phone_number'].'" disabled>
                                          <label class="control-label cl">E-mail Address:</label>
                                          <input class="form-control pl-2 fc2 blck bg-white font-weight-bold" type="text" id="emai_add" value="'.$data[0]['email_add'].'" disabled>
                                        </div>
                                        <div class="form-group fg">
                                          <label class="control-label cl">Birth Date:</label>
                                          <input class="form-control pl-2 fc2 blck bg-white font-weight-bold" type="text" id="bday" value="'.$data[0]['applicant_bday'].'" disabled>
                                          <label class="control-label cl">Birth Place:</label>
                                          <input class="form-control pl-2 fc2 blck bg-white font-weight-bold" type="text" id="birthplace" value="'.$data[0]['birth_place'].'" disabled>
                                        </div>
                                        <div class="form-group fg">
                                          <label class="control-label cl">Semester & School Year Covered:</label>
                                          <input class="form-control pl-2 fc2 w200 bg-white font-weight-bold" type="text" id="sem_year" value="'.$data[0]['semester_year'].'" disabled>
                                          <label class="control-label cl">Time Available:</label>
                                          <input class="form-control pl-2 fc2 w200 bg-white font-weight-bold" type="text" id="time_available" value="'.$data[0]['time_available'].'" disabled>
                                        </div>
                                        <div class="form-group fg">
                                          <label class="control-label cl">Attached:</label>   
                                        </div>
                                        <div class="form-group fg  mlff">
                                          <i class="fas fa-check mr-1"> </i>
                                          <label class="control-label cl"> Certificate of Grades</label>   
                                        </div>
                                        <div class="form-group fg  mlff">
                                          <i class="fas fa-check mr-1"> </i><label class="control-label cl"> Certificate of Registration (COR) </label>   
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-8">
                                          <div class="form-group fg">
                                            <label class="control-label cl">Proposed College/ Unit of Assignment:</label>
                                            <input class="form-control pl-2 fc2 w200 bg-white font-weight-bold" type="text" id="proposed_college" value="'.$data[0]['office_name'].'" disabled>
                                          </div>
                                        </div>
                                        <div class="col-4">
                                         <div class="form-group fg text-center">
                                          <img id="student_signature" class="e-sign" height="200" width="200" style="margin-bottom:-70px; margin-top:-50px; position:relative; margin-right:100px; margin-left: -30px" src="data:image/jpeg;base64,'.$data[0]['e_signature'].'" />
                                          <input class="form-control pl-2 fc2 w200  bg-white applicant-name-upper text-uppercase font-weight-bold text-center" type="text" value="'.$data[0]['applicant_name'].'"  disabled>
                                          <br>
                                          <label class="control-label cl">Print Name and Signature</label>
                                        </div>
                                        </div>
                                    </div>

                                    <br>
                                    <hr>
                                    <br>';
            if ($data[0]['recommendation_status']==1){
              echo '
                                    <div class="rec1-container p-4">
                                        <h6 class="text-center mb-4">RECOMMENDATION</h6>
                                        <p class="text-justify w-100 p">This is to recommend Mr./Ms.

                                          <input class="form-control fc2 p-2 bg-white applicant-name-recommendation font-weight-bold text-center" type="text" value="'.$data[0]['applicant_name'].'" disabled>

                                          who is a bona-fide student of 

                                          <input class="form-control fc2 p-2 bg-white font-weight-bold text-center" type="text" id="dept_college"  value="'.$data[0]['course'].' - '.$data[0]['college'].'" disabled> 

                                          and of good moral character.<br>
                                          <span class="ml-5" style="font-size: 12px;">(Department/College)</span>
                                        </p>

                                         <div class="row">
                                              <div class="col-8">
                                                
                                              </div>
                                              <div class="col-4">
                                              <div class="form-group fg text mb-2 text-center align-middle">
                                              <img id="head_signature" class="e-sign" height="200" width="200" style="margin-bottom:-70px; margin-top:-50px; position:relative; margin-right:100px; margin-left: -30px" src="data:image/jpeg;base64,'.$data[0]['head_signature'].'" />
                                              <input class="form-control pl-2 fc2 w200  bg-white applicant-name text-uppercase font-weight-bold text-center" id="unit-head-name" value="'.$data[0]['staff_requested_by'].'" type="text" disabled><br>
                                              <label class="control-label mr65 w-100">Faculty/Staff</label>
                                            </div>
                                              </div>
                                            </div>
                                    </div>';
            } else {
              echo '
                                    <div class="rec1-container p-4">
                                        <h6 class="text-center mb-4">RECOMMENDATION</h6>
                                        <p class="text-justify w-100 p">This is to recommend Mr./Ms.

                                          <input class="form-control fc2 p-2 bg-white applicant-name-recommendation font-weight-bold text-center" type="text"   disabled>

                                          who is a bona-fide student of 

                                          <input class="form-control fc2 p-2 bg-white font-weight-bold text-center" type="text" id="dept_college" disabled> 

                                          and of good moral character.<br>
                                          <span class="ml-5" style="font-size: 12px;">(Department/College)</span>
                                        </p>

                                         <div class="row">
                                              <div class="col-8">
                                                
                                              </div>
                                              <div class="col-4">
                                              <div class="form-group fg text mb-2 text-center align-middle">
                                              <img id="head_signature" class="e-sign" height="200" width="200" style="margin-bottom:-70px; margin-top:-50px; position:relative; margin-right:100px; margin-left: -30px" src="../../image/transparentbg.png" />
                                              <input class="form-control pl-2 fc2 w200  bg-white applicant-name text-uppercase font-weight-bold text-center" id="unit-head-name" type="text" disabled><br>
                                              <label class="control-label mr65 w-100">Faculty/Staff</label>
                                            </div>
                                              </div>
                                            </div>
                                    </div>

              ';
             }
             echo '
                                    <br>
                                    <hr>
                                   <br>
             ';


            if ($data[0]['acceptance_contract_status']==1){
              echo '
                                    <div class="rec1-container p-4">
                                      <h6 class="text-center mb-4">ACCEPTANCE</h6>
                                      <p class="text-justify w-100 p">This is to accept the applicant to perform the following duties and responsibilities. He/She shall render service for four(4) hours a day for 5 days with an hourly rate of Php 25.00.</p>
                                        <br>
                                      <div class="row">
                                        <div class="col-sm-7">
                                          <h6 class="font-weight-bold"> DUTIES AND RESPONSIBILITIES<br></h6>
                                          <input class="form-control fc2 p-2   font-weight-bold" type="text" id="duty1" value="'.$data[0]['duty1'].'" disabled>
                                          <input class="form-control fc2 p-2  font-weight-bold" type="text" id="duty2" value="'.$data[0]['duty2'].'"  disabled>
                                          <input class="form-control fc2 p-2  font-weight-bold" type="text" id="duty3" value="'.$data[0]['duty3'].'"  disabled> 
                                          <input class="form-control fc2 p-2  font-weight-bold" type="text" id="duty4" value="'.$data[0]['duty4'].'"  disabled>
                                          </div>
                                        <div class="col-sm-4">
                                          <h6 class="font-weight-bold"> SCHEDULE OF SERVICE<br></h6>
                                          <input class="form-control fc2 w-100 pl-2  font-weight-bold" type="text" id="schedule1" value="'.$data[0]['schedule1'].'"  disabled>
                                          <input class="form-control fc2 w-100 pl-2  font-weight-bold" type="text" id="schedule1" value="'.$data[0]['schedule2'].'"  disabled>
                                          </div>
                                          <br>
                                          <p class="text-justify w-100 p font-weight-bold">&emsp;&emsp;&emsp;&emsp;NOTE: Renewal for another term depends on working attitude and performance.</p>
                                        <br>
                                      </div>
                                      <div class="row">
                                            <div class="col-4">
                                            <div class="form-group fg text mb-2 ">Recommended By:
                                            <br><br>
                                            <input class="form-control fc2 mr-1 p-2 w-100 " type="text" value="'.$data[0]['dean_unit_assigned'].'" disabled><br>
                                            <label class="control-label mr65 w-100">Dean/Director (Unit Assigned)</label>
                                            </div>
                                            <div class="col-4">
                                          </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-sm-4">
                                            <div class="form-group fg text mb-2 ">Recommending Approval
                                            </div>
                                            </div>
                                            <div class="col-sm-4">
                                            <div class="form-group fg text mb-2 ">
                                            </div>
                                          </div>
                                            <div class="col-sm-1">
                                            <div class="form-group fg text mb-2 ">Approved
                                            </div>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-4" style="margin-top: -80px;">
                                          <div class="form-group fg text mb-2 text-center align-middle">

                                          <img id="coordinator_signature" class="e-sign" height="150" width="150" style="margin-bottom:-70px; margin-top:-50px; position:relative; margin-right:100px; margin-left: -30px"  src="data:image/jpeg;base64,'.$data[0]['assessor_signature'].'" />
                                            <input class="form-control fc2 mr-1 p-2 w-100 text-center text-uppercase" id="assessed_name" type="text" value="'.$data[0]['assessed_name'].'"  disabled><br>
                                            <label class="control-label mr65 w-100">Coordinator, OSAS </label>
                                          </div>
                                        </div>
                                        <div class="col-4">
                                          <div class="form-group fg text mb-2 text-center align-middle">
                                            <input class="form-control fc2 mr-1 p-2 w-100 text-center text-uppercase" type="text" value="'.$data[0]['budget_officer'].'" disabled><br>
                                            <label class="control-label mr65 w-100">Budget Officer </label>
                                          </div>
                                        </div>
                                        <div class="col-4">
                                          <div class="form-group fg text mb-2 text-center align-middle">
                                            <input class="form-control fc2 mr-1 p-2 w-100 text-center text-uppercase" type="text" value="'.$data[0]['chancellor'].'" disabled><br>
                                            <label class="control-label mr65 w-100">Chancellor</label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>

                                    <br><hr>

                                    <p class=" w-100 text-center align-middle font-weight-bold">For the Office of Student Affairs and Services only</p>
                                    <br>

                                    <div class="row">
                                      <div class="col-sm-5">
                                        <p >Office Assignment: 
                                        <input class="form-control fc2 mr-1 p-2 w-100 font-weight-bold" type="text" id="office-assigned" value="'.$data[0]['office_name'].'"  disabled><br>
                                      </div>
                                      <div class="col-sm-2">
                                      </div>
                                      <div class="col-sm">
                                        <p >Starting Date: 
                                        <input class="form-control fc2 mr-1 p-2 w-100 " type="text" id="starting-date" value="'.$data[0]['starting_date'].'"  disabled><br>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-5">
                                      </div>
                                      <div class="col-sm-2">
                                      </div>
                                      <div class="col-sm">
                                        <p >Expiration Date: 
                                        <input class="form-control fc2 mr-1 p-2 w-100 " type="text" id="expiration-date"value="'.$data[0]['expiration_date'].'"  disabled><br>
                                      </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                      <div class="col-8">
                                      </div>
                                      <div class="col-sm">
                                        <div class="form-group fg text mb-2 text-center align-middle">
                                          <input class="form-control fc2 mr-1 p-2 w-100 " type="text"  disabled><br>
                                          <label class="control-label mr65 w-100">Employee Signature Over Printed Name</label>
                                        </div>
                                      </div>
                                    </div>
              ';
            } else {
              echo '

                                    <div class="rec1-container p-4">
                                      <h6 class="text-center mb-4">ACCEPTANCE</h6>
                                      <p class="text-justify w-100 p">This is to accept the applicant to perform the following duties and responsibilities. He/She shall render service for four(4) hours a day for 5 days with an hourly rate of Php 25.00.</p>
                                        <br>
                                      <div class="row">
                                        <div class="col-sm-7">
                                          <h6 class="font-weight-bold"> DUTIES AND RESPONSIBILITIES<br></h6>
                                          <input class="form-control fc2 p-2   font-weight-bold" type="text" id="duty1" disabled>
                                          <input class="form-control fc2 p-2  font-weight-bold" type="text" id="duty2" disabled>
                                          <input class="form-control fc2 p-2  font-weight-bold" type="text" id="duty3" disabled> 
                                          <input class="form-control fc2 p-2  font-weight-bold" type="text" id="duty4" disabled>
                                          </div>
                                        <div class="col-sm-4">
                                          <h6 class="font-weight-bold"> SCHEDULE OF SERVICE<br></h6>
                                          <input class="form-control fc2 w-100 pl-2  font-weight-bold" type="text" id="schedule1" disabled>
                                          <input class="form-control fc2 w-100 pl-2  font-weight-bold" type="text" id="schedule1" disabled>
                                          </div>
                                          <br>
                                          <p class="text-justify w-100 p font-weight-bold">&emsp;&emsp;&emsp;&emsp;NOTE: Renewal for another term depends on working attitude and performance.</p>
                                        <br>
                                      </div>
                                      <div class="row">
                                            <div class="col-4">
                                            <div class="form-group fg text mb-2 ">Recommended By:
                                            <br><br>
                                            <input class="form-control fc2 mr-1 p-2 w-100 " type="text"  disabled><br>
                                            <label class="control-label mr65 w-100">Dean/Director (Unit Assigned)</label>
                                            </div>
                                            <div class="col-4">
                                          </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-sm-4">
                                            <div class="form-group fg text mb-2 ">Recommending Approval
                                            </div>
                                            </div>
                                            <div class="col-sm-4">
                                            <div class="form-group fg text mb-2 ">
                                            </div>
                                          </div>
                                            <div class="col-sm-1">
                                            <div class="form-group fg text mb-2 ">Approved
                                            </div>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-4" style="margin-top: -70px;">
                                          <div class="form-group fg text mb-2 text-center align-middle">

                                          <img id="coordinator_signature" class="e-sign" height="150" width="150" style="margin-bottom:-70px; margin-top:-50px; position:relative; margin-right:100px; margin-left: -30px" src="../../image/transparentbg.png" />
                                            <input class="form-control fc2 mr-1 p-2 w-100 " id="assessed_name" type="text" disabled><br>
                                            <label class="control-label mr65 w-100">Coordinator, OSAS </label>
                                          </div>
                                        </div>
                                        <div class="col-4">
                                          <div class="form-group fg text mb-2 text-center align-middle">
                                            <input class="form-control fc2 mr-1 p-2 w-100 " type="text"  disabled><br>
                                            <label class="control-label mr65 w-100">Budget Officer </label>
                                          </div>
                                        </div>
                                        <div class="col-4">
                                          <div class="form-group fg text mb-2 text-center align-middle">
                                            <input class="form-control fc2 mr-1 p-2 w-100 " type="text"  disabled><br>
                                            <label class="control-label mr65 w-100">Chancellor</label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>

                                    <br><hr>

                                    <p class=" w-100 text-center align-middle font-weight-bold">For the Office of Student Affairs and Services only</p>
                                    <br>

                                    <div class="row">
                                      <div class="col-sm-5">
                                        <p >Office Assignment: 
                                        <input class="form-control fc2 mr-1 p-2 w-100 font-weight-bold" type="text" id="office-assigned" disabled><br>
                                      </div>
                                      <div class="col-sm-2">
                                      </div>
                                      <div class="col-sm">
                                        <p >Starting Date: 
                                        <input class="form-control fc2 mr-1 p-2 w-100 " type="text" id="starting-date"  disabled><br>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-5">
                                      </div>
                                      <div class="col-sm-2">
                                      </div>
                                      <div class="col-sm">
                                        <p >Expiration Date: 
                                        <input class="form-control fc2 mr-1 p-2 w-100 " type="text" id="expiration-date"  disabled><br>
                                      </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                      <div class="col-8">
                                      </div>
                                      <div class="col-sm">
                                        <div class="form-group fg text mb-2 text-center align-middle">
                                          <input class="form-control fc2 mr-1 p-2 w-100 " type="text" disabled><br>
                                          <label class="control-label mr65 w-100">Employee Signature Over Printed Name</label>
                                        </div>
                                      </div>
                                    </div>
              ';
            }
            echo '



                                  
                                    
                                

                                    <br>
                                    <hr><br>


                                <div class="">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="table-responsive">
                                          <table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th style="border: 1px solid #404040;" rowspan="5"><img src="../../images/logo.png" width="100px;"></th> 
                                                <th style="border: 1px solid #404040;" rowspan="5" class="text-center">
                                                  <span class="fs-11 d-block">Republic of the Philippines</span>
                                                  <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span>
                                                  <span class="fs-11 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                                  <span class="fs-11 d-block">Telephone: (082) 227-8192</span>
                                                  <span class="fs-11 d-block">Website: www.usep.edu.ph</span>
                                                  <span class="fs-11 d-block">Email: president@usep.edu.ph</span>
                                                </th>  
                                                <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="">Form No. </th>
                                                <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">FM-USeP-HSC-01
                                                </th>
                                              </tr>
                                              <tr>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Issue Status  </th>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;"colspan="2">02</th>
                                             </tr>
                                             <tr>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Revision No.  </th>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01</th>
                                             </tr>
                                             <tr>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Date Effective  </th>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01 March 2018
                                               </th>
                                             </tr>
                                             <tr>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Approved by </th>
                                               <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">President
                                               </th>
                                             </tr>
                                             <tr>
                                              <th  style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">STUDENT LABOR APPLICATION FORM AND CONTRACT
                                              </th>
                                            </tr>
                                          </thead>
                                        </table>
                                      </div>
                                      </div>
                                    </div>  

                                    <div class="row">
                                              <div class="col">
                                                <div class="mlr s15" style="line-height: 2; font-family: Arial;">
                                                  <p class="text-justify w-100 p-print"><center>Qualification of SL Applicant</center>
                                                  <span>• Must be currently enrolled with a load of eighteen (18) units or below. </span><br>
                                                  <span> • Must not be a first (1 st) year student, a new transferee, or in his/her last semester as a graduating student.</span><br>
                                                  <span>• No failed or incomplete (INC) grade from the previous semester.</span><br>
                                                 </p>

                                                  <p class="text-justify w-100 p-print"><center>Requirements</center>
                                                    <span>• Obtain an application form from the OSAS. </span><br>
                                                    <span>• Fill-in the application form and attach a prescribe ID picture.</span><br>
                                                    <span>Attach a Photocopied certificates of grades (COG) and registration (COR). </span><br>
                                                  </p>

                                                  <p class="text-justify w-100 p-print"><center>Responsibilities of Accepted Student Laborer</center>
                                                    <span>• He/she shall commence work after receiving the approved student labor application form from the OSAS.   Supervised by a regular employee, he/she shall accomplish the specified duties and responsibilities in the application form.</span><br>
                                                    <span>• Shall render service based on the specified schedule in the application form.</span><br>
                                                    <span>• Must at all times, observe professional ethics in the work place. </span><br>
                                                    <span>• Shall regularly submit the signed daily time record (DTR) every first week of the month to the OSAS</span><br>
                                                  </p>
                                                </div>
                                              </div>
                                    </div>

                                    <br><br>
                                    ';
    if ($data[0]['acceptance_contract_status']==1){
      echo '                        <div class="row">
                                          <div class="col-sm-5">
                                            <p class="font-weight-bold">Conforme: <br><br>
                                            <div class="form-group fg text-center">
                                              <img id="student_signature" class="e-sign" height="200" width="200" style="margin-bottom:-70px; margin-top:-50px; position:relative; margin-right:100px; margin-left: -30px" src="data:image/jpeg;base64,'.$data[0]['e_signature'].'" />
                                              <input class="form-control fc2 mr-1 p-2 w-100 font-weight-bold text-center text-uppercase" type="text" value="'.$data[0]['applicant_name'].'" disabled><br>
                                              <label class="control-label mr65 w-100">Signature Over Printed Name</label>
                                            </p>
                                          </div>
                                          <div class="col-sm-2">
                                          </div>
                                          <div class="col-sm">
                                            <p class="font-weight-bold" >Date: <br><br>
                                              <input class="form-control fc2 mr-1 p-2 w-100 " type="text" value="'.date("m/d/Y").'" disabled><br>
                                            </p>
                                          </div>
                                    </div>';
    } else {
      echo '                        <div class="row">
                                          <div class="col-sm-5">
                                            <p class="font-weight-bold">Conforme: <br><br>

                                              <img id="applicant-signature-if-hired" class="e-sign" height="200" width="200" style="margin-bottom:-90px; margin-top:-50px; position:relative" src="../../image/transparentbg.png" />
                                              <input class="form-control fc2 mr-1 p-2 w-100 font-weight-bold text-uppercase" type="text"  disabled><br>
                                              <label class="control-label mr65 w-100">Signature Over Printed Name</label>
                                            </p>
                                          </div>
                                          <div class="col-sm-2">
                                          </div>
                                          <div class="col-sm">
                                            <p class="font-weight-bold" >Date: <br><br>
                                              <input class="form-control fc2 mr-1 p-2 w-100 " type="text" disabled><br>
                                            </p>
                                          </div>
                                    </div>';
    }
                                    
      echo '
                                    <br><br><br>

                                    <div class="float-left p-3 mt60"  style="border: 1px solid black;width: 300px; margin-bottom: 120px;" >
                                        <p class="lh-1 s12 text-left ">Original: Finance</p>
                                        <p class="lh-1 s12 text-left ">Duplicate: Office of Student Affairs and Services</p>
                                        <p class="lh-1 s12 text-left ">Triplicate: Dean\'s Copy or Unit Assigned</p>
                                        <p class="lh-1 s12 text-left ">Quadruplicate: Student Copy</p>
                                    </div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                               <button type="button" class="btn btn-success" id="send-signature" >Send</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                      </div>
                  </div>

                  <script type="text/javascript">
                    $(document).ready(function(){
                        $("#current_student_id").text("'.$_REQUEST['applicationid'].'");
                        $("#open-contract").trigger("click");
                    });
                  </script>
              ';
          }
                      
      ?>
                     
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


        $(document).on("click","#send-signature",function(){
          var id = $('#current_student_id').text().trim();
            swal({
              title: "Are you sure?",
              text: "By sending this application back to OSAS, you are agreeing to the statements above. Please read carefully!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Yes, I am sure!',
              cancelButtonText: "No, cancel plx!",
              closeOnConfirm: false,
             // closeOnCancel: false
            },
            function(isConfirm){
              if (isConfirm){

              $.ajax({
                url:"../../php/O-StudentDefault/signContract.php",
                method:"POST",
                data:{applicant_id:id},
                success:function(response)
                 {
                     console.log(response);
                    if (response.length == 0){
                        
                        swal({
                          title: "Congratulations!",
                          text: "You are now hired! Please log in again to apply changes!",
                          type: "warning",
                          showCancelButton: false,
                          confirmButtonColor: '#DD6B55',
                          confirmButtonText: 'Okay!',
                          closeOnConfirm: false,
                          //closeOnCancel: false
                        },
                        function(){
                          window.location="../../index.php";
                        });
                    } else {
                      swal("Server error!", "An error occurred. Please redo your action or reload the page!", "warning");
                         $("#application-form-modal").modal("toggle");
                    }                                          
                 },
                error: function(response){
                    alert("fail" + JSON.stringify(response));
                 }
                });
              } 
              // else {
              //   swal("Cancelled", "Your imaginary file is safe :)", "error");
              // }
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
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../../js/jquery.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
  <script type="text/javascript">
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


  </script>
  </body>
</html>