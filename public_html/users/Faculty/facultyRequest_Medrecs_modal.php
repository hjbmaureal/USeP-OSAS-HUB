<div class="modal fade " id="RequestModal<?php echo $row['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="RequestModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">&nbsp; REQUEST MEDICAL RECORDS CERTIFICATION</h5>
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
                      
                          <form method="POST" action="facultyinsert_request_modal.php" enctype="multipart/form-data">

                            <h6 class="font-weight-bold">Date: <input type="Text" name="date" readonly="" value="<?php echo(date('Y/m/d'))?>"  style="border:none;outline: none;background-color: #F5F5F5;cursor: default;"></input></h6> 
                        <br>
                         <br>

                         <h6 class="font-weight-bold" >Purpose: </h6> 
                        <div class="form-row">
                          <div class="form-group col-md-12">
                                      <textarea id="purpose" name="purpose" class="preslist" rows="4" placeholder="&nbsp;Type your purpose here. . ." style="width: 100%; border-radius: 5px;"></textarea>
                                      </div>
                          </div>

                          <label for="formFileMultiple" class="form-label">Upload your letter of request here:</label>
                          <input class="form-control" style="height: 50%;" type="file" name="file" />   

                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-success" >Submit</button>


                      </div>


                    </div>


                   
