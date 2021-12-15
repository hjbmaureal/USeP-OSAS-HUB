<?php
error_reporting(0);
	 session_start();
 include('connect.php');
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
<title>Summary Report of Clinic Services</title>
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
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"> </header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"> <img class="app-sidebar__user-avatar" src="image/logo.png" width="20%" alt="img">
    <div>
      <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">USEP CLINIC</p>
    </div>
  </div>
  <hr>
  <ul class="app-menu font-sec">
    <li><a class="app-menu__item" href="Admin-Dashboard.php"><i class="app-menu__icon fa fa-chart-bar"></i><span class="app-menu__label">Dashboard</span></a></li>
    <li><a class="app-menu__item" href="Admin-PatientList.html"><i class="app-menu__icon fas fa-user-alt"></i><span class="app-menu__label">Patient</span></a></li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Consultation</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="Admin-NewConsultation.php">New Consultation</a></li>
        <li><a class="treeview-item" href="Admin-ListOfConsultation.php">List of Consultation</a></li>
      </ul>
    </li>
    <li><a class="app-menu__item" href="Admin-NewConsultation.php"><i class="app-menu__icon fa fa-calendar-alt"></i><span class="app-menu__label">Appointment</span></a></li>
    <li><a class="app-menu__item" href="Prescription_reports.php"><i class="app-menu__icon fas fa-prescription"></i><span class="app-menu__label">Prescription</span></a></li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="Admin-Request.html">Medical Certificate</a></li>
        <li><a class="treeview-item" href="Admin-MedicalRecordCert.html">Medical Records Certification</a></li>
        <li><a class="treeview-item" href="Admin-RequestHistory.html">Request History</a></li>
      </ul>
    </li>
    <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
    <li><a class="app-menu__item" href=""><i class="app-menu__icon fas fa-bullhorn"></i><span class="app-menu__label">Announcement</span></a></li>
    <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="ConsultationReports.php">Consultation Reports</a></li>
        <li><a class="treeview-item" href="Prescription_reports.php">Prescription Reports</a></li>
        <li><a class="treeview-item" href="RequestReports.html">Request Reports</a></li>
      </ul>
    </li>
  </ul>
</aside>
<!--navbar-->
<main class="app-content">
  <div class="app-title">
    <div>
      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
    <ul class="app-nav">
      <li> <a class="appnavlevel">Hi, Jet</a> </li>
      <!-- <li class="app-search">
                   <input class="app-search__input" type="search" placeholder="Search">
                  <button class="app-search__button"><i class="fa fa-search"></i></button>
              </li>-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class=" fas fa-bell fa-lg mt-2"></i></a>
        <ul class="app-notification dropdown-menu dropdown-menu-right">
          <li class="app-notification__title">You have 4 new notifications.</li>
          <div class="app-notification__content">
            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
              <div>
                <p class="app-notification__message">Lisa sent you a mail</p>
                <p class="app-notification__meta">2 min ago</p>
              </div>
              </a></li>
            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
              <div>
                <p class="app-notification__message">Mail server not working</p>
                <p class="app-notification__meta">5 min ago</p>
              </div>
              </a></li>
            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
              <div>
                <p class="app-notification__message">Transaction complete</p>
                <p class="app-notification__meta">2 days ago</p>
              </div>
              </a></li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                <div>
                  <p class="app-notification__message">Lisa sent you a mail</p>
                  <p class="app-notification__meta">2 min ago</p>
                </div>
                </a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                <div>
                  <p class="app-notification__message">Mail server not working</p>
                  <p class="app-notification__meta">5 min ago</p>
                </div>
                </a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                <div>
                  <p class="app-notification__message">Transaction complete</p>
                  <p class="app-notification__meta">2 days ago</p>
                </div>
                </a></li>
            </div>
          </div>
          <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
          <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
          <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="red"> </div>
  <!-- Navbar-->
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
  <!--<div class="page-error tile">-->
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div>
            <div class="">
              <center>
                <h4>Summary Report of Dental Services</h4>
              </center>
              <br>
            </div>
          </div>
          <div class="col-md-12">
            <form class="row" name="filter" method="post" enctype="multipart/form-data">
              <div class="form-group col-md-2" style="margin-left:66%;">
                <input class="form-control" name="dates" id="dates" type="text" placeholder="Enter Year">
              </div>
              <div class="form-group col-md-2 align-self-end">
                <button class="btn btn-primary" type="submit" name="filter"><i class="fa fa-fw fa-lg fa-filter"></i>Filter</button>
              </div>
            </form>
          </div>
          <?php
 //bsa
	if(isset($_POST['filter'])){
    $date = $_POST['dates'];
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSA' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count1 = mysqli_num_rows($res);

 //btvte

   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BTVTE' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count2 = mysqli_num_rows($res);

 //bece
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BECE' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count3 = mysqli_num_rows($res);

 //bsned
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSNED' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count4 = mysqli_num_rows($res);

 //beed
				
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BEED' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count5 = mysqli_num_rows($res);

 //bsabe
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSABE' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count6 = mysqli_num_rows($res);

 //bsf
				
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSF' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count7 = mysqli_num_rows($res);

 //bsit
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSIT' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count8 = mysqli_num_rows($res);

 //cars-m
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count9 = mysqli_num_rows($res);

 //cars-d
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count10 = mysqli_num_rows($res);

 //ctet-m
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count11 = mysqli_num_rows($res);

 //ctet-d
				
 
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count12 = mysqli_num_rows($res);

 //faculty
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Faculty' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count13 = mysqli_num_rows($res);

 //Staff
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Staff' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count14 = mysqli_num_rows($res);

 //ext
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Ext' AND  date_format(consultation.date_filed,'%Y') = '$date' 
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count15 = mysqli_num_rows($res);

 //total1
				
 
      $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '01' AND consultation.status='Approved' AND consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_total1 = mysqli_num_rows($res);
   }
