<?php
 include('../../conn.php');
  include '../../php/notification-timeago.php'; 
  session_start();
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
        header('Content-Length: ' . filesize('../M-Admin/Remarks/' . $file['image']));
        readfile('../M-Admin/Remarks/' . $file['image']);



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
      <body class="app sidebar-mini rtl"  onload="initClock()">
      <!-- Navbar-->
  <link rel="stylesheet" href="../../css/owl.carousel.min.css">
<link rel="stylesheet" href="../../css/owl.theme.default.min.css">
  <style type="text/css">
    .img{
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
          <li><a class="app-menu__item " href="../Student/index.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
            <li>
              <a class="app-menu__item" href="../Student/Job-Announcements.php">
                <i class="app-menu__icon fa fa-bullhorn"></i>
                <span class="app-menu__label">Job Hirings</span>
                <span class="text-right"><?php echo $job_count ?></span>
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
                          <li><a class="treeview-item active" href="../M-StudentGov/Home-Orgs.php">Home</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov/Org-files.php">Organization Files</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov/Accre-files.php">Re-Accreditation Files</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov/Oath-files.php">Oath of Office</a></li>
                        </ul>
                      </li>
            
                    ';

                    }else{
                      echo '
                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                          <li><a class="treeview-item active" href="../M-StudentGov-NonFunded/Home-Orgs.php">Home</a></li>
                          <li><a class="treeview-item" href="../M-StudentGov-NonFunded/Org-files.php">Organization Files</a></li>
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

          <li><a class="app-menu__item" href="ReqGoodMoral_Student.php"><i class="app-menu__icon fa fa-envelope-o"></i><span class="app-menu__label">Request for Good Moral</span></a></li>


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
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Hi, <?php echo $_SESSION['fullname']; ?></a>
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
                  <li class="app-notification__title">You have <?php echo $count;  ?></li>
                           
                  <div class="app-notification__content">                   
                    <?php 
                      $count_sql="SELECT * from notif where user_id='$id'order by time desc";
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


                        
              <div class="row">
        <div class="col-xl">
          <!-- <div style="background-color: #C12C32; padding: 8px 10px;"> </div> -->
          <div>Attach files:</div>
          <div class="tile" >
              <div class="owl-carousel owl-theme"  >
                 <?php
                 include("conn.php");
                
              
                
                $filequery = mysqli_query($conn,"SELECT file FROM remarks_apply WHERE status= 0 and Submitted_by like '".$_SESSION['id']."'");
                $result = mysqli_fetch_array($filequery);

              ?>   

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
                                        
                                    if ($result['file'] == "WFP Letter"){
                                      echo '
                                        <button type="button"  class="btn btn-warning btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#remarkk-modal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>'; 
                                    }
                                    else{
                                       echo '
                                        <button type="button"  class="btn btn-dark btn-sm blocking w-100 mt-3" data-toggle="modal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>'; 
                                    }
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
                                        
                                    if ($result['file'] == "PPMP"){
                                      echo '
                                        <button type="button"  class="btn btn-warning btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#remarkk-modal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>'; 
                                    }
                                    else{
                                       echo '
                                        <button type="button"  class="btn btn-dark btn-sm blocking w-100 mt-3" data-toggle="modal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>'; 
                                    }
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
                                        
                                    if ($result['file'] == "Accomplishment Reports"){
                                      echo '
                                        <button type="button"  class="btn btn-warning btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#remarkk-modal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>'; 
                                    }
                                    else{
                                       echo '
                                        <button type="button"  class="btn btn-dark btn-sm blocking w-100 mt-3" data-toggle="modal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>'; 
                                    }
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
                                        
                                    if ($result['file'] == "Action Plan"){
                                      echo '
                                        <button type="button"  class="btn btn-warning btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#remarkk-modal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>'; 
                                    }
                                    else{
                                       echo '
                                        <button type="button"  class="btn btn-dark btn-sm blocking w-100 mt-3" data-toggle="modal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>'; 
                                    }
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
                                        
                                    if ($result['file'] == "Audited Financial Stateme"){
                                      echo '
                                        <button type="button"  class="btn btn-warning btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#remarkk-modal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>'; 
                                    }
                                    else{
                                       echo '
                                        <button type="button"  class="btn btn-dark btn-sm blocking w-100 mt-3" data-toggle="modal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>'; 
                                    }
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
          <form method="POST" >
              <div class="modal fade" id="remarkk-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    
                    <div class="modal-body">

                      <?php 
                        include("conn.php");

                              $id = $_SESSION['id'];
                              $tab = mysqli_query($conn,"SELECT * from remarks_apply where Submitted_by ='$id' " );             
                              $res = mysqli_fetch_array($tab);
                                ?>
                              
                              <div class="modal-header" style="margin-bottom: 10px; padding: 0px;">
                                 <h5 class="modal-title" id="exampleModalLabel"><b> <?php echo $res['org_name']; ?> </b></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="tile" style="border-radius:5px; margin-bottom: 0px;">
                                  <h5 class="modal-title" id="exampleModalLabel">Remark:&emsp;<input type="text" name="by" style="border:none; width:300px;" value=" <?php echo $res['file'];?>"></h5>
                                  <div class="container">
                              
                                      <div class="row">
                                        <div class="form-group col-md-9">
                                           <p style="font-weight: bolder;">Comment Details:

                                               <textarea class="form-control" id="exampleTextarea" rows="9" disable="" > <?php echo $res['message']; ?></textarea>
                                               </p>
                                       </div>
                                      <div class="col-md-3">
                                          <p style="font-weight: bolder; margin-bottom:0px;">Attachments:</p>             
                                          <div class="tile" style="height:200px;">
                                           
                                              <img name="image" src="../Osas/Remarks/<?php echo $res['image']; ?>" style="width:100px; border-radius: 10px; padding: 0px; margin-bottom: 0px; margin-top: 0px;"/>
                                                <label style=" color: white;"><?php echo $res['image']; ?></label>
                                            
                                  
                                                <a href="Apply-Org.php?file_id=<?php echo $res['Submitted_by'];?>&image=<?php echo $res['image'];?>"><button type="button" class="btn btn-info btn-sm mt-2" style="margin-top:50px;"><i class=" fas fa-download" style="margin-top: -40px;" ></i></button></a>
                                            
                                             <!-- <a href="Apply-Org.php?file_id=<?php echo $res['Submitted_by'];?>&image=<?php echo $res['image'];?>"><button class=" btn btn-secondary btn-sm" >
                                              <img name="image" src="../M-Admin/Remarks/<?php echo $res['image']; ?>" style="width:100px;"/></button> </a> -->
                                          </div>
                                      </div>

                                   </div>
                                    <div style="top: 0px;">
                                        <p style="font-weight: bolder;">Attach new file</p>
                                                   <input class="file-input11" id="file-input11" type="file" name="filee" onchange="ssvalue11()" style="margin-top: -100px; margin-bottom: 30px;" /> 
                                                   <input type="text" name="" id="" value=""  style="border-style: none;background: transparent;" disabled >
                                         </div>
                                       </div>
                                    </div>
                                <script>
                                    function ssvalue11() {
                                    var val = document.getElementById("file-input11").value.replace("C:\\fakepath\\", "");
                                    document.getElementById("input11").value = val;
                                    }
                               </script>
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
      
  <script src="../../js/jquery.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
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
    include("conn.php");


    if(isset($_POST['postbtn'])){

    $by = $_SESSION['id'];
   $date = date('y-m-d h:i:s');
   $filee = $_POST['filee'];
   $filesub = $_POST['by'];

   $quer = "SELECT * FROM org_filess WHERE Org_pres_gov like '$by'";
   $ress = mysqli_query($conn,$quer);
   $roww = mysqli_fetch_array($ress);

  if ($roww){  
    
        
       if($filesub=="WFP"){
        if(isset($_FILES['filee'])){
        $pdf_name = $_FILES['filee']['name'];
        $pdf_size = $_FILES['filee']['size'];
       $pdf_tmp = $_FILES['filee']['tmp_name'];
       $path = "Org_Files/".$pdf_name;
       $movepdf = move_uploaded_file($pdf_tmp,$path);

       $query = "UPDATE org_filess set WFP='$pdf_name'  where Org_pres_gov like '$by'";
      $run = mysqli_query($conn,$query);
     
      
                                        }
       }
       if($filesub=="PPMP"){
        if(isset($_FILES['filee'])){
        $pdf_name1 = $_FILES['filee']['name'];
        $pdf_size1 = $_FILES['filee']['size'];
       $pdf_tmp1 = $_FILES['filee']['tmp_name'];
       $path1 = "Org_Files/".$pdf_name1;
       $movepdf1 = move_uploaded_file($pdf_tmp1,$path1);

       $query1 = "UPDATE org_filess set PPMP='$pdf_name1'  where Org_pres_gov like '$by'";
      $run1 = mysqli_query($conn,$query1);

      

          }
       }
       if($filesub=="Accomplishment Reports"){
        if(isset($_FILES['filee'])){
        $pdf_name2 = $_FILES['filee']['name'];
        $pdf_size2 = $_FILES['filee']['size'];
       $pdf_tmp2 = $_FILES['filee']['tmp_name'];
       $path2 = "Org_Files/".$pdf_name2;
       $movepdf2 = move_uploaded_file($pdf_tmp2,$path2);

       $query2 = "UPDATE org_filess set AccomRep='$pdf_name2'  where Org_pres_gov like '$by'";
      $run2 = mysqli_query($conn,$query2);
    }

       }
       if($filesub=="Action Plan"){
        if(isset($_FILES['filee'])){
        $pdf_name3 = $_FILES['filee']['name'];
        $pdf_size3 = $_FILES['filee']['size'];
       $pdf_tmp3 = $_FILES['filee']['tmp_name'];
       $path3 = "Org_Files/".$pdf_name3;
       $movepdf3 = move_uploaded_file($pdf_tmp3,$path3);

       $query3 = "UPDATE org_filess set ActionPlan='$pdf_name3'  where Org_pres_gov like '$by'";
      $run3 = mysqli_query($conn,$query3);

        }
       }
       if($filesub=="Audited Financial Statement"){
        if(isset($_FILES['filee'])){
        $pdf_name4 = $_FILES['filee']['name'];
        $pdf_size4 = $_FILES['filee']['size'];
       $pdf_tmp4 = $_FILES['filee']['tmp_name'];
       $path4 = "Org_Files/".$pdf_name4;
       $movepdf4 = move_uploaded_file($pdf_tmp4,$path4);

       $query4 = "UPDATE org_filess set AFS='$pdf_name4'  where Org_pres_gov like '$by'";
      $run4 = mysqli_query($conn,$query4);

}
       }
       if($filesub=="List of Officers w/Contact No."){
        if(isset($_FILES['filee'])){
        $pdf_name5 = $_FILES['filee']['name'];
        $pdf_size5 = $_FILES['filee']['size'];
       $pdf_tmp5 = $_FILES['filee']['tmp_name'];
       $path5 = "Accre_Files/".$pdf_name5;
       $movepdf5 = move_uploaded_file($pdf_tmp5,$path5);

       $query5 = "UPDATE accre_files set Lists_officers='$pdf_name5'  where Org_President_Governor like '$by'";
      $run5 = mysqli_query($conn,$query5);

}
       }
       if($filesub=="List of Members"){
        if(isset($_FILES['filee'])){
        $pdf_name6 = $_FILES['filee']['name'];
        $pdf_size6 = $_FILES['filee']['size'];
       $pdf_tmp6 = $_FILES['filee']['tmp_name'];
       $path6 = "Accre_Files/".$pdf_name6;
       $movepdf6 = move_uploaded_file($pdf_tmp6,$path6);

       $query6 = "UPDATE accre_files set Lists_members='$pdf_name6'  where Org_President_Governor like '$by'";
      $run6 = mysqli_query($conn,$query6);

}
       }
       if($filesub=="Notarized Affidavit of the Adviser"){
        if(isset($_FILES['filee'])){
        $pdf_name7 = $_FILES['filee']['name'];
        $pdf_size7 = $_FILES['filee']['size'];
       $pdf_tmp7 = $_FILES['filee']['tmp_name'];
       $path7 = "Accre_Files/".$pdf_name7;
       $movepdf7 = move_uploaded_file($pdf_tmp7,$path7);

       $query7 = "UPDATE accre_files set Aff_adviser='$pdf_name7'  where Org_President_Governor like '$by'";
      $run7 = mysqli_query($conn,$query7);
}

       }
       if($filesub=="Notarized Affidavit of the President"){
        if(isset($_FILES['filee'])){
        $pdf_name8 = $_FILES['filee']['name'];
        $pdf_size8 = $_FILES['filee']['size'];
       $pdf_tmp8 = $_FILES['filee']['tmp_name'];
       $path8 = "Accre_Files/".$pdf_name8;
       $movepdf8 = move_uploaded_file($pdf_tmp8,$path8);

       $query8 = "UPDATE accre_files set Aff_high_officer='$pdf_name8'  where Org_President_Governor like '$by'";
      $run8 = mysqli_query($conn,$query8);

}
       }
       if($filesub=="Action & Financial Plan"){
        if(isset($_FILES['filee'])){
        $pdf_name9 = $_FILES['filee']['name'];
        $pdf_size9 = $_FILES['filee']['size'];
       $pdf_tmp9 = $_FILES['filee']['tmp_name'];
       $path9 = "Accre_Files/".$pdf_name9;
       $movepdf9 = move_uploaded_file($pdf_tmp9,$path9);

       $query9 = "UPDATE accre_files set AFP='$pdf_name9'  where Org_President_Governor like '$by'";
      $run9 = mysqli_query($conn,$query9);
}

       }
       if($filesub=="CBL with Official Logo"){
        if(isset($_FILES['filee'])){
        $pdf_name9 = $_FILES['filee']['name'];
        $pdf_size9 = $_FILES['filee']['size'];
       $pdf_tmp9 = $_FILES['filee']['tmp_name'];
       $path9 = "Accre_Files/".$pdf_name9;
       $movepdf9 = move_uploaded_file($pdf_tmp9,$path9);

       $query9 = "UPDATE accre_files set CBL_logo='$pdf_name9'  where Org_President_Governor like '$by'";
      $run9 = mysqli_query($conn,$query9);
}

       }
     else{
       echo '<script> 
                                                  $(document).ready(function(){
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                      
                                                    })
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE Submitted_by like '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_filess  set status = 0  where Submitted_by like '$by'";
                                                    $run0 = mysqli_query($conn,$query0);

      
    }
}
 else{
                                            echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "success",
                                                    title: "File submitted successfully.",
                                                    showConfirmButton: true
                                                   
                                                  })
                                               });

                                                </script>';
                                                $updateStat = "UPDATE remarks_apply SET status = 1 WHERE Submitted_by like '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_filess set status = 0  where Submitted_by like '$by'";
                                                    $run0 = mysqli_query($conn,$query0);
                                                
                                        }
}

    
                                    
   

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
