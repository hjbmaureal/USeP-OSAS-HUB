<?php
include("conn.php"); 
$id = $_POST['id'];

if(isset($_POST['submit'])) {  


$fileinfo=PATHINFO($_FILES["file"]["name"]);
    $ext = $fileinfo['extension'];


    if(empty($fileinfo['filename'])){
        $location="";
    }
    if($ext != "pdf" && $ext != "PDF"){
        echo '<script>alert("PDF Only")</script>';
        header("Location: RequestMedCert.php");
        exit();
    }

    else{
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    move_uploaded_file($_FILES["file"]["tmp_name"],"letterofrequest/" . $newFilename);
    $location="letterofrequest/" . $newFilename;
    }	


$query = mysqli_query($conn, "UPDATE clinic_certificate_requests SET document_passed='$location' WHERE request_id=$id");




}

?>