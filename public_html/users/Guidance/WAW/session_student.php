<?php
	if(!isset($_SESSION)){
    session_start();
}
	include 'conn.php';

	if(!isset($_SESSION['id']) || trim($_SESSION['id']) == ''){
		header('location: logout.php');
	}

	$sql = "SELECT * FROM `student` WHERE Student_id='".$_SESSION['id']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>



