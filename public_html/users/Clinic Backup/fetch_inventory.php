

<!-- Update Modal -->

<div class="modal fade" id="UpdateStock<?php echo $stock_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Update Stock</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                      <div class="modal-body c">
                        <div class="container">
                          <?php
                            $result=mysqli_query($db, "SELECT * FROM item_inventory where id='$stock_id'");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $dfrom= $res['datefrom'];
                                              $dto= $res['dateto'];
                                              $item_id = $res['id'];
                                              $itm_cde= $res['item_code'];
                                              $itm_nme= $res['item_name'];
                                              $qty = $res['received_qty'];
                                        }

                          ?>
                        <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                    <label for="exampleSelect1">Start Date</label>
                                    <input type="date" id="datepicker" name="dfrom" id="dfrom" class="bootstrap-select" value="<?php echo $dfrom ?>" style="width: 100%;">
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">End Date</label>
                                    <input type="date" id="datepicker" name="dto" id="dto" class="bootstrap-select" value="<?php echo $dto ?>" style="width: 100%;">
                                  </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label for="exampleSelect1">Item</label>
                                    <select class="bootstrap-select" name="itm_cd" id="itm_cd" style="width: 150px;">
                                         <option value="<?php echo $itm_cde; ?>"><?php echo $itm_nme;?></option>
                                      <?php
                                          $sql2="SELECT * FROM item_list";
                                          foreach ($db->query($sql2) as $row2){
                                        ?>
                                       <option class="select-item" value="<?php echo $row2['item_code'] ?>"><?php echo $row2['item_name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                          </div>

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label"> Quantity </label>
                                  <input class="form-control" type="number" name="rec_qty" id="rec_qty" value="<?php echo $qty ?>">
                                  <input type="text" name="id" id="id" value="<?php echo $item_id ?>" hidden>
                                </div>
                            </div>
                         
                          </div>

                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="update" class="btn btn-danger">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>

<!-- Distribute Modal -->
                <div class="modal fade " id="DistributeItem<?php echo $stock_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  role="document">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Distribute Item</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form method="POST">
                      <div class="modal-body c">
                        <div class="container">  

                        <br>
                      <?php
                            $result3=mysqli_query($db, "SELECT * FROM item_inventory where id='$stock_id'");               
                                          while($res3 = mysqli_fetch_array($result3)) {         
                                              $item_id2 = $res3['id'];
                                              $itm_nme2= $res3['item_name'];
                                              $apokon= $res3['issuance_apokon'];
                                              $mabini= $res3['issuance_mabini'];
                                              $qty2 = $res3['received_qty'];
                                              $bal= $res3['balance'];

                                        }

                          ?>
                        <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label for="exampleSelect1">Item</label>
                                    <input class="form-control" type="text" name="itm_nme2" id="itm_nme2" value="<?php echo $itm_nme2 ?>" disabled>
                                </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label for="exampleSelect1">Campus</label>
                                    <select class="form-control" id="campus" name="campus">
                                      <option value="Apokon">Apokon</option>
                                      <option value="Mabini">Mabini</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label"> Quantity </label>
                                  <input class="form-control" type="number" placeholder="Enter qty" name="num" id="num">
                                  <input type="text" name="id" id="id" value="<?php echo $item_id2 ?>" hidden>
                                  <input type="number" name="bal" id="bal" value="<?php echo $bal ?>" hidden>
                                </div>
                            </div>
                          </div>


                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="distribute">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
          
          <!-- Button trigger modal -->


<!-- Edit Unit Modal -->
<div class="modal fade" id="EditUnit<?php echo $unit_no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                      <div class="modal-body c">
                        <div class="container">
                       <?php
                          $result0=mysqli_query($db, "SELECT * FROM item_unit WHERE unit_id= '$unit_no'");
                            while($row0 = mysqli_fetch_array($result0)) {
                          $uncode=$row0['unit_id']; 
                          $un=$row0['unit']; 
                          }    
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
                        <button type="submit" name="edit_unit" class="btn btn-danger">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div> 

<!-- Edit Item Modal -->
<div class="modal fade" id="EditItem<?php echo $it_no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Item</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                      <div class="modal-body c">
                        <div class="container">
                       <?php
                     
                          $result3=mysqli_query($db, "SELECT item_list.*, item_unit.unit as unit_name FROM item_list JOIN item_unit ON item_unit.unit_id=item_list.unit WHERE id='$it_no'");
                            while($row3 = mysqli_fetch_array($result3)) {
                          $id=$row3['id']; 
                          $it_cd=$row3['item_code'];
                          $it_name=$row3['item_name'];
                          $unit_no =  $row3['unit'];
                          $unit_name =  $row3['unit_name'];
                          }    
                          ?>
                          


                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Item Code</label>
                                  <input type="hidden" name="cd" value="<?php echo $id;?>">
                                  <input class="form-control" type="text" value="<?php echo $it_cd;?>" name="icode">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                  <?php
                                    $sql4="SELECT unit_id, unit FROM item_unit";
                                  ?>
                                    <label for="exampleSelect1">Unit</label>
                                    <select class="form-control" id="exampleSelect1" name="iunit">
                                      <option value="<?php echo $unit_no;?>"><?php echo $unit_name;?></option>
                                      <?php
                                      $resultt=mysqli_query($db, "SELECT * FROM item_unit");  
                                       while($res = mysqli_fetch_array($resultt)) {         
                                              $value= $res['unit_id']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['unit'];?></option>
                                              <?php } ?>
                                    </select>
                                  </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Item Name</label>
                                  <input class="form-control" type="text" value="<?php echo $it_name;?>" name="iname">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="ed_item" class="btn btn-danger">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div> 






