<?php
include("config.php");
include("conn.php");
 include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'Clinic'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where (user_id='$id' or office_id = 3) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}
if(isset($_GET['patient_id']))

{
  $patientid = $_GET['patient_id'];
  $sql = mysqli_query($mysqli, "SELECT * from patient_list where patient_id='$patientid'");
  while ($row = mysqli_fetch_array($sql)){
        $pic = $row['pic'];
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $sex = $row["sex"];
    $course = $row["course_department"];
    $address = $row["address"];
    $age = $row ["age"];
    $nationality = $row ["nationality"];
    $religion = $row ["religion"];
    $birthdate = $row ["birth_date"];
    $status = $row ["civil_status"];
    $phone_num = $row ["phone_number"];
    $e_sig = $row ["e_signature"];

  }
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
      <title>USeP Clinic Admin Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="css/all.min.css">
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

        
           <header class="app-header">
    
   
      </header>



      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="image/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">USEP CLINIC</p>
          </div>
        </div>

        <hr>

       <ul class="app-menu font-sec">
       
          <li><a class="app-menu__item" href="Admin-Dashboard.php"><i class="app-menu__icon fa fa-chart-bar"></i><span class="app-menu__label">Dashboard</span></a></li>
           <li><a class="app-menu__item active" href="Admin-PatientList.php"><i class="app-menu__icon fas fa-user-alt"></i><span class="app-menu__label">Patient</span></a></li>


          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Consultation</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-NewConsultation.php">New Consultation</a></li>
              <li><a class="treeview-item" href="Admin-ListOfConsultation.php">List of Consultation</a></li>
            </ul>
          </li>

 
          <li><a class="app-menu__item" href="Admin-Appointment.php"><i class="app-menu__icon fa fa-calendar-alt"></i><span class="app-menu__label">Appointment</span></a></li>
          <li><a class="app-menu__item" href="Admin-Prescription.php"><i class="app-menu__icon fas fa-prescription"></i><span class="app-menu__label">Prescription</span></a></li>

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-file-medical"></i><span class="app-menu__label">Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Request.php">Medical Certificate</a></li>
              <li><a class="treeview-item" href="Admin-MedicalRecordCert.php">Medical Records Certification</a></li>
              <li><a class="treeview-item" href="Admin-RequestHistory.php">Request History</a></li>
            </ul>
          </li>


          <li class="p-2 sidebar-label"><span class="app-menu__label">INVENTORY</span></li>

           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-tools"></i><span class="app-menu__label">Equipment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Supplies&Equipment.php">Equipment List</a></li>
              <li><a class="treeview-item" href="Admin-Stock-Supplies&Equipment.php">Inventory</a></li>
            </ul>
          </li>

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-clipboard-list"></i><span class="app-menu__label">Item</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ItemUnit.php">Item Unit</a></li>
              <li><a class="treeview-item" href="Admin-ItemList.php">Item List</a></li>
              <li><a class="treeview-item" href="Admin-ItemInventory.php">Item Inventory</a></li>
              <li><a class="treeview-item" href="Admin-ItemStock.php">Overall Stock</a></li>
            </ul>
          </li>

          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Admin-MedicalPersonnel.php"><i class="app-menu__icon  fas fa-user-nurse"></i><span class="app-menu__label">Medical Personnel</span></a></li>
          <li><a class="app-menu__item" href="Clinic_Admin_Announcements.php"><i class="app-menu__icon fas fa-bullhorn"></i><span class="app-menu__label">Announcement</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ConsultationReports.php">Consultation Reports</a></li>
              <li><a class="treeview-item" href="Admin-ServicesSummaryReports.php">Medical Services Summary Reports</a></li>
              <li><a class="treeview-item" href="Admin-DentalSummaryReports.php">Dental Services Summary Reports</a></li>
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
        <li class="dropdown">
          <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
            <b style="color: red;"><?php echo $count;  ?></b>
            <i class=" fas fa-bell fa-lg mt-2"></i>
          </a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have <?php echo $count;  ?> new notifications.</li>              
              <div class="app-notification__content">                   
                <?php 
                  $count_sql="SELECT * from notif where (user_id=$id or office_id = 3)  order by time desc";
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
                 <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
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
       
   <?php  
                                  
                                // Import the file where we defined the connection to Database.     
                                    require_once "config.php";   
                                
                                    $per_page_record = 20;  // Number of entries to show in a page.   
                                    // Look for a GET variable page if not found default is 1.        
                                    if (isset($_GET["page"])) {    
                                        $page  = $_GET["page"];    
                                    }    
                                    else {    
                                      $page=1;    
                                    }    
                                
                                    $start_from = ($page-1) * $per_page_record;     
                                
                                    $query = "SELECT * FROM patient_list LIMIT $start_from, $per_page_record";     
                                    $rs_result = mysqli_query($mysqli, $query);   //and conn kay mao na ang sa variable sulod sa config 
                                ?> 
         <!--<div class="page-error tile">-->

          
<h2>Patient Information</h2> <br>

  

  <div class="row">
        <div class="col-xl">
          <div style="background-color: #C12C32; padding: 8px 10px;"> </div>
          <div class="tile">
                      <div class="container">
                         <div class="row">
                               <div class="col-4">

                                    <div style="height: 230px; width: 180px; border-radius: 50%; margin-left: 40px; "><object data="data:image/jpeg;base64,<?php echo base64_encode($pic); ?>" style=" vertical-align: middle; max-width: 100%; border-radius: 50%;"></div>
                                    <div style="text-align: right; margin-right: -6%; margin-top: 4%;">
                                      <img id="e_sig" src="image/logo.png" alt="logo" style=" vertical-align: middle; max-width: 100%; border-radius: 50%;"></div>
                                    </object>
                                     
                                            </div>
                                  </div>
                          
                                <div class="col-lg">
                                      <h5>Patient ID:&nbsp;<span class="font-weight-lighter ml-2"><?php echo $patientid ?></span></h5> 
                                      <h5>Patient Name:&nbsp;<span class="font-weight-lighter ml-2"><?php echo $fname ?>&nbsp;<?php echo $lname ?></span></h5>
                                      <h5>Sex:&nbsp;<span class="font-weight-lighter ml-2"><?php echo $sex ?></span></h5> 
                                      <h5>Course:&nbsp;<span class="font-weight-lighter ml-2"><?php echo $course ?></span></h5>
                                      <h5>Address:&nbsp;<span class="font-weight-lighter ml-2"><?php echo $address ?></span></h5> 
                                      <br>
                                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalLong" style="width:23%; text-align: left;" ; return false><i class="fas fa-exclamation-triangle"></i> View Medical Info</button>
                                    <br>
                                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalLong3" style="width: 23%; text-align: left; margin-top:2%"; return false><i class="fas fa-exclamation-triangle"></i> View Health Record</button>
                                    <br>
                                 
                        <div class="col">
                          <div class="inline-block float ml-2 mt-1"></div> 
                         </div>
                        </div>

                            </div>
                         </div>
                        </div>
                    

          <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <h3 class="mb-3 line-head">Patient History</h3>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-auto">

                      </div>

                      <div class="col">
                      
                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify" onClick="Export()" style="width: 100%;"><i class="fas fa-download"></i> Export </button></div>
                      </div>
                  </div>
                </div>


                  <div class="table-bd">
                <div class="table-responsive">
                  
                  <table class="table table-hover table-bordered" id="sampleTable2">

                    <thead>
                      <tr>
                      <th>Date</th>
                      <th class="max">Diagnosis</th>
                      <th>Treatment</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>

                  <?php 
                  $stats = 'Completed';
                  $sql = mysqli_query($mysqli, "SELECT * from consultation_details where patient_id='$patientid' and consultation_status='$stats' order by date_filed DESC");
                   while ($row = mysqli_fetch_array($sql)){ ?>
                  <tbody>
                    <td><?php echo $row['date_filed'] ?> </td>
                    <td><?php echo $row['diagnosis'] ?> </td>
                    <td><?php echo $row['treatment'] ?> </td>
                    <td><?php echo $row['remarks'] ?> </td>


                    </tbody>
                  <?php }?>
                  </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>  



              <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" id="content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Patient ID:&nbsp;<?php echo $patientid ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body c">
                  
                        <table style="width: 100%; border: 2px solid black; border-bottom: 0px; border-collapse: collapse;">
                          <tr> 
                            
                            <td rowspan="6" style="border-right: 1px solid black;"><div class="logo"><img id="logo" src="image/logo.png" style="width:120px; height: 120px; display: block; margin-left: auto; margin-right: auto;" alt="USeP Logo"/> </div>
                            </td>
                            <td style="text-align: center;">Republic of the Philippines</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black;">&nbsp;Form No.</td>
                            <td style="border: 1px solid black; border-bottom: 0px; text-align: center;">FM-USeP SMC-01</td>            
                          </tr>

                          <tr>
                            <td style="font-family: Old English Text MT; text-align: center; font-weight: bold; font-size: 18px;"> University of Southeastern Philippines </td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black;">&nbsp;Issue Status </td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black; text-align: center;"> 02 </td>
                          </tr> 

                          <tr>
                            <td style="text-align: center;">Iñigo St.  Bo. Obrero, Davao City, 8000</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black;">&nbsp;Revision No.</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black; text-align: center;">01</td>
                          </tr>

                          <tr>
                            <td style="text-align: center;">Telephone: (082) 227-8192</td> 
                            <td style="border: 1px solid black; border-bottom: 1px solid black;">&nbsp;Date Effective</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black; text-align: center;">1 March 2018</td>
                          </tr>

                          <tr>
                            <td style="text-align: center;">Website : www.usep.edu.ph</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black;">&nbsp;Approved by</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black; text-align: center;">President</td>
                          </tr>

                          <tr>
                            <td style="text-align: center;">Email: president @ usep.edu.ph </td>
                            <td style="border-left: 1px solid black;"></td>
                            <td style="border-left: 1px solid black;"></td>
                          </tr> 


                          <br>
                        </table>



                        <div class="container" style="border: 2px solid black; border-bottom: 0px;">

                        <br>


                        <table cellspacing="5px" style="width: 100%; border-spacing: 0px; border-collapse: separate;">
                          <tr>
                            <td style="text-align: center;"><h2> PATIENT PERMANENT RECORDS 2 </h2></td>
                           <td><div class="id-picture">
                               <object data="data:image/jpeg;base64,<?php echo base64_encode($pic); ?>" width="160px" height="160px"></div>
                                    <div style="text-align: right; margin-right: 55px; margin-top: 4%;">
                                      <img id="e_sig" src="image/logo.png" alt="logo" width="160px" height="150px"></div>
                                    </object>
                                  </div>
                                </td>
                          <table cellspacing="5px" style="width: 100%; border-spacing: 0px; border-collapse: separate;">
                            <tr>
                              <td colspan="4"><h5 class="font-weight-bold">Name:<span class="font-weight-lighter ml-2"><u><?php echo $fname ?>&nbsp;<?php echo $lname ?></u></h5></td>
                            </tr>
                            <tr>
                              <td colspan="2"><h5 class="font-weight-bold">Age:<span class="font-weight-lighter ml-2"><u><?php echo $age ?></u></h5></td>
                                <td><h5 class="font-weight-bold">Sex:<span class="font-weight-lighter ml-2"><u><?php echo $sex ?></u></h5></td>
                            </tr>
                            <tr>
                              <td colspan="2"><h5 class="font-weight-bold">Birthdate:<span class="font-weight-lighter ml-2"><u><?php echo $birthdate ?></u></span></h5></td>                            </tr>
                            <tr>
                              <td colspan="2"><h5 class="font-weight-bold">Status:<span class="font-weight-lighter ml-2"><u><?php echo $status ?></u></h5></td>
                                <td><h5 class="font-weight-bold">Course:<span class="font-weight-lighter ml-2"><u><?php echo $course ?></u></span></h5></td>
                            </tr>
                            <tr>
                              <td colspan="2"><h5 class="font-weight-bold">Nationality:<span class="font-weight-lighter ml-2"><u><?php echo $nationality ?></u></span></h5></td>.
                              <td><h5 class="font-weight-bold">Contact Num:<span class="font-weight-lighter ml-2"><u><?php echo $phone_num ?></u></span></h5></td>
                            </tr>
                            <tr>
                              <td colspan="4"><h5 class="font-weight-bold">Address:<span class="font-weight-lighter ml-2"><u><?php echo $address ?></u></span></h5></td>
                            </tr>
                        </table>
                        <br>
                    
                    </div>



            <!-- Table startes here -->
                        <div class="table-responsive marg">
                            <table  class="table table-bordered table-hover" style="border: 2px solid black;">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                  $sql = mysqli_query($mysqli, "SELECT * from patient_list where patient_id='$patientid'");
                   while ($row = mysqli_fetch_array($sql)){ ?>
                                
                                    <tr>
                                        <th>1.) Have you ever been admitted/hospitalized?</th>
                                        <td><?php echo $row['admitted'] ?></td>
                                    </tr>

                                     <tr>
                                        <th>1.1.) If yes, what illness?</th>
                                        <td><?php echo $row['admitted_illness'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>1.2.) When your illness has started?</th>
                                        <td><?php echo $row['admitted_illness_start'] ?></td>
                                    </tr>

                                     <tr>
                                        <th>2.) Have you ever had a surgical operation?</th>
                                        <td><?php echo $row['operation'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>2.1.) If yes, what kind?</th>
                                        <td><?php echo $row['operation_kind'] ?></td>
                                    </tr>

                                     <tr>
                                        <th>2.2.) When did your surgical operation happened?</th>
                                        <td><?php echo $row['operation_when'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>3.) What infectious disease(s) did you have? </th>
                                        <td><?php echo $row['infectious_disease'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>4.) Do you experience headache, dizziness or syncope at any time?</th>
                                        <td><?php echo $row['headaches'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>5.) At what age did you have you first menstruation?</th>
                                        <td><?php echo $row['mens_age_start'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>6.) Do you have regular monthly periods? </th>
                                        <td><?php echo $row['mens_regular'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>6.1.) If no, how often do you have your periods in a year? </th>
                                        <td><?php echo $row['mens_irregular'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>7.) Do you experience dysmenorrhea? </th>
                                        <td><?php echo $row['dysmenorrhea'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>8.) What other premenstrual symptoms do you have? </th>
                                        <td><?php echo $row['pms'] ?></td>
                                    </tr>
                                  
                                    </tbody>     
                                    </table>          
                    </div>
                    <br>
                    <br>

                <div>
                  <table style="width: 100%; border-collapse: collapse; width: 100%;">
                    <tr>
                      <td style="width: 70%;">
                        <h6 style="text-align: left;"> Date:</h6> 
                      </td>
                      <td>
                        <h6>Signature of Student: </h6>
                      </td>
                    </tr>      
                  </table>
                  <br>
                 

                  <div style="text-align: left; margin-left: 6%; font-size: 16px;"><b><?php echo $row['fillout_date']; ?></b>
                  <?php }?>    
                                    </div>
                                    <h6 class="font-weight-bold"><input type="text" readonly="" value=""  style="text-align: center; border-left:none;border-right: none;border-top:none;outline: none;cursor: default; width: 200px; margin-top: -10%;"></h6>
                                    <br>
                                    <br>
                                    <h6 class="font-weight-bold" style="text-align: right; margin-right: 28%; margin-top: -8%;"><input type="text" readonly="" value=""  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default; width: 210px; position: absolute; "></h6>

                            <div class="col-sm">
                                <div class="form-group">
                                    <div style="text-align: right; margin-right: 10%; margin-top: -13%;">
                                    <object data="data:image/jpeg;base64,<?php echo base64_encode($e_sig); ?>" width="100px" height="100px"></div>
                                    <div style="text-align: right; margin-right: -6%; margin-top: 4%;">
                                      <img id="e_sig" src="image/no_sig.png" alt="E-signature" width="150px" height="30px"></div>
                                    </object>
                                  </div>
                                  </div>
                            </div>


                          </div>
                        </div>
                        <br>
                   
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" id="btnPrint">Print</button>
                        </div>
      
                  
                </div>
            
              
            </div>
          </div>

                 
                <div class="modal fade " id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" id="HR_content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="id">Patient ID:&nbsp;<?php echo $patientid ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      

                      <div class="modal-body c">
              

                      <div class="container" id="labresult" style="border: 2px dashed black; ">
                    
                      <h5 style="margin-top: 10px;"><center>LAB RESULT</center></h5>
                      
                        <?php
                       
                    $query2=mysqli_query($mysqli,"select lab_tests from clinic_patient_info where patient_id='$patientid'");
                    if(mysqli_num_rows($query2) > 0){
                      $row2 = mysqli_fetch_assoc($query2); 
                      $file = explode(",",$row2['lab_tests']);
                    }

                      ?>
                      <label><b>Labtest 1: &nbsp;</b></label>
                      <a href="filesuploaded/<?php echo $file[0];?>" style="color: blue;">View labtest</a><br>
                      <label><b>Labtest 2: &nbsp;</b></label>
                      <a href="filesuploaded/<?php echo $file[1];?>" style="color: blue;">View labtest</a><br>
                      <label><b>Labtest 3: &nbsp;</b></label>
                      <a href="filesuploaded/<?php echo $file[2];?>" style="color: blue;">View labtest</a><br>

                   
                      <br>
                      </div>
                      <br>
                
                      <div class="line">
                        
                        <h6 class="font-weight-bold"><input type="text" readonly="" value=""  style="text-align: center;border-left:none;border-right: none;border-top: none; border-bottom: 2px solid black; outline: none;cursor: default; width: 100%;"></h6> 
                        </div>
                        <br>
                    
                        <table style="width: 100%; border: 2px solid black; border-bottom: 0px; border-collapse: collapse;">
                          <tr> 
                            <td rowspan="6" style="border-right: 1px solid black;"><div class="logo"><img id="logo" src="image/logo.png" style="width:120px; height: 120px; display: block; margin-left: auto; margin-right: auto;" alt="USeP Logo"/> </div>
                            </td>
                            <td style="text-align: center;">Republic of the Philippines</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black;">&nbsp;Form No.</td>
                            <td style="border: 1px solid black; border-bottom: 0px; text-align: center;">FM-USeP SMC-01</td>            
                          </tr>

                          <tr>
                            <td style="font-family: Old English Text MT; text-align: center; font-weight: bold; font-size: 18px;"> University of Southeastern Philippines </td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black;">&nbsp;Issue Status </td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black; text-align: center;"> 02 </td>
                          </tr> 

                          <tr>
                            <td style="text-align: center;">Iñigo St.  Bo. Obrero, Davao City, 8000</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black;">&nbsp;Revision No.</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black; text-align: center;">01</td>
                          </tr>

                          <tr>
                            <td style="text-align: center;">Telephone: (082) 227-8192</td> 
                            <td style="border: 1px solid black; border-bottom: 1px solid black;">&nbsp;Date Effective</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black; text-align: center;">1 March 2018</td>
                          </tr>

                          <tr>
                            <td style="text-align: center;">Website : www.usep.edu.ph</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black;">&nbsp;Approved by</td>
                            <td style="border: 1px solid black; border-bottom: 1px solid black; text-align: center;">President</td>
                          </tr>

                          <tr>
                            <td style="text-align: center;">Email: president @ usep.edu.ph </td>
                            <td style="border-left: 1px solid black;"></td>
                            <td style="border-left: 1px solid black;"></td>
                          </tr> 

                           

                     
                        </table>
                        <div class="container" style="border: 2px solid black; border-bottom: 0px;">

                        <br>


                        <table cellspacing="5px" style="width: 100%; border-spacing: 0px; border-collapse: separate;">
                          <tr>
                            <td style="text-align: center;"><h2> PATIENT PERMANENT RECORDS 2 </h2></td>
                            <td><div class="id-picture">
                               <object data="data:image/jpeg;base64,<?php echo base64_encode($pic); ?>" width="160px" height="160px"></div>
                                    <div style="text-align: right; margin-right: 55px; margin-top: 4%;">
                                      <img id="e_sig" src="image/logo.png" alt="logo" width="160px" height="150px"></div>
                                    </object>
                                  </div>
                                </td>

                          <table cellspacing="5px" style="width: 100%; border-spacing: 0px; border-collapse: separate;">
                            <tr>
                              <td colspan="4"><h5 class="font-weight-bold">Name:<span class="font-weight-lighter ml-2"><u><?php echo $fname ?>&nbsp;<?php echo $lname ?></u></h5></td>
                            </tr>
                            <tr>
                              <td colspan="2"><h5 class="font-weight-bold">Age:<span class="font-weight-lighter ml-2"><u><?php echo $age ?></u></h5></td>
                                <td><h5 class="font-weight-bold">Sex:<span class="font-weight-lighter ml-2"><u><?php echo $sex ?></u></h5></td>
                            </tr>
                            <tr>
                              <td colspan="2"><h5 class="font-weight-bold">Birthdate:<span class="font-weight-lighter ml-2"><u><?php echo $birthdate ?></u></span></h5></td>       
                            </tr>
                            <tr>
                              <td colspan="2"><h5 class="font-weight-bold">Status:<span class="font-weight-lighter ml-2"><u><?php echo $status ?></u></h5></td>
                                <td><h5 class="font-weight-bold">Course:<span class="font-weight-lighter ml-2"><u><?php echo $course ?></u></span></h5></td>
                            </tr>
                            <tr>
                              <td colspan="2"><h5 class="font-weight-bold">Nationality:<span class="font-weight-lighter ml-2"><u><?php echo $nationality ?></u></span></h5></td>.
                              <td><h5 class="font-weight-bold">Contact Num:<span class="font-weight-lighter ml-2"><u><?php echo $phone_num ?></u></span></h5></td>
                            </tr>
                            <tr>
                              <td colspan="4"><h5 class="font-weight-bold">Address:<span class="font-weight-lighter ml-2"><u><?php echo $address ?></u></span></h5></td>
                            </tr>

                        </table>

                        <br>
                  
                    </div>
                        <div class="table-responsive marg">
                            <table  class="table table-bordered table-hover" style="border: 2px solid black;">
                                <thead>
                                    <tr>
                                        <th>Patient Health Record</th>
                                        <th>Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 

                  $sql = mysqli_query($mysqli, "SELECT * from patient_health_record_medical where patient_id='$patientid'");
                   while ($row = mysqli_fetch_array($sql)){ ?>
                                 
                                    <tr>
                                        <th>A.) General Appearance</th>
                                        <td><?php echo $row['general_appearance'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Height </th>
                                        <td><?php echo $row['height'] ?></td>
                                    </tr>

                                     <tr>
                                        <th>&emsp;Weight </th>
                                        <td><?php echo $row['weight'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Pulse Rate </th>
                                        <td><?php echo $row['pulse_rate'] ?></td>
                                    </tr>

                                     <tr>
                                        <th>&emsp;Respiration Rate </th>
                                        <td><?php echo $row['respiration_rate'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Temperature </th>
                                        <td><?php echo $row['temperature'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;BP </th>
                                        <td><?php echo $row['blood_pressure'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Cardiac Rate (At rest) </th>
                                        <td><?php echo $row['cardiac_rate_at_rest'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Cardiac Rate (After physical activity) </th>
                                        <td><?php echo $row['cardiac_rate_after_activity'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>B.) Infectious Diseases </th>
                                        <td><?php echo $row['infectious_disease'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>C.) Social History  </th>
                                        <td><?php echo $row['social_history'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>D.) Family History </th>
                                        <td><?php echo $row['family_history'] ?></td>
                                    </tr>
                                     <tr>
                                        <th>E.) System Review </th>
                                        <td><?php echo $row['system_review'] ?></td>
                                    </tr>
                                     <tr>
                                        <th>&emsp;Skin </th>
                                        <td><?php echo $row['skin'] ?></td>
                                    </tr>
                                     <tr> 
                                        <th>&emsp;Lymph Nodes </th>
                                        <td><?php echo $row['lymph_nodes'] ?></td>
                                    </tr>
                                     <tr>
                                        <th>&emsp;Integument System </th>
                                        <td><?php echo $row['integument_system'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Circulatory System </th>
                                        <td><?php echo $row['circulatory_system'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Endocrine System </th>
                                        <td><?php echo $row['endocrine_system'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Allergic/Immunologic History </th>
                                        <td><?php echo $row['allergic_immunologic_history'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;HEENT </th>
                                        <td><?php echo $row['heent'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Mouth </th>
                                        <td><?php echo $row['mouth'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Breast </th>
                                        <td><?php echo $row['breast'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Respiratory System </th>
                                        <td><?php echo $row['respiratory_system'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Cardiovascular System </th>
                                        <td><?php echo $row['cardiovascular_system'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Gastrointestinal System </th>
                                        <td><?php echo $row['gastrointestinal_system'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Genitourinary Tract  </th>
                                        <td><?php echo $row['genitourinary_tract'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>&emsp;Psychiatric History / Mental Status </th>
                                        <td><?php echo $row['psychiatric_history'] ?></td>
                                    </tr>
                                  
                                    </tbody>     
                                    </table>  

                                    </div>   
                                   
                    <br>
                    <br>
                <div>
                  <table style="width: 100%; border-collapse: collapse; width: 100%;">
                    <tr>
                      <td style="width: 70%;">
                        <h6 style="text-align: left;"> Date:</h6> 
                      </td>
                      <td>
                        <h6>Signature of Student: </h6>
                      </td>
                    </tr>      
                  </table>
                  <br>

                  <div style="text-align: left; margin-left: 7%"><b><?php echo $row['date_filled_out_by_nurse']; ?></b>
                                      <?php }?> 
                                    </div>
                                    <h6 class="font-weight-bold"><input type="text" readonly="" value=""  style="text-align: center; border-left:none;border-right: none;border-top:none;outline: none;cursor: default; width: 200px; margin-top: -10%;"></h6>
                                    <br>
                                    <br>
                                    <h6 class="font-weight-bold" style="text-align: right; margin-right: 28%; margin-top: -8%;"><input type="text" readonly="" value=""  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default; width: 210px; position: absolute; "></h6>

                             <div class="col-sm">
                                <div class="form-group">
                                    <div style="text-align: right; margin-right: 10%; margin-top: -13%;">
                                    <object data="data:image/jpeg;base64,<?php echo base64_encode($e_sig); ?>" width="100px" height="100px"></div>
                                    <div style="text-align: right; margin-right: -6%; margin-top: 4%;">
                                      <img id="e_sig" src="image/no_sig.png" alt="E-signature" width="150px" height="30px"></div>
                                    </object>
                                  </div>
                                  </div>
                            </div>

                          </div>   
                          <br>
                          <br>
                   
                    </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btnPrint1">Print</button>
                </div>
      
                  </div>
                </div>
            
              
            </div>
          </div>



          <script type="text/javascript">

                    document.getElementById("btnPrint").onclick = function () {

                                    printElement(document.getElementById("content"));

                                };

                                function printElement(elem) {

                                    var domClone = elem.cloneNode(true);

                                    

                                    var $printSection = document.getElementById("printSection");

                                    

                                    if (!$printSection) {

                                        var $printSection = document.createElement("div");

                                        $printSection.id = "printSection";

                                        document.body.appendChild($printSection);

                                    }

                                    

                                    $printSection.innerHTML = "";

                                    $printSection.appendChild(domClone);

                                    window.print();

                                }

                </script>

                <script type="text/javascript">

                    document.getElementById("btnPrint1").onclick = function () {

                                    printElement(document.getElementById("HR_content"));

                                };

                                function printElement(elem) {

                                    var domClone = elem.cloneNode(true);

                                    

                                    var $printSection = document.getElementById("printSection");

                                    

                                    if (!$printSection) {

                                        var $printSection = document.createElement("div");

                                        $printSection.id = "printSection";

                                        document.body.appendChild($printSection);

                                    }

                                    

                                    $printSection.innerHTML = "";

                                    $printSection.appendChild(domClone);

                                    window.print();

                                }

                </script>

                <style>
                   @media screen {

                        #printSection {

                            display: none;

                        }

                    }



                    @page {
                      margin: 1cm;

                    }

                    @media print {

                     
                        #printableTable {
                          display: block;
                        }


                        body * {

                            visibility: hidden;


                        }



                        #printSection,

                        #printSection *,#container {

                            visibility: visible;
                            max-height: 100%;
                            

                        }

                        #printSection {

                            position: absolute;

                            left: 0;

                            top: 0;
                    }

                    #btnPrint{
                      display: none;
                    }


                    .close{
                      display: none;
                    }

                    .modal-header, .modal-footer, .modal-body c, .modal-title {
                      display: none;
                    }

                    .line {
                      display: none;
                    }

                    #labresult {
                      display: none;
                    }

                    #e_sig {
                      display: none;
                    }







                </style>









                <!--<div class="form-group col-md-6">

                  </form>
        </div>
               </div> </div>
                     
           
        <!--</div>-->
      </main>
      <!-- Essential javascripts for application to work-->
   <script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var special = document.getElementById("special");

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
    // Validate special characters ~`! @#$%^&*()_-+={[}]|\:;"'<,>.?/
  var numbes= /[!@#$%^&*-]/g;

  if(myInput.value.match(numbes)) {  
    special.classList.remove("invalid");
   special.classList.add("valid");
  } else {
    special.classList.remove("valid");
    special.classList.add("invalid");
  }

}
</script>
<style type="text/css">
    .valid {
  color: green;
}

.valid:before {
  position: relative;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative; 
  content: "✖";
}

</style>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="js/plugins/pace.min.js"></script>
      <script type="text/javascript" src="js/plugins/dropzone.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
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

       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
            <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('sampleTable2'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Patient-History.pdf");
                }
            });
        }
    </script>
      <script>
        <!-- table selection -->
          $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
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