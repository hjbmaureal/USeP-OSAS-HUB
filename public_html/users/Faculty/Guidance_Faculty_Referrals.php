  <?php 
  
   include('conn.php');
   include('session_faculty.php');
   $faculty_id= $_SESSION['id'];

      $sql0 = "SELECT * from staff WHERE staff_id='$faculty_id'";
      $result0 = $conn->query($sql0);
      if ($result0->num_rows > 0) {
        while($row1 = $result0->fetch_assoc()) {
                  $stf_id_acc_owner = $row1['staff_id'];
                  $author_fname = $row1['first_name'];
                  $author_mname = $row1['middle_name'];
                  $author_lname = $row1['last_name'];
                  $author_position = $row1['position'];
                  $author_signature = $row1['e_signature'];
                
         }
       }


      $sql1 = "SELECT staff.*, office.office_name FROM staff 
              JOIN office ON staff.office_id = office.office_id  WHERE staff.office_id='4' AND staff.account_status='Active'"; //admin-staff_id_to
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
                  $admin_id = $row['staff_id'];
                  $f_name = $row['first_name'];
                  $m_name = $row['middle_name'];
                  $l_name = $row['last_name'];
                  $position = $row['position'];
                  $off = $row['office_name'];
         }
       }


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
      <title>USeP Faculty Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="cssg/main.css">
          <link rel="stylesheet" type="text/css" href="cssg/upstyle.css">
      <!-- Font-icon css-->
      <link href="http://fonts.cdnfonts.com/css/olde-english" rel="stylesheet">  
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="cssg/all.min.css">
      <link rel="stylesheet" type="text/css" href="cssg/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- DATEPICKER --> 
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
</head>

     <style>

  @page{
    size: letter;
  }
  @media print {
    body * {
      visibility: hidden;
    }
    .modal-body * {
      visibility: visible;
      overflow: visible;
    }
    .main * {
      display: none;
    }

    .modal {
      position: absolute;
      left: 0;
      top: 0;
      margin-top: -120px;
      padding: 0;
      visibility: visible;
      overflow: visible !important; /* Remove scrollbar for printing. */
    }
    .modal-dialog {
      visibility: visible !important;
      overflow: visible !important; /* Remove scrollbar for printing. */
    }
  }
  </style>

      <!-- Navbar-->

      <body class="app sidebar-mini rtl"onload="initClock()">
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
                <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">FACULTY HUB</p>
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
          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Faculty.php">Home</a></li>  
              <li><a class="treeview-item active" href="Guidance_Faculty_Referrals.php">Referral Forms</a></li>
              <li><a class="treeview-item" href="Guidance_Faculty_Acknowledgement.php">Acknowledgement Slip</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="facultyHome.php">Home</a></li>
              <li><a class="treeview-item" href="facultyClinic_Privacy_Policy.php">Consultation</a></li>
              <li><a class="treeview-item" href="facultyConsultationHistory.php">Consultation History</a></li>
              <li><a class="treeview-item" href="facultyPrescription.php">Prescription</a></li>
              <li><a class="treeview-item" href="facultyRequestMedCert.php">Request for Medical Certificate</a></li>
              <li><a class="treeview-item" href="facultyRequestMedRecsCert.php">Request for Medical Records Certification</a></li>
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
                    <img class="rounded-circle" src="data:image/png;base64,<?php echo $_SESSION['photo'] ?>" style="max-width:100%;">
                </a>
                
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

  if(isset($_POST['NewForm'])){
    
    $staff_id= $_POST['fac_id'];
    $stud_id = $_POST['search_text'];
    $date = $_POST['date_filed'];
    $status = '2';
    $lang='';$ps='';$career='';
    if (isset($_POST['lang'])) {
      $lang = implode(",",$_POST['lang']);
    }if (isset($_POST['ps'])) {
      $ps = implode(",",$_POST['ps']);
    }if (isset($_POST['career'])) {
      $career = implode(",",$_POST['career']);
    }
    
    
    
  

    $sql="INSERT into referral_form(staff_id, Student_id, date_filed, status_id, academics, personal_social, career) 
            values ('$staff_id','$stud_id','$date','$status','$lang','$ps','$career')";

    if(mysqli_query($conn,$sql)){

      echo '<script>
                          swal({
                              title: "Form Submitted!",
                              text: "Server Request Successful!",
                              icon: "success",
                              buttons: false,
                              timer: 1800,
                              closeOnClickOutside: false,
                                closeOnEsc: false,
                          })
                        </script>';
                      }else{
                        echo '<script>
                          swal({
                            title: "Something went wrong...",
                            text: "Server Request Failed!",
                            icon: "error",
                            buttons: false,
                            timer: 1800,
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                          })
                        </script>';
                      }
                        echo "<meta http-equiv='refresh' content='2'>";

                        $author = $author_fname. ' '. $author_mname. ' '. $author_lname;        //submittted new referral form notif
    $msg = $author . " Submitted a new referral form.";
    $sql3 = "INSERT INTO notif(notif_id, user_id, message_body, _time, link, message_status) VALUES(NULL,'$admin_id', '$msg', now(), 'Guidance_Referrals.php', 'Delivered')";

      if ($conn->query($sql3) === TRUE) {}
  }

