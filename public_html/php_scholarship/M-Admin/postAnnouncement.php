<?php 
	include '../../conn.php';

    session_start();
	$staffid = $_SESSION['id'];
	$reqid = $_REQUEST['requisition_id'];
	$title = $_REQUEST['title'];
	$content =$_REQUEST['content'];
    $office = $_REQUEST['office'];

	 // Prepare an insert statement
    $stmt = mysqli_stmt_init($conn);
    

    $sql = "call MainPostJobHiring(?,?,?,?,?)";

    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($stmt);
    } else {
        mysqli_stmt_bind_param($stmt,"issis",$staffid,$title,$content,$reqid,$office);
        mysqli_stmt_execute($stmt);
    }