<?php 
  include '../conn.php';
  session_start();
  $data = array();
  $semester = $_POST['sem_year'];

  $sql = 'SELECT g.program_id, sp.program_name, (SELECT count(*) FROM grantee_history WHERE card_signed is not null and program_id = g.program_id and semester_year = g.semester_year and student_status = 1) as cards_signed, (SELECT count(*) FROM grantee_history WHERE card_signed is null and program_id = g.program_id and semester_year = g.semester_year and student_status = 1) as cards_unsigned, g.semester_year,g.student_status FROM grantee_history as g JOIN scholarship_program as sp on sp.program_id = g.program_id GROUP BY g.semester_year,g.program_id HAVING g.semester_year = "'.$semester.'" and g.student_status = 1 ORDER BY sp.program_name;';
  //var_dump($sql);
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

    echo json_encode($data);