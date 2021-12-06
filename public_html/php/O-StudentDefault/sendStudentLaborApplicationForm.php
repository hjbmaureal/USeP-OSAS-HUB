<?php 
	include '../../conn.php';

	$student_id = $_REQUEST['sampstudent_id'];
	$labor_type = $_REQUEST['labor_type'];
	$labor_class = $_REQUEST['labor_class'];
	$labor_status = $_REQUEST['labor_status'];
	$semester_sy = $_REQUEST['sem_year'];
	$time_from = $_REQUEST['time_from'];
	$time_to = $_REQUEST['time_to'];
	$assignment = $_REQUEST['assignment'];
	$yearlevel = $_REQUEST['year_level'];

	$fileinfo=PATHINFO($_FILES["student_grades"]["name"]);
    $newFilename=$fileinfo['filename'] ."_". time() . ".".$fileinfo['extension'];
    move_uploaded_file($_FILES["student_grades"]["tmp_name"],"../../osas-student-labor-files/student-application-grades-certification/".$newFilename);
	$location="osas-student-labor-files/student-application-grades-certification/".$newFilename;


	$fileinfo1=PATHINFO($_FILES["current_cor"]["name"]);
    $newFilename1=$fileinfo1['filename'] ."_". time() . ".".$fileinfo1['extension'];
    move_uploaded_file($_FILES["current_cor"]["tmp_name"],"../../osas-student-labor-files/student-application-current-cor/".$newFilename1);
	$location1="osas-student-labor-files/student-application-current-cor/".$newFilename1;


	$fileinfo2=PATHINFO($_FILES["letter_unit_head"]["name"]);
    $newFilename2=$fileinfo2['filename'] ."_". time() . ".".$fileinfo2['extension'];
    move_uploaded_file($_FILES["letter_unit_head"]["tmp_name"],"../../osas-student-labor-files/student-application-unit-head-letter-of-intent/".$newFilename2);
	$location2="osas-student-labor-files/student-application-unit-head-letter-of-intent/".$newFilename2;


	$fileinfo3=PATHINFO($_FILES["letter_osas_head"]["name"]);
    $newFilename3=$fileinfo3['filename'] ."_". time() . ".".$fileinfo3['extension'];
    move_uploaded_file($_FILES["letter_osas_head"]["tmp_name"],"../../osas-student-labor-files/student-application-osas-head-letter-of-intent/".$newFilename3);
	$location3="osas-student-labor-files/student-application-osas-head-letter-of-intent/".$newFilename3;
    

    // Prepare an insert statement
    $stmt = mysqli_stmt_init($conn);
    

    $sql = "INSERT INTO sl_applicant (student_id,labor_type,labor_class,labor_status,semester_year,available_from,available_to,assigned_to,grades_location,date_submitted,cor_location,unit_head_letter_location,osas_head_letter_location,year_level) VALUES(?,?,?,?,?,?,?,?,?,curdate(),?,?,?,?);
    ;";

    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!".mysqli_stmt_error($stmt);
    } else {
        mysqli_stmt_bind_param($stmt,"sssssssssssss",$student_id,$labor_type,$labor_class,$labor_status,$semester_sy,$time_from,$time_to,$assignment,$location,$location1,$location2,$location3,$yearlevel);
        mysqli_stmt_execute($stmt);
    }
