<?php 
  session_start();
  require_once('../../conn.php');
  if (!isset($_SESSION['id'])){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }


$paid_labor = '';
$unpaid_labor = '';
$day_class = '';
$night_class = '';
$new_status = '';
$renew_status = '';
$applicant_name = '';
$course_year = '';
$address = '';
$phone_num = '';
$email = '';
$birthday = '';
$birthplace = '';
$sem_year = '';
$time_available = '';
$office_name = '';
$applicant_name_w_sign = '';

$rec_applicant_name = '';
$rec_dept_college = '';

$duty1 = '';
$duty2 = '';
$duty3 = '';
$duty4 = '';
$sched1 = '';
$sched2 = '';
$dean_unit_assigned = '';
$osas_director = '';
$budget_officer = '';
$vpaa  = '';
$office_assignment = '';
$start_date = '';
$expiry_date = '';
$employee_name = '';


$applicant_name_acceptance = '';
$applicant_date_signed = '';
$rec_unit_sign_name = '';

$student_sign = '../../images/transparentbg.png';
$rec_unit_sign = '../../images/transparentbg.png';
$osas_sign = '../../images/transparentbg.png';
$student_sign_final = '../../images/transparentbg.png';
$student_pic = '../../images/logo.png';

  $appid = $_REQUEST['appid'];
  $query=mysqli_query($conn,"CALL MainGetApplicationFormInfo('$appid')");
  while($row=mysqli_fetch_array($query)){
    $paid_labor = ($row['labor_type']=='Paid Labor (SL)') ? 'checked' : 'disabled';
    $unpaid_labor = ($row['labor_type']!='Paid Labor (SL)') ? 'checked' : 'disabled';
    $day_class = ($row['labor_class']=='Day') ? 'checked' : 'disabled';
    $night_class = ($row['labor_class']!='Day') ? 'checked' : 'disabled';
    $new_status = ($row['labor_status']=='New') ? 'checked' : 'disabled';
    $renew_status = ($row['labor_status']!='New') ? 'checked' : 'disabled';
    $applicant_name = $row['applicant_name'];
    $course_year = $row['course'].' '.$row['year_level'];
    $address = $row['full_address'];
    $phone_num = $row['phone_number'];
    $email = $row['email_add'];
    $birthday = $row['applicant_bday'];
    $birthplace = $row['birth_place'];
    $sem_year = $row['semester_year'];
    $time_available = $row['time_available'];
    $office_name = $row['office_name'];
    $applicant_name_w_sign = $row['applicant_name'];
    $student_pic = ($row['pic']==null) ? '../../images/transparentbg.png' :'data:image/jpeg;base64,'.base64_encode($row['pic']);
    $student_sign = 'data:image/jpeg;base64,'.base64_encode($row['e_signature']);

    if ($row['recommendation_status']==1){
      $rec_applicant_name = $row['applicant_name'];
      $rec_dept_college = $row['course'].' ('.$row['college'].')';
      $rec_unit_sign_name = $row['staff_requested_by'];
      $rec_unit_sign = 'data:image/jpeg;base64,'.base64_encode($row['head_signature']);
    }

    if ($row['acceptance_contract_status']==1){
      $duty1 = $row['duty1'];
      $duty2 = $row['duty2'];
      $duty3 = $row['duty3'];
      $duty4 = $row['duty4'];
      $sched1 = $row['schedule1'];
      $sched2 = $row['schedule2'];
      $dean_unit_assigned = $row['dean_unit_assigned'];
      $osas_sign = 'data:image/jpeg;base64,'.base64_encode($row['assessor_signature']);
      $osas_director = $row['assessed_name'];
      $budget_officer = $row['budget_officer'];
      $vpaa  = $row['chancellor'];
      $office_assignment = $row['office_name'];
      $start_date = $row['starting_date'];
      $expiry_date = $row['expiration_date'];
      $employee_name = '';      
    }

    if ($row['student_sign_status']==1){
      $applicant_name_acceptance = $row['applicant_name'];
      $applicant_date_signed =  $row['date_signed'];
      $student_sign_final = $student_sign;
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
    <style type="text/css">
    @page{
      size: legal portrait;
      margin: .40in;}

      .s14{
        font-size: 14px;
      }
    </style>
  </head>
  <body class="app sidebar-mini rtl" style="background-color: #fff;" onload="window.print()">
    <div style="position: absolute;" class="mt-1">
     <div class="row ">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="border: 1px solid #000 !important ;" class="text-center align-middle" rowspan="5"><img src="../../images/logo.png" width="100px;"></th> 
                <th style="border: 1px solid #000 !important ;padding: 0px;" rowspan="5" class="text-center">
                  <span class="fs-11 s12 d-block">Republic of the Philippines</span>
                  <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span>
                  <span class="fs-17 s12 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                  <span class="fs-11 s12 d-block">Telephone: (082) 227-8192</span>
                  <span class="fs-11 s12 d-block">Website: www.usep.edu.ph</span>
                  <span class="fs-11 s12 d-block">Email: president@usep.edu.ph</span>
                </th>  
                <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="">Form No. </th>
                <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="">FM-USeP-HSC-01 </th>
              </tr>
              <tr>
               <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Issue Status  </th>
               <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; "colspan="2">02</th>
             </tr>
             <tr>
               <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Revision No.  </th>
               <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="2">01</th>
             </tr>
             <tr>
               <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Date Effective  </th>
               <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="2">01 March 2018
               </th>
             </tr>
             <tr>
               <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Approved by </th>
               <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="2">President
               </th>
             </tr>
             <tr>
              <th  style="border-color: #000 !important; font-size: 20px; font-weight: bold; border: 1px solid #000 !important;" colspan="4" class="text-center p-1 text-b">STUDENT LABOR APPLICATION FORM AND CONTRACT
              </th>
            </tr>
          </thead>
        </table>
      </div>
    </div> 
  </div>

  <div class="row">
    <div class="col-10">
      <div class="row"><div style="height:50px"></div></div>
      <div class="row">
        <div class="col-3">
          <div class="form-group fg">
            <label class="control-label cl font-weight-normal">Type of Student Labor:</label>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group fg">
            <div class="form-check ">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" <?php echo $paid_labor ?>>Paid Labor (SL)
              </label>
            </div>
            <div class="form-check ">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" <?php echo $unpaid_labor ?>>Unpaid Labor (SL)
              </label>
            </div>
          </div>
        </div>
        <div class="col-1">
          <div class="form-group fg">
            <label class="control-label cl font-weight-normal">Class:</label>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group fg">
            <div class="form-check ">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" <?php echo $day_class ?>>Day
              </label>
            </div>
            <div class="form-check ">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" <?php echo $night_class ?>>Evening
              </label>
            </div>
          </div>
        </div>
        <div class="col-1">
          <div class="form-group fg">
            <label class="control-label cl font-weight-normal">Status:</label>
          </div>
        </div>
        <div class="col-1">
          <div class="form-group fg">
            <div class="form-check ">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" <?php echo $new_status ?>>New
              </label>
            </div>
            <div class="form-check ">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" <?php echo $renew_status ?>>Renewal
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="app-form-dp float-right">
        <img src="<?php echo $student_pic ?>" style="max-width: 100%;">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <label class="control-label cl s14 d-inline font-weight-normal">Name of the Student:</label>
      <input class="form-control pl-2 fc2 blck s14 d-inline"style="width: 300px;" type="text" value="<?php echo $applicant_name ?>" disabled="">
      <label class="control-label cl s14 d-inline font-weight-normal">Course & Year:</label>
      <input class="form-control fc2 blck s14 d-inline"style="width: 250px;" type="text" value="<?php echo $course_year ?>" disabled="">
    </div>
    <div class="col-12">
      <label class="control-label cl s14 d-inline font-weight-normal">Address:</label>
      <input class="form-control pl-2 fc2 s14 d-inline"style="width: 700px;" type="text" value="<?php echo $address ?>" disabled="">
    </div>
    <div class="col-12">
      <label class="control-label cl s14 d-inline font-weight-normal">Phone/Mobile No.:</label>
      <input class="form-control pl-2 fc2  s14 d-inline"style="width: 280px;" type="text" value="<?php echo $phone_num ?>" disabled="">
      <label class="control-label cl s14 d-inline font-weight-normal">E-mail Address:</label>
      <input class="form-control pl-2 fc2 blck s14 d-inline"style="width: 260px;" type="text" value="<?php echo $email ?>" disabled="">
    </div>
    <div class="col-12">
      <label class="control-label cl s14 d-inline font-weight-normal">Birth Date:</label>
      <input class="form-control pl-2 fc2  s14 d-inline"style="width: 300px;" type="text" value="<?php echo $birthday ?>" disabled="">
      <label class="control-label cl s14 d-inline font-weight-normal">Birth Place:</label>
      <input class="form-control pl-2 fc2  s14 d-inline"style="width: 310px;" type="text" value="<?php echo $birthplace ?>" disabled="">
      <div class="col-12" style="padding: 0px;">
        <label class="control-label cl s14 d-inline font-weight-normal">Semester & School Year Covered:</label>
        <input class="form-control pl-2 fc2  s14 d-inline"style="width: 200px;" type="text" value="<?php echo $sem_year ?>" disabled="">
        <label class="control-label cl s14 d-inline font-weight-normal">Time Available:</label>
        <input class="form-control pl-2 fc2 blck s14 d-inline"style="width: 240px;" type="text" value="<?php echo $time_available ?>" disabled="">
      </div>
      
      <div class="col-12">
        <label class="control-label cl s14 font-weight-normal">Attached:</label>   
      </div>
      <div style="line-height:.1">
        <div class="form-group fg mlff">
          <i class="fas fa-check mr-2 s14"> </i><label class="control-label cl font-weight-normal"> Certificate of Grades</label>   
        </div>
        <div class="form-group fg mlff">
          <i class="fas fa-check mr-2 s14"> </i><label class="control-label cl font-weight-normal"> Certificate of Registration (COR) </label>   
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-8">
          <div class="form-group fg">
            <label class="control-label cl s14 font-weight-normal">Proposed College/ Unit of Assignment:</label>
            <input class="form-control pl-2 fc2 blck s14 d-inline"style="width: 240px;" type="text" value="<?php echo $office_name ?>" disabled="">
          </div>
        </div>
        <div class="col-4">
         <div class="form-group fg text-center" style="margin-top:-50px">
          <img id="student_signature" class="e-sign" height="200" width="200" style="margin-bottom: -90px;margin-top: -50px;position:relative;" src="<?php echo $student_sign ?>" />
          <input class="form-control pl-2 fc2 w200 s14 text-center" type="text" value="<?php echo $applicant_name_w_sign ?>" disabled="">
          <label class="control-label cl s14 text-center font-weight-normal">Print Name and Signature</label>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col">
    &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070; 
    <h6 class="text-center mb-1">RECOMMENDATION</h6>
    <p class="text-justify w-100 p s14 d-inline">This is to recommend Mr./Ms.

      <input class="form-control fc2 p-2 text-center s14"style="width: 400px;" type="text" value="<?php echo $rec_applicant_name ?>" disabled="">

      who is a bona-fide student of 

      <input class="form-control fc2 p-2 text-center s14"  type="text" value="<?php echo $rec_dept_college ?>" disabled=""> 

      and of good moral character.<br>
      <span class="ml-5" style="font-size: 12px;">(Department/College)</span>
    </p>

    <div class="row">
      <div class="col-8"></div>
      <div class="col-4">
       <div class="form-group fg text text-center align-middle" style="margin-top:-50px">
          <img id="student_signature" class="e-sign" height="200" width="200" style="margin-bottom: -90px;margin-top: -50px;position:relative;" src="<?php echo $rec_unit_sign ?>" />
        <input class="form-control fc2 mr-1 p-2 w-100 text-center s14" type="text" disabled="" value="<?php echo $rec_unit_sign_name ?>"><br>
        <label class="control-label mr65 w-100 te s14">Faculty/Staff</label>
      </div>
    </div>
  </div>

</div>
</div>

<div class="row">
  <div class="col">
    &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070;  &#10070; 
    <h6 class="text-center mb-1 S17">ACCEPTANCE</h6>
    <p class="text-justify w-100 p">This is to accept the above applicant to perform the following duties and responsibilities. He/she shall render service for four (4) hours a day for 5 days in a week with an hourly rate of Php25.00.</p>

    <div class="row">
      <div class="col">
        <h6 class="mb-3 S17">DUTIES & RESPONSIBILITIES</h6>
        <input class="form-control fc2 p-2" type="text" value="<?php echo $duty1 ?>" disabled="">
        <input class="form-control fc2 p-2" type="text" value="<?php echo $duty2 ?>" disabled="">
        <input class="form-control fc2 p-2" type="text" value="<?php echo $duty3 ?>" disabled="">
        <input class="form-control fc2 p-2" type="text" value="<?php echo $duty4 ?>" disabled="">
      </div>   
      <div class="col">
        <h6 class="mb-3 S17">SCHEDULE OF SERVICE</h6>
        <input class="form-control fc2 p-2" type="text" value="<?php echo $sched1 ?>" disabled="">
        <br><br>
        <input class="form-control fc2 p-2" type="text" value="<?php echo $sched2 ?>" disabled="">

      </div>                          
    </div>


    <div class="row mt-3 text-center">
      <div class="col text-center">
        <h6 class="mb-3 S17 text-center"><i>NOTE: </i><span class="font-weight-normal"> Renewal for another term depends on working attitude and performance.</span></h6>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-6">
        <p class="control-label te mb-1 d-inline text-center">Recommended by:
          <div style="line-height: 1.2;" class="text-center d-inline">
            <input class="form-control fc2 mr-1 p-2 text-center" style="width:200px;" type="text" disabled="" value="<?php echo $dean_unit_assigned ?>">
            <p class="text-center ml-5">Dean/Director<br>(Unit Assigned)</p></div>
          </div>
        </div>


        <div class="row">
          <div class="col-8">
            <p class="control-label te mb-1 d-inline text-center">Recommending Approval:</p>
          </div>
          <div class="col">
            <p class="control-label te mb-1 d-inline text-center">Approved:</p>
          </div>
        </div>

        <div class="row mt-4" style="line-height:1">
          <div class="col" style="margin-top:-50px">
            <img id="student_signature" class="e-sign" height="200" width="200" style="margin-bottom: -90px;margin-top: -50px;position:relative;margin-left: -10px;" src="<?php echo $osas_sign ?>" />
            <p class="control-label te mb-1"><b><u><?php echo $osas_director ?></u></b></p>
            <p class="control-label te mb-1">Director, OSAS</p>
          </div>
          <div class="col" style="margin-top:-32px">
            <img class="e-sign" height="200" width="200" style="margin-bottom: -90px;margin-top: -50px;position:relative;margin-left: -10px;" src="../../images/transparentbg.png" />
            <p class="control-label te mb-1 ml-5"><b><u><?php echo $budget_officer ?></u></b></p>
            <p class="control-label te mb-1 ml-5">Director, Finance Division</p>
          </div>
          <div class="col" style="margin-top:-32px">
            <img class="e-sign" height="200" width="200" style="margin-bottom: -90px;margin-top: -50px;position:relative;margin-left: -10px;" src="../../images/transparentbg.png" />
            <p class="control-label te mb-1 ml-5"><b><u><?php echo $vpaa ?></u></b></p>
            <p class="control-label te mb-1 ml-5">VP for Academic Affairs</p>
          </div>
        </div>
      </div>
    </div><!--acceptance-->

    <div class="row mt-4">
      <div class="col"> 
        <hr class="d-block" style="border: solid 1px #000; border-style: dashed;">
        <h6 class="text-center">For the Office of Student Affairs and Services only</h6>
      </div>
    </div>
    <div class="row mt-1">
      <div class="col">
        <p class="control-label te mb-1 d-inline text-center">Office Assignment
          <input class="form-control fc2 mr-1 p-2 text-center" style="width:200px;" type="text" disabled="" value="<?php echo $office_assignment ?>"></p>
        </div>
        <div class="col" style="line-height: 1.2;"> 
          <span class="d-block">Starting Date:
          <input class="form-control fc2 mr-1 p-2 text-center" style="width:150px;" type="text" disabled="" value="<?php echo $start_date ?>"></span>
          <span class="d-block">Expiration Date:
            <input class="form-control fc2 mr-1 p-2 text-center" style="width:150px;" type="text" disabled="" value="<?php echo $expiry_date ?>"></span>
          </div>
        </div>


        <div class="row mt-3 ">
          <div class="col-7">
          </div>
          <div class="col-5">
           <div class="form-group fg text mb-2 text-center align-middle">
            <input class="form-control fc2 mr-1 p-2 w-100 text-center s17" type="text" disabled="" value="<?php echo $employee_name ?>"><br>
            <label class="control-label mr65 w-100 te s16">Employee Signature over Printed Name</label>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="s14 p-1 text-center font-weight-normal" style="border: 1px solid #000 !important; " colspan="">Office of Student Affairs and Services </th>
                <th class="s14 p-1 pl-2 font-weight-normal" style="border: 1px solid #000 !important; " colspan="">Page 1 of 2</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>






      <div style="break-after:page"></div>

      <div class="mt-4" style="position: absolute;">
       <div class="row ">
        <div class="col">
          <div class="row">
            <div class="col">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="border: 1px solid #000 !important ;" class="text-center align-middle" rowspan="5"><img src="../../images/logo.png" width="100px;"></th> 
                      <th style="border: 1px solid #000 !important ;padding: 0px;" rowspan="5" class="text-center">
                        <span class="fs-11 s12 d-block">Republic of the Philippines</span>
                        <span style="font-family:Old English Text MT; font-size: 20px;">University of Southeasetern Philippines</span>
                        <span class="fs-17 s12 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                        <span class="fs-11 s12 d-block">Telephone: (082) 227-8192</span>
                        <span class="fs-11 s12 d-block">Website: www.usep.edu.ph</span>
                        <span class="fs-11 s12 d-block">Email: president@usep.edu.ph</span>
                      </th>  
                      <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="">Form No. </th>
                      <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="">FM-USeP-HSC-01 </th>
                    </tr>
                    <tr>
                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Issue Status  </th>
                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; "colspan="2">02</th>
                   </tr>
                   <tr>
                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Revision No.  </th>
                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="2">01</th>
                   </tr>
                   <tr>
                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Date Effective  </th>
                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="2">01 March 2018
                     </th>
                   </tr>
                   <tr>
                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; ">Approved by </th>
                     <th class="fs-11 s12 p-1" style="border: 1px solid #000 !important; " colspan="2">President
                     </th>
                   </tr>
                   <tr>
                    <th  style="border-color: #000 !important; font-size: 20px; font-weight: bold; border: 1px solid #000 !important;" colspan="4" class="text-center p-1 text-b">STUDENT LABOR APPLICATION FORM AND CONTRACT
                    </th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>

        <div class="row" style="font-family: Arial;">
          <div class="col">
            <div class="mt-5"><h4 class="s17"><center>Qualification of SL Applicant</center></h4></div>
            <div class="s16 p-4">
              <span class="d-block">• Must be currently enrolled with a load of eighteen (18) units or below.</span>
              <span class="d-block">• Must not be a first (1 st) year student, a new transferee, or in his/her last semester as a graduating student.</span>
              <span class="d-block">• No failed or incomplete (INC) grade from the previous semester.</span>
            </div>

            <div class="mt-5"><h4 class="s17"><center>Requirements</center></h4></div>
            <div class="s16 p-4">
              <span class="d-block">• Obtain an application form from the OSAS.</span>
              <span class="d-block">• Fill-in the application form and attach a prescribe ID picture.</span>
              <span class="d-block">• Attach a Photocopied certificates of grades (COG) and registration (COR).</span>
            </div>

            <div class="mt-5"><h4 class="s17"><center>Responsibilities of Accepted Student Laborer</center></h4></div>
            <div class="s16 p-4">
              <span class="d-block">• He/she shall commence work after receiving the approved student labor application form from the OSAS.</span>
              <span class="d-block">• Supervised by a regular employee, he/she shall accomplish the specified duties and responsibilities in the application form.</span>
              <span class="d-block">• Shall render service based on the specified schedule in the application form.</span>
              <span class="d-block">• Must at all times, observe professional ethics in the work place.</span>
              <span class="d-block">• Shall regularly submit the signed daily time record (DTR) every first week of the month to the OSAS.</span>
            </div>


            <div class="row pl-5 pr-5">
              <div class="col s17" style="font-family: Arial;">
                <label class="control-label te s14 text-center">Conforme:</label>
                <div class="form-group fg text text-center align-middle mt-3" style="margin-top:-50px">
                  <img id="student_signature" class="e-sign" height="200" width="200" style="margin-bottom: -110px;margin-top: -100px;position:relative;" src="<?php echo $student_sign_final ?>" />
                  <input class="form-control fc2 p-2 w-75 text-center s14" type="text" disabled="" value="<?php echo $applicant_name_acceptance ?>"><br>
                  <label class="control-label te s14 text-center">Signature over Printed Name</label>
                </div>
              </div>
              <div class="col">
                <div class="col s17" style="font-family: Arial;">
                  <label class="control-label te s14 text-center">Date:</label>
                  <div class="form-group fg text text-center align-middle mt-3">
                    <input class="form-control fc2 p-2 w-50 text-center s14" type="text" disabled="" value="<?php echo $applicant_date_signed ?>"><br>
                  </div>
                </div>
              </div>
            </div>

            <div class="row pl-5 pr-5 mt-5">
              <div class="col">
                <div class="float-left pl-2 pt-3 pr-2 mt8"  style="border: 1px solid black;width: 300px; line-height: .2; margin-bottom: 150px;" >
                  <p class="s12 text-left ">Original: Finance</p>
                  <p class="s12 text-left ">Duplicate: Office of Student Affairs and Services</p>
                  <p class="s12 text-left ">Triplicate: Dean's Copy or Unit Assigned</p>
                  <p class="s12 text-left ">Quadruplicate: Student Copy</p>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="s14 p-1 text-center font-weight-normal" style="border: 1px solid #000 !important; " colspan="">Office of Student Affairs and Services </th>
                      <th class="s14 p-1 pl-2 font-weight-normal" style="border: 1px solid #000 !important; " colspan="">Page 2 of 2</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>

          </div>
        </div>
        
      </div> 
    </div>
  </div>

</div>





<!-second page-->



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