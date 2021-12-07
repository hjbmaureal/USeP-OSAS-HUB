 <?php include('../../conn.php');
   include('../../php/session_admin.php');
   $admin_id=$_SESSION['id'];

     $count_sql="SELECT * from notif where user_id='$admin_id' and message_status='Delivered'";

          $result1 = mysqli_query($conn, $count_sql);

          $count2 = 0;

          while ($row = mysqli_fetch_assoc($result1)) {                             

            $count2++;

                              }


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
          <?php 
          if (isset($_POST['create_pdf'])) {
     function fetch_data(){

    $output = '';  
     include('../../conn.php');
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

      require_once('../../php/TCPDFmain/tcpdf.php');  
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
          <link rel="stylesheet" type="text/css" href="../../css/main.css">
        <div id="title" style="margin-top:70px;"><div align="center"><img src="../../images/logo.png" style="width: 100px;height: 100px;" alt="USeP Logo">
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
      <title>Admin | USeP Virtual Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../../css/main.css">
          <link rel="stylesheet" type="text/css" href="../../css/upstyle.css">
 <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
      <body class="app sidebar-mini rtl">
      <!-- Navbar-->
        <!-- Filter link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
   <header><?php
    
         ?>
      </header>

      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="../../images/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">GUIDANCE OFFICE</p>
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
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Zuzeinn L. Lopez</a>
              </li>
             <!-- <li class="app-search">
                   <input class="app-search__input" type="search" placeholder="Search">
                  <button class="app-search__button"><i class="fa fa-search"></i></button>
              </li>-->  
   <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $count2;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $count2;  ?> new notifications.</li>
              <div class="app-notification__content">

                <?php

                $count_sql="SELECT * from notif where user_id='$admin_id'  order by _time desc";

                $result2 = mysqli_query($conn, $count_sql);

                while ($row = mysqli_fetch_assoc($result2)) { 
                  $intval = intval(trim($row['_time']));
                  if ($row['message_status']=='Delivered') {

                    
                    echo'
                  <b><li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">'.$row['message_body'].'</p>
                      <p class="app-notification__meta">'.timeago($row['_time']).'</p>
                      <p class="app-notification__message"><form method="POST" action="../../change_notif_status.php">
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
                      <p class="app-notification__meta">'.timeago($row['_time']).'</p>
                      <p class="app-notification__message"><form method="POST" action="../../change_notif_status.php">
                      <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                      <input type="submit" name="open_notif" value="Open Message">
                      </form></p>
                    </div></a></li>
                    ';
                  }
                  

                                    }
                ?>
                
              </div>
              <li class="app-notification__footer"><a href="../../php/see_all_notif_admin.php?link=Guidance_Appointment.php">See all notifications.</a></li>
            </ul>
          </li>
              
                 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="Guidance_AdminUser.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
      
          </ul>
        </div>
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
                            <button class="btn btn-danger btn-sm verify" type="submit" name="create_pdf"><i class="fas fa-download"></i> Export</button></div>
                        
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
                                           if($sql = mysqli_query($conn,"SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments join indv_counselling ON indv_counselling.appointment_id= guidance_appointments.appointment_id LEFT JOIN intake_form on indv_counselling.intake_id= intake_form.intake_id left join student on intake_form.Student_id=student.Student_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id WHERE guidance_appointments.status_id = 3 and guidance_appointments.appointment_id='".$app_row['appointment_id']."'")){
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
        <!-- filter script -->
        <script type="text/javascript">
                $(document).ready(function(){
                  $("#filtermonth").on('change', function(){
                    var month = $("#filtermonth").val();
                    var mode = $("#filtermode").val();
                   /* alert(mode);
                    alert(month);*/
                    $.ajax({
                          url:"../../php/Guidance_appointment_filter.php",
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
                          url:"../../php/Guidance_appointment_filter.php",
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
            printWindow.document.write('<div id="title" style="margin-top:48px;"><div align="center"><img src="../../images/logo.png" alt="USeP Logo"></div></div>');
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
    </body>
  </html>


