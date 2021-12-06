        <!-- View Pending Forms Modal -->
              <div class="modal fade" id="exampleModal<?php echo $res['Complaint_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Complaint Form</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                                   <h5 class="font-weight-bold">Personal Information</h5> 
                <div class="row">
                <div class="col-sm">               
                <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"><?php echo $res['fullname']; ?></span></h6>
                </div>
                <div class="col-sm-3">               
                <h6 class="font-weight-bold">Date: <span class="font-weight-lighter ml-2"><?php echo $res['Date_Submitted']; ?></span></h6>
                </div>
                </div>
                <h6 class="font-weight-bold">Designation: <span class="font-weight-lighter ml-2"><?php echo $res['type']; ?></span></h6>
                <h6 class="font-weight-bold">College: <span class="font-weight-lighter ml-2"><?php echo $res['college']; ?></span></h6>
                <h6 class="font-weight-bold">Course: <span class="font-weight-lighter ml-2"><?php echo $res['coursename']; ?></span></h6>
                <h6 class="font-weight-bold">Year Level: <span class="font-weight-lighter ml-2"><?php echo $res['year_level']; ?></span></h6>
<br>
                <h5 class="font-weight-bold">Complainant Information</h5>
                <div class="row">
                <div class="col-sm">  
                <h6 class="font-weight-bold">Date of Incident: <span class="font-weight-lighter ml-2"><?php echo  $res['Date_of_incident']; ?></span></h6>
                <h6 class="font-weight-bold">Location of Incident: <span class="font-weight-lighter ml-2"><?php echo $res['Loc_of_incident']; ?></span></h6>
                <h6 class="font-weight-bold">Time of Incident: <span class="font-weight-lighter ml-2"><?php echo $res['Time_of_incident']; ?></span></h6>
                <h6 class="font-weight-bold">Name of the Person Being Complained: <span class="font-weight-lighter ml-2"><?php echo $res['Person_Complained']; ?></span></h6>
                <h6 class="font-weight-bold">Designation of the Person Being Complained: <span class="font-weight-lighter ml-2"><?php echo $res['Designation_Complained']; ?></span></h6>


                <br>              
                <div class="row">
                <div class="form-group col-sm">
                <p style="font-weight: bolder;">Complaint Details: 
                <span class="font-weight-lighter ml-2"><?php echo $res['Complaint_Detail']; ?></span>
                </div></p></div>

                 <p class="font-weight-bold">Indicate Witnesses of Incident &nbsp;<i style="color: red;">(if applicable) </i>
                </p>
                <div class="row">
                <div class="col-sm">               
                <h6 class="font-weight-bold">1. <span class="font-weight-lighter ml-2"><?php echo $res['Witness1']; ?></span></h6>
                <h6 class="font-weight-bold">2. <span class="font-weight-lighter ml-2"><?php echo $res['Witness2']; ?></span></h6>
                <h6 class="font-weight-bold">3. <span class="font-weight-lighter ml-2"><?php echo $res['Witness3']; ?></span></h6>
              </div>
            </div>

              <?php //$query=mysqli_query($conn,"call spGetAllStudentDetails('$id')");
// $row=mysqli_fetch_array($query);
// $count = mysqli_num_rows($query);
// while($row=mysqli_fetch_array($query)){
// $pic = $row["e_signature"];

// header("content-type: ../image/");
 ?>
               <div class="row">
                <div class="form-group col-m-2">
                <label class="control-label cl mt-5">Respectfully,</label><br>
          <img id="report-student-signature" class="e-sign" width="200" height="200" style="margin-bottom:-90px; margin-top: -80px; margin-left: -70px; position:relative;" src="data:image/jpeg;base64,<?php echo base64_encode( $res['e_signature'] ); ?>"><br>
    <span class="font-weight-lighter "><p class="Signature" style="border: 0;border-bottom: 1px solid #000; font-size: 120%;text-transform: uppercase;"></span><br>
 <span class="font-weight-lighter "><?php echo $res['fullname']; ?></span>
        <?php //}?>
                <p style="margin-top: -8%">(Signature over printed name)
                </p>          
                </div>
              </input>
              </div>
            </div>
              </div>
          
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div></div>
                </div>
              </div>
            </div>
          </div>
