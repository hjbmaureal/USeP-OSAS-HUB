<!DOCTYPE html>
<html>
<style>
  #registered{
    display:block;
  }
  #ext {
    display: none;
	
  }
    #medical {
    display: none;
	}
  </style>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!--set appointment modal-->
<!--add -->

<div class="modal fade" id="addentry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
    <div class="modal-header" style="background-color: #2B4550">
      <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">Add Entry<i>(For Extension only)</i></h5>
      <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    <div class="modal-body c">
    <div class="container">
    
	
	<form method="post">
	  
	   <div class="form-group row">
        <label class="control-label col-md-4">Patient Type:</label>
        <div class="col-md-8">
          <input class="form-control col-md-8" type="hidden" name="patienttype" id="patienttype" value="Extension" required> <b>&emsp;Extension</b>
        </div>
		</div>
		<div class="form-group row" >
        <label class="control-label col-md-4">Account ID No:</label>
        <div class="col-md-8">
          <select  name="account" id="account" class="form-control col-md-8" required>
                                                 <?php
										// Feching active consultation type
										$sql=mysqli_query($db,"select * from login_credentials where (usertype!='Coordinator' AND usertype!='SUPERADMIN' AND usertype!='Alumni') ORDER BY name ASC ");
										while($result=mysqli_fetch_array($sql))
										{    
										?>
										<option class="select-item" value="<?php echo htmlentities($result['username']);?>"><?php echo htmlentities($result['username']);?>- <?php echo htmlentities($result['name']);?> </option>
										<?php }
										
										?>
										</select>  
        </div>
		</div>
		<div class="form-group row">
        <label class="control-label col-md-4">Fullname:</label>
		 <div class="col-md-8">
          <input class="form-control col-md-8" type="text" name="patientname" id="patientname" required>
	  </div>
		</div>
		
		  <div class="form-group row">
        <label class="control-label col-md-4">Service Type:</label>
        <div class="col-md-8">
         <select  name="contype" id="contype" class="form-control col-md-8">
				                               <?php
										// Feching active consultation type
										$sql=mysqli_query($db,"select * from clinic_services where service_type='2'");
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
      
          <textarea class="form-control" type="text" name="mcomment" id="mcomment" placeholder="//Comment" rows="5" width></textarea>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="AddEntry2">Add</button>
      </div>
    </form>
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
<script>
  function showOnChange(e) {
    var elem = document.getElementById("patienttype");
    var value = elem.options[elem.selectedIndex].value;
    if(value == "Registered")
      {
        document.getElementById('registered').style.display = "block";
        document.getElementById('ext').style.display = "none";
      }
   else if(value == "Ext")
     {
          document.getElementById('registered').style.display = "none";
          document.getElementById('ext').style.display = "block";
     }
 

  }
</script>


</body>
</html>