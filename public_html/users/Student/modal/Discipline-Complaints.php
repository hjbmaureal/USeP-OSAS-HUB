<?php 
  include('../../conn.php');
  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Student'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where user_id='$id' and message_status='Delivered'");
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
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">STUDENT HUB</p>
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
          
          <li>
              <a class="app-menu__item" href="Job-Announcements.php">
                <i class="app-menu__icon fa fa-bullhorn"></i>
                <span class="app-menu__label">Job Hirings</span>
              </a>
          </li>
          <li class="p-2 sidebar-label"><span class="app-menu__label">STUDENT'S AFFAIRS AND SERVICES</span></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Discipline Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Home-Discipline.php">Home</a></li>
              <li><a class="treeview-item active" href="Discipline-Complaints.php">Complaints</a></li>
              <li><a class="treeview-item" href="Discipline-HistoryComplaints.php">Complaint Records</a></li>
              <li><a class="treeview-item" href="Discipline-Response.php">Response</a></li>

            </ul>
          </li>

    <li><a class="app-menu__item" href="Home-Orgs.php"><i class="app-menu__icon fa fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services</span></a></li>
    
           <?php 
                  if ($_SESSION['sl_status']=='Hired'){
                    echo '
                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Labor Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                  <li><a class="treeview-item " href="#">Home</a></li>
                                  <li><a class="treeview-item" href="#">DTR</a></li>
                                  <li><a class="treeview-item" href="Labor-Accomplishments.php">Accomplishment Reports</a></li>
            
            
                                </ul>
                        </li>
            
                    ';
            
            
                  } else {
                    echo '
                          <li><a class="app-menu__item" href="Home-Labor.php"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Student Labor Services</span></a></li>
                    ';
                  }
            
            ?>




    <li><a class="app-menu__item" href="ReqGoodMoral.html"><i class="app-menu__icon fa fa-envelope-o"></i><span class="app-menu__label">Request for Good Moral</span></a></li>


<li class="p-2 sidebar-label"><span class="app-menu__label">GUIDANCE OFFICE SERVICES</span></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_StudentUI.php">Home</a></li>
              <li><a class="treeview-item" href="#">Counselling</a></li>
              <li><a class="treeview-item" href="#">Group Guidance Activity</a></li>
              <li><a class="treeview-item" href="#">Evaluation</a></li>
            </ul>
          </li>


<li class="p-2 sidebar-label"><span class="app-menu__label">SCHOLARSHIP OFFICE SERVICES</span></li>

            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Scholarship Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="#">Home</a></li>
              <li><a class="treeview-item" href="#">Scholarship Data Form</a></li>

            </ul>
          </li>



<li class="p-2 sidebar-label"><span class="app-menu__label">CLINIC OFFICE SERVICES</span></li>
           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
               <li><a class="treeview-item" href="#">Home</a></li>
              <li><a class="treeview-item" href="#">Consultation</a></li>
              <li><a class="treeview-item" href="#">Consultation History</a></li>
              <li><a class="treeview-item" href="#">Prescription</a></li>
              <li><a class="treeview-item" href="#">Request for Medical Certificate</a></li>
              <li><a class="treeview-item" href="#">Request for Medical Records Certificate</a></li>

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

              <?php 
              $name_sql = mysqli_query($conn,"SELECT first_name from studentdetails where student_id = '$id'");
              $result2 = mysqli_fetch_array($name_sql);
              ?>
                <a class="appnavlevel">Hi, <?php echo $_SESSION['fullname'] ?></a>

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
            </ul>
          </li>
              
                 <li class="dropdown">
                  <a class="app-nav__item" style="width: 48px;" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><img class="rounded-circle" src="data:image/png;base64,<?php echo $_SESSION['photo'] ?>" style="max-width:100%;">
              </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="user-profiles.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
               <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
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
          <a class="btn btn-primary" href="../../index.php" id="logoutbtn2">Logout</a>
        </div>
      </div>
    </div>
  </div>
