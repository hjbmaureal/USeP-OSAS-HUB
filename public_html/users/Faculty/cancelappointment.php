<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!--set appointment modal-->
<!--add -->

<div class="modal fade " id="exampleModalLong<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Request Cancellation of Appointment</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    <div class="modal-body c">
    <div class="container">
    <form method="post">
      <div class="form-group row">
        <label class="control-label col-md-4">Patient ID:</label>
        <div class="col-md-8">
    <input class="form-control col-md-8" type="hidden" name="username" id="username" value="<?php echo htmlentities($row['patient_id']);?>" required>
    <input class="form-control col-md-8" type="hidden" name="idx" id="idx" value="<?php echo htmlentities($row['id']);?>" required>
         <b><?php echo htmlentities($row['patient_id']);?></b>
          <span id="availability"></span> </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-md-4">Schedule:</label>
    <?php if($row['status']=="Pending") {
    ?>
    <div class="col-md-8">
    <b><?php echo htmlentities($row['status']);?></b>
          </div>
      <?php }else{?>
    <div class="col-md-8">
      <b><?php echo $date1;?> 
    <br>
    <?php echo htmlentities($row['appointment_timefrom']);?> - <?php echo htmlentities($row['consultation_duration']);?></b></div>
<?php 
}?>
      
        </div>
    <div class="form-group row">
        <label class="control-label col-md-4">Consultation Type:</label>
        <div class="col-md-8">
    <input class="form-control col-md-8" type="hidden" name="username" id="username" value="<?php echo htmlentities($row['consultation_type']);?>" required>
         <b><?php echo htmlentities($row['consultation_type']);?></b>
          <span id="availability"></span> </div>
      </div>
      <br>
    <div class="form-group row">
        <label class="control-label col-md-8">Reason/s for Cancellation of Appointment:</label>
      <div class="col-md-12">
          <textarea class="form-control" type="text" name="reason" id="reason" rows="3"></textarea>
      </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="cancelappointment">Submit</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>  
 $(document).ready(function(){  
   $('#username').blur(function(){

     var username = $(this).val();

     $.ajax({
      url:'check_id.php',
      method:"POST",
      data:{username:username},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-success">Registered!</span>');
        $('#service_type').attr("disabled", false);
       }
       else
       {
        $('#availability').html('<span class="text-danger">Not Registered. Please Register!</span>');
        $('#service_type').attr("disabled", true);
       }
      }
     })

  });
 });  
</script>

