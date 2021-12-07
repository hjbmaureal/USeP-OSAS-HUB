   <?php
include("conn.php");
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

$sql = "SELECT * from org_filess";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sqll = "SELECT * from accre_files";
$resultt = mysqli_query($conn, $sqll);

$filess = mysqli_fetch_all($resultt, MYSQLI_ASSOC);

// Downloads files

if (isset($_GET['AccomRep'])) {
    $file_name = $_GET['AccomRep'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from org_filess where AccomRep='$file_name' and ID='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov-NonFunded/Org_Files/'. $file['AccomRep'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov-NonFunded/Org_Files/' . $file['AccomRep']));
        readfile('../M-StudentGov-NonFunded/Org_Files/' . $file['AccomRep']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['ActionPlan'])) {
    $file_name = $_GET['ActionPlan'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from org_filess where ActionPlan='$file_name' and ID='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov-NonFunded/Org_Files/'. $file['ActionPlan'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov-NonFunded/Org_Files/' . $file['ActionPlan']));
        readfile('../M-StudentGov-NonFunded/Org_Files/' . $file['ActionPlan']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['AFS'])) {
    $file_name = $_GET['AFS'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from org_filess where AFS='$file_name' and ID='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov-NonFunded/Org_Files/'. $file['AFS'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov-NonFunded/Org_Files/' . $file['AFS']));
        readfile('../M-StudentGov-NonFunded/Org_Files/' . $file['AFS']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['Lists_officers'])) {
    $file_name = $_GET['Lists_officers'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where Lists_officers='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov-NonFunded/Accre_Files/'. $file['Lists_officers'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov-NonFunded/Accre_Files/' . $file['Lists_officers']));
        readfile('../M-StudentGov-NonFunded/Accre_Files/' . $file['Lists_officers']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['Lists_members'])) {
    $file_name = $_GET['Lists_members'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where Lists_members='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov-NonFunded/Accre_Files/'. $file['Lists_members'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov-NonFunded/Accre_Files/' . $file['Lists_members']));
        readfile('../M-StudentGov-NonFunded/Accre_Files/' . $file['Lists_members']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['Aff_adviser'])) {
    $file_name = $_GET['Aff_adviser'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where Aff_adviser='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov-NonFunded/Accre_Files/'. $file['Aff_adviser'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov-NonFunded/Accre_Files/' . $file['Aff_adviser']));
        readfile('../M-StudentGov-NonFunded/Accre_Files/' . $file['Aff_adviser']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['Aff_high_officer'])) {
    $file_name = $_GET['Aff_high_officer'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where Aff_high_officer='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov-NonFunded/Accre_Files/'. $file['Aff_high_officer'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov-NonFunded/Accre_Files/' . $file['Aff_high_officer']));
        readfile('../M-StudentGov-NonFunded/Accre_Files/' . $file['Aff_high_officer']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['AFP'])) {
    $file_name = $_GET['AFP'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where AFP='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov-NonFunded/Accre_Files/'. $file['AFP'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov-NonFunded/Accre_Files/' . $file['AFP']));
        readfile('../M-StudentGov-NonFunded/Accre_Files/' . $file['AFP']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['CBL_logo'])) {
    $file_name = $_GET['CBL_logo'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where CBL_logo='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov-NonFunded/Accre_Files/'. $file['CBL_logo'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov-NonFunded/Accre_Files/' . $file['CBL_logo']));
        readfile('../M-StudentGov-NonFunded/Accre_Files/' . $file['CBL_logo']);



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
      <link rel="stylesheet" href="../../css/owl.carousel.min.css">
<link rel="stylesheet" href="../../css/owl.theme.default.min.css">
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
            <span class="app-menu__label">Student Discipline</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Complaints.php">Complaints</a></li>
              <li><a class="treeview-item" href="Response.php">Response</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item active" href="#" data-toggle="treeview">
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
              <a class="treeview-item active" href="UnrecognizedOrg.php">Non-Funded Organizations</a>
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

             
        

                        <h3 class="mb-4">Non-Funded Organizations</h3>
                        <div class="row">
                          <div class="col-xl">
                            <div class="tile"> 
                              <div class="row">
                                <div class="col">
                                 <div class="owl-carousel owl-theme">
                                  <div class="item">

                                    <?php
                                         include("conn.php");

                                         $tab = mysqli_query($conn,"SELECT * from org_filess where type=' Non-Govt. Funded'");

                                         
                                           while($res = mysqli_fetch_array($tab)) {         
                                          ?>
                                  <div class="item">
                                    <form method="POST">
                                    <div class=" card text-center btn btn-light orgbox" data-toggle="modal" data-role="orgbtn" id="<?php echo $res['ID']?>">

                                      <div class="mx-auto">
                                         <?php 
                                           $org = $res['ID'];

                                            $tabb = mysqli_query($conn,"SELECT * FROM non_govt_funded_org WHERE id ='$org'");

                                           $ress = mysqli_fetch_array($tabb);
                                        ?> 
                                        <img src="../O-StudentDefault/Org_Applications/<?php echo $ress['logo'] ?>" class="card-img-top imgbx" class="card-img-top imgbx" alt="...">
                                      </div>
                                      <div class="card-body">
                                        <p class="card-text txbx"><?php echo $res['Org'] ?></p>
                                      </div>
                                      

                                    </div>
                                    <button type="button" class="btn btn-dark btn-sm blocking w-100 mt-2" data-toggle="modal" data-role="remarkbtn" id="<?php echo $res['ID']?>"><i class="mr-2 fas fa-comment" ></i> ADD REMARKS</button>
                                    <div class="row">
                                      <div style="padding-right: 2px;" class="col-sm">
                                        <button type="submit"  name="submit1" class="btn btn-success btn-sm blocking float-right mt-2 w-50"  value="<?php echo $res['ID']?>"><i class="fas fa-thumbs-up" ></i></button>
                                      </div>
                                      <div style="padding-left: 2px;" class="col-sm">
                                        <button type="submit"  name="submit1" class="btn btn-danger btn-sm blocking float-left mt-2 w-50"  value="<?php echo $res['ID']?>"><i class="fas fa-thumbs-up" ></i></button>
                                      </div>
                                    </form>
                                  </div>
                                </div>




                                  <?php 
                                            }

                                        ?>
                                  </div>

                                  


                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>





                      <!-- MODAL VIew -->

                      <form method="post" >

                      <div class="modal fade" id="org-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            
                            <div class="modal-body" id="org-detail">
                            </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          </form>  

<form method="post">
<div class="modal fade" id="remarks-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Remarks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="remark-detail" style="margin-bottom: -30px;">
        
  </div>

                        <div class="modal-footer" style="margin-bottom: 5px; right:50%;">
                          <button type="submit" name="postbtn" class="btn btn-danger btn-sm blocking mt-2"><i class="mr-1 fas fa-paper-plane"></i> POST</button>
                      </div>
                      </div>
                    </div>
                  </div>
</form>

                  <!-- schedule -->

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
          
  <script src="../js/jquery.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
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
      $(document).on('click','[data-role="orgbtn"]', function(){
        var id = $(this).attr("id");
        $.ajax({  
          url:'nonfunded_orgbox.php',  
          method:'POST',  
          data:{id:id},  
          success: function(data){
            $('#org-detail').html(data);
          }
      })

        jQuery.noConflict();
        $('#org-modal').modal("show");


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
  <script type="text/javascript">
      $(document).on('click','[data-role="remarkbtn"]', function(){
        var id = $(this).attr("id");
        $.ajax({  
          url:'remarks2.php',  
          method:'POST',  
          data:{id:id},  
          success: function(data){
            $('#remark-detail').html(data);
          }
      })

        jQuery.noConflict();
        $('#remarks-modal').modal("show");


      });
  </script>

  </body>
</html>
  </body>
</html>    
<?php 
if(isset($_POST['submit1']))
                                        {

                                          $id = $_POST['submit1'];
                                          $tab = mysqli_query($conn,"SELECT * from org_filess where ID='$id'");
                                          $res = mysqli_fetch_array($tab);

                                          if($res){
                                            $quer = mysqli_query($conn,"SELECT * from org_applications where ID='$id'");
                                          $ress = mysqli_fetch_array($tab);
                                               
                                            $name = $res['Org'];
                                            $idd =  $res['ID'];
                                            $gov =  $res['Org_pres_gov'];
                                            $adviser =  $res['Org_adviser'];
                                            $type =  $res['Type'];
                                            $logo = $ress['Logo'];
                                           

                                           $queryadd = "UPDATE approve_funded SET org_name ='$name',id = '$idd',org_pres_gov = '$gov',org_adviser = '$adviser',type = '$type' WHERE id ='$idd'";
                                            $runadd = mysqli_query($conn, $queryadd);
                                          

                                            if($runadd){
                                               $query = "INSERT INTO non_govt_funded_org(org_name,id,org_pres_gov,org_adviser,type,logo) VALUES('$name','$idd','$gov','$adviser','$type','$logo')";
                                            $run = mysqli_query($conn, $query);
                                                    $query1 = "DELETE FROM org_filess WHERE ID ='$idd' ";
                                                 $run1 = mysqli_query($conn, $query1);
                                                 $query1 = "DELETE FROM accre_files WHERE ID ='$idd' ";
                                                 $run1 = mysqli_query($conn, $query1);
                                            echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "success",
                                                    title: "'.$name.' :Reaccreditation Approved",
                                                    showConfirmButton: true
                                                    
                                                  })
                                                });
                                                 </script>';
                                                 
                                                 $mess = "Congratulations! Your Org has been reaccredited.";
                                                 $date = date('y-m-d h:i:s');
                                                 $query2 = "INSERT INTO notif(message,Gov_Pres,datee) VALUES('$mess','$gov','$date')";
                                                 $run2 = mysqli_query($conn, $query2);
                                                 
                                                    }
                                        else{
                                            echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                     type: "success",
                                                    title: "'.$name.' :Reaccreditation Approved.",
                                                    showConfirmButton: true
                                                   
                                                  })
                                               });

                                                </script>';
                                                
                                        }
                                          }
                                          else{
                                            echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                     type: "success",
                                                    title: "'.$name.' :Reaccreditation Approved..",
                                                    showConfirmButton: true
                                                    
                                                  })
                                                });
                                                 </script>';
                                          }
                                           
                                    }
if(isset($_POST['submit2']))
                                        {

                                          $id = $_POST['submit2'];
                                          $tab = mysqli_query($conn,"SELECT * from org_filess where ID='$id'");
                                          $res = mysqli_fetch_array($tab);
                                          $gov =  $res['Org_pres_gov'];

                                          if($res){
                                            $tab1 = mysqli_query($conn,"DELETE * from org_filess where ID='$id'");
                                          $res1 = mysqli_fetch_array($tab1);
                                          $tab2 = mysqli_query($conn,"DELETE * from acree_files where ID='$id'");
                                          $res2 = mysqli_fetch_array($tab2);
                                             $mess = "Your Reaccreditation has been disapproved.";
                                                 $subj = "Reaccrediation Disapproved";
                                                 $date = date('y-m-d h:i:s');
                                                 $query2 = "INSERT INTO notif(message,subject,Gov_Pres,datee) VALUES('$mess','$subj','$gov','$date')";
                                                 $run2 = mysqli_query($conn, $query2);  
                                            
                                        }echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "Success",
                                                    title: "Disapproved",
                                                    showConfirmButton: true
                                                    
                                                  })
                                                });
                                                 </script>'; 
                                    }



if(isset($_POST['postbtn'])){
    $name = $_POST['name'];
    $file =  $_POST['file'];
    $message = $_POST['message'];
    $date = date('y-m-d h:i:s');  
   $by = $_POST['by'];


    /*$qr = "SELECT * FROM org_applications where Org_Name='$name'";
    $res = mysqli_query($conn,$qr); 
    echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "success",
                                                    title: "'.$res['Org_President_Governor'].'",
                                                    showConfirmButton: true
                                                    
                                                  })
                                                });
                                                 </script>';

    $gov = $res['Org_President_Governor'];  
    $by = $res['Submitted_by'];
   */
$query = "INSERT INTO remarks_apply(org_name,Submitted_by,file,message,date_apply) values('$name','$by','$file','$message','$date')";
    $run = mysqli_query($conn,$query); 
  if(isset($_FILES['image'])){
    $pdf_name2 = $_FILES['image']['name'];
  $pdf_size = $_FILES['image']['size'];
  $pdf_tmp = $_FILES['image']['tmp_name'];
  $path = "Remarks/".$pdf_name2;
  $movepdf = move_uploaded_file($pdf_tmp,$path);

    $queryy = "UPDATE remarks_apply set image ='$pdf_name2' where org_name ='$name' and file='$file'";
    $runn = mysqli_query($conn,$queryy); 


   if($run){ 
    
echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "success",
                                                    title: "Your remarks has been saved",
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
                                                    title: "Your remarks has been saved.",
                                                    showConfirmButton: true
                                                   
                                                  })
                                               });

                                                </script>';
                                                  //  echo $name, $file,$message, $image;
                                                   
                                                
                                        }

}
}
?>              