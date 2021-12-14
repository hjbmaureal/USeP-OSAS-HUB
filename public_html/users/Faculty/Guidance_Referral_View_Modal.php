        
 <div class="modal fade" id="details<?php echo $row['referral_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <?php $referral_id = $row['referral_id'];?>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="width:1050px; margin-left: -110px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> VIEW FORM
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php 
          include('conn.php');
            $sqlselect=mysqli_query($conn,"SELECT referral_form.referral_id, referral_form.date_filed, referral_form.refdate_completed, referral_form.notes, staff.first_name as fname, staff.last_name as lname, staff.position, staff.e_signature, student.Student_id,student.first_name, student.last_name, student.year_level, student.section, student.phone_number, course.title from referral_form join staff USING(staff_id) join student USING(Student_id) join course USING(course_id) where referral_id='$referral_id'");
            $row=mysqli_fetch_array($sqlselect);
            $image_data=$row['e_signature'];
 ?>

        <div class="modal-body" id="printThis">

                <!--Form Header-->
                <table border="2" width="100%" >
                  <tr>
                    <td rowspan="5" width="1%">
                      <div align="center">
                        <img src="image/logo.png" alt="USeP Logo" style="width:100px">
                      </div>
                    </td>
                    <td rowspan="5" width="40%">
                      <div align="center" style="font-family: arial;">
                        
                            Republic of the Philippines <br>
                            <label style="font-family: 'Olde English'; font-size: 23px; font-style: bold">University of Southeastern Philippines</label><br>
                            Iñigo St., Bo. Obrero, Davao City 8000 <br>
                            Telephone: (082) 227-8192 <br>
                            Website: www.usep.edu.ph <br>
                            Email: president@usep.edu.ph
                      </div>
                    </td>
                    <td width="13%" height="2px;">
                       Form No.
                    </td>
                    <td width="15%" height="2px;">
                       FM-USeP-GCS-02
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Issue Status
                    </td>
                    <td width="15%" height="2px;">
                       04
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Revision No.
                    </td>
                    <td width="15%" height="2px;">
                       03
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Date effective
                    </td>
                    <td width="15%" height="2px;">
                       01 November 2020
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Approved by
                    </td>
                    <td width="15%" height="2px;">
                       President
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">
                      <div align="center"><h4>GUIDANCE AND COUNSELING REFERRAL FORM</h4></div>
                    </td>
                  </tr>
                </table>
                  <br>
               

            <!--Table for New Submitted Intake Formss Page 1-->
            <div class="text" style="margin-top: 20px; margin-right: 20px; text-align: right; font-family: arial; font-size: 16px;">
                              &emsp;&emsp;<input type="text" name="vdate_filed" id="vdate_filed" value="<?php echo $row['date_filed'];?>" readonly="" style="width:250px; border-left: hidden; border-top: hidden; border-right: hidden; text-align: center;" ><br><input type="hidden" name="referral_id" id="referral_id" value="<?php echo $row['referral_id'];?>">
                              Date&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            </div>
              <?php
include('conn.php');

