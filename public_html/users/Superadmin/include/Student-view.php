        <!-- View Forms Modal -->
                      
  <div class="modal fade" id="exampleModalLong<?php echo $res['student_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">View Student Acoount</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                    <div class="row">
                  <div class="id-pic"><?php    
                  $id2= $res['student_id'];  
                    $result = mysqli_query($conn, "SELECT * FROM studentdetails where Student_id='$id2'");
                     $row = mysqli_fetch_assoc($result);
                      if($row['pic']== NULL){
                       echo '<img src="../../images/logo.png" class="pix"/>'; 
                      }else{
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).'" class="pix"/>';
                      }
                   ?></div>
                   <div class="col-sm">

                    <h3 class="font-weight-bold">ID NUMBER: <span class="font-weight-lighter ml-2"><?php echo $res['student_id']; ?></span></h3> 

                   <h5 class="font-weight-bold">Personal Information</h5> 
                   <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"><?php echo $res['fullname']; ?></span></h6>

                <div class="row">
                <div class="form-group col-sm-9">
                <h6 class="font-weight-bold">Address: <span class="font-weight-lighter ml-3"><?php echo $res['full_address'];?></span></h6>
                </div>
                </div>
                <div class="row">
                <div class="form-group col-sm-3">
                <h6 class="font-weight-bold">Zip Code:<span class="font-weight-lighter ml-2"><?php echo $res['zip_code'];?></span></h6>
              </div>
                </div>
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
                              <h6 class="font-weight-bold">Birth Date: <span class="font-weight-lighter ml-2"> <?php echo $res['birth_date'];?></span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Birth Place: <span class="font-weight-lighter ml-2"> <?php echo $res['birth_place'];?></span></h6>
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
                 <h5 class="font-weight-bold">School Information</h5>

                          <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Section: <span class="font-weight-lighter ml-2"><?php echo $res['section'];?></span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Year Level: <span class="font-weight-lighter ml-2"><?php echo $res['year_level'];?></span></h6>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">School Year: <span class="font-weight-lighter ml-2"> <?php// echo $res['school_year'];?></span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Semester: <span class="font-weight-lighter ml-2"> <?php //echo $res['semester'];?></span></h6>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Student Type: <span class="font-weight-lighter ml-2"> <?php echo $res['type'];?></span></h6>
                            </div> 
                          </div>
    <br>
                <h5 class="font-weight-bold">Family Information</h5>

                          <h6 class="font-weight-bold">Living with: <span class="font-weight-lighter ml-2"><?php echo $res['living_with'];?></span></h6>
                          <br>
                          <div class="row">
                          <div class="col">
                            <h6 class="font-weight-bold">Other's Please Specify :</h6>
                             <h6 class="font-weight-lighter "> <?php echo $res['others_specify'];?></h6>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm">
                            <h6 class="font-weight-bold">Contact No.:</h6>
                            <h6 class="font-weight-lighter "> <?php //echo $res['others_contact'];?></h6>
                          </div>
                          <div class="col-sm">
                            <h6 class="font-weight-bold">City Address:</h6>
                            <h6 class="font-weight-lighter "> <?php //echo $res['others_address'];?></h6>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col">
                            <h6 class="font-weight-bold">Parent's Information</h6>
                          </div>
                          </div>

                        <div class="row">
                          <div class="col-sm">
                            <h6 class="font-weight-bold">Name (Mother/Father):</h6>
                            <h6 class="font-weight-lighter "> <?php echo $res['parent_name'];?></h6>
                          </div>
                          <div class="col-sm">
                            <h6 class="font-weight-bold">Occupation: </h6>
                            <h6 class="font-weight-lighter "> <?php echo $res['parent_occupation'];?></h6>
                          </div>
                        </div>
                        <div class="row">
                             <div class="col-sm">
                            <h6 class="font-weight-bold">Contact:</h6>
                            <h6 class="font-weight-lighter "> <?php echo $res['parents_contact'];?></h6>
                          </div>
                          <div class="col">
                            <h6 class="font-weight-bold">City Address:</h6>
                            <h6 class="font-weight-lighter "> <?php echo $res['parents_address'];?></h6>
                          </div>
                          </div>
                          <br>
                          <div class="row">
                          <div class="col">
                            <h6 class="font-weight-bold">Spouse Information</h6>
                          </div>
                          </div>
                         <div class="row">
                          <div class="col-sm">
                            <h6 class="font-weight-bold">Spouse Name:</h6>
                            <h6 class="font-weight-lighter "> <?php echo $res['spouse_name'];?></h6>
                          </div>
                          <div class="col-sm">
                            <h6 class="font-weight-bold">Occupation:</h6>
                            <h6 class="font-weight-lighter "> <?php echo $res['spouse_occupation'];?></h6>
                          </div>
                          </div>



<br>
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

