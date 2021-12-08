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
<!-- FILTER LINK -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <!-- Font-icon css-->
   <!--        <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  -->   
    


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <style>

    input{
    font-size: 13px;
  }

  @page{
    size: letter;
  }
  @media print {
    body * {
      visibility: hidden;
    }
    .modal-body * {
      visibility: visible;
      overflow: visible;
    }
    .main * {
      display: none;
    }

    .modal {
      position: absolute;
      left: 0;
      top: 0;
      margin-top: -120px;
      padding: 0;
      visibility: visible;
      overflow: visible !important; /* Remove scrollbar for printing. */
    }
    .modal-dialog {
      visibility: visible !important;
      overflow: visible !important; /* Remove scrollbar for printing. */
    }
  }
  </style>

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
          <li class="treeview"><a class="app-menu__item active" href="Guidance_Counselling.php" data-toggle="treeview"><i class="app-menu__icon far fa-sticky-note"></i><span class="app-menu__label">Counselling</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Counselling.php">List of Counselling Sessions</a></li>
              <li><a class="treeview-item" href="Guidance_GroupCounselling.php">Group Guidance</a></li>
              <li><a class="treeview-item active" href="Guidance_NewForms.php">New Submitted Intake Forms</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Referrals.php" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Referrals</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Referrals.php">List of Referral Forms</a></li>
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
                 <li><a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
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
              <div class="float-left"><h4>New Submitted Intake Forms</h4></div>
                </div>
                <br><br>
                <div class="table-bd">

                 <!--Table for New Submitted Intake Formss-->
                <table class="table table-hover table-bordered" id="home-table">
                  <thead>
                    <tr>
                    <th>Date Filed</th>
                    <th >ID Number</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year & Section</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
          $sql1="SELECT intake_form.intake_id, intake_form.Student_id, intake_form.date_filed, intake_form.intake_type, student.first_name, student.last_name, student.middle_name, student.suffix, student.section, student.year_level, course.title from intake_form join student USING(Student_id) join course USING(course_id) where date_verify is null";
          if($result1 = mysqli_query($conn, $sql1)){
          while ($row = mysqli_fetch_assoc($result1)) {

                                echo'<tr>
                                  <td>'. $row['date_filed'].'</td>
                                  <td>'. $row['Student_id'].'</td>
                                  <td>'. $row['first_name'].'  
                                  '. $row['middle_name'].''. $row['last_name'].'</td> 
                                  <td>'. $row['title'].'</td>
                                  <td>'. $row['year_level'].'- 
                                  '. $row['section'].'</td>
                                  <td>'; ?>
                                  <button type="button" class="btn btn-info btn-sm " a href="#viewmodal?<?php echo $row['Student_id'].$row['intake_id']; ?>" data-toggle="modal" style="width:35px;"><i class="fa fa-eye"></i></button>&nbsp;
                                  <button type="button" class="btn btn-warning btn-sm " a href="#viewmodalupdate?<?php echo $row['Student_id'].$row['intake_id']; ?>" data-toggle="modal" style="width:35px;"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:white"></i></button>&nbsp;
                                  <?php include('Modal_Guidance_NewForms.php'); ?>
                                </td>
                                </tr> <?php }} ?>
                  </tbody>
                </table>
              </div>
            </div><br>
            </div>
          </div>
        </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div>
              <div class="float-left"><h4>List of Intake Forms</h4></div>
                </div>
                <br><br>
                  Month 
                  <select class="bootstrap-select" id="filter_month">
                      <option class="select-item" value="all" selected="selected">All</option>
                      <option class="select-item" value="01" >January</option>
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
                  Course
                  <select class="bootstrap-select" id="filtcourse">
                    <option class="select-item" value="all" selected="selected">All</option>
                       <?php
                                           $result=mysqli_query($conn, "SELECT * FROM course where course_id !='2'");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $value= $res['course_id']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['name'];?></option>
                                              <?php } ?>
                    </select>
                   
                </div>
                <div class="table-bd">

             
               <!--Table for List of Intake Formss-->
              <div class="table-responsive">
                <br>
                <!--Table for List of Submitted Intake Formss-->
                <div class="divFilter">
                <table class="table table-hover table-bordered" id="show-table">
                  <thead>
                    <tr>
                    <th>Date Filed</th>
                    <th >ID Number</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year & Section</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
              <?php 
          $sql1="SELECT intake_form.intake_id, intake_form.Student_id, intake_form.date_filed, intake_form.intake_type, student.first_name, student.last_name, student.middle_name, student.suffix, student.section, student.year_level, course.title from intake_form join student USING(Student_id) join course USING(course_id) where date_verify is not null";
          if($result1 = mysqli_query($conn, $sql1)){
          while ($row = mysqli_fetch_assoc($result1)) {

                                echo'<tr>
                                  <td>'. $row['date_filed'].'</td>
                                  <td>'. $row['Student_id'].'</td>
                                  <td>'. $row['first_name'].'  
                                  '. $row['middle_name'].''. $row['last_name'].'</td> 
                                  <td>'. $row['title'].'</td>
                                  <td>'. $row['year_level'].'- 
                                  '. $row['section'].'</td>
                                  <td>'; ?>
                                  <button type="button" class="btn btn-info btn-sm " a href="#viewmodal?<?php echo $row['Student_id'].$row['intake_id']; ?>" data-toggle="modal" style="width:35px;"><i class="fa fa-eye"></i></button>&nbsp;
                                  <?php include('Modal_View_Guidance_NewForms.php'); ?>
                                </td>
                                </tr><?php }}

       ?>
                  </tbody>
                </table>
                </div>
              </div>
            </div><br>
            </div>
          </div>
        </div>
      </div>





