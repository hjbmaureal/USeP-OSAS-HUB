<?php include('conn.php');?>

              <div class="modal fade " id="appointmentView<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

             
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <?php 
                              if($sqlselect =mysqli_query($conn, "SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments join indv_counselling ON indv_counselling.appointment_id= guidance_appointments.appointment_id LEFT JOIN intake_form on indv_counselling.intake_id= intake_form.intake_id left join student on intake_form.Student_id=student.Student_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id left join course on course.course_id=student.course_id WHERE guidance_appointments.status_id = 3 and guidance_appointments.appointment_id='$id'")){
                              $result=mysqli_fetch_array($sqlselect);
                          ?>
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo 'COUNSELLING'; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                          <form>  

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name</label><input class="form-control" type="text" placeholder="" value="<?php echo $result['last_name'].', '.$result['first_name'].' '.$result['middle_name'].' '.$result['suffix'];?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course & Year</label><input class="form-control" type="text" placeholder="" value="<?php echo $result['title'].' '.$result['year_level'];?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">Mode of Communication</label>
                                    
                                      <input class="form-control" type="text" placeholder="" value="<?php echo $result['communication_mode'];?>" readonly>
                                      
                                  </div>
                            </div>
                          </div>
                          <?php if ($result['link']!='') { ?>
                            <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="linklabel" >Link</label><input class="form-control" type="text" name="link" id="link" value="<?php echo $result['link'];?>" readonly="" >
                                </div>
                            </div>
                          </div>
                          <?php }if ($result['meeting_code']!='') { ?>
                            <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="codelabel">Code</label><input class="form-control" type="text" name="code" id="code" readonly="" value="<?php echo $result['meeting_code'];?>">
                                </div>
                            </div>
                          </div>
                          <?php }?>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                  <input class="form-control" type="date" value="<?php echo $result['appointment_date']; ?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" value="<?php echo $result['appointment_time']; ?>" readonly>
                                </div>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                      </div>
                      <?php }?>
                    </div>
                  </div>
                </div>

                <!-- ALERT Individual Appointment-->
                <div class="modal fade " id="appointmentCancel_indiv<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <?php $id=$id; ?>
             
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <?php 
                              if($sqlselect =mysqli_query($conn, "SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments join indv_counselling ON indv_counselling.appointment_id= guidance_appointments.appointment_id LEFT JOIN intake_form on indv_counselling.intake_id= intake_form.intake_id left join student on intake_form.Student_id=student.Student_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id left join course on course.course_id=student.course_id WHERE guidance_appointments.status_id = 3 and guidance_appointments.appointment_id='$id'")){
                              $result=mysqli_fetch_array($sqlselect);
                          ?>
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo 'COUNSELLING'; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                         <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                <center><h3>Are you sure to cancel the appointment?</h3></center>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <form  method="POST"> 
                          <input type="text" name="student_id" value="<?php echo $result['Student_id'];?>" hidden>
                          <input type="text" name="id" value="<?php echo $id;?>" hidden>
                          <button type="submit" name="CancelAppointment_indv" class="btn btn-success">YES</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">BACK</button>
                        
                        </form>
                      </div>
                      <?php }?>
                    </div>
                  </div>
                </div>


                <!-- end -->
                 <!-- ALERT Group Guidance Appointment-->
                <div class="modal fade " id="appointmentCancel_group<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <?php $id=$id; ?>
             
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
    
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo 'COUNSELLING'; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                         <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                <center><h3>Are you sure to cancel the Group Guidance appointment?</h3></center>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <form  method="POST"> 
                          <input type="text" name="id" value="<?php echo $id;?>" hidden>
                          <button type="submit" name="CancelAppointment_gg" class="btn btn-success">YES</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">BACK</button>
                        
                        </form>
                      </div>
                      
                    </div>
                  </div>
                </div>


                <!-- end -->
                  

                <div class="modal fade " id="appointmentEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">EDIT COUNSELLING APPOINTMENT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <?php $id=$id;?>
                      <div class="modal-body c">
                        <div class="container">
                  <form action="updateAppointment.php" method="POST">  
                             <?php 
                                if($sqlselect =mysqli_query($conn, "SELECT *, guidance_appointments.appointment_id as id, guidance_appointments.link as link, guidance_appointments.meeting_code FROM guidance_appointments join indv_counselling ON indv_counselling.appointment_id= guidance_appointments.appointment_id LEFT JOIN intake_form on indv_counselling.intake_id= intake_form.intake_id left join student on intake_form.Student_id=student.Student_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id left join course on course.course_id=student.course_id WHERE guidance_appointments.status_id = 3 and guidance_appointments.appointment_id='$id'")){
                              $result=mysqli_fetch_array($sqlselect);
                          ?>
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                  <label class="control-label">Student's Name</label>
                                  <input class="form-control" type="text" placeholder="" value="<?php echo $result['last_name'].', '.$result['first_name'].' '.$result['middle_name'].' '.$result['suffix'];?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course & Year</label><input class="form-control" type="text" placeholder="" value="<?php echo $result['title'].' '.$result['year_level'];?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">Mode of Communication</label>
                                    <select class="form-control" id="modecomIndiv<?php echo $id;?>" name="mode" required="">
                                      <?php
                                           $result2=mysqli_query($conn, "SELECT * FROM mode_of_communication");               
                                          while($res = mysqli_fetch_array($result2)) { 
                                            $value= $res['mode_id'];
                                              if($result['mode_id']==$res['mode_id']){ ?>
                                                  <option class="select-item" selected="selected" value="<?php echo $value; ?>" disabled><?php echo $res['communication_mode'];?></option>
                                              <?php }else{?>      
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['communication_mode'];?></option>
                                              <?php }} ?>
                                    </select>
                                  </div>
                            </div>
                          </div>
                         
                          <div class="calldivlinkI<?php echo $id;?>">
                             <?php if ($result['link']!='') { ?>
                            <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="linklabel<?php echo $id;?>" >Link</label><input class="form-control" type="text" name="link" id="link<?php echo $id;?>" value="<?php echo $result['link'];?>" readonly="" >
                                </div>
                            </div>
                          </div>
                          <?php }if ($result['meeting_code']!='') { ?>
                            <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="codelabel<?php echo $id;?>">Code</label><input class="form-control" type="text" name="code" id="code<?php echo $id;?>" readonly="" value="<?php echo $result['meeting_code'];?>">
                                </div>
                            </div>
                          </div>
                          <?php }?>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                    <input type="text"id="date" name="date" value="<?php echo $result['appointment_date']." ".$result['appointment_time'];?>" class="form-control datepicker" onkeydown="return false" placeholder="YY-MM-DD" autocomplete="off" required="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                             <!--  <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" value="<?php echo $result['appointment_time']; ?>" name="time" id="time" required="">
                                </div> -->
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                        <button type="submit" name="updatebut" class="btn btn-success">SAVE CHANGES</button>
                      </div>
                      <?php }?>
            </form>
                    </div>
                  </div>
                </div>


 <div class="modal fade " id="appointmentViewgroup<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

             
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <?php 
                              if($sqlselect =mysqli_query($conn, "SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments JOIN group_guidance on group_guidance.appointment_id=guidance_appointments.appointment_id JOIN mode_of_communication ON guidance_appointments.mode_id=mode_of_communication.mode_id JOIN course on course.course_id= group_guidance.course_id WHERE guidance_appointments.status_id='3' and guidance_appointments.appointment_id='$id'")){
                              $result=mysqli_fetch_array($sqlselect);
                          ?>
                        <h5 class="modal-title" id="exampleModalLongTitle"> <?php echo 'GROUP GUIDANCE'; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                          <form>  

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Topic</label><input class="form-control" type="text" placeholder="" value="<?php echo $result['topic'];?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Paticipants</label>
                                   <?php 
                                  $section=$result['section']; $year_level=$result['year_level'];
                                  if ($row['section']=='all') {
                                                  $section='';
                                                }if ($row['year_level']=='all') {
                                                  $year_level='';
                                                }?>
                                   <input class="form-control" type="text" placeholder="" value="<?php echo $row['title'].' '.$year_level.' '.$section;?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">Mode of Communication</label>
                                    
                                      <input class="form-control" type="text" placeholder="" value="<?php echo $result['communication_mode'];?>" readonly>
                                      
                                  </div>
                            </div>
                          </div>
                          <?php if ($result['link']!='') { ?>
                            <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="linklabel" >Link</label><input class="form-control" type="text" name="link" id="link" value="<?php echo $result['link'];?>" readonly="" >
                                </div>
                            </div>
                          </div>
                          <?php }if ($result['meeting_code']!='') { ?>
                            <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="codelabel">Code</label><input class="form-control" type="text" name="code" id="code" readonly="" value="<?php echo $result['meeting_code'];?>">
                                </div>
                            </div>
                          </div>
                          <?php }?>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                  <input class="form-control" type="date" value="<?php echo $result['appointment_date']; ?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" value="<?php echo $result['appointment_time']; ?>" readonly>
                                </div>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                      </div>
                      <?php }?>
                    </div>
                  </div>
                </div>


                <div class="modal fade " id="appointmentEditgroup<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <?php $id=$id; ?>
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">EDIT GROUP GUIDANCE APPOINTMENT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                  <form action="updateAppointment.php" method="POST">  
                             <?php 
                                if($sqlselect =mysqli_query($conn, "SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments JOIN group_guidance on group_guidance.appointment_id=guidance_appointments.appointment_id JOIN mode_of_communication ON guidance_appointments.mode_id=mode_of_communication.mode_id JOIN course on course.course_id= group_guidance.course_id WHERE guidance_appointments.status_id='3' and guidance_appointments.appointment_id='$id'")){
                              $result=mysqli_fetch_array($sqlselect);
                          ?>
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                  <label class="control-label">Topic</label>
                                  <input class="form-control" type="text" placeholder="" value="<?php echo $result['topic'];?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Paticipants</label>
                                  <?php 
                                  $section=$result['section']; $year_level=$result['year_level'];
                                  if ($row['section']=='all') {
                                                  $section='';
                                                }if ($row['year_level']=='all') {
                                                  $year_level='';
                                                }?>
                                   <input class="form-control" type="text" placeholder="" value="<?php echo $row['title'].' '.$year_level.' '.$section;?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">Mode of Communication</label>
                                    <select class="form-control" id="modecomg<?php echo $id;?>" name="mode" required="">
                                      <?php
                                           $result2=mysqli_query($conn, "SELECT * FROM mode_of_communication");               
                                          while($res = mysqli_fetch_array($result2)) { 
                                            $value= $res['mode_id'];
                                              if($result['mode_id']==$res['mode_id']){ ?>
                                                  <option class="select-item" selected="selected" value="<?php echo $value; ?>" disabled><?php echo $res['communication_mode'];?></option>
                                              <?php }else{?>      
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['communication_mode'];?></option>
                                              <?php }} ?>
                                    </select>
                                  </div>
                            </div>
                          </div>
                          <div class="calldivlinkg<?php echo $id;?>">
                              <?php if ($result['link']!='') { ?>
                            <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="linklabel<?php echo $id;?>" >Link</label><input class="form-control" type="text" name="link" id="link<?php echo $id;?>" value="<?php echo $result['link'];?>" readonly="" >
                                </div>
                            </div>
                          </div>
                          <?php }if ($result['meeting_code']!='') { ?>
                            <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label" id="codelabel<?php echo $id;?>">Code</label><input class="form-control" type="text" name="code" id="code<?php echo $id;?>" readonly="" value="<?php echo $result['meeting_code'];?>">
                                </div>
                            </div>
                          </div>
                          <?php }?>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                   <input type="text"id="date" name="date" value="<?php echo $result['appointment_date']." ".$result['appointment_time'];?>" class="form-control datepicker" onkeydown="return false" placeholder="YY-MM-DD" autocomplete="off" required="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                             <!--  <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" value="<?php echo $result['appointment_time']; ?>" name="time" id="time" required="">
                                </div> -->
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                        <button type="submit" name="updatebut" class="btn btn-success">SAVE CHANGES</button>
                      </div>
                      <?php }?>
            </form>
                    </div>
                  </div>
                </div>

 <div class="modal fade " id="createAppointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">EDIT COUNSELLING APPOINTMENT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                  <form method="POST">  
                    
                                                         <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Search Student ID: </label>
                                  <input class="form-control" type="text" name="studID" id="studID" placeholder="Student ID">
                                </div>
                            </div>
                          </div>
                          <div class="student_info">
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name</label>
                                  <input class="form-control" type="text" name="name" placeholder=""  readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course & Year</label><input class="form-control" type="text" placeholder=""  readonly>
                                </div>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">Mode of Communication</label>
                                    <select class="form-control" id="modecomcreate" name="mode" required="">
                                      <?php
                                           $result2=mysqli_query($conn, "SELECT * FROM mode_of_communication");               
                                          while($res = mysqli_fetch_array($result2)) { 
                                            $value= $res['mode_id'];
                                              if($result['mode_id']==$res['mode_id']){ ?>
                                                  <option class="select-item" selected="selected" value="<?php echo $value; ?>"><?php echo $res['communication_mode'];?></option>
                                              <?php }else{?>      
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['communication_mode'];?></option>
                                              <?php }} ?>
                                    </select>
                                  </div>
                            </div>
                          </div>
                          <div class="calldivlinkcreate">
                            
                          </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                   <input type="text"id="date" name="date" value="<?php echo $result['appointment_date']." ".$result['appointment_time'];?>" class="form-control datepicker" onkeydown="return false" placeholder="YY-MM-DD" autocomplete="off" required="">
                                </div>
                            </div>
                          </div>
                        
                          <div class="row">
                            <div class="col-sm">
                             <!--  <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" value="" name="time" id="time" required="">
                                </div> -->
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                        <button type="submit" name="ADDAPP" class="btn btn-success">ADD APPOINTMENT</button>
                      </div>
                 
            </form>
                    </div>
                  </div>
                </div>
