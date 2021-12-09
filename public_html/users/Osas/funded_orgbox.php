<!-- MODAL VIew -->
                     
                              <?php   include("conn.php");
                              error_reporting(0);

                              $id = $_POST['id'];
                              $tab = mysqli_query($conn,"SELECT * from org_filess where ID='$id'");


                               $updateStat = mysqli_query($conn, "UPDATE org_filess SET status = 1 WHERE ID = '$id'");

                            
                                         
                              while($res = mysqli_fetch_array($tab)) {
                                 $tabb = mysqli_query($conn,"SELECT * from accre_files where org_id='$id'");
                                $ress = mysqli_fetch_array($tabb);
                              echo '

                              <div class="modal-header">

                              <h5 class="modal-title"  ><input type="text" name="name" style="border:none;" value="'.$res['Org'].'"></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                             
                              <label name="gov">Student Org. President/Governor: <input type="text" style="border:none; width:300px;" name="gov" value="'.$res['Org_pres_gov'].'"></label> <label  name="idd"><input type="text" name="idd" style="border:none;color:white;" value="'.$res['ID'].'"></label><br>
                              <label name="adviser">Student Org. Adviser: <input type="text" style="border:none;" name="adviser" value="'.$res['Org_adviser'].'"></label><br>
                              <label name="type">Organization Type:<input type="text" name="type" style="border:none;" value="'.$res['Type'].'"> </label><br>
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
                                
                                <div class="col-sm">
                                 <div class="tile card text-center h120" style="height:130px;">
                                   <div class="card-body fs1">
                                   
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" >'.$res['WFP'].'</p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="NewRecognizedOrg.php?file_id='.$res['ID'].'&WFP='.$res['WFP'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>

                           <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px;">
                               <div class="card-body fs1">
                               
                                <p class="card-text"style="font-size: 10px;margin-bottom:0">'.$res['PPMP'].'</p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="NewRecognizedOrg.php?file_id='.$res['ID'].'&PPMP='.$res['PPMP'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>

                            <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px;">
                               <div class="card-body fs1">
                               
                                <p class="card-text"style="font-size: 10px;margin-bottom:0">'.$res['AccomRep'].'</p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="NewRecognizedOrg.php?file_id='.$res['ID'].'&AccomRep='.$res['AccomRep'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm">
                            <div class="tile card text-center h120" style="height:130px;">
                             <div class="card-body fs1">
                            
                              <p class="card-text"style="font-size: 10px;margin-bottom:0">'.$res['ActionPlan'].'</p>
                            </div>
                            <div class="card-body fs2">

                             <a href="NewRecognizedOrg.php?file_id='.$res['ID'].'&ActionPlan='.$res['ActionPlan'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px;">
                           <div class="card-body fs1">
                          
                            <p class="card-text"style="font-size: 10px;margin-bottom:0">'.$res['AFS'].' </p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewRecognizedOrg.php?file_id='.$res['ID'].'&AFS='.$res['AFS'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>



                      <div class="col-sm-12">
                    <label class="control-label ml-2 mt-2">Accreditation Files Submitted:</label></div>

                        
                          
                            <div class="col-sm">
                             <div class="tile card text-center h120" >
                               <div class="card-body fs1">
                                <p class="card-text">'.$ress['Lists_officers'].'</p>
                              </div>
                              <div class="card-body fs2">
                                <a href="NewRecognizedOrg.php?file_id='.$ress['org_id'].'&Lists_officers='.$ress['Lists_officers'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm">
                            <div class="tile card text-center h120" >
                             <div class="card-body fs1">
                              <p class="card-text">'.$ress['Lists_members'].'
                              </p>
                            </div>
                            <div class="card-body fs2">
                              <a href="NewRecognizedOrg.php?file_id='.$ress['org_id'].'&Lists_members='.$ress['Lists_members'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm">
                          <div class="tile card text-center h120" >
                           <div class="card-body fs1">
                            <p class="card-text">'.$ress['Aff_adviser'].'</p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewRecognizedOrg.php?file_id='.$ress['org_id'].'&Aff_adviser='.$ress['Aff_adviser'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>

                

                     
                     <div class="col-sm">
                      <div class="tile card text-center h120" >
                       <div class="card-body fs1">
                        <p class="card-text">'.$ress['Aff_high_officer'].'</p>
                      </div>
                      <div class="card-body fs2">
                        <a href="NewRecognizedOrg.php?file_id='.$ress['org_id'].'&Aff_high_officer='.$ress['Aff_high_officer'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm">
                    <div class="tile card text-center h120" >
                     <div class="card-body fs1">
                      <p class="card-text">'.$ress['AFP'].'</p>
                    </div>
                    <div class="card-body fs2">
                      <a href="NewRecognizedOrg.php?file_id='.$ress['org_id'].'&AFP='.$ress['AFP'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="tile card text-center h120" >
                   <div class="card-body fs1">
                    <p class="card-text">'.$ress['CBL_logo'].'</p>
                  </div>
                  <div class="card-body fs2">
                    <a href="NewRecognizedOrg.php?file_id='.$ress['org_id'].'&CBL_logo='.$ress['CBL_logo'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                  </div>
                </div>
              </div>
            </div>



          </div>
';  }  
               
      ?>
                 