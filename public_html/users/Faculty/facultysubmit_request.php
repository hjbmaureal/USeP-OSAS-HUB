<!DOCTYPE html>
<html>
<head>

      <!-- Page specific javascripts-->
      <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
      <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
            <link rel="stylesheet" type="text/css" href="css/main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">

      <!-- Font-icon css-->

          <title></title>
</head>
<body>

<?php
session_start();

include("config.php"); 
 
if(isset($_POST['submit'])) { 
$purpose = $_POST['purpose'];  
$date = $_POST['date'];
$id = $_SESSION['id'];
$message = 'filed a request for Medical Records Certification.';

    $sql2 = mysqli_query($mysqli, "SELECT * from staff where type = 'Coordinator' and office_id = 3 AND account_status='Active'");
    while($res = mysqli_fetch_array($sql2)) { 
    $staff_id = $res['staff_id'];
    }
    $sql = mysqli_query($mysqli, "SELECT patient_id, CONCAT(first_name,' ',middle_name,' ',last_name) as fullname , type from patient_list where patient_id = '$id'");
    while($res = mysqli_fetch_array($sql)) { 
    $name = $res['fullname'];
    $patient_id = $res['patient_id'];
    }
    if (empty($patient_id)) {
    echo '<script>
                    swal({
                    title: "No records!",
                    text: "Server Request Failed!",
                    type:"error",
                    icon: "error",
                    button: false,
                    timer:2000,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                }).then(function() {
              window.location = "Clinic_Privacy-Policy.php";
            })
         </script>';
  }
    else {

$query = "INSERT INTO clinic_certificate_requests(user_id, date_requested, purpose,request_type,status) VALUES('$id','$date','$purpose','Medical Records Certification','pending')";



if ($mysqli->query($query) === TRUE) {
  $admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='Clinic' LIMIT 1";
$result2=mysqli_query($mysqli,$admin_check_query);
$request=mysqli_fetch_assoc($result2);
$admin_id= $request['staff_id'];
$result=mysqli_query($mysqli,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$admin_id', '$name" .' '. "".$message."',now(),'../users/Clinic/Admin-MedicalRecordCert.php', 'Delivered','3')");
  echo '<script>
                swal({
                title: "Request added successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:1000,
                closeOnClickOutside: false,
                closeOnEsc: false,
                }).then(function() {
              window.location = "RequestMedRecsCert.php";
            })
         </script>';
} 
else {
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
}
?>

</body>
</html>