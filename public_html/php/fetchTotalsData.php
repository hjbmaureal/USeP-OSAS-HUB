<?php

  include_once('connect_db.php');


  $result = mysqli_query($conn, "SELECT gh.semester_year, sf_get_scholarship_name(gh.program_id) AS program_name, count(gh.Student_id) AS scholar_count , count(gh.program_id)*amount AS totals FROM grantee_history AS gh JOIN scholarship_program AS sp ON gh.program_id=sp.program_id WHERE gh.student_status = 1 GROUP BY gh.program_id, gh.semester_year");

  $results = array();

  while($row = mysqli_fetch_assoc($result)){
    $results[] = $row;
  }
  //free memory associated with result
  $result->close();
  
  //close connection
  $conn->close();

  echo json_encode($results);
