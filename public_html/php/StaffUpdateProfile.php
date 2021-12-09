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
    <title>Usep Osas Hub</title>
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
  include("../conn.php"); 
  $staff_id = $_POST['id'];
  $changePass;
  $passState;
  $photo = '';
  $email = $_POST['newEmail'];
  $contact = $_POST['newNum'];

  if(isset($_POST['submit-user-profile'])){
    $file = "";
    $file1 = "";
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
          $sql = "SELECT * FROM staff WHERE Staff_id='$staff_id' AND password='$oldPass'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
              $query = "UPDATE staff SET password='$newPass' WHERE Staff_id='$staff_id';";
              mysqli_query($conn, $query);
            }else{
              $passState = "incorrect-password";
            }
        }
      }
    //$query

      if(!file_exists($_FILES['image1']['tmp_name']) && !file_exists($_FILES['image']['tmp_name'])){
        $file = "";
        $file1= "";
        $query = "UPDATE staff SET phone_num='$contact', email_add = '$email'  WHERE Staff_id='$staff_id';";
      } elseif (!file_exists($_FILES['image1']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) {
          $file1="";
          $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
          $query = "UPDATE staff SET pic='$file',phone_num='$contact', email_add = '$email'  WHERE Staff_id='$staff_id';";
      } elseif (!file_exists($_FILES['image']['tmp_name']) && file_exists($_FILES['image1']['tmp_name'])) {
          $file = "";
          $file1  = addslashes(file_get_contents($_FILES["image1"]["tmp_name"]));
          $query = "UPDATE staff SET e_signature='$file1',phone_num='$contact', email_add = '$email'  WHERE Staff_id='$staff_id';";
      }  else {
          $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
          $file1 = addslashes(file_get_contents($_FILES["image1"]["tmp_name"]));
          $query = "UPDATE staff SET pic = '$file', e_signature = '$file1',phone_num='$contact', email_add = '$email' WHERE Staff_id='$staff_id';";
      }

 }

      if(mysqli_query($conn, $query))
     {
       
        session_destroy();
        echo '<script>
            swal({
              title: "Updated Successfully",
              text: "Data has been updated. You need to Login again to apply all updated changes. Thank You :3",
              type: "success"
              }, function () {
                setTimeout(function () {
                  window.location.href="../index.php";
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
              window.location.href="../users/Osas/user-profiles.php";
              }, 500);
              });
              </script>'; 
              $_conn['error'] = $conn->error;
              echo $conn->error;
     }


   