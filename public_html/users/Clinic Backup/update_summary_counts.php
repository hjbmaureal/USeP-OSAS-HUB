
  <?php
				 error_reporting(E_ALL);
ini_set('display_startup_errors',1);

if(isset($_POST['AddEntry1'])){   
        $service_id = implode(',', $_POST['medical']);
		$chks = implode(',', $_POST['medical']);
		 $chk1 = explode(',', $service_id);
		  $patient_type= $_POST['patienttype'];
		$service_type= $_POST['contype'];
		if($service_type== '3'){
	foreach ($chk1 as $service_id )
	{    if($patient_type== "Registered"){
		 $patient_id= $_POST["username"];
		 $patient_name= $_POST["patientname"];
        $mcomment= $_POST["mcomment"];			
		$sql="INSERT INTO extension_services_log(ext_id_number,patient_name,patient_type,mservice_id,log_comments,date_avail) VALUES('$patient_id','$patient_name','$patient_type','$service_id', '$mcomment',NOW())";
		$sql = $db->query($sql);	
	}else if($patient_type== "Extension"){
	 $patient_id= $_POST["account"];
		 $patient_name= $_POST["patientname"];
        $mcomment= $_POST["mcomment"];		
	$sql="INSERT INTO extension_services_log(ext_id_number,patient_name,patient_type,mservice_id,log_comments,date_avail) VALUES('$patient_id','$patient_name','$patient_type','$service_id', '$mcomment',NOW())";
		$sql = $db->query($sql);	
	}
	}
	}else if($service_type=='19'){
	 if($patient_type== "Registered"){
	    $patient_id= $_POST['username'];
		$patient_type= $_POST['patienttype'];
        $mcomment= $_POST['mcomment'];
		$service_id= $_POST['contype'];
		 $patient_name= $_POST["patientname"];				
		$sql="INSERT INTO extension_services_log(ext_id_number,patient_name,patient_type,mservice_id,log_comments,date_avail) VALUES('$patient_id','$patient_name','$patient_type','$service_id', '$mcomment',NOW())";
		$sql = $db->query($sql);
 }else if($patient_type== "Extension"){
	    $patient_id= $_POST['account'];
		$patient_type= $_POST['patienttype'];
        $mcomment= $_POST['mcomment'];
		$service_id= $_POST['contype'];	
		 $patient_name= $_POST["patientname"];			
		$sql="INSERT INTO extension_services_log(ext_id_number,patient_name,patient_type,mservice_id,log_comments,date_avail) VALUES('$patient_id','$patient_name','$patient_type','$service_id', '$mcomment',NOW())";
		$sql = $db->query($sql);
		
		}
		}
   if($sql)
	{
  echo '<script>
      swal({
      title: "Inserted successfully!",
      text: "Server Request Successful!",
      type:"success",
      icon: "success",
      button: false,
      closeOnClickOutside: false,
      closeOnEsc: false,
	   }).then(function() {
    window.location = "Admin-ServicesSummaryReports.php";
   
  })
     </script>';
  }else {
  echo '<script>
      swal({
      title: "Something went wrong...",
      text: "Server Request Failed!",
      type:"error",
      icon: "error",
      button: false,
      timer:2000,
      closeOnClickOutside: false,
      closeOnEsc: false,
      })
     </script>';
}

}
   
 
  
   ?>
<!DOCTYPE html>
<html>
<style>
  #registered{
    display:block;
  }
  #ext {
    display: none;
	
  }
    #services {
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
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">Add Entry</h5>
        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body c">
        <div class="container">
          <form method="post">
            <div class="form-group row">
              <label class="control-label col-md-4">Patient Type:</label>
              <div class="col-md-8">
                <select  name="patienttype" id="patienttype" class="form-control col-md-8" onChange="showOnChange(event)">
                  <option value="">Select patient type</option>
                  <option value="Registered">Registered</option>
                  <option value="Extension">Extension</option>
                </select>
              </div>
            </div>
            <div id="registered">
              <div class="form-group row">
                <label class="control-label col-md-4">Patient ID No:</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" type="text" name="username" id="username" placeholder="Enter ID No.">
				  <span id="availability"></span>
                </div>
              </div>
            </div>
            <div id="ext">
              <div class="form-group row" >
                <label class="control-label col-md-4">Account ID No:</label>
                <div class="col-md-8">
                  <select  name="account" id="account" class="form-control col-md-8" >
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
                  <input class="form-control col-md-8" type="text" name="patientname" id="patientname">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-4">Service Type:</label>
              <div class="col-md-8">
                <select  name="contype" id="contype" class="form-control col-md-8" onChange="show(event)">
                  <option value="">Select service type</option>
                  <option value="19">Consultation Service</option>
                  <option value="3">Medical Services</option>
                </select>
              </div>
            </div>
            <div id="services" class="card" > <br>
              <center>
                <label style="margin:7.5px;"><b>Available Medical Services:</b></label>
              </center>
              <div class="form-group row" style="margin:7.5px;">
			  <?php 	$sql=mysqli_query($db,"Select * from clinic_services where service_type!=2 AND service_id!=19");
			  while($result=mysqli_fetch_array($sql))
										{
										?>
                <div class="col-md-8">
                  <div class="animated-checkbox">
                    <label>
                    <input type="checkbox"  name="medical[]" value="<?php echo htmlentities($result['service_id']);?>" class="form-control col-md-8">
                    <span class="label-text"></span><?php echo htmlentities($result['service_name']);?></label>
                  </div>
                </div>
				<?php }
				?>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-4">Comment:</label>
              <textarea class="form-control" type="text" name="mcomment" id="mcomment" placeholder="//Comment" rows="5" width></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" name="AddEntry1">Add</button>
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
        $('#contype').attr("disabled", false);
		 $('#mcomment').attr("disabled", false);
       }
       else
       {
        $('#availability').html('<span class="text-danger">Not Registered. Please Register!</span>');
        $('#contype').attr("disabled", true);
		$('#mcomment').attr("disabled", true);
       }
      }
     })

  });
 });  
</script>
<script>
  function show(e) {
    var elem = document.getElementById("contype");
    var value = elem.options[elem.selectedIndex].value;
    if(value == "19")
      { 
        document.getElementById('services').style.display = "none";
		
      }
   else if(value == "3")
     {
  
          document.getElementById('services').style.display = "block";
     }
 

  }
</script>
<script>
  function showOnChange(e) {
    var elem = document.getElementById("patienttype");
    var value = elem.options[elem.selectedIndex].value;
    if(value == "Registered")
      { 
	  	document.getElementById('registered').style.display = "block";
        document.getElementById('ext').style.display = "none";
		 $('#account').attr("disabled", true);
      }
   else if(value == "Extension")
     {
  		  document.getElementById('registered').style.display = "none";
          document.getElementById('ext').style.display = "block";
     }
 

  }
</script>
</body></html>
