<?php 
session_start();
include('connect.php');
$id=$_SESSION['id'];
$data = array();/*GROUP BY day(appointment_date)*/
$querry = mysqli_query($db,"SELECT * FROM consultation join consultation_type on consultation.consultation_type=consultation_type.type_id join student on consultation.patient_id=student.Student_id");
 while($row = mysqli_fetch_array($querry)) {
 					$timestamp = strtotime($row['appointment_timefrom']) + 60*60;
					$timestamp1 = strtotime($row['consultation_duration']) + 60*60;
					$time = date('H:i a', $timestamp);
					$time1 = date('H:i a', $timestamp1);
					$color='';
    				$date = date("Y-m-d");
    				$dateDiff=(strtotime($row['appointment_date']) - strtotime($date)) / 86400;
					if ($row['appointment_date'] < $date) 
					{
						$color='#e8e6e5';/*gray*/
					}else if ($dateDiff>=1 && $dateDiff <=7) 
					{
						$color='#ffc107';/*red*/
					}else if($row['appointment_date']==$date) 
					{
						$color='#f90a20';/*yellow*/
						
					}else if ($dateDiff>6 && $dateDiff >=13) 
					{
						$color='#28a745';/*green*/
					}

	$data[]=array(
			'color' => $color,
			'id' => $row['patient_id'],
			'title' => $row['first_name'].' '.$row['last_name'].' - '.$row['consultation_type'],
			'start' => $row['appointment_date'].' '.$row['appointment_timefrom'],
			'end' => $row['appointment_timefrom'].' '.$time1,

	);/*$row['last_name'].' '.$row['first_name']*/
}
echo json_encode($data);
?>