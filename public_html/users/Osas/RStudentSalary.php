<?php   
  include 'conn.php';
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
      <title>USeP OSAS Admin Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
          <link rel="stylesheet" type="text/css" href="../../css/main_main.css">
          <link rel="stylesheet" type="text/css" href="../../css/upstyle_main.css"> 
          <link rel="stylesheet" type="text/css" href="../../css/print.css"> 
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- PRINT BUTTON
    <script type="text/javascript">
      function printContent(el){
      var restorePage = document.body.innerHTML;
      var printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();  
      document.body.innerHTML = restorePage;
      }
    </script>-->
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
              <li><a class="treeview-item active" href="RStudentlists.php">Student Labor</a></li>
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
                    <div class="appnavlevel"style="color:black;">
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
                  <div class="float-left"><h4>Student Labor Reports - Student Labor Salary</h4></div>
                </div>
                <br><br>
                  <div class="row">             
                    <div class="col mt-1">
                      <div class="inline-block">
                        <div class="bs-component">
                          <ul class="nav nav-pills nav-stacked">
                          <li class="nav-item dropdown"><a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Report Type</a>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="RStudentlists.php">Student Labor Lists</a>
                              <a class="dropdown-item" href="RstudentDTR.php">Student Labor DTR</a>
                              <a class="dropdown-item" href="RStudentSalary.php">Student Labor Salary</a>
                            </div>
                          </li>
                          </ul>
                        </div>
                      </div>
                          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                      
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
                    Semester and Year <br>
                    <select class="bootstrap-select size-150px" name="sem_drpdwn" id="sem_drpdwn">
                        <option class="select-item" value="0">All</option>
                        <?php
                                    
                                    
                                    $sql="SELECT DISTINCT sem_year FROM sl_accomplishment_report";
                                    $result = mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                          echo "<option class='select-item'";
                                          if(isset($_POST['sem_drpdwn']) && $_POST['sem_drpdwn'] == $row['title']){
                                              echo "selected value=".$row['sem_year']." >".$row['sem_year']."</option>";
                                          }else{
                                            echo "value=".$row['sem_year']." >".$row['sem_year']."</option>";
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
                                <button class="btn btn-success" name="submit_sls" type="submit" id="submit_sll" style="margin-right: 12px;" target="_blank"><i class="fas fa-print"></i>&nbsp; Print</button>
                              </div>
                            </div>


            <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered" id="sampleTable2">
                    <thead>
                      <tr>
                      <th>SL ID</th>
                      <th class="max">Full Name</th>
                      <th>Course & Year</th>
                      <th>Semester</th>
                      <th class="max">Assigned Office</th>
                      <th>Immediate Supervisor</th>
                       <th>Total No. of Hours</th>
                        <th>Total Salary</th>
                      </tr>
                    </thead>
                    <tbody id="dataSalary">
                      <?php
                   

                      $sql="SELECT * FROM sl_accomplishment_report where applicant_id is not null";

                       if (!empty($_POST['yr_drpdwn']) || isset($_POST['yr_lvl']) || isset($_POST['course_dropdwn']) || isset($_POST['college_drpdwn'])) {
                         # code...
                        

                        //$yr_comp = $_POST['yr_drpdwn'];
                        $mont_comp = $_POST['month_drpdwn'];
                        $yr_lvl_comp = $_POST['yr_lvl'];
                        $course_comp = $_POST['course_dropdwn'];
                        $sem_comp = $_POST['sem_drpdwn'];
                        //$action_comp = $_POST['action_drpdwn'];

                        

                        /*if ($yr_comp != "0") {
                          # code...
                          $sql .= " AND year(complaint.Date_of_incident) = '$yr_comp' ";
                        }*/
                        if ($mont_comp != "0") {
                          # code...
                          $sql .= " AND date_posted like '%-$mont_comp-%' ";
                        }
                        if ($yr_lvl_comp != "0") {
                          # code...
                          $sql .= " AND course_year like '%$yr_lvl_comp%' ";
                        }
                        if ($course_comp != "0") {
                          # code...
                          $sql .= " AND course_year like '$course_comp%' ";
                        }
                        if ($sem_comp != "0") {
                          # code...
                          $sql .= " AND sem_year = '$sem_comp' ";
                        }
                        /*if ($action_comp != "0") {
                          # code...
                          $sql .= " AND response.action_taken = '$action_comp' ";
                        }*/

                       }
                    
                       echo '<input type="text" name="sql_val" id="sql_val" style="width:1000px;" value="'.$sql.'" hidden>';
                    
                    $result = mysqli_query($conn,$sql);
                    if (!$result) {
                       printf("Error: %s\n", mysqli_error($conn));
                       exit();
                       }
                       else{
                       while($row=mysqli_fetch_array($result)){
                      echo  "<tr>";
                      echo  "<td>".$row['applicant_id']. "</td>";
                      echo  "<td>".$row['applicant_name']. "</td>";
                      echo  "<td>".$row['course_year']."</td>";
                      echo  "<td>".$row['sem_year']."</td>";
                      echo  "<td>".$row['unit_assigned']."</td>";
                      echo  "<td>".$row['staff_requested_by']."</td>";
                      echo  "<td>".$row['total_hours']."</td>";
                      echo  "<td>".$row['salary']."</td>";
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
<!-- Essential javascripts for application to work-->
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
    <!--DISPLAYING OF STUDENT LABOR LIST!
    <script >
        $(document).ready(function(){
            $.ajax({
                type:"GET",
                url:"conn.php",
                dataType: "html",
                success: function(data){  
                    $('#dataSalary').html(data);
                }
            });
        });
    </script>-->
  </body>
</html>