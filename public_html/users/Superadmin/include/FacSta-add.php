        <form method="POST" action="php/staff_add.php" enctype="multipart/form-data">    
                      <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Faculty/Staff Acoount</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                    <div class="row">
                  <div class="uploadpic"> 
                      <button class="files">Upload Profile Picture</button>
                   <input type="file" id="myfile" name="id_pic" required>

</div>
                   <div class="col-sm">
                   <h5 class="font-weight-bold">Personal Information</h5> 
                
                <p class="font-weight-bold">Name &nbsp;<i style="color: red;">(Lastname, Firstname, Middle Name, Suffix) </i>
                </p>
                <div class="row">
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="lname" name="lname" required>
                </div>
                  <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="fname" name="fname" required>
                </div>
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="mname" name="mname" required>
                </div>
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="suffix" name="suffix" required>
                </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-3">
                      <p>Extension</p>
                      <input class="form-control" type="text" id="exten" name="exten" required>
                    </div>
                </div>

                <div class="row">
                <div class="form-group col-sm-3">
                <p>Gender
                <select class="form-control" id="sex" name="sex" required> 
                    <option class="select-item" value="">Choose Option</option>
                    <option class="select-item" value="Male">Male</option>
                    <option class="select-item" value="Female">Female</option>
                    <option class="select-item" value="None">Prefer Not to Mention</option>
                    </select>
                </p>
                </div>
                <div class="form-group col-sm-3">
                <p>Civil Status
                <select class="form-control" id="civil" name="civil" required>                    
                    <option class="select-item" value="" selected="selected"></option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    </select>
                </div>
                </p>
                <div class="form-group col-sm-3">
                <p>Religion
                <input class="form-control" type="text" id="religion" name="religion" required>
                </div>
                <div class="form-group col-sm-3">
                <p>Nationality
                <input class="form-control" type="text" id="nationality" name="nationality" required>
                </div>
                </p>
                </div>

                <div class="row">
                <div class="form-group col-sm-3">
                <p>Birth Date
                <input class="form-control" type="date" id="birthdate" name="birthdate" required>
                </p>
                </div>
                <div class="form-group col-sm-3">
                <p>Birth Place
                <input class="form-control" type="text" id="birthplace" name="birthplace" required>
                </div>
                </p>
                <div class="form-group col-sm-3">
                <p>Email Address
                <input class="form-control" type="email" id="email" name="email" required>
                </div>
                <div class="form-group col-sm-3">
                <p>Contact Number
                <input class="form-control" type="Number" id="contact" name="contact" required>
                </div>
                </p>
                </div>

                 <h5 class="font-weight-bold">Employement Information</h5>

                <div class="row">
                <div class="form-group col-sm-3">
                <p>Employee Type
                <select class="form-control" id="type" name="type" required>
                    <option class="select-item" value="">Choose Option</option>
                    <option value="Faculty">Faculty</option>
                    <option value="Staff">Staff</option>
                    </select>
                </p>
                </div>
                <div class="form-group col-sm-3">
                <p>Office
                <select class="form-control" id="office" name="office" required>
                  <option value="" selected></option>
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
                <select class="form-control" id="college" name="college" required>
                    <option value="" selected>Choose Option</option> 
                      <?php
                          $result=mysqli_query($conn, "SELECT * FROM college");               
                          while($resu = mysqli_fetch_array($result)) { 
                              $value= $resu['college_id']; ?>
                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $resu['title'];?></option>
                        <?php } ?>
                </select>
                </p>
                </div>
                <div class="form-group col-sm-3">
                <p>Department
                <select class="form-control" id="department" name="department" required>
                    <option value="" selected>Choose Option</option>
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
                <select class="form-control" id="employment" name="employment" required>                    
                    <option value="" selected>Choose Option</option>
                    <option value="Regular">Regular</option>
                    <option value="Casual">Casual</option>
                    <option value="Job Order">Job Order</option>
                </select>
                </p>
                </div>
                <div class="form-group col-sm-3">
                <p>Position
                <input class="form-control" type="text" id="position" name="position" required>
                </div>
                </p>
                <div class="form-group col-sm-3">
                <p>Access Level
                <select class="form-control" id="level" name="level" required>
                  <option value="" selected>Choose Option</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                                </p>
                    
                </div>
                <div class="form-group col-sm-3">
                      <p>Password
                      <input class="form-control" type="text" id="password" name="password" required></p>
                    </div>
                </div>
                </div>

                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="type" class="btn btn-success" name="submit">Updatee</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
              </div>
            </div>
          </form>