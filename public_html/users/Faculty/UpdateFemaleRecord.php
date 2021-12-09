<?php
session_start();
include_once("connect.php");
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
      <title>Consultation: Patient Record Female Form</title>
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
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">STUDENT PORTAL</p>
          </div>
        </div>

        <hr>



        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="Defaultstudent.html"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label">Student's Affair & Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="#">Home</a></li>
              <li><a class="treeview-item" href="#">Student Discipline</a></li>
              <li><a class="treeview-item" href="#">Student Organization</a></li>
              <li><a class="treeview-item" href="#">Student Labor</a></li>
              <li><a class="treeview-item" href="#">Request for Good Moral</a></li>
            </ul>
          </li>


          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="#">Home</a></li>
              <li><a class="treeview-item" href="#">Counselling</a></li>
              <li><a class="treeview-item" href="#">Evaluation</a></li>
            </ul>
          </li>

            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Scholarship Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="#">Home</a></li>
              <li><a class="treeview-item" href="#">Scholarship Data Form</a></li>

            </ul>
          </li>



           <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Home.php">Home</a></li>
              <li><a class="treeview-item active" href="Clinic_Privacy_Policy.php">Consultation</a></li>
              <li><a class="treeview-item" href="StudentConsultationHistory.php">Consultation History</a></li>
              <li><a class="treeview-item" href="Prescription.php">Prescription</a></li>
              <li><a class="treeview-item" href="RequestMedCert.php">Request for Medical Certificate</a></li>
              <li><a class="treeview-item" href="RequestMedRecsCert.php">Request for Medical Records Certification</a></li>
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
                <a class="appnavlevel" style="font-size: 16px;">Hi, <b><?php echo $_SESSION["fullname"]; ?></b></a>
              </li>
            
             <!-- <li class="app-search">
                   <input class="app-search__input" type="search" placeholder="Search">
                  <button class="app-search__button"><i class="fa fa-search"></i></button>
              </li>-->  
   <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have 4 new notifications.</li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
                <div class="app-notification__content">
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Lisa sent you a mail</p>
                        <p class="app-notification__meta">2 min ago</p>
                      </div></a></li>
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Mail server not working</p>
                        <p class="app-notification__meta">5 min ago</p>
                      </div></a></li>
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Transaction complete</p>
                        <p class="app-notification__meta">2 days ago</p>
                      </div></a></li>
                </div>
              </div>
              <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
          </li>
              
                 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="user-profiles.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
      
          </ul>
        </div>
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
       

         <!--<div class="page-error tile">-->
 
       


       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">PATIENT RECORD</h3>
            <div class="tile-body">
                                  <form  method="post" enctype="multipart/form-data">
                                    <br>
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label class=" control-label"><b>Have you ever been admitted/hospitalized?</b></label>
                                        <div class="">
                                            <select class="form-control" name="hospitalized" id="hospitalized" onchange = "EnableDisableTextBox(this)">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>If yes, what illness?</b></label>
                                        <?php
                                        $pat_id=$_SESSION['id'];

                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from clinic_patient_info where patient_id='$pat_id'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <input type="text" class="form-control" name="ill" id="ill" value="<?php echo htmlentities($result['admitted_illness']);?>">
                                                  
                                                  <?php }
                                                  
                                                  ?>
                                        
                                        
                                      </div>                           
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>When?</b></label>
                                        <?php
                                        $pat_id=$_SESSION['id'];

                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from clinic_patient_info where patient_id='$pat_id'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <input type="date" class="form-control" name="whenn" id="whenn" value="<?php echo htmlentities($result['admitted_illness_start']);?>">                                                 
                                                  <?php }
                                                  
                                                  ?>
                                        
                                      </div>
                                     <div class="form-group col-md-4">
                                        <label class=" control-label"><b>Have you ever had a surgical operation?</b></label>
                                        <div class="">
                                            <select class="form-control" name="operation" id="operation" onchange = "EnableDisableText(this)">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                      </div>
                                     <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>If yes, what kind?</b></label>
                                        <?php
                                        $pat_id=$_SESSION['id'];

                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from clinic_patient_info where patient_id='$pat_id'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <input type="text" class="form-control" name="kind" id="kind" value="<?php echo htmlentities($result['operation_kind']);?>">                                                 
                                                  <?php }
                                                  
                                                  ?>
                                      </div> 
                                       <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>When?</b></label>
                                        <?php
                                        $pat_id=$_SESSION['id'];

                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from clinic_patient_info where patient_id='$pat_id'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                   <input type="date" class="form-control" name="whennn" id="whennn" value="<?php echo htmlentities($result['operation_when']);?>">                                               
                                                  <?php }
                                                  
                                                  ?>
                                        
                                      </div>
                                   </div>
                                     <br>   
                                     <div class="form-group">
                                      <label for="inputAddress"><b>Have you ever had any of the following infectious diseases?</b></label>
                                    <h6>(Previous answer:&nbsp;
                                      <?php
                                        $pat_id=$_SESSION['id'];

                                                  
                                                  $sql=mysqli_query($db,"select * from clinic_patient_info where patient_id='$pat_id'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                   <?php echo htmlentities($result['infectious_disease']);?>                                              
                                                  <?php }
                                                  
                                                  ?>
                                      )</h6>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok" type="checkbox" name="disease[]" value="Measles">
                                      <label class="form-check-label" for="inlineCheckbox1">Measles</label>
                                    </div>
                                    <br>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok1" type="checkbox" name="disease[]" value="German Measles">
                                      <label class="form-check-label" for="inlineCheckbox2">German Measles</label>
                                    </div>
                                    <br>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok2" type="checkbox" name="disease[]" value="Chickenpox">
                                      <label class="form-check-label" for="inlineCheckbox2">Chickenpox</label>
                                    </div>
                                    <br>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok3" type="checkbox" name="disease[]" value="Hepatitis A">
                                      <label class="form-check-label" for="inlineCheckbox2">Hepatitis A</label>
                                    </div>
                                    <br>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok4" type="checkbox" name="disease[]" value="Tetanus">
                                      <label class="form-check-label" for="inlineCheckbox2">Tetanus</label>
                                    </div>
                                    <br>
                                    <div id="noneAbove" class="form-check form-check-inline">
                                      <input class="form-check-input" id="ok5" type="checkbox" name="disease[]" value="Pulmonary Tuberculosis">
                                      <label class="form-check-label" for="inlineCheckbox2">Pulmonary Tuberculosis</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" id="none" type="checkbox" name="disease[]" value="None">
                                      <label class="form-check-label" for="inlineCheckbox2">None</label>
                                    </div>
                                    </div>


                                  <div class="form-group">
                                    <label class="control-label"><b>Do you experience headache, dizziness or syncope at any time?</b></label>
                                    <h6>(Previous answer:&nbsp;
                                      <?php
                                        $pat_id=$_SESSION['id'];

                                                  
                                                  $sql=mysqli_query($db,"select * from clinic_patient_info where patient_id='$pat_id'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                   <?php echo htmlentities($result['headaches']);?>                                             
                                                  <?php }
                                                  
                                                  ?>
                                      
                                    )</h6>  
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="illness" value="Yes">Yes
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="illness" value="No">No
                                      </label>
                                    </div>
                                  </div>

                                   <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label class=" control-label"><b>At what age did you have your first menstruation?</b></label>
                                        <?php
                                        $pat_id=$_SESSION['id'];

                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from clinic_patient_info_female where patient_id='$pat_id'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <input type="number" class="form-control" name="first" required="required" value="<?php echo htmlentities($result['mens_age_start']);?>">                                                 
                                                  <?php }
                                                  
                                                  ?>
                                         
                                      </div>
                                </div>

                               <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>Do you have regular monthly periods?</b></label>
                                         <div class="">
                                            <select class="form-control" name="regular" id="regular" onchange = "EnableDisable(this)">                                  
                                                <option value="No">No</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </div>
                                      </div>                             
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>If no, how often do you have your periods in a year?</b></label>
                                         <?php
                                        $pat_id=$_SESSION['id'];

                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from clinic_patient_info_female where patient_id='$pat_id'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <input type="text" class="form-control" name="peryear" id="peryear" placeholder="ex. 2/year" value="<?php echo htmlentities($result['mens_irregular']);?>">                                                 
                                                  <?php }
                                                  
                                                  ?>
                                        
                                      </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>Do you experience dysmenorrhea?</b></label>
                                         <div class="">
                                            <select class="form-control" name="dysmenorrhea" id="dysmenorrhea" >
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                      </div>                             
                                      <div class="form-group col-md-4">
                                        <label for="inputEmail4"><b>What other premenstrual symptoms do you have?</b></label>
                                         <?php
                                        $pat_id=$_SESSION['id'];

                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from clinic_patient_info_female where patient_id='$pat_id'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <input type="text" class="form-control" name="premen" placeholder="ex. 2/year" value="<?php echo htmlentities($result['pms']);?>">                                                 
                                                  <?php }
                                                  
                                                  ?>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="control-label"><b>Lab Test Results</b><br>
                                    &ensp;&ensp;&ensp;
                                        <input class="form-check-input" type="file" name="file_name[]" multiple></label>

                                    </div>
                                  </div>

                                                   
                          <p style="color: black; padding-top: 5px">
                          
                           <input type="checkbox"  name="permission" value="I hereby swear that the above information are true and correct. And therefore, promise to abide by the rules and regulations
                           of the University of Southeastern Philippines-Health Service Division.">
                           I hereby swear that the above information are true and correct. And therefore, promise to abide by the rules and regulations
                           of the University of Southeastern Philippines-Health Service Division.
                         <br><br><br><br>

                            <div class="tile-footer">
                              <button class="btn btn-primary" name="female"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button> 
                            </div>
                        
                        </div>
      </div></form>
   <?php                  
  if(isset($_POST['female'])){   
    $patient_id=$_SESSION['id']; 
    $hospitalized = $_POST['hospitalized'];
    $ill = $_POST['ill'];
    $whenn = $_POST['whenn'];
    $operation = $_POST['operation'];
    $kind = $_POST['kind'];
    $whennn = $_POST['whennn'];
    $checkbox1 = $_POST['disease'];
    $illness = $_POST['illness'];
    $permission = $_POST['permission'];

    $first = $_POST['first'];
    $regular = $_POST['regular'];
    $peryear = $_POST['peryear'];
    $dysmenorrhea = $_POST['dysmenorrhea'];
    $premen = $_POST['premen'];
    $chk="";
    $location="";
    $fillout_date="";
 


    // checker
    if(empty($patient_id)||empty($hospitalized)|| empty($operation)|| empty($disease)|| empty($illness) || empty($permission) || empty($first)|| empty($regular)|| empty($dysmenorrhea)) { 

        
        if(empty($hospitalized)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }  
        
        if(empty($operation)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
              
        if(empty($disease)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        
        if(empty($illness)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
         if(empty($permission)) {
            echo "<font color='red'>Product field is empty.</font><br/>";
        }

          if(empty($first)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }  
        if(empty($regular)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($dysmenorrhea)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
           
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 
    $l = "DELETE FROM clinic_patient_info_female WHERE patient_id='$patient_id'";
     if(mysqli_query($db, $l)){

     $res ="INSERT INTO clinic_patient_info_female(patient_id,mens_age_start,mens_regular,mens_irregular,dysmenorrhea,pms) VALUES('$patient_id','$first','$regular','$peryear','$dysmenorrhea','$premen')";

    if ($db->query($res) === TRUE) {

    $s = "SELECT patient_id from clinic_patient_info where patient_id='$patient_id'";
    $resu = $db->query($s);
      if ($resu->num_rows > 0) {


        foreach($checkbox1 as $chk1)  
       {  
          $chk .= $chk1.",";  
       }

       foreach ($_FILES['file_name']['name'] as $key => $name){
 
                  $newFilename = $name;
                  move_uploaded_file($_FILES['file_name']['tmp_name'][$key], '../C-Admin/filesuploaded/' . $newFilename);
                  $location .='filesuploaded/'.$newFilename.",";

              
        }


        $up="UPDATE clinic_patient_info 
              set admitted='$hospitalized', admitted_illness='$ill',admitted_illness_start='$whenn',operation='$operation',operation_kind='$kind',operation_when='$whennn',infectious_disease='$chk',headaches='$illness',swear_clause='$permission',lab_tests='$location', fillout_date=now()   
              where patient_id='$patient_id'";

        $result5 = $db->query($up);


           echo '<script>
                  swal({
                  title: "Record Successfully Updated!",
                  text: "Server Request Failed!",
                  type:"success",
                  icon: "success",
                  button: false,
                  timer:2000,
                  closeOnClickOutside: false,
                  closeOnEsc: false,
                  }).then(function(){

                    window.location = "facultyClinicComplaint.php";
                    })
                 </script>';


        
        }
        }

    }

    else { 

      foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }
    foreach ($_FILES['file_name']['name'] as $key => $name){
 
                  $newFilename = $name;
                  move_uploaded_file($_FILES['file_name']['tmp_name'][$key], '../C-Admin/filesuploaded/' . $newFilename);
                   $location .=$newFilename.",";
 }

$in_ch=mysqli_query($db,"INSERT INTO clinic_patient_info(patient_id,admitted,admitted_illness,admitted_illness_start,operation,operation_kind,operation_when,infectious_disease,headaches,swear_clause, lab_tests, fillout_date) VALUES('$patient_id','$hospitalized','$ill','$whenn','$operation','$kind','$whennn','$chk','$illness','$permission', '$location', now())");


if($in_ch==1)  
   {  


      $res ="INSERT INTO clinic_patient_info_female(patient_id,mens_age_start,mens_regular,mens_irregular,dysmenorrhea,pms) VALUES('$patient_id','$first','$regular','$peryear','$dysmenorrhea','$premen')";

            if ($db->query($res) === TRUE) {

           $sql="Update student set patinfo_status='1'  where Student_id='$patient_id'";
           $result5 = $db->query($sql);

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
    window.location = "facultyClinicComplaint.php";
  })
     </script>';

          
    } 
   }
else  
   {  
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
echo"<meta http-equiv='refresh' content='2'>";

}

    function upload_files($tableName){
   
    $uploadTo = "docs/"; 
    $allowFileExt = array('jpg','png','jpeg','gif','pdf','doc','csv','zip');
    $fileName = array_filter($_FILES['file_name']['name']);
    $fileTempName=$_FILES["file_name"]["tmp_name"];
    $tableName= trim($tableName);
    if(empty($fileName)){ 
       $error="Please Select files..";
       return $error;
     }else if(empty($tableName)){
       $error="You must declare table name";
       return $error;
     }else{
    
     $error=$storeFilesBasename='';

    foreach($fileName as $index=>$file){
         
    $fileBasename = basename($fileName[$index]);
    $filePath = $uploadTo.$fileBasename; 
    $fileExt = pathinfo($filePath, PATHINFO_EXTENSION); 

    if(in_array($fileExt, $allowFileExt)){ 

        // Upload file to server 
        if(move_uploaded_file($fileTempName[$index],$filePath)){ 
        
         // Store Files into database table
         $storeFilesBasename .= "('".$fileBasename."'),"; 
          
         }else{ 
         $error = 'File Not uploaded! try again';

         } 

     }else{

       $error .= $_FILES['file_name']['name'][$index].' - file extensions not allowed<br> ';

     }
    }

    store_files($storeFilesBasename, $tableName);
  }

    return $error;
}
    // File upload configuration 

    function store_files($storeFilesBasename, $tableName){
      global $db;
      if(!empty($storeFilesBasename))
      {
      $value = trim($storeFilesBasename, ',');


       $store="INSERT INTO ".$tableName." (lab_tests) VALUES".$value;

      
      $exec= $db->query($store);
       if($exec){
       
        echo "files are uploaded successfully";
         
       }else{
        echo  "Error: " .  $store . "<br>" . $db->error;
       }
      }
    }


?> 



        
       
        

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
    function EnableDisableTextBox(hospitalized) {
        var selectedValue = hospitalized.options[hospitalized.selectedIndex].value;
        var ill = document.getElementById("ill");
        var whenn = document.getElementById("whenn");
        whenn.disabled = selectedValue == "Yes" ? false : true;
        ill.disabled = selectedValue == "Yes" ? false : true;
        
        if (!ill.disabled && !whenn.disabled) {
          whenn.focus();
            ill.focus();
            
        }
    }

     function EnableDisableText(operation) {
        var selectedValue = operation.options[operation.selectedIndex].value;
        var kind = document.getElementById("kind");
        var whennn = document.getElementById("whennn");
        kind.disabled = selectedValue == "Yes" ? false : true;
        whennn.disabled = selectedValue == "Yes" ? false : true;
        if (!ill.disabled && !whennn.disabled) {
            ill.focus();
            whenn.focus();
        }
    }

    function EnableDisable(regular) {
        var selectedValue = regular.options[regular.selectedIndex].value;
        var peryear = document.getElementById("peryear");
        peryear.disabled = selectedValue == "No" ? false : true;
        if (!peryear.disabled) {
            peryear.focus();
        }
    }

     $(document).ready(function(){
   // Check or Uncheck All checkboxes
   $("#checkall").change(function(){
     var checked = $(this).is(':checked');
     if(checked){
       $(".form-check-input").each(function(){
         $(this).prop("checked",false);
       });
     }else{
       $(".form-check-input").each(function(){
         $(this).prop("checked",false);
       });
     }
   });
 
  // Changing state of CheckAll checkbox 
  $(".form-check-input").click(function(){
 
    if($(".form-check-input").length == $(".form-check-input:checked").length) {
      $("#checkall").prop("checked", false);
    } else {
      $("#checkall").prop("checked", false);
    }

  });
});

             $(function(){
  $('#none').on('change',function(){
     var ok = document.getElementById("ok");
     var ok1 = document.getElementById("ok1");
     var ok2 = document.getElementById("ok2");
     var ok3 = document.getElementById("ok3");
     var ok4 = document.getElementById("ok4");
     var ok5 = document.getElementById("ok5");
     if ($(this).prop('checked') === true){
       $('#ok').prop('checked', false);
       $('#ok1').prop('checked', false);
       $('#ok2').prop('checked', false);
       $('#ok3').prop('checked', false);
       $('#ok4').prop('checked', false);
       $('#ok5').prop('checked', false);
     }
  });
  
  $('#ok,#ok1,#ok2,#ok3,#ok4,#ok5').on('change',function(){
      var noone = document.getElementById("noneAboveCheck");
      if ($(this).prop('checked') === true){
         $('#none').prop('checked', false);
      } 
  });
});
</script>
<script type="text/javascript">

</script>
    </body>
  </html>
   