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
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where (user_id='$admin_id' or office_id = 2) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}


   ?>
<?php 
  if (isset($_POST['create_pdf'])) {
     function fetch_data(){  
      $output = '';  
       include('conn.php');
       $from = $_POST['filtermonth'];
       $to = $_POST['filtermonth2'];
        if ($to=='') {
         $to='all';
       }
       $fromyear = $_POST['filteryear'];
       $toyear = $_POST['filteryear2'];
        if ($from=='all' && $to=='all' && $fromyear=='' && $toyear=='') {
           $sql="SELECT group_guidance.grp_guidance_id, group_guidance.course_id, group_guidance.year_level, group_guidance.section, group_guidance.topic, guidance_appointments.appointment_date, guidance_appointments.appointment_time, course.title, mode_of_communication.communication_mode FROM group_guidance JOIN guidance_appointments ON group_guidance.appointment_id=guidance_appointments.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id WHERE guidance_appointments.status_id='1'";
        }if($from!='all' && $to!='all' && $fromyear=='' && $toyear==''){
          $sql="SELECT group_guidance.grp_guidance_id, group_guidance.course_id, group_guidance.year_level, group_guidance.section, group_guidance.topic, guidance_appointments.appointment_date, guidance_appointments.appointment_time, course.title, mode_of_communication.communication_mode FROM group_guidance JOIN guidance_appointments ON group_guidance.appointment_id=guidance_appointments.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id WHERE guidance_appointments.status_id='1' and date_format(guidance_appointments.appointment_date,'%m') BETWEEN '$from' and '$to'";
        }if($from!='all' && $to!='all' && $fromyear!='' && $toyear!=''){
          $sql="SELECT group_guidance.grp_guidance_id, group_guidance.course_id, group_guidance.year_level, group_guidance.section, group_guidance.topic, guidance_appointments.appointment_date, guidance_appointments.appointment_time, course.title, mode_of_communication.communication_mode FROM group_guidance JOIN guidance_appointments ON group_guidance.appointment_id=guidance_appointments.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id WHERE guidance_appointments.status_id='1' and date_format(guidance_appointments.appointment_date,'%m') BETWEEN '$from' and '$to' and date_format(guidance_appointments.appointment_date, '%Y') BETWEEN '$fromyear' and '$toyear'";
        }if($from=='all' && $to=='all' && $fromyear!='' && $toyear!=''){
          $sql="SELECT group_guidance.grp_guidance_id, group_guidance.course_id, group_guidance.year_level, group_guidance.section, group_guidance.topic, guidance_appointments.appointment_date, guidance_appointments.appointment_time, course.title, mode_of_communication.communication_mode FROM group_guidance JOIN guidance_appointments ON group_guidance.appointment_id=guidance_appointments.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id WHERE guidance_appointments.status_id='1' and date_format(guidance_appointments.appointment_date, '%Y') BETWEEN '$fromyear' and '$toyear'";
        }
      if($result = mysqli_query($conn, $sql)){
      while($row2 = mysqli_fetch_array($result)) {      
      $output .= '<tr align="center">
                  <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'. $row2['appointment_date'].'</td>
                  <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'.$row2['topic'].'</td>
                  <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'. $row2['course'].'</td>
                  <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'. $row2['communication_mode'].'</td> 
                  <td style=" height: 25px;font-size:10px;padding-left: 5px;margin-left: 2px;">'. $row2['title'].' '.$row2['section'].'</td>
                  </tr>';  
      }} 
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
        <div id="title" style="margin-top:70px;"><div align="center"><img src="../../images/logo.png" style="width: 100px;height: 100px;" alt="USeP Logo">
        <div align="center" style="font-size:16px;"><b>University of Southeastern Philippines</b><br><i>University Guidance and Assessment Center</i><br><br><span style="font-size: 12px;">In-take Interview/Counselling Appointments Summary SY-2020 (2nd Semester)</span></div></div>
      <table class="table table-hover table-bordered printdata" id="tableprint" style="border:1px solid black;width: 100%;">
        <thead>
        <tr>
                   <th>Date|Time</th>
                      <th>Purpose/Topic</th>
                      <th>Mode of Communication</th>
                      <th>Participants</th>
                      <th>Action</th>
            </tr>
        </thead>
        <tbody>';  
      $content .= fetch_data();  
      $content .= '</tbody></table>';  
      $obj_pdf->writeHTML($content);
      ob_end_clean();  
      $obj_pdf->Output('Counselling_Reports.pdf', 'I');



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
      <link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
      <title>Admin | USeP Virtual Hub</title>
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
      <body class="app sidebar-mini rtl">
      <!-- Navbar-->
      <!-- Filter link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src= ></script>
  <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>

  <style>

    .data-table{
      border: 1px solid gray;
      width: 100%;
    }

    .data-table th{
         border: 1px solid gray;
    }

    .data-table td{
      border: 1px solid gray;
    }

    @media print{
      .data-table, .data-table *{
      border: 1px solid gray;
      width: 100%;
    }

    .data-table th *{
         border: 1px solid gray;
    }

    .data-table td *{
      border: 1px solid gray;
    }
    }

  </style>

        <!-- end -->
                    <body class="app sidebar-mini rtl" onload="initClock()">

      <header class="app-header">
    
   
      </header>

      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="image/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">GUIDANCE OFFICE</p>
          </div>
        </div>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="Guidance_Admin.php"><i class="app-menu__icon fas fa-home"></i><span class="app-menu__label">Home</span></a></li>
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
          <li><a class="app-menu__item" href="Guidance_Appointment.php"><i class="app-menu__icon  fas fa-calendar-check-o"></i><span class="app-menu__label">Appointments</span></a></li>
          <li class="treeview"><a class="app-menu__item active" href="Guidance_Reports.php" data-toggle="treeview"><i class="app-menu__icon  fas fa-line-chart"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Reports.php">Counselling Reports</a></li>
              <li><a class="treeview-item active" href="Guidance_GroupGuidance_Reports.php">Group Guidance Reports</a></li>
              <li><a class="treeview-item" href="Guidance_Evaluation_Reports.php">Evaluation Reports</a></li>
              <li><a class="treeview-item" href="Guidance_Referral_Reports.php">Referral Reports</a></li>
              
            </ul>
          </li>
          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Guidance_Admin_Announcements.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
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
                  $count_sql="SELECT * from notif where (user_id=$admin_id or office_id = 2)  order by time desc";
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
    <form method="post" action="#">
      <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <div class="float-left"><h4>Group Guidance Reports</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-auto">

                     
                  <div class="inline-block">
                    Month from:
                    <select class="bootstrap-select" name="filtermonth" id="filtermonth" >
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
                    
                    Month to:
                    <select class="bootstrap-select" name="filtermonth2" id="filtermonth2" disabled>
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
                    &emsp;&emsp;
                    School Year: 
                        <input type="text" name="filteryear" id="filteryear" style="width: 80px;">
                      -
                        <input type="text" name="filteryear2" id="filteryear2" style="width: 80px;" disabled>

                      </div>

                     <div class="col-sm">
                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify" type="submit" name="create_pdf" formtarget="_blank"><i class="fas fa-download" ></i> Export</button></div>
                  </div>

                </div>
                </div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div class="calldiv">
                  <table class="table table-hover table-bordered" id="sampleTable2">
                    <thead>
                      <tr>
                      <th>Date|Time</th>
                      <th>Purpose/Topic</th>
                      <th>Mode of Communication</th>
                      <th>Participants</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                <tbody>
              <?php 
          $sql="SELECT group_guidance.grp_guidance_id, group_guidance.course_id, group_guidance.year_level, group_guidance.section, group_guidance.topic, guidance_appointments.appointment_date, guidance_appointments.appointment_time, course.title, mode_of_communication.communication_mode FROM group_guidance JOIN guidance_appointments ON group_guidance.appointment_id=guidance_appointments.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id WHERE guidance_appointments.status_id='1'";
           $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      
                      while($row = $result->fetch_assoc()) {

                        $id = $row['grp_guidance_id'];
                        $section=$row['section']; $year_level=$row['year_level'];
                        if ($section=='all') {
                          $section='';
                        }if ($year_level=='all') {
                          $year_level='';
                        }
                    ?>
                    <tr>
      <td><?php echo htmlentities($row['appointment_date']);?>&nbsp; | &nbsp;<?php echo htmlentities($row['appointment_time']);?></td>
      <td><?php echo htmlentities($row['topic']);?></td>
      <td><?php echo htmlentities($row['communication_mode']);?></td>
      <td><?php echo htmlentities($row['title']);?>&nbsp;<?php echo htmlentities($row['section']);?>&nbsp;<?php echo htmlentities($row['year_level']);?></td>

<td><center>
<a class="btn btn-primary btn-sm reportsbutton" href="Guidance_SeminarEval_Reports.php?id=<?php echo $id?>"><i class="fas fa-th-list"></i></a>

<a href="#list<?php echo $row['grp_guidance_id']; ?>" class="btn btn-info btn-sm viewbutton" data-toggle="modal" style="width:35px;"><i class="fa fa-eye"></i></a>
<?php include('participant-modal.php');?>
    </center></td>
                    </tr>
                    <?php
                      }}

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
 

      </main>

      <script type="text/javascript">
       //prevent form resubmission
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }

            $('#reports-table').DataTable();

     function downloadpdf(){
          const element =document.getElementById("reports-table");
          html2pdf()
          .from(element)
          .save();
        }

    </script>
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
      <script>
        <!-- table selection -->
          $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});
      </script>
       <!-- FILTER SCRIPT -->
  <script type="text/javascript">
                $(document).ready(function(){
                  /*STATUS*/
                  $("#filtermonth").on('change', function(){
                    var filtermonth = $("#filtermonth").val();
                    var filtermonth2 = $("#filtermonth2").val();
                    var filteryear = $("#filteryear").val();
                    var filteryear2 = $("#filteryear2").val();
                    
                    // alert(filtermonth);
                    // alert(filtermonth2);
                    // alert(filteryear);
                    // alert(filteryear2);
                    $("#filtermonth2").prop('disabled', false);
                    if (filtermonth=='all') {
                      $("#filtermonth2").prop('disabled', true);
                    }
                    if (filtermonth2!='all') {
                    $.ajax({
                          url:"Guidance_referrals_filter.php",
                          type:"POST",
                          data:{from : filtermonth, to : filtermonth2, fromyear : filteryear, toyear : filteryear2},
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
                }
                  });
                  $("#filtermonth2").on('change', function(){
                    var filtermonth = $("#filtermonth").val();
                    var filtermonth2 = $("#filtermonth2").val();
                    var filteryear = $("#filteryear").val();
                    var filteryear2 = $("#filteryear2").val();
                    
                    // alert(filtermonth);
                    // alert(filtermonth2);
                    // alert(filteryear);
                    // alert(filteryear2);

                    if (filtermonth!='all') {
                    $.ajax({
                          url:"Guidance_referrals_filter.php",
                          type:"POST",
                          data:{from : filtermonth, to : filtermonth2, fromyear : filteryear, toyear : filteryear2},
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
                }
                  });


                  //Filter Year

                  $("#filteryear").on('change', function(){
                    var filtermonth = $("#filtermonth").val();
                    var filtermonth2 = $("#filtermonth2").val();
                    var filteryear = $("#filteryear").val();
                    var filteryear2 = $("#filteryear2").val();
                    
                    // alert(filtermonth);
                    // alert(filtermonth2);
                    // alert(filteryear);
                    // alert(filteryear2);

                    $("#filteryear2").prop('disabled', false);
                    if (filteryear=='') {
                      $("#filteryear2").prop('disabled', true);
                    }
                    if (filteryear2!='' && filteryear!='' || filteryear2==filteryear) {
                    $.ajax({
                          url:"Guidance_referrals_filter.php",
                          type:"POST",
                          data:{from : filtermonth, to : filtermonth2, fromyear : filteryear, toyear : filteryear2},
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
                }
                  });

                  $("#filteryear2").on('change', function(){
                    var filtermonth = $("#filtermonth").val();
                    var filtermonth2 = $("#filtermonth2").val();
                    var filteryear = $("#filteryear").val();
                    var filteryear2 = $("#filteryear2").val();
                    
                    // alert(filtermonth);
                    // alert(filtermonth2);
                    // alert(filteryear);
                    // alert(filteryear2);

                    if (filteryear!='' && filteryear2!='' || filteryear==filteryear2) {
                    $.ajax({
                          url:"Guidance_referrals_filter.php",
                          type:"POST",
                          data:{from : filtermonth, to : filtermonth2, fromyear : filteryear, toyear : filteryear2},
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
                }
                  });
                  
                });
              </script>
  <script type="text/javascript">
  function print_specific_div_content(){
    var win = window.open('','','left=0,top=0,width=900,height=700,toolbar=0,scrollbars=0,status =0');

    var content = "<html>";
    content += "<body onload=\"window.print(); window.close();\">";
    content += document.getElementById("att-table").innerHTML ;
    content += "</body>";
    content += "</html>";
    win.document.write(content);
    win.document.close();
}
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