<?php


$conn = new mysqli('localhost', 'root', '', 'backupdb-3');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	$announcement_id=$_POST["announcement_id"];

	$results = array();

	 $sql="SELECT * from announcements where announcement_id='$announcement_id'";

	 $result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result)){

			$results[0] = $row['announcement_id'];

			$results[1] = $row['_date'];

			$results[2] = $row['title'];

			$results[3] = $row['content'];

			$results[4] = $row['staff_id'];

		}


		echo json_encode($results);




?>