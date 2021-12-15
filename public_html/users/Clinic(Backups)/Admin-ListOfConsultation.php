
  <?php include('connect.php');?>
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
      <title>List Of Consultation</title>
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
           <li><a class="app-menu__item" href="Admin-PatientList.html"><i class="app-menu__icon fas fa-user-alt"></i><span class="app-menu__label">Patient</span></a></li>


          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Consultation</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-NewConsultation.php">New Consultation</a></li>
              <li><a class="treeview-item" href="Admin-ListOfConsultation.php">List of Consultation</a></li>
            </ul>
          </li>

 
          <li><a class="app-menu__item" href="Admin-NewConsultation.php"><i class="app-menu__icon fa fa-calendar-alt"></i><span class="app-menu__label">Appointment</span></a></li>
          <li><a class="app-menu__item" href="Prescription_reports.php"><i class="app-menu__icon fas fa-prescription"></i><span class="app-menu__label">Prescription</span></a></li>
          <li><a class="app-menu__item" href=""><i class="app-menu__icon  fas fa-envelope-open-text"></i><span class="app-menu__label">Request</span></a></li>
          <li><a class="app-menu__item" href=""><i class="app-menu__icon  fas fa-file-medical"></i><span class="app-menu__label">Medical Certificate</span></a></li>


         
          <li><a class="app-menu__item" href=""><i class="app-menu__icon fas fa-user-nurse"></i><span class="app-menu__label">Medical Personnel</span></a></li>
        
          

          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href=""><i class="app-menu__icon fas fa-bullhorn"></i><span class="app-menu__label">Announcement</span></a></li>
          <li><a class="app-menu__item" href=""><i class="app-menu__icon fas fa-poll"></i><span class="app-menu__label">Reports</span></a></li>
        
          
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
          <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have 4 new notifications.</li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
                <div class="app-notification__content">
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Lisa sent you a mail</p>
                        <p class="app-notification__meta">2 min ago</p>
                      </div></a></li>
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Mail server not working</p>
                        <p class="app-notification__meta">5 min ago</p>
                      </div></a></li>
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Transaction complete</p>
                        <p class="app-notification__meta">2 days ago</p>
                      </div></a></li>
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
                <div class="float-left"><h4>List of Consultation</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-auto">

                     
                 <div class="inline-block">
                    Consultation type
                    <select  name="type" id="type" class="bootstrap-select" data-table="reports-list">
                   <option value="">All</option>
                                                 <?php
                    // Feching active consultation type
                    $sql=mysqli_query($db,"select * from consultation_type where status='Active'");
                    while($result=mysqli_fetch_array($sql))
                    {    
                    ?>
                    <option class="select-item" value="<?php echo htmlentities($result['consultation_type']);?>"><?php echo htmlentities($result['consultation_type']);?></option>
                    <?php }
                    
                    ?>
                    </select> 
                    </div>
                    

                      </div>
                      <div class="col">
                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify" onClick="Export()"><i class="fas fa-download"></i> Export</button></div> 
                      </div>

                  </div>
                </div>
                </div>
                <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered reports-list" id="sampleTable2">
                    <thead>
                      <tr>
                    
                      <th>Patient ID</th>
                      <th class="max">Full Name</th>
                      <th>Email</th>
                      <th>Type of Consultation</th>
                      <th>Mode of Communication(First Option)</th>
                      <th>Mode of Communication(Second Option)</th>
                      <th>Date Received</th>
                      <th>Status</th>
                      <th class="max">Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
          $stat="Approved";
					
    			$sql = "SELECT consultation.id,CONCAT(student.first_name,' ',student.last_name) as name,student.email_add,student.sex, student.civil_status,student.year_level,student.section,consultation.patient_id,consultation.status,consultation.date_filed,consultation.problems,consultation_type.consultation_type,consultation.communication_mode_first_option,consultation.communication_mode_second_option from consultation join student on consultation.patient_id=student.Student_id join consultation_type on consultation.consultation_type=consultation_type.type_id WHERE consultation.status='$stat' order by date_filed";

    			$res = $db->query($sql);
                    $cnt=1;
                    while($row = $res->fetch_assoc()) {
                      ?>

                    <tr>
                     
                    <td><?php echo htmlentities($row['patient_id']);?></td>
                    <td><?php echo htmlentities($row['name']);?></td>
                    <td><?php echo htmlentities($row['email_add']);?></td>
                    <td><?php echo htmlentities($row['consultation_type']);?></td>
                    <td><?php echo htmlentities($row['communication_mode_first_option']);?></td>
                    <td><?php echo htmlentities($row['communication_mode_second_option']);?></td>
                    <td><?php echo htmlentities($row['date_filed']);?></td>
                    <td><?php echo htmlentities($row['status']);?></td>
                    <td>
                    <a class="text-info mr-2" data-toggle="modal" href="#exampleModalLong1<?php echo $row['id']; ?>"><i class="fas fa-eye"></i></a>
                       
                    </div>
                    <?php

                    if($row['consultation_type']=="Medical Consultation" && $row['communication_mode_first_option']=="Face to Face"){  
                      include('addprescriptionMedic.php');
              
                    }else if ($row['consultation_type']=="Medical Consultation"){
                       include('addprescriptionMedical.php');

                      }  else if ($row['consultation_type']=="Dental Consultation"){
                       include('addprescriptionDental.php');
                      }  

                     
                    ?>
                     


                      

                    </tr>
            <?php
  
  }?>
                  </table>
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
	   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
            <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('sampleTable2'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("ListOfConsultation.pdf");
                }
            });
        }
    </script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
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
