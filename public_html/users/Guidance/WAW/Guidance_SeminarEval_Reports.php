   <?php include('../../conn.php');
   include('../../php/session_admin.php');
   $admin_id=$_SESSION['id'];?>

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

         <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Navbar-->
      <!-- Filter link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src= ></script>
  <!-- Data table plugin-->
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
  <!--generate pdf -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

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
              <li class="app-notification__footer"><a href="../../php/see_all_notif_admin.php?link=Guidance_SeminarEval_Reports.php">See all notifications.</a></li>
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

          <?php
                       $guidance_id = $_GET['id'];
                       

                       $sql="SELECT group_guidance.*, participants.*, guidance_appointments.* from group_guidance 
                              join participants on participants.grp_guidance_id=group_guidance.grp_guidance_id
                              join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id where group_guidance.grp_guidance_id='$guidance_id' GROUP BY group_guidance.grp_guidance_id";
                       $result = mysqli_query($conn, $sql);
                       if($result = mysqli_query($conn,$sql)){
                            $row2 = mysqli_fetch_assoc($result);

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

           while($row1 = mysqli_fetch_array($sql2)) { ?>
                                  <tr>
                                  <td><?php echo $row1['Student_id']; ?></td>
                                  <td><?php echo $row1['first_name'].'  
                                  '. $row1['middle_name'].' '.$row1['last_name']; ?></td> 
                                  <td><?php echo $row1['title'] ?></td>
                                  <td><?php echo $row1['year_level'] ?></td>
                                  <td><?php echo $row1['section'] ?></td>
                                  <td>
                                  <center><a href="#details<?php echo $row1['seminar_eval_id']; ?>" class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" ><i class="fas fa-eye" style="color:white;"></i></a><?php include('../../php/SeminarEval_modal.php'); ?>
                                  </center>
                                </tr> <?php }
                                

       ?>
                     
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div> 

 <!--View Forms Modal -->
  <div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">INTAKE FORM | <input type="text" name="student_id" id="student_id" style="border:transparent;width: 100px;"> - <input type="text" name="full_name" id="full_name" style="background-color: transparent;border: transparent;"> 
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">

        <div class="row">
        <div class="col-md-12">

                <!--Form Header-->
                <table border="2" width="100%">
                  <tr>
                    <td rowspan="5" width="1%" style="background-color: transparent;">
                      <div align="center">
                        <img src="image/logo.png" alt="USeP Logo" style="width:100px">
                      </div>
                    </td>
                    <td rowspan="5" width="40%">
                      <div align="center" style="font-family: arial; background-color: transparent;">
                        
                            Republic of the Philippines <br>
                            <label style="font-family: 'Olde English'; font-size: 23px; font-style: bold">University of Southeastern Philippines</label><br>
                            Iñigo St., Bo. Obrero, Davao City 8000 <br>
                            Telephone: (082) 227-8192 <br>
                            Website: www.usep.edu.ph <br>
                            Email: president@usep.edu.ph
                      </div>
                    </td>
                    <td width="13%" height="2px;" style="background-color: transparent;">
                       Form No.
                    </td>
                    <td width="15%" height="2px;">
                       FM-USeP-GCS-02
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Issue Status
                    </td>
                    <td width="15%" height="2px;">
                       04
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Revision No.
                    </td>
                    <td width="15%" height="2px;">
                       03
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Date effective
                    </td>
                    <td width="15%" height="2px;">
                       01 November 2020
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Approved by
                    </td>
                    <td width="15%" height="2px;">
                       President
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">
                      <div align="center"><h4>INTAKE FORM</h4></div>
                    </td>
                  </tr>
                </table>
                  <br>
                <div align="center"><h6>Welcome to the</h6></div>
                <div align="center"><h4>UNIVERSITY ASSESSMENT AND GUIDANCE CENTER (UAGC)</h4></div>
                <p align="justify">
                  We want to make your visit to the University Assessment and Guidance Center as comfortable and productive as we can. Your first
                  meeting with one of our counselors will be an “intake interview”. The purpose of the intake interview is to help you clarify you concerns
                  and, if needed, discuss to any additional services that might be helpful to you. <br><br> 
                  We are asking that you complete this form with information to help you and your intake counselor in planning a course of action.

                </p>

                <div align="center">
                  <input type="checkbox" name="Walk-in" id="Walk-in" value="Walk-in"><label for="Walk-in"> &emsp;Walk-in </label> &emsp;&emsp;&emsp;
                  <input type="checkbox" name="Call-in" id="Call-in" value="Call-in"><label for="Call-in"> &emsp;Call-in </label> &emsp;&emsp;&emsp;
                  <input type="checkbox" name="Referred" id="Referred" value="Referred"><label for="Referred"> &emsp;Referred</label>
                </div>
               

                <table border="2" width="100%">
                  <tr>
                    <th class="tableheader" colspan="4" style="color: white; background-color: black;">A. CLIENT/STUDENT INFORMATION</th>
                  </tr>
                  <tr>
                    <td>1. Title (e.g. Mr, Ms, Mrs)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                             <input type="text" name="title" id="title" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td>2. Surname <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                             <input type="text" name="last_name" id="last_name" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td>3. Given Name/s <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="first_name" id="first_name" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td>4. Middle Initial <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="middle_name" id="middle_name" disabled style="border:transparent;background-color: transparent;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">5. Course and Year<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="course_year" id="course_year" disabled style="border:transparent;background-color: transparent; width: 90%">
                    </td>
                    <td colspan="2">6. Contact Number<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="contactno" id="contactno" disabled style="border:transparent;background-color: transparent;">
                    </td>
                  </tr>
                 <tr>
                    <td colspan="2">7. Gender<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="gender" id="gender" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td>8. Age<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="age" id="age" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td>9. Birthdate<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="bdate" id="bdate" disabled style="border:transparent;background-color: transparent;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">10. Status<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="civil_status" id="civil_status" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td>11. Birthplace<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="bplace" id="bplace" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td>12. Birth Order<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="birth_order" id="birth_order" disabled style="border:transparent;background-color: transparent;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">13. Present Address (Apt/House Number., Street, City/Municipality, Province)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="address" id="address" disabled style="border:transparent;background-color: transparent;width: 90%;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">14. Provincial Address<br>
                            <input type="text" name="province" id="province" disabled style="border:transparent;background-color: transparent;"> 
                    </td>
                  </tr>
                  <tr>
                    <td>15. Religion<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="religion" id="religion" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td colspan="3">16. Email Address<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="email" id="email" disabled style="border:transparent;background-color: transparent;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">17. Name of Father<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_name" id="father_name" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td>18. Occupation<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_occupation" id="father_occupation" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td>19. Contact No.<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_contact" id="father_contact" disabled style="border:transparent;background-color: transparent;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">20. Name of Mother<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="mother_name" id="mother_name" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td>21. Occupation<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="mother_occupation" id="mother_occupation" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td>22. Contact No.<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="mother_contact" id="mother_contact" disabled style="border:transparent;background-color: transparent;">
                    </td>
                  </tr>
                   <tr>
                    <td colspan="4">23. Parent's Present Address (Apt/House Number., Street, City/Municipality, Province)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="parents_address" id="parents_address" disabled style="border:transparent;background-color: transparent;width: 90%;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">24. Scholarship currently availed<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="scholarship" id="scholarship" disabled style="border:transparent;background-color: transparent;">
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">25. Educational Background<br><br>
                      <table border="2" width="90%" align="center">
                        <tr>
                          <td></td>
                          <td>School</td>
                          <td>Years of Attendance</td>
                          <td>Year Graduated</td>
                        </tr>
                        <tr>
                          <td>Elementary</td>
                          <td><input type="text" name="elementary_school" id="elementary_school" disabled style="border:transparent;background-color: transparent;width: 100%;"></td>
                          <td><input type="text" name="elementary_years" id="elementary_years" disabled style="border:transparent;background-color: transparent;width: 100%"></td>
                          <td><input type="text" name="elementary_graduated" id="elementary_graduated" disabled style="border:transparent;background-color: transparent;width: 100%"></td>
                        </tr>
                        <tr>
                          <td>Secondary</td>
                          <td><input type="text" name="secondary_school" id="secondary_school" disabled style="border:transparent;background-color: transparent;width: 100%"></td>
                          <td><input type="text" name="secondary_years" id="secondary_years" disabled style="border:transparent;background-color: transparent;width: 100%"></td>
                          <td><input type="text" name="secondary_graduated" id="secondary_graduated" disabled style="border:transparent;background-color: transparent;width: 100%"></td>
                        </tr>
                        <tr>
                          <td>Tertiary</td>
                          <td><input type="text" name="tertiary_school" id="tertiary_school" disabled style="border:transparent;background-color: transparent;width: 100%"></td>
                          <td><input type="text" name="tertiary_years" id="tertiary_years" disabled style="border:transparent;background-color: transparent;width: 100%"></td>
                          <td><input type="text" name="tertiary_graduated" id="tertiary_graduated" disabled style="border:transparent;background-color: transparent;width: 100%"></td>
                        </tr>
                        <tr>
                          <td>Others</td>
                          <td><input type="text" name="others_school" id="others_school" disabled style="border:transparent;background-color: transparent;width: 100%"></td>
                          <td><input type="text" name="others_years" id="others_years" disabled style="border:transparent;background-color: transparent;width: 100%"></td>
                          <td><input type="text" name="others_graduated" id="others_graduated" disabled style="border:transparent;background-color: transparent;width: 100%"></td>
                        </tr>
                      </table><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">26. Health History<br>
                      <div style="margin-left: 10%">
                        &emsp;&emsp;&emsp;<li>Physical Health History (Illnesses, Diseases):<input class="intake" disabled type="text" id="history_physical" name="history_physical" style="border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: groove;background-color: transparent; width: 50%;"><br></li>
                         &emsp;&emsp;&emsp;<li>Psychiatric History:<input class="intake" disabled type="text" name="history_phychiatric" id="history_phychiatric" style="border-top-style: hidden; border-right-style: hidden; border-left-style: hidden; border-bottom-style: groove; width: 50%;background-color: transparent; border-width: 1px;"><br><br></li>
                      </div>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">27. Problems that you are experiencing:<br>
                      <textarea id="Q1" name="Q1" rows="3" cols="100" disabled style="border: transparent;background-color: transparent;margin-left: 2%;"></textarea><br>
                    </td>    
                  </tr>
                  <tr>
                    <td colspan="4">28. What is your goal in seeking help?<br>
                      <textarea id="Q2" name="Q2" rows="3" cols="100" disabled style="border: transparent;background-color: transparent;margin-left: 2%;"></textarea><br>
                  </tr>
                  <tr>
                    <td colspan="4">29. Is the use/abuse of drugs and/or alcohol related to this problem in any way?<br>
                       <textarea id="Q3" name="Q3" rows="3" cols="100" disabled style="border: transparent;background-color: transparent;margin-left: 2%;"></textarea><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">30. Is there any behavioral problem related?<br>
                       <textarea id="Q4" name="Q4" rows="3" cols="100" disabled style="border: transparent;background-color: transparent;margin-left: 2%;"></textarea><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">31. Have you experienced any significant loss/crisis/life change?<br>
                       <textarea id="Q5" name="Q5" rows="3" cols="100" disabled style="border: transparent;background-color: transparent;margin-left: 2%;"></textarea><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">32. Kindly check what you are currently experiencing?<br><br>
                      <center>
                     <div id=“container”>
                        <div style="float: left; padding-left: 5%;">
                          <input type="checkbox" id="anxiousness" name="anxiousness" value="anxiousness">
                          <label for="vehicle1"> Anxiousness</label><br>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="depression" name="depression" value="depression">
                          <label for="vehicle1"> Depression</label>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="anger" name="anger" value="anger">
                          <label for="vehicle1"> Anger</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="confusion" name="confusion" value="confusion">
                          <label for="vehicle1" > Confusion</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="fear" name="fear" value="fear">
                          <label for="vehicle1"> Fear</label>
                        </div>
                        <!-- ______________________________________________________ -->
                        <div style="float: left; padding-left: 5%;">
                          <input type="checkbox" id="loneliness" name="loneliness" value="loneliness">
                          <label for="vehicle1"> Loneliness</label><br>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="despair" name="despair" value="despair">
                          <label for="vehicle1"> Despair</label>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="thoughts_of_suicide" name="thoughts_of_suicide" value="thoughts_of_suicide">
                          <label for="vehicle1"> Thoughts of suicide</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="hurt" name="churt" value="hurt">
                          <label for="vehicle1"> Hurt</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="guilt_shame" name="guilt_shame" value="guilt_shame">
                          <label for="vehicle1"> Guilt/shame</label>
                        </div>
                         <!-- ______________________________________________________ -->
                        <div style="float: left; padding-left: 5%;">
                          <input type="checkbox" id="withdraw_form_others" name="withdraw_form_others" value="withdraw_form_others">
                          <label for="vehicle1"> Withdrawing from others</label><br>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="relational_stress" name="relational_stress" value="relational_stress">
                          <label for="vehicle1"> Relational stress</label>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="marital_distress" name="marital_distress" value="marital_distress">
                          <label for="vehicle1"> Martial distress</label>
                        </div>
                         <div style="float: left;padding-left: 10%;">
                          <input type="checkbox" id="parenting_struggles" name="parenting_struggles" value="parenting_struggles">
                          <label for="vehicle1"> Parenting struggles</label>
                        </div>
                      </div>
                    </center>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" style="border-top-style: hidden"><br><br>
                      33. Other Information you like to share:&nbsp;<input class="intake" type="text" name="Q7" id="Q7" disabled style="border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;background-color: transparent; border-bottom-style: groove; width: 60%;"><br><br>
                    </td>   
                  </tr>
                  <tr>
                    <th colspan="4" style="color: white; background-color: black;">B. DECLARATION</th>
                  </tr>
                  <tr>
                    <td colspan="4" align="justify">
                      <p>
                        The University Assessment and Guidance Center is committed to non-discrimination with respect to race, creed, religion,
                          age, disability, color, sex, marital status, sexual orientation or political opinions/affiliations. <br><br>
                         Further, we adhere to strict confidentiality. Any information that you provide are strictly confidential, except in life
                        threatening situations, cases of suspected child or elder abuse, or when release is otherwise required by law. In order
                        to provide the best services possible, your counselor may consult with other counselors or professionals. Information
                       about counseling will not appear on your academic records. <br><br>
                          In order to protect your right to confidentiality, your written authorization is required if you want us to provide information
                        about your counseling to another person or agency. If you have any questions, you may ask your intake counselor.
                        </p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">34. Client/Student's Signature<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="e_signature" id="e_signature" disabled style="border:transparent;background-color: transparent;">
                    </td>
                    <td colspan="2">35. Date Accomplished (MM/DD/YY)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="date_filed" id="date_filed" disabled style="border:transparent;background-color: transparent;">
                    </td>
                  </tr>
                </table>
                <br>
            </div><br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="print" class="btn btn-success" onclick="window.print();">Print</button>
          </div>        
        </div>
      </div>
    </div>
  </div>

  <!--END OF MODAL-->

        

        <!--</div>-->
      </main>
      <!-- Essential javascripts for application to work-->

      <script type="text/javascript">
        
         if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }

          $('#counselling-table').DataTable();


  
     //view forms modal table#1
     $(document).on('click', '.view-button', function(){
        var intake_id = $(this).attr("id");  
        console.log(intake_id);

        
      $.ajax({  
         url: '../../php/fetch_intakeform.php',
        method: 'POST',
        dataType: 'JSON',
        data:{
        intake_id: intake_id,
        },
        success: function(data){

      //intake table
          $('#intake_id').val(data[0]); 
          $('#student_id').val(data[1]);
          $('#intake_type').val(data[2]);
          $('#date_filed').val(data[3]);
          $('#father_name').val(data[4]);
          $('#father_occupation').val(data[5]);
          $('#father_contact').val(data[6]);
          $('#mother_name').val(data[7]);
          $('#mother_occupation').val(data[8]);
          $('#mother_contact').val(data[9]);
          $('#parents_address').val(data[10]);
          $('#elementary_school').val(data[11]);
          $('#elementary_years').val(data[12]);
          $('#elementary_graduated').val(data[13]);
          $('#secondary_school').val(data[14]);
          $('#secondary_years').val(data[15]);
          $('#secondary_graduated').val(data[16]);
          $('#tertiary_school').val(data[17]);
          $('#tertiary_years').val(data[18]);  
          $('#tertiary_graduated').val(data[19]);
          $('#others_school').val(data[20]);
          $('#others_years').val(data[21]);
          $('#others_graduated').val(data[22]);
          $('#history_physical').val(data[23]);
          $('#history_phychiatric').val(data[24]);
          $('#Q1').val(data[25]);
          $('#Q2').val(data[26]);
          $('#Q3').val(data[27]);
          $('#Q4').val(data[28]);  
          $('#Q5').val(data[29]);
          $('#Q7').val(data[30]);
          $('#birth_order').val(data[31]);

      //student table

          $('#course').val(data[32]);
          $('#course_year').val(data[33]);
          $('#title').val(data[34]);
          $('#last_name').val(data[35]);
          $('#first_name').val(data[36]);
          $('#middle_name').val(data[37]);
          $('#full_name').val(data[38]);
          $('#contactno').val(data[39]);
          $('#gender').val(data[40]);
          $('#bdate').val(data[41]);
          $('#civil_status').val(data[42]);
          $('#bplace').val(data[43]);
          $('#status').val(data[44]);
          $('#address').val(data[45]);
          $('#province').val(data[46]);
          $('#religion').val(data[47]);
          $('#email').val(data[48]);
          $('#scholarship').val(data[49]);
          $('#e_signature').val(data[50]);


    // //checkbox

          /*$('#anxiousness').val(data[51]);
          $('#loneliness').val(data[52]);
          $('#guilt_shame').val(data[53]);
          $('#marital_distress').val(data[54]);
          $('#depression').val(data[55]);  
          $('#despair').val(data[56]); 
          $('#withdraw_form_others').val(data[57]);
          $('#parenting_struggles').val(data[58]);
          $('#anger').val(data[59]);
          $('#thoughts_of_suicide').val(data[60]);
          $('#confusion').val(data[61]);
          $('#fear').val(data[62]);  
          $('#hurt').val(data[63]); 
          $('#relational_stress').val(data[64]);*/

          
          for (var i = 51; i <= 64; i++) {
            if (!data[i]) {
              
          }else{
             //alert(data[i]);
            var inutid= data[i];
              var tryy = '#'+inutid;
              
              document.querySelector(tryy).checked = true;
          }
          }

          if(data[2]=='Walk-in'){
            document.querySelector('#Walk-in').checked=true;
          } if(data[2]=='Call-in'){
            document.querySelector('#Call-in').checked=true;
          } if(data[2]=='Referred'){
            document.querySelector('#Referred').checked=true;
          }


        }, error: function(errorThrown){
                console.log("error!");
            }

    })
    

  $('#view-modal').modal('show');
});

</script>


<script type="text/javascript">
  function print_specific_div_content(){
    var win = window.open('','','left=0,top=0,width=900,height=700,toolbar=0,scrollbars=0,status =0');

    var content = "<html>";
    content += "<body onload=\"window.print(); window.close();\">";
    content += document.getElementById("printForm").innerHTML ;
    content += "</body>";
    content += "</html>";
    win.document.write(content);
    win.document.close();
            }
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

    