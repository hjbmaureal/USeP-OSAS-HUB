<?php
	if(!isset($_SESSION)){
    session_start();
}
	include 'conn.php';

	if(!isset($_SESSION['id']) || trim($_SESSION['id']) == ''){
		header('location: logout.php');
	}

	$sql = "SELECT * FROM staff WHERE office_id='4' and LOWER(position) LIKE LOWER('%head%') and LOWER(account_status) LIKE LOWER('%active%') AND staff_id='".$_SESSION['id']."'";
	if($result1 = mysqli_query($conn, $sql)){
	while ($app_row = mysqli_fetch_assoc($result1)) {

	}}else{
		header('location: ../index.php');
	}
	
?>



