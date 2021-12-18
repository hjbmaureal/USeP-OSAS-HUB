 <!DOCTYPE html>
  <html lang="en">
  <?php
  session_start();
  require_once('tcpdf/tcpdf.php');
  include('connect.php');
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'Clinic'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($db,"SELECT count(*) as cnt from notif where (user_id='$id' or office_id = 3) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}


function timeago($datetime, $full = false) {
  date_default_timezone_set('Asia/Manila');
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);
  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;
  $string = array(
    'y' => 'yr',
    'm' => 'mon',
    'w' => 'week',
    'd' => 'day',
    'h' => 'hr',
    'i' => 'min',
    's' => 'sec',
  );
  foreach ($string as $k => &$v) {
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    } 
    else {
      unset($string[$k]);
    }
  }
  if (!$full) {
    $string = array_slice($string, 0, 1);
  }
  
  return $string ? implode(', ', $string) . '' : 'just now';
}

//-------------------------------------fetch-content
 function fetch_data()  
 {
 $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "backupdb-3"); 
 $sql = "SELECT * FROM patient_list";
  $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
        $date =date_create($row['date_requested']);
        $date1 = date_format($date,"F d, Y"); ;  
      
        $output .= '<tr>  
                          <td>'.$row["patient_id"].'</td>  
                          <td>'.$row["first_name"].'</td>  
                          <td>'.$row["address"].'</td>  
                          <td>'.$row["email_add"].'</td>  
                          <td>'.$row["phone_number"].'</td>
                          <td>'.$row["course_department"].'</td> 
   
                     </tr>   
                          ';  
      }  
      return $output;  
 }  

//------------------------------------PDF

