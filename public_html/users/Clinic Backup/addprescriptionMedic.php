
<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
<div class="modal fade " id="exampleModalLong1<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo htmlentities($row['consultation_type']);?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      
                      <div class="modal-body c">
                        
                        <div class="container" style="border: 1px solid black; margin-top: 10px; padding: 20px; border-radius: 10px;">
                              <div class="id-picture"><img src="image/female_user.png" style="max-width: 100%;">
                              
                              <a href="user-profiles.php?patient_id=<?php echo $row["patient_id"]; ?>" target="_blank"><button class="btn btn-danger btn-sm" style="width: 100%; margin-top: 5px; font-size: 10px;"><i class="fas fa-exclamation-triangle"></i> View Medical Info/History
                              </button></a></div>

                              <h5 class="font-weight-bold" style="margin-bottom: 20px; margin-top: 10px;">Patient Basic Information</h5> 
                              <h6 class="font-weight-bold">ID Number: <span class="font-weight-lighter ml-6"> <?php echo htmlentities($row['patient_id']);?></span></h6> 
                              <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['name']);?></span></h6> 
                              <h6 class="font-weight-bold">Civil Status: <span class="font-weight-lighter ml-6">  <?php echo htmlentities($row['civil_status']);?></span></h6> 
                              <h6 class="font-weight-bold">Sex: <span class="font-weight-lighter ml-2"><?php echo htmlentities($row['sex']);?></span></h6>
                              <h6 class="font-weight-bold">Course/Department: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['title']);?></span></h6>
                              <h6  class="font-weight-bold">Year level: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['year_level']);?></span></h6>
<form method="post">                            
                         <br>
                         <br>
                          
              
                       
          

                         

                         <h6 class="font-weight-bold">Diagnosis: </h6> 
                            <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" name="diagnosis" rows="3" placeholder="Type diagnosis here..." required="required" ></textarea>
                                      </div>
                          </div>
                         
                          <h6 class="font-weight-bold">Treatment: </h6> 
                            <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" name="treatment" rows="3" placeholder="Type treatment here..." required="required" ></textarea>
                                      </div>
                            </div>
                      
                          <h6 class="font-weight-bold">Remarks: </h6> 
                           <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" name="remarks" rows="3" placeholder="Type your remarks here..." required="required" ></textarea>
                        <br>

                              <div class="form-row">
                                      </div>
                                      <input type="hidden" name="Status" value="Completed"></input>
                          </div>   
                        </div>
                          </div><input class="form-check-input" type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">
                      </div>
                  
                      <div class="modal-footer">
                        <button type="submit" name="Submit" class="btn btn-success" >Save</button>
                      </div></form>
                    </div>
                  </div>
                </div>

<?php


  if(isset($_POST['Submit'])){   
    $id = $_POST['id'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];
    $remarks = $_POST['remarks'];
    $status = "Completed";

    // checker
    if(empty($diagnosis)|| empty($treatment)|| empty($remarks)) { 

        
        if(empty($diagnosis)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }  
        if(empty($treatment)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($remarks)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        
        //insert syntax
        $result ="UPDATE consultation 
                  SET diagnosis='$diagnosis',status='$status', treatment='$treatment', remarks='$remarks',date_completed=now()
                  WHERE id ='$id'";


          if ($db->query($result) === TRUE) {
       
          echo '<script>
                swal({
                title: "Added successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:2000,
                closeOnClickOutside: false,
                closeOnEsc: false,
                }).then(function() {
              window.location = "Admin-ListOfConsultation.php";
            })
     </script>';
         
    
    }else{

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
}
?>

 
        
<script>
function getDay(val) {
  type: "POST",
  url: "getDay.php",
  data:'date='+val,
  success: function(data){
    $("#datestatus").html(data);
  }
  });
}

</script>
<script>



</script>

