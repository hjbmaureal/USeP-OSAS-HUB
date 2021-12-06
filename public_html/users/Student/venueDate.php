<?php 
include('conn.php');
include('session_student.php');
$id=$_SESSION['id'];
if (isset($_POST['id'])) {
  $appointment_id=$_POST['id'];
   $sql="SELECT group_guidance.topic, guidance_appointments.appointment_date, guidance_appointments.appointment_time, mode_of_communication.communication_mode FROM `group_guidance` JOIN guidance_appointments on group_guidance.appointment_id=guidance_appointments.appointment_id JOIN mode_of_communication on mode_of_communication.mode_id= guidance_appointments.mode_id WHERE guidance_appointments.date_completed is not null and group_guidance.appointment_id='$appointment_id' ";
                          $result = $conn->query( $sql); 
                          $count=mysqli_num_rows($result);
                          if(!$result ) { 
                              die('Could not get data: ' . $conn->connect_error); 
                          }
                          if (!$count) {?>
                            <table width="100%" border="2px" style="border-top: 0px;" cellpadding="5px" >
                      <tr>
                        <td>Venue:</td>
                        <td width="50%"><input type="text" name="venue" id="venue" style="width: 500px; height: 30px; border-style: hidden;"></td>                      
                      </tr>
                      <tr>
                        <td>Date:</td>
                        <td width="50%"><input type="text" name="act_date" id="act_date"  style="width: 500px; height: 30px; border-style: hidden;">
                          </td>
                      </tr>
                    </table>
                          <?php }
                          while($row = $result->fetch_assoc()){ ?>

                              
                       <table width="100%" border="2px" style="border-top: 0px;" cellpadding="5px" >
                      <tr>
                        <td>Venue:</td>
                        <td width="50%"><input type="text" name="venue" id="venue" value="<?php echo $row['communication_mode']; ?>" style="width: 500px; height: 30px; border-style: hidden;"></td>                      
                      </tr>
                      <tr>
                        <td>Date:</td>
                        <td width="50%"><input type="text" name="act_date" id="act_date" value="<?php echo $row['appointment_date'].' | '.$row['appointment_time'];?>" style="width: 500px; height: 30px; border-style: hidden;">
                          <input type="hidden" name="title" value="<?php echo $row['topic']; ?>"></td>
                      </tr>
                    </table>
                    <script type="text/javascript">
                      $(document).ready(function(){
                              document.getElementById('Id').value='<?php echo $row['topic']; ?>';

                      });
                    </script>



                             <?php  }

}


?>