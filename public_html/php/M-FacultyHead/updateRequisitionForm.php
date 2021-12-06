<?php 
	include '../../conn.php';
	$data = array();
	$req_id = $_REQUEST['requisition_id'];
	$sl_no = $_REQUEST['edit_sl_no'];
	$service_length = $_REQUEST['edit_service_length'];
	$quali1 = $_REQUEST['edit_qualification1'];
	$quali2 = $_REQUEST['edit_qualification2'];
	$quali3 = $_REQUEST['edit_qualification3'];
	$skill1 = $_REQUEST['edit_skill1'];
	$skill2 = $_REQUEST['edit_skill2'];
	
	$add_workload = (isset($_REQUEST['edit_additional_workload'])) ? $_REQUEST['edit_additional_workload'] : 0;
	$reduce_workload = (isset($_REQUEST['edit_reduction_workload'])) ? $_REQUEST['edit_reduction_workload'] : 0;
	$skill_saturation = (isset($_REQUEST['edit_skill_saturation'])) ? $_REQUEST['skill_saturation'] : 0;
	$other_reason = $_REQUEST['edit_other_reason'];
    
    // Prepare an insert statement
    $stmt = mysqli_stmt_init($conn);
    

    $sql = "UPDATE requisition_form SET no_of_sl = ?, length_of_service = ?, qualification1 = ?, qualification2 = ?, qualification3 = ?, skill1 = ?, skill2 = ?, additional_workload_reason = ?, reduction_in_workload_reason = ?, reached_saturation_reason = ?, other_reason = ? WHERE id = ?";

    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt,"iisssssiiisi",$sl_no,$service_length,$quali1,$quali2,$quali3,$skill1,$skill2,$add_workload,$reduce_workload,$skill_saturation,$other_reason,$req_id);
        mysqli_stmt_execute($stmt);
    }