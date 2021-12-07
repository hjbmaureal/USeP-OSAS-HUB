<?php
  include '../../conn.php';
  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'OSAS'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where (user_id='$id' or office_id = 1) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}
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
      <title>USeP Admin Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../../css/main2.css">
    <link rel="stylesheet" type="text/css" href="../../css/upstyle2.css">
    <link rel="stylesheet" type="text/css" href="../../css/upstyle_shy.css">
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
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">COORDINATOR</p>
            <p style="text-align: center;" class="app-sidebar__user-name font-sec" > PORTAL</p>
          </div>
      </div>

      <hr>

      <ul class="app-menu font-sec">
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">DASHBOARD</span>
        </li>
        <li>
          <a class="app-menu__item" href="index.php">
            <i class="app-menu__icon fa fa-home"></i>
            <span class="app-menu__label">Home</span>
          </a>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-list-alt"></i>
            <span class="app-menu__label">Student Discipline</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Complaints.php">Complaints</a></li>
              <li><a class="treeview-item" href="Response.php">Response</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-sitemap"></i>
            <span class="app-menu__label">Student Organizations</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="NewOrgApplicants.php">New Organization Applicants</a>
            </li>
            <li>
              <a class="treeview-item" href="RecognizedOrg.php">Funded Organizations</a>
            </li>
            <li>
              <a class="treeview-item" href="UnrecognizedOrg.php">Non-Funded Organizations</a>
            </li>
          </ul>
        </li> 
        <li class="treeview">
          <a class="app-menu__item active" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-briefcase"></i>
            <span class="app-menu__label">Student Labor</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Labor-Requisition.php">Requisition</a></li>
              <li><a class="treeview-item" href="Labor-Application.php">Application</a></li>
              <li><a class="treeview-item" href="DTR.php">DTR</a></li>
              <li><a class="treeview-item" href="Labor-Accomplishment.php">Accomplishment Reports</a></li>
              <li><a class="treeview-item active" href="Labor-Hired-Students.php">History</a></li>
            </ul>
        </li>
        <li>
          <a class="app-menu__item" href="ReqGoodMoral.php">
            <i class="app-menu__icon fa fa-file"></i>
            <span class="app-menu__label">Request for Good Moral</span>
          </a>
        </li>

          
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="RStudentOrg.php">Student Organization</a></li>
              <li><a class="treeview-item" href="RStudentDiscipline.php">Student Discipline</a></li>
              <li><a class="treeview-item" href="RStudentlists.php">Student Labor</a></li>
              <li><a class="treeview-item" href="RStudentRequest.php">Good Moral</a></li>
            </ul>
          </li>
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">OTHERS</span>
        </li>
        <li>
          <a class="app-menu__item" href="Announcement.php">
            <i class="app-menu__icon fa fa-bullhorn"></i>
            <span class="app-menu__label">Announcements</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="Job-Announcements.php">
            <i class="app-menu__icon fa fa-bullhorn"></i>
            <span class="app-menu__label">Job Hirings</span>
          </a>
        </li>
      </ul>
    </aside>



       <!--navbar-->

  <main class="app-content">
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
                    <div class="appnavlevel" style="color:black;">
                      <span class="semesterYear">'.$row['semester'].'</span>
                    </div>
                  </li>
                  <li>
                    <div class="appnavlevel" style="color:black;">
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
                  $count_sql="SELECT * from notif where (user_id=$id or office_id = 1)  order by time desc";
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
      </div>
      <script type="text/javascript">
        


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
      var myInput = document.getElementById("newPass");
      var letter = document.getElementById("letter");
      var capital = document.getElementById("capital");
      var number = document.getElementById("number");
      var length = document.getElementById("length");
      var special = document.getElementById("special");

      var loadFile = function (event,imgname) {
        console.log("userPic");
        var image = document.getElementById(imgname);
        image.src = URL.createObjectURL(event.target.files[0]);
      };
      </script>
    <div class="red"></div>


                        <br>


                        <!--<div class="page-error tile">-->

                         <div class="row">
                          <div class="col-md-12">
                            <div class="tile">
                              <div class="tile-body">
                                  <div class="float-left"><h4>SL History</h4></div>
                                  <br><br>
                                <div class="table-bd">
                                  <div class="table-responsive">
                                    <br>
                                    <table class="table table-hover table-bordered table-sm" id="history-table">
                                      <thead>
                                        <th>Applicant ID</th>
                                        <th>Name</th>
                                        <th>Office</th>
                                        <th>Supervisor</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                        <th class="collapse"></th>
                                      </thead>
                                    <tbody>
                                   </tbody>
                                 </table>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div> 

                     <div class="row">
                       <div class="col-md-12">
                         <div class="tile">
                           <div class="tile-body">
                              <div class="float-left"><h4>Salary Logs</h4></div>
                              <br><br>

                              <div class="d-flex justify-content-center">
                                <span class="m-3 h4">Current Salary Rate</span>
                                <span class="m-3 h4">:</span>
                                <span class="m-3 h4"> PHP <span id="current-salary"></span></span>
                                <a class="btn btn-warning btn-md text-white m-3" id="update-salary">Update</a>
                              </div>
                              <div class="table-bd">
                                <div class="table-responsive">
                                  <table class="table table-hover table-bordered table-sm" id="salary-table">
                                    <thead>
                                      <tr>
                                        <th>Salary</th>
                                        <th>Changed by</th>
                                        <th>Date Updated</th>
                                      </tr>
                                    </thead>
                                    <tbody></tbody>
                                  </table>
                                </div>
                              </div>
                           </div>
                         </div>
                       </div>
                     </div> 

          
        </main>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="applicant-modal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header"><h6>SL Information</h6></div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="app-form-dp float-left rounded border-secondary">
                        <img class="" src="" style="max-width: 100%;" id="applicant-pic">
                    </div>
                  </div>
                  <div class="col-sm-10">
                    <div class="card">
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-sm-6 d-flex justify-content-start">
                            <span>Student ID</span>
                            <span class="mx-2 font-weight-bold" id="student-id"></span>
                          </div>
                          <div class="col-sm-6 text-left d-flex justify-content-end">
                            <span>Applicant ID</span>
                            <span class="mx-2 font-weight-bold" id="applicant-id"></span>
                          </div>
                        </div>
                        <div class="d-flex">
                          <span>Name</span>
                          <span class="font-weight-bold mx-2" id="applicant-name"></span>
                        </div>
                        <div class="col-sm-12 mt-3">
                          <div class="card">
                            <div class="card-title p-0 m-0">
                              <div class="h6">Assignation</div>
                            </div>
                            <div class="card-body px-2">
                              <table class="table table-borderless table-sm">
                                <tbody>
                                  <tr>
                                    <td>Office</td>
                                    <td><span class="ml-2 font-weight-bold" id="assigned-office"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Supervisor</td>
                                    <td><span class="ml-2 font-weight-bold" id="office-supervisor"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Starting Date</td>
                                    <td><span class="ml-2 font-weight-bold" id="start-date"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Expiration Date</td>
                                    <td><span class="ml-2 font-weight-bold" id="end-date"></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                          <div class="card">
                            <div class="card-title p-0 m-0">
                              <div class="h6">Duties</div>
                            </div>
                            <div class="card-body px-5">
                              <table class="table table-borderless table-sm">
                                <tbody>
                                  <tr>
                                    <td><i class="fas fa-check text-success"></i> Duty 1</td>
                                    <td><span class="font-weight-bold" id="duty-1"></span></td>
                                  </tr>
                                  <tr>
                                    <td><i class="fas fa-check text-success"></i> Duty 2</td>
                                    <td><span class="font-weight-bold" id="duty-2"></span></td>
                                  </tr>
                                  <tr>
                                    <td><i class="fas fa-check text-success"></i> Duty 3</td>
                                    <td><span class="font-weight-bold" id="duty-3"></span></td>
                                  </tr>
                                  <tr>
                                    <td><i class="fas fa-check text-success"></i> Duty 4</td>
                                    <td><span class="font-weight-bold" id="duty-4"></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer"></div>
            </div>
          </div>
        </div>


        <!-- Essential javascripts for application to work-->

        <script src="../../js/jquery-3.3.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/main.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="../../js/plugins/pace.min.js"></script>
        <!-- Page specific javascripts-->
        <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
        <script>
          <!-- table selection -->
          $('#selectAll').click(function (e) {
            $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
          });
        </script>
        <!-- Data table plugin-->
        <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>  <!-- Google analytics script-->
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script><script type="text/javascript">
          if(document.location.hostname == 'pratikborsadiya.in') {
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
          }
        </script>

        <script type="text/javascript">
          $(document).ready(function($){
            var current_applicant = 0;
            var current_salary = 0;

              var tbl = $('#history-table').DataTable({
                serverside: false,
                ajax : {
                  url : "../../php/M-Admin/select-queries.php",
                  data : function ( d ) {
                        d.queryno = 2;
                  },
                  dataSrc : "",
                  error: function(response){
                      alert(response);
                  }
                },
                columns : [
                  { data : "applicant_id" },
                  { data : "student_name" },
                  { data : "office_dept" },
                  { data : "staff_name" },
                  { data : "starting_date" },
                  { data : "expiration_date" },
                  { data : "status" },
                  { 
                      data : null,
                      className: "text-center",
                      render : function ( data, type, row){
                        let _end = new Date (row['expiration_date']);
                        let _today = new Date();
                        let _status = row['status'];
                        let markup = '';

                        if (_status == 'Complete'){
                          markup = '<a class="btn btn-info btn-sm text-white mx-2 view-applicant"><i class="fas fa-eye"></i></a><a class="btn btn-warning btn-sm text-black" disabled >Mark as Complete</a>';
                        } else if (_status == 'Terminated') {
                          markup = '<a class="btn btn-info btn-sm text-white mx-2 view-applicant"><i class="fas fa-eye"></i></a><a class="btn btn-primary btn-sm terminate-btn text-black disabled">Terminate</a>';
                        } else {
                          if ( _end.getDay() == _today.getDay() && _end.getMonth() == _today.getMonth() && _end.getFullYear() == _today.getFullYear()) {
                            markup = '<a class="btn btn-info btn-sm text-white mx-2 view-applicant"><i class="fas fa-eye"></i></a><a class="btn btn-warning btn-sm terminate-btn text-white">Mark as Complete</a>';
                          } else {
                            markup = '<a class="btn btn-info btn-sm text-white mx-2 view-applicant"><i class="fas fa-eye"></i></a><a class="btn btn-primary btn-sm terminate-btn text-white">Terminate</a>';
                          }
                        }



                        return markup
                      }
                  },
                  { data : "student_id", className : "collapse"},
                  { data : "labor_type", className : "collapse"},
                  { data : "labor_class", className : "collapse"},
                  { data : "labor_status", className : "collapse"},
                  { data : "semester_year", className : "collapse"},
                  { data : "grades_location", className : "collapse"},
                  { data : "cor_location", className : "collapse"},
                  { data : "unit_head_letter_location", className : "collapse"},
                  { data : "osas_head_letter_location", className : "collapse"},
                  { data : "recommendation_location", className : "collapse"},
                  { data : "length_of_service", className : "collapse"},
                  { data : "duty1", className : "collapse"},
                  { data : "duty2", className : "collapse"},
                  { data : "duty3", className : "collapse"},
                  { data : "duty4", className : "collapse"},
                  { data : "pic", className : "collapse"}

                ]
              });

              var tbl2 = $('#salary-table').DataTable({
                serverside: false,
                ajax : {
                  url : "../../php/M-Admin/select-queries.php",
                  data : function ( d ) {
                        d.queryno = 3;
                  },
                  dataSrc : "",
                  error: function(response){
                      alert(response);
                  }
                },
                columns : [
                  { data : "salary",  },
                  { data : "changed_by" },
                  { data : "date_changed" }
                ],
                ordering : false,
                initComplete: function () {
                  current_salary = getCurrentSalary();
                  $('#current-salary').text(current_salary.toFixed(2));
                  // let last_row = $('#salary-table').row(' :last-child').data();
                  // console.log(last_row[1]);
                } 
              });

              $(document).on("click",".view-applicant",function(){
                var currentRow = $(this).closest("tr");
                let _id =  currentRow.find("td:eq(0)").text();
                let _sname =  currentRow.find("td:eq(1)").text();
                let _office =  currentRow.find("td:eq(2)").text();
                let _staff =  currentRow.find("td:eq(3)").text();
                let _date_start =  currentRow.find("td:eq(4)").text();
                let _date_end =  currentRow.find("td:eq(5)").text();
                let _status =  currentRow.find("td:eq(6)").text();
                let _studid =  currentRow.find("td:eq(8)").text();
                let _labortype =  currentRow.find("td:eq(9)").text();
                let _laborclass =  currentRow.find("td:eq(10)").text();
                let _laborstatus =  currentRow.find("td:eq(11)").text();
                let _semyear =  currentRow.find("td:eq(12)").text();
                let _grades =  currentRow.find("td:eq(13)").text();
                let _cor =  currentRow.find("td:eq(14)").text();
                let _head =  currentRow.find("td:eq(15)").text();
                let _osas =  currentRow.find("td:eq(16)").text();
                let _rec =  currentRow.find("td:eq(17)").text();
                let _servicelength =  currentRow.find("td:eq(18)").text();
                let _duty1 =  currentRow.find("td:eq(19)").text();
                let _duty2 =  currentRow.find("td:eq(20)").text();
                let _duty3 =  currentRow.find("td:eq(21)").text();
                let _duty4 =  currentRow.find("td:eq(22)").text();
                let _pic =  currentRow.find("td:eq(23)").text();


                $('#applicant-pic').attr('src',_pic);
                $('#student-id').text(_studid);
                $('#applicant-id').text(_id);
                $('#applicant-name').text(_sname);
                $('#assigned-office').text(_office);
                $('#office-supervisor').text(_staff);
                $('#start-date').text(_date_start);
                $('#end-date').text(_date_end);
                $('#duty-1').text(_duty1);
                $('#duty-2').text(_duty2);
                $('#duty-3').text(_duty3);
                $('#duty-4').text(_duty4);

                $('#applicant-modal').modal('toggle');
              });

              $(document).on("click",".terminate-btn",function(){

                var currentRow = $(this).closest("tr");
                let _end = new Date(currentRow.find("td:eq(5)").text());
                current_applicant = currentRow.find("td:eq(0)").text();
                let _today = new Date();
                console.log(_end);

                if ( _end.getDay() == _today.getDay() && _end.getMonth() == _today.getMonth() && _end.getFullYear() == _today.getFullYear()) {
                    Swal.fire({
                          title: 'Password Validation',
                          html: `<input type="password" id="password" class="swal2-input" placeholder="Password">`,
                          confirmButtonText: 'Validate',
                          focusConfirm: false,
                          preConfirm: () => {
                            const password = Swal.getPopup().querySelector('#password').value
                            if (!password) {
                              Swal.showValidationMessage(`Please enter password`)
                            }
                            return {password: password }
                          }
                        }).then((result) => {
                          let password = result.value.password;
                          
                          $.ajax({
                              url:"../../php/users-check-password.php",
                              method:"POST",
                              data:{pass:password},
                              success:function(response)
                                {
                                  try {
                                    var obj = JSON.parse(response);
                                    var result = obj[0].res;
                                    if (result==0){
                                      Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: 'Wrong password!',
                                        showConfirmButton: false,
                                        timer: 1000
                                      })
                                    } else if (result==1) {

                                      Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Authentication Successful!',
                                        showConfirmButton: false,
                                        timer: 1000
                                      })
                                      .then(() => {

                                            $.ajax({
                                                url:"../../php/M-FacultyHead/insert-update-queries.php",
                                                method:"POST",
                                                data:{app_id : current_applicant, stat : 'Complete', queryno : 4},
                                                success:function(response)
                                                  {
                                                    if (response.length == 0){
                                                      tbl.ajax.reload();
                                                      Swal.fire({
                                                        position: 'center',
                                                        icon: 'success',
                                                        title: 'Your work has been saved',
                                                        showConfirmButton: false,
                                                        timer: 1000
                                                      })
                                                    }
                                                  },
                                                error: function(response){
                                                  $('.fetched-data').text('');
                                                  alert("fail" + JSON.stringify(response));
                                                }
                                            });
                                      })
                                    }


                                  } catch (e) {
                                    alert("Server error. Reload page."+response);
                                  }
                                },
                              error: function(response){
                                $('.fetched-data').text('');
                                alert("fail" + JSON.stringify(response));
                              }
                          })

                    })
                  } else {
                    Swal.fire({
                      title: 'Are you sure?',
                      text: "End of contract is not today. Do you still want to terminate contract?",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        Swal.fire({
                          title: 'Password Validation',
                          html: `<input type="password" id="password" class="swal2-input" placeholder="Password">`,
                          confirmButtonText: 'Validate',
                          focusConfirm: false,
                          preConfirm: () => {
                            const password = Swal.getPopup().querySelector('#password').value
                            if (!password) {
                              Swal.showValidationMessage(`Please enter password`)
                            }
                            return {password: password }
                          }
                        }).then((result) => {
                          let password = result.value.password;
                          
                          $.ajax({
                              url:"../../php/users-check-password.php",
                              method:"POST",
                              data:{pass:password},
                              success:function(response)
                                {
                                  try {
                                    var obj = JSON.parse(response);
                                    var result = obj[0].res;
                                    if (result==0){
                                      Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: 'Wrong password!',
                                        showConfirmButton: false,
                                        timer: 1000
                                      })
                                    } else if (result==1) {

                                      Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Authentication Successful!',
                                        showConfirmButton: false,
                                        timer: 1000
                                      })
                                      .then(() => {
                                        Swal.fire({
                                          title: 'Terminate Contract',
                                          text: "Termination of contract will be effective immediately.",
                                          icon: 'warning',
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'Confirm'
                                        }).then((result) => {
                                          if (result.isConfirmed) {
                                            $.ajax({
                                                url:"../../php/M-FacultyHead/insert-update-queries.php",
                                                method:"POST",
                                                data:{app_id : current_applicant, stat : 'Terminated', queryno : 4},
                                                success:function(response)
                                                  {
                                                    if (response.length == 0){
                                                      tbl.ajax.reload();
                                                      Swal.fire({
                                                        position: 'center',
                                                        icon: 'success',
                                                        title: 'Your work has been saved',
                                                        showConfirmButton: false,
                                                        timer: 1000
                                                      })
                                                    }
                                                  },
                                                error: function(response){
                                                  $('.fetched-data').text('');
                                                  alert("fail" + JSON.stringify(response));
                                                }
                                            });
                                          }
                                        })
                                      })
                                    }


                                  } catch (e) {
                                    alert("Server error. Reload page."+response);
                                  }
                                },
                              error: function(response){
                                $('.fetched-data').text('');
                                alert("fail" + JSON.stringify(response));
                              }
                          })

                        })
                      }
                    })
                  }
              });

              function getCurrentSalary(){
                var salary = '';
                $('#salary-table tr').each(function() {
                    salary = $(this).find("td").eq(0).html();    
                });
                return parseFloat(salary);
              }

              $(document).on("click","#update-salary",function(){
                    Swal.fire({
                          title: 'Enter new salary rate',
                          html: `<input type="text" id="new-salary" class="swal2-input" placeholder="00.00">`,
                          confirmButtonText: 'Validate',
                          focusConfirm: false,
                          preConfirm: () => {
                            const salary = Swal.getPopup().querySelector('#new-salary').value
                            if (isNaN(salary)) {
                              Swal.showValidationMessage(`Please enter a valid number`)
                            }
                            return {salary: salary }
                          }
                        }).then((result) => {
                          let salary = result.value.salary;      
                            $.ajax({
                                url:"../../php/M-FacultyHead/insert-update-queries.php",
                                method:"POST",
                                data:{new : salary, queryno : 5},
                                success:function(response)
                                  {
                                    if (response.length==0) {
                                      tbl2.ajax.reload();
                                      Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Changes saved!',
                                        showConfirmButton: false,
                                        timer: 1000
                                      })
                                      location.reload();
                                    } else {

                                    }
                                  },
                                error: function(response){
                                  $('.fetched-data').text('');
                                  alert("fail" + JSON.stringify(response));
                                }
                            });
                        })
              });

          });
        </script>


</body>
</html>