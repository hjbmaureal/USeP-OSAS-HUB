<script type="text/javascript" src="jsg/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="jsg/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
      $('#student-table').DataTable();
    </script>

<?php 
sleep(1);
session_start();
include('conn.php');
    $id=$_SESSION['id'];


  if (isset($_POST['from']) && isset($_POST['to']) && isset($_POST['status'])) { 
  $from=$_POST['from'];
  $to=$_POST['to'];
  $status=$_POST['status'];
  if ($from=='from' || $to=='to') {
      $sql="SELECT group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id JOIN participants on participants.grp_guidance_id=group_guidance.grp_guidance_id join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id join _status on _status.status_id=guidance_appointments.status_id WHERE participants.Student_id='$id'";
    
  }if ($from=='from' && $to!='to' && $status!='all') {
        $sql="SELECT participants.attendance, group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id JOIN participants on participants.grp_guidance_id=group_guidance.grp_guidance_id join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id join _status on _status.status_id=guidance_appointments.status_id WHERE participants.Student_id='$id'";
  }if ($from!='from' && $to=='to' && $status!='all') {
          $sql="SELECT participants.attendance, group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id JOIN participants on participants.grp_guidance_id=group_guidance.grp_guidance_id join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id join _status on _status.status_id=guidance_appointments.status_id WHERE participants.Student_id='$id'";

  }if ($from=='from' && $to!='to' && $status='all') {
          $sql="SELECT participants.attendance, group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id JOIN participants on participants.grp_guidance_id=group_guidance.grp_guidance_id join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id join _status on _status.status_id=guidance_appointments.status_id WHERE participants.Student_id='$id'";

  }if ($from!='from' && $to=='to' && $status='all') {
          $sql="SELECT participants.attendance, group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id JOIN participants on participants.grp_guidance_id=group_guidance.grp_guidance_id join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id join _status on _status.status_id=guidance_appointments.status_id WHERE participants.Student_id='$id'";

  }
  if ($from=='from' && $to=='to' && $status!='all') {
    $sql="SELECT participants.attendance, group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id JOIN participants on participants.grp_guidance_id=group_guidance.grp_guidance_id join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id join _status on _status.status_id=guidance_appointments.status_id WHERE participants.Student_id='$id' and guidance_appointments.status_id='$status'";
    
  }if ($from!='from' && $to!='to' && $status=='all') {
     $sql="SELECT participants.attendance, group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id JOIN participants on participants.grp_guidance_id=group_guidance.grp_guidance_id join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id join _status on _status.status_id=guidance_appointments.status_id WHERE participants.Student_id='$id' and DATE_FORMAT(guidance_appointments.appointment_date, '%m') BETWEEN '$from' and '$to'";
  }if ($from!='from' && $to!='to' && $status!='all') {
    $sql="SELECT participants.attendance, group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id JOIN participants on participants.grp_guidance_id=group_guidance.grp_guidance_id join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id join _status on _status.status_id=guidance_appointments.status_id WHERE participants.Student_id='$id' and DATE_FORMAT(guidance_appointments.appointment_date, '%m') BETWEEN '$from' and '$to' and guidance_appointments.status_id='$status'";
  }

   
                $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
?>
    <table class="table table-hover table-bordered" id="student-table">
    <?php 
      if($count){
            ?>
                    <thead>
                     <tr align="center">
                      <th>Date </th>
                      <th>Time</th>
                      <th class="max">Purpose/Topic</th>                      
                      <th class="max">Mode of Communication</th>
                      <th >Status</th>
                      <th >Attendance</th>
                    </tr>
<?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                  </thead>
                  <tbody>
                    <?php
                     if($result = mysqli_query($conn,$sql)){
                          while ($row2 = mysqli_fetch_assoc($result)) {

                                echo'<tr align="center">
                                  <td>'. $row2['appointment_date'].'</td>
                                  <td>'. $row2['appointment_time'].'</td>
                                  <td>'. $row2['topic'].'</td>
                                  <td>'. $row2['mode'].'</td> 
                                  <td>'. $row2['status'].'</td>
                                  <td>'. $row2['attendance'].'</td>
                                 
                                  

                                </tr>';}
                              }

        ?> </tbody> </table>
<?php
  }?>

<script type="text/javascript">
  
$('#student-table').DataTable();
  
</script>

  <!-- End of Filter Status -->


 