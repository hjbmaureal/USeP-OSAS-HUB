
<div class="modal fade " id="exampleModalLong<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo htmlentities($row['patient_id']);?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body c">
        <div class="container" style="border: 1px solid black; margin-top: 10px; padding: 20px; border-radius: 10px;">
          
      <div class="id-picture"> 
          <object data="data:image/jpeg;base64,<?php echo base64_encode($image_data); ?>" width="165px" height="165px">
                                    <div style="text-align: right;  margin-right: 45px; margin-top: 4%;">
                                      <img id="e_sig" src="image/logo.png" alt="logo" width="150px" height="150px" >
                                    </div>
          </object>

                                    <br>

          <a href="patient-profiles.php?patient_id=<?php echo $row["patient_id"]; ?>" target="_blank">
            <button class="btn btn-danger btn-sm" style="width: 100%; margin-top: 5px; font-size: 10px;"><i class="fas fa-exclamation-triangle"></i> View Medical Info/History </button>
            </a></div>
          <h5 class="font-weight-bold" style="margin-bottom: 20px; margin-top: 10px;">Patient Basic Information</h5>
          <h6 class="font-weight-bold">ID Number: <span class="font-weight-lighter ml-6"> <?php echo htmlentities($row['patient_id']);?></span></h6>
          <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['first_name']);?> <?php echo htmlentities($row['last_name']);?></span></h6>
          <?php
                            			$date= date('Y-m-d');
                            			$agetotal=$row['birth_date'];
                            			$diff = date_diff(date_create($agetotal), date_create($date));
                            				?>
          <h6 class="font-weight-bold">Age: <span class="font-weight-lighter ml-6"><?php echo $diff->format('%y');?>&nbsp;years old </span></h6>
          <h6 class="font-weight-bold">Civil Status: <span class="font-weight-lighter ml-6"> <?php echo htmlentities($row['civil_status']);?></span></h6>
          <h6 class="font-weight-bold">Sex: <span class="font-weight-lighter ml-2"><?php echo htmlentities($row['sex']);?></span></h6>
          <h6  class="font-weight-bold">Year level: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['year_level']);?></span></h6>
          <h6 class="font-weight-bold">Course/Department: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['title']);?></span></h6>
          <br>
          <br>
          <h5 class="font-weight-bold">Complaints: </h5>
          <div class="complaints">
            <h6  class="font-weight-bold"><?php echo htmlentities($row['problems']);?></h6>
          </div>
          <br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" href="#exampleModalLong2<?php echo $row['id']; ?>">Accept</button>
      </div>
    </div>
  </div>
</div>
<!--set appointment modal-->


<div class="modal fade " id="exampleModalLong2<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">SET APPOINTMENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body c">
        <div class="container">
          <form method="post">
            <div class="row">
            <div class="col-sm">
            <div class="appointment_box">
              <h6 class="font-weight-bold">Type of Consultation:
                <input type="hidden" name="type" class="form-control" value="<?php echo htmlentities($row['consultation_type']);?>">
                <span class="font-weight-lighter ml-6"><?php echo htmlentities($row['consultation_type']);?></span></h6>
             
              <span class="font-weight-lighter ml-6"></span></h5>
              <h6 class="font-weight-bold">Patient ID:
                <input type="hidden" name="id" class="form-control" value="<?php echo htmlentities($row['patient_id']);?>">
                <span class="font-weight-lighter ml-6"><?php echo htmlentities($row['patient_id']);?></span></h6>
              <h6 class="font-weight-bold">Patient Name:
                <input type="hidden" name="name" class="form-control" value=" <?php echo htmlentities($row['name']);?>">
                <span class="font-weight-lighter ml-2"><?php echo htmlentities($row['name']);?></span></h6>
              <h6 class="font-weight-bold">Email:
                <input type="hidden" name="email" class="form-control" value="<?php echo htmlentities($row['email_add']);?>">
                <span class="font-weight-lighter ml-6"><?php echo htmlentities($row['email_add']);?></span></h6>
              <br>
              <div class="form-row">


			  <div class="form-group row">
			    <label class=" control-label col-md-12"><b>Mode of Communication (1st Option)</b></label>
          <div class="col-md-6">
                 <select  name="mode2" id="mode2" class="form-control" onchange="showTextBox2()" >
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
			  </div>
			  
			   <div class="form-group row">
			    <label class=" control-label col-md-8"><b>Mode of Communication (2nd Option)</b></label>
          <div class="col-md-6">
                 <select  name="mode" id="mode" class="form-control">
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
				   
			  </div>
			 
            <div class="form-group row">
                <label class=" control-label col-md-8"><b>Meeting Time:</b></label>

                      <div class="col-md-10">
                      <input type="text" name="appdate" id="appdate" class="form-control datepicker" placeholder="YY/MM/DD" autocomplete="off" onKeyDown="return false" required="">
										 <span id="availability"></span>

								 <input type="hidden" name="patient_id" class="form-control" value="<?php echo htmlentities($row['patient_id']);?>">
								 <input type="hidden" name="id" class="form-control" value="<?php echo htmlentities($row['id']);?>"> 
								
                </div>
           </div>

									 <?php 

                 $results[]= '';$disableTimeArr[]=''; $i=0;$count=0;
                $from= date('Y-m-d'); 
                $sql="SELECT DATE_FORMAT(appointment_date, '%d') as dy,appointment_date, appointment_timefrom FROM `consultation` WHERE appointment_date > '$from'";
                $result = mysqli_query($db, $sql);

                while($row = mysqli_fetch_assoc($result)){

                  /*collect all schedule by hours(format-11/27/2021:8)*/
                  $hourholder=date('H', strtotime($row['appointment_timefrom']));
                  $hourRemoveLeadingZero=ltrim($hourholder, "0");
                  $dateholder=date('m/d/Y',strtotime($row['appointment_date']));
                  $timeToDisableVar=$dateholder.':'.$hourRemoveLeadingZero;
                  $disableTimeArr[]='"'.$timeToDisableVar.'"';
                  
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
                $timeToDisable= implode(", ", $disableTimeArr);
                ?>
									 
									   <div class="form-group row">
                                    <label class="control-label col-md-8"><b>Google meet link<i>(for video call clients only)</i>:</b></label>

                                  <div class="col-md-12">

                                         <input type="text" class="form-control" name="link" id="inputEmail4" placeholder="Paste google meet link here">
                                 </div>
									  </div>
		 
							  
							 
                              </div>
							 
                              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" name="appointment">Set</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
                <!-- DISABLE DATESCHEDULE -->


	

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
    hoursDisabled: [0, 1, 2, 3, 4, 5, 6, 7,18, 19, 20, 21, 22, 23],
    daysOfWeekDisabled: [0,6],
    autoclose: true
});</script>
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
	
