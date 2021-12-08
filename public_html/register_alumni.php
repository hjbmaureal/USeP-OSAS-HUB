<!DOCTYPE html>
<html lang="en">

<head>
    <!--   meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <script type="text/javascript" src="script/script.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">

    <!-- Title Page-->      
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
    <title>Register | USeP Virtual Hub</title>
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <!-- <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all"> -->

    <!-- Main CSS-->
    <link rel="stylesheet" href="css/fonts/icomoon/style.css">
    <link href="css/reg_main.css" rel="stylesheet" media="all">
    <link href="css/reg.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


</head>

<body>
    <header class="container-f" style="background-color: white;" >
        <div class="child" style="margin-top: 4.3px;"><img class="logo" src="images/logo.png" width="40px"></div>
        <div class="child ml headtitle" >University of Southeastern Philippines</div>
    </header>
    <div style="height: 2px; width: 100%;" class="btn-danger"></div>
    <div class="page-wrapper p-t-130 p-b-100 font-poppins" style="background-color: #FCF2F2;">
        <div class="wrapper wrapper--w680" >
            <div class="card card-4">
               <label class="label-sec">Not an Alumni? <a href="reg.php">Register here.</a></label>   
               <div class="card-body">

                <h2 class="title">OSAS Alumni Registration Form  </h2><i>* Required</i>
                <hr>
                <form id="studentregfrm" method="POST" action="reg_confirm_alumni.php" enctype="multipart/form-data">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Alumni ID Number <i>*</i></label>
                                <input class="input--style-4" type="text" id="id_num" name="id_num" maxlength="10" required>
                                <span id="user-availability-status" ></span> 
                            </div>
                        </div>
                    </div>
                    <h4>PERSONAL INFORMATION</h4>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label2">First Name <i>*</i><i></i></label>
                                <input class="input--style-4" type="text" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label2">Last Name<i>*</i> </label>
                                <input class="input--style-4" type="text" name="last_name" required>
                            </div>
                        </div><div class="col-2">
                            <div class="input-group">
                                <label class="label2">Middle Name <i>(if applicable)</i></label>
                                <input class="input--style-4" type="text" name="middle_name">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label2">Suffix <i>(if applicable)</i></label>
                                <input class="input--style-4" type="text" name="ex_suff">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email <i>*</i></label>
                                <input class="input--style-4" type="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Contact Number <i>*</i></label>
                                <input class="input--style-4 contact" type="text" name="phone"  maxlength="11" required>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h4>SCHOOL INFORMATION</h4>
                    <div class="row row-space">
                        <div class="col-2">
                        <div class="input-group">
                            <label class="label">Course <i>*</i></label>
                            <select class="input--style-5" id="course" name="course" style="width:260px" required="">
                                <option value="" selected="selected" disabled="">Choose Option</option>
                                <script type="text/javascript">
                                    $.ajax({
                                        url:"php/getCourses.php",
                                        method:"POST",
                                        data:{},
                                        success:function(response)
                                        {
                                            var obj = JSON.parse(response);
                                            var str = "";
                                            for (var i = 0; i < obj.length; i++) {
                                                $('#course').append("<option value='"+obj[i].name+"'>"+obj[i].name+"</option>");
                                            }
                                        },
                                        error: function(response){
                                          alert("fail" + JSON.stringify(response));
                                      }
                                  });
                              </script>
                          </select> 
                          
                      </div>
                  </div>

              <div class="col-2">
                <div class="input-group">
                    <label class="label">Major <i>*</i></label>
                    <select class="input--style-5" id="major" name="major" style="width:260px" required>
                        <option value="" selected="selected" disabled="">Select Course First</option>
                        <script type="text/javascript">

                            $(document).ready(function(){
                                $('#course').on('change', function(){
                                    var course_value = $(this).val();
                                    $('#major').empty().append('<option selected="selected" value="" disabled="">Select Major</option>');
                                    if(course_value){
                                       $.ajax({
                                        url:"php/getMajor.php",
                                        method:"POST",
                                        data:"course_value="+course_value,
                                        success:function(response)
                                        {
                                            var obj = JSON.parse(response);
                                            var str = "";
                                            for (var i = 0; i < obj.length; i++) {
                                                $('#major').append("<option value='"+obj[i].major+"'>"+obj[i].major+"</option>");
                                            }
                                        },
                                        error: function(response){
                                          alert("fail" + JSON.stringify(response));
                                      }
                                  });
                                   }else{
                                    $('#major').html('<option value="">Select course first</option>');
                                }
                            });
                            });
                      </script>
                  </select> 
              </div>
          </div>

                  <div class="col-2">
                    <div class="input-group">
                        <label class="label">Last School Year Attended<i>*</i></label>
                        <input class="input--style-4" type="text" name="year" required>
                    </div>
                </div>
            </div>


            

            <hr>
            <div class="row row-space">
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">Create Password <i>*</i></label>
                        <input class="input--style-4" type="password" name="password" minlength="8" id="id_password" required><i class="far fa-eye" id="togglePassword" style="margin-left: -30px;cursor: pointer;" ></i>
                    </div>
                </div>
                <div class="col-3">
                    <label class="label" >New password must contain the following:</label>
                    <label class="label" class="invalid" id="length">Minimum of 8 characters </label>
                    <label class="label" class="invalid" id="capital">An uppercase character </label>
                    <label class="label" class="invalid" id="letter">A lowercase character </label>
                    <label class="label" class="invalid" id="number">A number </label>
                    <label class="label"  class="invalid" id="special">A special character </label>
                    
                </div>
            </div>
            <hr>
            <div class="input-group">
               <div class="input-group">
                <label class="label">ALUMNI ID PICTURE  <i>*</i></label>
                <input class="trans-input" type="file" id="myFile" name="id_pic" accept=".png,.jpeg,.jpg,.PNG,.JPEG,.JPG" required>
            </div>
            <div class="input-group">
                <label class="label">ID PICTURE  <i>*</i></label>
                <input class="trans-input" type="file" id="myFile" name="prof_pic" accept=".png,.jpeg,.jpg,.PNG,.JPEG,.JPG" required>
            </div>
        </div>
        <hr>
        
        <div class="d-flex mb-5 align-items-center">
            <label class="control control--checkbox mb-0"><span class="caption"><a data-toggle="modal" data-target="#myModal">Click here to read our Data Privacy Statement before creating your account.</a></span>
              <input type="checkbox" required="" id="clickhere">
              <div class="control__indicator"></div>
          </label>
      </div>
      <br>
      <div class="p-t-15" style="margin-left: 100px;">
        <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
        <a class="btn btn--radius-2 btn--grey" href="index.php" style="text-decoration-line: none;" >Cancel</a>
    </div>
