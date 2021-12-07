<?php
  include_once ("connect_db.php");
  $uni = 1.25;
  $clg = 1.45;
  $complete = false;
  $student_sem = "";
  $student_sy = "";

  if(isset($_POST['updatePromotional'])){
    
    $grantee_id = $_POST['id'];
    $student_id = $_POST['modal_header'];
    $subject1 = $_POST['subject1'];
    $subject2 = $_POST['subject2'];
    $subject3 = $_POST['subject3'];
    $subject4 = $_POST['subject4'];
    $subject5 = $_POST['subject5'];
    $subject6 = $_POST['subject6'];
    $subject7 = $_POST['subject7'];
    $subject8 = $_POST['subject8'];
    $subject9 = $_POST['subject9'];
    if(isset($_POST['grade1'])){
      $grades1 = (float)$_POST['grade1'];
    }else{
      $grades1 = null;
    }
    if(isset($_POST['grade2'])){
      $grades2 = (float)$_POST['grade2'];
    }else{
      $grades2 = null;
    }
    if(isset($_POST['grade3'])){
      $grades3 = (float)$_POST['grade3'];
    }else{
      $grades3 = null;
    }
    if(isset($_POST['grade4'])){
      $grades4 = (float)$_POST['grade4'];
    }else{
      $grades4 = null;
    }
    if(isset($_POST['grade5'])){
      $grades5 = (float)$_POST['grade5'];
    }else{
      $grades5 = null;
    }
    if(isset($_POST['grade6'])){
      $grades6 = (float)$_POST['grade6'];
    }else{
      $grades6 = null;
    }
    if(isset($_POST['grade7'])){
      $grades7 = (float)$_POST['grade7'];
    }else{
      $grades7 = null;
    }
    if(isset($_POST['grade8'])){
      $grades8 = (float)$_POST['grade8'];
    }else{
      $grades8 = null;
    }
    if(isset($_POST['grade9'])){
      $grades9 = (float)$_POST['grade9'];
    }else{
      $grades9 = null;
    }
    $unit1 = (float)$_POST['units1'];
    $unit2 = (float)$_POST['units2'];
    $unit3 = (float)$_POST['units3'];
    $unit4 = (float)$_POST['units4'];
    $unit5 = (float)$_POST['units5'];
    $unit6 = (float)$_POST['units6'];
    $unit7 = (float)$_POST['units7'];
    $unit8 = (float)$_POST['units8'];
    $unit9 = (float)$_POST['units9'];
    $totalunits = $_POST['totalunits'];
    $subject = array($subject1,$subject2,$subject3,$subject4,$subject5,$subject6,$subject7,$subject8,$subject9);
    $grade = array($grades1,$grades2,$grades3,$grades4,$grades5,$grades6,$grades7,$grades8,$grades9);
    
    // echo json_encode($subject);
    // echo json_encode($grade);
    foreach($subject as $index => $code){
      if(!empty($code) && empty($grade[$index])){
        //grade is not complete
        $complete = false;
        echo 'FALSE!';
        break;
      }else{
        echo 'TRUE';
        $complete = true;
      }
    }
    //calcuate GWA
    $gwa = (($grades1*$unit1)+($grades2*$unit2)+($grades3*$unit3)+($grades4*$unit4)+($grades5*$unit5)+($grades6*$unit6)+($grades7*$unit7)+($grades8*$unit8)+($grades9*$unit9))/$totalunits;

    if($result = mysqli_query($conn, "SELECT semester, schoolyear FROM promotional_report WHERE grantee_id = '$grantee_id'")){
      while($row = mysqli_fetch_assoc($result)){
        $student_sem = $row['semester'];
        $student_sy = $row['schoolyear'];
      }
    }
    $new_semester = "";
    $new_school_year = $student_sy;
    $new_sem_sy = "";
    // 2021-2022
    //calculate schoolyear and semester
    $year1 = substr($student_sy, 0, 4);
    $year2 = substr($student_sy, 5, 8);
    if($student_sem == "1st Semester"){
      $new_semester = "2nd Semester";
    }else if($student_sem == "2nd Semester"){
      $new_semester = "Off Semester";
    }else{
      $new_semester = "1st Semester";
      $int_year1 = ((int) $year1) + 1;
      $int_year2 = ((int) $year2) + 1;
      $new_school_year = (string)($year1).'-'.(string)($year2);
    }

    $new_sem_sy = $new_semester.' '.$new_school_year;
    //add new uni and college scholar for the next semester
    if($gwa <= $uni && $complete){
      $result = mysqli_query($conn, "SELECT program_id FROM `scholarship_program` WHERE program_name = 'University Scholar'");
      $row = mysqli_fetch_assoc($result);
      $sp = $row['program_id'];
      echo "sp".''. $sp;
      $stmt = $conn->prepare("call ScholarshipAddScholarThruDataForm(?,?,?)");
      if(false===$stmt){
        die('prepare() failed: '.htmlspecialchars($conn->error));
      }
      $check = $stmt->bind_param("sss", $student_id, $sp,  $new_sem_sy);
      if(false === $check){
        echo 'erroruni';
        die('bind_param() failed: '.htmlspecialchars($conn->error));
      }
      if($stmt->execute()){
        // header("Location: ../users/Scholarship/promotional-report.php?operation=success");
      }else{
        die('execute() uni failed: '.htmlspecialchars($stmt->error));
        // header("Location: ../users/Scholarship/promotional-report.php?operation=failed");
      }
      $stmt->close();
    }
    
    if($gwa <= $clg && $complete ){
      $result = mysqli_query($conn, "SELECT program_id FROM `scholarship_program` WHERE program_name = 'College Scholar'");
      $row = mysqli_fetch_assoc($result);
      $sp = $row['program_id'];
      $stmt = $conn->prepare("call ScholarshipAddScholarThruDataForm(?,?,?)");
      if(false===$stmt){
        die('prepare() failed: '.htmlspecialchars($conn->error));
      }
      $check = $stmt->bind_param("sss", $student_id, $sp, $new_sem_sy);
      if(false === $check){
        echo "errorcol";
        die('bind_param() failed: '.htmlspecialchars($conn->error));
      }
      if($stmt->execute()){
        // header("Location: ../users/Scholarship/promotional-report.php?operation=success");
      }else{
        die('execute() col failed: '.htmlspecialchars($stmt->error));
        // header("Location: ../users/Scholarship/promotional-report.php?operation=failed");
      }
      $stmt->close();
    }

    $stmt = $conn ->prepare("UPDATE enrollment_list set grade1 =?, grade2 =?, grade3 =?, grade4 =?, grade5 =?, grade6 =?, grade7 =?, grade8 =?, grade9 =? , gwa=? WHERE id = ? ");
    if(false===$stmt){
      die('prepare() failed: '.htmlspecialchars($conn->error));
    }
    $check = $stmt -> bind_param("sssssssssss",$grades1, $grades2, $grades3, $grades4, $grades5, $grades6, $grades7, $grades8, $grades9, $gwa, $grantee_id);
    if(false === $check){
      echo "errorgrade";
      die('bind_param() failed: '.htmlspecialchars($conn->error));
    }
    if($stmt->execute()){
      header("Location: ../users/Scholarship/promotional-report.php?operation=success");
    }else{
      die('execute() grades failed: '.htmlspecialchars($stmt->error));
      header("Location: ../users/Scholarship/promotional-report.php?operation=failed");
    }
  }