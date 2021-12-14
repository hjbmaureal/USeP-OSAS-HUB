<?php 

include('conn.php');
include('session_student.php');
$id=$_SESSION['username'];
$data = array();/*GROUP BY day(appointment_date)*/
$querry = mysqli_query($conn,"SELECT * FROM guidance_appointments LEFT JOIN indv_counselling ON guidance_appointments.appointment_id=indv_counselling.appointment_id LEFT JOIN intake_form ON indv_counselling.intake_id=intake_form.intake_id LEFT JOIN student on intake_form.Student_id=student.Student_id WHERE intake_form.Student_id='$id' ORDER BY appointment_date, appointment_time ASC");
 while($row = mysqli_fetch_array($querry)) {
 					$timestamp = strtotime($row['appointment_time']) + 60*60;
					$time = date('H:i', $timestamp);
					$color='';
    				$date = date("Y-m-d");
    				$dateDiff=(strtotime($row['appointment_date']) - strtotime($date)) / 86400;
					if ($dateDiff<0) 
					{
						$color='#28a745';/*green*/
					}else if ($dateDiff>=0 && $dateDiff <=6) 
					{
						$color='#dc3545';/*red*/
					}else if ($dateDiff>6 && $dateDiff <=13) 
					{
						$color='#ffc107';/*yellow*/
					}

	$data[]=array(
			'color' => $color,
			'id' => $row['appointment_id'],
			'title' => '',
			'start' => $row['appointment_date'].' '.$row['appointment_time'],
			'end' => $row['appointment_date'].' '.$time,

	);/*$row['last_name'].' '.$row['first_name']*/
}
echo json_encode($data);
?>