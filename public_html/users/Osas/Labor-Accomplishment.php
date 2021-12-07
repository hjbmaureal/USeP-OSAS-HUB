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
            <p style="text-align: center;" class="app-sidebar__user-name font-sec" >HUB</p>
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
              <li><a class="treeview-item active" href="Labor-Accomplishment.php">Accomplishment Reports</a></li>
              <li><a class="treeview-item" href="Labor-Hired-Students.php">History</a></li>
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
                                <div>
                                  <div>
                                    <div class="float-left"><h4>Student Labor Accomplishment Reports</h4></div>
                                  </div>
                                  <br><br>
                                  <div class="row">

                                    <div class="col">
                                      <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify " id="print-accomplishment-reports"><i class="fas fa-print"></i>&nbsp; Print</button></div> 
                                    </div>
                                  </div>

                                </div>

                                <br><br>
                                <div class="table-bd">
                                  <div class="table-responsive">
                                    <br>
                                    <table class="table table-hover table-bordered" id="sampleTable">
                                      <thead>
                                        <tr>
                                          <th>SL ID</th>
                                          <th class="max">Full Name</th>
                                          <th>Course & Year</th>
                                          <th>Period</th>
                                          <th class="collapse"></th>
                                          <th class="collapse"></th>
                                          <th>Assigned Office</th>
                                          <th>Immediate Supervisor</th>
                                          <th class="text-center align-middle">DTR</th>
                                          <th class="text-center align-middle">Contract</th>
                                          <th class="text-center align-middle">Accomplishment</th>
                                          <th class="text-center">Salary</th>
                                          <th class="text-center">Salary Status</th>
                                          <th class="text-center">Action</th>
                                          <th class="collapse"></th>
                                          <th class="collapse"></th>
                                          <th class="collapse"></th>
                                          <th class="collapse"></th>
                                          <th class="collapse"></th>
                                          <th class="collapse"></th>
                                          <th class="collapse"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="collapse"></td>
                                        <td class="collapse"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="collapse"></td>
                                        <td class="collapse"></td>
                                        <td class="collapse"></td>
                                        <td class="collapse"></td>
                                        <td class="collapse"></td>
                                        <td class="collapse"></td>
                                        <td class="collapse"></td>
                                      </tr>
                                    </tfoot>
                                 </table>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>  

  <div class="modal fade " id="view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Accomplishment Report</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body c">

                            <div class="row">
                              <div class="col-md-12">
                                <div class="table-responsive">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th style="border: 1px solid #404040;" rowspan="5"><img src="../../images/logo.png" width="100px;"></th> 
                                        <th style="border: 1px solid #404040;" rowspan="5" class="text-center">
                                          <span class="fs-11 d-block">Republic of the Philippines</span>
                                          <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span>
                                          <span class="fs-11 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                          <span class="fs-11 d-block">Telephone: (082) 227-8192</span>
                                          <span class="fs-11 d-block">Website: www.usep.edu.ph</span>
                                          <span class="fs-11 d-block">Email: president@usep.edu.ph</span>
                                        </th>  
                                        <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="">Form No. </th>
                                        <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">FM-USeP-HSC-01
                                        </th>
                                      </tr>
                                      <tr>
                                       <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Issue Status  </th>
                                       <th class="fs-11 p-1" style="border: 1px solid #404040; ;"colspan="2">02</th>
                                     </tr>
                                     <tr>
                                       <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Revision No.  </th>
                                       <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01</th>
                                     </tr>
                                     <tr>
                                       <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Date Effective  </th>
                                       <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01 March 2018
                                       </th>
                                     </tr>
                                     <tr>
                                       <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Approved by </th>
                                       <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">President
                                       </th>
                                     </tr>
                                     <tr>
                                      <th  style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">ACCOMPLISHMENT REPORT
                                      </th>
                                    </tr>
                                    </thead>
                                  </table>
                                </div>
                              </div>
                            </div>  

                            <div class="row mt-3 p-2">
                              <div class="col-sm">
                                <div class="form-group fg">
                                  <label class="control-label cl">Name:</label>
                                  <input class="form-control fc2 w-40 pl-2" type="text" id="report-applicant-name" disabled="">
                                  <label class="control-label cl">Course & Year:</label>
                                  <input class="form-control fc w-10 pl-2" type="text" id="report-course-year" disabled="">
                                  <label class="control-label cl">Class:</label>
                                  <input class="form-control fc w-5 pl-2" style="width:70px;" type="text" id="report-labor-class" disabled="">
                                  <label class="control-label cl">Type of Student Labor:</label>
                                  <input class="form-control fc w-10 pl-2" type="text" id="report-labor-type" disabled="">
                                  <br>
                                  <label class="control-label cl">UNIT/ COLLEGE ASSIGNED:</label>
                                  <input class="form-control fc w-10 pl-2" type="text" id="report-assigned-unit" disabled="">
                                </div>
                              </div>
                            </div>

                            <div class="row mt-3 p-5">
                                <div class="col-sm-7" id="report-tasks-list">
                                  <h6 class="font-weight-bold"> I. &emsp;&emsp;&emsp;&emsp;ACCOMPLISHMENT TASK for the period : <br></h6><br><br>
                                </div>
                                <div class="col-sm-5" id="report-period"></div>
                            </div> 
                            <div class="row mt-3 p-5">
                                <div class="col-sm-7">
                                  <h6 class="font-weight-bold"> II. &emsp;&emsp;&emsp;&emsp;TOTAL NUMBER OF HOURS WORKED: <span id="report-total-hours"></span></h6>
                                  </div>
                            </div> 

                            <div class="row">
                                <div class="col-3">
                                </div>
                                <div class="col">
                                </div>
                                <div class="col-4">
                                  <div class="form-group fg text mb-2 text-center align-middle">
                                    <img id="report-student-signature" class="e-sign" height="200" width="200" style="margin-bottom: -90px;margin-top: -110px;position:relative;" src="" />
                                    <input class="form-control fc2 mr-1 p-2 w-75 text-center" type="text" id="report-applicant-name2" disabled><br>
                                    <label class="control-label mr65 w-100">Student's Signature</label>
                                  </div>
                                    <br>
                                </div>
                            </div>


                  

                            <div class="row mt-3 p-5">
                                <div class="col-sm-12">
                                  <h6 class="font-weight-bold"> III. &emsp;&emsp;&emsp;&emsp;PERFORMANCE RATING: <br></h6>
                                   <h6 class="font-weight-light text-center align-middle"> (Legend of rating: Need Improvement, Satisfactory, Excellent) <br>
                                   </h6>
                                    <div class="table-responsive">
                                      <table class="table table-bordered">
                                        <thead>
                                        </thead>
                                        <tr>
                                          <th style="border: 2px solid #6b6b6b; text-align: center;" width="50%">CRITERIA</th>
                                          <th style="border: 2px solid #6b6b6b; text-align:center;" width="50%">SUPERVISOR RATING</th>
                                        </tr>
                                        <tr>
                                          <th style="border: 2px solid #6b6b6b;">Report on duty regularly </th>
                                          <th style="border: 2px solid #6b6b6b;" id="report-duty-regularly" ></th>
                                        </tr>
                                       <tr>
                                          <th style="border: 2px solid #6b6b6b;">Follow instruction without much difficulty </th>
                                          <th style="border: 2px solid #6b6b6b;" id="report-instruction-difficulty"></th>
                                        </tr>
                                        <tr>
                                          <th style="border: 2px solid #6b6b6b;">Utilize time wisely/perform task without delay</th>
                                          <th style="border: 2px solid #6b6b6b;" id="report-time-utilize"></th>
                                        </tr>
                                        <tr>
                                          <th style="border: 2px solid #6b6b6b;">Do his/her routine work without being told</th>
                                          <th style="border: 2px solid #6b6b6b;" id="report-routine-work"></th>
                                        </tr>
                                        <tr>
                                          <th style="border: 2px solid #6b6b6b;">Shows initiative & creativity in doing the task</th>
                                          <th style="border: 2px solid #6b6b6b;" id="report-initiative-creativity"></th>
                                        </tr>
                                        <tr>
                                          <th style="border: 2px solid #6b6b6b;">Accurate & efficient in doing clerical work</th>
                                          <th style="border: 2px solid #6b6b6b;" id="report-accurate-efficient"></th>
                                        </tr>
                                        <tr>
                                          <th style="border: 2px solid #6b6b6b;">With good interpersonal relationship</th>
                                          <th style="border: 2px solid #6b6b6b;" id="report-good-interpersonal"></th>
                                        </tr>
                                        <tr>
                                          <th style="border: 2px solid #6b6b6b;">Willing to learn from mistakes and/or new task</th>
                                          <th style="border: 2px solid #6b6b6b;" id="report-willing-learn"></th>
                                        </tr>
                                        <tr>
                                          <th style="border: 2px solid #6b6b6b;">Generally have a good working attitude</th>
                                          <th style="border: 2px solid #6b6b6b;" id="report-good-working"></th>
                                        </tr>
                                      </table>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                    <div class="col-3">
                                    </div>
                                    <div class="col">
                                  </div>
                                    <div class="col-4">
                                    <div class="form-group fg text mb-2 text-center align-middle">                              
                                    <img id="report-rater-signature" class="e-sign" height="150" width="150" style="margin-bottom:-70px; margin-top:-50px; position:relative; margin-right:60px; margin-left: 60px" src="" />
                                    <input class="form-control fc2 mr-1 p-2 w-75 text-center" type="text" id="report-unit-head" disabled><br>
                                    <label class="control-label mr65 w-100">Rater's Name & Signature</label>
                                    </div>
                                  <br>
                                  </div>
                            </div>

                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
  </div>
