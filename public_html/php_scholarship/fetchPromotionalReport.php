<?php
  include_once("connect_db.php");
  $id = $_POST['student_id'];
  $results = array();
  if($result = mysqli_query($conn, "SELECT * FROM promotional_report WHERE id = $id")){
    while($row = mysqli_fetch_assoc($result)){
      $results[0] = $row['subject_code1'];
      $results[1] = $row['units1'];
      $results[2] = $row['subject_code2'];
      $results[3] = $row['units2'];
      $results[4] = $row['subject_code3'];
      $results[5] = $row['units3'];
      $results[6] = $row['subject_code4'];
      $results[7] = $row['units4'];
      $results[8] = $row['subject_code5'];
      $results[9] = $row['units5'];
      $results[10] = $row['subject_code6'];
      $results[11] = $row['units6'];
      $results[12] = $row['subject_code7'];
      $results[13] = $row['units7'];
      $results[14] = $row['subject_code8'];
      $results[15] = $row['units8'];
      $results[16] = $row['subject_code9'];
      $results[17] = $row['units9'];
      $results[18] =  $row['student_id'];
      $results[19] = $row['first_name'] . ' '.$row['middle_name']. ' '.$row['last_name'];
      $results[20] = $row['totalunits'];
      $results[21] = $row['grade1'];
      $results[22] = $row['grade2'];
      $results[23] = $row['grade3'];
      $results[24] = $row['grade4'];
      $results[25] = $row['grade5'];
      $results[26] = $row['grade6'];
      $results[27] = $row['grade7'];
      $results[28] = $row['grade8'];
      $results[29] = $row['grade9'];
      $results[30] = $row['id'];
    }
  }
  echo json_encode($results);