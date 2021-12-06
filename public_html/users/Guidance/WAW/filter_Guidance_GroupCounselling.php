<?php 
sleep(1);
include('../../conn.php');
if (isset($_POST['course']) && isset($_POST['month']) && isset($_POST['status'])) {
  $course=$_POST['course'];
  $month = $_POST['month'];
  $status= $_POST['status'];

  if ($course=='all' && $month=='all' && $status=='all') {
    $sql="SELECT guidance_appointments.status_id as sid, guidance_appointments.appointment_date, guidance_appointments.appointment_time, guidance_appointments.date_completed, group_guidance.grp_guidance_id, group_guidance.topic, course.title, group_guidance.year_level, group_guidance.section, mode_of_communication.communication_mode, _status.status FROM mode_of_communication JOIN guidance_appointments ON mode_of_communication.mode_id=guidance_appointments.mode_id JOIN group_guidance ON guidance_appointments.appointment_id=group_guidance.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN _status ON guidance_appointments.status_id=_status.status_id ORDER by _status.status_id DESC";

  }if ($course!='all' && $month=='all' && $status=='all') {
      $sql="SELECT guidance_appointments.status_id as sid, guidance_appointments.appointment_date, guidance_appointments.appointment_time, guidance_appointments.date_completed, group_guidance.grp_guidance_id, group_guidance.topic, course.title, group_guidance.year_level, group_guidance.section, mode_of_communication.communication_mode, _status.status FROM mode_of_communication JOIN guidance_appointments ON mode_of_communication.mode_id=guidance_appointments.mode_id JOIN group_guidance ON guidance_appointments.appointment_id=group_guidance.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN _status ON guidance_appointments.status_id=_status.status_id WHERE group_guidance.course_id = '$course' ORDER by _status.status_id DESC";

  }if ($course=='all' && $month!='all' && $status=='all') {
       $sql="SELECT guidance_appointments.status_id as sid, guidance_appointments.appointment_date, guidance_appointments.appointment_time, guidance_appointments.date_completed, group_guidance.grp_guidance_id, group_guidance.topic, course.title, group_guidance.year_level, group_guidance.section, mode_of_communication.communication_mode, _status.status FROM mode_of_communication JOIN guidance_appointments ON mode_of_communication.mode_id=guidance_appointments.mode_id JOIN group_guidance ON guidance_appointments.appointment_id=group_guidance.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN _status ON guidance_appointments.status_id=_status.status_id WHERE DATE_FORMAT(guidance_appointments.appointment_date, '%m') like '$month' ORDER by _status.status_id DESC";

  }if ($course=='all' && $month=='all' && $status!='all') {
       $sql="SELECT guidance_appointments.status_id as sid, guidance_appointments.appointment_date, guidance_appointments.appointment_time, guidance_appointments.date_completed, group_guidance.grp_guidance_id, group_guidance.topic, course.title, group_guidance.year_level, group_guidance.section, mode_of_communication.communication_mode, _status.status FROM mode_of_communication JOIN guidance_appointments ON mode_of_communication.mode_id=guidance_appointments.mode_id JOIN group_guidance ON guidance_appointments.appointment_id=group_guidance.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN _status ON guidance_appointments.status_id=_status.status_id WHERE guidance_appointments.status_id = '$status' ORDER by _status.status_id DESC";

  }if ($course!='all' && $month!='all' && $status=='all') {
    $sql="SELECT guidance_appointments.status_id as sid, guidance_appointments.appointment_date, guidance_appointments.appointment_time, guidance_appointments.date_completed, group_guidance.grp_guidance_id, group_guidance.topic, course.title, group_guidance.year_level, group_guidance.section, mode_of_communication.communication_mode, _status.status FROM mode_of_communication JOIN guidance_appointments ON mode_of_communication.mode_id=guidance_appointments.mode_id JOIN group_guidance ON guidance_appointments.appointment_id=group_guidance.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN _status ON guidance_appointments.status_id=_status.status_id WHERE DATE_FORMAT(guidance_appointments.appointment_date, '%m') like '$month' and group_guidance.course_id = '$course' ORDER by _status.status_id DESC";

  }if ($course!='all' && $month=='all' && $status!='all') {
    $sql="SELECT guidance_appointments.status_id as sid, guidance_appointments.appointment_date, guidance_appointments.appointment_time, guidance_appointments.date_completed, group_guidance.grp_guidance_id, group_guidance.topic, course.title, group_guidance.year_level, group_guidance.section, mode_of_communication.communication_mode, _status.status FROM mode_of_communication JOIN guidance_appointments ON mode_of_communication.mode_id=guidance_appointments.mode_id JOIN group_guidance ON guidance_appointments.appointment_id=group_guidance.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN _status ON guidance_appointments.status_id=_status.status_id WHERE guidance_appointments.status_id = '$status' and group_guidance.course_id = '$course' ORDER by _status.status_id DESC";

  }if ($course=='all' && $month!='all' && $status!='all') {
    $sql="SELECT guidance_appointments.status_id as sid, guidance_appointments.appointment_date, guidance_appointments.appointment_time, guidance_appointments.date_completed, group_guidance.grp_guidance_id, group_guidance.topic, course.title, group_guidance.year_level, group_guidance.section, mode_of_communication.communication_mode, _status.status FROM mode_of_communication JOIN guidance_appointments ON mode_of_communication.mode_id=guidance_appointments.mode_id JOIN group_guidance ON guidance_appointments.appointment_id=group_guidance.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN _status ON guidance_appointments.status_id=_status.status_id WHERE guidance_appointments.status_id = '$status' and DATE_FORMAT(guidance_appointments.appointment_date, '%m') like '$month' ORDER by _status.status_id DESC";

  }if ($course!='all' && $month!='all' && $status!='all') {
    $sql="SELECT guidance_appointments.status_id as sid, guidance_appointments.appointment_date, guidance_appointments.appointment_time, guidance_appointments.date_completed, group_guidance.grp_guidance_id, group_guidance.topic, course.title, group_guidance.year_level, group_guidance.section, mode_of_communication.communication_mode, _status.status FROM mode_of_communication JOIN guidance_appointments ON mode_of_communication.mode_id=guidance_appointments.mode_id JOIN group_guidance ON guidance_appointments.appointment_id=group_guidance.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN _status ON guidance_appointments.status_id=_status.status_id WHERE guidance_appointments.status_id = '$status' and group_guidance.course_id = '$course' and DATE_FORMAT(guidance_appointments.appointment_date, '%m') like '$month' ORDER by _status.status_id DESC";
  }
                $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
?>
<table class="table table-hover table-bordered" id="sampleTable">
  <?php 
      if ($count) {
            ?>
                    <thead>
                      <tr>
                      <th width="5%;">Date of Counselling</th>
                      <th>Time</th>
                      <th>Purpose/Topic</th>
                      <th>Participants</th>
                      <th>Mode of Communication</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
    <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                  </thead>
                  <tbody>
                    <?php
                      if($result = mysqli_query($conn, $sql)){
                      
                      while($row = $result->fetch_assoc()) {
                          $section=$row['section']; $year_level=$row['year_level'];
                        if ($section=='all') {
                          $section='';
                        }if ($year_level=='all') {
                          $year_level='';
                        }
                    ?>
                    <tr>
                      <td> <?php echo htmlentities($row['appointment_date']);?></td>
                      <td><?php echo htmlentities($row['appointment_time']);?></td>
                      <td><?php echo htmlentities($row['topic']);?></td>
                      <td><?php echo htmlentities($row['title']);?>&nbsp;<?php echo htmlentities($year_level);?>&nbsp;<?php echo htmlentities($section);?></td>
                      <td><?php echo htmlentities($row['communication_mode']);?></td>
                      <td><?php echo htmlentities($row['status']);?>&nbsp;<?php echo htmlentities($row['date_completed']);?></td>
                      <td><center><!-- <a href="#list<?php// echo $row['grp_guidance_id']; ?>" class="btn btn-info btn-sm viewbutton" data-toggle="modal" style="width:35px;"><i class="fa fa-eye"></i></a><?php //include('participant-modal.php');?>&nbsp; | &nbsp; -->
                      <?php if ($row['sid']=='1') { ?>
                       <button disabled="disabled" class="btn btn-warning btn-sm updatebutton" ><i class="fa fa-pencil-square-o"></i></button>
                      <?php }else{ ?>
                      <a href="#statt<?php echo $row['grp_guidance_id']; ?>" class="btn btn-warning btn-sm updatebutton" data-toggle="modal"><i class="fa fa-pencil-square-o"></i></a><?php include('Guidance_group_stat_up-modal.php'); }?>
                      </center></td>
                    </tr>

                    <?php
                      }}

       ?> </tbody> </table>

  <?php }

  ?><?php
 