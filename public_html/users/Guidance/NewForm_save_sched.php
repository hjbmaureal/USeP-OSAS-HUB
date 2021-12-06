<?php
include('conn.php');
 if(isset($_POST['submit'])){
                      $appointment_id = $_POST['appointment_id'];
                      $intake_id = $_POST['intake_id'];
                      $newDate = $_POST['appointment_date'];
                      $newTime = $_POST['appointment_time'];
                      $status_id = $_POST['status_id'];
                      $student_id = $_POST['student_id'];

                      $query = "UPDATE guidance_appointments SET appointment_date = '$newDate', appointment_time = '$newTime', status_id = '$status_id' WHERE appointment_id = '$appointment_id'";

                      if(mysqli_query($conn,$query)){
                      		/* newNotif($conn,$student_id);*/
                          $_SESSION['success']=$student_id;
                          header('location: Guidance_NewForms.php');
                        }else{
                          echo "error";
                        }
                    }
      ?>
