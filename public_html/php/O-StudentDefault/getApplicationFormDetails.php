<?php 
	include '../../conn.php';
    session_start();
	$data = array();
    $applicant = $_REQUEST['id'];

    $sql = "CALL MainGetApplicationFormInfo(?);";
    $stmt = mysqli_stmt_init($conn);
                
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($stmt);
    } else {
        mysqli_stmt_bind_param($stmt,"i", $applicant);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){ 
                $student_sign = base64_encode($row['e_signature']);
                $head_sign = base64_encode($row['head_signature']);
                $osas_sign = base64_encode($row['assessor_signature']);
                $student_pic = ($row['pic']==null) ? '../../images/transparentbg.png' :'data:image/jpeg;base64,'.base64_encode($row['pic']);
                $row['e_signature'] = $student_sign;
                $row['head_signature'] = $head_sign;
                $row['assessor_signature'] = $osas_sign;
                $row['pic'] = $student_pic;
                $data[] = $row;
            }
        }
    }

echo json_encode($data);