<!--View Forms Modal -->

  <div class="modal fade" id="viewmodal?<?php echo $row['Student_id'].$row['intake_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" role="document">


<?php
include('../../conn.php');
$try=$row['Student_id'].$row['intake_id'];
$id=$row['Student_id'];
$intake_id=$row['intake_id'];
 ?>

    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">INTAKE FORM | <?php echo $id; ?>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">

        <div class="row">
          <div id="HoiPrint?<?php echo $try; ?>">
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
                <?php 
                 $q7= ''; 
                 $rd=array();$checked_arr=array();
                 $rd=array("Walk-in","Call-in","Referred");
                 $sqlselect=mysqli_query($conn,"SELECT *, course.name as crse FROM student join intake_form on intake_form.Student_id=student.Student_id join course on student.course_id=course.course_id join emergency_contact on emergency_contact.student_id= student.student_id LEFT JOIN grantee_history on grantee_history.student_id=student.Student_id LEFT JOIN scholarship_program on scholarship_program.program_id=grantee_history.program_id where student.Student_id='$id' and intake_form.intake_id='$intake_id'");
                if($prorow=mysqli_fetch_array($sqlselect)){ $q7=$prorow['Q7'];
                  $checked_arr[]=$prorow['intake_type'];
                  $image_data=$prorow['e_signature'];
                ?>
                <div align="center">
                  <?php 
                  foreach($rd as $academic){

                  $checked = "";
                  if(in_array($academic,$checked_arr)){
                    $checked = "checked";
                  }
      
      echo '<input type="radio"value="'.$academic.'" '.$checked.' ><label for="Walk-in"> &emsp;'.$academic.'</label> &emsp;&emsp;&emsp;';
    }
                  ?>
                </div>
            
                <table border="2" width="100%">
                  <tr>
                    <th colspan="4" style="color: white; background-color: black;">A. CLIENT/STUDENT INFORMATION</th>
                  </tr>
                  <tr>
                    <td>1. Title (e.g. Mr, Ms, Mrs)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                             <input type="text" name="title" id="title"  value="" style="border:transparent;" readonly>
                    </td>
                    <td>2. Surname <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                             <input type="text" name="last_name" id="last_name" value="<?php  echo $prorow['last_name'];?>" style="border:transparent;" readonly>
                    </td>
                    <td>3. Given Name/s <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="first_name" id="first_name" style="border:transparent;" value="<?php  echo $prorow['first_name'];?>" readonly>
                    </td>
                    <td>4. Middle Initial <br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="middle_name" id="middle_name" style="border:transparent;" value="<?php  echo $prorow['middle_name'];?>" readonly> 
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">5. Course and Year<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="course&year" id="course&year" style="border:transparent;" value="<?php  echo $prorow['crse'].'/'.$prorow['year_level'];?>" readonly>
                    </td>
                    <td colspan="2">6. Contact Number<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="contactno" id="contactno" style="border:transparent;" value="<?php  echo $prorow['phone_number'];?>" readonly>
                    </td>
                  </tr>
                 <tr>
                    <td colspan="2">7. Gender<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="gender" id="gender" style="border:transparent;" value="<?php  echo $prorow['sex'];?>" readonly>
                    </td>
                    <td>8. Age<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="age" id="age" style="border:transparent;" value="<?php  echo $prorow['last_name'];?>" readonly>
                    </td>
                    <td>9. Birthdate<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="bdate" id="bdate" style="border:transparent;"  value="<?php  echo $prorow['birth_date'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">10. Status<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="civil_status" id="civil_status" style="border:transparent;" value="<?php  echo $prorow['civil_status'];?>" readonly>
                    </td>
                    <td>11. Birthplace<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="bplace" id="bplace" style="border:transparent;" value="<?php  echo $prorow['birth_place'];?>" readonly>
                    </td>
                    <td>12. Birth Order<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="birth_order" id="birth_order" style="border:transparent;" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">13. Present Address (Apt/House Number., Street, City/Municipality, Province)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="address" id="address" style="border:transparent;" value="<?php  echo $prorow['house_block_lot_num'].'., '.$prorow['street'].', '.$prorow['city'].', '.$prorow['province'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">14. Provincial Address<br>
                            <input type="text" name="provincial_address" id="provincial_address" style="border:transparent;" value="<?php  echo $prorow['province'];?>" readonly> 
                    </td>
                  </tr>
                  <tr>
                    <td>15. Religion<br>
                            <input type="text" name="religion" id="religion" style="border:transparent;" value="<?php  echo $prorow['religion'];?>" readonly>
                    </td>
                    <td colspan="3">16. Email Address<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="email" id="email" style="border:transparent;" value="<?php  echo $prorow['email_add'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">17. Name of Father<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_name" id="father_name" style="border:transparent;" value="<?php  echo $prorow['father_name'];?>" readonly>
                    </td>
                    <td>18. Occupation<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_occupation" id="father_occupation" style="border:transparent;"  value="<?php  echo $prorow['father_occupation'];?>" readonly>
                    </td>
                    <td>19. Contact No.<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="father_contact" id="father_contact" style="border:transparent;" value="<?php  echo $prorow['father_contact'];?>" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">20. Name of Mother<br>
                            <input type="text" name="mother_name" id="mother_name" style="border:transparent;" value="<?php  echo $prorow['mother_name'];?>" readonly>
                    </td>
                    <td>21. Occupation<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="mother_occupation" id="mother_occupation" style="border:transparent;" value="<?php  echo $prorow['mother_occupation'];?>" readonly>
                    </td>
                    <td>22. Contact No.<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="mother_contact" id="mother_contact" style="border:transparent;" value="<?php  echo $prorow['mother_contact'];?>" readonly>
                    </td>
                  </tr>
                   <tr>
                    <td colspan="4">23. Parent's Present Address (Apt/House Number., Street, City/Municipality, Province)<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="parents_address" id="parents_address" style="border:transparent;" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">24. Scholarship currently availed<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                            <input type="text" name="scholarship" id="scholarship" style="border:transparent;" value="<?php  echo $prorow['program_name'];?>" readonly>
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
                          <td><input type="text" name="elementary_school" id="elementary_school" style="border:transparent;width: 100%;" value="<?php echo $prorow['elementary_school']; ?>" readonly></td>
                          <td><input type="text" name="elementary_years" id="elementary_years" style="border:transparent;width: 100%" value="<?php echo $prorow['elem_years_atendance']; ?>" readonly></td>
                          <td><input type="text" name="elementary_graduated" id="elementary_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['elem_year_graduated']; ?>" readonly></td>
                        </tr>
                        <tr>
                          <td>Secondary</td>
                          <td><input type="text" name="secondary_school" id="secondary_school" style="border:transparent;width: 100%" value="<?php echo $prorow['secondary_school']; ?>" readonly></td>
                          <td><input type="text" name="secondary_years" id="secondary_years" style="border:transparent;width: 100%" value="<?php echo $prorow['sec_years_atendance']; ?>" readonly></td>
                          <td><input type="text" name="secondary_graduated" id="secondary_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['sec_year_graduated']; ?>" readonly></td>
                        </tr>
                        <tr>
                          <td>Tertiary</td>
                          <td><input type="text" name="tertiary_school" id="tertiary_school" style="border:transparent;width: 100%" value="<?php echo $prorow['tertiary_school'] ?>" readonly></td>
                          <td><input type="text" name="tertiary_years" id="tertiary_years" style="border:transparent;width: 100%" value="<?php echo $prorow['ter_years_atendance'] ?>" readonly></td>
                          <td><input type="text" name="tertiary_graduated" id="tertiary_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['ter_year_graduated'] ?>" readonly></td>
                        </tr>
                        <tr>
                          <td>Others</td>
                          <td><input type="text" name="others_school" id="others_school" style="border:transparent;width: 100%" value="<?php echo $prorow['other_school'] ?>" readonly></td>
                          <td><input type="text" name="others_years" id="others_years" style="border:transparent;width: 100%" value="<?php echo $prorow['other_years_atendance'] ?>" readonly></td>
                          <td><input type="text" name="others_graduated" id="others_graduated" style="border:transparent;width: 100%" value="<?php echo $prorow['other_year_graduated'] ?>" readonly></td>
                        </tr>
                      </table><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">26. Health History<br><br>
                        &emsp;&emsp;Physical Health History (Illnesses, Diseases): <input type="text" name="" value="<?php echo $prorow['hhistory_physical']; ?>" readonly><br><br>
                    
                        &emsp;&emsp;Psychiatric History: <input type="text" name="" value="" style="width: 44.5%;" value="<?php echo $prorow['hhistory_psychiatric']; ?>" readonly><br><br>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">27. Problems that you are experiencing:<br>
                     <input style="width:100%;height: 100px;"class="intake"type="text" name="pexperiencing" id="pexperiencing" value="<?php echo $prorow['Q1']; ?>" readonly><br>
                    </td>    
                  </tr>
                  <tr>
                    <td colspan="4">28. What is your goal in seeking help?<br><br><br><br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="goal" id="goal" value="<?php echo $prorow['Q2']; ?>" readonly>
                  </tr>
                  <tr>
                    <td colspan="4">29. Is the use/abuse of drugs and/or alcohol related to this problem in any way?<br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="drugs" id="drugs" value="<?php echo $prorow['Q3']; ?>" readonly>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">30. Is there any behavioral problem related?<br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="behavioral_problems" id="behavioral_problems" value="<?php echo $prorow['Q4']; ?>" readonly>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">31. Have you experienced any significant loss/crisis/life change?<br>
                      <input style="width:100%;height: 100px;"class="intake"type="text" name="crisis" id="crisis" value="<?php echo $prorow['Q5']; ?>" readonly>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="4">32. Kindly check what you are currently experiencing? <center>
                     <?php }
                            $checked_arr2=array();$rd2=array();
                            $arrayName = array('Anxiousness','Depression','Anger','Confusion','Fear','Loneliness','Despair','Thoughts of suicide','Hurt','Guilt/shame','Withdrawing from others','Relational stress','Martial distress','Parenting struggles','', );
                      $sql = mysqli_query($conn,"SELECT * FROM `chk_intake_q6` WHERE chk_intake_q6.intake_id = '".$prorow['intake_id']."'");
                            $count=mysqli_num_rows($sql);
                            $row=mysqli_fetch_array($sql);
                            $rd2=array($row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13],$row[14]); ?>
                      <div id=“container”>
                        <?php $count=0; ?>
                        <table>

                          <tr >
                            
                              <?php
                          foreach($rd2 as $academic){

                            $checked = "";
                            if($academic!='' || $academic!=null){
                            $checked = "checked";
                            }
      
                            echo '<td style="height: 20px; align: left;"><input style="margin-left: 70px;" type="checkbox" value="'.$academic.'" '.$checked.' ><label for="vehicle1"> '.$arrayName[$count].'</label></td>';
                            if($count==2 || $count==5 || $count==8 || $count==11){
                              echo "</tr>";
                            }
                           $count++; }
                          ?>
                        </table>
                      </div>
                    </center>
                       
                       &emsp;&emsp;33. Other Information you like to share:<input class="intake" type="text" name="Q7" style="border-bottom: 1px solid #555; width: 50%;" value="<?php echo $q7; ?>" readonly><br><br>
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
                        <!-- CHeck signature from database -->
                    <td colspan="2">34. Client/Student's Signature<br><i class="fa fa-caret-left" aria-hidden="true"></i>
                      <br>
                    <div style="margin-left: 7%;" >
                      <?php if ($image_data!='') { ?>
                         <img style="margin-left: 60px; margin-top: -5%; margin-right: 1px; position: absolute;" width="80" height="80" src="data:image/jpeg;base64,<?php echo base64_encode( $image_data ); ?>" />
                      <?php }else{ ?>
                           <img style="margin-left: 60px; margin-top: -5%; margin-right: 1px; position: absolute;" width="100" height="50" src="image/Defalt_Esig.png" />
                      <?php }?>
                    </div>
                    </td>
                    <td colspan="2">35. Date Accomplished <br><i class="fa fa-caret-left" aria-hidden="true"></i>

                             <input type="text" name="date_accomplished" class="intake datepicker" value="<?php echo $prorow['date_filed']; ?>" id="date_accomplished" placeholder="YYYY/MM/DD" autocomplete="off" readonly><br>
                    </td>
                  </tr>
                </table>
                <br>
            </div></div><br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="print" class="btn btn-success" onclick="print_specific_div_content<?php echo $intake_id; ?>()"><i class="fas fa-print"></i>&nbsp;Print</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>        
        </div>
      </div>
    </div>


  <!--END OF MODAL-->
 <!-- DATEPICKER -->
