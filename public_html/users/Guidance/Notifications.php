<?php
include('conn.php');
  session_start();
    if (!isset($_SESSION['id'])){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id = $_SESSION['id']; 


$student_id="";
$new_pass="";
if(isset($_POST['update'])){
  $student_id= $_POST['student_id'];
  $new_pass= $_POST['new_password'];

  $student_check_query="SELECT * FROM student WHERE student_id='$student_id'";
  $result1=mysqli_query($conn,$student_check_query);
  $student_check= mysqli_fetch_assoc($result1);

  //create the basic email info to send
$email_to = $student_check['email_add'];
$subject = "USEP TAGUM OSAS - Your new Password";


//create the email heaaders (naa sa sendmail.ini ang header)
// Set content-type header for sending HTML email
$headers = "From: lloydsryan30@gmail.com";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//create the html message
$message = "Your new password is ".$new_pass.". Remember it well and don't forget it next time.";


//$new_pass = password_hash($new_pass,PASSWORD_DEFAULT);
 $change_pass_query = $conn->prepare("call spUpdatePass(?,?)");
 $change_pass_query->bind_param("ss", $new_pass, $student_id);
 $result2 = $change_pass_query->execute();

 $change_remarks_query = $conn->prepare("call spUpdateRemarks(?)");
 $change_remarks_query->bind_param("s", $student_id);
 $result3 = $change_remarks_query->execute();


//$change_pass_query="UPDATE student set password='$new_pass' where student_id='$student_id'";
//$change_remarks_query="UPDATE forgot_pass_requests set remarks='Done' where student_id='$student_id'";

if($result2 && mail($email_to, $subject, $message, $headers) && $result3){
          echo '<script>alert("Password successfully updated and send via Email!")</script>';
        }else{
          echo '<script>alert("Identification not recognized. Please try again.")</script>';
        }

}

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
          <link rel="stylesheet" type="text/css" href="../../css/upstyle_main.css">
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
      <body class="app sidebar-mini rtl">
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
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sitemap"></i><span class="app-menu__label">Miscellaneous</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="StudentOrganization.php">Student organization</a></li>
              <li><a class="treeview-item " href="Usep_College.php">USeP Colleges</a></li>
              <li><a class="treeview-item" href="Usep_Courses.php">USeP Courses</a></li>
              <li><a class="treeview-item active" href="Usep_Department.php">USeP Department</a></li>
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
                      <p class="app-notification__meta">'.timeago($row['time']).' ago</p>
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
              <li><a class="dropdown-item" href="page-user.php"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
              <li><a class="dropdown-item" href="page-user.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
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
              <a class="btn btn-primary" href="../../index.php" id="logoutbtn2">Logout</a>
            </div>
          </div>
        </div>
      </div>
        <div class="red"> 
          
        </div>
              
          <!-- Content -->
     <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                 <div class="row">
                  <div class="col">
                      <div class="float-left"><h4>Notifications</h4></div>
                  </div>
                </div>
                
                  <!-- Table -->

                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered" id="sampleTable2">
                    <thead>
                      <tr>
                      <th>Message Body</th>
                      <th class="max">Time</th>
                      <th class="max">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
    $sql="SELECT * from notif where user_id='1' ORDER BY `notif`.`time` DESC";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['message_status']=='Delivered') {
                          echo'<tr>
                            <td><font class="display"><b><u>'. $row['message_body']. '</u></b></font></td>
                            <td><font class="display"><b>'. timeago($row['time']).' ago</b></font></td>
                            <td><font class="display"><b>
                            <form method="POST" action="change_notif_status.php">
                      <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                      <input type="submit" name="open_notif" value="Open Message">
                      </form>
                            </font></b></td></li>
                          </tr>';}
                          else{
                            echo'<tr>
                            <td><font class="display">'. $row['message_body']. '</font></td>
                            <td><font class="display">'. timeago($row['time']).' ago</font></td>
                            <td><font class="display">
                            <form method="POST" action="change_notif_status.php">
                      <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                      <input type="submit" name="open_notif" value="Open Message">
                      </form>
                            </font></td>
                          </tr>';
                          }
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
        
<form method="POST">
<div class="modal fade" id="action-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> -->
        <div class="modal-body">
          <center><input type="text" name="student_id" id="student_id" readonly style="background-color: transparent;border-color: transparent;"></center><br>
          Last Name:<input type="text" class="form-control" id ="last_name" ><br>
          First Name:<input type="text" class="form-control" id ="first_name" ><br>
          Middle Name:<input type="text" class="form-control" id ="middle_name" ><br>
          New Password:<input type="text" class="form-control" name="new_password" placeholder="Enter new Password"><br>
        </div>
         <div class="modal-footer">
          <input type="submit" name="update" class="btn btn-secondary" style="background-color:green;" value="Send New Password Via Email">
          <button type="button" class="btn btn-secondary" style="background-color:maroon;" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
</form>
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

        $(document).on('click', '.show_modal', function(){
      $('#action-modal').modal('show');
      $('#new_Student_id').val($(this).attr('data-id'));
      var id = $(this).attr('data-id');

      $.ajax({
        url: 'FetchDataForNewPass.php',
        type: 'POST',
        dataType: 'JSON',
        data:{
        id: id,
        },
        success: function(data){
        //alert(data[0]);

         $('#student_id').val(data[0]);
         $('#last_name').val(data[1]);
         $('#first_name').val(data[2]);
         $('#middle_name').val(data[3]);
        // $('#ln').val(data[1]);

        },

        })
    });

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
     <!--  <script type="text/javascript">$('#sampleTable2').DataTable();</script> -->
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
     
  </body>
</html>