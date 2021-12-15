<?php
include("conn.php"); 
$id = $_POST['id'];
$p_id = $_POST['p_id'];


if(isset($_POST['submit'])) { 

$cbc = $_POST['cbc']?? null;
$platelet = $_POST['platelet']?? null;
$hema = $_POST['hema']?? null;
$hemo = $_POST['hemo']?? null;

$Urinalysis = $_POST['Urinalysis']?? null;
$Fecalysis = $_POST['Fecalysis']?? null;
$fbs = $_POST['fbs']?? null;
$sua = $_POST['sua']?? null;


$Creatinine = $_POST['Creatinine']?? null;
$Lipid = $_POST['Lipid']?? null;
$SGOT = $_POST['SGOT']?? null;
$SGPT = $_POST['SGPT']?? null;


$bloodtest = $_POST['bloodtest']?? null;
$chest_xray = $_POST['chest_xray']?? null;
$drugtest = $_POST['drugtest']?? null;
$psychological_test = $_POST['psychological_test']?? null;
$NPE = $_POST['NPE']?? null;


$requested_by = $_POST['requested_by'];




$others = $_POST['others']?? null;
$other_text = $_POST['other_text']?? null;


$message = 'Added a requirements for the Medical Certificate';

$user_id = '11111';




$query = mysqli_query($conn, "UPDATE clinic_certificate_requests SET requested_by='$requested_by', CBC='$cbc',	PLATELET='$platelet',	HEMOTOCRIT='$hema',	HEMOGLOBIN='$hemo',Urinalysis='$Urinalysis',Fecalysis='$Fecalysis',FBS='$fbs',sua='$sua',Creatinine='$Creatinine', Lipid='$Lipid', SGOT='$SGOT', SGPT='$SGPT', blood_test='$bloodtest', chest_xray='$chest_xray', drug_test='$drugtest', psychological_test='$psychological_test', NPE='$NPE' , others='$others', other_text='$other_text'	 WHERE request_id=$id");

$result=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$p_id', 'Admin" .' '. "".$message."',now(),'requestmedcert.php', 'Delivered')");
header("Location: admin-request.php");




}

?>