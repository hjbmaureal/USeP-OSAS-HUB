<?php 
include('conn.php');
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$search="SELECT Student_id, last_name, first_name, middle_name, year_level,course.name, section FROM student JOIN course ON course.course_id=student.course_id WHERE Student_id='$id'";
	$result = mysqli_query($conn, $search);
    $count=mysqli_num_rows($result);


    if(!$count){ ?>

    	                  <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Student's ID Number</label><input class="form-control" type="text"  placeholder="Tyoe Student ID number" name="search_text" id="search_text" value="<?php echo $id;?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Name</label><input class="form-control" type="text" placeholder="" name="stud_id" value="SORRY! NO RECORD FOUND!">
                                </div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Course:</label><input class="form-control" type="text" placeholder="" value="SORRY! NO RECORD FOUND!">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Year Level:</label><input class="form-control" type="text" placeholder="" value="SORRY! NO RECORD FOUND!">
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Section</label><input class="form-control" type="text" placeholder="" value="SORRY! NO RECORD FOUND!">
                                </div>
                            </div>
                          </div>
    <?php }

	while ($row = mysqli_fetch_assoc($result)) { ?>
						  <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Student's ID Number</label><input class="form-control" type="text"  placeholder="Tyoe Student ID number" name="search_text" id="search_text" value="<?php echo $id;?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Name</label><input class="form-control" type="text" placeholder="" name="stud_id" value="<?php echo $row['last_name'].', '.$row['first_name'].' '.$row['middle_name'];?>">
                                </div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Course:</label><input class="form-control" type="text" placeholder="" value="<?php echo $row['name'];?>">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Year Level:</label><input class="form-control" type="text" placeholder="" value="<?php echo $row['year_level'];?>">
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Section</label><input class="form-control" type="text" placeholder="" value="<?php echo $row['section'];?>">
                                </div>
                            </div>
                          </div>
	<?php }
}


?>