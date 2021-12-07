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
      <title>Admin | USeP Virtual Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../../css/main3.css">
      <link rel="stylesheet" type="text/css" href="../../css/upstyle3.css">
      <link rel="stylesheet" type="text/css" href="../../css/upstyle_shy3.css">

      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="js/plugins/jquery.autocomplete.min.js"></script>
    <script src="http://ajax.microsoft.com/ajax/jQuery/jquery-1.4.2.min.js"></script>
    <script type="text/javascript">
                      jQuery(function(){
                        $("#search").autocomplete("search.php");
                      });
                    </script>

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
          <a class="app-menu__item active" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-list-alt"></i>
            <span class="app-menu__label">Student Discipline</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
            <ul class="treeview-menu">
              <li><a class="treeview-item active" href="Complaints.php">Complaints</a></li>
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
            <div class="datetime appnavlevel" style="color:black;">
              <div class="date">
                <span id="dayname">Day</span>,
                <span id="month">Month</span>
                <span id="daynum">00</span>,
                <span id="year">Year</span>
              </div>
            </div>
          </li>
          <li>
            <div class="datetime appnavlevel"style="color:black;">
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
        <div class="red"> 
          
        </div>


                        <div class="row">
                          <div class="col-md-12">
                            <div class="tile">
                              <div class="tile-body">
                                <div class="row">
                                  <div class="col">
                                    <div class="float-left"><h4>Complaints</h4></div>
                                  </div>
                                  <div class="col">
                                   <div class="inline-block float ml-2 btn-group">
                                     <!-- <button type="button" class="btn btn-danger  btn-sm button-sm150 mtop"><i class="mr-1 fas fa-download"></i> Export</button>-->
                                   </div>
                                 </div>
                               </div>
                               <div class="row">
                                <div class="col mt-1 ">
                                  <div class="inline-block">
                                    Course<br>
                                    <select class="bootstrap-select">
                                      <option class="select-item" value="1" selected="selected">All</option>
                                      <option class="select-item" value="2">BSIT</option>
                                      <option class="select-item" value="3">BEED</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="table-bd">
                                <p class="font-weight-bold"> Action Taken By: </p>
                                <select id="action_taken" name="action_taken"  class="form-control" required>
                                          <option class="select-item" value="Select" >Select Action To Be Taken:</option>
                                          <option class="select-item" value="Dean">Dean</option>
                                          <option class="select-item" value="Admin">Admin</option>
                                          <option class="select-item" value="OSAS">OSAS</option>
                                        </select>
                                <div class="table-responsive">
                                  <br>
                                  <table class="table table-hover table-bordered" id="sampleTable2">
                                    <thead>
                                      <tr>
                                        <th style="width: 10px;" class="text-center align-middle">#</th>
                                        <th class="max">Complainant</th>
                                        <th>College</th>
                                        <th>Program/Course</th>
                                        <th>Year</th>
                                        <th>Section</th>
                                        <th>Designation of Person Being Complained</th>
                                        <th style="width:40px" class="text-center align-middle">View</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <?php 
                                            $tab = mysqli_query($conn, "SELECT s.student_id as Student_ID, s.first_name,s.middle_name,s.last_name,s.title, s.suffix, fullname(s.first_name,s.middle_name,s.last_name,s.title, s.suffix, '', 'firstname_first') as fullname, s.section as section, s.year_level, s.type, s.e_signature, c.title as course_title, cl.title as college_title, cl.description as college_name, com.Complaint_ID as Complaint_ID, com.Date_Submitted as date_Submitted, com.Date_of_Incident as date_incident, com.Time_of_Incident as time_incident, com.Loc_of_Incident  as loc_incident, com.Person_Complained as person_complained, com.Designation_Complained as designation_complained, com.Detail as detail,  com.Witness1 as witness1, com.Witness2 as witness2, com.Witness3 as witness3, com.Status FROM student as s JOIN course as c ON c.course_id = s.course_id JOIN college as cl ON cl.college_id = c.college_id JOIN complaint as com ON com.Student_id = s.student_id WHERE com.Status = 'In Process' OR com.Status = 'Pending' OR com.Status = 'On Going'");

                                            $row=mysqli_num_rows($tab);
                                         while($res = mysqli_fetch_array($tab)){

                                        $image1 = base64_encode($res['e_signature']); 
                                        ?>

                                      
                                        <td class="text-center align-middle"><?php echo $res['Complaint_ID']; ?></td>
                                        <td><?php echo $res['fullname']; ?></td>
                                        <td><?php echo $res['college_name']; ?></td>
                                        <td><?php echo $res['course_title']; ?></td>
                                        <td><?php echo $res['year_level']; ?></td>
                                        <td><?php echo $res['section']; ?></td>
                                         <td><?php echo $res['designation_complained']; ?></td>
                                        <td class="text-center align-middle">
                                          <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                          data-role="prodbtn1"
                                          data-cid="<?php echo $res['Complaint_ID']; ?>"
                                          data-sid="<?php echo $res['Student_ID']; ?>"
                                          data-fname="<?php echo $res['fullname']; ?>"
                                          data-college="<?php echo $res['college_title']; ?>"
                                          data-datesub="<?php echo $res['date_Submitted']; ?>"
                                          data-stype="<?php echo $res['type']; ?>"
                                          data-dateinci="<?php echo $res['date_incident']; ?>"
                                          data-timeinci="<?php echo $res['time_incident']; ?>"
                                          data-locinci="<?php echo $res['loc_incident']; ?>"
                                          data-personcom="<?php echo $res['person_complained']; ?>"
                                          data-desigcom="<?php echo $res['designation_complained']; ?>"
                                          data-detail="<?php echo $res['detail']; ?>"
                                          data-witness1="<?php echo $res['witness1']; ?>"
                                          data-witness2="<?php echo $res['witness2']; ?>"
                                          data-witness3="<?php echo $res['witness3']; ?>"
                                          data-sig="<?php echo $image1 ?>"><i class="fas fa-eye"></i></button>

                                        </td>

                                      </tr>
                                        

                                      <?php
                                            
                                          }
                                        ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>  

                      

                      <!-- MODAL VIew -->
                      <!-- MODAL VIew -->
                      <form method="POST" action="../../php/updateComplaints.php" name="complaintForm">
                      <div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Student Complaint Form</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="table-responsive">
                                    <table class="table table-bordered">
                                      <thead>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td style="border-color: black;" class="text-center align-middle" width="100px;"><img src="../../images/logo.png" width="100px;"></td>
                                          <td style="border-color: black; font-weight:bold;" class="text-center align-middle" width="450px">
                                            <span class="fs-11 d-block">Republic of the Philippines</span>
                                            <span style="font-family:Old English Text MT;">University of Southeasetern Philippines</span>
                                            <span class="fs-11 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                            <span class="fs-11 d-block">Telephone: (082) 227-8192</span>
                                            <span class="fs-11 d-block">Website: www.usep.edu.ph</span>
                                            <span class="fs-11 d-block">Email: president@usep.edu.ph</span>
                                          </td>
                                          <td style="padding:0px; border-color: black; font-weight: bold;" class="td-b" width="230px">
                                            <table width="100%">
                                              <tr>
                                                <td class="fs-11 p-1" style=" border: 1px solid black;border-top: 0px; border-left: 0px;">Form No.</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-top: 0px; border-right: 0px;">FM-USeP-HSC-01</td>
                                              </tr>
                                              <tr>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-left: 0px; border-bottom: 0px;">Issue Status</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-right: 0px;">02</td>
                                              </tr>
                                              <tr>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-left: 0px;">Revision No.</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-right: 0px;">01</td>
                                              </tr>
                                              <tr>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-left: 0px;">Date Effective</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-right: 0px;">01 March 2018</td>
                                              </tr>
                                              <tr>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-bottom: 0px; border-left: 0px;">Approved by</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-bottom: 0px; border-right: 0px;">President</td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">STUDENT COMPLAINT FORM</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>


                              </div>
                              </div>   

                              <div class="row m-3 mt-4">
                                <div class="col">

                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group fg">
                                        <input class="form-control fc" name="Complaint_ID" type="text" placeholder="<?php echo $res['Complaint_ID']; ?>" id="cid" hidden>
                                        <input class="form-control fc" name="Student_ID" type="text" placeholder="<?php echo $res['Student_ID']; ?>" id="sid" hidden>
                                        <label class="control-label cl">Name:</label>
                                        <input class="form-control fc"  type="text" placeholder="<?php echo $res['fullname']; ?>"  name="name" id="fname" disabled>
                                      </div>
                                    </div>
                                    <div class="col-sm">
                                      <div class="form-group fg floating">
                                        <label class="control-label cl">Date:</label>
                                        <input class="form-control fc" name="date" type="text" id="datesub" placeholder="<?php echo $res['date_Submitted']; ?>" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Designation:</label>
                                        <input class="form-control fc" type="text" id="type" disabled="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Office/College:</label>
                                        <input class="form-control fc" type="text" name="college" id="college" placeholder="<?php echo $res['college_title']; ?>" disabled="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg mt-3">
                                        <label class="control-label cl mt-5">COMPLAINT INFORMATION:</label><br>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg mt-1">
                                        <label class="control-label cl">Date of Incident:</label>
                                        <input class="form-control fc" type="text" name="dincident" id="dateinci" placeholder="<?php echo $res['date_incident']; ?>" disabled>
                                      </div>
                                    </div>
                                    <div class="col-sm">
                                      <div class="form-group fg floating">
                                        <label class="control-label cl">Time of Incident:</label>
                                        <input class="form-control fc" type="text" name="tincident" id="timeinci" placeholder="<?php echo $res['time_incident']; ?>" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Location of Incident:</label>
                                        <input class="form-control fc" type="text" name="lincident" id="locinci" placeholder="<?php echo $res['loc_incident']; ?>" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Name of the Person BEING Complained:</label>
                                        <input class="form-control fc" type="text"  name="pcomplained" id="personcom" placeholder="<?php echo $res['person_complained']; ?>" disabled>
                                        <br />
                                      
                                      <br />
                                        <div class="card-body">

                                        </div>                                        
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Designation of the Person BEING Complained:</label>
                                        <input class="form-control fc" type="text" name="dpcomplained" id="desigcom" placeholder="<?php echo $res['designation_complained']; ?>" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg mt-3">
                                        <label class="control-label cl mt-5">Details:</label><br>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <textarea style="min-height: 180px;" class="w-100 p-2 txtarea" name="detail" id="detail" form="complaintForm" disabled></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg mt-3">
                                        <label class="control-label cl mt-5">Indicate witnesses of incident (If applicable):</label><br>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">1.</label>
                                        <input class="form-control fc" type="text" name="w1" id="witness1" placeholder="<?php echo $res['witness1']; ?>" disabled>
                                      </div>
                                    </div>
                                    <div class="col-sm">
                                      <div class="form-group fg floating">
                                        <label class="control-label cl">2.</label>
                                        <input class="form-control fc" type="text" name="w2" id="witness2" placeholder="<?php echo $res['witness2']; ?>" disabled>
                                      </div>
                                    </div>
                                    <div class="col-sm">
                                      <div class="form-group fg floating">
                                        <label class="control-label cl">3.</label>
                                        <input class="form-control fc" type="text" name="w3" id="witness3" placeholder="<?php echo $res['witness3']; ?>" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg mt-1">
                                        <label class="control-label cl mt-5">I hearby swear that the complaint and statements hereunder are true and unbiased.</label><br><br>
                                        <div class="form-group col-sm-4">
                                        <label class="control-label cl mt-5">Respectfully,</label>
                                        <br><br><br>
                                        <img src="image/noimage.jpg" class="e-sign" width="200" height="200" style="margin-bottom:-70px; margin-top: -100px; margin-left: -20px; position:relative;" id="signa1" name="signa1"><br>
                                        
                                        <span class="font-weight-lighter "><p class="Signature" style="border: 0;border-bottom: 1px solid #000; font-size: 120%;text-transform: uppercase;" id="fname1"></span><br>
                                      
                                        <p style="margin-top: -2%">(Signature over printed name)
                                                  </p>   
                                          </div>       
                                      </div>
                                    </div>
                                  </div>


                                  <div class="row">
                                    <div class="col mt-3">
                                      <label class="control-label cl">Search: </label>
                                      <input class="form-control fc" type="text"  name="pcomplainedID" id="search" placeholder="Input lastname of the person being complained" >
                                      <br>
                                        <input class="form-control fc" type="hidden" name="action_taken3" id="action_taken2" >
                                        <label class="control-label cl font-weight-bold">Type the Defendant's Student ID Here to Notify </label>
                                      <input class="form-control fc" type="text"  name="dependantID" id="dependantID">
                                        
                                          <div class="list-group list-group-item-action" id="content">
                                           
                                            
                                          </div>
                                      
                                   </div>
                             
                               </div>
                             </div>
                           </div>
                           <br><br><br>

                           <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-success" >Send</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                  
                    <!--<div class="page-error tile">-->


                    </main>
                    <!-- Essential javascripts for application to work-->
                    <script src="../../js/jquery-3.3.1.min.js"></script>
                    <script src="../../js/popper.min.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
                    <script src="../../js/main.js"></script>
                    <!-- The javascript plugin to display page loading on top-->
                    <script src="../../js/plugins/pace.min.js"></script>
                    <!-- Page specific javascripts-->
                    <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
                	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                	<script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
                	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	                <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
                    <script type="text/javascript" src="../../js/plugins/autocomplete.min.js"></script>
                    <script type="text/javascript" src="../../js/plugins/autocomplete.js"></script>
                    <script type="text/javascript">
                      $(document).ready(function()
                          {
                            $('#search').keyup(function(){
                              var Search = $('#search').val();
                              
                              if(Search!=""){
                                  $.ajax({
                                    url: 'search.php',
                                    method: 'POST',
                                    data: {search:Search},
                                    success:function(data){
                                      $('#content').html(data);
                                    }
                                  })
                              }
                              else{
                                   $('#content').html('');
                              }
                              $(document).on('click', 'a', function (){
                                $('#search').val($(this).text());
                                $('#content').html('');
                              })

                            }) 
           /*                $(document).on('click','#btn_search', function (){ 
                              var Value = $('#search').val();
                              $.ajax({
                                    url: 'displayID.php',
                                    method: 'POST',
                                    data: {query:Value},
                                    success:function(data){
                                      $('#ID').html(data);
                                    }
                                  })
                            }) --> */
                          })
                    </script>

                    
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
                    <script type="text/javascript">
                      $('#demoNotifyf').click(function(){
                        $.notify({
                          title: "Update Complete : ",
                          message: "Enabled Successfuly!",
                          icon: 'fa fa-check' 
                        },{
                          type: "info"
                        });
                      });
                    </script>

                    <script type="text/javascript">
                      $(document).ready(function(){
                    $(document).on('click', '[data-role="prodbtn1"]', function(){
                      var action_taken=$( "#action_taken option:selected" ).text();
                      var action_taken1=$('#action_taken');
                      var modalview = $('#modal-view');
                      var id=$(this).data('cid');
                      var sid=$(this).data('sid');
                      var fname=$(this).data('fname');
                      var college=$(this).data('college');
                      var datesub=$(this).data('datesub');
                      var stype=$(this).data('stype');
                      var dateinci=$(this).data('dateinci');
                      var timeinci=$(this).data('timeinci');
                      var locinci=$(this).data('locinci');
                      var personcom=$(this).data('personcom');
                      var desigcom=$(this).data('desigcom');
                      var detail=$(this).data('detail');
                      var witness1=$(this).data('witness1');
                      var witness2=$(this).data('witness2');
                      var witness3=$(this).data('witness3'); 
                      var sig=$(this).data('sig');
                      

                      
                      
                      if(action_taken=='Select Action To Be Taken:'){
                        swal({
                          title: "Please Choose who will take the action",
                          icon: "warning",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((willFocus) => {
                        if(willFocus){   
                            action_taken1.focus();
                          }
                          else{
                            action_taken1.focus();
                          }
                          });                      
                      }                      
                        else{

                      if(action_taken=='OSAS'){
                        swal({
                          title: "Are you sure you will refer this to Osas?",
                          icon: "warning",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((willSend) => {
                          if(willSend){

                            modalview.modal('show');
                          $('#action_taken2').val(action_taken);
                          $('#cid').val(id);
                          $('#sid').val(sid);
                          $('#fname').val(fname);
                          $('#college').val(college);
                          $('#datesub').val(datesub);
                          $('#type').val(stype);
                          $('#dateinci').val(dateinci);
                          $('#timeinci').val(timeinci);
                          $('#locinci').val(locinci);
                          $('#personcom').val(personcom);
                          $('#desigcom').val(desigcom);
                          $('#detail').val(detail);
                          $('#witness1').val(witness1);
                          $('#witness2').val(witness2);
                          $('#witness3').val(witness3);
                          $('#fname1').text(fname);
                          $('#signa1').attr('src','data:image/png;base64,'+ sig);

                          }
                          else{

                            action_taken1.focus();
                          }
                        });

                        
                      }
                      if(action_taken=='Admin'){
                        swal({
                          title: "Are you sure you will refer this to Admin?",
                          text: "If Click OK You Won't be able to Undo it?",
                          icon: "warning",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((willSend) => {
                          if(willSend){
                          swal("Information Sent Successfully!", {
                          icon: "success",
                          })
                          $.ajax({
                            url: 'function.php',
                            method: 'POST',
                            data:{
                              send_data: 'done',
                              complaint_id: id,
                              action_taken: action_taken

                            }
                          })
                            location.reload()
                          }
                          else{

                            action_taken1.focus();
                          }
                        });
                      }
                      if(action_taken=='Dean'){
                        swal({
                          title: "Are you sure you will refer this to Dean?",                          
                          text: "If Click OK You Won't be able to Undo it?",
                          icon: "warning",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((willSend) => {
                          if(willSend){
                          swal("Information Sent Successfully!", {
                          icon: "success",
                          })
                          $.ajax({
                            url: 'function.php',
                            method: 'POST',
                            data:{
                              send_data: 'done',
                              complaint_id: id,
                              action_taken: action_taken

                            }
                          })
                            location.reload();
                          }
                          else{

                            action_taken1.focus();
                          }
                        });
                      }
                      }
                      

                      
                      
                    })


                  })
                      
                    
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
                      $(document).ready( function(){
                        $('#sampleTable2').DataTable({
                          "order": [],
                          "ordering": true,
                          "columnDefs": [{
                            "targets": [0, 2, 3, 4, 5, 6],
                            "orderable": false
                          }]
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