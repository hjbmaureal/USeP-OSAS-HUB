            <div class="modal fade " id="RequestModal<?php echo $res['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="RequestModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">&nbsp; REQUEST MEDICAL CERTIFICATE</h5>
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
                      <form method="POST" action="add_request_modal.php">
                        <h6 class="font-weight-bold">Date: <input type="text" name="date" readonly="" value="<?php echo(date('Y/m/d'))?>"  style="border:none;outline: none;background-color: #F5F5F5;cursor: default;"></input></h6> 
                        <br>
                        <input type="checkbox" class="box" id="ojt" name="purpose[]" value="OJT">
                        <label for=""> OJT</label><br> 

                        <input type="checkbox" class="box" id="ft" name="purpose[]" value="Field Trip">
                        <label for=""> Field Trip </label><br> 

                        <input type="checkbox" class="box" id="others" name="purpose[]" value="others" onclick="showOthers()">
                        <label for=""> Others</label><br> 
                        <textarea placeholder="Enter Purpose" id="other_text" name="other_text" style="width: 100%; height: auto;display: none "></textarea>
<!-- 
                         <h6 class="font-weight-bold">Purpose: </h6> 
                        <div class="form-row">
                          <div class="form-group col-md-12">
                                      <textarea id="preslist" class="preslist" name="purpose" rows="4" placeholder="&nbsp;Type your purpose here. . ." style="width: 100%; border-radius: 5px;"></textarea>
                                      </div>
                          </div>    -->
                        </div>


                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>  
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
$(document).ready(function(){
$('.box').on('change', function() {
   $('.box').not(this).prop('checked', false);
   
});
});

</script>