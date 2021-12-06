
<div class="modal fade " class="school_org" id="details<?php echo $res['org_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Organization ID: <?php echo $res['org_id']; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>




                    <div class="modal-body c">

                      <div class="container">
                      
                      <h6 class="font-weight-bold">Organization Name: <span class="font-weight-lighter ml-2"> <?php echo $res['org_name']; ?></span></h6>

                      <h6 class="font-weight-bold">Description: <span class="font-weight-lighter ml-2"> <?php echo $res['org_desc']; ?></span></h6>
     
                      <h6 class="font-weight-bold">Organization Governor: <span class="font-weight-lighter ml-2"> <?php echo $res['st_f']. ' ' .$res['st_m']. ' ' .$res['st_l']. ' (' .$res['staff_id']. ')'; ?></span></h6>

                    
                      <h6 class="font-weight-bold">Organization Adviser: <span class="font-weight-lighter ml-2"> <?php echo $res['sf_f']. ' ' .$res['sf_m']. '. ' .$res['sf_l'].  ' (' .$res['Student_id']. ')'; ?></span></h6>

                      <h6 class="font-weight-bold">Type: <span class="font-weight-lighter ml-2"> <?php echo $res['fund_type'] ?></span></h6>

                     

                        </div>
</div>
                        <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>











