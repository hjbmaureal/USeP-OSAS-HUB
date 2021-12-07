<?php 
sleep(1);
include('conn.php');
if (isset($_POST['status']) && isset($_POST['month']) && isset($_POST['position'])) 
{
  $status=$_POST['status'];
  $month=$_POST['month'];
  $position=$_POST['position'];
  if ($status=='all' && $month=='all' && $position=='all') {
    $sql=mysqli_query($conn,"SELECT  _status.status_id as statID, referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, staff.first_name as fname, staff.last_name as lname, staff.position,_status.status from referral_form join staff USING (staff_id) join _status USING (status_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id !='2' order by status_id desc");

  }if ($status!='all' && $month=='all' && $position=='all') {
    $sql=mysqli_query($conn,"SELECT  _status.status_id as statID, referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, staff.first_name as fname, staff.last_name as lname, staff.position,_status.status from referral_form join staff USING (staff_id) join _status USING (status_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id ='$status' order by status_id desc");
    
  }if ($status=='all' && $month!='all' && $position=='all') {
   $sql=mysqli_query($conn,"SELECT  _status.status_id as statID, referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, staff.first_name as fname, staff.last_name as lname, staff.position,_status.status from referral_form join staff USING (staff_id) join _status USING (status_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id !='2' and DATE_FORMAT(referral_form.date_filed,'%m') like '$month' order by status_id desc");
    
  }if ($status=='all' && $month=='all' && $position!='all') {
  $sql=mysqli_query($conn,"SELECT _status.status_id as statID, referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, staff.first_name as fname, staff.last_name as lname, staff.position,_status.status from referral_form join staff USING (staff_id) join _status USING (status_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id !='2' and LOWER(staff.position) LIKE LOWER('%".$position."%') order by status_id desc");
    
  }if ($status!='all' && $month!='all' && $position=='all') {
   $sql=mysqli_query($conn,"SELECT  _status.status_id as statID, referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, staff.first_name as fname, staff.last_name as lname, staff.position,_status.status from referral_form join staff USING (staff_id) join _status USING (status_id) where referral_form.staff_id = staff.staff_id AND DATE_FORMAT(referral_form.date_filed,'%m') like '$month' AND referral_form.status_id ='$status' order by status_id desc");
    
  }if ($status!='all' && $month=='all' && $position!='all') {
   $sql=mysqli_query($conn,"SELECT  _status.status_id as statID, referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, staff.first_name as fname, staff.last_name as lname, staff.position,_status.status from referral_form join staff USING (staff_id) join _status USING (status_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id ='$status' and LOWER(staff.position) LIKE LOWER('%".$position."%') order by status_id desc");
    
  }if ($status=='all' && $month!='all' && $position!='all') {
   $sql=mysqli_query($conn,"SELECT  _status.status_id as statID, referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, staff.first_name as fname, staff.last_name as lname, staff.position,_status.status from referral_form join staff USING (staff_id) join _status USING (status_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id !='2' and DATE_FORMAT(referral_form.date_filed,'%m') like '$month' and LOWER(staff.position) LIKE LOWER('%".$position."%') order by status_id desc");
    
  }if ($status!='all' && $month!='all' && $position!='all') {
   $sql=mysqli_query($conn,"SELECT  _status.status_id as statID, referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, staff.first_name as fname, staff.last_name as lname, staff.position,_status.status from referral_form join staff USING (staff_id) join _status USING (status_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id ='$status' and DATE_FORMAT(referral_form.date_filed,'%m') like '$month' and LOWER(staff.position) LIKE LOWER('%".$position."%') order by status_id desc");
    
  }
          $count=mysqli_num_rows($sql);
  
?>
 <table class="table table-hover table-bordered" id="reports-table">
  <?php 
      if ($count) {
            ?>
                    <thead>
                      <tr>
                      <th>Date Filed</th>
                      <th>ID Number</th>
                      <th class="max">Name</th>
                      <th>Position/Designation</th>
                      <th>Status of Referral</th>
                      <th>Date Completed</th>
                      <th >Action</th>
                    </tr>
  <?php }else{ echo "SORRY! no record found";} ?>
                  </thead>
                  <tbody>
                    <?php
                   while($row = mysqli_fetch_array($sql)) { ?>  

                                  <tr>
                                  <td><?php echo $row['date_filed'];?></td>
                                  <td><?php echo $row['staff_id']; ?></td>
                                  <td><?php echo $row['fname'].'  
                                  '. $row['lname'];?></td> 
                                  <td><?php echo $row['position']; ?></td>
                                  <td><?php echo $row['status']; ?></td>
                                  <td><?php echo $row['refdate_completed']; ?></td>
                                  <td>
                                    <?php 
                                      if ($row['statID']=='1') {
                                    ?>
                                  <button  class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" a href="#details<?php echo $row['referral_id']; ?>"><i class="fas fa-eye" style="color:white;width:13px"></i></button>
                                  <button type="button" disabled="disabled" class="btn btn-warning btn-sm editbutton" a id="<?php echo $row['referral_id']; ?>"  data-id="<?php echo $row['referral_id']; ?>" ><i class="fas fa-pencil-square-o" style="color:white;width:13px"></i></button>
                                  &nbsp;
                                  <?php include('Guidance_Referral_View_Modal.php'); ?>
                                <?php }else{?>
                                  <button  class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" a href="#details<?php echo $row['referral_id']; ?>"><i class="fas fa-eye" style="color:white;width:13px"></i></button>
                                  <a id="<?php echo $row['referral_id']; ?>" type="button" class="btn btn-warning btn-sm editbutton" data-id="<?php echo $row['referral_id']; ?>" ><i class="fas fa-pencil-square-o" style="color:white;width:13px"></i></a>&nbsp;
                                  <?php include('Guidance_Referral_View_Modal.php'); ?>
                                <?php } ?>
                                </td>
                                </tr>
                            <?php }
  } 

