<?php

include("conn.php");
 
  if(isset($_POST['submit'])){   
    $id = $_POST['id'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];
    $remarks = $_POST['remarks'];
    $preslist = $_POST['preslist'];
    $date=date('Y-m-d');
        
    // checker
    if(empty($diagnosis)|| empty($treatment)|| empty($remarks)|| empty($preslist)) { 

        
        if(empty($diagnosis)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }  
        if(empty($treatment)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if(empty($remarks)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        } 
        if(empty($preslist)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        } 
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        
        //insert syntax
        $result ="UPDATE consultation 
                  SET diagnosis='$diagnosis', treatment='$treatment', remarks='$remarks', prescription_details='$preslist', prescription_date_issued='$date' 
                  WHERE id ='$id'";
          if ($conn->query($result) === TRUE) {
       
          echo '<script>alert("Data added successfully!");</script>';
    
    }else{

  echo '<script>alert("Failed!Try Again!"); </script>';
}
}
}
?>