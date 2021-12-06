<?php

include('conn.php');
$id = '2018-00001';
$sql = mysqli_query($conn, "SELECT patient_id, CONCAT(first_name,' ',middle_name,' ',last_name) as fullname , type from patient_list where patient_id = '$id'");
    while($res = mysqli_fetch_array($sql)) { 
    $name = $res['fullname'];
    $patient_id = $res['patient_id'];
    }
    if (empty($patient_id)) {
    	echo '<script> alert("No records")
    	
    	 </script>
    	';
    }else{
    	echo "Records found";
    }

?>