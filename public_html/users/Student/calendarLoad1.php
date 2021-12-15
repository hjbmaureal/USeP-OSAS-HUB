<?php 

include('conn.php');
$data = array();/*GROUP BY day(appointment_date)*/


$querry = mysqli_query($conn,"SELECT * FROM viewresponse WHERE response_status = 'On Going' ORDER BY date_schedule, time_from WHERE intake_form.Student_id='$id'  ORDER BY appointment_date, appointment_time ASC");


 while($row = mysqli_fetch_array($querry)) {
 					$timestamp = strtotime($row['time_from']) + 60*60;
					$time = date('H:i A', $timestamp);
					$color='';
    				$date = date("Y-m-d");
    				$dateDiff=(strtotime($row['date_schedule']) - strtotime($date)) / 86400;
					if ($row['date_schedule']<=$date) 
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
			'start' => $row['date_schedule'].' '.$row['time_from'],
			'end' => $row['date_schedule'].' '.$time,

	);/*$row['last_name'].' '.$row['first_name']*/
}
echo json_encode($data);
?>