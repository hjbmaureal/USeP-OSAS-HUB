<?php
  include '../../conn.php';
  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'OSAS'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where (user_id='$id' or office_id = 1) and message_status='Delivered'");
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
      <link rel="icon" href="../../images/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Admin Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../../css/main2.css">
    <link rel="stylesheet" type="text/css" href="../../css/upstyle2.css">
    <link rel="stylesheet" type="text/css" href="../../css/upstyle_shy.css">
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">DASHBOARD</span>
        </li>
        <li>
          <a class="app-menu__item" href="index.php">
            <i class="app-menu__icon fa fa-home"></i>
            <span class="app-menu__label">Home</span>
          </a>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-list-alt"></i>
            <span class="app-menu__label">Student Discipline</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Complaints.php">Complaints</a></li>
              <li><a class="treeview-item" href="Response.php">Response</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-sitemap"></i>
            <span class="app-menu__label">Student Organizations</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="NewOrgApplicants.php">New Organization Applicants</a>
            </li>
            <li>
              <a class="treeview-item" href="RecognizedOrg.php">Funded Organizations</a>
            </li>
            <li>
              <a class="treeview-item" href="UnrecognizedOrg.php">Non-Funded Organizations</a>
            </li>
          </ul>
        </li> 
        <li class="treeview">
          <a class="app-menu__item active" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-briefcase"></i>
            <span class="app-menu__label">Student Labor</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Labor-Requisition.php">Requisition</a></li>
              <li><a class="treeview-item active" href="Labor-Application.php">Application</a></li>
              <li><a class="treeview-item" href="DTR.php">DTR</a></li>
              <li><a class="treeview-item" href="Labor-Accomplishment.php">Accomplishment Reports</a></li>
              <li><a class="treeview-item" href="Labor-Hired-Students.php">History</a></li>
            </ul>
        </li>
        <li>
          <a class="app-menu__item" href="ReqGoodMoral.php">
            <i class="app-menu__icon fa fa-file"></i>
            <span class="app-menu__label">Request for Good Moral</span>
          </a>
        </li>

          
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="RStudentOrg.php">Student Organization</a></li>
              <li><a class="treeview-item" href="RStudentDiscipline.php">Student Discipline</a></li>
              <li><a class="treeview-item" href="RStudentlists.php">Student Labor</a></li>
              <li><a class="treeview-item" href="RStudentRequest.php">Good Moral</a></li>
            </ul>
          </li>
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">OTHERS</span>
        </li>
        <li>
          <a class="app-menu__item" href="Announcement.php">
            <i class="app-menu__icon fa fa-bullhorn"></i>
            <span class="app-menu__label">Announcements</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="Job-Announcements.php">
            <i class="app-menu__icon fa fa-bullhorn"></i>
            <span class="app-menu__label">Job Hirings</span>
          </a>
        </li>
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
            if($result = mysqli_query($conn, "SELECT * FROM list_of_semester WHERE status = 'Active'")){
              while($row = mysqli_fetch_array($result)){
                $currSemesterYear = $row['semester'] .' '. $row['year'];
                echo '
                  <li>
                    <div class="appnavlevel" style="color:black;">
                      <span class="semesterYear">'.$row['semester'].'</span>
                    </div>
                  </li>
                  <li>
                    <div class="appnavlevel" style="color:black;">
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
                  $count_sql="SELECT * from notif where (user_id=$id or office_id = 1)  order by time desc";
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
    <div class="red"></div>

                        <br>


                        <!--<div class="page-error tile">-->

                         <div class="row">
                          <div class="col-md-12">
                            <div class="tile">
                              <div class="tile-body">
                                <div>
                                  <div>
                                    <div class="float-left"><h4>Student Labor Applicants</h4></div>
                                  </div>
                                  <br><br>
                                  <div class="row">


                                  </div>
                                </div>
                                <br><br>
                                <div class="table-bd">
                                  <div class="table-responsive">
                                    <br>
                                    <table class="table table-hover table-bordered text-center table-sm" id="applicants-table">
                                      <thead>
                                        <tr>
                                          <th rowspan="2">Applicant<br>ID</th>
                                          <th rowspan="2" class="collapse">Requisition_id</th>
                                          <th rowspan="2" style="width:150px">Applicant Name</th>
                                          <th rowspan="2" style="width:150px">Semester/Year</th>
                                          <th rowspan="2" style="width:150px">Unit<br>Assigned</th>
                                          <th rowspan="2" style="width:150px">Status</th>
                                          <th colspan="7">Attached Files</th>
                                          <th rowspan="2" style="width:100px">Action</th>
                                        </tr>
                                        <tr>
                                          <th><h6>Requisition<br>Form<h6></th>
                                          <th><h6>Application<br>Form<h6></th>
                                          <th>COR</th>
                                          <th>Grades</th>
                                          <th>Letter of<br>Intent<br>(OSAS)</th>
                                          <th>Letter of<br> Intent<br>(Unit Head)</th>
                                          <th>Recommendation<br>Letter</th>
                                        </tr>
                                      </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td></td>
                                        <td class="collapse"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      </tr>
                                    </tfoot>
                           </table>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>  

        <div class="modal fade " id="view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Requisition</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                           <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th style="border: 1px solid #404040;" rowspan="5"><img src="../../images/logo.png" width="100px;"></th> 
                                      <th style="border: 1px solid #404040;" rowspan="5" class="text-center">
                                        <span class="fs-11 d-block">Republic of the Philippines</span>
                                        <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span>
                                        <span class="fs-11 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                        <span class="fs-11 d-block">Telephone: (082) 227-8192</span>
                                        <span class="fs-11 d-block">Website: www.usep.edu.ph</span>
                                        <span class="fs-11 d-block">Email: president@usep.edu.ph</span>
                                      </th>  
                                      <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="">Form No. </th>
                                      <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">FM-USeP-HSC-01
                                      </th>
                                    </tr>
                                    <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Issue Status  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;"colspan="2">02</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Revision No.  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Date Effective  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01 March 2018
                                     </th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Approved by </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">President
                                     </th>
                                   </tr>
                                   <tr>
                                    <th  style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">STUDENT LABOR REQUISITION FORM
                                    </th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                          </div>
                        </div>  



                        <div class="row p-5">
                          <div class="col-md-12">
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                </thead>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;" colspan="2">Request Date: <u><span class="fetched-text-data" id="_date_submitted"></span></u></th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;" width="50%">College/Unit: <br><u><span class="fetched-text-data" id="_college_unit"></span></u></th>
                                  <th style="border: 2px solid #6b6b6b;" width="50%">Requested by: Head of Unit/College<br>
                                    <u><span class="fetched-text-data" id="_college_unit_head"></span></u>
                                  </th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">Department/Division: <br><u><span class="fetched-text-data" id="_dept_div"></span></u></th>
                                  <th style="border: 2px solid #6b6b6b;" rowspan="2">Requested by: Head of Department/Division<br>
                                    <u><span class="fetched-text-data" id="_dept_div_head"></span></u>
                                  </th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">No. of SL: <input class="form-control fc2 w-50 pl-2 fetched-input-data" type="text" id="_no_of_sl" disabled=""></th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">
                                    JOB DETAILS:
                                    <p>Tenure: Temporary</p>

                                    <p>Length of Service (months): <input class="form-control fc2 w-25 pl-2 fetched-input-data" type="text" id="_length_of_service" disabled=""></p>
                                  </th>
                                  <th style="border: 2px solid #6b6b6b;">
                                    Qualification required/desired:
                                    <p>1.) <input class="form-control fc2 w-75 pl-2 fetched-input-data" type="text" id="_qualification1" disabled=""><br>
                                     2.) <input class="form-control fc2 w-75 pl-2 fetched-input-data" type="text" id="_qualification2" disabled=""><br>
                                     3.) <input class="form-control fc2 w-75 pl-2 fetched-input-data" type="text" id="_qualification3" disabled=""><br>
                                   </p>

                                   <p>Special skill (if required:)
                                    <input class="form-control fc2 w-100 pl-2 fetched-input-data" type="text" id="_skill1" disabled="">
                                    <input class="form-control fc2 w-100 pl-2 fetched-input-data" type="text" id="_skill2" disabled="">
                                  </p>

                                </th>
                              </tr>
                              <tr>
                                <th style="border: 2px solid #6b6b6b;">
                                  Reason for requirement: (Tick the appropriate)
                                  <br><input type="checkbox" class="mr-1 fetched-chkbox-data" id="_additional_workload_reason" disabled="">Additional work Load (Quantify it) 
                                  <br><input type="checkbox" class="mr-1 fetched-chkbox-data" id="_reduction_workload_reason" disabled="">For reduction in work Load (Quantify it)
                                  <br><input type="checkbox" class="mr-1 fetched-chkbox-data"  id="_skill_saturation_reason" disabled="">Existing Members reached saturation level in 
                                  <br class="ml-5">Knowledge and Skill
                                </th>
                                <th style="border: 2px solid #6b6b6b;">
                                 Resignation/Termination/Death/Re-location (for whom)
                                 <br>
                                 Any other reason, please specify
                                 <br>
                                 <u class="fc2 w-75" ><span class="fetched-text-data" id="_other_reason"></span></u>
                               </th>
                             </tr>
                             <tr>
                              <th style="border: 2px solid #6b6b6b;">Assessed by: </th>
                              <th style="border: 2px solid #6b6b6b;" class="text-center"><u style="margin-top: -10px">
                                <img id="assessor_signature" class="e-sign" height="150" width="150" style="margin-bottom:-70px; margin-top:-50px; position:relative; margin-right:60px; margin-left: 60px" src="../../images/transparentbg.png" /><br>
                                <span class="fetched-text-data text-uppercase" id="_assessed_by"></span></u></th>
                            </tr>
                            <tr>
                              <th style="border: 2px solid #6b6b6b;">Approved / Not approved:</th>
                              <th style="border: 2px solid #6b6b6b;"><u><span class="fetched-text-data" id="_status"></span></u></th>
                            </tr>
                          </table>
                        </div>


                                </div>
                              </div> 
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
        </div>



        <div class="modal fade" id="application-form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Student Labor Form and Contract</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="applicant-form">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th style="border: 1px solid #404040;" rowspan="5"><img src="../../images/logo.png" width="100px;"></th> 
                                      <th style="border: 1px solid #404040;" rowspan="5" class="text-center">
                                        <span class="fs-11 d-block">Republic of the Philippines</span>
                                        <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span>
                                        <span class="fs-11 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                        <span class="fs-11 d-block">Telephone: (082) 227-8192</span>
                                        <span class="fs-11 d-block">Website: www.usep.edu.ph</span>
                                        <span class="fs-11 d-block">Email: president@usep.edu.ph</span>
                                      </th>  
                                      <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="">Form No. </th>
                                      <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">FM-USeP-HSC-01
                                      </th>
                                    </tr>
                                    <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Issue Status  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;"colspan="2">02</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Revision No.  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Date Effective  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01 March 2018
                                     </th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Approved by </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">President
                                     </th>
                                   </tr>
                                   <tr>
                                    <th  style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">STUDENT LABOR APPLICATION FORM AND CONTRACT
                                    </th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                            </div>
                          </div>  

                          <div class="row p-2">
                            <div class="col-sm-10">
                              <div class="row"><div style="height:50px"></div></div>
                              <div class="row">
                                <div class="col-sm-3">
                                  <div class="form-group fg">
                                    <label class="control-label cl">Type of Student Labor:</label>
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group fg">
                                    <div class="form-check ">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="paid-labor" name="labor_type" readonly>Paid Labor (SL)
                                      </label>
                                    </div>
                                    <div class="form-check ">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="labor_type" id="unpaid-labor" readonly>Unpaid Labor (SL)
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-1">
                                  <div class="form-group fg">
                                    <label class="control-label cl">Class:</label>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                  <div class="form-group fg">
                                    <div class="form-check ">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="class_type" id="day_class" readonly>Day
                                      </label>
                                    </div>
                                    <div class="form-check ">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="class_type" id="night_class" readonly>Evening
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-1">
                                  <div class="form-group fg">
                                    <label class="control-label cl">Status:</label>
                                  </div>
                                </div>
                                <div class="col-sm-1">
                                  <div class="form-group fg">
                                    <div class="form-check ">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="status_type" id="new_status" readonly>New
                                      </label>
                                    </div>
                                    <div class="form-check ">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="status_type" id="renew_status" readonly>Renewal
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lx-2">
                              <div class="app-form-dp float-right">
                                <img src="" style="max-width: 100%;" id="student-pic">
                              </div>
                            </div>
                          </div>

                          <div class="row mt-3 p-2">
                            <div class="col-sm">
                              <div class="form-group fg">
                                <label class="control-label cl">Name:</label>
                                <input class="form-control pl-2 fc2 blck bg-white applicant-name-upper font-weight-bold" type="text"  disabled>
                                <label class="control-label cl">Course & Year:</label>
                                <input class="form-control fc2 blck bg-white font-weight-bold" type="text" id="course-year" disabled>
                              </div>
                              <div class="form-group fg">
                                <label class="control-label cl">Address:</label>
                                <input class="form-control pl-2 fc2 w1000 bg-white font-weight-bold" type="text" id="address" disabled>
                              </div>
                              <div class="form-group fg">
                                <label class="control-label cl">Phone/Mobile No.:</label>
                                <input class="form-control pl-2 fc2 w200 bg-white font-weight-bold" type="text" id="phone_num" disabled>
                                <label class="control-label cl">E-mail Address:</label>
                                <input class="form-control pl-2 fc2 blck bg-white font-weight-bold" type="text" id="email_add" disabled>
                              </div>
                              <div class="form-group fg">
                                <label class="control-label cl">Birth Date:</label>
                                <input class="form-control pl-2 fc2 blck bg-white font-weight-bold" type="text" id="bday" disabled>
                                <label class="control-label cl">Birth Place:</label>
                                <input class="form-control pl-2 fc2 blck bg-white font-weight-bold" type="text" id="birthplace" disabled>
                              </div>
                              <div class="form-group fg">
                                <label class="control-label cl">Semester & School Year Covered:</label>
                                <input class="form-control pl-2 fc2 w200 bg-white font-weight-bold" type="text" id="sem_year" disabled>
                                <label class="control-label cl">Time Available:</label>
                                <input class="form-control pl-2 fc2 w200 bg-white font-weight-bold" type="text" id="time_available" disabled>
                              </div>
                              <div class="form-group fg">
                                <label class="control-label cl">Attached:</label>   
                              </div>
                              <div class="form-group fg  mlff">
                                <i class="fas fa-check mr-1"> </i>
                                <label class="control-label cl"> Certificate of Grades</label>   
                              </div>
                              <div class="form-group fg  mlff">
                                <i class="fas fa-check mr-1"> </i><label class="control-label cl"> Certificate of Registration (COR) </label>   
                              </div>
                            </div>
                          </div>

                          <div class="row mt-5">
                              <div class="col-8">
                                <div class="form-group fg">
                                  <label class="control-label cl">Proposed College/ Unit of Assignment:</label>
                                  <input class="form-control pl-2 fc2 w200 bg-white font-weight-bold" type="text" id="proposed_college" disabled>
                                </div>
                              </div>
                              <div class="col-4">
                               <div class="form-group fg text-center">
                                <img id="student_signature" class="e-sign" height="200" width="200" style="margin-bottom:-90px; margin-top:-50px; position:relative" src="../../images/transparentbg.png" />
                                <input class="form-control pl-2 fc2 w200  bg-white applicant-name-upper text-uppercase font-weight-bold text-center" type="text"  disabled>
                                <br>
                                <label class="control-label cl">Print Name and Signature</label>
                              </div>
                              </div>
                          </div>

                          <br>
                          <hr>
                          <br>


                          <div class="rec1-container p-4">
                              <h6 class="text-center mb-4">RECOMMENDATION</h6>
                              <p class="text-justify w-100 p">This is to recommend Mr./Ms.

                                <input class="form-control fc2 p-2 bg-white applicant-name-recommendation font-weight-bold text-center" type="text"   disabled>

                                who is a bona-fide student of 

                                <input class="form-control fc2 p-2 bg-white font-weight-bold text-center" type="text" id="dept_college" disabled> 

                                and of good moral character.<br>
                                <span class="ml-5" style="font-size: 12px;">(Department/College)</span>
                              </p>

                               <div class="row">
                                    <div class="col-8">
                                      
                                    </div>
                                    <div class="col-4">
                                    <div class="form-group fg text mb-2 text-center align-middle">
                                    <img id="head_signature" class="e-sign" height="200" width="200" style="margin-bottom:-90px; margin-top:-50px; position:relative" src="../../images/transparentbg.png" />
                                    <input class="form-control pl-2 fc2 w200  bg-white applicant-name text-uppercase font-weight-bold text-center" id="unit-head-name" type="text" disabled><br>
                                    <label class="control-label mr65 w-100">Faculty/Staff</label>
                                  </div>
                                    </div>
                                  </div>
                          </div>

                          <br>
                          <hr>
                          <br>

                          <div class="rec1-container p-4">
                            <h6 class="text-center mb-4">ACCEPTANCE</h6>
                            <p class="text-justify w-100 p">This is to accept the applicant to perform the following duties and responsibilities. He/She shall render service for four(4) hours a day for 5 days with an hourly rate of Php 25.00.</p>
                              <br>
                            <div class="row">
                              <div class="col-sm-7">
                                <h6 class="font-weight-bold"> DUTIES AND RESPONSIBILITIES<br></h6>
                                <input class="form-control fc2 p-2   font-weight-bold" type="text" id="duty1" disabled>
                                <input class="form-control fc2 p-2  font-weight-bold" type="text" id="duty2" disabled>
                                <input class="form-control fc2 p-2  font-weight-bold" type="text" id="duty3" disabled> 
                                <input class="form-control fc2 p-2  font-weight-bold" type="text" id="duty4" disabled>
                                </div>
                              <div class="col-sm-4">
                                <h6 class="font-weight-bold"> SCHEDULE OF SERVICE<br></h6>
                                <input class="form-control fc2 w-100 pl-2  font-weight-bold" type="text" id="schedule1" disabled>
                                <input class="form-control fc2 w-100 pl-2  font-weight-bold" type="text" id="schedule1" disabled>
                                </div>
                                <br>
                                <p class="text-justify w-100 p font-weight-bold">&emsp;&emsp;&emsp;&emsp;NOTE: Renewal for another term depends on working attitude and performance.</p>
                              <br>
                            </div>
                            <div class="row">
                                  <div class="col-4">
                                  <div class="form-group fg text mb-2 ">Recommended By:
                                  <br><br>
                                  <input class="form-control fc2 mr-1 p-2 w-100 text-center" type="text" id="application_dean_unit_assigned" disabled><br>
                                  <label class="control-label mr65 w-100">Dean/Director (Unit Assigned)</label>
                                  </div>
                                  <div class="col-4">
                                </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-4">
                                  <div class="form-group fg text mb-2 ">Recommending Approval
                                  </div>
                                  </div>
                                  <div class="col-sm-4">
                                  <div class="form-group fg text mb-2 ">
                                  </div>
                                </div>
                                  <div class="col-sm-1">
                                  <div class="form-group fg text mb-2 ">Approved
                                  </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-4" style="margin-top: -20px;">
                                <div class="form-group fg text mb-2 text-center align-middle">

                                <img id="coordinator_signature" class="e-sign" height="150" width="150" style="margin-bottom:-90px; margin-top:-90px; position: relative;" src="../../images/transparentbg.png" />
                                  <input class="form-control fc2 mr-1 p-2 w-100 text-center" id="assessed_name" type="text" disabled><br>
                                  <label class="control-label mr65 w-100">Coordinator, OSAS </label>
                                </div>
                              </div>
                              <div class="col-4">
                                <div class="form-group fg text mb-2 text-center align-middle">
                                  <input class="form-control fc2 mr-1 p-2 w-100 text-center" type="text" id="application_budget_officer" disabled><br>
                                  <label class="control-label mr65 w-100">Budget Officer </label>
                                </div>
                              </div>
                              <div class="col-4">
                                <div class="form-group fg text mb-2 text-center align-middle">
                                  <input class="form-control fc2 mr-1 p-2 w-100 text-center" type="text" id="application_chancellor" disabled><br>
                                  <label class="control-label mr65 w-100">Chancellor</label>
                                  </div>
                              </div>
                            </div>
                          </div>

                          <br>

                        <hr>

                          <p class=" w-100 text-center align-middle font-weight-bold">For the Office of Student Affairs and Services only</p>
                          <br>

                          <div class="row">
                            <div class="col-sm-5">
                              <p >Office Assignment: 
                              <input class="form-control fc2 mr-1 p-2 w-100 font-weight-bold" type="text" id="office-assigned" disabled><br>
                            </div>
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm">
                              <p >Starting Date: 
                              <input class="form-control fc2 mr-1 p-2 w-100 " type="text" id="starting-date" disabled><br>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm">
                              <p >Expiration Date: 
                              <input class="form-control fc2 mr-1 p-2 w-100 " type="text" id="expiration-date" disabled><br>
                            </div>
                          </div>
                          <br><br>
                          <div class="row">
                            <div class="col-8">
                            </div>
                            <div class="col-sm">
                              <div class="form-group fg text mb-2 text-center align-middle">
                                <input class="form-control fc2 mr-1 p-2 w-100 " type="text" id="application_employee" disabled><br>
                                <label class="control-label mr65 w-100">Employee Signature Over Printed Name</label>
                              </div>
                            </div>
                          </div>
                          
                      

                          <br>
                          <hr><br>


                      <div class="">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th style="border: 1px solid #404040;" rowspan="5"><img src="../../images/logo.png" width="100px;"></th> 
                                      <th style="border: 1px solid #404040;" rowspan="5" class="text-center">
                                        <span class="fs-11 d-block">Republic of the Philippines</span>
                                        <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span>
                                        <span class="fs-11 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                        <span class="fs-11 d-block">Telephone: (082) 227-8192</span>
                                        <span class="fs-11 d-block">Website: www.usep.edu.ph</span>
                                        <span class="fs-11 d-block">Email: president@usep.edu.ph</span>
                                      </th>  
                                      <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="">Form No. </th>
                                      <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">FM-USeP-HSC-01
                                      </th>
                                    </tr>
                                    <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Issue Status  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;"colspan="2">02</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Revision No.  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Date Effective  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01 March 2018
                                     </th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Approved by </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">President
                                     </th>
                                   </tr>
                                   <tr>
                                    <th  style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">STUDENT LABOR APPLICATION FORM AND CONTRACT
                                    </th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                            </div>
                          </div>  

                          <div class="row">
                                    <div class="col">
                                      <div class="mlr s15" style="line-height: 2; font-family: Arial;">
                                        <p class="text-justify w-100 p-print"><center>Qualification of SL Applicant</center>
                                        <span>• Must be currently enrolled with a load of eighteen (18) units or below. </span><br>
                                        <span> • Must not be a first (1 st) year student, a new transferee, or in his/her last semester as a graduating student.</span><br>
                                        <span>• No failed or incomplete (INC) grade from the previous semester.</span><br>
                                       </p>

                                        <p class="text-justify w-100 p-print"><center>Requirements</center>
                                          <span>• Obtain an application form from the OSAS. </span><br>
                                          <span>• Fill-in the application form and attach a prescribe ID picture.</span><br>
                                          <span>Attach a Photocopied certificates of grades (COG) and registration (COR). </span><br>
                                        </p>

                                        <p class="text-justify w-100 p-print"><center>Responsibilities of Accepted Student Laborer</center>
                                          <span>• He/she shall commence work after receiving the approved student labor application form from the OSAS.   Supervised by a regular employee, he/she shall accomplish the specified duties and responsibilities in the application form.</span><br>
                                          <span>• Shall render service based on the specified schedule in the application form.</span><br>
                                          <span>• Must at all times, observe professional ethics in the work place. </span><br>
                                          <span>• Shall regularly submit the signed daily time record (DTR) every first week of the month to the OSAS</span><br>
                                        </p>
                                      </div>
                                    </div>
                          </div>

                          <br><br>

                          <div class="row">
                                <div class="col-sm-5 text-center">
                                  <p class="font-weight-bold">Conforme: <br><br>

                                    <img id="applicant-signature-if-hired" class="e-sign" height="200" width="200" style="margin-bottom: -90px;margin-top:-50px;position:relative;margin-right: 0px;margin-left: 0px;" src="../../images/transparentbg.png" />
                                    <input class="form-control fc2 mr-1 p-2 w-100 font-weight-bold text-center text-uppercase" type="text" id="applicant-name-if-hired" disabled><br>
                                    <label class="control-label mr65 w-100">Signature Over Printed Name</label>
                                  </p>
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm">
                                  <p class="font-weight-bold" >Date: <br><br>
                                    <input class="form-control fc2 mr-1 p-2 w-100 " type="text" id="applicant_date_signed" disabled><br>
                                  </p>
                                </div>
                          </div>

                          <br><br><br>

                          <div class="float-left p-3 mt60"  style="border: 1px solid black;width: 300px; margin-bottom: 120px;" >
                              <p class="lh-1 s12 text-left ">Original: Finance</p>
                              <p class="lh-1 s12 text-left ">Duplicate: Office of Student Affairs and Services</p>
                              <p class="lh-1 s12 text-left ">Triplicate: Dean's Copy or Unit Assigned</p>
                              <p class="lh-1 s12 text-left ">Quadruplicate: Student Copy</p>
                          </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
            </div>
        </div>


  </main>

        <div class="modal fade" id="acceptance-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <form id="acceptance-form">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Acceptance Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-sm">
                            <div class="rec-container p-4">
                              <h6 class="text-center mb-4">ACCEPTANCE</h6>
                              <p class="text-justify w-100 p">This is to accept the applicant to perform the following duties and responsibilities. He/She shall render service for four(4) hours a day for 5 days with an hourly rate of Php 25.00.</p>
                                <br>
                              <div class="row">
                                <div class="col-sm-7">
                                  <h6 class="font-weight-bold"> DUTIES AND RESPONSIBILITIES<br></h6>
                                  <input class="form-control fc2 p-2" type="hidden" name="acceptance_applicant" id="acceptance_applicant" placeholder="Duty 1" required>
                                  <input class="form-control fc2 p-2" type="text" name="acceptance_duty1" placeholder="Duty 1" required>
                                  <input class="form-control fc2 p-2" type="text" placeholder="Duty 2" name="acceptance_duty2">
                                  <input class="form-control fc2 p-2" type="text" placeholder="Duty 3" name="acceptance_duty3"> 
                                  <input class="form-control fc2 p-2" type="text" placeholder="Duty 4" name="acceptance_duty4">
                                  </div>
                                <div class="col-sm-4">
                                  <h6 class="font-weight-bold"> SCHEDULE OF SERVICE<br></h6>
                                  <input class="form-control fc2 w-100 pl-2" type="text" placeholder="Schedule 1" name="acceptance_sched1" required>
                                  <input class="form-control fc2 w-100 pl-2" type="text" placeholder="Schedule 2" name="acceptance_sched2">
                                  </div>
                                  </div>
                                <br>
                               <p class="text-justify w-100 p font-weight-bold">&emsp;&emsp;&emsp;&emsp;NOTE: Renewal for another term depends on working attitude and performance.</p>
                                <br>

                               <div class="row">
                                    <div class="col-4">
                                    <div class="form-group fg text mb-2 ">Recommended By:
                                    <br><br>
                                    <input class="form-control fc2 w-100 pl-2 text-center text-uppercase" type="text" name="acceptance_dean" id="acceptance_dean" ><br>
                                    <label class="control-label mr65 w-100">Dean/Director (Unit Assigned)</label>
                                    </div>
                                    <div class="col-4">
                                  </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-sm-4">
                                    <div class="form-group fg text mb-2">Recommending Approval
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group fg text mb-2 ">
                                    </div>
                                  </div>
                                    <div class="col-sm-1">
                                    <div class="form-group fg text mb-2 ">Approved
                                    </div>
                                  </div>
                                </div>
                                      <br>
                                    <div class="row">
                                    <div class="col-4">
                                    <div class="form-group fg text mb-2 text-center align-middle" style="margin-top: -20px;">
                                    <img id="acceptance_osas_sign" class="e-sign" height="150" width="150" style="margin-bottom:-90px; margin-top:-90px; position: relative;" src="data:image/jpeg;base64,<?php echo $_SESSION['user_signature'] ?>" />
                                    <input class="form-control fc2 mr-1 p-2 w-100 text-center text-uppercase" id="acceptance_osas" value="<?php echo $_SESSION['fullname'] ?>"  type="text"><br>
                                    <label class="control-label mr65 w-100">Coordinator, OSAS </label>
                                    </div>
                                  </div>
                                    <div class="col-4">
                                    <div class="form-group fg text mb-2 text-center align-middle">
                                    <input class="form-control fc2 mr-1 p-2 w-100 text-center text-uppercase" type="text" name="acceptance_budget_officer" ><br>
                                    <label class="control-label mr65 w-100">Budget Officer </label>
                                  </div>
                                </div>
                                    <div class="col-4">
                                    <div class="form-group fg text mb-2 text-center align-middle">
                                    <input class="form-control fc2 mr-1 p-2 w-100 text-center text-uppercase" type="text" name="acceptance_chancellor" ><br>
                                    <label class="control-label mr65 w-100">Chancellor</label>
                                    </div>
                                  </div>
                                  </div>
                                  <br>
                                  <hr>
                                  <p class=" w-100 text-center align-middle font-weight-bold">For the Office of Student Affairs and Services only</p>
                                <br>

                                  <div class="row">
                                    <div class="col-sm-6">
                                    <p >Office Assignment: 
                                    <input class="form-control fc2 mr-1 p-2 w-100" type="text" name="acceptance_office" id="acceptance_office"><br>
                                    </div>
                                   <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-4">
                                    <p >Starting Date: 
                                    <input class="form-control fc2 mr-1 p-2 w-100" type="date" name="acceptance_startdate" id="acceptance_startdate" required><br>
                                    </div>
                                  </div>
                                    <div class="row">
                                    <div class="col-sm-6">
                                    </div>
                                   <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-4">
                                    <p >Expiration Date: 
                                    <input class="form-control fc2 mr-1 p-2 w-100" type="date"  name="acceptance_expiredate" id="acceptance_expiredate" required><br>
                                    </div>
                                  </div>


                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Send</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      </div>
                    </form>
                      
                  </div>
                </div>
        </div>





    <!-- Essential javascripts for application to work-->

   
        <script src="../../js/jquery-3.3.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/main.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>
        <!-- Page specific javascripts-->
        <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js"></script>
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
        <!-- Data table plugin-->
        <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
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
    <script type="text/javascript">
  $(document).ready( function(){
        var head_signature_src = $('#acceptance_osas_sign').prop('src');
        var user_fullname = $('#acceptance_osas').val();
        var current_applicant_id = 0;
        var current_applicant = '';
        var current_req_id = 0;
        var required_month_sl = 0;
            
          var tbl = $('#applicants-table').DataTable({
                serverside: false,
                ajax : {
                  url : "../../php/M-Admin/getApplicants.php",
                  data : "",
                  dataSrc : "",
                  error: function(response){
                      alert(response);
                  }
                },
                scrollY:        "300px",
                scrollX:        true,
                scrollCollapse: true,
                columns : [
                  { data : "applicant_id"},
                  { data : "id", className:"collapse"},
                  { data : "student_name"},
                  { data : "semester_year"},
                  { data : "office_name"},
                  { data : "status"},
                  // { 
                  //   data : null,
                  //   render : function ( data, type, row){
                  //     var stat = row['status'];
                  //     var str = '';
                  //     if (stat.search('Pending') > -1 ){
                  //       str = '<span class="text-info text-sm">'+stat+'</span>';
                  //     } else if (stat == 'Not Approved'){
                  //       str = '<span class="text-danger text-sm">'+stat+'</span>';
                  //     } else {
                  //       str = '<span class="text-success text-sm">'+stat+'</span>';
                  //     }
                  //     return str;
                  //   }
                  // },
                  { 
                    data : null,
                    render : function ( data, type, row){
                      return'<button class="btn btn-info btn-sm view-requsition-form mr-2" id="'+row['id']+'" data-toggle="modal" data-target="#view-modal" ><i class="fas fa-eye"></i></button><a class="btn btn-danger btn-sm" href="Print-Requisition.php?reqid='+row['id']+'" target="_blank"><i class="fas fa-print"></i></a>';
                    }
                  },
                  {
                    data : null,
                    render : function ( data, type, row){
                      return'<button class="btn btn-info btn-sm mr-2 view-form" data-toggle="modal" data-target="#application-form-modal" ><i class="fas fa-eye"></i></button><a class="btn btn-danger btn-sm" href="Print-StudentFormContract.php?appid='+row['applicant_id']+'" target="_blank"><i class="fas fa-print"></i></a>';
                    }
                  },
                  {
                    data:null,
                    render : function ( data, type, row){
                    return '<a href="../../'+row['cor_location']+'" target="_blank" class="btn btn-warning btn-sm" ><i class="fas fa-download"></i></a>';
                    }
                  },
                  {
                    data : null,
                    className: "text-center",
                    render : function ( data, type, row){
                      return '<a href="../../'+row['grades_location']+'" target="_blank" class="btn btn-warning btn-sm" ><i class="fas fa-download"></i></a>';
                    }                    
                  },
                  {
                    data : null,
                    className: "text-center",
                    render : function ( data, type, row){
                      return '<a href="../../'+row['osas_head_letter_location']+'" target="_blank" class="btn btn-warning btn-sm" ><i class="fas fa-download"></i></a>';
                    }
                  },
                  {
                    data : null,
                    className: "text-center",
                    render : function ( data, type, row){
                      return '<a href="../../'+row['unit_head_letter_location']+'" target="_blank" class="btn btn-warning btn-sm" ><i class="fas fa-download"></i></a>';
                    }
                  },
                  {
                    data : null,
                    className: "text-center",
                    render : function ( data, type, row){
                      var recommendation_letter = row['recommendation_location'];
                      var str = "";
                      if (recommendation_letter != null){
                        str = '<a href="../../'+recommendation_letter+'" target="_blank" class="btn btn-warning btn-sm" ><i class="fas fa-download"></i></a>';}
                      else {
                        str = '<a href="#" class="btn btn-secondary btn-sm" disabled><i class="fas fa-download"></i></a>';
                      }

                      return str;
                    }
                  },
                  {
                    data : null,
                    className: "text-center",
                    render : function ( data, type, row){
                      var recommendation_letter = row['recommendation_location'];
                      var acceptance_status = row['acceptance_contract_status'];
                      var str = "";
                      if (recommendation_letter != null && acceptance_status != 1){
                        str = '<button class="btn btn-success btn-sm view-acceptance-modal" data-toggle="modal" data-target="#acceptance-modal" id="'+row['id']+'" ><i class="fas fa-clipboard-check"></i></button>';
                      } else if (recommendation_letter != null && acceptance_status == 1) {
                        str = '<span class="text-success font-weight-bold">Approved</span>';
                      }
                      else {
                        str = '<button class="btn btn-secondary btn-sm" disabled><i class="fas fa-clipboard-check"></i></button>';
                      }

                      return str;
                    }
                  }

                ],
                columnDefs: [
                    { orderable: false, targets: 0 }
                ],
                order: [[1, 'desc']
                ],
                dom: 'Bfrtip',
                buttons: [
                        {
                            text:'<i class="fas fa-print"></i> PRINT',
                            className: 'btn btn-danger',
                            extend: 'print',
                            exportOptions: {
                                columns: [0,2,3,4,5]
                            },
                            title: '',
                            customize: function(win) {
                              $(win.document.body).css('font-size', '10pt').prepend('<div class="row "> <div class="col-md-12"> <div class="table-responsive"> <table class="table table-bordered"> <thead> <tr> <th style="border: 1px solid #000 !important ;" class="text-center align-middle" rowspan="5"><img src="https://www.usep.edu.ph/op/wp-content/uploads/sites/55/2019/01/usep-logo-small.png" width="100px;"></th> <th style="border: 1px solid #000 !important ;padding: 0px;" rowspan="5" class="text-center"> <span class="fs-11 s12 d-block">Republic of the Philippines</span> <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span> <span class="fs-17 s12 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span> <span class="fs-11 s12 d-block">Telephone: (082) 227-8192</span> <span class="fs-11 s12 d-block">Website: www.usep.edu.ph</span> <span class="fs-11 s12 d-block">Email: president@usep.edu.ph</span> </th> <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="">Form No. </th> <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="">FM-USeP-HSC-01 </th> </tr> <tr> <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Issue Status </th> <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; "colspan="2">02</th> </tr> <tr> <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Revision No. </th> <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="2">01</th> </tr> <tr> <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Date Effective </th> <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="2">01 March 2018 </th> </tr> <tr> <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Approved by </th> <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="2">President </th> </tr> <tr> <th style="border-color: #000 !important; font-size: 20px; font-weight: bold; border: 1px solid #000 !important;" colspan="4" class="text-center p-1 text-b">LIST OF STUDENT LABOR APPLICANTS APPLICANTS</th> </tr> </thead> </table> </div> </div>');
                              $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');  
                            }
                        }
                ],
                initComplete: function () {
                  this.api().columns().every( function () {
                      var columnidx = this.index();
                      if (columnidx==0 || columnidx==3 || columnidx == 4 || columnidx == 5){
                          var column = this;
                          var select = $('<select class="form-control"><option value=""></option></select>')
                              .appendTo( $(column.footer()).empty() )
                              .on( 'change', function () {
                                  var val = $.fn.dataTable.util.escapeRegex(
                                      $(this).val()
                                  );
           
                                  column
                                      .search( val ? '^'+val+'$' : '', true, false )
                                      .draw();

                                  selectedoptions = '';
                                    $('select').each(function(){
                                      var tempval = $(this).val();
                                      if (tempval != '' || tempval == null ){
                                        if (selectedoptions.length>0){
                                          selectedoptions += '-';
                                        }
                                        else {
                                          selectedoptions+= ' for ';
                                        }
                                        selectedoptions += tempval;
                                      }
                                    });
                              } );
           
                          column.data().unique().sort().each( function ( d, j ) {
                              select.append( '<option value="'+d+'">'+d+'</option>' )
                          } );
                      }
                  } );

                }
          });

          $(document).on("click",".view-acceptance-modal",function(){
              $('#acceptance_osas_sign').prop('src',head_signature_src);
              $('#acceptance_osas').val(user_fullname);
              currentreq_id = $(this).attr("id");
              var currentRow = $(this).closest("tr");
              var office =  currentRow.find("td:eq(4)").text();
              current_applicant_id =  currentRow.find("td:eq(0)").text();
              current_applicant =  currentRow.find("td:eq(2)").text();
              $('#acceptance_office').val(office);
              $('#acceptance_applicant').val(current_applicant_id);

              getRequisitionInfo('getDate');

          });

          $(document).on("submit","#acceptance-form",function(e){
            e.preventDefault();
            swal({
              title: "Are you sure?",
              text: "By sending this form you are effectively approving this application. A contract will be sent to the student hereafter!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Yes, I am sure!',
              closeOnConfirm: false,
              //closeOnCancel: false
            },
            function(){
              $.ajax({
                url:"../../php/M-Admin/sendAcceptanceDetails.php",
                method:"POST",
                data:$("#acceptance-form").serialize(),
                success:function(response)
                 {
                  console.log(response);
                    if (response.length == 0){                      
                        swal("Approved!", "You have approved "+current_applicant+"'s' application form. A contract has been sent to the student.", "success");
                        tbl.ajax.reload();
                         $("#acceptance-modal").modal("toggle");
                    } else {
                      swal("Server error!", "An error occurred. Please redo your action or reload the page!", "warning");
                         $("#accenptance-modal").modal("toggle");
                    }                                          
                 },
                error: function(response){
                    alert("fail" + JSON.stringify(response));
                 }
                });
            });
          });


          $(document).on("click",".view-form",function(){
            var currentRow = $(this).closest("tr");
            current_applicant_id =  currentRow.find("td:eq(0)").text();
            $('#applicant-form')[0].reset();
            $('.e-sign').attr('src','../../images/transparentbg.png');
            $.ajax({
                    url:"../../php/O-StudentDefault/getApplicationFormDetails.php",
                    method:"POST",
                    data:{id:current_applicant_id},
                    success:function(response)
                      {
                        try 
                        {
                          var obj = JSON.parse(response);
                          $('#student-pic').attr('src',obj[0].pic);
                          if (obj[0].labor_type=='Paid Labor (SL)'){
                            $('#paid-labor').prop("checked",true);
                            $('#unpaid-labor').prop("disabled",true);
                          } else {
                            $('#paid-labor').prop("disabled",true);
                            $('#unpaid-labor').prop("checked",true);
                          }

                          if (obj[0].labor_class=='Day'){
                            $('#day_class').prop("checked",true);
                            $('#night_class').prop("disabled",true);
                          } else {
                            $('#day_class').prop("disabled",true);
                            $('#night_class').prop("checked",true);
                          }

                          if (obj[0].labor_status=='New'){
                            $('#new_status').prop("checked",true);
                            $('#renew_status').prop("disabled",true);
                          } else {
                            $('#new_status').prop("disabled",true);
                            $('#renew_status').prop("checked",true);
                          }

                          $('.applicant-name-upper').val(obj[0].applicant_name);
                          $('#course-year').val(obj[0].course+' - '+obj[0].year_level);
                          $('#address').val(obj[0].full_address);
                          $('#phone_num').val(obj[0].phone_number);
                          $('#email_add').val(obj[0].email_add);
                          $('#bday').val(obj[0].applicant_bday);
                          $('#birthplace').val(obj[0].birth_place);
                          $('#sem_year').val(obj[0].semester_year);
                          $('#time_available').val(obj[0].time_available);
                          $('#proposed_college').val(obj[0].office_name);
                          $('#student_signature').attr('src',obj[0].e_signature);

                          if (obj[0].recommendation_status == 1){
                            $('.applicant-name-recommendation').val(obj[0].applicant_name);
                            $('#dept_college').val(obj[0].course+' - '+obj[0].college);
                            $('#head_signature').attr('src',obj[0].head_signature);
                            $('#unit-head-name').val(obj[0].staff_requested_by);
                          }

                          if (obj[0].acceptance_contract_status == 1){
                            $('#duty1').val(obj[0].duty1);
                            $('#duty2').val(obj[0].duty2);
                            $('#duty3').val(obj[0].duty3);
                            $('#duty4').val(obj[0].duty4);
                            $('#schedule1').val(obj[0].schedule1);
                            $('#schedule2').val(obj[0].schedule2);
                            $('#coordinator_signature').attr('src',obj[0].assessor_signature);
                            $('#assessed_name').val(obj[0].assessed_name);
                            $('#office-assigned').val(obj[0].office_name);
                            $('#starting-date').val(obj[0].starting_date);
                            $('#expiration-date').val(obj[0].expiration_date);
                            $('#application_dean_unit_assigned').val(obj[0].dean_unit_assigned);
                            $('#application_budget_officer').val(obj[0].budget_officer);
                            $('#application_chancellor').val(obj[0].chancellor);
                          }

                          if (obj[0].student_sign_status==1){
                            $('#applicant-name-if-hired').val(obj[0].applicant_name);

                            $('#applicant_date_signed').val(obj[0].date_signed);

                            $('#applicant-signature-if-hired').attr('src',obj[0].e_signature);
                          } 
                        
                        } catch (e) {
                          alert("Data failed to load.");
                        }
                      },
                    error: function(response){
                      alert("An error occurred :" + JSON.stringify(response));
                    }
            });
          });

          $(document).on("click",".view-requsition-form",function(){
              //resetInfo();
              currentreq_id = $(this).attr("id");
              getRequisitionInfo('view');
          });

          function getRequisitionInfo(action){
           // $('#assessor_signature').attr('src','../../image/transparentbg.png');
              $.ajax({
                    url:"../../php/M-Admin/getRequisitionFormInfo.php",
                    method:"POST",
                    data:{req_id:currentreq_id},
                    success:function(response)
                      {
                        try {
                          var obj = JSON.parse(response);
                          if (action=='view'){
                            $('#_date_submitted').text(obj[0].date_submitted);
                            if (obj[0].office_type == 'Office') {
                                $('#_college_unit').text(obj[0].office_name);
                                $('#_college_unit_head').text(obj[0].fullname);
                            } else {
                                $('#_dept_div').text(obj[0].office_name);
                                $('#_dept_div_head').text(obj[0].fullname);
                            }
                            $('#_no_of_sl').val(obj[0].no_of_sl);
                            $('#_length_of_service').val(obj[0].length_of_service);
                            $('#_qualification1').val(obj[0].qualification1);
                            $('#_qualification2').val(obj[0].qualification2);
                            $('#_qualification3').val(obj[0].qualification3);
                            $('#_skill1').val(obj[0].skill1);
                            $('#_skill2').val(obj[0].skill2);
                            if (obj[0].additional_workload_reason == 1){
                              $('#_additional_workload_reason').prop("checked","true");
                            }
                            if (obj[0].reduction_in_workload_reason == 1){
                              $('#_reduction_workload_reason').prop("checked","true");
                            }
                            if (obj[0].reached_saturation_reason   == 1){
                              $('#_skill_saturation_reason').prop("checked","true");
                            }
                            if (obj[0].other_reason.length > 0) {
                              $('#_other_reason').text(obj[0].other_reason);
                            }
                            if (obj[0].assessed_by != null) {
                              $('#assessor_signature').attr('src','data:image/jpeg;base64,'+obj[0].assessor_signature);
                              $('#_assessed_by').text(obj[0].assessed_name);
                            }
                            if (obj[0].date_approved_disapproved != null) {
                              $('#_status').text(obj[0].requisition_status);
                            }
                          } else {
                              let required_months = obj[0].length_of_service;
                              required_month_sl = required_months;
                              var currentDate = moment(); 
                              var futureMonth = getFutureMonth(currentDate,required_months);
                              

                              $('#acceptance_startdate').val(currentDate.format('YYYY-MM-DD'));
                              $('#acceptance_expiredate').val(futureMonth.format('YYYY-MM-DD'));
                             // console.log(futureMonth.format('YYYY-MM-DD'));
                            }
                        } catch (e) {
                          swal("Server Error!", "An error occurred. Please reload page and redo your actions.", "warning");

                          console.log("Data failed to load. Error :"+e);
                        }
                          
                    },
                    error: function(response){
                      swal("Server Error!", "An error occurred. Please reload page and redo your actions.", "warning");
                      console.log("An error occurred :" + JSON.stringify(response));
                    }
              });

          }



              function getFutureMonth(curdate,monthlen){
                var futureMonth = moment(curdate).add(monthlen, 'M');
                var futureMonthEnd = moment(futureMonth).endOf('month');
                if(curdate.date() != futureMonth.date() && futureMonth.isSame(futureMonthEnd.format('YYYY-MM-DD'))) {
                  futureMonth = futureMonth.add(1, 'd');
                }
                return futureMonth;
              }

          $(document).on('change','#acceptance_startdate',function(){
            var curval = new Date($('#acceptance_startdate').val());
            var date_picked = moment(curval);
            var futureMonth = getFutureMonth(date_picked,required_month_sl);
            $('#acceptance_expiredate').val(futureMonth.format('YYYY-MM-DD'));
          });

  });
      

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
  </body>
</html>