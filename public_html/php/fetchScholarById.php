<?php
  include_once("connect_db.php");
  $student_id = "";
  $student_id = $_POST['search_id'];
  $results = array();
  $query = "SELECT 
  s.type AS study_type,
  s.last_name AS last_name,
  s.first_name AS first_name,
  s.middle_name AS middle_name,
  s.sex AS sex,
  s.birth_date AS dob,
  s.year_level AS year_level,
  s.course_id AS course,
  sf_get_data_from_course_by_id('college_id', s.course_id) AS college,
  s.phone_number AS phone_number,
  s.email_add AS email,
  ec.living_with AS living_with,
  ec.others_specify AS others_specify,
  ec.guardian_contact AS guardian_contact,
  ec.city_address AS city_address,
  ec.parent_name AS parent_name,
  ec.parent_occupation AS parent_occupation,
  ec.parents_address AS parent_address,
  ec.parents_contact AS parent_contact,
  ec.spouse_name AS spouse_name,
  ec.spouse_occupation AS spouse_occupation,
  g.program_id as program_id,
  g.student_status as student_status
  FROM student AS s
  JOIN emergency_contact AS ec ON ec.Student_id = s.Student_id 
  LEFT JOIN grantee_history AS g ON s.Student_id = g.Student_id
  WHERE s.Student_id = '$student_id'";
  if($result = mysqli_query($conn,$query)){
    while($row = mysqli_fetch_array($result)){
      $results[0] = $row['study_type'];
      $results[1] = $row['last_name'];
      $results[2] = $row['first_name'];
      $results[3] = $row['middle_name'];
      $results[4] = $row['sex'];
      $results[5] = $row['dob'];
      $results[6] = $row['year_level'];
      $results[7] = $row['course'];
      $results[8] = $row['college'];
      $results[9] = $row['phone_number'];
      $results[10] = $row['email'];
      $results[11] = $row['living_with'];
      $results[12] = $row['others_specify'];
      $results[13] = $row['guardian_contact'];
      $results[14] = $row['city_address'];
      $results[15] = $row['parent_name'];
      $results[16] = $row['parent_occupation'];
      $results[17] = $row['parent_address'];
      $results[18] = $row['parent_contact'];
      $results[19] = $row['spouse_name'];
      $results[20] = $row['spouse_occupation'];
      $results[21] = $row['program_id'];
    }
  }
  $query = "SELECT * FROM scholarship_application WHERE student_id";
  if($result = mysqli_query($conn,$query)){
    while($row = mysqli_fetch_array($result)){
      $results[22] = true;
    }
  }else{
    $results[22] = false;
  }
  echo json_encode($results);