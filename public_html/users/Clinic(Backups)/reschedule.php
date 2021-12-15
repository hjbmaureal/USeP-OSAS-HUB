 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/js/bootstrap-datetimepicker.js"></script>
<link href="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!--set appointment modal-->

<div class="modal fade " id="exampleModalLong2<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #2B4550">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">RESCHEDULE APPOINTMENT</h5>
        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body c">
        <div class="container">
          <form method="post" action="rescheduleapp.php">
            <div class="row">
            <div class="col-sm">
            <div class="appointment_box">
              <h5 class="font-weight-bold">Type of Consultation:
                <input type="hidden" name="type" class="form-control" value="<?php echo htmlentities($row['type']);?>">
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
        
         <div class="form-group col-md-6">
          <label class=" control-label"><b>Mode of Communication(2nd Option)</b></label>
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
       
                                      <div class="form-group col-md-6">
                                        <label class=" control-label"><b>Meeting Time:</b></label>
                                        <input type="text" name="date" id="appdate" class="form-control datepicker" placeholder="<?php echo htmlentities($row['appointment_date']);?> <?php echo htmlentities($row['appointment_timefrom']);?>" autocomplete="off" onKeyDown="return false" required>
                     <span id="availability"></span>
                 <input type="hidden" name="patient_id" class="form-control" value="<?php echo htmlentities($row['patient_id']);?>">
                 <input type="hidden" name="id" class="form-control" value="<?php echo htmlentities($row['id']);?>"> 
                
                                      </div>
                  
                    <div id="datestatus"> </div>
                                      <div class="form-group col-md-6">
                                        <label class=" control-label"><b>Estimated Duration:</b></label>
                                       <input type="text" name="start" class="form-control datepicker" placeholder="<?php echo htmlentities($row['consultation_duration']);?>" autocomplete="off" onKeyDown="return false" required>
                     </div>
                     
              
                   <div class="form-row">
                 <div id="links" style="display:none;margin-left:2px;margin-top:10px;">
                                      <div class="form-group col-md-12">
                                        <label class=" control-label"><b>Google meet link:</b></label>
                                         <input type="text" class="form-control col-md-12" name="link" id="inputEmail4" placeholder="Paste google meet link here">
                                      </div>
                    </div>
                              </div> 
                
               
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
$(".datepicker").datetimepicker({
    format: 'dd/mm/yyyy hh:ii p',
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
  
<script type="text/javascript">
$('.datepicker').datetimepicker('setHoursDisabled', [0, 1, 2, 3, 4, 5, 6, 7, 18, 19, 20, 21, 22, 23]);
</script>
