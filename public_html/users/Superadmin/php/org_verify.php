 <form method="POST" action="php/org_act-dis.php">    
<div class="modal fade " id="org_verify<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">

                      <h3 class="modal-title" id="exampleModalLongTitle"></h3>

                          <h5 class="modal-title" id="exampleModalLongTitle">Verify password</h5>
                          
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button></div>
                              <div class="modal-body c">
                                <div class="container">
                                  <h6>Superadmin Password:</h6>
                                  <input class="form-control" type="password" id="pass" name="pass" placeholder="Input your password" required>  
                                  
                                  <?php include('../../conn.php');
                                      $sqlselect=mysqli_query($conn,"SELECT * FROM approve_funded where id='".$res['id']."'");
                                      $prorow=mysqli_fetch_array($sqlselect);
                                  ?>

                                  <input type="hidden" name="eid" value="<?php echo $res['id']; ?>">
                                  <input type="hidden" name="status" value="<?php echo $prorow['status']; ?>">
                                </div>

                              </div>
                    
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-success"  value="Verify">                     
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      
                    </div>
                  </div>
                </div></form>
            