<?php 
                 $results[]= '';$disableTimeArr[]=''; $i=0;$count=0;
                $from= date('Y-m-d'); 
                $sql="SELECT DATE_FORMAT(appointment_date, '%d') as dy,appointment_date, appointment_time FROM `guidance_appointments` WHERE appointment_date > '$from'";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){

                  /*collect all schedule by hours(format-11/27/2021:8)*/
                  $hourholder=date('H', strtotime($row['appointment_time']));
                  $hourRemoveLeadingZero=ltrim($hourholder, "0");
                  $dateholder=date('m/d/Y',strtotime($row['appointment_date']));
                  $timeToDisableVar=$dateholder.':'.$hourRemoveLeadingZero;
                  $disableTimeArr[]='"'.$timeToDisableVar.'"';
                  
                  /*count the number of schedule, if >= 6 disable dates*/
                  $sql2="SELECT DATE_FORMAT(appointment_date, '%d') as dy, appointment_date FROM `guidance_appointments` WHERE  appointment_date > '$from' and DATE_FORMAT(appointment_date, '%d')";
                $result2 = mysqli_query($conn, $sql2);
               
                while($row2 = mysqli_fetch_assoc($result2)){
                  if ($row['dy']==$row2['dy']) {
                    $count++;
                    if ($count==6) {
                      $time= strtotime($row['appointment_date']);
                    $holder=date('d-m-Y', $time);
                    $results[] = '"'.$holder.'"';
                    }
                    # code...
                  }
                  
                }
                    
                } 
                $results=array_filter($results);
                $totaldayslist= implode(", ", $results);
                $disableTimeArr=array_filter($disableTimeArr);
                $timeToDisable= implode(", ", $disableTimeArr);
                ?>
                <!-- DISABLE DATESCHEDULE -->
