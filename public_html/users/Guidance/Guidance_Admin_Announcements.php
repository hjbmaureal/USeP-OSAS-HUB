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
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where user_id='$admin_id' and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){
    $count = $row['cnt'];
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

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- DATEPICKER --> 
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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
  <hr>
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
          <li><a class="app-menu__item active" href="Guidance_Admin_Announcements.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
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
                    <img class="rounded-circle" src="data:image/png;base64,<?php echo $_SESSION['photo'] ?>" style="width: 30px; height: 30px;">
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

      <!-- Announcements -->
      <div class="row">
      <div class="col-md-12">
        <div style="background-color: #c12c32; padding: 5px 10px;"></div>
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Guidance Office Announcements</h3>
              <div class="btn-group"><a class="btn btn-danger" id="new-button" href="#new-announcement-modal" data-toggle="modal"><i class="fas fa-sm fa-plus"></i></a></div>
            </div>

            <table class="announcements-table" id="announcements-table" cellpadding="10px" width="100%">
              <?php 
          $sql2="select announcements.announcement_id,announcements.staff_id,announcements._date,announcements.title,announcements.content, staff.office_id from staff INNER JOIN announcements ON announcements.staff_id=staff.staff_id WHERE staff.office_id=4";
          $result = mysqli_query($conn, $sql2);
          while ($row2 = mysqli_fetch_assoc($result)) {

                                echo'<tr class="tile">
                                  <td style="align:left;text-align:justify"><div style="font-weight:bold; ">'. $row2['_date'].'
                                  </div></td>
                                  <td style="align:left;text-align:justify"><div style="font-weight:bold;">'. $row2['title'].'
                                  </div>'. $row2['content'].'</td>
                                  <td>
                                  <div class="btn-group"><a id='.$row2['announcement_id'].' type="button" class="btn btn-danger btn-sm update-button" data-id='.$row2['announcement_id'].' ><i class="fas fa-pencil-square-o" style="color:white;"></i></a>&nbsp;
                                  <button type="button" class="btn btn-danger btn-sm delete-button" id='.$row2['announcement_id'].' style="width:35px;"><i class="fas fa-sm fa-trash"></i></button>&nbsp; </div>
                               <br></tr><tr><td><input class="form-control" type="date" hidden></td></tr>';}


      ?>


             </table> 
            </div>
          </div>
        </div>
      </div>

<?php

  if (isset($_POST['add'])) {
    $staff_id = ($_POST['staff_id']);
    $date = date('Y-m-d',strtotime($_POST['date_accomplished']));
    $title = ($_POST['title']);
    $content = ($_POST['content']);


   $sql="INSERT INTO announcements(staff_id, _date, title, content) VALUES ('$staff_id', '$date', '$title', '$content')";
    if(mysqli_query($conn,$sql)){
      addNotif($conn);
        echo '<script>
        swal({
            title: "Announcement Posted!",
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
  
  function addNotif($conn){
      $sql8 = "SELECT student.Student_id, student.student_status, student.account_status from student WHERE student.student_status='currently enrolled' AND student.account_status='active'";
                      $result8 = $conn->query($sql8);
                      if ($result8->num_rows > 0) {
                      // output data of each row
                      while($row = $result8->fetch_assoc()) {
                              $Student_id = $row['Student_id'];
                            $result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, time, link, message_status) values (notif_id,'$Student_id', 'A new announcement was posted.',now(),'Guidance_Student.php', 'Delivered')");

                              if($result){
                                echo '<script>
        swal({
            title: "Announcement Posted!",
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
                      }
                    }  


  if (isset($_POST['update'])) {
    $staff_id = ($_POST['staff_id2']);
    $newannouncement_id = ($_POST['announcement_id2']);
    $newtitle = ($_POST['title2']);
    $newcontent = ($_POST['content2']);


    $sql="UPDATE announcements SET title='$newtitle', content='$newcontent' where announcement_id='$newannouncement_id' and staff_id='$staff_id'";
    if(mysqli_query($conn,$sql)){
            echo '<script>
        swal({
            title: "Announcement Updated!",
            text: "Server Request Successful!" ,
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

  if (isset($_POST['delete'])) {
    $announcement_id = ($_POST['announcement_id3']);
    $staff_id = ($_POST['staff_id3']);

    $sql="DELETE from announcements where announcement_id='$announcement_id' and staff_id='$staff_id'";

    if(mysqli_query($conn,$sql)){
            echo '<script>
        swal({
            title: "Announcement Deleted!",
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
      

<!--Add new announcement Modal-->
<form method="POST" action="" id="myform">
<div class="modal fade" id="new-announcement-modal" data-backdrop="static">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Announcement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <div class="container">
                         <input type="text" name="staff_id" id="staff_id" value="<?php echo $admin_id ?>" hidden> 
                         <input type="text" name="announcement_id" id="announcement_id" hidden> 


                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                <?php $date=date('Y-m-d');?>
                                  <label class="control-label">Date:&nbsp;</label><input class="form-control" type="date" name="date_accomplished" id="date_accomplished" placeholder="DD/MM/YYYY" value="<?php echo $date;?>" readonly>
                                </div>
                            </div>
                          </div>

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Title:&nbsp;</label><input class="form-control" type="text" id="title" name="title" required="">
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Content:</label><br><textarea class="form-control" id="content" name="content" rows="6" cols="100" required="" style="text-align: justify;" ></textarea>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="add" name="add">SAVE</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>




  <!--Update announcement Modal-->
<form method="POST" action="">
<div class="modal fade" id="update-announcement-modal" data-backdrop="static">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Update Announcement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
       
                        <div class="container">
                          <input class="form-control" type="text" id="announcement_id2" name="announcement_id2" hidden>
                          <input type="text" name="staff_id2" id="staff_id2" value="<?php echo $admin_id ?>" hidden> 
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Title:</label><input class="form-control" type="text" id="title2" name="title2">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Content:</label><textarea class="form-control" id="content2" name="content2" rows="6" cols="100" style="text-align: justify;"></textarea>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="update">SAVE CHANGES</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                      </div>
                    </div>
                  </div>
                </div>
             </form>


<!--Delete announcement Modal-->
<form method="POST" action="">
<div class="modal fade" id="delete-announcement-modal" data-backdrop="static">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="container">
                            <input class="form-control" type="hidden" id="announcement_id3" name="announcement_id3" >
                            <input class="form-control" type="hidden" id="staff_id3" name="staff_id3">
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group" align="justify">
                                  <input class="form-control" type="text" id="title3" name="title3" style="border: transparent; background-color: transparent;font-weight: bold;font-size: 16px;" disabled>
                                  <textarea class="form-control" id="content3" name="content3" rows="6" cols="60" style="border: transparent; background-color: transparent;" disabled></textarea>
                                </div>
                            </div>
                          </div>
                         
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="delete">YES</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
       </form>        

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
                    $holder=date('Y-m-d', $time);
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
                format: 'yyyy/mm/dd',
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
  <script type="text/javascript">
     //prevent form resubmission
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }

//update announcement
      $(document).on('click', '.update-button', function(){
      $('#update-announcement-modal').modal('show');
      $('#announcement_id').val($(this).attr('data-id'));
      var announcement_id = $(this).attr('data-id');

      $.ajax({  
         url: 'fetch_Announcements.php',
        method: 'POST',
        dataType: 'JSON',
        data:{
        announcement_id: announcement_id,
        },
        success: function(data){

      //form_intake table
          $('#announcement_id2').val(data[0]); 
          $('#date2').val(data[1]);
          $('#title2').val(data[2]);
          $('#content2').val(data[3]);
          $('#staff_id2').val(data[4]);

         },
        })
    });


//delete announcement   

$(document).on('click', '.delete-button', function(){
        var announcement_id = $(this).attr("id");  
        console.log(announcement_id);

      $.ajax({  
         url: 'fetch_Announcements.php',
        method: 'POST',
        dataType: 'JSON',
        data:{
        announcement_id: announcement_id,
        },
        success: function(data){

      //form_intake table
          $('#announcement_id3').val(data[0]); 
          $('#date_made3').val(data[1]);
          $('#title3').val(data[2]);
          $('#content3').val(data[3]);
          $('#staff_id3').val(data[4]);

          }, error: function(errorThrown){
                console.log("error!");
            }

    })
    

  $('#delete-announcement-modal').modal('show');  
});

  </script>
      
      <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/fullcalendar.min.js"></script>

    <script type="text/javascript">

      $(document).ready(function() {
      
        $('#external-events .fc-event').each(function() {
      
          // store data so the calendar knows to render an event upon drop
          $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true // maintain when user navigates (see docs on the renderEvent method)
          });
      
          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
          });
      
        });
      
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar
          drop: function() {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }
          }
        });
      
      
      });
    </script>
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