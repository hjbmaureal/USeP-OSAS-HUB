<?php 
sleep(1);
include('../../conn.php');

// Filter Year

if (isset($_POST['year']) && isset($_POST['course'])) {
  $year=$_POST['year'];
  $course=$_POST['course'];
  if ($year=='all' && $course=='all') {
    $sql="SELECT eval_status,intake_form.Student_id as stud_id,intake_form.intake_id, student.*, course.name as course from intake_form 
                              join student on student.Student_id=intake_form.Student_id
                              join course on course.course_id=student.course_id
                              JOIN indv_counselling ON indv_counselling.intake_id=intake_form.intake_id GROUP BY intake_id";
  }if($year!='all' && $course=='all'){
  $sql="SELECT eval_status,intake_form.Student_id as stud_id,intake_form.intake_id, student.*, course.name as course from intake_form 
                              join student on student.Student_id=intake_form.Student_id
                              join course on course.course_id=student.course_id
                              JOIN indv_counselling ON indv_counselling.intake_id=intake_form.intake_id where student.year_level='$year' GROUP BY intake_id";
}if($year=='all' && $course!='all') {
  $sql="SELECT eval_status,intake_form.Student_id as stud_id,intake_form.intake_id, student.*, course.name as course from intake_form 
                              join student on student.Student_id=intake_form.Student_id
                              join course on course.course_id=student.course_id
                              JOIN indv_counselling ON indv_counselling.intake_id=intake_form.intake_id where student.course_id='$course' GROUP BY intake_id";
}if ($year!='all' && $course!='all') {
  $sql="SELECT eval_status,intake_form.Student_id as stud_id,intake_form.intake_id, student.*, course.name as course from intake_form 
                              join student on student.Student_id=intake_form.Student_id
                              join course on course.course_id=student.course_id
                              JOIN indv_counselling ON indv_counselling.intake_id=intake_form.intake_id where student.course_id='$course' and student.year_level='$year' GROUP BY intake_id" ;
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
                      <th>ID Number</th>
                      <th class="max">Student's Name</th>
                      <th>Course</th>
                      <th>Year and Section</th>
                      <th>Action</th>
                    </tr>
<?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                  </thead>
                  <tbody>
                    <?php 

                       if($result = mysqli_query($conn,$sql)){
                          while ($row2 = mysqli_fetch_assoc($result)) {

                                echo'<tr align="center">
                                  <td>'. $row2['stud_id'].'</td>
                                  <td>'. $row2['first_name'].' '. $row2['middle_name'].' '. $row2['last_name'].' '. $row2['suffix'].'</td>
                                  <td>'. $row2['course'].'</td>
                                  <td>'. $row2['year_level'].' - '. $row2['section'].'</td> 
                                  <td>';
                                  if(empty($row2['eval_status'])){?>
                                    <center><a class="btn btn-info btn-sm viewbutton" href="Guidance_Admin_StudRec.php?id=<?php echo $row2['stud_id'];?>"><i class="fas fa-eye"></i></a>&nbsp;
                                      <a class="btn btn-success btn-sm" href="setEvaluationStat.php?id=<?php echo $row2['intake_id'];?>">Enable Evaluation</a>
                                    </center>
                                  <?php }else{ ?>
                                   <center><a class="btn btn-info btn-sm viewbutton" href="Guidance_Admin_StudRec.php?id=<?php echo $row2['stud_id'];?>"><i class="fas fa-eye"></i></a>&nbsp;
                                      <a class="btn btn-warning btn-sm" href="setEvaluationStat.php?id2=<?php echo $row2['intake_id'];?>">Disable Evaluation</a>
                                    </center>
                                  <?php }?>
                                 </td></tr> <?php }
                              }
       ?> </tbody> </table>

  <?php }?>

  <!-- FEnd of Filter Year -->


<!-- Filter Course -->
<!-- End of Filter Course -->


<!-- Student Group Guidance-->

<!-- Filter Status -->

  <?php
  if (isset($_POST['requestStat'])) { 
  $requestStat=$_POST['requestStat'];
  if ($requestStat=='all') {
    $sql="SELECT group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance
                              join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id
                              join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id
                              join _status on _status.status_id=guidance_appointments.status_id
                              where guidance_appointments.status_id='4' or guidance_appointments.status_id='5'";
                $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
?>
 <table class="table table-hover table-bordered" id="groupTable">
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
                                 
                                  

                                </tr>';}
                              }


       ?> </tbody> </table>
  <?php }else{

    $sql="SELECT group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance
                              join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id
                              join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id
                              join _status on _status.status_id=guidance_appointments.status_id
                              where guidance_appointments.status_id='$requestStat'";
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
                                 
                                  

                                </tr>';}
                              }

        ?> </tbody> </table>
                      <?php
  }}?>

   <?php
  if (isset($_POST['from']) && isset($_POST['to'])) { 
  $from=$_POST['from'];
  $to=$_POST['to'];

    $sql="SELECT group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance
                              join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id
                              join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id
                              join _status on _status.status_id=guidance_appointments.status_id
                              where DATE_FORMAT(guidance_appointments.appointment_date, '%m') BETWEEN '$from' and '$to'";
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
                                 
                                  

                                </tr>';}
                              }

        ?> </tbody> </table>
                      <?php
  }?>

  <!-- End of Filter Status -->


 