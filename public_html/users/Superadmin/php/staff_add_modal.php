<form method="POST" action="php/staff_add.php" enctype="multipart/form-data">    
          <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Faculty/Staff Account</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <div class="container">
                  <div class="row">

                    <style>
                    .prof-border{
                      width: 120px;
                      height: 120px;
                      border: 2px solid #ff4444;
                      border-radius: 5px;
                    }

                    .uploadpic2{
                      position: relative;
                      overflow: hidden;
                      display: inline-block;
                    }

      
                  </style>

                    <div class="col-sm-1 mr-5">
                      <div class="row">
                      <div class="col">
                        <div class="uploadpic2 text-center"> 
                          <!--<button class="files">Upload Profile Picture</button>
                          <input class="files form-control" onchange="getImagePreview(event);" type="file" id="myfile" name="id_pic" accept=".png,.jpeg,.jpg,.PNG,.JPEG,.JPG" required></div>-->
                          <img src="../../images/logo.png" class="prof-border" id="profileDisplay" onclick="triggerClick()" />
                            <label class="text-underline" for="profileImage">Upload Profile</label>
                          <input type="file" name="id_pic" onchange="displayImage(this)" id="profileImage" style="display: none;" accept=".png,.jpeg,.jpg,.PNG,.JPEG,.JPG" required></div>
                        </div>
                      </div>
                    </div>

                    <script type="text/javascript">
                      function triggerClick(){
                        document.querySelector('#profileImage').click();
                      }

                      function displayImage(e){
                        if(e.files[0]){
                          var reader = new FileReader();
                          reader.onload = function(e){
                            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                          }
                          reader.readAsDataURL(e.files[0]);
                        }
                      }
                    </script>

                    <div class="col ml-2">

                        <div class="row">
                        <div class="col">
                          <h5 class="font-weight-bold">Personal Information</h5> 
                          <span id="namee" class="font-weight-bold">Name &nbsp;<i style="color: red;">(Lastname, Firstname, Middle Name, Suffix)*</i>
                          </span>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-sm-3">
                          <input class="form-control" type="text" id="lname" name="lname" placeholder="Last Name" required>
                        </div>
                        <div class="form-group col-sm-3">
                          <input class="form-control" type="text" id="fname" name="fname" placeholder="First Name" required>
                        </div>
                        <div class="form-group col-sm-3">
                          <input class="form-control" type="text" id="mname" name="mname" placeholder="Middle Name (Optional)">
                        </div>
                        <div class="form-group col-sm-3">
                          <input class="form-control" type="text" id="suffix" name="suffix" placeholder="Suffix (Optional) eg. jr., II...">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-sm-3">
                            Extension
                              <input class="form-control" type="text" id="exten" name="exten" placeholder="eg. Phd., CCNA...">
                        </div>
                        <div class="form-group col-sm-3">
                            Title
                              <input class="form-control" type="text" id="title" name="title" placeholder="eg. Mr., Mrs., Doc...">
                        </div>
                        <div class="form-group col-sm-3">
                              Gender<span style="color:red">*</span>
                                <select class="form-control" id="sex" name="sex" required> 
                                  <option class="select-item" value=""  disabled selected>Choose Option</option>
                                  <option class="select-item" value="Male">Male</option>
                                  <option class="select-item" value="Female">Female</option>
                                  <option class="select-item" value="None">Prefer Not to Mention</option>
                                </select>
                             
                        </div>
                        <div class="form-group col-sm-3">
                            Nationality<span style="color:red">*</span>
                                <input class="form-control" type="text" id="nationality" name="nationality" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-sm-3">
                              Civil Status<span style="color:red">*</span>
                                  <select class="form-control" id="civil" name="civil" required>         
                                    <option value="" selected disabled>Choose Option</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                  </select>
                          </div>
                        <div class="form-group col-sm-3">
                             Birth Date<span style="color:red">*</span>
                            <input class="form-control" type="date" id="birthdate" name="birthdate" required>
                         </div>
                         <div class="form-group col-sm-3">
                              Religion<span style="color:red">*</span>
                                  <input class="form-control" type="text" id="religion" name="religion">
                          </div>
                          <div class="form-group col-sm-3">
                              Contact Number<span style="color:red">*</span>
                                  <input class="form-control" type="Number" id="contact" name="contact" required>
                          </div>
                      </div>

                      <div class="row">
                         <div class="form-group col-sm-4">
                              Email Address<span style="color:red">*</span>
                                  <input class="form-control" type="email" id="email" name="email" placeholder="@email.com" required>
                          </div>
                          <div class="form-group col-sm-8">
                              Full Address<span style="color:red">*</span>
                                  <input class="form-control" type="address" id="address" name="address" placeholder="Block & Lot, St., Purok/Village/Sub., Barangay, City/Municipality, Province, Zip Code" required>
                          </div> 
                      </div>

                      <h5 class="font-weight-bold" id="ereka">Employment Information</h5>

                      <div class="row">
                        <div class="form-group col-sm-3">
                              Employee Type<span style="color:red">*</span>
                                <select class="form-control" id="type" name="type" onchange="changeElementAttr();" required>
                                  <option class="select-item" disabled selected>Choose Option</option>
                                  <option value="Faculty">Faculty</option>
                                  <option value="Staff">Staff</option>
                                  <option value="Coordinator">Coordinator</option>
                                  <option value="Faculty Head">Faculty Head</option>
                                  <option value="Medical Personnel">Medical Personnel</option>
                                </select>

                        </div>

                        <script type="text/javascript">
                        function changeElementAttr(){
                          var e = document.getElementById("type");
                                      var d = e.options[e.selectedIndex].value;
                                      if (d === "Medical Personnel") {
                                          document.getElementById("hon").style.display = "";
                                          document.getElementById("spec").style.display = "";
                                          document.getElementById("lic").style.display = "";
                                          document.getElementById("ptr").style.display = "";
                                          document.getElementById("s2").style.display = "";
                                          
                                          document.getElementById("honorofic").required = "true";
                                          document.getElementById("specialty").required = "true";
                                          document.getElementById("license").required = "true";
                                          document.getElementById("ptr").required = "true";
                                          document.getElementById("s2").required = "true";

                                          document.getElementById("pos_input").style.display = "none";
                                          document.getElementById("position").removeAttribute("required");
                                          document.getElementById("pos_dropdown").style.display = "";
                                          document.getElementById("position2").required = "true";
                                          
                                      }else{
                                          document.getElementById("hon").style.display = "none";
                                          document.getElementById("spec").style.display = "none";
                                          document.getElementById("lic").style.display = "none";
                                          document.getElementById("ptr").style.display = "none";
                                          document.getElementById("s2").style.display = "none";
                                          
                                          document.getElementById("honorofic").removeAttribute("required");
                                          document.getElementById("specialty").removeAttribute("required");
                                          document.getElementById("license").removeAttribute("required");
                                          document.getElementById("ptr").removeAttribute("required");
                                          document.getElementById("s2").removeAttribute("required");

                                          document.getElementById("pos_input").style.display = "";
                                          document.getElementById("position").required = "true";
                                          document.getElementById("pos_dropdown").style.display = "none";
                                          document.getElementById("position2").removeAttribute("required");
                                      }

                                      if (d == "Coordinator" || d == "Faculty Head") {
                                          document.getElementById("level").selectedIndex = 1;
                                      }
                                      else if(d == "Faculty" || d == "Staff") {
                                        document.getElementById("level").selectedIndex = 2;
                                      }
                                      else{
                                        document.getElementById('level').value = 3;
                                      }

                                      if (d == "Coordinator" || d == "Staff" || d == "Medical Personnel") {
                                             document.getElementById("department").disabled = "true";
                                             document.getElementById("department").removeAttribute("required");
                                             document.getElementById("department").selectedIndex = 0;
                                      }else{
                                             document.getElementById("department").removeAttribute("disabled");
                                             document.getElementById("department").removeAttribute("required");
                                      }

                                      if (d == "Faculty Head" || d == "Faculty") {
                                             document.getElementById("office").disabled = "true";
                                             document.getElementById("office").removeAttribute("required");
                                             document.getElementById("office").selectedIndex = 0;
                                      }else{
                                             document.getElementById("office").removeAttribute("disabled");
                                             document.getElementById("office").removeAttribute("required");
                                      }
                        }
                      </script>

                        <div class="form-group col-sm-3">
                              Office<span style="color:red">*</span>
                                <select class="form-control" id="office" name="office" required>
                                  <option value="" selected disabled>Choose Option</option>
                                  <?php
                                  $result=mysqli_query($conn, "SELECT * FROM office");               
                                  while($resu = mysqli_fetch_array($result)) { 
                                    $value= $resu['office_id']; ?>
                                    <option class="select-item" value="<?php echo $value; ?>"><?php echo $resu['office_name'];?></option><?php } ?>
                                </select>
                        </div>
                        <div class="form-group col-sm-3">
                              Access Level<span style="color:red">*</span>
                                <select class="form-control" id="level" name="level" required>
                                  <option value="0" selected disabled>Choose Option</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                </select>
                        </div>
                        <div class="form-group col-sm-3">
                              Password<span style="color:red">*</span>
                                  <input class="form-control" type="text" id="password" name="password" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-sm-3">
                              Job Status<span style="color:red">*</span>
                                  <select class="form-control" id="employment" name="employment" required>                    
                                    <option value="" selected disabled>Choose Option</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Casual">Casual</option>
                                    <option value="Job Order">Job Order</option>
                                  </select>
                                        
                        </div>
                        <div class="form-group col-sm-3">
                              Position<span style="color:red">*</span>
                                  <div id="pos_input">
                                    <input class="form-control" type="text" id="position" name="position" required>
                                  </div>
                                  <div id="pos_dropdown" style="display:none;">
                                    <select class="form-control" id="position2" name="position2" required>                    
                                    <option value="" selected disabled>Choose Option</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Dentist">Dentist</option>
                                    <option value="Nurse">Nurse</option>
                                  </select>
                                </div>
                        </div>
                        <div class="form-group col-sm-6">
                              Department<span style="color:red">*</span>
                                  <select class="form-control" id="department" name="department" required>
                                    <option value="" selected disabled>Choose Option</option>
                                    <?php
                                    $result=mysqli_query($conn, "SELECT * FROM department");               
                                    while($resu = mysqli_fetch_array($result)) { 
                                      $value= $resu['dept_id']; ?>
                                      <option class="select-item" value="<?php echo $value; ?>"><?php echo $resu['dept_name'];?></option>
                                    <?php } ?>
                                  </select>
                        </div>
                      </div>

                      <div class="row" >       
                        <div class="form-group col-sm-3" id="hon" style="display:none;">
                              Professional Honorific<span style="color:red">*</span>
                                  <input class="form-control" type="text" id="honorofic" name="honorofic">
                        </div>
                        <div class="form-group col-sm-3" id="spec" style="display:none;">
                              Medical Specialty<span style="color:red">*</span>
                                  <input class="form-control" type="text" id="specialty" name="specialty">
                        </div>
                        <div class="form-group col-sm-2" id="lic" style="display:none;">
                              License No.<span style="color:red">*</span>
                              <input class="form-control" type="text" id="license" name="license">
                        </div>  
                        <div class="form-group col-sm-2" id="ptr" style="display:none;">
                              PTR No.<span style="color:red">*</span>
                                <input class="form-control" type="text" id="ptr" name="ptr">
                        </div> 
                        <div class="form-group col-sm-2" id="s2" style="display:none;">
                              S2<span style="color:red">*</span>
                                <input class="form-control" type="text" id="s2" name="s2">
                        </div> 
                      </div>

                    </div>

                </div>    
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="submit">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </form>