
   <?php include('conn.php');
   include('session_admin.php');
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
      <body class="app sidebar-mini rtl" onLoad="onload();">
      <!-- Navbar-->

        
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
          <li><a class="app-menu__item active" href="Guidance_Admin.php"><i class="app-menu__icon fas fa-home"></i><span class="app-menu__label">Home</span></a></li>
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
          <li><a class="app-menu__item" href="Guidance_Admin_Announcements.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
        </ul>
      </aside>


       <!--navbar-->

          <main class="app-content">
            
        <div class="app-title">
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Hi, 
                  <?php
                  $selectname = "SELECT staff.*, office.office_name FROM staff 
              JOIN office ON staff.office_id = office.office_id  WHERE staff.office_id='4' AND staff.account_status='Active'";
                  $query = $conn->query($selectname);
                  $user = $query->fetch_assoc();
                  $image_data=$user['pic'];
                   echo $user['first_name'].' '.$user['last_name'];?>!
                </a>
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
                      <p class="app-notification__message"><form method="POST" action="change_notif_status.php">
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
                      <p class="app-notification__message"><form method="POST" action="change_notif_status.php">
                      <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                      <input type="submit" name="open_notif" value="Open Message">
                      </form></p>
                    </div></a></li>
                    ';
                  }
                  

                                    }
                ?>
                
              </div>
              <li class="app-notification__footer"><a href="adminSeeAllNotif.php?link=Guidance_Admin.php">See all notifications.</a></li>
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

  <!-- Announcements -->
  
      <div class="row">
      <div class="col-md-12">
        <div style="background-color: #c12c32; padding: 5px 10px;"></div>
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Announcements</h3>
              <div class="btn-group"><a class="btn btn-danger" href="Guidance_Admin_Announcements.php"><i class="fas fa-sm fa-bullhorn">&nbsp;Go to Announcements</i></a></div>
            </div>
            <table class="announcements-table" id="announcements-table" cellpadding="10px" width="100%">
              <?php 
          $sql2="SELECT * from announcements";
          $result = mysqli_query($conn, $sql2);
          while ($row2 = mysqli_fetch_assoc($result)) {

                                echo'<tr class="tile">
                                  <td style="align:left;text-align:justify"><div style="font-weight:bold; ">'. $row2['_date'].'
                                  </div></td>
                                  <td style="align:left;text-align:justify"><div style="font-weight:bold;">'. $row2['title'].'
                                  </div>'. $row2['content'].'</td>
                                  <td>
                                  <div class="btn-group"></div>
                               <br></tr><tr><td><input class="form-control" type="date" hidden></td></tr>';}
      ?>
             </table> 
            </div>
          </div>
        </div>
      </div>

        <!--- CALENDAR  -->
        <div class="row">
        <div class="col-md-4">
          <div class="tile ">
            <center><h4 class="mb-2">CALENDAR</h4></center>
              <div id="calendar"></div>
            </div>
          </div>
        <div class="col-md-3">

              <div style="background-color: #193541; padding: 12px 10px;">
                          <div class="info" style="color: #FFFFFF;"><center><h5 class="mb-2">Upcoming Schedules</h5></center>
                          </div>
                        </div>
              <div class="tile">
              <div id="external-events">
                        
                                       <?php 
                  $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3' LIMIT 5";
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
                                              <div class="fc-event">
                <b>Date:</b> <?php echo $row['appointment_date'];?><br>
                <b>Time:</b> <?php echo $row['appointment_time'];?><br>
                  <b>Client:</b> <?php echo $row['first_name'].' '.$row['last_name'];?>
                </div>
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
                                              <?php $section=$row['section']; $year_level=$row['year_level'];
                                                 if ($row['section']=='all') {
                                                  $section='';
                                                }if ($row['year_level']=='all') {
                                                  $year_level='';
                                                }?>
                                              <div class="fc-event">
                <b>Date:</b> <?php echo $row['appointment_date'];?><br>
                <b>Time:</b> <?php echo $row['appointment_time'];?><br>
                  <b>Client:</b> <?php echo $row['title'].' '.$year_level." ".$section;?>
                </div>
                                              <?php }} 
                                          }
                                        }
                                    }
                            }
                         ?>
              </div>
            </div>
          </div>

          <div class="col-md-5">
              <div class="tile">
              <center><h4 class="title">SUMMARY AND REPORTS</h4></center>
              <div class="tile-body" align="center">
              <div class="btn-group"><a class="btn btn-primary" style="border-radius: 2px; font-size: 12px;" href="Guidance_Reports.php"> Counselling</a></div>
              <div class="btn-group"><a class="btn btn-primary" style="border-radius: 2px; font-size: 12px;" href="Guidance_Referral_Reports.php">Referrals</a></div>
              <div class="btn-group"><a class="btn btn-primary" style="border-radius: 2px; font-size: 12px;" href="Guidance_Evaluation_Reports.php"> Evaluation</a></div>
              <div class="btn-group"><a class="btn btn-primary" style="border-radius: 2px; font-size: 12px;" href="Guidance_GroupGuidance_Reports.php">Group Guidance</a></div>
            </div>
          </div>
          
          <div class="tile">
            <div style="background-color: #193541; padding: 8px 5px;">
                          <div class="info" style="color: #FFFFFF;"><center><h6 class="mb-2">NEW PENDING FORMS</h6></center>
                          </div>
                        </div><br>
            
          <div class="row">
        <div class="col-md-6">
          <div class="tile" style="border-width: 3px; border-style: solid; border-color: #193541; border-radius: 20px;">
            <div class="info">
              <center><h5>COUNSELLING</h5>
                <?php $count="SELECT count(indv_counselling.counselling_id) as count from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.status_id = '2'";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {
                      
                 ?>
              <p><b><?php echo $row['count'];}}?></b></p>
              <div class="btn-group"><a class="btn btn-outline-primary" href="Guidance_Counselling.php">Review</a></div>
            </div></center>
        </div></div>
        <div class="col-md-6">
          <div class="tile" style="border-width: 3px; border-style: solid; border-color: #193541; border-radius: 20px;">
            <div class="info">
              <center><h5>REFERRALS</h5>
               <?php $count="SELECT count(referral_form.referral_id) as count from referral_form join staff USING (staff_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id ='2'";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {
                      
                 ?>
              <p><b><?php echo $row['count'];}}?></b></p>
              <div class="btn-group"><a class="btn btn-outline-primary" href="Guidance_Referrals.php">Review</a>
              </div>
            </div>
          </center>
          </div>
        </div>
      </div>
</div>
  </div>
</div>
    <div class="modal fade" id="viewSched" data-backdrop="static">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #193541;">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;">EDIT STATUS OF COUNSELLING</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="container">
                         <input type="text" name="appointment_id3" id="appointment_id3" hidden> 

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date Filed:</label><input class="form-control" type="date" id="date_filed3" name="date_filed3" disabled>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">ID Number:</label><input class="form-control" type="text" id="student_id3" name="student_id3" disabled>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name:</label><input class="form-control" type="text" id="full_name3" name="full_name3" disabled>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course:</label><input class="form-control" type="text" name="course3" id="course3" disabled>
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Year Level & Section:</label><input class="form-control" type="text" id="year_section3" name="year_section3" disabled>
                                </div>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
                     
                    </div>
                  </div>
                </div>
        

        <!--</div>-->
      </main>
      <!-- Essential javascripts for application to work-->
      
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

      
     var calendar = $('#calendar').fullCalendar({
          editable: true,
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          events:'calendarLoad.php',  
          selectable:true,
        });
    
      });

      function onload(){

      }
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