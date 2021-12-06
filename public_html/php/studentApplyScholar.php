<?php
  include_once("connect_db.php");
  $semester_year;
  $semester;
  $year;
  $sql = mysqli_query($conn,"SELECT * FROM list_of_semester WHERE status = 'Active'");
  while($row=mysqli_fetch_assoc($sql)){
    $semester_year = $row['semester'].' '.$row['year'];
    $semester = $row['semester'];
    $year = $row['year'];
  }

  if(isset($_POST["submit"])){
    $student_id=$_POST['sdfIDNumber'];
    $program_id=$_POST['sdfScholarshipName'];
    // if($result = mysqli_query($conn,"SELECT * FROM scholarship_general_info WHERE student_id = '$student_id' AND semester_year = '$semester_year'")){
    //   if(mysqli_num_rows($result)){
    //     die(header("Location: ../users/Student/student-scholarship-data-form.php?student-already-scholar"));
    //   }
    // }
    mysqli_query($conn, "INSERT INTO `scholarship_application`(`student_id`, `program_id`, `semester`, `year`) VALUES ('$student_id','$program_id','$semester','$year')");
    // $stmt = $conn->prepare("call ScholarshipAddScholarThruDataForm(?,?,?)");
    // $stmt->bind_param("sss", $student_id, $program_id, $semester_year);
    // $stmt->execute();
    $admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='Scholarship' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$admin_id= $request['staff_id'];
$notif_body = "A student has applied for scholarship.";
    mysqli_query($conn, "INSERT INTO `notif`(user_id, message_body, time, link, message_status, office_id) VALUES ('$admin_id', '$notif_body',now(),'../users/Scholarship/scholars-validation.php', 'Delivered','2') ");
    die(header("Location: ../users/Student/student-scholarship-data-form.php?operation-success"));
  }else{
    die(header("Location: ../users/Student/student-scholarship-data-form.php?operation-failed"));
  }