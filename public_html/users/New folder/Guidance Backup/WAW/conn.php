<?php
$databaseHost = 'localhost';
$databaseName = 'guidance_db'; 
$databaseUsername = 'root'; 
$databasePassword = ''; 
$conn= mysqli_connect ($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

  if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
  }
?>