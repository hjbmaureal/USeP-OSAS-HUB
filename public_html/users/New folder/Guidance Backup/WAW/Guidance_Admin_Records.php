<?php include('../../conn.php');
   include('../../php/session_admin.php');
   $admin_id=$_SESSION['id'];

     $count_sql="SELECT * from notif where user_id='$admin_id' and message_status='Delivered'";

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
      <!--  TITLE -->
    <link rel="icon" href="../../images/logo.png" type="image/gif" sizes="16x16">
      <title>Admin | USeP Virtual Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../../css/main.css">
          <link rel="stylesheet" type="text/css" href="../../css/upstyle.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Navbar-->
      <!-- Filter link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src= ></script>
  <!-- Data table plugin-->
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
  <!--generate pdf -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

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
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">GUIDANCE OFFICE</p>
          </div>
        </div>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fas fa-home"></i><span class="app-menu__label">Home</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Counselling.php" data-toggle="treeview"><i class="app-menu__icon far fa-sticky-note"></i><span class="app-menu__label">Counselling</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Counselling.php">List of Counselling Sessions</a></li>
              <li><a class="treeview-item" href="Guidance_GroupCounselling.php">Group Guidance</a></li>
              <li><a class="treeview-item" href="Guidance_NewForms.php">New Submitted Intake Forms</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Referrals.php" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Referrals</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Referrals.php">List of Referral Forms</a></li>
            </ul>
          </li>
          <li><a class="app-menu__item active" href="Guidance_Admin_Records.php"><i class="app-menu__icon fas fa-vcard"></i><span class="app-menu__label">Student Records</span></a></li>
          <li><a class="app-menu__item" href="Guidance_Appointment.php"><i class="app-menu__icon  fas fa-calendar-check-o"></i><span class="app-menu__label">Appointments</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Reports.php" data-toggle="treeview"><i class="app-menu__icon  fas fa-line-chart"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Reports.php">Counselling Reports</a></li>
              <li><a class="treeview-item" href="Guidance_GroupGuidance_Reports.php">Group Guidance Reports</a></li>
              <li><a class="treeview-item" href="Guidance_Evaluation_Reports.php">Evaluation Reports</a></li>
              <li><a class="treeview-item" href="Guidance_Referral_Reports.php">Referral Reports</a></li>
              
            </ul>
          </li>
          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Guidance_Admin_Announcements.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
        </ul>
      </aside>
       <!--navbar-->

          <main class="app-content">
            
        <div class="app-title">
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Zuzeinn L. Lopez</a>
              </li>
             <!-- <li class="app-search">
                   <input class="app-search__input" type="search" placeholder="Search">
                  <button class="app-search__button"><i class="fa fa-search"></i></button>
              </li>-->  
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $count2;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $count2;  ?> new notifications.</li>
              <div class="app-notification__content">

                <?php

                $count_sql="SELECT * from notif where user_id='$admin_id'  order by _time desc";

                $result2 = mysqli_query($conn, $count_sql);

                while ($row = mysqli_fetch_assoc($result2)) { 
                  $intval = intval(trim($row['_time']));
                  if ($row['message_status']=='Delivered') {

                    
                    echo'
                  <b><li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">'.$row['message_body'].'</p>
                      <p class="app-notification__meta">'.timeago($row['_time']).'</p>
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
                      <p class="app-notification__meta">'.timeago($row['_time']).'</p>
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
              <li class="app-notification__footer"><a href="../../php/see_all_notif_admin.php?link=Guidance_Admin_Records.php">See all notifications.</a></li>
            </ul>
          </li>
              
                 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="Guidance_AdminUser.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
      
          </ul>
        </div>
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
       
         <!--<div class="page-error tile">-->

      <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <div class="float-left"><h4>Student Records</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-auto">

                     
                    Course
                  <div class="inline-block">
                    <select class="bootstrap-select" style="width: 200px;" id="filterCourse" id="filterCourse">
                      <option class="select-item" value="all" selected="selected">All</option>
                       <?php
                                            $sql="SELECT * FROM course";
                                            $result = mysqli_query($conn, $sql);

                                           if($result = mysqli_query($conn,$sql)){               
                                                while($res = mysqli_fetch_array($result)) {         
                                                    $value= $res['course_id']; ?>
                                                    <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['name'];?></option>
                                              <?php }
                                              } ?>
                      </select>
                     Year Level 
                    <select class="bootstrap-select" id="filterYear" name="filterYear">
                        <option class="select-item" value="all" selected="selected">All</option>
                        <option class="select-item" value="1st Year">1st Year</option>
                        <option class="select-item" value="2nd Year">2nd Year</option>
                        <option class="select-item" value="3rd Year">3rd Year</option>
                        <option class="select-item" value="4th Year">4th Year</option>
                      </select>
                    </div>
                      </div>
                      
                  </div>
                </div>
              <div class="table-bd">
                <div class="table-responsive">
                  <br>
                 <div class="filterdiv">
                  <table class="table table-hover table-bordered" id="student-table">
                    <thead align="center">
                      <tr>
                      <th>ID Number</th>
                      <th class="max">Student's Name</th>
                      <th>Course</th>
                      <th>Year and Section</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                      $sql="SELECT eval_status,intake_form.Student_id as stud_id,intake_form.intake_id, intake_form.date_verify, student.*, course.name as course from intake_form join student on student.Student_id=intake_form.Student_id
                              join course on course.course_id=student.course_id
                              JOIN indv_counselling ON indv_counselling.intake_id=intake_form.intake_id WHERE intake_form.date_verify != 'NULL' GROUP BY intake_id";
                      $result = mysqli_query($conn, $sql);
                       if($result = mysqli_query($conn,$sql)){
                          while ($row2 = mysqli_fetch_assoc($result)) {

                                echo'<tr align="center">
                                  <td>'. $row2['stud_id'].'</td>
                                  <td>'. $row2['first_name'].' '. $row2['middle_name'].' '. $row2['last_name'].' '. $row2['suffix'].'</td>
                                  <td>'. $row2['course'].'</td>
                                  <td>'. $row2['year_level'].' - '. $row2['section'].'</td> 
                                  <td>';
                                  if(empty($row2['eval_status'])){?>
                                    <center><a class="btn btn-info btn-sm viewbutton" href="Guidance_Admin_StudRec.php?id=<?php echo $row2['stud_id'];?>"><i class="fas fa-eye"></i></a>&nbsp;
                                      <a class="btn btn-success btn-sm" href="../../php/setEvaluationStat.php?id=<?php echo $row2['intake_id'];?>">Enable Evaluation</a>
                                    </center>
                                  <?php }else{ ?>
                                   <center><a class="btn btn-info btn-sm viewbutton" href="Guidance_Admin_StudRec.php?id=<?php echo $row2['stud_id'];?>"><i class="fas fa-eye"></i></a>&nbsp;
                                      <a class="btn btn-warning btn-sm" href="../../php/setEvaluationStat.php?id2=<?php echo $row2['intake_id'];?>">Disable Evaluation</a>
                                    </center>
                                  <?php }?>
                                 </td></tr> <?php }
                              }

       ?>
                    </tbody>
                  </table>
                </div> 
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>  


        <!-- filter script -->
        <script type="text/javascript">

                $(document).ready(function(){
                  $("#filterCourse").on('change', function(){
                    var course = $("#filterCourse").val();
                    var year = $("#filterYear").val();
                    /* alert(value);*/
                    $.ajax({
                          url:"../../php/filter_Admin_Records.php",
                          type:"POST",
                          data:{course : course, year: year},
                          beforeSend:function(){
                            $(".filterdiv").html("Working.....");
                          },
                          success:function(data){
                            $(".filterdiv").html(data);
                          },
                    });
                
                  });

                  $("#filterYear").on('change', function(){
                    var course = $("#filterCourse").val();
                    var year = $("#filterYear").val();
                    /*alert(value);*/
                    $.ajax({
                          url:"../../php/filter_Admin_Records.php",
                          type:"POST",
                          data:{course : course, year: year},
                          beforeSend:function(){
                            $(".filterdiv").html("Working.....");
                          },
                          success:function(data){
                            $(".filterdiv").html(data);
                          },
                    });
                
                  });
                });
        </script>

        

        <!--</div>-->
      </main>
      <!-- Essential javascripts for application to work-->
      <script type="text/javascript">
        
         if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }


          $('#student-table').DataTable();


      </script>
      
      <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../s/bootstrap.min.js"></script>
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