</form>
</div>
</div>
</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Please read our Data Privacy Statement before creating your account.</h5>      
      </div>
      <div class="modal-body" style="padding: 30px;">
          <div class="container">
            <div class="row">
                <div class="form-group col-sm" style="font-size: 13px; text-align: justify;">
                    <p style="color: black;">Dear Alumni,</p><br>
                    <p style="color: black;">Warm Greeting from your Alma Mater!</p><br>      
                    <p style="color: black; text-align: justify-all;">     
                     The right to privacy is a fundamental human right. Acknowledging this, the University of Southeastern Philippines, hereafter referred to as “University”, endeavors to safeguard its stakeholders’ data privacy by adhering to data privacy principles and employing standard safety measures in the collection, processing, disclosure and retention of personal data in accordance with the Data Privacy Act of 2012 (R.A. 10173), its Implementing Rules and Regulations (IRR) and to issuances of the National Privacy Commission.
                 </p>
                 <p style="color: black; text-align: justify-all;"><br>      
                     This University Data Privacy Statement (the “UDPS”) contains an outline of the general practices of the University in the context of data collection and processing. All other data privacy statements released or to be released by the University specific to a particular office, function or procedure shall be in congruence with the UDPS. Designed for general knowledge, the UDPS may not include specific information pertaining to the data collection and processing mechanism of a specific office, function or procedure. Thus, whenever applicable, a more specific data privacy statement or notice should be consulted.
                 </p>
                 <hr>
                 <p style="color: black; text-align: justify-all;">    
                     The  full    text    of      The     Statement   can     be      accessed    through  this link (<a style="color: #C12C32; " href="http://www.usep.edu.ph/usep-data-privacy-statement/">http://www.usep.edu.ph/usep-data-privacy-statement/</a>).
                 </p>
                 <p style="color: black; text-align: justify-all;"><br>      
                     For a comprehensive and detailed view of the University’s data privacy policies, please refer to the *University’s Data Privacy Manual.
                 </p>
                 <p style="color: black; text-align: justify-all;"><br>      
                     By checking this checkbox, you agree to the University of Southeastern Philippines Data Privacy Statement.
                 </p> <br><br>
             </div>
         </div>
     </div>  
     <center> 
         <button type="button" class="btn btn-danger" style="background-color:green;" id="btnModalAgree" data-dismiss="modal">I agree</button>
         <button type="button" class="btn btn-danger" id="btnModalDisagree" data-dismiss="modal">I disagree</button>
     </center>
 </div>
</div>
</div>
</div>

<!-- Main JS-->
<script>
    $(document).ready(function($){

        //check if user has already registered
        $('#id_num').focusout(function(){
            //get inputted student id
            var sid = $('#id_num').val().trim();
            $.ajax({
                url:"check_student_id_alumni.php",
                method:"POST",
                data:{student_id: sid },
                success:function(response)
                {
                    var obj = JSON.parse(response);
                    if (obj.length > 0){
                        $('#user-availability-status').text('Alumni ID number is already registered!');
                    } else {
                        $('#user-availability-status').text('');                        
                    }
                },
                error: function(response){
                  alert("fail" + JSON.stringify(response));
              }
          });
        });

        $('#btnModalAgree').click(function() {
          $('#clickhere').attr('checked', true);
          //$('#clickhere').attr('disabled', true);
      });
        $('#btnModalDisagree').click(function() {
          $('#clickhere').attr('checked', false);
          //$('#clickhere').attr('disabled', true);
      });


        //forms validation
        /*$('#studentregfrm').submit(function(e){
            var validatesid = $('#user-availability-status').text().length;
            if (validatesid > 0) {
                alert("You have already filled out the registration form. An email will be sent to you verifying your registration. If you've already received an email, please proceed to the login page.");
                e.preventDefault();
                return false;
            } else {
                if (($('#orgs').val().length > 0 && $('#student_pos').val().length == 0) || ($('#orgs').val().length == 0 && $('#student_pos').val().length > 0)){
                    alert("Please fill in both organization and position if your are a Governor or President of your organization. If not, leave it blank!");
                    e.preventDefault();
                    return false;
                }
            } 
        });*/

    });

    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');
    
    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

    var myInput = document.getElementById("id_password");
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
$('input[type="checkbox"]').on('change', function(e){
 if(e.target.checked){
   $('#myModal').modal();
}
});
</script>

<style type="text/css">
.control--checkbox input:disabled:checked ~ .control__indicator {
    background-color: green;
    opacity: 1;
}

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

<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="vendor/select2/select2.min.js"></script>


<!-- Main JS-->
<!-- <script src="js/global.js"></script> -->
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
<!-- end document-->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src=" js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
<script type="text/javascript">
 function openForm() {
  document.body.classList.add("myForm");

}

function closeForm() {
  document.body.classList.remove("myForm");

}

</script>
