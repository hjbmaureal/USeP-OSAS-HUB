<!--View Forms Modal -->



  <!--END OF MODAL-->
<form method="post">
  <!--Set Appointment Modal -->
<div class="modal fade" id="viewmodal?<?php echo $student_id.$row2['intake_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">

  <?php
include('conn.php');
$id=$row['Student_id'];
$intake_id=$row['intake_id'];
 $sqlselect=mysqli_query($conn,"SELECT guidance_appointments.status_id, guidance_appointments.appointment_id, student.last_name,student.year_level, student.first_name, student.middle_name, mode_of_communication.communication_mode, course.title, guidance_appointments.appointment_date, guidance_appointments.appointment_time from guidance_appointments JOIN indv_counselling on indv_counselling.appointment_id=guidance_appointments.appointment_id JOIN intake_form on indv_counselling.intake_id=intake_form.intake_id JOIN student ON student.Student_id=intake_form.Student_id JOIN course ON student.course_id=course.course_id JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id WHERE intake_form.intake_id='$intake_id'");
$sched=mysqli_fetch_array($sqlselect);?>

                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">SET APPOINTMENT</h5>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="container"> 

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name</label><input class="form-control" type="text" name="first_name2" id="first_name2" value="<?php echo $sched['first_name'].' '.$sched['middle_name'].'. '.$sched['last_name'];?>" disabled>
                                  
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course & Year</label><input class="form-control" type="text" value="<?php echo $sched['title'].'-'.$sched['year_level'];?>" disabled>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  <label class="control-label">Mode of Communication</label><input class="form-control" type="text" name="mode_name" id="mode_name" value="<?php echo $sched['communication_mode'];?>" disabled>
                                </div><input type="hidden" name="student_id" value="<?php echo $id; ?>"><input type="hidden" name="intake_id" value="<?php echo $intake_id;?>"><input type="hidden" name="appointment_id" value="<?php echo $sched['appointment_id'];?>"><input type="hidden" name="status_id" value="<?php echo $sched['status_id'];?>">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                  <input class="form-control" type="date" name="appointment_date" id="appointment_date" value="<?php echo $sched['appointment_date'];?>">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" type="time" name="appointment_time" id="appointment_time" value="<?php echo $sched['appointment_time'];?>" >
                                </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-success" id="submit" name="submit">SAVE CHANGES</button>
                      </div>
                    </div>
                  </div>
                </div>

   </form>
<?php 

 if(isset($_POST['submit'])){
                      $appointment_id = $_POST['appointment_id'];
                      $intake_id = $_POST['intake_id'];
                      $newDate = $_POST['appointment_date'];
                      $newTime = $_POST['appointment_time'];
                      $status_id = $_POST['status_id'];
                      $student_id = $_POST['student_id'];

                      $query = "UPDATE guidance_appointments SET appointment_date = '$newDate', appointment_time = '$newTime', status_id = '$status_id' WHERE appointment_id = '$appointment_id'";

                      if(mysqli_query($conn,$query)){
                            $query = "UPDATE intake_form SET date_verify = now() where intake_id='$intake_id'";

                      if(mysqli_query($conn,$query)){
                        
                           newNotif($conn,$student_id);
                        }


                           newNotif($conn,$student_id);
                        }else{
                          echo "error";
                        }
                    }
                    ?>

           
  <div class="modal fade" id="viewmodal?<?php echo $row['Student_id'].$row['intake_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">


<?php
include('conn.php');
$id=$row['Student_id'];
$intake_id=$row['intake_id'];
 $sqlselect=mysqli_query($conn,"SELECT *, course.name as crse FROM student join intake_form on intake_form.Student_id=student.Student_id join course on student.course_id=course.course_id join emergency_contact on emergency_contact.student_id= student.student_id LEFT JOIN scholarship_grantee on scholarship_grantee.student_id=student.Student_id LEFT JOIN scholarship_program on scholarship_program.program_id=scholarship_grantee.scholar_program_id where student.Student_id='$id'");
