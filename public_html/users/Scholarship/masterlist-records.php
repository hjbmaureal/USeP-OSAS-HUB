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
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>


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
          <a class="app-menu__item active" href="masterlist-records.php">
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
      <!-- Add master list reocrd modal -->
      <div class="modal fade" id="addMasterListRecord" tabindex="-1" role="dialog" area-labelledby="addMasterListRecord">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form action="../../php/scholarship-masterlist-script.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title">Add Document</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <label for="addRecordTitle">Record Title</label>
                    <input type="text" name="addRecordTitle" class="form-control" id="addRecordTitle">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-5 mb-auto mt-auto">
                    <label for="addRecordType" class="mr-2">Record Type</label>
                    <select class="form-control" name="addRecordType" id="addRecordType">
                      <option value="1">C</option>
                      <option value="2">NC</option>
                    </select>
                  </div>
                  <div class="col-7">
                    <label for="addRecordMode">Mode</label>
                    <input  type="text" name="addRecordMode" class="form-control" id="addRecordMode">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-4">
                    <label for="addRecordCustodian">Custodian</label>
                    <input type="text" name="addRecordCustodian" class="form-control" id="addRecordCustodian">
                  </div>
                  <div class="col-8">
                    <label for="addRecordLocation">Location</label>
                    <input type="text" name="addRecordLocation" class="form-control" id="addRecordLocation">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <h4>Retention Period</h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="addRecordRetentionActive">Active</label>
                    <input type="date" name="addRecordRetentionActive" id="addRecordRetentionActive" class="form-control">
                  </div>
                  <div class="col-6">
                    <label for="addRecordRetentionArchive">Archive</label>
                    <input type="date" name="addRecordRetentionArchive" class="form-control" id="addRecordRetentionArchive">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <h4>Disposition</h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <label for="addRecordDispositionYear">Year</label>
                    <input type="date" name="addRecordDispositionYear" class="form-control" id="addRecordDispositionYear">
                  </div>
                  <div class="col-8">
                    <label for="addRecordDispositionMethod">Method</label>
                    <input type="text" name="addRecordDispositionMethod" class="form-control" id="addRecordDispositionMethod">
                  </div>
                </div>
                <div class="row">
                  <div class="col-auto">
                    <h5>ATTACHMENTS</h5>
                    <li class="fa fa-file-text-o"></li>
                    <input class="trans-input form-control" type="file" id="recordSoftCopy" name="recordSoftCopy">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" name="add-masterlist-record" class="btn btn-warning">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Update master list reocrd modal -->
      <div class="modal fade" id="updateMasterListRecord" tabindex="-1" role="dialog" area-labelledby="updateMasterListRecord">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form action="../../php/scholarship-masterlist-script.php" method="POST" enctype="multipart/form-data">
              <input type="text" name="recordNumber" id="update-record-no" hidden>
              <div class="modal-header">
                <h5 class="modal-title">Update Document Detail</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <label for="updateRecordTitle">Record Title</label>
                    <input type="text" name="updateRecordTitle" class="form-control" id="updateRecordTitle">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-5 mb-auto mt-auto">
                    <label for="updateRecordType" class="mr-2">Record Type</label>
                    <select class="form-control" name="updateRecordType" id="updateRecordType">
                      <option value="1">C</option>
                      <option value="2">NC</option>
                    </select>
                  </div>
                  <div class="col-7">
                    <label for="updateRecordMode">Mode</label>
                    <input  type="text" name="updateRecordMode" class="form-control" id="updateRecordMode">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-4">
                    <label for="updateRecordCustodian">Custodian</label>
                    <input type="text" name="updateRecordCustodian" class="form-control" id="updateRecordCustodian">
                  </div>
                  <div class="col-8">
                    <label for="updateRecordLocation">Location</label>
                    <input type="text" name="updateRecordLocation" class="form-control" id="updateRecordLocation">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <h4>Retention Period</h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="updateRecordRetentionActive">Active</label>
                    <input type="date" name="updateRecordRetentionActive" id="updateRecordRetentionActive" class="form-control">
                  </div>
                  <div class="col-6">
                    <label for="updateRecordRetentionArchive">Archive</label>
                    <input type="date" name="updateRecordRetentionArchive" class="form-control" id="updateRecordRetentionArchive">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <h4>Disposition</h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <label for="updateRecordDispositionYear">Year</label>
                    <input type="date" name="updateRecordDispositionYear" class="form-control" id="updateRecordDispositionYear">
                  </div>
                  <div class="col-8">
                    <label for="updateRecordDispositionMethod">Method</label>
                    <input type="text" name="updateRecordDispositionMethod" class="form-control" id="updateRecordDispositionMethod">
                  </div>
                </div>
                <div class="row">
                  <div class="col-auto">
                    <h5>ATTACHMENTS</h5>
                    <li class="fa fa-file-text-o"></li>
                    <input class="trans-input form-control" type="file" id="updateRecordSoftCopy" name="updateRecordSoftCopy">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" name="update-masterlist-record" class="btn btn-warning">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Delete master list reocrd modal -->
      <div class="modal fade" id="deleteMasterListRecord" tabindex="-1" role="dialog" area-labelledby="deleteMasterListRecord">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form action="../../php/scholarship-masterlist-script.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="recordNumber" id="delete-record-no" hidden>
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
                <button type="submit" name="delete-masterlist-record" class="btn btn-danger">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- MAIN CONTENT -->
      <!-- TABLE -->
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title">
              <!-- Title of Content -->
              <div class="float-left">
                <h4> Master List of Records</h4>
              </div>
              <div class="float-right">
                <p>
                  <a href="" class="btn btn-danger icon-btn" href="#" data-toggle="modal" data-target="#addMasterListRecord"><i class="fa fa-plus"></i>Add</a>
                  <!-- <a href="" class="btn btn-danger icon-btn"><i class="fa fa-download"></i>Export</a> -->
                </p>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="tile-body">
              <div class="table-responsive">
                <table id="records-table" class="table table-sm table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Date Created</th>
                      <th hidden>No</th>
                      <th>Records Title</th>
                      <th>Type of Records</th>
                      <th>Mode of Filing</th>
                      <th>Custodian</th>
                      <th>Location</th>
                      <th>Retention Period</th>
                      <th>Disposition</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if($result = mysqli_query($conn, "SELECT * FROM scholarship_masterlist_record")){
                        while($row = mysqli_fetch_array($result)){
                          echo '
                            <tr>
                              <td>'.$row['date'].'</td>
                              <td hidden>'.$row['no'].'</td>
                              <td>'.$row['records_title'].'</td>
                              ';
                              if($row['type_of_records'] == 1){
                                echo '<td>C</td>';
                              }else{
                                echo '<td>NC</td>';
                              }
                              echo'
                              <td>'.$row['mode_of_filing'].'</td>
                              <td>'.$row['custodian'].'</td>
                              <td>'.$row['location'].'</td>
                              <td>'.$row['retention_active'].' <b>|</b> '.$row['retention_archive'].'</td>
                              <td>'.$row['disposition_year'].' <b>|</b> '.$row['disposition_method'].'</td>
                              <td>
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
    <script type="text/javascript">
      //CLEAR GET VARIABLES
      if(typeof window.history.replaceState == 'function') {
        window.history.replaceState({}, "Hide", "masterlist-records.php");
      }
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
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

      $(document).ready(function(){
        var recordsTable = $('#records-table').DataTable({});
        //show update modal
        $('.btn-update').on('click', function(){
          var fetch_record = $(this).attr('record-no');
          $.ajax({
            url: '../../php/scholarship-masterlist-script.php',
            method: 'POST',
            data: {fetch_record:fetch_record},
            dataType: 'JSON',
            success:function(data){
              console.log(data)
              $('#updateRecordTitle').val(data[0]);
              $('#updateRecordType').val(data[1]);
              $('#updateRecordMode').val(data[2]);
              $('#updateRecordCustodian').val(data[3]);
              $('#updateRecordLocation').val(data[4]);
              $('#updateRecordRetentionActive').val(data[5]);
              $('#updateRecordRetentionArchive').val(data[6]);
              $('#updateRecordDispositionYear').val(data[7]);
              $('#updateRecordDispositionMethod').val(data[8]);
              $('#update-record-no').val(data[9]);
              $('#updateMasterListRecord').modal('show');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){ 
              alert("Status: " + textStatus); alert("Error: " + errorThrown);
            }
          });
        }) 
        //delete record function
        $('.btn-remove').on('click', function(){
          var fetch_record = $(this).attr('record-no');
          $.ajax({
            url: '../../php/scholarship-masterlist-script.php',
            method: 'POST',
            data: {fetch_record:fetch_record},
            dataType: 'JSON',
            success:function(data){
              console.log(data[9])
              $('#delete-record-no').val(data[9]);
              $('#deleteMasterListRecord').modal('show');
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
      });
    </script>
  </body>
</html>