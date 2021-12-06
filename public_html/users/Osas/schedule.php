<?php
	include("conn.php");
	if(isset($_POST['submit']))
        {

        $complaintID = $_POST['complain_ID'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $meet_type = $_POST['meet_type'];
        $meet_link = $_POST['meet_link'];
        $meet_id = $_POST['meet_id'];
        $passcode = $_POST['passcode'];
        $status = 'On Going';

        $sql = "UPDATE response SET date_schedule= '$date', time_from = '$time', meeting_type = '$meet_type', meeting_link = '$meet_link', meeting_id = '$meet_id', passcode = '$passcode', status = '$status' WHERE Complaint_ID = '$complaintID' ";

        $sql1 = "UPDATE complaint SET Status = '$status' WHERE Complaint_ID = '$complaintID' ";
        $sql_run = mysqli_query($conn , $sql);
        $sql_run1 = mysqli_query($conn , $sql1);
        // echo $statuscom;
        // echo $complaintID;
        // echo $dependantID;
        // echo $action_taken;
        

        if($sql_run && $sql_run1){
        	echo '<script> alert("Complaint Sent"); </script>';
        	echo $date;
        	echo $statuscom;
        	header("Location:Response.php");
        }
        else{
        	echo '<script> alert("Complaint NOT Sent"); </script>';
        }
    }

 ?>