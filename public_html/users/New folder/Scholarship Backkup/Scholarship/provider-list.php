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
  include_once("../../php/updateStatus.php");
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
            <li><a href="scholars-grantee-records.php" class="treeview-item">Scholars and Grantee Record</a></li>
            <li><a href="provider-list.php" class="treeview-item active">Providers List</a></li>
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

       <!-- MAIN CONTENT --> 
      <div id="main-content-provider">
        <!-- first row or TITLE -->
        <div class="float-left">
          <h4>Scholarship/Provider List</h4>
        </div>
        <div class="float-right">
          <p>
            <a class="btn btn-warning icon-btn " href="#" data-toggle="modal" data-target="#addProviderModal">
              <i class="fa fa-plus"></i>Add</a>  
            <a class="btn btn-danger icon-btn" href="#" id="print-button">
              <i class="fa fa-download"></i>Print</a>
          </p>
        </div>

        <!-- MODAL FOR ADD-->
        <div class="modal fade" id="addProviderModal" tabindex="1" role="dialog" aria-labelledby="addProviderModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h3 class="modal-title">ADD SCHOLARSHIP/PROVIDER</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <form method="POST" class="needs-validation" novalidate action="../../php/addProvder.php">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="scholarship_org" class="custom-label">Government/Organization</label>
                        <input type="text" name="scholarship_org_input" id="scholarship_org" class="form-control" placeholder="CHED, DOST, etc..." required>
                        <div class="invalid-tooltip">
                          Please Enter this Field!
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="scholarship_name">Scholarship Program Name</label>
                        <input type="text" name="scholarship_name_input" id="scholarship_name" class="form-control" placeholder="Enter program name..." required>
                        <div class="invalid-tooltip">
                          Please Enter This Field!
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label for="scholarship_type">Type</label>
                      <select name="scholarship_type_input" id="scholarship_type" class="form-control" required>
                        <option value="1">INTERNAL</option>
                        <option value="2">EXTERNAL</option>
                      </select>
                      <div class="invalid-tooltip">
                        Please Enter This Field!
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="scholarship_status">Status</label>
                      <select name="scholarship_status_input" id="scholarship_status" class="form-control" required>
                        <option value="1" selected="selected">ACTIVE</option>
                        <option value="2">INACTIVE</option>
                      </select>
                      <div class="invalid-tooltip">
                        Please Enter This Field!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-auto">
                      <label for="scholarshipAmount">Amount Stipend</label>
                      <input type="text" class="form-control" name="scholarship_amount_input" id="scholarshipAmount" required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
                  <button class="btn btn-warning" type="submit" name="addProvider">SUBMIT</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Update Modal -->
        <div class="modal fade" id="updateProviderModal" tabindex="1" role="dialog" aria-labelledby="updateProviderModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title">UPDATE SCHOLARSHIP/PROVIDER DATA</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <form method="POST" class="needs-validation" novalidate action="../../php/updateProvderDetails.php">
                <input type="text" id="scholarship_id_update" name="scholarship_id_update" hidden readonly>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="scholarship_org_update" class="custom-label">Government/Organization</label>
                          <input type="text" name="scholarship_org_update" id="scholarship_org_update" class="form-control" placeholder="CHED, DOST, etc..." required>
                          <div class="invalid-tooltip">
                            Please Enter this Field!
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="scholarship_name_update">Scholarship Program Name</label>
                          <input type="text" name="scholarship_name_update" id="scholarship_name_update" class="form-control" placeholder="Enter program name..." required>
                          <div class="invalid-tooltip">
                            Please Enter This Field!
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <label for="scholarship_type_update">Type</label>
                        <select name="scholarship_type_update" id="scholarship_type_update" class="form-control" required>
                          <option value="1">INTERNAL</option>
                          <option value="2">EXTERNAL</option>
                        </select>
                        <div class="invalid-tooltip">
                          Please Enter This Field!
                        </div>
                      </div>
                      <div class="col-6">
                        <label for="scholarship_status_update">Status</label>
                        <select name="scholarship_status_update" id="scholarship_status_update" class="form-control" required>
                          <option value="1" selected="selected">ACTIVE</option>
                          <option value="2">INACTIVE</option>
                        </select>
                        <div class="invalid-tooltip">
                          Please Enter This Field!
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-auto">
                        <label for="scholarshipAmount_update">Amount Stipend</label>
                        <input type="text" class="form-control" name="scholarship_amount_update" id="scholarshipAmount_update" required>
                      </div>
                    </div>
                </div>

                <div class="modal-footer">
                  <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
                  <button class="btn btn-warning" type="submit" name="updateProvider">SUBMIT</button>
                </div>
              </form>

            </div>
          </div>
        </div>
        <!-- CLEARFIX FOR BOTH FOR FLOATED ELEMENTS -->
        <div class="clearfix"></div>
        <!-- Table -->
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <!-- SECOND ROW FOR SORT OPTIONS -->
              <form method="POST" action="">
                <div class="row">
                  <div class="col-2">
                    <div class="form-group">
                      <label for="scholarship-status">Status</label>
                      <select name="scholarship-status" id="scholarship-status" class="form-control">
                        <option value="0">All</option>
                        <option <?php if(isset($_POST['scholarship-status']) && $_POST['scholarship-status'] == 1 ) echo 'selected'?> value="1">Active</option>
                        <option <?php if(isset($_POST['scholarship-status']) && $_POST['scholarship-status'] == 2 ) echo 'selected'?> value="2">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="form-group">
                      <label for="scholarship-type">Type</label>
                      <select name="scholarship-type" id="scholarship-type" class="form-control">
                        <option value="0">All</option>
                        <option <?php if(isset($_POST['scholarship-type']) && $_POST['scholarship-type'] == 1 ) echo 'selected'?> value="1">Internal</option>
                        <option <?php if(isset($_POST['scholarship-type']) && $_POST['scholarship-type'] == 2 ) echo 'selected'?> value="2">External</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-1">
                    <label for="sortSubmit">Filter</label>
                    <input type="submit" value="Filter" class="btn btn-primary form-control">
                  </div>
                  <div class="col-1">
                    <label for="clearSelection">Clear Filter</label>
                    <input type="submit" id="clearSelection" value="Clear" class="btn btn-dark form-control">
                  </div>
                  <div class="col-4">
                    
                  </div>
                  <div class="col-2">
      
                  </div>
                </div>
              </form>
              <form id="provider-table-form" method="POST" action="../../php/updateStatus.php">
                <div class="tile-body">
                  <br>
                  <div id="provider-table-container">
                    <table class="table table-hover table-bordered table-striped" id="provider-table">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Scholarship Program</th>
                          <th>Government/Organization</th>
                          <th>Type</th>
                          <th>Status</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          //Filter query conditions to database
                          $query = "SELECT * , sf_get_type_of_scholarship(type) as scholarship_type, sf_get_scholarship_status(program_status) as scholarship_status FROM scholarship_program";
                          if(isset($_POST["scholarship-status"]) && isset($_POST["scholarship-type"])){
                            $sortStatus = $_POST['scholarship-status'];
                            $sortType = $_POST['scholarship-type'];
                            if($sortType != 0 || $sortStatus != 0){
                              $query .= " WHERE";
                            }
                            if($sortType != 0){
                              $query .= " type = $sortType";
                            }
                            if($sortStatus != 0 && $sortType != 0){
                              $query .= " AND program_status = $sortStatus";
                            }else if($sortStatus != 0){
                              $query .= " program_status = $sortStatus";
                            }
                          }
                          //echo $query; DEBUUUUUG!
                          if($result = mysqli_query($conn,$query)){
                            while($row = mysqli_fetch_array($result)){
                              echo '
                                <tr>
                                  <td>'.$row['program_id'].'</td>
                                  <td> '.$row['program_name'].'</td>
                                  <td> '.$row['program_provider'].'</td>
                                  <td> '.$row['scholarship_type'].'</td>
                                  <td> '.$row['scholarship_status'].'</td>
                                  <td> '.$row['amount'].'</td>
                                </tr>
                              ';
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
    <!-- Page specific javascripts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/printThis.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- FOR THE PHP SWAL -->
    <?php
      if(isset($_GET['operation']) && isset($_GET['operation']) == "success"){
        echo '
          <script>
            Swal.fire(
              "Provider details updated!",
              "",
              "success"
            )
          </script>
        ';
      }
    ?>
    <script type="text/javascript">
      var options = {
        importCSS: false,
        loadCSS: "",
        pageTitle:"Provider's List Report",
      }
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      //CLEAR GET VARIABLES
      if(typeof window.history.replaceState == 'function') {
        window.history.replaceState({}, "Hide", "provider-list.php");
      }
      function isChecked(){
        if(document.getElementById('sdfLivingWithOthers').checked){
          document.getElementById('sdfLivingWithSpecify').disabled = false;
          document.getElementById('sdfLivingWithSpecify').required = true;
        }
        if(document.getElementById('sdfLivingWithParents').checked || document.getElementById('sdfLivingWithRelatives').checked || document.getElementById('sdfLivingWithFriends').checked){
          document.getElementById('sdfLivingWithSpecify').disabled = true;
          document.getElementById('sdfLivingWithSpecify').required = false;
        }
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
        //clear selection function
        $('#clearSelection').on('click', function(){
          $('#scholarship-status option[value="0"]').prop("selected", "selected");
          $('#scholarship-type option[value="0"]').prop("selected", "selected");
        });
        //DATA TABLES
        var provider_table = $('#provider-table').DataTable({
          "ordering": true,
          "columnDefs":[{
            "targets": 0,
            "visible": false,
          }],
        });
        //PRINTTHIS
        $('#print-button').click(function(){
          provider_table.column(0).visible(false);
          $('#provider-table').printThis(options);
          setTimeout(() => {
            provider_table.column(0).visible(true);
          }, 3000);
        })
        //TABLE SELECT WITH AJAX USING A BUNCH OF SEARCHED SOLUTIONS AND BIGBRAIN POWER (modification) AND our lord and saviour "STACKOVERFLOW"
        $('#provider-table > tbody').on('click','td',function(e){
          e.preventDefault();

          var currentRow = $(this).closest("tr"); //SELECT ROW
          var id = $('#provider-table').DataTable().row(currentRow).data(); //gets who data within table only including hidden values
          var program_id = id[0];
          console.log(program_id);
          if(id == null){
            //NOTIFICATION THAT NO RECORD EXISTS IN THIS ROW
          }else{ 
            $.ajax({ //AJAX REQUEST FOR PROVIDER DATA
              url: '../../php/fetchProvidersData.php',
              method: 'POST',
              data:{program_id:program_id},
              dataType: 'JSON',
              success:function(data){
                $('#scholarship_id_update').val(data[0]);
                $('#scholarship_org_update').val(data[1]);
                $('#scholarship_name_update').val(data[2]);
                $('#scholarship_type_update').val(data[3]);
                $('#scholarship_status_update').val(data[4]);
                $('#scholarshipAmount_update').val(data[5]);
              }
            })
            $('#updateProviderModal').modal('show');
          }
        })
      })
    </script>
  </body>
</html>