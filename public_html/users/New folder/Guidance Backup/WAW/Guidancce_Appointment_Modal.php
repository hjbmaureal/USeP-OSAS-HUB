<?php include('../../conn.php');?>
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


                <div class="modal fade " id="appointmentEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <form action="updateGuidanceAppointment.php" method="POST">  
                             <?php 
                                if($sqlselect =mysqli_query($conn, "SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments join indv_counselling ON indv_counselling.appointment_id= guidance_appointments.appointment_id LEFT JOIN intake_form on indv_counselling.intake_id= intake_form.intake_id left join student on intake_form.Student_id=student.Student_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id left join course on course.course_id=student.course_id WHERE guidance_appointments.status_id = 3 and guidance_appointments.appointment_id='$id'")){
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
                                    <select class="form-control" id="exampleSelect1" name="mode" required="">
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
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                  <input class="form-control" type="date" id="date" required="" placeholder="Enter full name" name="date" value="<?php echo $result['appointment_date']; ?>">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" value="<?php echo $result['appointment_time']; ?>" name="time" id="time" required="">
                                </div>
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
                            
                  <form action="updateGuidanceAppointment.php" method="POST">  
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
                                    <select class="form-control" id="exampleSelect1" name="mode" required="">
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
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                  <input class="form-control" type="date" id="date" required="" placeholder="Enter full name" name="date" value="<?php echo $result['appointment_date']; ?>">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" value="<?php echo $result['appointment_time']; ?>" name="time" id="time" required="">
                                </div>
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
