
          <?php 
include('conn.php');
if (isset($_POST['year']) && isset($_POST['course']) && isset($_POST['section'])) { 
  $year=$_POST['year'];
  $course=$_POST['course'];
  $section=$_POST['section'];
  		if ($course=='all') {
  			$sql="SELECT Student_id, last_name, first_name, middle_name, course.title, student.year_level, student.section FROM `student` JOIN course on course.course_id=student.course_id";
  		}
  	if ($course !='all' && $year=='all' && $section=='all')  {
  		$sql="SELECT Student_id, last_name, first_name, middle_name, course.title, student.year_level, student.section FROM `student` JOIN course on course.course_id=student.course_id WHERE student.course_id='$course'";

  	}if ($course !='all' && $year!='all' && $section=='all') {
  		$sql="SELECT Student_id, last_name, first_name, middle_name, course.title, student.year_level, student.section FROM `student` JOIN course on course.course_id=student.course_id WHERE student.course_id='$course' and student.year_level like '$year'";

  	}if ($course !='all' && $year!='all' && $section !='all') {
  		$sql="SELECT Student_id, last_name, first_name, middle_name, course.title, student.year_level, student.section FROM `student` JOIN course on course.course_id=student.course_id WHERE student.course_id='$course' and student.year_level like '$year' and student.section like '$section'";
               
  	}
  	 			$result = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
    
?>
 <table class="table table-hover table-bordered" id="sampleTable">
	 <?php 
      if($count){
            ?>
                    <thead>
                      <tr align="center">
                      <th>ID </th>
                      <th>Name</th>
                      <th class="max">Course</th>                      
                      <th class="max">Year&Section</th>
                      
                    </tr>
    <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                  </thead>
                  <tbody>
                    <?php
                     if($result = mysqli_query($conn,$sql)){
                          while ($row2 = mysqli_fetch_assoc($result)) {

                                echo'<tr align="center">
                                  <td>'. $row2['Student_id'].'</td>
                                  <td>'.$row2['first_name'].' '.$row2['middle_name'].'. '.$row2['last_name'].'</td>
                                  <td>'. $row2['title'].'</td>
                                  <td>'. $row2['year_level'].'-'.$row2['section'].'</td> 
                                </tr>';}
                              }

        ?> </tbody> </table>
                      <?php
  }?>
