<?php 
	include '../../conn.php';
    session_start();
    $applicant = $_REQUEST['applicant_id'];

	 // Prepare an update statement
    $stmt = mysqli_stmt_init($conn);
    

    $sql = "UPDATE sl_acceptance_details SET date_signed = curdate() WHERE applicant_id =?";

    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt,"i",$applicant);
        mysqli_stmt_execute($stmt);
    }
