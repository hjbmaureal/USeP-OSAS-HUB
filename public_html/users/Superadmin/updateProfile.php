<!DOCTYPE html>
<html>
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
    <link rel="icon" href="../image/logo.png" type="image/gif" sizes="16x16">
    <title>Student Hub</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/superadmin/main_main.css">
    <link rel="stylesheet" type="text/css" href="../css/superadmin/upstyle_main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    
</head>
<body>

<?php
  session_start();
  include("../../conn.php"); 
  $super = $_POST['id'];
  $changePass;
  $passState;
 

  if(isset($_POST['submit-user-profile'])){
    $query = "";


 if (isset($_POST['currPass']) && isset($_POST['newPass'])&& isset($_POST['confirmNewPass'])) {
       
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
          
        $oldPass = validate($_POST['currPass']);
        $newPass = validate($_POST['newPass']);
        $confirmNewPass = validate($_POST['confirmNewPass']);

      $check_query="SELECT * from superadmin where username='$super'";
     $resultPass= mysqli_query($conn,$check_query);
     $row=mysqli_fetch_assoc($resultPass);
        $data = array();

    $hash= $row['password'];


        

if (password_verify($oldPass,$hash)){

        if(empty($oldPass)){  
          $passState = "current-password-required";
        }else if(empty($newPass)){
          $passState = "new-pass-required";
        }else if($newPass != $confirmNewPass){
          $passState = "password-dont-match";
        }else {
          // hashing the password
          $oldPass = $oldPass;
          $newPass =$newPass;
          $sql = "SELECT * FROM superadmin WHERE username='$super' ";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
              $hashed_pass = password_hash($newPass, PASSWORD_DEFAULT);

              $query = "UPDATE superadmin SET password='$hashed_pass' WHERE username='$super';";
              mysqli_query($conn, $query);

              session_destroy();
        echo '<script>
            swal({
              title: "Updated Successfully",
              text: "Data has been updated. You need to Login again to apply all updated changes. Thank You :3",
              type: "success"
              }, function () {
                setTimeout(function () {
                  window.location.href="../../index.php";
                  }, 500);
                  });
                  </script>'; 

            }else{
             
                echo '<script>
           swal({
          title: "Update Failed.",
          text: "Unable to update data. Try again.",
          type: "warning"
          }, function () {
            setTimeout(function () {
              window.location.href="../../users/superadmin/user-profiles.php";
              }, 500);
              });
              </script>'; 
              $_conn['error'] = $conn->error;
              echo $conn->error;
            }

        }
      }
    }
    //$query

    }
     
     


   