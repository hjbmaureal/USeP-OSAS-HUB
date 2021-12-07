<?php
   include('conn.php');
include('session_admin.php');
   $admin_id=$_SESSION['id'];
if (isset($_POST['ggidd'])) {
  $ggidd=$_POST['ggidd'];
  $selectname = "SELECT * FROM `group_guidance` WHERE grp_guidance_id= '$ggidd'";
     $query = $conn->query($selectname);
     $count=mysqli_num_rows($query);
     $id= $count['appointment_id'];
     $update = "UPDATE `guidance_appointments` SET `status_id`='1' WHERE appointment_id= '$id'";
     $query = $conn->query($update);

    $chk = $_POST['checks'];
    $gid = $_POST['ggid'];
    $chkcount = count($chk);
  
  if(!isset($chk))
  {
        echo '<script> alert("At least one checkbox Must be Selected !!!");</script>';
  }
  else {
    echo $chkcount;
    for($i=0; $i<$chkcount; $i++){
      
      $del = $chk[$i];
      $stat="ATTENDED";
      $sql10="UPDATE participants set attendance='$stat' WHERE Student_id='$del' AND grp_guidance_id=$gid";
      $res = $conn->query($sql10);
    } 
    
    if($sql10){
    
     echo '<script>
                          swal({
                              title: "Group Guidance Status Updated!",
                              text: "Server Request Successful!",
                              icon: "success",
                              buttons: false,
                              timer: 1800,
                              closeOnClickOutside: false,
                                closeOnEsc: false,
                          })
                        </script>';
                      }else{
                        echo '<script>
                          swal({
                            title: "Something went wrong...",
                            text: "Server Request Failed!",
                            icon: "error",
                            buttons: false,
                            timer: 1800,
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                          })
                        </script>';
                      }
                        echo "<meta http-equiv='refresh' content='2'>";
    
  }

  }
?>

<!-- participant's modal -->
         <div class="modal fade" id="statt<?php echo $row['grp_guidance_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="width:1050px; margin-left: -250px;">

          <div class="modal-header" style="background-color: #2b4550;">
          <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Set Status and Attendance
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>

           <div class="modal-body c">

            <div class="tile">
                
                <div>
                  <div class="float-left"><h4>Participants List</h4></div>
                </div><br><br>
            <form method="post" name="frm">
        <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                      <td></td>
                      <th>ID</th>
                      <th>Full Name</th>
                      <th>Course</th>
                      <th>Year Level</th>
                      <th>Section</th>
                      <th>Attendance</th>
                      </tr>
                  </thead>
                  <tbody>
                     <?php
                     $g_idd = $row['grp_guidance_id']; 

                      $sql9 = "SELECT student.Student_id, student.first_name, student.middle_name, student.last_name, course.title, student.year_level, student.section, participants.grp_guidance_id, participants.attendance 
                        FROM course JOIN student ON course.course_id = student.course_id
                        JOIN participants ON student.Student_id = participants.Student_id WHERE participants.grp_guidance_id = '$g_idd'";
                      $result9 = $conn->query($sql9);
                      $cnt=1;
                      if ($result9->num_rows > 0) {
                     
                      while($row = $result9->fetch_assoc()) {
                      $idid = $row['Student_id'];
                    ?>
                    <tr>
                      <td><input type="checkbox" name="checks[]" class="chk-box" value="<?php echo $idid;?>"><input name="ggid" type="hidden" value="<?php echo $g_idd;?>"></td>
                      <td><?php echo htmlentities($idid);?></td>
                      <td><?php echo htmlentities($row['first_name']);?>&nbsp;<?php echo htmlentities($row['middle_name']);?>&nbsp;<?php echo htmlentities($row['last_name']);?></td>
                      <td><?php echo htmlentities($row['title']);?></td>
                      <td><?php echo htmlentities($row['year_level']);?></td>
                      <td><?php echo htmlentities($row['section']);?></td>
                      <td><?php echo htmlentities($row['attendance']);?></td>
                    </tr>

                    <?php
                      }}
                    if ($result9->num_rows > 0) {
                     
                    ?> 

            
                    <tr>
                      <td width="5%;">
                        <!-- <button type="submit"  class="btn btn-success" name="chk_mod" >Attend</button> -->
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
                    </tbody>
                  </table>
                </div></div>
                  
                </div>      

           
             <div class="tile">
                <div>
                <div class="float-left"><h4>Set Status</h4></div>
                </div><br><br>

                  <div class="row">
                    <div class="col-auto">
                      
                        <input name="ggidd" type="hidden" value="<?php echo $g_idd;?>">
                       <button type="submit" name="up_stat" class="btn btn-danger">End Session</button>
                      </form>    

                       </div>
                    </div>
                  </div>

              </div>       
           

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

            </div>
          </div>
        </div>

 <!--</div>-->
