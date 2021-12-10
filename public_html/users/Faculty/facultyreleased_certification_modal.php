            <div class="modal fade " id="released<?php echo $row['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="RequestModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">&nbsp; RELEASE MEDICAL CERTIFICATE</h5>
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
                      <form method="POST" action="generate_certificate.php">
                       <input type="text" name="id" value="<?php echo $row['request_id']; ?>" hidden></input>

                        <h6 class="font-weight-bold">Name of Consultant: <input type="text" name="consultant"  style="border-top:none;border-left: none;border-right: none;outline: none;background-color: #F5F5F5;"></input></h6> 
                        <br>
 
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>  
