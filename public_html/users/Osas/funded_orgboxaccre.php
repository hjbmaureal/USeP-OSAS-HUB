<!-- MODAL VIew -->
                     
                              <?php   include("conn.php");
                              error_reporting(0);

                              $id = $_POST['id'];
                              $tab = mysqli_query($conn,"SELECT * from accre_files where org_id='$id'");
                              $res = mysqli_fetch_array($tab);
                              $org = $res['org_name'];

                              $files = array();
                              $filesrow = 0;


                                         
                             $results = mysqli_query($conn, "SELECT file FROM remarks_apply WHERE status=1 and org_name='$org'");       
                                while ($row = mysqli_fetch_array($results)) {
                                  $files[$filesrow]= $row["file"];
                                  $filesrow++;

                                }

                          
        

                              ?>

                              <div class="modal-header">

                              <h5 class="modal-title"  ><input type="text" name="name" style="border:none;" value="<?php echo $res['org_name'];?>"></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <label  name="idd"><input type="hidden" name="idd" style="border:none;" value="<?php echo $res['ID'];?>"></label><br>
                              <label name="gov">Student Org. President/Governor:  <input type="text" style="border:none;" name="gov" value="<?php echo $res['Org_President_Governor'];?>"></label><br>
                              <label name="adviser">Student Org. Adviser:  &emsp; &emsp; &emsp; &emsp; &emsp;<input type="text" style="border:none;" name="adviser" value="<?php echo $res['Org_Adviser'];?>"></label><br>
                              <label name="type">Organization Type: &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;<input type="text" name="type" style="border:none;" value="<?php echo $res['Type'];?>"> </label><br>
                              <label class="control-label ml-2 mt-2">File Submitted:</label>
                              <!--<div class="remarks-container container p-3">-->
                                <div class="row">
                                  <!--<div class="col-sm">
                                   <div class="card text-center actbox" >
                                     <div class="card-body fs1">
                                      <p class="card-text">Application Letter</p>
                                    </div>
                                    <div class="card-body fs2">
                                      <button type="button" class="btn btn-warning btn-sm blocking mt-2"><i class=" fas fa-eye" ></i></button>
                                      <button type="button" class="btn btn-info btn-sm blocking mt-2"><i class=" fas fa-download" ></i></button>
                                    </div>
                                  </div>
                                </div>-->

                                <?php
                                if ($files[0] == "AccomRepAccre" ||$files[1] == "AccomRepAccre" ||$files[2] == "AccomRepAccre" ||$files[3] == "AccomRepAccre" ||$files[4] == "AccomRepAccre" 
                                      ||$files[5] == "AccomRepAccre" ||$files[6] == "AccomRepAccre" ||$files[7] == "AccomRepAccre" ){ 
                                      ?>
                                <div class="col-sm">
                                 <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                                   <div class="card-body fs1">
                                   
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" ><?php echo $res['AccomRep'];?></p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&AccomRep=<?php echo $res['AccomRep'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>
                               <?php }
                                   else{ ?>
                                    <div class="col-sm">
                                 <div class="tile card text-center h120" style="height:130px;">
                                   <div class="card-body fs1">
                                   
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" ><?php echo $res['AccomRep'];?></p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&AccomRep=<?php echo $res['AccomRep'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>
                               <?php } ?>

                               <?php 
                               if ($files[0] == "AFSAccre" ||$files[1] == "AFSAccre" ||$files[2] == "AFSAccre" ||$files[3] == "AFSAccre" ||$files[4] == "AFSAccre" 
                                      ||$files[5] == "AFSAccre" ||$files[6] == "AFSAccre" ||$files[7] == "AFSAccre" ){ 
                                      ?>
                              <div class="col-sm">
                                 <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                                   <div class="card-body fs1">
                                   
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" ><?php echo $res['AFS'];?></p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&AFS=<?php echo $res['AFS'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>
                              <?php }
                                   else{ ?>
                                    <div class="col-sm">
                                 <div class="tile card text-center h120" style="height:130px;">
                                   <div class="card-body fs1">
                                   
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" ><?php echo $res['AFS'];?></p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&AFS=<?php echo $res['AFS'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>
                              <?php }
                                   ?>

                                   <?php 
                                   if ($files[0] == "Lists_officers" ||$files[1] == "Lists_officers" ||$files[2] == "Lists_officers" ||$files[3] == "Lists_officers" ||$files[4] == "Lists_officers" 
                                      ||$files[5] == "Lists_officers" ||$files[6] == "Lists_officers" ||$files[7] == "Lists_officers" ){ 
                                      ?>
                                <div class="col-sm">
                                 <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                                   <div class="card-body fs1">
                                   
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" ><?php echo $res['Lists_officers'];?></p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&Lists_officers=<?php echo $res['Lists_officers'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>
                              <?php }
                                   else{ ?>
                                     <div class="col-sm">
                                 <div class="tile card text-center h120" style="height:130px;">
                                   <div class="card-body fs1">
                                   
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" ><?php echo $res['Lists_officers'];?></p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&Lists_officers=<?php echo $res['Lists_officers'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>
                              <?php }
                                ?>

                                <?php
                                if ($files[0] == "Lists_members" ||$files[1] == "Lists_members" ||$files[2] == "Lists_members" ||$files[3] == "Lists_members" ||$files[4] == "Lists_members" 
                                      ||$files[5] == "Lists_members" ||$files[6] == "Lists_members" ||$files[7] == "Lists_members" ){ 
                                      ?>
                           <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                               <div class="card-body fs1">
                               
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['Lists_members'];?></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&Lists_members=<?php echo $res['Lists_members'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>
                           <?php }
                                   else{ ?>
                                    <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px;">
                               <div class="card-body fs1">
                               
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['Lists_members'];?></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&Lists_members=<?php echo $res['Lists_members'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>
                           <?php }
                             ?>

                             <?php 
                              if ($files[0] == "Aff_adviser" ||$files[1] == "Aff_adviser" ||$files[2] == "Aff_adviser" ||$files[3] == "Aff_adviser" ||$files[4] == "Aff_adviser" 
                                      ||$files[5] == "Aff_adviser" ||$files[6] == "Aff_adviser" ||$files[7] == "Aff_adviser" ){ 
                                      ?>
                            <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                               <div class="card-body fs1">
                               
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['Aff_adviser'];?></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&Aff_adviser=<?php echo $res['Aff_adviser'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>
                          <?php }
                                   else{ ?>
                              <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px;">
                               <div class="card-body fs1">
                               
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['Aff_adviser'];?></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&Aff_adviser=<?php echo $res['Aff_adviser'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>
                          <?php }
                                   ?>

                                   <?php
                                    if ($files[0] == "Aff_high_officer" ||$files[1] == "Aff_high_officer" ||$files[2] == "Aff_high_officer" ||$files[3] == "Aff_high_officer" ||$files[4] == "Aff_high_officer" 
                                      ||$files[5] == "Aff_high_officer" ||$files[6] == "Aff_high_officer" ||$files[7] == "Aff_high_officer" ){ 
                                      ?>
                          <div class="col-sm">
                            <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                             <div class="card-body fs1">
                            
                              <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['Aff_high_officer'];?></p>
                            </div>
                            <div class="card-body fs2">

                             <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&Aff_high_officer=<?php echo $res['Aff_high_officer'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                            </div>
                          </div>
                        </div>
                        <?php }
                                   else{ ?>
                        <div class="col-sm">
                            <div class="tile card text-center h120" style="height:130px;">
                             <div class="card-body fs1">
                            
                              <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['Aff_high_officer'];?></p>
                            </div>
                            <div class="card-body fs2">

                             <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&Aff_high_officer=<?php echo $res['Aff_high_officer'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                            </div>
                          </div>
                        </div>
                        <?php }
                             ?>

                             <?php 
                             if ($files[0] == "AFP" ||$files[1] == "AFP" ||$files[2] == "AFP" ||$files[3] == "AFP" ||$files[4] == "AFP" 
                                      ||$files[5] == "AFP" ||$files[6] == "AFP" ||$files[7] == "AFP" ){ 
                                      ?>
                        <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                           <div class="card-body fs1">
                          
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['AFP'];?> </p>
                          </div>
                          <div class="card-body fs2">
                            <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&AFP=<?php echo $res['AFP'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php }
                                   else{ ?>
                        <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px;">
                           <div class="card-body fs1">
                          
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['AFP'];?> </p>
                          </div>
                          <div class="card-body fs2">
                            <a href="RecognizedOrg.php?file_id=<?php echo $res['org_id'];?>&AFP=<?php echo $res['AFP'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php }
                          ?>

                          <?php
                           if ($files[0] == "CBL_logo" ||$files[1] == "CBL_logo" ||$files[2] == "CBL_logo" ||$files[3] == "CBL_logo" ||$files[4] == "CBL_logo" 
                                      ||$files[5] == "CBL_logo" ||$files[6] == "CBL_logo" ||$files[7] == "CBL_logo" ){ 
                                      ?>
                      <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                           <div class="card-body fs1">
                          
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['CBL_logo'];?> </p>
                          </div>
                          <div class="card-body fs2">
                            <a href="RecognizedOrg.php?file_id<?php echo $res['org_id'];?>&CBL_logo=<?php echo $res['CBL_logo'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php }
                                   else{ ?>
                        <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; ">
                           <div class="card-body fs1">
                          
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['CBL_logo'];?> </p>
                          </div>
                          <div class="card-body fs2">
                            <a href="RecognizedOrg.php?file_id<?php echo $res['org_id'];?>&CBL_logo=<?php echo $res['CBL_logo'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php }
                        ?>


                    </div>
                    

                   </div>
                   <!--</div>-->
<?php
               
      ?>
                 