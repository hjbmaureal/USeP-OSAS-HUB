<?php 
  include('../../conn.php');
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Student'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $supervisor = $_GET['officer'];
  $studname = $_GET['student_name'];
  $studid = $_GET['student_id'];
  $office = $_GET['assigned'];
  $month = intval($_GET['month']);
  $semyear = $_GET['sem_year'];
  $app_id = intval($_GET['applicant']);
  $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  $data = array();
  $query=mysqli_query($conn,'SELECT applicant_id, date_format(time_in,"%m") as month, date_format(time_in,"%d") as day_of_month, DATE(time_in) AS day, DATE_FORMAT(MIN(IF(date_format(time_in,"%p") = "AM",time_in,null)), "%h:%i %p") as morning_timein, DATE_FORMAT(MAX(IF(date_format(time_out,"%p") = "AM",time_out,null)), "%h:%i %p") as morning_timeout, DATE_FORMAT(MIN(IF(date_format(time_in,"%p") = "PM",time_in,null)), "%h:%i %p") as afternoon_timein, DATE_FORMAT(MAX(IF(date_format(time_out,"%p") = "PM",time_out,null)), "%h:%i %p") as afternoon_timeout, TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(diff))),"%H:%i") as hours_worked, sem_year FROM sl_dtr GROUP BY day HAVING applicant_id = '.$app_id.' and month = '.$month.' and sem_year="'.$semyear.'" ORDER BY day;');
  while($row=mysqli_fetch_array($query)){$data[] = $row;}


  $times = array();

  function AddPlayTime($times) {
      $minutes = 0; //declare minutes either it gives Notice: Undefined variable
      // loop throught all the times
      foreach ($times as $time) {
          list($hour, $minute) = explode(':', $time);
          $minutes += $hour * 60;
          $minutes += $minute;
      }

      $hours = floor($minutes / 60);
      $minutes -= $hours * 60;

      // returns the time already formatted
      return sprintf('%02d hours', $hours);
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
          <img src="../../images/logo.png" width="100px" class="mb-2">
          <h5 class="s27 oldenglish lh">University of Southeastern Philippines</h5>
          <!--<h5 class="s23 times lh-1 fw"><i>Tagum Mabini Campus</i></h5>-->
          <h4 class="s27 times fw mt-3 mb-5">DAILY TIME RECORD</h4>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <h5 class="s18 lh-1 fw ml-1">Name: <?php echo $studname ?></h5>
        <h5 class="s18 lh-1 fw ml-1">Office Assigned: <?php echo $office ?></h5>
        
      </div>
      <div class="col-4">
        <h5 class="s18 lh-1 fw ml-3">Student ID: <?php echo $studid ?></h5>
        <h5 class="s18 lh-1 fw ml-3 ">For the Month of <?php echo $months[$month - 1] ?> <br><small>(<?php echo $semyear ?>)</small></h5>
      </div>
    </div>
    <div class="table-responsive">
      <br>
      <table class="table table-hover table-bordered w-100" id="sampleTable2">
        <thead>
          <tr>
            <th rowspan="2"  class="align-middle text-center" style="width: 80px; border: 2px solid #6b6b6b; padding: 2px;">Day</th>
            <th colspan="2"  style="text-align: center; border: 2px solid #6b6b6b; padding: 2px;">Morning</th>
            <th colspan="2"  style="text-align: center; border: 2px solid #6b6b6b; padding: 2px;">Afternoon</th>
            <th rowspan="2" style="text-align: center; border: 2px solid #6b6b6b; padding: 2px;">Hours Worked<br>(hh:mm)</th>
          </tr>
          <tr>
            <th  style="text-align: center; border: 2px solid #6b6b6b; padding: 2px;">Time In</th>
            <th  style="text-align: center; border: 2px solid #6b6b6b; padding: 2px;">Time Out</th>
            <th  style="text-align: center; border: 2px solid #6b6b6b; padding: 2px;">Time In</th>
            <th  style="text-align: center; border: 2px solid #6b6b6b; padding: 2px;">Time Out</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          for ($i=1; $i <= 31; $i++) { 
            $am_timein = ''; 
            $am_timeout = ''; 
            $pm_timein = ''; 
            $pm_timeout = '';
            $hours = '';

            for ($j=0; $j < count($data); $j++){
              if ($data[$j][2] == $i){
                $am_timein = $data[$j][4];
                $am_timeout = $data[$j][5]; 
                $pm_timein = $data[$j][6]; 
                $pm_timeout = $data[$j][7];
                $hours = $data[$j][8];
                $times[] = $hours;
                break;
              }
            }

            ?>
            <tr>
              <td class="text-center align-middle" style="border: 2px solid #6b6b6b; padding: 2px;"><?php echo $i ?></td>
              <td class="text-center" style="border: 2px solid #6b6b6b; padding: 2px;"><?php echo $am_timein ?></td>
              <td class="text-center" style="border: 2px solid #6b6b6b; padding: 2px;"><?php echo $am_timeout ?></td>
              <td class="text-center" style="border: 2px solid #6b6b6b; padding: 2px;"><?php echo $pm_timein ?></td>
              <td class="text-center" style="border: 2px solid #6b6b6b; padding: 2px;"><?php echo $pm_timeout ?></td>
              <td class="text-center" style="border: 2px solid #6b6b6b; padding: 2px;"><?php echo $hours ?></td>
            </tr>
          <?php } ?>
          <tr>
            <td colspan="5" class="text-right p-2 font-weight-bold mr-2" style="border: 2px solid #6b6b6b;">TOTAL NO. OF HOURS: </td>
            <td colspan="4" class="text-center p-2 font-weight-bold" style="border: 2px solid #6b6b6b;"><?php echo AddPlayTime($times); ?> </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="text-center">
      <h5 class="s18 fw ml-3 mt-1">I hereby certify on my honor that the above is true and correct report of the hours of worked performed, record of which was made daiy at the time of arrival and departure from the office.</h5>
      <div class="form-group fg text-center mt-5">
        <input class="form-control pl-2 s20 fc2 ww300 text-center" style="color: #000;" type="text" value="<?php echo $studname ?>" disabled="">
        <br>
        <label class="control-label cl">Print Name and Signature</label>
      </div>
      <div class="form-group fg text-center mt-3">
        <input class="form-control pl-2 s20 fc2 ww300 text-center" style="color: #000;" type="text" value="<?php echo $supervisor ?>" disabled="">
        <br>
        <label class="control-label cl">In-Charge</label>
      </div>
    </div> 
  </div>
</div>


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