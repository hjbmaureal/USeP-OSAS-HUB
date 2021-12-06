 <?php
include('conn.php');
include('session_student.php');
$id=$_SESSION['id'];

$getsql="SELECT staff.*, office.office_name FROM staff 
              JOIN office ON staff.office_id = office.office_id  WHERE staff.office_id='4' AND staff.account_status='Active'";
        $result = mysqli_query($conn, $getsql);
                       if($result = mysqli_query($conn,$getsql)){
                          while ($row2 = mysqli_fetch_assoc($result)) {
                              $admin_id=$row2['staff_id'];
                          }
                        }

if (isset($_POST['datepicker'])){

	$historyPsychiatric='';
	$elemschool=$_POST['elementary_school'];
	$elemattend=$_POST['elementary_years'];
	$elemgrad=$_POST['elementary_graduated'];
	$secchool=$_POST['secondary_school'];
	$secattend=$_POST['secondary_years'];
	$secgrad=$_POST['secondary_graduated'];
	$terchool=$_POST['tertiary_school'];
	$terattend=$_POST['tertiary_years'];
	$parents_address= $_POST['parent_address'];
	$tergrad=$_POST['tertiary_graduated'];
	$otherchool=$_POST['others_school'];
	$otherattend=$_POST['others_years'];
	$othergrad=$_POST['others_graduated'];
	$historyPysical=$_POST['psyhistory'];
	$historyPsychiatric=$_POST['psychiahistory'];
	$q1=$_POST['pexperiencing'];
	$q2=$_POST['goal'];
	$q3=$_POST['drugs'];
	$q4=$_POST['behavioral_problems'];

	$q5=$_POST['crisis'];

	$checkq6_1=$_POST['currentluexperiencing1'];
	$checkq6_2=$_POST['currentluexperiencing2'];
	$checkq6_3=$_POST['currentluexperiencing3'];
	$checkq6_4=$_POST['currentluexperiencing4'];
	$checkq6_5=$_POST['currentluexperiencing5'];
	$checkq6_6=$_POST['currentluexperiencing6'];
	$checkq6_7=$_POST['currentluexperiencing7'];
	$checkq6_8=$_POST['currentluexperiencing8'];
	$checkq6_9=$_POST['currentluexperiencing9'];
	$checkq6_10=$_POST['currentluexperiencing10'];
	$checkq6_11=$_POST['currentluexperiencing11'];
	$checkq6_12=$_POST['currentluexperiencing12'];
	$checkq6_13=$_POST['currentluexperiencing13'];
	$checkq6_14=$_POST['currentluexperiencing14'];
	$modeoc=$_POST['type'];
	$q7= $_POST['Q7'];
	
    $sqlselect1="INSERT INTO `intake_form`(`intake_id`, `Student_id`, `intake_type`, `date_filed`,`elementary_school`, `elem_years_atendance`, `elem_year_graduated`, `secondary_school`, `sec_years_atendance`, `sec_year_graduated`, `tertiary_school`, `ter_years_atendance`, `ter_year_graduated`, `other_school`, `other_years_atendance`, `other_year_graduated`, `hhistory_physical`, `hhistory_psychiatric`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q7`,`parents_address`)VALUES (`intake_id`,'$id','$modeoc', now(),'$elemschool','$elemattend','$elemgrad','$secchool','$secattend','$secgrad','$terchool','$terattend','$tergrad','$otherchool','$otherattend','$othergrad','$historyPysical','$historyPsychiatric','$q1','$q2','$q3','$q4','$q5','$q7','$parents_address')";

    if ($conn->query($sqlselect1) === TRUE) {
	         	$apt_id = $conn->insert_id;

	 $sql="INSERT INTO `chk_intake_q6`(`chk_q6_id`, `intake_id`, `anxiousness`, `loneliness`, `guilt_shame`, `marital_distress`, `depression`, `despair`, `withdraw_form_others`, `parenting_struggles`, `anger`, `thoughts_of_suicide`, `confusion`, `fear`, `hurt`, `relational_stress`) VALUES (`chk_q6_id`,'$apt_id','$checkq6_1','$checkq6_2','$checkq6_3','$checkq6_4','$checkq6_5','$checkq6_6','$checkq6_7','$checkq6_8','$checkq6_9','$checkq6_10','$checkq6_11','$checkq6_12','$checkq6_13','$checkq6_14')"; 

	      if ($conn->query($sql) === TRUE) {
	  		echo "Record updated successfully";

	  		$result=mysqli_query($conn,"INSERT INTO notif(notif_id, user_id, message_body, _time, link, message_status) VALUES(NULL, '$admin_id', 'A new intake form was submitted.', now(), 'Guidance_NewForms.php', 'Delivered')");

                              if($result){
      echo "Record updated successfully";
    }else{
      echo "Record updated failed";
    }}

	} else {
 	 echo "Error updating record: " . $conn->error;
	}
	       $_SESSION['success'] = 'Schedule Set successfully';
	         header("Location: Guidance_Student_Counselling.php");
         
}

if (isset($_POST['schedule'])) {

	$appointment_date= date('Y-m-d',strtotime($_POST['appdate']));
	$appointment_time= date('H:i',strtotime($_POST['appdate']));
	$modeOfCommunication= $_POST['mode_of_communication'];
	$intake_id='';    
	    $sql="SELECT max(intake_id) as intakeid FROM intake_form where Student_id='$id'";
	         $query=$conn->query($sql);
	          while($sqlquery=$query->fetch_array()){
	          	$intake_id=$sqlquery['intakeid'];
	          }

		$sqlselect="INSERT INTO `guidance_appointments`(`appointment_id`,`date_filed`, `appointment_date`, `appointment_time`, `mode_id`, `status_id`) VALUES (appointment_id,now(), '$appointment_date','$appointment_time','$modeOfCommunication','2')";
	         if ($conn->query($sqlselect) === TRUE) {
	         	$apt_id = $conn->insert_id;

	        $sqlselect2="INSERT INTO `indv_counselling`(`counselling_id`, `appointment_id`, `intake_id`) VALUES ('counselling_id','$apt_id','$intake_id')"; 

	        if ($conn->query($sqlselect2) === TRUE) {
	  			  $result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, _time, link, message_status) values (notif_id,'$admin_id', 'A new counselling has been submitted.',now(),'Guidance_Counselling.php', 'Delivered')");

                              if($result){
      echo '<script>
        swal({
            title: "Schedule Has Been Set!",
            text: "Server Request Successful!",
            icon: "success",
            buttons: false,
            timer: 1800,
            closeOnClickOutside: false,
              closeOnEsc: false,
        })
      </script>';
    }else{
      echo '<script>
        swal({
          title: "Something went wrong...",
          text: "Server Request Failed!",
          icon: "error",
          buttons: false,
          timer: 1800,
          closeOnClickOutside: false,
          closeOnEsc: false,
        })
      </script>';
    }

	  			}
	} else {
 	 echo '<script>
        swal({
          title: "Something went wrong...",
          text: "Server Request Failed!",
          icon: "error",
          buttons: false,
          timer: 1800,
          closeOnClickOutside: false,
          closeOnEsc: false,
        })
      </script>';
	}
					 $_SESSION['right'] = 'Schedule Set successfully';
	         header("Location: Guidance_Student_Counselling.php");
}


 ?>

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
