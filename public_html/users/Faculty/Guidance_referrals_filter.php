<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>

<?php 
sleep(1);
include('conn.php');
include('session_faculty.php');
$faculty_id= $_SESSION['id'];
if (isset($_POST['requeststatus'])) {
  $requeststatus=$_POST['requeststatus'];
  if ($requeststatus=='all') {
    $sql="SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.status_no, staff.f_name, staff.l_name, staff.position from referral_form join staff USING (staff_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_no ='1'";
          $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
  }else{
    $sql="SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.status_no, staff.f_name, staff.l_name, staff.position from referral_form join staff USING (staff_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_no ='1' AND referral_form.status_no ='$requeststatus'";
          $result = mysqli_query($conn, $sql);
          $count=mysqli_num_rows($result);
  }
?>
<div class="table-bd">
<div class="table-responsive">
                  <br>
 <table class="table table-hover table-bordered" id="sampleTable2">
    <?php 
      if ($count) {
            ?>
                    <thead>
                      <tr>
                      <th>Date Filed</th>
                      <th>ID Number</th>
                      <th class="max">Name</th>                      
                      <th>Position/Designation</th>
                      <th class="max">Action</th>
                    </tr>
      <?php }else{ echo "SORRY! no record found";} ?>
                  </thead>
                  <tbody>
                    <?php
                     while ($row = mysqli_fetch_assoc($result)) {

                                echo'<tr>
                                  <td>'. $row['date_filed'].'</td>
                                  <td>'. $row['staff_id'].'</td>
                                  <td>'. $row['f_name'].'  
                                  '. $row['l_name'].'</td> 
                                  <td>'. $row['position'].'</td>
                                  <td>
                                  <button type="button" class="btn btn-info btn-sm viewbutton" id='.$row['referral_id'].' style="width:35px;"><i class="fas fa-eye"></i></button>&nbsp;
                                  <a class="btn btn-warning btn-sm editbutton" data-toggle="modal" data-target="#view-modal"><i class="fas fa-edit" data-toggle="modal" data-target="#cordownload"></i></a>
                                </tr>';} ?> </tbody> </table>

  
  <?php }



  if (isset($_POST['requestmonth'])) {
  $requestmonth=$_POST['requestmonth'];
  if ($requestmonth=='all') {
    $sql="SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed,  referral_form.refdate_completed, staff.first_name, staff.last_name, staff.position,_status.status from referral_form join staff USING (staff_id) join _status USING (status_id) where referral_form.staff_id = staff.staff_id AND referral_form.status_id !='2'";
          $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
  }else{
   $sql="SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, staff.first_name, staff.last_name, staff.position,_status.status from referral_form join staff USING (staff_id) join _status USING (status_no) where referral_form.staff_id = staff.staff_id AND referral_form.status_id !='2' AND DATE_FORMAT(referral_form.date_filed, '%m') like '$requestmonth'";
          $result = mysqli_query($conn, $sql);
          $count=mysqli_num_rows($result);
  }
?>
<div class="table-bd">
<div class="table-responsive">
                  <br>
 <table class="table table-hover table-bordered" id="sampleTable">
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
                     while ($row = mysqli_fetch_assoc($result)) {

                                echo'<tr>
                                  <td>'. $row['date_filed'].'</td>
                                  <td>'. $row['staff_id'].'</td>
                                  <td>'. $row['first_name'].'  
                                  '. $row['last_name'].'</td> 
                                  <td>'. $row['position'].'</td>
                                  <td>'. $row['status'].'</td>
                                  <td>'. $row['refdate_completed'].'</td>
                                  <td>
                                  <button type="button" class="btn btn-info btn-sm viewbutton" id='.$row['referral_id'].' style="width:35px;"><i class="fas fa-eye"></i></button>&nbsp;
                                  <a class="btn btn-warning btn-sm editbutton" data-toggle="modal" data-target="#view-modal"><i class="fas fa-edit" data-toggle="modal" data-target="#cordownload"></i></a>
                                </tr>';} ?> </tbody> </table>

  
  <?php }


  /*FILTER STATUS 2*/
  if (isset($_POST['requeststatus2'])) {
  $requeststatus2=$_POST['requeststatus2'];
  if ($requeststatus2=='all') {
    $sql="SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed,  referral_form.date_completed, staff.f_name, staff.l_name, staff.position,stats_counselling.status_type from referral_form join staff USING (staff_id) join stats_counselling USING (status_no) where referral_form.staff_id = staff.staff_id AND referral_form.status_no !='1'";
          $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
  }else{
   $sql="SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed,  referral_form.date_completed, staff.f_name, staff.l_name, staff.position,stats_counselling.status_type from referral_form join staff USING (staff_id) join stats_counselling USING (status_no) where referral_form.staff_id = staff.staff_id AND referral_form.status_no !='1' AND referral_form.status_no ='$requeststatus2'";
          $result = mysqli_query($conn, $sql);
          $count=mysqli_num_rows($result);
  }
?>
<div class="table-bd">
<div class="table-responsive">
                  <br>
 <table class="table table-hover table-bordered" id="sampleTable">
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
                     while ($row = mysqli_fetch_assoc($result)) {

                                echo'<tr>
                                  <td>'. $row['date_filed'].'</td>
                                  <td>'. $row['staff_id'].'</td>
                                  <td>'. $row['f_name'].'  
                                  '. $row['l_name'].'</td> 
                                  <td>'. $row['position'].'</td>
                                  <td>'. $row['status_type'].'</td>
                                  <td>'. $row['date_completed'].'</td>
                                  <td>
                                  <button type="button" class="btn btn-info btn-sm viewbutton" id='.$row['referral_id'].' style="width:35px;"><i class="fas fa-eye"></i></button>&nbsp;
                                  <a class="btn btn-warning btn-sm editbutton" data-toggle="modal" data-target="#view-modal"><i class="fas fa-edit" data-toggle="modal" data-target="#cordownload"></i></a>
                                </tr>';} ?> </tbody> </table>

  <!-- FILTER FACULTY REFERRALS -->
  <?php }
  if (isset($_POST['requeststatusFR'])) {
  $requeststatusFR=$_POST['requeststatusFR'];
  if ($requeststatusFR=='all') {
    $sql = mysqli_query($conn,"SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, student.first_name, student.last_name, _status.status from referral_form join student USING (Student_id) join _status USING(status_id) where referral_form.staff_id = '$faculty_id'");
    
  }else{
     $sql = mysqli_query($conn,"SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, student.first_name, student.last_name, _status.status from referral_form join student USING (Student_id) join _status USING(status_id) where referral_form.staff_id = '$faculty_id'  and referral_form.status_id ='$requeststatusFR'");   
  }
          $count=mysqli_num_rows($sql)
?>
<div class="table-bd">
<div class="table-responsive">
                  <br>
 <table class="table table-hover table-bordered" id="sampleTable2">
  <?php 
      if ($count) {?>
                    <thead>
                      <tr>
                      <th>Date Filed</th>
                      <th>Student Referred</th>
                      <th class="max">Status of Referral</th>                      
                      <th>Date Completed</th>
                      <th class="max">Action</th>
                    </tr>
      <?php }else{ echo "SORRY! no record found";} ?>
                  </thead>
                  <tbody>
                    <?php
                      while($row = mysqli_fetch_array($sql)) { ?> 

                                  <tr>
                                  <td><?php echo $row['date_filed'];?></td>
                                  <td><?php echo $row['first_name'].'  
                                  '. $row['last_name'];?></td> 
                                  <td><?php echo $row['status']; ?></td>
                                  <td><?php echo $row['refdate_completed']; ?></td>
                                  <td>
                                  <button  class="btn btn-info btn-sm viewbutton" class="text mr-2" data-toggle="modal" a href="#details<?php echo $row['referral_id']; ?>"><i class="fas fa-eye" style="color:white;width:13px"></i></button>
                                  <?php include('Guidance_Referral_View_Modal.php'); ?>
                                </td>
                                </tr> <?php }?> </tbody> </table>

  <!-- FILTER REFERRAL REPORT -->
  <?php }


 if (isset($_POST['from']) && isset($_POST['to'])) {
    $from=$_POST['from'];
    $to=$_POST['to'];
  if ($from=='all' || $to=='all') {
    $sql="SELECT group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance
                              join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id
                              join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id
                              join _status on _status.status_id=guidance_appointments.status_id
                              where guidance_appointments.status_id='4' or guidance_appointments.status_id='5'";
          $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
  }else{
   $sql="SELECT group_guidance.*, guidance_appointments.*, mode_of_communication.communication_mode as mode, _status.status from group_guidance
                              join guidance_appointments on guidance_appointments.appointment_id=group_guidance.appointment_id
                              join mode_of_communication on mode_of_communication.mode_id=guidance_appointments.mode_id
                              join _status on _status.status_id=guidance_appointments.status_id
                              where guidance_appointments.status_id='4' or guidance_appointments.status_id='5' and DATE_FORMAT(guidance_appointments.appointment_date, '%m') BETWEEN '$from' and '$to'";
          $result = mysqli_query($conn, $sql);
          $count=mysqli_num_rows($result);
  }
?>
<div class="table-bd">
<div class="table-responsive">
                  <br>
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
        <?php }else{ echo "SORRY! no record found";} ?>
                  </thead>
                  <tbody>
                    <?php
                      while ($row = mysqli_fetch_assoc($result)) {

                                echo'<tr>
                                  
                                  <td>'. $row['sl_name'].', '.$row['sf_name'].'</td>
                                  <td>'. $row['first_name'].'  
                                  '. $row['last_name'].'</td>
                                  <td>'. $row['status'].'</td> 
                                  <td>'. $row['refdate_completed'].'</td>
                                </tr>';}?> </tbody> </table>

  
                                <!-- requestsemester FILTER REFERRAL REPORT SEMESTER -->
  <?php }




  if (isset($_POST['requestsemester'])) {
  $requestsemester=$_POST['requestsemester'];
  if ($requestsemester=='all') {
     $sql="SELECT staff.last_name as sl_name, staff.first_name as sf_name, staff.middle_name, referral_form.referral_id, referral_form.staff_id,staff.first_name,staff.last_name, referral_form.date_filed, referral_form.date_completed, student.first_name, student.last_name, stats_counselling.status_type from referral_form join student USING (Student_id) join staff USING(staff_id) join stats_counselling USING(status_no)";/*where stats_counselling.status_no = '3'*/
          $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
  }else{
   $sql="SELECT staff.last_name as sl_name, staff.first_name as sf_name, staff.middle_name, referral_form.referral_id, referral_form.staff_id,staff.first_name,staff.last_name, referral_form.date_filed, referral_form.date_completed, student.first_name, student.last_name, stats_counselling.status_type from referral_form join student USING (Student_id) join staff USING(staff_id) join stats_counselling USING(status_no) where student.semester ='$requestsemester'";
          $result = mysqli_query($conn, $sql);
          $count=mysqli_num_rows($result);
  }
?>
<div class="table-bd">
<div class="table-responsive">
                  <br>
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
        <?php }else{ echo "SORRY! no record found";} ?>
                  </thead>
                  <tbody>
                    <?php
                      while ($row = mysqli_fetch_assoc($result)) {

                                echo'<tr>
                                  
                                  <td>'. $row['sl_name'].', '.$row['sf_name'].'</td>
                                  <td>'. $row['first_name'].'  
                                  '. $row['last_name'].'</td>
                                  <td>'. $row['status_type'].'</td> 
                                  <td>'. $row['date_completed'].'</td>
                                </tr>';}?> </tbody> </table>

  
                                <!-- requestsemester FILTER REFERRAL REPORT SEMESTER -->
  <?php }?>

  <script type="text/javascript">
  
$('#sampleTable2').DataTable();
$('#sampleTable').DataTable();
  
</script>
