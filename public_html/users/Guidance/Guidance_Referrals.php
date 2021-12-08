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
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where (user_id='$admin_id' or office_id = 4) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}



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

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>

      <!-- Filter link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <!-- DATEPICKER --> 
  <script src="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/js/bootstrap-datetimepicker.js"></script>
  <link href="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
      <!--Jquery -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" /> -->   


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
                  $count_sql="SELECT * from notif where (user_id=$admin_id or office_id = 4)  order by time desc";
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
          $sql1="SELECT referral_form.Student_id, referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.status_id, staff.first_name as fname, staff.middle_name as mname, staff.last_name as lname, staff.position from referral_form join staff USING (staff_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id ='2'";
          if($result1 = mysqli_query($conn, $sql1)){
          while ($row = mysqli_fetch_assoc($result1)) {
            $sId=$row['Student_id'];
                                echo'<tr>
                                  <td>'. $row['date_filed'].'</td>
                                  <td>'. $row['staff_id'].'</td>
                                  <td>'. $row['fname'].'  '. $row['mname'].'  '. $row['lname'].'</td> 
                                  <td>'. $row['position'].'</td>
                                  <td>';
                                   $sqlselect=mysqli_query($conn,"SELECT intake_id FROM intake_form WHERE Student_id='$sId'");
                                     $count=mysqli_num_rows($sqlselect);
                                     if($count){ ?>
                                      <button class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" a href="#details<?php echo $row['referral_id']; ?>"><i class="fas fa-eye" style="color:white;width:13px"></i></button>&nbsp;
                                      <?php include('Guidance_Referral_View_Modal.php'); ?>
                                      <button class="btn btn-warning btn-sm acceptbutton" class="text mr-2" data-toggle="modal" a href="#setAppointment<?php echo $row['referral_id']; ?>"><i class="fas fa-pencil-square-o" style="color:white;width:13px"></i></button>&nbsp;
                                   <?php include('referral_setAppointment.php'); ?>
                                    <?php }else{ ?>
                                      <button class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" a href="#details<?php echo $row['referral_id']; ?>"><i class="fas fa-eye" style="color:white;width:13px"></i></button>&nbsp;
                                      <?php include('Guidance_Referral_View_Modal.php'); ?>
                                      <button class="btn btn-warning btn-sm acceptbutton" class="text mr-2" data-toggle="modal" a href="#warning<?php echo $row['referral_id']; ?>"><i class="fas fa-pencil-square-o" style="color:white;width:13px"></i></button>&nbsp;
                                   <?php include('referral_setAppointment.php'); ?>
                                   <?php }?>
                                   
                                   
                                  </td>
                                </tr><?php }}

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
                    <br>
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

                  &emsp;  <div class="inline-block">
                      Position/Designation
                      <br>
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

                     &emsp; <div class="inline-block">
                      Status
                        <br>
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
                                  <?php include('Guidance_Referral_View_Modal.php'); ?>
                                   <button class="btn btn-warning btn-sm editbutton" disabled ="disabled" class="text mr-2" data-toggle="modal" a href="#acknowledgement<?php echo $row['referral_id']; ?>"><i class="fas fa-pencil-square-o" style="color:white;width:13px"></i></button>&nbsp;
                                  <?php include('Guidance_Acknowledgement_Modal.php'); ?>
                                <?php }else{?>
                                  <button  class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" a href="#details<?php echo $row['referral_id']; ?>"><i class="fas fa-eye" style="color:white;width:13px"></i></button>
                                  <?php include('Guidance_Referral_View_Modal.php'); ?>
                                  <button class="btn btn-warning btn-sm editbutton" class="text mr-2" data-toggle="modal" a href="#acknowledgement<?php echo $row['referral_id']; ?>"><i class="fas fa-pencil-square-o" style="color:white;width:13px"></i></button>&nbsp;
                                  <?php include('Guidance_Acknowledgement_Modal.php'); ?>
                                  
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
if (isset($_POST['SetNotification'])) {
    $referral_id=$_POST['referral_id'];
    $stud_refer='';
  $sqlN6 = "SELECT staff.*, referral_form.referral_id, referral_form.Student_id from staff JOIN referral_form ON staff.staff_id= referral_form.staff_id WHERE referral_form.referral_id= '$referral_id'";
      $res6 = $conn->query($sqlN6);
      if ($res6->num_rows > 0) {
        while($row = $res6->fetch_assoc()) {
              $stf_id_to =  $row['staff_id'];
              $stud_refer = $row['Student_id'];
                
         }
       }

       $msg = "NOTIFICATION from Guidance admin! Please fillup the intake Form";
    $sql7 = "INSERT INTO notif(notif_id, user_id, message_body, _time, link, message_status) VALUES(NULL,'$stud_refer', '$msg', now(), 'Guidance_Student_Counselling.php', 'Delivered')";

      if ($conn->query($sql7) === TRUE) {
      echo '<script>
        swal({
            title: "Notification Has Been Send!",
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
}
  if(isset($_POST['SetAppointment'])){
    $intake_id='';
    $ref_id = $_POST['ref_id'];
    $stud_id= $_POST['setID'];
    $mode = $_POST['mode'];
    $date_app = date('Y-m-d',strtotime($_POST['date_app']));
    $time_app = date('H:i',strtotime($_POST['date_app']));
    $ref_stat = '3';

    
    /*--------------------GET INTAKE ID----------------------*/
    $sqlSelect="SELECT student.Student_id, intake_form.intake_id from referral_form join staff USING(staff_id) join student USING(Student_id) join intake_form USING(Student_id) where referral_id='$ref_id'";
     $result = mysqli_query($conn, $sqlSelect);
      if($result = mysqli_query($conn,$sqlSelect)){               
      while($indvId = mysqli_fetch_array($result)) { 
              $intake_id=$indvId['intake_id'];
            }
      }
      if (isset($_POST['link'])) {
      $link =$_POST['link'];
      $sql=mysqli_query($conn,"INSERT into guidance_appointments(date_filed, appointment_date, appointment_time, mode_id, status_id, link) 
            values (now(),'$date_app','$time_app','$mode','$ref_stat', '$link')");
      }if (isset($_POST['link']) && isset($_POST['code'])){
        $link=$_POST['link'];
        $code= $_POST['code'];
        
        $sql=mysqli_query($conn,"INSERT into guidance_appointments(date_filed, appointment_date, appointment_time, mode_id, status_id, link, meeting_code) 
            values (now(),'$date_app','$time_app','$mode','$ref_stat', '$link', '$code')");

      }else{
      $sql=mysqli_query($conn,"INSERT into guidance_appointments(date_filed, appointment_date, appointment_time, mode_id, status_id) 
            values (now(),'$date_app','$time_app','$mode','$ref_stat')");
    } 
    

    if ($sql) {
            $apt_id = $conn->insert_id;
              /*SAVE DATA TO INDIVIDUAL COUNSELLING*/
            $indivSql="INSERT INTO `indv_counselling`(`counselling_id`, `appointment_id`, `intake_id`, `remarks`, `eval_status`) VALUES (`counselling_id`,'$apt_id','$intake_id','','')";
            if ($conn->query($indivSql) === TRUE) {}
              /*END*/
                      /*Get Cred from database*/

                            $cred = "SELECT last_name, first_name, middle_name, email_add FROM student WHERE student.Student_id='$stud_id'";
                            if($cd=mysqli_query($conn,$cred)){
                              while ($creds = mysqli_fetch_assoc($cd)) {      
                                         $credEmail = "SELECT appointment_date, appointment_time, mode_of_communication.communication_mode FROM guidance_appointments LEFT JOIN mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id WHERE guidance_appointments.appointment_id=' $apt_id'";
                                              if($cdEmail=mysqli_query($conn,$credEmail)){
                                                while ($credE = mysqli_fetch_assoc($cdEmail)) {
                            /*Send schedule to Google callendar*/
                            $from_name = "Guidance Office";        
                            $from_address = "lloydsryan30@gmail.com";        
                            $to_name = $creds['last_name'].', '.$creds['first_name'].' '.$creds['middle_name'];        
                            $to_address = $creds['email_add'];          
                            $startTime = $credE['appointment_date'].' '.$credE['appointment_time'];  
                            $endTime = "";    
                            $subject = "Guidance Meeting Schedule";   
                            $description = "Guidance Meeting Schedule";    
                            $location = $credE['communication_mode'];    
                            $domain = 'gmail.com';
                            
                            //Create Email Headers
                            $mime_boundary = "----Meeting Booking----".MD5(TIME());

                            $headers = "From: ".$from_name." <".$from_address.">\n";
                            $headers .= "Reply-To: ".$from_name." <".$from_address.">\n";
                            $headers .= "MIME-Version: 1.0\n";
                            $headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
                            $headers .= "Content-class: urn:content-classes:calendarmessage\n";
                            
                            //Create Email Body (HTML)
                            $message = "--$mime_boundary\r\n";
                            $message .= "Content-Type: text/html; charset=UTF-8\n";
                            $message .= "Content-Transfer-Encoding: 8bit\n\n";
                            $message .= "<html>\n";
                            $message .= "<body>\n";
                            
                            $message .= 'Group Guidance Meeting';
                            
                            $message .= "</body>\n";
                            $message .= "</html>\n";
                            $message .= "--$mime_boundary\r\n";

                            //Event setting
                            $ical = 'BEGIN:VCALENDAR' . "\r\n" .
                            'PRODID:-//Microsoft Corporation//Outlook 10.0 MIMEDIR//EN' . "\r\n" .
                            'VERSION:2.0' . "\r\n" .
                            'METHOD:REQUEST' . "\r\n" .
                            'BEGIN:VTIMEZONE' . "\r\n" .
                            'TZID:Eastern Time' . "\r\n" .
                            'BEGIN:STANDARD' . "\r\n" .
                            'DTSTART:20091101T020000' . "\r\n" .
                            'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=1SU;BYMONTH=11' . "\r\n" .
                            'TZOFFSETFROM:-0400' . "\r\n" .
                            'TZOFFSETTO:-0500' . "\r\n" .
                            'TZNAME:EST' . "\r\n" .
                            'END:STANDARD' . "\r\n" .
                            'BEGIN:DAYLIGHT' . "\r\n" .
                            'DTSTART:20090301T020000' . "\r\n" .
                            'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=2SU;BYMONTH=3' . "\r\n" .
                            'TZOFFSETFROM:-0500' . "\r\n" .
                            'TZOFFSETTO:-0400' . "\r\n" .
                            'TZNAME:EDST' . "\r\n" .
                            'END:DAYLIGHT' . "\r\n" .
                            'END:VTIMEZONE' . "\r\n" .  
                            'BEGIN:VEVENT' . "\r\n" .
                            'ORGANIZER;CN="'.$from_name.'":MAILTO:'.$from_address. "\r\n" .
                            'ATTENDEE;CN="'.$to_name.'";ROLE=REQ-PARTICIPANT;RSVP=TRUE:MAILTO:'.$to_address. "\r\n" .
                            'LAST-MODIFIED:' . date("Ymd\TGis") . "\r\n" .
                            'UID:'.date("Ymd\TGis", strtotime($startTime)).rand()."@".$domain."\r\n" .
                            'DTSTAMP:'.date("Ymd\TGis"). "\r\n" .
                            'DTSTART;TZID="Pacific Daylight":'.date("Ymd\THis", strtotime($startTime)). "\r\n" .
                            'DTEND;TZID="Pacific Daylight":'.date("Ymd\THis", strtotime($endTime)). "\r\n" .
                            'TRANSP:OPAQUE'. "\r\n" .
                            'SEQUENCE:1'. "\r\n" .
                            'SUMMARY:' . $subject . "\r\n" .
                            'LOCATION:' . $location . "\r\n" .
                            'CLASS:PUBLIC'. "\r\n" .
                            'PRIORITY:5'. "\r\n" .
                            'BEGIN:VALARM' . "\r\n" .
                            'TRIGGER:-PT15M' . "\r\n" .
                            'ACTION:DISPLAY' . "\r\n" .
                            'DESCRIPTION:Reminder' . "\r\n" .
                            'END:VALARM' . "\r\n" .
                            'END:VEVENT'. "\r\n" .
                            'END:VCALENDAR'. "\r\n";
                            $message .= 'Content-Type: text/calendar;name="meeting.ics";method=REQUEST'."\n";
                            $message .= "Content-Transfer-Encoding: 8bit\n\n";
                            $message .= $ical;

                            if(mail($to_address, $subject, $message, $headers)){
                        
                            }else{
                         
                            }}}}}
    $sql2="UPDATE referral_form set status_id='$ref_stat' where referral_id=$ref_id;";

    if(mysqli_multi_query($conn,$sql2)){

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
    $msg2 = "You have Guidance Counselling Appointmrnt";
    $sql6 = "INSERT INTO notif(notif_id, user_id, message_body, _time, link, message_status) VALUES(NULL, '$stud_refer', '$msg2', now(), 'Guidance_Student_Counselling.php', 'Delivered')";

      if ($conn->query($sql5) === TRUE) {}if ($conn->query($sql6) === TRUE) {}

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
                              This is the acknowledge receipt of your referral,<input type="text" id="studname" name="studname" placeholder="" readonly="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;">, <input type="text" id="course_year" name="course_year" placeholder="" readonly="" style="width:220px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;">&nbsp;on <input type="text" name="date_accomplished" id="date_accomplished" style="width:150px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;" class="form-control datepicker" placeholder="MM/DD/YY" autocomplete="off" required="">.
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
        

        <!--</div>-->

      </main>
      <?php 
                $count = 0;
                $results[]= '';$i=0;
                $from= date('Y-m-d'); 
                $sql="SELECT DATE_FORMAT(appointment_date, '%d') as dy,appointment_date FROM `guidance_appointments` WHERE appointment_date > '$from'";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){
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

                ?>
                <!-- DISABLE DATESCHEDULE -->
                <script type="text/javascript">
                  var datesForDisable = [<?php echo $totaldayslist;?>];
                  
                  $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                startDate: new Date(),
                daysOfWeekDisabled: [0,6],
                todayHighlight: true,
                datesDisabled: datesForDisable,
                autoclose:true,
                });
                  
                
                </script>
                  <script type="text/javascript">
    $('.datepicker').datepicker({
        daysOfWeekDisabled: [0,6]
    });
</script>
      <!-- Essential javascripts for application to work-->
<script type="text/javascript">

// required SET APPOINTMENT FOR REFERRALS

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
                          url:"Guidance_referrals_filter.php",
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
                          url:"Guidance_referrals_filter.php",
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
                          url:"Guidance_referrals_filter.php",
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
    $(document).ready(function(){
                  $("#mode_com").on('change', function(){
                    var mode = $(this).val();
                    /*alert(mode);*/
                    
                    $.ajax({
                          url:"filter_fblink.php",
                          type:"POST",
                          data:{mode: mode},
                          beforeSend:function(){
                            $(".calldivlink").html("Working.....");
                          },
                          success:function(data){
                            $(".calldivlink").html(data);
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