<?php

$dbhost = 'localhost';
$dbname = 'osasdb_latest4';
$dbusername ='root';
$dbpassword = '';

$mysqli = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);

?>  
    
 <div class="modal fade" id="del<?php echo $row['ID_Number']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">EDIT PATIENT INFO</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
             <?php
                    $edit=mysqli_query($mysqli,"select * from patient_info where ID_Number='".$row['ID_Number']."'");
                    
                    $erow=mysqli_fetch_array($edit);
                ?>
                <div class="container">
                <form method="POST" action="edit.php?ID_Number=<?php echo $row['ID_Number']; ?>">
                  

                           <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">First Name</label>
                                  <input class="form-control" type="text" name="firstname" placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">LastName</label>
                                  <input class="form-control" type="text" name="lastname" placeholder="Enter last name">
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Address</label>
                                  <input class="form-control" type="text" name="address" placeholder="Enter address">
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Email</label>
                                  <input class="form-control" type="Email" name="email" placeholder="Enter email address">
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Contact Number</label>
                                  <input class="form-control" type="text" name="contactnumber" placeholder="Enter contact number">
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">Course/Department</label>
                                    <select class="form-control" name="coursedept" id="exampleSelect1">
                      <option class="select-item" value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                      <option class="select-item" value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
                      <option class="select-item" value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                    </select>
                                  </div>
                            </div>
                          </div>
                     <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- /.modal -->

