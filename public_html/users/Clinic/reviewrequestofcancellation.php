<div class="modal fade " id="exampleModalLong<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Review Request Cancellation of Appointment</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    <div class="modal-body c">
    <div class="container">
    <form method="post">
      <div class="form-group row">
        <label class="control-label col-md-4">Patient Name:</label>
        <div class="col-md-8">
    <input class="form-control col-md-8" type="hidden" name="patient_id" id="username" value="<?php echo htmlentities($row['patient_id']);?>" required>
    <input class="form-control col-md-8" type="hidden" name="idx" id="idx" value="<?php echo htmlentities($row['id']);?>" required><b>
         <?php echo htmlentities($row['name']);?></b>
          <span id="availability"></span> </div>
      </div>
    
      <div class="form-group row">
        <label class="control-label col-md-4">Date of Request:</label>
    <div class="col-md-8">
      <b><?php echo $date1;?></b> 
    <br>
    
          </div>
        </div>
    <div class="form-group row">
        <label class="control-label col-md-4">Consultation Type:</label>
        <div class="col-md-8">
    <input class="form-control col-md-8" type="hidden" name="username" id="username" value="<?php echo htmlentities($row['consultation_type']);?>" required>
         <b><?php echo htmlentities($row['consultation_type']);?></b>
          <span id="availability"></span> </div>
      </div>
    <div class="form-group row">
        <label class="control-label col-md-4">Reason/s for Cancellation:</label>
       <div class="col-md-8" style="color:red; font-style:italic;">
         <?php echo htmlentities($row['reason_cancel']);?>
          <span id="availability"></span> </div>
      </div>
    
     <center><label class="control-label col-md-8">**Admin Remarks**</label></center>
     <br> 
    <div class="form-group row">
        <label class="control-label col-md-4">Request Status:</label>
        <div class="col-md-8">
          <select  name="reqstat" id="reqstat" class="form-control col-md-8" required>
                             <option value="Request Granted">Request Granted</option>
               <option value="Request Denied">Request Denied</option>
        
        </select>
        </div>
    </div>
       <div class="form-group row">
        <label class="control-label col-md-4">Comment/s:</label>
     <div class="col-md-8">
          <textarea class="form-control" type="text" name="comments" id="comments" placeholder="//Comments" rows="5"></textarea>
    </div>
    </div>
      </div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="reviewcancelappointment">Submit</button>
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