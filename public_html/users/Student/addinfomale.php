<?php
session_start();
include_once("connect.php");
 
  if(isset($_POST['Submit'])){   
    $patient_id = $_SESSION['id']; 
    $hospitalized = $_POST['hospitalized'];
    $ill = $_POST['ill'];
    $whenn = $_POST['whenn'];
    $operation = $_POST['operation'];
    $kind = $_POST['kind'];
    $whennn = $_POST['whennn'];
    $disease = $_POST['disease'];
    $illness = $_POST['illness'];
    $permission = $_POST['permission'];
        
    // checker
    if(empty($patient_id)||empty($hospitalized)|| empty($operation)|| empty($disease)|| empty($illness) || empty($permission)) { 

        
        if(empty($hospitalized)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        } 
        if(empty($operation)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }      
        if(empty($disease)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($illness)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
         if(empty($permission)) {
            echo "<font color='red'>Product field is empty.</font><br/>";
        }
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        
        //insert syntax
        $result ="INSERT INTO clinic_patient_info(patient_id,admitted,admitted_illness,admitted_illness_start,operation,operation_kind,operation_when,infectious_disease,headaches,swear_clause) VALUES('$patient_id','$hospitalized','$ill','$whenn','$operation','$kind','$whennn','$disease','$illness','$permission')";
          if ($db->query($result) === TRUE) {
        //char2x rani hahahahha
      
          $sql="Update student set patinfo_status='1'  where Student_id='$patient_id'";
           $result5 = $db->query($sql);
                
                echo '<script>alert("Data added successfully!");</script>';

                echo "<script type='text/javascript'> document.location = 'ClinicComplaint.php'; </script>";
                exit();
           
    }else{

  echo '<script>alert("Failed!Try Again!"); </script>';
}
}
}
?>