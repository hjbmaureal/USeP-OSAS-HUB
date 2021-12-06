
                     <div class="modal fade" id="modalview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Student Complaint Form</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="table-responsive">
                                    <table class="table table-bordered">
                                      <thead>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td style="border-color: black;" class="text-center align-middle" width="100px;"><img src="../../images/logo.png" width="100px;"></td>
                                          <td style="border-color: black; font-weight:bold;" class="text-center align-middle" width="450px">
                                            <span class="fs-11 d-block">Republic of the Philippines</span>
                                            <span style="font-family:Old English Text MT;">University of Southeasetern Philippines</span>
                                            <span class="fs-11 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                            <span class="fs-11 d-block">Telephone: (082) 227-8192</span>
                                            <span class="fs-11 d-block">Website: www.usep.edu.ph</span>
                                            <span class="fs-11 d-block">Email: president@usep.edu.ph</span>
                                          </td>
                                          <td style="padding:0px; border-color: black; font-weight: bold;" class="td-b" width="230px">
                                            <table width="100%">
                                              <tr>
                                                <td class="fs-11 p-1" style=" border: 1px solid black;border-top: 0px; border-left: 0px;">Form No.</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-top: 0px; border-right: 0px;">FM-USeP-HSC-01</td>
                                              </tr>
                                              <tr>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-left: 0px; border-bottom: 0px;">Issue Status</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-right: 0px;">02</td>
                                              </tr>
                                              <tr>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-left: 0px;">Revision No.</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-right: 0px;">01</td>
                                              </tr>
                                              <tr>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-left: 0px;">Date Effective</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-right: 0px;">01 March 2018</td>
                                              </tr>
                                              <tr>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-bottom: 0px; border-left: 0px;">Approved by</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-bottom: 0px; border-right: 0px;">President</td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">LETTER OF RESPONSE</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>


                                </div>
                              </div>   

                              <div class="row m-3 mt-4">
                                <div class="col">

                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Name:</label>
                                        <input class="form-control fc" type="text" id="name1" value="<?php echo $res['fullname']; ?>" disabled="">
                                      </div>
                                    </div>
                                    <div class="col-sm">
                                      <div class="form-group fg floating">
                                        <label class="control-label cl">Date:</label>
                                        <input class="form-control fc" type="text" id="date1" value="<?php echo $res['Date_Submitted']; ?>" disabled="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Designation:</label>
                                        <input class="form-control fc" type="text" id="desig1" value="<?php echo $res['type']; ?>" disabled="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Office/College:</label>
                                        <input class="form-control fc" type="text" id="college" value="<?php echo $res['college']; ?>" disabled="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg mt-3">
                                        <label class="control-label cl mt-5">COMPLAINT INFORMATION:</label><br>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg mt-1">
                                        <label class="control-label cl">Date of Incident:</label>
                                        <input class="form-control fc" type="text" id="date_inci" value="<?php echo $res['Date_of_incident']; ?>" disabled="">
                                      </div>
                                    </div>
                                    <div class="col-sm">
                                      <div class="form-group fg floating">
                                        <label class="control-label cl">Time of Incident:</label>
                                        <input class="form-control fc" type="text" id="time_inci" value="<?php echo $res['Time_of_incident']; ?>" disabled="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Location of Incident:</label>
                                        <input class="form-control fc" type="text" id="loc_inci" value="<?php echo $res['Loc_of_incident']; ?>" disabled="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg mt-3">
                                        <label class="control-label cl mt-5">Details:</label><br>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <textarea style="min-height: 180px;" class="w-100 p-2 txtarea" id="details" disabled=""><?php echo $res['response_details']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg mt-1">
                                        <label class="control-label cl mt-5">I hearby swear that the complaint and statements hereunder are true and unbiased.</label><br><br>
                                        <div class="form-group col-sm-4">
                                        <label class="control-label cl mt-5">Respectfully,</label>
                                        <br><br><br>
                                        <img src="image/noimage.jpg" class="e-sign" width="200" height="200" style="margin-bottom:-70px; margin-top: -100px; margin-left: -20px; position:relative;" id="signa1" name="signa1"><br>
                                        
                                        <span class="font-weight-lighter "><p class="Signature" style="border: 0;border-bottom: 1px solid #000; font-size: 120%;text-transform: uppercase;" id="fname1"></span><br>
                                      
                                        <p style="margin-top: -2%">(Signature over printed name)
                                                  </p>   
                                          </div>       
                                      </div>
                                    </div>
                                  </div>
                                  

                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>