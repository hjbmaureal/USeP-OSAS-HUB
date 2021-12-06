<?php
include("conn.php"); 
$student_id = $_POST['id'];

$results = array();

		$sql="SELECT * from student where student_id='$student_id'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			$results[0] = $row['Student_id'];	
			$results[1] = $row['last_name'];
			$results[2] = $row['first_name'];
			$results[3]=  $row['middle_name'];
		} 

		
		

echo json_encode($results);



?>