 
   <?php include('../../conn.php');
  /*include 'conn.php';*/
  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'Guidance'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
   $admin_id=$_SESSION['id'];


  $count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where (user_id='$admin_id' or office_id = 4) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}



  if (isset($_POST['create_pdf'])) {
     function fetch_data(){  
      include('conn.php');
      $output = '';  
       $sql="SELECT counselling_evaluation.comments, course.title from counselling_evaluation join student USING(Student_id) join course USING (course_id) where counselling_evaluation.Student_id = student.Student_id";
          if($result = mysqli_query($conn, $sql)){
          while ($row = mysqli_fetch_assoc($result)) {
                                $output.="<tr>
                                  <td>".$row['title']."</td>
                                  <td>".$row['comments']."</td>
                                </tr>";}
                              }
                              return $output;
    }
      $conn = mysqli_connect("localhost", "root", "", "guidance_db");
       $count="SELECT count(counsel_eval_id) as count from counselling_evaluation";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {     
                
            $count =$row["count"];}}
    /*CONVERT FILE TO PDF*/

      require_once('TCPDFmain/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
/*      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  */
      /*$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING); */ 
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(true);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '
          <div class="displayChart">
          <div class="row d-flex justify-content-center" style="margin-top: 20px">
          <div class="col-md-6">
          <div class="tile" style="border-width:2px; border-style: solid;"> 
            <h5 class="title">Quality (Effectiveness) of the Service</h5>
            <h9>Total Number of Respondents:</h9><b>';
              $content .=$count;$content .='</b><br>
            <div>
              <canvas id="myChart"></canvas>
            </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="tile" style="border-width:2px; border-style: solid;">
            <h5 class="title">Timeliness (Waiting Period)</h5>
            <h9>Total Number of Respondents:</h9>
            <b>';$content .=$count;$content .='</b><br>
            <div>
              <canvas id="myChart2"></canvas>
            </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="tile" style="border-width:2px; border-style: solid;">
            <h5 class="title">Student'."'".'s Satisfaction</h5>
            <h9>Total Number of Respondents:</h9>
            <b>';$content .=$count;$content .='</b><br>
            <div>
              <canvas id="myChart3"></canvas>
            </div>
            </div>
          </div>
        </div>
      
      
          <div class="row d-flex justify-content-center">
          <div class="col-md-11">
            <div class="tile">
              <div class="tile-body">
                
                <div class="center"><h5>Other Comments/Suggestions</h5></div>
                <div><h9>Total Number of Respondents:</h9>
            <b>';$content .=$count;$content .='</b><br></div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div class="calldiv">
                  <table class="table table-hover table-bordered" id="sampleTable2">
                    <thead>
                      <tr>
                      <th>Course</th>
                      <th>Comments/Suggestions</th>
                    </tr>
                  </thead>
                  <tbody>';
                    $content .= fetch_data();$content .='</tbody>
                  </table>
                </div>
              </div>
                </div>
              </div>
              </div>
            </div>
          </div>'; 
          $js = <<<EOD
     $(document).ready(function(){
  showGraph();
  showGraph2();
  showGraph3();
});

function showGraph()
        {{
                $.post("EvalReports.php",
                function (data)
                {
                    console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q1);
                        count.push(data[i].count1);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#d4ac6e',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
});
}
  }
function showGraph2()
        {
            {
                $.post("EvalReports2.php",
                function (data)
                {
                    console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q2);
                        count.push(data[i].count2);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#46d5f1',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart2");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
});
}
  }

function showGraph3()
        {
            {
                $.post("EvalReports3.php",
                function (data)
                {
                    console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q3);
                        count.push(data[i].count3);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#46d5f1',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart3");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
});
}
  }
EOD;

