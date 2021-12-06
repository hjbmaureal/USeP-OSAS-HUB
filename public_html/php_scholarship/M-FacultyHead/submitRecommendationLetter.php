<?php 	
	include '../../conn.php';
    session_start();
    $applicant = $_REQUEST['current_applicant_id'];


	$fileinfo=PATHINFO($_FILES["recommendation_letter"]["name"]);
    $newFilename=$fileinfo['filename'] ."_". time() . ".".$fileinfo['extension'];
    move_uploaded_file($_FILES["recommendation_letter"]["tmp_name"],"../../osas-student-labor-files/student-application-recommendation-letter/".$newFilename);
	$location="osas-student-labor-files/student-application-recommendation-letter/".$newFilename;

	// Prepare an insert statement
    $stmt = mysqli_stmt_init($conn);
    

    $sql = "UPDATE sl_applicant SET recommendation_location =?, status = 'Approved by Unit Head' WHERE applicant_id = ?";

    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt,"si",$location,$applicant);
        mysqli_stmt_execute($stmt);
    }
	