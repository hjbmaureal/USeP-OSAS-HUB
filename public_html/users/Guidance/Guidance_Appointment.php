<?php include('../../conn.php');
  /*include 'conn.php';*/
  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'Guidance'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
   $admin_id=$_SESSION['id'];


  $count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where (user_id='$admin_id' AND office_id = 4) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}



   ?>
          <?php 
          if (isset($_POST['create_pdf'])) {
     function fetch_data(){

    $output = '';  
     include('conn.php');
     $requestmonth = $_POST['filtermonth'];
          $requestmode = $_POST['filtermode'];
    if ($requestmonth=="all") {
      # code...
      $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3'";
    }if ($requestmonth=="all" && $requestmode=="all") {
      # code...
      $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3'";
    }if ($requestmonth!="all" && $requestmode=="all") {
      # code...
       $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3' and DATE_FORMAT(appointment_date,'%m') like '$requestmonth'";
    }if ($requestmonth=="all" && $requestmode!="all") {
      # code...
      $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3' and mode_id='$requestmode'";
    }if ($requestmonth!="all" && $requestmode!="all") {
      # code...
       $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3' and mode_id='$requestmode' and DATE_FORMAT(appointment_date,'%m') like '$requestmonth'";
    }
                        if($result1 = mysqli_query($conn, $sql1)){
                            while ($app_row = mysqli_fetch_assoc($result1)) {
                                /*COMPER INDV_APPOINTMENT*/
                                $indv_sql="SELECT appointment_id FROM indv_counselling WHERE appointment_id='".$app_row['appointment_id']."'";
                                    if($indv_result = mysqli_query($conn, $indv_sql)){
                                        $count=mysqli_num_rows($indv_result);
                                        if ($count) {
                                           if($sql = mysqli_query($conn,"SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments join indv_counselling ON indv_counselling.appointment_id= guidance_appointments.appointment_id LEFT JOIN intake_form on indv_counselling.intake_id= intake_form.intake_id left join student on intake_form.Student_id=student.Student_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id WHERE guidance_appointments.status_id = 3 and guidance_appointments.appointment_id='".$app_row['appointment_id']."'")){
                                             while($row = mysqli_fetch_array($sql)) {     
                                              $id=$row['id'];

                                              $output .= '<tr>  
                          <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'.$row["appointment_date"].'</td>  
                          <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'.$row["appointment_time"].'</td>  
                          <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'.$row['last_name'].', '.$row['first_name'].' '.$row['middle_name'].' '.$row['suffix'].'</td>  
                          <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'.$row["communication_mode"].'</td>  
                     </tr>'; 
                                               }}

                                           }

                                        }
                              
                              /*COMPER GROUP_GUIDANCE*/
                              $grp_sql="SELECT appointment_id FROM group_guidance WHERE appointment_id='".$app_row['appointment_id']."'";
                                    if($grp_result = mysqli_query($conn, $grp_sql)){
                                        $count=mysqli_num_rows($grp_result);
                                        if ($count) {
                                          # code...
                                          if($sql = mysqli_query($conn,"SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments JOIN group_guidance on group_guidance.appointment_id=guidance_appointments.appointment_id JOIN mode_of_communication ON guidance_appointments.mode_id=mode_of_communication.mode_id JOIN course on course.course_id= group_guidance.course_id WHERE guidance_appointments.status_id='3' and guidance_appointments.appointment_id='".$app_row['appointment_id']."'")){
                                            while($row = mysqli_fetch_array($sql)) {     
                                              $section=$row['section']; $year_level=$row['year_level']; 
                                              if ($row['section']=='all') {
                                                  $section='';
                                                }if ($row['year_level']=='all') {
                                                  $year_level='';
                                                }
                                              $output .= '<tr>  
                          <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'.$row["appointment_date"].'</td>  
                          <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'.$row["appointment_time"].'</td>  
                          <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'.$row['title'].', '.$year_level.' '.$section.'</td>  
                          <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'.$row["communication_mode"].'</td>  
                     </tr>'; 
                                               }} 
                                          }
                                        }
                                    }
                            }
 
      return $output;  
    }

    /*CONVERT FILE TO PDF*/

      require_once('TCPDFmain/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
/*      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  */
      /*$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING); */ 
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(true);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '
          <link rel="stylesheet" type="text/css" href="css/main.css">
        <div id="title" style="margin-top:70px;"><div align="center"><img src="image/logo.png" style="width: 100px;height: 100px;" alt="USeP Logo">
        <div align="center" style="font-size:16px;"><b>University of Southeastern Philippines</b><br><i>University Guidance and Assessment Center</i><br><br><span style="font-size: 12px;">In-take Interview/Counselling Appointments Summary SY-2020 (2nd Semester)</span></div>
      <table class="table table-hover table-bordered printdata" id="tableprint" style="border:1px solid black;width: 100%;">
        <thead>
        <tr>
                <th align="center">Date Scheduled</th>
                <th align="center">Time</th>
                <th align="center"class="max">Client</th>
                <th align="center">Mode of Communication</th>
            </tr>
        </thead>
        <tbody>';  
      $content .= fetch_data();  
      $content .= '</tbody></table>';  
      $obj_pdf->writeHTML($content);
      ob_end_clean();  
      $obj_pdf->Output('Guidance_Appointment.pdf', 'I');



            # code...
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
  <!--  TITLE -->
    <link rel="icon" href="../../images/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Guidance Admin Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">
 <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Filter link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/js/bootstrap-datetimepicker.js"></script>
      <link href="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">COORDINATOR</p>
            <p style="text-align: center;" class="app-sidebar__user-name font-sec" >HUB</p>
          </div>
      </div>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fas fa-home"></i><span class="app-menu__label">Home</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Counselling.php" data-toggle="treeview"><i class="app-menu__icon far fa-sticky-note"></i><span class="app-menu__label">Counselling</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Counselling.php">List of Counselling Sessions</a></li>
              <li><a class="treeview-item" href="Guidance_GroupCounselling.php">Group Guidance</a></li>
              <li><a class="treeview-item" href="Guidance_NewForms.php">New Submitted Intake Forms</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Referrals.php" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Referrals</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Referrals.php">List of Referral Forms</a></li>
            </ul>
          </li>
          <li><a class="app-menu__item" href="Guidance_Admin_Records.php"><i class="app-menu__icon fas fa-vcard"></i><span class="app-menu__label">Student Records</span></a></li>
          <li><a class="app-menu__item active" href="Guidance_Appointment.php"><i class="app-menu__icon  fas fa-calendar-check-o"></i><span class="app-menu__label">Appointments</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Reports.php" data-toggle="treeview"><i class="app-menu__icon  fas fa-line-chart"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Reports.php">Counselling Reports</a></li>
              <li><a class="treeview-item" href="Guidance_GroupGuidance_Reports.php">Group Guidance Reports</a></li>
              <li><a class="treeview-item" href="Guidance_Evaluation_Reports.php">Evaluation Reports</a></li>
              <li><a class="treeview-item" href="Guidance_Referral_Reports.php">Referral Reports</a></li>
              
            </ul>
          </li>
          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Guidance_Admin_Announcements.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
        </ul>
      </aside>
       <!--navbar-->
 <style>

    input{
    font-size: 13px;
  }
  @page{
    size: letter;
  }
  @media print{
      .data-table, .data-table *{
      border: 1px solid gray;
      width: 100%;
    }
  </style>
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
                  $count_sql="SELECT * from notif where (user_id=$admin_id AND office_id = 4)  order by time desc";
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
           <?php
          
        if(isset($_SESSION['error'])){
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
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo '<script>
                          swal({
                              title: "Appointment Updated!",
                              text: "Server Request Successful!",
                              icon: "success",
                              buttons: false,
                              timer: 1800,
                              closeOnClickOutside: false,
                                closeOnEsc: false,
                          })
                        </script>';
          unset($_SESSION['success']);
        }
      ?>
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
       

         <!--<div class="page-error tile">-->
          <form method="post">
      <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <div class="float-left "><h4>Appointments</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-auto">

                     
                  <div class="inline-block">
                    Month
                    <br>
                    <select class="bootstrap-select" name="filtermonth" id="filtermonth">
                       <option class="select-item" value="all" selected="selected">All</option>
                      <option class="select-item" value="01">January</option>
                      <option class="select-item" value="02">February</option>
                      <option class="select-item" value="03">March</option>
                      <option class="select-item" value="04">April</option>
                      <option class="select-item" value="05">May</option>
                      <option class="select-item" value="06">June</option>
                      <option class="select-item" value="07">July</option>
                      <option class="select-item" value="08">August</option>
                      <option class="select-item" value="09">September</option>
                      <option class="select-item" value="10">October</option>
                      <option class="select-item" value="11">November</option>
                      <option class="select-item" value="12">December</option>
                      </select>
                    </div>
                    <div class="inline-block">
                    Mode of Communication
                    <br>
                    <select class="bootstrap-select" name="filtermode" id="filtermode" >
                        <option class="select-item" value="all" selected="selected">All</option>
                                              <?php
                                           $result=mysqli_query($conn, "SELECT * FROM mode_of_communication");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $value= $res['mode_id']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['communication_mode'];?></option>
                                              <?php } ?>
                      </select>
                    </div>

           
                      </div>
                      <div class="col-sm">
                          <div class="inline-block float ml-2 mt-1">
                            <button class="btn btn-danger btn-sm verify" type="submit" name="create_pdf" formtarget="_blank" ><i class="fas fa-download"></i> Export</button></div>
                            <div class="inline-block float ml-2 mt-1">
                                      
                                      <a class="btn btn-warning btn-sm" style="width: 160px;" data-toggle="modal" href="#createAppointment" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i>&nbsp; Create Appointment</a>
                                     
                                  </div>
                        
                      </div>

                  </div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div class="calldiv">
                  <table class="table table-hover table-bordered printdata" id="tableprint">
                    <thead>
                      <tr>
                      <th>Date Scheduled</th>
                      <th>Time</th>
                      <th class="max">Client</th>
                      <th>Mode of Communication</th>
                      <th class="max">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                       <?php 
                  $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3'";
                        if($result1 = mysqli_query($conn, $sql1)){
                            while ($app_row = mysqli_fetch_assoc($result1)) {
                                /*COMPER INDV_APPOINTMENT*/
                                $indv_sql="SELECT appointment_id FROM indv_counselling WHERE appointment_id='".$app_row['appointment_id']."'";
                                    if($indv_result = mysqli_query($conn, $indv_sql)){
                                        $count=mysqli_num_rows($indv_result);
                                        if ($count) {
                                           if($sql = mysqli_query($conn,"SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments join indv_counselling ON indv_counselling.appointment_id= guidance_appointments.appointment_id LEFT JOIN intake_form on indv_counselling.intake_id= intake_form.intake_id left join student on intake_form.Student_id=student.Student_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id WHERE guidance_appointments.status_id = '3' and guidance_appointments.appointment_id='".$app_row['appointment_id']."'")){
                                             while($row = mysqli_fetch_array($sql)) {     
                                              $id=$row['id'];?>
                                              <tr>
                                                <td><?php echo $row['appointment_date'];?></td>
                                                <td><?php echo $row['appointment_time'];?></td>
                                                <td><?php echo $row['last_name'].', '.$row['first_name'].' '.$row['middle_name'].' '.$row['suffix'];?></td>
                                                <td><?php echo $row['communication_mode'];?></td>
                                                <td id="td">
                                                <a class="btn btn-info btn-sm" data-toggle="modal" href="#appointmentView<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-eye"></i></a>

                                                <a class="btn btn-warning btn-sm" data-toggle="modal" href="#appointmentEdit<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i></a>

                                                <a class="btn btn-danger btn-sm" data-toggle="modal" href="#appointmentCancel_indiv<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-close"></i></a>
                                                <?php include('Guidancce_Appointment_Modal.php'); ?>
                                                </td>
                                              </tr>
                                              <?php }}

                                           }

                                        }
                              
                              /*COMPER GROUP_GUIDANCE*/
                              $grp_sql="SELECT appointment_id FROM group_guidance WHERE appointment_id='".$app_row['appointment_id']."'";
                                    if($grp_result = mysqli_query($conn, $grp_sql)){
                                        $count=mysqli_num_rows($grp_result);
                                        if ($count) {
                                          # code...
                                          if($sql = mysqli_query($conn,"SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments JOIN group_guidance on group_guidance.appointment_id=guidance_appointments.appointment_id JOIN mode_of_communication ON guidance_appointments.mode_id=mode_of_communication.mode_id JOIN course on course.course_id= group_guidance.course_id WHERE guidance_appointments.status_id='3' and guidance_appointments.appointment_id='".$app_row['appointment_id']."'")){
                                            while($row = mysqli_fetch_array($sql)) {     
                                              $id=$row['id']; ?>
                                              <tr>
                                                <td><?php echo $row['appointment_date'];?></td>
                                                <td><?php echo $row['appointment_time'];?></td>
                                                <?php $section=$row['section']; $year_level=$row['year_level'];
                                                 if ($row['section']=='all') {
                                                  $section='';
                                                }if ($row['year_level']=='all') {
                                                  $year_level='';
                                                }?>
                                                <td><?php echo $row['title'].' '.$year_level.' '.$section;?></td>
                                                <td><?php echo $row['communication_mode'];?></td>
                                                <td id="td">
                                                <a class="btn btn-info btn-sm" data-toggle="modal" href="#appointmentViewgroup<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-eye"></i></a>

                                                <a class="btn btn-warning btn-sm" data-toggle="modal" href="#appointmentEditgroup<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm" data-toggle="modal" href="#appointmentCancel_group<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-close"></i></a>
                                                <?php include('Guidancce_Appointment_Modal.php'); ?>
                                                </td>
                                              </tr>
                                              <?php }} 
                                          }
                                        }
                                    }
                            }
                         ?>
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div> 
        </form>
 
 <?php 
      if (isset($_POST['CancelAppointment_indv'])) {
        // code...
      
          $id=$_POST['id'];
          $stud_id=$_POST['student_id'];
          
          

            $sqlCencel_Indiv="DELETE FROM `indv_counselling` WHERE appointment_id='$id'";
            if ($conn->query($sqlCencel_Indiv) === TRUE) {

              $sqlCencel_Guidance="DELETE FROM `guidance_appointments` WHERE appointment_id='$id'";
                if ($conn->query($sqlCencel_Guidance) === TRUE) {
  

                $result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, _time, link, message_status) values (notif_id,'$stud_id', 'Your counselling schedule has been canceled.',now(),'Guidance_Student_Counselling.php', 'Delivered')");

                              if($result){
                              

                                echo '<script>
                                      swal({
                                          title: "Counselling Appointmrnt Deleted Successfully!",
                                          text: "Server Request Successful!",
                                          icon: "success",
                                          buttons: false,
                                          timer: 1800,
                                          closeOnClickOutside: false,
                                            closeOnEsc: false,
                                      })
                                    </script>';
                                    echo "<meta http-equiv='refresh' content='2'>";
                              
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
          if (isset($_POST['ADDAPP'])) {
    $studID=$_POST['studID'];
    $name=$_POST['name'];
    $cy=$_POST['cy'];
    $mode=$_POST['mode'];
    $date=date('Y-m-d',strtotime($_POST['date']));
    $time= date('H:i',strtotime($_POST['date']));
    $link='';
    $code='';
    $app_id='';
    $itemID='';
    if (isset($_POST['link'])) {
        $link=$_POST['link'];
    }
    if (isset($_POST['code'])) {
       $code=$_POST['code'];
    }
    $sql="INSERT INTO `guidance_appointments`(`appointment_id`, `status_id`, `mode_id`, `date_filed`, `appointment_date`, `appointment_time`, `date_completed`, `link`, `meeting_code`) VALUES (null,3,'$mode',now(),'$date','$time',null,'$link','$code')";
    echo $time;
    if ($conn->query($sql) === TRUE) {
        /*echo 'hey1';*/
      $apt_id = $conn->insert_id;
      /*echo $apt_id;*/
      $sqlitem=mysqli_query($conn,"SELECT intake_id FROM `intake_form` WHERE Student_id='$studID'");
          while($resultitem=mysqli_fetch_array($sqlitem)){
            $itemID=$resultitem['intake_id'];
            /*echo 'hey2';
            echo "and ".$itemID;*/
          }
      $sqlIndv="INSERT INTO `indv_counselling`(`counselling_id`, `appointment_id`, `intake_id`) VALUES (null,'$apt_id','$itemID')";
      if ($conn->query($sqlIndv) === TRUE) {
        /*echo 'hey3';*/
      
         $result="insert into notif(notif_id,user_id, message_body, _time, link, message_status) values (notif_id,'$studID', 'The guidance sets a new appointment schedule with you.',now(),'Guidance_Student_Counselling.php', 'Delivered')";
         if ($conn->query($result) === TRUE) {
                              echo '<script>
                                      swal({
                                          title: "Counselling Appointmrnt Added Successfully!",
                                          text: "Server Request Successful!",
                                          icon: "success",
                                          buttons: false,
                                          timer: 1800,
                                          closeOnClickOutside: false,
                                            closeOnEsc: false,
                                      })
                                       setTimeout(myFunction, 3000);
                                    </script>'; 
                                    ?> 
                                    <script>
                                      function myFunction() {
                                        window.location="Guidance_Appointment.php";
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

    }else{echo "error";}
}

          if (isset($_POST['CancelAppointment_gg'])) {
        // code...
      
          $id=$_POST['id'];
          $stud_id=$_POST['student_id'];
          $gg_ID="";
                $sqlgroup="SELECT * FROM `group_guidance` WHERE appointment_id='$id'";
                    if($resultgrp = mysqli_query($conn, $sqlgroup)){
                            while ($grp = mysqli_fetch_assoc($resultgrp)) {
                                            $gg_ID=$grp['grp_guidance_id'];
                                              if ($grp['course_id']!='all' && $grp['year_level']=='all' && $grp['section']=='all') {
                                                $select_std="SELECT  student.Student_id, student.course_id, student.year_level, student.section FROM `student` WHERE course_id='".$grp['course_id']."'";

                                              }if ($grp['course_id']!='all' && $grp['year_level']!='all' && $grp['section']=='all') {
                                                $select_std="SELECT  student.Student_id, student.course_id, student.year_level, student.section FROM `student` WHERE course_id='".$grp['course_id']."' and year_level='".$grp['year_level']."'";

                                              }if ($grp['course_id']!='all' && $grp['year_level']!='all' && $grp['section']!='all') {
                                                $select_std="SELECT  student.Student_id, student.course_id, student.year_level, student.section FROM `student` WHERE course_id='".$grp['course_id']."' and year_level='".$grp['year_level']."' and section='".$grp['section']."'";

                                              }if ($grp['course_id']=='all') {
                                                $select_std="SELECT  student.Student_id, student.course_id, student.year_level, student.section FROM `student`";
                                              }
                                    if($resultstd = mysqli_query($conn, $select_std)){
                                       while ($std = mysqli_fetch_assoc($resultstd)) {
                                              $result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, _time, link, message_status) values (notif_id,'".$std['Student_id']."', 'Your counselling schedule has been canceled.',now(),'Guidance_Student_GroupGuidance.php', 'Delivered')");
                                       }
                                     }

                            }
                          }
          $sqlCencel_Guidance="DELETE FROM `participants` WHERE grp_guidance_id='$gg_ID'";
          if ($conn->query($sqlCencel_Guidance) === TRUE) {

          $sqlCencel_Guidance="DELETE FROM `group_guidance` WHERE appointment_id='$id'";
          if ($conn->query($sqlCencel_Guidance) === TRUE) {

              $sqlCencel_Indiv="DELETE FROM `guidance_appointments` WHERE appointment_id='$id'";
                if ($conn->query($sqlCencel_Indiv) === TRUE) {
                         echo '<script>
                                      swal({
                                          title: "Appointment Deleted Successfully!",
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
                                        window.location="Guidance_Appointment.php";
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
        ?>

        <!-- DATEPICKER -->
<?php 
                 $results[]= '';$disableTimeArr[]=''; $i=0;$count=0;
                $from= date('Y-m-d'); 
                $sql="SELECT DATE_FORMAT(appointment_date, '%d') as dy,appointment_date, appointment_time FROM `guidance_appointments` WHERE appointment_date > '$from'";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){

                  /*collect all schedule by hours(format-11/27/2021:8)*/
                  $hourholder=date('H', strtotime($row['appointment_time']));
                  $hourRemoveLeadingZero=ltrim($hourholder, "0");
                  $dateholder=date('m/d/Y',strtotime($row['appointment_date']));
                  $timeToDisableVar=$dateholder.':'.$hourRemoveLeadingZero;
                  $disableTimeArr[]='"'.$timeToDisableVar.'"';
                  
                  /*count the number of schedule, if >= 6 disable dates*/
                  $sql2="SELECT DATE_FORMAT(appointment_date, '%d') as dy, appointment_date FROM `guidance_appointments` WHERE  appointment_date > '$from' and DATE_FORMAT(appointment_date, '%d')";
                $result2 = mysqli_query($conn, $sql2);
               
                while($row2 = mysqli_fetch_assoc($result2)){
                  if ($row['dy']==$row2['dy']) {
                    $count++;
                    if ($count==6) {
                      $time= strtotime($row['appointment_date']);
                    $holder=date('d-m-Y', $time);
                    $results[] = '"'.$holder.'"';
                    }
                    # code...
                  }
                  
                }
                    
                } 
                $results=array_filter($results);
                $totaldayslist= implode(", ", $results);
                $disableTimeArr=array_filter($disableTimeArr);
                $timeToDisable= implode(", ", $disableTimeArr);
                ?>
                <!-- DISABLE DATESCHEDULE -->
<script type="text/javascript">
    var disabledtimes_mapping = [<?php echo $timeToDisable;?>];
    var datesForDisable = [<?php echo $totaldayslist;?>];
function formatDate(datestr)
{
    var date = new Date(datestr);
    var day = date.getDate(); day = day>9?day:"0"+day;
    var month = date.getMonth()+1; month = month>9?month:"0"+month;
    return month+"/"+day+"/"+date.getFullYear();
}

$(".datepicker").datetimepicker({
    format: 'yyyy/mm/dd hh:ii',
    startDate: new Date(),
    datesDisabled: datesForDisable,
    daysOfWeekDisabled: [0,6],
    autoclose: true,
    onRenderHour:function(date){
  if(disabledtimes_mapping.indexOf(formatDate(date)+":"+date.getUTCHours())>-1)
    {
        return ['disabled'];
    }
    }
});</script>
        <!-- filter script -->
        <script type="text/javascript">
                $(document).ready(function(){
                  $("#filtermonth").on('change', function(){
                    var month = $("#filtermonth").val();
                    var mode = $("#filtermode").val();
                   /* alert(mode);
                    alert(month);*/
                    $.ajax({
                          url:"Guidance_appointment_filter.php",
                          type:"POST",
                          data:{requestmonth: month, requestmode: mode},
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
                
                  });

                  $("#filtermode").on('change', function(){
                    var month = $("#filtermonth").val();
                    var mode = $("#filtermode").val();
                    /*alert(value);*/
                    $.ajax({
                          url:"Guidance_appointment_filter.php",
                          type:"POST",
                          data:{requestmonth: month, requestmode: mode},
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
                
                  });
                });
              </script>
       


            
                </div>


        <!--</div>-->
      </main>
      <!-- Essential javascripts for application to work-->
      
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="js/plugins/pace.min.js"></script>
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

      <script type="text/javascript">
       //prevent form resubmission
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }

            $('#tableprint').DataTable();

    /* function downloadpdf(){
          const element =document.getElementById("tableprint");
          html2pdf()
          .from(element)
          .save();
        }*/

 $("#print-button").on("click", function () {
            var divContents = document.getElementById('tableprint');
            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table {' +
                'margin-left:48px;' +
                'margin-right:48px;' +
                'border-spacing:0;' +
                'border-collapse: collapse' +
                '}' +
                'table th, table td {' +
                'border:1px solid gray;' +
                'font-size:12px;' +
                '}' +
                '</style>';
            htmlToPrint += divContents.outerHTML;
            var printWindow = window.open('', '', 'height=700,width=900');
            printWindow.document.write('<html><head><title>Guidance Counselling Reports</title></head><body>');
            printWindow.document.write('<div id="title" style="margin-top:48px;"><div align="center"><img src="images/logo.png" alt="USeP Logo"></div></div>');
            printWindow.document.write('<div id="title"><div align="center" style="font-size:18px;"><b>University of Southeastern Philippines</b><br><i>University Guidance and Assessment Center</i><br><br></div></div>');
            printWindow.document.write('<div align="center" style="font-size:16px;">In-take Interview/Counselling Summary SY-2020 (2nd Semester)<br></div>');
            printWindow.document.write(htmlToPrint);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });

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


