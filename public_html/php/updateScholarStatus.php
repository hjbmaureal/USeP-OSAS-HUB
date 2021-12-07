<?php

  include_once("connect_db.php");

  if(isset($_POST['update-scholar-status'])){
    //STATUS VARIABLE FROM FORM
    $student_id = $_POST['student_id'];
    $status = $_POST['setStatus'];
    //FOR EACH FOR MULTIPLE SELECTIONS
    if(isset($_POST['select'])){
      foreach($_POST['select'] as $grantee_id){
          $result = mysqli_query($conn, "SELECT * FROM scholarship_general_info WHERE grantee_id = '$grantee_id'");
          $row = mysqli_fetch_assoc($result);
          
          // echo $status;
          if($status == 1){
            echo "enrolled";
            //PREPARE STATEMENT
            $stmt = $conn->prepare("call ScholarshipInsertEnrollmentList(?,?)");
            //BIND THE VARIABLES
            $stmt->bind_param("ss", $grantee_id, $status);
            //EXECUTE
            $test = $stmt->execute();
            if(false === $test){
              die("die ".htmlspecialchars($stmt->error));
            }
            $string = "Congratulations! You have been validated as $scholarship scholar for $curr_year";
            mysqli_query($conn, "INSERT INTO `notif`(`user_id`, `message_body`, `link`, `message_status`, `office_id`) VALUES ('$student_id','$string','../users/Student/student-scholarship-dashboard.php','Delivered','2') ");

          }else{
            echo "else";
            mysqli_query($conn, "UPDATE grantee_history SET student_status = $status WHERE id = $grantee_id");
          }
      }
      die(header("Location: ../users/Scholarship/scholars-validation.php?operation=success"));
    }else{
      die(header("Location: ../users/Scholarship/scholars-validation.php?selection=empty"));
    }
  }