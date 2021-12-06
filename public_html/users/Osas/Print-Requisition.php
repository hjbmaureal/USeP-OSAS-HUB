<?php 
  session_start();
  require_once('../../conn.php');
  if (!isset($_SESSION['id'])){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $date_submitted = "";
  $college_unit = "";
  $college_unit_head = "";
  $dept_div = "";
  $dept_div_head = "";
  $no_of_sl = "";
  $service_length = "";
  $quali1 = "";
  $quali2 = "";
  $quali3 = "";
  $skill1 ="";
  $skill2 = "";
  $add_workload = "";
  $reduce_workload = "";
  $saturation = "";
  $other_reason = "";
  $assessed_by = "";
  $status = "";
  $assessor_signature = '../../images/transparentbg.png';

  $requisition_id = $_REQUEST['reqid'];
  $query=mysqli_query($conn,"call MainGetRequisitionFormInfo($requisition_id)");
  while($row=mysqli_fetch_array($query)){
    // $row['head_signature'] = isset($row['head_signature']) ? base64_encode($row['head_signature']) : $row['head_signature'];
    $date_submitted = $row['date_submitted'];
    if ($row['office_type']=='Office'){
      $college_unit = $row['office_name'];
      $college_unit_head = $row['fullname'];
    } else {
      $dept_div = $row['office_name'];
      $dept_div_head = $row['fullname'];
    }
    $no_of_sl = $row['no_of_sl'];
    $service_length = $row['no_of_sl'];
    $quali1 = $row['qualification1'];
    $quali2 = $row['qualification2'];
    $quali3 = $row['qualification3'];
    $skill1 = $row['skill1'];
    $skill2 = $row['skill2'];
    $add_workload = $row['additional_workload_reason'];
    $reduce_workload = $row['reduction_in_workload_reason'];
    $saturation = $row['reached_saturation_reason'];
    $other_reason = $row['other_reason'];
    if ($row['requisition_status']=='Approved' || $row['requisition_status']=='Not Approved' || $row['requisition_status']=='Completed'){
      if ($row['requisition_status']=='Completed'){
        $row['requisition_status'] = 'Approved';
      }
      $assessed_by = $row['assessed_name'];
      $status =  $row['requisition_status'];
      $assessor_signature = 'data:image/jpeg;base64,'.base64_encode($row['assessor_signature']);
    }
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
  </head>
  <body class="app sidebar-mini rtl" style="background-color: #fff;" onload="window.print()">
  <div id="print-container">
                   <div class="row p-5">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th style="border: 2px solid #404040;" class="text-center align-middle" rowspan="5"><img src="../../images/logo.png" width="150px;"></th> 
                                      <th style="border: 2px solid #404040;" rowspan="5" class="text-center">
                                        <span class="fs-11 s17 d-block">Republic of the Philippines</span>
                                        <span style="font-family:Old English Text MT; font-size: 25px;">University of Southeasetern Philippines</span>
                                        <span class="fs-17 s17 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                        <span class="fs-11 s17 d-block">Telephone: (082) 227-8192</span>
                                        <span class="fs-11 s17 d-block">Website: www.usep.edu.ph</span>
                                        <span class="fs-11 s17 d-block">Email: president@usep.edu.ph</span>
                                      </th>  
                                      <th class="fs-11 s17 p-1" style="border: 2px solid #404040; " colspan="">Form No. </th>
                                      <th class="fs-11 s17 p-1" style="border: 2px solid #404040; " colspan="">FM-USeP-HSC-01 </th>
                                    </tr>
                                    <tr>
                                     <th class="fs-11 s17 p-1" style="border: 2px solid #404040; ">Issue Status  </th>
                                     <th class="fs-11 s17 p-1" style="border: 2px solid #404040; "colspan="2">02</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 s17 p-1" style="border: 2px solid #404040; ">Revision No.  </th>
                                     <th class="fs-11 s17 p-1" style="border: 2px solid #404040; " colspan="2">01</th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 s17 p-1" style="border: 2px solid #404040; ">Date Effective  </th>
                                     <th class="fs-11 s17 p-1" style="border: 2px solid #404040; " colspan="2">01 March 2018
                                     </th>
                                   </tr>
                                   <tr>
                                     <th class="fs-11 s17 p-1" style="border: 2px solid #404040; ">Approved by </th>
                                     <th class="fs-11 s17 p-1" style="border: 2px solid #404040; " colspan="2">President
                                     </th>
                                   </tr>
                                   <tr>
                                    <th  style="border-color: black; font-size: 23px; font-weight: bold; border: 2px solid black;" colspan="4" class="text-center p-1 text-b">STUDENT LABOR REQUISITION FORM
                                    </th>
                                  </tr>
                                </thead>
                              </table>
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                </thead>
                                <tr>
                                  <th class="fs-11 s20 p-1"  style="border: 2px solid black;" colspan="2" height="50px;" > 
                                    <p class="fs-11 s20 p-1" style="padding-left: 20px;">Request Date: <?php echo $date_submitted ?></p></th>
                                </tr>
                                <tr>
                                  <th class="fs-11 s20 p-1"  style="border: 2px solid black;" height="80px;" width="50%">
                                   <p class="fs-11 s20 p-1"  style="padding-left: 20px;">College/Unit: <br> <?php echo $college_unit ?></p></th>
                                  <th class="fs-11 s20 p-1" style="border: 2px solid black;"  height="80px;" width="50%">
                                   <p class="fs-11 s20 p-1"  style="padding-left: 20px;">Requested by: Head of Unit/College<br><?php echo $college_unit_head ?></p></th>
                                </tr>
                                <tr>
                                  <th class="fs-11 s20 p-1" style="border: 2px solid black;" height="70px;" >
                                   <p class="fs-11 s20 p-1"  style="padding-left: 20px;">Department/Division: <br><?php echo $dept_div ?></p></th>
                                  <th class="fs-11 s20 p-1" style="border: 2px solid black;" rowspan="2">
                                   <p class="fs-11 s20 p-1"  style="padding-left: 20px;">Requested by: Head of Department/Division<br><?php echo $dept_div_head ?></p></th>
                                </tr>
                                <tr>
                                  <th class="fs-11 s20 p-1" style="border: 2px solid black;" height="70px;" >
                                  <p class="fs-11 s20 p-1"  style="padding-left: 20px;">No. of SL: <input class="form-control fc2 fs-11 s20 p-1 font-weight-bold" type="text" value="<?php echo $no_of_sl ?>" disabled></p></th>
                                </tr>
                                <tr>
                                  <th class="fs-11 s20 p-1" style="border: 2px solid black;">
                                    <p class="fs-11 s20 p-1"  style="padding-left: 20px;">
                                    JOB DETAILS:<br><br>
                                    Tensure: Temporary<br><br>
                                    Length of Service (months): <input class="form-control fc2 fs-11 s20 p-1 font-weight-bold" type="text" value="<?php echo $service_length ?>" disabled>
                                  </p>
                                  </th>
                                  <th class="fs-11 s20 p-1"  style="border: 2px solid black; " height="350px;" >
                                     <p class="fs-11 s20 p-1"  style="padding-left: 20px;">
                                    Qualification required/desired:
                                    <br>
                                    1.) <input class="form-control fc2 fs-11 s20 p-1 font-weight-bold" type="text" value="<?php echo $quali1 ?>" disabled=""><br>
                                     2.) <input class="form-control fc2 fs-11 s20 p-1 font-weight-bold" type="text" value="<?php echo $quali2 ?>" disabled=""><br>
                                     3.) <input class="form-control fc2 fs-11 s20 p-1 font-weight-bold" type="text" value="<?php echo $quali3 ?>" disabled=""><br>
                                   </p>
                                   <br>
                                   <p style="padding-left: 20px;">Special skill (if required:)
                                    <input class="form-control fc2 fs-11 s20 p-1 font-weight-bold" type="text" value="<?php echo $skill1 ?>" disabled="">
                                    <input class="form-control fc2 fs-11 s20 p-1 font-weight-bold" type="text" value="<?php echo $skill2 ?>" disabled="">
                                  </p>

                                </th>
                              </tr>
                              <tr>
                                <th class="fs-11 s20 p-1" style="border: 2px solid black;" height="200px;" >
                                   <p style="padding-left: 20px;">
                                  Reason for requirement: (Tick the appropriate)
                                  <br>
                                  <br>
                                  <?php 
                                    if ($add_workload==1){
                                      echo '<input type="checkbox" class="mr-1" disabled="" checked>';
                                    } else {
                                      echo '<input type="checkbox" class="mr-1" disabled="">';
                                    }
                                  ?>Additional work Load (Quantify it) 
                                  <br>
                                  
                                  <?php 
                                    if ($reduce_workload==1){
                                      echo '<input type="checkbox" class="mr-1" disabled="" checked>';
                                    } else {
                                      echo '<input type="checkbox" class="mr-1" disabled="">';
                                    }
                                  ?>For reduction in work Load (Quantify it)
                                  <br>
                                  
                                  <?php 
                                    if ($saturation==1){
                                      echo '<input type="checkbox" class="mr-1" disabled="" checked>';
                                    } else {
                                      echo '<input type="checkbox" class="mr-1" disabled="">';
                                    }
                                  ?>Existing Members reached saturation level in 
                                  <br class="ml-5"> &emsp;Knowledge and Skill
                                </p>
                                </th>
                                <th class="fs-11 s20 p-1"  style="border: 2px solid black;" height="300px;">
                                 <p style="padding-left: 20px;">
                                 Resignation/Termination/Death/Re-location (for whom)
                                 <br>
                                 Any other reason, please specify
                                 <br>
                                 <?php 
                                  if (strlen($other_reason) > 0) {
                                    echo '<u><span class=" fs-11 s20 p-1 font-weight-bold"></span>'.$other_reason.'</u>';
                                  } else {
                                    echo '
                                       <input class="form-control fc2 w-100 pl-2" type="text" value="" disabled="">
                                       <input class="form-control fc2 w-100 pl-2" type="text" value="" disabled="">
                                       <input class="form-control fc2 w-100 pl-2" type="text" value="" disabled="">
                                      <input class="form-control fc2 w-100 pl-2" type="text" value="" disabled="">
                                       <input class="form-control fc2 w-100 pl-2" type="text" value="" disabled="">
                                    ';
                                  }
                                 ?>
                                
                               </p>
                               </th>
                             </tr>
                             <tr>
                              <th class="fs-11 s20 p-1"  style="border: 2px solid black;"> <p style="padding-left: 20px;">Assessed by: </p></th>
                              <th class="fs-11 s20 p-1 text-center"  style="border: 2px solid black;"> 
                                <img id="assessor_signature" class="e-sign" height="150" width="150" style="margin-bottom:-70px; margin-top:-50px; position:relative; margin-right:60px; margin-left: 60px" src="<?php echo $assessor_signature ?>" />
                                <p class="text-uppercase" style="padding-left: 20px;"><?php echo $assessed_by ?>
                              </p></th>
                            </tr>
                            <tr>
                              <th class="fs-11 s20 p-1"  style="border: 2px solid black;"><p style="padding-left: 20px;">Approved / Not approved:
                              </p></th>
                              <th class="fs-11 s20 p-1 text-center"  style="border: 2px solid black;"><p style="padding-left: 20px;"><?php echo $status ?>
                              </p></th>
                            </tr>
                          </table>
                        </div>


                      </div>
                    </div> 
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