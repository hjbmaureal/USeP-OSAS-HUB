 <?php
session_start();
include_once("connect.php");
$user_id = '11111';
   $count_sql="SELECT * from notif where message_status='Delivered' AND user_id='$user_id' ";

          $result = mysqli_query($db, $count_sql);

          $count = 0;

          while ($row = mysqli_fetch_assoc($result)) {                             

            $count++;
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
      <title>Consultation Reports</title>
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

        
          <header class="app-header">
    
   
      </header>

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

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Request.php">Medical Certificate</a></li>
              <li><a class="treeview-item" href="Admin-MedicalRecordCert.php">Medical Records Certification</a></li>
              <li><a class="treeview-item" href="Admin-RequestHistory.php">Request History</a></li>
            </ul>
          </li>

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-clipboard-list"></i><span class="app-menu__label">Inventory</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Supplies&Equipment.php">Supplies and Equipment</a></li>
              <li><a class="treeview-item" href="Admin-ItemList.php">Item List</a></li>
            </ul>
          </li>

          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Clinic_Admin_Announcements.php"><i class="app-menu__icon fas fa-bullhorn"></i><span class="app-menu__label">Announcement</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item active" href="ConsultationReports.php">Consultation Reports</a></li>
              <li><a class="treeview-item" href="Prescription_reports.php">Prescription Reports</a></li>
              <li><a class="treeview-item" href="request_Reports.php">Request Reports</a></li>
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
                <a class="appnavlevel">Hi, Jet</a>
              </li>
             <!-- <li class="app-search">
                   <input class="app-search__input" type="search" placeholder="Search">
                  <button class="app-search__button"><i class="fa fa-search"></i></button>
              </li>-->  
 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $count;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $count;  ?> new notifications.</li>
              <div class="app-notification__content">

                <?php 
                $count_sql="SELECT * from notif where message_status='Delivered'AND user_id='$user_id'  order by time desc";

                $result = mysqli_query($db, $count_sql);

                while ($row = mysqli_fetch_assoc($result)) { 
                  $intval = intval(trim($row['time']));
                  if ($row['message_status']=='Delivered' && $row['user_id']=='$user_id') {

                    
                    echo'
                  <b><li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">'.$row['message_body'].'</p>
                      <p class="app-notification__meta">'.timeago($row['time']).'</p>
                      <p class="app-notification__message"><form method="POST" action="notif_stat.php">
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
                      <p class="app-notification__message"><form method="POST" action="notif_stat.php">
                      <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                      <input type="submit" name="open_notif" value="Open Message">
                      </form></p>
                    </div></a></li>
                    ';
                  }
                  

                                    }
                ?>
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
        <div class="red"> 
          
        </div>

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
                <div class="float-left"><h4>Consultation Reports</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-auto">

                     
                    <div class="inline-block">
                    Course/Department
                    <select class="bootstrap-select" data-table="reports-list">
                        <option class="select-item" value="1" selected="selected">All</option>

                         <?php
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from course where status='Active'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['title']);?>"><?php echo htmlentities($result['title']);?></option>
                                                  <?php }
                                                  
                                                  ?>
				          	</select>


                  <div class="inline-block">
                    Semester
                    <select class="bootstrap-select" data-table="reports-list">
                        <option class="select-item" value="1" selected="selected">All</option>
                         <?php
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from semester where status='Active'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['semester_name']);?>"><?php echo htmlentities($result['semester_name']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                      </select>
                    </div>

                    School Year
                    <select class="bootstrap-select" data-table="reports-list">
                        <option class="select-item" value="1" selected="selected">All</option>
                        <?php
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from school_year where status='Active'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['schoolyear']);?>"><?php echo htmlentities($result['schoolyear']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                      </select>
                    </div>

                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    
                      <div class="col-sm">
                         
                          
                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify"  onClick="Export()" style="width: 100%;"><i class="fas fa-download" data-toggle="modal" data-target="#RequestModal"></i> Export </button></div>
                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-warning btn-sm verify" style="width: 100%;" id="print_att"><i class="fas fa-print"></i> Print </button></div>

                       </div>  

     <!--   <button class="btn btn-danger btn-sm verify" id="demoNotify" href="#" >Verify</button>-->
       
                     

            </div>
            </div>
            <div class="table-bd">
            <div class="table-responsive">
            <br>
				  									
            <div id="table_clone" style="display: compact">
              <table  class="head">
                <thead>

                  <tr>
                  <th><img src="image/logo.png" width="100"></th>
                  <th width="100"></th>
                  <th><center><p>Republic of the Philippines</p>
                  <p> UNIVERITY OF SOUTHEASTERN PHILIPPINES</p>
                  <p> Tagum-Mabini Campus</p>
                  <p> Apokon, Tagum City</p>
                  <br>
                  <p style="font-size: 20px"> Consultation Reports</p></center></th>
                  <th width="100"></th>
                  <th width="100"></th>
                  </th>
                  </tr>

      
                  <table class="table table-hover table-bordered reports-list" id="myTable">
				
					         <thead>



                      <tr>
                      <th class="max">Patient ID</th>
                      <th>Patient Name</th>
                      <th>Course/Department</th>
                      <th>Type of Consultation</th>
                      <th>Mode of Communication</th>
                      <th>Date of Consultation</th>
                      <th>Semester</th>
                      <th>School Year</th>
                    </tr>
                  </thead>
                  <tbody>				   <?php 

                      $db = mysqli_connect("localhost","root","","osasdb_latest4");
                      $stat = "Completed";

                        $sql = "SELECT consultation.id,consultation.patient_id,CONCAT(student.first_name,' ',student.last_name) as fullname,course.title,consultation.consultation_type,consultation.communication_mode, consultation.appointment_date, consultation.semester, consultation.school_year 
                          from consultation inner join student  on consultation.patient_id=student.Student_id inner join course on student.course_id=course.course_id WHERE consultation.status='$stat'  order by appointment_date";

                    $res = $db->query($sql);
                    $cnt=1;
                    while($row = $res->fetch_assoc()) {
                      ?>

 <tr>
                    <td> <?php echo htmlentities($row['patient_id']);?></td>
                    <td> <?php echo htmlentities($row['fullname']);?></td>
                    <td><?php echo htmlentities($row['title']);?></td>
                    <td><?php echo htmlentities($row['consultation_type']);?></td>
                    <td> <?php echo htmlentities($row['communication_mode']);?></td>
                    <td><?php echo htmlentities($row['appointment_date']);?></td>
                    <td><?php echo htmlentities($row['semester']);?></td>
                    <td><?php echo htmlentities($row['school_year']);?></td>
                     

                    </tr>
            <?php
  
  }?>
                   
                  </table>				  </div>
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
.head{
margin-top:-100%;
display:table-header-group;
margin-bottom:5px;}


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
    .heads{
    margin-top:5%;
    margin-left:6%;
    font-size:20px;
    font-weight:bold; 
    }
  table.reports-list{
      width:100%;
      border-collapse:collapse;
      margin-top:1%;
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
                    pdfMake.createPdf(docDefinition).download("PrescriptionReports.pdf");
                }
            });
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