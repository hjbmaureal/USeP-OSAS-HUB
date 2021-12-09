<?php
  //session script, open for updates for other modules
 include('conn.php');
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'OSAS'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  //authenticate if logged in and user is the correct user
  //checkSessionAuth($_SESSION['id'],$_SESSION['usertype']);
  //checkSessionTime();
  $staff_id = $_SESSION['id'];
  $result = mysqli_query($conn, "SELECT * FROM staffdetails WHERE staff_id = '$staff_id'");
  $row = mysqli_fetch_assoc($result);
  
  $staff_sign = $row['e_signature'];
  $email_add = $row['email_add'];
  $contact = $row['phone_num'];


    $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where (user_id='$id' or office_id = 1) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}


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
      <title>USeP Super Admin</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../../css/main_main.css">
          <link rel="stylesheet" type="text/css" href="../../css/userprof_main.css">
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
  <body class="app sidebar-mini rtl" onload="initClock()">
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
            <span class="app-menu__label">Student Discipine</span>
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
            <i class=" fas fa-bell fa-lg mt-2"></i>
            <b style="color: red;"><?php echo $count;  ?></b>
            
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
      </div> <!-- END OF NAVBAR -->

      <!-- Main Content -->
      <div class="main-content-student">
        <form action="updateProfile.php" method="POST" enctype="multipart/form-data">
          <!-- FIRST ROW CONTAINING THE TITLE -->
          <div class="float-left">
            <h2>USER PROFILE</h2>
            <input type="HIDDEN" value="<?php echo $staff_id?>" name="staff_id">
          </div>
          <!-- CLEARFIX FOR BOTH FOR FLOATED ELEMENTS -->
          <div class="clearfix"></div>
          <!-- SECOND ROW -->
          <div class="row">
            <div class="col-xl">
              <div class="red-bar"></div>
              <div style="background-color: #C12C32; padding: 8px 10px;"> </div>
              <div class="tile">
                <div class="container">
                  <div class="row">
                    <div class="col-4" >
                      <div class="prof-picture">
                   <?php    
                    $result = mysqli_query($conn, "SELECT * FROM staffdetails WHERE staff_id = '$staff_id'");
                     $row = mysqli_fetch_assoc($result);
                      if($row['pic']== NULL){
                       echo '<img src="../../images/logo.png" class="pix"/>'; 
                      }else{
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).'" class="pix"/>';
                      }
                   ?>
                      </div>
                      <div class="image-upload">
                        <label for="file-input"> <img class="camera" src="../../images/camera1.png" style="cursor: pointer;"> </label>
                        <input type="file" id="fil.e-input" name="profilePic" onchange="loadFile(event, 'userPic')" style="display: none;">
                    </div>
                  </div>
                    <div class="col-lg">
                      <h3><?php echo $_SESSION['id'] ?></h3>
                      <h4><?php echo $_SESSION['fullname'] ?></h4>
                      <h5><?php echo $_SESSION['college'] ?></h5>
                      <h5><?php echo $_SESSION['usertype'] ?></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- END OF SECOND ROW -->
          <h3>Update Personal Information</h3>
          <br>
          <div class="row">
            <div class="col-xl">
              <div class="tile">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="emailAddress">Email Address</label>
                      <input type="email" name="newEmail" class="form-control" value="<?php echo $email_add; ?>" placeholder="Enter your email address...">
                    </div>
                    <div class="form-group">
                      <label for="contactNumber">Contact Number</label>
                      <input type="text" name="newNum" class="form-control" value="<?php echo $contact; ?>" placeholder="Enter your contact number...">
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="eSign" class="control-label">E-Signature</label>
                    <div class="tile-body">
                       <form class="text-center dropzone" method="POST" enctype="multipart/form-data" action="/file-upload">
                        <div class="dz-message"><?php    
                    $result = mysqli_query($conn, "SELECT * FROM staffdetails WHERE staff_id = '$staff_id'");
                     $row = mysqli_fetch_assoc($result);
                    echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['e_signature'] ).'"id="signPic" alt="profile image" style="height: 200px;   width: 500px; border: 6px solid  #C12C32;"/>';?>
                       </div>
                      </form>
                        
                        <input type="file" id="changeSign" name="signPic" onchange="loadFile(event, 'signPic')" style="display: none;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- END OF THIRD ROW -->
          <h3>Update Current Password</h3>
          <br>
          <div class="row">
            <div class="col-xl">
              <div class="tile">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="currPass">Current Password</label>
                      <input type="password" name="currPass" id="currPass" class="form-control" placeholder="Enter your current password...">
                    </div>
                    <div class="form-group">
                      <label for="newPass">New Password</label>
                      <input type="password" name="newPass" id="newPass" class="form-control" placeholder="Enter your new password...">
                    </div>
                    <div class="form-group">
                      <label for="confirmNewPass">Confirm New Password</label>
                      <input type="password" name="confirmNewPass" id="confirmNewPass" class="form-control" placeholder="Confirm new password...">
                    </div>
                  </div>
                  <div class="col-6">
                    <label class="control-label font-weight-bold" id="">New password must contain the following:</label><br>
                    <label class="control-label invalid" id="length">Minimum of 8 characters</label><br>
                    <label class="control-label invalid" id="capital">An uppercase character</label><br>
                    <label class="control-label invalid" id="letter">A lowercase character</label><br>
                    <label class="control-label invalid" id="number">A number</label><br>
                    <label class="control-label invalid" id="special">A special character</label><br>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- END OF FOURTH ROW -->
          <div class="float-right">
            <div class="row justify-content-center">
              <div class="col-12">
                <button type="submit" class="btn btn-success" name="submit-user-profile">
                  <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                </button> &emsp;
                <a href="#" class="btn btn-danger"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </div>
            </div>
          </div>
          <br><br>
        </form>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../../js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/printThis.js"></script>
    <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- Google analytics script-->
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

      // When the user starts to type something inside the password field
      myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {  
          letter.classList.remove("invalid");
          letter.classList.add("valid");
        } else {
          letter.classList.remove("valid");
          letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {  
          capital.classList.remove("invalid");
          capital.classList.add("valid");
        } else {
          capital.classList.remove("valid");
          capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {  
          number.classList.remove("invalid");
          number.classList.add("valid");
        } else {
          number.classList.remove("valid");
          number.classList.add("invalid");
        }

        // Validate length
        if(myInput.value.length >= 8) {
          length.classList.remove("invalid");
          length.classList.add("valid");
        } else {
          length.classList.remove("valid");
          length.classList.add("invalid");
        }
          // Validate special characters ~`! @#$%^&*()_-+={[}]|\:;"'<,>.?/
        var numbes= /[!@#$%^&*-]/g;

        if(myInput.value.match(numbes)) {  
          special.classList.remove("invalid");
          special.classList.add("valid");
        } else {
          special.classList.remove("valid");
          special.classList.add("invalid");
        }
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
        $('#demoNotify').click(function(){
          $.notify({
            title: "Update Complete : ",
            message: "Verified Successfuly!",
            icon: 'fa fa-check' 
          },{
            type: "info"
          });
        });
      })

    </script>
  </body>
</html>