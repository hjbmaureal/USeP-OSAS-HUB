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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
  </head>
  <body class="app sidebar-mini rtl" onload="initClock3()">
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
            <li><a class="treeview-item" href="status-tracker-allowance.php">Allowance</a></li>
            <li><a class="treeview-item" href="status-tracker-billing.php">Billing</a></li>
            <li><a class="treeview-item" href="status-tracker-payroll.php">Payroll</a></li>
            <li><a class="treeview-item" href="status-tracker-liquidation.php">Liquidation</a></li>
            <li><a class="treeview-item active" href="status-tracker-totals.php">Totals</a></li>
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
      <!-- Main Content -->
      <div class="main-content-totals" class="container-fluid">
        <!-- first row or TITLE -->
        <div class="float-left">
          <h3>Status Tracker Dashboard</h3>
        </div>
        <div class="float-right">
          <p>
            <a class="btn btn-danger icon-btn" id="print-button" href="#">
              <i class="fa fa-list-ul"></i>Print</a>
          </p>
        </div>
        <!-- CLEARFIX FOR BOTH FOR FLOATED ELEMENTS -->
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12">
            <div class="tile-body">
              <div class="row">
                <!--SELECTION FILTERS-->
                <div class="col-md-3" hidden="">
                  <div class="form-group">
                    <select class="form-control" style="width: 150px;" id="year">
                      <option  value="">All</option>
                      <?php
                        $sql = "SELECT * FROM total GROUP BY yearsem";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0){
                          while ($row = $result->fetch_row()){
                            echo " <option class='select-item' value='$row[1]'>$row[1]</option>";
                          }
                        }else{
                          echo "error fetching";
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Scholarship Program</label>
                    <select class="form-control" id="sem">
                      <option  value="">All</option>
                      <?php
                        $sql = "SELECT gh.semester_year, sf_get_scholarship_name(gh.program_id) AS program_name, count(gh.Student_id) AS scholar_count, count(gh.program_id)*sp.amount AS totals FROM grantee_history AS gh JOIN scholarship_program AS sp ON gh.program_id = sp.program_id JOIN scholarship_general_info as sgi ON gh.id = sgi.grantee_id WHERE gh.student_status = 1 GROUP BY gh.program_id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0){
                          while ($row = mysqli_fetch_assoc($result)){
                            echo " <option class='select-item' value='".$row['program_name']."'>".$row['program_name']."</option>";
                          }
                        }else{
                          echo "error fetching";
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Year & Semester</label>
                    <select class="form-control" id="stat">
                      <option value="" selected="selected">All</option>
                      <?php
                        $sql = "SELECT gh.semester_year, sf_get_scholarship_name(gh.program_id) AS program_name, count(gh.Student_id) AS scholar_count, count(gh.program_id)*sp.amount AS totals FROM grantee_history AS gh JOIN scholarship_program AS sp ON gh.program_id = sp.program_id JOIN scholarship_general_info as sgi ON gh.id = sgi.grantee_id WHERE gh.student_status = 1 GROUP BY gh.semester_year";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0){
                          while ($row = mysqli_fetch_assoc($result)){
                            echo " <option class='select-item' value='".$row['semester_year']."'>".$row['semester_year']."</option>";
                          }
                        }else{
                          echo "error fetching";
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="show">
                  <div class="search" hidden>
                    <label>Search:
                      <input type="search"aria-controls="bootstrap-data-table-export" id="search">
                    </label>
                  </div>
                </div>

              </div> <!-- END OF FIRST ROW -->

              <!-- CHARTS -->
              <div class="row" id="charts">
                <div class="col-md-6">
                  <div class="tile">
                    <h2 class="tile-title">Grantees</h2>
                    <div class="embed-responsive embed-responsive-16by9">
                      <canvas class="embed-responsive-item" id="NoGrantees"></canvas>
                    </div>
                    <br> 
                    <center>
                      <input type="text" name="NoGra" id="NoGra" value="" style='border-style:none;background: transparent;letter-spacing: 1px; width: 300px;text-align: center' disabled>
                    </center>
                    <center>
                      <input type="hidden" name="NoGra2" id="NoGra2" value="" disabled>
                    </center>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="tile">
                    <h2 class="tile-title">Total</h2>
                    <div class="embed-responsive embed-responsive-16by9">
                      <canvas class="embed-responsive-item" id="TotalMoney"></canvas>
                    </div>
                    <br> 
                    <center>
                      <input type="text" name="ToMoney" id="ToMoney" value="" style='border-style: none;background: transparent;letter-spacing: 1px; width: 300px; text-align: center;' disabled>
                    </center>
                    <center>
                      <input type="hidden" name="ToMoney2" id="ToMoney2" value="" disabled>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end first white panel-->
        <!--another white panel for table-->
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div class="table-bd">
                <div class="table-responsive"> 
                <br>
                <table id="sampleTable" class="table table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th hidden>No.</th>
                      <th>Year & Semester</th>
                      <th class="max">Program</th>
                      <th hidden>No.</th>
                      <th>No. of Grantees</th>
                      <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody id="table">
                <?php
                    $sql = "SELECT gh.semester_year, sf_get_scholarship_name(gh.program_id) AS program_name, count(gh.Student_id) AS scholar_count, count(gh.program_id)*sp.amount AS totals FROM grantee_history AS gh JOIN scholarship_program AS sp ON gh.program_id = sp.program_id JOIN scholarship_general_info as sgi ON gh.id = sgi.grantee_id WHERE gh.student_status = 1 GROUP BY gh.program_id, gh.semester_year";
                    $counter = 0;
                    $grat = 0;
                    $mont = 0;
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0){
                      while($row = mysqli_fetch_assoc($result)){
                            $counter++;
                            $grat += $row['scholar_count'];
                            $mont += $row['totals'];
                            echo "
                                <tr>
                                  <td hidden>".$row['semester_year']."</td> 
  
                                  <td>".$row['semester_year']."
                                      <input hidden type='text' name='hYS" . $counter . "' id='hYS" . $counter . "' value='".$row['semester_year']."']'>
                                  </td>
  
                                  <td>".$row['program_name']."</td> 
                                  <input hidden type='text' name='hP" . $counter . "' id='hP" . $counter . "' value='".$row['program_name']."']'>
  
                                  <td hidden>".$row['semester_year']."]</td> 
                                  <input hidden  type='text' name='hC" . $counter . "' id='hC" . $counter . "' value='".$row['semester_year']."'>
  
                                  <td>".$row['scholar_count']."
                                    <input hidden type='text' name='hGrant" . $counter . "' id='hGrant" . $counter . "' value='".$row['scholar_count']."']'> 
                                    <input hidden type='text' name='htGrant" . $counter . "' id='htGrant" . $counter . "' value='".$grat."'> 
                                  </td> 
  
                                  <td>".$row['totals']."
                                    <input hidden type='text' name='hTotal" . $counter . "' id='hTotal" . $counter . "' value='".$row['totals']."'> 
                                    <input hidden type='text' name='htTotal" . $counter . "' id='htTotal" . $counter . "' value='" . $mont . "'> 
                                  </td>
  
                                  <script type='text/javascript'> 
                                    document.getElementById('NoGra').value = 'No. of Grantees: '+" . $grat . "; 
                                    document.getElementById('NoGra2').value = ':  '+" . $grat . "; 
                                    document.getElementById('ToMoney').value = 'Total Amount: P'+" . $mont . ";
                                    document.getElementById('ToMoney2').value = ':  P'+" . $mont . ";
                                    var number = " . $counter . ";
                                  </script>
                                </tr>
                              ";
                          }
                    }else{
                      echo "There was a problem! Contact Administrator!";
                    }
                ?>
                </tbody>
                <tfoot hidden>
                  <tr>
                    <th hidden>No.</th>
                    <th colspan="">No. of Grantees<input style="display: inline-block; border-style: none; font-weight: bold;" type="text" name="NoGra3" id="NoGra3" value="" 
                      style='border-style:none;background: transparent;letter-spacing: 1px; width: 300px; font-weight: bold;' disabled></th>
                    <th colspan="">Total Amount<input type="text" name="ToMoney3" id="ToMoney3" value="" 
                      style='border-style:none;background: transparent;letter-spacing: 1px; width: 300px; font-weight: bold' disabled></th>
                    <th disabled></th>
                    <th disabled></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>

    </main>
    <!-- Essential javascripts for application to work-->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <script type="text/javascript" src="../../js/plugins/printThis.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../../js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dropzone.js"></script>
    <!-- Page specific javascripts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js" integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script type="text/javascript">
    if(typeof window.history.pushState == 'function') {
        window.history.replaceState({}, "Hide", "status-tracker-totals.php");
    }
    //PREVENT RESEND
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    //CLOCK
    function updateClock3(){
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

    function initClock3(){
      updateClock3();
      window.setInterval("updateClock3()", 1);
    }

    var options = {
      importCSS: false,
      loadCSS: "",
      pageTitle:"Status Tracker Totals",
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
      
      $('#sampleTable').DataTable({
        "paging": false,
      });

      $('#print-button').click(function(){
        $('#sampleTable').printThis(options);
      })
    })

    function getRandomColor() {
      var letters = '0123456789ABCDEF';
      var color = '#';
      for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
      }
      return color;
    }
    window.onload = function() {
      initClock3()
      document.getElementById('NoGra3').value = document.getElementById('NoGra2').value;
      document.getElementById('ToMoney3').value =  document.getElementById('ToMoney2').value
      for (var i = 1; i <= number; i++) {
        addData1(myChart1, 
          document.getElementById('hYS'+i).value+  document.getElementById('hP'+i).value +  document.getElementById('hC'+i).value, 
          document.getElementById('hGrant'+i).value)
      }
      for (var i = 1; i <= number; i++) {
        addData2(myChart2, 
          document.getElementById('hYS'+i).value+  document.getElementById('hP'+i).value +  document.getElementById('hC'+i).value, 
          document.getElementById('hTotal'+i).value)
      }
    };

    const labels = [];
    const data1 = {
      labels:  [],
      datasets: [{
        backgroundColor: [],
        data: [],
      }]
    };
    const data2 = {
      labels:  [],
      datasets: [{
        backgroundColor: [],
        data: [],
      }]
    };
    const config1 = {
      type: 'doughnut',
      data: data1,
      options: {
        responsive: true,
        legend: {
          display: false,
          labels: {
              color: 'rgb(255, 99, 132)'
          }
        },
      },
    };
    const config2 = {
      type: 'doughnut',
      data: data2,
      options: {
        responsive: true,
        legend: {
          display: false,
          labels: {
              color: 'rgb(255, 99, 132)'
          }
        },
      },
    };
    function drawtable(counter){
      var c = counter;
      addData1(myChart1, 
            document.getElementById('hYS'+c).value+  document.getElementById('hP'+c).value +  document.getElementById('hC'+c).value, 
            document.getElementById('hGrant'+c).value)
      addData2(myChart2, 
            document.getElementById('hYS'+c).value+  document.getElementById('hP'+c).value +  document.getElementById('hC'+c).value, 
            document.getElementById('hTotal'+c).value)
    }
    function addData1(chart, label, data) {
        chart.data.labels.push(label);
        chart.data.datasets.forEach((dataset) => {
            dataset.data.push(data);
            dataset.backgroundColor.push(getRandomColor());
        });
        chart.update();
    }
    function addData2(chart, label, data) {
        chart.data.labels.push(label);
        chart.data.datasets.forEach((dataset) => {
            dataset.data.push(data);
            dataset.backgroundColor.push(getRandomColor());
        });
        chart.update();
    }
    var myChart1 = new Chart(
      document.getElementById('NoGrantees'),
      config1
    );
    var myChart2 = new Chart(
      document.getElementById('TotalMoney'),
      config2
    );

    $('#search').keyup(function(){
      filter_table($('#search').val(),$('#sem').val(),$('#year').val(),$('#stat').val());
    })
    $('#sem').on('change',function(){
      filter_table($('#search').val(),$('#sem').val(),$('#year').val(),$('#stat').val());
    })
    $('#year').on('change',function(){
      filter_table($('#search').val(),$('#sem').val(),$('#year').val(),$('#stat').val());
    })
    $('#stat').on('change',function(){
      filter_table($('#search').val(),$('#sem').val(),$('#year').val(),$('#stat').val());
    })

    function filter_table(search,sem,year,stat){
      var counter = 0;
      var gtotal = 0;
      var gtotal2 = 0;
      var ttotal = 0;
      var ttotal2 = 0;
      var bchart = 0;
      removeData(myChart1);
      removeData(myChart2);
      $('#table tr').each(function(){
        var found = 0;
        $(this).each(function(){
        counter++;
          if($(this).text().toLowerCase().indexOf(search.toLowerCase()) >= 0){
            found += 1;
          }
          if($(this).text().toLowerCase().indexOf(sem.toLowerCase()) >= 0){
            found += 1;
          }
          if($(this).text().toLowerCase().indexOf(year.toLowerCase()) >= 0){
            found += 1;
          }
          if($(this).text().toLowerCase().indexOf(stat.toLowerCase()) >= 0){
            found += 1;
          }
        });
        if(found == 4){
          var addg = document.getElementById('hGrant'+counter).value;
          var addt = document.getElementById('hTotal'+counter).value;
          gtotal += +addg;
          gtotal2 += +addg;
          ttotal += +addt;
          ttotal2 += +addt;
          bchart++;
          drawtable(counter);
          $(this).show();
        }else{
          $(this).hide();
        }
      })
      if(bchart==0){
        removeData(myChart1);
        removeData(myChart2);
      }
      document.getElementById('ToMoney').value = 'Total Amount: P'+ttotal;
      document.getElementById('ToMoney3').value = ':  P'+ttotal;
      document.getElementById('NoGra').value = 'No. of Grantees: '+gtotal;
      document.getElementById('NoGra3').value = ':  '+gtotal;
    }
     function removeData(chart) {
      for(var i=0; i<number; i++){
        chart.data.labels.pop();
        chart.data.datasets.forEach(
          (dataset) => {
            dataset.data.pop();
        });
      }
      chart.update();
    }
    </script>
  </body>
</html>