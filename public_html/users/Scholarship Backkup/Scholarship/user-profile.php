<?php
  //session script, open for updates for other modules
  include_once('../../php/user-session.php');
  include_once('../../php/connect_db.php');
  //authenticate if logged in and user is the correct user
  checkSessionAuth($_SESSION['id'],$_SESSION['usertype']);
  checkSessionTime();
  $staff_id = $_SESSION['id'];
  $result = mysqli_query($conn, "SELECT * FROM staffdetails WHERE staff_id = '$staff_id'");
  $row = mysqli_fetch_assoc($result);
  $staff_pic = $row['pic'];
  $staff_sign = $row['e_signature'];
  $email_add = $row['email_add'];
  $contact = $row['phone_num'];


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
    <title>Staff User Profile</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../css/upstyle.css">
    <link rel="stylesheet" type="text/css" href="../../css/custom.css">
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
    <!-- Font-icon css-->
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
          <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">SCHOLARSHIP</p>
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
            <i class="app-menu__icon fas fa-user-check"></i>
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
            <i class="app-menu__icon fa fa-dashboard"></i>
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
            <i class="app-menu__icon fa fa-laptop"></i>
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
            <i class="app-menu__icon fas fa-user-check"></i>
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
            <i class="app-menu__icon fas fa-clipboard-list"></i>
            <span class="app-menu__label">Enrollment List Report</span>
          </a>
        </li>
        <!-- NOT Treeview MENU -->
        <li>
          <a class="app-menu__item" href="promotional-report.php">
            <i class="app-menu__icon fas fa-file-alt"></i>
            <span class="app-menu__label">Promotional Report</span>
          </a>
        </li>
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">MASTERLIST</span>
        </li>
        <li>
          <a class="app-menu__item" href="masterlist-records.php">
            <i class="app-menu__icon fa fa-file-text"></i>
            <span class="app-menu__label">Records</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="masterlist-documents.php">
            <i class="app-menu__icon fas fa-file"></i>
            <span class="app-menu__label">Documents</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="masterlist-external-reference.php">
            <i class="app-menu__icon fas fa-file-export"></i>
            <span class="app-menu__label">External References</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="masterlist-incoming-outgoing.php">
            <i class="app-menu__icon fa fa-retweet"></i>
            <span class="app-menu__label">Incoming/Outgoing/Transmittal</span>
          </a>
        </li>
        <!--app-menu__label - CATEGORY TITLE -->
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">REPORTS</span>
        </li>
        <li>
          <a class="app-menu__item" href="monitoring-of-scholars.php">
            <i class="app-menu__icon fas fa-clipboard-list"></i>
            <span class="app-menu__label">Monitoring of Scholars</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="scholarship-report.php">
            <i class="app-menu__icon fas fa-users"></i>
            <span class="app-menu__label">Scholarship Report</span>
          </a>
        </li>
        <li class="p-2 sidebar-label">
          <span class="app-menu__label">OTHERS</span>
        </li>
        <li>
          <a class="app-menu__item" href="curriculum.php">
            <i class="app-menu__icon fa fa-graduation-cap"></i>
            <span class="app-menu__label">Curriculum</span>
          </a>
        </li>
      </ul>
    </aside>

    <main class="app-content">
      <!-- navbar -->
      <div class="app-title">
        <!-- Sidebar toggle button-->
        <div>
          <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        </div>
        <ul class="app-nav">
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
            <div class="datetime appnavlevel">
              <div class="date">
                <span id="dayname">Day</span>,
                <span id="month">Month</span>
                <span id="daynum">00</span>,
                <span id="year">Year</span>
              </div>
            </div>
          </li>
          <li>
            <div class="datetime appnavlevel">
              <div class="time">
                <span id="hour">00</span>:
                <span id="minutes">00</span>:
                <span id="seconds">00</span>
                <span id="period">AM</span>
              </div>
            </div>
          </li>

          <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have 4 new notifications.</li>
                <div class="app-notification__content">
                  <li>
                    <a class="app-notification__item" href="javascript:;">
                      <span class="app-notification__icon">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x text-primary"></i>
                          <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                        </span>
                      </span>
                      <div>
                        <p class="app-notification__message">Lisa sent you a mail</p>
                        <p class="app-notification__meta">2 min ago</p>
                      </div>
                    </a>
                  </li>

                  <li>
                    <a class="app-notification__item" href="javascript:;">
                      <span class="app-notification__icon">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x text-danger"></i>
                          <i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i>
                        </span>
                      </span>
                      <div>
                        <p class="app-notification__message">Mail server not working</p>
                        <p class="app-notification__meta">5 min ago</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="app-notification__item" href="javascript:;">
                      <span class="app-notification__icon">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x text-success"></i>
                          <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                        </span>
                      </span>
                      <div>
                        <p class="app-notification__message">Transaction complete</p>
                        <p class="app-notification__meta">2 days ago</p>
                      </div>
                    </a>
                  </li>
                </div>
              <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
          </li>
          <li>
            <a class="appnavlevel"><?php echo $_SESSION['fullname'] ?></a>
          </li>
          <!-- Dropdown -->
          <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
              <i class="text-warning fa fa-user-circle fa-2x"></i>
            </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="user-profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="#" id="logout-button"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div> <!-- END OF NAVBAR -->

      <!-- Main Content -->
      <div class="main-content-student">
        <form action="../../php/updateProfile.php" method="POST" enctype="multipart/form-data">
          <!-- FIRST ROW CONTAINING THE TITLE -->
          <div class="float-left">
            <h2>USER PROFILE</h2>
            <input type="text" value="<?php echo $staff_id?>" name="staff_id">
          </div>
          <!-- CLEARFIX FOR BOTH FOR FLOATED ELEMENTS -->
          <div class="clearfix"></div>
          <!-- SECOND ROW -->
          <div class="row">
            <div class="col-xl">
              <div class="red-bar"></div>
              <div class="tile">
                <div class="container">
                  <div class="row">
                    <div class="col-4" >
                      <div style="height: 150px; width: 150px;border-radius: 50%;margin-left: 40px;">
                      <img src=" <?php echo $staff_pic?>" id="userPic" alt="profile image" style=" vertical-align: middle; max-width: 100%; border-radius: 50%; border: 6px solid  #C12C32;">
                      </div>
                        <label for="changePic"> <i class="fa fa-camera fa-2x" style=" vertical-align: middle;width: 50px;height: 50px; border-radius: 50%; margin-left:150px; margin-top: -70px;"></i> </label>
                        <input type="file" id="changePic" name="profilePic" onchange="loadFile(event, 'userPic')" style="display: none;">
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
                      <div style="height: 150px; width: 150px;border-radius: 50%;margin-left: 40px;">
                        <img src=" <?php echo $staff_sign?>" id="signPic" alt="profile image" style=" vertical-align: middle; max-width: 100%; border-radius: 50%; border: 6px solid  #C12C32;">
                      </div>
                        <label for="changeSign"> <i class="fa fa-camera fa-2x" style=" vertical-align: middle;width: 50px;height: 50px; border-radius: 50%; margin-left:150px; margin-top: -70px;"></i> </label>
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