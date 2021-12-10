
              <div class="modal fade" id="editdetails<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-md-9" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Student Org.</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>  
                      </button>
                    </div>

                    <?php
                    include('conn.php');

                                              
                                    
                    $array = array();           
                    $uid = $res['id'];
                    $query = mysqli_query($conn,'SELECT * FROM approve_funded where id <>"'. $res['id'].  '"');

                    ?>
                            <form method="POST" action="php/update_org.php">  
                    <div class="modal-body">
                      <div class="container">
                    <div class="row">
                   <div class="col-sm">

                 <h5 class="font-weight-bold">Organization Information</h5>

               
                <div class="row">
                <div class="form-group col-sm">
                <p>Organization Name
                <input class="form-control" type="text" id="orgname" name="orgname" value="<?php echo $res['org_name']; ?>" disabled>
                <input type="hidden" name="ID" value="<?php echo $uid ?>">
                </div>
                </p>
                </div>
                <div class="row">
                <div class="form-group col-sm">
                <p>Organization Governor/ President
                <input class="form-control" type="text" id="search" name="gov" value="<?php echo $res['org_pres_gov']; ?>">
                <div class="card-body">
                                          <div class="list-group list-group-item-action" id="content">
                                           
                                            
                                          </div>
                                        </div>
                </div>
                </p>
                </div>
                
                <div class="row">
                <div class="form-group col-sm">
                <p>Organization Adviser
                <input class="form-control" type="text" id="adviser" name="adviser" value="<?php echo $res['org_adviser']; ?>">
                </div></p></div>
                <div class="row">
                <div class="form-group col-sm">
                <p>Organization Type
                <select class="form-control" id="type" name="type" disabled=""> 
                      <option value="<?php echo $res["type"] ?>" selected=""><?php echo $res["type"] ?></option>
                                      <?php 
                                        if($res["type"]=="Govt. Funded") {
                                            echo "<option value ='Non-Funded'>Non-Funded</option>";
                                        }else if($res["fund_type"]=="Non Govt.-Funded") {
                                            echo "<option value ='Funded'>Funded</option>";
                                        }
                                        else{
                                            echo "<option value ='Funded'>Funded</option>";                                          
                                            echo "<option value ='Non-Funded'>Non-Funded</option>";
                                        }
                                      ?>
                      </select>
                </div>
                </p></div>
                </div>


                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success" name="submit">Update</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          