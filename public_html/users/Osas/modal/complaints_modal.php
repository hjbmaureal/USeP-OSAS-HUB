                      <!-- MODAL VIew -->
                        
                      <div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <form method="POST" action="../../../../php/updateComplaints.php">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Student Complaint Form</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body c">
                              <div class="container">

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="table-responsive">
                                    <table class="table table-bordered">
                                      <thead>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td style="border-color: black;" class="text-center align-middle" width="100px;"><img src="../../../images/logo.png" width="100px;"></td>
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
                                          <td style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">STUDENT COMPLAINT FORM</td>
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
                                        <input class="form-control fc" name="Complaint_ID" type="text" placeholder="<?php echo $res['Complaint_ID']; ?>">
                                        <input class="form-control fc" name="Student_ID" type="text" placeholder="<?php echo $res['Student_ID']; ?>">
                                        <label class="control-label cl">Name:</label>
                                        <input class="form-control fc"  type="text" placeholder="<?php echo $res['fullname']; ?>"  name="name">
                                      </div>
                                    </div>
                                    <div class="col-sm">
                                      <div class="form-group fg floating">
                                        <label class="control-label cl">Date:</label>
                                        <input class="form-control fc" name="date" type="text" placeholder="<?php echo $res['date_Submitted']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Designation:</label>
                                        <input class="form-control fc" type="text" placeholder="Office" disabled="">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Office/College:</label>
                                        <input class="form-control fc" type="text" name="college" placeholder="<?php echo $res['college_name']; ?>" disabled="">
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
                                        <input class="form-control fc" type="text" name="dincident" placeholder="<?php echo $res['date_incident']; ?>" >
                                      </div>
                                    </div>
                                    <div class="col-sm">
                                      <div class="form-group fg floating">
                                        <label class="control-label cl">Time of Incident:</label>
                                        <input class="form-control fc" type="text" name="tincident" placeholder="<?php echo $res['time_incident']; ?>" >
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Location of Incident:</label>
                                        <input class="form-control fc" type="text" name="lincident" placeholder="<?php echo $res['loc_incident']; ?>" >
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Name of the Person BEING Complained:</label>
                                        <input class="form-control fc" type="text"  name="pcomplained"  placeholder="<?php echo $res['person_complained']; ?>" >

                                      <input class="form-control fc" type="text"  name="pcomplainedID" id="search" placeholder="Input lastname of the person being complained" >
                        <!--              <button type="button" id="btn_search" class="btn btn-info">Search</button>
                                        <input class="input-addd" type="text"  name="pcomplainedID" id="ID" placeholder=""  >  -->

                                        <div class="card-body">
                                          <div class="list-group list-group-item-action" id="content">
                                           
                                            
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">Designation of the Person BEING Complained:</label>
                                        <input class="form-control fc" type="text" name="dpcomplained" placeholder="<?php echo $res['designation_complained']; ?>" >
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
                                        <textarea style="min-height: 180px;" class="w-100 p-2 txtarea" name="details" ><?php echo $res['detail']; ?></textarea>
                                        <label class="control-label cl"><i>(NOTE: Continue on page 2 if necessary)</i></label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg mt-3">
                                        <label class="control-label cl mt-5">Indicate witnesses of incident (If applicable):</label><br>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg">
                                        <label class="control-label cl">1.</label>
                                        <input class="form-control fc" type="text" name="w1" placeholder="<?php echo $res['witness1']; ?>" >
                                      </div>
                                    </div>
                                    <div class="col-sm">
                                      <div class="form-group fg floating">
                                        <label class="control-label cl">2.</label>
                                        <input class="form-control fc" type="text" name="w2" placeholder="<?php echo $res['witness2']; ?>" >
                                      </div>
                                    </div>
                                    <div class="col-sm">
                                      <div class="form-group fg floating">
                                        <label class="control-label cl">3.</label>
                                        <input class="form-control fc" type="text" name="w3" placeholder="<?php echo $res['witness3']; ?>" >
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm">
                                      <div class="form-group fg mt-3">
                                        <label class="control-label cl mt-5">I hearby swear that the complaint and statements hereunder are true and unbiased.</label><br><br>
                                        <label class="control-label cl mt-5">Respectfully,</label>
                                        <br>
                                        <input class="form-control fc mt-4" type="text" placeholder="<?php echo $res['fullname']; ?>" disabled="">
                                        <br>
                                        <label class="control-label cl mt-5">(Signature over printed name)</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mt-3">
                                      <label class="control-label cl p-2">STATUS/REMARKS</label><br>
                                      <table class="table table-bordered">
                                        <tr>
                                          <td style="border-color: black;">
                                            <div>
                                           <div class="form-group fg">
                                        
                                        <select class="txarea" name="statuscom" required="required">
                                            <option value="">Select Status<?php echo $res['status']; ?></option>
                                            <option value="in process">In Process</option>
                                            <option value="closed">Closed</option>
                                              
                                            </select><br><br>
                                        <div class="form-group fg">
                                          <input class="form-control fc d-block floating mr-1" type="text" placeholder="<?php echo $res['remarks']; ?>" name="remarkscom"><br>
                                        <label class="control-label cl d-block floating mr-1">OSAS Coordinator</label>


                                        
                                      </div>
                                      </div>
                                      
                                      </div>
                                          </td>
                                        </tr>
                                      </table>
                                      
                                   </div>
                                 </div>

                               </div>
                             </div>

                            </div>
                           </div>
                           <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-success" >Send</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                    </form>
                        </div>
                      </div>
                    </div>