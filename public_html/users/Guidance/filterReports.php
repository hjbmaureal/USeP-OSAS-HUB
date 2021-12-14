<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#reports-table').DataTable();</script><?php 
sleep(1);
include('conn.php');
if (isset($_POST['mode']) && isset($_POST['from']) && isset($_POST['to']) && isset($_POST['fromyear']) && isset($_POST['toyear'])) {
  $mode=$_POST['mode'];
  $from = $_POST['from'];
  $to = $_POST['to'];
  $fromyr = $_POST['fromyear'];
  $toyr = $_POST['toyear'];

  if ($mode=='all' && $from=='all' && $to=='all' && $fromyr == '' && $toyr=='') {
    $sql="SELECT intake_form.*, guidance_appointments.*, student.*, indv_counselling.remarks, student.Student_id as stud_id, course.name as course, mode_of_communication.communication_mode from intake_form join indv_counselling on indv_counselling.intake_id=intake_form.intake_id JOIN guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id
                        left join student on student.Student_id=intake_form.Student_id
                        left join course on course.course_id=student.course_id
                        left join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id
                        where guidance_appointments.status_id='1'";
  } if ($mode!='all' && $from!='all' && $to!='all' && $fromyr == '' && $toyr=='') {
      $sql="SELECT intake_form.*, guidance_appointments.*, student.*, indv_counselling.remarks, student.Student_id as stud_id, course.name as course, mode_of_communication.communication_mode from intake_form join indv_counselling on indv_counselling.intake_id=intake_form.intake_id JOIN guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id
                        left join student on student.Student_id=intake_form.Student_id
                        left join course on course.course_id=student.course_id
                        left join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id
                        where guidance_appointments.status_id='1' and guidance_appointments.mode_id = '$mode' and DATE_FORMAT(guidance_appointments.appointment_date, '%m') BETWEEN '$from' and '$to'";
} if ($mode!='all' && $from=='all' && $to=='all' && $fromyr == '' && $toyr=='') {
      $sql="SELECT intake_form.*, guidance_appointments.*, student.*, indv_counselling.remarks, student.Student_id as stud_id, course.name as course, mode_of_communication.communication_mode from intake_form join indv_counselling on indv_counselling.intake_id=intake_form.intake_id JOIN guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id left join student on student.Student_id=intake_form.Student_id left join course on course.course_id=student.course_id left join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id where guidance_appointments.status_id='1' and guidance_appointments.mode_id ='$mode'";
} if ($mode!='all' && $from!='all' && $to!='all' && $fromyr != '' && $toyr!='') {
      $sql="SELECT intake_form.*, guidance_appointments.*, student.*, indv_counselling.remarks, student.Student_id as stud_id, course.name as course, mode_of_communication.communication_mode from intake_form join indv_counselling on indv_counselling.intake_id=intake_form.intake_id JOIN guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id left join student on student.Student_id=intake_form.Student_id left join course on course.course_id=student.course_id left join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id where guidance_appointments.status_id='1' and guidance_appointments.mode_id = '$mode' and DATE_FORMAT(guidance_appointments.appointment_date, '%m') BETWEEN '$from' and '$to' AND DATE_FORMAT(guidance_appointments.appointment_date,'%Y') BETWEEN '$fromyr' and '$toyr'";
} if ($mode=='all' && $from!='all' && $to!='all' && $fromyr != '' && $toyr!='') {
      $sql="SELECT intake_form.*, guidance_appointments.*, student.*, indv_counselling.remarks, student.Student_id as stud_id, course.name as course, mode_of_communication.communication_mode from intake_form join indv_counselling on indv_counselling.intake_id=intake_form.intake_id JOIN guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id
                        left join student on student.Student_id=intake_form.Student_id
                        left join course on course.course_id=student.course_id
                        left join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id
                        where guidance_appointments.status_id='1' and DATE_FORMAT(guidance_appointments.appointment_date, '%m') BETWEEN '$from' and '$to' AND DATE_FORMAT(guidance_appointments.appointment_date,'%Y') BETWEEN '$fromyr' and '$toyr'";
} if ($mode=='all' && $from=='all' && $to=='all' && $fromyr != '' && $toyr!='') {
      $sql="SELECT intake_form.*, guidance_appointments.*, student.*, indv_counselling.remarks, student.Student_id as stud_id, course.name as course, mode_of_communication.communication_mode from intake_form join indv_counselling on indv_counselling.intake_id=intake_form.intake_id JOIN guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id
                        left join student on student.Student_id=intake_form.Student_id
                        left join course on course.course_id=student.course_id
                        left join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id
                        where guidance_appointments.status_id='1' and DATE_FORMAT(guidance_appointments.appointment_date,'%Y') BETWEEN '$fromyr' and '$toyr'";
} if ($mode=='all' && $from!='all' && $to!='all' && $fromyr == '' && $toyr=='') {
      $sql="SELECT intake_form.*, guidance_appointments.*, student.*, indv_counselling.remarks, student.Student_id as stud_id, course.name as course, mode_of_communication.communication_mode from intake_form join indv_counselling on indv_counselling.intake_id=intake_form.intake_id JOIN guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id
                        left join student on student.Student_id=intake_form.Student_id
                        left join course on course.course_id=student.course_id
                        left join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id
                        where guidance_appointments.status_id='1' and DATE_FORMAT(guidance_appointments.appointment_date, '%m') BETWEEN '$from' and '$to'";
} if ($mode!='all' && $from=='all' && $to=='all' && $fromyr != '' && $toyr!='') {
      $sql="SELECT intake_form.*, guidance_appointments.*, student.*, indv_counselling.remarks, student.Student_id as stud_id, course.name as course, mode_of_communication.communication_mode from intake_form join indv_counselling on indv_counselling.intake_id=intake_form.intake_id JOIN guidance_appointments on guidance_appointments.appointment_id=indv_counselling.appointment_id
                        left join student on student.Student_id=intake_form.Student_id
                        left join course on course.course_id=student.course_id
                        left join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id
                        where guidance_appointments.status_id='1' and guidance_appointments.mode_id = '$mode' and DATE_FORMAT(guidance_appointments.appointment_date,'%Y') BETWEEN '$fromyr' and '$toyr'";
} 

                $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
?>
<table class="data-table" id="reports-table" cellpadding="10px">
  <?php 
      if ($count) {
            ?>
                  <thead align="center">
                    <tr>
                    <th width="10%">Date of Counselling</th>
                    <th width="10%">Student ID</th>
                    <th width="20%">Course and Year</th>
                    <th width="15%">Mode of Communication</th>
                    <th width="40%">Concern/Remarks</th>
                  </tr>
      <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                </thead>
                <tbody>
                    <?php
                      if($result = mysqli_query($conn, $sql)){
          while ($row2 = mysqli_fetch_assoc($result)) {

                                echo'<tr align="center">
                                  <td>'. $row2['appointment_date'].'</td>
                                  <td>'. $row2['stud_id'].'</td>
                                  <td>'. $row2['course'].'</td>
                                  <td>'. $row2['communication_mode'].'</td> 
                                  <td>'. $row2['remarks'].'</td>
                                  
                                  

                                </tr>';}} ?> </tbody> </table>

  <?php }

  ?>
 
<script type="text/javascript">
  
$('#reports-table').DataTable();
  
</script>