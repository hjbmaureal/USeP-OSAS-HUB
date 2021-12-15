       <!-- View Forms Modal -->
 <?php
 include("conn.php");
$uid = $res['id'];
$query=mysqli_query($conn,"SELECT * FROM alumni JOIN student_alumni ON alumni.id = student_alumni.userid  where  id='$uid' ");
while($row=mysqli_fetch_array($query)){

?>
                      
<div class="modal fade" id="Details<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><?php echo $res['id']; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                    <div class="row">
                  <div class="alumni-id"><?php    
                  $id2= $res['id'];  
                    $result = mysqli_query($conn, "SELECT * FROM alumni JOIN student_alumni ON alumni.id = student_alumni.userid  where  id='$id2'");
                     $row = mysqli_fetch_assoc($result);
                      if($row['profile_pic']== NULL){
                       echo '<img src="../../images/logo.png" class="pix"/>'; 
                      }else{
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profile_pic'] ).'" class="pix"/>';
                      }
                   ?></div>
                   <div class="col-sm">

                    <h3 class="font-weight-bold">ALUMNI ID NUMBER: <span class="font-weight-lighter ml-2"><?php echo $res['id']; ?></span></h3> 

                   <h5 class="font-weight-bold">Personal Information</h5> 
                   <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"><?php echo $res['first_name']." ".$res['middle_name']." ".$res['last_name']." ".$res['suffix'] ;?></span></h6>
<br>
                 <h5 class="font-weight-bold">School Information</h5>

                          <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Degree: <span class="font-weight-lighter ml-2"><?php echo $row['course'];?></span></h6>
                            </div>
                          </div>
                         <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Major: <span class="font-weight-lighter ml-2"><?php echo $row['major'];?></span></h6>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-sm">
                              <h6 class="font-weight-bold">Last School Year Attended: <span class="font-weight-lighter ml-2"> <?php echo $row['last_sy_attended'];?></span></h6>
                            </div>
                          </div>

  <br></div>
                    </div>
                  </div>
                    </div>
                    <div class="modal-footer">

                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
              </div>
            </div>
<?php } ?>