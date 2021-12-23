<?php 
	include '../../conn.php';
    session_start();
	$data = array();
    $queryno = $_REQUEST['queryno'];

    if ($queryno==1){
        $requisition_id = $_POST['req_id'];

        $sql = "SELECT * FROM requisition_form WHERE id = $requisition_id";
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

    if ($queryno==2){


        $sql = "SELECT a.applicant_id, IF(LENGTH(TRIM(s.middle_name)) > 0, CONCAT(s.first_name,' ',SUBSTR(s.middle_name,1,1),'. ',s.last_name), CONCAT(s.first_name,' ',s.last_name)) AS student_name, IF (t.office_id is null,(SELECT dept_name FROM department WHERE dept_id = t.dept_id),(SELECT office_name FROM office WHERE office_id = t.office_id)) AS office_dept, IF(LENGTH(TRIM(t.middle_name)) > 0, CONCAT(t.first_name,' ',SUBSTR(t.middle_name,1,1),'. ',t.last_name), CONCAT(t.first_name,' ',t.last_name)) AS staff_name, DATE_FORMAT(dt.starting_date,'%M %d, %Y') as starting_date, DATE_FORMAT(dt.expiration_date,'%M %d, %Y') as expiration_date,a.status,a.student_id,a.labor_type,a.labor_class,a.labor_status,a.semester_year, a.grades_location, a.cor_location,a.unit_head_letter_location,a.osas_head_letter_location,a.recommendation_location,r.length_of_service,dt.duty1,dt.duty2,dt.duty3,dt.duty4,s.pic FROM sl_applicant as a JOIN sl_acceptance_details as dt on dt.applicant_id = a.applicant_id JOIN student as s on s.Student_id = a.student_id JOIN requisition_form as r on r.id = a.assigned_to JOIN staff as t on t.staff_id = r.requested_by LEFT JOIN office as o on o.office_id = t.office_id LEFT JOIN department as d on d.dept_id = t.dept_id";
        $stmt = mysqli_stmt_init($conn);
                    
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed!";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    $spic = ($row['pic']==null) ? '../../images/logo.png' :'data:image/jpeg;base64,'.base64_encode($row['pic']);
                    $row['pic'] = $spic;
                    $data[] = $row;
                }
            }
        }

    }

    if ($queryno==3) {
        $sql = "SELECT * FROM salary ORDER BY id asc";
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

