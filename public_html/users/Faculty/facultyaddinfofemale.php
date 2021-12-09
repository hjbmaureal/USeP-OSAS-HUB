<?php
session_start();
include_once("connect.php");
 
  if(isset($_POST['Submit'])){   
    $patient_id=$_SESSION['id'] ; 
    $hospitalized = $_POST['hospitalized'];
    $ill = $_POST['ill'] ?? null;
    $whenn = $_POST['whenn'] ?? null;
    $operation = $_POST['operation'];
    $kind = $_POST['kind'] ?? null;
    $whennn = $_POST['whennn'] ?? null;
    $disease = $_POST['disease'] ?? null;
    $illness = $_POST['illness'] ?? null;
    $permission = $_POST['permission'];

     $first = $_POST['first'];
    $regular = $_POST['regular'];
    $peryear = $_POST['peryear'];
    $dysmenorrhea = $_POST['dysmenorrhea'];
    $premen = $_POST['premen'];
        
    // checker
    if(empty($patient_id)||empty($hospitalized)|| empty($operation)|| empty($disease)|| empty($illness) || empty($permission) || empty($first)|| empty($regular)|| empty($dysmenorrhea)) { 

        
        if(empty($hospitalized)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }  
        
        if(empty($operation)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
              
        if(empty($disease)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        
        if(empty($illness)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
         if(empty($permission)) {
            echo "<font color='red'>Product field is empty.</font><br/>";
        }

          if(empty($first)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }  
        if(empty($regular)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($dysmenorrhea)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
           
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        
        //insert syntax
        $result ="INSERT INTO clinic_patient_info(patient_id,admitted,admitted_illness,admitted_illness_start,operation,operation_kind,operation_when,infectious_disease,headaches,swear_clause) VALUES('$patient_id','$hospitalized','$ill','$whenn','$operation','$kind','$whennn','$disease','$illness','$permission')";

          if ($db->query($result) === TRUE) {
       
            $res ="INSERT INTO clinic_patient_info_female(patient_id,mens_age_start,mens_regular,mens_irregular,dysmenorrhea,pms) VALUES('$patient_id','$first','$regular','$peryear','$dysmenorrhea','$premen')";

            if ($db->query($res) === TRUE) {

           $sql="Update student set patinfo_status='1'  where Student_id='$patient_id'";
           $result5 = $db->query($sql);

          echo '<script>alert("Data added successfully!");</script>';

          echo "<script type='text/javascript'> document.location = 'facultyClinicComplaint.php'; </script>";
                exit();
          
    }}else{

  echo '<script>alert("Failed!Try Again!"); </script>';
}

}
}
?>
