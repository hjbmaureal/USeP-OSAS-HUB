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
session_start();
$user_id = $_SESSION['id'];


if(isset($_POST['submit'])) {
$id = $_POST['id'];

$query = "UPDATE clinic_certificate_requests SET status='Approved' WHERE request_id=$id";

if ($conn->query($query) === TRUE) {
  echo '<script>
                swal({
                title: "Request verified successfully!",
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