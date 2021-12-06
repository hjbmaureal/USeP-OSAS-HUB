<?php 
	include '../../conn.php';
	$data = array();
    $req_id = $_REQUEST['req_id'];

    $sql = "call MainGetRequisitionFormInfo(?);";
    $stmt = mysqli_stmt_init($conn);
                
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($stmt);
    } else {
        mysqli_stmt_bind_param($stmt,"i", $req_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){ 
                $row['head_signature'] = isset($row['head_signature']) ? base64_encode($row['head_signature']) : $row['head_signature'];
                $row['assessor_signature'] = isset($row['assessor_signature']) ? base64_encode($row['assessor_signature']) : $row['assessor_signature'];
                $data[] = $row;
            }
        }
    }

    echo json_encode($data);