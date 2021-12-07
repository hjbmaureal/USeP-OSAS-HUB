<?php

header('Content-Type: application/json');

$databaseHost = 'localhost';
$databaseName = 'guidance_db'; 
$databaseUsername = 'root'; 
$databasePassword = ''; 
$conn= mysqli_connect ($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

  if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
  }

$query = "SELECT radio_q2,count(radio_q2) AS count2 from counselling_evaluation where radio_q1 IN ('Excellent','Very Satisfactory', 'Satisfactory', 'Fair','Poor') GROUP BY radio_q2";

$result = mysqli_query($conn,$query);

$data = array();

foreach ($result as $row) {
  $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>