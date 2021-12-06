<?php 
	require_once('conn.php');

	//SET PARAMETERS
	$data = array();
	$studentid = $_REQUEST['student_id'];


	$sql = "SELECT id FROM alumni WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);
					
	if (!mysqli_stmt_prepare($stmt,$sql)){
		echo "SQL statement failed!";
	} else {
		mysqli_stmt_bind_param($stmt,"s", $studentid);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0){
				while ($row = mysqli_fetch_assoc($result)){	
					$data[] = $row;
				}
			}
	}

	echo json_encode($data);
