  <!DOCTYPE html>
  <html lang="en">
    <head>
        <?php
        include("config.php");
        require_once('tcpdf/tcpdf.php');
     $user_id = '11111';
$count_sql="SELECT * from notif where message_status='Delivered' AND user_id='$user_id'";

          $result = mysqli_query($mysqli, $count_sql);

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
if(isset($_POST['rel'])) { 
    $id = $_POST['id'];
    $targetDir = "certs/";

    $fileName = basename($_FILES["m_info"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $fileName2 = basename($_FILES["m_his"]["name"]);
    $targetFilePath2 = $targetDir . $fileName2;
    $fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);

    $fileName3 = basename($_FILES["h_rec"]["name"]);
    $targetFilePath3 = $targetDir . $fileName3;
    $fileType3 = pathinfo($targetFilePath3,PATHINFO_EXTENSION);
    
    $query = mysqli_query($mysqli, "SELECT * from request_list where request_id = $id");
    while($row = mysqli_fetch_array($query)) { 
    $name = $row['fullname'];
    $course = $row['course_department'];
    $patient_id = $row['patient_id'];

    }
    $message = 'released your Medical Certificate';

      if(move_uploaded_file($_FILES["m_info"]["tmp_name"], $targetFilePath)){
        $query = mysqli_query($mysqli,"UPDATE clinic_certificate_requests set req_med_info='$fileName' where request_id=$id");
        if(move_uploaded_file($_FILES["m_his"]["tmp_name"], $targetFilePath2)){
          $query = mysqli_query($mysqli,"UPDATE clinic_certificate_requests set req_med_hist='$fileName2' where request_id=$id");
          if(move_uploaded_file($_FILES["h_rec"]["tmp_name"], $targetFilePath3)){
            $query = mysqli_query($mysqli,"UPDATE clinic_certificate_requests set req_health_rec='$fileName3', date_released=NOW() where request_id=$id"); 
          }

        }

      }
      $result=mysqli_query($mysqli,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$patient_id', 'Admin" .' '. "".$message."',now(),'RequestMedRecsCert.php', 'Delivered')");

}

//-------------------------------------fetch-content
 function fetch_data()  
 {
 $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "osasdb_latest4"); 
 $sql = "SELECT * FROM request_list where request_type='Medical Records Certification'";
  $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
        $date =date_create($row['date_requested']);
        $date1 = date_format($date,"F d, Y"); ;  
      
        $output .= '<tr>  
                          <td>'.$row["patient_id"].'</td>  
                          <td>'.$row["fullname"].'</td>  
                          <td>'.$row["course_department"].'</td>   
                          <td>'.$row["purpose"].'</td> 
                          <td>'.$row["status"].'</td> 

                     </tr>   
                          ';  
      }  
      return $output;  
 }  

