<?php
$databaseHost = 'localhost';
$databaseName = 'backupdb-3'; 
$databaseUsername = 'root'; 
$databasePassword = ''; 
$conn= mysqli_connect ($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

  if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
  }
?>