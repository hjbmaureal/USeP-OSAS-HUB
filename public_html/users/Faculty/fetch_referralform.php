<div class="modal fade " id="acknowledgement<?php echo $row['referral_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<?php $referral_id = $row['referral_id'];?>
  
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
                        <div id="HoiPrint?<?php echo $referral_id; ?>">
                      <div class="modal-body c" id="printThis">
                        <div class="container">
                          <div class="tile" style="border-width: 2px; border-style:solid;">
                          <div class="col-sm">
                          <div style="border-width:1px; border-style: solid; margin-left: 55%; position: absolute; width: 270px; height: 130px;"><br>
                            <h9 style= "margin: 10%; ">Form No.: FM-USeP-GCS-01</h9><br>
                            <h9 style= "margin: 10%; ">Issue Status: 04</h9><br>
                            <h9 style= "margin: 10%; ">Revision No.: 03</h9><br>
                            <h9 style= "margin-left: 10%; ;">Date Effective: 01 November 2020</h9>
                          </div>
                          <div class="text" style="margin-top: 20px;margin-left: 5%; position: relative;">
                            <h4><b>ACKNOWLEDGEMENT SLIP</b></h4><br>
                              <h5><b>GUIDANCE AND COUNSELLING REFERRAL</b></h5><br><br>
                            </div>
                          
                          <div class="text" style="margin-top: 5%;margin-left: 5%; position: relative; font-family: arial; font-size: 16px;">
                              To:&emsp;&emsp;<input type="text" name="facultyname" value="<?php echo $row['fname'].' '.$row['lname'];?>" id="facultyname"  readonly="" style="width:250px; border-left: hidden; border-top: hidden; border-right: hidden; text-align:center;"><br>
                              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Name)<br>
                              &emsp;&emsp;&emsp; <input type="text" name="facultyposition" value="<?php echo $row['position'];?>" id="facultyposition" readonly="" style="width:250px; border-left: none; border-top: none; border-right: none; text-align: center;"><br>
                              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Position)<br>
                            </div>
                            <div class="text" style="margin-top: 3%;margin-left: 5%; position: relative;">
                              This is the acknowledge receipt of your referral,<input type="text" id="studname" name="studname" value="<?php echo $row['first_name'].' '.$row['last_name'];?>" placeholder="" readonly="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;">, <input type="text" id="course_year" name="course_year" value="<?php echo $row['title'].' - '.$row['year_level'];?>" placeholder="" readonly="" style="width:220px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;">&nbsp;on <input type="text" name="date_accomplished" value="<?php echo $row['refdate_completed'];?>" id="date_accomplished" placeholder="" readonly="" style="width:150px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;">.
                            </div>

                            <div class="text" style="text-align: right; margin-top: 50px; margin-bottom: 30px;position: relative;">
                              <?php 
                              include('conn.php');
                                $sql1 = "SELECT * from staff where office_id='4' AND account_status='Active'"; //admin-staff_id_to
      $result = mysqli_query($conn, $sql1);
    while($row2 = mysqli_fetch_assoc($result)){
                                	$fname = $row2['first_name'].' '.$row2['last_name'];
                  								$position = $row2['position'];
                                  $image_data=$row2['e_signature'];
                                }
                              ?>
                              <div style="margin-right: 9%;" >
                            <img style="margin-top: -1%; margin-left: -10%; position: absolute;" width="100" height="100" src="data:image/jpeg;base64,<?php echo base64_encode( $image_data ); ?>" /></div>
                            <input type="text" name="esignature" id="esignature" placeholder="" value="<?php echo $fname ?>" readonly="" style="position: absolute; background-color: transparent; text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none; margin-right: 20px;top: 70%; right: .1%;"><br>
                            <h9 style="position: absolute; top: 110%; right: 2%;">Signature Over Printed Name &emsp;</h9><br><br>
                          </div>

                          <div class="text" style="text-align:center;">
                                  <label class="control-label">NOTE:</label><br>
                                  <input name="concerns" value="<?php echo $row['notes'];?>" readonly="" style="text-align:center; text-orientation: justify; height: 100px; width: 700px;" >
                                </div>
                          <input type="hidden" name="referral_id" value="<?php echo $row['referral_id'];?>" id="referral_id" placeholder="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none; margin-right: 20px;">

                                              
                        <br>
                      </div>
                    </div>
                      </div>
                    </div>
                    </div>
                      <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-warning" name="print" style="color:white;" onclick="print_specific_div_content<?php echo $referral_id; ?>()">PRINT</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                      </div>
                    </form>
                  </div>
                </div>

              </div>
           <script type="text/javascript">
  function print_specific_div_content<?php echo $referral_id; ?>(){
    var win = window.open('','','left=0,top=0,width=900,height=700,toolbar=0,scrollbars=0,status =0');

    var content = "<html>";
    content += "<body onload=\"window.print(); window.close();\">";
    content += document.getElementById("HoiPrint?<?php echo $referral_id; ?>").innerHTML ;
    content += "</body>";
    content += "</html>";
    win.document.write(content);
    win.document.close();
}
    </script>