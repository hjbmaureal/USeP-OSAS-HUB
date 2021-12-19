<!DOCTYPE html>
<html>
<head>
          <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
            <link rel="stylesheet" type="text/css" href="css/main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">
    <title></title>
</head>
<body>

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

//$user_id = '11111';




$query =  "UPDATE clinic_certificate_requests SET requested_by='$requested_by', CBC='$cbc', PLATELET='$platelet',   HEMOTOCRIT='$hema', HEMOGLOBIN='$hemo',Urinalysis='$Urinalysis',Fecalysis='$Fecalysis',FBS='$fbs',sua='$sua',Creatinine='$Creatinine', Lipid='$Lipid', SGOT='$SGOT', SGPT='$SGPT', blood_test='$bloodtest', chest_xray='$chest_xray', drug_test='$drugtest', psychological_test='$psychological_test', NPE='$NPE' , others='$others', other_text='$other_text'   WHERE request_id=$id";

//$result=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$p_id', 'Admin" .' '. "".$message."',now(),'requestmedcert.php', 'Delivered')");

if ($conn->query($query) === TRUE) {
    $user_check_query="SELECT * from login_credentials where username='$p_id' LIMIT 1";
$result2=mysqli_query($conn,$user_check_query);
$request=mysqli_fetch_assoc($result2);

if($request['usertype']=='Student'){
    $result=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$p_id', 'USeP Clinic" .' '. "".$message."',now(),'../users/Student/RequestMedCert.php', 'Delivered','3')");
    
}
if($request['usertype']=='Faculty Head'){
    $result=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$p_id', 'USeP Clinic" .' '. "".$message."',now(),'../users/Faculty/RequestMedCert.php', 'Delivered','3')");
    
}
if($request['usertype']=='Faculty'){
     $result=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$p_id', 'USeP Clinic" .' '. "".$message."',now(),'../users/Faculty/RequestMedCert.php', 'Delivered','3')");
    
}
if($request['usertype']=='Staff'){
    $result=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$p_id', 'USeP Clinic" .' '. "".$message."',now(),'../users/Faculty/RequestMedCert.php', 'Delivered','3')");
    



    }
  echo '<script>
                swal({
                title: "Request responded successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:1000,
                closeOnClickOutside: false,
                closeOnEsc: false,                                                                                             
                },function() {
              window.location.href = "Admin-Request.php";
            })
         </script>';
} else {
  echo '<script>
                    swal({
                    title: "Something went wrong...",
                    text: "Server Request Failed!",
                    type:"error",
                    icon: "error",
                    button: false,
                    timer:2000,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    })
         </script>';
}




}

?>

</body>
</html>