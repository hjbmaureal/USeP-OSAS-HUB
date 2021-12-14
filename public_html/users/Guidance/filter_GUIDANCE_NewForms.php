<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#sampleTable').DataTable();</script>
<?php 
sleep(1);
include('conn.php');
if (isset($_POST['course']) && isset($_POST['month'])) {
  $course=$_POST['course'];
  $month = $_POST['month'];
 

  if ($course=='all' && $month=='all') {
    $sql="SELECT intake_form.intake_id, intake_form.Student_id, intake_form.date_filed, intake_form.intake_type, student.first_name, student.last_name, student.middle_name, student.suffix, student.section, student.year_level, course.title from intake_form join student USING(Student_id) join course USING(course_id) where date_verify is not null";

  }if ($course!='all' && $month=='all') {
     $sql="SELECT intake_form.intake_id, intake_form.Student_id, intake_form.date_filed, intake_form.intake_type, student.first_name, student.last_name, student.middle_name, student.suffix, student.section, student.year_level, course.title from intake_form join student USING(Student_id) join course USING(course_id) where course.course_id='$course' and date_verify is not null";

  }if ($course=='all' && $month!='all') {
     $sql="SELECT intake_form.intake_id, intake_form.Student_id, intake_form.date_filed, intake_form.intake_type, student.first_name, student.last_name, student.middle_name, student.suffix, student.section, student.year_level, course.title from intake_form join student USING(Student_id) join course USING(course_id) WHERE DATE_FORMAT(intake_form.date_filed,'%m') like '$month' and date_verify is not null";

  }if ($course!='all' && $month!='all') {
    $sql="SELECT intake_form.intake_id, intake_form.Student_id, intake_form.date_filed, intake_form.intake_type, student.first_name, student.last_name, student.middle_name, student.suffix, student.section, student.year_level, course.title from intake_form join student USING(Student_id) join course USING(course_id) WHERE DATE_FORMAT(intake_form.date_filed,'%m') like '$month' and course.course_id='$course' and date_verify is not null";

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
                                  '. $row['middle_name'].''. $row['last_name'].'</td> 
                                  <td>'. $row['title'].'</td>
                                  <td>'. $row['year_level'].'- 
                                  '. $row['section'].'</td>
                                  <td>'; ?>
                                  <button type="button" class="btn btn-info btn-sm " a href="#viewmodal?<?php echo $row['Student_id'].$row['intake_id']; ?>" data-toggle="modal" style="width:35px;"><i class="fa fa-eye"></i></button>&nbsp;
                                  <?php include('Modal_View_Guidance_NewForms.php'); ?>
                                </td>
                                </tr><?php }}

       ?>
                  </tbody>
     </table>

  <?php }

  ?>

<script type="text/javascript">

  $('#show-table').DataTable();

</script>
 