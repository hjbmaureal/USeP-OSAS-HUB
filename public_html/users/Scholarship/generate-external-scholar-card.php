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
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/2c16a9550c.js" crossorigin="anonymous"></script>
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
          <a class="app-menu__item active" href="" data-toggle="treeview">
            <i class="app-menu__icon fa fa-address-card-o"></i>
            <span class="app-menu__label">Generate Scholarship Card</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="generate-internal-scholar-card.php">Internal</a></li>
            <li><a class="treeview-item active" href="generate-external-scholar-card.php">External</a></li>
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
       <!-- MAIN CONTENT --> 
       <!-- Title of Content -->
      <div id="main-content-scholar">
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-title">
                <!-- first row or TITLE -->
                <div class="float-left">
                  <h4>Generate External Scholarship Card</h4>
                </div>
                <div class="float-right">
                  <p> 
                    <a class="btn btn-danger icon-btn" href="#" id="print-button"><i class="fa fa-print"></i>Print</a>
                  </p>
                </div>
                <!-- CLEARFIX FOR BOTH FOR FLOATED ELEMENTS -->
                <div class="clearfix"></div>
              </div>
              <form action="" method="POST">
                <!-- SECOND ROW FOR SORT OPTIONS -->
                <div class="row">
                  <div class="col-xl-4">
                    <div class="form-group">
                      <label for="sortScholarshipProgram">Scholarship Program</label>
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
                  <div class="col-xl-2">
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
                  <div class="col-xl-1">
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
                  <div class="col-xl-1">
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
                  <div class="col-xl-2">
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
                  <div class="col-xl-1">
                    <label for="sortSubmit">Filter by</label>
                    <input type="submit" value="Filter" class="btn btn-primary form-control">
                  </div>
                  <div class="col-xl-1">
                    <label for="clearSelection">Clear Filter</label>
                    <input type="submit" id="clearSelection" value="Clear" class="btn btn-dark form-control">
                  </div>
                </div>
              </form>
              <!-- Table -->
              <form id="scholar-table-form" method="POST" action="../../php/generate-external.php">
                <div class="row mt-2 flex-row-reverse">
                  <div class="col-xl-2">
                    <input type="submit" id="submit-scholar-table" value="Sign" name="generate-scholar" class="form-control btn btn-primary">
                  </div>
                </div>
                <br>
                <div class="tile-body">
                  <div id="scholar-table-container">
                    <table class="table table-hover table-bordered" id="scholar-table">
                      <thead>
                        <tr>
                          <th><input name="select" type="checkbox" id="select-all-scholar"></th>
                          <th>Surname</th>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Scholarship Program</th>
                          <th>Course</th>
                          <th>Semester</th>
                          <th>Date Signed</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $type = 'External';
                          $query = "SELECT * FROM scholarship_general_info WHERE program_type LIKE '$type' AND student_status = 1 ";
                          $order_by = " ORDER BY card_status desc, last_name asc";
                          if(isset($_POST['sortScholarshipProgram']) && isset($_POST['sortCourse']) && isset($_POST['sortSemester']) && isset($_POST['semesterToYear']) && isset($_POST['semesterFromYear'])){
                            $semester_year = null;
                            $year = null;
                            $sortProgram = $_POST['sortScholarshipProgram'];
                            $sortCourse = $_POST['sortCourse'];
    
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
                              $query .= " AND program_id = $sortProgram";
                            }
                            if($sortCourse != 0){
                              $query .= " AND course_id = $sortCourse";
                            }
                            if(!empty($year)){
                              $query .= " AND year = '$year'";
                            }
                            if(!empty($semester)){
                              $query .= " AND semester = '$semester'";
                            }
                            if(!empty($semester_year)){
                              $query .= " AND semester_year = '$semester_year'";
                            }
                          }

                          //echo $query; //FOR DEBUG PURPOSES FOR FUTURE DEVELOPERS!!!
                          $query .= " ".$order_by;
                          if($result = mysqli_query($conn,$query)){
                            while($row = mysqli_fetch_array($result)){
                                if (strtotime($row["card_status"])) {
                                  echo'
                                    <tr style="background-color:rgba(28, 153, 66, 0.3);">
                                      <td><input type="checkbox" name="select[]" value='.$row['grantee_id'] .' disabled></td>
                                      <td>'. $row["last_name"].'</td>
                                      <td>'. $row["first_name"].'</td>
                                      <td>'. $row["middle_name"].'</td>
                                      <td>'. $row["program_name"].'</td>
                                      <td>'. $row["coursename"].'</td>
                                      <td>'. $row["semester_year"].'</td>
                                      <td>'. $row["card_status"].'</td>
                                      <td>'. $row["status_name"].'</td>
                                    </tr>
                                  ';
                                }
                                else {
                                  echo'
                                    <tr>
                                      <td><input type="checkbox" name="select[]" value='.$row['grantee_id'] .'></td>
                                      <td>'. $row["last_name"].'</td>
                                      <td>'. $row["first_name"].'</td>
                                      <td>'. $row["middle_name"].'</td>
                                      <td>'. $row["program_name"].'</td>
                                      <td>'. $row["coursename"].'</td>
                                      <td>'. $row["semester_year"].'</td>
                                      <td>'. $row["card_status"].'</td>
                                      <td>'. $row["status_name"].'</td>
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
              </form>
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
    <!-- Page specific javascripts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../../js/plugins/printThis.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
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
      if(isset($_GET['operation']) && $_GET['operation'] == 'success'){
        echo '
          <script>
            Swal.fire(
              "Update successful!",
              "Card/s were signed!",
              "success"
            )
          </script>
        ';
      }
    ?>
    <!-- Google analytics script-->
    <script type="text/javascript">
      //ALL VANILLA JAVASCRIPT
      //CLEAR GET VARIABLES
      if(typeof window.history.pushState == 'function') {
          window.history.replaceState({}, "Hide", "generate-external-scholar-card.php");
      }
      //PREVENT RESEND
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
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
      var options = {
        importCSS: false,
        loadCSS: "",
        pageTitle:"Status Tracker Totals",
      }
      //CHECKBOX TABLE
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
        //clear filter function
        $('#clearSelection').on('click', function(){
          $('#sortScholarshipProgram option[value="0"]').prop("selected", "selected");
          $('#sortSemester option[value="0"]').prop("selected", "selected");
          $('#sortCourse option[value="0"]').prop("selected", "selected");
        })
        var table = $('#scholar-table').DataTable();

        $('#print-button').click(function(){
          table.column(0).visible(false);
          $('#scholar-table').printThis(options);
          setTimeout(() => {
            table.column(0).visible(true);
          }, 3000);
        })
        
        $("#scholar-table-container #select-all-scholar").click(function(){
          $("#scholar-table-container input[type='checkbox']").prop('checked', this.checked);
        })
      })
    </script>
  </body>
</html>