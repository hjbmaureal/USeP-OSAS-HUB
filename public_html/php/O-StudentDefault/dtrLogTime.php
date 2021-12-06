<?php 
	include '../../conn.php';
    session_start();

    $queryno = $_POST['queryid'];

    // TIME_IN 
    if ($queryno==1) {
    	$applicant = $_POST['app_id'];
    	$cursem = $_POST['cursem'];

		// Prepare an update statement
	    $stmt = mysqli_stmt_init($conn);
	    

	    $sql = "INSERT INTO sl_dtr (applicant_id,time_in,sem_year) VALUES (?,NOW(),?)";

	    if (!mysqli_stmt_prepare($stmt,$sql)){
	        echo "SQL statement failed!".mysqli_stmt_error($conn);
	    } else {
	        mysqli_stmt_bind_param($stmt,"is",$applicant,$cursem);
	        if (!mysqli_stmt_execute($stmt)){
	        	echo "SQL statement failed!".mysqli_stmt_error($conn);
	        };
	    }
    }

    //ADD TASK
    if ($queryno==2){
    	$dtr_id = $_POST['id'];
    	$task = $_POST['task_performed'];

		// Prepare an update statement
	    $stmt = mysqli_stmt_init($conn);
	    

	    $sql = "UPDATE sl_dtr SET task = ? WHERE id = ?";

	    if (!mysqli_stmt_prepare($stmt,$sql)){
	        echo "SQL statement failed!".mysqli_stmt_error($conn);
	    } else {
	        mysqli_stmt_bind_param($stmt,"si",$task,$dtr_id);
	        if (!mysqli_stmt_execute($stmt)){
	        	echo "SQL statement failed!".mysqli_stmt_error($conn);
	        };
	    }
    }

    //UPDATE FOR TIME OUT
    if ($queryno==3){
    	$dtr_id = $_POST['table_id'];
    	$applicant = $_POST['app_id'];

		// Prepare an update statement
	    $stmt = mysqli_stmt_init($conn);
	    

	    $sql = "UPDATE sl_dtr SET time_out = NOW() WHERE id = ?";

	    if (!mysqli_stmt_prepare($stmt,$sql)){
	        echo "SQL statement failed!".mysqli_stmt_error($conn);
	    } else {
	        mysqli_stmt_bind_param($stmt,"i",$dtr_id);
	        if (!mysqli_stmt_execute($stmt)){
	        	echo "SQL statement failed!".mysqli_stmt_error($conn);
	        };
	    }
    }
    