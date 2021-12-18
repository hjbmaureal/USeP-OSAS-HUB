            <div class="modal fade " id="required_docu<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="RequestModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">&nbsp; Lab Request Slip</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container" style="border: 2px solid black; border-radius: 10px; padding: 25px; background-color: #F5F5F5">
                      <div class = "head">  
                        
                        <h6 class="font-weight-bold">Republic of the Philippines</h6> 
                        <h6 class="font-weight-bold" style= "font-family: Old English Text MT;">University of Southeastern Philippines</h6>
                        <h6 class="font-weight-bold">Tagum-Mabini Campus</h6> 
                        <h6 class="font-weight-bold">Apokon, Tagum City</h6> 
                        <br>
                        <hr width=”75%″ size="10">
                        <hr width=”75%″ size="10">
                      </div>
                      <form method="POST" action="admin_required_submit.php">
                        <input type="text" name="staff_name" value="<?php echo $name ?>" hidden ></input>
                        <input type="text" name="id" value="<?php echo $res['request_id']; ?>" hidden></input>
                        <input type="text" name="p_id" value="<?php echo $res['patient_id']; ?>" hidden></input>
                        <input type="checkbox" id="CBC" name="cbc" value="1">
                        <label for="">CBC</label><br>
                        <input type="checkbox" id="Platelet" name="platelet" value="1">
                        <label for=""> Platelet</label><br>
                        <input type="checkbox" id="Hematocrit" name="hema" value="1">
                        <label for="">Hematocrit </label><br>
                        <input type="checkbox" id="Hemoglobin" name="hemo" value="1">
                        <label for=""> Hemoglobin</label><br> 

                        <input type="checkbox" id="Urinalysis" name="Urinalysis" value="1">
                        <label for="">Urinalysis</label><br>
                        <input type="checkbox" id="Fecalysis" name="Fecalysis" value="1">
                        <label for=""> Fecalysis</label><br>
                        <input type="checkbox" id="FBS" name="fbs" value="1">
                        <label for="">Fasting Blood Sugar (FBS) </label><br>
                        <input type="checkbox" id="sua" name="sua" value="1">
                        <label for=""> Serum Uric Acid</label><br> 

                        <input type="checkbox" id="Creatinine" name="Creatinine" value="1">
                        <label for="">Creatinine</label><br>
                        <input type="checkbox" id="Platelet" name="Lipid" value="1">
                        <label for=""> Lipid Profile</label><br>
                        <input type="checkbox" id="SGOT" name="SGOT" value="1">
                        <label for="">SGOT </label><br>
                        <input type="checkbox" id="SGPT" name="SGPT" value="1">
                        <label for=""> SGPT</label><br>

                        <input type="checkbox" id="bloodtest" name="bloodtest" value="1">
                        <label for=""> Blood Test</label><br> 
                        <input type="checkbox" id="chest_xray" name="chest_xray" value="1">
                        <label for=""> Chest X-Ray</label><br> 
                        <input type="checkbox" id="drugtest" name="drugtest" value="1">
                        <label for=""> Drug Test</label><br> 
                        <input type="checkbox" id="psychological_test" name="psychological_test" value="1">
                        <label for=""> Psychological Test</label><br> 
                        <input type="checkbox" id="NPE" name="NPE" value="1">
                        <label for=""> Neuro-Psychiatric Examination (if applicable)</label><br> 
                        
                        <input type="checkbox" id="others" name="others" value="1" onclick="showOthers()">
                        <label for=""> Others</label><br> 
                        <textarea placeholder="Enter Laboratory Request" id="other_text" name="other_text" style="width: 100%; height: auto;display: none "></textarea>

                        <br>
                          <br>
                          <div id="requested">
                          <h6 class="font-weight-bold" style="text-align: center;margin-left:60%">Requested by: <input type="text" name="requested_by"  value=""  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;background-color: #F5F5F5;"></h6> 
                        </div>
                          <br>
                        </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>  
                <script>
function showOthers() {
  var checkBox = document.getElementById("others");
  var text = document.getElementById("other_text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>
