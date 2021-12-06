          <!-- View Forms Modal -->
                      
              <div class="modal fade" id="exampleModalLong<?php echo $res['staff_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">View Faculty/Staff Acoount</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                    <div class="row">
                  <div class="id-pic"><img src='image/logo.png' class= 'pix'></div>
                   <div class="col-sm">

                    <h3 class="font-weight-bold">ID NUMBER: <span class="font-weight-lighter ml-2"><?php echo $res['staff_id']; ?></span></h3> 

                   <h5 class="font-weight-bold">Personal Information</h5> 
                   <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"><?php echo $res['fullname']; ?></span></h6>

                             <div class="row">
                            <div class="col-sm">
                             <h6 class="font-weight-bold">Gender: <span class="font-weight-lighter ml-2"> <?php echo $res['sex'];?></span></h6>
                            </div> 
                            <div class="col-sm">
                               <h6 class="font-weight-bold">Civil Status: <span class="font-weight-lighter ml-2"> <?php echo $res['civil_status'];?></span></h6>
                            </div> 
                          </div>
                           <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Birth Date: <span class="font-weight-lighter ml-2"> <?php echo $res['birthdate'];?></span></h6>
                            </div>                            
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Birth Place: <span class="font-weight-lighter ml-2"> <?php echo $row['birth_place'];?></span></h6>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Religion: <span class="font-weight-lighter ml-2"> <?php echo $res['religion'];?></span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Nationality: <span class="font-weight-lighter ml-2"><?php echo $res['nationality'];?></span></h6>
                            </div>
                          </div>
<br>
                 <h5 class="font-weight-bold">Employment Information</h5>

                          <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Employee Type: <span class="font-weight-lighter ml-2"><?php echo $res['employment_status'];?></span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Office: <span class="font-weight-lighter ml-2"><?php echo $res['office_name'];?></span></h6>
                            </div>
                          </div>
                           <div class="row">
                            
                            <div class="col-sm">
                              <h6 class="font-weight-bold">College: <span class="font-weight-lighter ml-2"> <?php echo $row['school_year'];?></span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Department: <span class="font-weight-lighter ml-2"> <?php echo $res['dept_name'];?></span></h6>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Job Status: <span class="font-weight-lighter ml-2"> <?php echo $res['type'];?></span></h6>
                            </div> 
                          <div class="col-sm">
                              <h6 class="font-weight-bold">Position: <span class="font-weight-lighter ml-2"> <?php echo $res['type'];?></span></h6>
                            </div> 
                          </div>

<br>
                    </div>
                  </div>
                    </div>
</div>                    <div class="modal-footer">

                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</div>
                </div>
              </div>
            </div>