<script type="text/javascript">
    var disabledtimes_mapping = [<?php echo $timeToDisable;?>];
    var datesForDisable = [<?php echo $totaldayslist;?>];
function formatDate(datestr)
{
    var date = new Date(datestr);
    var day = date.getDate(); day = day>9?day:"0"+day;
    var month = date.getMonth()+1; month = month>9?month:"0"+month;
    return month+"/"+day+"/"+date.getFullYear();
}

$(".datepicker").datetimepicker({
    format: 'yyyy/mm/dd hh:ii',
    startDate: new Date(),
    datesDisabled: datesForDisable,
    daysOfWeekDisabled: [0,6],
    autoclose: true,
    onRenderHour:function(date){
  if(disabledtimes_mapping.indexOf(formatDate(date)+":"+date.getUTCHours())>-1)
    {
        return ['disabled'];
    }
    }
});</script>

<script type="text/javascript">
   $(document).ready(function(){
    $("input:radio").click(function(){
        return false;
    });
    $("input:checkbox").click(function(){
        return false;
    });
   });
</script>

 <script type="text/javascript">
  function print_specific_div_content<?php echo $intake_id; ?>(){
    var win = window.open('','','left=0,top=0,width=900,height=700,toolbar=0,scrollbars=0,status =0');

    var content = "<html>";
    content += "<body onload=\"window.print(); window.close();\">";
    content += document.getElementById("HoiPrint?<?php echo $try; ?>").innerHTML ;
    content += "</body>";
    content += "</html>";
    win.document.write(content);
    win.document.close();
}
    </script>