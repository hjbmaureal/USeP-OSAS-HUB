        <!-- EditForms Modal -->

        <form method="POST" action="php/alumni_edit.php">    
                      <div class="modal fade" id="exampleModal<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Alumni Account</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                    <div class="row">
                  <div class="id-picture"><img src='../../images/logo.png' class= 'pix'></div>  
                   <div class="col-sm">

                    <h3 class="font-weight-bold">ALUMNI ID NUMBER: <?php echo $res['id']?></h3> 

                   <h5 class="font-weight-bold">Personal Information</h5> 
                
                <p class="font-weight-bold">Name &nbsp;<i style="color: red;">(Lastname, Firstname, Middle Name, Suffix) </i>
                </p>
                <div class="row">
                <div class="form-group col-sm-3">
                <input class="form-control" type="hidden" id="aid" name="aid" value="<?php echo $res['id']?>">
                <input class="form-control" type="text" id="lname" name="lname" value="<?php echo $res['last_name']?>">
                </div>
                  <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="fname" name="fname" value="<?php echo $res['first_name']?>">
                </div>
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="mname" name="mname" value="<?php echo $res['middle_name']?>">
                </div>
                <div class="form-group col-sm-3">
                <input class="form-control" type="text" id="suffix" name="suffix" value="<?php echo $res['suffix']?>">
                </div>
                </div>

                 <h5 class="font-weight-bold">School Information</h5>

                <div class="row">
                <div class="form-group col-sm-3">
                <p>Degree: Major
                <select class="form-control" id="degree" name="degree"> 
                      <option value="<?php echo $res['course_id']?>"  style="color:white" selected><?php echo $res['title'].': '.$res['major'];?></option>
                      <?php
                                
                          $result=mysqli_query($conn, "SELECT * FROM course");               
                          while($resuu = mysqli_fetch_array($result)) { 
                              $value= $resuu['course_id']; ?>
                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $resuu['title'].': '.$resuu['major'];?> </option>
                        <?php } ?>
                </select>                   
                </p>
                </div>
                <div class="form-group col-sm-3">
                <p>Last School Year Attended
                <input class="form-control" type="text" id="lastsy" name="lastsy" value="<?php echo $res['last_sy_attended']?>">
                </div>
                <div class="form-group col-sm-3">
                <p>Email Address
                <input class="form-control" type="email" id="email" name="email" value="<?php echo $res['email_add']?>">
                </div>
                <div class="form-group col-sm-3">
                <p>Contact Number
                <input class="form-control" type="Number" id="phone" name="phone" value="<?php echo $res['contact']?>">
                </div>
                </p>
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