<?php 
  include_once "connect_db.php";
  $currSem = "";
  $currYear = "";
  $result = mysqli_query($conn, "SELECT * FROM list_of_semester WHERE status = 'Active' ");
  while($row = mysqli_fetch_array($result)){
    $currSem = $row['semester'];
    $currYear = $row['year'];
  }
  mysqli_query($conn, "UPDATE grantee_history set record_status = 1 WHERE semester != '$currSem' AND year != '$currYear'  ");