<?php include('conn.php');?>
               
  <div class="modal fade" id="setAppointment<?php echo $row['referral_id']; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      
 <?php
include('conn.php');
$referral_id=$row['referral_id'];
 $sqlselect=mysqli_query($conn,"SELECT referral_form.referral_id, referral_form.date_filed, referral_form.refdate_completed, referral_form.notes, staff.first_name as fname, staff.last_name as lname, staff.position, staff.e_signature, student.Student_id,student.first_name, student.last_name, student.year_level, student.section, student.phone_number, course.title from referral_form join staff USING(staff_id) join student USING(Student_id) join course USING(course_id) where referral_id='$referral_id'");
$set=mysqli_fetch_array($sqlselect);?>

                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">SET APPOINTMENT FOR REFERRALS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">  
                      <div class="modal-body c">
                        <div class="container">
                          
                            <input type="hidden" name="ref_id" id="ref_id" value="<?php echo $row['referral_id']; ?>" readonly="">
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">ID Number</label><input class="form-control" type="text" name="setID" id="setID" value="<?php echo $row['Student_id']; ?>" readonly="">
                                </div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name</label><input class="form-control" type="text" name="setStud" id="setStud" value="<?php echo $row['first_name'].' '.$row['last_name']; ?>" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course & Year</label><input class="form-control" type="text" name="setCourse" id="setCourse" value="<?php echo $row['title'].'- '.$row['year_level']; ?>" readonly="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">Mode of Communication</label>
                                    <select class="form-control" id="modecom<?php echo $referral_id;?>" name="mode" required="">
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
                          <div class="calldivlink<?php echo $referral_id;?>">
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                  <input type="text" name="date_app" id="date_app" class="form-control datepicker" placeholder="MM/DD/YY" autocomplete="off" required="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                          <!--   <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" name="time_app" id="time_app" required="">
                                </div>
                            </div> -->
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                    <button type="submit" name="SetAppointment" class="btn btn-success">SET APPOINTMENT</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                    </div>
                    </form>
                    </div>
                  </div>
                </div>
                <div class="modal fade " id="warning<?php echo $row['referral_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <?php $id=$row['referral_id'];?>
                  
                  <form method="POST">

                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                          <input type="text" name="referral_id" hidden="hidden"value="<?php echo $id;?>">
                          <h4>The student referred has not yet filled out the intake form. Advice the student to fill up the intake form before scheduling a counselling.</h4>
                        </div>
                      </div>
                      <div class="modal-footer">
                    
                            <button type="submit" name="SetNotification" class="btn btn-success">NOTIFY STUDENT</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                      
                    </div>
                    </div>
                    </form>
                  </div>
                </div>
                <script type="text/javascript">
    $(document).ready(function(){
                  $("#modecom<?php echo $referral_id;?>").on('change', function(){
                    var mode = $(this).val();
                    /*alert(mode);*/
                    
                    $.ajax({
                          url:"filter_fblink.php",
                          type:"POST",
                          data:{mode: mode},
                          success:function(data){
                            $(".calldivlink<?php echo $referral_id;?>").html(data);
                          },
                    });
                    
                  });
                });
</script>


                 <!-- DATEPICKER -->
<?php 
                 $results[]= '';$disableTimeArr[]=''; $i=0;$count=0;
                $from= date('Y-m-d'); 
                $sql="SELECT DATE_FORMAT(appointment_date, '%d') as dy,appointment_date, appointment_time FROM `guidance_appointments` WHERE appointment_date > '$from'";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){

                  /*collect all schedule by hours(format-11/27/2021:8)*/
                  $hourholder=date('h', strtotime($row['appointment_time']));
                  $hourRemoveLeadingZero=ltrim($hourholder, "0");
                  $dateholder=date('m/d/Y',strtotime($row['appointment_date']));
                  $timeToDisableVar=$dateholder.':'.$hourRemoveLeadingZero;
                  $disableTimeArr[]='"'.$timeToDisableVar.'"';
                  
                  /*count the number of schedule, if >= 6 disable dates*/
                  $sql2="SELECT DATE_FORMAT(appointment_date, '%d') as dy, appointment_date FROM `guidance_appointments` WHERE  appointment_date > '$from' and DATE_FORMAT(appointment_date, '%d')";
                $result2 = mysqli_query($conn, $sql2);
               
                while($row2 = mysqli_fetch_assoc($result2)){
                  if ($row['dy']==$row2['dy']) {
                    $count++;
                    if ($count==6) {
                      $time= strtotime($row['appointment_date']);
                    $holder=date('d-m-Y', $time);
                    $results[] = '"'.$holder.'"';
                    }
                    # code...
                  }
                  
                }
                    
                } 
                $results=array_filter($results);
                $totaldayslist= implode(", ", $results);
                $disableTimeArr=array_filter($disableTimeArr);
                $timeToDisable= implode(", ", $disableTimeArr);
                ?>
                <!-- DISABLE DATESCHEDULE -->
<script type="text/javascript">
    var disabledtimes_mapping = [<?php echo $timeToDisable;?>];
    var datesForDisable = [<?php echo $totaldayslist;?>];
function formatDate(datestr)
{
    var date = new Date(datestr);
    var day = date.getDate(); day = day>9?day:"0"+day;
    var month = date.getMonth()+1; month = month>9?month:"0"+month;
    return month+"/"+day+"/"+date.getFullYear();
}

$(".datepicker").datetimepicker({
    format: 'yyyy/mm/dd hh:ii',
    startDate: new Date(),
    datesDisabled: datesForDisable,
    daysOfWeekDisabled: [0,6],
    autoclose: true,
    onRenderHour:function(date){
  if(disabledtimes_mapping.indexOf(formatDate(date)+":"+date.getUTCHours())>-1)
    {
        return ['disabled'];
    }
    }
});</script>
