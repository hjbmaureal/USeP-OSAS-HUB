    <?php 
    include('conn.php');
  session_start();
    if (!isset($_SESSION['id']) || $_SESSION['usertype'] != 'SUPERADMIN'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id = $_SESSION['id'];
    $count_sql="SELECT * from forgot_pass_requests where remarks='Request Delivered'";

          $result = mysqli_query($conn, $count_sql);

          $count = 0;

          while ($row = mysqli_fetch_assoc($result)) {                             

            $count++;

                              }
  
$notifcount_sql="SELECT * from notif where user_id='1' and message_status='Delivered'";

          $result2 = mysqli_query($conn, $notifcount_sql);

          $notif_count = 0;

          while ($row2 = mysqli_fetch_assoc($result2)) {                             

            $notif_count++;

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
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <link rel="icon" href="../../images/logo.png" type="../../images/gif" sizes="16x16">
      <title>College</title>
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
      <body class="app sidebar-mini rtl" onload="initClock()" style="background-color: #e9ebf0;">
      <!-- Navbar-->

        
      <header class="app-header">
    
   
      </header>

      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="../../images/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">SUPER ADMIN</p>
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Home</span></a></li>
          <!-- Pre Student Count -->
          <?php 
              $prestudent_count_sql="SELECT * from student where date_verified is NULL";

              $prestudent_count_result = mysqli_query($conn, $prestudent_count_sql);

              $prestudent_count = 0;

              while ($row = mysqli_fetch_assoc($prestudent_count_result)) {                             

                $prestudent_count++;

                                  }?>
          <!-- Pre Alumni Count -->
          <?php 
              $prealumni_count_sql="SELECT * from alumni where date_verified is NULL";

              $prealumni_count_result = mysqli_query($conn, $prealumni_count_sql);

              $prealumni_count = 0;

              while ($row = mysqli_fetch_assoc($prealumni_count_result)) {                             

                $prealumni_count++;

                                  }?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon far fa-registered"></i><span class="app-menu__label">Pre Registration<b style="background-color:#FF0000; padding:4px 6px;font-size:10px; margin-left:10px; border-radius:100%;"><?php echo $prestudent_count+$prealumni_count;  ?></b></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="PreStudent.php">Student Accounts<b style="background-color:#FF0000; padding:4px 6px;font-size:8px; margin-left:10px; border-radius:100%;"><?php echo $prestudent_count;  ?></b></a></li>
              <li><a class="treeview-item" href="PreAlumni.php">Alumni Accounts <b style="background-color:#FF0000; padding:4px 6px;font-size:8px; margin-left:10px; border-radius:100%;"><?php echo $prealumni_count;  ?></b></a></li>
            </ul>
          </li>          
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon far fa-registered"></i><span class="app-menu__label">Account Records</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="AlumniAccounts.php">Alumni Accounts</a></li>
              <li><a class="treeview-item" href="StudentAccounts.php">Student Accounts</a></li>
              <li><a class="treeview-item" href="Faculty_Staff_Accounts.php">Staff Accounts</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sitemap"></i><span class="app-menu__label">Miscellaneous</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="StudentOrganization.php">Student Organization</a></li>
              <li><a class="treeview-item active" href="Usep_College.php">USeP Colleges</a></li>
              <li><a class="treeview-item" href="Usep_Courses.php">USeP Courses</a></li>
              <li><a class="treeview-item" href="Usep_Department.php">USeP Department</a></li>
            </ul>
          </li>
          <li><a class="app-menu__item" href="ActivityLogs.php"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Activity Logs</span></a></li>
          <li><a class="app-menu__item" href="Backup_Restore.php"><i class="app-menu__icon  fas fa-database"></i><span class="app-menu__label">Backup and Restore</span></a></li>
          <li><a class="app-menu__item" href="ForgotPassword_Requests.php"><i class="app-menu__icon  fas fa-database"></i><span class="app-menu__label">Forgot Password Requests<b style="background-color:#FF0000; padding:4px 6px;font-size:8px; margin-left:10px; border-radius:100%;"><?php echo $count;  ?></b></span></a></li>
          



     

          
        </ul>
      </aside>


       <!--navbar-->

          <main class="app-content">
            
        <div class="app-title">
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Hi, Super Admin</a>
              </li>
           <!-- SEMESTER, TIME, USER DROPDOWN -->
          <?php
            if($result = mysqli_query($conn, "SELECT * FROM list_of_semester where status='Active'")){
              while($row = mysqli_fetch_array($result)){
                $currSemesterYear = $row['semester'] .' '. $row['year'];
                echo '
                  <li>
                    <div class="appnavlevel" style="color: black;">
                      <span class="semesterYear">'.$row['semester'].'</span>
                    </div>
                  </li>
                  <li>
                    <div class="appnavlevel" style="color: black;">
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
              <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $notif_count;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $notif_count;  ?> unopened notifications.</li>
              <div class="app-notification__content">
                 <?php 
                $count_sql="SELECT * from notif where user_id=1  order by time desc";

                $result = mysqli_query($conn, $count_sql);

                while ($row = mysqli_fetch_assoc($result)) { 
                  $intval = intval(trim($row['time']));
                  if ($row['message_status']=='Delivered') {

                    
                    echo'
                  <b><li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">'.$row['message_body'].'</p>
                      <p class="app-notification__meta">'.timeago($row['time']).'</p>
                      <p class="app-notification__message"><form method="POST" action="change_notif_status.php">
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
                      <p class="app-notification__message"><form method="POST" action="change_notif_status.php">
                      <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                      <input type="submit" name="open_notif" value="Open Message">
                      </form></p>
                    </div></a></li>
                    ';
                  }
                  

                                    }
                ?>
                
              </div>
              <li class="app-notification__footer"><a href="Notifications.php">See all notifications.</a></li>
            </ul>
          </li>
              
                 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
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
                <span aria-hidden="true">??</span>
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
 <!-- Navbar-->
       

         <!--<div class="page-error tile">-->

          <!-- Content -->

  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div>
              <div class="float-left"><h4>Usep Colleges</h4></div>
                </div>
                <br><br>
              <div class="row">
                <div class="col-sm">
                  Status
                  <select class="bootstrap-select" id="sel2">
                      <option class="select-item" value="All" selected="selected">All</option>
                      <option class="select-item" value="Active">Active</option>
                      <option class="select-item" value="Disabled">Disabled</option>
                    </select>
                </div>
                <div class="col-sm">
                  <button class="btn btn-danger btn-sm  button-sm mtop add-wid float-right" data-toggle="modal" data-target="#addDept"><i class="fas fa-plus mr-1"></i> Add New</button>
                </div>
              </div>
            
                         
                <div class="table-bd">
              <div class="table-responsive">
                <br>
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                    <th>College ID</th>
                    <th>Acronym</th>
                    <th>College Name</th>
                    <th>Status</th>
                    <th>Update</th>
                  
                  </tr>
                </thead>
                <tbody>
                    
                  <?php
                  include('../../conn.php');
                  $query = "SELECT * FROM college"; 
                  $result = mysqli_query($conn, $query);


        while($res = mysqli_fetch_array($result)){         
            ?>
            <tr>
            <td><?php echo $res['college_id']; ?></td>
            <td><?php echo $res['title']; ?></td>
            <td><?php echo $res['description']; ?></td>
            <td><?php echo $res['status']; ?></td>          
                     <td>
                      <button class="btn btn-info btn-sm" data-toggle="modal" a href="#details<?php echo $res['college_id']; ?>"><i class="fas fa-eye"></i></button>
                      <?php include('php/usep_college_modal.php'); ?>


                      <!-- for edit -->
                      <a class="btn btn-warning btn-sm" data-toggle="modal" a href="#detail<?php echo $res['college_id']; ?>">  <i class="fas fa-edit" data-toggle="modal" data-target="#cordownload"></i></a>
                      <?php include('php/college_modal.php'); ?>
                      <!--end of edit part-->
                       

                    
                     <?php 
                    if($res['status'] == "Active"){?>
                      <button role="button" class="btn btn-success btn-sm" data-toggle="modal" data-role="prodbtn2" disabled="">Enable</button>
                      <a class="btn btn-danger btn-sm" data-toggle="modal" a href="#college_verify<?php echo $res['college_id']; ?>">Disable</a>
                    <?php }else{?>
                    <a class="btn btn-success btn-sm" data-toggle="modal" a href="#college_verify<?php echo $res['college_id']; ?>">Enable</a>
                    <button role="button" class="btn btn-danger btn-sm" data-toggle="modal" data-role="prodbtn2" disabled="">Disable</button>
                
                     
                      <?php
                    } include('php/college_verify.php'); ?>   
                      </td>              
                  </tr>
                  <?php
                }

                  ?>
                  </tbody>
                </table>
              </div>
            </div>
             <br>
         
            </div>
          </div>
        </div>
      </div>
<!-- ADD DEPARTMENT MODAL-->
      <form method="post" action="php/add_college.php">
      <div class="modal fade " class="department" id="addDept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add New College</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <div class="row">
                        <div class="col col-sm-12">
                          <div class="form-group">
                            <label for="scholarship_org"><h6>College Name</h6></label>
                            <input type="text" name="col_name" id="scholarship_org" class="form-control" placeholder="Input here..." required>
                            <div class="invalid-tooltip">
                              Please Enter this Field!
                            </div>
                          </div>
                        </div>
                           </div>

                           <div class="row mt-2">
                        <div class="col-sm-12">
                          <label for="scholarship_type"><h6>College Acronym</h6></label>
                          <input type="text" name="col_acronym" id="scholarship_adviser" class="form-control" placeholder="Input here..." required>
                          
                          <div class="invalid-tooltip">
                            Please Enter This Field!
                          </div>
                        </div>
                           </div>
                  </div>

                    <div class="modal-footer">
                     
                      <!--<button type="submit" class="btn btn-warning">Submit</button>-->
                      <input type="submit" name="submit" class="btn btn-success" value="Add">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                   </form>
                    </div>
                  </div>
                </div>
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
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
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
        function openForm1() {
          document.body.classList.add("form1");
      }

        function closeForm1() {
          document.body.classList.remove("form1");

}
      </script>

      <script type="text/javascript">

                $(document).ready(function() {
var table = $('#sampleTable').DataTable();

$("#sel2").on('change',function() {
$.fn.dataTable.ext.search.pop();
table.draw();
var filterItem=$(this).val()
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
     
          return $(table.row(dataIndex).node()).children("td:nth-child(4)").text()==filterItem;
        }
    );
    if ("All"==filterItem) {
         $.fn.dataTable.ext.search.pop();
    }
    table.draw();
});

} );
                </script>

  </body>
</html>