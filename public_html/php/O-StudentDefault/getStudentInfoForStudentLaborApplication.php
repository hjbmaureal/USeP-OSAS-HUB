<?php 
	include '../../conn.php';
    session_start();
	$data = array();
    $applicant = $_SESSION['id'];

    $sql = "CALL MainStudentLaborApplicationAutoFill(?);";
    $stmt = mysqli_stmt_init($conn);
                
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($stmt);
    } else {
        mysqli_stmt_bind_param($stmt,"s", $applicant);
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