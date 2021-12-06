<?php
  include_once("connect_db.php");
  $program_id = $_POST['program_id'];
  $results = array();

  if($result = mysqli_query($conn, "SELECT * , sf_get_type_of_scholarship(type) as scholarship_type, sf_get_scholarship_status(program_status) as scholarship_status FROM scholarship_program WHERE program_id = $program_id")){
    while($row = mysqli_fetch_assoc($result)){
      $results[0] = $row['program_id'];
      $results[1] = $row['program_provider'];
      $results[2] = $row['program_name'];
      $results[3] = $row['type'];
      $results[4] = $row['program_status'];
      $results[5] = $row['amount'];
    }
  }
  echo json_encode($results);