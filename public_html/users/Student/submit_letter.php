<!DOCTYPE html>
<html>
<head>

      <!-- Page specific javascripts-->
      <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
      <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/upstyle.css">

      <!-- Font-icon css-->

          <title></title>
</head>
<body>

<?php
include("config.php"); 
session_start();
$id = $_SESSION['id'];


if(isset($_POST['submit'])) {  
$request_id = $_POST['request_id'];
$message = 'Submitted a letter of request';
    $sql = mysqli_query($mysqli, "SELECT patient_id, CONCAT(first_name,' ',middle_name,' ',last_name) as fullname , type from patient_list where patient_id = '$id'");
    while($res = mysqli_fetch_array($sql)) { 
    $name = $res['fullname'];
    $patient_id = $res['patient_id'];
    }

    $sql2 = mysqli_query($mysqli, "SELECT * from staff where type = 'Staff' AND position='Nurse' AND account_status='Active'");
    while($res = mysqli_fetch_array($sql2)) { 
    $staff_id = $res['staff_id'];
    }

$fileinfo=PATHINFO($_FILES["file"]["name"]);
    $ext = $fileinfo['extension'];


    if(empty($fileinfo['filename'])){
        $location="";
    }
    if($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif" && $ext != "pdf" && $ext != "PDF" && $ext != "doc" && $ext != "docx" && $ext != "zip" && $ext != "rar"){
        echo '<script>alert("File Extension not allowed!")</script>';
        header("Location:RequestMedRecsCert.php");
        exit();
    }

    else{
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    move_uploaded_file($_FILES["file"]["tmp_name"],"../C-Admin/Letter of Request/" . $newFilename);
    $location="Letter of Request/" . $newFilename;
    }   



$query = mysqli_query($mysqli, "UPDATE clinic_certificate_requests SET document_passed='$location' WHERE request_id=$request_id");
$result=mysqli_query($mysqli,"insert into notif (user_id, message_body, time, link, message_status,office_id) values ('$staff_id', '$name" .' '. "".$message."',now(),'Admin-MedicalRecordCert.php', 'Delivered','3')");

if($query === TRUE){  
 echo '<script>
          swal({
          title: "Request Letter uploaded successfully!",
          text: "Server Request Successful!",
          type:"success",
          icon: "success",
          button: false,
          closeOnClickOutside: false,
          closeOnEsc: false,                                                                                             
          },function() {
          window.location = "RequestMedRecsCert.php";
            })
   </script>';

    }else{
    echo '<script>
          swal({
          title: "File Extension not allowed!",
          text: "Server Request Failed!",
          type:"error",
          icon: "error",
          button: false,
          timer:2000,
          closeOnClickOutside: false,
          },function() {
          window.location.href = "RequestMedRecsCert.php";
        })
         </script>';
         }


}

?>

</body>
</html>