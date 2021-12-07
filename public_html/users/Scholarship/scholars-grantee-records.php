<?php
  //session script, open for updates for other modules
  include_once('../../php/user-session.php');
  include_once('../../php/notification-timeago.php');
  include_once('../../php/connect_db.php');
  //authenticate if logged in and user is the correct user
  checkSessionAuth($_SESSION['id'],$_SESSION['usertype']);
  checkSessionTime();
  
  $user_password = '';

  $currSemesterYear = "";
  $id= $_SESSION['id'];

  $user_id = $_SESSION['id'];
  if($result = mysqli_query($conn, "SELECT * FROM login_credentials WHERE username = $user_id")){
    while($row = mysqli_fetch_array($result)){
      $user_password = $row['password'];
    }
  }

  include("../../php/check-semester.php"); //semester change for cronjobs


  $count = 0;
  if($result = mysqli_query($conn,"SELECT count(*) AS cnt FROM notif WHERE user_id is null AND message_status='Delivered' AND office_id = 2")){
    while($row = mysqli_fetch_array($result)){
      $count = $row['cnt'];
    }
  }

  if(isset($_POST['archive-records'])){
    //primary operation
    if(isset($_POST['select'])){
      foreach($_POST['select'] as $student_id){
        mysqli_query($conn, "UPDATE grantee_history SET record_status = 1 WHERE id = '$student_id' AND semester_year != '$currSemesterYear'");
      }
      // header("Location: scholars-grantee-records.php?archive=success");
    }else{
      header("Location: scholars-grantee-records.php?selection=empty");
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
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <style>
     @page {
        size: auto;
        margin: 0;
      }
  </style>

  <body class="app sidebar-mini rtl" onload="initClock()" >
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
          <a class="app-menu__item active" href="" data-toggle="treeview">
            <i class="app-menu__icon fa fa-address-book"></i>
            <span class="app-menu__label">Scholars & Grantee Record</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="scholars-grantee-records.php" class="treeview-item active">Scholars and Grantee Record</a></li>
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
      <!-- MODALS -->
      <!-- MODAL FOR ADD SCHOLAR BUTTON -->
      <div class="modal fade" id="addScholarModal" tabindex="-1" role="dialog" aria-labelledby="addScholarModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">Student Data Form</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <form method="POST" class="needs-validation" novalidate action="../../php/addScholars.php">
              <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <label for="sdfScholarshipName">Name of Scholarship Program</label>
                    <select name="sdfScholarshipName" id="sdfScholarshipName" class="form-control" required>
                      <option value="">Please Select</option>
                      <?php 
                          $query=mysqli_query($conn,"select * from scholarship_program");
                          while($row=mysqli_fetch_array($query)){
                            echo'
                              <option value="'.$row['program_id'].'">'.$row['program_name'].'</option>
                            ';
                          }
                        ?>
                    </select>
                    <div class="invalid-tooltip">
                      Please enter Program
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <label for="sdfIDNumber">ID Number</label>
                    <input name="sdfIDNumber" type="text" id="sdfIDNumber" class="form-control" placeholder="Please enter ID" required>
                    <div class="invalid-tooltip">
                      Please enter ID Number
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="sdfSemesterSY">Semester School Year</label>
                    <?php 
                      $query=mysqli_query($conn,"SELECT * from list_of_semester WHERE status = 'Active'");
                      while($row=mysqli_fetch_array($query)){
                        echo'
                          <input type="text" class="form-control" value="'.$row['semester'].' '.$row['year'].'" readonly>
                        ';
                      }
                    ?>        
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <h6>PERSONAL INFORMATION</h6>
                  </div>
                  <div class="col mb-auto mt-auto custom-control custom-radio">
                    <input name="typeOfStudy" type="radio" id="sdfUndergraduate" class="custom-control-input" value="Undergraduate" disabled>
                    <label for="sdfUndergraduate" class="custom-control-label">Undergraduate</label>
                  </div>
                  <div class="col mb-auto mt-auto custom-radio">
                    <input name="typeOfStudy" type="radio" id="sdfGraduate" class="custom-control-input" value="Graduate" disabled>
                    <label for="sdfGraduate" class="custom-control-label">Graduate</label>
                    <div class="invalid-tooltip">
                      Please select atleast 1
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-3">
                    <label for="sdfLastName">Family Name</label>
                    <input name="sdfLastName" type="text" id="sdfLastName" class="form-control" placeholder="Last Name..." readonly>
                    <div class="invalid-tooltip">
                      Please enter last name
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="sdfFirstName">First Name</label>
                    <input name="sdfFirstName" type="text" id="sdfFirstName" class="form-control" placeholder="First Name..." readonly>
                    <div class="invalid-tooltip">
                      Please enter first name
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="sdfMiddleName">Middle Name</label>
                    <input name="sdfMiddleName" type="text" id="sdfMiddleName" class="form-control" placeholder="Middle/Maiden Name..." readonly>
                    <div class="invalid-tooltip">
                      Please enter middle name
                    </div>
                  </div>
                  <div class="col">
                    <label for="sdfSex">Sex</label>
                    <select name="sdfSex" id="sdfSex" class="form-control" disabled>
                      <option value="">Please Select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <div class="invalid-tooltip">
                      Please select gender
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-3">
                    <label for="sdfDateOfBirth">Date of Birth</label>
                    <input name="sdfDateOfBirth" type="date" id="sdfDateOfBirth" class="form-control" readonly>
                    <div class="invalid-tooltip">
                      Please enter birthdate
                    </div>
                  </div>
                  <div class="col-2">
                    <label for="sdfYear">Year</label>
                    <select name="sdfYear" id="sdfYear" class="form-control" disabled>
                      <option value="">Please Select</option>
                      <option value="1st Year">1st Year</option>
                      <option value="2nd Year">2nd Year</option>
                      <option value="3rd Year">3rd Year</option>
                      <option value="4th Year">4th Year</option>
                    </select>
                    <div class="invalid-tooltip">
                      Please enter year
                    </div>
                  </div>
                  <div class="col-5">
                    <label for="sdfYearCourse">Course</label>
                    <select name="sdfYearCourse" id="sdfYearCourse" class="form-control" disabled>
                      <option value="">Please Select</option>
                      <?php 
                        $query=mysqli_query($conn,"select * from course");
                        while($row=mysqli_fetch_array($query)){
                          echo'
                            <option value="'.$row['course_id'].'">'.$row['title'].'</option>
                          ';
                        }
                      ?>
                    </select>
                    <div class="invalid-tooltip">
                      Please enter year and course
                    </div>
                  </div>
                  <div class="col-2">
                    <label for="">College</label>
                    <select name="sdfCollege" id="sdfCollege" class="form-control" disabled>
                      <option value="">Please Select</option>
                      <?php 
                          $query=mysqli_query($conn,"select * from college");
                          while($row=mysqli_fetch_array($query)){
                            echo'
                              <option value="'.$row['college_id'].'">'.$row['title'].'</option>
                            ';
                          }
                        ?>
                    </select>
                    <div class="invalid-tooltip">
                      Please enter college
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <label for="sdfActiveMobileNumber">Active Mobile Number</label>
                    <input name="sdfActiveMobileNumber" type="text" id="sdfActiveMobileNumber" class="form-control" readonly>
                    <div class="invalid-tooltip">
                      Please enter ACTIVE mobile number
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="sdfEmailAdd">E-mail Address</label>
                    <input name="sdfEmailAdd" type="email" id="sdfEmailAdd" class="form-control" readonly>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-auto mb-auto mt-auto custom-control custom-radio">
                    <label for="" class="form-check-label mr-4">Living with:</label>
                    <input name="sdfLivingWith" type="radio" id="sdfLivingWithParents" class="custom-control-input" onclick="isChecked()" value="Parents" disabled>
                    <label for="sdfLivingWithParents" class="custom-control-label mr-4">Parents</label>
                  </div>
                  <div class="col-auto mb-auto mt-auto custom-control custom-radio">
                    <input name="sdfLivingWith" type="radio" id="sdfLivingWithRelatives" class="custom-control-input" onclick="isChecked()" value="Relatives" disabled>
                    <label for="sdfLivingWithRelatives" class="custom-control-label mr-4">Relatives</label>
                  </div>
                  <div class="col-auto mb-auto mt-auto custom-control custom-radio">
                    <input name="sdfLivingWith" type="radio" id="sdfLivingWithFriends" class="custom-control-input" onclick="isChecked()" value="Friends" disabled>
                    <label for="sdfLivingWithFriends" class="custom-control-label mr-4">Friends</label>
                  </div>
                  <div class="col-auto mb-auto mt-auto custom-control custom-radio">
                    <input name="sdfLivingWith" type="radio" id="sdfLivingWithOthers" class="custom-control-input" onclick="isChecked()" value="Others" disabled>
                    <label for="sdfLivingWithOthers" class="custom-control-label">Others</label>
                    <div class="invalid-tooltip">
                      Please select atleast one
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <label for="sdfLivingWithSpecify">Others (Please Specify)</label>
                    <input name="sdfLivingWithSpecify" type="text" class="form-control" id="sdfLivingWithSpecify" readonly>
                    <div class="invalid-tooltip">
                      Please specify
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <label for="sdfContactNumber">Contact Number of Guardian/Contact Person</label>
                    <input name="sdfContactNumber" type="text" id="sdfContactNumber" class="form-control" readonly>
                    <div class="invalid-tooltip">
                      Please enter number of guardian
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="sdfCityAddress">City Address</label>
                    <input name="sdfCityAddress" type="text" id="sdfCityAddress" class="form-control" readonly>
                    <div class="invalid-tooltip">
                      Please enter city address
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <label for="sdfParentName">Parent(Father/Mother)</label>
                    <input name="sdfParentName" type="text" class="form-control" id="sdfParentName" readonly>
                    <div class="invalid-tooltip">
                      Please enter parent name
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="sdfOccupation">Occupation</label>
                    <input name="sdfParentOccupation" type="text" class="form-control" id="sdfOccupation" readonly>
                    <div class="invalid-tooltip">
                      Please enter occupation
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12">
                    <label for="sdfParentAddress">Parent's Address</label>
                    <input name="sdfParentAddress" type="text" class="form-control" id="sdfParentAddress" readonly>
                    <small id="parentAddressHelpTooltip" class="form-text text-muted text-center">(If not living with parents)</small>
                    <div class="invalid-tooltip">
                      Please enter parent's address
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-9">
                    <label for="sdfParentContactNumber">Parent's Contact Number</label>
                    <input name="sdfParentContactNumber" type="text" class="form-control" id="sdfParentContactNumber" readonly>
                    <div class="invalid-tooltip">
                      Please enter parent's active contact number
                    </div>
                  </div>
                  <div class="col-3 mt-auto mb-auto">
                    <small id="sdfTooltip" class="form-text text-muted text-left">
                      (If not living with parents)
                    </small>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-8">
                    <label for="sdfSpouse">Spouse</label>
                    <input name="sdfSpouse" type="text" class="form-control" id="sdfSpouse" readonly>
                    <div class="invalid-tooltip">
                      Please enter spouse name
                    </div>
                  </div>
                  <div class="col-4">
                    <label for="sdfSpouseOccupation">Occupation</label>
                    <input name="sdfSpouseOccupation" type="text" class="form-control" id="sdfSpouseOccupation" readonly>
                    <div class="invalid-tooltip">
                      Please enter spouse occupation
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <h5>SCHOLARSHIP PROMISE</h5>
                    <p>In consideration of the privilege I enjoy as a scholar/grantee in this institution. I hereby promise and pledge to abide as well the requirements of the University and th egrating institution.</p>
                  </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="addScholar">Save</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div> <!-- End of Modal -->
      
      <!-- MODAL FOR UPDATE SCHOLAR BUTTON -->
      <div class="modal fade" id="updateScholarModal" tabindex="-1" role="dialog" aria-labelledby="updateScholarModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">View Scholar Details</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <form method="POST" class="needs-validation" novalidate id="forms" action="../../php/updateScholarDetails.php">
              <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <label for="sdfScholarshipNameUpdate">Name of Scholarship Program</label>
                    <select name="sdfScholarshipNameUpdate" id="sdfScholarshipNameUpdate" class="form-control" required>
                      <?php 
                          $query=mysqli_query($conn,"select * from scholarship_program");
                          while($row=mysqli_fetch_array($query)){
                            echo'
                              <option value="'.$row['program_id'].'">'.$row['program_name'].'</option>
                            ';
                          }
                        ?>
                    </select>
                    <div class="invalid-tooltip">
                      Please enter Program
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <label for="sdfIDNumberUpdate">ID Number</label>
                    <input name="sdfIDNumberUpdate" type="text" id="sdfIDNumberUpdate" class="form-control" readonly>
                    <div class="invalid-tooltip">
                      Please enter ID Number
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="sdfSemesterSY">Semester School Year</label>
                    <input type="text" class="form-control" value="" readonly id="sdfSemesterSY">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <h6>PERSONAL INFORMATION</h6>
                  </div>
                  <div class="col mb-auto mt-auto custom-control custom-radio">
                    <input name="typeOfStudyUpdate" type="radio" id="sdfUndergraduateUpdate" class="custom-control-input type-of-study-radio" value="Undergraduate" disabled>
                    <label for="sdfUndergraduateUpdate" class="custom-control-label">Undergraduate</label>
                  </div>
                  <div class="col mb-auto mt-auto custom-radio">
                    <input name="typeOfStudyUpdate" type="radio" id="sdfGraduateUpdate" class="custom-control-input type-of-study-radio" value="Graduate" disabled>
                    <label for="sdfGraduateUpdate" class="custom-control-label">Graduate</label>
                    <div class="invalid-tooltip">
                      Please select atleast 1
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-3">
                    <label for="sdfLastNameUpdate">Family Name</label>
                    <input name="sdfLastNameUpdate" type="text" id="sdfLastNameUpdate" class="form-control" placeholder="Last Name..." readonly>
                    <div class="invalid-tooltip">
                      Please enter last name
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="sdfFirstNameUpdate">First Name</label>
                    <input name="sdfFirstNameUpdate" type="text" id="sdfFirstNameUpdate" class="form-control" placeholder="First Name..." readonly>
                    <div class="invalid-tooltip">
                      Please enter first name
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="sdfMiddleNameUpdate">Middle Name</label>
                    <input name="sdfMiddleNameUpdate" type="text" id="sdfMiddleNameUpdate" class="form-control" placeholder="Middle/Maiden Name..." readonly>
                  </div>
                  <div class="col">
                    <label for="sdfSexUpdate">Sex</label>
                    <select name="sdfSexUpdate" id="sdfSexUpdate" class="form-control" readonly>
                      <option value="">Please Select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <div class="invalid-tooltip">
                      Please select gender
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-3">
                    <label for="sdfDateOfBirthUpdate">Date of Birth</label>
                    <input name="sdfDateOfBirthUpdate" type="date" id="sdfDateOfBirthUpdate" class="form-control" readonly>
                    <div class="invalid-tooltip">
                      Please enter birthdate
                    </div>
                  </div>
                  <div class="col-2">
                    <label for="sdfYearUpdate">Year</label>
                    <select name="sdfYearUpdate" id="sdfYearUpdate" class="form-control" readonly>
                      <option value="">Please Select</option>
                      <option value="1st Year">1st Year</option>
                      <option value="2nd Year">2nd Year</option>
                      <option value="3rd Year">3rd Year</option>
                      <option value="4th Year">4th Year</option>
                    </select>
                    <div class="invalid-tooltip">
                      Please enter year
                    </div>
                  </div>
                  <div class="col-5">
                    <label for="sdfYearCourseUpdate">Course</label>
                    <select name="sdfYearCourseUpdate" id="sdfYearCourseUpdate" class="form-control" readonly>
                      <option value="">Please Select</option>
                      <?php 
                        $query=mysqli_query($conn,"select * from course");
                        while($row=mysqli_fetch_array($query)){
                          echo'
                            <option value="'.$row['course_id'].'">'.$row['title'].'</option>
                          ';
                        }
                      ?>
                    </select>
                    <div class="invalid-tooltip">
                      Please enter year and course
                    </div>
                  </div>
                  <div class="col-2">
                    <label for="sdfCollegeUpdate">College</label>
                    <select name="sdfCollegeUpdate" id="sdfCollegeUpdate" class="form-control" readonly>
                      <option value="">Please Select</option>
                      <?php 
                          $query=mysqli_query($conn,"select * from college");
                          while($row=mysqli_fetch_array($query)){
                            echo'
                              <option value="'.$row['college_id'].'">'.$row['title'].'</option>
                            ';
                          }
                        ?>
                    </select>
                    <div class="invalid-tooltip">
                      Please enter college
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <label for="sdfActiveMobileNumberUpdate">Active Mobile Number</label>
                    <input name="sdfActiveMobileNumberUpdate" type="text" id="sdfActiveMobileNumberUpdate" class="form-control" readonly>
                    <div class="invalid-tooltip">
                      Please enter ACTIVE mobile number
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="sdfEmailAddUpdate">E-mail Address</label>
                    <input name="sdfEmailAddUpdate" type="email" id="sdfEmailAddUpdate" class="form-control" readonly>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-auto mb-auto mt-auto custom-control custom-radio">
                    <label for="" class="form-check-label mr-4">Living with:</label>
                    <input name="sdfLivingWithUpdate" type="radio" id="sdfLivingWithParentsUpdate" class="custom-control-input" onclick="isChecked()" value="Parents" disabled>
                    <label for="sdfLivingWithParentsUpdate" class="custom-control-label mr-4">Parents</label>
                  </div>
                  <div class="col-auto mb-auto mt-auto custom-control custom-radio">
                    <input name="sdfLivingWithUpdate" type="radio" id="sdfLivingWithRelativesUpdate" class="custom-control-input" onclick="isChecked()" value="Relatives" disabled>
                    <label for="sdfLivingWithRelativesUpdate" class="custom-control-label mr-4">Relatives</label>
                  </div>
                  <div class="col-auto mb-auto mt-auto custom-control custom-radio">
                    <input name="sdfLivingWithUpdate" type="radio" id="sdfLivingWithFriendsUpdate" class="custom-control-input" onclick="isChecked()" value="Friends" disabled>
                    <label for="sdfLivingWithFriendsUpdate" class="custom-control-label mr-4">Friends</label>
                  </div>
                  <div class="col-auto mb-auto mt-auto custom-control custom-radio">
                    <input name="sdfLivingWithUpdate" type="radio" id="sdfLivingWithOthersUpdate" class="custom-control-input" onclick="isChecked()" value="Others" disabled>
                    <label for="sdfLivingWithOthersUpdate" class="custom-control-label">Others</label>
                    <div class="invalid-tooltip">
                      Please select atleast one
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <label for="sdfLivingWithSpecifyUpdate">Others (Please Specify)</label>
                    <input name="sdfLivingWithSpecifyUpdate" type="text" class="form-control" id="sdfLivingWithSpecifyUpdate" readonly>
                    <div class="invalid-tooltip">
                      Please specify
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <label for="sdfContactNumberUpdate">Contact Number of Guardian/Contact Person</label>
                    <input name="sdfContactNumberUpdate" type="text" id="sdfContactNumberUpdate" class="form-control" readonly>
                    <div class="invalid-tooltip">
                      Please enter number of guardian
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="sdfCityAddressUpdate">City Address</label>
                    <input name="sdfCityAddressUpdate" type="text" id="sdfCityAddressUpdate" class="form-control" readonly>
                    <div class="invalid-tooltip">
                      Please enter city address
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <label for="sdfParentNameUpdate">Parent(Father/Mother)</label>
                    <input name="sdfParentNameUpdate" type="text" class="form-control" id="sdfParentNameUpdate" readonly>
                    <div class="invalid-tooltip">
                      Please enter parent name
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="sdfOccupationUpdate">Occupation</label>
                    <input name="sdfParentOccupationUpdate" type="text" class="form-control" id="sdfOccupationUpdate" readonly>
                    <div class="invalid-tooltip">
                      Please enter occupation
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12">
                    <label for="sdfParentAddressUpdate">Parent's Address</label>
                    <input name="sdfParentAddressUpdate" type="text" class="form-control" id="sdfParentAddressUpdate" readonly>
                    <small id="parentAddressHelpTooltip" class="form-text text-muted text-center">(If not living with parents)</small>
                    <div class="invalid-tooltip">
                      Please enter parent's address
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-9">
                    <label for="sdfParentContactNumberUpdate">Parent's Contact Number</label>
                    <input name="sdfParentContactNumberUpdate" type="text" class="form-control" id="sdfParentContactNumberUpdate" readonly>
                    <div class="invalid-tooltip">
                      Please enter parent's active contact number
                    </div>
                  </div>
                  <div class="col-3 mt-auto mb-auto">
                    <small id="sdfTooltip" class="form-text text-muted text-left">
                      (If not living with parents)
                    </small>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-8">
                    <label for="sdfSpouseUpdate">Spouse</label>
                    <input name="sdfSpouseUpdate" type="text" class="form-control" id="sdfSpouseUpdate" readonly>
                    <div class="invalid-tooltip">
                      Please enter spouse name
                    </div>
                  </div>
                  <div class="col-4">
                    <label for="sdfSpouseOccupationUpdate">Occupation</label>
                    <input name="sdfSpouseOccupationUpdate" type="text" class="form-control" id="sdfSpouseOccupationUpdate" readonly>
                    <div class="invalid-tooltip">
                      Please enter spouse occupation
                    </div>
                  </div>
                </div>
                <br>
                <!-- Uncomment this block as editing student details here is not allowed and done through super admin -->
                <!-- <div class="row">
                  <div class="col">
                    <h5>SCHOLARSHIP PROMISE</h5>
                    <p>In consideration of the privilege I enjoy as a scholar/grantee in this institution. I hereby promise and pledge to abide as well the requirements of the University and th egrating institution.</p>
                  </div>
                </div> -->
              </div>
              <!-- <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="submit-update">Save</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
              </div> -->
            </form>
          </div>
        </div>
      </div> <!-- End of Modal -->

       <!-- MAIN CONTENT --> 
       <!-- Title of Content -->
       <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div id="main-content-scholar">
          <!-- Table -->
          <div class="row" id="print-scholar-table">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <!-- first row or TITLE -->
                  <div class="float-left">
                    <h4>Student Records</h4>
                  </div>
                  <div class="float-right">
                    <p>
                      <a class="btn btn-warning icon-btn" href="" data-toggle="modal" data-target="#addScholarModal">
                        <i class="fa fa-plus"></i>Add</a>  
                      <a class="btn btn-danger icon-btn" id="print-button" href="#">
                        <i class="fa fa-list-ul"></i>Print</a>
                      <!-- Archive button -->
                      <button type="submit" class="btn btn-info" name="archive-records">
                        <i class="fas fa-archive"></i> Archive
                      </button>
                    </p>
                  </div>
                  <!-- CLEARFIX FOR BOTH FOR FLOATED ELEMENTS -->
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
                              while($row = mysqli_fetch_array($result)){
                                echo '
                                  <option
                                ';
                                if(isset($_POST['sortScholarshipProgram']) && $_POST['sortScholarshipProgram'] == $row['program_name']){
                                  echo 'selected value="'.$row['program_name'].'">'.$row['program_name'].'</option>';
                                }else{
                                  echo 'value="'.$row['program_name'].'">'.$row['program_name'].'</option>';
                                }
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
                        <label for="scholarship-type">Type</label>
                        <select name="scholarship-type" id="scholarship-type" class="form-control">
                          <option  value="0">All</option>
                          <option <?php if(isset($_POST['scholarship-type']) && $_POST['scholarship-type'] == "Internal" ) echo 'selected'?> value="Internal">Internal</option>
                          <option <?php if(isset($_POST['scholarship-type']) && $_POST['scholarship-type'] == "External" ) echo 'selected'?> value="External">External</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="student-status">Status</label>
                        <select name="student-status" id="student-status" class="form-control">
                          <option value="Enrolled">Enrolled</option>
                          <?php
                            if($result = mysqli_query($conn, "SELECT * FROM student_status")){
                              while($row = mysqli_fetch_array($result)){
                                echo '<option ';
                                if(isset($_POST['student-status']) && $_POST['student-status'] == $row['description'] && $row['status_id'] != 1){
                                  echo 'selected value="'.$row['description'].'">'.$row['description'].'</option>';
                                }else if($row['status_id'] != 0 && $row['status_id'] != 1){
                                  echo 'value="'.$row['description'].'">'.$row['description'].'</option>';
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
                  <br>
                  <table class="table table-hover table-bordered" id="scholar-table">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="check-all-records"> Record Status</th>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Scholarship Program</th>
                        <th>Year Level</th>
                        <th>Course</th>
                        <th>Semester Year</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        //Filter query conditions to database
                        $query = "SELECT * , sf_get_student_status(student_status) as student_status FROM scholarship_general_info as sgi JOIN scholarship_program AS sp ON sp.program_id = sgi.program_id";
                        if(isset($_POST['student-status']) && $_POST['student-status'] != "Enrolled"){
                          $sortStatus = $_POST['student-status'];
                          $query .= " WHERE sgi.status_name COLLATE utf8mb4_general_ci = '$sortStatus'";
                        }else{
                          $query .= " WHERE sgi.status_name COLLATE utf8mb4_general_ci = 'Enrolled'";
                        }
                        if(isset($_POST['sortScholarshipProgram']) && isset($_POST['sortCourse']) && isset($_POST['scholarship-type']) && isset($_POST['sortSemester']) && isset($_POST['semesterToYear']) && isset($_POST['semesterFromYear']) && isset($_POST['record-status'])){
                          $semester_year = null;
                          $year = null;
                          $sortProgram = $_POST['sortScholarshipProgram'];
                          $sortCourse = $_POST['sortCourse'];
                          $sortType = $_POST['scholarship-type'];
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
                          if(!empty($sortProgram)){
                            $query .= " AND sp.program_name = '$sortProgram'";
                          }
                          if(!empty($sortType)){
                            $query .= " AND sgi.program_type = '$sortType'";
                          }
                          if(!empty($sortCourse)){
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
                        //echo $sortProgram.' '.$sortCourse.' '.$sortType.' '.$year.' '.$semester.' '.$semester_year;
                        // echo $query; //FOR DEBUG PURPOSES FOR FUTURE DEVELOPERS !!!
                        //for current and backlogged records
                        if($result = mysqli_query($conn, $query)){
                          while($row = mysqli_fetch_array($result)){
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
                                <td class="check-box"><input type="checkbox" name="select[]" value='.$row['grantee_id'] .'></td>
                              ';
                            }else{ //archived records
                              echo '
                                <tr class="bg-secondary text-white">
                                <td>Archived!</td>
                              ';
                            }
                            echo'
                                <td>'. $row["student_id"].'</td>
                                <td>'. $row["first_name"].'</td>
                                <td>'. $row["middle_name"].'</td>
                                <td>'. $row["last_name"].'</td>
                                <td>'. $row["program_name"].'</td>
                                <td>'. $row["year_level"].'</td>
                                <td>'. $row["coursename"].'</td>
                                <td>'. $row["semester_year"].'</td>
                                <td>'. $row["student_status"].'</td>
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
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/printThis.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- FOR THE PHP SWAL -->
    <?php
      if(isset($_GET['operation']) && $_GET['operation'] == "success"){
        echo '
          <script>
            Swal.fire(
              "Addition Complete!",
              "Scholar successfully added and is awaiting validation.",
              "success"
            )
          </script>
        ';
      }else if(isset($_GET['operation']) && $_GET['operation'] == "failed"){
        echo '
          <script>
            Swal.fire(
              "Operation Failed!",
              "Something went wrong...",
              "error"
            )
          </script>
        ';
      }
      if(isset($_GET['student-already-scholar'])){
        echo '
          <script>
            Swal.fire(
              "Double Entry!",
              "Student is already a scholar!",
              "error"
            )
          </script>
        ';
      }
      if(isset($_GET['selection']) && $_GET['selection'] == 'empty'){
        echo '
          <script>
            Swal.fire(
              "Selection empty!",
              "Select row/s using the checkboxes.",
              "error"
            )
          </script>
        ';
      }
      if(isset($_GET['archive']) && $_GET['archive'] == 'success'){
        echo '
          <script>
            Swal.fire(
              "Archive Success!",
              "Record/s have been archived.",
              "success"
            )
          </script>
        ';
      }
    ?>
    <script type="text/javascript">
      var options = {
        pageTitle:"Scholars and Grantee List",
      }
      //CLEAR GET VARIABLES
      if(typeof window.history.replaceState == 'function') {
          window.history.replaceState({}, "Hide", "scholars-grantee-records.php");
      }
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      //JavaScript for disabling form submissions if there are invalid fields
      (function(){
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


      //ALL JQUERY FUCNTIONS
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
        //MAO NI ANG PARA SA LOGIN BEFORE MAG ARCHIVE
        $('#button-submit-archive').prop('disabled', true);
        var archiveAction = false;
        var compareValue = <?php echo $user_password ?>;
        $('.check-box-inner').change(function(e){
          var clickedOff = true;
          if(!archiveAction){
            Swal.fire({
              title: 'Confirm Password',
              html: `<input type="password" id="passwordConfirm" class="swal2-input" placeholder="Enter password...">
              <input type="password" id="passwordConfirm2" class="swal2-input" placeholder="Confirm password...">`,
              confirmButtonText: 'Continue',
              focusConfirm: false,
              preConfirm: () => {
                const password1 = Swal.getPopup().querySelector('#passwordConfirm').value
                const password2 = Swal.getPopup().querySelector('#passwordConfirm2').value
                if (!password1 || !password2) {
                  Swal.showValidationMessage(`Please enter password`)
                }
                return { password1: password1, password2: password2}
              }
            }).then((result) => {
              clickedOff = false;
              if(result.value.password1 === result.value.password2){
                console.log(result.value.password1+compareValue);
                if(result.value.password1 == compareValue){
                  archiveAction = true;
                  $('#button-submit-archive').prop('disabled', false);
                }else{
                  $(".check-box-inner").prop('checked', false);
                  Swal.fire(
                    "Password incorrect!",
                    "Please try again.",
                    "error"
                  )
                }
              }else{
                $(".check-box-inner").prop('checked', false);
                Swal.fire(
                  "Password does not match!",
                  "Please try again.",
                  "error"
                )
              }
            })
          }
        })
        var scholar_table = $('#scholar-table').DataTable({
          "ordering": false
        });
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
        //check all function
        $("#scholar-table #check-all-records").click(function(){
          $("#scholar-table input[type='checkbox']").prop('checked', this.checked);
        })
        //ADD SCHOLAR FUNCTION FROM SDF
        $('#sdfIDNumber').keyup(function(){
          var search_id = $(this).val();
          console.log(search_id);
          if(search_id == null){
            
          }else{
            $.ajax({
              url: '../../php/fetchScholarById.php',
              method: 'POST',
              data: {search_id:search_id},
              dataType: 'JSON',
              success:function(data){
                console.log(data)
                $('input[name="typeOfStudy"][value="'+data[0]+'"]').prop('checked', true);
                $('#sdfLastName').val(data[1]);
                $('#sdfFirstName').val(data[2]);
                $('#sdfMiddleName').val(data[3]);
                $('#sdfSex').val(data[4]);
                $('#sdfDateOfBirth').val(data[5]);
                $('#sdfYear').val(data[6]);
                $('#sdfYearCourse').val(data[7]);
                $('#sdfCollege').val(data[8]);
                $('#sdfActiveMobileNumber').val(data[9]);
                $('#sdfEmailAdd').val(data[10]);
                $('input[name="sdfLivingWith"][value="'+data[11]+'"]').prop('checked', true);
                $('#sdfLivingWithSpecify').val(data[12]);
                $('#sdfContactNumber').val(data[13]);
                $('#sdfCityAddress').val(data[14]);
                $('#sdfParentName').val(data[15]);
                $('#sdfOccupation').val(data[16]);
                $('#sdfParentAddress').val(data[17]);
                $('#sdfParentContactNumber').val(data[18]);
                $('#sdfSpouse').val(data[19]);
                $('#sdfSpouseOccupation').val(data[20]);
              }
            })
          }
        })

        //TABLE SELECT WITH AJAX USING A BUNCH OF SEARCHED SOLUTIONS AND BIGBRAIN POWER (modification) AND our lord and saviour "STACKOVERFLOW"
        $('#scholar-table').on('click','tbody tr:not(.bg-secondary) td:not(.check-box)', function(e){
          e.preventDefault();

          var currentRow = $(this).closest("tr"); //SELECT ROW
          console.log(currentRow)
          var id = $('#scholar-table').DataTable().row(currentRow).data();//gets who data within table only including hidden values
          var student_id = '';
          var student_id = id[1];
          console.log(student_id);
          if(id == null){
            //NOTIFCATION THAT NO RECORD EXISTS IN THIS ROW
          }else{
            $.ajax({
              url: '../../php/fetchScholarData.php',
              method: 'POST',
              data: {student_id:student_id},
              dataType: 'JSON',
              success:function(data){
                console.log(data)
                $('#sdfScholarshipNameUpdate').val(data[0]);
                $('#sdfIDNumberUpdate').val(data[1]);
                $('#sdfSemesterSY').val(data[2]);
                $('input[name="typeOfStudyUpdate"][value="'+data[3]+'"]').prop('checked', true);
                $('#sdfLastNameUpdate').val(data[4]);
                $('#sdfFirstNameUpdate').val(data[5]);
                $('#sdfMiddleNameUpdate').val(data[6]);
                $('#sdfSexUpdate').val(data[7]);
                $('#sdfDateOfBirthUpdate').val(data[8]);
                $('#sdfYearUpdate').val(data[9]);
                $('#sdfYearCourseUpdate').val(data[10]);
                $('#sdfCollegeUpdate').val(data[11]);
                $('#sdfActiveMobileNumberUpdate').val(data[12]);
                $('#sdfEmailAddUpdate').val(data[13]);
                $('input[name="sdfLivingWithUpdate"][value="'+data[14]+'"]').prop('checked', true);
                $('#sdfLivingWithSpecifyUpdate').val(data[15]);
                $('#sdfContactNumberUpdate').val(data[16]);
                $('#sdfCityAddressUpdate').val(data[17]);
                $('#sdfParentNameUpdate').val(data[18]);
                $('#sdfOccupationUpdate').val(data[19]);
                $('#sdfParentAddressUpdate').val(data[20]);
                $('#sdfParentContactNumberUpdate').val(data[21]);
                $('#sdfSpouseUpdate').val(data[22]);
                $('#sdfSpouseOccupationUpdate').val(data[23]);
              },error: function (request, error) {
                console.log(arguments);
                alert(" Can't do because: " + error);
              }
            })
            $('#updateScholarModal').modal('show');
          }
        })

        //for acrhived click in table
        $('#scholar-table').on('click', 'tbody .bg-secondary', function(e){
          Swal.fire(
              "This record is archived!",
              "",
              "info"
            )
        })
        $("#check-all-records").click(function() {
            var checkbox = $(this).find("input[type='checkbox']");
            checkbox.attr('checked', !checkbox.attr('checked'));
        });

        //RADIO BUTTON AJAX $('input[name="sdfLivingWithUpdate"][value="'+data[12]+'"]').prop('checked', true);
        $('#print-button').click(function(){
          scholar_table.column(0).visible(false);
          $('#scholar-table').printThis(options);
          setTimeout(() => {
            scholar_table.column(0).visible(true);
          }, 3000);
        })

        // //archive function
        // $('#archive-button').click(function(){
        //   $.ajax({
        //     url: '../../php/archivePreviousSemester.php',
        //     method: 'GET',
        //     success:function(data){
        //       Swal.fire(
        //       "Archived!!!",
        //       "Files for last semester has been archived.",
        //       "warning"
        //     )
        //     }
        //   })
        // })
      })
    </script>
  </body>
</html>