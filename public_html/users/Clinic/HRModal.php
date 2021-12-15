
<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js">

</script>
<div class="modal fade" id="HRModal<?php echo $row['patient_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php $patientID=$row['patient_id'];?>
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo htmlentities($row['patient_id']);?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      
                      <div class="modal-body c">
                      <?php
                    $HRModal=mysqli_query($db,"select * from patient_health_record_medical where patient_id='".$row['patient_id']."'");
                    $row=mysqli_fetch_array($HRModal);
                ?>
                        
                        <div class="container" style="border: 1px solid black; margin-top: 10px; padding: 20px; border-radius: 10px;">
                             
<form method="post"> 



                         <br>
                         
                          
                           <center><h3 class="font-weight-bold">PATIENT HEALTH RECORD</h3></center>
                           <br>
                           <br> 
                          
        <div class="col-md-12">

                <div class="form-group row">

                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">A. General Appearance</label>
                  <div class="col-md-8">
                    <input 
                    class="form-control" 
                    type="text" 
                    name="general" 
                    id="general"
                    placeholder="Enter General Appearance"
                    required=""
                    value="<?php echo $row["general_appearance"];?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label" style="font-size: 15px; font-weight: bold;">VITALS SIGNS:</label>
                </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">

                                    <label class="control-label">Height</label>
                                    <input class="form-control"
                                           name="height"
                                           id="height" 
                                           type="text" 
                                           placeholder=""
                                           required=""
                                           value="<?php echo $row["height"];?>">
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">Weight</label>
                                    <input class="form-control"
                                           type="text"
                                           name="weight"
                                           id="weight" 
                                           placeholder=""
                                           required=""
                                           value="<?php echo $row["weight"];?>" >
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">PR</label>
                                    <input class="form-control"
                                           type="text" 
                                           name="pulse" 
                                           id="pulse"
                                           placeholder=""
                                           required=""
                                           value="<?php echo $row["pulse_rate"];?>" >
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">RR</label>
                                    <input class="form-control"
                                           name="respiration"
                                           id="respiration" 
                                           type="text" 
                                           placeholder=""
                                           required=""
                                           value="<?php echo $row["respiration_rate"];?>" >
                                  </div>
                            </div>
                          </div>   

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                    <label class="control-label">Temp</label>
                                    <input class="form-control"
                                           name="temperature"
                                           id="temperature" 
                                           type="text" 
                                           placeholder=""
                                           required=""
                                           value="<?php echo $row["temperature"];?>" >
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">BP</label>
                                    <input class="form-control" 
                                           type="text"
                                           name="bp" 
                                           id="bp"
                                           placeholder=""
                                           required=""
                                           value="<?php echo $row["blood_pressure"];?>" >
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">Cardiac Rate (at rest)</label>
                                    <input class="form-control"
                                           name="rest" 
                                           id="rest" 
                                           type="text" 
                                           placeholder=""
                                           required=""
                                           value="<?php echo $row["cardiac_rate_at_rest"];?>" >
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">(after physical activity)</label>
                                    <input class="form-control"
                                           name="act" 
                                           id="act"
                                           type="text" 
                                           placeholder=""
                                           required=""
                                           value="<?php echo $row["cardiac_rate_after_activity"];?>" >
                                  </div>
                            </div>
                          </div>                     
<br>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">B. Infectious Diseases</label>
                  <div class="col-md-8">
                    <input class="form-control"
                           type="text"
                           name="infect" 
                           id="infect" 
                           placeholder="Enter Infectious Diseases"
                           required=""
                           value="<?php echo $row["infectious_disease"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">C. Social History</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text" 
                           name="social"
                           id="social"
                           placeholder="Enter Social History"
                           required=""
                           value="<?php echo $row["social_history"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">D. Family History</label>
                  <div class="col-md-8">
                    <input class="form-control"
                           type="text"
                           name="family"
                           id="family" 
                           placeholder="Enter Social History"
                           required=""
                           value="<?php echo $row["family_history"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">E. System Review</label>
                  <div class="col-md-8">
                    <input class="form-control"
                           type="text"
                           name="system" 
                           id="system" 
                           placeholder="Enter System Review"
                           required=""
                           value="<?php echo $row["system_review"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Skin</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text"
                           name="skin"
                           id="skin" 
                           placeholder="Skin"
                           required=""
                           value="<?php echo $row["skin"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Lymph Nodes</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text"
                           name="lymph"
                           id="lymph" 
                           placeholder="Enter Lymph Nodes"
                           required=""
                           value="<?php echo $row["lymph_nodes"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Integument System</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text"
                           name="integ" 
                           id="integ" 
                           placeholder="Enter Integument System"
                           required=""
                           value="<?php echo $row["integument_system"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Circulatory System</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text"
                           name="circulatory"
                           id="circulatory" 
                           placeholder="Enter Circulatory System"
                           required=""
                           value="<?php echo $row["circulatory_system"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Endocrine System</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text"
                           name="endocrine"
                           id="endocrine"
                           placeholder="Enter Endocrine System"
                           required=""
                           value="<?php echo $row["endocrine_system"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Allergic/Immunologic History</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           name="allergic" 
                           id="allergic"
                           type="text" 
                           placeholder="Enter Allergic/Immunologic History"
                           required=""
                           value="<?php echo $row["allergic_immunologic_history"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">HEENT</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text" 
                           name="heent" 
                           id="heent"
                           placeholder="Enter HEENT"
                           required=""
                           value="<?php echo $row["heent"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Mouth</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text" 
                           name="mouth"
                           id="mouth"
                           placeholder="Mouth"
                           required=""
                           value="<?php echo $row["mouth"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Breast</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text"
                           name="breast"
                           id="breast" 
                           placeholder="Breast"
                           required=""
                           value="<?php echo $row["breast"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Respiratory System</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text"
                           name="respiratory" 
                           id="respiratory" 
                           placeholder="Respiratory System"
                           required=""
                           value="<?php echo $row["respiratory_system"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Cardiovascular System</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text"
                           name="cardio" 
                           id="cardio" 
                           placeholder="Cardiovascular System"
                           required=""
                           value="<?php echo $row["cardiovascular_system"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Gastrointestinal System</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text"
                           name="gastro"
                           id="gastro" 
                           placeholder="Gastrointestinal System"
                           required=""
                           value="<?php echo $row["gastrointestinal_system"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Genitourinary Tract</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           type="text"
                           name="geni"
                           id="geni" 
                           placeholder="Genitourinary Tract"
                           required=""
                           value="<?php echo $row["genitourinary_tract"];?>" >
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3" style="font-size: 14px; font-weight: bold;">Psychiatric History/Mental Status</label>
                  <div class="col-md-8">
                    <input class="form-control" 
                           name="psy"
                           id="psy"
                           type="text" 
                           placeholder="Psychiatric History/Mental Status"
                           required=""
                           value="<?php echo $row["psychiatric_history"];?>" >
                    
                  </div>
              </div>
        </div>

                         <br>
                         <br>

                         <input class="form-check-input" hidden="hidden" name="id" value="<?php echo $patientID;?>">
                          <div class="modal-footer">
                        <button type="submit" name="Submit" id="Submit" class="btn btn-success">Save</button>
                         </div></form>
                  </div>
                </div>
        </div>











      