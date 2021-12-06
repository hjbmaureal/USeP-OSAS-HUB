<?php 
	
	include '../../conn.php';
    session_start();
	$data = array();
	//username na session variable ni siya diri na part
	$requested_by= $_SESSION['id'];
	$sl_no = $_REQUEST['sl_no'];
	$service_length = $_REQUEST['service_length'];
	$quali1 = $_REQUEST['qualification1'];
	$quali2 = $_REQUEST['qualification2'];
	$quali3 = $_REQUEST['qualification3'];
	$skill1 = $_REQUEST['skill1'];
	$skill2 = $_REQUEST['skill2'];
	
	$add_workload = (isset($_REQUEST['additional_workload'])) ? $_REQUEST['additional_workload'] : 0;
	$reduce_workload = (isset($_REQUEST['reduction_workload'])) ? $_REQUEST['reduction_workload'] : 0;
	$skill_saturation = (isset($_REQUEST['skill_saturation'])) ? $_REQUEST['skill_saturation'] : 0;
	$other_reason = $_REQUEST['other_reason'];
    
    // Prepare an insert statement
    $stmt = mysqli_stmt_init($conn);
    

    $sql = "call MainSubmitRequisitionForm(?,?,?,?,?,?,?,?,?,?,?,?);";

    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt,"iiisssssiiis",$requested_by,$sl_no,$service_length,$quali1,$quali2,$quali3,$skill1,$skill2,$add_workload,$reduce_workload,$skill_saturation,$other_reason);
        mysqli_stmt_execute($stmt);
    }