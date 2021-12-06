<?php 
	require_once('../conn.php');

	//SET PARAMETERS

	if (!empty($_POST["course_value"])) {
	$course_value = $_POST['course_value'];
	$data = array();
	$sql = "SELECT major FROM course WHERE name = '".$course_value."'";
	$stmt = mysqli_stmt_init($conn);
					
	if (!mysqli_stmt_prepare($stmt,$sql)){
		echo "SQL statement failed!";
	} else {
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0){
				while ($row = mysqli_fetch_assoc($result)){	
					$data[] = $row;
				}
			}
	}
}

	echo json_encode($data);