?>

  <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div class="float-left"><h4>History of Referrals</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-auto">
                  <div class="inline-block">
                    Status of Referral
                    <select class="bootstrap-select" name="filterstatusFR" id="filterstatusFR">
                      <option class="select-item" value="all" selected="selected">All</option>
                       <?php
                          $result=mysqli_query($conn, "SELECT * FROM _status");               
                          while($res = mysqli_fetch_array($result)) {         
                              $value= $res['status_id']; ?>
                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['status'];?></option>
                        <?php } ?>
                    </select>
                    </div>
                      </div>
                      <div class="col-sm">
                          <div class="inline-block float ml-2 mt-1">
                            <button class="btn btn-warning btn-sm verify" style="width: 130px; color: white;">
                            <a class="text" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-edit" style="color:white;"></i> New Form
                          </button></a>
                      </div>
                  </div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div class="calldiv">
                  <table class="table table-hover table-bordered" id="sampleTable2">
                    <thead>
                      <tr>
                      <th>Date Filed</th>
                      <th>Student Referred</th>
                      <th >Status of Referral</th>                      
                      <th>Date Completed</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
          
           $sql = mysqli_query($conn,"SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, student.first_name, student.last_name, _status.status from referral_form join student USING (Student_id) join _status USING(status_id) where referral_form.staff_id = '$faculty_id'");
           while($row = mysqli_fetch_array($sql)) { ?>   

                                  <tr>
                                  <td><?php echo $row['date_filed'];?></td>
                                  <td><?php echo $row['first_name'].'  
                                  '. $row['last_name'];?></td> 
                                  <td><?php echo $row['status']; ?></td>
                                  <td><?php echo $row['refdate_completed']; ?></td>
                                  <td>
                                  <button  class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" a href="#details<?php echo $row['referral_id']; ?>"><i class="fas fa-eye" style="color:white;width:13px"></i></button>
                                  <?php include('Guidance_Referral_View_Modal.php'); ?>
                                </td>
                                </tr>
                            <?php }
       ?>
                        </tbody>
                        
                  </table></div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>        
                      
