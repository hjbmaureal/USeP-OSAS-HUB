
<?php
session_start();
include("conn.php"); 

 
if(isset($_POST['submit'])) {  
$date = $_POST['date'];
$purpose = $_POST['purpose']; 
$id=$_SESSION['patient_id'];
$type="Medical Records Certification";


$fileinfo=PATHINFO($_FILES["file"]["name"]);
    $ext = $fileinfo['extension'];


    if(empty($fileinfo['filename'])){
        $location="";
    }
    if($ext != "pdf" && $ext != "PDF"){
        echo '<script>alert("PDF Only")</script>';
        header("Location:facultyRequestMedRecsCert.php");
        exit();
    }

    else{
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    move_uploaded_file($_FILES["file"]["tmp_name"],"requestletter/" . $newFilename);
    $location="requestletter/" . $newFilename;
    } 

$query = mysqli_query($conn, "INSERT INTO clinic_certificate_requests(user_id, date_requested, purpose,request_type, document_passed,status) VALUES('$id','$date','$purpose','$type','$location','pending')");

header("Location: facultyRequestMedRecsCert.php");

}

?>