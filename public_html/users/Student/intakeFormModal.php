<?php

include('../../conn.php');

//validating session


 if (!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Student'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
  $id = $_SESSION['id'];
  $count = 0;
  $job_count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where user_id='$id' and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}

$query2=mysqli_query($conn,"SELECT count(*) as cnt from job_hiring_announcement");
  while($row=mysqli_fetch_array($query2)){ $job_count = ($row['cnt']==0) ? '' : $row['cnt'] ;}



?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/js/bootstrap-datetimepicker.js"></script>
      <link href="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style type="text/css">
   .intake
        {
        width:90%;
        border:none;
     
        padding-left: 5px;margin-left: 2px;
        }
        .modal:nth-of-type(even) {
    z-index: 1052 !important;
}
.modal-backdrop.show:nth-of-type(even) {
    z-index: 1051 !important;
}
</style>
<form method="post" action="saveIntakeForm.php" enctype="multipart/form-data">
<div class="modal fade" id="details<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php $id = $id;?>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">INTAKE FORM <input type="hidden" name="student_id" id="student_id">
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
          <div class="modal-body">
       
        <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive" style="width:90%;margin-left: 35px;">
                <!--Filter and Search-->
                <table border="2">
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
                    
                <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                    <input class="form-check-input" id="walk" type="radio" name="type" value="Walk-in" required="">Walk-in &emsp;&emsp;&emsp;&emsp;
                    <input class="form-check-input" id="call" type="radio" name="type" value="Call-in">Call-in &emsp;&emsp;&emsp;&emsp;
                    <input class="form-check-input" id="ref" type="radio" name="type" value="Referred">Referred &emsp;&emsp;&emsp;&emsp;
                      </label>
                      </div>
               
                   <?php 
                        include('conn.php');

                         $sqlselect=mysqli_query($conn,"SELECT *, course.name as crse FROM student join course on student.course_id=course.course_id join emergency_contact on emergency_contact.student_id= student.student_id LEFT JOIN grantee_history on grantee_history.student_id=student.Student_id LEFT JOIN scholarship_program on scholarship_program.program_id=grantee_history.program_id where student.Student_id='$id'");
                          $prorow=mysqli_fetch_array($sqlselect);
                        
                        ?>
            <!--Table for New Submitted Intake Formss Page 1-->

                <table border="2" id="sampleTable">
                  <tr>
                    <th colspan="4" style="color: white; background-color: black;">A. CLIENT/STUDENT INFORMATION</th>
                  </tr>
                  <tr>
                    <td>1. Title (e.g. Mr, Ms, Mrs)<br>
                      <i class="fa fa-caret-left" aria-hidden="true"></i>
                             <input class="intake" type="text" name="title" id="title" value="<?php  echo $prorow['suffix'];?>" readonly>
                    </td>
                    <td>2. Surname <br>
                      <i class="fa fa-caret-left" aria-hidden="true"></i>
                             <input class="intake"type="text" name="last_name" id="last_name" value="<?php  echo $prorow['last_name'];?>" readonly>
                    </td>
                    <td>3. Given Name/s <br>
                      <i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="first_name" id="first_name" value="<?php  echo $prorow['first_name'];?>" readonly>
                    </td>
                    <td>4. Middle Initial <br>
                      <i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="middle_name" id="middle_name"value="<?php  echo $prorow['middle_name'];?>" readonly >
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">5. Course and Year<br>
                      <i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="course&year" id="course&year" value="<?php  echo $prorow['crse'].'/'.$prorow['year_level'];?>" readonly>
                    </td>
                    <td colspan="2">6. Contact Number<br>
                      <i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="tel" placeholder="12345678901" pattern="[0-9]{4}[0-9]{4}[0-9]{3}" name="contactno" value="<?php  echo $prorow['phone_number'];?>" readonly>
                    </td>
                  </tr>
                 <tr>
                    <td colspan="2">7. Gender<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="gender" id="gender" value="<?php  echo $prorow['sex'];?>" readonly>
                    </td>
                    <td>8. Age<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="age" id="age" value="<?php  echo $prorow['last_name'];?>" readonly>
                    </td>
                    <td>9. Birthdate<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="bdate" id="bdate" value="<?php  echo $prorow['birth_date'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">10. Status<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="civil_status" id="civil_status" value="<?php  echo $prorow['civil_status'];?>" readonly>
                    </td>
                    <td>11. Birthplace<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="bplace" id="bplace" value="<?php  echo $prorow['birth_place'];?>" readonly>
                    </td>
                    <td>12. Birth Order<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="birth_order" id="birth_order" value="" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">13. Present Address (Apt/House Number., Street, City/Municipality, Province)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="address" id="address" value="<?php  echo $prorow['house_block_lot_num'].'., '.$prorow['street'].', '.$prorow['city'].', '.$prorow['province'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">14. Provincial Address<br>
                            <input class="intake"type="text" name="provincial_address" id="provincial_address" value="<?php  echo $prorow['province'];?>" readonly> 
                    </td>
                  </tr>
                  <tr>
                    <td>15. Religion<br>
                            <input class="intake"type="text" name="religion" id="religion" value="<?php  echo $prorow['religion'];?>" readonly>
                    </td>
                    <td colspan="3">16. Email Address<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="email" id="email" value="<?php  echo $prorow['email_add'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">17. Name of Father<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="fathername" id="fathername" value="<?php  echo $prorow['father_name'];?>" readonly>
                    </td>
                    <td>18. Occupation<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="father_occupation" id="father_occupation" value="<?php  echo $prorow['father_occupation'];?>" readonly>
                    </td>
                    <td>19. Contact No.<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="father_contact" id="father_contact" value="<?php  echo $prorow['father_contact'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">20. Name of Mother<br>
                            <input class="intake"type="text" name="mothername" id="mothername" value="<?php  echo $prorow['mother_name'];?>" readonly>
                    </td>
                    <td>21. Occupation<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="mother_occupation" id="mother_occupation" value="<?php  echo $prorow['mother_occupation'];?>" readonly>
                    </td>
                    <td>22. Contact No.<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="mother_contact" id="mother_contact" value="<?php  echo $prorow['mother_contact'];?>" readonly>
                    </td>
                  </tr>
                   <tr>
                    <td colspan="4">23. Parent's Present Address (Apt/House Number., Street, City/Municipality, Province)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="parent_address" id="parent_address" value="" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">24. Scholarship currently availed<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input class="intake"type="text" name="scholarship" id="scholarship" value="<?php  echo $prorow['program_name'];?>">
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">25. Educational Background<br>
                      <table border="2" width="95%" align="center">
                        <tr>
                          <td></td>
                          <td>School</td>
                          <td>Years of Attendance</td>
                          <td>Year Graduated</td>
                        </tr>
                        <tr>
                          <td>Elementary</td>
                          <td>
                            <input class="intake"type="text" name="elementary_school" id="elementary_school"></td>
                          <td>
                            <input class="intake"type="text" name="elementary_years" id="elementary_years"></td>
                           <td>
                            <input class="intake"type="text" name="elementary_graduated" id="elementary_graduated" ></td>
                        </tr>
                        <tr>
                          <td>Secondary</td>
                          <td>
                            <input class="intake"type="text" name="secondary_school" id="secondary_school"> </td>
                          <td>
                            <input class="intake"type="text" name="secondary_years" id="secondary_years"></td>
                          <td>
                            <input class="intake"type="text" name="secondary_graduated" id="secondary_graduated"></td>
                        </tr>
                        <tr>
                          <td>Tertiary</td>
                          <td>
                            <input class="intake"type="text" name="tertiary_school" id="tertiary_school" ></td>
                          <td>
                            <input class="intake"type="text" name="tertiary_years" id="tertiary_years" ></td>
                          <td>
                            <input class="intake"type="text" name="tertiary_graduated" id="tertiary_graduated" ></td>
                        </tr>
                        <tr>
                          <td>Others</td>
                          <td>
                            <input class="intake"type="text" name="others_school" id="others_school" ></td>
                          <td>
                            <input class="intake"type="text" name="others_years" id="others_years" ></td>
                          <td>
                            <input class="intake"type="text" name="others_graduated" id="others_graduated"></td>
                        </tr>
                      </table><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">26. Health History<br><br>
                        &emsp;&emsp;Physical Health History (Illnesses, Diseases):<input class="intake" type="text" name="psyhistory" style="border-bottom: 1px solid #555; width: 50%;"><br><br><br>
                    </td>   
                  </tr>
                </table><br>
                <table border="2">
                  <tr>
                    <td colspan="2" width="70%" align="center">
                       University Assessment and Guidance Center
                    </td>
                    <td colspan="2" width="10%">
                       Page 1 of 2
                    </td>
                  </tr>
                </table>
              </div>
            </div><br>
          </div>
        </div>
      </div>
          
      <!--Lis of NEW Submitted Forms Page 2-->

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <br><br>
                
              <div class="table-responsive" style="width: 90%;margin-left: 35px;">

            <!--Table for New Submitted Intake Formss Page 1-->
                <table border="2" id="sampleTable">
                 <tr>
                    <td colspan="4">
                        <br>
                        &emsp;&emsp;Psychiatric History:<input class="intake" type="text" id="psychiahistory" name="psychiahistory" style="border-bottom: 1px solid #555; width: 70%;"><br><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">27. Problems that you are experiencing:<br>
                      <!-- <input style="width:100%;height: 100px;"class="intake" type="text" name="pexperiencing" id="pexperiencing" ><br> -->
                      <textarea class="form-control" style="border-color: transparent;" id="pexperiencing" name="pexperiencing" rows="4"></textarea>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">28. What is your goal in seeking help?
                      <textarea class="form-control" style="border-color: transparent;" id="goal" name="goal" rows="4"></textarea>
                  </tr>
                  <tr>
                    <td colspan="4">29. Is the use/abuse of drugs and/or alcohol related to this problem in any way?<br>
                      <textarea class="form-control" style="border-color: transparent;" id="drugs" name="drugs" rows="4"></textarea>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">30. Is there any behavioral problem related?<br>
                      <textarea class="form-control" style="border-color: transparent;" id="behavioral_problems" name="behavioral_problems" rows="4"></textarea>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">31. Have you experienced any significant loss/crisis/life change?
                      <textarea class="form-control" style="border-color: transparent;" id="crisis" name="crisis" rows="4"></textarea>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">32. Kindly check what you are currently experiencing? <center><br>
                      <div id=“container”>
                        <div style="float: left; padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing1" value="Anxiousness" >
                          <label for="vehicle1"> Anxiousness</label><br>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing2" value="Depression" >
                          <label for="vehicle1"> Depression</label>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing3" value="Anger" >
                          <label for="vehicle1"> Anger</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing4" value="Confusion" >
                          <label for="vehicle1"> Confusion</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing5" value="Fear" >
                          <label for="vehicle1"> Fear</label>
                        </div>
                        <!-- ________________________________________________________ -->
                        <div style="float: left; padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing6" value="Loneliness" >
                          <label for="vehicle1"> Loneliness</label><br>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing7" value="Despair" >
                          <label for="vehicle1"> Despair</label>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing8" value="Thoughts of suicide" >
                          <label for="vehicle1"> Thoughts of suicide</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing9" value="Hurt" >
                          <label for="vehicle1"> Hurt</label>
                        </div>
                         <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing10" value="Guilt/shame" >
                          <label for="vehicle1"> Guilt/shame</label>
                        </div>
                         <!-- ________________________________________________________ -->
                        <div style="float: left; padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing11" value="Withdrawing from others" >
                          <label for="vehicle1"> Withdrawing from others</label><br>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing12" value="Relational stress" >
                          <label for="vehicle1"> Relational stress</label>
                        </div>
                        <div style="float: left;padding-left: 5%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing13" value="Martial distress" >
                          <label for="vehicle1"> Martial distress</label>
                        </div>
                         <div style="float: left;padding-left: 10%;">
                          <input type="checkbox" id="currentluexperiencing" name="currentluexperiencing14" value="Parenting struggles" >
                          <label for="vehicle1"> Parenting struggles</label>
                        </div>
                      </div>
                    </center>
                       <br><br><br><br><br><br>
                       33. Other Information you like to share:<input class="intake" type="text" name="Q7" style="border-bottom: 1px solid #555; width: 50%;"><br><br>
                    </td>   
                  </tr>
                  <tr>
                    <th colspan="4" style="color: white; background-color: black;">B. DECLARATION</th>
                  </tr>
                  <tr>
                    <td colspan="4" align="justify">
                      <p style="margin-left: 5%;margin-right: 5%;">
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
                    <!-- CHeck signature from database -->
                    
                    <td colspan="2">34. Client/Student's Signature<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                    <?php 
                         $sql=mysqli_query($conn,"SELECT e_signature as sig from student where Student_id='$id'");
                          $query=mysqli_fetch_array($sql);
                          if (empty($query['sig'])) { ?>
                           <input class="intake"type="file" name="signature" id="signature" required>
                          <?php }else{?>
                            <input class="intake"type="file" name="signature" id="signature" disabled>
                          <?php }?>
                    </td> 
                    <td colspan="2">35. Date Accomplished (DD/MM/YYYY)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                             <input type="date" name="date_accomplished" id="date_accomplished" placeholder="DD/MM/YYYY" required>
                    </td>
                  </tr>
                </table>
                <br>
                <table border="2">
                  <tr>
                    <td colspan="2" width="70%" align="center">
                       University Assessment and Guidance Center
                    </td>
                    <td colspan="2" width="10%">
                       Page 2 of 2
                    </td>
                  </tr>
                </table>
              </div>
            </div><br>
          </div>
        </div>
      </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
           <input type="submit" name="datepicker" class="btn btn-success" value="Submit">  

        </div>
      </div>
    </div>
  </div>
</form>


  <!--END OF MODAL-->

           <form method="post" action="saveIntakeForm.php" enctype="multipart/form-data">           
       
       <div class="modal fade " id="studentdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">SET APPOINTMENT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                          <form>  

                            <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Student's Name</label><input class="form-control" type="text" value="<?php  echo $prorow['first_name'].' '.$prorow['last_name'];?>" disabled>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Course & Year</label><input class="form-control" type="text" value="<?php  echo $prorow['crse'].' - '.$prorow['year_level'];?>"disabled>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleSelect1">Mode of Communication</label>
                                    <select class="form-control" id="link" name="mode_of_communication" required="">
                                      <option selected="selected"></option>
                                       <?php
                                           $result=mysqli_query($conn, "SELECT * FROM mode_of_communication");               
                                          while($res = mysqli_fetch_array($result)) {        
                                              $value= $res['mode_id']; ?>
                                              <option value="<?php echo $value; ?>" required><?php echo $res['communication_mode'];?></option>
                                              <?php } ?>
                                    </select>
                                  </div>
                            </div>
                          </div>
                          <div class="calldivlink"></div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Date</label>
                                  <input type="text" name="appdate" id="appdate" class="form-control datepicker" placeholder="MM/DD/YY" autocomplete="off" required="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                           <!--  <div class="col-sm">
                              <div class="form-group">
                                  <label class="control-label">Time</label>
                                  <input class="form-control" name="apptime" id="apptime" type="time" placeholder="Enter full name" required="">
                                </div>
                            </div> -->
                          </div>
                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <input type="submit" name="schedule" class="btn btn-success" value="Set">                     
                      <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancel</button>

                      
                    </div>
                    </div>
                  </div>
                </div>
              </form>




               <div class="modal fade " id="studentwarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">ALERT!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container">
                   
                         <h3 align="center">Fill out intake form first.</h3>
                        </div>
                      </div>
                      <div class="modal-footer">                   
                      <button type="button"  class="btn btn-danger" data-dismiss="modal">Back</button>

                      
                    </div>
                    </div>
                  </div>
                </div>
                  <script type="text/javascript">
    $('.datepicker').datepicker({
        daysOfWeekDisabled: [0,6]
    });
</script>
                  <script type="text/javascript">
                  $('#modeOfCm').click(function(){
                    if(!this.modeOfCommunication.checked) {
                    alert("Please indicate that you accept the Terms and Conditions");
                    this.terms.focus();
                    e.preventDefault(); // equivalent to return false
                      return;
                      }
                  });
                </script>

             