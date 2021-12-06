<?php
  include '../conn.php';
  session_start();
  $data = array();
  $semester = $_GET['sem_year'];

  $sql = "SELECT g.student_id, s.first_name, s.middle_name, s.last_name, col.title as college, c.name as course, sp.program_name, t.type_name as program_type, IF (g.card_signed is not null,g.card_signed,'Not Signed') as card_status, card_ver FROM grantee_history as g JOIN scholarship_program as sp on sp.program_id = g.program_id JOIN scholarship_type as t on t.type_id = sp.type JOIN student as s on s.Student_id = g.Student_id JOIN course as c on c.course_id = s.course_id JOIN college as col on col.college_id = c.college_id WHERE g.semester_year = '".$semester."' and g.student_status = 1";
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
