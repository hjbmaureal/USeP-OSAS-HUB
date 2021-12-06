<?php 
	include '../../conn.php';
    session_start();


    $applicant_id = $_REQUEST['acceptance_applicant'];
    $duty1 = $_REQUEST['acceptance_duty1'];
    $duty2 =  $_REQUEST['acceptance_duty2'];
    $duty3 =  $_REQUEST['acceptance_duty3'];
    $duty4 = $_REQUEST['acceptance_duty4'];
    $schedule1 = $_REQUEST['acceptance_sched1'];
    $schedule2 = $_REQUEST['acceptance_sched2'];
    $office_asignment = $_REQUEST['acceptance_office'];
    $starting_date = $_REQUEST['acceptance_startdate'];
    $expiration_date = $_REQUEST['acceptance_expiredate'];
    $dean_unit_assigned = $_REQUEST['acceptance_dean'];
    $budget_officer = $_REQUEST['acceptance_budget_officer'];
    $chancellor = $_REQUEST['acceptance_chancellor'];


	// Prepare an insert statement
    $stmt = mysqli_stmt_init($conn);
    

    $sql = "INSERT INTO sl_acceptance_details (applicant_id,duty1,duty2,duty3,duty4,schedule1,schedule2,office_asignment,starting_date,expiration_date,dean_unit_assigned,budget_officer,chancellor) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($stmt);
    } else {
        mysqli_stmt_bind_param($stmt,"issssssssssss",$applicant_id,$duty1,$duty2,$duty3,$duty4,$schedule1,$schedule2,$office_asignment,$starting_date,$expiration_date,$dean_unit_assigned,$budget_officer,$chancellor);
        mysqli_stmt_execute($stmt);
    }
