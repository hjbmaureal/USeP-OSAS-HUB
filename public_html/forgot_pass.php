

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/upstyle.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

      <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
    <title>Log In - Forgot Password</title>
  </head>
  <body>
<?php 
include("conn.php"); 

  $errors= array();
  if(isset($_POST["submit"]))
{
  $student_id= mysqli_real_escape_string($conn, $_POST['uname'] );


      $student_check_query="SELECT * FROM login_credentials WHERE username='$student_id'";
      $result1=mysqli_query($conn,$student_check_query);
      $student_check= mysqli_fetch_assoc($result1);

      if(!$student_check){
          array_push($errors, "Student ID doesnt exists");
        //  echo '<script>alert("Student ID does not exists")</script>';
          echo '<script>
                 swal({
                  title: "Request Submit Failed",
                  text: "Student ID does not exists",
                  type: "warning"
                });
                </script>';
      }

      $request_check_query="SELECT * from forgot_pass_requests where student_id='$student_id' and remarks='Request Delivered' LIMIT 1";
      $result2=mysqli_query($conn,$request_check_query);
      $request=mysqli_fetch_assoc($result2);

      if($request){
        if($request['student_id']==$student_id){
          array_push($errors, "Request already exits");
         // echo '<script>alert("Request already exits")</script>';
          echo '<script>
                 swal({
                  title: "Request Submit Failed",
                  text: "Request already exits",
                  type: "warning"
                });
                </script>';
        }
      }
      $user_id= 1;
      $notif_body = "A user requests for a new password.";
      if(count($errors) == 0){
        $result=mysqli_query($conn,"insert into `forgot_pass_requests` (student_id, remarks) values ('$student_id', 'Request Delivered')");
        $notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$user_id', '$notif_body',now(),'ForgotPassword_Requests.php', 'Delivered')");
        if($result && $notification){
         /* echo '<script>
              alert("Request Submitted Succesfully");
            </script>';*/
          echo '<script>
                 swal({
                  title: "Request Submitted Succesfully",
                  text: "Server Request Success",
                  type: "success"
                });
                </script>';

        }else{
          /*echo '<script>
                alert("Failed");
              </script>';*/
          echo '<script>
                 swal({
                  title: "Request Submit Failed",
                  text: "Server Request Failed",
                  type: "warning"
                });
                </script>';
        }
        }
        
  


}
   ?>
  <header class="header">
    <div class="d-flex flex-row">
  <div class="align-self-center"><img class="logo" src="images/logo.png" width="40px"></div>
  <div class="align-self-center ml-2">University of Southeastern Philippines</div>
    </header>
    <div style="height: 2px; width: 100%;" class="btn-danger"></div>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 contents">
          <img src="images/vec1.png" alt="Image" class="img-fluid mt-5">
        </div>
        <div class="col-md-6 order-md-2">
    
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Forgot Password</h3>
              <p class="mb-4">Fill up ID number as proof of Identification</p>
            </div>
            <form method="post">
              <div class="form-group first">
                <label for="username">USep ID Number</label>
                <input type="text" class="form-control" id="username" name="uname" required>

              </div>
              
              <input type="submit" value="Submit Request" name="submit" class="btn text-white btn-block btn-danger"><br>
              <div class="d-flex mb-5 align-items-center">
                <span class="d-block text-left my-4 text-muted"><a href="reg.php"style="text-decoration-line:none; "> Register a new account</a></span>
                
                <span class="ml-auto"><a href="index.php" class="forgot-pass" style="text-decoration-line:none; ">Login</a></span> 
              </div>
              
              

              
            </form>
            </div>
          </div>

        </div>
        
      </div>
    </div>
  </div>


  <footer class="p-5 pl-6" style=" color: grey; ">
    Copyright © 2021. All Rights Reserved.
    <br>
    <a href="https://www.usep.edu.ph/usep-data-privacy-statement/"style="color: grey; font-size: 14px; font-weight: bold;text-decoration-line: all; "> Privacy Policy</a>
  </footer>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>