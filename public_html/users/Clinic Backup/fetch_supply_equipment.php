

<!-- Edit Equipment/Supply Modal -->
<div class="modal fade" id="EditSE<?php echo $se_no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Supply/Equipment</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                      <div class="modal-body c">
                        <div class="container">
                       <?php
                     
                          $result3=mysqli_query($db, "SELECT supply_equipment_list.*, supply_equipment_type.type as type_name FROM supply_equipment_list JOIN supply_equipment_type ON supply_equipment_type.type_id=supply_equipment_list.type WHERE id='$se_no'");
                            while($row3 = mysqli_fetch_array($result3)) {

                          $id=$row3['id']; 
                          $se_cd=$row3['supply_equipment_code'];
                          $se_name=$row3['supply_equipment_name'];
                          $type_no =  $row3['type'];
                          $type_name =  $row3['type_name'];
                          }    
                          ?>
                          

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Supply/Equipment Code</label>
                                  <input type="hidden" name="cd" value="<?php echo $id;?>">
                                  <input class="form-control" type="text" value="<?php echo $se_cd;?>" name="se_cd">
                                </div>

                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                  <?php
                                    $sql4="SELECT type_id, type FROM supply_equipment_type";
                                  ?>
                                    <label for="exampleSelect1">Type</label>
                                    <select class="form-control" id="exampleSelect1" name="se_type">
                                        <?php
                                      $resultt=mysqli_query($db, "SELECT * FROM supply_equipment_type");  
                                       while($res = mysqli_fetch_array($resultt)) {         
                                              $value= $res['type_id']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['type'];?></option>
                                              <?php } ?>
                                    </select>
                                  </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Equipment or Supply</label>
                                  <input class="form-control" type="text" value="<?php echo $se_name;?>" name="se_name">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="EditSE">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div> 


        