<!--NEW FORM-->

  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="width:800px; ">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> NEW REFERRAL FORM
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST">
        <div class="modal-body">
                    
                            <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Date Filed:</label><input class="form-control" type="date" placeholder="" name="date_filed" id="date_filed" required="">
                                  <input class="form-control" type="hidden" placeholder="" name="fac_id" id="fac_id" value="<?php echo $stf_id_acc_owner;?>" required="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">To:</label><input class="form-control" type="text" value="<?php echo $f_name;?>&nbsp;<?php echo $m_name;?>&nbsp;<?php echo $l_name;?>" disabled="">
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label"><br></label><input class="form-control" type="text" value="<?php echo $position;?>" disabled="">
                                </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Student's ID Number</label><input class="form-control" type="text"  placeholder="Type Student ID number" name="search_text" id="search_text" required="">
                                </div>
                            </div></div><div class="student_info"><div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Name</label><input class="form-control" type="text" placeholder="" name="stud_id" disabled>
                                </div>
                            </div>
                          </div>
                          
                            <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Course:</label><input class="form-control" type="text" placeholder="" disabled>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Year Level:</label><input class="form-control" type="text" placeholder="" disabled>
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Section</label><input class="form-control" type="text" placeholder="" disabled>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Mobile Number:</label><input class="form-control" type="text" placeholder="" required="" readonly="">
                                </div>
                            </div>
                          </div>
                          </div>
                            <div class="text">
                                <table width="90%" align="center" style="margin-top:30px; margin-bottom: 30px;">
                                <tr>
                                  <th>ACADEMICS</th>
                                  <th>PERSONAL/SOCIAL</th>
                                  <th>CAREER</th>
                                </tr>
                               
                                <tr>
                                  <td>
            <input type="checkbox" name='lang[]' value="Attendance (tardiness/absences)">&nbsp; Attendance (tardiness/absences) <br/>
            <input type="checkbox" name='lang[]' value="Study Habits/Attitude/Skills">&nbsp; Study Habits/Attitude/Skills <br/>
            <input type="checkbox" name='lang[]' value="Submission Of Requirements">&nbsp; Submission Of Requirements <br/>
            <input type="checkbox" name='lang[]' value="Grades (tardiness/absences)">&nbsp; Grades (tardiness/absences)<br/>
            <input type="checkbox" name='lang[]' value="Policies">&nbsp; Policies<br/>
            <input type="checkbox" name='lang[]' value="Adjustments">&nbsp; Adjustments<br/>
            <input type="checkbox" name='lang[]' value="Test Taking">&nbsp; Test Taking<br/>
            <input type="checkbox" name='lang[]' value="Others">&nbsp; Others<br/><br>
                                  </td>
                                  <td>
            <input type="checkbox" name='ps[]' value="Emotional">&nbsp; Emotional <br/>
            <input type="checkbox" name='ps[]' value="Interpersonal Skills">&nbsp; Interpersonal Skills <br/>
            <input type="checkbox" name='ps[]' value="Attitude/Behavior">&nbsp; Attitude/Behavior <br/>
            <input type="checkbox" name='ps[]' value="Financial">&nbsp; Financial<br/>
            <input type="checkbox" name='ps[]' value="Home/Family">&nbsp; Home/Family<br/>
            <input type="checkbox" name='ps[]' value="Motivation">&nbsp; Motivation<br/>
            <input type="checkbox" name='ps[]' value="Relationships">&nbsp; Relationships<br/>
            <input type="checkbox" name='ps[]' value="Others">&nbsp; Others<br/><br>
                                  </td>
                                  <td>
            <input type="checkbox" name='career[]' value="Planning">&nbsp; Planning <br/>
            <input type="checkbox" name='career[]' value="Decision Making">&nbsp; Decision Making <br/>
            <input type="checkbox" name='career[]' value="Goal Setting">&nbsp; Goal Setting <br/>
            <input type="checkbox" name='career[]' value="Attitude/Outlook">&nbsp; Attitude/Outlook<br/>
            <input type="checkbox" name='career[]' value="Exploration">&nbsp; Exploration<br/>
            <input type="checkbox" name='career[]' value="Work Values">&nbsp; Work Values<br/>
            <input type="checkbox" name='career[]' value="Others">&nbsp; Others<br/>
            <input type="hidden" name='' value="">&nbsp;<br/><br>
                                  </td>
                                </tr>
                                 
                              </table>
                            </div>

                            <div class="container">
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Signature Over Printed Name:</label><input class="form-control" value="<?php echo $author_fname;?>&nbsp;<?php echo $author_mname;?>&nbsp;<?php echo $author_lname;?>" type="text" placeholder="" name="staff_id" style="text-transform:uppercase" required="" readonly>
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <?php 
                         $sql=mysqli_query($conn,"SELECT e_signature as sig from staff where staff_id='$faculty_id'");
                          $query=mysqli_fetch_array($sql);
                          if (empty($query['sig'])) { ?>
                           <label class="control-label">&emsp;</label><input class="form-control" type="file" name="signature" id="signature" required>
                          <?php }else{?>
                            <label class="control-label">&emsp;</label><input class="form-control" type="file" name="signature" id="signature" disabled>
                          <?php }?>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Position/Designation:</label><input class="form-control" type="text" placeholder="" value="<?php echo $author_position;?>" required="" readonly>
                                </div>
                            </div>
                          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="submit" name="NewForm" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
       </form>
      </div>
    </div>
  </div>


