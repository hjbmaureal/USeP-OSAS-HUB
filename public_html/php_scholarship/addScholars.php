<?php
  include_once("connect_db.php");
  $semester_year;
  $sql = mysqli_query($conn,"SELECT * FROM list_of_semester WHERE status = 'Active'");
  while($row=mysqli_fetch_assoc($sql)){
    $semester_year = $row['semester'].' '.$row['year'];
    $semester = $row['semester'];
    $year = $row['year'];
  }

  if(isset($_POST["addScholar"])){
    $student_id=$_POST['sdfIDNumber'];
    $program_id=$_POST['sdfScholarshipName'];
    if($result = mysqli_query($conn,"SELECT * FROM scholarship_general_info WHERE student_id = '$student_id' AND semester_year = '$semester_year'")){
      if(mysqli_num_rows($result)){
        header("Location: ../users/Scholarship/scholars-grantee-records.php?student-already-scholar");
        die();
      }
    }

    $stmt = $conn->prepare("call ScholarshipAddScholarThruDataForm(?,?,?)");
    $stmt->bind_param("sss", $student_id, $program_id, $semester_year);
    $stmt->execute();
    header("Location: ../users/Scholarship/scholars-grantee-records.php?operation=success");
  }else{
    header("Location: ../users/Scholarship/scholars-grantee-records.php?operation=failed");
  }