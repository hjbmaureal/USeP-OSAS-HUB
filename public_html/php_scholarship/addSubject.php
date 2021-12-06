<?php
  include_once("connect_db.php");
  
    $course = $_POST['courseID'];
    $semyear = $_POST['semyear'];
    // $subjectCode = $_POST['addSubjectCode'];
    // $subjectDesc = $_POST['addSubjectDesc'];
    // $subjectUnit = $_POST['addSubjectUnit'];
    $subjectCode = $_POST['addSubjectCode'];
    $subjectDesc = $_POST['addSubjectDesc'];
    $subjectUnit = $_POST['units'];

    $arr = array('Success','Success');

    if($semyear=="firstSemFirstYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','1','1')");
    }else if($semyear=="secSemFirstYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','2','1')");
    }else if($semyear=="offSemFirstYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','3','1')");
    }else if($semyear=="firstSemSecYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','1','2')");
    }else if($semyear=="secSemSecYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','2','2')");
    }else if($semyear=="offSemSecYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','3','2')");
    }else if($semyear=="firstSemThirdYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','1','3')");
    }else if($semyear=="secSemThirdYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','2','3')");
    }else if($semyear=="offSemThirdYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','3','3')");
    }else if($semyear=="firstSemFourthYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','1','4')");
    }else if($semyear=="secSemFourthYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','2','4')");
    }else if($semyear=="offSemFourthYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','3','4')");
    }else if($semyear=="firstSemFifthYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','1','5')");
    }else if($semyear=="secSemFifthYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','2','5')");
    }else if($semyear=="offSemFifthYear"){
      mysqli_query($conn, "INSERT INTO `list_of_subjects`(`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES ('','$subjectCode','$subjectDesc','$subjectUnit','$course','3','5')");
    }
    
    echo json_encode($arr);