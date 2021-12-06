<?php
  include_once("connect_db.php");
  $id = $_POST['subject_id'];
  $results = array();
  if($result = mysqli_query($conn, "SELECT * FROM list_of_subjects WHERE subject_id ='$id' ")){
    while($row = mysqli_fetch_assoc($result)){
      $results[0] = $row['subject_id'];
      $results[1] = $row['subject_code'];
      $results[2] = $row['subject_description'];
      $results[3] = $row['subject_unit'];
      $results[4] = $row['course'];
      $results[5] = $row['semester'];
      $results[6] = $row['year'];
    }
  }
  echo json_encode($results);