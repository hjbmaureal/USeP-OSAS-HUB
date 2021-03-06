<?php
require_once('tcpdf/tcpdf.php');

 function fetch_data()  
 {
 $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "backupdb-3"); 
 $sql = "SELECT item_inventory.id, item_inventory.item_code, item_inventory.unit, item_inventory.item_name, SUM(item_inventory.received_qty) as qty, SUM(item_inventory.issuance_mabini) as issued_mabini, SUM(item_inventory.issuance_apokon) as issued_apokon, item_unit.unit as un_name FROM item_inventory JOIN item_unit ON item_unit.unit_id=item_inventory.unit GROUP BY item_inventory.item_code";
  $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
        
        $output .= '<tr>  
                          <td>'.$row["id"].'</td>  
                          <td>'.$row["item_code"].'</td>  
                          <td>'.$row["un_name"].'</td>  
                          <td>'.$row["item_name"].'</td>  
                          <td>'.$row["qty"].'</td> 
              <td>'.$row["issued_mabini"].'</td> 
              <td>'.$row["issued_apokon"].'</td> 
              
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
        $this->Cell(0, 15, 'LIST OF ITEM TOTAL STOCK as of '.date("F d, Y").'', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    
  }
    
    }

    protected $last_page_flag = false;

    public function Close() {
        $this->last_page_flag = true;
        parent::Close();
    }

     // Page footer
    public function Footer() {
 session_start();
  include('connect.php');
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'Clinic'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id=$_SESSION['id'];
  $count = 0;
  $query=mysqli_query($db,"SELECT count(*) as cnt from notif where (user_id='$id' and office_id = 3) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}

  if ($this->last_page_flag) {
     $connect = mysqli_connect("localhost", "root", "", "backupdb-3"); 
$id=$_SESSION['id'];
$connect = mysqli_connect("localhost", "root", "", "backupdb-3"); 
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
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('List of Item Total Stock '.date("F d, Y").'');
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
                    <th width="10%" align="center"><b>No.</b></th>
                    <th width="13%" align="center"><b>Item Code</b></th>
                    <th width="13%" align="center"><b>Unit</b></th>
                    <th width="15%" align="center"><b>Item Name</b></th>
                    <th width="10%" align="center"><b>Total Quantity Received</b></th>
                    <th width="15%" align="center"><b>Total Issuance (Mabini)</b></th>
          <th width="15%" align="center"><b>Total Issuance (Apokon)</b></th>
          
                  </tr>
          ';   
      $content .= fetch_data();  
      $content .= '</table>'; 
     $pdf->writeHTML($content);  
      $pdf->Output('Item_Total_Stock '.date("F d, y").'.pdf', 'I');  


// ---------------------------------------------------------

//Close and output PDF document


//============================================================+
// END OF FILE
//============================================================+
}
?> 
 
 <!DOCTYPE html>
  <html lang="en">
  <?php
  session_start();
  include('connect.php');
  // $user_id = $_SESSION['id'];
  $user_id = '11111';
   $count_sql="SELECT * from notif where message_status='Delivered' AND user_id='$user_id' ";

          $result = mysqli_query($db, $count_sql);

          $count = 0;

          while ($row = mysqli_fetch_assoc($result)) {                             

            $count++;

                              }


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

  ?>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content=""> 
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
      <link rel="stylesheet" type="text/css" href="css/clinic_style.css">
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
           <li><a class="app-menu__item" href="Admin-PatientList.php"><i class="app-menu__icon fas fa-user-alt"></i><span class="app-menu__label">Patient</span></a></li>


          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Consultation</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-NewConsultation.php">New Consultation</a></li>
              <li><a class="treeview-item" href="Admin-ListOfConsultation.php">List of Consultation</a></li>
            </ul>
          </li>

 
          <li><a class="app-menu__item" href="Admin-Appointment.php"><i class="app-menu__icon fa fa-calendar-alt"></i><span class="app-menu__label">Appointment</span></a></li>
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

          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-clipboard-list"></i><span class="app-menu__label">Item</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-ItemUnit.php">Item Unit</a></li>
              <li><a class="treeview-item" href="Admin-ItemList.php">Item List</a></li>
              <li><a class="treeview-item" href="Admin-ItemInventory.php">Item Inventory</a></li>
              <li><a class="treeview-item active" href="Admin-ItemStock.php">Overall Stock</a></li>
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
                  $count_sql="SELECT * from notif where (user_id=$id and office_id = 3)  order by time desc";
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
                <span aria-hidden="true">??</span>
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
       

         <!--<div class="page-error tile">-->
          <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <h4 class="mb-3 line-head">Item Total Stock</h4>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-auto">

                     
             

                    <div class="inline-block">
                    Unit <br>
                    <select class="bootstrap-select" name="filterunit3" id="filterunit3" style="width: 150px;">
                                        <option class="select-item" value="all" selected="selected">All</option>
                                              <?php
                                           $result=mysqli_query($db, "SELECT * FROM item_unit");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $value= $res['unit_id']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['unit'];?></option>
                                              <?php } ?>
                     </select>   
                    </div>
                    
                   

           
                
                   

           
                      </div>
                      <div class="col-sm">
                        <br>
                            <div class="col">
        <form method="post">
                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify" name="create_pdf" type="submit" ><i class="fas fa-download"></i> Export</button></div>  </form>  
                      </div>
                           
                           <div class="inline-block float ml-2 mt-1"><button class="btn btn-warning btn-sm verify text-white" style="width: 100%;" id="print_att"><i class="fas fa-print"></i> Print </button></div>
                       </div>  

                      

                  </div>
                </div>
                    <div class="table-bd">
          <div class="table-responsive">
            <div id="table_clone" style="display: compact; border-color:#000000;">
                  <div class="calldiv3" id="calldiv3">
           <div class="head101" style="line-height: normal;">
        <br>
               <p><img src="image/logo.png" width="100"> </p><center>
                        <p style="margin-top:-12%; font-family:Calibri;">Republic of the Philippines</p>
                        <p style="font-family: Old English Text MT;"> University of Southeastern Philippines</p>
                        <p style="font-family:Calibri;"> Tagum - Mabini Campus</p>
                        <p style="font-family:Calibri;"> Apokon, Tagum City</p>
                      <br>
              <p style="font-family:Calibri; margin-top:2%;">Item Total Stock </p></center></th>
                      </div>
                   <table class="table table-hover table-bordered reports-list" id="sampleTable3">
                    <thead>
                      <tr>
                
                      <th>No.</th>
                      <th>Item Code</th>
                      <th>Unit</th>
                      <th>Item Name</th>
                      <th>Total Quantity Received</th>
                      <th>Total Issuance (Mabini)</th>
                      <th>Total Issuance (Apokon)</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 
          
                $sql = "SELECT item_inventory.id, item_inventory.item_code, item_inventory.unit, item_inventory.item_name, SUM(item_inventory.received_qty) as qty, SUM(item_inventory.issuance_mabini) as issued_mabini, SUM(item_inventory.issuance_apokon) as issued_apokon, item_unit.unit as un_name FROM item_inventory JOIN item_unit ON item_unit.unit_id=item_inventory.unit GROUP BY item_inventory.item_code";
                $res = $db->query($sql);
                $cnt=1;

                if ($res->num_rows > 0) {
                while($row = $res->fetch_assoc()) {
                  ?>
                              <tr>
                    <td><?php echo htmlentities($row['id']);?></td>
                    <td><?php echo htmlentities($row['item_code']);?></td>
                    <td><?php echo htmlentities($row['un_name']);?></td>
                    <td><?php echo htmlentities($row['item_name']);?></td>
                    <td><?php echo htmlentities($row['qty']);?></td>
                    <td><?php echo htmlentities($row['issued_mabini']);?></td>
                    <td><?php echo htmlentities($row['issued_apokon']);?></td>
                    
                    
                    
                  
                              </tr>
                             
                      <?php }}
                
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

       <div class="modal fade " id="AddNewType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Stock</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                          <form>  

                            <div class="row">
                            <div class="form-group">
                                    <label for="exampleSelect1">Item Name</label>
                                    <select class="form-control" id="exampleSelect1">
                                      <option>Ascof Forte 600mg</option>
                                      <option>Alvedon 500mg</option>
                                    </select>
                              </div>
                              <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">Unit</label>
                                    <select class="form-control" id="exampleSelect1">
                                      <option>caps</option>
                                      <option>tabs</option>
                                    </select>
                                  </div>
                            </div>
                            
                            </div>
                        <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Equipment or Supply</label>
                                  <input class="form-control" type="text" placeholder="Enter new equipment or supply">
                                </div>
                            </div>
                          </div>

                          


                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
          
          <!-- Button trigger modal -->



<!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
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
      <script type="text/javascript">$('#sampleTable3').DataTable();</script>
    
    <script>
    $('#print_att').click(function(){
    var _c = $('#calldiv3').html();
    var ns = $('noscript').clone();
    var nw = window.open('','_blank','width=900,height=600')
    nw.document.write(_c)
    nw.document.write(ns.html())
    nw.document.close()
    nw.print()
    setTimeout(() => {
      nw.close()
    }, 500);
    
  });
    $('#print_att2').click(function(){
    var _c = $('#calldiv').html();
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
 .head101{
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


}
 
}

@page{
margin-top:-1cm; 
margin-left:1cm;
margin-right:1cm;
margin-bottom:1.5cm;
}
}

.dropdown-menu {
    max-height: 280px;
    overflow-y: auto;
}
</style>
<noscript>
<table align="right" style="margin-top:8%; margin-right: 25%;">
<tr>
<td align="right" style="font-family: Calibri"><b> &emsp;Prepared By: </b></td>
</tr>
</table>

<table align="right" style="margin-top:14%; margin-right: -35%">

<tr>
<?php $connect = mysqli_connect("localhost", "root", "", "backupdb-3"); 
    $sql="Select * from staffdetails where office_name='Clinic' AND type='Coordinator'";
    $res = $connect->query($sql);
    
     if($row=mysqli_fetch_array($res)) {
     $title1= $row['title'];
     $name1= $row['fullname'];
     $extension1= $row['extension'];
     $position1= $row['position'];
   }
   ?>
<td style="font-family: Calibri"><b><?php echo $title1 ;?>  <?php echo $name1 ;?>  <?php echo $extension1 ;?></b></td>
</tr>
<tr>
<td>Asst. <?php echo $position1;?>/Instructor I</td>
</tr>
</table>
      <style>
    .heads{
    margin-top:5%;
    margin-left:6%;
    font-size:20px;
    font-weight:bold; 
    }
  table.reports-list{
      width:100%;
      border-collapse:collapse;
      margin-top:1%;
    }
    table.reports-list td,table.reports-list th{
      border:1px solid;
    
    }
    table.reports-list th{
    padding:0.2%;
    }
    .text-center{
      text-align:center
    }
    td{
    text-align:center;
    }
    h3{
    display:none;
    } 
  .dataTables_info{
    display:none;
    }
    .dataTables_filter{
    display:none;
    }
    .dataTables_paginate{
    display:none;
    }
    .dataTables_length{
    display:none;
    }
    .action-column{
      display: none;
    }
    </style>

</noscript>

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
      $(document).ready(function(){
                  /*STATUS*/
                  $("#filterunit3").on('change', function(){
                    var filterunit3 = $("#filterunit3").val();
                    $.ajax({
                          url:"filterInventory.php",
                          type:"POST",
                          data:{funit3 : filterunit3},
                          beforeSend:function(){
                            $(".calldiv3").html("Working.....");
                          },
                          success:function(data){
                            $(".calldiv3").html(data);
                          },
                    });
               
                  });

             });
      </script>
    </body>
  </html>