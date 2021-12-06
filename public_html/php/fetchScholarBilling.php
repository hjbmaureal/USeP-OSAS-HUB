<?php
  include_once('connect_db.php');

  $result = mysqli_query($conn, "SELECT gh.semester_year, sf_get_scholarship_name(gh.program_id) AS program_name, sgi.coursename AS course, gh.status_billing as billing_status FROM grantee_history AS gh JOIN scholarship_general_info as sgi ON gh.id = sgi.grantee_id WHERE gh.student_status = 1 AND gh.record_status = 0");

  $results = array();

  while($row = mysqli_fetch_assoc($result)){
    $results[] = $row;
  }

  $result->close();

  $conn->close();

  echo json_encode($results);