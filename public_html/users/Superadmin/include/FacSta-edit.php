        <!-- EditForms Modal -->

        <form method="POST" action="php/staff_edit.php">    
                      <div class="modal fade" id="exampleModal<?php echo $res['staff_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Faculty/Staff Acoount</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                    <div class="row">
                  <div class="id-pic"><img src='image/logo.png' class= 'pix'></div>
                   <div class="col-sm">

                    <h3 class="font-weight-bold">ID NUMBER: </h3> 

                   <h5 class="font-weight-bold">Personal Information</h5> 
                
                <p class="font-weight-bold">Name &nbsp;<i style="color: red;">(Lastname, Firstname, Middle Name, Suffix) </i>
                </p>
                <div class="row">
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="sid" name="sid" value="<?php echo $res['staff_id'];?>" hidden>
                <input class="form-control" type="text" id="lname" name="lname" value="<?php echo $res['last_name'];?>">
                </div>
                  <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="fname" name="fname" value="<?php echo $res['first_name'];?>">
                </div>
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="mname" name="mname" value="<?php echo $res['middle_name'];?>">
                </div>
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="suffix" name="suffix" value="<?php echo $res['suffix'];?>">
                </div>
                </div>

                <div class="row">
                <div class="form-group col-sm-3">
                <p>Gender
                <select class="form-control" id="sex" name="sex"> 
                    <option class="select-item" value="<?php echo $res['sex'];?>" style="color:white" selected="selected"><?php echo $res['sex'];?></option>
                    <option class="select-item" value="Male">Male</option>
                    <option class="select-item" value="Female">Female</option>
                    <option class="select-item" value="None">Prefer Not to Mention</option>
                    </select>
                </p>
                </div>
                <div class="form-group col-sm-3">
                <p>Civil Status
                <select class="form-control" id="civil" name="civil">                    
                    <option class="select-item" value="<?php echo $res['civil_status'];?>" style="color:white" selected="selected"><?php echo $res['civil_status'];?></option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    </select>
                </div>
                </p>
                <div class="form-group col-sm-3">
                <p>Religion
                <input class="form-control" type="text" id="religion" name="religion" value="<?php echo $res['religion'];?>">
                </div>
                <div class="form-group col-sm-3">
                <p>Nationality
                <input class="form-control" type="text" id="nationality" name="nationality" value="<?php echo $res['nationality'];?>">
                </div>
                </p>
                </div>

                <div class="row">
                <div class="form-group col-sm-3">
                <p>Birth Date
                <input class="form-control" type="date" id="birthdate" name="birthdate" value="<?php echo $res['birthdate'];?>">
                </p>
                </div>
                <div class="form-group col-sm-3">
                <p>Birth Place
                <input class="form-control" type="text" id="birthplace" name="birthplace" value="<?php echo $res['birthplace'];?>">
                </div>
                </p>
                <div class="form-group col-sm-3">
                <p>Email Address
                <input class="form-control" type="email" id="email" name="email" value="<?php echo $res['email_add'];?>">
                </div>
                <div class="form-group col-sm-3">
                <p>Contact Number
                <input class="form-control" type="Number" id="contact" name="contact" value="<?php echo $res['phone_num'];?>">
                </div>
                </p>
                </div>

                 <h5 class="font-weight-bold">Employement Information</h5>

                <div class="row">
                <div class="form-group col-sm-3">
                <p>Employee Type
                <select class="form-control" id="type" name="type">
                    <option class="select-item" value="<?php echo $res['type'];?>" style="color:white" selected="selected"><?php echo $res['type'];?></option>
                    <option value="Faculty">Faculty</option>
                    <option value="Staff">Staff</option>
                    </select>
                </p>
                </div>
                <div class="form-group col-sm-3">
                <p>Office
                <select class="form-control" id="office" name="office">
                  <option value="<?php echo $res['office_id']; ?>" style="color:white" selected><?php echo $res['office_name']; ?></option>
                       <?php
                          $result=mysqli_query($conn, "SELECT * FROM office");               
                          while($resu = mysqli_fetch_array($result)) { 
                              $value= $resu['office_id']; ?>
                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $resu['office_name'];?></option>
                        <?php } ?>
                    </select>
                </div></p>
                <div class="form-group col-sm-3">
                <p>College
                <select class="form-control" id="college" name="college">
                    <option value="<?php echo $res['college_id']; ?>" style="color:white" selected><?php echo $res['college_name']; ?></option> 
                      <?php
                          $result=mysqli_query($conn, "SELECT * FROM college");               
                          while($resu = mysqli_fetch_array($result)) { 
                              $value1= $resu['college_id']; ?>
                              <option class="select-item" value="<?php echo $value1; ?>"><?php echo $resu['title'];?></option>
                        <?php } ?>
                </select>
                </p>
                </div>
                <div class="form-group col-sm-3">
                <p>Department
                <select class="form-control" id="department" name="department">
                    <option value="<?php echo $res['dept_id']; ?>" style="color:white" selected><?php echo $res['dept_name']; ?></option>
                       <?php
                          $result=mysqli_query($conn, "SELECT * FROM department");               
                          while($resu = mysqli_fetch_array($result)) { 
                              $value= $resu['dept_id']; ?>
                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $resu['dept_name'];?></option>
                        <?php } ?>
                </select>
                </p>
                </div>

                </div>

               <div class="row">
                <div class="form-group col-sm-3">
                <p>Job Status
                <select class="form-control" id="employment" name="employment">                    
                    <option value="<?php echo $res['employment_status']; ?>" style="color:white" selected><?php echo $res['employment_status']; ?></option>
                    <option value="Regular">Regular</option>
                    <option value="Casual">Casual</option>
                    <option value="Job Order">Job Order</option>
                </select>
                </p>
                </div>
                <div class="form-group col-sm-3">
                <p>Position
                <input class="form-control" type="text" id="position" name="position" value="<?php echo $res['position']; ?>">
                </div>
                </p>
                <div class="form-group col-sm-3">
                <p>Access Level
                <select class="form-control" id="level" name="level">
                  <option value="<?php echo $res['access_level']; ?>" style="color:white" selected><?php echo $res['access_level']; ?></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                                </p>
                </div>
                </div>
                </div>

                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="type" class="btn btn-success" name="submit">Update</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
              </div>
            </div>
          </form>