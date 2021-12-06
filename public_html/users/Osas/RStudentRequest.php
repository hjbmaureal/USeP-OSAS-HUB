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
     <link rel="stylesheet" type="text/css" href="../../css/main_main.css">
      <link rel="stylesheet" type="text/css" href="../../css/upstyle_main.css">
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
      <body class="app sidebar-mini rtl" onload="initClock()">
      <!-- Navbar-->

        
      <header class="app-header">
    
   
      </header>
   
   <script>


        (function(document) {
            'use strict';

            var TableFilter = (function(myArray) {
                var search_input;

                function _onInputSearch(e) {
                    search_input = e.target;
                    var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                    myArray.forEach.call(tables, function(table) {
                        myArray.forEach.call(table.tBodies, function(tbody) {
                            myArray.forEach.call(tbody.rows, function(row) {
                                var text_content = row.textContent.toLowerCase();
                                var search_val = search_input.value.toLowerCase();
                                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                            });
                        });
                    });
                }

                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('bootstrap-select');
                        myArray.forEach.call(inputs, function(input) {
                            input.oninput = _onInputSearch;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    TableFilter.init();
                }
            });

        })(document);
    </script>

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
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-briefcase"></i>
            <span class="app-menu__label">Student Labor</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Labor-Requisition.php">Requisition</a></li>
              <li><a class="treeview-item" href="Labor-Application.php">Application</a></li>
              <li><a class="treeview-item" href="DTR.php">DTR & Salary</a></li>
              <li><a class="treeview-item" href="Labor-Accomplishment.php">Accomplishment Reports</a></li>
            </ul>
        </li>
        <li>
          <a class="app-menu__item" href="ReqGoodMoral.php">
            <i class="app-menu__icon fa fa-file"></i>
            <span class="app-menu__label">Request for Good Moral</span>
          </a>
        </li>

          
        <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="RStudentOrg.php">Student Organization</a></li>
              <li><a class="treeview-item" href="RStudentDiscipline.php">Student Discipline</a></li>
              <li><a class="treeview-item" href="RStudentlists.php">Student Labor</a></li>
              <li><a class="treeview-item active" href="RStudentRequest.php">Good Moral</a></li>
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
            if($result = mysqli_query($conn, "SELECT * FROM current_semester")){
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
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Prologo Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
                
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
        <div class="red"> 
          
        </div>

<br>

         <!--<div class="page-error tile">-->

       <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <div class="float-left"><h4>Request Good Moral Reports</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                  

                     
</li>
</ul>
</div>
</div>
</div>

<br>
<br>
                    <div class="row">
  
                    <div class="col mt-1">
                    <form method="Post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <div class="inline-block">
                      School Year<br>
                      <select class="bootstrap-select" name="schl_yr" id="schl_yr">
                        <option class="select-item" value="0">All</option>
                        <?php
                                    
                                   
                                    $sql="SELECT DISTINCT last_sy_attended FROM good_moral_requests ORDER BY last_sy_attended ASC";
                                    $result = mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                          echo "<option class='select-item'";
                                          if(isset($_POST['schl_yr']) && $_POST['schl_yr'] == $row['last_sy_attended']){
                                              echo "selected value=".$row['last_sy_attended']." >".$row['last_sy_attended']."</option>";
                                          }else{
                                            echo "value=".$row['last_sy_attended']." >".$row['last_sy_attended']."</option>";
                                          }
                                    }
                                ?>
                            </select>
                      </div>

                    <div class="inline-block">
                    Month of <br>
                    <select class="bootstrap-select" name="month_drpdwn" id="month_drpdwn">
                          <option class="select-item" value="0">All</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 1 ) echo 'selected'?> value="1">January</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 2 ) echo 'selected'?> value="2">February</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 3 ) echo 'selected'?> value="3">March</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 4 ) echo 'selected'?> value="4">April</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 5 ) echo 'selected'?> value="5">May</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 6 ) echo 'selected'?> value="6">June</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 7 ) echo 'selected'?> value="7">July</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 8 ) echo 'selected'?> value="8">August</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 9 ) echo 'selected'?> value="9">September</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 10 ) echo 'selected'?> value="10">October</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 11 ) echo 'selected'?> value="11">November</option>
                          <option class="select-item"<?php if(isset($_POST['month_drpdwn']) && $_POST['month_drpdwn'] == 12 ) echo 'selected'?> value="12">December</option>
                      </select>
                    </div>
                 <div class="inline-block">
                    Year Level <br>
                    <select class="bootstrap-select" name="yr_lvl" id="yr_lvl">
                       <option class="select-item" value="0">All</option>
                        <?php
                                    
                                    
                                    $sql="SELECT LEFT(year_desc,3) as lvl FROM year";
                                    $result = mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                          echo "<option class='select-item'";
                                          if(isset($_POST['yr_lvl']) && $_POST['yr_lvl'] == $row['lvl']){
                                              echo "selected value=".$row['lvl']." >".$row['lvl']."</option>";
                                          }else{
                                            echo "value=".$row['lvl']." >".$row['lvl']."</option>";
                                          }
                                    }
                                ?>
                            </select>
                    </div>

                    <div class="inline-block">
                    Course  <br>
                    <select class="bootstrap-select size-150px" name="course_dropdwn" id="course_dropdwn">
                      <option class="select-item" value="0">All</option>
                        <?php
                                    
                                   
                                    $sql="SELECT DISTINCT title FROM course";
                                    $result = mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                          echo "<option class='select-item'";
                                          if(isset($_POST['course_dropdwn']) && $_POST['course_dropdwn'] == $row['title']){
                                              echo "selected value=".$row['title']." >".$row['title']."</option>";
                                          }else{
                                            echo "value=".$row['title']." >".$row['title']."</option>";
                                          }
                                    }
                                ?>
                            </select>
                    </div>
                    
                    <div class="inline-block">
                    Type  <br>
                    <select class="bootstrap-select size-150px" name="stdnt_typ" id="stdnt_typ">
                      <option class="select-item" value="0">All</option>
                        <?php
                                    
                                   
                                    $sql="SELECT DISTINCT type FROM student";
                                    $result = mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                          echo "<option class='select-item'";
                                          if(isset($_POST['stdnt_typ']) && $_POST['stdnt_typ'] == $row['type']){
                                              echo "selected value=".$row['type']." >".$row['type']."</option>";
                                          }else{
                                            echo "value=".$row['type']." >".$row['type']."</option>";
                                          }
                                    }
                                ?>
                            </select>
                    </div>
                </div>
            <div class="inline-block float mr-7 mt-3">
                      <button class="btn btn-secondary" name="filter" type="submit" id="filter" style="margin-right: 12px; "><i class="fas fa-filter"></i>&nbsp; Filter</button>
                    </div>
                  </form>
                  <form method="POST" action="PrintReports.php" target="_blank">
                    <div class="inline-block float mr-3 mt-3">
                      <button class="btn btn-success" name="submit_gm" type="submit" id="submit_gm" style="margin-right: 12px; "><i class="fas fa-print"></i>&nbsp; Print</button>
                    </div>

