<?php
  include '../../conn.php';
  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['usertype']) != 'Faculty'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where user_id='$id' and message_status='Delivered'");
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
      <title>USeP Faculty Head Hub</title>
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
      <body class="app sidebar-mini rtl">                      <!-- password -->
                      <div class="modal fade" id="pass-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Authentication ...</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body"><div class="form-group">
                              <label class="control-label">Password:</label>
                              <input class="form-control d-inline w-75"  type="hidden" id="uname" value="username" >
                              <input class="form-control d-inline w-75"  type="password" id="pword" placeholder="">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="check-pword">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
      <!-- Navbar-->

        
      <header class="app-header">
    
   
      </header>

      <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="../../images/logo.png" width="20%" alt="img">
          <div>
                 <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">FACULTY HEAD HUB</p><p style="text-align: center;" class="app-sidebar__user-name font-sec" ></p>
          </div>
      </div>

      <hr>

      <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
          <?php 
            if ($_SESSION['access_level']==1){
              echo '                
                <li class="p-2 sidebar-label"><span class="app-menu__label">STUDENT\'S AFFAIRS AND SERVICES</span></li>
                <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Labor Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a class="treeview-item " href="Labor-Requisition.php">Requisition Form</a></li>
                    <li><a class="treeview-item" href="Labor-Applicants.php">Student Applicants</a></li>
                    <li><a class="treeview-item active" href="Labor-DTR.php">Student DTR</a></li>
                    <li><a class="treeview-item" href="Faculty-Accomplishment.php">Accomplishment Reports</a></li>
                  </ul>
                </li>
              ';
            }
          ?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Faculty.php">Home</a></li>  
              <li><a class="treeview-item" href="Guidance_Faculty_Referrals.php">Referral Forms</a></li>
              <li><a class="treeview-item" href="Guidance_Faculty_Acknowledgement.php">Acknowledgement Slip</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="facultyHome.php">Home</a></li>
              <li><a class="treeview-item" href="facultyClinic_Privacy_Policy.php">Consultation</a></li>
              <li><a class="treeview-item" href="facultyConsultationHistory.php">Consultation History</a></li>
              <li><a class="treeview-item" href="facultyPrescription.php">Prescription</a></li>
              <li><a class="treeview-item" href="facultyRequestMedCert.php">Request for Medical Certificate</a></li>
              <li><a class="treeview-item" href="facultyRequestMedRecsCert.php">Request for Medical Records Certification</a></li>
            </ul>
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
              <a href="#">See all notifications.</a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
            <i class="text-warning fas fa-user-circle fa-2x"></i>
          </a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li>
                <a class="dropdown-item" href="user-profilesstaff.php">
                  <i class="fa fa-user fa-lg"></i> Profile
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="../../index.php">
                  <i class="fa fa-sign-out fa-lg"></i> Logout
                </a>
              </li>
            </ul>
          </li>
      
      </ul>
    </div>
    <div class="red"></div>
      <br>


<?php 
  $appid = $_GET['id'];
  $data = array();
  $query=mysqli_query($conn,"SELECT s.Student_id as student_id, IF((LENGTH(TRIM(s.`middle_name`)) > 0), CONCAT(s.`first_name`, ' ', SUBSTR(s.`middle_name`, 1, 1), '. ', s.`last_name`), CONCAT(s.`first_name`, ' ', s.`last_name`)) as applicant_name, c.title as course, a.year_level, IF ((st.office_id is not null or st.office_id = 0),o.office_name,d.dept_name) as office_name, SUBSTR(a.semester_year,14) as sy, SUBSTR(a.semester_year,1,12) as sem, IF((LENGTH(TRIM(st.`middle_name`)) > 0), CONCAT(st.`first_name`, ' ', SUBSTR(st.`middle_name`, 1, 1), '. ', st.`last_name`), CONCAT(st.`first_name`, ' ', st.`last_name`)) as staff_name, (SELECT salary FROM salary ORDER BY id desc limit 1) as salary_rate, a.status as sl_status FROM sl_applicant as a JOIN student as s on s.Student_id = a.student_id JOIN course as c on c.course_id = s.course_id JOIN requisition_form as r on r.id = a.assigned_to JOIN staff as st on st.staff_id = r.requested_by LEFT JOIN office as o on o.office_name = st.office_id LEFT JOIN department as d on d.dept_id = st.dept_id WHERE a.applicant_id = $appid;");
    while($row=mysqli_fetch_array($query))
      {
        $data = $row;
      }
