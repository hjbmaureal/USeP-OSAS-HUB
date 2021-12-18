          <div class="modal fade " id="EquipmentCondition<?php echo $eqs_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Condition for Supply/Equipment</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                      <div class="modal-body c">
                        <div class="container">
                          
                            
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label for="exampleSelect1">Equipment or Supply</label><br>
                                  <input class="form-control" name="id" id="id" type="text" value="<?php echo $eqs_id; ?>" hidden>
                                    <select class="bootstrap-select" name="se_no" id="se_no" style="width: 100%;">

                                    
                                              <?php
                                           $result=mysqli_query($db, "SELECT * FROM supply_equipment_inventory where id=$eqs_id");               
                                          while($res = mysqli_fetch_array($result)) {   
                                              $qty = $res['qty'];      
                                              $value= $res['supply_equipment_code']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['supply_equipment_name'];?></option>
                                              <?php } ?>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <input class="form-control" name="qty" id="qty" type="text" value="<?php echo $qty; ?>" hidden>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label"> Semi-functional </label>
                                  <input class="form-control" name="qty_semifunctional" id="qty" type="number" placeholder="Enter qty">
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label"> Non-functional </label>
                                  <input class="form-control" name="qty_nonfunctional" id="qty" type="number" placeholder="Enter qty">
                                </div>
                            </div>

                            
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="update_condition">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>


          <div class="modal fade " id="SupplyCondition<?php echo $se_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Condition for Supply/Equipment</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                      <div class="modal-body c">
                        <div class="container">
                          
                            
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label for="exampleSelect1">Equipment or Supply</label><br>
                                  <input class="form-control" name="id" id="id" type="text" value="<?php echo $se_id; ?>" hidden>
                                    <select class="bootstrap-select" name="se_no" id="se_no" style="width: 100%;">

                                    
                                              <?php
                                           $result=mysqli_query($db, "SELECT * FROM supply_equipment_inventory where id=$se_id");               
                                          while($res = mysqli_fetch_array($result)) {   
                                              $qty = $res['qty'];
                                              $available = $res['available']; 
                                              $consumed = $res['consumed'];
                                              $total = $qty-$consumed;      
                                              $value= $res['supply_equipment_code']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['supply_equipment_name'];?></option>
                                              <?php } ?>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <input class="form-control" name="qty" id="qty" type="text" value="<?php echo $qty; ?>" hidden>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label"> Available </label>
                                  <input class="form-control" name="available" id="qty" type="number" value="<?php echo $total; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label"> Consume </label>
                                  <input class="form-control" name="consume" id="qty" type="number" placeholder="Enter qty">
                                </div>
                            </div>

                            
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="supply_consume">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>


 <div class="modal fade " id="edit<?php echo $eqs_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            $sql1="SELECT condition_id, supply_equipment_condition FROM supply_equipment_condition";
                          ?>

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                 <input class="form-control" name="id" id="" type="number" value="<?php echo $eqs_id; ?>" hidden>
                                    <label for="exampleSelect1">Start Date</label>
                                    <input type="date" id="date_from" name="date_from" placeholder="From" class="bootstrap-select " style="width: 100%;">
                                  </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">End Date</label>
                                    <input type="date" id="date_to" name="date_to" placeholder="To" class="bootstrap-select " style="width: 100%;">
                                  </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label for="exampleSelect1">Equipment or Supply</label><br>
                                    <select class="bootstrap-select" name="se_no" id="se_no" style="width: 100%;">
                                    
                                              <?php
                                           $result=mysqli_query($db, "SELECT * FROM supply_equipment_inventory where id='$eqs_id'");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $value= $res['supply_equipment_code']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['supply_equipment_name'];?></option>
                                              <?php } ?>
                                    </select>
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label"> Quantity </label>
                                  <input class="form-control" name="qty" id="qty" type="number" placeholder="Enter qty">
                                </div>
                            </div>


                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="edit">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
