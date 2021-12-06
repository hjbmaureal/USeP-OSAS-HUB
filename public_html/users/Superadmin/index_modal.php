<div class="modal fade " id="Details<?php echo $res['Student_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $res['reg_id']; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


 <?php
 include("conn.php");
$uid = $res['Student_id'];
$query=mysqli_query($conn,"call spGetAllStudentDetails('$uid')");
$count = mysqli_num_rows($query);
while($row=mysqli_fetch_array($query)){
$name = $row['fullname'];



?>
       <div class="modal-body">
                            <div class="container">
                           <div class="row">
                             <div class="col-sm">
                           <div class="id-pic"><img src='<?php echo $res['pic']; ?>' class= 'pix'></div>
                   <div class="col-sm">


                    <h3 class="font-weight-bold">ID NUMBER: <span class="font-weight-lighter ml-2"><?php echo $res['Student_id']; ?></span></h3> 

                     <h5 class="font-weight-bold">Personal Information</h5> 
                   <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"><?php echo $name ?></span></h6>

                <div class="row">
                  <div class="form-group col-sm-10">
                   <h6 class="font-weight-bold">   Address: <span class="font-weight-lighter ml-2"><?php echo $row['full_address'];?></span></h6>
                 </div>
                <div class="form-group col-sm-3">
                <h6 class="font-weight-bold">Zip Code:<span class="font-weight-lighter ml-2"><?php echo $row['zip_code'];?></span></h6>
                </div>
                </div>
          <div class="row">
                            <div class="col-sm">
                             <h6 class="font-weight-bold">Gender: <span class="font-weight-lighter ml-2"> <?php echo $row['sex'];?></span></h6>
                            </div> 
                            <div class="col-sm">
                               <h6 class="font-weight-bold">Civil Status: <span class="font-weight-lighter ml-2"> <?php echo $row['civil_status'];?></span></h6>
                            </div> 
                          </div>
                           <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Birth Date: <span class="font-weight-lighter ml-2"> <?php echo $row['birth_date'];?></span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Birth Place: <span class="font-weight-lighter ml-2"> <?php echo $row['birth_place'];?></span></h6>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Religion: <span class="font-weight-lighter ml-2"> <?php echo $row['religion'];?></span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Nationality: <span class="font-weight-lighter ml-2"><?php echo $row['nationality'];?></span></h6>
                            </div>
                          </div>
<br>
                 <h5 class="font-weight-bold">School Information</h5>

                          <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Section: <span class="font-weight-lighter ml-2"><?php echo $row['section'];?></span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Year Level: <span class="font-weight-lighter ml-2"><?php echo $row['year_level'];?></span></h6>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">School Year: <span class="font-weight-lighter ml-2"> </span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Semester: <span class="font-weight-lighter ml-2"></span></h6>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Student Type: <span class="font-weight-lighter ml-2"> <?php echo $row['type'];?></span></h6>
                            </div> 
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Student Status: <span class="font-weight-lighter ml-2"><?php echo $row['student_status'];?></span></h6>
                            </div>
                          </div>
    <br>
                <h5 class="font-weight-bold">Family Information</h5>

                          <h6 class="font-weight-bold">Living with: <span class="font-weight-lighter ml-2"><?php echo $row['living_with'];?></span></h6>
                          <br>
                          <div class="row">
                          <div class="col">
                            <h6 class="font-weight-bold">Other's Please Specify :</h6>
                             <h6 class="font-weight-lighter "> <?php echo $row['guardian_name'];?></h6>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm">
                            <h6 class="font-weight-bold">Contact No.:</h6>
                            <h6 class="font-weight-lighter "> <?php echo $row['guardian_contact'];?></h6>
                          </div>
                          <div class="col-sm">
                            <h6 class="font-weight-bold">City Address:</h6>
                            <h6 class="font-weight-lighter "> <?php echo $row['city_address'];?></h6>
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
                            <h6 class="font-weight-bold">Name (Mother/Father)*</h6>
                            <h6 class="font-weight-lighter "> <?php echo $row['parent_name'];?></h6>
                          </div>
                          <div class="col-sm">
                            <h6 class="font-weight-bold">Occupation: </h6>
                            <h6 class="font-weight-lighter "> <?php echo $row['parent_occupation'];?></h6>
                          </div>
                        </div>
                        <div class="row">
                             <div class="col-sm">
                            <h6 class="font-weight-bold">Contact:</h6>
                            <h6 class="font-weight-lighter "> <?php echo $row['parents_contact'];?></h6>
                          </div>
                          <div class="col">
                            <h6 class="font-weight-bold">City Address:</h6>
                            <h6 class="font-weight-lighter "> <?php echo $row['parents_address'];?></h6>
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
                            <h6 class="font-weight-lighter "> <?php echo $row['spouse_name'];?></h6>
                          </div>
                          <div class="col-sm">
                            <h6 class="font-weight-bold">Occupation:</h6>
                            <h6 class="font-weight-lighter "> <?php echo $row['spouse_occupation'];?></h6>
                          </div>
                          </div>
                            <br>
                            <br>

                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>


          
              </div><?php  } ?>
