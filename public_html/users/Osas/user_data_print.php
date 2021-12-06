<?php 
include('conn.php');
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
      <title>USeP Admin Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
          <link rel="stylesheet" type="text/css" href="../css/main_main.css">
          <link rel="stylesheet" type="text/css" href="../css/upstyle_main.css"> 
          <link rel="stylesheet" type="text/css" href="../css/print.css" media="print"> 
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
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
          <img class="app-sidebar__user-avatar" src="../image/logo.png" width="20%" alt="img">
          <div>
                                   <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">COORDINATOR</p><p style="text-align: center;" class="app-sidebar__user-name font-sec" > PORTAL</p>
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Home</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Student Discipine</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
              <li><a class="treeview-item" href="Complaints.html">Complaints</a></li>
              <li><a class="treeview-item" href="Response.html">Response</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="StudentOrg.html" data-toggle="treeview"><i class="app-menu__icon fa fa-sitemap"></i><span class="app-menu__label">Student Organizations</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="NewOrgApplicants.html">New Organization Applicants</a></li>
              <li><a class="treeview-item" href="RecognizedOrg.html">Funded Organizations</a></li>
              <li><a class="treeview-item" href="UnrecognizedOrg.html">Non-Funded Organizations</a></li>
            </ul>
          </li> 
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Student Labor</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
               <li><a class="treeview-item" href="Labor-Requisition.html">Requisition Form</a></li>
              <li><a class="treeview-item " href="Labor-Application.html">Student Labor Application</a></li>
              <li><a class="treeview-item active" href="Labor-Recommendation.html">Recommendation Form</a></li>
              <li><a class="treeview-item" href="DTR.html">Student Labor DTR</a></li>
              <li><a class="treeview-item" href="Salary.html">Student Labor Salary</a></li>
            </ul>
          </li>
          
          <li><a class="app-menu__item" href="ReqGoodMoral.html"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label">Request for Good Moral</span></a></li>
              <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                  <li><a class="treeview-item" href="RStudentOrg.php">Student Organization</a></li>
                  <li><a class="treeview-item" href="RStudentDiscipline.php">Student Discipline</a></li>
                  <li><a class="treeview-item active" href="RStudentlists.php">Student Labor</a></li>
                  <li><a class="treeview-item" href="RStudentRequest.php">Good Moral</a></li>        
                </ul>
              </li>

                  <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
                  <li><a class="app-menu__item" href="Announcements.html"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
                  <li><a class="app-menu__item" href="Job-Announcements.html"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Job Hirings</span></a></li>
        </ul>
      </aside>


       <!--navbar-->

    <main class="app-content">
            
        <div class="app-title">
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Admin</a>
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
                    <li><a class="dropdown-item" href="user-profiles.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                  </ul>
                </li>
          </ul>
        </div>
        <div class="red"></div>
