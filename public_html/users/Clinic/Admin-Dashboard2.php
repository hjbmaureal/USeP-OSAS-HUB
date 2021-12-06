  <?php
  session_start();
  include('connect.php');
  // $user_id = $_SESSION['id'];
 $user_id = '11111';
   $count_sql="SELECT * from notif where message_status='Delivered' AND user_id='$user_id' ";

          $result = mysqli_query($db, $count_sql);

          $count = 0;

          while ($row = mysqli_fetch_assoc($result)) {                             

            $count++;

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
      <title>Dashboard</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" type="text/css" href="css/clinic_main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
      <body class="app sidebar-mini rtl">
      <!-- Navbar-->

        
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
       
          <li><a class="app-menu__item active" href="Admin-Dashboard.php"><i class="app-menu__icon fa fa-chart-bar"></i><span class="app-menu__label">Dashboard</span></a></li>
           <li><a class="app-menu__item" href="Admin-PatientList.php"><i class="app-menu__icon fas fa-user-alt"></i><span class="app-menu__label">Patient</span></a></li>


          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Consultation</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-NewConsultation.php">New Consultation</a></li>
              <li><a class="treeview-item" href="Admin-ListOfConsultation.php">List of Consultation</a></li>
            </ul>
          </li>

 
          <li><a class="app-menu__item" href="Admin-Appointment.php"><i class="app-menu__icon fa fa-calendar-alt"></i><span class="app-menu__label">Appointment</span></a></li>
          <li><a class="app-menu__item" href="Admin-Prescription.php"><i class="app-menu__icon fas fa-prescription"></i><span class="app-menu__label">Prescription</span></a></li>

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Request.php">Medical Certificate</a></li>
              <li><a class="treeview-item" href="Admin-MedicalRecordCert.php">Medical Records Certification</a></li>
              <li><a class="treeview-item" href="Admin-RequestHistory.php">Request History</a></li>
            </ul>
          </li>

          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Clinic_Admin_Announcements.php"><i class="app-menu__icon fas fa-bullhorn"></i><span class="app-menu__label">Announcement</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="ConsultationReports.php">Consultation Reports</a></li>
              <li><a class="treeview-item" href="Prescription_reports.php">Prescription Reports</a></li>
              <li><a class="treeview-item" href="request_Reports.php">Request Reports</a></li>
            </ul>
          </li>
        
          
        </ul>
      </aside>


       <!--navbar-->

          <main class="app-content">
            
        <div class="app-title">
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Hi, </a>
              </li>
             <!-- <li class="app-search">
                   <input class="app-search__input" type="search" placeholder="Search">
                  <button class="app-search__button"><i class="fa fa-search"></i></button>
              </li>-->  
 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $count;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $count;  ?> new notifications.</li>
              <div class="app-notification__content">

                <?php 
                $count_sql="SELECT * from notif where message_status='Delivered'AND user_id='$user_id'  order by time desc";

                $result = mysqli_query($db, $count_sql);

                while ($row = mysqli_fetch_assoc($result)) { 
                  $intval = intval(trim($row['time']));
                  if ($row['message_status']=='Delivered' && $row['user_id']=='$user_id') {

                    
                    echo'
                  <b><li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">'.$row['message_body'].'</p>
                      <p class="app-notification__meta">'.timeago($row['time']).'</p>
                      <p class="app-notification__message"><form method="POST" action="notif_stat.php">
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
                      <p class="app-notification__message"><form method="POST" action="notif_stat.php">
                      <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                      <input type="submit" name="open_notif" value="Open Message">
                      </form></p>
                    </div></a></li>
                    ';
                  }
                  

                                    }
                ?>
            </ul>
          </li>
              
                 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
              <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
      
          </ul>
        </div>
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
       

         <!--<div class="page-error tile">-->
          <h3 class="tile-title" >Dashboard</h3>
                                      <br>

        <div class="row">
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Today Patient</h4>
			  <?php
				$date = date('Y-m-d');
   $sql= " Select * from consultation where appointment_date='$date' AND status='Pending' group by patient_id";
   $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $today_patient = mysqli_num_rows($res);

?>
              <p><b><?php echo htmlentities($today_patient);?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small info coloured-icon"><i class="icon fas fa-comment-medical fa-3x"></i>
            <div class="info">
              <h4>Today Consultation</h4>
			     <?php
				$date = date('Y-m-d');
   $sql= " Select * from consultation where appointment_date='$date' AND status='Pending'";
   $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $today_consultation = mysqli_num_rows($res);

?>
              <p><b><?php echo htmlentities($today_consultation);?></b></p>
            </div>
          </div>
        </div>
      
        <div class="col-md-3">
          <div class="widget-small danger coloured-icon"><i class="icon fas fa-file-prescription fa-3x"></i>
            <div class="info">
              <h4>Today Prescription</h4>
			  <?php
				$date = date('Y-m-d');
   $sql= " Select * from consultation where date_filed='$date'";
   $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $today_prescription = mysqli_num_rows($res);

?>
              <p><b><?php echo htmlentities($today_prescription);?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small warning coloured-icon"><i class="icon  fas fa-envelope-open-text fa-3x"></i>
            <div class="info">
              <h4>Today Request</h4>
			    <?php
				$date = date('Y-m-d');
    $sql= " Select * from consultation where date_filed='$date'";
   $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $today_request = mysqli_num_rows($res);

?>
              <p><b><?php echo htmlentities($today_request);?></b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Total Patient</h4>
			    <?php
   $sql= " Select * from consultation group by patient_id";
   $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total_patient = mysqli_num_rows($res);

?>
              <p><b><?php echo htmlentities($total_patient);?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small info"><i class="icon fas fa-comment-medical fa-3x"></i>
            <div class="info">
              <h4>Total Consultation</h4>
			   <?php
   $sql= " Select * from consultation";
   $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $consultation_total = mysqli_num_rows($res);

?>
      
              <p><b><?php echo htmlentities($consultation_total);?></b></p>
            </div>
          </div>
        </div>
      
        <div class="col-md-3">
          <div class="widget-small danger"><i class="icon fas fa-file-prescription fa-3x"></i>
            <div class="info">
              <h4>Total Prescription</h4>
			   <?php
				$date = date('Y-m-d');
   $sql= " Select * from consultation";
   $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $prescription = mysqli_num_rows($res);

?>
              <p><b><?php echo htmlentities($prescription);?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small warning"><i class="icon  fas fa-envelope-open-text fa-3x"></i>
            <div class="info">
              <h4>Total Request</h4>
			   <?php
				$date = date('Y-m-d');
   $sql= " Select * from consultation";
   $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total_request = mysqli_num_rows($res);

?>
              <p><b><?php echo htmlentities($total_request);?></b></p>
            </div>
          </div>
        </div>
      </div>
      </div>
<br>
<div class="row">
<div class="col-md-6">
          <div class="tile ">
            <center><h4 class="mb-2">CALENDAR</h4></center>
              <div id="calendar"></div>
            </div>
          </div>
      <div class="col-md-6">
              <div style="background-color: #193541; padding: 12px 10px;">
                          <div class="info" style="color: #FFFFFF;"><center><h5 class="mb-2">Upcoming Schedules</h5></center>
                          </div>	
                        </div>
              <div class="tile">
              <div id="external-events">
			  <?php
			  $limit=5;
			  $sql="Select consultation.consultation_type,date_format(consultation.appointment_date,'%M %d, %Y')as appointment_date,consultation.appointment_timefrom ,consultation.appointment_timeto ,CONCAT(student.first_name,' ', student.last_name) as name from consultation join student on consultation.patient_id=student.Student_id where status='Pending' order by appointment_date,appointment_timefrom,appointment_timeto ASC LIMIT $limit";
			  
			 $res = $db->query($sql);
			$cnt=1;
			
			while($row = $res->fetch_assoc()) {
			$appointment_start= new DateTime($row['appointment_timefrom']);
			$appointment_end= new DateTime($row['appointment_timeto']);
			   ?>
                <div class="fc-event"><h6>  <?php echo htmlentities($row['consultation_type']);?>-<?php echo htmlentities($row['name']);?><br></h6> Date: <?php echo htmlentities($row['appointment_date']);?><br> Time: <?php echo $appointment_start->format('g:i a');?> - <?php echo $appointment_end->format('g:i a');?></div>
				<?php
				}
				if ($res->num_rows == 0) {
				?>
				
				<div class="fc-event"><h6> No Upcoming Events! </h6></div>
				<?php 
				}
				?>
           
              </div>
            </div>
          </div>
        </div>


    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/jquery.vmap.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.vmap.world.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.vmap.sampledata.js"></script>
	  <script type="text/javascript" src="js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          /*$('#external-events .fc-event').each(function() {
      
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
      
        });*/
        var calendar = $('#calendar').fullCalendar({
          editable: true,
          header: {
            left: 'prev,next today',
            center: 'title', 
            right: 'month,agendaWeek,agendaDay'
          },
          events:'calendarview.php',  
          selectable:true,
          /*droppable: true, // this allows things to be dropped onto the calendar
          drop: function() {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }
          }*/
        });
      
      
      });

      function onload(){

      }

    </script>

    <!-- Google analytics script-->

   
    <!-- Google analytics script-->
  
    </body>
  </html>