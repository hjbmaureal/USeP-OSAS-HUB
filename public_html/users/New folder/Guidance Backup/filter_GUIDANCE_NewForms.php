<?php 
sleep(1);
include('conn.php');
if (isset($_POST['course']) && isset($_POST['month'])) {
  $course=$_POST['course'];
  $month = $_POST['month'];
 

  if ($course=='all' && $month=='all') {
    $sql="SELECT intake_form.intake_id, intake_form.Student_id, intake_form.date_filed, intake_form.intake_type, student.first_name, student.last_name, student.middle_name, student.suffix, student.section, student.year_level, course.title from intake_form join student USING(Student_id) join course USING(course_id)";

  }if ($course!='all' && $month=='all') {
     $sql="SELECT intake_form.intake_id, intake_form.Student_id, intake_form.date_filed, intake_form.intake_type, student.first_name, student.last_name, student.middle_name, student.suffix, student.section, student.year_level, course.title from intake_form join student USING(Student_id) join course USING(course_id) where course.course_id='$course'";

  }if ($course=='all' && $month!='all') {
     $sql="SELECT intake_form.intake_id, intake_form.Student_id, intake_form.date_filed, intake_form.intake_type, student.first_name, student.last_name, student.middle_name, student.suffix, student.section, student.year_level, course.title from intake_form join student USING(Student_id) join course USING(course_id) WHERE DATE_FORMAT(intake_form.date_filed,'%m') like '$month'";

  }if ($course!='all' && $month!='all') {
    $sql="SELECT intake_form.intake_id, intake_form.Student_id, intake_form.date_filed, intake_form.intake_type, student.first_name, student.last_name, student.middle_name, student.suffix, student.section, student.year_level, course.title from intake_form join student USING(Student_id) join course USING(course_id) WHERE DATE_FORMAT(intake_form.date_filed,'%m') like '$month' and course.course_id='$course'";

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
                                  <td>
                                  <button type="button" class="btn btn-info btn-sm viewbutton" id='.$row['intake_id'].' style="width:35px;"><i class="fa fa-eye"></i></button>&nbsp;
                                  <button type="button" class="btn btn-warning btn-sm updatebutton" id='.$row['intake_id'].' style="width:35px;"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:white"></i></button>&nbsp;

                                </tr>';}}


       ?> </tbody> </table>

  <?php }

  ?><?php
 