<?php 
	include '../../conn.php';
    session_start();
    $staffid = $_SESSION['id'];
	$reqid = $_REQUEST['requisition_id'];
	$status = $_REQUEST['stat'];

	 // Prepare an insert statement
    $stmt = mysqli_stmt_init($conn);
    

    $sql = "UPDATE requisition_form SET requisition_status = ?, assessed_by = ?, date_approved_disapproved = curdate() WHERE id =?";

    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($stmt);
    } else {
        mysqli_stmt_bind_param($stmt,"sii",$status,$staffid,$reqid);
        mysqli_stmt_execute($stmt);
    }
