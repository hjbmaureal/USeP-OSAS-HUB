<?php
require_once('tcpdf/tcpdf.php');
include('connect.php');
 include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'Clinic'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($db,"SELECT count(*) as cnt from notif where (user_id='$id' or office_id = 3) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}


 function fetch_data()  
 {
 $output = '';  
  $connect = mysqli_connect("localhost", "root", "", "backupdb-3"); 
  $sql = "SELECT consultation.patient_id,consultation.id,consultation.appointment_meetinglink,course.name,consultation.appointment_timefrom,consultation.consultation_duration,student.phone_number,CONCAT(student.first_name,' ', student.last_name) as name, student.email_add, consultation_type.consultation_type,consultation.communication_mode_first_option,consultation.communication_mode_second_option, consultation.appointment_date, consultation.status,CONCAT(consultation.appointment_timefrom,'-', consultation.consultation_duration) as time from consultation join consultation_type on consultation.consultation_type=consultation_type.type_id join student on consultation.patient_id=student.Student_id join course on student.course_id=course.course_id where consultation.status != 'Pending' AND consultation.status != 'Pending Cancel Request' order by appointment_date DESC";
  $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
    $date =date_create($row['appointment_date']);
      $date1 = date_format($date,"F d, Y");  
      
        $output .= '<tr nobr="true">  
                          <td>'.$row["patient_id"].'</td>  
                          <td>'.$row["name"].'</td>  
                          <td>'.$row["email_add"].'</td>  
                          <td>'.$row["consultation_type"].'</td> 
                          <td>'.$row["communication_mode_first_option"].'</td> 
                          <td>'.$row["communication_mode_second_option"].'</td> 
                          <td>'.$date1.'</td> 
                          <td>'.$row["time"].'</td> 
                          <td>'.$row["status"].'</td> 
                          
               
              
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
       

if(isset($_POST["create_pdf"])) 
  
 { 
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {

      if ($this->numpages < 2 )    {
        // Logo
        $this->Image('image/logo.png', 10, 10, 25, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
    $this->Ln(6);
    // Set font
        $this->SetFont('Calibri', '', 12);
        // Title
        $this->Cell(0, 15, 'Republic of the Philippines', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    $this->Ln(6);
    $this->SetFont('Old English', '', 12);
    $this->Cell(0, 15, 'University of Southeastern Philippines', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    $this->Ln(6);
    // Set font
        $this->SetFont('Calibri', '', 12);
        // Title
        $this->Cell(0, 15, 'Tagum- Mabini Campus', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    $this->Ln(6);
    // Set font
        $this->SetFont('Calibri', '', 12);
        // Title
        $this->Cell(0, 15, 'Apokon, Tagum City', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    
    $this->Ln(16);
    // Set font
        $this->SetFont('Calibri', 'B', 12);
        // Title
        $this->Cell(0, 15, 'LIST OF APPOINTMENTS as of '.date("F d, Y").'', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    
    
    }
    }


    protected $last_page_flag = false;

    public function Close() {
        $this->last_page_flag = true;
        parent::Close();
    }


     // Page footer
    public function Footer() {
  if(!isset($_SESSION)) { 
  session_start(); 
}
    if ($this->last_page_flag) {

    $connect = mysqli_connect("localhost", "root", "", "backupdb-3"); 
    $id=$_SESSION['id'];
    $sql="Select * from staffdetails where office_name='Clinic' AND type='Coordinator'";
    $res = $connect->query($sql);
    
     if($row=mysqli_fetch_array($res)) {
   $title1= $row['title'];
   $name1= $row['fullname'];
   $extension1= $row['extension'];
   $position1= $row['position'];
     $this->SetY(-48);
     $this->SetX(210);
     $this->SetFont('Calibri', 'B', 12);
    $this->Cell(0, 0, 'Prepared By:', 0, false, '', 0, '', 0, false, 'M', 'M');
    $this->SetY(-35);
    $this->Ln(8);
    $this->SetX(230);
    $this->SetFont('Calibri', 'B', 12);
    $this->Cell(0,0, ''.$title1.' '. $name1.' '.$extension1.'', 0, false, '', 0, '', 0, false, 'M', 'M');
    $this->Ln(8);
     $this->SetX(235);
     $this->SetFont('Calibri', '', 12);
    $this->Cell(0,0,'Asst. '.$position1.'/Instructor I', 0, false, '', 0, '', 0, false, 'M', 'M');
     $this->SetY(-15);
     
     $this->SetFont('calibri', 'I', 10);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
  }
}
}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('List of Appointments '.date("F d, Y").'');
$pdf->SetSubject('Appointments');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('Helvetica', '', 12);

// add a page
$pdf->AddPage('L','Legal');
$pdf->Ln(36);
    $content = '<table border="1" cellspacing="0" cellpadding="5">  
         
                  <tr>
                    <th width="10%" align="center"><b>Patient ID</b></th>
                    <th width="12%" align="center"><b>Full Name</b></th>
                    <th width="10%" align="center"><b>Email</b></th>
                    <th width="10%" align="center"><b>Type of Consultation</b></th>
                    <th width="15%" align="center"><b>Mode of Communication(1st Option)</b></th>
                    <th width="15%" align="center"><b>Mode of Communication(2nd Option)</b></th>
                    <th width="10%" align="center"><b>Date of Appointment</b></th>
                    <th width="10%" align="center"><b>Time</b></th>
                    <th width="10%" align="center"><b>Status</b></th>
          
                  </tr>
          ';   
      $content .= fetch_data();  
      $content .= '</table>'; 
     $pdf->writeHTML($content);  
      $pdf->Output('List-of-Appointments '.date("F d, y").'.pdf', 'I');  


// ---------------------------------------------------------

//Close and output PDF document


//============================================================+
// END OF FILE
//============================================================+
}
?>
<!DOCTYPE html>
  <html lang="en">
    <head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/js/bootstrap-datetimepicker.js"></script>
<link href="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!--set appointment modal-->
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
      <title>USeP Clinic Admin Hub</title>
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
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    
    </head>
      <body class="app sidebar-mini rtl" onload="initClock()">
      <!-- Navbar-->

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
        
     <header class="app-header">
    
   
      </header>

      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="image/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">USEP CLINIC</p>
          </div>
        </div>

        <hr>

       <ul class="app-menu font-sec">
       
          <li><a class="app-menu__item" href="Admin-Dashboard.php"><i class="app-menu__icon fa fa-chart-bar"></i><span class="app-menu__label">Dashboard</span></a></li>
           <li><a class="app-menu__item" href="Admin-PatientList.php"><i class="app-menu__icon fas fa-user-alt"></i><span class="app-menu__label">Patient</span></a></li>


          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Consultation</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-NewConsultation.php">New Consultation</a></li>
              <li><a class="treeview-item" href="Admin-ListOfConsultation.php">List of Consultation</a></li>
            </ul>
          </li>

           <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-calendar"></i><span class="app-menu__label">Appointment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item active" href="Admin-Appointment.php">List of Appointment</a></li>
              <li><a class="treeview-item" href="Admin-CancellationOfAppointment.php">Cancellation of Appointment</a></li>
            </ul>
          </li>
     
          <li><a class="app-menu__item" href="Admin-Prescription.php"><i class="app-menu__icon fas fa-prescription"></i><span class="app-menu__label">Prescription</span></a></li>

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-file-medical"></i><span class="app-menu__label">Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Request.php">Medical Certificate</a></li>
              <li><a class="treeview-item" href="Admin-MedicalRecordCert.php">Medical Records Certification</a></li>
            </ul>
          </li>


          <li class="p-2 sidebar-label"><span class="app-menu__label">INVENTORY</span></li>

           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-tools"></i><span class="app-menu__label">Equipment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Supplies&Equipment.php">Supply & Equipment List</a></li>
              <li><a class="treeview-item" href="Admin-Stock-Supplies&Equipment.php">Inventory</a></li>
            </ul>
          </li>

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-clipboard-list"></i><span class="app-menu__label">Item</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ItemUnit.php">Item Unit</a></li>
              <li><a class="treeview-item" href="Admin-ItemList.php">Item List</a></li>
              <li><a class="treeview-item" href="Admin-ItemInventory.php">Item Inventory</a></li>
              <li><a class="treeview-item" href="Admin-ItemStock.php">Overall Stock</a></li>
            </ul>
          </li>

          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Admin-MedicalPersonnel.php"><i class="app-menu__icon  fas fa-user-nurse"></i><span class="app-menu__label">Medical Personnel</span></a></li>
          <li><a class="app-menu__item" href="Clinic_Admin_Announcements.php"><i class="app-menu__icon fas fa-bullhorn"></i><span class="app-menu__label">Announcement</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-notes-medical"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ConsultationReports.php">Consultation Reports</a></li>
              <li><a class="treeview-item" href="Admin-RequestReports.php">Request Reports</a></li>
              <li><a class="treeview-item" href="Admin-ServicesSummaryReports.php">Medical Services Summary Reports</a></li>
              <li><a class="treeview-item" href="Admin-DentalSummaryReports.php">Dental Services Summary Reports</a></li>
            </ul>
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
            if($result = mysqli_query($db, "SELECT * FROM list_of_semester WHERE status = 'Active'")){
              while($row = mysqli_fetch_array($result)){
                $currSemesterYear = $row['semester'] .' '. $row['year'];
                echo '
                  <li>
                    <div class="appnavlevel" style="color:black;">
                      <span class="semesterYear">'.$row['semester'].'</span>
                    </div>
                  </li>
                  <li>
                    <div class="appnavlevel"style="color:black;">
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
                  $count_sql="SELECT * from notif where (user_id=$id or office_id = 3)  order by time desc";
                  $result = mysqli_query($db, $count_sql);
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
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
       
  
<script>
        (function(document) {
            'use strict';

            var TableFilter = (function(myArray) {
                var search_input;

                function _onInputSearch(e) {
                    search_input = e.target;
                    var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                    myArray.forEach.call(tables, function(table) {
                        myArray.forEach.call(table.tBodies, function(tbody) {
                            myArray.forEach.call(tbody.rows, function(row) {
                                var text_content = row.textContent.toLowerCase();
                                var search_val = search_input.value.toLowerCase();
                                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                            });
                        });
                    });
                }

                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('bootstrap-select');
                        myArray.forEach.call(inputs, function(input) {
                            input.oninput = _onInputSearch;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    TableFilter.init();
                }
            });

        })(document);
    </script>

  <?php include('connect.php');
?>
         <!--<div class="page-error tile">-->

       <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <h3 class="mb-3 line-head">Appointment</h3>
                  </div>
                  <br>
                  <div class="row">
                   <div class="col-auto">

                     
                 <div class="inline-block">
                    <b>Consultation type</b>
                    <br>
                    <select  name="type" id="type" class="bootstrap-select" data-table="reports-list" style="height: 35px;width: 160px">
                   <option value="">All</option>
                                                 <?php
                    // Feching active consultation type
                    $sql=mysqli_query($db,"select * from consultation_type where status='Active'");
                    while($result=mysqli_fetch_array($sql))
                    {    
                    ?>
                    <option class="select-item" value="<?php echo htmlentities($result['consultation_type']);?>"><?php echo htmlentities($result['consultation_type']);?></option>
                    <?php }
                    
                    ?>
                    </select> 
                    </div>


                      &emsp;

                    <div class="inline-block">
                    <b>Mode of Communication</b> <br>
                       <select  name="mode" id="mode" class="bootstrap-select" data-table="reports-list" style="height: 35px;width: 160px">
                    <option value="">All</option>
                                                     <?php
                        // Fetching active mode of communication
                        $sql1=mysqli_query($db,"select * from mode_of_communication");
                        while($result=mysqli_fetch_array($sql1))
                        {    
                        ?>
                    <option class="select-item" value="<?php echo htmlentities($result['communication_mode']);?>"><?php echo htmlentities($result['communication_mode']);?></option>
                    <?php }
                    
                    ?>
                    </select>  
                    </div>

                     &emsp;
                                 
                    <div class="inline-block">
                    <b>Status</b>
                    <br>
                    <select class="bootstrap-select" id="myInput" data-table="reports-list" style="height: 35px;width: 160px">
                        <option class="select-item" value="" selected="selected">All</option>
                        <option class="select-item" value="Approved">Approved</option>
                        <option class="select-item" value="Completed">Completed</option>
                   
                      </select>
                    </div>
                    

                      </div>
                      <div class="col">
                        <br>
                      <form method="post">
                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify" name="create_pdf" type="submit" onClick="Export()"><i class="fas fa-download"></i> Export</button></div>  </form>  
                      </div>

                  </div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered reports-list" id="sampleTable2">

                    <thead>
                      <tr>
                
                      <th>Patient ID</th>
                      <th class="max">Full Name</th>
                      <th>Email</th>
                      <th>Type of Consultation</th>
                      <th>Mode of Communication (First Option)</th>
                      <th>Mode of Communication (Second Option)</th>
                      <th>Date of Appointment</th>
                      <th>Time</th>
                      <th>Status</th>
                      <th class="max">Action</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 

          
      $sql = "SELECT consultation.patient_id,consultation.id,consultation.messenger,consultation.appointment_meetinglink,course.name,consultation.appointment_timefrom,consultation.consultation_duration,student.phone_number,CONCAT(student.first_name,' ', student.last_name) as name, student.email_add, consultation_type.consultation_type,consultation.communication_mode_first_option,consultation.communication_mode_second_option, consultation.appointment_date, consultation.status,CONCAT(consultation.appointment_timefrom,'/', consultation.consultation_duration) as time from consultation join consultation_type on consultation.consultation_type=consultation_type.type_id join student on consultation.patient_id=student.Student_id join course on student.course_id=course.course_id where consultation.status != 'Pending' AND consultation.status != 'Pending Cancel Request' order by appointment_date DESC";
      $res = $db->query($sql);
      $cnt=1;
      if ($res->num_rows > 0) {
      while($row = $res->fetch_assoc()) {
      $date =date_create($row['appointment_date']);
      $date1 = date_format($date,"F d, Y");
        ?>
                    <tr>
            <td><?php echo htmlentities($row['patient_id']);?></td>
          <td> <?php echo htmlentities($row['name']);?></td>
          <td><?php echo htmlentities($row['email_add']);?></td>
          <td><?php echo htmlentities($row['consultation_type']);?></td>
          <td> <?php echo htmlentities($row['communication_mode_first_option']);?></td>
          <td> <?php echo htmlentities($row['communication_mode_second_option']);?></td>
          <td><?php echo $date1 ;?></td>
           <td><?php echo htmlentities($row['time']);?></td>
           <td><?php echo htmlentities($row['status']);?></td>

                      <td class="max">
                        <a class="btn btn-info btn-sm" data-toggle="modal"  href="#exampleModalLong<?php echo $row['id']; ?>"><i class="fas fa-eye"></i></a><?php include('appointment_summary.php'); ?>

                         <?php if ($row['status'] == "Completed"){ 
           
            ?>
                       
                        <a class="btn btn-warning btn-sm" disabled="disabled"><i class="fas fa-edit" style="color: white"></i></a>
                        <?php }else{
            ?>

                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalLong2<?php echo $row['id']; ?>"><i class="fas fa-edit" style="color: white"></i></a>


                        <?php }
                        include('reschedule.php'); ?>
                     
                      </td>
                    </tr>
                   
            <?php }}
      
        ?>
         </tbody>

<?php 

include_once('connect.php');
  if(isset($_POST['reschedule'])){      
   $pat_id= $_POST['id'];
   $patient_id= $_POST['patient_id'];
   $name= $_POST['name']; 
   $mode=$_POST['mode'];
  $mode2=$_POST['mode2'];
   $type=$_POST['type'];
   $date=$_POST['appdate'];
   $_date=date_format( new DateTime($date),"Y-m-d");
   $duration = date('Y-m-d H:i:s', strtotime($date . ' + 30 minute'));
   $date2=date_format( new DateTime($date),"F d, Y");
   $date12=date_format( new DateTime($date),"h:i a");
   $_date12=date_format( new DateTime($date),"H:i");
   $duration2=date_format( new DateTime($duration),"h:i a");
   $_duration2=date_format( new DateTime($duration),"H:i");
   $link= $_POST['link'];
   $email =$_POST['email'];
   $name = $_REQUEST['name'];
   // var_dump("select * from consultation where appointment_date='$_date'  AND  ((appointment_timefrom between '$_date12'  AND '$_duration2') OR (consultation_duration between '$_date12'  AND '$_duration2')) AND id != $pat_id;");
   $sql1=mysqli_query($db,"select * from consultation where appointment_date='$_date'  AND  ((appointment_timefrom between '$_date12'  AND '$_duration2') OR (consultation_duration between '$_date12'  AND '$_duration2')) AND id != $pat_id;");
   
 if(mysqli_num_rows($sql1)>0)
 {
  $con_date = '';
  $con_from = '';
  $con_duration = '';
  while($result=mysqli_fetch_array($sql1)){

    $con_date = $result['appointment_date'];
    $con_from = $result['appointment_timefrom'];
    $con_duration = $result['consultation_duration'];
  }
  $text = "The chosen schedule : $date will conflict with a schedule set for $con_from - $con_duration";
  echo '<script>
      swal({
      title: "Conflict Schedule!",
      text: "The chosen schedule : '.$date.' will conflict with a schedule set for '.$con_from.' - '.$con_duration.'",
      type:"error",
      icon: "error",
      button: false,
      closeOnClickOutside: false,
      closeOnEsc: false,
      })
     </script>';
 }
 else
 {
   $sql = "Update consultation set appointment_date='$date',consultation_duration='$duration', appointment_timefrom='$date'  where id='$pat_id'"; 
   if ($db->query($sql) === TRUE) {
 echo '<script>
      swal({
      title: "Appointment rescheduled successfully!",
      text: "Server Request Successful!",
      type:"success",
      icon: "success",
      button: false,
      timer:8000,
      closeOnClickOutside: false,
      closeOnEsc: false,
      }).then(function() {
    window.location = "Admin-Appointment.php";
  })
     </script>';
    $from_name = "Therese Joy Inso";        
    $from_address = "tjbinso@usep.edu.ph";        
    $to_name = "Teejay";   
  $startTime =$date ;
    $endTime= $duration;      
    $to_address = $email;     
  $subject = "Appointment Schedule";   
  $description = "Appointment schedule";    
  $location = ""; 
  $domain = 'gmail.com';
  
  //Create Email Headers
    $mime_boundary = "----Meeting Booking----".MD5(TIME());

    $headers = "From: ".$from_name." <".$from_address.">\n";
    $headers .= "Reply-To: ".$from_name." <".$from_address.">\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
    $headers .= "Content-class: urn:content-classes:calendarmessage\n";
    
    //Create Email Body (HTML)
    $message = "--$mime_boundary\r\n";
    $message .= "Content-Type: text/html; charset=UTF-8\n";
    $message .= "Content-Transfer-Encoding: 8bit\n\n";
    $message .= "<html>\n";
    $message .= "<body>\n";
    
    $message .= 'Good day  '.$name.',';
  $message .= "<br><br>\n \n";
  $message .= 'Your appointment has been rescheduled and is set on  '.$date2.' at '.$date12.' to '.$duration2.'. You selected '.$mode2.' and '.$mode.' as your modes of communication.';
  if($mode=="Google Meet" || $mode2=="Google Meet"){
  $message .= 'Click the meeting link  '.$link.' at the specified time to start your consultation.';
  }else if($mode=="Zoom" || $mode2=="Zoom"){
  $message .= 'Click the meeting link  '.$link.' at the specified time to start your consultation.';
  }else if($mode=="Cellphone" || $mode2=="Cellphone"){
  $message .= 'The Clinic will contact you directly via phone. Please be ready at your schedule.';
  }else if($mode=="Messenger" || $mode2=="Messenger"){
  $message .= 'The Clinic will contact you directly via your messenger. Please be guided that you registered correctly your messenger account on the system.';
  }else{
  }
  $message .="<br><br> \n \n";
  $message .=' Sincerely,';
  $message .="<br> \n ";
  $message .='USeP Tagum-Mabini Clinic';
  
    $message .= "</body>\n";
    $message .= "</html>\n";
    $message .= "--$mime_boundary\r\n";

  //Event setting
    $ical = 'BEGIN:VCALENDAR' . "\r\n" .
    'PRODID:-//Microsoft Corporation//Outlook 10.0 MIMEDIR//EN' . "\r\n" .
    'VERSION:2.0' . "\r\n" .
    'METHOD:REQUEST' . "\r\n" .
    'BEGIN:VTIMEZONE' . "\r\n" .
    'TZID:Asia/Manila' . "\r\n" .
    'BEGIN:STANDARD' . "\r\n" .
    'DTSTART:20091101T020000' . "\r\n" .
    'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=1SU;BYMONTH=11' . "\r\n" .
    'TZOFFSETFROM:+0800' . "\r\n" .
    'TZOFFSETTO:-0500' . "\r\n" .
    'TZNAME:PHT' . "\r\n" .
    'END:STANDARD' . "\r\n" .
    'BEGIN:DAYLIGHT' . "\r\n" .
    'DTSTART:20090301T020000' . "\r\n" .
    'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=2SU;BYMONTH=3' . "\r\n" .
    'TZOFFSETFROM:+0800' . "\r\n" .
    'TZOFFSETTO:-0400' . "\r\n" .
    'TZNAME:PHT' . "\r\n" .
    'END:DAYLIGHT' . "\r\n" .
    'END:VTIMEZONE' . "\r\n" .  
    'BEGIN:VEVENT' . "\r\n" .
    'ORGANIZER;CN="'.$from_name.'":MAILTO:'.$from_address. "\r\n" .
    'ATTENDEE;CN="'.$to_name.'";ROLE=REQ-PARTICIPANT;RSVP=TRUE:MAILTO:'.$to_address. "\r\n" .
    'LAST-MODIFIED:' . date("Ymd\TGis") . "\r\n" .
    'UID:'.date("Ymd\TGis", strtotime($startTime)).rand()."@".$domain."\r\n" .
    'DTSTAMP:'.date("Ymd\TGis"). "\r\n" .
    'DTSTART;TZID="Asia/Manila":'.date("Ymd\THis", strtotime($startTime)). "\r\n" .
    'DTEND;TZID="Asia/Manila":'.date("Ymd\THis", strtotime($endTime)). "\r\n" .
    'TRANSP:OPAQUE'. "\r\n" .
    'SEQUENCE:1'. "\r\n" .
    'SUMMARY:' . $subject . "\r\n" .
    'LOCATION:' . $location . "\r\n" .
    'CLASS:PUBLIC'. "\r\n" .
    'PRIORITY:5'. "\r\n" .
    'BEGIN:VALARM' . "\r\n" .
    'TRIGGER:-PT15M' . "\r\n" .
    'ACTION:DISPLAY' . "\r\n" .
    'DESCRIPTION:Reminder' . "\r\n" .
    'END:VALARM' . "\r\n" .
    'END:VEVENT'. "\r\n" .
    'END:VCALENDAR'. "\r\n";
    $message .= 'Content-Type: text/calendar;name="meeting.ics";method=REQUEST'."\n";
    $message .= "Content-Transfer-Encoding: 8bit\n\n";
    $message .= $ical;

    if(mail($to_address, $subject, $message, $headers)){
        echo "<script type='text/javascript'> document.location = 'appointment.php'; </script>";
    }else{
        echo "error";
    }
 
} else {
  echo '<script>
      swal({
      title: "Something went wrong...",
      text: "Server Request Failed!",
      type:"error",
      icon: "error",
      button: false,
      timer:2000,
      closeOnClickOutside: false,
      closeOnEsc: false,
      })
     </script>';
}
 echo"<meta http-equiv='refresh' content='2'>";
}
}
   ?>

              </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>  

      

        

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  
      <script>
        <!-- table selection -->
          $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});
      </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
            <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('sampleTable2'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
          
          header: function(currentPage, pageCount, pageSize) {
        return [
            { image: 'image/logo.png', height: 30, width: 100 }
        ]
    },
    footer: function(currentPage, pageCount, pageSize) {
        return [
            { image: 'image/logo.png', height: 30, width: 100 }
        ]
    },   
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Appointments.pdf");
                }
            });
        }
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
    </body>
  </html>