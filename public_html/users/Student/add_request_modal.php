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
include("conn.php"); 

if(isset($_POST['submit'])) {  
$id=$_SESSION['id'];
$date = $_POST['date'];
$purpose = $_POST['purpose']; 
$type="Medical Certificate";
$other_text = $_POST['other_text']?? null;
$message = 'requested a Medical Certificate';

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
        echo '<script> alert("No records")
        window.location.href="StudentConsultation.php";
         </script>
        ';
    }else{
$query = "INSERT INTO clinic_certificate_requests(user_id, date_requested, purpose, request_type,status ) VALUES('$id','$date','$new_purpose','$type','pending')";


if ($conn->query($query) === TRUE) {
    $admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='Clinic' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);
$admin_id= $request['staff_id'];
$result=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status,office_id) values ('$admin_id', '$name" .' '. "".$message."',now(),'../users/Clinic/admin-request.php', 'Delivered','3')");
  echo '<script>
                swal({
                title: "Request added successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:2000,
                closeOnClickOutside: false,
                closeOnEsc: false,                                                                                             
                }).then(function() {
                window.location = "requestmedcert.php";
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