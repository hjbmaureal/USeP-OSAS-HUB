<?php
session_start();
include_once("connect.php");
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
      <title>Consultation</title>
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
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">STUDENT PORTAL</p>
          </div>
        </div>

        <hr>



        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="Defaultstudent.html"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label">Student's Affair & Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="#">Home</a></li>
              <li><a class="treeview-item" href="#">Student Discipline</a></li>
              <li><a class="treeview-item" href="#">Student Organization</a></li>
              <li><a class="treeview-item" href="#">Student Labor</a></li>
              <li><a class="treeview-item" href="#">Request for Good Moral</a></li>
            </ul>
          </li>


          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="#">Home</a></li>
              <li><a class="treeview-item" href="#">Counselling</a></li>
              <li><a class="treeview-item" href="#">Evaluation</a></li>
            </ul>
          </li>

            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Scholarship Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="#">Home</a></li>
              <li><a class="treeview-item" href="#">Scholarship Data Form</a></li>

            </ul>
          </li>



           <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Home.php">Home</a></li>
              <li><a class="treeview-item" href="Clinic_Privacy_Policy.php">Consultation</a></li>
              <li><a class="treeview-item" href="StudentConsultationHistory.php">Consultation History</a></li>
              <li><a class="treeview-item" href="Prescription.php">Prescription</a></li>
              <li><a class="treeview-item" href="RequestMedCert.php">Request for Medical Certificate</a></li>
              <li><a class="treeview-item" href="RequestMedRecsCert.php">Request for Medical Records Certification</a></li>


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
                  $uid=$_SESSION['id'];
                  $sql = "SELECT * from student where Student_id='$uid' ";
                  $res = $db->query($sql);
                  while($row = $res->fetch_assoc()) {?>
                <a class="appnavlevel"> Hi, <?php echo htmlentities($row["first_name"]);?></a>
              </li>
        <?php
        }?>
            
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
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
       

         <!--<div class="page-error tile">-->
 
       


       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">PATIENT PERMANENT RECORD</h3>
            <div class="tile-body">
                                  <form action="addinfomale.php" method="post">
                                    <br>
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label class=" control-label"><b>Have you ever been admitted/hospitalized?</b></label>
                                        <div class="">
                                            <select class="form-control" name="hospitalized" id="hospitalized"  onChange="changetextbox()">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>If yes, what illness?</b></label>
                                        <input type="text" class="form-control" name="ill" id="ill">
                                      </div>                             
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>When?</b></label>
                                        <input type="text" class="form-control" name="whenn" id="whenn">
                                      </div>
                                     <div class="form-group col-md-4">
                                        <label class=" control-label"><b>Have you ever had a surgical operation?</b></label>
                                        <div class="">
                                            <select class="form-control" name="operation" id="operation"  onChange="changetextbox1()">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>If yes, what kind?</b></label>
                                        <input type="text" class="form-control" name="kind" id="kind">
                                      </div> 
                                       <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>When?</b></label>
                                        <input type="text" class="form-control" name="whennn" id="whennn">
                                      </div>
                                   </div>
                                     <br>   
                                     <div>
                                      <label ><b>Have you ever had any of the following infectious diseases?</b></label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" name="disease" value="Measles">
                                      <label class="form-check-label">Measles</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" name="disease" value="German Measles">
                                      <label class="form-check-label">German Measles</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" name="disease" value="Chickenpox">
                                      <label class="form-check-label">Chickenpox</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" name="disease" value="Hepatitis A">
                                      <label class="form-check-label">Hepatitis A</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" name="disease" value="Tetanus">
                                      <label class="form-check-label">Tetanus</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" name="disease" value="Pulmonary Tuberculosis">
                                      <label class="form-check-label">Pulmonary Tuberculosis</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" name="disease" value="None">
                                      <label class="form-check-label">None</label>
                                    </div>
                                    </div>


                                  <div class="form-group">
                                    <label class="control-label"><b>Do you experience headache, dizziness or syncope at any time?</b></label>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="illness" value="Yes">Yes
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="illness" value="No">No
                                      </label>
                                    </div>
                                  </div>

                                                   
                          <p style="color: black; padding-top: 5px">
                          
                           <input type="checkbox"  name="permission" value="I hereby swear that the above information are true and correct. And therefore, promise to abide by the rules and regulations
                           of the University of Southeastern Philippines-Health Service Division.">
                           I hereby swear that the above information are true and correct. And therefore, promise to abide by the rules and regulations
                           of the University of Southeastern Philippines-Health Service Division.
                         <br><br><br><br>

                            <div class="tile-footer">
                              <button class="btn btn-primary" type="submit" name="Submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button> 
                            </div>
                        
                        </div>
      </div></form>
                     

        

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
    
     <script type="text/javascript">
function changetextbox()
{
   onChange="changetextbox();"
if (document.getElementById("hospitalized").value == "No") {
document.getElementById("ill").disabled=true;
document.getElementById("whenn").disabled=true;
    } else {
        document.getElementById("ill").disable='false';
     document.getElementById("whenn").disable='false';
    }
}

function changetextbox1()
{
   onChange="changetextbox1();"
if (document.getElementById("operation").value == "No") {
document.getElementById("kind").disabled=true;
document.getElementById("whennn").disabled=true;
    } else {
        document.getElementById("kind").disable='false';
     document.getElementById("whennn").disable='false';
    }
}

</script>
    </body>
  </html>
   