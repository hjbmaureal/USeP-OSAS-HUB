<?php
include("conn.php"); 
session_start();
$user_id = $_SESSION['id'];


if(isset($_POST['submit'])) {
$id = $_POST['id'];

$query = mysqli_query($conn, "UPDATE clinic_certificate_requests SET status='completed' WHERE request_id=$id");
header('Location: Admin-Request.php');




	}


	?>