//February-->
 //bsa
if(isset($_POST['filter'])){
    $date = $_POST['dates']; 				
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count101 = mysqli_num_rows($res);

 //btvte
				
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count102 = mysqli_num_rows($res);

 //bece
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count103 = mysqli_num_rows($res);

 //bsned
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSNED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count104 = mysqli_num_rows($res);

 //beed
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count105 = mysqli_num_rows($res);

 //bsabe
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count106 = mysqli_num_rows($res);

 //bsf
				
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count107 = mysqli_num_rows($res);

 //bsit
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count108 = mysqli_num_rows($res);

 //cars-m
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count109 = mysqli_num_rows($res);

 //cars-d
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count110 = mysqli_num_rows($res);

 //ctet-m
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count111 = mysqli_num_rows($res);

 //ctet-d
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count112 = mysqli_num_rows($res);

 //faculty
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count113 = mysqli_num_rows($res);

 //Staff
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count114 = mysqli_num_rows($res);

 //ext
				
 
 $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count115 = mysqli_num_rows($res);

 //total1
				
 
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.status='Approved' AND consultation.consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count116 = mysqli_num_rows($res);
   }

//March-->
 //bsa
	if(isset($_POST['filter'])){
    $date = $_POST['dates']; 			
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count201 = mysqli_num_rows($res);

 //btvte
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count202 = mysqli_num_rows($res);

 //bece
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count203 = mysqli_num_rows($res);

 //bsned
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSNED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count204 = mysqli_num_rows($res);

 //beed
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count205 = mysqli_num_rows($res);

 //bsabe
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count206 = mysqli_num_rows($res);

 //bsf
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count207 = mysqli_num_rows($res);

 //bsit
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count208 = mysqli_num_rows($res);

 //cars-m
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count209 = mysqli_num_rows($res);

 //cars-d
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count210 = mysqli_num_rows($res);

 //ctet-m
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count211 = mysqli_num_rows($res);

 //ctet-d
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count212 = mysqli_num_rows($res);

 //faculty
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count213 = mysqli_num_rows($res);

 //Staff
				
 
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count214 = mysqli_num_rows($res);

 //ext
				
 
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count215 = mysqli_num_rows($res);

 //total1
				
 
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.status='Approved' AND consultation.consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count216 = mysqli_num_rows($res);
   }

