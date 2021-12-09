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
      <title>USeP OSAS Admin Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../../css/main3.css">
      <link rel="stylesheet" type="text/css" href="../../css/upstyle3.css">
      <link rel="stylesheet" type="text/css" href="../../css/upstyle_shy3.css">


      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">

    <script type="text/javascript" src="js/plugins/jquery.autocomplete.min.js"></script>
    <script src="http://ajax.microsoft.com/ajax/jQuery/jquery-1.4.2.min.js"></script>
    

    </head>
      <body class="app sidebar-mini rtl"  onload="initClock()">
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
            <p style="text-align: center;" class="app-sidebar__user-name font-sec" >HUB</p>
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
          <a class="app-menu__item active" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-list-alt"></i>
            <span class="app-menu__label">Student Discipline</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Complaints.php">Complaints</a></li>
              <li><a class="treeview-item active" href="Response.php">Response</a></li>
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
                 <li><a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
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
              <form action="../../logout.php"><button class="btn btn-danger" name="logout" id="logoutbtn2" type="submit">Logout</button></form>
            </div>
          </div>
        </div>
      </div>
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
        <div class="red"> 
          
        </div>



                        <div class="row">
                          <div class="col-md-12">
                            <div class="tile">
                              <div class="tile-body">
                                <div class="row">
                                  <div class="col">
                                    <div class="float-left"><h4>Response</h4></div>
                                  </div>
                                  <div class="col">
                                   <div class="inline-block float ml-2 btn-group">
                                     <!-- <button type="button" class="btn btn-danger  btn-sm button-sm150 mtop"><i class="mr-1 fas fa-download"></i> Export</button>-->
                                  
                                       
                                   </div>
                                 </div>
                               </div>
                               <div class="row">
                                <div class="col mt-1 ">
                                  <div class="inline-block">
                                    Course <br>
                                    <select class="bootstrap-select">
                                      <option class="select-item" value="1" selected="selected">All</option>
                                      <option class="select-item" value="2">BSIT</option>
                                      <option class="select-item" value="3">BEED</option>
                                    </select>
                                  </div>
                                </div>

                              </div>

                              <div class="table-bd">
                                <div class="table-responsive">
                                  <br>
                                  <table class="table table-hover table-bordered" id="sampleTable2">
                                    <thead>
                                      <tr>
                                        <th style="width: 10px;" class="text-center align-middle">#</th>
                                        <th class="max">Person Being Complained</th>
                                        <th>College</th>
                                        <th>Program/Course</th>
                                        <th>Year</th>
                                        <th>Section</th>
                                        <th style="min-width:80px" class="text-center align-middle">View</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                  $tab = mysqli_query($conn,"SELECT * FROM studentdetails JOIN  viewresponse ON viewresponse.student_id = studentdetails.student_id WHERE viewresponse.Status = 'In Process' OR viewresponse.Status = 'On Going'");

                                  $row=mysqli_num_rows($tab);
                                  while($res = mysqli_fetch_array($tab)) {

                                        $image1 = base64_encode($res['e_signature']);      
                                      ?>
                                      
                                      <td><?php echo $res['response_id']; ?></td>
                                      <td><?php echo $res['fullname']; ?></td>
                                      <td><?php echo $res['college']; ?></td>
                                      <td><?php echo $res['coursetitle']; ?></td>
                                      <td><?php echo $res['year_level']; ?></td>
                                      <td><?php echo $res['section']; ?></td>

                              
                                      <td class="text-center align-middle">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" 
                                        data-role="resbtn"
                                        data-name="<?php echo $res['fullname']; ?>" data-date="<?php echo $res['Date_Submitted']; ?>" 
                                        data-desig="<?php echo $res['fullname']; ?>" data-college="<?php echo $res['college']; ?>" data-dateinci="<?php echo $res['Date_of_incident']; ?>" 
                                        data-timeinci="<?php echo $res['Time_of_incident']; ?>" 
                                        data-locinci="<?php echo $res['Loc_of_incident']; ?>" 
                                        data-detail="<?php echo $res['response_details']; ?>"
                                        data-sig="<?php echo $image1 ?>"
                                        ><i class="fas fa-eye"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm" data-role="resbtn1" data-rid="<?php echo $res['response_id']; ?>"
                                        data-cid="<?php echo $res['Complaint_ID']; ?>" data-toggle="modal" data-target="#sched-modal"><i class="fas fa-calendar"></i></button>
                                        <button class="btn btn-success btn-sm" data-role="resbtn2" data-cid="<?php echo $res['Complaint_ID']; ?>">Done</button>

                                      </td>
                                      </tr>
                                              <?php 
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


                      <!-- MODAL VIew -->


                    <!--<div class="page-error tile">-->

                        <?php include('modal/letter_of_response_modal.php'); ?>
                        <?php include('modal/schedule_modal.php'); ?>
                       
                    <!--<div class="page-error tile">-->


                    </main>
                    <!-- Essential javascripts for application to work-->                    <!-- Essential javascripts for application to work-->
                    <script src="../../js/jquery-3.3.1.min.js"></script>
                    <script src="../../js/popper.min.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
                    <script src="../../js/main.js"></script>
                    <!-- The javascript plugin to display page loading on top-->
                    <script src="../../js/plugins/pace.min.js"></script>
                    <!-- Page specific javascripts-->
                    <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                	<script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
                	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	                <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
                  

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
                    <script type="text/javascript">
                      $('#demoNotifyf').click(function(){
                        $.notify({
                          title: "Update Complete : ",
                          message: "Enabled Successfuly!",
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
                    <script type="text/javascript">
                      function openForm() {
                        document.body.classList.add("myForm");
                      }

                      function closeForm() {
                        document.body.classList.remove("myForm");
                      }

                    </script>
                    <script type="text/javascript">
                      $(document).ready(function(){
                    $(document).on('click', '[data-role="resbtn"]', function(){
                      var name=$(this).data('name');
                      var date=$(this).data('date');
                      var desig=$(this).data('desig');
                      var college=$(this).data('college');
                      var dateinci=$(this).data('dateinci');
                      var timeinci=$(this).data('timeinci');
                      var locinci=$(this).data('locinci');
                      var detail=$(this).data('detail'); 
                      const modalview = $('#modalview');
                      var sig=$(this).data('sig');

                      modalview.modal('show');
                      $('#name1').val(name);
                      $('#date1').val(date);
                      $('#college').val(college);
                      $('#desig1').val(desig);
                      $('#date_inci').val(dateinci);
                      $('#time_inci').val(timeinci);
                      $('#loc_inci').val(locinci);
                      $('#details').val(detail);
                      $('#fname1').text(name);
                      $('#signa1').attr('src','data:image/png;base64,'+ sig);
                              
                      
                    })
                    $(document).on('click', '[data-role="resbtn1"]', function(){
                      var cid=$(this).data('cid');
                      var rid=$(this).data('rid');

                        $('#complaint').val(cid);
                        $('#response').val(rid);
                    })
                    $(document).on('click', '[data-role="resbtn2"]', function(){
                      var cid=$(this).data('cid');

                        swal({
                          title: "Are you sure that this complaint was ended?",
                          text: "If Click OK You Won't be able to Undo it?",
                          icon: "warning",
                          //showCancelButton: true,
                          // confirmButtonColor: '#DD6b55',
                          // cancelButtonText: 'No, cancel it!',
                          // confirmButtonText: 'Yes, I am sure!',
                          //closeOnClose: false,
                          buttons:true,
                          dangerMode:true
                        })
                        .then((willSend) => {
                          if(willSend){
                          swal("Done!", {
                          icon: "success",
                          })
                          $.ajax({
                            url: 'function1.php',
                            method: 'POST',
                            data:{
                              send_data: 'done',
                              complaint_id: cid

                            }
                          })
                            location.reload()
                          }
                        });
                    })
                  })
                </script>
                    <script type="text/javascript">
                      $(document).ready( function(){
                        $('#sampleTable2').DataTable({
                          "order": [],
                          "ordering": true,
                          "columnDefs": [{
                            "targets": [0, 2, 3, 4, 5, 6],
                            "orderable": false
                          }]
                        });

                      });
                    </script>


                  </body>
                  </html>