if(isset($_POST["crt_pdf"])){ 
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
        $this->Cell(0, 15, 'LIST OF PATIENTS as of '.date("F d, Y").'', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    
    
    }
    }


    protected $last_page_flag = false;

    public function Close() {
        $this->last_page_flag = true;
        parent::Close();
    }


    // Page footer
    public function Footer() {


    if ($this->last_page_flag) {

    $connect = mysqli_connect("localhost", "root", "", "backupdb-3"); 
    $sql2="Select * from staffdetails where office_name='Clinic' AND type='Coordinator'";
    $res = $connect->query($sql2);
     if($row=mysqli_fetch_array($res)) {
   $title1= $row['title'];
   $name1= $row['fullname'];
   $extension1= $row['extension'];
   $position1= $row['position'];

     $this->SetY(-48);
     $this->SetX(210);
      $this->SetFont('Calibri', 'B', 12);
    $this->Cell(0, 0, 'Prepared By:', 0, false, '', 0, '', 0, false, 'M', 'M');
    $this->Ln(8);
    $this->SetX(230);
     $this->SetFont('Calibri', '', 12);
    $this->Cell(0,0, ''.$title1.' '. $name1.' '.$extension1.'', 0, false, '', 0, '', 0, false, 'M', 'M');
    $this->Ln(8);
    $this->SetX(235);
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
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('List of Patient '.date("F d, Y").'');
$pdf->SetSubject('TCPDF Tutorial');
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
                    <th width="10%" align="center"><b>ID Number</b></th>
                    <th width="10%" align="center"><b>Patient Name</b></th>
                    <th width="30%" align="center"><b>Adress</b></th>
                    <th width="20%" align="center"><b>Email</b></th>
                    <th width="15%" align="center"><b>Contact Number</b></th>
                    <th width="18%" align="center"><b>Course/Department</b></th>
          
                  </tr>
          ';   
      $content .= fetch_data();  
      $content .= '</table>'; 
     $pdf->writeHTML($content); 
     ob_end_clean(); 
      $pdf->Output('List_of_Patient'.date("F d, y").'.pdf', 'I');  


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
}


  ?>
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
      <title>USeP Clinic Hub</title>
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
           <li><a class="app-menu__item active" href="Admin-PatientList.php"><i class="app-menu__icon fas fa-user-alt"></i><span class="app-menu__label">Patient</span></a></li>


          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Consultation</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-NewConsultation.php">New Consultation</a></li>
              <li><a class="treeview-item" href="Admin-ListOfConsultation.php">List of Consultation</a></li>
            </ul>
          </li>

           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-calendar"></i><span class="app-menu__label">Appointment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Appointment.php">List of Appointment</a></li>
              <li><a class="treeview-item" href="Admin-CancellationOfAppointment.php">Cancellation of Appointment</a></li>
            </ul>
          </li>
     
          <li><a class="app-menu__item" href="Admin-Prescription.php"><i class="app-menu__icon fas fa-prescription"></i><span class="app-menu__label">Prescription</span></a></li>

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-file-medical"></i><span class="app-menu__label">Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Request.php">Medical Certificate</a></li>
              <li><a class="treeview-item" href="Admin-MedicalRecordCert.php">Medical Records Certification</a></li>
              <li><a class="treeview-item" href="Admin-RequestHistory.php">Request History</a></li>
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
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
       
   <?php  
                                  
                                // Import the file where we defined the connection to Database.     
                                    require_once "config.php";   
                                
                                    $per_page_record = 100;  // Number of entries to show in a page.   
                                    // Look for a GET variable page if not found default is 1.        
                                    if (isset($_GET["page"])) {    
                                        $page  = $_GET["page"];    
                                    }    
                                    else {    
                                      $page=1;    
                                    }    
                                
                                    $start_from = ($page-1) * $per_page_record;     
                                
                                    $query = "SELECT * FROM patient_list LIMIT $start_from, $per_page_record";     
                                    $rs_result = mysqli_query($mysqli, $query);   //and conn kay mao na ang sa variable sulod sa config 
                                ?> 


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

       <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <h3 class="mb-3 line-head">Patient List</h3>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-auto">

                     
                  <div class="inline-block">
                    <b>Course/Department</b>
                    <br>
                        <select class="bootstrap-select" data-table="reports-list" style="height: 35px;width: 260px">
                        <option class="select-item" value="1" selected="selected">All</option>

                         <?php
                                                  
                                                  $sql1=mysqli_query($db,"select dept_name from department UNION SELECT ALL title FROM course where status='Active'");
                                                  while($result=mysqli_fetch_array($sql1))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['dept_name']);?>"><?php echo htmlentities($result['dept_name']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                    </select>
                    </div>
                   </div>
                       <div class="col">
                         <form method="post">
                          <br>
                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify" name="crt_pdf" type="submit"><i class="fas fa-download"></i> Export</button></div>
                      </div>


                  </div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div id="table_clone" style="display: compact; border-color:#000000;">
        <table  class="head">
      <thead>
      <tr>
        <th rowspan="5"><img src="image/logo.png" width="100"></th>
      </tr>
        <th colspan="7"><h4 style="font-family: Arial;"><center>Republic of the Philippines</center></h4></th>
      </tr>
      <tr>
        <th colspan="7"><h4 style="font-family: Old English Text MT;"><center>University of Southeastern Philippines</center></h4></th>
      </tr>
      <tr>
        <th colspan="7"><h4 style="font-family: Arial;"><center>Tagum-Mabini Campus</center></h4></th>
      </tr>
      <tr>
        <th colspan="7"><h4 style="font-family: Arial;"><center>Apokon, Tagum City</center></h4></th>
      </tr>
      <tr>
        <th rowspan="5"><img src="image/logo.png" width="100" hidden=""></th>
      </tr>
      <tr>
  
      <th width="100"></th>
      <th width="100"></th>
      <th width="100"></th>
      <th width="100"></th>
      <th width="100"></th>
      <th width="100"></th>
      </tr>
      
      </thead>
      </table>
      <table class="heads" style="border-collapse: collapse;">
      <tr>
      <th width="120"></th>
      <th width="120"></th>
      <th width="120"></th>
      <th width="120"></th>
      <th width="120"></th>
      <th width="120"></th>
      </tr>
      <tr>
        <th colspan="8" style="font-family: Arial; color: red;"><h4 style="font-size: 16px;"><center>Patient List</center></h4></th>
      </tr>
      </table>
                  
                  <table class="table table-hover table-bordered reports-list" id="sampleTable2">
                    <thead>
                     <tr>
                      
                    <th>Patient ID</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th class="max">Course / Department</th>
                    <th class="max";>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                                        <?php  

                                        while ($row = mysqli_fetch_array($rs_result)) {  
                                              // Display each field of the records.    
                                        ?> 

                                      <tr>
                                          
                                        <td><?php echo $row["patient_id"]; ?></td>                                    
                                        <td><?php echo $row["first_name"]; ?>&emsp;</td>
                                        <td><?php echo $row["address"]; ?></td>
                                        <td><?php echo $row["email_add"]; ?></td> 
                                        <td><?php echo $row["phone_number"]; ?></td> 
                                        <td><?php echo $row["course_department"]; ?></td>
                                          
                                     <td>

            <a class="btn btn-info btn-sm" href="user-profiles.php?patient_id=<?php echo $row["patient_id"] ?>" target="_blank"><i class="fas fa-eye"></i></a>
          <!--<a class="btn btn-warning btn-sm" data-toggle="modal" href="#HRModal<?php echo $row["patient_id"] ?>"><i class="fa fa-plus"></i></a>-->
            <a class="btn btn-warning btn-sm" data-toggle="modal" href="#HRModal<?php echo $row["patient_id"] ?>"><i class="fas fa-edit"></i></a>  
          
                                          <?php include('HRModal.php'); ?>
                                          
                                            </td>
                                        </tr>
                                       <?php  

                                            };    
                                        ?>

                    </tbody>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('sampleTable2'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Patient-List.pdf");
                }
            });
        }
    </script>
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
      <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
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