//April-->
 //bsa
	if(isset($_POST['filter'])){
    $date = $_POST['dates']; 			
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count301 = mysqli_num_rows($res);

 //btvte
				
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count302 = mysqli_num_rows($res);

 //bece
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count303 = mysqli_num_rows($res);

 //bsned
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSNED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count304 = mysqli_num_rows($res);

 //beed
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count305 = mysqli_num_rows($res);

 //bsabe
				
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count306 = mysqli_num_rows($res);

 //bsf
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count307 = mysqli_num_rows($res);

 //bsit
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count308 = mysqli_num_rows($res);

 //cars-m
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count309 = mysqli_num_rows($res);

 //cars-d
				
 
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count310 = mysqli_num_rows($res);

 //ctet-m
				
 
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count311 = mysqli_num_rows($res);

 //ctet-d
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count312 = mysqli_num_rows($res);

 //faculty
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count313 = mysqli_num_rows($res);

 //Staff
				
 
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count314 = mysqli_num_rows($res);

 //ext
				
 
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count315 = mysqli_num_rows($res);

 //total1
				
 
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.status='Approved' AND consultation.consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count316 = mysqli_num_rows($res);
   }

//May-->
 //bsa
				
 if(isset($_POST['filter'])){
    $date = $_POST['dates']; 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count401 = mysqli_num_rows($res);

 //btvte
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count402 = mysqli_num_rows($res);

 //bece
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count403 = mysqli_num_rows($res);

 //bsned
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSNED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count404 = mysqli_num_rows($res);

 //beed
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count405 = mysqli_num_rows($res);

 //bsabe
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count406 = mysqli_num_rows($res);

 //bsf
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count407 = mysqli_num_rows($res);

 //bsit
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count408 = mysqli_num_rows($res);

 //cars-m
				
 
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count409 = mysqli_num_rows($res);

 //cars-d
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count410 = mysqli_num_rows($res);

 //ctet-m
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count411 = mysqli_num_rows($res);

 //ctet-d
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count412 = mysqli_num_rows($res);

 //faculty
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);

   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count413 = mysqli_num_rows($res);

 //Staff
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count414 = mysqli_num_rows($res);

 //ext
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count415 = mysqli_num_rows($res);

 //total1
				
 
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count416 = mysqli_num_rows($res);
}

//June-->
 //bsa
				
  if(isset($_POST['filter'])){
    $date = $_POST['dates'];
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count501 = mysqli_num_rows($res);

 //btvte
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count502 = mysqli_num_rows($res);

 //bece
				
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count503 = mysqli_num_rows($res);

 //bsned
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSNED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count504 = mysqli_num_rows($res);

 //beed
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count505 = mysqli_num_rows($res);

 //bsabe
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count506 = mysqli_num_rows($res);

 //bsf
				
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count507 = mysqli_num_rows($res);

 //bsit
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count508 = mysqli_num_rows($res);

 //cars-m
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02'  AND consultation.status='Approved'AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count509 = mysqli_num_rows($res);

 //cars-d
				
 
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count510 = mysqli_num_rows($res);

 //ctet-m
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count511 = mysqli_num_rows($res);

 //ctet-d
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count512 = mysqli_num_rows($res);

 //faculty
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count513 = mysqli_num_rows($res);

 //Staff
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count514 = mysqli_num_rows($res);

 //ext
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count515 = mysqli_num_rows($res);

 //total1
				
 
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.status='Approved' AND consultation.consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count516 = mysqli_num_rows($res);
}

//July-->
 //bsa
				
  if(isset($_POST['filter'])){
    $date = $_POST['dates'];
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count601 = mysqli_num_rows($res);

 //btvte
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count602 = mysqli_num_rows($res);

 //bece
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count603 = mysqli_num_rows($res);

 //bsned
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSNED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count604 = mysqli_num_rows($res);

 //beed
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count605 = mysqli_num_rows($res);

 //bsabe
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count606 = mysqli_num_rows($res);

 //bsf
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count607 = mysqli_num_rows($res);

 //bsit
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count608 = mysqli_num_rows($res);

 //cars-m
				
 
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count609 = mysqli_num_rows($res);

 //cars-d
				
 
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count610 = mysqli_num_rows($res);

 //ctet-m
				
 
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count611 = mysqli_num_rows($res);

 //ctet-d
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count612 = mysqli_num_rows($res);

 //faculty
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count613 = mysqli_num_rows($res);

 //Staff
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count614 = mysqli_num_rows($res);

 //ext
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count615 = mysqli_num_rows($res);

 //total1
				
 
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.status='Approved' AND consultation.consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count616 = mysqli_num_rows($res);
}