?>

<span class="collapse" id="applicant-id"><?php echo $appid ?></span>
<span class="collapse" id="salary-rate"><?php echo $data[8] ?></span>
<span class="collapse" id="sl-status"><?php echo $data[9] ?></span>


                            <div class="row">
                              <div class="col">
                             <!--  <a class="btn btn-danger btn-md float-right mb-2 ml-1 text-white" data-toggle="modal" data-target="#pass-modal" ><i class="fas fa-user-edit"></i></a> -->
                                 <a class="btn btn-dark  btn-md float-left mb-2 ml-1 text-white" href="Labor-DTR.php" ><i class="fas fa-arrow-left"></i> Back
                                </a>
                             <!--   <a class="btn btn-danger btn-md float-right mb-2 ml-1 text-white" id="print-dtr" href="Print-DTR.php?assigned=<?php //echo $data[4] ?>&officer=<?php //echo $data[7] ?>&applicant=<?php //echo $appid ?>&sem_year=<?php //echo $data[6].' '.$data[5] ?>&student_name=<?php //echo $data[1] ?>&student_id=<?php //echo $data[0] ?>&month=" target="_blank"><i class="fas fa-download"></i> Print</a> -->
                             </div>
                             <br>
                            </div>

                             <div class="clearfix"></div>

                             <div class="col-md-12">
                              <div class="tile">
                                <h3 class="tile-title" style="text-align: center;">Daily Time Record</h3>
                                <div class="container">
                                 <div class="row">
                                  <div class="col-md-8">
                                    <h6 class="font-weight-bold">Name:
                                      <span class="font-weight-lighter ml-2" id="sl-name"><?php echo $data[1] ?>
                                      </span>
                                    </h6>
                                    <h6 class="font-weight-bold">Student ID:
                                      <span class="font-weight-lighter ml-2"><?php echo $data[0] ?>
                                      </span>
                                    </h6>
                                  </div>

                                  <div class="col-sm">
                                   <div class="inline-block">
                                    Month of
                                    <select class="bootstrap-select" id="filter-month">
                                      <option class="select-item" value="January" selected="selected">January</option>
                                      <option class="select-item" value="February">February</option>
                                      <option class="select-item" value="March">March</option>
                                      <option class="select-item" value="April">April</option>
                                      <option class="select-item" value="May">May</option>
                                      <option class="select-item" value="June">June</option>
                                      <option class="select-item" value="July">July</option>
                                      <option class="select-item" value="August">August</option>
                                      <option class="select-item" value="September">September</option>
                                      <option class="select-item" value="October">October</option>
                                      <option class="select-item" value="November">November</option>
                                      <option class="select-item" value="December">December</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-8">
                                  <h6 class="font-weight-bold">Course: <span class="font-weight-lighter" id="sl-course"><?php echo $data[2] ?></span></h6>
                                </div>
                                <div class="col-sm">
                                  <h6 class="font-weight-bold">School Year:  <span class="font-weight-lighter ml-2" id="semester-year-year"><?php echo $data[5] ?></span></h6>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-8">
                                  <h6 class="font-weight-bold"> Year: <span class="font-weight-lighter ml-2" id="sl-yearlevel"><?php echo $data[3] ?></span></h6>
                                </div>
                                <div class="col-sm">
                                  <h6 class="font-weight-bold">Semester: <span class="font-weight-lighter ml-2" id="semester-year"><?php echo $data[6] ?></span></h6>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-8">
                                  <h6 class="font-weight-bold">Assigned Office:<span class="font-weight-lighter ml-2" id="sl-assigned-office"><?php echo $data[4] ?></span></h6>
                                </div>
                                <div class="col-sm">
                                  <h6 class="font-weight-bold">Immediate Supervisor: <span class="font-weight-lighter ml-2" id="sl-supervisor"><?php echo $data[7] ?></span></h6>
                                </div>
                              </div>
                            </div>
                            <br>

