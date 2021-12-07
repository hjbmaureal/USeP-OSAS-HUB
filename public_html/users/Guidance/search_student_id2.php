<?php 
include('conn.php');
if (isset($_POST['id'])) {
  $id=$_POST['id'];
  $search="SELECT student.Student_id,course.title, last_name, first_name, middle_name, year_level,course.name, phone_number, section FROM student JOIN course ON course.course_id=student.course_id JOIN intake_form ON intake_form.Student_id= student.Student_id WHERE student.Student_id='$id'";

  $result1 = mysqli_query($conn, $search);
    $count=mysqli_num_rows($result1);


    if(!$count){ ?>

                         <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name</label>
                                  <input class="form-control" type="text" placeholder="" name="name" value="SORRY! NO RECORD FOUND!" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course & Year</label><input class="form-control" name="cy" type="text" placeholder="" value="SORRY! NO RECORD FOUND!" readonly>
                                </div>
                            </div>
                          </div>

    <?php }
  while ($result = mysqli_fetch_assoc($result1)) { ?>
              <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name</label>
                                  <input class="form-control" type="text" placeholder="" name="name" value="<?php echo $result['last_name'].', '.$result['first_name'].' '.$result['middle_name'];?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course & Year</label><input class="form-control" name="cy" type="text" placeholder="" value="<?php echo $result['title'].' '.$result['year_level'];?>" readonly>
                                </div>
                            </div>
                          </div>
                          
                          
                          
  <?php }

}


?>