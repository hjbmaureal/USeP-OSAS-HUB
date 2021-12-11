<?php
	include '../conn.php';
    session_start();
	$data = array();
    $id = $_SESSION['id'];
    $pword = $_POST['pass'];

		$sql = "call MainFacultyOtherQueries(?,?,1);";
        $stmt = mysqli_stmt_init($conn);
                    
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed!";
        } else {
            mysqli_stmt_bind_param($stmt,"is", $id,$pword);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    if (password_verify($pword, $row['password'])){
                        $row['res'] = 1;
                    } else {
                        $row['res'] = 0;
                    }
                    $data[] = $row;
                }
            }
        }

    echo json_encode($data);

	