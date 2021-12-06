<form method="post" action="php/PreAlumni-VerifyAcc.php">
<div class="modal fade " id="studentdetails<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">

                      <h3 class="modal-title" id="exampleModalLongTitle"></h3>

                          <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $res['id']; ?></h5>
                          
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button></div>
                              <div class="modal-body c">
                                <div class="container">
                                  <?php 
                                      $sqlselect=mysqli_query($conn,"SELECT * FROM alumni where id='".$res['id']."'");
                                      $prorow=mysqli_fetch_array($sqlselect);
                                  ?>
                                  <h5 class="modal-title" id="exampleModalLongTitle"> Do you want to verify <?php echo $prorow['last_name'].", ".$prorow['first_name']; ?> account?</h5>
                                  <input class="form-control" type="password" id="pass" name="pass" placeholder="Input your password" required>


                                  <input type="hidden" name="SuperAdminID" value="1" >
                                 <input type="hidden" name="eid" value="<?php echo $res['id']; ?>">
                                <input type="hidden" name="efirst" value="<?php echo $prorow['first_name'].", ".$prorow['last_name']." .".$prorow['middle_name']; ?>">      
                                </div>
                              </div>
                    
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-success" value="Verify">                     
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      
                    </div>
                  </div>
                </div></form>
            