//------------------------------PDF
if(isset($_POST["crt_pdf"])){ 
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
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
        $this->Cell(0, 15, 'LIST OF REQUESTS FOR MEDICAL RECORDS CERTIFICATION as of '.date("F d, Y").'', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    
    
    
    }

    // Page footer
    public function Footer() {
  session_start();
     $connect = mysqli_connect("localhost", "root", "", "osasdb_latest4"); 
  $id=$_SESSION['id'];
  $sql1="Select * from staffdetails where staff_id='$id' AND type='Staff'";
    $res = $connect->query($sql1);
     if($row=mysqli_fetch_array($res)) {
   $title= $row['title'];
   $name= $row['fullname'];
   $extension= $row['extension'];
   $position= $row['position'];
   
        // Position at 15 mm from bottom
        $this->SetY(-50);
        // Set font
        $this->SetFont('calibri', 'B', 12);
    $this->Ln(2);
    $this->Cell(0, 0, 'Prepared By:', 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $this->Ln(8);
    $this->SetX(40);
     $this->SetFont('Calibri', '', 12);
    $this->Cell(0,0, ''.$title.' '. $name.' '.$extension.'', 0, false, '', 0, '', 0, false, 'M', 'M');
    $this->Ln(8);
    $this->SetX(50);
    $this->Cell(0,0,''.$position.'', 0, false, '', 0, '', 0, false, 'M', 'M');
    }
         $connect = mysqli_connect("localhost", "root", "", "osasdb_latest4"); 
    $sql2="Select * from staffdetails where office_name='Clinic' AND type='Staff'";
    $res = $connect->query($sql2);
     if($row=mysqli_fetch_array($res)) {
   $title1= $row['title'];
   $name1= $row['fullname'];
   $extension1= $row['extension'];
   $position1= $row['position'];
     $this->SetY(-48);
     $this->SetX(210);
      $this->SetFont('Calibri', 'B', 12);
    $this->Cell(0, 0, 'Noted By:', 0, false, '', 0, '', 0, false, 'M', 'M');
    $this->Ln(8);
    $this->SetX(230);
     $this->SetFont('Calibri', '', 12);
    $this->Cell(0,0, ''.$title1.' '. $name1.' '.$extension1.'', 0, false, '', 0, '', 0, false, 'M', 'M');
    $this->Ln(8);
    $this->SetX(244);
    $this->Cell(0,0,''.$position1.'', 0, false, '', 0, '', 0, false, 'M', 'M');
     $this->SetY(-15);
     
     $this->SetFont('calibri', 'I', 10);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
  }

}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('List of Request for Medical Records Certification'.date("F d, Y").'');
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
                    <th width="20%" align="center"><b>Patient Name</b></th>
                    <th width="20%" align="center"><b>Course/Dept.</b></th>
                    <th width="20%" align="center"><b>Purpose</b></th>
                    <th width="30%" align="center"><b>Status</b></th>
          
                  </tr>
          ';   
      $content .= fetch_data();  
      $content .= '</table>'; 
     $pdf->writeHTML($content); 
     ob_end_clean(); 
      $pdf->Output('List_of_Requests_for_Medical_Records_Certification'.date("F d, y").'.pdf', 'I');  


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
}
    ?>
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
      <title>Request for Medical Records Certification</title>
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
      <body class="app sidebar-mini rtl">
      <!-- Navbar-->

        
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

         <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-file-medical"></i><span class="app-menu__label">Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-Request.php">Medical Certificate</a></li>
              <li><a class="treeview-item active" href="Admin-MedicalRecordCert.php">Medical Records Certification</a></li>
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
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Hi, Jet</a>
              </li>
             <!-- <li class="app-search">
                   <input class="app-search__input" type="search" placeholder="Search">
                  <button class="app-search__button"><i class="fa fa-search"></i></button>
              </li>-->  
  <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><b style="color: red;"><?php echo $count;  ?></b><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php echo $count;  ?> new notifications.</li>
              <div class="app-notification__content">

                <?php 
                $count_sql="SELECT * from notif where message_status='Delivered' AND user_id='$user_id'  order by time desc";

                $result = mysqli_query($mysqli, $count_sql);

                while ($row = mysqli_fetch_assoc($result)) { 
                  $intval = intval(trim($row['time']));
                  if ($row['message_status']=='Delivered'  && $row['user_id']=='$user_id' ) {

                    
                    echo'
                  <b><li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">'.$row['message_body'].'</p>
                      <p class="app-notification__meta">'.timeago($row['time']).'</p>
                      <p class="app-notification__message"><form method="POST" action="notif_stat.php">
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
                      <p class="app-notification__message"><form method="POST" action="notif_stat.php">
                      <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                      <input type="submit" name="open_notif" value="Open Message">
                      </form></p>
                    </div></a></li>
                    ';
                  }
                  

                                    }
                ?>
                            </ul>
          </li>
              
                 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
              <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
      
          </ul>
        </div>
        <div class="red"> 
          
        </div>
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
                                
                                    $query = "SELECT * FROM request_list where request_type='Medical Records Certification' LIMIT $start_from, $per_page_record";     
                                    $rs_result = mysqli_query($mysqli, $query);   //and conn kay mao na ang sa variable sulod sa config 
                                ?> 
      <!-- Navbar-->
       
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <h3 class="mb-3 line-head">New Request for Medical Records Certification</h3>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-sm">

                    
                   
                      </div>
                      <div class="col-sm">
                         
                          <form method="post">
                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify" name="crt_pdf" type="submit" ><i class="fas fa-download"></i> Export</button></div>
                        </form>

     <!--   <button class="btn btn-danger btn-sm verify" id="demoNotify" href="#" >Verify</button>-->
       
                      </div>

                  </div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered reports-list" id="sampleTable">
                    <thead>
                      <tr>
                      <th>ID Number</th>
                      <th class="max">Patient Name</th>
                      <th>Course/Dept.</th>
                      <th>Purpose</th>
                      <th>Letter Of Request</th>
                      <th>Certificate</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                                        <?php  

                                        while ($row = mysqli_fetch_array($rs_result)) {  
                                        $id=$row['request_id'];  
                                              // Display each field of the records.    
                                        ?> 

                                        <tr>

                                        <td><?php echo $row["patient_id"]; ?></td>                                    
                                        <td><?php echo $row["fullname"]; ?></td>
                                        <td><?php echo $row["course_department"]; ?></td>
                                        <td><?php echo $row["purpose"]; ?></td>
                           
                      <td>
                        <?php
                        if(empty($row['document_passed'])){
                          echo '<a class="btn btn-warning btn-sm" disabled><i class="fas fa-download"></i></a>';
                        }else{
                          echo '<a class="btn btn-warning btn-sm" target="_blank" href="'.$row['document_passed'].'"><i class="fas fa-download"></i></a>';

                        }?>

                      </td>

                             
                      <td>
                        <?php
                        if(empty($row['document_passed'])){
                          echo '<a class="btn btn-danger btn-sm disabled" href="#" >Release</a>';
                        }else{
                          echo '<a class="btn btn-danger btn-sm"  data-toggle="modal" href=#released'.$row['request_id'].'>Release</a>';
                         include("released_certification_modal.php");


                        }?>
                      </td>

                      <td>
                        <?php
                        if(empty($row['med_info'])&&empty($row['med_history'])&&empty($row['health_record'])){
                          echo 'Pending';

                        }else{
                          echo 'Completed';

                        }
                        ?>
                          
                        </td>           
                                    </tr>
                                     <?php  

                                            };    
                                        ?>

                   
                    </tbody>
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
        $(".preslist").focus(function() {
          if(document.getElementById('preslist').value === ''){
            document.getElementById('preslist').value +='  • ';
          }
          });
        $(".preslist").keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
          if(keycode == '13'){
            document.getElementById('preslist').value +='  • ';
          }

        var txtval = document.getElementById('preslist').value;
          if(txtval.substr(txtval.length - 1) == '\n'){
            document.getElementById('preslist').value = txtval.substring(0,txtval.length - 1);
        }
        });
      </script>

    </body>
  </html>