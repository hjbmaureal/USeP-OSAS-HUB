<?php
  include_once("connect.php");

  if(isset($_POST['updatePersonnel'])){

  	$staff_id = $_POST['staff_id_update'];
  	
    $license_number = $_POST['license_update'];
    $ptr_no = $_POST['ptr_update'];
    $s2 = $_POST['s2_update'];;

	  $query = "UPDATE staffdetails SET license_number = '$license_number', ptr_no = '$ptr_no', s2 = '$s2' WHERE staff_id = '$staff_id'";
    $query_run = mysqli_query($db, $query);
    header("Location: Admin-MedicalPersonnel.php?operation=success");
}
  ?>
