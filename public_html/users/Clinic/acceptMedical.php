
 
 <div class="modal fade " id="exampleModalLong<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF"><?php echo htmlentities($row['patient_id']);?></h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                     
                      <div class="modal-body c">
                        
                        <div class="container" style="border: 1px solid black; margin-top: 10px; padding: 20px; border-radius: 10px;">
                              <div class="id-picture"><img src="image/female_user.png" style="max-width: 100%;">
                              
                              <a href="Admin-PatientList.php"><button class="btn btn-danger btn-sm" style="width: 100%; margin-top: 5px; font-size: 10px;"><i class="fas fa-exclamation-triangle"></i> View Medical Info/History
                              </button></a></div>

                              <h5 class="font-weight-bold" style="margin-bottom: 20px; margin-top: 10px;">Patient Basic Information</h5> 
                              <h6 class="font-weight-bold">ID Number: <span class="font-weight-lighter ml-6"> <?php echo htmlentities($row['patient_id']);?></span></h6> 
                              <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['name']);?></span></h6> 
                              <h6 class="font-weight-bold">Civil Status: <span class="font-weight-lighter ml-6">  <?php echo htmlentities($row['civil_status']);?></span></h6> 
                              <h6 class="font-weight-bold">Sex: <span class="font-weight-lighter ml-2"><?php echo htmlentities($row['sex']);?></span></h6>
                              <h6 class="font-weight-bold">Section: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['section']);?></span></h6>
                              <h6  class="font-weight-bold">Year level: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['year_level']);?></span></h6>
<form action="save.php" method="post">   
                         <br>
                         <br>
                         <input name="patient_id" value="<?php echo htmlentities($row['patient_id']);?>" hidden>

                           <h6 class="font-weight-bold">Diagnosis: </h6> 
                            <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" required="required" name="diagnosis" rows="4" placeholder="Type diagnosis here..."></textarea>
                                      </div>
                          </div>
                         
                          <h6 class="font-weight-bold">Treatment: </h6> 
                            <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" required="required" name="treatment" rows="3" placeholder="Type treatment here..."></textarea>
                                      </div>
                            </div>
                      
                          <h6 class="font-weight-bold">Remarks: </h6> 
                           <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" required="required" name="remarks" rows="3" placeholder="Type your remarks here..."></textarea>
                        <br>

                               <h6 class="font-weight-bold">Prescription: </h6> 
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                      <textarea id="preslist" class="preslist" required="required" name="preslist" rows="6" placeholder="&nbsp;Type your Prescription here" style="width: 100%; border-radius: 5px;"></textarea>
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

