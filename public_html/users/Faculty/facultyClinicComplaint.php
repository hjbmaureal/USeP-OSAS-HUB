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
      <title>UseP Hub</title>
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
    <!-- disable selected option-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">FACULTY PORTAL</p>
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="home.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
      

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="#">Home</a></li>
              <li><a class="treeview-item" href="#">Counselling</a></li>
              <li><a class="treeview-item" href="#">Evaluation</a></li>
            </ul>
          </li>


          <li class="treeview"><a class="app-menu__item active" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="facultyHome.php">Home</a></li>
              <li><a class="treeview-item" href="facultyClinic_Privacy_Policy.php">Consultation</a></li>
              <li><a class="treeview-item active" href="facultyConsultationHistory.php">Consultation History</a></li>
              <li><a class="treeview-item" href="facultyPrescription.php">Prescription</a></li>
              <li><a class="treeview-item" href="facultyRequestMedCert.php">Request for Medical Certificate</a></li>
              <li><a class="treeview-item" href="facultyRequestMedRecsCert.php">Request for Medical Records Certification</a></li>
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
 
       


      <form method="post">
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="mb-3 line-head">SETTING UP CONSULTATION</h3>
            <div class="tile-body">
                                 
                                    <br>
                                    <div class="row">
                                     
                                      <div class="col-sm">
                                        <div class="form-group">
                                          <label><b><br>Consultation type</b></label>
                                            <select class="form-control" name="type" id="type">
                                                <option value="3">Medical Consultation</option>
                                                <option value="2">Dental Consultation</option>
                                            </select>
                                        </div>
                                      </div>
                                   
                                      <div class="col-sm">
                                        <div class="form-group">
                                          <label><b>Preferred Mode of Communication<br>(1st Option)</b></label>
                                            <select  name="mode" id="mode"  class="form-control" onchange="yesnoCheck(this);" data-table="reports-list">
                                              <option value="">Select Option</option>
                                          
                                                 <?php
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from mode_of_communication");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['communication_mode']);?>"><?php echo htmlentities($result['communication_mode']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                                                  </select>  
                                        
                                      </div> 
                                    </div>

                                    
                                    <div class="col-sm">
                                      <div class="form-group"> 
                                          <label><b>Preferred Mode of Communication<br>(2nd Option)</b></label>
                                            <select  name="modei" id="modei"  class="form-control" onchange="yesnoCheck(this);" data-table="reports-list">
                                              <option value="">Select Option</option>
                                          
                                                 <?php
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from mode_of_communication");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['communication_mode']);?>"><?php echo htmlentities($result['communication_mode']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                                                  </select>  
                                        
                                      </div> 
                                    </div>
                                     
                                        <div class="col-sm">
                                          <div class="form-group">
                                                <div id="ifYes" style="display: none;">
                                                  <br>
                                                  <label for="car"><b>Messenger</b></label><input type="text" class="form-control" id="car" name="car" placeholder="Paste your fb account link here..." style="height: 35px;width: "/>
                                                </div>
                                          </div>
                                        </div>
                                               
                                        
                                       <div class=""> 
                                          <b></b>
                                            <select  name="semester" id="semester"  class="form-control" style="height: 35px;width: 250px" data-table="reports-list" hidden="" >
                                          
                                                 <?php
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from semester where status='Active'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['semester_name']);?>"><?php echo htmlentities($result['semester_name']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                                                  </select>  
                                        
                                      </div> 

                                     

                                      <div class=""> 
                                          <b></b>
                                            <select  name="schoolyear" id="schoolyear"  class="form-control" style="height: 35px;width: 250px" data-table="reports-list" hidden="">
                                          
                                                 <?php
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from schoolyear where status='Active'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['schoolyear']);?>"><?php echo htmlentities($result['schoolyear']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                                                  </select>  
                                        
                                      </div> 

                                   </div>
                                     <br>   



                                <div class="form-row">
                                      <div class="form-group col-md-12">
                                        <label class="control-label"><b>What seems to be the problem?</b></label>
                                          <textarea name="problem" id="problem" class="form-control rounded-10" rows="6" required="required" placeholder="Type your complaints here; you may use Bisaya, Tagalog, or English..."></textarea>
                                      </div>

                                      <input 
                                             name="faculty"
                                             id="faculty"  
                                             style="height: 27px; width: 140px"
                                             value="<?php echo $_SESSION["usertype"]; ?>"
                                             hidden
                                            >
                                      <input
                                             name="id"
                                             id="id"  
                                             style="height: 27px; width: 140px"
                                             value="<?php echo $_SESSION["id"]; ?>"
                                             hidden
                                            >
                                </div>

                               <p style="color: grey">[ e.g., When did your illness started? What medication did you take? ]</p> 
                                                   

                            <div class="tile-footer">
                              <br>
                              <button name="Submit" id="Submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                             &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="facultyConsultationHistory.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        
                        </div>

    
      </div></form>

<?php   

  if(isset($_POST['Submit'])){   
    $patient_id=$_POST['id'];
    $patient_type=$_POST['faculty'];
    $school_year=$_POST['schoolyear'];
    $semester=$_POST['semester'];
    $mode = $_POST['mode'];
    $modei = $_POST['modei'];
    $type = $_POST['type'];
    $problem = $_POST['problem'];
    $status="Pending";
    $fb = $_POST['car'] ?? null;
  

    // checker
     if(empty($type)||empty($mode)||empty($modei)||empty($problem)) { 

        if(empty($type)) {
            echo "<font color='red'>Consultation type is empty.</font><br/>";
        }  
        if(empty($mode)) {
            echo "<font color='red'>Communication_mode First Option field is empty.</font><br/>";
        }
        if(empty($modei)) {
            echo "<font color='red'>Communication_mode Second Option field is empty.</font><br/>";
        }
        if(empty($problem)) {
            echo "<font color='red'>Complain field is empty.</font><br/>";
        }       
        
        //go back ni
       echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 

    else { 
        
        //insert syntax
        $result ="INSERT INTO consultation(patient_id,consultation_type,communication_mode_first_option,communication_mode_second_option,messenger,patient_type,problems,date_filed, status,semester,school_year) VALUES('$patient_id','$type','$mode','$modei','$fb','$patient_type','$problem',now(),'$status','$semester','$school_year')";

          if ($db->query($result) === TRUE) {

          echo '<script>
                swal({
                title: "Complaint added successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:2000,
                closeOnClickOutside: false,
                closeOnEsc: false,
                }).then(function() {
              window.location = "facultyConsultationHistory.php";
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
 echo"<meta http-equiv='refresh' content='2'>";

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

        whennn.disabled = selectedValue == "Yes" ? false : true;
        kind.disabled = selectedValue == "Yes" ? false : true;
        if (!ill.disabled && !whennn.disabled) {
            ill.focus();
            whenn.focus();
        }
    }

</script>
</script>

  <script type="text/javascript">

    //fb acc
    function yesnoCheck(that) {
    if (that.value == "Messenger") {

        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}

   //disable already selected
   $(document).ready(function () {
    $(".form-control").change(function () {
        var value = $(this);
        var prevVal = value.data("prev");
        var otherSelects = $(".form-control").not(this);
        otherSelects.find('option[value="' + $(this).val() + '"]').attr('disabled', true);
        if (prevVal) {
            otherSelects.find('option[value="' + prevVal + '"]').attr('disabled', false);
        }
        value.data("prev", value.val());
    });
});



</script>
    </body>
  </html>
   