<!-- 
                            <div class="row">
                              <div class="col-sm-4">
                                <div class="m-6" style="height: 50px; width: 320px; border: 1px solid #b5b5b5; border-radius: 5px;">
                                <h6 class="font-weight-bold"> <br>
                                  &emsp; Total Number of hours: <span class="font-weight-bold ml-2" id="total-hours"></span></h6>
                                </div>
                              </div> 
                              <div class="col-sm-4">
                                <div class="m-6" style="height: 50px; width: 320px; border: 1px solid #b5b5b5; border-radius: 5px;">
                                <h6 class="font-weight-bold"> <br>
                                  &emsp; Salary:
                                  &emsp; Php <span class="font-weight-bold ml-2" id="total-salary"></span></h6>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="m-6" style="height: 50px; width: 320px; border: 1px solid #b5b5b5; border-radius: 5px;">
                                <h6 class="font-weight-bold"> <br>
                                  &emsp; Salary Status: <span class="font-weight-bold ml-2" id="salary-status"></span><a class="text-success float-right" style="margin-right:10px; margin-top:-3px" id="mark-paid"><i class="h4 fas fa-money-check"></i></a>
                                </h6>
                                </div>
                              </div>
                            </div>  -->

                            <div class="row mt-3">
                                <div class="col-sm-1 text-center h6 mt-2">
                                  <span>Filter</span>
                                </div>
                                <div class="input-group input-daterange col-sm-6">

                                  <input type="text" id="min-date" class="form-control date-range-filter mx-2" data-date-format="yyyy-mm-dd" placeholder="From:">


                                  <input type="text" id="max-date" class="form-control date-range-filter mx-2" data-date-format="yyyy-mm-dd" placeholder="To:">

                                </div>
                                <div class="col-sm-5 d-flex justify-content-end">
                                  <div class="m-6" style="height: 50px; width: 320px; border: 1px solid #b5b5b5; border-radius: 5px;">
                                  <h6 class="font-weight-bold"> <br>
                                    &emsp; Total Number of hours: <span class="font-weight-bold ml-2" id="total-hours"></span></h6>
                                  </div>
                                </div> 
                            </div>
                            <br>
                            <div class="table-bd">
                              
                              <div class="table-responsive">
                                <br>
                                <table class="table table-hover table-bordered table-sm" id="student-dtr-tbl">
                                  <thead class="text-center">
                                    <tr>
                                      <th class="collapse"></th>
                                      <th style="width:15%">Date</th>
                                      <th style="width:10%">Time Period</th>
                                      <th style="width:10%">Time In</th>
                                      <th style="width:10%">Time Out</th>
                                      <th style="width:20%">Task Performed</th>
                                      <th style="width:5%">Time Worked(hh:mm)</th>
                                      <th style="width:8%">Salary Status</th>
                                      <th style="width:10%">Action</th>
                                      <th class="collapse"></th>
                                      <th class="collapse"></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th class="collapse"></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th class="collapse"></th>
                                      <th class="collapse"></th>
                                    </tr>
                                      
                                  </tfoot>
                                </table>
                              </div>  
                             </div><br>                         
                          </div>
                        </div>
                      </div> 






                    <!-- log in log out  -->
                  <form id="edit-dtr-frm">
                    <div class="modal fade" id="log-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Time in/out</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col">  <div class="form-group">
                                          <label class="control-label d-inline">DATE: <span id="date-selected"></span></label>
                                          
                                        </div>
                                      </div>
                                    </div>
                                    <div class="rec-container p-3">
                                      <div class="row">
                                        <div class="col">
                                          <label class="control-label d-inline mr-2 text-uppercase font-weight-bold" id="period-selected"></label>
                                        </div> 
                                      </div>
                                      <div class="row">
                                        <div class="col">
                                         <div class="form-group">
                                          <label class="control-label">Time In</label>
                                          <input class="form-control" type="time" id="edit-time-in" required>

                                        </div>
                                      </div> 
                                      <div class="col">
                                       <div class="form-group">
                                        <label class="control-label">Time Out</label>
                                        <input class="form-control" type="time" id="edit-time-out" required>

                                      </div>
                                    </div> 
                                  </div>
                                </div>
                          </div>
                          <div class="row ml-1 mr-1 mb-5">
                            <div class="col"> <button type="submit" class="btn btn-success w-100">SUBMIT </button></div>
                            <div class="col"> <button type="reset" class="btn btn-danger w-100" data-dismiss="modal">CANCEL </button></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
  </main>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="salary-view">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">STUDENT LABOR SALARY FOR THE MONTH OF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body tile" style="margin:0px">
        <div class="row">
          <div class="col">
            <a class="btn btn-danger btn-md float-right mb-2 ml-1 text-white" id="print-salary" href="#" target="_blank"><i class="fas fa-download"></i> Print</a>
          </div>
          <br>
        </div>
        <div class="row">
                  <div class="col">
                    <div class="form-group">
                        <label class="control-label">Name of Student</label>
                        <input class="form-control" type="text" readonly id="sl-name-view">
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                         <label class="control-label">School Year</label>
                        <input class="form-control" type="text" readonly id="sl-sy-view">
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="control-label">Course and Year</label>
                    <input class="form-control" type="text" id="sl-course-yearlevel-view" readonly>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label class="control-label">Semester</label>
                    <input class="form-control" type="text" id="sl-sem-view" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                      <div class="form-group">
                        <label class="control-label">Date:</label>
                        <input class="form-control" type="text" id="sl-date-paid-view" readonly>
                      </div>
                </div>

                <div class="col">
                      <div class="form-group">
                        <label class="control-label">Status</label>
                        <input class="form-control" type="text" id="sl-status-view" readonly>
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                      <div class="form-group">
                        <label class="control-label">Assigned Office</label>
                        <input class="form-control" type="text" id="sl-assigned-office-view" readonly>
                      </div>
                </div>
                <div class="col">
                      <div class="form-group">
                        <label class="control-label">Immediate Supervisor</label>
                        <input class="form-control" type="text" id="sl-supervisor-view" readonly>
                      </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Total No. of Hours</label>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">#</span>
                    </div>
                    <input class="form-control" id="sl-total-hours-view" type="text" placeholder="Hours" readonly="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Total Salary</label>
                <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                       <span class="input-group-text">₱</span>
                    </div>
                    <input class="form-control" id="sl-salary-view" type="text" placeholder="Amount" readonly="">
                  </div>
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="mark-paid-btn">Paid</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


        <!-- Essential javascripts for application to work-->

      
      <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
     <!--  <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script> -->

     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      </script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
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
              let href = $('#print-dtr').attr('href');
              const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
              let display_data = {name: "",course_year:"",sy:"",sem:"",date_paid:"",status:"",assigned_office:"",supervisor:"",total_hour:"",salary:"",rate:"",month:"",applicant_id:"",year:""};
              const applicant = $('#applicant-id').text().trim();
              var row_formatted_time_in = '';
              var row_formatted_time_out = '';
              var row_formatted_date = '';
              var row_date = '';
              var row_time_period = '';
              var row_id = 0;
              let salary_rate = parseFloat($('#salary-rate').text().trim()).toFixed(2);
              const sl_stat = $('#sl-status').text().trim();
              let semester = $('#semester-year').text().trim();
              let _year = $('#semester-year-year').text().trim();
              let semester_year = semester+" "+_year;
              const d = new Date();
              let month = d.getMonth();
              let selected_month = '';
              let sent_data = '';
              display_data.applicant_id = applicant;
              display_data.rate = salary_rate;
              display_data.sem = semester;
              display_data.sy = _year;
              display_data.name = $('#sl-name').text().trim();
              display_data.supervisor = $('#sl-supervisor').text().trim();
              display_data.assigned_office = $('#sl-assigned-office').text().trim();
              display_data.course_year = $('#sl-course').text().trim()+ " " + $('#sl-yearlevel').text().trim();


              // DATATABLE
              var tbl = $('#student-dtr-tbl').DataTable({
                serverside: false,
                  ajax : {
                    url : "../../php/O-StudentDefault/otherqueries.php",
                    data : function ( d ) {
                        d.app_id = applicant;
                        d.sem_year = semester_year;
                        d.queryid = 2;
                    },
                    dataSrc : "",
                    error: function(response){
                        
                          Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Server Error!',
                            showConfirmButton: false,
                            timer: 1500
                          })
                    }
                  },
                  columns : [
                    { data : "id", className: "collapse", searchable: false },
                    { data : "date_logged" },
                    { data : "time_period", searchable: false  },
                    { data : "time_in", searchable: false  },
                    { data : "time_out", searchable: false  },
                    { data : "task", searchable: false  },
                    { data : "diff", searchable: false  },
                    { data : "stat", searchable: false  },
                    { 
                      data : null,
                      className: "text-center",
                      render : function ( data, type, row){
                        let salary_amt = row['salary'];
                        let markup = '';

                        if (salary_amt!=null || ((sl_stat=='Terminated' || sl_stat=='Completed') && salary_amt==null)){
                          markup = '<a class="btn btn-warning btn-sm" disabled><i class="fas fa-edit mr-1"></i>Override</a>';
                        } else {
                          markup = '<a class="btn btn-warning btn-sm override-btn" href="#"  data-toggle="modal" data-target="#pass-modal"><i class="fas fa-edit mr-1"></i>Override</a>';
                        }
                        return markup;
                      }
                    },
                    { data: "salary", className:'collapse'},
                    { data: "salary_status", className:'collapse'}
                  ],
                  paging:false,
                  ordering : false,
                  initComplete: function () {
                   // getTotalHours();
                 //  month = d.getMonth();
                    // $('#filter-month').val(months[month]).trigger("change");
                  }
              });


              // GET TOTAL HOURS, SALARY, STATUS
              function getTotalHours(){
                var times = [];
                let salary_status = '';
                let salary = 0;
                $('#student-dtr-tbl tr').each(function(){
                      $(this).find('td:eq(6)').each(function(){
                        times.push($(this).text().trim());
                      })
                      $(this).find('td:eq(9)').each(function(){
                        salary_status = $(this).text().trim();
                      })
                      $(this).find('td:eq(8)').each(function(){
                        salary = $(this).text().trim();
                      })
                  })
                var total = addTimes(times);
                display_data.total_hour = parseInt(total.substr(0,2)) + " hour/s";
                $('#total-hours').text(total);
              //  console.log(salary_status);
                if (parseInt(total.substr(0,2))==0){

                    $('#total-salary').text('');
                    $('#salary-status').text('');
                    $('.override-btn').addClass('disabled');
                    $('#mark-paid').addClass('collapse');
                } else {
                  if (salary_status.length==0){
                    display_data.salary = parseFloat(parseInt(total.trim().substr(0,2))*salary_rate).toFixed(2);
                    $('#total-salary').text(display_data.salary);
                    $('#salary-status').text('Unpaid');
                    $('.override-btn').removeClass('disabled');
                    $('#mark-paid').removeClass('collapse');
                    $('#mark-paid i').removeClass('fa-eye');
                    $('#mark-paid i').addClass('fa-money-check');
                    display_data.date_paid = "";
                    display_data.status = "Unpaid";
                  } else {
                    display_data.salary = parseFloat(salary).toFixed(2);
                    display_data.date_paid = salary_status;
                    display_data.status = "Paid";
                    $('#total-salary').text(display_data.salary);
                    $('#salary-status').text('Paid on '+salary_status);
                    $('.override-btn').addClass('disabled');
                    $('#mark-paid').removeClass('collapse');
                    $('#mark-paid i').removeClass('fa-money-check');
                    $('#mark-paid i').addClass('fa-eye');
                  }
                }
                  

              }


            // GET TOTAL WORKING HOURS
            function addTimes(times) {
              let duration = 0;
              times.forEach(time => {
                duration += convertH2M(time);
              });
              console.log(duration);
              return  timeConvert(duration);
            }

            function msToTime(duration) {
              var milliseconds = parseInt((duration % 1000) / 100),
                seconds = Math.floor((duration / 1000) % 60),
                minutes = Math.floor((duration / (1000 * 60)) % 60),
                hours = Math.floor((duration / (1000 * 60 * 60)) % 24);

              hours = (hours < 10) ? "0" + hours : hours;
              minutes = (minutes < 10) ? "0" + minutes : minutes;
              seconds = (seconds < 10) ? "0" + seconds : seconds;

              return hours + ":" + minutes + ":" + seconds + "." + milliseconds;
            }

            function convertH2M(timeInHour){
              var timeParts = timeInHour.split(":");
              return Number(timeParts[0]) * 60 + Number(timeParts[1]);
            }

            function timeConvert(n) {
            var num = n;
            var hours = (num / 60);
            var rhours = Math.floor(hours);
            var minutes = (hours - rhours) * 60;
            var rminutes = Math.round(minutes);
            return rhours + " hour(s)";
            }


           // Bootstrap datepicker
            $('.input-daterange input').each(function() {
              $(this).datepicker('clearDates');
            });


            // Extend dataTables search
            $.fn.dataTable.ext.search.push(
              function(settings, data, dataIndex) {
                var min = $('#min-date').val();
                var max = $('#max-date').val();
                var createdAt = data[1] || 0; // Our date column in the table

                if (
                  (min == "" || max == "") ||
                  (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
                ) {
                  return true;
                }
                return false;
              }
            );


            // Re-draw the table when the a date range filter changes
            $('.date-range-filter').change(function() {
              console.log($('#min-date').val());
              tbl.draw();
                    getTotalHours();
            });

            // PASSWORD VERIFY
            $(document).on("click","#check-pword",function(){
              var password = $('#pword').val();

                  $.ajax({
                      url:"../../php/users-check-password.php",
                      method:"POST",
                      data:{pass:password},
                      success:function(response)
                        {
                          try {
                            var obj = JSON.parse(response);
                            var result = obj[0].res;
                            if (result==0){
                              Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Wrong password!',
                                showConfirmButton: false,
                                timer: 1000
                              })
                            } else if (result==1) {

                              Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Authentication Successful!',
                                showConfirmButton: false,
                                timer: 1000
                              })
                              .then(() => {
                                $('#pword').val('');
                                $('#pass-modal').modal('toggle');
                                $('#log-modal').modal('toggle');
                                $('#edit-time-in').val(row_formatted_time_in);
                                $('#edit-time-out').val(row_formatted_time_out);
                                $('#date-selected').text(row_date);
                                $('#period-selected').text(row_time_period);
                              })
                            }


                          } catch (e) {
                            alert("Server error. Reload page."+response);
                          }
                        },
                      error: function(response){
                        $('.fetched-data').text('');
                        alert("fail" + JSON.stringify(response));
                      }
                  });


            });

            // EDIT ROW TIME LOGS
             $(document).on("click",".override-btn",function(){
                var currentRow = $(this).closest("tr");
                var time_in = currentRow.find("td:eq(3)").text().trim();
                var time_out = currentRow.find("td:eq(4)").text().trim();
                var time_date = currentRow.find("td:eq(1)").text().trim();
                row_id = parseInt(currentRow.find("td:eq(0)").text().trim());
                row_time_period = currentRow.find("td:eq(2)").text().trim();
                row_date = time_date;
                row_formatted_time_in = moment(time_in, "h:mm:ss A").format("HH:mm:ss");
                row_formatted_time_out = moment(time_out, "h:mm:ss A").format("HH:mm:ss");
                row_formatted_date = moment(time_date, "LL").format("YYYY-MM-DD");

             });

             // UPDATE ROW TIME LOG IN DB
             $(document).on("submit","#edit-dtr-frm",function(e){
              e.preventDefault();
              var new_time_in = row_formatted_date+" "+$('#edit-time-in').val();
              var new_time_out = row_formatted_date+" "+$('#edit-time-out').val();
              console.log("new time in val: "+new_time_in+" new time out val: "+new_time_out);

                $.ajax({
                url:"../../php/M-FacultyHead/insert-update-queries.php",
                method:"POST",
                data:{row: row_id, in: new_time_in, out: new_time_out, queryno: 2},
                success:function(response)
                 {
                    if (response.length == 0){

                          Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Changes saved!',
                            showConfirmButton: false,
                            timer: 1000
                          })
                          $("#log-modal").modal("toggle");
                          tbl.ajax.reload();


                    } else {
                      Swal.fire("Server error!", "An error occurred. Please redo your action or reload the page!", "warning");
                         $("#log-modal").modal("toggle");
                    }                                          
                 },
                error: function(response){
                    alert("fail" + JSON.stringify(response));
                 }
                });

             });

             // MONTH CHANGE FUNCTION
             $('#filter-month').change(function(){
              selected_month = $(this).val();
              display_data.month = selected_month;
              $("#print-dtr").attr("href", href+(months.indexOf(selected_month) + 1));
              $('input[type=search]').val(selected_month);
              $('input[type=search]').trigger('keyup');
              getTotalHours();
             });


             // MARK PAID
            $(document).on('click','.fa-money-check',function(){
              displayData();
              $('#mark-paid-btn').removeClass('collapse');
              $('#salary-view').modal('toggle');

            })

            // DISPLAY SALARY DETAILS
            $(document).on('click','.fa-eye',function(){
              displayData();
              $('#mark-paid-btn').addClass('collapse');
              $('#salary-view').modal('toggle');
            });


            // function displayData(){
            //   console.log(display_data);
            //   let row = tbl.row(0).data();
            //   let date = row.date_logged.trim();
            //   display_data.year = date.substr(date.length-4,4);
            //   let new_href = "Print-Salary.php?month="+display_data.month+"&year="+display_data.year+"&name="+display_data.name+"&course_year="+display_data.course_year+"&assigned_office="+display_data.assigned_office+"&supervisor="+display_data.supervisor+"&rate="+display_data.rate+"&total_hours="+display_data.total_hour+"&salary="+display_data.salary;
            //   console.log(new_href);
            //   $('#sl-name-view').val(display_data.name);
            //   $('#sl-course-yearlevel-view').val(display_data.course_year);
            //   $('#sl-sy-view').val(display_data.sy);
            //   $('#sl-sem-view').val(display_data.sem);
            //   $('#sl-date-paid-view').val(display_data.date_paid);
            //   $('#sl-status-view').val(display_data.status);
            //   $('#sl-assigned-office-view').val(display_data.assigned_office);
            //   $('#sl-supervisor-view').val(display_data.supervisor);
            //   $('#sl-total-hours-view').val(display_data.total_hour);
            //   $('#sl-salary-view').val(display_data.salary);
            //   $('#print-salary').prop("href",new_href);
            // }


            // $(document).on('click','#mark-paid-btn',function(){

            //     $.ajax({
            //         url:"../../php/M-FacultyHead/insert-update-queries.php",
            //         method:"POST",
            //         data:{
            //               appid:display_data.applicant_id,
            //               month:display_data.month,
            //               year:display_data.year,
            //               semyear: (display_data.sem+" "+display_data.sy),
            //               hours:display_data.total_hour,
            //               salary:display_data.salary,
            //               queryno: 1
            //             },
            //         success:function(response)
            //           {
            //             if (response.length > 1){
            //               Swal.fire(
            //                 'Something went wrong!',
            //                 'Update failed!',
            //                 'warning'
            //               ) 
            //             } else {
            //               Swal.fire(
            //                 'Successful!',
            //                 'The selected month dtr cannot be edited!.',
            //                 'success'
            //               )
            //               location.reload();
            //             }
            //           },
            //         error: function(response){
            //           $('.fetched-data').text('');
            //           alert("fail" + JSON.stringify(response));
            //         }
            //     });

            // });

              // Swal.fire({
              //   title: 'Mark as Paid?',
              //   text: "You won't be able to revert this!",
              //   icon: 'warning',
              //   showCancelButton: true,
              //   confirmButtonColor: '#3085d6',
              //   cancelButtonColor: '#d33',
              //   confirmButtonText: 'Yes!'
              // }).then((result) => {
              //   if (result.isConfirmed) {
                // $.ajax({
                //     url:"../../php/M-FacultyHead/insert-update-queries.php",
                //     method:"POST",
                //     data:{
                //           appid:applicant,
                //           month:mon,
                //           year:y,
                //           semyear:semester_year,
                //           hours:total_hours,
                //           salary:sal,
                //           queryno: 1
                //         },
                //     success:function(response)
                //       {
                //         if (response.length > 1){
                //           Swal.fire(
                //             'Something went wrong!',
                //             'Update failed!',
                //             'warning'
                //           )
                //         } else {
                //           Swal.fire(
                //             'Successful!',
                //             'The selected month dtr cannot be edited!.',
                //             'success'
                //           )
                //         }
                //       },
                //     error: function(response){
                //       $('.fetched-data').text('');
                //       alert("fail" + JSON.stringify(response));
                //     }
                // });
              //   }
              // })
          });
      </script>
    </body>
  </html>