<br>

      <!--<div class="page-error tile">-->

       <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                  <div>
                    <div>
                        <div class="float-left"><h4>Student Labor Reports</h4></div>
                    </div><br><br>
                      <div class="row">
                        <div class="col mt-1">
                          <div class="inline-block">

                            <div class="bs-component">
                            <ul class="nav nav-pills nav-stacked">
                              <li class="nav-item dropdown"><a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Report Type</a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="RStudentlists.php">Student Labor Lists</a>
                                  <a class="dropdown-item" href="RstudentDTR.php">Student Labor DTR</a>
                                  <a class="dropdown-item" href="RStudentSalary.php">Salary</a>
                                </div>
                              </li>
                            </ul>
                            </div>
                          </div>
                        </div>
                      </div> 

                      <br><br>
                  
                  <div class="row">
                      <div class="col mt-1">
                              <div class="inline-block">
                                Month of <br>
                                <select id="monthDropdown" class="bootstrap-select">
                                    <option class="select-item" value="1" selected="selected">January</option>
                                    <option class="select-item" value="2">February</option>
                                    <option class="select-item" value="3">March</option>
                                    <option class="select-item" value="3">April</option>
                                    <option class="select-item" value="3">May</option>
                                    <option class="select-item" value="3">June</option>
                                    <option class="select-item" value="3">July</option>
                                    <option class="select-item" value="3">August</option>
                                    <option class="select-item" value="3">September</option>
                                    <option class="select-item" value="3">October</option>
                                    <option class="select-item" value="3">November</option>
                                    <option class="select-item" value="3">December</option>
                                </select>
                              </div>

                              <div class="inline-block" >
                                Year Level <br>
                                <select id="yearlevelDropdown" class="bootstrap-select">   
                                    <option class="select-item" value="1" selected="selected">1st Year</option>
                                    <option class="select-item" value="2">2nd Year</option>
                                    <option class="select-item" value="2">3rd Year</option>
                                    <option class="select-item" value="2">4th Year</option>
                                    <option class="select-item" value="2">5th Year</option>
                                    <option class="select-item" value="2">6th Year</option>
                                    
                                </select>
                              </div>

                              <div class="inline-block">
                              Course  <br>
                              <select id="courseDropdown" class="bootstrap-select size-150px">
                              <option class="select-item" value="1" selected="selected">Bachelor of Science in Information Technology</option>
                              <option class="select-item" value="2">Bachelor of Science in Secondary Education</option>
                              </select>
                              </div>
                          
                              <div class="inline-block">
                              Semester <br>
                              <select id="semDropdown" class="bootstrap-select size-150px">
                              <option class="select-item" value="1" selected="selected">1st Semester</option>
                              <option class="select-item" value="2">2nd Semester</option>
                              <option class="select-item" value="2">Off Semester</option>
                              </select>
                              </div> 
                    </div> 
                                      
                   </div>
                    <div class="table-bd">
                      <div class="table-responsive"> <br>
                        
                 
                    
                        <table class="table table-hover table-bordered" id="sampleTable2">
                          <thead>
                            <tr>
                              <th>SL ID</th>
                              <th class="max">Full Name</th>
                              <th>Course & Year</th>
                              <th>Semester</th>
                              <th class="max">Assigned Office</th>
                              <th>Immediate Supervisor</th>
                            </tr>
                          </thead>
                          <tbody id="mydata">
                              <?php while ($data = $result->fetch_assoc()):?>
                                <tr>
                                  <td><?php echo $data['applicant_id']?></td>
                                  <td><?php echo $data['applicant_name']?></td>
                                  <td><?php echo $data['course_year']?></td>
                                  <td><?php echo $data['sem_year']?></td>
                                  <td><?php echo $data['unit_assigned']?></td>
                                  <td><?php echo $data['staff_requested_by']?></td>
                                </tr>
                              <?php endwhile; ?>
                          </tbody>
                        </table>
                        
                        <div class="inline-block float ml-2 mt-1">
                          <button onclick="window.print();" class="btn btn-danger btn-md verify" id="print-btn">Print</button>
                        </div>
                    </div>
                </div>
                <div>
                  
                </div>

                </div>
            </div>
          </div>
        </div>
      </div>   

           <!-- <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"># 00001</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                     <div class="modal-body c">
                        <div class="container">
                        <h6 class="font-weight-bold">OR No.: <span class="font-weight-lighter ml-2"> 20001</span></h6> 
                        <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"> Ereka Rose T. Redulla</span></h6>
                        <h6 class="font-weight-bold">Degree: <span class="font-weight-lighter ml-2"> Bachelor of Science in Information Technology (BSIT)</span></h6>
                        <h6 class="font-weight-bold">Major: <span class="font-weight-lighter ml-2"> Information Security</span></h6>
                        <h6 class="font-weight-bold">School Year: <span class="font-weight-lighter ml-2"> 2018-2019</span></h6>
                             <h6 class="font-weight-bold">Purpose: <span class="font-weight-lighter ml-2"> Request for Transfer</span></h6><br>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                      </div>
                    </div>
                  </div>
            </div>!-->
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="../js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="../js/plugins/fullcalendar.min.js"></script>
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
      <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
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
      $(document).ready(function() {
      
        $('#external-events .fc-event').each(function() {
      
          // store data so the calendar knows to render an event upon drop
          $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true // maintain when user navigates (see docs on the renderEvent method)
          });
      
          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
          });
      
        });
      
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar
          drop: function() {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }
          }
        });
      });
    </script>

    <script type="text/javascript">
      $('#print').click(function(){
        $('.table-responsive').printThis();
      })
    </script>

    <!--DISPLAYING OF STUDENT LABOR LIST!
    <script >
        $(document).ready(function(){
            $.ajax({
                type:"GET",
                url:"conn.php",
                dataType: "html",
                success: function(data){  
                    $('#mydata').html(data);
                }
            });
        });
    </script>-->
  </body>
</html>