<?php

include('conn.php');

$intake_id = $_POST["intake_id"];



$results = array();



		$sql="SELECT intake_form.*, indv_counselling.*, guidance_appointments.*, student.*, course.name as course, scholarship_program.program_name as scholarship, chk_intake_q6.* from intake_form 
					join indv_counselling on indv_counselling.intake_id=intake_form.intake_id 
					join guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id 
					join student on student.Student_id=intake_form.Student_id 
					join course on course.course_id=student.course_id 
					join scholarship_grantee on scholarship_grantee.student_id=student.Student_id
					join scholarship_program on scholarship_program.program_id=scholarship_grantee.scholar_program_id
					join chk_intake_q6 on chk_intake_q6.intake_id=intake_form.intake_id where intake_form.intake_id='$intake_id'";


		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result)){
	//intake_form table

			$results[0] = $row['intake_id'];

			$results[1] = $row['Student_id'];

			$results[2] = $row['intake_type'];

			$results[3] = $row['date_filed'];

			$results[4] = $row['father_name'];

			$results[5] = $row['father_occupation'];

			$results[6] = $row['father_con_number'];

			$results[7] = $row['mother_name'];

			$results[8] = $row['mother_occupation'];

			$results[9] = $row['mother_con_number'];

			$results[10] = $row['parents_address'];

			$results[11] = $row['elementary_school'];

			$results[12] = $row['elem_years_attendance'];

			$results[13] = $row['elem_year_graduated'];

			$results[14] = $row['secondary_school'];

			$results[15] = $row['sec_years_attendance'];

			$results[16] = $row['sec_year_graduated'];

			$results[17] = $row['tertiary_school'];

			$results[18] = $row['ter_years_attendance'];

			$results[19] = $row['ter_year_graduated'];

			$results[20] = $row['other_school'];

			$results[21] = $row['other_years_attendance'];

			$results[22] = $row['other_year_graduated'];

			$results[23] = $row['hhistory_physical'];

			$results[24] = $row['hhistory_psychiatric'];

			$results[25] = $row['Q1'];

			$results[26] = $row['Q2'];

			$results[27] = $row['Q3'];

			$results[28] = $row['Q4'];

			$results[29] = $row['Q5'];

			$results[30] = $row['Q7'];

			$results[31] = $row['birth_order'];


// students table

			$results[32] = $row['course'];

			$results[33] = $row['course'].'-'.$row['year_level'];

			$results[34] = $row['title'];

			$results[35] = $row['last_name'];

			$results[36] = $row['first_name'];

			$results[37] = $row['middle_name'];

			$results[38] = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];

			$results[39] = $row['phone_number'];

			$results[40] = $row['sex'];

			$results[41] = $row['birth_date'];

			$results[42] = $row['civil_status'];

			$results[43] = $row['birth_place'];

			$results[44] = $row['civil_status'];

			$results[45] = $row['house_block_lot_num'].' '.$row['prk_vill_sub'].', '.$row['brgy'].', '.$row['city'].', '.$row['province'];

			$results[46] = $row['province'];

			$results[47] = $row['religion'];

			$results[48] = $row['email_add'];

			$results[49] = $row['scholarship'];

			$results[50] = $row['e_signature'];


			$results[51] = $row['anxiousness'];
			$results[52] = $row['loneliness'];
			$results[53] = $row['guilt_shame'];
			$results[54] = $row['marital_distress'];
			$results[55] = $row['depression'];
			$results[56] = $row['despair'];
			$results[57] = $row['withdraw_form_others'];
			$results[58] = $row['parenting_struggles'];
			$results[59] = $row['anger'];
			$results[60] = $row['thoughts_of_suicide'];
			$results[61] = $row['confusion'];
			$results[62] = $row['fear'];
			$results[63] = $row['hurt'];
			$results[64] = $row['relational_stress'];


		} 
		

echo json_encode($results);







?>
