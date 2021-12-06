<?php
  include_once("connect_db.php");
  //create
  if(isset($_POST['addSubjectCode'])){
    $course = $_POST['courseID'];
    $semyear = $_POST['semyear'];
    $subjectCode = $_POST['addSubjectCode'];
    $subjectDesc = $_POST['addSubjectDesc'];
    $subjectUnit = $_POST['units'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];
    $results = array();
     if(mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('$subjectCode','$subjectDesc','$subjectUnit','$course',$semester,$year)")){
      die(json_encode(array("statusCode"=>"success")));
     }else{
      die(json_encode(array("statusCode"=>"error")));
     }
  }

  //read or fetch data
  if(isset($_POST['subject_id']) && !isset($_POST['oldcode'])){
    $id = $_POST['subject_id'];
    $results = array();
    if($result = mysqli_query($conn, "SELECT * FROM list_of_subjects WHERE subject_id ='$id'")){
      while($row = mysqli_fetch_assoc($result)){
        $results[0] = $row['subject_id'];
        $results[1] = $row['subject_code'];
        $results[2] = $row['subject_description'];
        $results[3] = $row['subject_unit'];
        $results[4] = $row['course'];
        $results[5] = $row['semester'];
        $results[6] = $row['year'];
      }
    }
    die(json_encode($results));
  }

  //update
  if(isset($_POST['oldcode'])){
    // die(json_encode(array("statusCode"=>"success")));
    $oldcode = $_POST['oldcode'];
    $subject_id = $_POST['subject_id'];
    $courseID = $_POST['editcourseID'];
    $subjectCode = $_POST['editSubjectCode'];
    $subjectUnit = $_POST['editSubjectUnit'];
    $subjectDesc = $_POST['editSubjectDesc'];

    function updateSubject($conn, $subjectCode, $subjectDesc ,$subjectUnit ,$subject_id){
      mysqli_query($conn, "UPDATE `list_of_subjects` SET `subject_code`='$subjectCode',`subject_description`='$subjectDesc',`subject_unit`='$subjectUnit' WHERE subject_id = '$subject_id'");
      die(json_encode(array("statusCode"=>"success")));
    }
    if($oldcode != $subjectCode){
      $result = mysqli_query($conn, "SELECT * FROM list_of_subjects WHERE subject_code = '$subjectCode' AND course = $courseID");
      if(mysqli_num_rows($result)){
        die(json_encode(array("statusCode"=>"duplicate")));
      }else{
        updateSubject($conn, $subjectCode, $subjectDesc ,$subjectUnit ,$subject_id);
      }
    }else{
      updateSubject($conn, $subjectCode, $subjectDesc ,$subjectUnit ,$subject_id);
    }
  }

  //delete
  if(isset($_POST['deleteSubjectID'])){
    $deletedID = $_POST['deleteSubjectID'];
    if($result = mysqli_query($conn, "DELETE FROM `list_of_subjects` WHERE subject_id = '$deletedID'")){
      die(json_encode(array("statusCode"=>"success")));
    }
  }