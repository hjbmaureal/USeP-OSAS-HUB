<?php 
include("config.php");

if(isset($_POST['submit'])) { 
    $id = $_POST['id'];
    
    $query = mysqli_query($mysqli, "SELECT * from request_list where request_id = $id");
    while($row = mysqli_fetch_array($query)) { 
    $name = $row['fullname'];
    $course = $row['course_department'];
    $patient_id = $row['patient_id'];

    }


$cons= $_POST['consultant'];
header('Content-type: image/jpeg');
$font=realpath('AGENCYR.ttf');
$image=imagecreatefromjpeg("medreccert.jpg");
$color=imagecolorallocate($image, 19, 20, 21);
$date=date('Y-m-d');
$day=date('d');
$month=date('F');
$year=date('Y');
imagettftext($image, 14, 0, 430, 300, $color,$font, $date);

imagettftext($image, 15, 0, 280, 270, $color,$font, $name);

imagettftext($image, 15, 0, 530, 270, $color,$font, $course);

imagettftext($image, 15, 0, 531, 515, $color,$font, $cons);

imagettftext($image, 15, 0, 180, 455, $color,$font, $day);

imagettftext($image, 15, 0, 300, 455, $color,$font, $month);

imagettftext($image, 15, 0, 420, 455, $color,$font, $year);
$file=time().$res['cert_id'];

imagejpeg($image,"certs/".$file.".jpg");
imagedestroy($image);
    $name = $row['fullname'];
    $message = 'released your Medical Certificate';
$query = mysqli_query($mysqli,"UPDATE clinic_certificate_requests set certificate_location='../C-admin/certs/$file.jpg',date_released='$date',status='completed' where request_id=$id");

$result=mysqli_query($mysqli,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$patient_id', 'Admin" .' '. "".$message."',now(),'RequestMedRecsCert.php', 'Delivered')");
}
header("Location: admin-medicalrecordcert.php");


?>
