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

  // SET
  if(isset($_POST['update-allowance'])){
    if(isset($_POST['select'])){
      foreach($_POST['select'] as $id){
        $student_id = $_POST['student'];
        $statusAllowance = 'RELEASED';
        mysqli_query($conn,"UPDATE grantee_history SET status_allowance = '$statusAllowance', allowance_set_date = current_date() WHERE id = '$id'");
        mysqli_query($conn, "INSERT INTO `notif`( `user_id`, `message_body`, `link`, `message_status`, `office_id`) VALUES ('$student_id','Your allowance is succesfully released.','../users/Student/student-scholarship-dashboard.php', 'Delivered','2')");
      }
      header("Location: status-tracker-allowance.php?operation=success&set-status");
    }else{
      header("Location: status-tracker-allowance.php?selection=empty");
    }
  }
  if(isset($_POST['unset-allowance'])){
    if(isset($_POST['select']) && !empty($_POST['select'])){
      foreach($_POST['select'] as $id){
        $statusAllowance = 'NOT RELEASED';
        mysqli_query($conn,"UPDATE grantee_history SET status_allowance = '$statusAllowance', allowance_set_date = NULL WHERE id = '$id'");
      }
      header("Location: status-tracker-allowance.php?operation=success");
      header("Location: status-tracker-allowance.php?operation=success&unset-update");
    }else{
      header("Location: status-tracker-allowance.php?selection=empty");
    }
  }
  $count = 0;
  if($result = mysqli_query($conn,"SELECT count(*) AS cnt FROM notif WHERE user_id is null AND message_status='Delivered' AND office_id = 2")){
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
    <div class="app-sidebar__overlay" data-toggle="sidebar">
    </div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="../../images/logo.png" width="20%" alt="img">
        <div>
          <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">SCHOLARSHIP PORTAL</p>
        </div>
      </div>
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
          <a class="app-menu__item active" href="" data-toggle="treeview">
            <i class="app-menu__icon fa fa-pie-chart"></i>
            <span class="app-menu__label">Status Tracker</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item active" href="status-tracker-allowance.php">Allowance</a></li>
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
          <a class="app-menu__item" href="curriculum.php">
            <i class="app-menu__icon fa fa-university"></i>
            <span class="app-menu__label">Curriculum</span>
          </a>
        </li>
      </ul>
    </aside>
    
    <!--MAIN CONTENT CONTAINER-->
    <main class="app-content">
      <!-- navbar -->
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
                  $count_sql="SELECT * from notif where (user_id=$id or office_id = 2)  order by time desc";
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
      </div> <!-- END OF NAVBAR -->

      <!-- MAIN CONTENT -->
      <div class="main-content-allowance">
        <!-- FORM FOR SETTING STATUS -->
        <form action="" method="POST">
          <!-- TABLE -->
          <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <!-- FIRST ROW -->
                  <div class="float-left">
                    <h4>Status Tracker - Allowance</h4>
                  </div>
                  <div class="float-right">
                    <p>
                      <input type="button" value="Export" id="export-button" class="btn btn-primary icon-btn">
                      <input type="submit" name="update-allowance" value="Set" onclick="return setValidation()" class="btn btn-warning icon-btn">
                      <input type="submit" name="unset-allowance" value="Unset"  class="btn btn-danger icon-btn">
                    </p>
                  </div>
                  <div class="clearfix"></div>
                  <!-- SECOND ROW FOR SORT OPTIONS -->
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="sortScholarshipProgram">Program</label>
                        <select name="sortScholarshipProgram" id="sortScholarshipProgram" class="form-control">
                          <option value="0">ALL</option>
                          <?php
                            if($result = mysqli_query($conn, "SELECT * FROM scholarship_program")){
                              $count = 1;
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <option
                                ';
                                if(isset($_POST['sortScholarshipProgram']) && $_POST['sortScholarshipProgram'] == $count){
                                  echo 'selected value="'.$count.'">'.$row['program_name'].'</option>';
                                }else{
                                  echo 'value="'.$count.'">'.$row['program_name'].'</option>';
                                }
                                $count++;
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="sortSemester">Semester</label>
                        <select name="sortSemester" id="sortSemester" class="form-control">
                          <option value="0">ALL</option>
                          <option <?php if(isset($_POST['sortSemester']) && $_POST['sortSemester'] == "1st Semester" ) echo 'selected'?> value="1st Semester">1st Semester</option>
                          <option <?php if(isset($_POST['sortSemester']) && $_POST['sortSemester'] == "2nd Semester" ) echo 'selected'?> value="2nd Semester">2nd Semester</option>
                          <option <?php if(isset($_POST['sortSemester']) && $_POST['sortSemester'] == "Off Semester" ) echo 'selected'?> value="Off Semester">Off Semester</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="toYear">To</label>
                        <?php
                          if(isset($_POST['semesterFromYear'])){
                            $fromYear = $_POST['semesterFromYear'];
                            echo '<input type="text" class="form-control" name="semesterFromYear" id="semesterFromYear" value="'.$fromYear.'" placeholder="Enter year...">';
                          }else{
                            echo '<input type="text" class="form-control" name="semesterFromYear" id="semesterFromYear" placeholder="Enter year...">';
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="toYear">From</label>
                        <?php
                          if(isset($_POST['semesterToYear'])){
                            $toYear = $_POST['semesterToYear'];
                            echo '<input type="text" class="form-control" name="semesterToYear" id="semesterToYear" value="'.$toYear.'" placeholder="Enter year...">';
                          }else{
                            echo '<input type="text" class="form-control" name="semesterToYear" id="semesterToYear" placeholder="Enter year...">';
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="sortCourse">Course</label>
                        <select name="sortCourse" id="sortCourse" class="form-control">
                          <option  value="0">All</option>
                          <?php
                            if($result = mysqli_query($conn, "SELECT * FROM course")){
                              $count = 1;
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <option
                                ';
                                if(isset($_POST['sortCourse']) && $_POST['sortCourse'] == $count){
                                  echo 'selected value="'.$count.'">'.$row['title'].'</option>';
                                }else{
                                  echo 'value="'.$count.'">'.$row['title'].'</option>';
                                }
                                $count++;
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="scholarship-type">Status</label>
                        <select name="status" id="status" class="form-control">
                          <option  value="0">All</option>
                          <option <?php if(isset($_POST['status']) && $_POST['status'] == 'RELEASED' ) echo 'selected'?> value="RELEASED">RELEASED</option>
                          <option <?php if(isset($_POST['status']) && $_POST['status'] == 'NOT RELEASED' ) echo 'selected'?> value="NOT RELEASED">NOT RELEASED</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="sortRecordStats">Record Status</label>
                        <select name="record-status" id="record-status" class="form-control">
                          <option value="0">ALL</option>
                          <option <?php if(isset($_POST['record-status']) && $_POST['record-status'] == 1 ) echo 'selected'?> value="1">Active</option>
                          <option <?php if(isset($_POST['record-status']) && $_POST['record-status'] == 2 ) echo 'selected'?> value="2">Backlogged</option>
                          <option <?php if(isset($_POST['record-status']) && $_POST['record-status'] == 3 ) echo 'selected'?> value="3">Archived</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <label for="sortSubmit">Filter by</label>
                      <input type="submit" value="Filter" class="btn btn-primary form-control">
                    </div>
                    <div class="col">
                      <label for="clearSelection">Clear Filter</label>
                      <input type="submit" id="clearSelection" value="Clear" class="btn btn-dark form-control">
                    </div>
                  </div>
                  <div id="allowance-table-container">
                    <table class="table table-hover table-bordered" id="allowance-table">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="select-all-allowance"></th>
                          <th hidden>Student ID</th>
                          <th>Surname</th>
                          <th> First Name</th>
                          <th>Middle Name</th>
                          <th>Scholarship Program</th>
                          <th>Course</th>
                          <th>Semester</th>
                          <th>Status</th>
                          <th>Date Set</th>
                        </tr>
                      </thead>
                      <tbody id="allowance-table-body">
                        <?php
                          //Filter query conditions to database
                          $query = "SELECT * FROM scholarship_general_info as sgi JOIN scholarship_program AS sp ON sp.program_id = sgi.program_id WHERE sgi.student_status = 1";
                          if(isset($_POST['sortScholarshipProgram']) && isset($_POST['sortCourse']) && isset($_POST['status']) && isset($_POST['sortSemester']) && isset($_POST['semesterToYear']) && isset($_POST['semesterFromYear']) && isset($_POST['record-status'])){
                            $semester_year = null;
                            $year = null;
                            $sortProgram = $_POST['sortScholarshipProgram'];
                            $sortCourse = $_POST['sortCourse'];
                            $sortStatus = $_POST['status'];
                            $recordStatus = $_POST['record-status'];
  
                            $fromYear = trim($_POST['semesterFromYear']);
                            $toYear = trim($_POST['semesterToYear']);
                            $semester = $_POST['sortSemester'];
  
                            if(!empty($semester) && !empty($fromYear) && !empty($toYear)){
                              $semester_year = $semester .' '.$fromYear.'-'.$toYear;
                              $semester = null;
                            }else if(!empty($fromYear) && !empty($toYear)){
                              $year = $fromYear.'-'.$toYear;
                            }
                            if($sortProgram != 0){
                              $query .= " AND sp.program_id = $sortProgram";
                            }
                            if(!empty($sortStatus)){
                              $query .= " AND sgi.allowance_status = '$sortStatus'";
                            }
                            if($sortCourse != 0){
                              $query .= " AND sgi.course_id = $sortCourse";
                            }
                            if(!empty($year)){
                              $query .= " AND sgi.year = '$year'";
                            }
                            if(!empty($semester)){
                              $query .= " AND sgi.semester = '$semester'";
                            }
                            if(!empty($semester_year)){
                              $query .= " AND sgi.semester_year = '$semester_year'";
                            }

                            //for the records status
                            if($recordStatus == 1){ //for active records
                              $query .= " AND sgi.semester_year = '$currSemesterYear' AND sgi.record_status = 0";
                            }else if($recordStatus == 2){ //for backlogged records
                              $query .= " AND sgi.semester_year != '$currSemesterYear' AND sgi.record_status = 0";
                            }else if($recordStatus == 3){ //for archived records
                              $query .= " AND sgi.record_status = 1";
                            }
                          }
                          $query .= " ORDER BY sgi.semester_year DESC ";
                          //echo $sortProgram.' '.$sortCourse.' '.$sortType.' '.$year.' '.$semester.' '.$semester_year;
                          // echo $query; //FOR DEBUG PURPOSES FOR FUTURE DEVELOPERS!!!
                          //for current and backlogged records
                          if($result = mysqli_query($conn,$query)){
                            while($row = mysqli_fetch_array($result)){
                              $sem = $currSemesterYear == $row['semester_year'];
                              $status = $row['record_status'];
                              if($sem && $status == 0){ //active records
                                echo '
                                  <tr class="clickable">
                                    <td hidden><input type="text" name="student" value='.$row['student_id'].'></td>
                                    <td><input type="checkbox" name="select[]" value='.$row['grantee_id'].'></td>
                                ';
                              }else if(!$sem && $status == 0){ //backlogged records
                                echo '
                                  <tr class="table-danger text-danger clickable">
                                    <td hidden><input type="text" name="student" value='.$row['student_id'].'></td>
                                    <td><input type="checkbox" name="select[]" value='.$row['grantee_id'].'></td>
                                ';
                              }else{ //archived records
                                echo '
                                  <tr class="bg-secondary text-white">
                                    <td hidden><input type="text" name="student" value='.$row['student_id'].'></td>
                                    <td>Archived!</td>
                                ';
                              }
                              echo '

                                  <td>'.$row['last_name'].'</td>
                                  <td>'.$row['first_name'].'</td>
                                  <td>'.$row['middle_name'].'</td>
                                  <td>'.$row['program_name'].'</td>
                                  <td>'.$row['coursename'].'</td>
                                  <td>'.$row['semester_year'].'</td>
                                  <td>'.$row['allowance_status'].'</td>
                                  <td>'.$row['allowance_set_date'].'</td>
                                </tr>
                              ';
                            }
                          }
                          //close to avoid mysqli server connection limit
                          $conn->close();
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../../js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/jquery.table2excel.js"></script>
    <?php
      if(isset($_GET['selection']) && $_GET['selection'] == 'empty'){
        echo '
          <script>
            Swal.fire(
              "Update failed!",
              "Select rows using the checkboxes.",
              "error"
            )
          </script>
        ';
      }
      if(isset($_GET['operation']) && isset($_GET['set-status']) && $_GET['operation'] == 'success'){
        echo '
          <script>
            Swal.fire(
              "Update successful!",
              "Row/s has been updated to RELEASED.",
              "success"
            )
          </script>
        ';
      }
      if(isset($_GET['operation']) && isset($_GET['unset-status']) && $_GET['operation'] == 'success'){
        echo '
          <script>
            Swal.fire(
              "Update successful!",
              "Row/s has been reverted to NOT RELEASED.",
              "info"
            )
          </script>
        ';
      }
    ?>
    <script type="text/javascript"> 
      //CLEAR GET VARIABLES
      if(typeof window.history.pushState == 'function') {
          window.history.pushState({}, "Hide", "status-tracker-allowance.php");
      }
      //PREVENT RESEND
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      //ALL VANILLA JAVASCRIPT
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
      //JQUERY  
      $(document).ready(function(){
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

        //after setting and unsetting status
        function setValidation(){
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6', //get color scheme
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed){
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
        }
        //clear filter function
        $('#clearSelection').on('click', function(){
          $('#sortScholarshipProgram option[value="0"]').prop("selected", "selected");
          $('#sortSemester option[value="0"]').prop("selected", "selected");
          $('#sortCourse option[value="0"]').prop("selected", "selected");
          $('#status option[value="0"]').prop("selected", "selected");
          $('#semesterFromYear').val('');
          $('#semesterToYear').val('');
          $('#record-status option[value="0"]').prop("selected", "selected");
        })
        //Data Tables
        var allowance_table = $('#allowance-table').DataTable({
          "ordering": false
        });

        //SELECT ALL CHECKBOX
        $("#allowance-table-container #select-all-allowance").click(function(){
          $("#allowance-table-container input[type='checkbox']").prop('checked', this.checked);
        })
        //EXPORT FUNCTION
        $("#export-button").click(function(){
          allowance_table.column(0).visible(false);
          $("#allowance-table").table2excel({
            // exclude CSS class
            exclude: ".ms-excel",
            name: "Worksheet Name",
            filename: "Allowance Status.xls" //do not include extension
          });
          setTimeout(() => {
            allowance_table.column(0).visible(true);
          }, 3000);
        });
      })//END OF JQUERY SCRIPT
    </script>
  </body>
</html>