$sql1 = "SELECT staff.*, office.office_name FROM staff 
              JOIN office ON staff.office_id = office.office_id  WHERE staff.office_id='4' AND staff.dept_id='4' AND staff.account_status='Active'"; //admin-staff_id_to
      if($result2 = mysqli_query($conn, $sql1)){
          while ($row2 = mysqli_fetch_assoc($result2)) {

 ?>
                            <div class="text" style="margin-top: 20px; margin-left: 20px; font-family: arial; font-size: 16px;">
                              To:&emsp;&emsp;<input type="text" value="<?php echo $row2['first_name'].' '. $row2['middle_name'].' '. $row2['last_name'];?>" id="admin" name="admin" readonly="" style="width:250px; border-left: hidden; border-top: hidden; border-right: hidden; text-align: center;"><br>
                              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Name)<br><br>
                              &emsp;&emsp;&emsp; <input type="text" value="<?php echo $row2['position']; ?>" id="posadmin" name="posadmin" readonly="" style="width:250px; border-left: none; border-top: none; border-right: none; text-align: center;"><br>
                              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Position)<br><br>
                            </div>
                          <?php  }} ?>
                            <div class="text" style="margin-top: 30px; margin-left: 20px; margin-right: 20px; font-family: arial; font-size: 16px;">
                              This is to refer <input type="text"  id="vname_stud" name="vname_stud" value="<?php echo $row['first_name'].' '.$row['last_name'];?>" placeholder="(Name of Student)" readonly="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;">, <input type="text" id="vcourse" name="vcourse" value="<?php echo $row['title'];?>" placeholder="(Course)" readonly="" style="width:220px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;">, <input type="text" id="vyear_level" name="vyear_level" value="<?php echo $row['year_level'];?>" placeholder="(Year level)" readonly="" style="width:100px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;">, <input type="text" id="vsection" name="vsection" value="<?php echo $row['section'];?>" placeholder="(Section)" readonly="" style="width:100px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;"> for counselling or guidance assistance.

                            </div>
                            <div class="text">
                               <form action="">
                                <table width="90%" align="center" style="margin-top:30px;">
                                <tr>
                                  <th>ACADEMICS</th>
                                  <th>PERSONAL/SOCIAL</th>
                                  <th>CAREER</th>
                                </tr>
                               
                                <tr>
                                  <td>
                                    <?php

    $checked_arr = array();

    // Fetch checked values
    $fetchLang = mysqli_query($conn,"SELECT * FROM referral_form where referral_id ='$referral_id'");
    if(mysqli_num_rows($fetchLang) > 0){
      $result = mysqli_fetch_assoc($fetchLang);
      $checked_arr = explode(",",$result['academics']);
    }

    // Create checkboxes
    $languages_arr = array("Attendance (tardiness/absences)","Study Habits/Attitude/Skills","Submission Of Requirements","Grades (tardiness/absences)","Policies","Adjustments","Test Taking","Others");
    foreach($languages_arr as $academic){

      $checked = "";
      if(in_array($academic,$checked_arr)){
        $checked = "checked";
      }
      
      echo '<input type="checkbox" onclick="return false;" name="academic[]" value="'.$academic.'" '.$checked.' > '.$academic.' <br/>';
    }
    ?>
                                  </td>
                                  <td>
                                    <?php
    $id2 = $row['referral_id'];
    $checked_arr = array();

    // Fetch checked values
    $fetchLang = mysqli_query($conn,"SELECT * FROM referral_form where referral_id ='$referral_id'");
    if(mysqli_num_rows($fetchLang) > 0){
      $result = mysqli_fetch_assoc($fetchLang);
      $checked_arr = explode(",",$result['personal_social']);
    }

    // Create checkboxes
    $languages_arr = array("Emotional","Interpersonal Skills","Attitude/Behavior","Financial","Home/Family","Motivation","Relationships","Others");
    foreach($languages_arr as $personal){

      $checked = "";
      if(in_array($personal,$checked_arr)){
        $checked = "checked";
      }
      echo '<input type="checkbox" onclick="return false;" name="ps[]" value="'.$personal.'" '.$checked.' > '.$personal.'<br/>';
    }
    ?>
                                  </td>
                                  <td>
                                    <?php
    $id3 = $row['referral_id'];
    $checked_arr = array();

    // Fetch checked values
    $fetchLang = mysqli_query($conn,"SELECT * FROM referral_form where referral_id ='$referral_id'");
    if(mysqli_num_rows($fetchLang) > 0){
      $result = mysqli_fetch_assoc($fetchLang);
      $checked_arr = explode(",",$result['career']);
    }

    // Create checkboxes
    $languages_arr = array("Planning","Decision Making","Goal Setting","Attitude/Outlook","Exploration","Work Values","Others");
    foreach($languages_arr as $career){

      $checked = "";
      if(in_array($career,$checked_arr)){
        $checked = "checked";
      }
      echo '<input type="checkbox" onclick="return false;" name="career[]" value="'.$career.'" '.$checked.' > '.$career.'<br/>';
    }

    ?>
                                  </td>
                                </tr>
                                 
                              </table>
                            </form>
                            <div class="text" style="margin-top: 30px; margin-left: 20px; margin-right: 20px; font-family: arial; font-size: 18px;">
                              Thank you very much.


                            </div>
                            <table width="90%" align="center" style="margin-top:30px;">
                                
                                  <?php 
                                    if ($image_data!='') { ?>
                                      <img style="margin-left: 14%;margin-top: -4%; position: absolute;" width="100" height="100" src="data:image/jpeg;base64,<?php echo base64_encode( $image_data ); ?>" />    
                                  <?php }else{ ?>

                                      <img src="image/Defalt_Esig.png" style="margin-left: 14%;margin-top: 1%; position: absolute;" width="100" height="50">
                                  <?php }
                                  ?>
                          
                                
                              <tr align="center">
                                <td>
                                  <input type="text" id="vto_admin" name="vto_admin" value="<?php echo $row['fname'].' '.$row['lname'];?>" placeholder="" readonly="" style=" text-align: center; text-transform:uppercase; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;"></td>
                                <td><input type="text" id="vto_posadmin" name="vto_posadmin" value="<?php echo $row['position'];?>" placeholder="" readonly="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;"></td>
                                <td><input type="text" id="vmobile_no" name="vmobile_no" value="<?php echo $row['phone_number']; ?>" placeholder="" readonly="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;"></td>
                              </tr>
                              <tr align="center">
                                <td>Printed Name and Signature</td>
                                <td>Position/designation</td>
                                <td>Mobile No./Landline Number</td>
                              </tr>

                            </table>

                            <div class="text" style="margin-top: 30px; text-align: center; margin-left: 20px; margin-right: 16px; font-family: arial; font-size: 18px;">
                              IMPORTANT: This should be hand carried by referee or should be sealed upon submission to UAGC.

                            </div><br><br>

        </div>
      </div>
        <div class="modal-footer">
          <button id="btnPrint" type="button" class="btn btn-warning" name="print" onclick="print_specific_div_content()" style="color:white;">PRINT</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          
          </div>  
      </div>
    </div>
  </div>


