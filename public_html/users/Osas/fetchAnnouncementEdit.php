<?php
include("conn.php"); 
$id = $_POST['id'];

$results = array();

		$sql="SELECT * from announcements where announcement_id='$id'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			$results[0] = $row['announcement_id'];
			$results[1] = $row['staff_id'];
			$results[2] = $row['_date'];
			$results[3] = $row['title'];
			$results[4] = $row['content'];
		} 

		
		

echo json_encode($results);



?>