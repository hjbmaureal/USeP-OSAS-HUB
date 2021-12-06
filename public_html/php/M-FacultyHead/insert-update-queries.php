<?php 
	include '../../conn.php';
	session_start();
    $queryno = $_POST['queryno'];
    $id = $_SESSION['id'];

    if ($queryno==1){
    	$applicant = $_POST['appid'];
    	$m = $_POST['month'];
    	$y = $_POST['year'];
    	$semyear = $_POST['semyear'];
    	$h = $_POST['hours'];
    	$sal = $_POST['salary'];

   		// Prepare an insert statement
	    $stmt = mysqli_stmt_init($conn);
	    

	    $sql = "INSERT INTO sl_dtr_report (applicant_id, month, year, semester_year, total_hours, salary, salary_status) VALUES (?,?,?,?,?,?,CURDATE())";

	    if (!mysqli_stmt_prepare($stmt,$sql)){
	        echo "SQL statement failed!".mysqli_stmt_error($conn);
	    } else {
	        mysqli_stmt_bind_param($stmt,"isssid",$applicant, $m, $y, $semyear, $h, $sal);
	        mysqli_stmt_execute($stmt);
	    }	
    }


    if ($queryno==2){
    	$dtr_id = $_POST['row'];
    	$time_in = $_POST['in'];
    	$time_out = $_POST['out'];

   		// Prepare an insert statement
	    $stmt = mysqli_stmt_init($conn);
	    

	    $sql = "UPDATE sl_dtr SET time_in = ?, time_out =? WHERE id = ?";

	    if (!mysqli_stmt_prepare($stmt,$sql)){
	        echo "SQL statement failed!".mysqli_stmt_error($conn);
	    } else {
	        mysqli_stmt_bind_param($stmt,"ssi",$time_in, $time_out, $dtr_id);
	        mysqli_stmt_execute($stmt);
	    }	
    }
    
    if ($queryno==3){
    	$report_id = $_POST['rep_id'];

   		// Prepare an update statement
	    $stmt = mysqli_stmt_init($conn);
	    

	    $sql = "UPDATE sl_dtr_report SET salary_status = CURDATE() WHERE id = ?";

	    if (!mysqli_stmt_prepare($stmt,$sql)){
	        echo "SQL statement failed!".mysqli_stmt_error($conn);
	    } else {
	        mysqli_stmt_bind_param($stmt,"i",$report_id);
	        mysqli_stmt_execute($stmt);
	    }	
    }    

    if ($queryno==4){
    	$application_id = $_POST['app_id'];
    	$status = $_POST['stat'];

   		// Prepare an update statement
	    $stmt = mysqli_stmt_init($conn);
	    

	    $sql = "UPDATE sl_applicant SET status = ? , termination_date = CURDATE() WHERE applicant_id = ?";

	    if (!mysqli_stmt_prepare($stmt,$sql)){
	        echo "SQL statement failed!".mysqli_stmt_error($conn);
	    } else {
	        mysqli_stmt_bind_param($stmt,"si",$status ,$application_id);
	        mysqli_stmt_execute($stmt);
	    }	
    }

    if ($queryno==5){
    	$new_salary = $_POST['new'];
    	$name = $_SESSION['fullname'];

   		// Prepare an update statement
	    $stmt = mysqli_stmt_init($conn);
	    

	    $sql = "INSERT INTO salary (salary,changed_by,date_changed) VALUES (?,?,CURDATE())";

	    if (!mysqli_stmt_prepare($stmt,$sql)){
	        echo "SQL statement failed!".mysqli_stmt_error($conn);
	    } else {
	        mysqli_stmt_bind_param($stmt,"ds",$new_salary ,$name);
	        mysqli_stmt_execute($stmt);
	    }	
    }
