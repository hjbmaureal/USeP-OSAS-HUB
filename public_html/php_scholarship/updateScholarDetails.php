<?php
  include_once ("connect_db.php");
  if(isset($_POST['submit-update'])){
    $student_id = $_POST['sdfIDNumberUpdate'];
    $program_id = $_POST['sdfScholarshipNameUpdate'];
    // $study_type = $_POST['typeOfStudyUpdate'];
    // $last_name = $_POST['sdfLastNameUpdate'];
    // $first_name = $_POST['sdfFirstNameUpdate'];
    // $middle_name = $_POST['sdfMiddleNameUpdate'];
    // $sex = $_POST['sdfSexUpdate'];
    // $dob = $_POST['sdfDateOfBirthUpdate'];
    // $year_level = $_POST['sdfYearUpdate'];
    // $phone_number = $_POST['sdfActiveMobileNumberUpdate'];
    // $college = $_POST['sdfCollegeUpdate'];
    // $living_with = $_POST['sdfLivingWithUpdate'];
    // $specify = $_POST['sdfLivingWithSpecifyUpdate'];
    // $guardian_name = $_POST['sdfContactNumberUpdate'];
    // $guardian_contact = $_POST['sdfContactNumberUpdate'];
    // $course = $_POST['sdfYearCourseUpdate'];
    // $city_address = $_POST['sdfCityAddressUpdate'];
    // $parent_name = $_POST['sdfParentNameUpdate'];
    // $parent_occupation = $_POST['sdfParentOccupationUpdate'];
    // $parent_address = $_POST['sdfParentAddressUpdate'];
    // $parent_contact = $_POST['sdfParentContactNumberUpdate'];
    // $spouse_name = $_POST['sdfSpouseUpdate'];
    // $spouse_occupation = $_POST['sdfSpouseOccupationUpdate'];
    // echo $student_id . $program_id . $sex . $study_type . $year_level . $phone_number . $college . $living_with . $guardian_contact . $course . $city_address . $parent_name . $parent_occupation . $parent_address . $parent_contact . $spouse_name . $spouse_occupation;

    $stmt = $conn->prepare("UPDATE grantee_history set program_id  = ? WHERE Student_id = ?");
    if(false === $stmt){
      die('prepare() failed: '.htmlspecialchars($conn->error));
    }
    $check = $stmt->bind_param("ss", $program_id, $student_id);
    if(false === $check){
      die('bind_param() failed: '.htmlspecialchars($conn->error));

    }
    if($stmt->execute()){
      header("Location: ../users/Scholarship/scholars-grantee-records.php?operation=success");
    }else{
      die('execute() failed: '.htmlspecialchars($stmt->error));
      header("Location: ../users/Scholarship/scholars-grantee-records.php?operation=failed");
    }
  }