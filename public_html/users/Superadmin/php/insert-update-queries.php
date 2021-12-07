<?php 
    include('../../../conn.php');
	session_start();
    $queryno = $_POST['queryno'];

    if ($queryno==1){
    	$deptid = $_POST['id'];
    	$deptstat = $_POST['stat'];

   		// Prepare an insert statement
	    $stmt = mysqli_stmt_init($conn);
	    

	    $sql = "UPDATE department SET status = ? WHERE dept_id = ?";

	    if (!mysqli_stmt_prepare($stmt,$sql)){
	        echo "SQL statement failed!".mysqli_stmt_error($conn);
	    } else {
	        mysqli_stmt_bind_param($stmt,"si",$deptstat,$deptid);
	        mysqli_stmt_execute($stmt);
	    }	
    }

    if ($queryno==2){
    	$deptid = $_POST['id'];
    	$deptname = $_POST['name'];
    	$deptcollege = $_POST['college'];

   		// Prepare an insert statement
	    $stmt = mysqli_stmt_init($conn);
	    

	    $sql = "UPDATE department SET dept_name = ?, college_id = ? WHERE dept_id = ?";

	    if (!mysqli_stmt_prepare($stmt,$sql)){
	        echo "SQL statement failed!".mysqli_stmt_error($conn);
	    } else {
	        mysqli_stmt_bind_param($stmt,"sii",$deptname,$deptcollege,$deptid);
	        mysqli_stmt_execute($stmt);
	    }	
    }

    if ($queryno==3){
    	$deptname = $_POST['name'];
    	$deptcollege = $_POST['college'];

   		// Prepare an insert statement
	    $stmt = mysqli_stmt_init($conn);
	    

	    $sql ="INSERT INTO department (college_id,dept_name) VALUES (?,?)";

	    if (!mysqli_stmt_prepare($stmt,$sql)){
	        echo "SQL statement failed!".mysqli_stmt_error($conn);
	    } else {
	        mysqli_stmt_bind_param($stmt,"is",$deptcollege,$deptname);
	        mysqli_stmt_execute($stmt);
	    }	
    }