<script>
    $('#print_att').click(function(){
    var _c = $('#table_clone').html();
    var ns = $('noscript').clone();
    var nw = window.open('','_blank','width=900,height=600')
    nw.document.write(_c)
    nw.document.write(ns.html())
    nw.document.close()
    nw.print()
    setTimeout(() => {
      nw.close()
    }, 500);
    
  })
</script>
<style>

@media screen{
.head{
display:none;}
.heads{
display:none;}
  
.tit{
display:none;}
h2{
display:none;}
tfoot{
display:none;}
}
@media print{
.head{
margin-top:-100%;
display:table-header-group;
margin-bottom:5px;}

table{
 font-size: 10px;
 font-family: Arial;
 
}


 
}

@page{
margin-top:-1cm; 
margin-left:1cm;
margin-right:1cm;
margin-bottom:1.5cm;
}
}
</style>
<noscript>
  
<table style="margin-top:8%;">
<tr>
<td><b> &emsp;Prepared By: </b></td>
</tr>
</table>
<table align="center" style="margin-top:3%;">
<td align="center" style="margin-top:10%;"><p>Admin</p></td>
<tr>
<td align="center" style="margin-top:10%;"><i>Officer In-charge</i></td>
</tr>
</table>

<style>

    .heads {
      margin-top:5%;
      font-size:12px;
      font-family: Arial;
      }

     table.reports-list {
      border-collapse:collapse;
      margin-top:-3%;
      }

      table.reports-list td,table.reports-list th {
       border:1px solid;
       font-size: 12px;
       font-family: Arial;
      }

     table.reports-list th {
      width:100%;
      }

      table td:last-child {
        display:none
      }

      table th:last-child {
        display:none
      }

      .text-center {
        text-align:center
      }

      td {
      text-align:center;
      }

      h3 {
      display:none;
      } 

      th {
        font-size: 12px;
      }

     .dataTables_info {
      display:none;
      }

     .dataTables_filter {
      display:none;
      }

     .dataTables_paginate {
      display:none;
      }

     .dataTables_length {
      display:none;
      }

</style>

</noscript>



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
<?php

$db = new mysqli("localhost","root","","backupdb-3");

