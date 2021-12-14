 <!-- Data table plugin-->
      <?php 
sleep(1);
include('conn.php');
  if (isset($_POST['requestmonth']) && isset($_POST['requestmode'])) {
  $requestmonth=$_POST['requestmonth'];
  $requestmode=$_POST['requestmode'];
  $counthold=0;
  if ($requestmonth=="all") {
      # code...
      $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3'";
    }if ($requestmonth=="all" && $requestmode=="all") {
      # code...
      $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3'";
    }if ($requestmonth!="all" && $requestmode=="all") {
      # code...
       $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3' and DATE_FORMAT(appointment_date,'%m') like '$requestmonth'";
    }if ($requestmonth=="all" && $requestmode!="all") {
      # code...
      $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3' and mode_id='$requestmode'";
    }if ($requestmonth!="all" && $requestmode!="all") {
      # code...
       $sql1="SELECT appointment_id FROM guidance_appointments WHERE guidance_appointments.status_id='3' and mode_id='$requestmode' and DATE_FORMAT(appointment_date,'%m') like '$requestmonth'";
    }
   
   ?>
   <div class="table-bd">
                <div class="table-responsive">
                  <br>
    <table class="table table-hover table-bordered printdata" id="tableprint">
      
                    <thead>
                      <tr>
                      <th>Date Scheduled</th>
                      <th>Time</th>
                      <th class="max">Client</th>
                      <th>Mode of Communication</th>
                      <th class="max">Action</th>
                    </tr>
  
                  </thead>
                  <tbody>
                       <?php 
                  
                        if($result1 = mysqli_query($conn, $sql1)){
                            while ($app_row = mysqli_fetch_assoc($result1)) {
                                /*COMPER INDV_APPOINTMENT*/
                                $indv_sql="SELECT appointment_id FROM indv_counselling WHERE appointment_id='".$app_row['appointment_id']."'";
                                    if($indv_result = mysqli_query($conn, $indv_sql)){
                                        $count=mysqli_num_rows($indv_result);
                                        if ($count) {
                                           if($sql = mysqli_query($conn,"SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments join indv_counselling ON indv_counselling.appointment_id= guidance_appointments.appointment_id LEFT JOIN intake_form on indv_counselling.intake_id= intake_form.intake_id left join student on intake_form.Student_id=student.Student_id LEFT join mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id WHERE guidance_appointments.status_id = 3 and guidance_appointments.appointment_id='".$app_row['appointment_id']."'")){
                                             while($row = mysqli_fetch_array($sql)) {     
                                              $id=$row['id']; $counthold++;?>
                                              <tr>
                                                <td><?php echo $row['appointment_date'];?></td>
                                                <td><?php echo $row['appointment_time'];?></td>
                                                <td><?php echo $row['last_name'].', '.$row['first_name'].' '.$row['middle_name'].' '.$row['suffix'];?></td>
                                                <td><?php echo $row['communication_mode'];?></td>
                                                <td id="td">
                                                <a class="btn btn-info btn-sm" data-toggle="modal" href="#appointmentView<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-eye"></i></a>

                                                <a class="btn btn-warning btn-sm" data-toggle="modal" href="#appointmentEdit<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i></a>

                                                <a class="btn btn-danger btn-sm" data-toggle="modal" href="#appointmentCancel_indiv<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-close"></i></a>
                                                <?php include('Guidancce_Appointment_Modal.php'); ?>
                                                </td>
                                              </tr>
                                              <?php }}

                                           }

                                        }
                              
                              /*COMPER GROUP_GUIDANCE*/
                              $grp_sql="SELECT appointment_id FROM group_guidance WHERE appointment_id='".$app_row['appointment_id']."'";
                                    if($grp_result = mysqli_query($conn, $grp_sql)){
                                        $count=mysqli_num_rows($grp_result);
                                        if ($count) {
                                          # code...
                                          if($sql = mysqli_query($conn,"SELECT *, guidance_appointments.appointment_id as id FROM guidance_appointments JOIN group_guidance on group_guidance.appointment_id=guidance_appointments.appointment_id JOIN mode_of_communication ON guidance_appointments.mode_id=mode_of_communication.mode_id JOIN course on course.course_id= group_guidance.course_id WHERE guidance_appointments.status_id='3' and guidance_appointments.appointment_id='".$app_row['appointment_id']."'")){
                                            while($row = mysqli_fetch_array($sql)) {     
                                              $id=$row['id'];$counthold++; ?>
                                              <tr>
                                                <td><?php echo $row['appointment_date'];?></td>
                                                <td><?php echo $row['appointment_time'];?></td>
                                                <?php $section=$row['section']; $year_level=$row['year_level'];
                                                 if ($row['section']=='all') {
                                                  $section='';
                                                }if ($row['year_level']=='all') {
                                                  $year_level='';
                                                }?>
                                                <td><?php echo $row['title'].' '.$year_level.' '.$section;?></td>
                                                <td><?php echo $row['communication_mode'];?></td>
                                                <td id="td">
                                                <a class="btn btn-info btn-sm" data-toggle="modal" href="#appointmentViewgroup<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-eye"></i></a>

                                                <a class="btn btn-warning btn-sm" data-toggle="modal" href="#appointmentEditgroup<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm" data-toggle="modal" href="#appointmentCancel_group<?php echo $id;?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-close"></i></a>
                                                <?php include('Guidancce_Appointment_Modal.php'); ?>
                                                </td>
                                              </tr>
                                              <?php }} 
                                          }
                                        }
                                    }
                            }

                         ?>
                    </tbody>
                  </table><center><h6><?php if ($counthold==0) {
                               echo "No Record Found!";
                            }
                           ?></h6></center></div></div>
  <?php }?>


<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#tableprint').DataTable();</script>
      <script type="text/javascript">$('#tableprint').DataTable();</script>