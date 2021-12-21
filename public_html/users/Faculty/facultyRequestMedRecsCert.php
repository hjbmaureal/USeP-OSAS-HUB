  <!DOCTYPE html>
  <?php 
  include("conn.php");
  session_start();
if(!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Faculty Head'){
    if (!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Faculty'){
      if(!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Staff'){
            echo '<script type="text/javascript">'; 
            echo 'window.location= "../../index.php";';
            echo '</script>';
      }
    } 
  }
  // include('../../php/session_faculty.php');
   $faculty_id= $_SESSION['id'];
//$sql = mysqli_query($conn, "SELECT * from request_list where patient_id=('$faculty_id') AND request_type='Medical Certificate'");

 $count_sql="SELECT * from notif where user_id='$faculty_id' and message_status='Delivered'";

          $result1 = mysqli_query($conn, $count_sql);

          $count2 = 0;

          while ($row = mysqli_fetch_assoc($result1)) {                             

            $count2++;

                              }

function timeago($datetime, $full = false) {
  date_default_timezone_set('Asia/Manila');
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);
  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;
  $string = array(
    'y' => 'yr',
    'm' => 'mon',
    'w' => 'week',
    'd' => 'day',
    'h' => 'hr',
    'i' => 'min',
    's' => 'sec',
  );
  foreach ($string as $k => &$v) {
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    } 
    else {
      unset($string[$k]);
    }
  }
  if (!$full) {
    $string = array_slice($string, 0, 1);
  }
  
  return $string ? implode(', ', $string) . '' : 'just now';
}


  ?>
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
      <title>USeP Employee Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
      <body class="app sidebar-mini rtl"onload="initClock()">
      <!-- Navbar-->

        
      <header class="app-header">

      </header>

      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="../../images/logo.png" width="20%" alt="img">
          <div>
            <?php 
            if ($_SESSION['access_level']==1){
              echo '                
                <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">FACULTY HEAD HUB</p>
              ';
            }else{
              echo '                
                <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">EMPLOYEE HUB</p>
              ';
            }
          ?>
            
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
          <?php 
            if ($_SESSION['access_level']==1){
              echo '                
                <li class="p-2 sidebar-label"><span class="app-menu__label">STUDENT\'S AFFAIRS AND SERVICES</span></li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Labor Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a class="treeview-item " href="Home-Labor.php">Home</a></li>
                    <li><a class="treeview-item " href="Labor-Requisition.php">Requisition Form</a></li>
                    <li><a class="treeview-item" href="Labor-Applicants.php">Student Applicants</a></li>
                    <li><a class="treeview-item" href="Labor-DTR.php">Student DTR</a></li>
                    <li><a class="treeview-item" href="Faculty-Accomplishment.php">Accomplishment Reports</a></li>
                  </ul>
                </li>
              ';
            }
          ?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Faculty.php">Home</a></li>  
              <li><a class="treeview-item" href="Guidance_Faculty_Referrals.php">Referral Forms</a></li>
              <li><a class="treeview-item" href="Guidance_Faculty_Acknowledgement.php">Acknowledgement Slip</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="facultyHome.php">Home</a></li>
              <li><a class="treeview-item" href="facultyClinic_Privacy_Policy.php">Consultation</a></li>
              <li><a class="treeview-item" href="facultyConsultationHistory.php">Consultation History</a></li>
              <li><a class="treeview-item" href="facultyPrescription.php">Prescription</a></li>
              <li><a class="treeview-item" href="facultyRequestMedCert.php">Request for Medical Certificate</a></li>
              <li><a class="treeview-item active" href="facultyRequestMedRecsCert.php">Request for Medical Records Certification</a></li>
            </ul>
          </li>


     

          
        </ul>
      </aside>


       <!--navbar-->

      <main class="app-content">
        <div class="app-title">
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
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

   <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $count2;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $count2;  ?> new notifications.</li>

              <div class="app-notification__content">
                  <?php

                $count_sql="SELECT * from notif where user_id=$faculty_id  order by time desc";

                $result2 = mysqli_query($conn, $count_sql);

                while ($row = mysqli_fetch_assoc($result2)) { 
                  $intval = intval(trim($row['time']));
                  if ($row['message_status']=='Delivered') {

                    
                    echo'
                  <b><li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">'.$row['message_body'].'</p>
                      <p class="app-notification__meta">'.timeago($row['time']).'</p>
                      <p class="app-notification__message"><form method="POST" action="../../php/change_notif_status.php">
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

              </a></li>
              </div>
              <li class="app-notification__footer"><a href="see_all_notif_faculty.php">See all notifications.</a></li>
            </ul>
          </li>
              
                 <li class="dropdown">
                  <a class="app-nav__item" style="width: 48px;" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <img class="rounded-circle" src="data:image/png;base64,<?php echo $_SESSION['photo'] ?>" style="width: 30px; height: 30px;">
                </a>
                
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="User_Profiles.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
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

      <!-- Navbar-->
       
                                <?php  
                                  
                                // Import the file where we defined the connection to Database.     
                                    require_once "config.php"; 
                                    $sql = mysqli_query($mysqli, "SELECT * from request_list where patient_id=('$faculty_id') AND request_type='Medical Records Certification'");  
                          
                                ?> 

         <!--<div class="page-error tile">-->


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


 <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <h3 class="mb-3 line-head">Request for Medical Records Certification
</h3><br>
                  <div class="row">
                    <div class="col-auto">

                  
                  <div class="inline-block">
                    Purpose
                    <br>
                    <select class="bootstrap-select" id="myInput" data-table="reports-list" style="height: 35px;width: 150px">
                        <option class="select-item" value="" selected="selected">All</option>
                        <option class="select-item" value="OJT">OJT</option>
                        <option class="select-item" value="Field Trip">Field Trip</option>
                   
                      </select>
                    </div>

                    &emsp;

                    <div class="inline-block">
                    Status
                    <br>
                    <select class="bootstrap-select" id="myInput" data-table="reports-list" style="height: 35px;width: 150px">
                        <option class="select-item" value="" selected="selected">All</option>
                        <option class="select-item" value="Pending">Pending</option>
                        <option class="select-item" value="Completed">Completed</option>
                   
                      </select>
                    </div>
                      </div>


                       <div class="col-sm">
                        
                          <div class="inline-block float ml-2 mt-1"><br><button class="btn btn-warning btn-sm verify" data-toggle="modal" data-target="#RequestModal" style="width: 100%;"><i class="fas fa-edit" data-toggle="modal" data-target="#RequestModal"></i> Request Medical Records Cert </button></div>

                      
     <!--   <button class="btn btn-danger btn-sm verify" id="demoNotify" href="#" >Verify</button>-->
       
                      </div>  
                </div>
                  
                
                  <div class="table-bd">
                  <br>
                  <div class="table-responsive">
                  <table class="table table-hover reports-list" id="myTable" style="border: none;">
                    
                  
                    <thead class>
                      <tr>
                      <th scope="col">Date Requested</th>
                      <th scope="col">Purpose</th>
                      <th class="max">Letter of Request</th>
                      <th scope="col">Medical Info</th>
                      <th scope="col">Medical History</th>
                      <th scope="col">Health Record</th>
                     <th scope="col">Status</th>
                     <th scope="col">Date Released</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                                     <?php  
                              



                                       while($row = mysqli_fetch_array($sql)) {  
                                        $id=$row['request_id'];
                                        
                                              // Display each field of the records.    
                                        ?> 

                                      <tr>   
                                        <td><?php echo $row["date_requested"]; ?></td>  
                                        <td><?php echo $row["purpose"]; ?></td>
                                        <td>
                                          <?php

                                          if (($row['status']) == 'Completed') {
                                            echo '<button class="btn btn-success btn-sm verify" data-toggle="modal" style="width: 90%;" disabled><i class="fas fa-upload"></i>&ensp;Upload Letter</button>';
                                          }

                                          else {
                                          echo '<button class="btn btn-success btn-sm verify" data-toggle="modal" data-target="#UploadlLetterModal" style="width: 90%;"><i class="fas fa-upload" data-toggle="modal" data-target="#UploadlLetterModal"></i>&ensp;Upload Letter</button>';
                                        }

                                        ?>
                                        </td>                                    
                      <td>
                        <?php
                        if(empty($row['med_info'])){
                          echo '<a class="btn btn-warning btn-sm" disabled><i class="fas fa-download"></i></a>';
                        }else{
                          echo '<a class="btn btn-warning btn-sm" target="_blank" href="../Clinic/certs/'.$row['med_info'].'"><i class="fas fa-download"></i></a>';

                        }?>

                      </td>

                       <td>
                        <?php
                        if(empty($row['med_history'])){
                          echo '<a class="btn btn-warning btn-sm" disabled><i class="fas fa-download"></i></a>';
                        }else{
                          echo '<a class="btn btn-warning btn-sm" target="_blank" href="../Clinic/certs/'.$row['med_history'].'"><i class="fas fa-download"></i></a>';

                        }?>

                      </td>

                        <td>
                        <?php
                        if(empty($row['health_record'])){
                          echo '<a class="btn btn-warning btn-sm" disabled><i class="fas fa-download"></i></a>';
                        }else{
                          echo '<a class="btn btn-warning btn-sm" target="_blank" href="../Clinic/certs/'.$row['health_record'].'"><i class="fas fa-download"></i></a>';

                        }?>

                      </td>
                      
                        
                        <td>
                        <?php
                        if(empty($row['med_info'])&&empty($row['med_history'])&&empty($row['health_record'])){
                          echo 'Pending';

                        }else{
                          echo 'Completed';

                        }
                        ?>
                          
                        </td>

                        <td><?php echo $row['date_released']; ?></td>


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
        </div>
        </div>  

            <div class="modal fade " id="RequestModal" tabindex="-1" role="dialog" aria-labelledby="RequestModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">&nbsp; REQUEST MEDICAL RECORDS CERTIFICATION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container" style="border: 2px solid black; border-radius: 10px; padding: 25px;">
                      <div class = "head">  
                        
                        <h6 class="font-weight-bold">Republic of the Philippines</h6> 
                        <h6 class="font-weight-bold" style= "font-family: Old English Text MT;">University of Southeastern Philippines</h6>
                        <h6 class="font-weight-bold">Tagum-Mabini Campus</h6> 
                        <h6 class="font-weight-bold">Apokon, Tagum City</h6> 
                        <br>
                        <hr width=”75%″ size="10">
                        <hr width=”75%″ size="10">
                      </div>
                          <form method="POST" action="submit_request.php">
                         <h6 class="font-weight-bold">Date: <input type="Text" name="date" readonly="" value="<?php echo(date('Y/m/d'))?>"  style="border:none;outline: none;cursor: default; font-weight: bold;"></input></h6> 
                        <br>
                         <h6 class="font-weight-bold">Purpose: </h6> 
                        <div class="form-row">
                          <div class="form-group col-md-12">
                                      <textarea id="purpose" class="preslist" name="purpose" rows="3" placeholder="&nbsp;Type your purpose here. . ." required="required" style="width: 100%; border-radius: 5px;"></textarea>
                                      </div>
                          </div>

                        </div>

                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-success" name="submit">Next</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>  


       <div class="modal fade " id="UploadlLetterModal" tabindex="-1" role="dialog" aria-labelledby="RequestModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">&nbsp; REQUEST MEDICAL RECORDS CERTIFICATION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container" style="border: 2px solid black; border-radius: 10px; padding: 25px;">
                      <div class = "head">  
                        
                        <h6 class="font-weight-bold">Republic of the Philippines</h6> 
                        <h6 class="font-weight-bold" style= "font-family: Old English Text MT;">University of Southeastern Philippines</h6>
                        <h6 class="font-weight-bold">Tagum-Mabini Campus</h6> 
                        <h6 class="font-weight-bold">Apokon, Tagum City</h6> 
                        <br>
                        <hr width=”75%″ size="10">
                        <hr width=”75%″ size="10">
                      </div>
                       <form method="POST" action="submit_letter.php" enctype="multipart/form-data"> 

                       <input type="" name="request_id" value="<?php echo $id ?>" hidden />
                          <br> 
                          <label for="formFileMultiple" class="form-label">Upload your letter of request here:</label>
                          <input class="form-control" style="height: 50%;" type="file" name="file" /> 

                        <br>

                        </div>

                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-success" name="submit" >Submit</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>  

       

        <!--</div>-->
      </main>
      <!-- Essential javascripts for application to work-->
      
      <script src="jsc/jquery-3.3.1.min.js"></script>
      <script src="jsc/popper.min.js"></script>
      <script src="jsc/bootstrap.min.js"></script>
      <script src="jsc/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="jsc/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="jsc/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="jsc/plugins/sweetalert.min.js"></script>
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
      <script type="text/javascript" src="jsc/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="jsc/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#myTable').DataTable();</script>
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
      <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("mylist");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<style type="text/css">
  * {
  box-sizing: border-box;
}

#mylist {
  
  background-position: 10px 10px;
  background-repeat: no-repeat;
}

#myTable {
  border-collapse: collapse;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
    </body>
  </html>