<?php 
include('conn.php');
if (isset($_POST['id'])) {
  $id=$_POST['id'];
  $search="SELECT Student_id, last_name, first_name, middle_name, year_level,course.name, phone_number, section FROM student JOIN course ON course.course_id=student.course_id WHERE Student_id='$id'";

  $result = mysqli_query($conn, $search);
    $count=mysqli_num_rows($result);


    if(!$count){ ?>

                        <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Student's ID Number</label><input class="form-control" type="text"  placeholder="Type Student ID number" name="search_text" id="search_text" value="<?php echo $id;?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Name</label><input class="form-control" type="text" placeholder="" name="stud_id" value="SORRY! NO RECORD FOUND!" readonly="">
                                </div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Course:</label><input class="form-control" type="text" placeholder="" value="SORRY! NO RECORD FOUND!" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Year Level:</label><input class="form-control" type="text" placeholder="" value="SORRY! NO RECORD FOUND!" readonly="">
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Section</label><input class="form-control" type="text" placeholder="" value="SORRY! NO RECORD FOUND!" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Mobile Number:</label><input class="form-control" type="text" placeholder="" required="" value="SORRY! NO RECORD FOUND!" readonly="">
                                </div>
                            </div>
                          </div>

    <?php }
  while ($row2 = mysqli_fetch_assoc($result)) { ?>
              <div class="row">
                          
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Name</label><input class="form-control" type="text" placeholder="" name="stud_id" value="<?php echo $row2['last_name'].', '.$row2['first_name'].' '.$row2['middle_name'];?>" readonly="">
                                </div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Course:</label><input class="form-control" type="text" placeholder="" value="<?php echo $row2['name'];?>" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Year Level:</label><input class="form-control" type="text" placeholder="" value="<?php echo $row2['year_level'];?>" readonly="">
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Section</label><input class="form-control" type="text" placeholder="" value="<?php echo $row2['section'];?>" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Mobile Number:</label><input class="form-control" type="text" placeholder="" required="" readonly="" value="<?php echo $row2['phone_number'];?>">
                                </div>
                            </div>
                          </div>
  <?php }

}


?>