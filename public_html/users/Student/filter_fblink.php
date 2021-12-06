<?php 
if (isset($_POST['mode'])) { 
	$mode=$_POST['mode']; 
	if ($mode=='1') {
	?>
						<div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Facebook Link</label>
                                  <input type="text" name="link" id="link" class="form-control " required="">
                                </div>
                            </div>
                          </div>
<?php }else{ ?>

<?php }}



?>