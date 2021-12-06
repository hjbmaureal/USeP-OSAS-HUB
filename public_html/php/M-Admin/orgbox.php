<!-- MODAL VIew -->
                     
                              <?php   include("conn.php");
                              error_reporting(0);

                              $id = $_POST['id'];
                              $tab = mysqli_query($conn,"SELECT * from org_applications where ID='$id'");

                              $updateStat = mysqli_query($conn, "UPDATE org_applications SET status = 1 WHERE ID = '$id'");

                          /* $name = "";
  $id = "";
  $gov = "";
  $adviser = "";
  $type = "";

  if(isset($_POST['submit']))
                                        {
                                            $name = $_POST['name'];
                                            $idd = $_POST['idd'];
                                            $gov = $_POST['gov'];
                                            $adviser = $_POST['adviser'];
                                            $type = $_POST['type'];

                                            //if ($type == "Govt. Funded Organization")

                                            $query = "INSERT INTO govt_funded_org(org_name,id,org_pres_gov,org_adviser) VALUES('$name','$idd','$gov','$adviser','$type')";
                                           $run = mysqli_query($conn,$query);

                                            if($run){

                                            echo '<script> alert("Complaint Sent"); </script>';
                                                    }
                                        else{
                                            echo '<script> alert("Complaint NOT Sent"); </script>';
                                        }
                                          } */

                                         
                              while($res = mysqli_fetch_array($tab)) {
                              echo '

                              <div class="modal-header">

                              <h5 class="modal-title"  ><input type="text" name="name" style="border:none;" value="'.$res['Org_Name'].'"></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <label  name="idd"><input type="text" name="idd" style="border:none;" value="'.$res['ID'].'"></label><br>
                              <label name="gov">Student Org. President/Governor: <input type="text" style="border:none;" name="gov" value="'.$res['Org_President_Governor'].'"></label><br>
                              <label name="adviser">Student Org. Adviser: <input type="text" style="border:none;" name="adviser" value="'.$res['Org_Adviser'].'"></label><br>
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
                                   <p class="card-text" style="font-size: 10px;margin-bottom:0">Application Letter</p>
                                    <p class="card-text" id="al"style="font-size: 10px;margin-bottom:0" ><i>'.$res['App_letter'].'</i></p>
                                  </div>
                                  <div class="card-body fs2">
                                      
                                    <a href="NewOrgApplicants.php?file_id='.$res['ID'].'&Application_Letter='.$res['App_letter'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                                  </div>
                                </div>
                              </div>

                           <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px;">
                               <div class="card-body fs1">
                               <p class="card-text" style="font-size: 10px;margin-bottom:0">Mission Vision Statement</p>
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><i>'.$res['MVS'].'</i></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="NewOrgApplicants.php?file_id='.$res['ID'].'&MVS='.$res['MVS'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>

                            <div class="col-sm">
                              <div class="tile card text-center h120" style="height:130px;">
                               <div class="card-body fs1">
                               <p class="card-text" style="font-size: 10px;margin-bottom:0">Notarized Affidavit of Leadership</p>
                                <p class="card-text"style="font-size: 10px;margin-bottom:0"><i>'.$res['Aff_Lead'].'</i></p>
                              </div>
                              <div class="card-body fs2">
                                  
                              <a href="NewOrgApplicants.php?file_id='.$res['ID'].'&Aff_Lead='.$res['Aff_Lead'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm">
                            <div class="tile card text-center h120" style="height:130px;">
                             <div class="card-body fs1">
                             <p class="card-text" style="font-size: 10px;margin-bottom:0">Resolution(Change/Edit CBL)</p>
                              <p class="card-text"style="font-size: 10px;margin-bottom:0"><i>'.$res['Resolution'].'</i></p>
                            </div>
                            <div class="card-body fs2">

                             <a href="NewOrgApplicants.php?file_id='.$res['ID'].'&Resolution='.$res['Resolution'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Letter of Permission</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i>'.$res['Letter_Permission'].'</i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id='.$res['ID'].'&Permission='.$res['Letter_Permission'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="row mt-2">
                     <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Letter of Consent</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i>'.$res['Letter_content'].'</i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id='.$res['ID'].'&Consent='.$res['Letter_content'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>

                    <div class="col-sm" >
                          <div class="tile card text-center h120" style="height:130px;" >
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">List of Officers and Members</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i>'.$res['Lists'].'</i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id='.$res['ID'].'&Lists='.$res['Lists'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>

                     <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Constitutional by Laws</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i>'.$res['ConsLaw'].'</i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id='.$res['ID'].'&ConsLaw='.$res['ConsLaw'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>

                     <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Office Logo</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i><input type="text" style="border:none;" name="logo" value="'.$res['Logo'].'"></i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id='.$res['ID'].'&Logo='.$res['Logo'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>

                     <div class="col-sm">
                          <div class="tile card text-center h120" style="height:130px;">
                           <div class="card-body fs1">
                           <p class="card-text" style="font-size: 10px;margin-bottom:0">Letter of Intent of the Adviser</p>
                            <p class="card-text"style="font-size: 10px;margin-bottom:0"><i>'.$res['Letter_intent'].'</i></p>
                          </div>
                          <div class="card-body fs2">
                            <a href="NewOrgApplicants.php?file_id='.$res['ID'].'&Intent='.$res['Letter_intent'].'"><button type="button" class="btn btn-info btn-sm mt-2"><i class=" fas fa-download" ></i></button></a>
                          </div>
                        </div>
                      </div>

                   </div>
                   <!--</div>-->
';  }  
               
      ?>
                 