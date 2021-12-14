<?php 

    include("conn.php");

    if (isset($_POST['send_data']))
    {
        $complaint_id = $_POST['complaint_id'];
        $status = 'Done';
        $action_taken = $_POST['action_taken'];
        $remarks = 'Refer to '.$action_taken;
        
        $sql = "INSERT into response (Complaint_ID ,status, defendant,details , date_schedule,  time_from, time_to, meeting_type , meeting_link, meeting_id , passcode , action_taken, notification_status) values('$complaint_id',  'Done', '',  '' , Null,  Null,   Null,  '','$remarks', '','' , '$action_taken', '0')";

        $sql1 = "UPDATE complaint SET Status = 'Done' WHERE Complaint_ID = '$complaint_id' ";
        
	if($conn->query($sql1)){
			$_conn['success'] = 'Updated successfully';
            $conn->query($sql);
        
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
