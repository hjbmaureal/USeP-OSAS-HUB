<!-- MODAL VIew -->
                     
                              <?php   include("conn.php");
                              error_reporting(0);

                              $id = $_POST['id'];
                              $tab = mysqli_query($conn,"SELECT * from org_filess where ID='$id'");



                                         
                              while($res = mysqli_fetch_array($tab)) {
                               
                                $tabb = mysqli_query($conn,"SELECT * from accre_files where org_id='$id'");
                                $ress = mysqli_fetch_array($tabb);
                              echo '

                              <div class="modal-header"><input type="text" name="name" style="border:none;" value="'.$res['Org'].'">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button></div>
                              <label  name="idd"><input type="text" name="idd" style="border:none;" value="'.$res['ID'].'"></label><br>
                              <label name="gov">Student Org. President/Governor: <input type="text" style="border:none;" name="gov" value="'.$res['Org_President_Governor'].'"></label><br>
                              <label name="adviser">Student Org. Adviser: <input type="text" style="border:none;" name="adviser" value="'.$res['Org_Adviser'].'"></label><br>
                              <label name="type">Organization Type:<input type="text" name="type" style="border:none;" value="'.$res['Type'].'"> </label><br>
                              <label class="control-label ml-2 mt-2">Organization Files Submitted:</label>
                              <div class="remarks-container container p-3">
                                <div class="row">


                                  <div class="col-sm">
                                    <div class="tile card text-center h120" >
                                     <div class="card-body fs1">
                                      <p class="card-text">'.$res['AccomRep'].'</p>
                                    </div>
                                    <div class="card-body fs2">
                                     <a href="UnrecognizedOrg.php?file_id='.$res['ID'].'&PPMP='.$res['PPMP'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-sm">
                                  <div class="tile card text-center h120" >
                                   <div class="card-body fs1">
                                    <p class="card-text">'.$res['ActionPlan'].'</p>
                                  </div>
                                  <div class="card-body fs2">
                                    <a href="UnrecognizedOrg.php?file_id='.$res['ID'].'&ActionPlan='.$res['ActionPlan'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm">
                                <div class="tile card text-center h120" >
                                 <div class="card-body fs1">
                                  <p class="card-text">'.$res['AFS'].'</p>
                                </div>
                                <div class="card-body fs2">
                                  <a href="UnrecognizedOrg.php?file_id='.$res['ID'].'&AFS='.$res['AFS'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <label class="control-label ml-2 mt-2">Accreditation Files Submitted:</label>
                        <div class="remarks-container container p-3">
                          <div class="row">
                            <div class="col-sm">
                             <div class="tile card text-center h120" >
                               <div class="card-body fs1">
                                <p class="card-text">'.$ress['Lists_officers'].'</p>
                              </div>
                              <div class="card-body fs2">
                                <a href="UnrecognizedOrg.php?file_id='.$ress['ID'].'&Lists_officers='.$res['Lists_officers'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
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
                              <a href="UnrecognizedOrg.php?file_id='.$ress['ID'].'&Lists_members='.$res['Lists_members'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm">
                          <div class="tile card text-center h120" >
                           <div class="card-body fs1">
                            <p class="card-text">'.$ress['Aff_adviser'].'</p>
                          </div>
                          <div class="card-body fs2">
                            <a href="UnrecognizedOrg.php?file_id='.$ress['ID'].'&Aff_adviser='.$res['Aff_adviser'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row mt-2">    
                     <div class="col-sm">
                      <div class="tile card text-center h120" >
                       <div class="card-body fs1">
                        <p class="card-text">'.$ress['Aff_high_officer'].'</p>
                      </div>
                      <div class="card-body fs2">
                        <a href="UnrecognizedOrg.php?file_id='.$ress['ID'].'&Aff_high_officer='.$res['Aff_high_officer'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm">
                    <div class="tile card text-center h120" >
                     <div class="card-body fs1">
                      <p class="card-text">'.$ress['AFP'].'</p>
                    </div>
                    <div class="card-body fs2">
                      <a href="UnrecognizedOrg.php?file_id='.$ress['ID'].'&AFP='.$res['AFP'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="tile card text-center h120" >
                   <div class="card-body fs1">
                    <p class="card-text">'.$ress['CBL_logo'].'</p>
                  </div>
                  <div class="card-body fs2">
                    <a href="UnrecognizedOrg.php?file_id='.$ress['ID'].'&CBL_logo='.$res['CBL_logo'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                  </div>
                </div>
              </div>
            </div>



          </div>
';  }  
               
      ?>
                 