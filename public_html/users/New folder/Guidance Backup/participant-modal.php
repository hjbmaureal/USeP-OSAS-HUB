 <!-- participant's modal -->
         <div class="modal fade " id="list<?php echo $row['grp_guidance_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="width:1050px; margin-left: -250px;">

          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> LIST OF PARTCIPANTS
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>

           <div class="modal-body c">
            <div class="tile">
              
            
        <div class="table-bd">
          <div id="att-table">
            <?php
                     $g_id = $row['grp_guidance_id'];

                     $fetch_info = "SELECT group_guidance.topic, guidance_appointments.appointment_date FROM group_guidance
                                    JOIN guidance_appointments ON group_guidance.appointment_id=guidance_appointments.appointment_id WHERE group_guidance.grp_guidance_id=' $g_id'";
                                      $res = $conn->query($fetch_info);
                      if ($res->num_rows > 0) {
                      // output data of each row
                      while($row = $res->fetch_assoc()) {

                     
            ?>
            <div id="title" style="margin-top:30px;"><div align="center"><img src="image/logo.png" style="width: 120px;height: 120px;" alt="USeP Logo">
            <div align="center" style="font-size:16px;"><b>University of Southeastern Philippines</b><br><i>University Guidance and Assessment Center</i><br><br>
          <div class="float-left"><p>Purpose:&nbsp;<?php echo htmlentities($row['topic']);?></p></div>
          <div class="float-right"><p>Date:&nbsp;<?php echo htmlentities($row['appointment_date']);?></p></div>
             <?php
                      }}
                    

                    ?>
          
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th width="15%">Signature</th>
                      </tr>
                  </thead>
                  <tbody>
              <?php     
                      $sql8 = "SELECT student.Student_id, student.first_name, student.middle_name, student.last_name, student.e_signature, student.section, student.year_level, participants.grp_guidance_id, participants.attendance 
                        FROM course JOIN student ON course.course_id = student.course_id
                        JOIN participants ON student.Student_id = participants.Student_id WHERE participants.grp_guidance_id = '$g_id' AND participants.attendance='PRESENT'";
                      $result8 = $conn->query($sql8);
                      if ($result8->num_rows > 0) {
                      // output data of each row
                      while($row = $result8->fetch_assoc()) {
                        $image_data=$row['e_signature'];
                    ?>
                    <tr>
                      <td><?php echo htmlentities($row['Student_id']);?></td>
                      <td><?php echo htmlentities($row['first_name']);?>&nbsp;<?php echo htmlentities($row['middle_name']);?>&nbsp;<?php echo htmlentities($row['last_name']);?></td>
                      <td>
                        <?php if ($image_data!='') { ?>
                          <img  width="100" height="100" src="data:image/jpeg;base64,<?php echo base64_encode( $image_data ); ?>" />
                        <?php }else{?>
                          <img  width="100" height="50" src="image/Defalt_Esig.png" />
                        <?php }?>
                    </td></tr>

                    <?php
                      }}
                    

                    ?>

                    </tbody>
                  </table>
                </div>
              </div>
                       

            </div>
          </div>
       </div>
            <div class="modal-footer">
              <button class="btn btn-warning btn-sm verify" id="print-tbl" onclick="print_specific_div_content()"><i class="fas fa-print"></i> Print</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

            </div>
          </div>
        </div>

        <!--</div>-->

       