if($prorow=mysqli_fetch_array($sqlselect)){ ?>

    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">INTAKE FORM <input type="text" name="student_id" id="student_id">
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">

        <div class="row">
        <div class="col-md-12">
                <br><br>

                <!--Form Header-->
                <table border="2" width="100%">
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
                      <div align="center"><h4>INTAKE FORM</h4></div>
                    </td>
                  </tr>
                </table>
                  <br>
                <div align="center"><h6>Welcome to the</h6></div>
                <div align="center"><h4>UNIVERSITY ASSESSMENT AND GUIDANCE CENTER (UAGC)</h4></div>
                <p align="justify">
                  We want to make your visit to the University Assessment and Guidance Center as comfortable and productive as we can. Your first
                  meeting with one of our counselors will be an “intake interview”. The purpose of the intake interview is to help you clarify you concerns
                  and, if needed, discuss to any additional services that might be helpful to you. <br><br> 
                  We are asking that you complete this form with information to help you and your intake counselor in planning a course of action.

                </p>

 <div align="center">
                  <input type="checkbox"  name="modeOfCommunication[]" value="Walk-in"id="Walk-in" required >
                  <label for="Walk-in"> &emsp;Walk-in </label> &emsp;&emsp;&emsp;
                  <input type="checkbox"  name="modeOfCommunication[]" value="Call-in"id="Call-in" required >
                  <label for="Call-in"> &emsp;Call-in </label> &emsp;&emsp;&emsp;
                  <input type="checkbox"  name="modeOfCommunication[]" value="Referred"id="Referred" required >
                  <label for="Referred"> &emsp;Referred</label>
                </div>

                <script type="text/javascript">
                  $(document).ready(function(){ 
                      $("<?php echo $class; ?>").prop("checked", true);
                 <?php $class="#".$prorow['intake_type']; ?>

                  $('input[type="checkbox"]').on('change', function() {
                    
                     $(this).siblings('input[type="checkbox"]').prop('checked', false);
                      $(this).siblings('input[type="checkbox"]').prop('required', false);
                  });});
                </script>
            
                <table border="2" width="100%">
                  <tr>
                    <th colspan="4" style="color: white; background-color: black;">A. CLIENT/STUDENT INFORMATION</th>
                  </tr>
                  <tr>
                    <td>1. Title (e.g. Mr, Ms, Mrs)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                             <input type="text" name="title" id="title"  value="<?php  echo $class;?>" style="border:transparent;">
                    </td>
                    <td>2. Surname <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                             <input type="text" name="last_name" id="last_name" value="<?php  echo $prorow['last_name'];?>" style="border:transparent;">
                    </td>
                    <td>3. Given Name/s <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="first_name" id="first_name" style="border:transparent;" value="<?php  echo $prorow['first_name'];?>">
                    </td>
                    <td>4. Middle Initial <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="middle_name" id="middle_name" style="border:transparent;" value="<?php  echo $prorow['middle_name'];?>"> 
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">5. Course and Year<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="course&year" id="course&year" style="border:transparent;" value="<?php  echo $prorow['crse'].'/'.$prorow['year_level'];?>">
                    </td>
                    <td colspan="2">6. Contact Number<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="contactno" id="contactno" style="border:transparent;" value="<?php  echo $prorow['phone_number'];?>">
                    </td>
                  </tr>
                 <tr>
                    <td colspan="2">7. Gender<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="gender" id="gender" style="border:transparent;" value="<?php  echo $prorow['sex'];?>">
                    </td>
                    <td>8. Age<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="age" id="age" style="border:transparent;" value="<?php  echo $prorow['last_name'];?>">
                    </td>
                    <td>9. Birthdate<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="bdate" id="bdate" style="border:transparent;"  value="<?php  echo $prorow['birth_date'];?>">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">10. Status<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="civil_status" id="civil_status" style="border:transparent;" value="<?php  echo $prorow['civil_status'];?>">
                    </td>
                    <td>11. Birthplace<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="bplace" id="bplace" style="border:transparent;" value="<?php  echo $prorow['birth_place'];?>">
                    </td>
                    <td>12. Birth Order<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="birth_order" id="birth_order" style="border:transparent;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">13. Present Address (Apt/House Number., Street, City/Municipality, Province)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="address" id="address" style="border:transparent;" value="<?php  echo $prorow['house_block_lot_num'].'., '.$prorow['street'].', '.$prorow['city'].', '.$prorow['province'];?>">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">14. Provincial Address<br>
                            <input type="text" name="provincial_address" id="provincial_address" style="border:transparent;" value="<?php  echo $prorow['province'];?>"> 
                    </td>
                  </tr>
                  <tr>
                    <td>15. Religion<br>
                            <input type="text" name="religion" id="religion" style="border:transparent;" value="<?php  echo $prorow['religion'];?>">
                    </td>
                    <td colspan="3">16. Email Address<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="email" id="email" style="border:transparent;" value="<?php  echo $prorow['email_add'];?>">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">17. Name of Father<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_name" id="father_name" style="border:transparent;" value="<?php  echo $prorow['father_name'];?>">
                    </td>
                    <td>18. Occupation<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_occupation" id="father_occupation" style="border:transparent;"  value="<?php  echo $prorow['father_occupation'];?>">
                    </td>
                    <td>19. Contact No.<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_contact" id="father_contact" style="border:transparent;" value="<?php  echo $prorow['father_contact'];?>">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">20. Name of Mother<br>
                            <input type="text" name="mother_name" id="mother_name" style="border:transparent;" value="<?php  echo $prorow['mother_name'];?>">
                    </td>
                    <td>21. Occupation<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="mother_occupation" id="mother_occupation" style="border:transparent;" value="<?php  echo $prorow['mother_occupation'];?>">
                    </td>
                    <td>22. Contact No.<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="mother_contact" id="mother_contact" style="border:transparent;" value="<?php  echo $prorow['mother_contact'];?>">
                    </td>
                  </tr>
                   <tr>
                    <td colspan="4">23. Parent's Present Address (Apt/House Number., Street, City/Municipality, Province)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="parents_address" id="parents_address" style="border:transparent;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">24. Scholarship currently availed<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="scholarship" id="scholarship" style="border:transparent;" value="<?php  echo $prorow['program_name'];?>">
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">25. Educational Background<br>
                      <table border="2" width="90%" align="center">
                        <tr>
                          <td></td>
                          <td>School</td>
                          <td>Years of Attendance</td>
                          <td>Year Graduated</td>
                        </tr>
                        <tr>
                          <td>Elementary</td>
                          <td><input type="text" name="elementary_school" id="elementary_school" style="border:transparent;width: 100%;" value="<?php echo $prorow['elementary_school']; ?>"></td>
                          <td><input type="text" name="elementary_years" id="elementary_years" style="border:transparent;width: 100%" value="<?php echo $prorow['elem_years_atendance']; ?>"></td>
                          <td><input type="text" name="elementary_graduated" id="elementary_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['elem_year_graduated']; ?>"></td>
                        </tr>
                        <tr>
                          <td>Secondary</td>
                          <td><input type="text" name="secondary_school" id="secondary_school" style="border:transparent;width: 100%" value="<?php echo $prorow['secondary_school']; ?>"></td>
                          <td><input type="text" name="secondary_years" id="secondary_years" style="border:transparent;width: 100%" value="<?php echo $prorow['sec_years_atendance']; ?>"></td>
                          <td><input type="text" name="secondary_graduated" id="secondary_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['sec_year_graduated']; ?>"></td>
                        </tr>
                        <tr>
                          <td>Tertiary</td>
                          <td><input type="text" name="tertiary_school" id="tertiary_school" style="border:transparent;width: 100%" value="<?php echo $prorow['tertiary_school'] ?>"></td>
                          <td><input type="text" name="tertiary_years" id="tertiary_years" style="border:transparent;width: 100%" value="<?php echo $prorow['ter_years_atendance'] ?>"></td>
                          <td><input type="text" name="tertiary_graduated" id="tertiary_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['ter_year_graduated'] ?>"></td>
                        </tr>
                        <tr>
                          <td>Others</td>
                          <td><input type="text" name="others_school" id="others_school" style="border:transparent;width: 100%" value="<?php echo $prorow['other_school'] ?>"></td>
                          <td><input type="text" name="others_years" id="others_years" style="border:transparent;width: 100%" value="<?php echo $prorow['other_years_atendance'] ?>"></td>
                          <td><input type="text" name="others_graduated" id="others_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['other_year_graduated'] ?>"></td>
                        </tr>
                      </table><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">26. Health History<br><br>
                        &emsp;&emsp;Physical Health History (Illnesses, Diseases): <input type="text" name="" value="<?php echo $prorow['hhistory_physical']; ?>"><br><br>
                    
                        &emsp;&emsp;Psychiatric History: <input type="text" name="" value="" style="width: 44.5%;" value="<?php echo $prorow['hhistory_psychiatric']; ?>"><br><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">27. Problems that you are experiencing:<br>
                     <input style="width:100%;height: 100px;"class="intake"type="text" name="pexperiencing" id="pexperiencing" value="<?php echo $prorow['Q1']; ?>"><br>
                    </td>    
                  </tr>
                  <tr>
                    <td colspan="4">28. What is your goal in seeking help?<br><br><br><br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="goal" id="goal" value="<?php echo $prorow['Q2']; ?>" >
                  </tr>
                  <tr>
                    <td colspan="4">29. Is the use/abuse of drugs and/or alcohol related to this problem in any way?<br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="drugs" id="drugs" value="<?php echo $prorow['Q3']; ?>">
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">30. Is there any behavioral problem related?<br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="behavioral_problems" id="behavioral_problems" value="<?php echo $prorow['Q4']; ?>" >
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">31. Have you experienced any significant loss/crisis/life change?<br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="crisis" id="crisis" value="<?php echo $prorow['Q5']; ?>">
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">32. Kindly check what you are currently experiencing? <center>
                     <?php

                      $sql = mysqli_query($conn,"SELECT * FROM `chk_intake_q6` WHERE chk_intake_q6.intake_id = '$intake_id'");
                            $count=mysqli_num_rows($sql);
                            $row=mysqli_fetch_array($sql);?>
                      <div id=“container”>
                        <div style="float: left; padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[2]; ?>" name="currentluexperiencing1" value="Anxiousness" >
                          <label for="vehicle1"> Anxiousness</label><br>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[6]; ?>" name="currentluexperiencing2" value="Depression" >
                          <label for="vehicle1"> Depression</label>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[10]; ?>" name="currentluexperiencing3" value="Anger" >
                          <label for="vehicle1"> Anger</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[12]; ?>" name="currentluexperiencing4" value="Confusion" >
                          <label for="vehicle1"> Confusion</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[13]; ?>" name="currentluexperiencing5" value="Fear" >
                          <label for="vehicle1"> Fear</label>
                        </div>
                        <!-- ________________________________________________________ -->
                        <div style="float: left; padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[3]; ?>" name="currentluexperiencing6" value="Loneliness" >
                          <label for="vehicle1"> Loneliness</label><br>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[7]; ?>" name="currentluexperiencing7" value="Despair" >
                          <label for="vehicle1"> Despair</label>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[11]; ?>" name="currentluexperiencing8" value="Thoughts of suicide" >
                          <label for="vehicle1"> Thoughts of suicide</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[15]; ?>" name="currentluexperiencing9" value="Hurt" >
                          <label for="vehicle1"> Hurt</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[4]; ?>" name="currentluexperiencing10" value="Guilt/shame" >
                          <label for="vehicle1"> Guilt/shame</label>
                        </div>
                         <!-- ________________________________________________________ -->
                        <div style="float: left; padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[8]; ?>" name="currentluexperiencing11" value="Withdrawing from others" >
                          <label for="vehicle1"> Withdrawing from others</label><br>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[15]; ?>" name="currentluexperiencing12" value="Relational stress" >
                          <label for="vehicle1"> Relational stress</label>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="<?php echo $row[5]; ?>" name="currentluexperiencing13" value="Martial distress" >
                          <label for="vehicle1"> Martial distress</label>
                        </div>
                         <div style="float: left;padding-left: 10%;">
                          <input type="checkbox" id="<?php echo $row[9]; ?>" name="currentluexperiencing14" value="Parenting struggles" >
                          <label for="vehicle1"> Parenting struggles</label>
                        </div>
                      </div>
                    </center>

                      <script type="text/javascript">
                    <?php 
                      for ($i=2; $i <=15 ; $i++) { 
                        if ($row[$i]!='' || $row[$i]!=null) { 
                          $checkID="#".$row[$i];?>
                          $("<?php echo $checkID; ?>").prop("checked", true);
                        <?php }
                      }?>
                      </script>
                       <br><br><br><br><br><br>
                       &emsp;&emsp;33. Other Information you like to share:<input class="intake" type="text" name="Q7" style="border-bottom: 1px solid #555; width: 50%;" value="<?php echo $prorow['Q7']; ?>"><br><br>
                    </td>   
                  </tr>
                  <tr>
                    <th colspan="4" style="color: white; background-color: black;">B. DECLARATION</th>
                  </tr>
                  <tr>
                    <td colspan="4" align="justify">
                      <p>
                        The University Assessment and Guidance Center is committed to non-discrimination with respect to race, creed, religion,
                          age, disability, color, sex, marital status, sexual orientation or political opinions/affiliations. <br><br>
                         Further, we adhere to strict confidentiality. Any information that you provide are strictly confidential, except in life
                        threatening situations, cases of suspected child or elder abuse, or when release is otherwise required by law. In order
                        to provide the best services possible, your counselor may consult with other counselors or professionals. Information
                       about counseling will not appear on your academic records. <br><br>
                          In order to protect your right to confidentiality, your written authorization is required if you want us to provide information
                        about your counseling to another person or agency. If you have any questions, you may ask your intake counselor.
                        </p>
                    </td>
                  </tr>
                  <tr>
                   <!--  <td colspan="2">34. Client/Student's Signature<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="signature" id="signature" style="border:transparent;">
                    </td>
                    <td colspan="2">35. Date Accomplished (MM/DD/YY)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="date_filed" id="date_filed" style="border:transparent;">
                    </td> -->
                  </tr>
                </table>
                <br>
            </div><br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="print" class="btn btn-success" onclick="window.print()">Print</button>
          </div>        
        </div>
      </div>
    </div>
 <?php }?>

  <!--END OF MODAL-->

