<?php 
	include '../../conn.php';
    session_start();
	$data = array();
    $id = $_SESSION['id'];
    $queryno = $_REQUEST['queryid'];

    if ($queryno==1){
        $sql = "call MainStudentOtherQueries('$id',1);";
        $stmt = mysqli_stmt_init($conn);
                    
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed!";
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
        $applicant = $_REQUEST['app_id'];
        $semyear = $_REQUEST['sem_year'];

        $sql = "SELECT dtr.id, dtr.applicant_id, DATE_FORMAT(dtr.time_in,'%M %d, %Y') as date_logged, IF (DATE_FORMAT(dtr.time_in,'%p') = 'AM', 'Morning', 'Afternoon') as time_period, DATE_FORMAT(dtr.time_in,'%h:%i:%s %p') as time_in, DATE_FORMAT(dtr.time_out,'%h:%i:%s %p') as time_out, TIME_FORMAT(dtr.diff,'%H:%i') as diff, dtr.task, rep.salary, rep.salary_status, DATE_FORMAT(dtr.time_in,'%Y/%m/%d') as formatted_date, IF(rep.salary_status is not null, 'Paid', IF (rep.salary is null, 'No report submitted','Pending')) as stat FROM sl_dtr as dtr LEFT JOIN sl_dtr_report as rep on rep.applicant_id = dtr.applicant_id and dtr.time_in between rep.date_from and rep.date_to WHERE dtr.applicant_id = ? and dtr.sem_year = ? ORDER BY dtr.id desc;";
        $stmt = mysqli_stmt_init($conn);
                    
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed!";
        } else {
            mysqli_stmt_bind_param($stmt,"is", $applicant, $semyear);
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

    if ($queryno==3){
        $sql = "call MainSLFacultyOtherQueries(?,1)";
        $stmt = mysqli_stmt_init($conn);
                    
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed!";
        } else {
            mysqli_stmt_bind_param($stmt,"i", $id);
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

    if ($queryno==4){
        $sql = "call MainSLFacultyOtherQueries(NULL,2)";
        $stmt = mysqli_stmt_init($conn);
                    
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed!";
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

    if ($queryno==5){
        $pagename = 'Labor-Accomplishments2.php';
        $min = $_POST['from'];
        $max = $_POST['to'];


        $sql = "CALL MainGetDataFromSLView(?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
                    
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed!";
        } else {
            mysqli_stmt_bind_param($stmt,"ssss", $pagename, $id, $min, $max);
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