<?php 

                $results[]= '';$i=0;
                $from= date('Y-m-d'); 
                $sql="SELECT DATE_FORMAT(appointment_date, '%d') as dy,appointment_date FROM `guidance_appointments` WHERE appointment_date > '$from'";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){
                  $sql2="SELECT DATE_FORMAT(appointment_date, '%d') as dy, appointment_date FROM `guidance_appointments` WHERE  appointment_date > '$from' and DATE_FORMAT(appointment_date, '%d')";
                $result2 = mysqli_query($conn, $sql2);
               
                while($row2 = mysqli_fetch_assoc($result2)){
                  if ($row['dy']==$row2['dy']) {
                    $count++;
                    if ($count==6) {
                      $time= strtotime($row['appointment_date']);
                    $holder=date('d-m-Y', $time);
                    $results[] = '"'.$holder.'"';
                    }
                    # code...
                  }
                  
                }
                    
                } 
                $results=array_filter($results);
                $totaldayslist= implode(", ", $results);

                ?>
                <!-- DISABLE DATESCHEDULE -->
                <script type="text/javascript">
                  var datesForDisable = [<?php echo $totaldayslist;?>];
                  
                  $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                startDate: new Date(),
                daysOfWeekDisabled: [0,6],
                todayHighlight: true,
                datesDisabled: datesForDisable,
                autoclose:true,
                });
                  
                
                </script>
                  <script type="text/javascript">
    $('.datepicker').datepicker({
        daysOfWeekDisabled: [0,6]
    });
</script>
      </main>
      <!-- Essential javascripts for application to work-->
      
      <script src="jsg/jquery-3.3.1.min.js"></script>
      <script src="jsg/popper.min.js"></script>
      <script src="jsg/bootstrap.min.js"></script>
      <script src="jsg/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="jsg/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="jsg/plugins/moment.min.js"></script>
    <script type="text/javascript" src="jsg/plugins/jquery-ui.custom.min.js"></script>
      <script type="text/javascript" src="jsg/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="jsg/plugins/sweetalert.min.js"></script>
      <script type="text/javascript">
       //prevent form resubmission
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    $(document).ready(function() {
            $('#home-table').DataTable();
            $('#show-table').DataTable();
        });

     //view forms modal
$(document).on('click', '.viewbutton', function(){
      $('#view-modal').modal('show');    
    });

</script>


      <!-- FILTER SCRIPT -->
   <script type="text/javascript">
                $(document).ready(function(){
                  /*STATUS*/
                  $("#filterstatusFR").on('change', function(){
                    var value = $(this).val();
                    /*alert(value);*/
                    $.ajax({
                          url:"Guidance_referrals_filter.php",
                          type:"POST",
                          data:'requeststatusFR=' + value,
                          beforeSend:function(){
                            $(".calldiv").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv").html(data);
                          },
                    });
                
                  });
               

                $("#search_text").keyup(function(){
                  var txt = $(this).val();
                  var count = txt.length;

                  if (count>9) {
                       /*   alert(txt);*/
                          $.ajax({
                            url:"search_student_id.php",
                            type:"POST",
                            data:{id:txt},
                            success:function(data){
                              $(".student_info").html(data);
                            },
                          });
                  }else{
                    /*$("#result").html('');*/
                  }

                });
                 });
              </script>
              
  <script type="text/javascript">
  function print_specific_div_content(){
    var win = window.open('','','left=0,top=0,width=900,height=700,toolbar=0,scrollbars=0,status =0');

    var content = "<html>";
    content += "<body onload=\"window.print(); window.close();\">";
    content += document.getElementById("printThis").innerHTML ;
    content += "</body>";
    content += "</html>";
    win.document.write(content);
    win.document.close();
}
    </script>


      <script>
        <!-- table selection -->
          $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});
      </script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="jsg/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="jsg/plugins/dataTables.bootstrap.min.js"></script>
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
    </body>
  </html>