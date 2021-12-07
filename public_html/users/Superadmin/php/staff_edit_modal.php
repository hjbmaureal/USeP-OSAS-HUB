  
  <div class="modal fade" id="exampleModal<?php echo $res['staff_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Information </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="php/staff_edit.php" enctype="multipart/form-data">  
        <div class="modal-body">
         <div class="container">

          <div class="row">


            <div class="col ml-2">

              <div class="row">
                <div class="col">
                  <h5 class="font-weight-bold">ID NUMBER: <?php echo $res['staff_id'];?></h5> 
                  <input class="form-control" type="text" id="staff_id" name="staff_id" value="<?php echo $res['staff_id'];?>" hidden>
                  <h5 class="font-weight-bold">Personal Information</h5> 
                  <span id="namee" class="font-weight-bold">Name &nbsp;<i style="color: red;">(Lastname, Firstname, Middle Name, Suffix)*</i>
                  </span>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-sm-3">
                  <input class="form-control" type="text" id="lname" name="lname" value="<?php echo $res['last_name'];?>" required>
                </div>
                <div class="form-group col-sm-3">
                  <input class="form-control" type="text" id="fname" name="fname" value="<?php echo $res['first_name'];?>" required>
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
                  Extension
                  <input class="form-control" type="text" id="exten" name="exten" value="<?php echo $res['extension'] ?>">
                </div>
                <div class="form-group col-sm-3">
                  Title
                  <input class="form-control" type="text" id="title" name="title" value="<?php echo $res['title'] ?>">
                </div>
                <div class="form-group col-sm-3">
                  Gender<span style="color:red">*</span>
                  <select class="form-control" id="sex" name="sex" > 
                   <option value="<?php echo $res['sex']; ?>" selected><?php echo $res['sex']; ?></option>
                   <?php $gen = array("Male", "Female", "Prefer Not To Mention"); 

                   for ($i=0; $i < 3; $i++) { 
                    if ($gen[$i] != $res['sex']) { ?>                                  
                      <option class="select-item" value="<?php echo $gen[$i]; ?>"><?php echo $gen[$i]; ?></option>
                    <?php } }?>
                  </select>

                </div>
                <div class="form-group col-sm-3">
                  Nationality<span style="color:red">*</span>
                  <input class="form-control" type="text" id="nationality" name="nationality" value="<?php echo $res['nationality'] ?>"  required>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-sm-3">
                  Civil Status<span style="color:red">*</span>
                  <select class="form-control" id="civil" name="civil" >         
                    <option value="<?php echo $res['civil_status']; ?>" selected><?php echo $res['civil_status']; ?></option>
                    <?php $civ = array("Single", "Married", "Widowed"); 

                    for ($i=0; $i < 3; $i++) { 
                      if ($civ[$i] != $res['civil_status']) { ?>                                  
                        <option class="select-item" value="<?php echo $civ[$i]; ?>"><?php echo $civ[$i]; ?></option>
                      <?php } }?>
                    </select>
                  </div>
                  <div class="form-group col-sm-3">
                   Birth Date<span style="color:red">*</span>
                   <input class="form-control" type="date" id="birthdate" value="<?php echo $res['birthdate'] ?>" name="birthdate" >
                 </div>
                 <div class="form-group col-sm-3">
                  Religion<span style="color:red">*</span>
                  <input class="form-control" type="text" id="religion" value="<?php echo $res['religion'] ?>" name="religion">
                </div>
                <div class="form-group col-sm-3">
                  Contact Number<span style="color:red">*</span>
                  <input class="form-control" type="Number" value="<?php echo $res['phone_num'] ?>" id="contact" name="contact" >
                </div>
              </div>

              <div class="row">
               <div class="form-group col-sm-4">
                Email Address<span style="color:red">*</span>
                <input class="form-control" type="email" id="email" name="email" value="<?php echo $res['email_add'] ?>" >
              </div>
              <div class="form-group col-sm-8">
                Full Address<span style="color:red">*</span>
                <input class="form-control" type="address" id="address" name="address" value="<?php echo $res['address'] ?>"  >
              </div> 
            </div>

            <h5 class="font-weight-bold" id="ereka">Employment Information</h5>


            <div class="row">
              <div class="form-group col-sm-3">
                Job Status<span style="color:red">*</span>
                <select class="form-control" id="employment" name="employment" >                    
                  <option value="<?php echo $res['employment_status']; ?>" selected><?php echo $res['employment_status']; ?></option>
                  <?php $stat = array("Regular", "Casual", "Job Order"); 

                  for ($i=0; $i < 3; $i++) { 
                    if ($stat[$i] != $res['employment_status']) { ?>                                  
                      <option class="select-item" value="<?php echo $stat[$i]; ?>"><?php echo $stat[$i]; ?></option>
                    <?php } }?>
                  </select>

                </div>
                <div class="form-group col-sm-5">
                  Password<span style="color:red">*</span>
                  <input class="form-control" type="text" id="password" value="<?php echo $res['password'] ?>" name="password" >
                </div>



              </div>









            </div>

          </div>    
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="submit">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
</form>