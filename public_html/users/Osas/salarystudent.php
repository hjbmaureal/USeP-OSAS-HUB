<?php
  include '../../conn.php';
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
      <title>USeP Faculty Head Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../../css/main2.css">
          <link rel="stylesheet" type="text/css" href="../../css/upstyle2.css">
          <link rel="stylesheet" type="text/css" href="../../css/upstyle_shy.css">
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
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
          <a class="app-menu__item active" href="index.php">
            <i class="app-menu__icon fa fa-home"></i>
            <span class="app-menu__label">Home</span>
          </a>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-list-alt"></i>
            <span class="app-menu__label">Student Discipine</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Complaints.php">Complaints</a></li>
              <li><a class="treeview-item" href="Response.php">Response</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
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
              <a class="treeview-item" href="UnrecognizedOrg.php">Non-Funded Organizations</a>
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
              <li><a class="treeview-item active" href="Labor-Application.php">Application</a></li>
              <li><a class="treeview-item" href="DTR.php">Daily Time Record</a></li>
              <li><a class="treeview-item" href="Salary.php">Salary</a></li>
              
              <li><a class="treeview-item" href="Labor-Accomplishment.php">Accomplishment Reports</a></li>
            </ul>
        </li>
        <li>
          <a class="app-menu__item" href="#">
            <i class="app-menu__icon fa fa-file-text-o"></i>
            <span class="app-menu__label">Request for Good Moral</span>
          </a>
        </li>

          
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="RStudentOrg.php">Student Organization</a></li>
              <li><a class="treeview-item" href="RStudentDiscipline.html">Student Discipline</a></li>
              <li><a class="treeview-item" href="RStudentlists.html">Student Labor</a></li>
              <li><a class="treeview-item" href="RStudentRequest.html">Good Moral</a></li>
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
              <a href="#">See all notifications.</a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
            <i class="text-warning fas fa-user-circle fa-2x"></i>
          </a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li>
                <a class="dropdown-item" href="user-profilesstaff.php">
                  <i class="fa fa-user fa-lg"></i> Profile
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="../../index.php">
                  <i class="fa fa-sign-out fa-lg"></i> Logout
                </a>
              </li>
            </ul>
          </li>
      
      </ul>
    </div>
    <div class="red"></div>        <br>
                   
                    <div class="row">
                    <div class="col-sm-3">
                    <div class="form-group">
                    <label class="control-label">Month</label>
                    	<select class="form-control" id="filter-month">
                          <option class="select-item" value="January" selected="selected">January</option>
                          <option class="select-item" value="February">February</option>
                          <option class="select-item" value="March">March</option>
                          <option class="select-item" value="April">April</option>
                          <option class="select-item" value="May">May</option>
                          <option class="select-item" value="June">June</option>
                          <option class="select-item" value="July">July</option>
                          <option class="select-item" value="August">August</option>
                          <option class="select-item" value="September">September</option>
                          <option class="select-item" value="October">October</option>
                          <option class="select-item" value="November">November</option>
                          <option class="select-item" value="December">December</option>
                        </select>
                    </div>
                    </div> 

                    
                   <div class="col-sm-1">
                    <button class="btn btn-success btn-md mt-4 float-right text-white"> Filter</button>
                    </div>

                    <div class="col-sm">
                    <div class="form-group">
                    <a class="btn btn-danger btn-md mt-4 float-right text-white" href="Print-Salary.html" target="blank"><i class="fas fa-print"></i> Print</a>
                    </div>
                    </div> 
                    </div>



     <div class="row">
        <div class="col-md-12">
          <div class="tile"><h3 class="tile-title" style="text-align: center;">STUDENT LABOR SALARY</h3>
                                  <div class="row">
                                  <div class="col">
                                        <div class="form-group">
                                    <label class="control-label">Name of Student</label>
                                    <input class="form-control" type="text" disabled>
                                  </div>

                                  </div>

                                  <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">School Year</label>
                                            <input class="form-control" type="text" disabled>
                                          </div>
                                  </div>

                                </div>

                                  <div class="row">
                                  <div class="col">
                                        <div class="form-group">
                                    <label class="control-label">Course and Year</label>
                                    <input class="form-control" type="text" disabled>
                                  </div>

                                  </div>

                                  <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Semester</label>
                                            <input class="form-control" type="text" disabled>
                                          </div>
                                  </div>

                                </div>
                                  <div class="row">
                                  <div class="col">
                                        <div class="form-group">
                                    <label class="control-label">Date:</label>
                                    <input class="form-control" type="text" disabled>
                                  </div>

                                  </div>

                                  <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Status</label>
                                            <input class="form-control" type="text" disabled>
                                          </div>
                                  </div>

                                </div>

                                  <div class="row">
                                  <div class="col">
                                        <div class="form-group">
                                    <label class="control-label">Assigned Office</label>
                                    <input class="form-control" type="text" disabled>
                                  </div>

                                  </div>

                                  <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Immediate Supervisor</label>
                                            <input class="form-control" type="text" disabled>
                                          </div>
                                  </div>

                                </div>

                                 <div class="form-group">
                    <label class="control-label">Total No. of Hours</label>
                    <div class="form-group">
                  
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">#</span></div>
                        <input class="form-control" id="exampleInputAmount" type="text" placeholder="Hours" disabled="">
                      </div>
                    </div>
                  </div>

                    <div class="form-group">
                    <label class="control-label">Total Salary</label>
                    <div class="form-group">
                  
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">???</span></div>
                        <input class="form-control" id="exampleInputAmount" type="text" placeholder="Amount" disabled="">
                      </div>
                    </div>
                  </div>

                                  </form>
              </div>
            </div>

            </div>
          </div>
        </div>
      </div>
      

         <!--<div class="page-error tile">-->

        
    </main>
     <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
      <!-- <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script> -->

      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      <!-- Data table plugin-->
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
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
      
      });
    </script>
  </body>
</html>
