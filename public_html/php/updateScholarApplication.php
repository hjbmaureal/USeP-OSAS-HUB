<?php

  include_once("connect_db.php");

  if(isset($_POST['update-scholar-application'])){
    //STATUS VARIABLE FROM FORM
    $application_id = $_POST['application_id'];
    $status = $_POST['setAction'];
    //FOR EACH FOR MULTIPLE SELECTIONS
    if(isset($_POST['select'])){
      foreach($_POST['select'] as $application_id){
          $result = mysqli_query($conn, "SELECT *, sf_get_scholarship_name(program_id) as program FROM scholarship_application WHERE application_id = '$application_id'");
          $row = mysqli_fetch_assoc($result);
          $program = $row['program'];
          $student_id = $row['student_id'];
          $program_id = $row['program_id'];
          $semester_year = $row['semester'] .' '.$row['year'];
          if($status == 1){
            $stmt = $conn->prepare("call ScholarshipAddScholarThruDataForm(?,?,?)");
            $stmt->bind_param("sss", $student_id, $program_id, $semester_year);
            $stmt->execute();
            $string = "Congratulations! Your application for $program has been accepted.";
            mysqli_query($conn, "INSERT INTO `notif`(`user_id`, `message_body`, `link`, `message_status`, `office_id`) VALUES ('$student_id','$string','../users/Student/student-scholarship-data-form.php','Delivered','2') ");
            mysqli_query($conn, "DELETE FROM `scholarship_application` WHERE application_id = $application_id");
          }else if($status == 2){
            $string = "Sorry! Your scholarship application for $program has been rejected. ";
            mysqli_query($conn, "INSERT INTO `notif`(`user_id`, `message_body`, `link`, `message_status`, `office_id`) VALUES ('$student_id','$string','../users/Student/student-scholarship-scholarship-data-form.php','Delivered','2') ");
            mysqli_query($conn, "DELETE FROM `scholarship_application` WHERE application_id = $application_id");
          }else{
            die(header("Location: ../users/Scholarship/scholars-validation.php?action=invalid"));
          }
      }
      die(header("Location: ../users/Scholarship/scholars-validation.php?operation=success"));
    }else{
      die(header("Location: ../users/Scholarship/scholars-validation.php?selection=empty"));
    }
  }