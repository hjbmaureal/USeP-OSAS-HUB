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
          <a class="app-menu__item active" href="index.php">
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
        <div class="row">
          <div class="col-md-4">
            <div class="widget-small primary"><i class="icon fa fa-id-card-o fa-3x"></i>
              <div class="info">
                <h4>Signed Cards</h4>
                <?php
                  $result = mysqli_query($conn,"SELECT count(*) from scholarship_general_info where card_status COLLATE utf8mb4_general_ci != 'Not Signed'");
                  $row = mysqli_fetch_assoc($result);
                  echo '
                    <p><b>'.$row['count(*)'].'</b></p>
                  ';
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget-small primary"><i class="icon fa fa-id-card-o fa-3x"></i>
              <div class="info">
                <h4>No. of Allowance Released</h4>
                <?php
                  $result = mysqli_query($conn,"SELECT count(*) from scholarship_general_info where allowance_status = 'RELEASED'");
                  $row = mysqli_fetch_assoc($result);
                  echo '
                    <p><b>'.$row['count(*)'].'</b></p>
                  ';
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget-small primary"><i class="icon fa fa-id-card-o fa-3x"></i>
              <div class="info">
                <h4>Students for validation</h4>
                <?php
                  $result = mysqli_query($conn,"SELECT count(*) from scholarship_general_info where student_status = 0");
                  $row = mysqli_fetch_assoc($result);
                  echo '
                    <p><b>'.$row['count(*)'].'</b></p>
                  ';
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="widget-small primary"><i class="icon fa fa-id-card-o fa-3x"></i>
              <div class="info">
                <h4>No. of Internal Scholars</h4>
                <?php
                  $result = mysqli_query($conn,"SELECT count(student_id) from scholarship_general_info WHERE program_type = 'Internal' GROUP BY student_id");
                  $row = mysqli_num_rows($result);
                  echo '
                    <p><b>'.$row.'</b></p>
                  ';
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget-small primary"><i class="icon fa fa-id-card-o fa-3x"></i>
              <div class="info">
                <h4>No. of External Scholars</h4>
                <?php
                  $result = mysqli_query($conn,"SELECT count(student_id) from scholarship_general_info WHERE program_type = 'External' GROUP BY student_id");
                  $row = mysqli_num_rows($result);
                  echo '
                    <p><b>'.$row.'</b></p>
                  ';
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div style="background-color: #c12c32; padding: 5px 10px;"></div>
            <div class="tile">
              <div class="tile-title-w-btn">
                <h3 class="title">Job Hiring Announcements</h3>
                <div class="btn-group">
                  <a class="btn btn-danger" href="#addAnnouncementModal" data-toggle="modal"><i class="fa fa-lg fa-plus"></i></a>
                </div>
              </div>
              <?php 
                $result = mysqli_query($conn , "SELECT * FROM scholarship_announcement");
                while ($row=mysqli_fetch_array($result)){
                  echo '
                  <div class="tile">
                    <div class="row">
                      <div class="col-3">
                      '.$row['date'].' | '.$row['title'].'
                      </div>

                      <div class="col-6">
                        '.$row['content'].'
                      </div>

                      <div class="col-2">
                        <a href="#" announcement_id ="'. $row['announcement_id'].'" type="button" id ="editAnnouncement" class="btn btn-danger btn-sm update-button" data-toggle="modal" >
                          <i class="fas fa-pencil-square-o" style="color:white;"></i>
                        </a>
                        <button type="button" announcement_id ="'. $row['announcement_id'].'" class="btn btn-danger btn-sm delete-button" href="#delete-announcement-modal" data-toggle="modal" style="width:35px;">
                          <i class="fas fa-sm fa-trash"></i>
                        </button>
                      </div>

                    </div>
                  </div>
                  ';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Add Announcement Modal -->
      <div class="modal fade" id="addAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="addAnnouncementModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Post Announcements</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form method="POST" class="needs-validation" novalidate id="forms" action="../../php/scholarship-announcement-script.php">
              <div class="modal-body">
                <div class="row">
                  <div class="col-6">
                    <label for="addDate">Date</label>
                    <input name="addDate" type="text" id="addDate" class="form-control" value="<?php echo date('Y-m-d');?>" uneditable>
                  </div>
                  <div class="col-6">
                    <label for="addTitle">Title</label>
                    <input name="addTitle" type="text" id="addTitle" class="form-control" required>
                    <div class="invalid-tooltip">
                      Please enter Title
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="addContent">Write</label>
                    <input name="addContent" type="text" id="addContent" class="form-control" required>
                    <div class="invalid-tooltip">
                      Write post
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button class="btn btn-primary" name="addAnnouncement" type="submit">Save</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Edit Announcement Modal -->
      <div class="modal fade" id="editAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="editAnnouncementModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Post Announcements</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form method="POST" class="needs-validation" novalidate id="forms" action="../../php/scholarship-announcement-script.php">
              <div class="modal-body">
                <input type="text" id="announcement-id" name ="announcement-id" value="" hidden>
                <div class="row">
                  <div class="col-6">
                    <label for="editDate">Date</label>
                    <input name="editDate" type="text" id="editDate" class="form-control" value="<?php echo date('Y-m-d');?>" readonly>
                  </div>
                  <div class="col-6">
                    <label for="editTitle">Title</label>
                    <input name="editTitle" type="text" id="editTitle" class="form-control" required>
                    <div class="invalid-tooltip">
                      Please enter Title
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="editContent">Write</label>
                    <input name="editContent" type="text" id="editContent" class="form-control" required>
                    <div class="invalid-tooltip">
                      Write post
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" name="updateAnnouncement" type="submit">Save</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Delete Announcement Modal -->
      <div class="modal fade" id="deleteAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="deleteAnnouncementModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Post Announcements</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form method="POST" class="needs-validation" novalidate id="forms" action="../../php/scholarship-announcement-script.php">
              <div class="modal-body">
                <input type="text" id="announcement-id-delete" name="announcement-id" value="" hidden>
                <div class="row">
                  <div class="col-6">
                    <label for="editDate">Date</label>
                    <input name="editDate" type="text" id="deleteDate" class="form-control" value="<?php echo date('Y-m-d');?>" readonly>
                  </div>
                  <div class="col-6">
                    <label for="editTitle">Title</label>
                    <input name="editTitle" type="text" id="deleteTitle" class="form-control" required>
                    <div class="invalid-tooltip">
                      Please enter Title
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="editContent">Write</label>
                    <input name="editContent" type="text" id="deleteContent" class="form-control" required>
                    <div class="invalid-tooltip">
                      Write post
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button class="btn btn-primary" name="deleteAnnouncement" type="submit">Delete</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End of Edit Announcement Modal -->
    </main>
    
    <!-- Essential javascripts for application to work-->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dropzone.js"></script>
    <!-- Page specific javascripts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- FOR THE PHP SWAL -->
    <?php
      if(isset($_GET['announcement-posted'])){
        echo '
          <script>
            Swal.fire(
              "Operation Complete!",
              "Announcement successfully posted",
              "success"
            )
          </script>
        ';
      }
      if(isset($_GET['announcement-failed'])){
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
      if(isset($_GET['update']) && $_GET['update'] == "success"){
        echo '
          <script>
            Swal.fire(
              "Operation Successful!",
              "Announcement Updated!",
              "success"
            )
          </script>
        ';
      }
      if(isset($_GET['update']) && $_GET['update'] == "failed"){
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
      if(isset($_GET['delete']) && $_GET['delete'] == "success"){
        echo '
          <script>
            Swal.fire(
              "Operation Successful!",
              "Announcement Removed!",
              "success"
            )
          </script>
        ';
      }
      if(isset($_GET['delete']) && $_GET['delete'] == "failed"){
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
    ?>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      //CLEAR GET VARIABLES
      if(typeof window.history.replaceState == 'function') {
        window.history.replaceState({}, "Hide", "index.php");
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

        $('.update-button').on('click', function(){
          var announcement_id = $(this).attr('announcement_id');
          $.ajax({
            url: '../../php/scholarship-announcement-script.php',
            type: 'POST',
            data: {
              announcement_id:announcement_id
            },
            dataType: 'JSON',
            success:function(data){
              $('#announcement-id').val(data[0]);
              $('#editDate').val(data[1]);
              $('#editTitle').val(data[2]);
              $('#editContent').val(data[3]);
            }
          })
          $('#editAnnouncementModal').modal('show');
        });

        $('.delete-button').on('click', function(){
          var announcement_id = $(this).attr('announcement_id');
          $.ajax({
            url: '../../php/scholarship-announcement-script.php',
            type: 'POST',
            data: {
              announcement_id:announcement_id
            },
            dataType: 'JSON',
            success:function(data){
              console.log(data)
              $('#announcement-id-delete').val(data[0]);
              $('#deleteDate').val(data[1]);
              $('#deleteTitle').val(data[2]);
              $('#deleteContent').val(data[3]);
            }
          });
          $('#deleteAnnouncementModal').modal('show');
        });
      })
    </script>
  </body>
</html>