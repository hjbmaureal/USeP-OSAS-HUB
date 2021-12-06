<?php
session_start();
include('conn.php');
//validating session
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

   <link rel="stylesheet" href="css/fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
<!-- Title Page-->
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
    <title>Log In | USeP Virtual Hub</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/upstyles.css">

    <title>Log In</title>
  </head>
  <body>

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
              <h3>Log In</h3>
              <p class="mb-4">Welcome to USeP Virtual Hub</p>
            </div>
            <form method="post" action="php/login_confirm.php">
              <div class="form-group first">
                <label for="username">USep ID Number</label>
                <input type="text" class="form-control" id="username" name="uname" required>

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="pword" required>
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="forgot_pass.php" class="forgot-pass" style="text-decoration-line:none; ">Forgot Password?</a></span> 
              </div>

              <input type="submit" value="Log In" name="submit" class="btn text-white btn-block btn-danger">
              <span class="d-block text-left my-4 text-muted"><a href="reg.php"style="text-decoration-line:none; "> Register a new account</a></span>

              
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