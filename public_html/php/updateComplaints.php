<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
	<!-- Twitter meta-->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:site" content="@pratikborsadiya">
	<meta property="twitter:creator" content="@pratikborsadiya">
	<!-- Open Graph Meta-->
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Vali Admin">
	<meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
	<meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
	<meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
	<meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
	<link rel="icon" href="../image/logo.png" type="image/gif" sizes="16x16">
	<title>Super Admin | USeP Virtual Hub</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Main CSS-->
	<link rel="stylesheet" type="text/css" href="../css/superadmin/main_main.css">
	<link rel="stylesheet" type="text/css" href="../css/superadmin/upstyle_main.css">
	<!-- Font-icon css-->
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>
<body>

<?php
    include('../conn.php');
    if(isset($_POST['submit']))
        {

        $complaintID = $_POST['Complaint_ID'];
        $dependantID = $_POST['dependantID'];
        $statuscom = 'Pending';
        $action_taken = $_POST['action_taken3'];

        $sql1 = "SELECT Complaint_ID FROM response WHERE Complaint_ID = '$complaintID'";

        $sql2 = "INSERT into response (Complaint_ID ,status, defendant, time_forwarded, link, details, date_schedule,  time_from, time_to, meeting_type , meeting_link, meeting_id , passcode , action_taken, notification_status) values('$complaintID',  'Pending', '$dependantID', now(),'Discipline-Response.php', Null , Null,  Null, Null,  'N/A','N/A', 'N/A', 'N/A', '$action_taken', '0')";
        $sql3 = "UPDATE complaint SET Status = '$statuscom' WHERE Complaint_ID = '$complaintID' ";
        $sql4 = "UPDATE response SET defendant = '$dependantID', action_taken = '$action_taken',status = 'Pending' WHERE Complaint_ID = '$complaintID' ";
        $sql5 = "INSERT into notif (user_id, message_body, time, link, message_status) values('$dependantID',  'You have a Complaint', now(), '../users/Student/Discipline-Response.php', 'Delivered')";
        
        // echo $statuscom;
        // echo $complaintID;
        // echo $dependantID;
        // echo $action_taken;
        $find = mysqli_query($conn , $sql1);
        $count=mysqli_num_rows($find);
        if($count==0){
        $sql_run = mysqli_query($conn , $sql2);
        $sql_run1 = mysqli_query($conn , $sql3);
        }
        else{
            $sql_run = mysqli_query($conn , $sql3);
            $sql_run1 = mysqli_query($conn , $sql4);}

	if($conn->query($sql5)){
			$_conn['success'] = 'Updated successfully';


			echo '<script>
			swal({
				title: "Update Successful",
				type: "success"
				}, function () {
					setTimeout(function () {
						window.location.href="../users/Osas/Complaints.php";
						}, 500);
						});
						</script>';
					}
					else{	
						$_conn['error'] = $conn->error;
						echo '<script>
						swal({
							title: "Failed",
							text: "Try again.",
							type: "warning"
							}, function () {
								setTimeout(function () {
									window.location.href="../users/Osas/Complaints.php";
									}, 500);
									});
									</script>'; 
								}

							}
							else{
								echo '<script>
								swal({
									title: "Failed",
									text: "Try again.",
									type: "warning"
									}, function () {
										setTimeout(function () {
											window.location.href="../users/Osas/Complaints.php";
											}, 500);
											});
											</script>'; 
										}

										?>
										
	</body>
</html>
