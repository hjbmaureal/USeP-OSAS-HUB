<?php
session_start();
include("conn.php"); 

if(isset($_POST['submit'])) {  
$id=$_SESSION['id'];
$date = $_POST['date'];
$purpose = $_POST['purpose']; 
$type="Medical Certificate";
$other_text = $_POST['other_text']?? null;
$message = 'Request for a Medical Certificate';

foreach ($purpose as $purpose2){ 
    if ($purpose2 == "others") {
        $new_purpose = $other_text;
        
    }
    else{
        $new_purpose = $purpose2;

    }
}

    $sql2 = mysqli_query($conn, "SELECT * from staff where type = 'Staff' AND position='Nurse' AND account_status='Active'");
    while($res = mysqli_fetch_array($sql2)) { 
    $staff_id = $res['staff_id'];
    }

	$sql = mysqli_query($conn, "SELECT patient_id, CONCAT(first_name,'  ',last_name) as fullname , type from patient_list where patient_id = '$id'");
    while($res = mysqli_fetch_array($sql)) { 
    $name = $res['fullname'];
    $patient_id = $res['patient_id'];
    }
	if (empty($patient_id)) {
		echo '<script> alert("No records")
    	window.location.href="facultyConsultation.php";
    	 </script>
    	';
	}else{
$query = mysqli_query($conn, "INSERT INTO clinic_certificate_requests(user_id, date_requested, purpose, request_type,status	) VALUES('$id','$date','$new_purpose','$type','pending')");

$result=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$staff_id', '$name" .' '. "".$message."',now(),'admin-request.php', 'Delivered','3')");
header("Location: facultyrequestmedcert.php");
	}










    





}

?>