<?php 

 if(isset($_POST['submit'])){
                      $appointment_id = $_POST['appointment_id'];
                      $intake_id = $_POST['intake_id'];
                      $student_id = $_POST['student_id'];

                      $query = "UPDATE intake_form SET date_verify = now() where intake_id='$intake_id'";

                      if(mysqli_query($conn,$query)){
                           newNotif($conn,$student_id);
                        echo '<script>
                          swal({
                              title: "Changes Saved!",
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
                    }
                    ?>

           
                <?php 
               
                    function newNotif($conn,$student_id){

                        $result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, _time, link, message_status) values (notif_id,'$student_id', 'Your intake form has been received by the admin.',now(),'Guidance_Student_Counselling.php', 'Delivered'),(notif_id,'$student_id', 'Your intake form has been received by the admin.',now(),'Guidance_Student_Counselling.php', 'Delivered')");

                              if($result){
                              }else{
                              }
                    }
                ?>
    </main>

      <!-- Essential javascripts for application to work-->
       <!--Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" /> -->
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
                $(document).ready(function(){
                  /*STATUS*/
                  $("#filter_month").on('change', function(){
                    var month = $("#filter_month").val();
                    var course = $("#filtcourse").val();
                   /* alert(month);*/
                    $.ajax({
                          url:"filter_GUIDANCE_NewForms.php",
                          type:"POST",
                          data:{month : month, course: course, status:status},
                          beforeSend:function(){
                            $(".divFilter").html("Working.....");
                          },
                          success:function(data){
                            $(".divFilter").html(data);
                          },
                    });
                
                  });
                  $("#filtcourse").on('change', function(){
                    var month = $("#filter_month").val();
                    var course = $("#filtcourse").val();
                    /*alert(value);*/
                    $.ajax({
                          url:"filter_GUIDANCE_NewForms.php",
                          type:"POST",
                          data:{month : month, course: course, status:status},
                          beforeSend:function(){
                            $(".divFilter").html("Working.....");
                          },
                          success:function(data){
                            $(".divFilter").html(data);
                          },
                    });
                
                  });
                });
              </script>
         
      <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#show-table').DataTable();</script>
      <script type="text/javascript">$('#home-table').DataTable();</script>
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