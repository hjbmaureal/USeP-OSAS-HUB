
              <div class="modal fade" id="editdetails<?php echo $res['org_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    $uid = $res['org_id'];
                    $query = mysqli_query($conn,'SELECT * FROM school_organization where org_id <>"'. $res['org_id'].  '"');

                    ?>
                            <form method="POST" action="php/update_org.php">  
                    <div class="modal-body">
                      <div class="container">
                    <div class="row">
                   <div class="col-sm">

                 <h5 class="font-weight-bold">Organization Information</h5>

                <div class="row">
                <div class="form-group col-sm">
                <p>Organization desc
                <input class="form-control" type="text" id="orgdesc" name="orgdesc" value="<?php echo $res['org_desc']; ?>">
                <input type="hidden" name="ID" value="<?php echo $uid ?>">
                </div>
                </p>
                </div>
                <div class="row">
                <div class="form-group col-sm">
                <p>Organization Name
                <input class="form-control" type="text" id="orgname" name="orgname" value="<?php echo $res['org_name']; ?>">
                <input type="hidden" name="ID" value="<?php echo $uid ?>">
                </div>
                </p>
                </div>
                <div class="row">
                <div class="form-group col-sm">
                <p>Organization Governor/ President
                <input class="form-control" type="text" id="gov" name="gov" value="<?php echo $res['governor_id']; ?>">
                </div>
                </p>
                </div>
                <div class="row">
                <div class="form-group col-sm">
                <p>Organization Adviser
                <input class="form-control" type="text" id="adviser" name="adviser" value="<?php echo $res['staff_id']; ?>">
                </div></p></div>
                <div class="row">
                <div class="form-group col-sm">
                <p>Organization Type
                <select class="form-control" id="type" name="type"> 
                      <option value="<?php echo $res["fund_type"] ?>" selected=""><?php echo $res["fund_type"] ?></option>
                                      <?php 
                                        if($res["fund_type"]=="Funded") {
                                            echo "<option value ='Non-Funded'>Non-Funded</option>";
                                        }else if($res["fund_type"]=="Non-Funded") {
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