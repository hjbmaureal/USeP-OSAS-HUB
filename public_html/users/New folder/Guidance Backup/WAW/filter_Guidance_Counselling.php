<?php 
sleep(1);
include('../../conn.php');
if (isset($_POST['course']) && isset($_POST['month']) && isset($_POST['status'])) {
  $course=$_POST['course'];
  $month = $_POST['month'];
  $status= $_POST['status'];

  if ($course=='all' && $month=='all' && $status=='all') {
    $sql="SELECT _status.status_id as statID, indv_counselling.counselling_id, indv_counselling.intake_id, indv_counselling.appointment_id, intake_form.Student_id, guidance_appointments.date_filed, guidance_appointments.appointment_date, guidance_appointments.appointment_time, student.first_name, student.middle_name, student.last_name, student.year_level, student.section, course.title, mode_of_communication.communication_mode, _status.status from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.status_id != '2' ORDER by statID DESC";

  }if ($course!='all' && $month=='all' && $status=='all') {
      $sql="SELECT student.course_id,_status.status_id as statID, indv_counselling.counselling_id, indv_counselling.intake_id, indv_counselling.appointment_id, intake_form.Student_id, guidance_appointments.date_filed, guidance_appointments.appointment_date, guidance_appointments.appointment_time, student.first_name, student.middle_name, student.last_name, student.year_level, student.section, course.title, mode_of_communication.communication_mode, _status.status from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.status_id != '2' and student.course_id='$course' ORDER by statID DESC";

  }if ($course=='all' && $month!='all' && $status=='all') {
      $sql="SELECT student.course_id,_status.status_id as statID, indv_counselling.counselling_id, indv_counselling.intake_id, indv_counselling.appointment_id, intake_form.Student_id, guidance_appointments.date_filed, guidance_appointments.appointment_date, guidance_appointments.appointment_time, student.first_name, student.middle_name, student.last_name, student.year_level, student.section, course.title, mode_of_communication.communication_mode, _status.status from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.status_id != '2' and DATE_FORMAT(guidance_appointments.date_filed,'%m') like '$month' ORDER by statID DESC";

  }if ($course=='all' && $month=='all' && $status!='all') {
       $sql="SELECT student.course_id,_status.status_id as statID, indv_counselling.counselling_id, indv_counselling.intake_id, indv_counselling.appointment_id, intake_form.Student_id, guidance_appointments.date_filed, guidance_appointments.appointment_date, guidance_appointments.appointment_time, student.first_name, student.middle_name, student.last_name, student.year_level, student.section, course.title, mode_of_communication.communication_mode, _status.status from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.status_id = '$status' ORDER by statID DESC";

  }if ($course!='all' && $month!='all' && $status=='all') {
    $sql="SELECT student.course_id,_status.status_id as statID, indv_counselling.counselling_id, indv_counselling.intake_id, indv_counselling.appointment_id, intake_form.Student_id, guidance_appointments.date_filed, guidance_appointments.appointment_date, guidance_appointments.appointment_time, student.first_name, student.middle_name, student.last_name, student.year_level, student.section, course.title, mode_of_communication.communication_mode, _status.status from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.status_id != '2' and DATE_FORMAT(guidance_appointments.date_filed,'%m') like '$month' and student.course_id='$course' ORDER by statID DESC";

  }if ($course!='all' && $month=='all' && $status!='all') {
    $sql="SELECT student.course_id,_status.status_id as statID, indv_counselling.counselling_id, indv_counselling.intake_id, indv_counselling.appointment_id, intake_form.Student_id, guidance_appointments.date_filed, guidance_appointments.appointment_date, guidance_appointments.appointment_time, student.first_name, student.middle_name, student.last_name, student.year_level, student.section, course.title, mode_of_communication.communication_mode, _status.status from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.status_id = '$status'  and student.course_id='$course' ORDER by statID DESC";

  }if ($course=='all' && $month!='all' && $status!='all') {
    $sql="SELECT student.course_id,_status.status_id as statID, indv_counselling.counselling_id, indv_counselling.intake_id, indv_counselling.appointment_id, intake_form.Student_id, guidance_appointments.date_filed, guidance_appointments.appointment_date, guidance_appointments.appointment_time, student.first_name, student.middle_name, student.last_name, student.year_level, student.section, course.title, mode_of_communication.communication_mode, _status.status from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.status_id = '$status' and DATE_FORMAT(guidance_appointments.date_filed,'%m') like '$month' ORDER by statID DESC";
  }if ($course!='all' && $month!='all' && $status!='all') {
    $sql="SELECT student.course_id,_status.status_id as statID, indv_counselling.counselling_id, indv_counselling.intake_id, indv_counselling.appointment_id, intake_form.Student_id, guidance_appointments.date_filed, guidance_appointments.appointment_date, guidance_appointments.appointment_time, student.first_name, student.middle_name, student.last_name, student.year_level, student.section, course.title, mode_of_communication.communication_mode, _status.status from indv_counselling LEFT join intake_form on indv_counselling.intake_id=intake_form.intake_id LEFT join student on intake_form.Student_id=student.Student_id LEFT join guidance_appointments on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join course on student.course_id = course.course_id LEFT join _status on guidance_appointments.status_id=_status.status_id where guidance_appointments.status_id = '$status' and DATE_FORMAT(guidance_appointments.date_filed,'%m') like '$month' and student.course_id='$course' ORDER by statID DESC";
  }
                $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
?>
<table class="table table-hover table-bordered" id="show-table">
  <?php 
      if ($count) {
            ?>
                  <thead>
                    <tr>
                    <th>Date Filed</th>
                    <th >ID Number</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year & Section</th>
                    <th>Mode of Communication</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
  <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                </thead>
                <tbody>
                    <?php
                     if($result = mysqli_query($conn, $sql)){
          while ($row = mysqli_fetch_assoc($result)) {

                                echo'<tr>
                                  <td>'. $row['date_filed'].'</td>
                                  <td>'. $row['Student_id'].'</td>
                                  <td>'. $row['first_name'].'  
                                  '. $row['last_name'].'</td> 
                                  <td>'. $row['title'].'</td>
                                  <td>'. $row['year_level'].'- 
                                  '. $row['section'].'</td>
                                  <td>'. $row['communication_mode'].'</td>
                                  <td>'. $row['status'].'</td>
                                  <td>';
                                    if ($row['statID']=='1') {
                                  ?>
                                  <a id="<?php echo $row['appointment_id']; ?>" type="button" class="btn btn-info btn-sm seebutton" data-id="<?php echo $row['appointment_id']; ?>" ><i class="fas fa-eye" aria-hidden="true" style="color:white;width:12px"></i></a>
                                  <button type="button" disabled="disabled" class="btn btn-warning btn-sm updatestatus" a id="<?php echo $row['appointment_id'];?>"  data-id="<?php echo $row['appointment_id']; ?>"><i class="fas fa-pencil-square-o" aria-hidden="true" style="color:white;width:12px"></i></button>
                                
                                <?php }else{ ?>
                                  <a id="<?php echo $row['appointment_id']; ?>" type="button" class="btn btn-info btn-sm seebutton" data-id="<?php echo $row['appointment_id']; ?>" ><i class="fas fa-eye" aria-hidden="true" style="color:white;width:12px"></i></a>
                                  <a id="<?php echo $row['appointment_id'];?>" type="button" class="btn btn-warning btn-sm updatestatus" data-id="<?php echo $row['appointment_id']; ?>" ><i class="fas fa-pencil-square-o" aria-hidden="true" style="color:white;width:12px"></i></a>
                                <?php }?>
                                  </td>
                                </tr><?php }}

       ?> </tbody> </table>

  <?php }

  ?><?php
 