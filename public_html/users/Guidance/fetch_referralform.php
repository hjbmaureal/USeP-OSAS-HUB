<?php


$conn = new mysqli('localhost', 'root', '', 'backupdb-3');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$referral_id = $_POST["referral_id"];


$results = array();

			$sql="SELECT referral_form.referral_id, referral_form.date_filed, referral_form.refdate_completed, referral_form.notes, staff.first_name as fname, staff.last_name as lname, staff.position, staff.e_signature, student.Student_id,student.first_name, student.last_name, student.year_level, student.section, student.phone_number, course.title from referral_form join staff USING(staff_id) join student USING(Student_id) join course USING(course_id) where referral_id='$referral_id' ";

		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){

			$results[0] = $row['referral_id'];

			$results[1] = $row['date_filed'];

			$results[2] = $row['fname'].' '.$row['lname'];

			$results[3] = $row['position'];

			$results[4] = $row['first_name'].' '.$row['last_name'];

			$results[5] = $row['title'];

			$results[6] = $row['year_level'];

			$results[7] = $row['section'];

			$results[8] = $row['e_signature'];

			$results[10] = $row['phone_number'];

			$results[11] = $row['title'].'- '.$row['year_level'];

			$results[12] = $row['refdate_completed'];

			$results[13] = $row['notes'];

			$results[15] = $row['Student_id'];

}

echo json_encode($results);

?>
