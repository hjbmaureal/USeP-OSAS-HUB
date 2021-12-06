<?php 
	include '../conn.php';
	$req_id = $_REQUEST['announcementid'];


	// Prepare an insert statement
    $stmt = mysqli_stmt_init($conn);
    

    $sql = "DELETE FROM job_hiring_announcement WHERE requisition_id=$req_id";

    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($conn);
    } else {
        mysqli_stmt_execute($stmt);
    }