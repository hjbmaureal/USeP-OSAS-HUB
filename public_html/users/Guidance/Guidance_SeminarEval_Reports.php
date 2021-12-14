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

      <style>

   input{
    font-size: 13px;
  }

  input[type=checkbox][disabled]{
  outline:1px solid black; 
}

  @page{
    size: auto;
  }
  @media print {
    body * {
      visibility: hidden;
    -webkit-print-color-adjust: exact;
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
      <body class="app sidebar-mini rtl">

        
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

      <hr>
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
          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-line-chart"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
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
           <div><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Hi, 
                  <?php
                  $selectname = "SELECT staff.*, department.dept_name, office.office_name FROM staff 
              JOIN department ON staff.dept_id = department.dept_id JOIN office ON staff.office_id = office.office_id  WHERE staff.office_id='4' AND staff.account_status='Active'";
                  $query = $conn->query($selectname);
                  $user = $query->fetch_assoc();
                  $image_data=$user['pic'];
                   echo $user['first_name'].' '.$user['last_name'];?>!
                </a>
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
              <li class="app-notification__footer"><a href="adminSeeAllNotif.php?link=Guidance_SeminarEval_Reports.php">See all notifications.</a></li>
            </ul>
          </li>
              
                 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="Guidance_AdminUser.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="../index.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
      
          </ul>
        </div>
        <div class="red"> 
          
        </div>

 
          <?php
                       $guidance_id = $_GET['id'];

                       $sql="SELECT group_guidance.*, participants.*, guidance_appointments.* from group_guidance 
                              join participants on participants.grp_guidance_id=group_guidance.grp_guidance_id
                              join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id where group_guidance.grp_guidance_id='$guidance_id' GROUP BY group_guidance.grp_guidance_id";
                       $result = mysqli_query($conn, $sql);
                       if($result = mysqli_query($conn,$sql)){
                            $row2 = mysqli_fetch_assoc($result);

                            $appointment_no = $row2['appointment_id'];

                        }

          ?>

      <div class="row">
          <div class="col-md-12">
                          <a class="float-right" href="Guidance_GroupGuidance_Reports.php"><i class="fas fa-arrow-left"> Back</i></a>
                                  
                <div class="float-left"><h4>Group Guidance Seminar Evaluation Reports</h4></div><br><br>         
        <div style="background-color: #C12C32; padding: 5px 10px;"> </div>
          <div class="tile">
                      <div class="container">
                         <div class="row">
              <div class="float-left" style="font-size: 16px;">
              <p><b>TOPIC:</b> <?php echo $row2['topic']; ?></p>              
              <p><b>Appointment Date:</b> <?php echo $row2['appointment_date']; ?></p>
              <p><b>Appointment Time:</b> <?php echo $row2['appointment_time']; ?></p>
              <b>Date Completed:</b> <?php echo $row2['date_completed']; ?>
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
                <div class="float-left"><h4>List of Participant's Evaluation</h4></div>
                  </div>
                    
                     <div class="col-sm">
                         <div class="inline-block float ml-2 mt-1">
                          <button class="btn btn-warning" data-toggle="modal" data-target="#minakyut"><i class="fas fa-download show-modal" ></i>&nbsp; Summary of Reports</button>
                        </div>
                      </div>
                  </div>                                         
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-sm">
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered" id="counselling-table">
                    <thead>
                      <tr>
                      <th>ID</th>
                      <th>Full Name</th>
                      <th> Course</th>
                      <th>Year Level</th>
                      <th>Section</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
       <?php  
          
          $sql2 = mysqli_query($conn,"SELECT group_guidance.grp_guidance_id,group_guidance.appointment_id, seminar_evaluation.appointment_id, seminar_evaluation.seminar_eval_id, participants.participant_id, student.Student_id, student.first_name, student.middle_name, student.last_name, course.title, student.year_level, student.section FROM group_guidance join participants ON participants.grp_guidance_id = group_guidance.grp_guidance_id JOIN seminar_evaluation ON seminar_evaluation.appointment_id = group_guidance.appointment_id JOIN student ON student.Student_id = participants.Student_id JOIN course ON course.course_id = student.course_id WHERE participants.Student_id=seminar_evaluation.Student_id and group_guidance.grp_guidance_id = '$guidance_id'");
           $count=mysqli_num_rows($sql2);
             while($row1 = mysqli_fetch_array($sql2)) {
           
            ?>
            
                                  <tr>
                                  <td><?php echo $row1['Student_id']; ?></td>
                                  <td><?php echo $row1['first_name'].'  
                                  '. $row1['middle_name'].' '.$row1['last_name']; ?></td> 
                                  <td><?php echo $row1['title'] ?></td>
                                  <td><?php echo $row1['year_level'] ?></td>
                                  <td><?php echo $row1['section'] ?></td>
                                  <td>
                                  <center><a href="#details<?php echo $row1['seminar_eval_id']; ?>" class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" ><i class="fas fa-eye" style="color:white;"></i></a><?php include('SeminarEval_modal.php'); ?>
                                  </center>
                                </tr> <?php } ?>
                     
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div> 

<!-- chart modal -->
         <div class="modal fade " id="minakyut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="width:1050px; margin-left: -250px;">

          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> SEMINAR EVALUATION REPORT SUMMARY
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>

           <div class="modal-body c">
            <div class="tile">
        
               <div class="table-bd">
          <div id="att-table">
            
            <div id="title" style="margin-top:0px;"><div align="center"><img src="image/logo.png" style="width: 120px;height: 120px;" alt="USeP Logo">
            <div align="center" style="font-size:20px; font-family: Old English Text MT;" ><b>University of Southeastern Philippines</b></div>
            <i>University Guidance and Assessment Center</i><br><br>
             <div align="center" style="font-size:20px; font-family: Arial;"><p><b>Virtual Training for Student Peer Facilitators</div>
              
            <div align="center" style="font-size:18px; font-family: Times New Roman;"><p><b>Activity Evaluation Summary Results</div>

      <!--PIE CHART-->

          <div class="col-md-8">
          <div class="tile" style="border-width:5px; border-style: solid;">
           <div align="left" style="font-size:15px;">
            <h9>Sex</h9><br>
            <?php $count="SELECT count(seminar_eval_id) as count from seminar_evaluation where seminar_evaluation.appointment_id = '$appointment_no'";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b>
            <h9>responses</h9>
               <div style="width:500px;">  
                <h3 align="center"></h3> 
              <div id="piechartsex" ></div> 
            </div>
            </div>
            </div>
            </div>
          
      <!-- CAMPUS  --> 

        <div class="col-md-8">
          <div class="tile" style="border-width:5px; border-style: solid;">
           <div align="left" style="font-size:15px;">
            <h9>Campus</h9><br>
            <?php $count="SELECT count(seminar_eval_id) as count from seminar_evaluation where seminar_evaluation.appointment_id = '$appointment_no'";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b>
            <h9>responses</h9>
           <div id="piechartcamp" ></div> 
            </div>
            </div>
          </div>

        <!-- OBJECTIVES OF THE ACTIVITY -->
                           
        <div class="col-md-8">
          <div class="tile" style="border-width:5px; border-style: solid;">
            <div align="left" style="font-size:15px;">
              <h9>How would you rate the Objectives or the activity?</h9><br>
            <?php $count="SELECT count(seminar_eval_id) as count from seminar_evaluation where seminar_evaluation.appointment_id = '$appointment_no'";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b>
            <h9>responses</h9>
             
          <div id="piechartobj" ></div> 
          </div>
        </div>
        </div>
 
        <!-- SPEAKERS OF THE ACTIVITY -->

        <div class="col-md-8">
          <div class="tile" style="border-width:5px; border-style: solid;">
           <div align="left" style="font-size:15px;">
            <h9>How would you rate the Speakers of the Activiity?</h9><br>
            <?php $count="SELECT count(seminar_eval_id) as count from seminar_evaluation where seminar_evaluation.appointment_id = '$appointment_no'";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b>
            <h9>responses</h9>
             <div id="piechartspeak" ></div> 
            </div>
          </div>
        </div>

        <!-- IMPORTANCE OF THE ACTIVITY -->

        <div class="col-md-8">
          <div class="tile" style="border-width:5px; border-style: solid;">
           
            <div align="left" style="font-size:15px;">
            <h9>How would you rate the Relevance/ Importance of the Activity?</h9><br>
            <?php $count="SELECT count(seminar_eval_id) as count from seminar_evaluation where seminar_evaluation.appointment_id = '$appointment_no'";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b>
            <h9>responses</h9>
            <div id="piechartrel" >
              
            </div> 
           </div>  
            </div>

            <a align="left" style="font-size:16px;">The following are the written answer, comments and suggestion of some students with the provided question from the evaluation form.<br><br></a>
          
        <!-- WHAT YOU LEARN -->
                  
                  <table class="table table-hover table-bordered">
                    <div align="left" style="font-size:20px;" style= "font-family: Times New Roman;" >
                      <b>What Have you learn in this activity?</b>
          <?php 
          $sql="SELECT seminar_evaluation.content_q13, course.title from seminar_evaluation join student USING(Student_id) join course USING (course_id) where seminar_evaluation.Student_id = student.Student_id and seminar_evaluation.appointment_id = '$appointment_no'";
          if($result = mysqli_query($conn, $sql)){
          while ($row = mysqli_fetch_assoc($result)) {
                                echo'<tr>
                                  <td>'. $row['content_q13'].'</td>
                                </tr>';}}
                            ?>
                 </div>
                </table>

           <!-- COMMENTS  -->   

               <div  align="left" style="font-size:20px;" style= "font-family: Times New Roman;" >
                <b> Other Comments/ Suggestions/ Recommendation</b>
               </div>
               <table class="table table-hover table-bordered">
                    <?php 
          $sql="SELECT seminar_evaluation.comments, course.title from seminar_evaluation join student USING(Student_id) join course USING (course_id) where seminar_evaluation.Student_id = student.Student_id and seminar_evaluation.appointment_id = '$appointment_no'";
          if($result = mysqli_query($conn, $sql)){
          while ($row = mysqli_fetch_assoc($result)) {
                                echo'<tr>
                                 
                                  <td>'. $row['comments'].'</td>
                                </tr>';}}
       ?>
                      
                  </table>
                  <br><br>

          <!-- FOOTER   -->      

                    <div  align="left" style="font-size:18px;" style= "font-family: Times New Roman;" > Prepared by:</div><br><br>
                     <div  align="left" style="font-size:20px;" style= "font-family: Times New Roman;" ><b> NERISSA D. RCUMBA </b></div>
                      <div  align="left" style="font-size:18px;" style= "font-family: Times New Roman;" > Guidance Office Clerk</div><br><br><br>


                      <div  align="left" style="font-size:18px;" style= "font-family: Times New Roman;" >Noted by:</div><br><br>
                     <div  align="left" style="font-size:20px;" style= "font-family: Times New Roman;" ><b>MARY ROSE E. ECHAVEZ, RGC </b></div>
                      <div  align="left" style="font-size:18px;" style= "font-family: Times New Roman;" > Guidance Counselor</div><br><br>
            </div>
          </div>
       </div>
       </div>
       </div>

      


            <div class="modal-footer">
              <button class="btn btn-warning btn-sm verify" id="print-tbl" onclick="print_specific_div_content()"><i class="fas fa-print"></i> Print</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

            </div>
          </div>
        </div>
<?php  

 $connect = mysqli_connect("localhost", "root", "", "guidance_db");  
 $query = "SELECT content_q11, count(*) as number FROM seminar_evaluation where seminar_evaluation.appointment_id = '$appointment_no' GROUP BY content_q11";  
 $result = mysqli_query($connect, $query);  

 $query1 = "SELECT campus, count(*) as number FROM seminar_evaluation where seminar_evaluation.appointment_id = '$appointment_no' GROUP BY campus";  
 $result1 = mysqli_query($connect, $query1);

 $query2 = "SELECT resource_q7, count(*) as number FROM seminar_evaluation where seminar_evaluation.appointment_id = '$appointment_no' GROUP BY resource_q7";  
 $result2 = mysqli_query($connect, $query2);

 $query3 = "SELECT content_q12, count(*) as number FROM seminar_evaluation where seminar_evaluation.appointment_id = '$appointment_no' GROUP BY content_q12";  
 $result3 = mysqli_query($connect, $query3);

 $query4 = "SELECT sex, count(*) as number FROM seminar_evaluation where seminar_evaluation.appointment_id = '$appointment_no' GROUP BY sex";  
 $result4 = mysqli_query($connect, $query4);

 ?> 
  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           google.charts.setOnLoadCallback(drawChart1); 
           google.charts.setOnLoadCallback(drawChart2);
           google.charts.setOnLoadCallback(drawChart3);
           google.charts.setOnLoadCallback(drawChart4);
           
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['content_q11', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["content_q11"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      //is3D:true,  
                      pieHole: 0  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechartobj'));  
                chart.draw(data, options);  
           }  


            function drawChart1()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['campus', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result1))  
                          {  
                               echo "['".$row["campus"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      //is3D:true,  
                      pieHole: 0  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechartcamp'));  
                chart.draw(data, options);  
           }  


           function drawChart2()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['resource_q7', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["resource_q7"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      //is3D:true,  
                      pieHole: 0  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechartspeak'));  
                chart.draw(data, options);  
           }  

           function drawChart3()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['content_q12', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["content_q12"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      //is3D:true,  
                      pieHole: 0  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechartrel'));  
                chart.draw(data, options);  
           }  


            function drawChart4()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['sex', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result4))  
                          {  
                               echo "['".$row["sex"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      //is3D:true,  
                      pieHole: 0 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechartsex'));  
                chart.draw(data, options);  
           }  

          
   $(document).on('click', '.show-modal', function(){
        var intake_id = $(this).attr("id");  
        console.log(intake_id);


  $('#minakyut').modal('show');

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
      <script>
        <!-- table selection -->
          $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});
      </script>
      
      <script type="text/javascript"></script>
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#counselling-table').DataTable();</script>
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

    <script type="text/javascript">
   $(document).ready(function(){
    $("input:radio").click(function(){
        return false;
    });
    $("input:checkbox").click(function(){
        return false;
    });
   });
</script>