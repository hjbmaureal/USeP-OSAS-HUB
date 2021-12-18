
 
<div class="modal fade" id="exampleModalLong<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
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
                              
                              <a href="user-profiles.php?patient_id=<?php echo $row["patient_id"]; ?>"><button class="btn btn-danger btn-sm" style="width: 100%; margin-top: 5px; font-size: 10px;"><i class="fas fa-exclamation-triangle"></i> View Medical Info/History
                              </button></a></div>

                              <h5 class="font-weight-bold" style="margin-bottom: 20px; margin-top: 10px;">Patient Basic Information</h5> 
                              <h6 class="font-weight-bold">ID Number: <span class="font-weight-lighter ml-6"> <?php echo htmlentities($row['patient_id']);?></span></h6> 
                              <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['name']);?></span></h6> 
                              <h6 class="font-weight-bold">Civil Status: <span class="font-weight-lighter ml-6">  <?php echo htmlentities($row['civil_status']);?></span></h6> 
                              <h6 class="font-weight-bold">Sex: <span class="font-weight-lighter ml-2"><?php echo htmlentities($row['sex']);?></span></h6>
                              <h6 class="font-weight-bold">Course/Department: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['section']);?></span></h6>
                              <h6  class="font-weight-bold">Year level: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['year_level']);?></span></h6>
<form action="saveMedical.php" method="post">                            
                         <br>
                         <br>
                          
                           <center><h6 class="font-weight-bold">PATIENT HEALTH RECORD</h6></center><br> 
                          
                         <p>&ensp;

                          A. General Appearance:    
                                          <input type="text"
                                             name="general" 
                                             id="general"
                                             style="height: 27px; width: 550px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>&ensp;

                          Vital Signs: &ensp;&ensp;&ensp;&nbsp; 
                                Height: 
                                          <input type="text"
                                             name="height"
                                             id="height"  
                                             style="height: 27px; width: 140px"
                                             placeholder="ex. 153 cm or 5 ft"
                                             required="required" 
                                            >
                                            &ensp;&ensp;&ensp;
                                Weight: 
                                          <input type="text"
                                             name="weight"
                                             id="weight"  
                                             style="height: 27px; width: 140px"
                                             placeholder="ex. 45 kg"
                                             required="required" 
                                            >
                                            &ensp;&ensp;&ensp; 
                                PR: 
                                          <input type="text"
                                             name="pulse" 
                                             id="pulse"
                                             style="height: 27px; width: 140px"
                                             placeholder="Pulse Rate..." 
                                             required="required" 
                                            >
                                            &ensp;&ensp;
                        </p>
                        <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                           &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;
                                
                                RR: 
                                          <input type="text"
                                             name="respiration"
                                             id="respiration" 
                                             style="height: 27px; width: 140px"
                                             placeholder="Respiration Rate..." 
                                             required="required" 
                                            >
                                
                                &ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;

                                Temp:

                                          <input type="text"
                                             name="temperature"
                                             id="temperature" 
                                             style="height: 27px; width: 140px"
                                             placeholder="Temperature..."
                                             required="required" 
                                            >
                        </p>
                        <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;

                          B.Infectious Disease: 

                                          <input type="text"
                                             name="infect" 
                                             id="infect"
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            &ensp;&ensp;&ensp;

                          C.Social History: 

                                          <input type="text"
                                             name="social"
                                             id="social" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                             &ensp;&ensp;

                          D.Family History: 

                                          <input type="text"
                                             name="family"
                                             id="family" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                          <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                             &ensp;&ensp;&nbsp;

                            E.System Review: 

                                          <input type="text"
                                             name="system" 
                                             id="system" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            &ensp;&ensp;

                            Skin: 
                                          <input type="text"
                                             name="skin"
                                             id="skin" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                          <p>&ensp;&ensp;&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                             &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;

                            Lymph Nodes: 

                                          <input type="text"
                                             name="lymph"
                                             id="lymph" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                          <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                             &nbsp;&nbsp;

                            Integument System: 

                                          <input type="text"
                                             name="integ" 
                                             id="integ"
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            &nbsp;

                            Circulatory System: 

                                          <input type="text"
                                             name="circulatory"
                                             id="circulatory" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            &ensp;&nbsp;

                            Endocrine System: 

                                          <input type="text"
                                             name="endocrine"
                                             id="endocrine" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>&ensp;&ensp;&ensp;

                            Allergic/Immunologic History: 
                                          <input type="text"
                                             name="allergic" 
                                             id="allergic"
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                          <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            

                            HEENT: 

                                          <input type="text"
                                             name="heent" 
                                             id="heent" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            &nbsp;

                            Mouth: 

                                          <input type="text"
                                             name="mouth"
                                             id="mouth" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            &nbsp;

                            Breast: 

                                          <input type="text"
                                             name="breast"
                                             id="breast" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            &nbsp;

                            Respiratory System: 

                              

                                          <input type="text"
                                             name="respiratory" 
                                             id="respiratory"
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;

                            Cardiovascular System: 

                              

                                          <input type="text"
                                             name="cardio" 
                                             id="cardio"
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;

                            Gastrointestinal System: 
                                          <input type="text"
                                             name="gastro"
                                             id="gastro" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;

                            Genitourinary Tract:

                            

                                          <input type="text"
                                             name="geni"
                                             id="geni" 
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>
                         <p>

                            Psychiatric History/Mental Status: 

                                          <input type="text"
                                             name="psy"
                                             id="psy"  
                                             style="height: 27px; width: 500px"
                                             placeholder="Type here..."
                                             required="required" 
                                            >
                         </p>

                         <br><br><br>

                         <h6 class="font-weight-bold">Diagnosis: </h6> 
                            <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" name="diagnosis" rows="4" placeholder="Type diagnosis here..." required="required" ></textarea>
                                      </div>
                          </div>
                         
                          <h6 class="font-weight-bold">Treatment: </h6> 
                            <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" name="treatment" rows="3" placeholder="Type treatment here..." required="required" ></textarea>
                                      </div>
                            </div>
                      
                          <h6 class="font-weight-bold">Remarks: </h6> 
                           <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" name="remarks" rows="3" placeholder="Type your remarks here..." required="required" ></textarea>
                        <br>

                               <h6 class="font-weight-bold">Prescription: </h6> 
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                      <textarea id="preslist" class="preslist" name="preslist" rows="6" placeholder="&nbsp;Type your Prescription here" required="required"  style="width: 100%; border-radius: 5px;"></textarea>
                                      </div>
                                      <input type="hidden" name="Status" value="Completed"></input>
                          </div>  
                         <input class="form-check-input" type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">
                         <input class="form-check-input" type="hidden" name="idnum" id="idnum" value="<?php echo htmlentities($row['patient_id']);?>">
                          <div class="modal-footer">
                        <button type="submit" name="Submit" id="Submit" class="btn btn-success">Save</button>
                         </div></form>
                  </div>
                </div>
        </div>

       








      