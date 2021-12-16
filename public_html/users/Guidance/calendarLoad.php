<?php 

include('conn.php');
$data = array();/*GROUP BY day(appointment_date)*/
$querry = mysqli_query($conn,"SELECT * FROM guidance_appointments LEFT JOIN indv_counselling ON guidance_appointments.appointment_id=indv_counselling.appointment_id LEFT JOIN intake_form ON indv_counselling.intake_id=intake_form.intake_id LEFT JOIN group_guidance on guidance_appointments.appointment_id=group_guidance.appointment_id LEFT JOIN student on intake_form.Student_id=student.Student_id WHERE guidance_appointments.status_id=3 ORDER BY appointment_date, appointment_time ASC");
 while($row = mysqli_fetch_array($querry)) {
 					$timestamp = strtotime($row['appointment_time']) + 60*60;
					$time = date('H:i', $timestamp);
					$color='';
    				$date = date("Y-m-d");
    				$dateDiff=(strtotime($row['appointment_date']) - strtotime($date)) / 86400;
					if ($row['appointment_date']<=$date) 
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
			'id' => $row['appointment_id'],
			'title' => $row['first_name'].' '.$row['last_name'],
			'start' => $row['appointment_date'].' '.$row['appointment_time'],
			'end' => $row['appointment_date'].' '.$time,

	);/*$row['last_name'].' '.$row['first_name']*/
}
echo json_encode($data);
?>