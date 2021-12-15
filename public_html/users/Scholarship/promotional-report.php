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
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl" onload="initClock()">
    <!-- Navbar-->
    <header class="app-header">
      <!-- CODE HERE -->
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
          <a class="app-menu__item active" href="promotional-report.php">
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
      </div> <!-- END OF NAVBAR -->
      <!-- Main Content -->
      <div class="main-content-student">
        <!-- TABLE -->
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-title">
                <!-- FIRST ROW CONTAINING THE TITLE -->
                <div class="float-left">
                  <h4>Promotional Report</h4>
                </div>
                <div class="float-right">
                  <p>
                    <a class="btn btn-danger icon-btn" id="export-button" href="#">
                      <i class="fa fa-list-ul"></i>Export</a>
                    </p>
                  </div>
                  <!-- CLEARFIX FOR BOTH FOR FLOATED ELEMENTS -->
                  <div class="clearfix"></div>
                </div>
                <div class="tile-body" style="overflow-x:auto;">
                  <form action="" method="POST">
                    <div class="row">
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
                      <div class="col-sm">
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
                      <div class="col-sm">
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
                                while($row = mysqli_fetch_array($result)){
                                  echo '
                                    <option
                                  ';
                                  if(isset($_POST['sortCourse']) && $_POST['sortCourse'] == $row['name']){
                                    echo 'selected value="'.$row['name'].'">'.$row['title'].'</option>';
                                  }else{
                                    echo 'value="'.$row['name'].'">'.$row['title'].'</option>';
                                  }
                                }
                              }
                            ?>
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
                        <label for="sortRecordStats">Filter By</label>
                        <input type="submit" value="Filter" class="btn btn-primary form-control">
                      </div>
                      <div class="col">
                        <label for="sortRecordStats">Clear Filter</label>
                        <input type="submit" id="clearSelection" value="Clear" class="btn btn-dark form-control">
                      </div>
                    </div>
                  </form>
                <table class="table table-hover table-bordered table-responsive" id="pr-table">
                  <thead>
                    <tr>
                      <th>Record Status</th>
                      <th hidden>ID</th>
                      <th>No.</th>
                      <th></th>
                      <th>Surname</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Semester</th>
                      <th>Ext Name</th>
                      <th>Sex</th>
                      <th>Birthdate</th>
                      <th>Course</th>
                      <th>Curr. Yr Level</th>
                      <th>Subject</th>
                      <th>Grade</th>
                      <th>Units</th>
                      <th>Subject</th>
                      <th>Grade</th>
                      <th>Units</th>
                      <th>Subject</th>
                      <th>Grade</th>
                      <th>Units</th>
                      <th>Subject</th>
                      <th>Grade</th>
                      <th>Units</th>
                      <th>Subject</th>
                      <th>Grade</th>
                      <th>Units</th>
                      <th>Subject</th>
                      <th>Grade</th>
                      <th>Units</th>
                      <th>Subject</th>
                      <th>Grade</th>
                      <th>Units</th>
                      <th>Subject</th>
                      <th>Grade</th>
                      <th>Units</th>
                      <th>Subject</th>
                      <th>Grade</th>
                      <th>Units</th>
                      <th>Total Units</th>
                      <th>GWA</th>
                      <th>Graduate (Yes/No)?</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = "SELECT * FROM promotional_report AS pr JOIN scholarship_general_info AS sgi ON pr.grantee_id = sgi.grantee_id WHERE 1";

                      if(isset($_POST['sortSemester']) && isset($_POST['semesterFromYear']) && isset($_POST['semesterToYear']) && isset($_POST['sortCourse']) && isset($_POST['record-status'])){
                        $semester_year = null;
                        $year = null;
                        $sortCourse = $_POST['sortCourse'];
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
                        if($sortCourse != 0){
                          $query .= " AND sgi.coursename = '$sortCourse'";
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

                      $query .= " ORDER BY sgi.semester_year DESC";
                      if($result = mysqli_query($conn, $query)){
                        $no = 0;
                        while($row = mysqli_fetch_array($result)){
                          $no ++;
                          $sem = $currSemesterYear == $row['semester_year'];
                          $status = $row['record_status'];
                          if($sem && $status == 0){ //active records
                            echo '
                              <tr class="clickable">
                              <td>Active</td>
                            ';
                          }else if(!$sem && $status == 0){ //backlogged records
                            echo '
                              <tr class="table-danger text-danger clickable">
                              <td>Backlogged</td>
                            ';
                          }else{ //archived records
                            echo '
                              <tr class="bg-secondary text-white">
                              <td>Archived!</td>
                            ';
                          }
                          echo'
                              <td hidden>'.$row['id'].'</td>
                              <td>'. $no.'</td>
                              <td>'. $row['student_id'].'</td>
                              <td>'. $row["last_name"].'</td>
                              <td>'. $row["first_name"].'</td>
                              <td>'. $row["middle_name"].'</td>
                              <td>'. $row['semester_year'].'</td>
                              <td>'. $row["suffix"].'</td>
                              <td>'. $row["sex"].'</td>
                              <td>'. $row["birthdate"].'</td>
                              <td>'. $row["course"].'</td>
                              <td>'. $row['student_yearlevel'].'</td>
                              <td>'. $row['subject_code1'].'</td>
                              <td>'. $row['grade1'].'</td>
                              <td>'. $row['units1'].'</td>
                              <td>'. $row['subject_code2'].'</td>
                              <td>'. $row['grade2'].'</td>
                              <td>'. $row['units2'].'</td>
                              <td>'. $row['subject_code3'].'</td>
                              <td>'. $row['grade3'].'</td>
                              <td>'. $row['units3'].'</td>
                              <td>'. $row['subject_code4'].'</td>
                              <td>'. $row['grade4'].'</td>
                              <td>'. $row['units4'].'</td>
                              <td>'. $row['subject_code5'].'</td>
                              <td>'. $row['grade5'].'</td>
                              <td>'. $row['units5'].'</td>
                              <td>'. $row['subject_code6'].'</td>
                              <td>'. $row['grade6'].'</td>
                              <td>'. $row['units6'].'</td>
                              <td>'. $row['subject_code7'].'</td>
                              <td>'. $row['grade7'].'</td>
                              <td>'. $row['units7'].'</td>
                              <td>'. $row['subject_code8'].'</td>
                              <td>'. $row['grade8'].'</td>
                              <td>'. $row['units8'].'</td>
                              <td>'. $row['subject_code9'].'</td>
                              <td>'. $row['grade9'].'</td>
                              <td>'. $row['units9'].'</td>
                              <td>'. $row['totalunits'].'</td>
                              <td>'. $row['gwa'].'</td>
                              <td>'. $row['graduate_question'].'</td>
                            </tr>
                          ';
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
      <!-- MODAL FOR ADD-->
      <div class="modal fade" id="promotionalAddModal" tabindex="1" role="dialog" aria-labelledby="promotionalAddModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h3 class="modal-title">
              <span id="modal_header_name" value=""></span></h3>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form method="POST" class="needs-validation" novalidate action="../../php/updatePromotional.php">
              <input type="text" id="id_marker" name="id" hidden >
              <div class="modal-body">
                <div class="row">
                  <div class="col-8">
                    <input id="modal_header" name="modal_header" value="" hidden >
                    <h5>Subject</h5>
                  </div>
                  <div class="col-4">
                    <h5>Grade</h5>
                    <input type="text" class="form-control" id="totalunits" name="totalunits" hidden>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <input type="text" class="form-control" id="subject1" name="subject1" readonly>
                    <input type="text" class="form-control" id="units1" name="units1" hidden>
                  </div>
                  <div class="col-4">
                    <select name="grade1" id="grade1" class="form-control">
                        <option value="0">Please Select</option>
                        <option value="6">INC</option>
                        <option value="5">5.0</option>
                        <option value="3">3.0</option>
                        <option value="2.75">2.75</option>
                        <option value="2.5">2.50</option>
                        <option value="2.25">2.25</option>
                        <option value="2">2.0</option>
                        <option value="1.75">1.75</option>
                        <option value="1.5">1.50</option>
                        <option value="1.25">1.25</option>
                        <option value="1">1.0</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-8">
                    <input type="text" class="form-control" id="subject2" name="subject2" readonly>
                    <input type="text" class="form-control" id="units2" name="units2" hidden>
                  </div>
                  <div class="col-4">
                    <select name="grade2" id="grade2" class="form-control">
                        <option value="0">Please Select</option>
                        <option value="6">INC</option>
                        <option value="5">5.0</option>
                        <option value="3">3.0</option>
                        <option value="2.75">2.75</option>
                        <option value="2.5">2.50</option>
                        <option value="2.25">2.25</option>
                        <option value="2">2.0</option>
                        <option value="1.75">1.75</option>
                        <option value="1.5">1.50</option>
                        <option value="1.25">1.25</option>
                        <option value="1">1.0</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-8">
                    <input type="text" class="form-control" id="subject3" name="subject3" readonly>
                    <input type="text" class="form-control" id="units3" name="units3" hidden>
                  </div>
                  <div class="col-4">
                    <select name="grade3" id="grade3" class="form-control">
                        <option value="0">Please Select</option>
                        <option value="6">INC</option>
                        <option value="5">5.0</option>
                        <option value="3">3.0</option>
                        <option value="2.75">2.75</option>
                        <option value="2.5">2.50</option>
                        <option value="2.25">2.25</option>
                        <option value="2">2.0</option>
                        <option value="1.75">1.75</option>
                        <option value="1.5">1.50</option>
                        <option value="1.25">1.25</option>
                        <option value="1">1.0</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-8">
                    <input type="text" class="form-control" id="subject4" name="subject4" readonly>
                    <input type="text" class="form-control" id="units4" name="units4" hidden>
                  </div>
                  <div class="col-4">
                    <select name="grade4" id="grade4" class="form-control">
                        <option value="0">Please Select</option>
                        <option value="6">INC</option>
                        <option value="5">5.0</option>
                        <option value="3">3.0</option>
                        <option value="2.75">2.75</option>
                        <option value="2.5">2.50</option>
                        <option value="2.25">2.25</option>
                        <option value="2">2.0</option>
                        <option value="1.75">1.75</option>
                        <option value="1.5">1.50</option>
                        <option value="1.25">1.25</option>
                        <option value="1">1.0</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-8">
                    <input type="text" class="form-control" id="subject5" name="subject5" readonly>
                    <input type="text" class="form-control" id="units5" name="units5" hidden>
                  </div>
                  <div class="col-4">
                    <select name="grade5" id="grade5" class="form-control">
                        <option value="0">Please Select</option>
                        <option value="6">INC</option>
                        <option value="5">5.0</option>
                        <option value="3">3.0</option>
                        <option value="2.75">2.75</option>
                        <option value="2.5">2.50</option>
                        <option value="2.25">2.25</option>
                        <option value="2">2.0</option>
                        <option value="1.75">1.75</option>
                        <option value="1.5">1.50</option>
                        <option value="1.25">1.25</option>
                        <option value="1">1.0</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-8">
                    <input type="text" class="form-control" id="subject6" name="subject6" readonly>
                    <input type="text" class="form-control" id="units6" name="units6" hidden>
                  </div>
                  <div class="col-4">
                    <select name="grade6" id="grade6" class="form-control">
                        <option value="0">Please Select</option>
                        <option value="6">INC</option>
                        <option value="5">5.0</option>
                        <option value="3">3.0</option>
                        <option value="2.75">2.75</option>
                        <option value="2.5">2.50</option>
                        <option value="2.25">2.25</option>
                        <option value="2">2.0</option>
                        <option value="1.75">1.75</option>
                        <option value="1.5">1.50</option>
                        <option value="1.25">1.25</option>
                        <option value="1">1.0</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-8">
                    <input type="text" class="form-control" id="subject7" name="subject7" readonly>
                    <input type="text" class="form-control" id="units7" name="units7" hidden>
                  </div>
                  <div class="col-4">
                    <select name="grade7" id="grade7" class="form-control">
                        <option value="0">Please Select</option>
                        <option value="6">INC</option>
                        <option value="5">5.0</option>
                        <option value="3">3.0</option>
                        <option value="2.75">2.75</option>
                        <option value="2.5">2.50</option>
                        <option value="2.25">2.25</option>
                        <option value="2">2.0</option>
                        <option value="1.75">1.75</option>
                        <option value="1.5">1.50</option>
                        <option value="1.25">1.25</option>
                        <option value="1">1.0</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-8">
                    <input type="text" class="form-control" id="subject8" name="subject8" readonly>
                    <input type="text" class="form-control" id="units8" name="units8" hidden>
                  </div>
                  <div class="col-4">
                    <select name="grade8" id="grade8" class="form-control">
                        <option value="0">Please Select</option>
                        <option value="6">INC</option>
                        <option value="5">5.0</option>
                        <option value="3">3.0</option>
                        <option value="2.75">2.75</option>
                        <option value="2.5">2.50</option>
                        <option value="2.25">2.25</option>
                        <option value="2">2.0</option>
                        <option value="1.75">1.75</option>
                        <option value="1.5">1.50</option>
                        <option value="1.25">1.25</option>
                        <option value="1">1.0</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-8">
                    <input type="text" class="form-control" id="subject9" name="subject9" readonly>
                    <input type="text" class="form-control" id="units9" name="units9" hidden>
                  </div>
                  <div class="col-4">
                    <select name="grade9" id="grade9" class="form-control">
                        <option value="0">Please Select</option>
                        <option value="6">INC</option>
                        <option value="5">5.0</option>
                        <option value="3">3.0</option>
                        <option value="2.75">2.75</option>
                        <option value="2.5">2.50</option>
                        <option value="2.25">2.25</option>
                        <option value="2">2.0</option>
                        <option value="1.75">1.75</option>
                        <option value="1.5">1.50</option>
                        <option value="1.25">1.25</option>
                        <option value="1">1.0</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
                <button class="btn btn-warning" type="submit" name="updatePromotional">SUBMIT</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
    
    <!-- Essential javascripts for application to work-->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../../js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dropzone.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/jquery.table2excel.js"></script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      //CLEAR GET VARIABLES
      if(typeof window.history.replaceState == 'function') {
          window.history.replaceState({}, "Hide", "promotional-report.php");
      }
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
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

      //JQUERY SCRIPTS
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
        //data table
        var pr_table = $('#pr-table').DataTable({
          "ordering": false,
          "columnDefs":[{
            "targets": 1,
            "visible": true,
          }],
        });
        $("#export-button").click(function(){
          $("#pr-table").table2excel({
              // exclude CSS class
              exclude: ".ms-excel",
              name: "Worksheet Name",
          filename: "Promotional Report.xls" //do not include extension
          })
        });
        $('#pr-table').on('click', 'tbody .bg-secondary', function(e){
          Swal.fire(
              "This record is archived!",
              "",
              "info"
            )
        })
        $('#pr-table').on('click','tbody tr:not(.bg-secondary)',function(e){
          e.preventDefault();

          var currentRow = $(this).closest("tr"); //SELECT ROW
          var id = $('#pr-table').DataTable().row(currentRow).data();//gets who data within table only including hidden values
          var student_id = id[1];
          console.log(student_id);
          if(id == null){
            //NOTIFICATION THAT NO RECORD EXISTS IN THIS ROW
          }else{ 
            $.ajax({//AJAX REQUEST FOR PROVIDER DATA
              url: '../../php/fetchPromotionalReport.php',
              method: 'POST',
              data:{student_id:student_id},
              dataType: 'JSON',
              success:function(data){
                console.log(data);
                if(data[1] == null){
                  $('#grade1').attr('disabled', 'disabled');
                }
                $('#subject1').val(data[0]);
                $('#units1').val(data[1]);
                if(data[2] == null){
                  $('#grade2').attr('disabled', 'disabled');
                }
                $('#subject2').val(data[2]);
                $('#units2').val(data[3]);
                if(data[4] == null){
                  $('#grade3').attr('disabled', 'disabled');
                }
                $('#subject3').val(data[4]);
                $('#units3').val(data[5]);
                if(data[6] == null){
                  $('#grade4').attr('disabled', 'disabled');
                }
                $('#subject4').val(data[6]);
                $('#units4').val(data[7]);
                if(data[8] == null){
                  $('#grade5').attr('disabled', 'disabled');
                }
                $('#subject5').val(data[8]);  
                $('#units5').val(data[9]);
                if(data[10] == null){
                  $('#grade6').attr('disabled', 'disabled');
                }
                $('#subject6').val(data[10]);
                $('#units6').val(data[11]);
                if(data[12] == null){
                  $('#grade7').attr('disabled', 'disabled');
                }
                $('#subject7').val(data[12]);
                $('#units7').val(data[13]);
                if(data[14] == null){
                  $('#grade8').attr('disabled', 'disabled');
                }
                $('#subject8').val(data[14]);
                $('#units8').val(data[15]);
                if(data[16] == null){
                  $('#grade9').attr('disabled', 'disabled');
                }
                $('#subject9').val(data[16]);
                $('#units9').val(data[17]);
                $('#totalunits').val(data[20]);
                $('#modal_header').val(data[18]);
                $('#modal_header_name').text(data[19]);
                $('#grade1').val(data[21]);
                $('#grade2').val(data[22]);
                $('#grade3').val(data[23]);
                $('#grade4').val(data[24]);
                $('#grade5').val(data[25]);
                $('#grade6').val(data[26]);
                $('#grade7').val(data[27]);
                $('#grade8').val(data[28]);
                $('#grade9').val(data[29]);
                $('#id_marker').val(data[30]);
                console.log(data[22]);
              }
            })
            $('#promotionalAddModal').modal('show');
          }
        })
      })
    </script>
  </body>
</html>