</main>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="salary-view">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">STUDENT LABOR SALARY FOR THE MONTH OF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body tile" style="margin:0px">
        <div class="row">
                  <div class="col">
                    <div class="form-group">
                        <label class="control-label">Name of Student</label>
                        <input class="form-control" type="text" readonly id="sl-name-view">
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                         <label class="control-label">School Year</label>
                        <input class="form-control" type="text" readonly id="sl-sy-view">
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="control-label">Course and Year</label>
                    <input class="form-control" type="text" id="sl-course-yearlevel-view" readonly>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label class="control-label">Semester</label>
                    <input class="form-control" type="text" id="sl-sem-view" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                      <div class="form-group">
                        <label class="control-label">Date:</label>
                        <input class="form-control" type="text" id="sl-date-paid-view" readonly>
                      </div>
                </div>

                <div class="col">
                      <div class="form-group">
                        <label class="control-label">Status</label>
                        <input class="form-control" type="text" id="sl-status-view" readonly>
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                      <div class="form-group">
                        <label class="control-label">Assigned Office</label>
                        <input class="form-control" type="text" id="sl-assigned-office-view" readonly>
                      </div>
                </div>
                <div class="col">
                      <div class="form-group">
                        <label class="control-label">Immediate Supervisor</label>
                        <input class="form-control" type="text" id="sl-supervisor-view" readonly>
                      </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Total No. of Hours</label>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">#</span>
                    </div>
                    <input class="form-control" id="sl-total-hours-view" type="text" placeholder="Hours" readonly="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Total Salary</label>
                <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                       <span class="input-group-text">₱</span>
                    </div>
                    <input class="form-control" id="sl-salary-view" type="text" placeholder="Amount" readonly="">
                  </div>
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="mark-paid-btn">Mark as Paid</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


        <!-- Essential javascripts for application to work-->

        <script src="../../js/jquery-3.3.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/main.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>
        <!-- Page specific javascripts-->
        <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
        <script type="text/javascript">
          $('#demoNotify').click(function(){
            $.notify({
              title: "Update Complete : ",
              message: "Verified Successfuly!",
              icon: 'fa fa-check' 
            },{
              type: "info"
            });
          });
        </script>
        <script>
          <!-- table selection -->
          $('#selectAll').click(function (e) {
            $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
          });
        </script>
        <!-- Data table plugin-->
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
        <!-- Google analytics script-->
        <script type="text/javascript">
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
          $(document).ready( function(){
            var current_rep_id = 0;

          var tbl = $('#sampleTable').DataTable({
              serverside: false,
              ajax : {
                url : "../../php/M-Admin/getAllAccomplishmentReports.php",
                data : "",
                dataSrc : "",
                error: function(response){
                    swal({
                            title: "Something went wrong...",
                            text: "Server Request Failed!",
                            icon: "error",
                            buttons: false,
                            timer: 1800,
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                    });
                }
              },
              columns : [
                { data : "applicant_id"},
                { data : "applicant_name"},
                { data : "course"},
                { data : "period"},
                { data : "date_from", className: "collapse"},
                { data : "date_to", className: "collapse"},
                { data : "office_name"},
                { data : "unit_head_name"},
                { 
                  data : null,
                  className: "text-center",
                  render : function ( data, type, row){

                    return '<a class="btn btn-danger btn-sm" href="Print-DTR.php?applicant='+row['applicant_id']+'&date_from='+row['date_from']+'&date_to='+row['date_to']+'&period='+row['period']+'" target="_blank"><i class="fas fa-print"></i></a>';
                  }
                },
                { 
                  data : null,
                  className: "text-center",
                  render : function ( data, type, row){

                    return '<a class="btn btn-danger btn-sm" href="Print-StudentFormContract.php?appid='+row['applicant_id']+'" target="_blank"><i class="fas fa-print"></i></a>';
                  }
                },
                { 
                  data : null,
                  className: "text-center",
                  render : function ( data, type, row){

                    return '<div class="row"><div class="col-sm-6"> <button class="btn btn-info btn-sm view-rating-form" data-toggle="modal" data-target="#view-modal"><i class="fas fa-eye"></i></button></div><div class="col-sm-6"><a class="btn btn-danger btn-sm" href="../Faculty/Print-Accomplishment.php?appid='+row['applicant_id']+'&date_from='+row['date_from']+'&date_to='+row['date_to']+'&period='+row['period']+'" target="_blank"><i class="fas fa-print"></i></a></div></div> ';
                  }
                },
                { 
                  data : null,
                  className: "text-center",
                  render : function ( data, type, row){

                    return 'Php '+row['salary'];
                  }
                },
                { data : "salary_status"},
                { 
                  data : null,
                  className: "text-center",
                  render : function ( data, type, row){
                    let markup = '';
                    let salary_date = row['salary_date'];

                    if (salary_date==null){
                      markup = '<button class="btn btn-success btn-sm view-salary-details" ><i class="fas fa-clipboard-check"></i></button>';
                    } else {
                      markup = '<a class="btn btn-danger btn-sm" href="Print-Salary.php?_period='+row['period']+'&_id='+row['id']+'&name='+row['applicant_name']+'&course_year='+(row['course']+' '+row['year_level'])+'&assigned_office='+row['office_name']+'&supervisor='+row['unit_head_name']+'&total_hours='+row['total_hours']+'&salary='+row['salary']+'" target="_blank"><i class="fas fa-print"></i></a>';
                    }


                    return markup;
                  }
                },
                { data : "sy", className: "collapse"},
                { data : "course", className: "collapse"},
                { data : "year_level", className: "collapse"},
                { data : "semester", className: "collapse"},
                { data : "total_hours", className: "collapse"},
                { data : "salary_date", className: "collapse"},
                { data : "id", className: "collapse"}

              ],
                ordering : false,
                dom: 'Bfrtip',
                buttons: [
                        {
                            text:'PRINT',
                            className: 'btn btn-danger collapse print-tbl',
                            extend: 'print',
                            exportOptions: {
                                columns: [1,2,3,4,5,6]
                            },
                            title: '',
                            customize: function(win) {
                              $(win.document.body).css('font-size', '10pt').prepend('<header class="text-center"><h4>University of Southeastern Philippines</h4><p>Apokon, Tagum City</p><br><br><h5>Student Labor Accomplishment Reports</h5></header>');
                              $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');  
                            }
                        }
                ],
              initComplete: function () {
                this.api().columns().every( function () {
                    var columnidx = this.index();
                    if (columnidx==5 || columnidx==2 || columnidx == 3 || columnidx == 4 || columnidx == 1){
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


          $(document).on("click",".view-rating-form",function(){
            var currentRow = $(this).closest("tr");
            var sl_id =  currentRow.find("td:eq(0)").text();
            var from =  currentRow.find("td:eq(4)").text();
            var to =  currentRow.find("td:eq(5)").text();
            $('.add-on').each(function(){
              $(this).remove();
            });
            $('.e-sign').attr('src','../../images/transparentbg.png');
            $.ajax({
                    url:"../../php/M-FacultyHead/getAccomplishmentReport.php",
                    method:"POST",
                    data:{appid:sl_id, date_from:from, date_to:to},
                    success:function(response)
                      {
                        try {
                          var obj = JSON.parse(response);
                          console.log(obj);
                          $('#report-applicant-id').val(sl_id);
                          $('#report-applicant-name').val(obj[0].applicant_name);
                          $('#report-applicant-name2').val(obj[0].applicant_name);
                          $('#report-course-year').val(obj[0].course_year);
                          $('#report-labor-class').val(obj[0].labor_class);
                          $('#report-labor-type').val(obj[0].labor_type);
                          $('#report-assigned-unit').val(obj[0].unit_assigned);
                          $('#report-total-hours').text(obj[0].total_hours+" hours");
                          $('#report-period').text(obj[0].period);
                          var tasks = obj[0].tasklist.split("#");
                          var str = '';
                          for (var i = 0; i < 8; i++) {
                            if (i < tasks.length) {
                              str = '<h6 class="font-weight-bold s12 add-on"> '+(i+1)+'.<span class="ml-2 font-weight-normal">'+tasks[i]+'</span><br></h6>';
                            } else {
                              str = '<h6 class="font-weight-bold s12 add-on"> '+(i+1)+'.<span class="ml-2 font-weight-normal"></span><br></h6>';
                            }
                              $('#report-tasks-list').append(str);
                          } 
                          
                          if (obj[0].student_signature.length==0){
                            $('#report-student-signature').attr('src','../../images/transparentbg.png');
                          } else {
                            $('#report-student-signature').attr('src','data:image/jpeg;base64,'+obj[0].student_signature);
                          }


                          if (obj[0].rating_status > 0) {
                            $('#report-duty-regularly').text(obj[0].duty_regularly);
                            $('#report-instruction-difficulty').text(obj[0].instruction_difficulty);
                            $('#report-time-utilize').text(obj[0].time_utilize);
                            $('#report-routine-work').text(obj[0].routine_work);
                            $('#report-initiative-creativity').text(obj[0].initiative_creativity);
                            $('#report-accurate-efficient').text(obj[0].accurate_efficient);
                            $('#report-good-interpersonal').text(obj[0].good_interpersonal);
                            $('#report-willing-learn').text(obj[0].willing_learn);
                            $('#report-good-working').text(obj[0].good_working);
                            $('#report-unit-head').val(obj[0].staff_requested_by);

                            if (obj[0].head_signature==0){
                              $('#report-student-signature').attr('src','../../images/transparentbg.png');
                            } else {
                              $('#report-rater-signature').attr('src','data:image/jpeg;base64,'+obj[0].head_signature);
                            }
                          } else {
                            $('#report-duty-regularly').text('');
                            $('#report-instruction-difficulty').text('');
                            $('#report-time-utilize').text('');
                            $('#report-routine-work').text('');
                            $('#report-initiative-creativity').text('');
                            $('#report-accurate-efficient').text('');
                            $('#report-good-interpersonal').text('');
                            $('#report-willing-learn').text('');
                            $('#report-good-working').text('');
                            $('#report-unit-head').val('');
                            $('#report-student-signature').attr('src','../../images/transparentbg.png');

                          }

                        } catch (e) {
                          alert("Data failed to load.");
                        }
                      },
                    error: function(response){
                      alert("An error occurred :" + JSON.stringify(response));
                    }
            });
          });


            $('#print-accomplishment-reports').click(function(){
              $('.print-tbl').trigger('click');
            });


          $(document).on("click",".view-salary-details",function(){
            var currentRow = $(this).closest("tr");
            let sname = currentRow.find("td:eq(1)").text().trim();
            let sy = currentRow.find("td:eq(14)").text().trim();
            let course = currentRow.find("td:eq(15)").text().trim();
            let year = currentRow.find("td:eq(16)").text().trim();
            let sem = currentRow.find("td:eq(17)").text().trim();
            let office = currentRow.find("td:eq(6)").text().trim();
            let supe = currentRow.find("td:eq(7)").text().trim();
            let hours = currentRow.find("td:eq(18)").text().trim();
            let amount = currentRow.find("td:eq(11)").text().trim();
            let date = currentRow.find("td:eq(19)").text().trim();
            let stat = currentRow.find("td:eq(12)").text().trim();
            current_rep_id = currentRow.find("td:eq(20)").text().trim();

            $('#sl-name-view').val(sname);
            $('#sl-sy-view').val(sy);
            $('#sl-course-yearlevel-view').val(course+' '+year);
            $('#sl-sem-view').val(sem);
            $('#sl-date-paid-view').val(date);
            $('#sl-status-view').val(stat);
            $('#sl-assigned-office-view').val(office);
            $('#sl-supervisor-view').val(supe);
            $('#sl-total-hours-view').val(hours);
            $('#sl-salary-view').val(amount);


            $('#salary-view').modal('toggle');
          });

          $(document).on("click","#mark-paid-btn",function(){
            $.ajax({
                    url:"../../php/M-FacultyHead/insert-update-queries.php",
                    method:"POST",
                    data:{ queryno: 3, rep_id : current_rep_id },
                    success:function(response)
                      {
                        if (response.length > 1){
                          swal(
                            'Something went wrong!',
                            'Update failed!',
                            'warning'
                          ) 
                        } else {
                          swal(
                            'Successful!',
                            'Changes saved!.',
                            'success'
                          )
                          location.reload();
                        }
                      },
                    error: function(response){
                      $('.fetched-data').text('');
                      alert("fail" + JSON.stringify(response));
                    }
                });
          });



        });
      </script>
</body>
</html>