//August-->
 //bsa
				
  if(isset($_POST['filter'])){
    $date = $_POST['dates'];
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count701 = mysqli_num_rows($res);

 //btvte
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count702 = mysqli_num_rows($res);

 //bece
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count703 = mysqli_num_rows($res);

 //bsned
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count704 = mysqli_num_rows($res);

 //beed
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count705 = mysqli_num_rows($res);

 //bsabe
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count706 = mysqli_num_rows($res);

 //bsf
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count707 = mysqli_num_rows($res);

 //bsit
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count708 = mysqli_num_rows($res);

 //cars-m
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count709 = mysqli_num_rows($res);

 //cars-d
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count710 = mysqli_num_rows($res);

 //ctet-m
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count711 = mysqli_num_rows($res);

 //ctet-d
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count712 = mysqli_num_rows($res);

 //faculty
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count713 = mysqli_num_rows($res);

 //Staff
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count714 = mysqli_num_rows($res);

 //ext
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count715 = mysqli_num_rows($res);

 //total1
				
 
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.status='Approved' AND consultation.consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count716 = mysqli_num_rows($res);
}

//September-->
 //bsa
 if(isset($_POST['filter'])){
    $date = $_POST['dates'];				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count801 = mysqli_num_rows($res);

 //btvte
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count802 = mysqli_num_rows($res);

 //bece
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count803 = mysqli_num_rows($res);

 //bsned
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSNED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count804 = mysqli_num_rows($res);

 //beed
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count805 = mysqli_num_rows($res);

 //bsabe
				
 

   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count806 = mysqli_num_rows($res);

 //bsf
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count807 = mysqli_num_rows($res);

 //bsit
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count808 = mysqli_num_rows($res);

 //cars-m
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count809 = mysqli_num_rows($res);

 //cars-d
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count810 = mysqli_num_rows($res);

 //ctet-m
				
 
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count811 = mysqli_num_rows($res);

 //ctet-d
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count812 = mysqli_num_rows($res);

 //faculty
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND consultation.status='Approved' AND consultation.status='Approved'  AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count813 = mysqli_num_rows($res);

 //Staff
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND consultation.status='Approved' AND consultation.status='Approved'  AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count814 = mysqli_num_rows($res);

 //ext
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND consultation.status='Approved' AND consultation.status='Approved'  AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count815 = mysqli_num_rows($res);

 //total1
				
 
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.status='Approved' AND consultation.consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count816 = mysqli_num_rows($res);
}
//October-->
 //bsa
 if(isset($_POST['filter'])){
    $date = $_POST['dates'];				
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count901 = mysqli_num_rows($res);

 //btvte
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count902 = mysqli_num_rows($res);

 //bece
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count903 = mysqli_num_rows($res);

 //bsned
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSNED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count904 = mysqli_num_rows($res);

 //beed
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count905 = mysqli_num_rows($res);

 //bsabe
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count906 = mysqli_num_rows($res);

 //bsf
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count907 = mysqli_num_rows($res);

 //bsit
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count908 = mysqli_num_rows($res);

 //cars-m
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count909 = mysqli_num_rows($res);

 //cars-d
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count910 = mysqli_num_rows($res);

 //ctet-m

				
 
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count911 = mysqli_num_rows($res);

 //ctet-d
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count912 = mysqli_num_rows($res);

 //faculty
				
 
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND consultation.status='Approved' AND consultation.status='Approved'  AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count913 = mysqli_num_rows($res);

 //Staff
				
 
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND consultation.status='Approved' AND consultation.status='Approved'  AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count914 = mysqli_num_rows($res);

 //ext
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND consultation.status='Approved' AND consultation.status='Approved' AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count915 = mysqli_num_rows($res);

 //total1
				
 
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.status='Approved' AND consultation.consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count916 = mysqli_num_rows($res);


//November-->
 //bsa
	 if(isset($_POST['filter'])){
    $date = $_POST['dates'];			
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001 = mysqli_num_rows($res);

 //btvte
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count002 = mysqli_num_rows($res);

 //bece
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count003 = mysqli_num_rows($res);

 //bsned
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSNED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count004 = mysqli_num_rows($res);

 //beed
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count005 = mysqli_num_rows($res);

 //bsabe
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count006 = mysqli_num_rows($res);

 //bsf
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count007 = mysqli_num_rows($res);

 //bsit
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count008 = mysqli_num_rows($res);

 //cars-m
				
 
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count009 = mysqli_num_rows($res);

 //cars-d
				
 
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count010 = mysqli_num_rows($res);

 //ctet-m
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count011 = mysqli_num_rows($res);

 //ctet-d
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count012 = mysqli_num_rows($res);

 //faculty
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND consultation.status='Approved' AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count013 = mysqli_num_rows($res);

 //Staff
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count014 = mysqli_num_rows($res);

 //ext
				
 
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count015 = mysqli_num_rows($res);

 //total1
				
 
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.status='Approved' AND consultation.consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count016 = mysqli_num_rows($res);
}

//December-->
 //bsa
	 if(isset($_POST['filter'])){
    $date = $_POST['dates']; 			
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0201 = mysqli_num_rows($res);

 //btvte
				
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0202 = mysqli_num_rows($res);

 //bece
				
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0203 = mysqli_num_rows($res);

 //bsned
				
 
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSNED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0204 = mysqli_num_rows($res);

 //beed
				
 
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0205 = mysqli_num_rows($res);


 //bsabe
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0206 = mysqli_num_rows($res);

 //bsf
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0207 = mysqli_num_rows($res);

 //bsit
				
 
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0208 = mysqli_num_rows($res);

 //cars-m
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0209 = mysqli_num_rows($res);

 //cars-d
				
 
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0210 = mysqli_num_rows($res);

 //ctet-m
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0211 = mysqli_num_rows($res);

 //ctet-d
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0212 = mysqli_num_rows($res);

 //faculty
				
 
     $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0213 = mysqli_num_rows($res);

 //Staff
				
 
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0214 = mysqli_num_rows($res);

 //ext
				
 
      $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0215 = mysqli_num_rows($res);

 //total1
				
 
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.status='Approved' AND consultation.consultation_type='02' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0216 = mysqli_num_rows($res);
}

 //total1-1
				
  if(isset($_POST['filter'])){
    $date = $_POST['dates'];
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BSA' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total001 = mysqli_num_rows($res);
   
   

 //total1-2
				
 
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02' AND consultation.status='Approved'  AND coursetitle='BTVTE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total002 = mysqli_num_rows($res);
   
   

 //total1-3
				
 
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BECE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total003 = mysqli_num_rows($res);
   
   

 //total1-4
				
 
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSNED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total004 = mysqli_num_rows($res);
   
   

 //total1-5
				
 
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BEED' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total005 = mysqli_num_rows($res);
   
   

 //total1-6
				
 
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSABE' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total006 = mysqli_num_rows($res);
   
   

 //total1-7
				
 
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSF' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total007 = mysqli_num_rows($res);
   
   

 //total1-8
				
 
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02' AND consultation.status='Approved' AND coursetitle='BSIT' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total008 = mysqli_num_rows($res);
   
   

 //total1-9
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total009 = mysqli_num_rows($res);
   
   

 //total1-10
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total010 = mysqli_num_rows($res);
   
   

 //total1-11
				
 
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total011 = mysqli_num_rows($res);
   
   

 //total1-12
				
 
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total012 = mysqli_num_rows($res);
   
   


 //faculty
				
 
      $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Faculty' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total013 = mysqli_num_rows($res);

 //staff
				
 
     $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Staff' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total014 = mysqli_num_rows($res);


 //ext
				
 
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE consultation.consultation_type='02' AND consultation.status='Approved'  AND usertype='Ext' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total015 = mysqli_num_rows($res);


 //total
   $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE consultation_type='02' AND consultation.status='Approved' AND date_format(consultation.date_filed,'%Y') = '$date'
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total016 = mysqli_num_rows($res);

}
}
?>
          <div class="table-bd">
            <div class="table-responsive">
              <div id="table_clone" style="display: compact; border-color:#000000;">
                <div class="head101" style="line-height: normal;"> <br>
                  <p><img src="image/logo.png" width="100"> </p>
                  <center>
                    <p style="margin-top:-12%; font-family:Calibri;">Republic of the Philippines</p>
                    <p style="font-family: Old English Text MT;"> University of Southeastern Philippines</p>
                    <p style="font-family:Calibri;"> Tagum - Mabini Campus</p>
                    <p style="font-family:Calibri;"> Apokon, Tagum City</p>
                    <br>
                    <p style="font-family:Calibri; margin-top:2%;">DENTAL SERVICES: <?php echo date("Y");?></p>
                  </center>
                </div>
                <table  class="head">
                  <thead>
                    <tr>
                      <th><img src="image/logo.png" width="100"></th>
                      <th width="100"></th>
                      <th><center>
                          <p>Republic of the Philippines</p>
                          <p> UNIVERSITY OF SOUTHEASTERN PHILIPPINES</p>
                          <p> Tagum-Mabini Campus</p>
                          <p> Apokon Tagum City</p>
                        </center></th>
                      <th width="100"></th>
                      <th width="100"></th>
                      </th>
                    </tr>
                  </thead>
                </table>
                </table>
                <table class="heads">
                  <tr>
                    <th width="100"></th>
                    <th width="100"></th>
                    <th><h4>
                        <center>
                        </center>
                      </h4></th>
                  </tr>
                </table>
                <table class="table table-hover table-bordered reports-list" id="myTable">
                  <tr>
                    <th>MONTH</th>
                    <th>BSA</th>
                    <th>BTVTE</th>
                    <th>BECE</th>
                    <th>BSNED</th>
                    <th>BEED</th>
                    <th>BSABE</th>
                    <th>BSF</th>
                    <th>BSIT</th>
                    <th>CARS-M</th>
                    <th>CARS-D</th>
                    <th>CTET-M</th>
                    <th>CTET-D</th>
                    <th>Faculty</th>
                    <th>Staff</th>
                    <th>Ext</th>
                    <th bgcolor="#5b9bd5">Total</th>
                  </tr>
                  <tbody>
                    <tr>
                      <td>JANUARY</td>
                      <td><center>
                        <?php echo htmlentities($bp_count1);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count2);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count3);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count4);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count5);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count6);?>
                        <center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count7);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count8);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count9);?>
                        </center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count10);?>
                        <center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count11);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count12);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count13);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count14);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count15);?>
                        </center></td>
                      <td bgcolor="#5b9bd5"><center>
                          <?php echo htmlentities($bp_total1);?>
                        </center></td>
                    </tr>
                    <tr>
                      <td>FEBRUARY</td>
                      <td><center>
                        <?php echo htmlentities($bp_count101);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count102);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count103);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count104);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count105);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count106);?>
                        <center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count107);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count108);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count109);?>
                        </center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count110);?>
                        <center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count111);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count112);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count113);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count114);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count115);?>
                        </center></td>
                      <td bgcolor="#5b9bd5"><center>
                          <?php echo htmlentities($bp_count116);?>
                        </center></td>
                    </tr>
                    <tr>
                      <td>MARCH</td>
                      <td><center>
                        <?php echo htmlentities($bp_count201);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count202);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count203);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count204);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count205);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count206);?>
                        <center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count207);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count208);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count209);?>
                        </center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count210);?>
                        <center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count211);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count212);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count213);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count214);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count215);?>
                        </center></td>
                      <td bgcolor="#5b9bd5"><center>
                          <?php echo htmlentities($bp_count216);?>
                        </center></td>
                    </tr>
                    <tr>
                      <td>APRIL</td>
                      <td><center>
                        <?php echo htmlentities($bp_count301);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count302);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count303);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count304);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count305);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count306);?>
                        <center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count307);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count308);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count309);?>
                        </center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count310);?>
                        <center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count311);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count312);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count313);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count314);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count315);?>
                        </center></td>
                      <td bgcolor="#5b9bd5"><center>
                          <?php echo htmlentities($bp_count316);?>
                        </center></td>
                    </tr>
                    <tr>
                      <td>MAY</td>
                      <td><center>
                        <?php echo htmlentities($bp_count401);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count402);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count403);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count404);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count405);?>
                        <center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count406);?>
                        <center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count407);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count408);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count409);?>
                        </center></td>
                      <td><center>
                        <?php echo htmlentities($bp_count410);?>
                        <center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count411);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count412);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count413);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count414);?>
                        </center></td>
                      <td><center>
                          <?php echo htmlentities($bp_count415);?>
                        </center></td>
                      <td bgcolor="#5b9bd5"><center>
                          <?php echo htmlentities($bp_count416);?>
                        </center></td>
                    </tr>
                  <td>JUNE</td>
                    <td><center>
                      <?php echo htmlentities($bp_count501);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count502);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count503);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count504);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count505);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count506);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count507);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count508);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count509);?>
                      </center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count510);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count511);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count512);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count513);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count514);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count515);?>
                      </center></td>
                    <td bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($bp_count516);?>
                      </center></td>
                  </tr>
                  <tr>
                    <td>JULY</td>
                    <td><center>
                      <?php echo htmlentities($bp_count601);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count602);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count603);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count604);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count605);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count606);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count607);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count608);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count609);?>
                      </center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count610);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count611);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count612);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count613);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count614);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count615);?>
                      </center></td>
                    <td bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($bp_count616);?>
                      </center></td>
                  </tr>
                  <tr>
                    <td>AUGUST</td>
                    <td><center>
                      <?php echo htmlentities($bp_count701);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count702);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count703);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count704);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count705);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count706);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count707);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count708);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count709);?>
                      </center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count710);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count711);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count712);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count713);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count714);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count715);?>
                      </center></td>
                    <td bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($bp_count716);?>
                      </center></td>
                  </tr>
                  <tr>
                    <td>SEPTEMBER</td>
                    <td><center>
                      <?php echo htmlentities($bp_count801);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count802);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count803);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count804);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count805);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count806);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count807);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count808);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count809);?>
                      </center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count810);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count811);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count812);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count813);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count814);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count815);?>
                      </center></td>
                    <td bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($bp_count816);?>
                      </center></td>
                  </tr>
                  <tr>
                    <td>OCTOBER</td>
                    <td><center>
                      <?php echo htmlentities($bp_count901);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count902);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count903);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count904);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count905);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count906);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count907);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count908);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count909);?>
                      </center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count910);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count911);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count912);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count913);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count914);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count915);?>
                      </center></td>
                    <td bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($bp_count916);?>
                      </center></td>
                  </tr>
                  <tr>
                    <td>NOVEMBER</td>
                    <td><center>
                      <?php echo htmlentities($bp_count001);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count002);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count003);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count004);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count005);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count006);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count007);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count008);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count009);?>
                      </center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count010);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count011);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count012);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count013);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count014);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count015);?>
                      </center></td>
                    <td bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($bp_count016);?>
                      </center></td>
                  </tr>
                  <tr>
                    <td>DECEMBER</td>
                    <td><center>
                      <?php echo htmlentities($bp_count0201);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count0202);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count0203);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count0204);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count0205);?>
                      <center></td>
                    <td><center>
                      <?php echo htmlentities($bp_count0206);?>
                      <center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count0207);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count0208);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count0209);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count0210);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count0211);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count0212);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count0213);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count0214);?>
                      </center></td>
                    <td><center>
                        <?php echo htmlentities($bp_count0215);?>
                      </center></td>
                    <td bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($bp_count0216);?>
                      </center></td>
                  </tr>
                  <tr>
                    <td bgcolor="#5b9bd5" ><b>TOTAL</b></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total001);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total002);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total003);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total004);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total005);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5" ><center>
                        <?php echo htmlentities($total006);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total007);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total008);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total009);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total010);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total011);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total012);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total013);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total014);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total015);?>
                      </center></td>
                    <td  bgcolor="#5b9bd5"><center>
                        <?php echo htmlentities($total016);?>
                      </center></td>
                  </tr>
                  </tbody>
                  
                </table>
                <div class="footer1">
                  <table >
                    <tr>
                      <td><b> Prepared By: </b></td>
                      <td width="100"></td>
                      <td width="100"></td>
                      <td width="100"></td>
                      <td width="100"></td>
                      <td><b> Noted By:</b></td>
                    </tr>
                  </table>
                  <table align="left" style="margin-top:3%;">
                    <td align="left" style="margin-top:10%;"><b>
                        <?php $id=$_SESSION['id']; $sql="Select * from staffdetails where staff_id='$id'";
    $res = $db->query($sql);
     if($row=mysqli_fetch_array($res)) {
	 
	  echo htmlentities($row['title']); echo htmlentities($row['fullname']);?>
                        <?php	   echo htmlentities($row['extension']); }?>
                        </b></td>
                      <td width="100"></td>
                      <td width="100"></td>
                      <td style="margin-top:10%;"><b>
                        <?php $sql="Select * from staffdetails where office_name='Clinic' AND position='Nurse'";
    $res = $db->query($sql);
     if($row=mysqli_fetch_array($res)) {
	 
	  echo htmlentities($row['title']); echo htmlentities($row['fullname']);?>
                        <?php  echo htmlentities($row['extension']);?>
                        </b></td>
                    <tr>
                      <td align="left" style="margin-top:10%;"><?php  echo htmlentities($row['position']);?>
                      </td>
                      <td width="100"></td>
                      <td width="100"></td>
                      <td width="100"></td>
                      <td width="100"></td>
                      <td align="left" style="margin-top:10%;"><?php  echo htmlentities($row['position']); }?>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="col-sm">
                <div class="inline-block float ml-2 mt-1">
                  <button class="btn btn-danger btn-sm verify"  onclick="exportTableToCSV('dental_services_summary<?php echo date("Y");?>.csv')" style="width: 100%;"><i class="fas fa-download" data-toggle="modal" data-target="#RequestModal"></i> Export </button>
                </div>
                <div class="inline-block float ml-2 mt-1">
                  <button class="btn btn-warning btn-sm verify" style="width: 100%;" id="print_att"><i class="fas fa-print"></i> Print </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  <!--</div>-->
