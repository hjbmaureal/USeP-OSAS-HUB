<?php 
session_start();

$id=$_SESSION['id'];

include('../../conn.php');


$data = array();/*GROUP BY day(appointment_date)*/
$querry = mysqli_query($conn,"SELECT * FROM viewcomplaint WHERE status = 'On Going' AND (defendant = '$id' OR student_id = '$id') ORDER BY schedule_date, time_from ASC");
 while($row = mysqli_fetch_array($querry)) {
 					$timestamp = strtotime($row['time_from']) + 60*60;
					$time = date('H:i A', $timestamp);
					$color='';
    				$date = date("Y-m-d");
    				$dateDiff=(strtotime($row['schedule_date']) - strtotime($date)) / 86400;
					if ($row['schedule_date']<=$date) 
					{
						$color='#28a745';/*green*/
					}else if ($dateDiff>=1 && $dateDiff <=7) 
					{
						$color='#dc3545';/*red*/
					}else if ($dateDiff>7 && $dateDiff <=13) 
					{
						$color='#ffc107';/*yellow*/
					}

	$data[]=array(
			'color' => $color,
			'id' => $row['response_id'],
			'title' => '',
			'start' => $row['schedule_date'].' '.$row['time_from'],
			'end' => $row['schedule_date'].' '.$time,

	);/*$row['last_name'].' '.$row['first_name']*/
}
echo json_encode($data);
?>