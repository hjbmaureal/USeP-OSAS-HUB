<?php
  session_start();
  require_once('../../conn.php');
  if (!isset($_SESSION['id'])){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../index.php";';
    echo '</script>';
  }
$applicantid =$_REQUEST['appid'];
$date_from = $_GET['date_from'];
$date_to = $_GET['date_to'];
$period = $_GET['period'];
$report_applicant_name = '';
$report_course_year = '';
$report_labor_class = '';
$report_labor_type = '';
$report_unit_assigned = '';
$task = array(8);
$report_total_hours = '';
$duty_regularly = '';
$instruction_difficulty = '';
$routine_work = '';
$initiative_creativity = '';
$accurate_efficient = '';
$good_interpersonal = '';
$willing_learn = '';
$good_working = '';
$time_utilize = '';
$unit_head = '';
$rater_signature = '../../images/transparentbg.png';
$student_sign = '../../images/transparentbg.png';

  $query=mysqli_query($conn,"call MainGetDataFromSLView('','$applicantid','$date_from','$date_to')");
  while($row=mysqli_fetch_array($query)){
    $report_applicant_name = $row['applicant_name'];
    $report_course_year = $row['course_year'];
    $report_labor_class = $row['labor_class'];
    $report_labor_type = $row['labor_type'];
    $report_unit_assigned = $row['unit_assigned'];
    $tasks = explode("#",$row['tasklist']);
    for ($i=0; $i < 8; $i++) { 
      if ($i < count($tasks)){
        $task[$i] = $tasks[$i];
      } else {
        $task[$i] = '';
      }
    }

    $student_sign = ($row['student_signature']==null) ? '../../images/transparentbg.png' :'data:image/jpeg;base64,'.base64_encode($row['student_signature']);
    $report_total_hours = $row['total_hours'];
    $duty_regularly = $row['duty_regularly'];
    $instruction_difficulty = $row['instruction_difficulty'];
    $routine_work = $row['routine_work'];
    $initiative_creativity = $row['initiative_creativity'];
    $accurate_efficient = $row['accurate_efficient'];
    $good_interpersonal = $row['good_interpersonal'];
    $willing_learn = $row['willing_learn'];
    $good_working = $row['good_working'];
    $time_utilize = $row['time_utilize'];
    $rater_signature = ($row['head_signature']==null) ? '../../images/transparentbg.png' :'data:image/jpeg;base64,'.base64_encode($row['head_signature']);
    $unit_head = ($row['rating_status'] > 0) ? $row['staff_requested_by'] : '';
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
    <title>Print</title>
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
 <style type="text/css">
  @page{
    size: legal portrait;
    margin: .5in;
  }

  .s14{
    font-size: 14px;
  }

  </style>
  </head>
  <body class="app sidebar-mini rtl" style="background-color: #fff;" onload="window.print()">
  <div style="position: absolute; width: 100%;" class="mt-1">
                   <div class="row ">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th style="border: 1px solid #000 !important ; padding-top: 1px; padding-bottom: 1px;" class="text-center align-middle" rowspan="5"><img src="../../images/logo.png" width="100px;"></th> 
                                      <th style="border: 1px solid #000 !important ; padding-top: 1px; padding-bottom: 1px;" rowspan="5" class="text-center">
                                        <span class="fs-11 s12 d-block">Republic of the Philippines</span>
                                        <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span>
                                        <span class="fs-17 s12 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                        <span class="fs-11 s12 d-block">Telephone: (082) 227-8192</span>
                                        <span class="fs-11 s12 d-block">Website: www.usep.edu.ph</span>
                                        <span class="fs-11 s12 d-block">Email: president@usep.edu.ph</span>
                                      </th>  
                                      <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px; " colspan="">Form No. </th>
                                      <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px; " colspan="">FM-USeP-HSC-01 </th>
                                    </tr>
                                    <tr>
                                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px; ">Issue Status  </th>
                                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px; "colspan="2">02</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px; ">Revision No.  </th>
                                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px; " colspan="2">01</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px; ">Date Effective  </th>
                                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px; " colspan="2">01 March 2018
                                     </th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px; ">Approved by </th>
                                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px; " colspan="2">President
                                     </th>
                                   </tr>
                                   <tr>
                                    <th  style="border-color: #000 !important; font-size: 20px; font-weight: bold; border: 1px solid #000 !important; padding-top: .5px; padding-bottom: .5px;" colspan="4" class="text-center p-1 text-b">ACCOMPLISHMENT REPORT
                                    </th>
                                  </tr>
                                </thead>
                              </table>

                      </div>
                    </div> 
                  </div>

                   <div class="row mt-3 p-7">
                      <div class="col-sm">
                        <div class="form-group fg">
                          <label class="control-label cl s14">NAME:</label>
                          <input class="form-control fc2 pl-2 s14" style="width:200px;" type="text" value="<?php echo $report_applicant_name ?>" disabled=""></input>
                          <label class="control-label cl s14">COURSE & YEAR</label>
                          <input class="form-control fc2 pl-2 s14" style="width:150px;" type="text" value="<?php echo $report_course_year ?>"disabled=""></input>
                          <label class="control-label cl s14">CLASS:</label>
                          <input class="form-control fc2 pl-2 s14" style="width:150px;" type="text" value="<?php echo $report_labor_class ?>"disabled=""></input><br>
                          <label class="control-label cl s14">Type of Student Labor:</label>
                          <input class="form-control fc2 pl-2 s14" style="width: 350px;" type="text" value="<?php echo $report_labor_type ?>"disabled=""></input>
                          <br>
                          <label class="control-label cl s14">UNIT/ COLLEGE ASSIGNED:</label>
                          <input class="form-control fc2 w-50 pl-2 s14" type="text" value="<?php echo $report_unit_assigned ?>"disabled=""></input>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-7">
                          <h6 class="font-weight-bold s14"> I. &emsp;&emsp;&emsp;&emsp;ACCOMPLISHMENT TASK for the period &emsp;&emsp;&emsp;&emsp; <?php echo  $period ?></h6><br>
                          <?php 
                          for ($i=0; $i < 8 ; $i++) { 
                            echo '                            
                                <h6 class="font-weight-bold s14" style="color:#000;"> '.($i+1).'.
                                  <span class="font-weight-normal ml-2">'.$task[$i].'</span>
                                  <br>
                                </h6>
                            ';
                          }

                          ?>

                        </div>
                    </div> 
                     <div class="row mt-3 ">
                        <div class="col-sm-7">
                          <h6 class="font-weight-bold s22 d-inline"> II. &emsp;&emsp;&emsp;&emsp;TOTAL NUMBER OF HOURS WORKED: <input class="form-control pl-2 fc2 ml-1 text-center d-inline text-center" style="color: #000; width: 100px  ;" type="text" value="<?php echo $report_total_hours ?>" disabled=""></h6>
                          </div>
                    </div> 
                    <div class="row s20">
                            <div class="col-3">
                            </div>
                            <div class="col">
                          </div>
                            <div class="col-4">
                            <div class="form-group fg text mb-2 text-center align-middle" style="margin-top:-50px">
                           <img id="student_signature" class="e-sign" height="200" width="200" style="margin-bottom: -90px;margin-top: -50px;position:relative;" src="<?php echo $student_sign ?>" />
                            <input class="form-control fc2 mr-1 p-2 w-75 s14 text-center" type="text" value="<?php echo $report_applicant_name ?>" disabled><br>
                            <label class="control-label mr65 w-100 s14">Student's Signature</label>
                            </div>
                          </div>
                        </div>
                  

                  <div class="row mt-3">
                        <div class="col-sm-12 15">
                          <h6 class="font-weight-bold s14"> III. &emsp;&emsp;&emsp;&emsp;PERFORMANCE RATING:</h6>
                           <h6 class="font-weight-normal text-center align-middle s12" style="color:#000;"> (Legend of rating: Need Improvement, Satisfactory, Excellent)
                           </h6>
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                </thead>
                                <tr>
                                  <th style="border: 1px solid #000 !important; text-align: center; padding-top: 1px; padding-bottom: 1px;" width="50%">CRITERIA</th>
                                  <th style="border: 1px solid #000 !important; text-align:center; padding-top: 1px; padding-bottom: 1px;" width="50%">SUPERVISOR RATING</th>
                                </tr>
                                <tr>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;">Report on duty regularly </th>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;"class="text-center align-middle"><?php echo $duty_regularly ?></th>
                                </tr>
                               <tr>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;">Follow instruction without much difficulty </th>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;"class="text-center align-middle"><?php echo $instruction_difficulty ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;">Utilize time wisely/perform task without delay</th>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;"class="text-center align-middle"><?php echo $time_utilize ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;">Do his/her routine work without being told</th>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;"class="text-center align-middle"><?php echo $routine_work ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;">Shows initiative & creativity in doing the task</th>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;"class="text-center align-middle"><?php echo $initiative_creativity ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;">Accurate & efficient in doing clerical work</th>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;"class="text-center align-middle"><?php echo $accurate_efficient ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;">With good interpersonal relationship</th>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;"class="text-center align-middle"><?php echo $good_interpersonal ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;" >Willing to learn from mistakes and/or new task</th>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;" class="text-center align-middle"><?php echo $willing_learn ?></th>
                                </tr>
                                <tr>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;">Generally have a good working attitude</th>
                                  <th style="border: 1px solid #000 !important; padding-top: 1px; padding-bottom: 1px;"class="text-center align-middle"><?php echo $good_working ?></th>
                                </tr>
                          </table>
                        </div>
                      </div>
                    </div>

                     <div class="row s20">
                            <div class="col-3">
                            </div>
                            <div class="col">
                          </div>
                            <div class="col-4">
                            <div class="form-group fg text mb-2 text-center align-middle">
                            <img id="assessor_signature" class="e-sign" height="150" width="150" style="margin-bottom:-70px; margin-top:-50px; position:relative; margin-right:60px; margin-left: 60px" src="<?php echo $rater_signature ?>" />
                            <input class="form-control fc2 mr-1 p-2 w-75 s14 text-center" type="text" value="<?php echo $unit_head ?>" disabled><br>
                            <label class="control-label mr65 w-100 s14">Rater's Name & Signature</label>
                            </div>
                          </div>
                        </div>

                        <div class="row p-7 ">
                        <div class="col-sm-12">
                          <h6 class="font-weight-bold s14"> IV. &emsp;&emsp;&emsp;&emsp;REMARKS: (from the Dean/Director)<br></h6>
                          <input class="form-control fc w-100 pb-2 pl-2 s14" style="color:#000;" type="text" value="" disabled="">
                          <input class="form-control fc w-100 pb-2 pl-2 s14"  style="color:#000;" type="text" value="" disabled="">
                          <input class="form-control fc w-100 pb-2 pl-2 s14"  style="color:#000;"  type="text" value="" disabled="">
                          </div>
                    </div>
<br>
                     <div class="row s14">
                          <div class="col-3">
                            </div>
                            <div class="col">
                          </div>
                            <div class="col-4">
                            <div class="form-group fg text mb-2 text-center align-middle">
                            <input class="form-control fc2 mr-1 p-2 w-75 s14 text-center" type="text" value="" disabled><br>
                            <label class="control-label mr65 w-100 s14">Dean/Director</label>
                            </div>                          </div>
                        </div>
                    <div class="form-group fg">
                          <label class="control-label cl">Attached:</label> <br>
                          <i class="fas fa-check mr-1"> </i><label class="control-label cl s14">Daily Time Record (DTR)</label>   <br>
                          <i class="fas fa-check mr-1"> </i><label class="control-label cl s14">SL Contract</label>   
                        </div>    

</div>

                  </main>
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
                <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>  <!-- Google analytics script-->
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