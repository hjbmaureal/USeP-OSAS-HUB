
 <div class="modal fade" id="details<?php echo $row1['seminar_eval_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <?php 

   $seminar_id = $row1['seminar_eval_id'];
   $stud_id = $row1['Student_id'];

   ?>
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
    $sql0="SELECT * from seminar_evaluation where seminar_eval_id = '$seminar_id' ";
      $result0 = $conn->query($sql0);
      if ($result0->num_rows > 0) {
        while($row1 = $result0->fetch_assoc()) {
                  $title = $row1['act_title'];
                  $venue = $row1['venue'];
                  $campus = $row1['campus'];
                  $date = $row1['act_date'];
                  $content1 = $row1['content_q1'];
                  $content2 = $row1['content_q2'];
                  $content3 = $row1['content_q3'];
                  $content4 = $row1['content_q4'];
                  $content5 = $row1['content_q5'];
                  $content6 = $row1['content_q6'];
                  $content7 = $row1['content_q7'];
                  $content8 = $row1['content_q8'];
                  $content9 = $row1['content_q9'];
                  $content10 = $row1['content_q10'];
                  $content11 = $row1['content_q11'];
                  $content12 = $row1['content_q12'];
                  $content13 = $row1['content_q13'];
                  $speaker = $row1['speaker_name'];
                  $topic = $row1['topic'];
                  $resource1 = $row1['resource_q1'];
                  $resource2 = $row1['resource_q2'];
                  $resource3 = $row1['resource_q3'];
                  $resource4 = $row1['resource_q4'];
                  $resource5 = $row1['resource_q5'];
                  $resource6 = $row1['resource_q6'];
                  $resource7 = $row1['resource_q7'];
                  $comments = $row1['comments'];

                
         }
       }

                  ?>
        <div id="HoiPrint">
        <div class="modal-body">       
        <div class="row">
        <div class="col-md-12">

                <!--Form Header-->
                <table border="2" width="90%" align="center">
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
                      <div align="center"><h4>SEMINAR/TRAINING EVALUATION FORM</h4></div>
                    </td>
                  </tr>
                </table>
                  <br>
                </div>
              </div>
               

