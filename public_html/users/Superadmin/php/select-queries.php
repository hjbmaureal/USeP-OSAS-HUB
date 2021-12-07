<?php
    include('../../../conn.php');

	$data = array();

    $queryno = $_REQUEST['queryno'];

    if ($queryno==1){

    	$sql = "SELECT d.dept_id,c.description,d.dept_name,(SELECT group_concat(concat(first_name,' ',last_name)) FROM staff WHERE dept_id = d.dept_id and access_level = 1) as dept_head,d.status FROM department as d JOIN college as c on c.college_id = d.college_id";
        $stmt = mysqli_stmt_init($conn);
                    
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed!".mysqli_stmt_error($conn);
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