if(isset($_POST['Submit'])){  


    $id = $_POST['id']; 
    $general = $_POST['general'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $pulse = $_POST['pulse'];
    $respiration = $_POST['respiration'];
    $temperature = $_POST['temperature'];
    $bp = $_POST['bp'];
    $rest = $_POST['rest'];
    $act = $_POST['act'];
    $infect = $_POST['infect'];
    $social = $_POST['social'];
    $family = $_POST['family'];
    $system = $_POST['system'];
    $skin = $_POST['skin'];
    $lymph = $_POST['lymph'];
    $integ = $_POST['integ'];
    $circulatory = $_POST['circulatory'];
    $endocrine = $_POST['endocrine'];
    $allergic = $_POST['allergic'];
    $heent = $_POST['heent'];
    $mouth = $_POST['mouth'];
    $breast = $_POST['breast'];
    $respiratory = $_POST['respiratory'];
    $cardio = $_POST['cardio'];
    $gastro = $_POST['gastro'];
    $geni = $_POST['geni'];
    $psy = $_POST['psy'];
    
        
        
    // checker
    if(empty($general)|| empty($height)|| empty($weight)|| empty($pulse)|| empty($respiration)|| empty($temperature)|| empty($infect)|| empty($social)|| empty($family)|| empty($system)|| empty($skin)|| empty($lymph)|| empty($integ)|| empty($circulatory)|| empty($endocrine)|| empty($allergic)|| empty($heent)|| empty($mouth)|| empty($breast)|| empty($respiratory)|| empty($cardio)|| empty($gastro)|| empty($geni)|| empty($psy)) { 

        
        if(empty($general)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }  
        if(empty($height)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($weight)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($pulse)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($respiration)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($temperature)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($infect)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($social)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($family)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($system)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($skin)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($lymph)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($integ)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($circulatory)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($endocrine)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($allergic)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($heent)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($mouth)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($breast)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($respiratory)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($cardio)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($gastro)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($geni)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($psy)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 

    $s = "SELECT patient_id from patient_health_record_medical where patient_id='$id'";
    $resu = $db->query($s);
      if ($resu->num_rows > 0) {

        $r="UPDATE patient_health_record_medical 
            SET general_appearance='$general',height='$height',weight='$weight',pulse_rate='$pulse',respiration_rate='$respiration',temperature='$temperature',blood_pressure='$bp',cardiac_rate_at_rest='$rest',cardiac_rate_after_activity='$act',infectious_disease='$infect',social_history='$social',family_history='$family',system_review='$system',skin='$skin',lymph_nodes='$lymph',integument_system='$integ',circulatory_system='$circulatory',endocrine_system='$endocrine',allergic_immunologic_history='$allergic',heent='$heent',mouth='$mouth',breast='$breast',respiratory_system='$respiratory',cardiovascular_system='$cardio',gastrointestinal_system='$gastro',genitourinary_tract='$geni',psychiatric_history='$psy',date_filled_out_by_nurse=now()   
            WHERE patient_id='$id'";

       
        if ($db->query($r) === TRUE) {
       
          echo '<script>
                swal({
                title: "Health Record Updated Successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:2000,
                closeOnClickOutside: false,
                closeOnEsc: false,                                                                                             
                }).then(function() {
              window.location = "Admin-PatientList.php";
            })
         </script>';
           

    
    }else{

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
}

else { 
        
        //insert syntax
        $result ="INSERT INTO patient_health_record_medical(patient_id,general_appearance,height,weight,pulse_rate,respiration_rate,temperature,blood_pressure,cardiac_rate_at_rest,cardiac_rate_after_activity,infectious_disease,social_history,family_history,system_review,skin,lymph_nodes,integument_system,circulatory_system, endocrine_system, allergic_immunologic_history, heent, mouth, breast, respiratory_system, cardiovascular_system, gastrointestinal_system, genitourinary_tract, psychiatric_history, date_filled_out_by_nurse) VALUES('$id','$general','$height','$weight','$pulse','$respiration','$temperature','$bp','$rest','$act','$infect','$social','$family','$system','$skin','$lymph','$integ','$circulatory','$endocrine','$allergic','$heent','$mouth','$breast','$respiratory','$cardio','$gastro','$geni','$psy', now())";

        if ($db->query($result) === TRUE) {
       
          echo '<script>
                swal({
                title: "Added successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:2000,
                closeOnClickOutside: false,
                closeOnEsc: false,
                }).then(function() {
              window.location = "Admin-PatientList.php";
            })
     </script>';
           
    
    }else{

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
}
}
?>
 
       