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
    <title>Request Good Moral</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main2.css">
    <link rel="stylesheet" type="text/css" href="css/upstyle2.css">
    <link rel="stylesheet" type="text/css" href="css/upstyle_shy.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
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
          <a class="app-menu__item active" href="ReqGoodMoral.php">
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
                <form method="POST" action>

                </form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="tile">
                      <div class="tile-body">
                        <div>
                          <div>
                            <div class="float-left"><h4>Request Good Moral</h4></div>
                          </div>
                          <br><br>
                          <div class="row">
                            <div class="col-2">
                              <label>Month of:</label>
                              <select class="form-control" id="sortMonth">
                                <option value="">ALL</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                              </select>
                            </div>
                            <div class="col-2">
                              <label>Student Type:</label>
                              <select class="form-control" id="sortStudyType">
                                <option value="">ALL</option>
                                <option value="Alumni">Alumni</option>
                                <option value="Graduate">Graduate</option>
                                <option value="Undergraduate">Undergraduate</option>
                              </select>
                            </div>
                            <div class="col-3">
                              <label>Course:</label>
                              <select class="form-control" id="sortCourse">
                                <option value="">ALL</option>
                                <option value="BEED">Bachelor of Elementary Education</option>
                                <option value="BSNED">Bachelor of Special Needs Education</option>
                                <option value="BECED">Bachelor of Early Childhood Education</option>
                                <option value="BSED">Bachelor of Secondary Education</option>
                                <option value="BSIT">Bachelor of Science in Information Technology</option>
                                <option value="BTVTE">Bachelor of Technical Vocational Teacher Education</option>
                                <option value="BSIT">Doctors of Education in Educational Management</option>
                                <option>Master of Education</option>
                                <option>Master of Education in Language Teaching</option>
                                <option>Bachelor of Science in Agriculture</option>
                                <option value="BSABE">Bachelor of Science in Agricultural and Biosystem Engineering</option>
                                <option value="BSF">Bachelor of Science in Forestry</option>
                                <option>Doctor of Philosophy in Horticulture</option>
                                <option>Master of Science in Agricultural Engineering</option>
                                <option>Master of Science in Forestry</option>
                                <option>Master of Science in Agriculture</option>
                                <option>Master of Extension Education</option>
                                <option>Master of Science in Environment Resource Management</option>
                              </select>
                            </div>
                          </div>
                          <div class="table-bd">
                            <div class="table-responsive">
                              <br>
                              <table class="table table-hover table-bordered" id="sampleTable2">
                                <thead>
                                  <tr>
                                    <th>Request No.</th>
                                    <th style="width: 200px;">Full Name</th>
                                    <th>Course</th>
                                    <th>Student Type</th>
                                    <th class="max">Date Requested</th>
                                    <th style="width: 125px;">Action</th>

                                  </tr>
                                </thead>
                                <tbody id="request-good-moral-table-body">
                                  <?php
                                  $query = mysqli_query($conn, "SELECT 
                                    good_moral_requests.request_id,
                                    good_moral_requests.last_sy_attended,
                                    good_moral_requests.requested_by,
                                    good_moral_requests.date_requested,
                                    good_moral_requests.or_no,
                                    good_moral_requests.purpose,
                                    good_moral_requests.or_pic,

                                    student.Student_id,
                                    student.course_id,
                                    student.first_name,
                                    student.middle_name,
                                    student.last_name,
                                    student.type,

                                    course.course_id,
                                    course.major,
                                    course.name,
                                    course.title

                                    FROM good_moral_requests
                                    JOIN student
                                    ON good_moral_requests.requested_by = student.Student_id
                                    JOIN course
                                    ON student.course_id = course.course_id

                                    UNION

                                    SELECT
                                    good_moral_requests.request_id,
                                    good_moral_requests.last_sy_attended,
                                    good_moral_requests.requested_by,
                                    good_moral_requests.date_requested,
                                    good_moral_requests.or_no,
                                    good_moral_requests.purpose,
                                    good_moral_requests.or_pic,

                                    alumni.id,
                                    alumni.course_id,
                                    alumni.first_name,
                                    alumni.middle_name,
                                    alumni.last_name,
                                    'Alumni' as type,

                                    course.course_id,
                                    course.major,
                                    course.name,
                                    course.title

                                    FROM good_moral_requests
                                    JOIN alumni
                                    ON good_moral_requests.requested_by = alumni.id
                                    JOIN course
                                    ON alumni.course_id = course.course_id");

                                  while($row = mysqli_fetch_array($query)){

                                    ?>

                                    <tr>
                                      <td><?php echo $row["request_id"]?></td>
                                      <td><?php echo $row["first_name"]. ' ' .$row["middle_name"]. ' ' .$row["last_name"]; ?></td>
                                      <td><?php echo $row["title"]?></td>
                                      <td><?php echo $row["type"]?></td>
                                      <td><?php echo $row["date_requested"]?></td>

                                      <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" href="#exampleModalLong<?php echo $row['request_id']; ?>"><i class="fas fa-eye"></i></button>
                                        <?php include('goodmoral_view.php');?>




                                        <a class="btn btn-danger btn-sm" href="print-certification2.php?id=<?php echo $row["request_id"] ?>" target="blank"><i class="fas fa-print"></i></a>
                                      

                                         
                                        <?php $stud_req = $row['requested_by']; $status = false;




                                        $dis_query="SELECT * FROM `notif` WHERE message_status = 'Delivered' or message_status ='Seen' and link = 'http://localhost/Notification%20Function/GoodMoral/O-StudentDefault/index.php'";
                                          $rr = mysqli_query($conn, $dis_query);             

                                        while ($re = mysqli_fetch_assoc($rr)) {         
                                          if ($re['user_id']==$stud_req) {
                                            $status=true;}}
                                         

                                         if ($status==true) {
                                             
                                              ?>

                                            <a><button class="btn btn-success btn-sm" id="notif" disabled="true"><i class="far fa-bell mr-1"></i>Notify </button></a>
                                              


                                        <?php  }else{ ?>
                                              <a href="goodmoralnotif.php?rn=<?= $row['requested_by'] ?>"><button class="btn btn-success btn-sm" id="notif"><i class="far fa-bell mr-1"></i>Notify </button></a>

                                        <?php }?>

                                        
                                        

                                
                                      </td>
                                    </tr>

                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  




         <!--<div class="modal fade " id="exampleModalLong<?php echo $row['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">

                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>-->

<!--Modal Form-
<div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Good Moral Form</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div id="print-container">
                              <div class="modal-body">
                              <input type="text" id="studentNum">
                              <?php 
                                $result = mysqli_query($conn , "SELECT student_name, course , major, school_year, school_year_to, date_requested, date_issued, purpose FROM good_moral");
                                $row=mysqli_fetch_array($result);
                                $date = explode('-', $row['date_issued']);
                                $year = $date[0];
                                $month = $date[1];
                                $day = $date[2];
                                if($month == '1'){
                                  $month = 'January';
                                }else if($month == '2'){
                                  $month = 'February';
                                }else if($month == '3'){
                                  $month = 'March';
                                }else if($month == '4'){
                                  $month = 'April';
                                }else if($month == '5'){
                                  $month = 'May';
                                }else if($month == '6'){
                                  $month = 'June';
                                }else if($month == '7'){
                                  $month = 'July';
                                }else if($month == '8'){
                                  $month = 'August';
                                }else if($month == '9'){
                                  $month = 'September';
                                }else if($month == '10'){
                                  $month = 'October';
                                }else if($month == '11'){
                                  $month = 'November';
                                }else if($month == '12'){
                                  $month = 'December';
                                }
                              ?>
                              <div class="row">
                                <div class="col">
                                  <div class="text-center w-100">
                                    <img src="image/logo.png" width="100px" class="mb-1">
                                    <h5 class="s17 oldenglish lh">University of Southeastern Philippines</h5>
                                    <h5 class="s16 times lh-1 fw"><i>Tagum Mabini Campus</i></h5>
                                    <h5 class="s16 times lh-1 fw"><i>Office of Student Affairs and Services</i></h5>
                                    <h4 class="s20 times fw mt-5 mb-5">CERTIFICATION</h4>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="mlr s16">
                                    <p class="text-justify w-100 p">This is to certify that per records on file,

                                    <input class="form-control fc w120" type="text" value="<?php echo $row['student_name']; ?>">

                                    , is a graduate of the University of Southeastern Philippines, Tagum - Mabini with the degree of  

                                    <input class="form-control fc w120" type="text" placeholder=""  value="<?php echo $row['course']; ?>"> major in 

                                    <input class="form-control fc w120" type="text" placeholder="" value="<?php echo $row['major']; ?>">SY. 

                                    <input class="form-control fc w75" type="text" placeholder="" value="<?php echo $row['school_year']; ?>">
                                    - 

                                    <input class="form-control fc w75" type="text" placeholder="" value="<?php echo $row['school_year_to']; ?>">.  </p>

                                    <p class="text-justify w-100 mt-4 p"> Records of this office show that he/she was not reported or charged for any misbehavior or infraction against the school's rules and regulations.</p>

                                    <p class="text-justify w-100 mt-4 p"> This certifies further that

                                     <input class="form-control fc w150" type="text" placeholder="" value="<?php echo $row['student_name']; ?>">

                                   possesses good moral character during his/her stay in this University.</p>

                                   <p class="text-justify w-100 mt-4 p"> This certification is being issued upon the request of 

                                    <input class="form-control fc w120 " type="text" placeholder="" value="Good Moral">

                                    for 

                                    <input class="form-control fc w150" type="text" placeholder="" value="<?php echo $row['purpose']; ?>">

                                  purposes only.</p>

                                  <p class="text-justify w-100 mt-4 p">Issued this 

                                    <input class="form-control fc w50 " type="text" placeholder="" value="<?php echo $day; ?>">

                                    day of 

                                    <input class="form-control fc w50" type="text" placeholder="" value="<?php echo $month; ?>">

                                    ,  

                                    <input class="form-control fc w50" type="text" placeholder="" value="<?php echo $year; ?>">

                                  at USeP Tagum - Mabini Campus, apokon, Tagum City.</p>


                                  <div class="float-right text-center mt60">
                                    <p class="lh-1"><b>KENDI B. ARSITIO</b></p>
                                    <p class="lh-1">OSAS-Coordinator, Tagum Unit</p>
                                  </div><br>

                                  <div class=" mt130 d-block" style="font-size: 13px;">
                                    <span class="lh-2">O.R# <input class="form-control fc w120" type="text" placeholder="" disabled=""></span><br>
                                    <span class="lh-2">Not valid without the</span><br>
                                    <span class="lh-2">University Seal</span>
                                  </div>


                                </div>

                              </div>
                            </div>

                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" id="print-btn" class="btn btn-success" data-dismiss="modal">Print</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  -->

                </main>
              </main>

              <script src="js/jquery-3.3.1.min.js"></script>
              <script src="js/popper.min.js"></script>
              <script src="js/bootstrap.min.js"></script>
              <script src="js/main.js"></script>
              <!-- The javascript plugin to display page loading on top-->
              <script src="js/plugins/pace.min.js"></script>
              <!-- Page specific javascripts-->
              <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
              <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
              <script type="text/javascript" src="js/plugins/printThis.js"></script>
              <script type="text/javascript">
                var options = {
                  importCSS: true,
                  loadCSS: "css/all.css",
                  pageTitle:"Certificate of Good Moral",
                }
                $('#print-btn').click(function(){
                  $('#print-container').printThis(options);

                })
                $('#demoNotify').click(function(){
                  $.notify(
                    {            title: "Update Complete : ",
                    message: "Verified Successfuly!",
                    icon: 'fa fa-check' 
                  },{
                    type: "info"
                  });
                });
                $(document).ready(function(){
                  $('#sortMonth').on('change',function(){
                    filter_table($('#sortMonth').val(),$('#sortStudyType').val(),$('#sortCourse').val());
                  })
                  $('#sortStudyType').on('change',function(){
                    filter_table($('#sortMonth').val(),$('#sortStudyType').val(),$('#sortCourse').val());
                  })
                  $('#sortCourse').on('change',function(){
                    filter_table($('#sortMonth').val(),$('#sortStudyType').val(),$('#sortCourse').val());
                  })
          //FILTER FUNCTION
          function filter_table(month,stud_type,course){
            $('#request-good-moral-table-body tr').each(function(){
              var found = 0;
              $(this).each(function(){
                if($(this).text().toLowerCase().indexOf(month.toLowerCase()) >= 0){
                  found += 1;
                }
                if($(this).text().toLowerCase().indexOf(stud_type.toLowerCase()) >= 0){
                  found += 1;
                }
                if($(this).text().toLowerCase().indexOf(course.toLowerCase()) >= 0){
                  found += 1;
                }
              });

              if(found == 3){
                $(this).show();
              }else{
                $(this).hide();
              }
            })
          }
        })
      </script>
      <script>
        <!-- table selection -->
        $('#selectAll').click(function (e) {
          $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        });
      </script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
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
        function notif(){


            document.getElementById("notif").disabled = true;

        }
      </script>

      <script>
$(document).ready(function(){
  $("#notif").click(function(){
    $(document).on('click', '#disable-button', disableButton);
    alert("ereka");
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
      <div id="myModal" class="modal fade" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Notifications</h5>
            </div>
            <div class="modal-body">
              <p>You have <?php echo $count;  ?> unread notifications</p><br>


              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
