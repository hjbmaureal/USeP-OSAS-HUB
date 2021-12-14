
  <div class="modal fade " id="acknowledgement<?php echo $row['referral_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<?php $referral_id = $row['referral_id']; ?>


                  <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 1000px; margin-left:-230px;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">RETURN ACKNOWLEDGEMENT SLIP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
<?php 
          include('conn.php');
        $sqlselect=mysqli_query($conn,"SELECT referral_form.referral_id, referral_form.date_filed, referral_form.refdate_completed, referral_form.notes, staff.first_name as fname, staff.last_name as lname, staff.position, staff.e_signature, student.Student_id,student.first_name, student.last_name, student.year_level, student.section, student.phone_number, course.title from referral_form join staff USING(staff_id) join student USING(Student_id) join course USING(course_id) where referral_id='$referral_id'");
            $row=mysqli_fetch_array($sqlselect);
            
 ?> 

                      <form method="POST">
                      <div class="modal-body c">
                        <div class="container">
                          <div class="tile" style="border-width: 2px; border-style:solid;">
                          <div class="col-sm">
                          <div class="tile inline-block float ml-2 mt-1" style="border-width:1px; border-style: solid;">
                            <h9>Form No.: FM-USeP-GCS-01</h9><br>
                            <h9>Issue Status: 04</h9><br>
                            <h9>Revision No.: 03</h9><br>
                            <h9>Date Effective: 01 November 2020</h9>
                          </div>
                          <div class="text" style="margin-top: 20px">
                            <h4><b>ACKNOWLEDGEMENT SLIP</b></h4><br>
                              <h5><b>GUIDANCE AND COUNSELLING REFERRAL</b></h5><br><br>
                            </div>
                          
                          <div class="text" style="margin-top: 10px; margin-left: 15px; font-family: arial; font-size: 16px;">
                              To:&emsp;&emsp;<input type="text" name="facultyname" value="<?php echo $row['fname'].' '.$row['lname'];?>" readonly="" style="width:250px; border-left: hidden; border-top: hidden; border-right: hidden; text-align:center;"><br>
                              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Name)<br>
                              &emsp;&emsp;&emsp; <input type="text" name="facultyposition" value="<?php echo $row['position'];?>" readonly="" style="width:250px; border-left: none; border-top: none; border-right: none; text-align: center;"><br>
                              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Position)<br>
                            </div>
                            <div class="text" style="margin-top: 30px">
                              This is the acknowledge receipt of your referral,<input type="text" name="studname" value="<?php echo $row['first_name'].' '.$row['last_name'];?>" placeholder="" readonly="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;">, <input type="text" name="course_year" value="<?php echo $row['title'].' - '.$row['year_level'];?>" placeholder="" readonly="" style="width:220px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;">&nbsp;on <input type="date" name="date_accomplished" id="date_accomplished" style="width:150px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;" class="form-control datepicker" placeholder="MM/DD/YY" autocomplete="off" required="">.
                            </div>

    <?php
include('conn.php');


      $sql1 = "SELECT * from staff where office_id='4' AND account_status='Active'"; //admin-staff_id_to
      $result = mysqli_query($conn, $sql1);
    while($row2 = mysqli_fetch_assoc($result)){
                  $admin_id = $row2['staff_id'];
                  $fname = $row2['first_name'].' '.$row2['last_name'].' '.$row2['middle_name'];
                  $position = $row2['position'];
                  $image_data=$row['e_signature'];
         }

   ?>

                            <div class="text" style="text-align: right; margin-top: 50px; margin-bottom: 30px;">
                            <img style="top: 330px; right: 8%; position: absolute;" width="100" height="100" src="data:image/jpeg;base64,<?php echo base64_encode( $image_data ); ?>" />
                            <input type="text" name="esignature" value="<?php echo $fname ?>" placeholder="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none; margin-right: 20px;" readonly><br>
                            <h9>Signature Over Printed Name &emsp;</h9><br><br>
                          </div>

                          <div class="text" style="text-align:center;">
                                  <label class="control-label">NOTE:</label><br>
                                  <textarea id="concerns" name="concerns" id="concerns" rows="4" cols="60" required=""></textarea>
                                </div>
                          <input type="hidden" name="referral_id2" value="<?php echo $row['referral_id'];?>" placeholder="" style="text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none; margin-right: 20px;">
                      </div>
                    </div>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="submit" name="returnSlip" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
    
