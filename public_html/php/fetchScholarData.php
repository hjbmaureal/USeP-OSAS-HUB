<?php
  include_once("connect_db.php");
  $student_id = "";
  $student_id = $_POST['student_id'];
  // $semester_year = $_POST['semester_year'];
  $results = array();
  $query = "SELECT 
  sp.program_id AS program_name,
  g.Student_id AS student_id, 
  g.semester_year AS semester_year,
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
  ec.parents_address AS parents_address,
  ec.parents_contact AS parents_contact,
  ec.spouse_name AS spouse_name,
  ec.spouse_occupation AS spouse_occupation
  FROM grantee_history AS g 
  JOIN scholarship_program AS sp ON sp.program_id = g.program_id
  JOIN student AS s ON s.Student_id = g.Student_id
  JOIN emergency_contact AS ec ON ec.student_id = g.Student_id
  WHERE g.Student_id = '$student_id'";
  if($result = mysqli_query($conn,$query)){
    while($row = mysqli_fetch_array($result)){
      $results[0] = $row['program_name'];
      $results[1] = $row['student_id'];
      $results[2] = $row['semester_year'];
      $results[3] = $row['study_type'];
      $results[4] = $row['last_name'];
      $results[5] = $row['first_name'];
      $results[6] = $row['middle_name'];
      $results[7] = $row['sex'];
      $results[8] = $row['dob'];
      $results[9] = $row['year_level'];
      $results[10] = $row['course'];
      $results[11] = $row['college'];
      $results[12] = $row['phone_number'];
      $results[13] = $row['email'];
      $results[14] = $row['living_with'];
      $results[15] = $row['others_specify'];
      $results[16] = $row['guardian_contact'];
      $results[17] = $row['city_address'];
      $results[18] = $row['parent_name'];
      $results[19] = $row['parent_occupation'];
      $results[20] = $row['parents_address'];
      $results[21] = $row['parents_contact'];
      $results[22] = $row['spouse_name'];
      $results[23] = $row['spouse_occupation'];
    }
  }
  echo json_encode($results);