          <!-- View Forms Modal -->

                      
              <div class="modal fade" id="exampleModalLong<?php echo $res['staff_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">View Faculty/Staff Account</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                    <div class="row">
                  <div class=""><?php    
                  $id2= $res['staff_id'];  
                    $result = mysqli_query($conn, "SELECT * FROM staffdetails WHERE staff_id = '$id2'");
                     $row = mysqli_fetch_assoc($result);
                      if($row['pic']== NULL){
                       echo '<img src="../../images/logo.png" class="pix"/>'; 
                      }else{
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).'" class="pix"/>';
                      }
                   ?></div>
                   <div class="col-sm">

                    <h3 class="font-weight-bold">ID NUMBER: <span class="font-weight-lighter ml-2"><?php echo $res['staff_id']; ?></span></h3> 

                   <h5 class="font-weight-bold">Personal Information</h5> 


                   <?php if (empty($res['extension']) ) { ?>
                         <h6 class="font-weight-bold">Full Name: <span class="font-weight-lighter ml-2"><?php echo $res["title"]. ' ' .$res["first_name"]. ' ' .$res["middle_name"]. ' ' .$res["last_name"]. ' ' .$res["suffix"].  ' ' .$res["extension"]; ?></span></h6>
                   <?php }else{ ?>
                          <h6 class="font-weight-bold">Full Name: <span class="font-weight-lighter ml-2"><?php echo $res["title"]. ' ' .$res["first_name"]. ' ' .$res["middle_name"]. ' ' .$res["last_name"]. ' ' .$res["suffix"].  ', ' .$res["extension"]; ?></span></h6>
                   <?php } ?> 
                

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
                              <h6 class="font-weight-bold">Nationality: <span class="font-weight-lighter ml-2"><?php echo $res['nationality'];?></span></h6>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Religion: <span class="font-weight-lighter ml-2"> <?php echo $res['religion'];?></span></h6>
                            </div>                            
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Contact: <span class="font-weight-lighter ml-2"><?php echo $res['phone_num'];?></span></h6>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Email: <span class="font-weight-lighter ml-2"> <?php echo $res['email_add'];?></span></h6>
                            </div>                            
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Address: <span class="font-weight-lighter ml-2"><?php echo $res['address'];?></span></h6>
                            </div>
                          </div>
                 
<br>
                 <h5 class="font-weight-bold">Employment Information</h5>

                        


                          <?php if ($res['type'] == 'Medical Personnel') {?>
                              <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Employee Type: <span class="font-weight-lighter ml-2"><?php echo $res['type'];?></span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Office: <span class="font-weight-lighter ml-2"><?php echo $res['office_name'];?></span></h6>
                            </div>
                          </div>
                           <div class="row">
                            
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Job Status: <span class="font-weight-lighter ml-2"> <?php echo $res['employment_status'];?></span></h6>
                            </div> 
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Position: <span class="font-weight-lighter ml-2"> <?php echo $res['position'];?></span></h6>
                            </div>
                          </div>
                           <div class="row">
                              
                          <div class="col-sm">
                              <h6 class="font-weight-bold">Access Level: <span class="font-weight-lighter ml-2"> <?php echo $res['access_level'];?></span></h6>
                            </div> 
                            <div class="col-sm">
                              <h6 class="font-weight-bold">License No.: <span class="font-weight-lighter ml-2"> <?php echo $res['license_number'];?></span></h6>
                            </div> 
                          </div>

                         
                          <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Professoinal Honorific: <span class="font-weight-lighter ml-2"> <?php echo $res['proffesional_honorific'];?></span></h6>
                            </div> 
                          <div class="col-sm">
                                 <h6 class="font-weight-bold">PTR No.: <span class="font-weight-lighter ml-2"> <?php echo $res['ptr_no'];?></span></h6>
                            </div> 
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Medical Specialty: <span class="font-weight-lighter ml-2"> <?php echo $res['medical_specialty'];?></span></h6>
                            </div> 
                          <div class="col-sm">
                              <h6 class="font-weight-bold">S2: <span class="font-weight-lighter ml-2"> <?php echo $res['s2'];?></span></h6>
                            </div> 
                          </div>
      

                           <?php }else{ ?>

                              <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Employee Type: <span class="font-weight-lighter ml-2"><?php echo $res['type'];?></span></h6>
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Office: <span class="font-weight-lighter ml-2"><?php echo $res['office_name'];?></span></h6>
                            </div>
                          </div>
                           <div class="row">
                            
                            <div class="col-sm">
                                 <h6 class="font-weight-bold">Department: <span class="font-weight-lighter ml-2"> <?php echo $res['dept_name'];?></span></h6>      
                            </div>
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Position: <span class="font-weight-lighter ml-2"> <?php echo $res['position'];?></span></h6>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Job Status: <span class="font-weight-lighter ml-2"> <?php echo $res['employment_status'];?></span></h6>
                            </div> 
                          <div class="col-sm">
                              <h6 class="font-weight-bold">Access Level: <span class="font-weight-lighter ml-2"> <?php echo $res['access_level'];?></span></h6>
                            </div> 
                          </div>

                           <?php } ?> 


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