//Month and Year Filter 

if (isset($_POST['grrfrom']) && isset($_POST['grrto']) && isset($_POST['fromyear']) && isset($_POST['toyear'])) {
  $from=$_POST['grrfrom'];
  $to = $_POST['grrto'];
  $fromyr = $_POST['fromyear'];
  $toyr = $_POST['toyear'];

  if ($from == 'from' && $to=='to' && $fromyr == '' && $toyr=='') {
     $sql="SELECT referral_form.referral_id, referral_form.staff_id,staff.first_name as f_name,staff.last_name as l_name, referral_form.date_filed, referral_form.refdate_completed, student.first_name, student.last_name, _status.status from referral_form join student USING (Student_id) join staff USING(staff_id) join _status USING(status_id) where _status.status_id = '1'";
  }if($from != '$from' && $to!='$to' && $fromyr != '$fromyr' && $toyr!='$toyr'){
  $sql="SELECT referral_form.referral_id, referral_form.staff_id,staff.first_name as f_name,staff.last_name as l_name, referral_form.date_filed, referral_form.refdate_completed, student.first_name, student.last_name, _status.status from referral_form join student USING (Student_id) join staff USING(staff_id) join _status USING(status_id) where _status.status_id = '1' AND DATE_FORMAT(referral_form.refdate_completed,'%m') BETWEEN '$from' and '$to' AND DATE_FORMAT(referral_form.refdate_completed,'%Y') BETWEEN '$fromyr' and '$toyr'";
}if($from != '$from' && $to!='$to' && $fromyr == '' && $toyr==''){
  $sql="SELECT referral_form.referral_id, referral_form.staff_id,staff.first_name as f_name,staff.last_name as l_name, referral_form.date_filed, referral_form.refdate_completed, student.first_name, student.last_name, _status.status from referral_form join student USING (Student_id) join staff USING(staff_id) join _status USING(status_id) where _status.status_id = '1' AND DATE_FORMAT(referral_form.refdate_completed,'%m') BETWEEN '$from' and '$to'";
}if($from == 'from' && $to=='to' && $fromyr != '$fromyr' && $toyr!='$toyr'){
  $sql="SELECT referral_form.referral_id, referral_form.staff_id,staff.first_name as f_name,staff.last_name as l_name, referral_form.date_filed, referral_form.refdate_completed, student.first_name, student.last_name, _status.status from referral_form join student USING (Student_id) join staff USING(staff_id) join _status USING(status_id) where _status.status_id = '1' AND DATE_FORMAT(referral_form.refdate_completed,'%Y') BETWEEN '$fromyr' and '$toyr'";
}
  $result = mysqli_query($conn, $sql);
  $count=mysqli_num_rows($result); ?>
  <table class="data-table" id="reports-table" cellpadding="10px">
      <?php 
      if ($count) {
            ?>
                    <thead align="center">
                      <tr >
                      <th width="20%">Faculty Name</th>
                      <th width="20%">Student Referred</th>
                      <th width="25%">Date Received</th>
                      <th cwidth="30%">Date Completed</th>
                    </tr>
      <?php }else{ echo "SORRY! no record found";} ?>
                  </thead>
                  <tbody>
                    <?php
                   if($result = mysqli_query($conn, $sql)){
          while ($row = mysqli_fetch_assoc($result)) {

                                echo'<tr align="center">
                                  
                                  <td>'. $row['f_name'].' '.$row['l_name'].'</td>
                                  <td>'. $row['first_name'].'  
                                  '. $row['last_name'].'</td>
                                  <td>'. $row['date_filed'].'</td> 
                                  <td>'. $row['refdate_completed'].'</td>
                                </tr>';}}?>
  </tbody>
                  </table>
  
<?php }


//Group Guidance Month and Year Filter

if (isset($_POST['from']) && isset($_POST['to']) && isset($_POST['fromyear']) && isset($_POST['toyear'])) {
  $from2=$_POST['from'];
  $to2 = $_POST['to'];
  $fromyr2 = $_POST['fromyear'];
  $toyr2 = $_POST['toyear'];

  if ($from2 == 'all' && $to2=='all' && $fromyr2 == '' && $toyr2=='') {
     $sql="SELECT group_guidance.grp_guidance_id, group_guidance.course_id, group_guidance.year_level, group_guidance.section, group_guidance.topic, guidance_appointments.appointment_date, guidance_appointments.appointment_time, course.title, mode_of_communication.communication_mode FROM group_guidance JOIN guidance_appointments ON group_guidance.appointment_id=guidance_appointments.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id WHERE guidance_appointments.status_id='1'";
  }if($from2 != '$from2' && $to2!='$to2' && $fromyr2 != '$fromyr2' && $toyr2!='$toyr2'){
  $sql="SELECT group_guidance.grp_guidance_id, group_guidance.course_id, group_guidance.year_level, group_guidance.section, group_guidance.topic, guidance_appointments.appointment_date, guidance_appointments.appointment_time, course.title, mode_of_communication.communication_mode FROM group_guidance JOIN guidance_appointments ON group_guidance.appointment_id=guidance_appointments.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id WHERE guidance_appointments.status_id='1' AND DATE_FORMAT(guidance_appointments.appointment_date,'%m') BETWEEN '$from2' and '$to2' AND DATE_FORMAT(guidance_appointments.appointment_date,'%Y') BETWEEN '$fromyr2' and '$toyr2'";
}if($from2 != '$from2' && $to2!='$to2' && $fromyr2 == '' && $toyr2 ==''){
  $sql="SELECT group_guidance.grp_guidance_id, group_guidance.course_id, group_guidance.year_level, group_guidance.section, group_guidance.topic, guidance_appointments.appointment_date, guidance_appointments.appointment_time, course.title, mode_of_communication.communication_mode FROM group_guidance JOIN guidance_appointments ON group_guidance.appointment_id=guidance_appointments.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id WHERE guidance_appointments.status_id='1' AND DATE_FORMAT(guidance_appointments.appointment_date,'%m') BETWEEN '$from2' and '$to2'";
}if($from2 == 'all' && $to2=='all' && $fromyr2 != '$fromyr2' && $toyr2!='$toyr2'){
  $sql="SELECT group_guidance.grp_guidance_id, group_guidance.course_id, group_guidance.year_level, group_guidance.section, group_guidance.topic, guidance_appointments.appointment_date, guidance_appointments.appointment_time, course.title, mode_of_communication.communication_mode FROM group_guidance JOIN guidance_appointments ON group_guidance.appointment_id=guidance_appointments.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id WHERE guidance_appointments.status_id='1' AND DATE_FORMAT(guidance_appointments.appointment_date,'%Y') BETWEEN '$fromyr2' and '$toyr2'";
}

 $result = mysqli_query($conn, $sql);
  $count=mysqli_num_rows($result); ?>
  <table class="data-table" id="reports-table" cellpadding="10px">
      <?php 
      if ($count) {
            ?>
                    <thead align="center">
                      <tr>
                      <th>Date|Time</th>
                      <th>Purpose/Topic</th>
                      <th>Mode of Communication</th>
                      <th>Participants</th>
                      <th>Action</th>
                    </tr>
      <?php }else{ echo "SORRY! no record found";} ?>
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
                      <td><center><a href="#list<?php echo $row['grp_guidance_id']; ?>" class="btn btn-info btn-sm viewbutton" data-toggle="modal" style="width:35px;"><i class="fa fa-eye"></i></a>
                      
                      <a class="btn btn-primary btn-sm reportsbutton" href="Guidance_SeminarEval_Reports.php?id=<?php echo $row['grp_guidance_id']?>"><i class="fas fa-th-list"></i></a>
                      <?php include('participant-modal.php');?>
                      </center></td>
                    </tr>
                     <?php }}?>
  </tbody>
                  </table>
  
<?php }




?>
<script type="text/javascript">
  
$('#reports-table').DataTable();
  
</script>

 