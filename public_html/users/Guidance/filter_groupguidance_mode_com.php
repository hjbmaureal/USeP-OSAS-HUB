<?php 
if (isset($_POST['mode'])) { 
  $mode=$_POST['mode']; 
  if ($mode=='1') {
  ?>
            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <b>Facebook Link:</b> <input type="text"  style="width: 272%;" name="gguidance_link" id="gguidance_link" class="form-control " required="">
                                </div>
                            </div>
                          </div>
<?php }if($mode=='3'){ ?>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <b>Meeting Link:</b> <input type="text"  style="width: 272%;" name="gguidance_link" id="gguidance_link" class="form-control " required="">
                                </div>
                            </div>
                          </div>

<?php }if($mode=='4'){ ?>
            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <b>Meeting Link:</b> <input type="text" style="width: 272%;" name="gguidance_link" id="gguidance_link" class="form-control " required="">
                                  <b>Passcode:</b> <input type="text" name="code"style="width: 272%;" id="code" class="form-control " required="">

                                </div>
                            </div>
                          </div>



<?php }else{ ?>

<?php }}



?>
