<!-- MODAL VIew -->
                     
                              <?php   include("conn.php");
                              error_reporting(0);

                              $id = $_POST['id'];
                              $tab = mysqli_query($conn,"SELECT * from org_applications where ID='$id'");  
                              $res = mysqli_fetch_array($tab);
                              $org = $res['Org_Name'];

                              $files = array();
                              $filesrow = 0;

                                $results = mysqli_query($conn, "SELECT file FROM remarks_apply WHERE status=1 and org_name='$org'");       
                                while ($row = mysqli_fetch_array($results)) {
                                  $files[$filesrow]= $row["file"];
                                  $filesrow++;

                                }

                          
        

                              ?>

                              <div class="modal-header">


                              <h5 class="modal-title"  ><input type="text" name="name" style="border:none;" value="<?php echo $res['Org_Name']; ?>"></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <label  name="idd"><input type="hidden" name="idd" style="border:none;" value="<?php echo $res['ID']; ?>"></label><br>
                              <label name="gov">Student Org. President/Governor: <input type="text" style="border:none;" name="gov" value="<?php echo $res['Org_President_Governor']; ?>"></label><br>
                              <label name="adviser">Student Org. Adviser: <input type="text" style="border:none;" name="adviser" value="<?php echo $res['Org_Adviser']; ?>"></label><br>
                              <label name="type">Organization Type:<input type="text" name="type" style="border:none;" value="<?php echo $res['Type']; ?>"> </label><br>
                              <label class="control-label ml-2 mt-2">File Submitted:</label>
                              <!--<div class="remarks-container container p-3">-->
                                <div class="row">
                                 
                                <?php 
                                if ($files[0] == "Application Letter" ||$files[1] == "Application Letter" ||$files[2] == "Application Letter" ||$files[3] == "Application Letter" ||$files[4] == "Application Letter" ||$files[5] == "Application Letter" ||$files[6] == "Application Letter" ||$files[7] == "Application Letter" ||$files[8] == "Application Letter" ||$files[9] == "Application Letter" ){  
                                ?>
                                <div class="col-sm">
                                 <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                                   <div class="card-body fs1">
                                   <p class="card-text" style="font-size: 10px;margin-bottom:0">Application Letter</p>
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" ><i><?php echo $res['App_letter'];?></i></p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Application_Letter=<?php echo $res['App_letter'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>
                            <?php }
                             else { ?> 
                              <div class="col-sm">
                                 <div class="tile card text-center h120" style="height:130px">
                                  <div class="card-body fs1" style="">
                                   <p class="card-text" style="font-size: 10px;margin-bottom:0">Application Letter</p>
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" ><i><?php echo $res['App_letter'];?></i></p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Application_Letter=<?php echo $res['App_letter'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>

                            <?php  
                            if ($files[0] == "Mission Vission Statement" ||$files[1] == "Mission Vission Statement" ||$files[2] == "Mission Vission Statement" ||$files[3] == "Mission Vission Statement" ||$files[4] == "Mission Vission Statement" ||$files[5] == "Mission Vission Statement" ||$files[6] == "Mission Vission Statement" ||$files[7] == "Mission Vission Statement" ||$files[8] == "Mission Vission Statement" ||$files[9] == "Mission Vission Statement" ){    
                            ?>
                           <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px;background: #EFE0DE;">
                               <div class="card-body fs1">
                               <p class="card-text" style="font-size: 10px;margin-bottom:0">Mission Vision Statement</p>
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['MVS'];?></i></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&MVS=<?php echo $res['MVS'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>
                          <?php } else { ?> 
                             <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px;">
                               <div class="card-body fs1">
                               <p class="card-text" style="font-size: 10px;margin-bottom:0">Mission Vision Statement</p>
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['MVS'];?></i></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&MVS=<?php echo $res['MVS'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>                            
                          <?php } ?>

                          <?php 
                            if ($files[0] == "Notarized Affidavit of Le" ||$files[1] == "Notarized Affidavit of Le" ||$files[2] == "Notarized Affidavit of Le" ||$files[3] == "Notarized Affidavit of Le" ||$files[4] == "Notarized Affidavit of Le" ||$files[5] == "Notarized Affidavit of Le" ||$files[6] == "Notarized Affidavit of Le" ||$files[7] == "Notarized Affidavit of Le" ||$files[8] == "Notarized Affidavit of Le" ||$files[9] == "Notarized Affidavit of Le" ){ 
                               ?>
                            <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                               <div class="card-body fs1">
                               <p class="card-text" style="font-size: 10px;margin-bottom:0">Notarized Affidavit of Leadership</p>
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Aff_Lead'];?></i></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="NewOrgApplicants.php?file_id=<?php echo $res['Aff_Lead'];?>&Aff_Lead=<?php echo $res['Aff_Lead'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>               
                          <?php  }
                          else{ ?>
                            <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px;">
                               <div class="card-body fs1">
                               <p class="card-text" style="font-size: 10px;margin-bottom:0">Notarized Affidavit of Leadership</p>
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Aff_Lead'];?></i></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="NewOrgApplicants.php?file_id=<?php echo $res['Aff_Lead'];?>&Aff_Lead=<?php echo $res['Aff_Lead'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div> 
                          <?php   }
                          ?>   

                          <?php 

                                   
                          if ($files[0] == "Resolution" ||$files[1] == "Resolution" ||$files[2] == "Resolution" ||$files[3] == "Resolution" ||$files[4] == "Resolution" ||$files[5] == "Resolution" ||$files[6] == "Resolution" ||$files[7] == "Resolution" ||$files[8] == "Resolution" ||$files[9] == "Resolution" ){ 
                          ?>
                          <div class="col-sm">
                            <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                             <div class="card-body fs1">
                             <p class="card-text" style="font-size: 10px;margin-bottom:0">Resolution(Change/Edit CBL)</p>
                              <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Resolution'];?></i></p>
                            </div>
                            <div class="card-body fs2">

                             <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Resolution=<?php echo $res['Resolution'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                            </div>
                          </div>
                        </div>
                        <?php  }
                          else{ ?>
                            <div class="col-sm">
                            <div class="tile card text-center h120" style="height:130px;">
                             <div class="card-body fs1">
                             <p class="card-text" style="font-size: 10px;margin-bottom:0">Resolution(Change/Edit CBL)</p>
                              <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Resolution'];?></i></p>
                            </div>
                            <div class="card-body fs2">

                             <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Resolution=<?php echo $res['Resolution'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                            </div>
                          </div>
                        </div>
                        <?php   }
                          ?>

                      <?php 

                      if ($files[0] == "Letter of Permission" ||$files[1] == "Letter of Permission" ||$files[2] == "Letter of Permission" ||$files[3] == "Letter of Permission" ||$files[4] == "Letter of Permission" ||$files[5] == "Letter of Permission" ||$files[6] == "Letter of Permission" ||$files[7] == "Letter of Permission" ||$files[8] == "Letter of Permission" ||$files[9] == "Letter of Permission" ){ 
                      ?>
                        <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Letter of Permission</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Letter_Permission'];?></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Permission=<?php echo $res['Letter_Permission'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php  }
                          else{ ?>
                      <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; ">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Letter of Permission</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Letter_Permission'];?></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Permission=<?php echo $res['Letter_Permission'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php   }
                          ?>
                    </div>

                    <div class="row mt-2">
                    <?php 

                    if ($files[0] == "Letter of Consent" ||$files[1] == "Letter of Consent" ||$files[2] == "Letter of Consent" ||$files[3] == "Letter of Consent" ||$files[4] == "Letter of Consent" ||$files[5] == "Letter of Consent" ||$files[6] == "Letter of Consent" ||$files[7] == "Letter of Consent" ||$files[8] == "Letter of Consent" ||$files[9] == "Letter of Consent" ){ 
                    ?>
                     <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Letter of Consent</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Letter_content'];?></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Consent=<?php echo $res['Letter_content'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php  }
                          else{ ?>
                        <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Letter of Consent</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Letter_content'];?></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Consent=<?php echo $res['Letter_content'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php   }
                          ?>

                    <?php 

                    if ($files[0] == "List of Officers and Memb" ||$files[1] == "List of Officers and Memb" ||$files[2] == "List of Officers and Memb" ||$files[3] == "List of Officers and Memb" ||$files[4] == "List of Officers and Memb" ||$files[5] == "List of Officers and Memb" ||$files[6] == "List of Officers and Memb" ||$files[7] == "List of Officers and Memb" ||$files[8] == "List of Officers and Memb" ||$files[9] == "List of Officers and Memb" ){ 
                    ?>
                    <div class="col-sm" >
                          <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;" >
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">List of Officers and Members</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Lists'];?></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Lists=<?php echo $res['Lists'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php  }
                          else{ ?>
                      <div class="col-sm" >
                          <div class="tile card text-center h120" style="height:130px;" >
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">List of Officers and Members</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Lists'];?></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Lists=<?php echo $res['Lists'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php   }
                          ?>

                     <?php 

                      if ($files[0] == "Constitutional by Laws" ||$files[1] == "Constitutional by Laws" ||$files[2] == "Constitutional by Laws" ||$files[3] == "Constitutional by Laws" ||$files[4] == "Constitutional by Laws" ||$files[5] == "Constitutional by Laws" ||$files[6] == "Constitutional by Laws" ||$files[7] == "Constitutional by Laws" ||$files[8] == "Constitutional by Laws" ||$files[9] == "Constitutional by Laws" ){ 
                    ?>     
                     <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Constitutional by Laws</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['ConsLaw'];?></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&ConsLaw=<?php echo $res['ConsLaw'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php  }
                          else{ ?>
                      <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Constitutional by Laws</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['ConsLaw'];?></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&ConsLaw=<?php echo $res['ConsLaw'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php   }
                          ?>

                    <?php 

                    if ($files[0] == "Official Logo" ||$files[1] == "Official Logo" ||$files[2] == "Official Logo" ||$files[3] == "Official Logo" ||$files[4] == "Official Logo" ||$files[5] == "Official Logo" ||$files[6] == "Official Logo" ||$files[7] == "Official Logo" ||$files[8] == "Official Logo" ||$files[9] == "Official Logo" ){ 
                    ?>
                     <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Office Logo</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><input type="text" style="border:none; background: #EFE0DE;" name="logo" value="<?php echo $res['Logo'];?>"></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Logo=<?php echo $res['Logo'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php  }
                          else{ ?>
                      <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; ">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Office Logo</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><input type="text" style="border:none; " name="logo" value="<?php echo $res['Logo'];?>"></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Logo=<?php echo $res['Logo'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                       <?php   }
                          ?>

                    <?php 

                                  
                    if ($files[0] == "Letter ot Intent" ||$files[1] == "Letter ot Intent" ||$files[2] == "Letter ot Intent" ||$files[3] == "Letter ot Intent" ||$files[4] == "Letter ot Intent" ||$files[5] == "Letter ot Intent" ||$files[6] == "Letter ot Intent" ||$files[7] == "Letter ot Intent" ||$files[8] == "Letter ot Intent" ||$files[9] == "Letter ot Intent" ){ 
                    ?>
                     <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; background: #EFE0DE;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Letter of Intent of the Adviser</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Letter_intent'];?></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Intent=<?php echo $res['Letter_intent'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                     <?php  }
                          else{ ?>
                      <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px; ">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Letter of Intent of the Adviser</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><?php echo $res['Letter_intent'];?></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id=<?php echo $res['ID'];?>&Intent=<?php echo $res['Letter_intent'];?>"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>
                      <?php   }
                          ?>
                   </div>

               
      
                 