</div>
            
                
 <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered" id="sampleTable2">
                    <thead>
                      <tr>
                      <th>Request No.</th>
                      <th>OR No.</th>
                      <th class="max">Full Name</th>
                      <th>Course/Degree</th>
                      <th>Year Level</th>
                      <th>School Year</th>
                      <th>Purpose</th>
                      <th>Student Type</th>
                      <th class="max">Date Requested</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    
                    $sql = "SELECT
                            good_moral_requests.request_id as req_id,
                            good_moral_requests.or_no as or_no,
                            concat( student.first_name,' ',LEFT(student.middle_name, 1),'.',' ',student.last_name,' ',student.suffix) as name,
                            course.title As course,
                            student.year_level,
                            good_moral_requests.last_sy_attended as sy_attended,
                            good_moral_requests.purpose as purpose,
                            student.type as type,
                            good_moral_requests.date_requested as date_req 
                            FROM student JOIN course ON  student.course_id = course.course_id 
                            JOIN good_moral_requests ON student.Student_id = good_moral_requests.requested_by";

                    if(!empty($_POST['schl_yr']) || isset($_POST['month_drpdwn']) || isset($_POST['yr_lvl']) || isset($_POST['course_dropdwn']) || isset($_POST['stdnt_typ'])){

                      $schoolyr = $_POST['schl_yr'];
                      $month = $_POST['month_drpdwn'];
                      $yrlvl = $_POST['yr_lvl'];
                      $course_gm = $_POST['course_dropdwn'];
                      $studenttype = $_POST['stdnt_typ'];

                      if ($schoolyr != "0") {
                        # code...
                        $sql .= " AND good_moral_requests.last_sy_attended = '$schoolyr' ";
                      }
                      if ($month != "0") {
                        # code...
                        $sql .= " AND month(complaint.Date_of_incident) = '$month' ";
                      }
                      if ($yrlvl != "0") {
                        # code...
                        $sql .= " AND LEFT(student.year_level,3) = '$yrlvl' ";
                      }
                      if ($course_gm != "0") {
                        # code...
                        $sql .= " AND course.title = '$course_gm' ";
                      }
                      if ($studenttype != "0") {
                        # code...
                        $sql .= " AND student.type = '$studenttype' ";
                      }
                    }

                     echo '<input type="text" name="sql_val" id="sql_val" hidden value="'.$sql.'">';
                          $result = mysqli_query($conn,$sql);
                          if (!$result) {
                             printf("Error: %s\n", mysqli_error($conn));
                             exit();
                             }
                             else{
                               while($row=mysqli_fetch_array($result)){
                                  echo  "<tr>";
                                  echo  "<td>".$row['req_id']. "</td>";
                                  echo  "<td>".$row['or_no']. "</td>";
                                  echo  "<td>".$row['name']."</td>";
                                  echo  "<td>".$row['course']."</td>";
                                  echo  "<td>".$row['year_level']."</td>";
                                  echo  "<td>".$row['sy_attended']."</td>";
                                  echo  "<td>".$row['purpose']."</td>";
                                  echo  "<td>".$row['type']."</td>";
                                  echo  "<td>".$row['date_req']."</td>";
                                 
                                  echo  "</tr>";
                                }
                          }
                    
                  ?>
                  
                    </tbody>
                  </table>
                  </form>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>  

          <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"># 00001</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                        <h6 class="font-weight-bold">OR No.: <span class="font-weight-lighter ml-2"> 20001</span></h6> 
                        <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"> Ereka Rose T. Redulla</span></h6>
                        <h6 class="font-weight-bold">Degree: <span class="font-weight-lighter ml-2"> Bachelor of Science in Information Technology (BSIT)</span></h6>
                        <h6 class="font-weight-bold">Major: <span class="font-weight-lighter ml-2"> Information Security</span></h6>
                        <h6 class="font-weight-bold">School Year: <span class="font-weight-lighter ml-2"> 2018-2019</span></h6>
                             <h6 class="font-weight-bold">Purpose: <span class="font-weight-lighter ml-2"> Request for Transfer</span></h6>
                       
                             <br>

                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                      </div>
                    </div>
                  </div>
                </div>
    </main>
     </main>
    <!-- Essential javascripts for application to work-->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../../js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="../../js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/fullcalendar.min.js"></script>
    <script type="text/javascript">
        $('#demoNotify').click(function(){
          $.notify({
            title: "Update Complete : ",
            message: "Disable Successfuly!",
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
      <script type="text/javascript">$('#sampleTable').DataTable();</script>
      <script type="text/javascript">$('#sampleTable2').DataTable();</script>
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
           function openForm() {
          document.body.classList.add("myForm");

      }

        function closeForm() {
          document.body.classList.remove("myForm");

      }

      </script>
         <script type="text/javascript">
      $(document).ready(function() {
      
        $('#external-events .fc-event').each(function() {
      
          // store data so the calendar knows to render an event upon drop
          $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true // maintain when user navigates (see docs on the renderEvent method)
          });
      
          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
          });
      
        });
      
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar
          drop: function() {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }
          }
        });
      
      
      });


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
  </body>
</html>