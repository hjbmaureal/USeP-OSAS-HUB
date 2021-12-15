<?php
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
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="image/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">USEP CLINIC</p>
          </div>
        </div>

        <hr>

       <ul class="app-menu font-sec">
       
          <li><a class="app-menu__item" href="Admin-Dashboard.php"><i class="app-menu__icon fa fa-chart-bar"></i><span class="app-menu__label">Dashboard</span></a></li>
           <li><a class="app-menu__item" href="Admin-PatientList.php"><i class="app-menu__icon fas fa-user-alt"></i><span class="app-menu__label">Patient</span></a></li>


          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Consultation</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-NewConsultation.php">New Consultation</a></li>
              <li><a class="treeview-item" href="Admin-ListOfConsultation.php">List of Consultation</a></li>
            </ul>
          </li>

 
          <li><a class="app-menu__item" href="Admin-Appointment.php"><i class="app-menu__icon fa fa-calendar-alt"></i><span class="app-menu__label">Appointment</span></a></li>
          <li><a class="app-menu__item" href="Admin-Prescription.php"><i class="app-menu__icon fas fa-prescription"></i><span class="app-menu__label">Prescription</span></a></li>

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-file-medical"></i><span class="app-menu__label">Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Request.php">Medical Certificate</a></li>
              <li><a class="treeview-item" href="Admin-MedicalRecordCert.php">Medical Records Certification</a></li>
              <li><a class="treeview-item" href="Admin-RequestHistory.php">Request History</a></li>
            </ul>
          </li>


          <li class="p-2 sidebar-label"><span class="app-menu__label">INVENTORY</span></li>

           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-tools"></i><span class="app-menu__label">Equipment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Supplies&Equipment.php">Equipment List</a></li>
              <li><a class="treeview-item" href="Admin-Stock-Supplies&Equipment.php">Inventory</a></li>
            </ul>
          </li>

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-clipboard-list"></i><span class="app-menu__label">Item</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ItemUnit.php">Item Unit</a></li>
              <li><a class="treeview-item" href="Admin-ItemList.php">Item List</a></li>
              <li><a class="treeview-item" href="Admin-ItemInventory.php">Item Inventory</a></li>
              <li><a class="treeview-item" href="Admin-ItemStock.php">Overall Stock</a></li>
            </ul>
          </li>

          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Admin-MedicalPersonnel.php"><i class="app-menu__icon  fas fa-user-nurse"></i><span class="app-menu__label">Medical Personnel</span></a></li>
          <li><a class="app-menu__item" href="Clinic_Admin_Announcements.php"><i class="app-menu__icon fas fa-bullhorn"></i><span class="app-menu__label">Announcement</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-notes-medical"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ConsultationReports.php">Consultation Reports</a></li>
              <li><a class="treeview-item" href="Admin-RequestReports.php">Request Reports</a></li>
              <li><a class="treeview-item active" href="Admin-ServicesSummaryReports.php">Summary Reports</a></li>
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
          <div>
           <div class="">
              <center>
                <h4>Summary Report of Medical Services</h4>
              </center>
              <center>
                <h4><?php echo date('Y');?></h4>
              </center>
            </div>
          </div>    

            <!--   <button class="btn btn-danger btn-sm verify" id="demoNotify" href="#" >Verify</button>-->
          </div>
        </div>
        <div class="table-bd">
        <div class="table-responsive">
        <div id="table_clone" style="display: compact; border-color:#000000;">
        <table  class="head">
          <thead>
            <tr>
              <th><img src="image/logo.png" width="100"></th>
              <th width="100"></th>
              <th><center>
                  <p>Republic of the Philippines</p>
                  <p> UNIVERITY OF SOUTHEASTERN PHILIPPINES</p>
                  <p> Tagum-Mabini Campus</p>
                  <p> Apokon, Tagum City</p>
                </center></th>
              <th width="100"></th>
              <th width="100"></th>
              </th>
            </tr>
          </thead>
        </table>
        <table class="heads">
          <tr>
            <th width="100"></th>
            <th width="100"></th>
            <th><h4>
                <center>
                  Summary Report of Medical Services(<?php echo date('Y');?>)
                </center>
              </h4></th>
          </tr>
     <?php include('summary_counts.php');
     ?>
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
            <th bgcolor="#70ad47" style="color:#FFFFFF">Total</th>
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
              <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
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
              <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
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
              <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
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
              <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
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
              <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
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
            <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
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
            <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
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
            <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
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
            <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
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
            <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
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
            <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
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
              <center></td>
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
            <td bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($bp_count0216);?>
              </center></td>
          </tr>
          <tr>
            <td bgcolor="#70ad47" style="color:#FFFFFF"><b>TOTAL</b></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total01);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total02);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total03);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total04);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total05);?>
              </center></td>
             <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total06);?>
              </center></td>
             <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total07);?>
              </center></td>
             <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total08);?>
              </center></td>
             <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total09);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total10);?>
              </center></td>
             <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total11);?>
              </center></td>
         <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total12);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total13);?>
              </center></td>
         <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total14);?>
              </center></td>
         <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total15);?>
              </center></td>
         <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total16);?>
              </center></td>
          </tr>
          <td colspan="15"><b>OTHER SERVICES:</b></td>
            <td colspan="2" id="addentry1"><a class="text-info mr-2" data-toggle="modal" href="#addentry"><i class="fas fa-plus"> Add Entry</i></a></td>
          
          </tr>
           
          <tr>
            <td>BP Reading </td>
            <td><center>
                <?php echo htmlentities($other1);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other2);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other3);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other4);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other5);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other6);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other7);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other8);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other9);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other10);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other11);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other12);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other16);?>
              </center></td>
          </tr>
          <tr>
            <td>FBS/RBS </td>
            <td><center>
                <?php echo htmlentities($other111);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other112);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other113);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other114);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other115);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other116);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other117);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other118);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other119);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1110);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1111);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1112);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1113);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1114);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1115);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other1116);?>
              </center></td>
          </tr>
          <tr>
            <td>Referral to Physician </td>
            <td><center>
                <?php echo htmlentities($other211);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other212);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other213);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other214);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other215);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other216);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other217);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other218);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other219);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other2210);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other2211);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other2212);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other2213);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other2214);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other2215);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other2216);?>
              </center></td>
          </tr>
          <tr>
            <td>Referral to hospital </td>
            <td><center>
                <?php echo htmlentities($other311);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other312);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other313);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other314);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other315);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other316);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other317);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other318);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other319);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other3310);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other3311);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other3312);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other3313);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other3314);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other3315);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other3316);?>
              </center></td>
          </tr>
          <tr>
            <td>Referral for Laboratory </td>
            <td><center>
                <?php echo htmlentities($other411);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other412);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other413);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other414);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other415);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other416);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other417);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other418);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other419);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other4410);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other4411);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other4412);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other4413);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other4414);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other4415);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other4416);?>
              </center></td>
          </tr>
          <tr>
            <td>Referral to Dentist </td>
            <td><center>
                <?php echo htmlentities($other511);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other512);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other513);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other514);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other515);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other516);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other517);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other518);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other519);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other5510);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other5511);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other5512);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other5513);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other5514);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other5515);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other5516);?>
              </center></td>
          </tr>
          <td>Dressing </td>
            <td><center>
                <?php echo htmlentities($other611);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other612);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other613);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other614);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other615);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other616);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other617);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other618);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other619);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other6610);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other6611);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other6612);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other6613);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other6614);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other6615);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other6616);?>
              </center></td>
          </tr>
          <td>Warm/Cold Compress </td>
            <td><center>
                <?php echo htmlentities($other711);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other712);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other713);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other714);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other715);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other716);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other717);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other718);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other719);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other7710);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other7711);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other7712);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other7713);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other7714);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other7715);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other7716);?>
              </center></td>
          </tr>
          <td>Immunization</td>
            <td><center>
                <?php echo htmlentities($other811);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other812);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other813);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other814);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other815);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other816);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other817);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other818);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other819);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other8810);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other8811);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other8812);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other8813);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other8814);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other8815);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other8816);?>
              </center></td>
          </tr>
          <td>Medical Cert Issuance</td>
            <td><center>
                <?php echo htmlentities($other911);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other912);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other913);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other914);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other915);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other916);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other917);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other918);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other919);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other9910);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other9911);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other9912);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other9913);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other9914);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other9915);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other9916);?>
              </center></td>  
          </tr>
          <td>Nebulization</td>
            <td><center>
                <?php echo htmlentities($other0011);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0012);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0013);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0014);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0015);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0016);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0017);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0018);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0019);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0910);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0911);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0912);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0913);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0914);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other0915);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other0916);?>
              </center></td>
          </tr>
          <td>Suture Removal</td>
            <td><center>
                <?php echo htmlentities($other1100);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1200);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1300);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1400);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1500);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1600);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1700);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1800);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other1900);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other99100);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other99110);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other99120);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other99130);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other99140);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other99150);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other99160);?>
              </center></td>
          </tr>
          <td>Rest at Recovery Room</td>
            <td><center>
                <?php echo htmlentities($other133100);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13200);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13300);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13400);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13500);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13600);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13700);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13800);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13900);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13100);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13110);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13120);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13130);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13140);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other13150);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other13160);?>
              </center></td>
          </tr>
          <td>Pregnancy Test</td>
            <td><center>
                <?php echo htmlentities($other14100);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14200);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14300);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14400);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14500);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14600);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14700);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14800);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14900);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other141000);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14110);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14120);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14130);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14140);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other14150);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other14160);?>
              </center></td>
          </tr>
      <tr>
          <td>Removal of Foreign Body</td>
            <td><center>
                <?php echo htmlentities($other15100);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15200);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15300);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15400);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15500);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15600);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15700);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15800);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15900);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other151000);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15110);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15120);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15130);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15140);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other15150);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other15160);?>
              </center></td>
          </tr>
       <tr>
          <td>IM Injection</td>
            <td><center>
                <?php echo htmlentities($other16100);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16200);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16300);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16400);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16500);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16600);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16700);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16800);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16900);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other161000);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16110);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16120);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16130);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16140);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other16150);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other16160);?>
              </center></td>
          </tr>
      <tr>
          <td>Elastic Bandage Application</td>
            <td><center>
                <?php echo htmlentities($other17100);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17200);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17300);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17400);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17500);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17600);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17700);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17800);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17900);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other171000);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17110);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17120);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17130);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17140);?>
              </center></td>
            <td><center>
                <?php echo htmlentities($other17150);?>
              </center></td>
            <td bgcolor="#70ad47" style="color:#FFFFFF;"><center>
                <?php echo htmlentities($other17160);?>
              </center></td>
          </tr>
      <tr>
            <td bgcolor="#70ad47" style="color:#FFFFFF"><b>TOTAL</b></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22201);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22202);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22203);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22204);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22205);?>
              </center></td>
             <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22206);?>
              </center></td>
             <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22207);?>
              </center></td>
             <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22208);?>
              </center></td>
             <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22209);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22210);?>
              </center></td>
             <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22211);?>
              </center></td>
         <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22212);?>
              </center></td>
            <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22213);?>
              </center></td>
         <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22214);?>
              </center></td>
         <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22215);?>
              </center></td>
         <td  bgcolor="#70ad47" style="color:#FFFFFF"><center>
                <?php echo htmlentities($total22216);?>
              </center></td>
          </tr>
          </tbody>
          
        </table>
      </div>
      <div class="col-sm">
        <div class="inline-block float ml-2 mt-1">
          <button class="btn btn-danger btn-sm verify"  onclick="exportTableToCSV('medical_services_summary.csv')" style="width: 100%;"><i class="fas fa-download" data-toggle="modal" data-target="#RequestModal"></i> Export </button>
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
   <?php  include_once('update_summary_counts.php');
           ?>
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
  
.tit{
display:none;}
h2{
display:none;}
tfoot{
display:none;}
}
@media print{
#addentry{
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
<table style="margin-top:8%;">
  <tr>
    <td><b> &emsp;Prepared By: </b></td>
  </tr>
</table>
<table align="center" style="margin-top:3%;">
  <td align="center" style="margin-top:10%;"><p>Admin</p></td>
  <tr>
    <td align="center" style="margin-top:10%;"><i>Officer In-charge</i></td>
  </tr>
</table>
<style>
#addentry1{
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
    padding:1%;
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




        
