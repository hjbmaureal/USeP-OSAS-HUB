<?php

include_once('connect_db.php');

$currSemesterYear = "";

$result = mysqli_query($conn, "SELECT * FROM list_of_semester WHERE status = 'Active'");

while($row = mysqli_fetch_array($result)){
  $currSemesterYear = $row['semester'] .' '. $row['year'];
}

$result->close();

$conn->close();

echo json_encode($currSemesterYear);