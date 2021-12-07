<?php 
session_start();
include('../../conn.php');
if (isset($_POST['updatebut'])) {
	$id=$_POST['id'];
	$stud_id=$_POST['stud_id'];
	$mode=$_POST['mode'];
	$date=date('Y-m-d',strtotime($_POST['date']));
	$time=$_POST['time'];
	
          $sqlUpdate="UPDATE `guidance_appointments` SET `mode_id`='$mode',`appointment_date`='$date',`appointment_time`='$time' WHERE guidance_appointments.appointment_id='$id'";
         $prorow3=$conn->query($sqlUpdate);
         ?>
         <?php
            newNotif($conn,$stud_id);
           $_SESSION['success'] = 'Appointment updated successfully';
         header('location: Guidance_Appointment.php');
}else{echo "ERROR";}

function newNotif($conn,$stud_id){

                        $result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, time, link, message_status) values (notif_id,'$stud_id', 'The guidance sets a new appointment schedule with you.',now(),'Guidance_Student_Counselling.php', 'Delivered')");

                              if($result){
                                echo '<script>
                                    alert("Succesful");
                                  </script>';
                              }else{
                                echo '<script>
                                      alert("Failed");
                                    </script>';
                              }
                    }
            ?>