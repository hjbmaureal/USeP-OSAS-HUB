<?php

  include_once("connect_db.php");

  if(isset($_POST['update-scholar-status'])){
    //STATUS VARIABLE FROM FORM
    $grantee_id = $_POST['grantee_id'];
    $status = $_POST['setStatus'];
    $curr_semester = $_POST['curr_semester'];
    $curr_year = $_POST['curr_year'];
    //FOR EACH FOR MULTIPLE SELECTIONS
    if(isset($_POST['select'])){
      foreach($_POST['select'] as $student_id){
          $result = mysqli_query($conn, "SELECT * FROM scholarship_general_info WHERE student_id = '$student_id'");
          $row = mysqli_fetch_assoc($result);
          
          //GET STUDENT ID AND YEAR LVEL (TEMPORARY ASK DB MANAGER)
          $stud_course = $row['course_id'];
          $studentid = $row['student_id'];
          $scholarship = $row['program_name'];
          $student_year_level = 0;
          if($row['year_level'] == "1st Year"){
            $student_year_level = 1;
          }else if($row['year_level'] == "2nd Year"){
            $student_year_level = 2;
          }else if($row['year_level'] == "3rd Year"){
            $student_year_level = 3;
          }else if($row['year_level'] == "4th Year"){
            $student_year_level = 4;
          }
          
          echo $stud_course .' '. $student_id.' '. $student_year_level.' '. $curr_semester.' '. $curr_year .' '. $status.' '.$grantee_id.' '. $scholarship;
          if($status == 1){
            //PREPARE STATEMENT
            $stmt = $conn->prepare("call ScholarshipInsertEnrollmentList(?,?,?,?,?,?)");
            //BIND THE VARIABLES
            $stmt->bind_param("ssssss", $student_id, $stud_course, $student_year_level, $curr_semester, $curr_year, $status);
            //EXECUTE
            $stmt->execute();
            $string = "Congratulations! You have been validated as $scholarship scholar for $curr_year";
            mysqli_query($conn, "INSERT INTO `notif`(`user_id`, `message_body`, `link`, `message_status`, `office_id`) VALUES ('$student_id','$string','../users/Student/student-scholarship-dashboard.php','Delivered','2') ");

          }else{
            mysqli_query($conn, "UPDATE grantee_history SET student_status = $status WHERE id = $grantee_id");
          }
      }
      die(header("Location: ../users/Scholarship/scholars-validation.php?operation=success"));
    }else{
      die(header("Location: ../users/Scholarship/scholars-validation.php?selection=empty"));
    }
  }