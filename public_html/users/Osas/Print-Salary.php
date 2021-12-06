<?php 
  include('../../conn.php');
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Student'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../index.php";';
    echo '</script>';
  }

  $id=$_SESSION['id'];
  $period = $_GET['_period'];
  $report_id = $_GET['_id'];
  $coordinator= $_SESSION['fullname'];
  $name=$_GET['name'];
  $course_year=$_GET['course_year'];
  $assigned_office=$_GET['assigned_office'];
  $supervisor=$_GET['supervisor'];
  $total_hours=$_GET['total_hours'];
  $salary=$_GET['salary'];
  $student_sign = '';
  $coordinator_sign = '';
  $rate= floatval($salary)/floatval($total_hours);

  $query=mysqli_query($conn,"SELECT s.e_signature as student_signature, (SELECT e_signature FROM staff WHERE staff_id = $id) as coordinator_sign FROM sl_dtr_report as r JOIN sl_applicant as a on a.applicant_id = r.applicant_id JOIN student as s on s.Student_id = a.student_id WHERE r.id = $report_id");
  while($row=mysqli_fetch_array($query)){
    $student_sign = ($row['student_signature']==null) ? '../../images/transparentbg.png' :'data:image/jpeg;base64,'.base64_encode($row['student_signature']);
    $coordinator_sign = ($row['coordinator_sign']==null) ? '../../images/transparentbg.png' :'data:image/jpeg;base64,'.base64_encode($row['coordinator_sign']);
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
    @page {
      margin: 2.54cm;
    }
    </style>
  </head>
<body class="app sidebar-mini rtl bg-white" onload="window.print()">
  <div style="width: 99%; margin: 0 auto;">
    <div class="row">
      <div class="col">
        <div class="text-center w-100">
          <img src="../../images/logo.png" width="100px" class="mb-2"> <br>
          <h5 class="s27 oldenglish lh">University of Southeastern Philippines</h5> <br>
          <h4 class="s25 times mb-5">STUDENT LABOR SALARY<br>
          <?php echo $period ?></h4>
        </div>
      </div>
    </div>
<br>
<br>
                         <div class="row s20">
                           <div class="col">
                          </div>
                            <div class="col-sm-6">
                           <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100">Student Labor Name:  <span class="font-weight-bold ml-2"><?php echo $name ?></span> </label>
                            </div>
                            </div>
                            <div class="col">
                          </div>
                            <div class="col-sm-3">
                            <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100"></label>
                            </div>
                          </div>
                            <div class="col-sm-2">
                            <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100"></label>
                            </div>
                          </div>
                        </div>


                         <div class="row s20">
                          <div class="col">
                          </div>
                            <div class="col-sm-6">
                           <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100">Course & Year: <span class="font-weight-bold ml-2"><?php echo $course_year ?></span></label>
                            </div>
                            </div>
                            <div class="col">
                          </div>
                            <div class="col-sm-3">
                            <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100">Rate Per Hour:</label>
                            </div>
                          </div>
                            <div class="col-sm-2">
                            <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100"><?php echo $rate ?></label>
                            </div>
                          </div>
                        </div>
                    
                        <div class="row s20">
                          <div class="col">
                          </div>
                            <div class="col-sm-6">
                           <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100">Assigned Office/Unit:  <span class="font-weight-bold ml-2"><?php echo $assigned_office ?></span></label>
                            </div>
                            </div>
                            <div class="col">
                          </div>
                            <div class="col-sm-3">
                            <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100">Total No. of Hours:</label>
                            </div>
                          </div>
                            <div class="col-sm-2">
                            <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100"><?php echo $total_hours ?></label>
                            </div>
                          </div>
                        </div>

                        <div class="row s20">
                          <div class="col">
                          </div>
                            <div class="col-sm-6">
                           <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100">Immediate Supervisor:   <span class="font-weight-bold ml-2"><?php echo $supervisor ?></span> </label>
                            </div>
                            </div>
                            <div class="col">
                          </div>
                            <div class="col-sm-3">
                            <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100 font-weight-bold">Total Salary Amount:</label>
                            </div>
                          </div>
                            <div class="col-sm-2">
                            <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100 font-weight-bold"><?php echo $salary ?></label>
                            </div>
                          </div>
                        </div>


                        <br><br>
                        <div class="row s20">
                          <div class="col">
                          </div>
                            <div class="col-sm-6">
                           <div class="form-group fg text mb-2 text-left">
                            <label class="control-label mr65 w-100">Prepared By: </label>
                            </div>
                            </div>
                            <div class="col">
                          </div>
                            <div class="col-sm-3">
                          </div>
                            <div class="col-sm-2">
                          </div>
                        </div>

                          <br><br>
                          <div class="row s20">
                            <div class="col-sm-5">
                            <div class="form-group fg text mb-2 text-center align-middle">
                            <img id="student_signature" class="e-sign" height="200" width="200" style="margin-bottom: -90px;margin-top: -90px;position:relative;" src="<?php echo $coordinator_sign ?>" />
                            <input class="form-control fc2 mr-1 p-2 w-75 text-center align-middle s20 text-uppercase" type="text" value="<?php echo $coordinator ?>" disabled><br>
                            <label class="control-label mr65 w-100 font-weight-bold">Coordinator, OSAS </label>
                            </div>
                          </div>
                            <div class="col">
                        </div>
                            <div class="col-sm-6">
                            <div class="form-group fg text mb-2 text-center align-middle">
                            <img id="student_signature" class="e-sign" height="200" width="200" style="margin-bottom: -90px;margin-top: -90px;position:relative;" src="<?php echo $student_sign ?>" />
                            <input class="form-control fc2 mr-1 p-2 w-75 text-center align-middle s20 text-uppercase" type="text" value="<?php echo $name ?>" disabled><br>
                            <label class="control-label mr65 w-100 font-weight-bold">Student's Signature</label>
                            </div>
                          </div>
                          </div>


                      
  </div>
</div>




<!-- Essential javascripts for application to work-->

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="../js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="../js/plugins/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="../js/plugins/sweetalert.min.js"></script>
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
<script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>  <!-- Google analytics script-->
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