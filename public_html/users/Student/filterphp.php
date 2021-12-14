<script type="text/javascript" src="jsg/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="jsg/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#reports-table').DataTable();</script>
      <?php 
sleep(1);
session_start();
include('conn.php');



 if (!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Student'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
$id=$_SESSION['id'];
if (isset($_POST['status']) && isset($_POST['mode'])) 
{
  $status= $_POST['status'];
  $mode = $_POST['mode'];
  if ($mode=='all' && $status=='all') {
    $sql="SELECT student.Student_id,guidance_appointments.date_filed as a, intake_form.intake_type as b, mode_of_communication.communication_mode as c, guidance_appointments.appointment_date as d, guidance_appointments.appointment_time as e, _status.status as f, guidance_appointments.date_completed as g 
            FROM guidance_appointments 
            LEFT JOIN indv_counselling ON guidance_appointments.appointment_id=indv_counselling.appointment_id 
            LEFT JOIN intake_form ON intake_form.intake_id=indv_counselling.intake_id 
            LEFT JOIN student ON student.Student_id=intake_form.Student_id 
            left JOIN mode_of_communication ON guidance_appointments.mode_id=mode_of_communication.mode_id 
            left JOIN _status ON guidance_appointments.status_id=_status.status_id where student.Student_id='$id'";
    
  }if ($mode!='all' && $status=='all') {
   
  $sql="SELECT student.Student_id,guidance_appointments.date_filed as a, intake_form.intake_type as b, mode_of_communication.communication_mode as c, guidance_appointments.appointment_date as d, guidance_appointments.appointment_time as e, _status.status as f, guidance_appointments.date_completed as g 
            FROM guidance_appointments 
            LEFT JOIN indv_counselling ON guidance_appointments.appointment_id=indv_counselling.appointment_id 
            LEFT JOIN intake_form ON intake_form.intake_id=indv_counselling.intake_id 
            LEFT JOIN student ON student.Student_id=intake_form.Student_id 
            left JOIN mode_of_communication ON guidance_appointments.mode_id=mode_of_communication.mode_id 
            left JOIN _status ON guidance_appointments.status_id=_status.status_id where student.Student_id='$id' and guidance_appointments.mode_id='$mode'";
  }if ($mode=='all' && $status!='all') {
    $sql="SELECT student.Student_id,guidance_appointments.date_filed as a, intake_form.intake_type as b, mode_of_communication.communication_mode as c, guidance_appointments.appointment_date as d, guidance_appointments.appointment_time as e, _status.status as f, guidance_appointments.date_completed as g 
            FROM guidance_appointments 
            LEFT JOIN indv_counselling ON guidance_appointments.appointment_id=indv_counselling.appointment_id 
            LEFT JOIN intake_form ON intake_form.intake_id=indv_counselling.intake_id 
            LEFT JOIN student ON student.Student_id=intake_form.Student_id 
            left JOIN mode_of_communication ON guidance_appointments.mode_id=mode_of_communication.mode_id 
            left JOIN _status ON guidance_appointments.status_id=_status.status_id where student.Student_id='$id' and guidance_appointments.status_id='$status'";
  }if ($mode!='all' && $status!='all') {

  $sql="SELECT student.Student_id,guidance_appointments.date_filed as a, intake_form.intake_type as b, mode_of_communication.communication_mode as c, guidance_appointments.appointment_date as d, guidance_appointments.appointment_time as e, _status.status as f, guidance_appointments.date_completed as g FROM guidance_appointments LEFT JOIN indv_counselling ON guidance_appointments.appointment_id=indv_counselling.appointment_id LEFT JOIN intake_form ON intake_form.intake_id=indv_counselling.intake_id LEFT JOIN student ON student.Student_id=intake_form.Student_id left JOIN mode_of_communication ON guidance_appointments.mode_id=mode_of_communication.mode_id left JOIN _status ON guidance_appointments.status_id=_status.status_id where student.Student_id='$id' and guidance_appointments.mode_id='$mode' and guidance_appointments.status_id='$status'";
    
  } 
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);

 ?>
 
  <table class="table table-hover table-bordered" id="reports-table">
    <?php 
      if ($count) {
        
      
     ?>
            <thead>
                      <tr>
                      <th>Date Filed</th>
                      <th class="max">Mode of Communication</th>                      
                      <th class="max">Date and Time of Appointment</th>
                      <th >Status</th>
                      <th class="max">Date Completed</th>
                    </tr>
     <?php }else{ echo "SORRY! No Record Found";} ?>
                  </thead>
                  <tbody>
                    <?php 
                      while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                                  <td><?php echo $row['a'] ?></td>
                                  <td><?php echo $row['c']; ?></td> 
                                  <td><?php echo $row['d'].' '.$row['e']; ?></td>
                                  <td><?php echo $row['f'];?></td>
                                  <td><?php echo$row['g']; ?></td>
                                 </tr>
                                  <?php
                                        
                                   ?>
                 <?php } ?> </tbody> </table>
<?php } ?>


<script type="text/javascript">
  
$('#reports-table').DataTable();
  
</script>