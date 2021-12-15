<?php 
include("conn.php");
if(isset($_POST['submit'])) { 
    $request_id = $_POST['request_id'];
    $image_text = $_POST['image_text'];
    $fullnamec = $_POST['cfullname'];
    $agency_text = $_POST['agency_address'];
    $agency_address = wordwrap($agency_text, 30);
    $address = $_POST['address'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $civil_status = $_POST['civil_status'];
    $proposed_position = $_POST['proposed_position'];

    $stats = $_POST['stats']; 
    $fullname = $_POST['fullname'];
    $other_text = $_POST['other_info'];
    $other_info = wordwrap($other_text, 27);
    $affliate = $_POST['affliate'];
    $license = $_POST['license'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bloodtype = $_POST['bloodtype'];
    $med_spec = $_POST['med_spec'];
    $date = $_POST['date'];

    $sql = mysqli_query($conn, "SELECT * from request_list where request_id = $request_id");
    while($res = mysqli_fetch_array($sql)) { 
    $patient_id = $res['patient_id'];
    $blood_test = $res['blood_test'];
    $urinalysis = $res['Urinalysis'];
    $chest_xray = $res['chest_xray'];
    $drug_test = $res['drug_test'];
    $psychological_test = $res['psychological_test'];
    $NPE = $res['NPE'];

}
    }
header('Content-type: image/jpeg');
$font=realpath('arial.ttf');



$date=date('Y-m-d');
$check = "image/2.png";
$logo_file = base64_decode($image_text);
// $logo_file = $image_text;
$image_file = "emp_cert.jpg";
$targetfile = time().$res['cert_id'];
//cert
$photo = imagecreatefromjpeg($image_file);

$fotoW = imagesx($photo);
$fotoH = imagesy($photo);
//logo
$logoImage = imagecreatefromstring($logo_file);
$logoW = imagesx($logoImage);
$logoH = imagesy($logoImage);


//check
//check
$check_img = imagecreatefrompng($check);
$checkW = imagesx($check_img);
$checkH = imagesy($check_img);


$color=imagecolorallocate($photo, 19, 20, 21);
$photoFrame = imagecreatetruecolor($fotoW,$fotoH);

imagettftext($photo, 14, 0, 45, 500, $color,$font, $fullnamec);
imagettftext($photo, 13, 0, 540, 500, $color,$font, $agency_address);
imagettftext($photo, 14, 0, 45, 555, $color,$font, $address);
imagettftext($photo, 14, 0, 160, 610, $color,$font, $sex);
imagettftext($photo, 14, 0, 45, 610, $color,$font, $age);
imagettftext($photo, 14, 0, 290, 610, $color,$font, $civil_status);
imagettftext($photo, 14, 0, 540, 610, $color,$font, $proposed_position);

imagettftext($photo, 14, 0, 45, 800, $color,$font, $fullname);
imagettftext($photo, 13, 0, 540, 805, $color,$font, $other_info);
imagettftext($photo, 14, 0, 45, 857, $color,$font, $affliate);
imagettftext($photo, 14, 0, 45, 915, $color,$font, $license);
imagettftext($photo, 14, 0, 535, 920, $color,$font, $height);
imagettftext($photo, 14, 0, 625, 920, $color,$font, $weight);
imagettftext($photo, 14, 0, 710, 920, $color,$font, $bloodtype);
imagettftext($photo, 14, 0, 45, 970, $color,$font, $med_spec);
imagettftext($photo, 14, 0, 535, 970, $color,$font, $date);

// imagettftext(image, size, angle, x, y, color, fontfile, text)

imagecopyresampled($photoFrame, $photo, 0, 0, 0, 0, $fotoW, $fotoH, $fotoW, $fotoH);

// imagecopy($photoFrame, $logoImage, 0, 0, 0, 0, 1010, 1110);
imagecopyresampled($photoFrame, $logoImage, 50, 740, 0, 0, 100, 100, $logoW, $logoH);

foreach ($stats as $stat){ 
    if ($stat == "FIT") {
        imagecopyresampled($photoFrame, $check_img, 495, 698, 0, 0, 27, 35, $checkW, $checkH);
        
    }
    if ($stat == "UNFIT"){
        imagecopyresampled($photoFrame, $check_img, 545, 698, 0, 0, 27, 35, $checkW, $checkH);

    }
}

if($blood_test == '1'){
    imagecopyresampled($photoFrame, $check_img, 190, 290, 0, 0, 27, 35, $checkW, $checkH);
    
}if($urinalysis == '1'){
    imagecopyresampled($photoFrame, $check_img, 190, 307, 0, 0, 27, 35, $checkW, $checkH);
    
}
if($chest_xray  == '1'){
    imagecopyresampled($photoFrame, $check_img, 190, 323, 0, 0, 27, 35, $checkW, $checkH);
    
}if($drug_test  == '1'){
    imagecopyresampled($photoFrame, $check_img, 190, 339, 0, 0, 27, 35, $checkW, $checkH);
    
}if($psychological_test  == '1'){
    imagecopyresampled($photoFrame, $check_img, 190, 356, 0, 0, 27, 35, $checkW, $checkH);
    
}if($NPE  == '1'){
    imagecopyresampled($photoFrame, $check_img, 190, 374, 0, 0, 27, 35, $checkW, $checkH);
    
}






imagejpeg($photoFrame, "certs/".$targetfile.".jpg"); 
imagedestroy($photoFrame);
// ../C-admin/certs/$file.jpg
//images
$message = 'released your Medical Certificate';
mysqli_query($conn,"UPDATE clinic_certificate_requests set certificate_location='../C-admin/certs/$targetfile.jpg', date_released='$date',status='completed' where request_id=$request_id");
$result=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$patient_id', 'Admin" .' '. "".$message."',now(),'requestmedcert.php', 'Delivered','3')");
header("Location: admin-request.php");
?>