<div class="row d-flex justify-content-center">
          <div class="col-md-11">
                  <?php
    $sql="SELECT student.first_name, student.last_name, student.middle_name,student.suffix, student.sex, student.year_level, course.title FROM student join course USING(course_id) where Student_id='$stud_id' ";
    $result = $conn->query( $sql); 
      if(!$result ) { 
        die('Could not get data: ' . $conn->connect_error); 
              }
            while($row = $result->fetch_assoc()){

    $fname = $row['first_name'];
    $mname = $row['middle_name'];
    $lname = $row['last_name'];
    $sname = $row['suffix'];
    $sex = $row['sex'];
    $course = $row['title'];
    $year = $row['year_level'];
  }

                  ?>
                  <form method="POST">
                  <div class="col-lg" style="width: 100%">
                        <div class="tile" style="border-width: 2px; border-style: solid; ">
                          <h6>I. INFORMATION</h6>  
                    <div class="info">
                    <table width="100%" border="2px" cellpadding="5px" >
                      <tr>
                      <td width="50%">Name of Participant/Respondents:</td>
                      <td width="50%"><input type="text" name="studname" value="<?php echo $fname." ".$mname." ".$lname." ".$sname ?>" id="studname" style="width: 500px; height: 30px; border-style: hidden;" readonly></td>
                      </tr>
                      <tr>
                      <td>Sex:</td>
                      <td width="50%"><input type="text" name="sex" id="sex" value="<?php echo $sex ?>" style="width: 500px; height: 30px; border-style: hidden;" readonly></td>
                      </tr>
                      <tr>
                        <td>Course and Year:</td>
                        <td width="50%"><input type="text" name="course_year" value="<?php echo $course." - ".$year ?>" id="course_year" style="width: 500px; height: 30px; border-style: hidden;"readonly></td>
                      </tr>

                      <tr>
                        <td>Title of Activity: *</td>
                        <td width="50%"><input type="text" name="act_title" id="act_title" value="<?php echo $title;?>" style="width: 500px; height: 30px; border-style: hidden;" readonly></td>
                      </tr>
                      <tr>
                        <td>Venue:</td>
                        <td width="50%"><input type="text" name="venue" value="<?php echo $venue;?>" id="venue" style="width: 500px; height: 30px; border-style: hidden;"readonly></td>                      
                      </tr>
                      <tr>
                        <td>Date: *</td>
                        <td width="50%"><input type="date" name="act_date" id="act_date" value="<?php echo $date;?>" style="width: 500px; height: 30px; border-style: hidden;" readonly></td>
                      </tr>
                    </table>
                    </div><br>
                    <h6>II. CONTENT OF THE ACTIVITY</h6>
                    <div>On a scale of 1 to 5, 5 being the highest, please rate the session based on the following questions.</div><br>
                    <div class="info">
                    <table width="100%" border="2px" cellpadding="8px" >
                      <tr style="text-align:center; font-size:16px; font-weight: bold;">
                        <td>Questions</td>
                        <td>Ratings</td>
                      </tr>
                      <tr>
                        <td width="60%">1. The activity fully met my expectations. *</td>
                        <td align="center" width="40%">
                      <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c1" type="radio" name="content1" value="5" <?php if ($content1=='5') { echo 'checked'; } ?> >5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c2" type="radio" name="content1" value="4" <?php if ($content1=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c3" type="radio" name="content1" value="3" <?php if ($content1=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c4" type="radio" name="content1" value="2" <?php if ($content1=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c5" type="radio" name="content1" value="1" <?php if ($content1=='1') { echo 'checked'; } ?>>1
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2. The scope of the activity was adequate. *</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c12" type="radio" name="content2" value="5" <?php if ($content2=='5') { echo 'checked'; } ?> required="">5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c22" type="radio" name="content2" value="4" <?php if ($content2=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c32" type="radio" name="content2" value="3" <?php if ($content2=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c42" type="radio" name="content2" value="2" <?php if ($content2=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c52" type="radio" name="content2" value="1" <?php if ($content2=='1') { echo 'checked'; } ?>>1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3. The activity is useful and applicable in a real life settings. *</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c13" type="radio" name="content3" value="5" <?php if ($content3=='5') { echo 'checked'; } ?>>5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c23" type="radio" name="content3" value="4" <?php if ($content3=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c33" type="radio" name="content3" value="3" <?php if ($content3=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c43" type="radio" name="content3" value="2" <?php if ($content3=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c53" type="radio" name="content3" value="1" <?php if ($content3=='1') { echo 'checked'; } ?>>1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>4. The methodologies used were effective. *</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c14" type="radio" name="content4" value="5" <?php if ($content4=='5') { echo 'checked'; } ?>>5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c24" type="radio" name="content4" value="4" <?php if ($content4=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c34" type="radio" name="content4" value="3" <?php if ($content4=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c44" type="radio" name="content4" value="2" <?php if ($content4=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c54" type="radio" name="content4" value="1" <?php if ($content4=='1') { echo 'checked'; } ?>>1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>5. I had enough opportunities to express my own ideas. *</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c15" type="radio" name="content5" value="5" <?php if ($content5=='5') { echo 'checked'; } ?>>5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c25" type="radio" name="content5" value="4" <?php if ($content5=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c35" type="radio" name="content5" value="3" <?php if ($content5=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c45" type="radio" name="content5" value="2" <?php if ($content5=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c55" type="radio" name="content5" value="1" <?php if ($content5=='1') { echo 'checked'; } ?>>1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td width="60%">6. The other materials (e.g., videos, presentations) were useful in making
 the activity more interesting. *</td>
                        <td width="40%">
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c16" type="radio" name="content6" value="5" <?php if ($content6=='5') { echo 'checked'; } ?>>5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c26" type="radio" name="content6" value="4" <?php if ($content6=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c36" type="radio" name="content6" value="3" <?php if ($content6=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c46" type="radio" name="content6" value="2" <?php if ($content6=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c56" type="radio" name="content6" value="1" <?php if ($content6=='1') { echo 'checked'; } ?>>1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>7. I gained new and important ideas or insight thru the activity. *</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="c17" type="radio" name="content7" value="5" <?php if ($content7=='5') { echo 'checked'; } ?>>5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c27" type="radio" name="content7" value="4" <?php if ($content7=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c37" type="radio" name="content7" value="3" <?php if ($content7=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c47" type="radio" name="content7" value="2" <?php if ($content7=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="c57" type="radio" name="content7" value="1" <?php if ($content7=='1') { echo 'checked'; } ?>>1 
                      </label>
                      </div>
                        </td>
                      </tr>
                    </table>
                    </div><br>
                    <div class="info">
                    <table width="100%" border="2px" cellpadding="5px" >
                      <tr>
                        <td width="50%">What activity process, session or topic needs further clarification? *
                        </td>
                        <td width="50%"><input type="text" name="content8" id="content8" value="<?php echo $content8;?>" style="width: 500px; height: 35px; border-style: hidden;" readonly></td>
                      </tr>
                      <tr>
                        <td>What are the factors / things that helped me understand the topic s discussed? *
                        </td>
                        <td width="50%"><input type="text" name="content9" id="content9" value="<?php echo $content9;?>" style="width: 500px; height: 35px; border-style: hidden;" readonly></td>
                      </tr>
                      <tr>
                        <td>What are the factors / things that hindered me from participating in the activity? *</td>
                        <td width="50%"><input type="text" name="content10" id="content10" value="<?php echo $content10;?>" style="width: 500px; height: 35px; border-style: hidden;" readonly></td>
                      </tr>
                    </table>
                  </div><br>
                  <h6>III. RESOURSE PERSON/SESSION PRESENTER</h6>
                    <div>On a scale of 1 to 5, 5 being the highest, please rate the session based on the following questions.</div><br>
                    <div class="form-group">
                      Speaker:&nbsp; <input type="text" id="speaker" name="speaker" value="<?php echo $speaker;?>" style=" text-align: center; width:300px; border-style:solid; border-left: none; border-top: none; border-right: none;" readonly><br>
                    </div>
                    <div class="form-group">
                      Topic:&nbsp; <input type="text" id="topic" name="topic" value="<?php echo $topic;?>" style=" text-align: center; width:500px; border-style:solid; border-left: none; border-top: none; border-right: none;" readonly><br>
                    </div>
                    <div class="info">
                    <table width="100%" border="2px" cellpadding="8px" >
                      <tr>
                        <td width="60%">1. The presenter displayed a thorough knowledge of the topic and was able to provide insights. *</td>
                        <td align="center" width="40%">
                      <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R1" type="radio" name="resource1" value="5" <?php if ($resource1=='5') { echo 'checked'; } ?>>5 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R2" type="radio" name="resource1" value="4" <?php if ($resource1=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R3" type="radio" name="resource1" value="3" <?php if ($resource1=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R4" type="radio" name="resource1" value="2" <?php if ($resource1=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R5" type="radio" name="resource1" value="1" <?php if ($resource1=='1') { echo 'checked'; } ?>>1
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2. The presenter explained and processed the activities thoroughly. *</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R12" type="radio" name="resource2" value="5" <?php if ($resource2=='5') { echo 'checked'; } ?>>5&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R22" type="radio" name="resource2" value="4" <?php if ($resource2=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R32" type="radio" name="resource2" value="3" <?php if ($resource2=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R42" type="radio" name="resource2" value="2" <?php if ($resource2=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R52" type="radio" name="resource2" value="1" <?php if ($resource2=='1') { echo 'checked'; } ?>>1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3. The presenter sustained the attention of the participants and encouraged their participation. *</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R13" type="radio" name="resource3" value="5" <?php if ($resource3=='5') { echo 'checked'; } ?>>5&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R23" type="radio" name="resource3" value="4" <?php if ($resource3=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R33" type="radio" name="resource3" value="3" <?php if ($resource3=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R43" type="radio" name="resource3" value="2" <?php if ($resource3=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R53" type="radio" name="resource3" value="1" <?php if ($resource3=='1') { echo 'checked'; } ?>>1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>4. The presenter was able to create a good learning climate. *</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R14" type="radio" name="resource4" value="5" <?php if ($resource4=='5') { echo 'checked'; } ?>>5&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R24" type="radio" name="resource4" value="4" <?php if ($resource4=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R34" type="radio" name="resource4" value="3" <?php if ($resource4=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R44" type="radio" name="resource4" value="2" <?php if ($resource4=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R54" type="radio" name="resource4" value="1" <?php if ($resource4=='1') { echo 'checked'; } ?>>1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>5. The presenter was able to manage her / his time well. *</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R15" type="radio" name="resource5" value="5" <?php if ($resource5=='5') { echo 'checked'; } ?>>5&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R25" type="radio" name="resource5" value="4" <?php if ($resource5=='4') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R35" type="radio" name="resource5" value="3" <?php if ($resource5=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R45" type="radio" name="resource5" value="2" <?php if ($resource5=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R55" type="radio" name="resource5" value="1" <?php if ($resource5=='1') { echo 'checked'; } ?>>1 
                      </label>
                      </div>
                        </td>
                      </tr>
                      <tr>
                        <td>6. The presenter was sensitive to the participants needs. *</td>
                        <td>
                          <div class="form-check" style="text-align:center;">
                      <label class="form-check-label">
                        <input class="form-check-input" id="R16" type="radio" name="resource6" value="5" <?php if ($resource6=='5') { echo 'checked'; } ?>>5&emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R26" type="radio" name="resource6" value="4" <?php if ($resource6=='4 ') { echo 'checked'; } ?>>4 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R36" type="radio" name="resource6" value="3" <?php if ($resource6=='3') { echo 'checked'; } ?>>3 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R46" type="radio" name="resource6" value="2" <?php if ($resource6=='2') { echo 'checked'; } ?>>2 &emsp;&emsp;&emsp;
                        <input class="form-check-input" id="R56" type="radio" name="resource6" value="1" <?php if ($resource6=='1') { echo 'checked'; } ?>>1 
                      </label>
                      </div>
                        </td>
                      </tr>
                    </table>
                    </div><br>
                    <div class="info">
                      No printed attendance sheet, no one to buy miscellaneous materials for the activity needed by the resource speaker.   
                    </div><br>
                    <div class="form-group">
                      Comment:&nbsp; <input type="text" id="comment" name="comment" value="<?php echo $comments;?>" style=" text-align: center; width:800px; border-style:solid; height: 80px; grid-row: inherit;" readonly><br>
                    </div><br>  
        </div>
      </div>
    </form>
  </div>
    </div>
        <div class="modal-footer">
      <button id="printforms" class="btn btn-warning" style="color:white; background-color: yellow;" onclick="print_specific_div_content2()"><i class="fas fa-print"></i>
        &nbsp;Print</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel
          </button>
          </div>
      
  </div>
</div>
</div>
</div>

<script type="text/javascript" src="js/printThis.js"></script>
 <script type="text/javascript">
  function print_specific_div_content2(){
    var win = window.open('','','left=0,top=0,width=900,height=700,toolbar=0,scrollbars=0,status =0');

    var content = "<html>";
    content += "<body onload=\"window.print(); window.close();\">";
    content += document.getElementById("HoiPrint").innerHTML ;
    content += "</body>";
    content += "</html>";
    win.document.write(content);
    win.document.close();
}
    </script>
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
    <!-- ENDDD -->
