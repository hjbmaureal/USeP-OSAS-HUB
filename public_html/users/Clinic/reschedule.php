<div class="modal fade " id="exampleModalLong2<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #2B4550">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">RESCHEDULE APPOINTMENT</h5>
        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body c">
        <div class="container">
          <form method="post">
            <div class="row">
            <div class="col-sm">
            <div class="appointment_box">
              <h5 class="font-weight-bold">Type of Consultation:
                <input type="hidden" name="type" class="form-control" value="<?php echo htmlentities($row['consultation_type']);?>">
                <span class="font-weight-lighter ml-6"><?php echo htmlentities($row['consultation_type']);?></span></h5>
             
              <span class="font-weight-lighter ml-6"></span></h5>
              <h5 class="font-weight-bold">Patient ID:
                <input type="hidden" name="id" class="form-control" value="<?php echo htmlentities($row['patient_id']);?>">
                <span class="font-weight-lighter ml-6"><u><?php echo htmlentities($row['patient_id']);?></u></span></h5>
              <h5 class="font-weight-bold">Patient Name:
                <input type="hidden" name="name" class="form-control" value=" <?php echo htmlentities($row['name']);?>">
                <span class="font-weight-lighter ml-2"><u> <?php echo htmlentities($row['name']);?></u></span></h5>
              <h5 class="font-weight-bold">Email:
                <input type="hidden" name="email" class="form-control" value="<?php echo htmlentities($row['email_add']);?>">
                <span class="font-weight-lighter ml-6"><u><?php echo htmlentities($row['email_add']);?></u></span></h5>
              <br>
              <div class="form-row">
			  <div class="form-group col-md-6">
			    <label class=" control-label"><b>Mode of Communication(1st Option)</b></label>
                 <select  name="mode2" id="mode2" class="form-control" onchange="showTextBox2()" readonly>
                    <option value="<?php echo htmlentities($row['communication_mode_first_option']);?>"><?php echo htmlentities($row['communication_mode_first_option']);?></option>
                    <?php
										// Feching active mode of communication
										$sql=mysqli_query($db,"select * from mode_of_communication");
										while($result=mysqli_fetch_array($sql))
										{    
										?>
                    <option class="select-item" value="<?php echo htmlentities($result['communication_mode']);?>"><?php echo htmlentities($result['communication_mode']);?></option>
                    <?php }
										
										?>
                  </select>
				   
			  </div>
			  
			   <div class="form-group col-md-6">
			    <label class=" control-label"><b>Mode of Communication(2nd Option)</b></label>
                 <select  name="mode" id="mode" class="form-control" readonly>
                    <option value="<?php echo htmlentities($row['communication_mode_second_option']);?>"><?php echo htmlentities($row['communication_mode_second_option']);?></option>
                    <?php
										// Feching active mode of communication
										$sql=mysqli_query($db,"select * from mode_of_communication");
										while($result=mysqli_fetch_array($sql))
										{    
										?>
                    <option class="select-item" value="<?php echo htmlentities($result['communication_mode']);?>"><?php echo htmlentities($result['communication_mode']);?></option>
                    <?php }
										
										?>
                  </select>
				   
			  </div>
			 
                                     <div class="form-group col-md-6">
                                        <label class=" control-label"><b>Meeting Time:</b></label>
                                        <input type="text" name="appdate" id="appdate" class="form-control datepicker" placeholder="<?php echo htmlentities($row['appointment_date']);?> <?php echo htmlentities($row['appointment_timefrom']);?>" autocomplete="off" onKeyDown="return false" required="">
										 <span id="availability"></span>
								 <input type="hidden" name="patient_id" class="form-control" value="<?php echo htmlentities($row['patient_id']);?>">
								 <input type="hidden" name="id" class="form-control" value="<?php echo htmlentities($row['id']);?>"> 
								
                                      </div>
									
									 
									  
									  <?php if ($row['communication_mode_first_option']=="Google Meet" || $row['communication_mode_second_option']=="Google Meet"){ ?>
									
                                      <div class="form-group col-md-12">
                                        <label class=" control-label"><b>Google meet link:</b></label>
                                         <input type="text" class="form-control" name="link" id="link" value="<?php echo htmlentities($row['appointment_meetinglink']);?>" required>
                                      </div>
									
                              
							  <?php
							  }else{?>
							
							  <?php
							  }?>
									  
									  <?php 

                 $results[]= '';$disableTimeArr[]=''; $disableTimeArr2[]=''; $i=0;$count=0;
                $from= date('Y-m-d'); 
                $sql="SELECT DATE_FORMAT(appointment_date, '%d') as dy,appointment_date, appointment_timefrom, consultation_duration FROM `consultation` WHERE appointment_date > '$from' order by appointment_timefrom asc";
                $result = mysqli_query($db, $sql);

                while($row = mysqli_fetch_assoc($result)){

                  /*collect all schedule by hours(format-11/27/2021:8)*/
                  // var_dump($row['appointment_timefrom']);
                  $hourholder=date('H', strtotime($row['appointment_timefrom']));
                  // var_dump($hourholder);
                  $hourRemoveLeadingZero=ltrim($hourholder, "0");
                  $dateholder=date('m/d/Y',strtotime($row['appointment_date']));
                  $dateholder2=date('Y/m/d',strtotime($row['appointment_date']));
                  $timeToDisableVar=$dateholder.':'.$hourRemoveLeadingZero;
                  $_timeToDisableVar=$dateholder2.':'.$hourRemoveLeadingZero;
                  $disableTimeArr[]='"'.$timeToDisableVar.'"';
                  $disableTimeArr2[]='"'.$_timeToDisableVar.'"';


                  $hourholder2=date('H:i', strtotime($row['consultation_duration']));
                  // var_dump($hourholder);
                  // $hourRemoveLeadingZero2=ltrim($hourholder2, "0");
                  $timeToDisableVar2=$dateholder.':'.$hourholder2;
                  $_timeToDisableVar2=$dateholder2.':'.$hourholder2;

                  $disableTimeArr[]='"'.$timeToDisableVar2.'"';
                  $disableTimeArr2[]='"'.$_timeToDisableVar2.'"';
                  
                  /*count the number of schedule, if >= 6 disable dates*/
                  $sql2="SELECT DATE_FORMAT(appointment_date, '%d') as dy, appointment_date FROM `consultation` WHERE  appointment_date > '$from' and DATE_FORMAT(appointment_date, '%d')";
                $result2 = mysqli_query($db, $sql2);
               
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
                $disableTimeArr2=array_filter($disableTimeArr2);
                $timeToDisable= implode(", ", $disableTimeArr);
                $timeToDisable2= implode(", ", $disableTimeArr2);
                ?>
							
								   
							
							    
							  
							 
                              </div>
							 
                              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" name="reschedule" >Set</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
                <!-- DISABLE DATESCHEDULE -->
<script type="text/javascript">
    var disabledtimes_mapping = [<?php echo $timeToDisable;?>];
    var disabledtimes_mapping2 = [<?php echo $timeToDisable2;?>];
    var datesForDisable = [<?php echo $totaldayslist;?>];
function formatDate(datestr)
{
    var date = new Date(datestr);
    var day = date.getDate(); day = day>9?day:"0"+day;
    var month = date.getMonth()+1; month = month>9?month:"0"+month;
    return month+"/"+day+"/"+date.getFullYear();
}
// console.log(disabledtimes_mapping);
$(".datepicker").datetimepicker({
    format: 'yyyy/mm/dd hh:ii',
    startDate: new Date(),
    datesDisabled: datesForDisable,
    daysOfWeekDisabled: [0,6],
    hoursDisabled: [0, 1, 2, 3, 4, 5, 6, 7,18, 19, 20, 21, 22, 23],
    autoclose: true
});


</script>
<script>
        function showTextBox2()
        {
          // document.write('option changed!');
          var v=document.getElementById("mode2");
          var v1=document.getElementById("links");
          if(v.value=="Google Meet")
          {
             v1.style.display='block';
          }
          else
          {
             v1.style.display='none';
          }
        }
     </script>
	
