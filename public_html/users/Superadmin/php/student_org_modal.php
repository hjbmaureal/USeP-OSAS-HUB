
<div class="modal fade " class="school_org" id="details<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Organization ID: <?php echo $res['id']; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>




                    <div class="modal-body c">

                      <div class="container">
                      
                      <h6 class="font-weight-bold">Organization Name: <span class="font-weight-lighter ml-2"> <?php echo $res['org_name']; ?></span></h6>

     
                      <h6 class="font-weight-bold">Organization Governor: <span class="font-weight-lighter ml-2"> <?php echo $res['org_pres_gov']; ?></span></h6>

                    
                      <h6 class="font-weight-bold">Organization Adviser: <span class="font-weight-lighter ml-2"> <?php echo $res['org_adviser']; ?></span></h6>

                      <h6 class="font-weight-bold">Type: <span class="font-weight-lighter ml-2"> <?php echo $res['type'] ?></span></h6>

                     

                        </div>
</div>
                        <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>











