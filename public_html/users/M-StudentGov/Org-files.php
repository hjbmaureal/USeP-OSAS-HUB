 <?php
session_start();
include("conn.php");
error_reporting(0);
include ('../../php/notification-timeago.php'); 
  if (!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Student'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id = $_SESSION['id'];
  $count = 0;
  $job_count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where user_id='$id' and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}

$query2=mysqli_query($conn,"SELECT count(*) as cnt from job_hiring_announcement");
  while($row=mysqli_fetch_array($query2)){ $job_count = ($row['cnt']==0) ? '' : $row['cnt'] ;}


 if (isset($_GET['image'])) {
    $file_name = $_GET['image'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from remarks_apply where image='$file_name' and Submitted_by='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../Osas/Remarks/'. $file['image'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../Osas/Remarks/' . $file['image']));
        readfile('../Osas/Remarks/' . $file['image']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

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
      <title>USeP Student Hub</title>
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
    </head>
      <body class="app sidebar-mini rtl" onload="initClock()">
      <!-- Navbar-->
  <link rel="stylesheet" href="../../css/owl.carousel.min.css">
<link rel="stylesheet" href="../../css/owl.theme.default.min.css">
  <style type="text/css">
    .modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
} .img{
      width: 200px;
      height: 200px;
    }
    
  </style>
        
      <header class="app-header">
    
   
      </header>
   

      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="../../images/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">STUDENT HUB</p>
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="../Student/index.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
            <li>
              <a class="app-menu__item" href="Job-Announcements.php">
                <i class="app-menu__icon fa fa-bullhorn"></i>
                <span class="app-menu__label">Job Hirings</span>
                <span class="text-right"><?php 
                if($job_count==0){
                echo '<b style="background-color:#FF0000; padding:4px 6px;font-size:8px; margin-left:10px; border-radius:100%;">0</b>';
                }else{
                echo '<b style="background-color:#FF0000; padding:4px 6px;font-size:8px; margin-left:10px; border-radius:100%;">'.$job_count.'</b>';
                }
                 ?></span>
              </a>
          </li>
          <li class="p-2 sidebar-label"><span class="app-menu__label">STUDENT'S AFFAIRS AND SERVICES</span></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Discipline Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item " href="../Student/Home-Discipline.php">Home</a></li>
              <li><a class="treeview-item" href="../Student/Discipline-Complaints.php">Complaints</a></li>
              <li><a class="treeview-item" href="../Student/Discipline-HistoryComplaints.php">Complaint Records</a></li>
              <li><a class="treeview-item" href="../Student/Discipline-Response.php">Response</a></li>

            </ul>
          </li>

                <?php 
                $org_select=mysqli_query($conn,"SELECT * from approve_funded where org_pres_gov like '$id%'");
                $org= mysqli_fetch_array($org_select);

                  if (!empty($org)){
                    if($org['type']=='Govt. Funded'){
                      echo '
                        <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                          <li><a class="treeview-item" href="../M-StudentGov/Home-Orgs.php">Home</a></li>
                          <li><a class="treeview-item active" href="../M-StudentGov/Org-files.php">Organization Files</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov/Accre-files.php">Re-Accreditation Files</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov/Oath-files.php">Oath of Office</a></li>
                        </ul>
                      </li>
            
                    ';

                    }else{
                      echo '
                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                          <li><a class="treeview-item" href="../M-StudentGov-NonFunded/Home-Orgs.php">Home</a></li>
                          <li><a class="treeview-item active" href="../M-StudentGov-NonFunded/Org-files.php">Organization Files</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov-NonFunded/Accre-files.php">Re-Accreditation Files</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov-NonFunded/Oath-files.php">Oath of Office</a></li>
                        </ul>
                      </li>
            
                    ';
                    }
                    
            
            
                  } else {
                    echo '
                         <li><a class="app-menu__item active" href="Home-Orgs.php"><i class="app-menu__icon fa fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services</span></a></li>
                    ';
                  }
            
            ?>

            <?php 
                  if ($_SESSION['sl_status']=='Hired'){
                    echo '
                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Labor Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                  <li><a class="treeview-item " href="../Student/Home-Labor.php">Home</a></li>
                                  <li><a class="treeview-item" href="../Student/Labor-DTR.php">DTR</a></li>
                                  <li><a class="treeview-item" href="../Student/Labor-Accomplishments.php">Accomplishment Reports</a></li>
            
            
                                </ul>
                        </li>
             
                    ';
            
            
                  } else {
                    echo '
                          <li><a class="app-menu__item" href="../Student/Home-Labor.php"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Student Labor Services</span></a></li>
                    ';
                  }
            
            ?>

          <li><a class="app-menu__item" href="../Student/ReqGoodMoral_Student.php"><i class="app-menu__icon fa fa-envelope-o"></i><span class="app-menu__label">Request for Good Moral</span></a></li>


          <li class="p-2 sidebar-label"><span class="app-menu__label">GUIDANCE OFFICE SERVICES</span></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="../Student/Guidance_StudentUI.php">Home</a></li>
              <li><a class="treeview-item" href="../Student/Guidance_Student_Counselling.php">Counselling</a></li>
              <li><a class="treeview-item" href="../Student/Guidance_Student_GroupGuidance.php">Group Guidance Activities</a></li>
              <li><a class="treeview-item" href="../Student/Guidance_Student_Evaluation.php">Evaluation</a></li>
            </ul>
          </li>


            <li class="p-2 sidebar-label"><span class="app-menu__label">SCHOLARSHIP OFFICE SERVICES</span></li>

            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fas fa-handshake-o"></i>
                    <span class="app-menu__label">Scholarship Services  </span>
                    <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="../Student/student-scholarship-dashboard.php">Home</a></li>
              <li><a class="treeview-item" href="../Student/student-scholarship-data-form.php">Scholarship Data Form</a></li>

            </ul>
            </li>



            <li class="p-2 sidebar-label"><span class="app-menu__label">CLINIC OFFICE SERVICES</span></li>
           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="../Student/Clinic_Home.php">Home</a></li>
              <li><a class="treeview-item" href="../Student/Clinic_Privacy-Policy.php">Consultation</a></li>
              <li><a class="treeview-item" href="../Student/StudentConsultationHistory.php">Consultation History</a></li>
              <li><a class="treeview-item" href="../Student/Prescription.php">Prescription</a></li>
              <li><a class="treeview-item" href="../Student/RequestMedCert.php">Request for Medical Certificate</a></li>
              <li><a class="treeview-item" href="../Student/RequestMedRecsCert.php">Request for Medical Records Certification</a></li>

            </ul>
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
            <b style="color: red;"><?php echo $count;  ?></b>
            <i class=" fas fa-bell fa-lg mt-2"></i>
          </a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have <?php echo $count;  ?> new notifications.</li>              
              <div class="app-notification__content">                   
                <?php 
                  $count_sql="SELECT * from notif where user_id='$id'  order by time desc";
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
              <a href="../Student/Notifications.php">See all notifications.</a>
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
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
       <form action="Org-files.php" method="POST" id="fileupload" enctype="multipart/form-data">

  <div class="row">
    


        <div class="col-xl">
          <div style="background-color: #c12c32;   padding: 9px 10px; font-weight: bolder; color: white; font-size: 25px;" >Organization Files</div>
          <div class="tile">

            <div class="row">
        <?php 
            $queryy = "SELECT * FROM approve_funded WHERE org_pres_gov like '%".$_SESSION['id']."%'";
            $quer = mysqli_query($conn, $queryy);
            $array = mysqli_fetch_array($quer);
            $query1 = "SELECT * FROM govt_funded_org WHERE org_pres_gov like '%".$_SESSION['id']."%'";
            $quer1 = mysqli_query($conn, $query1);
            $array1 = mysqli_fetch_array($quer1);
        ?>
      
                      <div class="col-md">
                       
                        <div class="tile">
                          <div class="tile-body" > 

                              <div class="row">
                                <div class="col-sm">
                              <div >
                              <p style="width: 500px;">Organization Name: &emsp; <input name="org_name" value=" <?php echo $array['org_name']; ?>" style="border: none; font-weight: bolder; width: 300px;"/></p> 
                                      
                              </div>
                            
                              <div >
                              <p style="width: 700px;">Student Organization Governor/President Name: &emsp;<input name="Org_pres_gov" value=" <?php echo $array['org_pres_gov']; ?>" style="border: none;font-weight: bolder;width: 300px;"></p> 
                              </div>
                            
                         
                              <div >
                              <p style="width: 500px;">Student Organization Adviser: &emsp;<input name="Org_adviser" value=" <?php echo $array['org_adviser']; ?>" style="border: none;font-weight: bolder;"></p> 
                            </div>
                          
                              <div >
                              <p style="width: 500px;">Student Organization Type: &emsp; <input name="Org_type" value=" <?php echo $array['type']; ?>" style="border: none;font-weight: bolder;"></p> 
                            </div>
                            <input name="org_id" value=" <?php echo $array['id']; ?>" style="border: none; font-weight: bolder; color:white;">
                          </div>
                        <div class="col-sm">

                          <div class="mx-auto" >
                                        <img src="../Student/Org_Applications/<?php echo $array1['logo'] ?>" style="margin-top: 20px;margin-left: 10px;border-radius: 50%;" class="card-img-top imgbx" alt="...">
                                      </div>
                                    </div>
                        </div>

                        </div>
<?php
                 $files = array();
                 $filesrow = 0;



               $results = mysqli_query($conn, "SELECT file FROM remarks_apply WHERE status=0 and Submitted_by like '%".$_SESSION['id']."'");       
                while ($row = mysqli_fetch_array($results)) {
                   $files[$filesrow]= $row["file"];
                   $filesrow++;
                 }
                       
                       
                
              ?>   

                        
              <div class="row">
        <div class="col-xl">
          <!-- <div style="background-color: #C12C32; padding: 8px 10px;"> </div> -->
          <div>Attach files:</div>
          <div class="tile" >
              <div class="owl-carousel owl-theme"  >
                 

                                    <div class="item image-upload" >
                                      <label for="file-input1" >
                                    <div class="img card text-center btn btn-light orgbox"  >
                                      <input class="file-input1" id="file-input1" type="file" name="WFP" onchange="ssvalue1()" style="margin-top: -100px; margin-bottom: 80px;" /> 
                                      <input type="text" name="" id="input1" value="" style='border-style: none;background: transparent;' disabled >
                                      <script>
                                        function ssvalue1() {
                                          var val = document.getElementById("file-input1").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input1").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../../images/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                      <div class="card-body">
                                        <p class="card-text txbx">WFP</p>
                                      </div>   
                                      <? echo $name_array[$i] ?>
                                    </div>
                                    <?php 
                                        $tabquery = mysqli_query($conn,"SELECT ID from remarks_apply where status=0 and file='WFP Letter' and Submitted_by like '%".$_SESSION['id']."' " );             
                                      $resquery = mysqli_fetch_array($tabquery);
                                    if ($files[0] == "WFP Letter" ||$files[1] == "WFP Letter" ||$files[2] == "WFP Letter" ||$files[3] == "WFP Letter" ||$files[4] == "WFP Letter" ){ 
                                      ?>
                                    
                                        <button type="button"  class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-role="remarkk-modal" id="<?php echo $resquery['ID']; ?>"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                     <?php }
                                   else{ ?>
                                        <button type="button"  class="btn btn-dark btn-sm blocking w-100 mt-3 demoNotify" href="#"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                  <?php }
                                   ?>
                                  </div>
                                  

                                    <div class="item image-upload" >
                                      <label for="file-input2" >
                                    <div class="img card text-center btn btn-light orgbox" >
                                      <input class="file-input2"  id="file-input2" type="file" name="PPMP" onchange="ssvalue2()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input2" value="" style='border-style: none;background: transparent;' disabled >
                                      <script>
                                        function ssvalue2() {
                                          var val = document.getElementById("file-input2").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input2").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../../images/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                      <div class="card-body">
                                        <p class="card-text txbx">PPMP</p>
                                      </div>
                                      <?echo $name_array[$i]?>   
                                    </div>
                                    <?php 
                                        $tabquery1 = mysqli_query($conn,"SELECT ID from remarks_apply where status=0 and file='PPMP' and Submitted_by like '%".$_SESSION['id']."' " );             
                                      $resquery1 = mysqli_fetch_array($tabquery1);
                                    if ($files[0] == "PPMP" ||$files[1] == "PPMP" ||$files[2] == "PPMP" ||$files[3] == "PPMP" ||$files[4] == "PPMP" ){ 
                                        ?>
                                        <button type="button"  class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-role="remarkk-modal" id="<?php echo $resquery1['ID']; ?>"><i class="mr-2 fas fa-comment" ></i>REMARKS</button> 
                                    <?php }
                                    else{ ?>
                                        <button type="button"  class="btn btn-dark btn-sm blocking w-100 mt-3 demoNotify" href="#"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                   <?php }
                                   ?>
                                  </div>
                                  

                                    <div class="item image-upload" >
                                      <label for="file-input3" >
                                    <div class="img card text-center btn btn-light orgbox" >
                                      <input class="file-input3"  id="file-input3" type="file" name="AccomRep" onchange="ssvalue3()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input3" value="" style='border-style: none;background: transparent;' disabled >
                                      <script>
                                        function ssvalue3() {
                                          var val = document.getElementById("file-input3").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input3").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../../images/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                      <div class="card-body">
                                        <p class="card-text txbx">ACCOMPLISHMENT REPORTS</p>
                                      </div>
                                      <? echo $name_array[$i]?>                                    </div>
                                    <?php 
                                        $tabquery2 = mysqli_query($conn,"SELECT ID from remarks_apply where status=0 and file='AccomRep' and Submitted_by like '%".$_SESSION['id']."' " );             
                                      $resquery2 = mysqli_fetch_array($tabquery2);
                                     if ($files[0] == "AccomRep" ||$files[1] == "AccomRep" ||$files[2] == "AccomRep" ||$files[3] == "AccomRep" ||$files[4] == "AccomRep" ){ 
                                        ?>
                                        <button type="button"  class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-role="remarkk-modal" id="<?php echo $resquery2['ID']; ?>"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                    <?php }
                                    else{ ?>
                                        <button type="button"  class="btn btn-dark btn-sm blocking w-100 mt-3 demoNotify" href="#"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                   <?php }
                                   ?>
                                  </div>


                                    <div class="item image-upload" >
                                      <label for="file-input4" >
                                    <div class="img card text-center btn btn-light orgbox" >
                                      <input class="file-input4"  id="file-input4" type="file" name="ActionPlan" onchange="ssvalue4()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input4" value="" style='border-style: none;background: transparent;' disabled >
                                       <script>
                                        function ssvalue4() {
                                          var val = document.getElementById("file-input4").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input4").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../../images/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                    <div class="card-body">
                                        <p class="card-text txbx">ACTION PLAN</p>
                                      </div>  
                                      <? echo $name_array[$i] ?> 
                                    </div>
                                    <?php 
                                        $tabquery3 = mysqli_query($conn,"SELECT ID from remarks_apply where status=0 and file='ActionPlan' and Submitted_by like '%".$_SESSION['id']."' " );             
                                      $resquery3 = mysqli_fetch_array($tabquery3);
                                    if ($files[0] == "ActionPlan" ||$files[1] == "ActionPlan" ||$files[2] == "ActionPlan" ||$files[3] == "ActionPlan" ||$files[4] == "ActionPlan"  ){ 
                                        ?>
                                        <button type="button"  class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-role="remarkk-modal" id="<?php echo $resquery3['ID']; ?>"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                   <?php  }
                                   else{ ?>
                                        <button type="button"  class="btn btn-dark btn-sm blocking w-100 mt-3 demoNotify" href="#"><i class="mr-2 fas fa-comment" ></i>REMARKS</button> 
                                    <?php  }
                                   ?>
                                  </div>
                  

                                  <div class="item image-upload" >
                                      <label for="file-input5" >
                                    <div class="img card text-center btn btn-light orgbox" >
                                      <input class="file-input5"  id="file-input5" type="file" name="AFS" onchange="ssvalue5()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input5" value="" style='border-style: none;background: transparent;' disabled >
                                       <script>
                                        function ssvalue5() {
                                          var val = document.getElementById("file-input5").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input5").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../../images/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                    <div class="card-body">
                                        <p class="card-text txbx">AUDITED FINANCIAL STATEMENT</p>
                                      </div> 
                                      <? echo $name_array[$i] ?>  
                                    </div>
                                    <?php 
                                      $tabquery4 = mysqli_query($conn,"SELECT ID from remarks_apply where status=0 and file='AFS' and Submitted_by like '%".$_SESSION['id']."' " );             
                                      $resquery4 = mysqli_fetch_array($tabquery4);
                                    if ($files[0] == "AFS" ||$files[1] == "AFS" ||$files[2] == "AFS" ||$files[3] == "AFS" ||$files[4] == "AFS" ){ 
                                        ?>
                                        <button type="button"  class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-role="remarkk-modal" id="<?php echo $resquery4['ID']; ?>"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                   <?php  }
                                   else{ ?>
                                        <button type="button"  class="btn btn-dark btn-sm blocking w-100 mt-3 demoNotify" href="#"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                    <?php  }
                                   ?>
                                  </div>                 





 </div>
                        </div>
                      </div>
                    </div>
     
      

                            <div class="tile-footer"></div>
                          <button class="btn btn-success" name="submit" id="submit" type="submit">Submit</button>
                           <a class="btn btn-primary" href="Home-Orgs.html" style="float: right;">Cancel</a>
          
          </div>
      </div>
      </form>

      <form method="POST">
        <div class="modal fade" id="modal-notif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content"> 
                   
                    <div class="modal-body" id="notif">
              
          
                    </div>


                </div>
              </div>
            </div>
          </form>
          


           <!-- View Remarks -->
          <form method="POST" action="remarkkSubmit.php" enctype="multipart/form-data">
              <div class="modal fade" id="remarkk-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    
                    <div class="modal-body" id="remarkk">
                     
                      
                            </div> 
                            <div class="modal-footer">
                                <button type="submit" name="postbtn" class="btn btn-danger"><i class="mr-1 fas fa-paper-plane"></i> SUBMIT</button>
                           </div>                          
                      </div>   
                   </div>     
                </div>            
        </form>
            
        

    <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
    <!--<script type="text/javascript">
        $(function () {
          $('#fileupload').fileupload({
              dataType: 'json',
              done: function (e, data) {
                  $.each(data.result.files, function (index, file) {
                      $('<p/>').text(file.name).appendTo(document.body);
                  });
              }
          });
      });
      </script> -->
      
      <script type="text/javascript">
        $('.demoNotify').click(function(){
          $.notify("No remarks for this file", "error");
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
      
   <script src="../../js/jquery.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/notify.js"></script>
  <script type="text/javascript">
$('.owl-carousel').owlCarousel({
    loop:false  ,
    margin:10,
    nav:true,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
  </script>
  <script type="text/javascript">
      $(document).on('click','[data-role="modal-notif"]', function(){
        var id = $(this).attr("id");
        $.ajax({  
          url:'notif.php',  
          method:'POST',  
          data:{id:id},  
          success: function(data){
            $('#notif').html(data);
          }
      })

        jQuery.noConflict();
        $('#modal-notif').modal("show");


      });
  </script>
   <script type="text/javascript">
      $(document).on('click','[data-role="remarkk-modal"]', function(){
        var id = $(this).attr("id");
        $.ajax({  
          url:'remarkk.php',  
          method:'POST',  
          data:{id:id},  
          success: function(data){
            $('#remarkk').html(data);
          }
      })

        jQuery.noConflict();
        $('#remarkk-modal').modal("show");


      });
  </script> 
   <script type="text/javascript">
      $(document).on('click','[data-role="viewImage"]', function(){
        var id = $(this).attr("id");
        $.ajax({  
          url:'Apply-Org.php',  
          method:'POST',  
          data:{id:id},  
          success: function(data){
            $('#viewImage').html(data);
          }
      })

        jQuery.noConflict();
        $('#remarkk-modal').modal("show");


      });
  </script> 
  
 
 <!-- <script type="text/javascript">
      $(document).on('click','[data-role="remarkkbtn"]', function(){
        var id = $(this).attr("id");
        $.ajax({  
          url:'remarkkk.php',  
          method:'POST',  
          data:{id:id},  
          success: function(data){
            $('#remarkkorg').html(data);
          }
      })

        jQuery.noConflict();
        $('#remarkk-modal').modal("show");


      });
  </script>-->

  </body>
</html>

<?php
    include("include/conn.php");


        
                                    
   

    if(isset($_POST['submit'])){

      $fileName = $_POST['org_id'];
      $fileName1 = $_POST['org_name'];
      $fileName2 = $_POST['Org_pres_gov'];
      $fileName3 = $_POST['Org_adviser'];
      $fileName4 = $_POST['Org_type'];

      $query = "INSERT into org_filess(ID,Org,Org_pres_gov,Org_adviser,Type,WFP,PPMP,AccomRep,ActionPlan,AFS) values('$fileName','$fileName1','$fileName2','$fileName3','$fileName4','','','','','')";
$run = mysqli_query($conn,$query); 


      /*if(isset($_FILES['file'])){

        $name_array = $_FILES['file']['name'];
        $temp_name_array = $_FILES['file']['tmp_name'];
        $type_array = $_FILES['file']['type'];
        $size_array = $_FILES['file']['size'];
        $error_array = $_FILES['file']['error'];
        for ($i=0; $i < count($temp_name_array); $i++) { 
          if(move_uploaded_file($temp_name_array[$i], "Org_Files/".$name_array[$i])){
            
            $alert = "<script> alert('$name_array[$i] upload is complete'); </script>";
            echo $alert;
            $file = $name_array[$i];
            $location = 'Org_Files/'.$name_array[$i];
             $query = "INSERT into org_files(org_id,org_name,student_id,file,location) values('$fileName','$fileName1','$fileName2','$file','$location')";
      $run = mysqli_query($conn,$query);

            if($run){
              
             

            }
            else{
            
            }
          }
          else{
            $alert = "<script> alert('Upload incomplete for $name_array[$i]'); </script>";
            echo $alert;
          }
        }
      }
     
    } */

  if($run){
    if(isset($_FILES['WFP'])){
  $pdf_name = $_FILES['WFP']['name'];
  $pdf_size = $_FILES['WFP']['size'];
  $pdf_tmp = $_FILES['WFP']['tmp_name'];
  $path = "Org_Files/".$pdf_name;
  $movepdf = move_uploaded_file($pdf_tmp,$path);

  $query = "UPDATE org_filess set WFP='$pdf_name' where ID = '$fileName'";
$run = mysqli_query($conn,$query);
}
if(isset($_FILES['PPMP'])){
  $pdf_name1 = $_FILES['PPMP']['name'];
  $pdf_size = $_FILES['PPMP']['size'];
  $pdf_tmp = $_FILES['PPMP']['tmp_name'];
  $path = "Org_Files/".$pdf_name1;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
   $query = "UPDATE org_filess set PPMP='$pdf_name1' where ID = '$fileName'";
$run = mysqli_query($conn,$query);
}
if(isset($_FILES['AccomRep'])){
  $pdf_name2 = $_FILES['AccomRep']['name'];
  $pdf_size = $_FILES['AccomRep']['size'];
  $pdf_tmp = $_FILES['AccomRep']['tmp_name'];
  $path = "Org_Files/".$pdf_name2;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
  $query = "UPDATE org_filess set AccomRep='$pdf_name2' where ID = '$fileName'";
  $run = mysqli_query($conn,$query);
}
if(isset($_FILES['ActionPlan'])){
  $pdf_name3 = $_FILES['ActionPlan']['name'];
  $pdf_size = $_FILES['ActionPlan']['size'];
  $pdf_tmp = $_FILES['ActionPlan']['tmp_name'];
  $path = "Org_Files/".$pdf_name3;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
  $query = "UPDATE org_filess set ActionPlan='$pdf_name3' where ID = '$fileName'";
$run = mysqli_query($conn,$query);
}
if(isset($_FILES['AFS'])){
  $pdf_name4 = $_FILES['AFS']['name'];
  $pdf_size = $_FILES['AFS']['size'];
  $pdf_tmp = $_FILES['AFS']['tmp_name'];
  $path = "Org_Files/".$pdf_name4;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
   $query = "UPDATE org_filess set AFS='$pdf_name4' where ID = '$fileName'";
$run = mysqli_query($conn,$query);
}


$by= $_SESSION['id'];
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['Org_Name'];


$admin_id= $request['staff_id'];

$notif_body = "The organization ".$org_name." sent a Organization Files in Student Organization.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$admin_id', 'The organization ".$org_name." sent a Organization Files in Student Organization.',now(),'../users/Osas/RecognizedOrg.php', 'Delivered')");
echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "success",
                                                    title: "Your has been submitted",
                                                    showConfirmButton: true
                                                    
                                                  })
                                                });
                                                 </script>';
                                                    }        

 else{
                                            echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "Files not submitted successfully",
                                                    showConfirmButton: true
                                                   
                                                  })
                                               });

                                                </script>';
                                                
                                        }

}
  ?>
