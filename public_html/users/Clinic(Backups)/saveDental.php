<?php

include_once("connect.php");
 
  if(isset($_POST['Submit'])){   
    $patient_id = $_POST['patient_id'];
    $id = $_POST['id'];
    $tooth = $_POST['tooth'];
    $surface = $_POST['surface'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];
    $remarks = $_POST['remarks'];
    $preslist = $_POST['preslist'];
    $status = $_POST['Status'];
        
    // checker
    if(empty($tooth)||empty($surface)||empty($diagnosis)|| empty($treatment)|| empty($remarks)|| empty($preslist)|| empty($status)) { 

        if(empty($tooth)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($surface)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($diagnosis)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }  
        if(empty($treatment)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($remarks)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($preslist)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($status)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        
        //insert syntax
        $result ="UPDATE consultation 
                  SET tooth='$tooth', surface='$surface', diagnosis='$diagnosis', treatment='$treatment', remarks='$remarks',status='$status', prescription_details='$preslist', prescription_date_issued=now()
                  WHERE id ='$id'";
        $notif=mysqli_query($db,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$patient_id', 'Admin" .' '. "".$message."',now(),'Prescription.php', 'Delivered','3')");
          if ($db->query($result) === TRUE) {
       
          echo '<script>alert("Data added successfully!");</script>';

          echo "<script type='text/javascript'> document.location = 'Admin-ListOfConsultation.php'; </script>";
                exit();
           
    
    }else{

  echo '<script>alert("Failed!Try Again!"); </script>';
}
}
}
?>