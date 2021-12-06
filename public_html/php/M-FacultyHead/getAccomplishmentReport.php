<?php 
	include '../../conn.php';
    session_start();
    $applicantid = $_REQUEST['appid'];
    $date_from = $_REQUEST['date_from'];
    $date_to = $_REQUEST['date_to'];
    $data = array();    

    $sql = "call MainGetDataFromSLView('','$applicantid','$date_from','$date_to')";

    $stmt = mysqli_stmt_init($conn);
                

    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($conn);
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $row['student_signature'] = base64_encode($row['student_signature']);
                $row['head_signature'] = ($row['head_signature']!=null) ? base64_encode($row['head_signature']) : null;
                $data[] = $row;
            }
        }
    }

    echo json_encode($data);