<!-- EDIT REFERRAL FORM MODAL -->

    <div class="modal fade" id="accept-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:1050px; margin-left: -250px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: white;"> REFERRAL FORM
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">

        <div class="row">
        <div class="col-md-12">
                <!--Form Header-->
                <table border="2" width="100%" >
                  <tr>
                    <td rowspan="5" width="1%">
                      <div align="center">
                        <img src="image/logo.png" alt="USeP Logo" style="width:100px">
                      </div>
                    </td>
                    <td rowspan="5" width="40%">
                      <div align="center" style="font-family: arial;">
                        
                            Republic of the Philippines <br>
                            <label style="font-family: 'Olde English'; font-size: 23px; font-style: bold">University of Southeastern Philippines</label><br>
                            Iñigo St., Bo. Obrero, Davao City 8000 <br>
                            Telephone: (082) 227-8192 <br>
                            Website: www.usep.edu.ph <br>
                            Email: president@usep.edu.ph
                      </div>
                    </td>
                    <td width="13%" height="2px;">
                       Form No.
                    </td>
                    <td width="15%" height="2px;">
                       FM-USeP-GCS-02
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Issue Status
                    </td>
                    <td width="15%" height="2px;">
                       04
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Revision No.
                    </td>
                    <td width="15%" height="2px;">
                       03
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Date effective
                    </td>
                    <td width="15%" height="2px;">
                       01 November 2020
                    </td>
                  </tr>

                  <tr>
                    <td width="13%" height="2px;">
                       Approved by
                    </td>
                    <td width="15%" height="2px;">
                       President
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">
                      <div align="center"><h4>GUIDANCE AND COUNSELING REFERRAL FORM</h4></div>
                    </td>
                  </tr>
                </table>
                  <br>
                </div>
              </div>
               

            <!--Table for New Submitted Intake Formss Page 1-->
            <div class="text" style="margin-top: 20px; margin-right: 20px; text-align: right; font-family: arial; font-size: 16px;">
                              &emsp;&emsp;<input type="text" id="refdate_filed" name="refdate_filed" readonly="" style="width:200px; border-style:solid; border-left: none; border-top: none; border-right: none; text-align: center;"><br>
                              Date&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<br>
                            </div>
                
                            <div class="text" style="margin-top: 10px; margin-left: 20px; font-family: arial; font-size: 16px;">
                              To:&emsp;&emsp;<input type="text" id="fact" name="fact" value="MARY ROSE CHAVEZ" readonly="" style="width:250px; border-left: hidden; border-top: hidden; border-right: hidden; text-align:center;"><br>
                              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Name)<br>
                              &emsp;&emsp;&emsp; <input type="text" id="factpos" name="factpos" value="GUIDANCE COUNSELOR" readonly=""  style="width:250px; border-left: none; border-top: none; border-right: none; text-align: center;"><br>
                              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Position)<br>
                            </div>
                            <div class="text" style="margin-top: 30px; margin-left: 20px; margin-right: 20px; font-family: arial; font-size: 16px;">
                              This is to refer <input type="text" id="name_student" name="name_student"  placeholder="" readonly="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;">, <input type="text" id="stud_course" name="stud_course"  placeholder="" readonly="" style="width:220px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;">, <input type="text" id="year" name="year"  placeholder="" readonly="" style="width:100px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;">, <input type="text" id="stud_section" name="stud_section"  placeholder="" readonly="" style="width:100px; text-align: center; border-style:solid; border-left: none; border-top: none; border-right: none;"> for counselling or guidance assistance.

                            </div>
                            <div class="text">
                               <form action="">
                                <table width="90%" align="center" style="margin-top:30px;">
                                <tr>
                                  <th>ACADEMICS</th>
                                  <th>PERSONAL/SOCIAL</th>
                                  <th>CAREER</th>
                                </tr>
                               
                                <tr>
                                  <td>
                                    <input type="checkbox" id="acads" name="acads" value="Attendance (tardiness, absences)">
                                    <label for="acads"> Attendance (tardiness, absences)</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="person" name="person" value="Emotional">
                                    <label for="person"> Emotional</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="career" name="career" value="Planning">
                                    <label for="career"> Planning</label>
                                  </td>
                                </tr>
                                 <tr>
                                  <td>
                                    <input type="checkbox" id="acads2" name="acads2" value="Study habits/attitude/skills">
                                    <label for="acads2"> Study habits/attitude/skills</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="person2" name="person2" value="Interpersonal skills">
                                    <label for="person2"> Interpersonal skills</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="career2" name="career2" value="Decision-making">
                                    <label for="career2"> Decision-making</label>
                                  </td>
                                </tr>
                                 <tr>
                                  <td>
                                    <input type="checkbox" id="acads3" name="acads3" value="Submission of requirements">
                                    <label for="acads3"> Submission of requirements</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="person3" name="person3" value="Attitude/behavior">
                                    <label for="person3"> Attitude/behavior</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="career3" name="career3" value="Goal-setting">
                                    <label for="career3"> Goal-setting</label>
                                  </td>
                                </tr>
                                 <tr>
                                  <td>
                                    <input type="checkbox" id="acads4" name="acads4" value="Grades">
                                    <label for="acads4"> Grades (tardiness, absences)</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="person4" name="person4" value="Financial">
                                    <label for="person4"> Financial</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="career4" name="career4" value="Attitude/Outlook">
                                    <label for="career4"> Attitude/Outlook</label>
                                  </td>
                                </tr>
                                 <tr>
                                  <td>
                                    <input type="checkbox" id="acads5" name="acads5" value="Policies">
                                    <label for="acads5"> Policies</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="person5" name="person5" value="Home/Family">
                                    <label for="person5"> Home/Family</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="career5" name="career5" value="Exploration">
                                    <label for="career5"> Exploration</label>
                                  </td>
                                </tr>
                                 <tr>
                                  <td>
                                    <input type="checkbox" id="acads6" name="acads6" value="Adjustment">
                                    <label for="acads6"> Adjustment</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="person6" name="person6" value="Motivation">
                                    <label for="person6"> Motivation</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="career6" name="career6" value="Work values">
                                    <label for="career6"> Work values</label>
                                  </td>
                                </tr>
                                 <tr>
                                  <td>
                                    <input type="checkbox" id="acads7" name="acads7" value="Test-taking">
                                    <label for="acads7"> Test-taking/ </label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="person7" name="person7" value="Relationships">
                                    <label for="person7"> Relationships </label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="career7" name="career7" value="Others (specify)">
                                    <label for="career7"> Others (specify) </label>
                                  </td>
                                </tr>
                                 <tr>
                                  <td>
                                    <input type="checkbox" id="acads8" name="acads8" value="Others (specify)">
                                    <label for="acads8"> Others (specify)</label>
                                  </td>
                                  <td>
                                    <input type="checkbox" id="person8" name="person8" value="Others (specify)">
                                    <label for="person8"> Others (specify)</label>
                                  </td>
                                  <td>
                                  </td>
                                </tr>
                              </table>
                            </form>
                            <div class="text" style="margin-top: 30px; margin-left: 20px; margin-right: 20px; font-family: arial; font-size: 16px;">
                              Thank you very much.

                            </div>
                            <table width="90%" align="center" style="margin-top:30px;">
                              <tr align="center">
                                <td><input type="text" id="faculty" name="faculty" placeholder="" readonly="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;"></td>
                                <td><input type="text" id="facultypos" name="facultypos" placeholder="" readonly="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;"></td>
                                <td><input type="text" id="stud_mobile" name="stud_mobile" placeholder="" readonly="" style=" text-align: center; width:220px; border-style:solid; border-left: none; border-top: none; border-right: none;"></td>
                              </tr>
                              <tr align="center">
                                <td>Printed Name and Signature</td>
                                <td>Position/designation</td>
                                <td>Mobile No./Landline Number</td>
                              </tr>

                            </table>

                            <div class="text" style="margin-top: 30px; text-align: center; margin-left: 20px; margin-right: 20px; font-family: arial; font-size: 16px;">
                              IMPORTANT: This should be hand carried by referee or should be sealed upon submission to UAGC.

                            </div><br><br>

        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <a data-toggle="modal" href="#setAppointment" data-dismiss="modal" class="btn btn-success">Accept</a>
          </div>  
      </div>
    </div>
  </div>



<style>

@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    align-content: center;
    position:absolute;
    left:0;
    top:0;
    margin: 0;
    padding: 0;
    min-height:550px
  }
}

  </style>

    <!-- ENDDD -->
