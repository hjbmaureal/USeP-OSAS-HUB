<?php
	if(!isset($_SESSION)){
    session_start();
}
	include 'conn.php';

	if(!isset($_SESSION['id']) || trim($_SESSION['id']) == ''){
		header('location: logout.php');
	}

	$sql = "SELECT * FROM `staff` WHERE staff_id='".$_SESSION['id']."'";
	if($result1 = mysqli_query($conn, $sql)){
	$app_row = mysqli_fetch_assoc($result1);
		
	
	$count=mysqli_num_rows($result1);
		
		if (!$count) {
			header('location: ../index.php');
		}}else{
			header('location: ../index.php');
		}
	
?>



 