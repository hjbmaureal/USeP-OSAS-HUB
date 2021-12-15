<?php
  //session script, open for updates for other modules
  include_once('../../php/user-session.php');
  include_once('../../php/notification-timeago.php'); 
  include_once('../../php/connect_db.php');
  //authenticate if logged in and user is the correct user
  checkSessionAuth($_SESSION['id'],$_SESSION['usertype']);
  checkSessionTime();
  
  $id= $_SESSION['id'];
  $currSemesterYear = "";
  $course_name = "";
  $course_selector = 1;

  $result = mysqli_query($conn, "SELECT * FROM course WHERE course_id = $course_selector");
  $row = mysqli_fetch_assoc($result);
  $course_name = $row['name'];
  $count = 0;

  if($result = mysqli_query($conn,"SELECT count(*) AS cnt FROM notif WHERE user_id='$id' AND message_status='Delivered' AND office_id = 2")){
    while($row = mysqli_fetch_array($result)){
      $count = $row['cnt'];
    }
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
    <link rel="icon" href="../../images/logo.png" type="image/gif" sizes="16x16">
    <title>USeP Scholarship Admin Hub</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../css/upstyle.css">
    <link rel="stylesheet" type="text/css" href="../../css/custom.css">
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <style>
    .fab-container{
      position: fixed;
      bottom: 50px;
      right: 50px;
      z-index: 999;
      cursor: pointer;
    }
    .fab-icon-holder{
      width: 50px;
      height: 50px;
      border-radius: 100%;
      background: #a80716;

      box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
    }
    .fab-icon-holder:hover{
      opacity: 0.8;
    }

    .fab-icon-holder i {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
      font-size: 20px;
      color: white;
    }

    .fab{
      width: 60px;
      height: 60px;
      background: #d23f31;
    }

    .fab-options{
      list-style-type: none;
      margin: 0;

      position: absolute;
      bottom: 70px;
      right: 0;

      opacity: 0;

      transition: all 0.3s ease;
      transform: scale(0);
      transform-origin: 85% bottom;

    }

    .fab:hover + .fab-options, .fab-options:hover {
      opacity: 1;
      transform: scale(1);
    }

    .fab-options li {
      display: flex;
      justify-content: flex-end;
      padding: 5px;
    }

    .fab-label{
      padding: 2px 5px;
      align-self: center;
      -moz-user-select: none;
      -webkit-user-select: none;
      white-space: nowrap;
      border-radius: 3px;
      font-size: 1;
      background-color: #666666;
      color: white;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2) ;
      margin-right: 10px;
    }
  </style>

  <body class="app sidebar-mini rtl" onload="initClock()" >
    <!-- Navbar-->

      
    <header class="app-header">
      
    </header>

    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      
    <link rel="icon" href="../../images/logo.png" type="image/gif" sizes="16x16">
    <title>USeP Scholarship Admin Hub</title>
      <hr>
      <ul class="app-menu font-sec">
        <!--app-menu__label - CATEGORY TITLE -->
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">DASHBOARD</span>
        </li>
        <li>
          <a class="app-menu__item" href="index.php">
            <i class="app-menu__icon fa fa-home"></i>
            <span class="app-menu__label">Home</span>
          </a>
        </li>
        <!--app-menu__label - CATEGORY TITLE -->
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">SCHOLARSHIP & PROVIDER DATA</span>
        </li>
        <!-- Treeview MENU -->
        <li class="treeview">
          <a class="app-menu__item" href="" data-toggle="treeview">
            <i class="app-menu__icon fa fa-address-book"></i>
            <span class="app-menu__label">Scholars & Grantee Record</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="scholars-grantee-records.php" class="treeview-item">Scholars and Grantee Record</a></li>
            <li><a href="provider-list.php" class="treeview-item">Providers List</a></li>
          </ul>
        </li>
        <!-- Treeview MENU -->
        <li class="treeview">
          <a class="app-menu__item" href="" data-toggle="treeview">
            <i class="app-menu__icon fa fa-pie-chart"></i>
            <span class="app-menu__label">Status Tracker</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="status-tracker-allowance.php">Allowance</a></li>
            <li><a class="treeview-item" href="status-tracker-billing.php">Billing</a></li>
            <li><a class="treeview-item" href="status-tracker-payroll.php">Payroll</a></li>
            <li><a class="treeview-item" href="status-tracker-liquidation.php">Liquidation</a></li>
            <li><a class="treeview-item" href="status-tracker-totals.php">Totals</a></li>
          </ul>
        </li>
        <!-- NOT Treeview MENU -->
        <li>
          <a class="app-menu__item" href="scholars-validation.php">
            <i class="app-menu__icon fa fa-check-square"></i>
            <span class="app-menu__label">Scholar's Validation</span>
          </a>
        </li>
        <!--app-menu__label - CATEGORY TITLE -->
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">IMPORT & EXPORT</span>
        </li>
        <!-- Treeview MENU -->
        <li class="treeview">
          <a class="app-menu__item" href="" data-toggle="treeview">
            <i class="app-menu__icon fa fa-address-card-o"></i>
            <span class="app-menu__label">Generate Scholarship Card</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="generate-internal-scholar-card.php">Internal</a></li>
            <li><a class="treeview-item" href="generate-external-scholar-card.php">External</a></li>
            <li><a class="treeview-item" href="generate-scholar-card-summary.php">Summary</a></li>
          </ul>
        </li>
        <!-- NOT Treeview MENU -->
        <li>
          <a class="app-menu__item" href="enrollment-list.php">
            <i class="app-menu__icon fa fa-book"></i>
            <span class="app-menu__label">Enrollment List Report</span>
          </a>
        </li>
        <!-- NOT Treeview MENU -->
        <li>
          <a class="app-menu__item" href="promotional-report.php">
            <i class="app-menu__icon fa fa-graduation-cap"></i>
            <span class="app-menu__label">Promotional Report</span>
          </a>
        </li>
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">MASTERLIST</span>
        </li>
        <li>
          <a class="app-menu__item" href="masterlist-records.php">
            <i class="app-menu__icon fa fa-folder-open"></i>
            <span class="app-menu__label">Records</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="masterlist-documents.php">
            <i class="app-menu__icon fa fa-file-text"></i>
            <span class="app-menu__label">Documents</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="masterlist-external-reference.php">
            <i class="app-menu__icon fa fa-external-link"></i>
            <span class="app-menu__label">External References</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="masterlist-incoming-outgoing.php">
            <i class="app-menu__icon fa fa-exchange"></i>
            <span class="app-menu__label">Incoming/Outgoing/Transmittal</span>
          </a>
        </li>
        <!--app-menu__label - CATEGORY TITLE -->
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">REPORTS</span>
        </li>
        <li>
          <a class="app-menu__item" href="monitoring-of-scholars.php">
            <i class="app-menu__icon fa fa-users"></i>
            <span class="app-menu__label">Monitoring of Scholars</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="scholarship-report.php">
            <i class="app-menu__icon fa fa-file-excel-o"></i>
            <span class="app-menu__label">Scholarship Report</span>
          </a>
        </li>
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">OTHERS</span>
        </li>
        <li>
          <a class="app-menu__item active" href="curriculum.php">
            <i class="app-menu__icon fa fa-university"></i>
            <span class="app-menu__label">Curriculum</span>
          </a>
        </li>
      </ul>
    </aside>

    <main class="app-content" id="main-content">
     <!--navbar-->
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
                    <div class="appnavlevel">
                      <span class="semesterYear">'.$row['semester'].'</span>
                    </div>
                  </li>
                  <li>
                    <div class="appnavlevel">
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
                 $count_sql="SELECT * from notif where (user_id=$id and office_id = 2)  order by time desc";
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
      <!-- Floating Action Button -->
      <div class="fab-container">
        <div class="fab fab-icon-holder">
          <i>Years</i>
        </div>

        <ul class="fab-options">
          <li>
            <span class="fab-label">5th Year</span>
            <div class="fab-icon-holder">
              <a href="#fifthYearSection"><i class="fa fa-users"></i></a>
            </div>
          </li>
          <li>
            <span class="fab-label">4th Year</span>
            <div class="fab-icon-holder">
              <a href="#fourthYearSection"><i class="fa fa-users"></i></a>
            </div>
          </li>
          <li>
            <span class="fab-label">3rd Year</span>
            <div class="fab-icon-holder">
              <a href="#thirdYearSection"><i class="fa fa-users"></i></a>
            </div>
          </li>
          <li>
            <span class="fab-label">2nd Year</span>
            <div class="fab-icon-holder">
              <a href="#secondYearSection"><i class="fa fa-users"></i></a>
            </div>
          </li>
          <li>
            <span class="fab-label">1st Year</span>
            <div class="fab-icon-holder">
              <a href="#firstYearSection"><i class="fa fa-users"></i></a>
            </div>
          </li>
        </ul>
      </div>
      <!-- MAIN CONTENT --> 
      <!-- Title of Content -->
      <div id="firstYearSection"></div>
      <div id="main-content-scholar">
        <?php
          if(isset($_POST['searchCourse'])){
            $search = mysqli_real_escape_string($conn, trim($_POST['searchCourse']));
            if($result = mysqli_query($conn, "SELECT * FROM course WHERE title LIKE '$search' OR name LIKE '$search'")){
              if($row = mysqli_fetch_array($result)){
                $course_name = $row['name'];
                $course_selector = $row['course_id'];
              }
            }
          }
        ?>
        <!-- SELECTION OR FILTERS AND TITLE -->
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-title">
                <!-- first row or TITLE -->
                <div class="float-left">
                  <h4>Curriculum</h4>
                </div>
                <div class="float-right">
                </div>
                <!-- CLEARFIX FOR BOTH FOR FLOATED ELEMENTS -->
                <div class="clearfix"></div>
              </div>
              
              <div class="tile-body">
                <!-- SECOND ROW FOR SORT OPTIONS -->
                <form action="" method="POST" id="sortForm">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="#">Course</label>
                        <select name="sortCourse" id="sortCourse" class="form-control">
                          <option value="0">Please Select</option>
                          <?php
                            $result =  mysqli_query($conn, "SELECT course_id, name from course");
                            $count = 1;
                            while($row = mysqli_fetch_array($result)){
                              echo '
                                <option
                              ';
                              if(isset($_POST['sortCourse']) && $_POST['sortCourse'] == $count){
                                echo 'selected value="'.$count.'">'.$row['name'].'</option>';
                                $course_selector = $_POST['sortCourse'];
                                $course_name = $row['name'];
                              }else{
                                echo 'value="'.$count.'">'.$row['name'].'</option>';
                              }
                              $count++;
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="searchCourse">Search</label>
                      <input type="text" class="form-control" name="searchCourse" id="searchCourse">
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="selectCourse">Select Course</label>
                        <input type="submit" class="form-control btn btn-primary" id="selectSortCourse" value="Confirm">
                      </div>
                    </div>
                  </div>
                </form>
                <!-- FIRST YEAR -->
                <div class="row mb-2" id="secondYearSection">
                  <div class="col-md-12">
                    <h3 class="text-center">First Year</h3>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>First Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="firstSemFirstYear~1~1">
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-sm table-bordered">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='1' and year ='1'")){
                            while($row = mysqli_fetch_array($result)){
                              echo '
                                <tr>
                                  <td hidden>'.$row['subject_id'].'</td>
                                  <td> '.$row['subject_code'].'</td>
                                  <td> '.$row['subject_description'].'</td>
                                  <td> '.$row['subject_unit'].'</td>
                                  <td>
                                    <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                    <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                  </td>
                                </tr>
                              ';
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>Second Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="secSemFirstYear~2~1">
                    </div>
                    <table class="table table-striped table-sm table-bordered" id="table21">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='2' and year ='1'")){
                            while($row = mysqli_fetch_array($result)){
                              echo '
                                <tr>
                                  <td hidden> '.$row['subject_id'].'</td>
                                  <td> '.$row['subject_code'].'</td>
                                  <td> '.$row['subject_description'].'</td>
                                  <td> '.$row['subject_unit'].'</td>
                                  <td>
                                    <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                    <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                  </td>
                                </tr>
                              ';
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- SECOND YEAR -->
                <hr>
                <div class="row mb-2" id="thirdYearSection">
                  <div class="col">
                    <h3 class="text-center">Second Year</h3>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>First Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="firstSemSecYear~1~2">
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-sm table-bordered" id="table12">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='1' and year ='2'")){
                            if(mysqli_num_rows($result) == 0){
                              echo '
                              <tr>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                              </tr>
                            ';
                            }else{
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                    <td hidden> '.$row['subject_id'].'</td>
                                    <td> '.$row['subject_code'].'</td>
                                    <td> '.$row['subject_description'].'</td>
                                    <td> '.$row['subject_unit'].'</td>
                                    <td>
                                      <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                      <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>Second Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="secSemSecYear~2~2">
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-sm table-bordered" id="table22">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='2' and year ='2'")){
                            if(mysqli_num_rows($result) == 0){
                              echo '
                              <tr>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                              </tr>
                            ';
                            }else{
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                    <td hidden> '.$row['subject_id'].'</td>
                                    <td> '.$row['subject_code'].'</td>
                                    <td> '.$row['subject_description'].'</td>
                                    <td> '.$row['subject_unit'].'</td>
                                    <td>
                                      <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                      <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>Off Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="offSemSecYear~3~2">
                    </div>
                    <table class="table table-striped table-sm table-bordered" id="table32">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='3' and year ='2'")){
                            if(mysqli_num_rows($result) == 0){
                              echo '
                              <tr>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                              </tr>
                            ';
                            }else{
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                    <td hidden> '.$row['subject_id'].'</td>
                                    <td> '.$row['subject_code'].'</td>
                                    <td> '.$row['subject_description'].'</td>
                                    <td> '.$row['subject_unit'].'</td>
                                    <td>
                                      <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                      <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <hr>

                <!-- THIRD YEAR -->
                <div class="row mb-2" id="fourthYearSection">
                  <div class="col">
                    <h3 class="text-center">Third Year</h3>
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>First Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="firstSemThirdYear~1~3">
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-sm table-bordered" id="table13">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='1' and year ='3'")){
                            if(mysqli_num_rows($result) == 0){
                              echo '
                              <tr>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                              </tr>
                            ';
                            }else{
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                    <td hidden> '.$row['subject_id'].'</td>
                                    <td> '.$row['subject_code'].'</td>
                                    <td> '.$row['subject_description'].'</td>
                                    <td> '.$row['subject_unit'].'</td>
                                    <td>
                                      <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                      <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>Second Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="secSemThirdYear~2~3">
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-sm table-bordered" id="table23">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='2' and year ='3'")){
                            if(mysqli_num_rows($result) == 0){
                              echo '
                              <tr>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                              </tr>
                            ';
                            }else{
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                    <td hidden> '.$row['subject_id'].'</td>
                                    <td> '.$row['subject_code'].'</td>
                                    <td> '.$row['subject_description'].'</td>
                                    <td> '.$row['subject_unit'].'</td>
                                    <td>
                                      <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                      <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md-6">
                  <div class="float-left">
                    <h5>Off Semester</h5>
                  </div>
                  <div class="float-right form-group">
                    <button class="btn fa fa-plus form-control addSubjectButton" value="offSemThirdYear~3~3">
                  </div>
                  <div class="clearfix"></div>
                  <table class="table table-striped table-sm table-bordered" id="table33">
                    <thead>
                      <tr>
                        <th hidden>Subject ID</th>
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Unit</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='3' and year ='3'")){
                          if(mysqli_num_rows($result) == 0){
                            echo '
                            <tr>
                              <td>No Data</td>
                              <td>No Data</td>
                              <td>No Data</td>
                              <td>No Data</td>
                            </tr>
                          ';
                          }else{
                            while($row = mysqli_fetch_array($result)){
                              echo '
                                <tr>
                                  <td hidden> '.$row['subject_id'].'</td>
                                  <td> '.$row['subject_code'].'</td>
                                  <td> '.$row['subject_description'].'</td>
                                  <td> '.$row['subject_unit'].'</td>
                                  <td>
                                    <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                    <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                  </td>
                                </tr>
                              ';
                            }
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                  </div>
                </div>

                <hr>

                <!-- FOURTH YEAR -->
                <div class="row" id="fourthYearSection">
                  <div class="col">
                    <h3 class="text-center">Fourth Year</h3>
                  </div>
                </div>
                <br>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>First Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="firstSemFourthYear~1~4">
                    </div>
                    <table class="table table-striped table-sm table-bordered" id="table14">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='1' and year ='4'")){
                            if(mysqli_num_rows($result) == 0){
                              echo '
                              <tr>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                              </tr>
                            ';
                            }else{
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                    <td hidden> '.$row['subject_id'].'</td>
                                    <td> '.$row['subject_code'].'</td>
                                    <td> '.$row['subject_description'].'</td>
                                    <td> '.$row['subject_unit'].'</td>
                                    <td>
                                      <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                      <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>Second Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="secSemFourthYear~2~4">
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-bordered table-sm" id="table24">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='2' and year ='4'")){
                            if(mysqli_num_rows($result) == 0){
                              echo '
                              <tr>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                              </tr>
                            ';
                            }else{
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                    <td hidden> '.$row['subject_id'].'</td>
                                    <td> '.$row['subject_code'].'</td>
                                    <td> '.$row['subject_description'].'</td>
                                    <td> '.$row['subject_unit'].'</td>
                                    <td>
                                      <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                      <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>Off Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="offSemFourthYear~3~4">
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-sm table-bordered" id="table34">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='3' and year ='4'")){
                            if(mysqli_num_rows($result) == 0){
                              echo '
                              <tr>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                              </tr>
                            ';
                            }else{
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                    <td hidden> '.$row['subject_id'].'</td>
                                    <td> '.$row['subject_code'].'</td>
                                    <td> '.$row['subject_description'].'</td>
                                    <td> '.$row['subject_unit'].'</td>
                                    <td>
                                      <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                      <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <hr>
                <!-- FIFTH YEAR -->
                <div class="row mb-2" id="fifthYearSection">
                  <div class="col">
                    <h3 class="text-center">Fifth Year</h3>
                  </div>
                </div>
                <br>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>First Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="firstSemFifthYear~1~5">
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-bordered table-sm" id="table15">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='1' and year ='5'")){
                            if(mysqli_num_rows($result) == 0){
                              echo '
                              <tr>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                              </tr>
                            ';
                            }else{
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                    <td hidden> '.$row['subject_id'].'</td>
                                    <td> '.$row['subject_code'].'</td>
                                    <td> '.$row['subject_description'].'</td>
                                    <td> '.$row['subject_unit'].'</td>
                                    <td>
                                      <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                      <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>Second Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="secSemFifthYear~2~5">
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-sm table-bordered" id="table25">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='2' and year ='5'")){
                            if(mysqli_num_rows($result) == 0){
                              echo '
                              <tr>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                              </tr>
                            ';
                            }else{
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                    <td hidden> '.$row['subject_id'].'</td>
                                    <td> '.$row['subject_code'].'</td>
                                    <td> '.$row['subject_description'].'</td>
                                    <td> '.$row['subject_unit'].'</td>
                                    <td>
                                      <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                      <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <!-- Off Sem -->
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="float-left">
                      <h5>Off Semester</h5>
                    </div>
                    <div class="float-right form-group">
                      <button class="btn fa fa-plus form-control addSubjectButton" value="offSemFifthYear~3~5">
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-sm table-bordered" id="table35">
                      <thead>
                        <tr>
                          <th hidden>Subject ID</th>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($result = mysqli_query($conn, "SELECT * from list_of_subjects WHERE course = $course_selector and semester ='3' and year ='5'")){
                            if(mysqli_num_rows($result) == 0){
                              echo '
                              <tr>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                                <td>No Data</td>
                              </tr>
                            ';
                            }else{
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <tr>
                                    <td hidden> '.$row['subject_id'].'</td>
                                    <td> '.$row['subject_code'].'</td>
                                    <td> '.$row['subject_description'].'</td>
                                    <td> '.$row['subject_unit'].'</td>
                                    <td>
                                      <button class="btn fa fa-pencil editSubjectButton" value="'.$row['subject_id'].'">
                                      <button class="btn fa fa-minus deleteSubjectButton" value="'.$row['subject_id'].'">
                                    </td>
                                  </tr>
                                ';
                              }
                            }
                          }
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
      <!-- Add Subject Modal -->
      <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="addSubjectModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Subject</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <?php
                    echo '<input type="text" id="courseID" name="courseID" value="'.$course_selector.'">';
                  ?>

                  <input type="text" id="semyear" name="semyear">
                  <input type="text" id="semester" name="semester">
                  <input type="text" id="yearAdd" name="year">
                  <label for="addSubjectCode">Subject Code</label>
                  <input name="addSubjectCode" type="text" id="addSubjectCode" class="form-control" required>
                  <div class="invalid-tooltip">
                    Please enter subject code
                  </div>
                </div>
                <div class="col-6">
                  <label for="addSubjectUnit">Subject Unit</label>
                  <input name="addSubjectUnit" type="text" id="addSubjectUnit" class="form-control" required>
                  <div class="invalid-tooltip">
                    Please enter subject unit
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <label for="addSubjectDesc">Subject Description</label>
                  <input name="addSubjectDesc" type="text" id="addSubjectDesc" class="form-control" required>
                  <div class="invalid-tooltip">
                    Please enter subject description
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="button" id="addSubject" name="submit">Save</button>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Add Subject Modal-->

      <!-- Edit Modal HTML -->
      <div id="editSubjectModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">						
              <h4 class="modal-title">Edit Subject</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-6">
                    <input type="text" id="editcourseID" name="editcourseID">
                    <input type="text" id="subject_id" name="subject_id">
                    <input type="text" id="oldcode" name="oldcode">
                    <label for="editSubjectCode">Subject Code</label>
                    <input name="editSubjectCode" type="text" id="editSubjectCode" class="form-control" required>
                    <div class="invalid-tooltip">
                      Please enter subject code
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="editSubjectUnit">Subject Unit</label>
                    <input name="editSubjectUnit" type="text" id="editSubjectUnit" class="form-control" required>
                    <div class="invalid-tooltip">
                      Please enter subject unit
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="editSubjectDesc">Subject Description</label>
                    <input name="editSubjectDesc" type="text" id="editSubjectDesc" class="form-control" required>
                    <div class="invalid-tooltip">
                      Please enter subject description
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="editSubject" id="editSubject">Save</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
              </div>

          </div>
        </div>
      </div>
      <!-- End of Edit Subject Modal-->

      <!-- Delete Modal HTML -->
      <div id="deleteSubjectModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">						
              <h4 class="modal-title">Delete Subject</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <input type="text" id="deleteSubjectID" name="deleteSubjectID" hidden>
                  <label for="deleteSubjectCode">Subject Code</label>
                  <input name="deleteSubjectCode" type="text" id="deleteSubjectCode" class="form-control" disabled>
                </div>
                <div class="col-6">
                  <label for="deleteSubjectUnit">Subject Unit</label>
                  <input name="deleteSubjectUnit" type="text" id="deleteSubjectUnit" class="form-control" disabled>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <label for="deleteSubjectDesc">Subject Description</label>
                  <input name="deleteSubjectDesc" type="text" id="deleteSubjectDesc" class="form-control" disabled>
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-danger" name="deleteSubject" id="deleteSubject" value="Delete">
            </div>
          </div>
        </div>
      </div>
      <!-- End of Delete Subject Modal-->

    </main> 

    <!-- FONTAWESOME -->
    <!-- Essential javascripts for application to work-->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../../js/plugins/pace.min.js"></script>
    <!-- Inline Table Edit Plugin-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }

      // CLEAR GET VARIABLES
      if(typeof window.history.replaceState == 'function') {
        window.history.replaceState({}, "Hide", "curriculum.php");
      }

      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
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

            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
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

      //CHECKBOX TABLE
      $(document).ready(function(){
        var clicked = false;
        if(clicked){
          //default to AG ENG
          $("#sortCourse option[value=1]").attr('selected', 'selected');
        }
        $('#selectSortCourse').on('click', function (){
          clicked = true;
        })
        //logout
        $('#logout-button').on('click', function(){
          Swal.fire({
            title: 'Do you want to logout?',
            showDenyButton: true,
            denyButtonText: `Cancel`,
            confirmButtonText: `Logout`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              window.location = "../../php/user-session.php?logout";
            } else if (result.isDenied) {
              Swal.fire('Cancelled', '', 'info')
            }
          })
        })

        //CURRICULUM CRUD
        //call modal for add function
        $(".addSubjectButton").click(function(){
          //GET VALUES OF MARKERS
          var course = $('#courseID').val();
          var data = $(this).val();
          var splitData = data.split("~");
          var marker = splitData[0];
          var semester = splitData[1];
          var year = splitData[2];
          //ASSIGN TO MODAL
          $('#semyear').val(marker);
          $('#courseID').val(course);
          $('#semester').val(semester);
          $('#yearAdd').val(year);
          //SHOW TO MODAL
          $('#addSubjectModal').modal('show');
        });

        //create/ADD subject through ajax in database
        $('#addSubject').on('click', function(){
          var addSubjectCode = $('#addSubjectCode').val(), units = $('#addSubjectUnit').val(), addSubjectDesc = $('#addSubjectDesc').val(), courseID = $('#courseID').val(), semyear = $('#semyear').val(), semester = $('#semester').val(), year = $('#yearAdd').val();
          $.ajax({
            url: '../../php/curriculum-script.php',
            method: 'POST',
            dataType: 'JSON',
            data: {
              courseID:courseID,
              semyear:semyear,
              addSubjectCode:addSubjectCode,
              units:units,
              addSubjectDesc:addSubjectDesc,
              semester:semester,
              year:year
            },
            success:function(data){
              $('#addSubjectModal').modal('hide');
              //call function to refresh specific table
              if(data.statusCode=="success"){         
                 Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Subject added to course!',
                  showConfirmButton: false,
                  timer: 1500
                })
                // illusion of no refresh so that page remains 'one page' form
                setTimeout(function () {
                  $("#sortForm").trigger("submit");
                }, 1500);             
              }else{
                alert('an error occured')
              }
            }
          });
        });
        //call modal for edit function
        $(".editSubjectButton").click(function(){
          //GET VALUES OF MARKERS
          var subject_id = $(this).val();
          //Fetch Data
          $.ajax({//AJAX REQUEST FOR PROVIDER DATA
              url: '../../php/curriculum-script.php',
              method: 'POST',
              data:{subject_id:subject_id},
              dataType: 'JSON',
              success:function(data){
                // console.log(data);
                $('#editSubjectCode').val(data[1]);
                $('#oldcode').val(data[1]);
                $('#editSubjectDesc').val(data[2]);
                $('#editSubjectUnit').val(data[3]);
                $('#editcourseID').val(data[4]);
                $('#subject_id').val(data[0]);
              }
            });
          //SHOW TO MODAL
          $('#editSubjectModal').modal('show');
        });

        $('#editSubject').on('click', function(){
          var 
          oldcode = $('#oldcode').val(), 
          subject_id = $('#subject_id').val(), 
          editcourseID = $('#editcourseID').val(), 
          editSubjectCode = $('#editSubjectCode').val(), 
          editSubjectUnit = $('#editSubjectUnit').val(), 
          editSubjectDesc = $('#editSubjectDesc').val();

          console.log(editSubjectCode+" "+oldcode+" "+subject_id+" "+editcourseID+" "+editSubjectUnit+" "+editSubjectDesc);
          $.ajax({
            url: '../../php/curriculum-script.php',
            method: 'POST',
            dataType: 'JSON',
            data:{
              oldcode:oldcode,
              subject_id:subject_id,
              editcourseID:editcourseID,
              editSubjectCode:editSubjectCode,
              editSubjectUnit:editSubjectUnit,
              editSubjectDesc:editSubjectDesc
            },
            success:function(data){
              console.log(data)
              $('#editSubjectModal').modal('hide');
              //call function to refresh specific table
              if(data.statusCode=="success"){
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Subject details updated!',
                  showConfirmButton: false,
                  timer: 1500
                })
                // illusion of no refresh so that page remains 'one page' form
                setTimeout(function () {
                  $("#sortForm").trigger("submit");
                }, 1500);
              }else if(data.statusCode=="duplicate"){
                Swal.fire(
                  "Double Entry!",
                  "Subject code already exist in the course!",
                  "error"
                )
              }else if(data.statusCode=="error"){
                alert('an error occured')
              }
            }
          });
        });

        $(".deleteSubjectButton").click(function(){
          //GET VALUES OF MARKERS
          var subject_id = $(this).val();
          //Fetch Data
          $.ajax({//AJAX REQUEST FOR PROVIDER DATA
              url: '../../php/curriculum-script.php',
              method: 'POST',
              data:{subject_id:subject_id},
              dataType: 'JSON',
              success:function(data){
                console.log("sss");
                $('#deleteSubjectID').val(data[0]);
                $('#deleteSubjectCode').val(data[1]);
                $('#deleteSubjectDesc').val(data[2]);
                $('#deleteSubjectUnit').val(data[3]);
              }
            });
          //SHOW TO MODAL
          $('#deleteSubjectModal').modal('show');
        });
        
        $('#deleteSubject').click(function (){
          var deleteSubjectID = $('#deleteSubjectID').val();
          $.ajax({
            url: '../../php/curriculum-script.php',
            method: 'POST',
            dataType: 'JSON',
            data: {
              deleteSubjectID:deleteSubjectID,
            },
            success:function(data){
              $('#deleteSubjectModal').modal('hide');
              //call function to refresh specific table
              if(data.statusCode=="success"){
                Swal.fire({
                  position: 'top-end',
                  icon: 'info',
                  title: 'Subject deleted succesfully!',
                  showConfirmButton: false,
                  timer: 1500
                })
                // illusion of no refresh so that page remains 'one page' form
                setTimeout(function () {
                  $("#sortForm").trigger("submit");
                }, 1500);
                //scroll to last table or specific area
              }
            }
          });
        })

        //searchCourse
        $('#searchCourse').keyup(function(){
          $('#sortForm').submit(function (){
            $("#sortCourse option[value=0]").attr('selected', 'selected');
          });
        });
      });
    </script>
  </body>
</html>