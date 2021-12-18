<?php 
include('connect.php');
if (isset($_POST['id'])) {
  $id=$_POST['id'];
  $search="SELECT * from consultation_details where Status = 'Completed'";

  $result = mysqli_query($connect, $search);
    $count=mysqli_num_rows($result);


    if(!$count){ ?>

                        

                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Consultation Type:</label><input class="form-control" type="text" placeholder="" value="SORRY! NO RECORD FOUND!" readonly="">
                                </div>
                            </div>
                          </div>
                          
                            <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Problem:</label><input class="form-control" type="text" placeholder="" value="SORRY! NO RECORD FOUND!" readonly="">
                                </div>
                            </div>
                          </div>


    <?php }

  while ($row2 = mysqli_fetch_assoc($result)) { ?>
              <div class="row">
                          
        

                           <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Consultation Type:</label><input class="form-control" type="text" placeholder="" value="<?php echo $row2['consultation_type'];?>" readonly="">
                                </div>
                            </div>
                          </div>
                          
                            <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Problem:</label><input class="form-control" type="text" placeholder="" value="<?php echo $row2['problems'];?>" readonly="">
                                </div>
                            </div>
                          </div>

             
                
  <?php }

}


?>