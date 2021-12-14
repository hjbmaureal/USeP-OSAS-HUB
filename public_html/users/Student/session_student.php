<?php
	if(!isset($_SESSION)){
    session_start();
}
	include 'conn.php';
	echo $_SESSION['username'];

	if(!isset($_SESSION['username']) || trim($_SESSION['username']) == ''){
		header('location: logout.php');
	}

	$sql = "SELECT * FROM `student` WHERE Student_id='".$_SESSION['username']."'";
	if($result1 = mysqli_query($conn, $sql)){
	$app_row = mysqli_fetch_assoc($result1);
	$count=mysqli_num_rows($result1);
		
		if (!$count) {
			header('location: ../index.php');
		}}else{
			header('location: ../index.php');
		}
		
	
?>



