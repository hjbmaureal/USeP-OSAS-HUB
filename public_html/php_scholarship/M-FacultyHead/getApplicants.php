<?php 
	include '../../conn.php';
    session_start();
    $data = array();
    $staffid = $_SESSION['id'];

    $sql = "SELECT r.id as requisition_id, sl.applicant_id, fullname(s.first_name,s.middle_name,s.last_name,'',s.suffix,'','with_extensions') as fullname, sf_get_data_from_college_by_id('title',sf_get_data_from_course_by_id('college_id',s.course_id)) as college, sf_get_data_from_course_by_id('title',s.course_id) as coursename, s.year_level, DATE_FORMAT(sl.date_submitted,'%m/%d/%Y') as date_submitted,sl.status, sl.grades_location, sl.cor_location, sl.unit_head_letter_location, sl.recommendation_location, (r.no_of_sl - sf_get_applicants_approved_by_unit_head(r.id)) as sl_vacant_slot FROM sl_applicant as sl JOIN student as s on s.student_id = sl.student_id JOIN requisition_form as r on r.id = sl.assigned_to where r.requested_by =  $staffid";
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