<?php date_default_timezone_set('UTC');

  $query=mysqli_query($conn,"call spGetAllStudentDetails('$id')");
  $count = mysqli_num_rows($query);
    $date = date('Y-m-d');
  $row=mysqli_fetch_array($query);

    ?>
    <form method="POST" action="../../php/complaint.php">  
        <div class="row">
        <div class="col-md">
          <div style="background-color: #C12C32; padding: 8px 10px;"> </div>
          <div class="tile">
            <h3 class="tile-title">Student Complaint Form</h3>
                        <div class="tile-footer"></div>
            <div class="tile-body" > 

                <h5 class="font-weight-bold">Personal Information</h5> 
                
                <div class="row">
                <div class="col-sm">               
                <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"><?php echo $row['fullname']; ?></span></h6>
                <input class="form-control sm-8" type="text" id="student_id" name="student_id" value="<?php echo $row['student_id'];?>" hidden>
                <input class="form-control sm-8" type="text" id="date_submitted" name="date_submitted" value="<?php echo $date ?>" hidden>
                </div>
                <div class="col-sm-3">               
                <h6 class="font-weight-bold">Date: <span class="font-weight-lighter ml-2"><?php echo $date ?></span></h6>
                </div>
              </div>
                <h6 class="font-weight-bold">Designation <span class="font-weight-lighter ml-2">Student</span></h6>
                <h6 class="font-weight-bold">College: <span class="font-weight-lighter ml-2"><?php echo $row['college']; ?></span></h6>
                <h6 class="font-weight-bold">Course: <span class="font-weight-lighter ml-2"><?php echo $row['coursename']; ?></span></h6>
                <h6 class="font-weight-bold">Year Level: <span class="font-weight-lighter ml-2"><?php echo $row['year_level']; ?></span></h6>

                <br>  

                <h5 class="font-weight-bold">Complaint Information</h5>

                <div class="row">
                <div class="form-group col-sm-4">
                <p style="font-weight: bolder;">Date of Incident
                <input class="form-control sm-8" type="Date" id="date" name="date_incident" required>
                </div>
                </p>
                <div class="form-group col-sm-4">
                <p style="font-weight: bolder;">Location of Incident
                <input class="form-control" type="text" id="location" name="location"required>
                </div>
                </p>
                <div class="form-group col-sm-4">
                <p style="font-weight: bolder;">Time of Incident
                <input class="form-control" type="Time" id="time" name="time" required>
                </div>
                </p>
                </div>

                <div class="row">
                <div class="form-group col-sm-5">
                <p style="font-weight: bolder;">Name of the Person BEING Complained
                <input class="form-control sm-8" type="text" id="name" name="name" onkeyup="lettersOnly(this)" required>
                </div>
              
                <div class="form-group col-sm-4">
                <p style="font-weight: bolder;">Designation of the Person BEING Complained
                <select class="form-control" id="designation" name="designation" required> 
                       <option disabled>Choose Option</option>
                      <option value="Student">Student</option>
                      <option value="Faculty">Faculty</option>
                      <option value="Staff">Staff</option>
                    </select>
                </div>
                </p>
                </div>

                <div class="row">
                <div class="form-group col-sm">
                <p style="font-weight: bolder;">Details
                    <textarea class="form-control" id="exampleTextarea" name="details" rows="6" required></textarea>
                </div></p></div>


                 <p class="font-weight-bold">Indicate Witnesses of Incident &nbsp;<i style="color: red;">(if applicable) </i>
                </p>
                <div class="row">
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="witness1" name="witness1" placeholder="1." onkeyup="lettersOnly(this)">
                </div>
                  <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="witness2" name="witness2" placeholder="2." onkeyup="lettersOnly(this)">
                </div>
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="witness3" name="witness3" placeholder="3." onkeyup="lettersOnly(this)">
                </div>
                </div>


                <div class="row">
                <div class="form-group col-sm">
                <div class="form-check">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" required>I hereby swear that the complaint and statements hereunder are true and unbiased.
                </label>
                </div>
                </div>
                </div>
                <div class="row">
                <div class="form-group col-sm-3">
                <label class="control-label cl mt-5">Respectfully,</label><br><br>
          <img id="report-student-signature" class="e-sign" width="200" height="200" style="margin-bottom:-90px; margin-top: -110px; margin-left: -70px; position:relative;" src="data:image/jpeg;base64,<?php echo base64_encode( $row['e_signature'] ); ?>"> <br>
    <span class="font-weight-lighter "><p class="Signature" style="border: 0;border-bottom: 1px solid #000; font-size: 120%;text-transform: uppercase;"></span><br>
 <span class="font-weight-lighter "><?php echo $row['fullname'];  ?></span>
                <p style="margin-top: -8%">(Signature over printed name)
                </p>          
                </div>
              </input>
              </div>
              <div class="tile-footer"></div>
            <button class="btn btn-success" type="submit" name="submit" id="submit">Submit</button>
             <button class="btn btn-primary" a href="Discipline-Complaints.php">Cancel</button>

          </div>
        </div>
      </div>
    </form>

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
                    <script type="text/javascript" src="../../js/plugins/autocomplete.min.js"></script>
                    <script type="text/javascript" src="../../js/plugins/autocomplete.js"></script>
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

        function lettersOnly(input){
          var regex = /[^a-z,. ]/gi;
          input.value = input.value.replace(regex, "");
        }
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
      <!--  <script type="text/javascript">
                      $(document).ready(function(){
      $(document).on('click', '#submit', function(){
                      var student_id = $('#student_id').val();
                      var date_submitted = $('#date_submitted').val();
                      var date_incident = $('#date_incident').val();
                      var location = $('#location').val();
                      var time = $('#time').val();
                      var name = $('#name').val();
                      var designation = $('#designation option:selected').val();
                      var details = $('#exampleTextarea').val();
                      var witness1 = $('#witness1').val();
                      var witness2 = $('#witness2').val();
                      var witness3 = $('#witness3').val();

                        swal({
                          title: "Are You Sure?",
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
                            url: 'complaint.php',
                            method: 'POST',
                            data:{
                              complaint: 'done',
                              date_submitted: date_submitted,
                              student_id: student_id,
                              date_incident: date_incident,
                              location: location,
                              time: time,
                              name: name,
                              designation: designation,
                              details: details,
                              witness1: witness1,
                              witness2: witness2,
                              witness3: witness3
                            }
                          })
                            location.reload()
                          }
                        });
                    })
                  })
                </script>-->
     
  </body>
</html>