$obj_pdf->IncludeJS($js);
      
      $obj_pdf->writeHTML($content);
      ob_end_clean();  
      $obj_pdf->Output('sample.pdf', 'I');



            # code...
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
      <title>USeP Guidance Admin Hub</title>
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
      <body class="app sidebar-mini rtl" onload="initClock()">
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
          <li><a class="app-menu__item" href="Guidance_Admin_Records.php"><i class="app-menu__icon fas fa-vcard"></i><span class="app-menu__label">Student Records</span></a></li>
          <li><a class="app-menu__item" href="Guidance_Appointment.php"><i class="app-menu__icon  fas fa-calendar-check-o"></i><span class="app-menu__label">Appointments</span></a></li>
          <li class="treeview"><a class="app-menu__item active" href="Guidance_Reports.php" data-toggle="treeview"><i class="app-menu__icon  fas fa-line-chart"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Reports.php">Counselling Reports</a></li>
              <li><a class="treeview-item" href="Guidance_GroupGuidance_Reports.php">Group Guidance Reports</a></li>
              <li><a class="treeview-item active" href="Guidance_Evaluation_Reports.php">Evaluation Reports</a></li>
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
      <div><!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      </div>
      <ul class="app-nav">
        <li>
          <a class="appnavlevel">Hi, <?php echo $_SESSION['fullname'] ?></a>
        </li>
        <!-- SEMESTER, TIME, USER DROPDOWN -->
          <?php
            if($result = mysqli_query($conn, "SELECT * FROM list_of_semester where status='Active'")){
              while($row = mysqli_fetch_array($result)){
                $currSemesterYear = $row['semester'] .' '. $row['year'];
                echo '
                  <li>
                    <div class="appnavlevel" style="color: black;">
                      <span class="semesterYear">'.$row['semester'].'</span>
                    </div>
                  </li>
                  <li>
                    <div class="appnavlevel" style="color: black;">
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
                  $count_sql="SELECT * from notif where (user_id=$admin_id or office_id = 4)  order by time desc";
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
                 <li><a class="dropdown-item" href="../../index.php" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
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
              <form action="../../logout.php"><button class="btn btn-primary" name="logout" id="logoutbtn2" type="submit">Logout</button></form>
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

      <!-- Navbar-->
       

         <!--<div class="page-error tile">-->
<form method="POST">
      <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                
                <div>
                <div class="float-left"><h4>COUNSELLING EVALUATION REPORTS</h4></div>
                  </div>
                  <div class="row">
                      <div class="col-sm">
                          <div class="inline-block float ml-2 mt-1">
                            <button class="btn btn-danger btn-sm verify" name="create_pdf"><i class="fas fa-download"></i> Export</button>
                            &nbsp;<button class="btn btn-warning btn-sm verify" id="print-button"><i class="fas fa-print"></i> Print</button>
                            </div>
                      </div>

                </div><br>
                <div class="col-auto">
               <div class="inline-block">
                    Month from: 
                    <select class="bootstrap-select" name="filtermonth" id="filtermonth" >
                        <option class="select-item" value="from" selected="selected">Month from</option>
                        <option class="select-item" value="01">January</option>
                        <option class="select-item" value="02">February</option>
                        <option class="select-item" value="03">March</option>
                        <option class="select-item" value="04">April</option>
                        <option class="select-item" value="05">May</option>
                        <option class="select-item" value="06">June</option>
                        <option class="select-item" value="07">July</option>
                        <option class="select-item" value="08">August</option>
                        <option class="select-item" value="09">September</option>
                        <option class="select-item" value="10">October</option>
                        <option class="select-item" value="11">November</option>
                        <option class="select-item" value="12">December</option>
                      </select>
                    </div>
                    Month to: 
                    <select class="bootstrap-select" name="filtermonth2" id="filtermonth2" disabled>
                        <option class="select-item" value="to" selected="selected">Month to</option>
                        <option class="select-item" value="01">January</option>
                        <option class="select-item" value="02">February</option>
                        <option class="select-item" value="03">March</option>
                        <option class="select-item" value="04">April</option>
                        <option class="select-item" value="05">May</option>
                        <option class="select-item" value="06">June</option>
                        <option class="select-item" value="07">July</option>
                        <option class="select-item" value="08">August</option>
                        <option class="select-item" value="09">September</option>
                        <option class="select-item" value="10">October</option>
                        <option class="select-item" value="11">November</option>
                        <option class="select-item" value="12">December</option>
                      </select>

                      &emsp;&emsp;
                    School Year: 
                        <input type="text" name="filteryear" id="filteryear" style="width: 80px;">
                      -
                        <input type="text" name="filteryear2" id="filteryear2" style="width: 80px;" disabled>
                      </div>
          <div class="displayChart" id="displayChart">
          <div class="row d-flex justify-content-center" style="margin-top: 20px" id="chart1">
          <div class="col-md-6">
          <div class="tile" style="border-width:2px; border-style: solid;"> 
            <div id="label1"><h5 class="title">Quality (Effectiveness) of the Service</h5>
            <h9>Total Number of Respondents:</h9>

            <?php $count="SELECT count(counsel_eval_id) as count from counselling_evaluation";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b><br>
            </div>
            <div>
              <canvas id="myChart"></canvas>
            </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="tile" style="border-width:2px; border-style: solid;">
            <div id="label2"><h5 class="title">Timeliness (Waiting Period)</h5>
            <h9>Total Number of Respondents:</h9>
            <?php $count="SELECT count(counsel_eval_id) as count from counselling_evaluation";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b><br>
            </div>
            <div>
              <canvas id="myChart2"></canvas>
            </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="tile" style="border-width:2px; border-style: solid;">
            <div id="label3"><h5 class="title">Student's Satisfaction</h5>
            <h9>Total Number of Respondents:</h9>
            <?php $count="SELECT count(counsel_eval_id) as count from counselling_evaluation";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b><br>
            </div>
            <div>
              <canvas id="myChart3"></canvas>
            </div>
            </div>
          </div>
        </div>
      
      
          <div class="row d-flex justify-content-center">
          <div class="col-md-11">
            <div class="tile">
              <div class="tile-body" id="tab-label">
                
                <div class="center"><h5>Other Comments/Suggestions</h5></div>
                <div><h9>Total Number of Respondents:</h9>
                <?php $count="SELECT count(counsel_eval_id) as count from counselling_evaluation";
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b><br></div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div class="calldiv">
                  <table class="table table-hover table-bordered" id="sampleTable2">
                    <thead>
                      <tr align="center">
                      <th>Course</th>
                      <th>Comments/Suggestions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
          $sql="SELECT counselling_evaluation.comments, course.title from counselling_evaluation join student USING(Student_id) join course USING (course_id) where counselling_evaluation.Student_id = student.Student_id";
          if($result = mysqli_query($conn, $sql)){
          while ($row = mysqli_fetch_assoc($result)) {
                                echo'<tr>
                                  <td>'. $row['title'].'</td>
                                  <td>'. $row['comments'].'</td>
                                </tr>';}}

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
          </div>
        </div> 
        </div>
        </div>
        </div>
</form>


      </main>

      <!-- Essential javascripts for application to work-->
      <script src="js/jquery-3.3.1.min.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
      <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
      <script type="text/javascript" src="js/jquery.min.js"></script>

<script>
$(document).ready(function(){
  showGraph();
  showGraph2();
  showGraph3();
});

function showGraph()
        {{
                $.post("EvalReports.php",
                function (data)
                {
                    console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q1);
                        count.push(data[i].count1);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#d4ac6e',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
});
}
  }
function showGraph2()
        {
            {
                $.post("EvalReports2.php",
                function (data)
                {
                    console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q2);
                        count.push(data[i].count2);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#46d5f1',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart2");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
});
}
  }

function showGraph3()
        {
            {
                $.post("EvalReports3.php",
                function (data)
                {
                    console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q3);
                        count.push(data[i].count3);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#46d5f1',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart3");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
});
}
  }

$("#print-button").on("click", function () {
           const dataUrl = document.getElementById('myChart').toDataURL();
           const dataUrl2 = document.getElementById('myChart2').toDataURL(); 
           const dataUrl3 = document.getElementById('myChart3').toDataURL();  
            var label1 = document.getElementById('label1');
            var label2 = document.getElementById('label2');
            var label3 = document.getElementById('label3');
            var tablabel = document.getElementById('tab-label');
            var tab = document.getElementById('sampleTable2');
             var filteryear = $("#filteryear").val();
            var filteryear2 = $("#filteryear2").val();
            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table {' +
                'margin-left:48px;' +
                'margin-right:48px;' +
                'border-spacing:0;' +
                'border-collapse: collapse;' +
                'cellpadding:5px;' +
                '}' +
                'table th, table td {' +
                'border:1px solid gray;' +
                'font-size:12px;' +
                '}' +
                '</style>';
            htmlToPrint += tab.outerHTML;
                let windowContent = '<!DOCTYPE html>';
                windowContent += '<html>';
                windowContent += '<head><title align="center">Evaluation Reports</title></head>';
                windowContent += '<body>';
                windowContent += '<div id="title" style="margin-top:48px;"><div align="center"><img src="image/logo.png" alt="USeP Logo" height="100px" width="100px"></div></div>';
                windowContent += '<div id="title"><div align="center" style="font-size:18px;"><b>University of Southeastern Philippines</b><br><i>University Guidance and Assessment Center</i><br><br></div></div>';
                windowContent += '<div align="center" style="font-size:16px;">Counselling Evaluation Summary '+filteryear+'-'+filteryear2+'<br></div><br<br><br>';
                windowContent += '<div style="margin-left:100px;">';
                windowContent += label1.outerHTML;
                windowContent += '</div>';
                windowContent += '<div align="center"><img src="' + dataUrl + '"><br></div>';
                windowContent += '<div style="margin-left:100px;">';
                windowContent += label2.outerHTML;
                windowContent += '</div>';
                windowContent += '<div align="center"><img src="' + dataUrl2 + '"><br></div>';
                windowContent += '<div style="margin-left:100px;"><br><br><br><br><br><br><br><br><br><br><br><br>';
                windowContent += label3.outerHTML;
                windowContent += '</div>';
                windowContent += '<div align="center"><img src="' + dataUrl3 + '"><br></div>';
                windowContent += '<div style="margin-left:100px;">';
                windowContent += tablabel.outerHTML;
                windowContent += '</div>';
                windowContent += htmlToPrint;
                windowContent += '</body>';
                windowContent += '</html>';

    var printWindow = window.open('', '', 'width=' + screen.availWidth + ',height=' + screen.availHeight);                
    printWindow.document.write(windowContent);
    printWindow.document.write("<script src=\'http://code.jquery.com/jquery-1.10.1.min.js\'><\/script>");
    printWindow.document.write("<script>$(window).load(function(){ print(); close(); });<\/script>");
    printWindow.document.close();               
        }); 


</script>

        <script type="text/javascript">
                $(document).ready(function(){
                  /*STATUS*/
                  $("#filtermonth").on('change', function(){
                    var filtermonth = $("#filtermonth").val();
                    var filtermonth2 = $("#filtermonth2").val();
                    var filteryear = $("#filteryear").val();
                    var filteryear2 = $("#filteryear2").val();

                    /*alert(filtermonth2);*/
                    $("#filtermonth2").prop("disabled", false);
                    if (filtermonth=='from') {
                      $("#filtermonth2").prop("disabled", true); 
                    }
                    if (filtermonth2!='to') {
                    $.ajax({
                          url:"Guidance_Evaluation_Report_filter.php",
                          type:"POST",
                          data:{from : filtermonth, to : filtermonth2, fromyear : filteryear, toyear : filteryear2},
                          beforeSend:function(){
                            $(".displayChart").html("Working.....");
                          },
                          success:function(data){
                            $(".displayChart").html(data);
                          },
                    });
                }
                  });
                    $("#filtermonth2").on('change', function(){
                    var filtermonth = $("#filtermonth").val();
                    var filtermonth2 = $("#filtermonth2").val();
                    var filteryear = $("#filteryear").val();
                    var filteryear2 = $("#filteryear2").val();

                    /*alert(filtermonth);*/
                    if (filtermonth!='from') {
                    $.ajax({
                          url:"Guidance_Evaluation_Report_filter.php",
                          type:"POST",
                          data:{from : filtermonth, to : filtermonth2, fromyear : filteryear, toyear : filteryear2},
                          beforeSend:function(){
                            $(".displayChart").html("Working.....");
                          },
                          success:function(data){
                            $(".displayChart").html(data);
                          },
                    });
                }
                  });


                  //Filter Year

                  $("#filteryear").keyup(function(){
                    var filtermonth = $("#filtermonth").val();
                    var filtermonth2 = $("#filtermonth2").val();
                    var filteryear = $("#filteryear").val();
                    var filteryear2 = $("#filteryear2").val();
                    var count= filteryear.length;
                    var count2= filteryear2.length;
                   
                    if (count >= 4) {
                      $("#filteryear2").prop('disabled', false);
                    }
                    if (count >= 4 && count2 >= 4) {
                    $.ajax({
                          url:"Guidance_Evaluation_Report_filter.php",
                          type:"POST",
                          data:{from : filtermonth, to : filtermonth2, fromyear : filteryear, toyear : filteryear2},
                          beforeSend:function(){
                            $(".displayChart").html("Working.....");
                          },
                          success:function(data){
                            $(".displayChart").html(data);
                          },
                    });
                }
                  });

                  $("#filteryear2").keyup(function(){
                    var filtermonth = $("#filtermonth").val();
                    var filtermonth2 = $("#filtermonth2").val();
                    var filteryear = $("#filteryear").val();
                    var filteryear2 = $("#filteryear2").val();
                    var count= filteryear.length;
                    var count2= filteryear2.length;
                
                    if (count >= 4 && count2 >= 4 ) {
                    $.ajax({
                          url:"Guidance_Evaluation_Report_filter.php",
                          type:"POST",
                          data:{from : filtermonth, to : filtermonth2, fromyear : filteryear, toyear : filteryear2},
                          beforeSend:function(){
                            $(".displayChart").html("Working.....");
                          },
                          success:function(data){
                            $(".displayChart").html(data);
                          },
                    });
                }
                  });
                  
                });
              </script>

      <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
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
    </body>
  </html>