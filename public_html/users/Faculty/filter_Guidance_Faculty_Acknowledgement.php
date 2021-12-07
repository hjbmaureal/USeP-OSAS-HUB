 <?php 
include('conn.php');
include('session_faculty.php');
$faculty_id=$_SESSION['id'];
  if (isset($_POST['month'])) { 
  $month=$_POST['month'];
  
  if ($month=='all') {
    $sql="SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, student.first_name, student.last_name, _status.status from referral_form join student USING (Student_id) join _status USING(status_id) where referral_form.staff_id = '$faculty_id' AND referral_form.status_id='1'";
    
  }else{
     $sql="SELECT referral_form.referral_id, referral_form.staff_id, referral_form.date_filed, referral_form.refdate_completed, student.first_name, student.last_name, _status.status from referral_form join student USING (Student_id) join _status USING(status_id) where referral_form.staff_id = '$faculty_id' AND referral_form.status_id='1' and DATE_FORMAT(referral_form.date_filed, '%m') like '$month'";
  }

                $result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
?>
   
   <table class="table table-hover table-bordered" id="sampleTable2">
    <?php 
      if($count){
            ?>
                    <thead>
                      <tr>
                      <th>Date Filed</th>
                      <th class="max">Student Referred</th>
                      <th class="max">Status of Referral</th>                      
                      <th>Date Completed</th>
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
                                  <td>'. $row['first_name'].'  
                                  '. $row['last_name'].'</td> 
                                  <td>'. $row['status'].'</td>
                                  <td>'. $row['refdate_completed'].'</td>
                                  <td>
                                  <center><a id='.$row['referral_id'].' type="button" class="btn btn-info btn-sm viewbutton" data-id='.$row['referral_id'].' ><i class="fas fa-eye" style="color:white;"></i></a>&nbsp;</center>
                                </tr>';}}

        ?> </tbody> </table>
                      <?php
  }?>