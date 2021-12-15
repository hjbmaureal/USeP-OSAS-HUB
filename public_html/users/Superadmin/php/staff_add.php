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
    <title>Super Admin | USeP Virtual Hub</title>
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
include("conn.php");
if(isset($_POST['submit'])) { 
  $lname= $_POST['lname'];
  $fname= $_POST['fname'];
  $mname= $_POST['mname'];
  $suffix= $_POST['suffix'];
  $exten= $_POST['exten'];
  //$pic= $_POST['pic'];
  $sex= $_POST['sex'];
  $nationality= $_POST['nationality'];
  $civil= $_POST['civil'];
  $birthdate= $_POST['birthdate'];
  $email= $_POST['email'];
  $contact= $_POST['contact'];


  $type= $_POST['type'];
 
  $employment= $_POST['employment'];

  $level = $_POST['level'];
  $honorofic = $_POST['honorofic'];
  $specialty = $_POST['specialty'];
  $license = $_POST['license'];
  $ptr = $_POST['ptr'];
  $s2 = $_POST['s2'];
  $address = $_POST['address'];
  $address = $_POST['address'];
  $religion = $_POST['religion'];
  $title = $_POST['title'];

  $department = "";
  $office = "";
  if ($type == "Medical Personnel" || $type == "Staff" || $type == "Coordinator") {
   $office= $_POST['office'];
  }else{
   $department = $_POST['department'];
  }

  if ($type == "Medical Personnel") {
        $position2= $_POST['position2'];
  }else{
        $position= $_POST['position'];
  }


  
  
    // $password = $_POST['password'];

  $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

 




    $fileinfo=PATHINFO($_FILES["id_pic"]["name"]);
    $ext = $fileinfo['extension'];


    if(empty($fileinfo['filename'])){
        $location="";
    }
    if($ext != "png" && $ext != "jpeg" && $ext != "jpg" && $ext != "PNG" && $ext != "JPEG" && $ext != "JPG"){
        $msg = "?status=err";
        header("Location: Faculty_Staff_Accounts.php".$msg);
        exit();
}
    else{
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    move_uploaded_file($_FILES["id_pic"]["tmp_name"],"../idpic/" . $newFilename);
    $location="../idpic/" . $newFilename;
    }


    if ($type == "Faculty" || $type == "Faculty Head") {
    $query = mysqli_query($conn, "INSERT INTO staff (office_id, dept_id, title, last_name, first_name, middle_name, suffix, extension, sex, civil_status, birthdate, email_add, phone_num, religion, nationality, address, type, position, access_level, employment_status, account_status, e_signature, pic, date_submitted, date_verified, password, patinfo_status, proffesional_honorific, medical_specialty, license_number, ptr_no, s2) VALUES (NULL, '$department', '$title', '$lname', '$fname', '$mname', '$suffix', '$exten', '$sex', '$civil', '$birthdate', '$email', '$contact', 'religion','$nationality', '$address', '$type', '$position', '$level', '$employment', 'Active', NULL, '$location', now(), NULL, '$hashed_pass', 0, '$honorofic', '$specialty', '$license', '$ptr', '$s2') ");
  }else if($type == "Staff" || $type == "Coordinator"){
        $query = mysqli_query($conn, "INSERT INTO staff (office_id, dept_id, title, last_name, first_name, middle_name, suffix, extension, sex, civil_status, birthdate, email_add, phone_num, religion, nationality, address, type, position, access_level, employment_status, account_status, e_signature, pic, date_submitted, date_verified, password, patinfo_status, proffesional_honorific, medical_specialty, license_number, ptr_no, s2) VALUES ($office, NULL, '$title', '$lname', '$fname', '$mname', '$suffix', '$exten', '$sex', '$civil', '$birthdate', '$email', '$contact', 'religion','$nationality', '$address', '$type', '$position', '$level', '$employment', 'Active', NULL, '$location', now(), NULL, '$hashed_pass', 0, '$honorofic', '$specialty', '$license', '$ptr', '$s2') ");
  }else{
        $query = mysqli_query($conn, "INSERT INTO staff (office_id, dept_id, title, last_name, first_name, middle_name, suffix, extension, sex, civil_status, birthdate, email_add, phone_num, religion, nationality, address, type, position, access_level, employment_status, account_status, e_signature, pic, date_submitted, date_verified, password, patinfo_status, proffesional_honorific, medical_specialty, license_number, ptr_no, s2) VALUES ('$office', NULL, '$title', '$lname', '$fname', '$mname', '$suffix', '$exten', '$sex', '$civil', '$birthdate', '$email', '$contact', 'religion','$nationality', '$address', '$type', '$position2', '$level', '$employment', 'Active', NULL, '$location', now(), NULL, '$hashed_pass', 0, '$honorofic', '$specialty', '$license', '$ptr', '$s2') ");
  }
          if (!$query) {
                 echo '<script>
                swal({
                  title: "Failed.",
                  text: "Unable to add data. Try again.",
                  type: "warning"
                  }, function () {
                    setTimeout(function () {
                      window.location.href="../Staff.php";
                      }, 500);
                      });
                      </script>'; 
                      echo $department;   
                    $_conn['error'] = $conn->error;
                    echo $conn->error;
                    
                }else{
                    echo '<script>
                swal({
                  title: "Added Successfully",
                  type: "success"
                  }, function () {
                    setTimeout(function () {
                      window.location.href="../Staff.php";
                      }, 500);
                      });
                      </script>'; 
        }}

 ?>