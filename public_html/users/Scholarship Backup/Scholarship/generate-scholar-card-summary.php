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
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <!-- Font-icon css-->    
    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>


  <body class="app sidebar-mini rtl" onload="initClock()">
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
            <li><a class="treeview-item" href="generate-external-scholar-card.php">External</a></li>
            <li><a class="treeview-item active" href="generate-scholar-card-summary.php">Summary</a></li>
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
       <!-- View Card Modal -->
       <div class="modal fade" id="viewScholarCardModal" tabindex="-1" role="dialog" aria-labelledby="viewScholarCardModal">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Scholarship Card</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <div class="row justify-content-center">
                  <div class="col-md-8">
                    <img src="" name="cardContainer" class="rounded img-fluid" id="cardContainer">
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
       <!-- End of View Card Modal -->
       <!-- Title of Content -->
      <div id="main-content-scholar">
        <div>
          <!-- SECOND ROW FOR SORT OPTIONS -->
          <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <!-- first row or TITLE -->
                  <div class="float-left">
                    <h4>Scholarship Card Summary</h4>
                  </div>
                  <div class="float-right">
                    <p> 
                      <input type="button" value="Print" class="btn btn-danger" id="print-button">
                    </p>
                  </div>
                  <!-- CLEARFIX FOR BOTH FOR FLOATED ELEMENTS -->
                  <div class="clearfix"></div>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="#">Semester</label>
                        <select name="" id="sample" class="form-control">
                          <?php 
                                      $query=mysqli_query($conn,"select * from list_of_semester order by semester_id desc");
                                      while($row=mysqli_fetch_array($query)){
                                        echo'
                                          <option value="'.$row['semester'].' '.$row['year'].'">'.$row['semester'].' '.$row['year'].'</option>
                                        ';
                                      }
                                    ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <label for="sortSubmit">Filter by</label>
                      <span class="btn btn-primary form-control" id="sortSubmit">Filter</span>
                    </div>
                  </div>
                  <br>
                  <hr>
                  <div class="row justify-content-md-center">
                    <div class="col-md-12">
                      <div class="tile">
                        <h3 class="tile-title text-center">Signed Cards for <span id="selected-semester"></span></h3>
                        <div class="embed-responsive embed-responsive-16by9">
                          <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Table -->
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div id="scholar-table-container">
                  <table class="table table-hover table-bordered" id="card-Table">
                    <thead>
                      <tr>
                        <th>Student_id</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>College</th>
                        <th>Course</th>
                        <th>Program</th>
                        <th>Type</th>
                        <th>Card Status</th>
                        <th class="collapse"></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="collapse"></th>
                    </tfoot>
                  </table>
                </div>
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
    <script type="text/javascript" src="../../js/plugins/chart.js"></script>
    
    <script type="text/javascript" src="../../js/custom/scholarship-card.js"></script>
    <script type="text/javascript" src="../../js/plugins/printThis.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <!-- Google analytics script-->
    <script type="text/javascript">



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
        var options = {
          importCSS: false,
          loadCSS: "",
          pageTitle:"Status Tracker Totals",
        }


      //CHECKBOX TABLE
      $(document).ready(function(){
      let sy = $('#currentSchoolYear').text().trim();
      let sem = $('#currentSemester').text().trim();
      let label_data = [];
      let signed_data = [];
      let unsigned_data = [];
      let semyear = sem+" "+sy;

      getData(semyear);

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

        $('#card-Table').DataTable();

        $('#print-button').click(function(){
          $('.print-tbl').trigger("click");
        })

        $(document).on('click','#card-Table tbody tr',function(){
          var currentRow = $(this).closest("tr");
          let id = currentRow.find("td:eq(0)").text().trim();
          let type = currentRow.find("td:eq(7)").text().trim();
          let ver = currentRow.find("td:eq(9)").text().trim();
          let location = (type=='External') ? '../../images/Scholarship_Cards/External/' : '../../images/Scholarship_Cards/Internal/';
          let ext = (ver > 0) ? id+"_"+ver+".png" : id + ".png";
          location+= ext;
          $('#cardContainer').prop("src",location);
          $('#viewScholarCardModal').modal('toggle');
        })



        function getData(semyear) {


          $.ajax({
            url:"../../php/fetchScholarSummary.php",
            method:"POST",
            data:{sem_year:semyear},
            success:function(response)
              {
                try {
                  var obj = JSON.parse(response);
                  label_data = [];
                  signed_data = [];
                  unsigned_data = [];
                  for (var i = 0; i < obj.length; i++) {
                    label_data.push(obj[i].program_name);
                    signed_data.push(obj[i].cards_signed);
                    unsigned_data.push(obj[i].cards_unsigned);
                  }
                  $('#selected-semester').text(semyear);

                    var data = {
                      labels: label_data,
                      datasets: [
                        {
                          label: "Signed Cards",
                          fillColor: "rgba(151,187,205,1)",
                          strokeColor: "rgba(151,187,205,1)",
                          pointColor: "rgba(151,187,205,1)",
                          pointStrokeColor: "#fff",
                          pointHighlightFill: "#fff",
                          pointHighlightStroke: "rgba(151,187,205,1)",
                          data: signed_data
                        },
                        {
                          label: "Unsigned Cards",
                          fillColor: "rgba(220,220,220,1)",
                          strokeColor: "rgba(220,220,220,1)",
                          pointColor: "rgba(220,220,220,1)",
                          pointStrokeColor: "#fff",
                          pointHighlightFill: "#fff",
                          pointHighlightStroke: "rgba(220,220,220)",
                          data: unsigned_data
                        }
                      ]
                    };
                    $("#barChartDemo").remove();
                    $("div.embed-responsive").append('<canvas class="embed-responsive-item" id="barChartDemo"></canvas>');

                    var ctxb = $("#barChartDemo").get(0).getContext("2d");
                    var barChart = new Chart(ctxb).Bar(data);


                    if ( $.fn.DataTable.isDataTable( '#card-Table' ) ) {
                        $('#card-Table').DataTable().clear().destroy();
                    }

                    var tbl = $('#card-Table').DataTable({
                      serverside: false,
                      ajax : {
                        url : "../../php/fetchScholarSummaryTblData.php",
                        data : function ( d ) {
                            d.sem_year = semyear;
                        },
                        dataSrc : "",
                        error: function(response){
                                    
                              Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Server Error!',
                                showConfirmButton: false,
                                timer: 1500
                              })
                        }
                      },
                      columns : [
                        { data : "student_id"},
                        { data : "first_name" },
                        { data : "middle_name" },
                        { data : "last_name" },
                        { data : "college" },
                        { data : "course" },
                        { data : "program_name" },
                        { data : "program_type" },
                        { data : "card_status" },
                        { data : "card_ver", className: "collapse" }
                      ],
                      dom: 'Bfrtip',
                      buttons: [
                        {
                          text:'PRINT',
                          className: 'btn btn-danger collapse print-tbl',
                          extend: 'print',
                           exportOptions: {
                              columns: [0,1,2,3,4,5,6,7,8]
                          },
                          title: '',
                          customize: function(win) {
                            $(win.document.body).css('font-size', '10pt').prepend('<header class="text-center"><h4>University of Southeastern Philippines</h4><p>Apokon, Tagum City</p><br><br><h5>Scholars</h5></header>');
                                    $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');  
                          }
                        }
                      ],
                      initComplete: function () {
                                this.api().columns().every( function () {
                                    var columnidx = this.index();
                                    if (columnidx==4 || columnidx==5 || columnidx == 6 || columnidx == 7 || columnidx == 8){
                                        var column = this;
                                        var select = $('<select class="form-control"><option value=""></option></select>')
                                            .appendTo( $(column.footer()).empty() )
                                            .on( 'change', function () {
                                                var val = $.fn.dataTable.util.escapeRegex(
                                                    $(this).val()
                                                );
                         
                                                column
                                                    .search( val ? '^'+val+'$' : '', true, false )
                                                    .draw();

                                                selectedoptions = '';
                                                  $('select').each(function(){
                                                    var tempval = $(this).val();
                                                    if (tempval != '' || tempval == null ){
                                                      if (selectedoptions.length>0){
                                                        selectedoptions += '-';
                                                      }
                                                      else {
                                                        selectedoptions+= ' for ';
                                                      }
                                                      selectedoptions += tempval;
                                                    }
                                                  });
                                            } );
                         
                                        column.data().unique().sort().each( function ( d, j ) {
                                            select.append( '<option value="'+d+'">'+d+'</option>' )
                                        } );
                                    }
                                } );
                      }
                    });


                } catch (e) {
                   alert("Server error. Reload page."+response);
                }
              },
            error: function(response){
              alert("fail" + JSON.stringify(response));
            }
          });
        }

        $(document).on("click","#sortSubmit",function(){
          semyear = $('#sample').val().trim();
          getData(semyear);
        });

      })
    </script>
  </body>
</html>