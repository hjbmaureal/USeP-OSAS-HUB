<?php
include("config.php");

if(isset($_GET['patient_id']))

{
	$patientid = $_GET['patient_id'];
	$sql = mysqli_query($mysqli, "SELECT * from patient_list where patient_id='$patientid'");
	while ($row = mysqli_fetch_array($sql)){
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $sex = $row["sex"];
    $course = $row["course_department"];
    $address = $row["address"];
		# code...
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
      <title>Patient Info</title>
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
       
          <li><a class="app-menu__item" href="Admin-Dashboard.html"><i class="app-menu__icon fa fa-chart-bar"></i><span class="app-menu__label">Dashboard</span></a></li>
           <li><a class="app-menu__item active" href="Admin-PatientList.html"><i class="app-menu__icon fas fa-user-alt"></i><span class="app-menu__label">Patient</span></a></li>


          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comment-medical"></i><span class="app-menu__label">Consultation</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Admin-NewConsultation.html">New Consultation</a></li>
              <li><a class="treeview-item" href="Admin-ListOfConsultation.html">List of Consultation</a></li>
            </ul>
          </li>

 
          <li><a class="app-menu__item" href="Admin-Appointment.html"><i class="app-menu__icon fa fa-calendar-alt"></i><span class="app-menu__label">Appointment</span></a></li>
          <li><a class="app-menu__item" href="Admin-Prescription.html"><i class="app-menu__icon fas fa-prescription"></i><span class="app-menu__label">Prescription</span></a></li>
          <li><a class="app-menu__item" href=""><i class="app-menu__icon  fas fa-envelope-open-text"></i><span class="app-menu__label">Request</span></a></li>
          <li><a class="app-menu__item" href=""><i class="app-menu__icon  fas fa-file-medical"></i><span class="app-menu__label">Medical Certificate</span></a></li>


         
          <li><a class="app-menu__item" href=""><i class="app-menu__icon fas fa-user-nurse"></i><span class="app-menu__label">Medical Personnel</span></a></li>
        
          

          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href=""><i class="app-menu__icon fas fa-bullhorn"></i><span class="app-menu__label">Announcement</span></a></li>
          <li><a class="app-menu__item" href=""><i class="app-menu__icon fas fa-poll"></i><span class="app-menu__label">Reports</span></a></li>
        
          
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
       
   <?php  
                                  
                                // Import the file where we defined the connection to Database.     
                                    require_once "config.php";   
                                
                                    $per_page_record = 20;  // Number of entries to show in a page.   
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
         <!--<div class="page-error tile">-->
<h2>Patient Information</h2> <br>

  

  <div class="row">
        <div class="col-xl">
          <div style="background-color: #C12C32; padding: 8px 10px;"> </div>
          <div class="tile">
                      <div class="container">
                         <div class="row">
                               <div class="col-4">

                                    <div style="height: 200px; width: 150px;border-radius: 50%;margin-left: 40px;"><img src="image/female_user.png" style=" vertical-align: middle; max-width: 100%; border-radius: 50%;">
                                     
                                      <h5 style="margin-left: 50px; margin-top: 10px;"><?php echo $fname ?></h5> 

                                      <h5 style="margin-left: 50px;"><?php echo $patientid ?></h5>
                                   
                                            </div>
                                    <button  class="btn btn-danger" id="demoNotify" style=" vertical-align: middle;width: 50px;height: 50px; border-radius: 50%; margin-left:150px; margin-top: -170px;"><i style="margin-left: -2.5px;" class="fas fa-camera fa-2x"></i></button>
                           </div>
                          
                                <div class="col-lg">
                                      <h5>Patient ID:&nbsp;<span class="font-weight-lighter ml-2"><?php echo $patientid ?></span></h5> 
                                      <h5>Patient Name:&nbsp;<span class="font-weight-lighter ml-2"><?php echo $fname ?>&nbsp;<?php echo $lname ?></span></h5>
                                      <h5>Sex:&nbsp;<span class="font-weight-lighter ml-2"><?php echo $sex ?></span></h5> 
                                      <h5>Course:&nbsp;<span class="font-weight-lighter ml-2"><?php echo $course ?></span></h5>
                                      <h5>Address:&nbsp;<span class="font-weight-lighter ml-2"><?php echo $address ?></span></h5> 
                                      <br>
                                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalLong"; return false><i class="fas fa-exclamation-triangle"></i> View Medical Info</button>
                                      <br>
                                      <br>
                                      <button class="btn btn-danger btn-sm" data-toggle="modal" ; return false><i class="fas fa-exclamation-triangle"></i> View Health Record</button>

                                 
                        <div class="col">
                          <div class="inline-block float ml-2 mt-1"></div> 
                         </div>
                        </div>

                            </div>
                         </div>
                        </div>
                    

          <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <div class="float-left"><h4>Patient History</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-auto">

                     
                  <div class="inline-block">
                    Year
                    <select class="bootstrap-select">
                        <option class="select-item" value="1" selected="selected">All</option>
                        <option class="select-item" value="2">2021</option>
                        <option class="select-item" value="3">2020</option>
                      </select>
                    </div>

                      </div>
                      <div class="col">
                          <div class="inline-block float ml-2 mt-1"><button class="btn btn-danger btn-sm verify"><i class="fas fa-download"></i> Export</button></div> 
                      </div>

                  </div>
                </div>

                   <?php  
                                  
                                // Import the file where we defined the connection to Database.     
                                    require_once "config.php";   
                                
                                    $per_page_record = 20;  // Number of entries to show in a page.   
                                    // Look for a GET variable page if not found default is 1.        
                                    if (isset($_GET["page"])) {    
                                        $page  = $_GET["page"];    
                                    }    
                                    else {    
                                      $page=1;    
                                    }    
                                
                                    $start_from = ($page-1) * $per_page_record;     
                                
                                    $query = "SELECT * FROM patient_history LIMIT $start_from, $per_page_record";        
                                    $rs_result = mysqli_query($mysqli, $query);   //and conn kay mao na ang sa variable sulod sa config 
                                ?> 

                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered" id="sampleTable2">
                    <thead>
                      <tr>
                      <th><input type="checkbox" class="select-all checkbox" name="select-all" id="selectAll" /></th>
                      <th>Date</th>
                      <th class="max">Diagnosis</th>
                      <th>Treatment</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>


                    </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>  


              <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Patient#:&nbsp;<?php echo $patientid ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                                      
                       <div class="col-sm-12">
                        <div class="modal-body c">
                        <div class="container">
                        <div class="id-picture"><img src="image/female_user.png" style="max-width: 100%;"></div>
                        <h6 class="font-weight-bold">ID Number: <span class="font-weight-lighter ml-6">&nbsp;<?php echo $patientid ?></span></h6> 
                        <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2">&nbsp;<?php echo $fname ?>&nbsp;<?php echo $lname ?></span></h6>
                        <h6 class="font-weight-bold">Sex: <span class="font-weight-lighter ml-2">&nbsp;<?php echo $sex ?></span></h6>
                        <h6 class="font-weight-bold">Course: <span class="font-weight-lighter ml-2">&nbsp;<?php echo $course ?></span></h6>
                        <h6  class="font-weight-bold">Year level: <span class="font-weight-lighter ml-2"> 3rd Year</span></h6>
                          <br>
                          <br>
                        </div>
                      </div>
                        <div class="table-responsive marg">
                            <table  class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        <th>1.) Have you ever been admitted/hospitalized?</th>
                                        <td>Yes</td>
                                    </tr>

                                     <tr>
                                        <th>1.1.) If yes, what illness?</th>
                                        <td>Asthma</td>
                                    </tr>
                                    <tr>
                                        <th>1.2.) When your illness has started?</th>
                                        <td>January 2019</td>
                                    </tr>

                                     <tr>
                                        <th>2.) Have you ever had a surgical operation?</th>
                                        <td>No</td>
                                    </tr>
                                    <tr>
                                        <th>2.1.) If yes, what kind?</th>
                                        <td>N/A</td>
                                    </tr>

                                     <tr>
                                        <th>2.2.) When did your surgical operation happened?</th>
                                        <td>N/A</td>
                                    </tr>
                                    <tr>
                                        <th>3.) What infectious disease(s) did you have? </th>
                                        <td>Measles</td>
                                    </tr>
                                    <tr>
                                        <th>4.) Do you experience headache, dizziness or syncope at any time?</th>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <th>5.) At what age did you have you first menstruation?</th>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <th>6.) Do you have regular monthly periods? </th>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <th>6.1.) If no, how often do you have your periods in a year? </th>
                                        <td>N/A</td>
                                    </tr>
                                    <tr>
                                        <th>7.) Do you experience dysmenorrhea? </th>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <th>8.) What other premenstrual symptoms do you have? </th>
                                        <td>None</td>
                                    </tr>
                                    </tbody>     
                                    </table>          
                    </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Print</button>
                </div>
      
                  </div> 
                </div>
            
              
            </div>
          </div>

                <div class="modal fade " id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF; font-size: 15px;">EDIT RECORDS</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>


                      <div class="modal-body c" style="background-color: #F5F5F5">
                     
                        <div class="container" style="border: 1px solid black; margin-top: 10px; padding: 20px; border-radius: 10px; background-color: #FFFFFF">
                        	<form method="POST" action="edithistory.php?ID_Number=<?php echo $row['ID_Number']; ?>">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                        <label class=" control-label"><b>Date</b></label>
                                         <input type="date" class="form-control" id="date" placeholder="Select date (Calendar pick)">
                              </div>
                            </div>
                          <h6 class="font-weight-bold">Diagnosis: </h6> 
                            <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" id="exampleFormControlTextarea1" rows="4" placeholder="Type diagnosis here..."></textarea>
                                      </div>
                          </div>
                         
                          <h6 class="font-weight-bold">Treatment: </h6> 
                            <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" id="exampleFormControlTextarea1" rows="3" placeholder="Type treatment here..."></textarea>
                                      </div>
                            </div>
                      
                          <h6 class="font-weight-bold">Remarks: </h6> 
                           <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" id="exampleFormControlTextarea1" rows="3" placeholder="Type your remarks here..."></textarea>
                                      </div>
                          
                          </div>
                          </div>
                      </div>
                          <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span>Save Changes</button>
                </div>
                      </div>
                  </form>
                    </div>
                  </div>
                </div>




                <!--<div class="form-group col-md-6">
                  <label class="control-label">Current Password</label>
                  <input class="form-control" type="password" placeholder="Enter current password">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">New Password</label>
                  <input class="form-control" type="password" id="psw" name="psw" placeholder="Enter new password">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">Confirm New Password</label>
                  <input class="form-control"type="password" id="password" name="psw" placeholder="Confirm new password">
                </div>
                           

                   <div class=" col-md-6" style="margin-left: 530px; margin-top: -240px;">
                    <label class="control-label" style="font-size: 20px;">New password must contain the following:</label><br>
                   
                    <label class="control-label" class="invalid" id="length" style="font-size: 15px;" >Minimum of 8 characters </label><br>
                    <label class="control-label" class="invalid" id="capital" style="font-size: 15px;">An uppercase character </label><br>
                    <label class="control-label" class="invalid" id="letter" style="font-size: 15px;">A lowercase character </label><br>
                    <label class="control-label" class="invalid" id="number" style="font-size: 15px;">A number </label><br>
                    <label class="control-label"  class="invalid" id="special" style="font-size: 15px;">A special character </label><br>
                    <br><br><br>
                    </div>
                    <div style="margin-left:810px;">
                      <button class="btn btn-success" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>-->
                  </form>
        </div>
               </div> </div>
                     
           
        <!--</div>-->
      </main>
      <!-- Essential javascripts for application to work-->
   <script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var special = document.getElementById("special");

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
    // Validate special characters ~`! @#$%^&*()_-+={[}]|\:;"'<,>.?/
  var numbes= /[!@#$%^&*-]/g;

  if(myInput.value.match(numbes)) {  
    special.classList.remove("invalid");
   special.classList.add("valid");
  } else {
    special.classList.remove("valid");
    special.classList.add("invalid");
  }

}
</script>
<style type="text/css">
    .valid {
  color: green;
}

.valid:before {
  position: relative;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative; 
  content: "✖";
}

</style>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="js/plugins/pace.min.js"></script>
      <script type="text/javascript" src="js/plugins/dropzone.js"></script>
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
    </body>
  </html>