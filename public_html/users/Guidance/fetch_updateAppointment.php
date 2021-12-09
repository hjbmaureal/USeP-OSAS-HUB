<?php

$servername="localhost";

$username= "root";

$password="";

$dbname="backupdb-3";

$conn =  new mysqli($servername, $username, $password, $dbname);

  if($conn->connect_error){

    die("Connection Failed: " . $conn->coonect_error);
  }
$id = $_POST["counselling_id"];


$results = array();

		$sql="SELECT indv_counselling.counselling_id, indv_counselling.appointment_id, student.Student_id,student.first_name, student.middle_name, student.last_name, student.year_level, student.section, course.title, guidance_appointments.date_filed,guidance_appointments.appointment_date,guidance_appointments.appointment_time, mode_of_communication.communication_mode, _status.status, guidance_appointments.link, guidance_appointments.meeting_code from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.appointment_id = '$id'";

		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result)){


			$results[0] = $row['counselling_id'];

			$results[1] = $row['appointment_id'];

			$results[2] = $row['first_name'].' '.$row['last_name'];

			$results[3] = $row['title'].' '.$row['year_level'];

			$results[4] = $row['communication_mode'];

			$results[5] = $row['appointment_date'];

			$results[6] = $row['appointment_time'];

			$results[7] = $row['status'];

			$results[8] = $row['Student_id'];

			$results[9] = $row['date_filed'];

			$results[10] = $row['title'];

			$results[11] = $row['year_level'].' '.$row['section'];

			$results[12] = $row['link'];

			$results[13] = $row['meeting_code'];

			



		}

echo json_encode($results);


?>