</main>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
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
<script>
		$('#print_att').click(function(){
		var _c = $('#table_clone').html();
		var ns = $('noscript').clone();
		var nw = window.open('','_blank','width=900,height=600')
		nw.document.write(_c)
		nw.document.write(ns.html())
		nw.document.close()
		nw.print()
		setTimeout(() => {
			nw.close()
		}, 500);
		
	})
</script>
<style>
th {
text-align:center;
}
</style>
<style>

@media screen{

.head{
display:none;}
.heads{
display:none;}
.head101{
display:none;}		
.tit{
display:none;}
h2{
display:none;}
.footer1{
display:none;}
tfoot{
display:none;}
}
@media print{
.head{
display:none;}
.footer1{
display:none;}
#addentry{
display:none;}
#hh2{
display:none;}	
.head{
margin-top:-100%;
display:table-header-group;
margin-bottom:5px;}
#modal{
display:none;
}

}
 
}

@page{
margin-top:-1cm; 
margin-left:1cm;
margin-right:1cm;
margin-bottom:1.5cm;
}
}
</style>
<noscript>
<div class="left"> <br>
  <br>
  <br>
  <b> &emsp;Prepared By: </b> <br>
  <p> &emsp;
    <?php $id=$_SESSION['id']; $sql="Select * from staffdetails where staff_id='$id'";
    $res = $db->query($sql);
     if($row=mysqli_fetch_array($res)) {
	 
	  echo htmlentities($row['title']); echo htmlentities($row['fullname']);?>
    &nbsp;
    <?php	   echo htmlentities($row['extension']); ?>
    &nbsp;</p>
  </p>
  <p>&emsp; &emsp; &emsp; &emsp;
    <?php  echo htmlentities($row['position']); }
	 ?>
  </p>
