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

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <!--Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
     <!-- Data table plugin-->
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
      <!-- FILTER LINK -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
      <body class="app sidebar-mini rtl">
      <!-- Navbar-->
      <header class="app-header">
    
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
          <li class="treeview"><a class="app-menu__item active" href="Guidance_Referrals.php" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Referrals</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item active" href="Guidance_Referrals.php">List of Referral Forms</a></li>
            </ul>
          </li>
          <li><a class="app-menu__item" href="Guidance_Admin_Records.php"><i class="app-menu__icon fas fa-vcard"></i><span class="app-menu__label">Student Records</span></a></li>
          <li><a class="app-menu__item" href="Guidance_Appointment.php"><i class="app-menu__icon  fas fa-calendar-check-o"></i><span class="app-menu__label">Appointments</span></a></li>
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

          <main class="app-content">
            
        <div class="app-title">
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Zuzeinn L. Lopez</a>
              </li>

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
                      <p class="app-notification__message"><form method="POST" action="../../php/change_notif_status.php">
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
              <li class="app-notification__footer"><a href="../../php/see_all_notif_admin.php?link=Guidance_Referrals.php">See all notifications.</a></li>
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
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
       

         <!--<div class="page-error tile">-->

      <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <div class="float-left"><h4>New Submitted Referral Forms</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                  </div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  
                  <table class="table table-hover table-bordered" id="sampleTable2">
                    <thead>
                      <tr>
                      <th>Date Filed</th>
                      <th>ID Number</th>
                      <th class="max">Name</th>                      
                      <th>Position/Designation</th>
                      <th class="max">Action</th>
                    </tr>
                  </thead>
                  <tbody>
       <?php 
          $sql1="SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.status_id, staff.first_name as fname, staff.middle_name as mname, staff.last_name as lname, staff.position from referral_form join staff USING (staff_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id ='2'";
          if($result1 = mysqli_query($conn, $sql1)){
          while ($row = mysqli_fetch_assoc($result1)) {

                                echo'<tr>
                                  <td>'. $row['date_filed'].'</td>
                                  <td>'. $row['staff_id'].'</td>
                                  <td>'. $row['fname'].'  '. $row['mname'].'  '. $row['lname'].'</td> 
                                  <td>'. $row['position'].'</td>
                                  <td>';?>
                                   <button class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" a href="#details<?php echo $row['referral_id']; ?>"><i class="fas fa-eye" style="color:white;width:13px"></i></button>&nbsp;
                                   <?php include('../../php/Guidance_Referral_View_Modal.php'); ?>
                                   <button class="btn btn-warning btn-sm acceptbutton" class="text mr-2" data-toggle="modal" a href="#setAppointment<?php echo $row['referral_id']; ?>"><i class="fas fa-pencil-square-o" style="color:white;width:13px"></i></button>&nbsp;
                                   <?php include('../../php/referral_setAppointment.php'); ?>
                                  </td>
                                </tr>'<?php }}

       ?>
                  </tbody>
                  </table>
                
                </div>
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
                <div class="float-left"><h4>List of Referral Forms</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-sm">
                  <div class="inline-block">
                    Month
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

                    <div class="inline-block">
                      Position/Designation
                    <select class="bootstrap-select" name="filterposition" id="filterposition">
                        <option class="select-item" value="all" selected="selected">All</option>
                         <?php
                          $result=mysqli_query($conn, "SELECT position FROM staff GROUP BY position");               
                          while($res = mysqli_fetch_array($result)) { 
                             
                              $value= $res['position']; ?>
                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['position'];?></option>
                        <?php } ?>
                      </select>
                      </div>

                      <div class="inline-block">
                      Status
                    <select class="bootstrap-select" name="filterstatus2" id="filterstatus2">
                        <option class="select-item" value="all" selected="selected">All</option>
                       <?php
                          $result=mysqli_query($conn, "SELECT * FROM _status where status_id !='2'");               
                          while($res = mysqli_fetch_array($result)) { 
                         
                              $value= $res['status_id']; ?>
                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['status'];?></option>
                        <?php } ?>
                      </select>
                      </div>
                      </div>
                  </div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div class="calldiv2">
                  <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                      <tr>
                      <th>Date Filed</th>
                      <th>ID Number</th>
                      <th class="max">Name</th>
                      <th>Position/Designation</th>
                      <th>Status of Referral</th>
                      <th>Date Completed</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
          
           $sql = mysqli_query($conn,"SELECT  _status.status_id as statID, referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, staff.first_name as fname, staff.last_name as lname, staff.position,_status.status from referral_form join staff USING (staff_id) join _status USING (status_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id !='2' order by status_id desc");
           while($row = mysqli_fetch_array($sql)) { ?>   

                                  <tr>
                                  <td><?php echo $row['date_filed'];?></td>
                                  <td><?php echo $row['staff_id']; ?></td>
                                  <td><?php echo $row['fname'].'  
                                  '. $row['lname'];?></td> 
                                  <td><?php echo $row['position']; ?></td>
                                  <td><?php echo $row['status']; ?></td>
                                  <td><?php echo $row['refdate_completed']; ?></td>
                                  <td>
                                    <?php 
                                      if ($row['statID']=='1') {
                                    ?>
                                  <button  class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" a href="#details<?php echo $row['referral_id']; ?>"><i class="fas fa-eye" style="color:white;width:13px"></i></button>
                                  <button type="button" disabled="disabled" class="btn btn-warning btn-sm editbutton" a id="<?php echo $row['referral_id']; ?>"  data-id="<?php echo $row['referral_id']; ?>" ><i class="fas fa-pencil-square-o" style="color:white;width:13px"></i></button>
                                  &nbsp;
                                  <?php include('../../php/Guidance_Referral_View_Modal.php'); ?>
                                <?php }else{?>
                                  <button  class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" a href="#details<?php echo $row['referral_id']; ?>"><i class="fas fa-eye" style="color:white;width:13px"></i></button>
                                  <a id="<?php echo $row['referral_id']; ?>" type="button" class="btn btn-warning btn-sm editbutton" data-id="<?php echo $row['referral_id']; ?>" ><i class="fas fa-pencil-square-o" style="color:white;width:13px"></i></a>&nbsp;
                                  <?php include('../../php/Guidance_Referral_View_Modal.php'); ?>
                                <?php } ?>
                                </td>
                                </tr>
                            <?php }
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

<?php

  if(isset($_POST['SetAppointment'])){

    $ref_id = $_POST['ref_id'];
    $stud_id= $_POST['setID'];
    $mode = $_POST['mode_com'];
    $date_app = $_POST['date_app'];
    $time_app = $_POST['time_app'];
    $ref_stat = '3';


    $sql="INSERT into guidance_appointments(appointment_date, appointment_time, mode_id, status_id) 
            values ('$date_app','$time_app','$mode','$ref_stat')";

    if(mysqli_multi_query($conn,$sql)){
    $apt_id = $conn->insert_id;
    $sql2="UPDATE referral_form set status_id='$ref_stat' where referral_id=$ref_id;";
    $hold='';
    if(mysqli_multi_query($conn,$sql2)){
        $selectgg=mysqli_query($conn,"SELECT intake_id from intake_form WHERE intake_form.Student_id='$stud_id'");
        while($row2 = mysqli_fetch_array($selectgg)) {
            $hold=$row2['intake_id'];
        }
            
        $seva_indv_appn="INSERT INTO `indv_counselling`(`counselling_id`, `appointment_id`, `intake_id`, `remarks`, `eval_status`) VALUES (counselling_id,'$apt_id','$hold','', null)";
            
            if(mysqli_multi_query($conn,$seva_indv_appn)){}
        
      echo '<script>
        swal({
            title: "Appointment Has Been Set!",
            text: "Server Request Successful!",
            icon: "success",
            buttons: false,
            timer: 1800,
            closeOnClickOutside: false,
              closeOnEsc: false,
        })
      </script>';
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
    echo "<meta http-equiv='refresh' content='2'>";
 
       $sql4 = "SELECT staff.*, referral_form.referral_id, referral_form.Student_id from staff JOIN referral_form ON staff.staff_id= referral_form.staff_id WHERE referral_form.referral_id= '$ref_id'";
      $result4 = $conn->query($sql4);
      if ($result4->num_rows > 0) {
        while($row = $result4->fetch_assoc()) {
              $stf_id_to =  $row['staff_id'];
              $stud_refer = $row['Student_id'];
                
         }
       }

                  
    $msg = "Your referral request for ".$stud_refer." has been approved";
    $sql5 = "INSERT INTO notif(notif_id, user_id, message_body, _time, link, message_status) VALUES(NULL, '$stf_id_to', '$msg', now(), 'Guidance_Faculty_Referrals.php', 'Delivered')";

      if ($conn->query($sql5) === TRUE) {}

  }

  if(isset($_POST['returnSlip'])){

    $referral_id= $_POST['referral_id2'];
    $date_completed = $_POST['date_accomplished'];
    $notes = $_POST['concerns'];
    $status = '1';



    $query="UPDATE referral_form set notes='$notes',status_id='$status' ,refdate_completed='$date_completed' where referral_id=$referral_id";

    if(mysqli_query($conn,$query)){

    echo '<script>
        swal({
            title: "Acknowledgement Slip Returned!",
            text: "Server Request Successful!",
            icon: "success",
            buttons: false,
            timer: 1800,
            closeOnClickOutside: false,
              closeOnEsc: false,
        })
      </script>';
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
      echo "<meta http-equiv='refresh' content='2'>";

      $sql6 = "SELECT staff.*, referral_form.referral_id, referral_form.Student_id from staff JOIN referral_form ON staff.staff_id= referral_form.staff_id WHERE referral_form.referral_id= '$referral_id'";
      $result6 = $conn->query($sql6);
      if ($result6->num_rows > 0) {
        while($row = $result6->fetch_assoc()) {
              $stf_id_to =  $row['staff_id'];
              $stud_refer = $row['Student_id'];
                
         }
       }

       $msg = "Acknowledgement Slip for ".$stud_refer." is available";
    $sql7 = "INSERT INTO notif(notif_id, user_id, message_body, _time, link, message_status) VALUES(NULL,'$stf_id_to', '$msg', now(), 'Guidance_Faculty_Acknowledgement.php', 'Delivered')";

      if ($conn->query($sql7) === TRUE) {}

  }

?>  

<!-- VIEW REFERRAL FORM MODAL -->

 
    <!-- SET STATUS --> 
  <div class="modal fade " id="acknowledgement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 1000px; margin-left:-230px;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">RETURN ACKNOWLEDGEMENT SLIP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                      <div class="modal-body c">
                        <div class="container">
                          <div class="tile" style="border-width: 2px; border-style:solid;">
                          <div class="col-sm">
                          <div class="tile inline-block float ml-2 mt-1" style="border-width:1px; border-style: solid;">
                            <h9>Form No.: FM-USeP-GCS-01</h9><br>
                            <h9>Issue Status: 04</h9><br>
                            <h9>Revision No.: 03</h9><br>
                            <h9>Date Effective: 01 November 2020</h9>
                          </div>
                          <div class="text" style="margin-top: 20px">
                            <h4><b>ACKNOWLEDGEMENT SLIP</b></h4><br>
                              <h5><b>GUIDANCE AND COUNSELLING REFERRAL</b></h5><br><br>
                            </div>
                          
                          <div class="text" style="margin-top: 10px; margin-left: 15px; font-family: arial; font-size: 16px;">
                              To:&emsp;&emsp;<input type="text" name="facultyname" id="facultyname" readonly="" style="width:250px; border-left: hidden; border-top: hidden; border-right: hidden; text-align:center;"><br>
                              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Name)<br>
                              &emsp;&emsp;&emsp; <input type="text" name="facultyposition" id="facultyposition" readonly="" style="width:250px; border-left: none; border-top: none; border-right: none; text-align: center;"><br>
                              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Position)<br>
                            </div>
                            <div class="text" style="margin-top: 30px">
                              This is the acknowledge receipt of your referral,<input type="text" id="studname" name="studname" placeholder="" readonly="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;">, <input type="text" id="course_year" name="course_year" placeholder="" readonly="" style="width:220px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;">&nbsp;on <input type="date" name="date_accomplished" id="date_accomplished" placeholder="" required="" style="width:150px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;">.
                            </div>
                            <div class="text" style="text-align: right; margin-top: 50px; margin-bottom: 30px;">
                            <input type="text" name="esignature" id="esignature" placeholder="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none; margin-right: 20px;"><br>
                            <h9>Signature Over Printed Name &emsp;</h9><br><br>
                          </div>

                          <div class="text" style="text-align:center;">
                                  <label class="control-label">NOTE:</label><br>
                                  <textarea id="concerns" name="concerns" id="concerns" rows="4" cols="60" required=""></textarea>
                                </div>
                          <input type="hidden" name="referral_id2" id="referral_id2" placeholder="" style="text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none; margin-right: 20px;">
                        
                      </div>
                    </div>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="submit" name="returnSlip" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
<!-- Set Appointment -->

  <div class="modal fade" id="setAppointment" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">SET APPOINTMENT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">  
                      <div class="modal-body c">
                        <div class="container">
                          
                            <input type="text" name="ref_id" id="ref_id" readonly="">
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">ID Number</label><input class="form-control" type="text" name="setID" id="setID" placeholder="" readonly="">
                                </div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name</label><input class="form-control" type="text" name="setStud" id="setStud" placeholder="" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course & Year</label><input class="form-control" type="text" name="setCourse" id="setCourse" placeholder="" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">Mode of Communication</label>
                                    <select class="form-control" id="mode_com" name="mode_com" required="">
                                      <option></option>
                                      <option value="2">Messenger</option>
                                      <option value="1">Cellphone</option>
                                      <option value="3">Google Meet</option>
                                      <option value="4">Face to face</option>
                                    </select>
                                  </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                  <input class="form-control" type="date" name="date_app" id="date_app" required="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" name="time_app" id="time_app" required="">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                    <button type="submit" name="SetAppointment" class="btn btn-success">SET APPOINTMENT</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                    </div>
                    </form>
                    </div>
                  </div>
                </div>
        

        <!--</div>-->

      </main>
      <!-- Essential javascripts for application to work-->
<script type="text/javascript">

// required SET APPOINTMENT FOR REFERRALS

$(document).ready(function(){
$('select[name=mode_com]').blur(function(){
if($(this).val().length == 0){
document.getElementById('mode_com').style.backgroundColor='#FFCECE';
document.getElementById('mode_com').style.border='1px solid red';
}});
});
$(document).ready(function(){
$('input[name=date_app]').blur(function(){
if($(this).val().length == 0){
document.getElementById('date_app').style.backgroundColor='#FFCECE';
document.getElementById('date_app').style.border='1px solid red';
}});
});
$(document).ready(function(){
$('input[name=time_app]').blur(function(){
if($(this).val().length == 0){
document.getElementById('time_app').style.backgroundColor='#FFCECE';
document.getElementById('time_app').style.border='1px solid red';
}});
});

// required SET APPOINTMENT FOR REFERRALS

$(document).ready(function(){
$('input[name=date_accomplished]').blur(function(){
if($(this).val().length == 0){
document.getElementById('date_accomplished').style.backgroundColor='#FFCECE';
document.getElementById('date_accomplished').style.border='1px solid red';
}});
});
$(document).ready(function(){
$('textarea').blur(function(){
if($(this).val().length == 0){
document.getElementById('concerns').style.backgroundColor='#FFCECE';
document.getElementById('concerns').style.border='1px solid red';
}});
});

// FILTERS

$(document).ready(function(){
  $("#filtermonth").on('change',function(){
    var value = $(this).val();
  });
});

$(document).ready(function(){
  $("#filterposition").on('change',function(){
    var fill = $(this).val();
  });
});
</script>

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
       //prevent form resubmission
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    $(document).ready(function() {
            $('#home-table').DataTable();
            $('#show-table').DataTable();
        });

     //view forms modal

$(document).on('click', '.viewbutton', function(){
      $('#view-modal').modal('show');    
    });
/*$(document).on('click', '.acceptbutton', function(){
      $('#setAppointment').modal('show');
      $('#referral_id').val($(this).attr('id'));
      var referral_id = $(this).attr('id');
      $.ajax({
        url: 'fetch_referralform.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
        referral_id: referral_id,
        },
        success: function(data){
        $('#ref_id').val(data[0]);
          $('#setStud').val(data[4]);
          $('#setCourse').val(data[11]);
          $('#setID').val(data[15]);

       },
        })
    });*/
$(document).on('click', '.editbutton', function(){
      $('#acknowledgement').modal('show');
      $('#referral_id').val($(this).attr('data-id'));
      var referral_id = $(this).attr('data-id');
      $.ajax({
        url: 'fetch_referralform.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
        referral_id: referral_id,
        },
        success: function(data){
        $('#referral_id2').val(data[0]);  
          $('#facultyname').val(data[2]);
          $('#facultyposition').val(data[3]);
          $('#studname').val(data[4]);
          $('#course_year').val(data[11]);
       },
        })
    });
</script>

<!-- FILTERsCRIPT -->
       <script type="text/javascript">
                $(document).ready(function(){
                  /*STATUS*/
                  $("#filterposition").on('change', function(){
                    var status = $("#filterstatus2").val();
                    var month = $("#filtermonth").val();
                    var position = $("#filterposition").val();
                    /*alert(position);*/
                    $.ajax({
                          url:"../../php/Guidance_referrals_filter.php",
                          type:"POST",
                          data:{status: status, month: month, position: position},
                          beforeSend:function(){
                            $(".calldiv2").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv2").html(data);
                          },
                    });
                  });
                      /*MONTH*/
                   $("#filtermonth").on('change', function(){
                    var status = $("#filterstatus2").val();
                    var month = $("#filtermonth").val();
                    var position = $("#filterposition").val();
                    /*alert(month);*/
                     /*alert(value);*/
                    $.ajax({
                          url:"../../php/Guidance_referrals_filter.php",
                          type:"POST",
                          data:{status: status, month: month, position: position},
                          beforeSend:function(){
                            $(".calldiv2").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv2").html(data);
                          },
                    });
                
                  });

                   /*STATUS TABLE 2*/
                   $("#filterstatus2").on('change', function(){
                    var status = $("#filterstatus2").val();
                    var month = $("#filtermonth").val();
                    var position = $("#filterposition").val();
                    /*alert(value);*/
                    $.ajax({
                          url:"../../php/Guidance_referrals_filter.php",
                          type:"POST",
                          data:{status: status, month: month, position: position},
                          beforeSend:function(){
                            $(".calldiv2").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv2").html(data);
                          },
                    });
                
                  });
                });
              
</script>
<script type="text/javascript">
  function print_specific_referral_content(){
    var win = window.open('','','left=0,top=0,width=900,height=700,toolbar=0,scrollbars=0,status =0');

    var content = "<html>";
    content += "<body onload=\"window.print(); window.close();\">";
    content += document.getElementById("printReferral").innerHTML ;
    content += "</body>";
    content += "</html>";
    win.document.write(content);
    win.document.close();
}
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