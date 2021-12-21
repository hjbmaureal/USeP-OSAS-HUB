 <?php
 session_start(); 
 ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);
include('connect.php');

if(isset($_POST['Submit'])){ 
  $patient_id=$_SESSION['id'];
  $patient_type=$_SESSION['usertype'];
  $school_year=$_POST['schoolyear'];
   $semester=$_POST['semester'];
    $mode = $_POST['mode'];
    $type = $_POST['type'];
    $problem = $_POST['problem'];
    $status="Pending";

    $sqlstaff = mysqli_query($db, "SELECT * from staff where type = 'Staff' AND position='Nurse' AND account_status='Active'");
    while($res = mysqli_fetch_array($sqlstaff)) { 
    $staff_id = $res['staff_id'];
    }
    $sqlname = mysqli_query($db, "SELECT patient_id,CONCAT(first_name,' ' ,last_name) as fullname , type from patient_list where patient_id = '$patient_id'");
    while($res = mysqli_fetch_array($sqlname)) { 
    $name = $res['fullname'];
    }
    // checker
    if(empty($patient_id)||empty($type)||empty($mode)||empty($problem)) { 

        if(empty($type)) {
            echo "<font color='red'>Consultation type is empty.</font><br/>";
        }  
        if(empty($mode)) {
            echo "<font color='red'>Communication_mode field is empty.</font><br/>";
        }
        if(empty($problem)) {
            echo "<font color='red'>Complain field is empty.</font><br/>";
        } 
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        
        //insert syntax
      $message = 'added a new complaint';
        $result ="INSERT INTO consultation(patient_id,consultation_type,staff_id,communication_mode,patient_type,problems,date_filed, status,semester, school_year) VALUES('$patient_id','$type','$staff_id','$mode','$patient_type','$problem',now(),'$status','$semester', '$school_year')";

        $sql=mysqli_query($db,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$staff_id', '$name" .' '. "".$message."',now(),'Admin-NewConsultation.php', 'Delivered','3')");

          if ($db->query($result) === TRUE) {
        //char2x rani hahahahha
          echo '<script>alert("Data added successfully!");</script>';

          echo "<script type='text/javascript'> document.location = 'facultyConsultationHistory.php'; </script>";
                exit();
    }else{

  echo '<script>alert("Failed!Try Again!"); </script>';
}
}
}
?>