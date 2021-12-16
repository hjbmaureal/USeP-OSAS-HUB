<!-- MODAL VIew -->
                     
                              <?php   include("conn.php");
                              error_reporting(0);

                              $id = $_POST['id'];
                              $tab = mysqli_query($conn,"SELECT * from org_filess where ID='$id'");
                               $res = mysqli_fetch_array($tab);
                              $org = $res['Org'];

                              $files = array();
                              $filesrow = 0;


                                         
                             $results = mysqli_query($conn, "SELECT file FROM remarks_apply WHERE status=1 and org_name='$org'");       
                                while ($row = mysqli_fetch_array($results)) {
                                  $files[$filesrow]= $row["file"];
                                  $filesrow++;

                                }

                          
        

                              ?>

                              <div class="modal-header">

                              <h5 class="modal-title"  ><input type="text" name="name" style="border:none;" value="<?php echo $res['Org'];?>"></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <label  name="idd"><input type="hidden" name="idd" style="border:none;" value="<?php echo $res['ID'];?>"></label><br>
                              <label name="gov">Student Org. President/Governor: &emsp; <input type="text" style="border:none;" name="gov" value="<?php echo $res['Org_pres_gov'];?>"></label><br>
                              <label name="adviser">Student Org. Adviser: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" style="border:none;" name="adviser" value="<?php echo $res['Org_adviser'];?>"></label><br>
                              <label name="type">Organization Type: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" name="type" style="border:none;" value="<?php echo $res['Type']; ?>"> </label><br>
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
                                if ($files[0] == "WFP Letter" ||$files[1] == "WFP Letter" ||$files[2] == "WFP Letter" ||$files[3] == "WFP Letter" ||$files[4] == "WFP Letter" ){ 
                                      ?>
                                <div class="col-sm">
                                 <div class="tile card text-center h120" style="height:130px;  background: #EFE0DE;">
                                   <div class="card-body fs1">
                                   
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" ><?php echo $res['WFP'];?></p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="RecognizedOrg.php?file_id=<?php echo $res['ID'];?>&WFP=<?php echo $res['WFP'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>
                              <?php }
                             else { ?> 
                               <div class="col-sm">
                                 <div class="tile card text-center h120" style="height:130px;">
                                   <div class="card-body fs1">
                                   
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" ><?php echo $res['WFP'];?></p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="RecognizedOrg.php?file_id=<?php echo $res['ID'];?>&WFP=<?php echo $res['WFP'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>
                              <?php }
                             ?> 

                             <?php
                              if ($files[0] == "PPMP" ||$files[1] == "PPMP" ||$files[2] == "PPMP" ||$files[3] == "PPMP" ||$files[4] == "PPMP" ){ 
                                        ?>
                           <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                               <div class="card-body fs1">
                               
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['PPMP'];?></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="RecognizedOrg.php?file_id=<?php echo $res['ID'];?>&PPMP=<?php echo $res['PPMP'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>
                          <?php }
                             else { ?> 
                              <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px;">
                               <div class="card-body fs1">
                               
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['PPMP'];?></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="RecognizedOrg.php?file_id=<?php echo $res['ID'];?>&PPMP=<?php echo $res['PPMP'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>
                          <?php }
                          ?> 


                            <?php 
                            if ($files[0] == "AccomRep" ||$files[1] == "AccomRep" ||$files[2] == "AccomRep" ||$files[3] == "AccomRep" ||$files[4] == "AccomRep" ){ 
                                        ?>
                            <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                               <div class="card-body fs1">
                               
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['AccomRep'];?></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="RecognizedOrg.php?file_id=<?php echo $res['ID'];?>&AccomRep=<?php echo $res['AccomRep'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>
                          <?php }
                             else { ?> 
                               <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px;">
                               <div class="card-body fs1">
                               
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['AccomRep'];?></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="RecognizedOrg.php?file_id=<?php echo $res['ID'];?>&AccomRep=<?php echo $res['AccomRep'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>
                          <?php }
                            ?> 

                            <?php 
                            if ($files[0] == "ActionPlan" ||$files[1] == "ActionPlan" ||$files[2] == "ActionPlan" ||$files[3] == "ActionPlan" ||$files[4] == "ActionPlan"  ){ 
                                        ?>
                          <div class="col-sm">
                            <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                             <div class="card-body fs1">
                            
                              <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['ActionPlan'];?></p>
                            </div>
                            <div class="card-body fs2">

                             <a href="RecognizedOrg.php?file_id=<?php echo $res['ID'];?>&ActionPlan=<?php echo $res['ActionPlan'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                            </div>
                          </div>
                        </div>
                        <?php }
                             else { ?>
                              <div class="col-sm">
                            <div class="tile card text-center h120" style="height:130px;">
                             <div class="card-body fs1">
                            
                              <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['ActionPlan'];?></p>
                            </div>
                            <div class="card-body fs2">

                             <a href="RecognizedOrg.php?file_id=<?php echo $res['ID'];?>&ActionPlan=<?php echo $res['ActionPlan'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                            </div>
                          </div>
                        </div>
                        <?php }
                         ?>

                         <?php 
                         if ($files[0] == "AFS" ||$files[1] == "AFS" ||$files[2] == "AFS" ||$files[3] == "AFS" ||$files[4] == "AFS" ){ 
                                        ?>
                        <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                           <div class="card-body fs1">
                          
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['AFS'];?> </p>
                          </div>
                          <div class="card-body fs2">
                            <a href="RecognizedOrg.php?file_id=<?php echo $res['ID'];?>&AFS=<?php echo $res['AFS'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php }
                             else { ?>
                              <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px;">
                           <div class="card-body fs1">
                          
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><?php echo $res['AFS'];?> </p>
                          </div>
                          <div class="card-body fs2">
                            <a href="RecognizedOrg.php?file_id=<?php echo $res['ID'];?>&AFS=<?php echo $res['AFS'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php }
                         ?>


                    </div>
                    

                   </div>
                   <!--</div>-->
               
  
                 