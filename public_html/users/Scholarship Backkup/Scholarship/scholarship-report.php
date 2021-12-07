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
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
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
          <a class="app-menu__item active" href="scholarship-report.php">
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

    <main class="app-content" id="main-content">
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
       <!-- Title of Content -->
      <div id="main-content-scholar">
        <!-- Table -->
        <div class="row">
          <div class="col">
            <div class="tile">
              <div class="tile-body">
                <!-- first row or TITLE -->
                <div class="float-left">
                  <h4>Reports</h4>
                </div>

                <div class="float-right">
                  <p>
                    <a class="btn btn-danger icon-btn" id="export-button" href="#">
                      <i class="fa fa-list-ul"></i>Export</a>
                  </p>
                </div>

                <!-- CLEARFIX FOR BOTH FOR FLOATED ELEMENTS -->
                <div class="clearfix"></div>
                <!-- SECOND ROW FOR SORT OPTIONS -->
                <!-- FILTER -->
                <form action="" method="POST">
                  <div class="row mb-4">
                    <div class="col-xl">
                      <div class="form-group">
                        <label for="sortSemester">Semester</label>
                        <select name="sortSemester" id="sortSemester" class="form-control" required>
                          <option value="0">ALL</option>
                          <option <?php if(isset($_POST['sortSemester']) && $_POST['sortSemester'] == "1st Semester" ) echo 'selected'?> value="1st Semester">1st Semester</option>
                          <option <?php if(isset($_POST['sortSemester']) && $_POST['sortSemester'] == "2nd Semester" ) echo 'selected'?> value="2nd Semester">2nd Semester</option>
                          <option <?php if(isset($_POST['sortSemester']) && $_POST['sortSemester'] == "Off Semester" ) echo 'selected'?> value="Off Semester">Off Semester</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xl">
                      <div class="form-group">
                        <label for="toYear">To</label>
                        <?php
                          if(isset($_POST['semesterFromYear'])){
                            $fromYear = $_POST['semesterFromYear'];
                            echo '<input type="text" class="form-control" name="semesterFromYear" id="semesterFromYear" value="'.$fromYear.'" placeholder="Enter year...">';
                          }else{
                            echo '<input type="text" class="form-control" name="semesterFromYear" id="semesterFromYear" placeholder="Enter year..." required>';
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-xl">
                      <div class="form-group">
                        <label for="toYear">From</label>
                        <?php
                          if(isset($_POST['semesterToYear'])){
                            $toYear = $_POST['semesterToYear'];
                            echo '<input type="text" class="form-control" name="semesterToYear" id="semesterToYear" value="'.$toYear.'" placeholder="Enter year...">';
                          }else{
                            echo '<input type="text" class="form-control" name="semesterToYear" id="semesterToYear" placeholder="Enter year..." required>';
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-xl">
                      <label for="sortRecordStats">Filter By</label>
                      <input type="submit" value="Filter" class="btn btn-primary form-control">
                    </div>
                    <div class="col-xl">
                      <label for="sortRecordStats">Record Status</label>
                      <input type="submit" id="clearSelection" value="Clear" class="btn btn-dark form-control">
                    </div>
                  </div>
                </form>
                <hr>
                <table class="table table-borderless" id="scholarship-report-table">
                  <!-- <thead>
                    <tr>
                      <th>A</th>
                      <th>B</th>
                      <th>C</th>
                      <th>D</th>
                      <th>E</th>
                      <th>F</th>
                      <th>G</th>
                    </tr>
                  </thead> -->
                  <tbody>
                    <tr>
                      <td colspan="7" style="text-align: center;"><b>SUMMARY</b></td>
                    </tr>
                    <tr>
                      <td><b>Externally Funded</b></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                      <?php
                        // echo $currSemesterYear . "asdas";
                        $query = "SELECT sf_get_scholarship_name(program_id) as program, count(program_id), program_id FROM scholarship_general_info WHERE program_provider != 'University' AND status_name COLLATE utf8mb4_general_ci = 'Enrolled'";
                        $query2 = "SELECT count(student_id) FROM scholarship_general_info WHERE program_provider != 'University' AND student_status = 1";
                        if(isset($_POST['sortSemester']) && isset($_POST['semesterToYear']) && isset($_POST['semesterFromYear'])){
                          $semester_year = null;

                          $fromYear = trim($_POST['semesterFromYear']);
                          $toYear = trim($_POST['semesterToYear']);
                          $semester = $_POST['sortSemester'];

                          if(!empty($semester) && !empty($fromYear) && !empty($toYear)){
                            $semester_year = $semester .' '.$fromYear.'-'.$toYear;
                            $query .= " AND semester_year = '$semester_year'";
                            $query2 .= " AND semester_year = '$semester_year'";
                          }
                        }else{
                          $query .= " AND semester_year = '$currSemesterYear'";
                          $query2 .= " AND semester_year = '$currSemesterYear'";
                        }
                        $query .= " GROUP BY program_id";
                        if($result = mysqli_query($conn,$query)){
                          if(mysqli_num_rows($result) == 0){
                            echo'
                              <tr class="bordered-cell">
                                <td colspan="7"><center><b>NO DATA FOUND!</b></center></td>
                              </tr>
                            ';
                          }
                          while($row = mysqli_fetch_array($result)){
                            echo'
                              <tr>
                                <td></td>
                                <td>'.$row['program'].'</td>
                                <td></td>
                                <td></td>
                                <td>'.$row['count(program_id)'].'</td>
                                <td></td>
                                <td></td>
                              </tr>
                            ';
                          }
                        }else{
                          echo 'Something went wrong with query... Contact Administrator!';
                        }
                        if($result = mysqli_query($conn, $query2)){
                          while($row = mysqli_fetch_array($result)){
                            echo'
                              <tr>
                                <td colspan="4" align="right">Total number of Under Graduate Scholars</td>
                                <td>'.$row['count(student_id)'].'</td>
                                <td></td>
                                <td></td>
                              </tr>
                            ';
                          }
                        }else{
                          echo 'Something went wrong with query2... Contact Administrator!';
                        }
                      ?>
                    <!-- end of first half and spacer -->
                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td colspan="7"><center><b>Submitted by:</b></center></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"><center><b>ENTER NAME HERE</b></center></td>
                    </tr>
                    <tr>
                      <td colspan="7"><center>Scholarship In-Charge</center></td>
                    </tr>
                    <tr>
                      <td colspan="7"><center>Tagum Unit</center></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    
                    <tr>
                      <td colspan="7"><center><b>Noted:</b></center></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="3"><center><b>ENTER NAME HERE</b></center></td>
                      <td colspan="3"><center><b>ENTER NAME HERE</b></center></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td colspan="3"><center>OSAS Coordinator</center></td>
                      <td colspan="3"><center>DEAN, CARS</center></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td colspan="3"><center>Tagum Unit</center></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"><center><b>Approved:</b></center></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td colspan="7"></td>
                    </tr>
                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"><center><b>ENTER NAME HERE</b></center></td>
                    </tr>

                    <tr>
                      <td colspan="7"><center>OIC Chancellor</center></td>
                    </tr>
                    
                    <tr class="centered-text-cell">
                      <td style="border: 1px solid;">Seq.</td>
                      <td style="border: 1px solid;">FULL NAME</td>
                      <td colspan="2" style="border: 1px solid;">PROGRAM COURSE</td>
                      <td style="border: 1px solid;">YEAR LEVEL</td>
                      <td style="border: 1px solid;">GWA for the previous semester</td>
                      <td style="border: 1px solid;">Scholarship Status</td>
                    </tr>
                    <?php
                      if($result = mysqli_query($conn, $query)){
                        if(mysqli_num_rows($result) == 0){
                          echo'
                            <tr class="bordered-cell">
                              <td colspan="7"><center><b>NO DATA FOUND!</b></center></td>
                            </tr>
                          ';
                        }
                        while($row = mysqli_fetch_array($result)){
                          $program_id = $row['program_id'];
                          $scholarshipProgram = $row['program'];
                          $scholarshipCount = $row['count(program_id)'];
                          echo'
                            <tr class="bordered-cell">
                              <td colspan="7"><b>'.$row['program'].'</b></td>
                            </tr>
                          ';
                          $query3 = "SELECT sgi.*, pr.gwa FROM scholarship_general_info AS sgi JOIN promotional_report AS pr ON sgi.grantee_id = pr.grantee_id WHERE sgi.program_id = $program_id";
                          if(isset($_POST['sortSemester']) && isset($_POST['semesterToYear']) && isset($_POST['semesterFromYear'])){
                            if(!empty($semester) && !empty($fromYear) && !empty($toYear)){
                              $semester_year = $semester .' '.$fromYear.'-'.$toYear;
                              $query3 .= " AND sgi.semester_year = '$semester_year'";
                            }
                          }else{
                              $query3 .=" AND sgi.semester_year = '$currSemesterYear'";
                          }
                          if($result1 = mysqli_query($conn, $query3)){
                            $count = 0;
                            while($row1 = mysqli_fetch_array($result1)){
                              $count++;
                              echo'
                                <tr>
                                  <td style="border: 1px solid;">'.$count.'</td>
                                  <td style="border: 1px solid;">'.$row1['last_name'].', '.$row1['first_name'].' '.$row1['middle_name'].'</td>
                                  <td colspan="2" style="border: 1px solid;">'.$row1['coursename'].'</td>
                                  <td style="border: 1px solid;">'.$row1['year_level'].'</td>
                                  <td style="border: 1px solid;">'.$row1['gwa'].'</td>
                                  <td style="border: 1px solid;">Enter Status</td>
                                </tr>
                              ';
                            }
                          }else{
                            echo 'Something went wrong... Contact Administrator!';
                          }
                        }
                      }else{
                          echo 'Something went wrong... Contact Administrator!';
                      }
                      // echo $query;
                    ?>
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </main> 

    <!-- FONTAWESOME -->
    <!-- Essential javascripts for application to work-->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../../js/plugins/pace.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/jquery.table2excel.js"></script>

    <script type="text/javascript">
      var month, year;
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
          if(typeof month === 'undefined'){
            month = mo;
            year = yr;
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

      // Use the outerHTML attribute to get the HTML code of the entire table element (including the <Table> tag), and then wrap it into a complete HTML document. Set charset to urf-8 to prevent garbled code
      var html = "<html><head><meta charset='utf-8'/></head><body>" + document.getElementsByTagName("table")[0].outerHTML + "</body></html>";

      // Instantiate a Blob object. The first parameter of its constructor is an array containing file contents, and the second parameter is an object containing file type attributes
      var blob = new Blob([html], { type: "application/vnd.ms-excel" });
      var exportButton = document.getElementById("export-button");

      // Use URL.createObjectURL() method to generate the Blob URL for the a tag.
      exportButton.href = URL.createObjectURL(blob);
      
      //export button & name
      exportButton.download = "Scholarship Report.xls";

      //JQUERY FUNCTIONS
      $(document).ready(function(){
        //logout function
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
        //clear filter function
        $('#clearSelection').on('click', function(){
          $('#sortScholarshipProgram option[value="0"]').prop("selected", "selected");
          $('#sortSemester option[value="0"]').prop("selected", "selected");
          $('#sortCourse option[value="0"]').prop("selected", "selected");
          $('#scholarship-type option[value="0"]').prop("selected", "selected");
          $('#student-status option[value="1"]').prop("selected", "selected");
          $('#semesterFromYear').val('');
          $('#semesterToYear').val('');
        })
      })
    </script>

  </body>
</html>