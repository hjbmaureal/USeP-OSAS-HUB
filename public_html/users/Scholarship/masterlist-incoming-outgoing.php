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
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>


  <body class="app sidebar-mini rtl" onload="initClock()" >
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
          <a class="app-menu__item active" href="masterlist-incoming-outgoing.php">
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
      <!-- MAIN CONTENT --> 
      <!-- ADD MODAL -->
      <div class="modal fade" id="addMasterListTransmittal" tabindex="-1" role="dialog" area-labelledby="addMasterListTransmittal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form action="../../php/scholarship-masterlist-script.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title">Add Transmittal</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-4">
                    <label for="addTransmittalDateTimeReceived">Date and Time Received</label>
                    <input type="datetime-local" name="addTransmittalDateTimeReceived" class="form-control" id="addTransmittalDateTimeReceived">
                  </div>
                  <div class="col-4">
                    <label for="addTransmittalReceivedBy">Received By (Initials)</label>
                    <input type="text" name="addTransmittalReceivedBy" class="form-control" id="addTransmittalReceivedBy">
                  </div>
                  <div class="col-4">
                    <label for="addTransmittalRefNumber">Reference Number</label>
                    <input type="text" name="addTransmittalRefNumber" class="form-control" id="addTransmittalRefNumber">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <label for="addTransmittalOffice">Source/Origin (Office)</label>
                    <input type="text" name="addTransmittalOffice" class="form-control" id="addTransmittalOffice">
                  </div>
                  <div class="col-6">
                    <label for="addTransmittalType">Type (Letter, Memo, etc.)</label>
                    <input type="text" name="addTransmittalType" class="form-control" id="addTransmittalType">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <label for="addTranmisttalSubjectMatter">Subect Matter</label>
                    <input type="text" name="addTranmisttalSubjectMatter" class="form-control" id="addTranmisttalSubjectMatter">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-3">
                    <label for="addTransmittalDate">Date</label>
                    <input type="date" name="addTransmittalDate" id="addTransmittalDate" class="form-control">
                  </div>
                  <div class="col-9">
                    <label for="addTransmittalAction">Action Taken</label>
                    <input type="text" name="addTransmittalAction" id="addTransmittalAction" class="form-control">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-4">
                    <label for="addTransmittalDateTimeDispatch">Date & Time of Dispatch</label>
                    <input type="datetime-local" name="addTransmittalDateTimeDispatch" id="addTransmittalDateTimeDispatch" class="form-control">
                  </div>
                  <div class="col-3">
                    <label for="addTransmittalDispatchedBy">Dispatched By (Initials)</label>
                    <input type="text" name="addTransmittalDispatchedBy" id="addTransmittalDispatchedBy" class="form-control">
                  </div>
                  <div class="col-5">
                    <label for="">Remarks</label>
                    <input type="text" name="addTransmittalRemarks" id="addTransmittalRemarks" class="form-control">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-auto">
                    <h5>ATTACHMENTS</h5>
                    <li class="fa fa-file-text-o"></li>
                    <input class="trans-input form-control" type="file" id="documentSoftCopy" name="documentSoftCopy">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-warning" name="add-masterlist-transmittal">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- UPDATE MODAL -->
      <div class="modal fade" id="updateMasterListTransmittal" tabindex="-1" role="dialog" area-labelledby="addMasterListTransmittal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form action="../../php/scholarship-masterlist-script.php" method="POST" enctype="multipart/form-data">
              <input type="text" name="record-no" id="record-no" hidden>
              <div class="modal-header">
                <h5 class="modal-title">Update Transmittal Record Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-4">
                    <label for="updateTransmittalDateTimeReceived">Date and Time Received</label>
                    <input type="datetime-local" name="updateTransmittalDateTimeReceived" class="form-control" id="updateTransmittalDateTimeReceived">
                  </div>
                  <div class="col-4">
                    <label for="updateTransmittalReceivedBy">Received By (Initials)</label>
                    <input type="text" name="updateTransmittalReceivedBy" class="form-control" id="updateTransmittalReceivedBy">
                  </div>
                  <div class="col-4">
                    <label for="updateTransmittalRefNumber">Reference Number</label>
                    <input type="text" name="updateTransmittalRefNumber" class="form-control" id="updateTransmittalRefNumber">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
                    <label for="updateTransmittalOffice">Source/Origin (Office)</label>
                    <input type="text" name="updateTransmittalOffice" class="form-control" id="updateTransmittalOffice">
                  </div>
                  <div class="col-6">
                    <label for="updateTransmittalType">Type (Letter, Memo, etc.)</label>
                    <input type="text" name="updateTransmittalType" class="form-control" id="updateTransmittalType">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <label for="updateTranmisttalSubjectMatter">Subect Matter</label>
                    <input type="text" name="updateTranmisttalSubjectMatter" class="form-control" id="updateTranmisttalSubjectMatter">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-3">
                    <label for="updateTransmittalDate">Date</label>
                    <input type="date" name="updateTransmittalDate" id="updateTransmittalDate" class="form-control">
                  </div>
                  <div class="col-9">
                    <label for="updateTransmittalAction">Action Taken</label>
                    <input type="text" name="updateTransmittalAction" id="updateTransmittalAction" class="form-control">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-4">
                    <label for="updateTransmittalDateTimeDispatch">Date & Time of Dispatch</label>
                    <input type="datetime-local" name="updateTransmittalDateTimeDispatch" id="updateTransmittalDateTimeDispatch" class="form-control">
                  </div>
                  <div class="col-3">
                    <label for="updateTransmittalDispatchedBy">Dispatched By (Initials)</label>
                    <input type="text" name="updateTransmittalDispatchedBy" id="updateTransmittalDispatchedBy" class="form-control">
                  </div>
                  <div class="col-5">
                    <label for="updateTransmittalRemarks">Remarks</label>
                    <input type="text" name="updateTransmittalRemarks" id="updateTransmittalRemarks" class="form-control">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-auto">
                    <h5>ATTACHMENTS</h5>
                    <li class="fa fa-file-text-o"></li>
                    <input class="trans-input form-control" type="file" id="documentSoftCopy" name="documentSoftCopy">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-warning" name="update-masterlist-transmittal">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <!-- Delete master list incoming-outgoing modal -->
      <div class="modal fade" id="deleteMasterListTransmittal" tabindex="-1" role="dialog" area-labelledby="deleteMasterListTransmittal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form action="../../php/scholarship-masterlist-script.php" method="POST" enctype="multipart/form-data">
              <input type="text" name="recordNumber" id="delete-record-no">
              <div class="modal-header">
                <h5 class="modal-title">Delete Record?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <h6>You are about to delete this record, continue?</h6>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                <button type="submit" name="delete-masterlist-transmittal" class="btn btn-danger">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- TABLE -->
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title">
              <!-- Title of Content -->
              <div class="float-left">
                <h4> Incoming/Outgoing Correspondence Register</h4>
              </div>
              <div class="float-right">
                <p>
                  <a href="" class="btn btn-danger icon-btn" href="#" data-toggle="modal" data-target="#addMasterListTransmittal"><i class="fa fa-plus"></i>Add</a>
                </p>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="tile-body">
              <div class="table-responsive">
                <table id="transmittal-table" class="nowrap table table-sm table-striped table-responsive table-hover table-bordered">
                  <thead>
                    <tr>
                      <th class="text-nowrap">Date Created</th>
                      <th hidden>No</th>
                      <th>Date&Time Received</th>
                      <th class="text-nowrap">Received By</th>
                      <th>Reference Number</th>
                      <th>Source/Origin(Office)</th>
                      <th class="text-nowrap">Type of Document</th>
                      <th class="text-nowrap">Subject Matter</th>
                      <th>Date</th>
                      <th class="text-nowrap">Action Taken</th>
                      <th>Date&Time of Dispatch</th>
                      <th>Dispatch by(Initial)</th>
                      <th>Remarks</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if($result = mysqli_query($conn, "SELECT * FROM scholarship_masterlist_transmittal")){
                        while($row = mysqli_fetch_array($result)){
                          $date_time_received = date("Y-m-d g:i a", strtotime($row['date_time_received']));
                          $date_time_dispatched = date("Y-m-d g:i a", strtotime($row['date_time_dispatch']));
                          echo'
                            <tr>
                              <td>'.$row['date'].'</td>
                              <td hidden>'.$row['no'].'</td>
                              <td>'.$date_time_received.'</td>
                              <td>'.$row['received_by'].'</td>
                              <td>'.$row['reference_number'].'</td>
                              <td>'.$row['source_origin_office'].'</td>
                              <td>'.$row['type'].'</td>
                              <td>'.$row['subject_matter'].'</td>
                              <td>'.$row['date_2'].'</td>
                              <td>'.$row['action_taken'].'</td>
                              <td>'.$date_time_dispatched.'</td>
                              <td>'.$row['dispatched_by'].'</td>
                              <td>'.$row['remarks'].'</td>
                              <td class="text-center">
                                <a class="btn btn-info btn-sm" href="../'.$row['file_location'].'"><i class="fa fa-download"></i>Download</a>
                                <button type="submit" record-no="'.$row['no'].'" class="btn btn-warning btn-sm btn-update">
                                  <i class="fa fa-edit"></i> Update
                                </button>
                                <button type="submit" record-no="'.$row['no'].'" class="btn btn-danger btn-sm btn-remove">
                                  <i class="fa fa-trash"></i> Remove
                                </button>
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
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <?php
      if(isset($_GET['type']) && $_GET['type'] == 'invalid'){
        echo '
          <script>
            Swal.fire(
              "File not added!",
              "The file type was invalid.",
              "error"
            )
          </script>
        ';
      }
      if(isset($_GET['operation']) && $_GET['operation'] == 'success'){
        echo '
        <script>
          Swal.fire(
            "Addition Successful!",
            "The file is stored and ready for download.",
            "success"
          )
        </script>
      ';
      }
      if(isset($_GET['update']) && $_GET['update'] == 'success'){
        echo '
        <script>
          Swal.fire(
            "Record details Updated!",
            "",
            "success"
          )
        </script>
      ';
      }
      if(isset($_GET['delete']) && $_GET['delete'] == 'success'){
        echo '
        <script>
          Swal.fire(
            "Record Deleted!",
            "The record and file was removed.",
            "success"
          )
        </script>
      ';
      }
    ?>
    <!-- Google analytics script-->
    <script type="text/javascript">
      //CLEAR GET VARIABLES
      if(typeof window.history.replaceState == 'function') {
        window.history.replaceState({}, "Hide", "masterlist-incoming-outgoing.php");
      }
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
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
      $(document).ready(function(){
        //update record function
        $('.btn-update').on('click', function(){
          var fetch_transmittal = $(this).attr('record-no');
          $.ajax({
            url: '../../php/scholarship-masterlist-script.php',
            method: 'POST',
            data: {fetch_transmittal:fetch_transmittal},
            dataType: 'JSON',
            success:function(data){
              $('#updateTransmittalDateTimeReceived').val(data[0]);
              $('#updateTransmittalReceivedBy').val(data[1]);
              $('#updateTransmittalRefNumber').val(data[2]);
              $('#updateTransmittalOffice').val(data[3]);
              $('#updateTransmittalType').val(data[4]);
              $('#updateTranmisttalSubjectMatter').val(data[5]);
              $('#updateTransmittalDate').val(data[6]);
              $('#updateTransmittalAction').val(data[7]);
              $('#updateTransmittalDateTimeDispatch').val(data[8]);
              $('#updateTransmittalDispatchedBy').val(data[9]);
              $('#updateTransmittalRemarks').val(data[10]);
              $('#record-no').val(data[11]);
              $('#updateMasterListTransmittal').modal('show');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){ 
              alert("Status: " + textStatus); alert("Error: " + errorThrown);
            }
          });
        }) 
        //delete record function
        $('.btn-remove').on('click', function(){
          var fetch_transmittal = $(this).attr('record-no');
          $.ajax({
            url: '../../php/scholarship-masterlist-script.php',
            method: 'POST',
            data: {fetch_transmittal:fetch_transmittal},
            dataType: 'JSON',
            success:function(data){
              $('#delete-record-no').val(data[11]);
              $('#deleteMasterListTransmittal').modal('show');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){ 
              alert("Status: " + textStatus); alert("Error: " + errorThrown);
            }
          });
        });
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
        var transmittalTable = $('#transmittal-table').DataTable({});
      })
    </script>

  </body>
</html>