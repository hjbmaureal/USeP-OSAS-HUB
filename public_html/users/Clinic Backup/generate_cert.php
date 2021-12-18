<?php 
include("conn.php");
$user_id = '11111';
if(isset($_POST['submit'])) { 
    $id = $_POST['id'];
    
    $sql = mysqli_query($conn, "SELECT * from request_list where request_id = $id");
    while($res = mysqli_fetch_array($sql)) { 
    $name = $res['fullname'];
    $course = $res['course_department'];
    $purpose = $res['purpose'];
    $patient_id = $res['patient_id'];

    }
$found = $_POST['found'];
$cons= $_POST['consultant'];
header('Content-type: image/jpeg');
$font=realpath('AGENCYR.ttf');
$image=imagecreatefromjpeg("medcert.jpg");
$color=imagecolorallocate($image, 19, 20, 21);
$date=date('Y-m-d');
$day=date('d');
$month=date('F');
$year=date('Y');
$released_date=date("Y-m-d",strtotime($date));
imagettftext($image, 14, 0, 430, 300, $color,$font, $date);

imagettftext($image, 15, 0, 280, 270, $color,$font, $name);

imagettftext($image, 15, 0, 530, 270, $color,$font, $course);

imagettftext($image, 15, 0, 531, 515, $color,$font, $cons);

imagettftext($image, 15, 0, 180, 455, $color,$font, $day);

imagettftext($image, 15, 0, 300, 455, $color,$font, $month);

imagettftext($image, 15, 0, 420, 455, $color,$font, $year);

imagettftext($image, 15, 0, 50, 330, $color,$font, $found);

imagettftext($image, 15, 0, 50, 424, $color,$font, $purpose);
$file=time().$res['cert_id'];
$message = 'released your Medical Certificate';

imagejpeg($image,"certs/".$file.".jpg");
imagedestroy($image);
mysqli_query($conn,"UPDATE clinic_certificate_requests set certificate_location='../C-admin/certs/$file.jpg', date_released='$date',status='completed' where request_id=$id");
$result=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$patient_id', 'Admin" .' '. "".$message."',now(),'requestmedcert.php', 'Delivered','3')");
header("Location: admin-request.php");
}

?>
