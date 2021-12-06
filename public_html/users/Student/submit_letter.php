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
    if($ext != "pdf" && $ext != "PDF"){
        echo '<script>alert("PDF Only")</script>';
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
    header('location:RequestMedRecsCert.php');



}

?>