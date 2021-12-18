  <!-- Edit Unit Modal -->
       <div class="modal fade" id="EditUnit<?php echo $unit_no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                          <form method="post" name="frm">  
                          <?php
                          
                          $sql0 = "SELECT * FROM item_unit WHERE unit_id= '$unit_no'";
                          $result0 = $db->query($sql);
                          $uncode=$row['unit_id']; 
                          $un=$row['unit'];       
                          ?>
                          

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Unit</label>
                                  <input type="hidden" name="ucode" value="<?php echo $uncode;?>">
                                  <input class="form-control" type="text" name="ed_unitnm" value="<?php echo $un;?>" >
                              
                                </div>
                            </div>
                          
                          </div>


                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="edit_unit">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>   

<!-- EDIT ITEM Modal-->
        <div class="modal fade " id="EditItem<?php echo $it_no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Item</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                          <form method="post">  
                            <?php
                            $sql3 = "SELECT item_list.*, item_unit.unit as unit_name FROM item_list JOIN item_unit ON item_unit.unit_id=item_list.unit";
                            $result3 = $db->query($sql3);
                             
                            ?>

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Item Code</label>
                                  <input type="hidden" name="cd" value="<?php echo $row['id'];?>">
                                  <input class="form-control" type="text" value="<?php echo $row['item_code'];?>" name="icode">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                  <?php
                                    $sql4="SELECT unit_id, unit FROM item_unit";
                                  ?>
                                    <label for="exampleSelect1">Unit</label>
                                    <select class="form-control" id="exampleSelect1" name="iunit">
                                      <option value="<?php echo $row['unit'];?>"><?php echo $row['unit_name'];?></option>
                                      <?php
                                          foreach ($db->query($sql4) as $row4){
                                        ?>
                                      <option value="<?php echo $row4['unit_id'];?>"><?php echo $row4['unit'];?></option>
                                        <?php } ?>
                                    </select>
                                  </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Item Name</label>
                                  <input class="form-control" type="text" value="<?php echo $row['item_name'];?>" name="iname">
                                </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="ed_item">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>  