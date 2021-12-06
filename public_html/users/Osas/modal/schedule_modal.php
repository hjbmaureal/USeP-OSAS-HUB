</td>
</tr>
</table>
                      <!-- schedule -->
                  <form method="POST" action="../../php/schedule.php">
                    <div class="modal fade" id="sched-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Complaint Settlement Schedule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">                        
                              <div class="row">
                                  <div class="col ml-5 mr-5 ">

                                      <div class="row">
                                    <div class="col-4">
                                      <div class="form-group fg">
                                        <label class="control-label">Date & Time:</label>
                                       
                                  </div>
                                </div>
                                <div class="col">
                                      <div class="form-group fg">                                        
                                        <input type="hidden" class="form-control" id="complaint" name="complain_ID" value="<?php echo $res['Complaint_ID']?>">           
                                        <input type="hidden" class="form-control" id="response" name="response_id" value="<?php echo $res['response_id']?>"> 
                                        <input type="text" name="appdate" id="appdate" class="form-control datepicker" placeholder="MM/DD/YY HH:MM" autocomplete="off" onkeydown="return false" required="">
                                        <!-- <input class="form-control" id="date" name="date" type="date">  -->
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                      <div class="form-group fg">
                                        <!-- <input class="form-control" id="time" name="time" type="time">  -->
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                    <div class="col-4">
                                      <div class="form-group fg">
                                        <label class="control-label mr-2">Meeting Type:</label>
                                  </div>
                                </div>
                                <div class="col">
                                      <div class="form-group fg">
                                         <div class="form-group fg">
                                    <select class="form-control" id="exampleSelect1" name="meet_type" onChange="checkOption(this)">
                                    <option value=""  >Select</option>
                                      <option value="Google Meet">Google Meet</option>
                                      <option value="Zoom">Zoom</option>
                                    </select>
                                  </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                    <div class="col-4">
                                      <div class="form-group fg">
                                        <label class="control-label mr-2">Meeting Link:</label>
                                  </div>
                                </div>
                                <div class="col">
                                      <div class="form-group fg">
                                        <input class="form-control" id="meet_link" name="meet_link" type="text"> 
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                    <div class="col-4">
                                      <div class="form-group fg">
                                        <label class="control-label mr-2">Meeting ID:</label>
                                  </div>
                                </div>
                                <div class="col">
                                      <div class="form-group fg">
                                        <input class="form-control" id="meet_id" name="meet_id" type="text"> 
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                    <div class="col-4">
                                      <div class="form-group fg">
                                        <label class="control-label mr-2">Passcode:</label>
                                  </div>
                                </div>
                                <div class="col">
                                      <div class="form-group fg">
                                        <input class="form-control" id="passcode" name="passcode" type="text"> 
                                  </div>
                                </div>
                              </div>
                              

                                  </div>
                              </div>
                              
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-success" >Set Appointment</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                      <!-- Main JS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">

function checkOption(obj) {
    var input1 = document.getElementById("meet_id");
    var input = document.getElementById("passcode");

    input1.disabled = obj.value == "Google Meet";
    input.disabled = obj.value == "Google Meet";
}

</script>
<!--DATE TIME PICKER -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/js/bootstrap-datetimepicker.js"></script>
<link href="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet"/>



<?php 
include('../../conn.php');
                                   $results[]= '';$disableTimeArr[]=''; $i=0;$count=0;
                                                        $from= date('Y-m-d'); 
                                                        $sql="SELECT DATE_FORMAT(date_schedule, '%d') as dy,date_schedule, time_from FROM `response` WHERE date_schedule > '$from'";
                                                        $result = mysqli_query($conn, $sql);

                                                        while($row = mysqli_fetch_assoc($result)){

                                                          /*collect all schedule by hours(format-11/27/2021:8)*/
                                                          $hourholder=date('h', strtotime($row['time_from']));
                                                          $hourRemoveLeadingZero=ltrim($hourholder, "0");
                                                          $dateholder=date('m/d/Y',strtotime($row['date_schedule']));
                                                          $timeToDisableVar=$dateholder.':'.$hourRemoveLeadingZero;
                                                          $disableTimeArr[]='"'.$timeToDisableVar.'"';
                                                          
                                                          /*count the number of schedule, if >= 6 disable dates*/
                                                          $sql2="SELECT DATE_FORMAT(date_schedule, '%d') as dy, date_schedule FROM `response` WHERE  date_schedule > '$from' and DATE_FORMAT(date_schedule, '%d')";
                                                        $result2 = mysqli_query($conn, $sql2);
                                                       
                                                        while($row2 = mysqli_fetch_assoc($result2)){
                                                          if ($row['dy']==$row2['dy']) {
                                                            $count++;
                                                            if ($count==6) {
                                                              $time= strtotime($row['date_schedule']);
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