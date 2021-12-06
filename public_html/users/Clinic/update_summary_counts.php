<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!--set appointment modal-->
<!--add -->
<?php
if(isset($_POST['AddEntry'])){			
   $patient_id= $_POST['username'];
   $mcomment= $_POST['mcomment'];	
   $service_type= $_POST['service_type'];
 $sql="INSERT INTO medical_other_services_log(id_number,mservice_id,log_comments,date_avail) VALUES('$patient_id', '$service_type', '$mcomment',NOW())";
    if ($db->query($sql) === TRUE) {
  echo '<script>alert("Inserted successfully!");</script>';
   echo "<script type='text/javascript'> document.location = 'services_summary.php'; </script>";
  }else {
  echo '<script>alert("Failed!Try Again!"); </script>';
}
   } 
  
   ?>
<div class="modal fade " id="addentry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header" style="background-color: #2B4550">
      <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">Add Entry</h5>
      <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    <div class="modal-body c">
    <div class="container">
    <form method="post">
      <div class="form-group row">
        <label class="control-label col-md-4">Student ID No:</label>
        <div class="col-md-8">
          <input class="form-control col-md-8" type="text" name="username" id="username" placeholder="Enter ID No.">
          <span id="availability"></span> </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-md-4">Service Type:</label>
        <div class="col-md-8">
          <select  name="service_type" id="service_type" class="form-control col-md-8" required>
                                                 <?php
										// Feching active consultation type
										$sql=mysqli_query($db,"select * from clinic_services where service_type='3'");
										while($result=mysqli_fetch_array($sql))
										{    
										?>
										<option class="select-item" value="<?php echo htmlentities($result['service_id']);?>"><?php echo htmlentities($result['service_name']);?></option>
										<?php }
										
										?>
										</select>  
        </div>
      </div>
	  <div class="form-group row">
        <label class="control-label col-md-4">Comment:</label>
      
          <textarea class="form-control" type="text" name="mcomment" id="mcomment" placeholder="//Comment" rows="5"></textarea>
	  </div>
	    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="AddEntry">Add</button>
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