</div>
<div class="right" style=" margin-left:75%; margin-top:-9%;"> <b> &emsp;Noted By: </b>
  <p>
    <?php $sql="Select * from staffdetails where office_name='Clinic' AND position='Nurse'";
    $res = $db->query($sql);
     if($row=mysqli_fetch_array($res)) {
	 
	  echo htmlentities($row['title']); echo htmlentities($row['fullname']);?>
    &nbsp;
    <?php  echo htmlentities($row['extension']);
	 ?>
  </p>
  <p>&emsp;&emsp;&emsp;&emsp;
    <?php  echo htmlentities($row['position']); }?>
  </p>
</div>
<style>
#addentry1{
display:none;}
.footer1{
display:none;
}
.hh2{
display:none;}
.head{
display:none;}
	  .heads{
	  margin-top:5%;
	  margin-left:6%;
	  font-size:20px;
	  font-weight:bold; 
	  }
	table.reports-list{
			width:100%;
			border-collapse:collapse;
			margin-top:-3%;
		}
		table.reports-list td,table.reports-list th{
			border:1px solid;
		
		}
		table.reports-list th{
		padding:0%;
		}
		.text-center{
			text-align:center
		}
		td{
		text-align:center;
		}
		h3{
		display:none;
		}	
	.dataTables_info{
		display:none;
		}
		.dataTables_filter{
		display:none;
		}
		.dataTables_paginate{
		display:none;
		}
		.dataTables_length{
		display:none;
		}
		</style>
</noscript>
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('myTable'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Dental Services <?php echo date('Y-M');?>.pdf");
                }
            });
        }
    </script>
<script>
function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}
</script>
<script>
function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
</script>
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#myTable').DataTable();</script>
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
