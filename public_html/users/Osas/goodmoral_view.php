<div class="modal fade " id="exampleModalLong<?php echo $row['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                          <h6 class="font-weight-bold">OR No.:
                          <span class="ml-1 font-weight-normal"><?php echo $row['or_no'] ?></span></h6> 
                          <h6 class="font-weight-bold">Name:
                          <span class="ml-1 font-weight-normal"><?php echo $row["first_name"]. ' ' .$row["middle_name"]. ' ' .$row["last_name"]; ?></span></h6> 
                          <h6 class="font-weight-bold">Degree:
                          <span class="ml-1 font-weight-normal"><?php echo $row['name'] ?></span></h6> 
                          <h6 class="font-weight-bold">Major:
                          <span class="ml-1 font-weight-normal"><?php echo $row['major'] ?></span></h6> 
                          <h6 class="font-weight-bold">School Year:
                          <span class="ml-1 font-weight-normal"><?php echo $row['last_sy_attended'] ?></span></h6> 
                          <h6 class="font-weight-bold">Purpose:
                          <span class="ml-1 font-weight-normal"><?php echo $row['purpose'] ?></span></h6> 
                          <h6 class="font-weight-bold">Submitted OR:</h6>
                          <center><img src="data:image/jpg; image/png; image/JPEG; image/JPG; image/PNG; image/jpeg; charset=utf8;base64,<?php echo base64_encode($row['or_pic']) ?>"></center>

                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>