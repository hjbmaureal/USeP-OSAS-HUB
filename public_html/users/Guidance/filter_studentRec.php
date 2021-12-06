
<?php 
sleep(1);
include('conn.php');
if (isset($_POST['student_id']) && isset($_POST['month']) && isset($_POST['status'])) {
  $student_id=$_POST['student_id'];
  $month = $_POST['month'];
  $status= $_POST['status'];

  if ($month=='all' && $status=='all') {
    $sql="SELECT intake_form.*, indv_counselling.*, guidance_appointments.*, _status.status, mode_of_communication.communication_mode as mode from intake_form
                                join indv_counselling on indv_counselling.intake_id= intake_form.intake_id
                                join guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id 
                                join _status on _status.status_id=guidance_appointments.status_id 
                                join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id where intake_form.Student_id='$student_id'";

  }if ($month!='all' && $status=='all') {
      $sql="SELECT intake_form.*, indv_counselling.*, guidance_appointments.*, _status.status, mode_of_communication.communication_mode as mode from intake_form
                                join indv_counselling on indv_counselling.intake_id= intake_form.intake_id
                                join guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id 
                                join _status on _status.status_id=guidance_appointments.status_id 
                                join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id where intake_form.Student_id='$student_id' and DATE_FORMAT(guidance_appointments.appointment_date,'%m') like '$month'";

  }if ($month!='all' && $status!='all') {
       $sql="SELECT intake_form.*, indv_counselling.*, guidance_appointments.*, _status.status, mode_of_communication.communication_mode as mode from intake_form
                                join indv_counselling on indv_counselling.intake_id= intake_form.intake_id
                                join guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id 
                                join _status on _status.status_id=guidance_appointments.status_id 
                                join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id where intake_form.Student_id='$student_id' and DATE_FORMAT(guidance_appointments.appointment_date,'%m') like '$month' and _status.status_id='$status'";

  }if ($month=='all' && $status!='all') {
       $sql="SELECT intake_form.*, indv_counselling.*, guidance_appointments.*, _status.status, mode_of_communication.communication_mode as mode from intake_form join indv_counselling on indv_counselling.intake_id= intake_form.intake_id join guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id join _status on _status.status_id=guidance_appointments.status_id join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id where intake_form.Student_id='$student_id' and _status.status_id='$status'";

  }
                $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
?>
 <table class="table table-hover table-bordered" id="counselling-table">
  <?php 
      if ($count) {
            ?>
                    <thead>
                      <tr>
                      <th>Date Filed</th>
                      <th>Status</th>
                      <th>Date Completed</th>
                      <th class="max">Mode of Communication</th>
                      <th>Evaluation</th>
                    </tr>
    <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                  </thead>
                  <tbody>
                    <?php
                      if($result = mysqli_query($conn, $sql)){
                      
                      while($row2 = $result->fetch_assoc()) {
                           echo '<tr>
                                  <td>'. $row2['date_filed'].'</td>
                                  <td>'. $row2['status'].'</td>
                                  <td>'. $row2['date_completed'].'</td>
                                  <td>'. $row2['mode'].'</td> 
                                  <td>'. $row2['remarks'].'</td>
                                 
                                  

                                </tr>';
                      }}

       ?> </tbody> </table>

  <?php }

  ?><?php