<script type="text/javascript">
   $(document).ready(function(){
                  $("#studID").keyup(function(){
                  var txt = $(this).val();
                  var count = txt.length;

                  if (count>9) {
                       /*   alert(txt);*/
                          $.ajax({
                            url:"search_student_id2.php",
                            type:"POST",
                            data:{id:txt},
                            success:function(data){
                              $(".student_info").html(data);
                            },
                          });
                  }else{
                    /*$("#result").html('');*/
                  }

                });
                $("#modecomcreate").on('change', function(){
                    var mode = $(this).val();
                    /*alert(mode);*/
                    
                    $.ajax({
                          url:"filter_fblink.php",
                          type:"POST",
                          data:{mode: mode},
                          success:function(data){
                            $(".calldivlinkcreate").html(data);
                          },
                    });
                    
                  });
                $("#modecomg<?php echo $id;?>").on('change', function(){
                    var mode = $(this).val();
                    /*alert(mode);*/
                    
                    $.ajax({
                          url:"filter_fblink.php",
                          type:"POST",
                          data:{mode: mode},
                          success:function(data){
                            $(".calldivlinkg<?php echo $id;?>").html(data);
                          },
                    });
                    
                  });
                $("#modecomIndiv<?php echo $id;?>").on('change', function(){
                    var mode = $(this).val();
                   
                    $.ajax({
                          url:"filter_fblink.php",
                          type:"POST",
                          data:{mode: mode},
                          success:function(data){
                            $(".calldivlinkI<?php echo $id;?>").html(data);
                          },
                    });
                    
                  });
                });
</script>
<script type="text/javascript">
  

// required UPDATE APPOINTMENT

$(document).ready(function(){
$('select[name=mode]').blur(function(){
if($(this).val().length == 0){
document.getElementById('mode').style.backgroundColor='#FFCECE';
document.getElementById('mode').style.border='1px solid red';
}});
});
$(document).ready(function(){
$('input[name=date]').blur(function(){
if($(this).val().length == 0){
document.getElementById('date').style.backgroundColor='#FFCECE';
document.getElementById('date').style.border='1px solid red';
}});
});
$(document).ready(function(){
$('input[name=time]').blur(function(){
if($(this).val().length == 0){
document.getElementById('time').style.backgroundColor='#FFCECE';
document.getElementById('time').style.border='1px solid red';
}});
});

</script>