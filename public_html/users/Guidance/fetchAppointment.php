<?php

$servername="localhost";

$username= "root";

$password="";

$dbname="backupdb-3";



$conn =  new mysqli($servername, $username, $password, $dbname);



  if($conn->connect_error){

    die("Connection Failed: " . $conn->coonect_error);

  }

$intake_id = $_POST["intake_id"];



$results = array();



		$sql="SELECT form_intake.intake_id, student.*, appointments.*, mode_of_communication.mode_name from form_intake 
					LEFT join student on form_intake.Student_id=student.Student_id LEFT join appointments on form_intake.intake_id=appointments.intake_id 
					LEFT join mode_of_communication on appointments.mode_id=mode_of_communication.mode_id 
					LEFT join _status on appointments.status_id=_status.status_id 
					where form_intake.intake_id='$intake_id'";

		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result)){
	//form_intake table

			$results[0] = $row['appointment_id'];

			$results[1] = $row['intake_id'];

			$results[2] = $row['appointment_date'];

			$results[3] = $row['appointment_time'];

			$results[4] = $row['mode_name'];

			$results[5] = $row['first_name'];

			$results[6] = $row['last_name'];

			

		} 



		

		

echo json_encode($results);







?>
