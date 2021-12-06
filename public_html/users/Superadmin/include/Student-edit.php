        <!-- EditForms Modal -->
        <form method="POST" action="php/student_edit.php">
          <div class="modal fade" id="exampleModal<?php echo $res['student_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Student Acoount</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="container">
                    <div class="row">
                      <div class="id-pic"><img src='../image/logo.png' class='pix'></div>
                      <div class="col-sm">

                        <h3 class="font-weight-bold">ID NUMBER: </h3>

                        <h5 class="font-weight-bold">Personal Information</h5>

                        <p class="font-weight-bold">Name &nbsp;<i style="color: red;">(Lastname, Firstname, Middle Name, Suffix) </i>
                        </p>
                        <div class="row">
                          <div class="form-group col-sm-3">
                            <input class="input" type="hidden" id="student_id" name="student_id" value="<?php echo $res['student_id']; ?>" >
                            <input class="form-control" type="text" id="lname" name="lname" value="<?php echo $res['last_name']; ?>">
                          </div>
                          <div class="form-group col-sm-3">
                            <input class="form-control" type="text" id="fname" name="fname" value="<?php echo $res['first_name']; ?>">
                          </div>
                          <div class="form-group col-sm-3">
                            <input class="form-control" type="text" id="mname" name="mname" value="<?php echo $res['middle_name']; ?>">
                          </div>
                          <div class="form-group col-sm-3">
                            <input class="form-control" type="text" id="suffix" name="suffix" value="<?php echo $res['suffix']; ?>">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-3">
                            <p>House Block/ No.
                              <input class="form-control" type="text" id="houses" name="houses" value="<?php echo $res['house_block_lot_num']; ?>">
                            </p>
                          </div>
                          <div class="form-group col-sm-3">
                            <p>Street No.
                              <input class="form-control" type="text" id="streets" name="streets" value="<?php echo $res['street']; ?>">
                          </div>
                          </p>
                          <div class="form-group col-sm-3">
                            <p>Purok/Subdivision/Village
                              <input class="form-control" type="text" id="prk" name="prk" value="<?php echo $res['prk_vill_sub']; ?>">
                          </div>
                          <div class="form-group col-sm-3">
                            <p>Barangay
                              <input class="form-control" type="text" id="brgy" name="brgy" value="<?php echo $res['brgy']; ?>">
                          </div>
                          </p>
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-3">
                            <p>City/Municipality
                              <input class="form-control" type="text" id="city" name="city" value="<?php echo $res['city']; ?>">
                            </p>
                          </div>
                          <div class="form-group col-sm-3">
                            <p>Province
                              <input class="form-control" type="text" id="province" name="province" value="<?php echo $res['province']; ?>">
                          </div>
                          </p>
                          <div class="form-group col-sm-3">
                            <p>Zip Code
                              <input class="form-control" type="text" id="zip" name="zip" value="<?php echo $res['zip_code']; ?>">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-3">
                            <p>Gender
                              <select class="form-control" id="sex" name="sex">">                                
                                <option value="<?php echo $res['sex']; ?>" style="color:white" selected><?php echo $res['sex']; ?></option>
                                <option class="select-item" value="Male">Male</option>
                                <option class="select-item" value="Female">Female</option>
                                <option class="select-item" value="None">Prefer Not to Mention</option>
                              </select>
                            </p>
                          </div>
                          <div class="form-group col-sm-3">
                            <p>Civil Status
                              <select class="form-control" id="civil" name="civil">
                                <option value="<?php echo $res['civil_status']; ?>" style="color:white" selected><?php echo $res['civil_status']; ?></option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                              </select>
                          </div>
                          </p>
                          <div class="form-group col-sm-3">
                            <p>Religion
                              <input class="form-control" type="text" id="religion" name="religion" value="<?php echo $res['religion']; ?>">
                          </div>
                          <div class="form-group col-sm-3">
                            <p>Nationality
                              <input class="form-control" type="text" id="nationality" name="nationality" value="<?php echo $res['nationality']; ?>">
                          </div>
                          </p>
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-3">
                            <p>Birth Date
                              <input class="form-control" type="date" id="birthdate" name="birthdate" value="<?php echo $res['birth_date']; ?>">
                            </p>
                          </div>
                          <div class="form-group col-sm-3">
                            <p>Birth Place
                              <input class="form-control" type="text" id="birthplace" name="birthplace" value="<?php echo $res['birth_place']; ?>">
                          </div>
                        </div>

                        <h5 class="font-weight-bold">School Information</h5>

                        <div class="row">
                          <div class="form-group col-sm-3">
                            <p>Course
                              <select class="form-control" id="course" name="course" >
                                <option value="<?php echo $res['course_id']; ?>" style="color:white" selected><?php echo $res['coursetitle']; ?></option>
                               <?php
                                  $result=mysqli_query($conn, "SELECT * FROM course");               
                                  while($resu = mysqli_fetch_array($result)) { 
                                      $value= $resu['course_id']; ?>
                                      <option class="select-item" value="<?php echo $value; ?>"><?php echo $resu['title'];?></option>
                                <?php } ?>
                              </select>
                            </p>
                          </div>
                          <div class="form-group col-sm-3">
                            <p>Year Level
                              <select class="form-control" id="level" name="level">                                
                                <option value="<?php echo $res['year_level']; ?>" style="color:white" selected><?php echo $res['year_level']; ?></option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                                <option value="5th Year">5th Year</option>
                                <option value="6th Year">6th Year</option>
                              </select>
                          </div>
                          </p>
                          <div class="form-group col-sm-3">
                            <p>Section
                              <input class="form-control" type="text" id="section" name="section" value="<?php echo $res['section']; ?>">
                          </div>                          
                          <div class="form-group col-sm-3">
                            <p>Email Address
                              <input class="form-control" type="email" id="email" name="email" value="<?php echo $res['email_add']; ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-sm-3">
                            <p>Contact Number
                              <input class="form-control" type="Number" id="phone" name="phone" value="<?php echo $res['phone_number']; ?>">
                          </div>
                          </p>
                        </div>

                        <h6 class="font-weight-bold">Family Information</h6>
                        <div class="row">
                          <div class="form-group col-sm-3">
                            <p>Living With
                              <select class="form-control" id="living" name="living" >
                                <option value="<?php echo $res['living_with']; ?>" style="color:white" selected><?php echo $res['living_with']; ?></option>
                                <option value="Parents">Parents</option>
                                <option value="Relatives">Relatives</option>
                                <option value="Friends">Friends</option>
                                <option value="Others">Others</option>
                              </select>
                          </div>
                          </p>
                        </div>
                        <div class="row">
                          <div class="form-group col-sm-3">
                            <p>Other's Please Specify
                              <input class="form-control" type="text" id="othersspecify" name="othersspecify" value="<?php echo $res['others_specify']; ?>">
                          </div>
                          </p>
                          <div class="form-group col-sm-3">
                            <p>Contact No.
                              <input class="form-control" type="text" id="guardiancontact" name="guardiancontact" value="<?php echo $res['guardian_contact']; ?>">
                          </div>
                          </p>
                          <div class="form-group col-sm-6">
                            <p>City Address
                              <input class="form-control" type="text" id="cityaddress" name="cityaddress" value="<?php echo $res['city_address']; ?>">
                          </div>

                        </div>

                        <div class="row">
                          <div class="col">
                            <h6 class="font-weight-bold">Parent's Information</h6>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-3">
                            <p>Parents's Name
                              <input class="form-control" type="text" id="parentname" name="parentname" value="<?php echo $res['parent_name']; ?>">
                            </p>
                          </div>
                          <div class="form-group col-sm-3">
                            <p>Parent's occupation
                              <input class="form-control" type="text" id="parentoccupation" name="parentoccupation" value="<?php echo $res['parent_occupation']; ?>">
                          </div>
                          </p>
                          <div class="form-group col-sm-3">
                            <p>Parents's Contact No.
                              <input class="form-control" type="text" id="parentcontact" name="parentcontact" value="<?php echo $res['parents_contact']; ?>">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-6">
                            <p>City Address
                              <input class="form-control" type="text" id="parentaddress" name="parentaddress" value="<?php echo $res['parents_address']; ?>">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col">
                            <h6 class="font-weight-bold">Spouse Information</h6>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-3">
                            <p>Spouse Name
                              <input class="form-control" type="text" id="spousename" name="spousename" value="<?php echo $res['spouse_name']; ?>">
                            </p>
                          </div>
                          <div class="form-group col-sm-3">
                            <p>Spouse occupation
                              <input class="form-control" type="text" id="spouseoccupation" name="spouseoccupation" value="<?php echo $res['spouse_occupation']; ?>">
                          </div>
                          </p>
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