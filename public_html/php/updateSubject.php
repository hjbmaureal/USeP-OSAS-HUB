<?php
  include_once("connect_db.php");
  if(isset($_POST['editSubject'])){
    $subjectCode = $_POST['editSubjectCode'];
    $subjectDesc = $_POST['editSubjectDesc'];
    $subjectUnit = $_POST['editSubjectUnit'];
    $courseID = $_POST['editcourseID'];
    $subject_id = $_POST['subject_id'];
    $oldcode = $_POST['oldcode'];
    function updateSubject($conn, $subjectCode, $subjectDesc ,$subjectUnit ,$subject_id){
      mysqli_query($conn, "UPDATE `list_of_subjects` SET `subject_code`='$subjectCode',`subject_description`='$subjectDesc',`subject_unit`='$subjectUnit' WHERE subject_id = '$subject_id'");
      header("Location: ../users/Scholarship/curriculum.php?subject-edited");
    }
    if($oldcode != $subjectCode){
      $result = mysqli_query($conn, "SELECT * FROM list_of_subjects WHERE subject_code = '$subjectCode' AND course = $courseID");
      if(mysqli_num_rows($result)){
        header("Location: ../users/Scholarship/curriculum.php?subject-duplicate");
        die();
      }else{
        updateSubject($conn, $subjectCode, $subjectDesc ,$subjectUnit ,$subject_id);
      }
    }else{
      updateSubject($conn, $subjectCode, $subjectDesc ,$subjectUnit ,$subject_id);
      // mysqli_query($conn, "UPDATE `list_of_subjects` SET `subject_code`='$subjectCode',`subject_description`='$subjectDesc',`subject_unit`='$subjectUnit' WHERE subject_id = '$subject_id'");
    }
  }