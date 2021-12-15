            <div class="modal fade " id="released<?php echo $res['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="RequestModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">&nbsp; RELEASE MEDICAL CERTIFICATE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container" style="border: 2px solid black; border-radius: 10px; padding: 25px;">
                      <div class = "head">  
                        
                        <h6 class="font-weight-bold">Republic of the Philippines</h6> 
                        <h6 class="font-weight-bold" style= "font-family: Old English Text MT;">University of Southeastern Philippines</h6>
                        <h6 class="font-weight-bold">Tagum-Mabini Campus</h6> 
                        <h6 class="font-weight-bold">Apokon, Tagum City</h6> 
                        <br>
                        <hr width=”100%″ size="10">
                        <hr width=”100%″ size="10">
                      </div>
                      <form method="POST" action="generate_cert.php">
                       <input type="text" name="id" value="<?php echo $res['request_id']; ?>" hidden></input>
                       <br>
                       <h6 class="font-weight-bold">Name of Consultant:<br><input type="text" name="consultant"  style="border-top:none;border-left: none;border-right: none;outline: none; width: 400px; font-size: 18px; margin-top: 3%;"></input></h6> 
                        <br>
                        <h6 class="font-weight-bold">Found him/her to be with:<br><input type="text" name="found"  style="border-top:none;border-left: none;border-right: none;outline: none; width: 400px; font-size: 18px; margin-top: 3%;"></input></h6> 
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
