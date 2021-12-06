<?php
  include '../php/conn.php';
  include '../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'OSAS'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../index.php";';
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
    <title>Print Good Moral Certificate</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main2.css">
    <link rel="stylesheet" type="text/css" href="css/upstyle2.css">
    <link rel="stylesheet" type="text/css" href="css/upstyle_shy.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl" style="background-color: #fff;" onload="window.print()">
  <div id="print-container">
      <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th style="border: 1px solid #404040;" rowspan="5"><img src="../image/logo.png" width="100px;"></th> 
                                      <th style="border: 1px solid #404040;" rowspan="5" class="text-center">
                                        <span class="fs-11 d-block">Republic of the Philippines</span>
                                        <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span>
                                        <span class="fs-11 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                        <span class="fs-11 d-block">Telephone: (082) 227-8192</span>
                                        <span class="fs-11 d-block">Website: www.usep.edu.ph</span>
                                        <span class="fs-11 d-block">Email: president@usep.edu.ph</span>
                                      </th>  
                                      <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="">Form No. </th>
                                      <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">FM-USeP-HSC-01
                                      </th>
                                    </tr>
                                    <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Issue Status  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;"colspan="2">02</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Revision No.  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Date Effective  </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">01 March 2018
                                     </th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;">Approved by </th>
                                     <th class="fs-11 p-1" style="border: 1px solid #404040; ;" colspan="2">President
                                     </th>
                                   </tr>
                                   <tr>
                                    <th  style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">ACCOMPLISHMENT REPORT
                                    </th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                          </div>
                        </div>  
         <?php 
         $result = mysqli_query($conn , "SELECT * FROM accomplishment_rating");
                                $row=mysqli_fetch_array($result);
        ?>

                    <div class="row mt-3 p-2">
                      <div class="col-sm">
                        <div class="form-group fg">
                          <label class="control-label cl">Name:</label>
                          <input class="form-control fc2 w-40 pl-2" type="text" value="" disabled=""></input>
                          <label class="control-label cl">Course & Year:</label>
                          <input class="form-control fc w-10 pl-2" type="text" value="" disabled=""></input>
                          <label class="control-label cl">Class:</label>
                          <input class="form-control fc w-5 pl-2" style="width:70px;" type="text" value="" disabled=""></input>
                          <label class="control-label cl">Type of Student Labor:</label>
                          <input class="form-control fc w-10 pl-2" type="text" value="" disabled=""></input>
                          <br>
                          <label class="control-label cl">UNIT/ COLLEGE ASSIGNED:</label>
                          <input class="form-control fc w-10 pl-2" type="text" value="" disabled=""></input>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-3 p-5">
                        <div class="col-sm-7">
                          <h6 class="font-weight-bold"> I. &emsp;&emsp;&emsp;&emsp;ACCOMPLISHMENT TASK for the period<br></h6><br>
                          <h6 class="font-weight-bold"> 1.<br></h6>
                          <h6 class="font-weight-bold"> 2.<br></h6>
                          <h6 class="font-weight-bold"> 3.<br></h6>
                          <h6 class="font-weight-bold"> 4.<br></h6>
                          <h6 class="font-weight-bold"> 5.<br></h6>
                          <h6 class="font-weight-bold"> 6.<br></h6>
                          <h6 class="font-weight-bold"> 7.<br></h6>
                          <h6 class="font-weight-bold"> 8.<br></h6>
                          </div>
                    </div> 
                     <div class="row mt-3 p-5">
                        <div class="col-sm-7">
                          <h6 class="font-weight-bold"> II. &emsp;&emsp;&emsp;&emsp;TOTAL NUMBER OF HOURS WORKED: <br></h6>
                          </div>
                    </div> 
                  </div>

                    <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="col">
                          </div>
                            <div class="col-4">
                            <div class="form-group fg text mb-2 text-center align-middle">
                            <input class="form-control fc2 mr-1 p-2 w-75" type="text" value="<?php echo $row['student_name'] ?>" disabled><br>
                            <label class="control-label mr65 w-100">Student's Signature</label>
                            </div>
                          <br>
                          </div>
                        </div>
                  

                  <div class="row mt-3 p-5">
                        <div class="col-sm-12">
                          <h6 class="font-weight-bold"> III. &emsp;&emsp;&emsp;&emsp;PERFORMANCE RATING: <br></h6>
                           <h6 class="font-weight-light text-center align-middle"> (Legend of rating: Need Improvement, Satisfactory, Excellent) <br>
                           </h6>
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                </thead>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b; text-align: center;" width="50%">CRITERIA</th>
                                  <th style="border: 2px solid #6b6b6b; text-align:center;" width="50%">SUPERVISOR RATING</th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">Report on duty regularly </th>
                                  <th style="border: 2px solid #6b6b6b;"><?php echo $row['duty_regularly'] ?></th>
                                </tr>
                               <tr>
                                  <th style="border: 2px solid #6b6b6b;">Follow instruction without much difficulty </th>
                                  <th style="border: 2px solid #6b6b6b;"><?php echo $row['instruction_difficulty'] ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">Utilize time wisely/perform task without delay</th>
                                  <th style="border: 2px solid #6b6b6b;"><?php echo $row['time_utilize'] ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">Do his/her routine work without being told</th>
                                  <th style="border: 2px solid #6b6b6b;"><?php echo $row['routine_work'] ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">Shows initiative & creativity in doing the task</th>
                                  <th style="border: 2px solid #6b6b6b;"><?php echo $row['initiative_creativity'] ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">Accurate & efficient in doing clerical work</th>
                                  <th style="border: 2px solid #6b6b6b;"><?php echo $row['accurate_efficient'] ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">With good interpersonal relationship</th>
                                  <th style="border: 2px solid #6b6b6b;"><?php echo $row['good_interpersonal'] ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">Willing to learn from mistakes and/or new task</th>
                                  <th style="border: 2px solid #6b6b6b;"><?php echo $row['willing_learn'] ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 2px solid #6b6b6b;">Generally have a good working attitude</th>
                                  <th style="border: 2px solid #6b6b6b;"><?php echo $row['good_working'] ?></th>
                                </tr>
                          </table>
                        </div>
                      </div>
                    </div>


                     <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="col">
                          </div>
                            <div class="col-4">
                            <div class="form-group fg text mb-2 text-center align-middle">
                            <input class="form-control fc2 mr-1 p-2 w-75" type="text" value="Ereka Rose Redulla" disabled><br>
                            <label class="control-label mr65 w-100">Rater's Name & Signature</label>
                            </div>
                          <br>
                          </div>
                        </div>
          



















  
                </div>
              </div>
            </div>