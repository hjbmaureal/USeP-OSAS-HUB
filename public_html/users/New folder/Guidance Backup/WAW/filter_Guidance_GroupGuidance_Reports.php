<?php 
sleep(1);
include('../../conn.php');
if (isset($_POST['from']) && isset($_POST['to'])) {
  $from = $_POST['from'];
  $to = $_POST['to'];
  $sql="SELECT group_guidance.grp_guidance_id, group_guidance.course_id, group_guidance.year_level, group_guidance.section, group_guidance.topic, guidance_appointments.appointment_date, guidance_appointments.appointment_time, course.title, mode_of_communication.communication_mode FROM group_guidance JOIN guidance_appointments ON group_guidance.appointment_id=guidance_appointments.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id WHERE guidance_appointments.status_id='1' and DATE_FORMAT(guidance_appointments.appointment_date,'%m') BETWEEN '$from' and '$to'";
                $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
?>
<table class="table table-hover table-bordered" id="sampleTable2">
  <?php 
      if ($count) {
            ?>
                    <thead>
                      <tr>
                      <th>Faculty Name</th>
                      <th>Student Referred</th>
                      <th class="max">Date Received</th>
                      <th class="max">Date Completed</th>
                    </tr>
  <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                  </thead>
                  <tbody>
                    <?php
                      if($result = mysqli_query($conn, $sql)){
          while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                      <td><?php echo htmlentities($row['appointment_date']);?>&nbsp; | &nbsp;<?php echo htmlentities($row['appointment_time']);?></td>
                      <td><?php echo htmlentities($row['topic']);?></td>
                      <td><?php echo htmlentities($row['communication_mode']);?></td>
                      <td><?php echo htmlentities($row['title']);?>&nbsp;<?php echo htmlentities($row['section']);?>&nbsp;<?php echo htmlentities($row['year_level']);?></td>
                      <td><center><a href="#list<?php echo $row['grp_guidance_id']; ?>" class="btn btn-info btn-sm viewbutton" data-toggle="modal" style="width:35px;"><i class="fa fa-eye"></i></a><?php include('participant-modal.php');?>
                      </center></td>
                    </tr>

  <?php } ?> </tbody></table>
<?php } }
  ?>
 