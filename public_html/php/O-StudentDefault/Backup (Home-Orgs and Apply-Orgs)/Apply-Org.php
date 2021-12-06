 <?php
session_start();
include("conn.php");

if(strlen($_SESSION['id'])==0)
  { 
    $uid=$_SESSION['id'];
header('location:index.php');
}
else{ 
 

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
  <link rel="stylesheet" href="../../css/owl.carousel.min.css">
<link rel="stylesheet" href="../../css/owl.theme.default.min.css">
  <style type="text/css">
    .img{
      width: 200px;
      height: 200px;
    }
  </style>
        
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
          <li><a class="app-menu__item " href="../../users/Student/index.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
            <li>
              <a class="app-menu__item" href="../../users/Student/Job-Announcements.php">
                <i class="app-menu__icon fa fa-bullhorn"></i>
                <span class="app-menu__label">Job Hirings</span>
                <span class="text-right"><?php echo $job_count ?></span>
              </a>
          </li>
          <li class="p-2 sidebar-label"><span class="app-menu__label">STUDENT'S AFFAIRS AND SERVICES</span></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Discipline Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item " href="../../users/Student/Home-Discipline.php" hidden="">Home</a></li>
              <li><a class="treeview-item" href="../../users/Student/Discipline-Complaints.php">Complaints</a></li>
              <li><a class="treeview-item" href="../../users/Student/Discipline-HistoryComplaints.php">Complaint Records</a></li>
              <li><a class="treeview-item" href="../../users/Student/Discipline-Response.php">Response</a></li>

            </ul>
          </li>

                <?php 
                  if (strlen($_SESSION['org_id'])){
                    echo '
                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                          <li><a class="treeview-item active" href="Home-Orgs.php">Home</a></li>
                          <li><a class="treeview-item" href="Org-files.php">Organization Files</a></li>
                          <li><a class="treeview-item" href="Accre-files.php">Re-Accreditation Files</a></li>
                          <li><a class="treeview-item" href="Oath-files.php">Oath of Office</a></li>
                        </ul>
                      </li>
            
                    ';
            
            
                  } else {
                    echo '
                         <li><a class="app-menu__item active" href="Home-Orgs.php"><i class="app-menu__icon fa fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services</span></a></li>
                    ';
                  }
            
            ?>

            <?php 
                  if ($_SESSION['sl_status']=='Hired'){
                    echo '
                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Labor Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                  <li><a class="treeview-item " href="../../users/Student/Home-Labor.php">Home</a></li>
                                  <li><a class="treeview-item" href="../../users/Student/Labor-DTR.php">DTR</a></li>
                                  <li><a class="treeview-item" href="../../users/Student/Labor-Accomplishments.php">Accomplishment Reports</a></li>
            
            
                                </ul>
                        </li>
             
                    ';
            
            
                  } else {
                    echo '
                          <li><a class="app-menu__item" href="../../users/Student/Home-Labor.php"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Student Labor Services</span></a></li>
                    ';
                  }
            
            ?>

          <li><a class="app-menu__item" href="ReqGoodMoral_Student.php"><i class="app-menu__icon fa fa-envelope-o"></i><span class="app-menu__label">Request for Good Moral</span></a></li>


          <li class="p-2 sidebar-label"><span class="app-menu__label">GUIDANCE OFFICE SERVICES</span></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item active" href="Guidance_StudentUI.php">Home</a></li>
              <li><a class="treeview-item" href="Guidance_Student_Counselling.php">Counselling</a></li>
              <li><a class="treeview-item" href="Guidance_Student_GroupGuidance.php">Group Guidance Activities</a></li>
              <li><a class="treeview-item" href="Guidance_Student_Evaluation.php">Evaluation</a></li>
            </ul>
          </li>


            <li class="p-2 sidebar-label"><span class="app-menu__label">SCHOLARSHIP OFFICE SERVICES</span></li>

            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fas fa-handshake-o"></i>
                    <span class="app-menu__label">Scholarship Services  </span>
                    <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="student-scholarship-dashboard.php">Home</a></li>
              <li><a class="treeview-item" href="student-scholarship-data-form.php">Scholarship Data Form</a></li>

            </ul>
            </li>



            <li class="p-2 sidebar-label"><span class="app-menu__label">CLINIC OFFICE SERVICES</span></li>
           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Clinic_Home.php">Home</a></li>
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
                <a class="appnavlevel"><?php 
                 $query = mysqli_query($conn,"SELECT * from student where Student_id ='".$_SESSION['id']."' ");
  $res = mysqli_fetch_array($query);

                echo $res['first_name']; 
                echo'&emsp;';
                echo $res['last_name']; ?></a>
              </li>
             <!-- <li class="app-search">
                   <input class="app-search__input" type="search" placeholder="Search">
                  <button class="app-search__button"><i class="fa fa-search"></i></button>
              </li>--> 
              <?php
                $sql_get = mysqli_query($conn, "SELECT * FROM remarks_apply WHERE status = 0 and Submitted_by like '%".$_SESSION['id']."%'");
                $count = mysqli_num_rows($sql_get); 
                
              ?> 

   <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class=" fas fa-bell fa-lg mt-2"></i><span class="badge badge-danger" id="count" style="border-radius: 50%; position: relative; top: -10%; left: -10%;"><?php echo $count; ?></span></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
             
              <div class="app-notification__content">
              
                 <?php
                $sql_get1 = mysqli_query($conn, "SELECT * FROM remarks_apply WHERE status = 0 and Submitted_by like '%".$_SESSION['id']."%'");
                if(mysqli_num_rows($sql_get1)>0){
                  echo '<li class="app-notification__title">You have'; while ($main_res = mysqli_fetch_assoc($sql_get)) { echo $count; } echo ' new notifications.</li>';

                    while($result = mysqli_fetch_assoc($sql_get1)){
                      echo '<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa  fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div data-toggle="modal" data-role="exampleModall" id="'.$result['Submitted_by'].'">
                      <p class="app-notification__message">Remarks for submitted file.</p>
                      <p class="app-notification__meta">'.$result['date_apply'].'</p>
                    </div></a></li>';  
                    }

                }
                else{
                    echo '<li>
                    <center>&emsp;&emsp;
                      <p >No Notifications</p></center>
                      
                   </li>';
                }
              ?>
               
              </div>
              <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
          </li>
              
                 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="user-profiles.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
      
          </ul>
        </div>
        <div class="red"> 
          
        </div>

      <!-- Navbar--> 

      
       <form action="Apply-Org.php" method="post" enctype="multipart/form-data">

        <div class="row">
                      <div class="col-md">
                        <div style="background-color:  #c12c32;   padding: 9px 10px; font-weight: bolder; color: white; font-size: 25px;" > Application</div>
                        <div class="tile">
                          <div class="tile-body" > 

                          <div class="row">
                              <div class="form-group col-sm-6">
                              <p style="font-weight: bolder;">Organization Name: 
                              <input class="form-control sm-8" type="text" id="email" name="org_name">
                              </div>
                            </div>

                          <div class="row">
                              <div class="form-group col-sm-6">
                              <p style="font-weight: bolder;">Student Organization Governor/President Name: 
                              <input class="form-control sm-8" type="text" id="search"  placeholder="Enter Lastname .. " name="Org_pres_gov">
                              <div class="card-body">
                                          <div class="list-group list-group-item-action" id="content">
                                           
                                            
                                          </div>
                                        </div>
                              </div>
                            </div>

                             <div class="row">
                              <div class="form-group col-sm-6">
                              <p style="font-weight: bolder;">Student Organization Adviser: 
                              <input class="form-control sm-8" type="text" id="email" name="Org_adviser">
                              </div>
                            </div>


                    <!--          <div class="row">
                              <div class="form-group col-sm">
                              <p style="font-weight: bolder;">Organization Logo:
                                <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp" required=""><small class="form-text text-muted" id="fileHelp"></small>
                              </div></p>
                             </div> -->

                              <div class="row">
                              <div class="col-sm-2">               
                              <h6 class="font-weight-bold">Type of Organization: 
                              </div>
                             <div class="col-sm-4">  
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="type" value="Govt. Funded"> Govt. Funded Organization
                                  </label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="type" value="Non-Govt. Funded"> Non-Funded Organization
                                  </label>
                                </div>
                              </div>

              <br><br><br>
                        </div>
                      </div>
                       

  <div class="row">
        <div class="col-xl">
          <!-- <div style="background-color: #C12C32; padding: 8px 10px;"> </div> -->
          <div>Attach files:</div>
          <div class="tile" style="height: 300px;">
              <div class="owl-carousel owl-theme" style="height: 200px;" >
                  <?php
                $sql = mysqli_query($conn, "SELECT * FROM remarks_apply WHERE status = 0 and Submitted_by = '".$_SESSION['id']."'");
                $res = mysqli_num_rows($sql); 
                

              ?>   


               <div class="item image-upload" style="height: 50px;">
                                      <label for="file-input1" style="height: 50px;">
                                    <div class="img card text-center btn btn-light orgbox"  style="top: -70px;">
                                      <input class="file-input1" id="file-input1" type="file" name="App_letter" onchange="ssvalue1()" style="margin-top: -100px; margin-bottom: 80px;" /> 
                                      <input type="text" name="" id="input1" value="" style='border-style: none;background: transparent;' disabled >
                                      <script>
                                        function ssvalue1() {
                                          var val = document.getElementById("file-input1").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input1").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../image/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                      <div class="card-body">
                                        <p class="card-text txbx">Application Letter</p>
                                      </div>   
                                      <? echo $name_array[$i] ?>
                                    </div>
                                    <button type="button" hidden="" class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-role="exampleModall" id="<?php echo $_SESSION['id'];?>"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                  </div>
                                  

                                    <div class="item image-upload" style="height: 50px;">
                                      <label for="file-input2" style="height: 50px;">
                                    <div class="img card text-center btn btn-light orgbox"  style="top: -70px;">
                                      <input class="file-input2"  id="file-input2" type="file" name="MVS" onchange="ssvalue2()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input2" value="" style='border-style: none;background: transparent;' disabled >
                                      <script>
                                        function ssvalue2() {
                                          var val = document.getElementById("file-input2").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input2").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../image/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                      <div class="card-body">
                                        <p class="card-text txbx">Mission Vission Statement</p>
                                      </div>
                                      <?echo $name_array[$i]?>   
                                    </div>
                                    <button type="button" hidden="" class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#exampleModal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                  </div>
                                  

                                    <div class="item image-upload" style="height: 50px;">
                                      <label for="file-input3" style="height: 50px;">
                                    <div class="img card text-center btn btn-light orgbox"  style="top: -70px;">
                                      <input class="file-input3"  id="file-input3" type="file" name="Aff_Lead" onchange="ssvalue3()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input3" value="" style='border-style: none;background: transparent;' disabled >
                                      <script>
                                        function ssvalue3() {
                                          var val = document.getElementById("file-input3").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input3").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../image/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                      <div class="card-body">
                                        <p class="card-text txbx">Affidavit of Leadership</p>
                                      </div>
                                      <? echo $name_array[$i]?>                                    </div>
                                    <button type="button" hidden="" class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#exampleModal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                  </div>


                                    <div class="item image-upload" style="height: 50px;">
                                      <label for="file-input4" style="height: 50px;">
                                    <div class="img card text-center btn btn-light orgbox"  style="top: -70px;">
                                      <input class="file-input4"  id="file-input4" type="file" name="Resolution" onchange="ssvalue4()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input4" value="" style='border-style: none;background: transparent;' disabled >
                                       <script>
                                        function ssvalue4() {
                                          var val = document.getElementById("file-input4").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input4").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../image/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                    <div class="card-body">
                                        <p class="card-text txbx">Resolution</p>
                                      </div>  
                                      <? echo $name_array[$i] ?> 
                                    </div>
                                    <button type="button" hidden="" class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#exampleModal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                  </div>
                  

                                  <div class="item image-upload" style="height: 50px;">
                                      <label for="file-input5" style="height: 50px;">
                                    <div class="img card text-center btn btn-light orgbox"  style="top: -70px;">
                                      <input class="file-input5"  id="file-input5" type="file" name="Letter_Permission" onchange="ssvalue5()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input5" value="" style='border-style: none;background: transparent;' disabled >
                                       <script>
                                        function ssvalue5() {
                                          var val = document.getElementById("file-input5").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input5").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../image/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                    <div class="card-body">
                                        <p class="card-text txbx">Letter of Permission</p>
                                      </div> 
                                      <? echo $name_array[$i] ?>  
                                    </div>
                                    <button type="button" hidden="" class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#exampleModal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                  </div>   
                                 
                                  <div class="item image-upload" style="height: 50px;">
                                      <label for="file-input6" style="height: 50px;">
                                    <div class="img card text-center btn btn-light orgbox"  style="top: -70px;">
                                      <input class="file-input6"  id="file-input6" type="file" name="Letter_content" onchange="ssvalue6()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input6" value="" style='border-style: none;background: transparent;' disabled >
                                       <script>
                                        function ssvalue6() {
                                          var val = document.getElementById("file-input6").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input6").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../image/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                    <div class="card-body">
                                        <p class="card-text txbx">Letter of Content</p>
                                      </div> 
                                      <? echo $name_array[$i] ?>  
                                    </div>
                                    <button type="button" hidden="" class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#exampleModal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                  </div>   
                                  <div class="item image-upload" style="height: 50px;">
                                      <label for="file-input7" style="height: 50px;">
                                    <div class="img card text-center btn btn-light orgbox"  style="top: -70px;">
                                      <input class="file-input7"  id="file-input7" type="file" name="Lists" onchange="ssvalue7()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input7" value="" style='border-style: none;background: transparent;' disabled >
                                       <script>
                                        function ssvalue7() {
                                          var val = document.getElementById("file-input7").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input7").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../image/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                    <div class="card-body">
                                        <p class="card-text txbx">List of Officers and Members the organization</p>
                                      </div> 
                                      <? echo $name_array[$i] ?>  
                                    </div>
                                    <button type="button" hidden="" class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#exampleModal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                  </div>   
                                  <div class="item image-upload" style="height: 50px;">
                                      <label for="file-input8" style="height: 50px;">
                                    <div class="img card text-center btn btn-light orgbox" style="top: -70px;" >
                                      <input class="file-input8"  id="file-input8" type="file" name="ConsLaw" onchange="ssvalue8()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input8" value="" style='border-style: none;background: transparent;' disabled >
                                       <script>
                                        function ssvalue8() {
                                          var val = document.getElementById("file-input8").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input8").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../image/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                    <div class="card-body">
                                        <p class="card-text txbx">Constitutional-by-Laws</p>
                                      </div> 
                                      <? echo $name_array[$i] ?>  
                                    </div>
                                    <button type="button" hidden="" class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#exampleModal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                  </div>   
                                  <div class="item image-upload" style="height: 50px;">
                                      <label for="file-input9" style="height: 50px;">
                                    <div class="img card text-center btn btn-light orgbox"  style="top: -70px;">
                                      <input class="file-input9"  id="file-input9" type="file" name="Logo" onchange="ssvalue9()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input9" value="" style='border-style: none;background: transparent;' disabled >
                                       <script>
                                        function ssvalue9() {
                                          var val = document.getElementById("file-input9").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input9").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../image/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                    <div class="card-body">
                                        <p class="card-text txbx">Official Logo</p>
                                      </div> 
                                      <? echo $name_array[$i] ?>  
                                    </div>
                                    <button type="button" hidden="" class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#exampleModal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                  </div>
                                  <div class="item image-upload" style="height: 50px;">
                                      <label for="file-input0" style="height: 50px;">
                                    <div class="img card text-center btn btn-light orgbox"  style="top: -70px;">
                                      <input class="file-input0"  id="file-input0" type="file" name="Letter_intent" onchange="ssvalue0()" style="margin-top: -100px; margin-bottom: 80px;" />
                                      <input type="text" name="" id="input0" value="" style='border-style: none;background: transparent;' disabled >
                                       <script>
                                        function ssvalue0() {
                                          var val = document.getElementById("file-input0").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input0").value = val;
                                        }
                                      </script>
                                      <div class="mx-auto">
                                        <img src="../image/files.png" class="card-img-top imgbx" alt="..."/>
                                      </div>
                                    <div class="card-body">
                                        <p class="card-text txbx">Letter ot Intent</p>
                                      </div> 
                                      <? echo $name_array[$i] ?>  
                                    </div>
                                    <button type="button" hidden="" class="btn btn-danger btn-sm blocking w-100 mt-3" data-toggle="modal" data-target="#exampleModal"><i class="mr-2 fas fa-comment" ></i>REMARKS</button>
                                  </div>             
         

              </div>
                        </div>
                      </div>
                    </div>

                    <div class="tile-footer"></div>
                          <button class="btn btn-success" name="submit" id="submit" type="submit" >Submit</button>
                           <a class="btn btn-primary" href="Home-Orgs.html" style="float: right;">Cancel</a>
                    </div>

              
</form>

          <!-- View Remarks -->
          <form method="POST" >
              <div class="modal fade" id="remarkk-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header"><?php 
                      $query = "SELECT * FROM remarks_apply WHERE Submitted_by like '%".$_SESSION['id']."%'";
                      $result = mysqli_query($conn,$query);
                      $row = mysqli_fetch_array($result);
                        
                    ?> 
                      <h5 class="modal-title" id="exampleModalLabel"><b><?php echo $row['org_name'];?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" id="remarkk">
                      </div>
          
                    <div class="modal-footer">
                      <button type="submit" name="postbtn" class="btn btn-danger"><i class="mr-1 fas fa-paper-plane"></i> SUBMIT</button>
                    </div></div>
                </div>
              </div>
            </div>
          </div>
        </form>
            
        
</main>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dropzone.js"></script>
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
      <script type="text/javascript">
                      $(document).ready(function()
                          {
                            $('#search').keyup(function(){
                              var Search = $('#search').val();
                              
                              if(Search!=""){
                                  $.ajax({
                                    url: 'search.php',
                                    method: 'POST',
                                    data: {search:Search},
                                    success:function(data){
                                      $('#content').html(data);
                                    }
                                  })
                              }
                              else{
                                   $('#content').html('');
                              }
                              $(document).on('click', 'a', function (){
                                $('#search').val($(this).text());
                                $('#content').html('');
                              })

                            }) 
           /*                $(document).on('click','#btn_search', function (){ 
                              var Value = $('#search').val();
                              $.ajax({
                                    url: 'displayID.php',
                                    method: 'POST',
                                    data: {query:Value},
                                    success:function(data){
                                      $('#ID').html(data);
                                    }
                                  })
                            }) --> */
                          })
                    </script>
     
  <script src="../js/jquery.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
  <script type="text/javascript">
$('.owl-carousel').owlCarousel({
    loop:false  ,
    margin:10,
    nav:true,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
  </script>
  <script type="text/javascript">
      $(document).on('click','[data-role="exampleModall"]', function(){
        var id = $(this).attr("id");
        $.ajax({  
          url:'remarkk.php',  
          method:'POST',  
          data:{id:id},  
          success: function(data){
            $('#remarkk').html(data);
          }
      })

        jQuery.noConflict();
        $('#remarkk-modal').modal("show");


      });
  </script>

  </body>
</html>
<?php
    include("include/conn.php");
   

    if(isset($_POST['submit'])){

      $fileName1 = $_POST['org_name'];
      $subby = $_SESSION['id'];
      $fileName2 = $_POST['Org_pres_gov'];
      $fileName3 = $_POST['Org_adviser'];
      $fileName4 = $_POST['type'];
      $date = date('y-m-d h:i:s');

      $query = "INSERT into org_applications(Org_Name,Submitted_by,Org_President_Governor,Org_Adviser,Type,App_letter,MVS,Aff_Lead,Resolution,Letter_Permission,Letter_content,Lists,ConsLaw,Logo,Letter_intent,date_apply) values('$fileName1','$subby','$fileName2','$fileName3','$fileName4','','','','','','','','','','','$date')";
      $run = mysqli_query($conn,$query);

      if($run){
      if(isset($_FILES['App_letter'])){
  $pdf_name = $_FILES['App_letter']['name'];
  $pdf_size = $_FILES['App_letter']['size'];
  $pdf_tmp = $_FILES['App_letter']['tmp_name'];
  $path = "Org_Applications/".$pdf_name;
  $movepdf = move_uploaded_file($pdf_tmp,$path);

   $query = "UPDATE org_applications set App_letter='$pdf_name' where Org_Name = '$fileName1'";
$run = mysqli_query($conn,$query);
}
if(isset($_FILES['MVS'])){
  $pdf_name1 = $_FILES['MVS']['name'];
  $pdf_size = $_FILES['MVS']['size'];
  $pdf_tmp = $_FILES['MVS']['tmp_name'];
  $path = "Org_Applications/".$pdf_name1;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
   $query = "UPDATE org_applications set MVS='$pdf_name1'  where Org_Name = '$fileName1'";
$run = mysqli_query($conn,$query);
}
if(isset($_FILES['Aff_Lead'])){
  $pdf_name2 = $_FILES['Aff_Lead']['name'];
  $pdf_size = $_FILES['Aff_Lead']['size'];
  $pdf_tmp = $_FILES['Aff_Lead']['tmp_name'];
  $path = "Org_Applications/".$pdf_name2;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
  $query = "UPDATE org_applications set Aff_Lead='$pdf_name2'  where Org_Name = '$fileName1'";
  $run = mysqli_query($conn,$query);
}
if(isset($_FILES['Resolution'])){
  $pdf_name3 = $_FILES['Resolution']['name'];
  $pdf_size = $_FILES['Resolution']['size'];
  $pdf_tmp = $_FILES['Resolution']['tmp_name'];
  $path = "Org_Applications/".$pdf_name3;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
  $query = "UPDATE org_applications set Resolution='$pdf_name3'  where Org_Name = '$fileName1'";
$run = mysqli_query($conn,$query);
}
if(isset($_FILES['Letter_Permission'])){
  $pdf_name4 = $_FILES['Letter_Permission']['name'];
  $pdf_size = $_FILES['Letter_Permission']['size'];
  $pdf_tmp = $_FILES['Letter_Permission']['tmp_name'];
  $path = "Org_Applications/".$pdf_name4;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
   $query = "UPDATE org_applications set Letter_Permission='$pdf_name4'  where Org_Name = '$fileName1'";
$run = mysqli_query($conn,$query);
} 
if(isset($_FILES['Letter_content'])){
  $pdf_name5 = $_FILES['Letter_content']['name'];
  $pdf_size = $_FILES['Letter_content']['size'];
  $pdf_tmp = $_FILES['Letter_content']['tmp_name'];
  $path = "Org_Applications/".$pdf_name5;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
   $query = "UPDATE org_applications set Letter_content='$pdf_name5'  where Org_Name = '$fileName1'";
$run = mysqli_query($conn,$query);
} 
if(isset($_FILES['Lists'])){
  $pdf_name6 = $_FILES['Lists']['name'];
  $pdf_size = $_FILES['Lists']['size'];
  $pdf_tmp = $_FILES['Lists']['tmp_name'];
  $path = "Org_Applications/".$pdf_name6;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
   $query = "UPDATE org_applications set Lists='$pdf_name6'  where Org_Name = '$fileName1'";
$run = mysqli_query($conn,$query);
} 
if(isset($_FILES['ConsLaw'])){
  $pdf_name7 = $_FILES['ConsLaw']['name'];
  $pdf_size = $_FILES['ConsLaw']['size'];
  $pdf_tmp = $_FILES['ConsLaw']['tmp_name'];
  $path = "Org_Applications/".$pdf_name7;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
   $query = "UPDATE org_applications set ConsLaw='$pdf_name7'  where Org_Name = '$fileName1'";
$run = mysqli_query($conn,$query);
} 
if(isset($_FILES['Logo'])){
  $pdf_name8 = $_FILES['Logo']['name'];
  $pdf_size = $_FILES['Logo']['size'];
  $pdf_tmp = $_FILES['Logo']['tmp_name'];
  $path = "Org_Applications/".$pdf_name8;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
   $query = "UPDATE org_applications set Logo='$pdf_name8'  where Org_Name = '$fileName1'";
$run = mysqli_query($conn,$query);
} 
if(isset($_FILES['Letter_intent'])){
  $pdf_name9 = $_FILES['Letter_intent']['name'];
  $pdf_size = $_FILES['Letter_intent']['size'];
  $pdf_tmp = $_FILES['Letter_intent']['tmp_name'];
  $path = "Org_Applications/".$pdf_name9;
  $movepdf = move_uploaded_file($pdf_tmp,$path);
   $query = "UPDATE org_applications set Letter_intent='$pdf_name9'  where Org_Name = '$fileName1'";
$run = mysqli_query($conn,$query);
} 
     echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "success",
                                                    title: "You have submitted files successfully!",
                                                    showConfirmButton: true
                                                    
                                                  })
                                                });
                                                 </script>';
    } 
 else{
                                            echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "Your work has not been saved",
                                                    showConfirmButton: true
                                                   
                                                  })
                                               });

                                                </script>';
                                                
                                        }

}

if(isset($_POST['postbtn'])){

    $by = $_SESSION['id'];
   $date = date('y-m-d h:i:s');
   $filee = $_POST['filee'];
   $filesub = $_POST['by'];

   $quer = "SELECT * FROM org_applications WHERE Submitted_by like '$by'";
   $ress = mysqli_query($conn,$quer);
   $roww = mysqli_fetch_array($ress);

  if ($roww){  
    
        
       if($filesub=="Application Letter"){
        if(isset($_FILES['filee'])){
        $pdf_name = $_FILES['filee']['name'];
        $pdf_size = $_FILES['filee']['size'];
       $pdf_tmp = $_FILES['filee']['tmp_name'];
       $path = "Org_Applications/".$pdf_name;
       $movepdf = move_uploaded_file($pdf_tmp,$path);

       $query = "UPDATE org_applications set App_letter='$pdf_name'  where Submitted_by like '$by'";
      $run = mysqli_query($conn,$query);
     
      
                                        }
       }
       if($filesub=="Mission Vission Statement"){
        if(isset($_FILES['filee'])){
        $pdf_name1 = $_FILES['filee']['name'];
        $pdf_size1 = $_FILES['filee']['size'];
       $pdf_tmp1 = $_FILES['filee']['tmp_name'];
       $path1 = "Org_Applications/".$pdf_name1;
       $movepdf1 = move_uploaded_file($pdf_tmp1,$path1);

       $query1 = "UPDATE org_applications set MVS='$pdf_name1'  where Submitted_by like '$by'";
      $run1 = mysqli_query($conn,$query1);

      

          }
       }
       if($filesub=="Notarized Affidavit of Leadership"){
        if(isset($_FILES['filee'])){
        $pdf_name2 = $_FILES['filee']['name'];
        $pdf_size2 = $_FILES['filee']['size'];
       $pdf_tmp2 = $_FILES['filee']['tmp_name'];
       $path2 = "Org_Applications/".$pdf_name2;
       $movepdf2 = move_uploaded_file($pdf_tmp2,$path2);

       $query2 = "UPDATE org_applications set Aff_Lead='$pdf_name2'  where Submitted_by like '$by'";
      $run2 = mysqli_query($conn,$query2);
    }

       }
       if($filesub=="Resolution"){
        if(isset($_FILES['filee'])){
        $pdf_name3 = $_FILES['filee']['name'];
        $pdf_size3 = $_FILES['filee']['size'];
       $pdf_tmp3 = $_FILES['filee']['tmp_name'];
       $path3 = "Org_Applications/".$pdf_name3;
       $movepdf3 = move_uploaded_file($pdf_tmp3,$path3);

       $query3 = "UPDATE org_applications set Resolution='$pdf_name3'  where Submitted_by like '$by'";
      $run3 = mysqli_query($conn,$query3);

        }
       }
       if($filesub=="Letter of Permission"){
        if(isset($_FILES['filee'])){
        $pdf_name4 = $_FILES['filee']['name'];
        $pdf_size4 = $_FILES['filee']['size'];
       $pdf_tmp4 = $_FILES['filee']['tmp_name'];
       $path4 = "Org_Applications/".$pdf_name4;
       $movepdf4 = move_uploaded_file($pdf_tmp4,$path4);

       $query4 = "UPDATE org_applications set Letter_Permission='$pdf_name4'  where Submitted_by like '$by'";
      $run4 = mysqli_query($conn,$query4);

}
       }
       if($filesub=="Letter of Consent"){
        if(isset($_FILES['filee'])){
        $pdf_name5 = $_FILES['filee']['name'];
        $pdf_size5 = $_FILES['filee']['size'];
       $pdf_tmp5 = $_FILES['filee']['tmp_name'];
       $path5 = "Org_Applications/".$pdf_name5;
       $movepdf5 = move_uploaded_file($pdf_tmp5,$path5);

       $query5 = "UPDATE org_applications set Letter_content='$pdf_name5'  where Submitted_by like '$by'";
      $run5 = mysqli_query($conn,$query5);

}
       }
       if($filesub=="List of Officers and Members"){
        if(isset($_FILES['filee'])){
        $pdf_name6 = $_FILES['filee']['name'];
        $pdf_size6 = $_FILES['filee']['size'];
       $pdf_tmp6 = $_FILES['filee']['tmp_name'];
       $path6 = "Org_Applications/".$pdf_name6;
       $movepdf6 = move_uploaded_file($pdf_tmp6,$path6);

       $query6 = "UPDATE org_applications set Lists='$pdf_name6'  where Submitted_by like '$by'";
      $run6 = mysqli_query($conn,$query6);

}
       }
       if($filesub=="Constitutional by Laws"){
        if(isset($_FILES['filee'])){
        $pdf_name7 = $_FILES['filee']['name'];
        $pdf_size7 = $_FILES['filee']['size'];
       $pdf_tmp7 = $_FILES['filee']['tmp_name'];
       $path7 = "Org_Applications/".$pdf_name7;
       $movepdf7 = move_uploaded_file($pdf_tmp7,$path7);

       $query7 = "UPDATE org_applications set ConsLaw='$pdf_name7'  where Submitted_by like '$by'";
      $run7 = mysqli_query($conn,$query7);
}

       }
       if($filesub=="Office Logo"){
        if(isset($_FILES['filee'])){
        $pdf_name8 = $_FILES['filee']['name'];
        $pdf_size8 = $_FILES['filee']['size'];
       $pdf_tmp8 = $_FILES['filee']['tmp_name'];
       $path8 = "Org_Applications/".$pdf_name8;
       $movepdf8 = move_uploaded_file($pdf_tmp8,$path8);

       $query8 = "UPDATE org_applications set Logo='$pdf_name8'  where Submitted_by like '$by'";
      $run8 = mysqli_query($conn,$query8);

}
       }
       if($filesub=="Letter of Intent"){
        if(isset($_FILES['filee'])){
        $pdf_name9 = $_FILES['filee']['name'];
        $pdf_size9 = $_FILES['filee']['size'];
       $pdf_tmp9 = $_FILES['filee']['tmp_name'];
       $path9 = "Org_Applications/".$pdf_name9;
       $movepdf9 = move_uploaded_file($pdf_tmp9,$path9);

       $query9 = "UPDATE org_applications set Letter_intent='$pdf_name9'  where Submitted_by like '$by'";
      $run9 = mysqli_query($conn,$query9);
}

       }
     else{
       echo '<script> 
                                                  $(document).ready(function(){
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                      
                                                    })
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE Submitted_by = '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_applications set status = 0  where Submitted_by ='$by'";
                                                    $run0 = mysqli_query($conn,$query0);

      
    }
}
 else{
                                            echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "File not submitted successfully",
                                                    showConfirmButton: true
                                                   
                                                  })
                                               });

                                                </script>';
                                                
                                        }
}
  ?>
  <?php } ?>