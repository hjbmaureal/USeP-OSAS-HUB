
 
<div class="modal fade" id="HRModal<?php echo $row['patient_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo htmlentities($row['patient_id']);?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      
                      <div class="modal-body c">
                        
                        <div class="container" style="border: 1px solid black; margin-top: 10px; padding: 20px; border-radius: 10px;">
                             

                             
<form action="saveMedical.php" method="post">      

                         <br>
                         
                          
                           <center><h3 class="font-weight-bold">PATIENT HEALTH RECORD</h3></center>
                           <br>
                           <br> 
                          
        <div class="col-md-12">
                <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">A. General Appearance</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="general" id="general" placeholder="Enter General Appearance">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label" style="font-size: 15px; font-weight: bold;">VITALS SIGNS:</label>
                </div>


                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                    <label class="control-label">Height</label>
                                    <input class="form-control" type="text" name="height" id="height" placeholder="">
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">Weight</label>
                                    <input class="form-control" type="text" name="weight" id="weight" placeholder="">
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">PR</label>
                                    <input class="form-control" type="text" name="pulse" id="pulse" placeholder="">
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">RR</label>
                                    <input class="form-control" type="text" name="respiration" id="respiration" placeholder="">
                                  </div>
                            </div>
                          </div>   

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                    <label class="control-label">Temp</label>
                                    <input class="form-control" type="text" name="temperature" id="temperature" placeholder="">
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">BP</label>
                                    <input class="form-control" type="text" name="bp" id="bp" placeholder="">
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">Cardiac Rate (at rest)</label>
                                    <input class="form-control" type="text" name="cardiac" id="cardiac" placeholder="">
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">(after physical activity)</label>
                                    <input class="form-control" type="text" name="physical_activity" id="physical_activity" placeholder="">
                                  </div>
                            </div>
                          </div>                     
<br>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">B. Infectious Diseases</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="infect" id="infect" placeholder="Enter Infectious Diseases">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">C. Social History</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="social" id="social" placeholder="Enter Social History">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">D. Family History</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="family" id="family" placeholder="Enter Social History">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">E. System Review</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="system" id="system" placeholder="Enter System Review">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Skin</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="skin" id="skin" placeholder="Skin">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Lymph Nodes</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="lymph" id="lymph" placeholder="Enter Lymph Nodes">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Integument System</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="integ" id="integ" placeholder="Enter Integument System">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Circulatory System</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="circulatory" id="circulatory" placeholder="Enter Circulatory System">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Endocrine System</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="endocrine" id="endocrine" placeholder="Enter Endocrine System">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Allergic/Immunologic History</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="allergic" id="allergic" placeholder="Enter Allergic/Immunologic History">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">HEENT</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="heent" id="heent" placeholder="Enter HEENT">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Mouth</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="mouth" id="mouth" placeholder="Mouth">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Breast</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="breast" id="breast" placeholder="Breast">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Respiratory System</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="respiratory" id="respiratory" placeholder="Respiratory System">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Cardiovascular System</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="cardio" id="cardio" placeholder="Cardiovascular System">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Gastrointestinal System</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="gastro" id="gastro" placeholder="Gastrointestinal System">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Genitourinary Tract</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="geni" id="geni" placeholder="Genitourinary Tract">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Psychiatric History/Mental Status</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="psy" id="psy" placeholder="Psychiatric History/Mental Status">
                  </div>
              </div>
        </div>

                         <br>
                         <br>

                         <input class="form-check-input" type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">
                         <input class="form-check-input" type="hidden" name="idnum" id="idnum" value="<?php echo htmlentities($row['patient_id']);?>">
                          <div class="modal-footer">
                        <button type="submit" name="Submit" id="Submit" class="btn btn-success">Save</button>
                         </div></form>
                  </div>
                </div>
        </div>

       








      