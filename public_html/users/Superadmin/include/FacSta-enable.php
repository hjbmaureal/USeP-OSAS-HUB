    <!-- Enable Modal -->

       <form method="POST" action="php/staff_disable.php"> 
                      <div class="modal fade" id="enable-dialog<?php echo $res['staff_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-md" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Enable Faculty/Staff Acoount</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                    
              <div class="form-group ">
                          <input type="hidden" name="eid" id="eid" value="<?php echo $res['staff_id']; ?>" >
                          <input type="hidden" name="stats" id="stats" value="Active">
                <p style="text-align: center;">Super Admin Password
                <input class="form-control" type="Password" id="password" name="password">
                </p>
                                 </div>
                               </div>
                             </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Verify</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
              </div>
            </div>
          </form>