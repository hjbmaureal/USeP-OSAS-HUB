<!DOCTYPE html>
<html>
<head>

      <!-- Page specific javascripts-->
      <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
            <link rel="stylesheet" type="text/css" href="css/main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">

      <!-- Font-icon css-->

          <title></title>
</head>
<body>
<?php
session_start();
include("conn.php"); 

if(isset($_POST['submit'])) {  
$id=$_SESSION['id'];
$date = $_POST['date'];
$purpose = $_POST['purpose']; 
$type="Medical Certificate";
$other_text = $_POST['other_text']?? null;
$message = 'Request for a Medical Certificate';

foreach ($purpose as $purpose2){ 
    if ($purpose2 == "others") {
        $new_purpose = $other_text;
        
    }
    else{
        $new_purpose = $purpose2;

    }
}

    $sql2 = mysqli_query($conn, "SELECT * from staff where type = 'Staff' AND position='Nurse' AND account_status='Active'");
    while($res = mysqli_fetch_array($sql2)) { 
    $staff_id = $res['staff_id'];
    }

    $sql = mysqli_query($conn, "SELECT patient_id, CONCAT(first_name,' ',middle_name,' ',last_name) as fullname , type from patient_list where patient_id = '$id'");
    while($res = mysqli_fetch_array($sql)) { 
    $name = $res['fullname'];
    $patient_id = $res['patient_id'];
    }
    if (empty($patient_id)) {
        echo '<script>
                swal({
                title: "No Record!",
                text: "Server Request Successful!",
                type:"error",
                icon: "error",
                button: false,
                timer:1000,
                closeOnClickOutside: false,
                closeOnEsc: false,                                                                                             
                },function() {
              window.location.href = "StudentConsultation.php";
            })
         </script>';
    }else{
$query = "INSERT INTO clinic_certificate_requests(user_id, date_requested, purpose, request_type,status ) VALUES('$id','$date','$new_purpose','$type','pending')";

$result=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$staff_id', '$name" .' '. "".$message."',now(),'admin-request.php', 'Delivered','3')");

if ($conn->query($query) === TRUE) {
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
                },function() {
              window.location.href = "requestmedcert.php";
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










    





}

?>
</body>
</html>