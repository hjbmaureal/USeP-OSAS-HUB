  <?php
    session_start();
    include('../../conn.php');
  include '../../php/notification-timeago.php'; 
  
  if (!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Alumni'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
    //validating session

 $id=$_SESSION['id'];

// echo '<div style="height:100px;"></div>';
 //echo 'adfdsfdsfsdfsdfsdffffffffffffffffffffffffffffffffffffffffffffff' .$id. '';

$count_sql="SELECT * from notif where user_id='$id' and message_status='Delivered'";

$result = mysqli_query($conn, $count_sql);

$count = 0;

while ($row = mysqli_fetch_assoc($result)) {                             

  $count++;
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
      <link rel="icon" href="../image/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Student Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../../css/main.css">
          <link rel="stylesheet" type="text/css" href="../../css/upstyle.css">
          
      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    
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
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">ALUMNI HUB</p>
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-handshake-o
"></i><span class="app-menu__label">Request Good Moral</span></a></li>



     

          
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
              <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $count;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $count;  ?> new notifications.</li>

              <div class="app-notification__content">
                  <?php

                $count_sql="SELECT * from notif where user_id=$id  order by time desc";

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
                  <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <i class="text-warning fas fa-user-circle fa-2x"></i>
                  </a>
                      <!-- <a class="app-nav__item" style="width: 48px;" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <img class="rounded-circle" src="data:image/jpeg;base64,<?php echo $_SESSION['photo'] ?>" style="max-width:100%;">
                </a> -->
                
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="Guidance_FacultyUser.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
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


       <?php 
              $id = $_SESSION['id']; 
              $sql = "SELECT  alumni.last_name,alumni.first_name,alumni.middle_name,alumni.Suffix,course.name,course.major
                        FROM alumni
                        JOIN course 
                        ON alumni.course_id=course.course_id
                        WHERE id = '$id'";


              if ($result = mysqli_query($conn, $sql)) {
                // Fetch one and one row
                while ($row = mysqli_fetch_row($result)) {
                  $LName = $row[0];
                  $FName = $row[1];
                  $MName = $row[2];
                  $Suffix = $row[3];
                  $degree = $row[4];
                  $major = $row[5];
                }
                mysqli_free_result($result);
              }

             
    
  ?>

  <script type="text/javascript">
function validate()
{
 var error="";
 var or = document.getElementById( "or_no" );
 if( or.value == "" )
 {
  alert(" You Have To Write OR Number. ");
  return false;
 }

 var date = document.getElementById( "date_requested" );
if( date.value == "" )
 {
  alert(" You Have To input date. ");
  return false;
 }

 var purpose = document.getElementById( "purpose" );
if( purpose.value == "")
 {
   alert(" You Have To A valid purpose. ");
  return false;
 }

  else
 {
  return true;
 }
}
  </script>

  <?php
if( isset( $_POST['submit'] ) )
{
 


$lastsyattendedto = $_POST['to'];
$lastsyattendedfrom = $_POST['from'];
$reqby = $_SESSION['id'];
$datereq = date('Y-m-d H:i:s');
$orno = $_POST['or_no'];
$purpose = $_POST['purpose'];
$orpic =$_POST['or_pic'] ;

$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$admin_id= $request['staff_id'];

$notif_body = "An alumni requests for a Good Moral Certificate.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$admin_id', '$notif_body',now(),'../users/Osas/ReqGoodMoral.php', 'Delivered')");

 $sql = mysqli_query($conn,"INSERT INTO good_moral_requests (request_id, last_sy_attended, requested_by, date_requested, or_no, purpose, or_pic)
 VALUES ('','$lastsyattendedfrom-$lastsyattendedto','$reqby','$datereq','$orno','$purpose','$orpic')");

if ($sql && $notification) {
    echo '<script>
                 swal({
                  title: "Request Submitted Succesfully",
                  text: "Server Request Success",
                  type: "success"
                });
                </script>';
} else {
    echo '<script>
                 swal({
                  title: "Request Submit Failed",
                  text: "Server Request Failed",
                  type: "warning"
                });
                </script>';
}
 mysqli_close($conn);


}
 ?>
           
        <div class="row">
       
        <div class="col-md">
          <form method="POST" action="index.php" onsubmit="return validate();">
          <div style="background-color: #C12C32; padding: 8px 10px;"> </div>
          <div class="tile">
              
            <h3 class="tile-title">Fill this form</h3>
                        <div class="tile-footer"></div>
          
            <div class="row">
                <div class="form-group col-sm-3">
                  <p style="font-weight: bolder;">Student ID
                  <input class="form-control" type="text" id="Student_id" name="Student_id" onkeyup="GetDetail(this.value)" value="<?php echo "$id"; ?>" disabled >
                </div>
                
                <div class="form-group col-sm-3">
                  <p style="font-weight: bolder;">OR Number
                  <input class="form-control" type="text" id="or_no" name="or_no" >
                </div>

                <div class="form-group col-sm-3">
                  
                </div>
                
                <div class="form-group col-sm-3">
                  <p style="font-weight: bolder;">Date
                 <!-- <input class="input-add addtext" type="text" id="date_requested"  placeholder="Select Date" required=""> -->
                  <input class="form-control"  id="date_requested"  name="date_requested" type="text" value="<?php echo date("m/d/Y");?>" disabled>
                </div>
            </div>

            <div class="tile-body" >
                <h5 class="font-weight-bold">Personal Information</h5> 
                
                <p class="font-weight-bold">Name &nbsp;<i style="color: red;">(Last Name, First Name, Middle Name, Suffix) </i>
                </p>
                <div class="row">
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo "$LName"; ?>" disabled>
                </div>
                  <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="first_name" name="first_name" placeholder="First Name" value="<?php echo "$FName"; ?>" disabled>
                </div>
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="middle_name" name="mname" placeholder="Middle Name" value="<?php echo "$MName"; ?>" disabled>
                </div> 
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="suffix" name="suffix" placeholder="Suffix" value="<?php echo "$Suffix"; ?>" disabled>
                </div>
                </div>

                <h5 class="font-weight-bold">School Information</h5>

                <div class="row">
                  <div class="form-group col-sm-4">
                    <p style="font-weight: bolder;">Degree
                    <input class="form-control" type="text" id="coursename" name="coursename" value="<?php echo "$degree"; ?>" disabled>
                  </div>
                  <div class="form-group col-sm-4">
                    <p style="font-weight: bolder;">Major
                    <input class="form-control" type="text" id="major" name="major" value="<?php echo "$major"; ?>" disabled></p>
                  </div>
                  
                </div>


                <p class="font-weight-bold">Last School Year Attended</p>
                <div class="row">
                <div class="form-group col-sm-3">
                <p style="font-weight: bolder;">
                <input class="form-control" type="from" id="from" name="from" placeholder="e.g 2012" required="">
                </div>-
                <div class="form-group col-sm-3">
                <input class="form-control" type="to" id="to" name="to" placeholder="e.g 2013" required="">
                </div>
                </div>

                <div class="row">
                  <div class="form-group col-sm">
                    <p style="font-weight: bolder;">Purpose in Requesting Good Moral
                    <textarea class="form-control" id="purpose" name="purpose" rows="6" ></textarea></p>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm">
                    <p style="font-weight: bolder;">Upon Requesting Good Moral we need to verify your OR No. Please upload your Official Reciept. 
                    <input class="form-control-file" type="file" id="or_pic" name="or_pic" aria-describedby="fileHelp" required=""> 
                    
                  </div>
                </div>

              <div class="tile-footer"></div>
              <button class="btn btn-success" type="submit" name="submit" id="submit" >Submit</button>
              <button class="btn btn-primary" type="submit">Cancel</button>

          </div>
          </form>

          <p id="error_para" ></p>
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

      <?php  
      if ($count!=0) 
        { 
          echo '<script>swal("Notification Alert!", "You have '.$count.' unread notification/s!", "success")</script>';
        }
      ?>

  <div id="notifModal" class="modal fade" data-backdrop="static">
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