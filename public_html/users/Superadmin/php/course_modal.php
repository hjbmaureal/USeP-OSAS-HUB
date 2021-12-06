<div class="modal fade " class="school_org" id="detail<?php echo $res['course_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $res['course_id']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button></div>
      <?php
     include('../../../conn.php');

                                
                      
      $array = array();           
      $uid = $res['course_id'];
      $query = mysqli_query($conn,'SELECT * FROM college where college_id <>"'. $res['college_id'].  '"');

      ?>
      <form method="post" action="php/update_course.php">

        <div class="modal-body p-4">
        <div class="row">         
          <input type="hidden" name="ID" value="<?php echo $uid ?>">
                                <div class="form-group col-sm">
                                  <p>Course Name
                                    <input class="form-control" type="text" name="colname" value="<?php echo $res['name']; ?>">
                                  </p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-sm">
                                  <p>Acronym
                                    <input class="form-control" type="text" name="coltitle" value="<?php echo $res['title']; ?>">
                                  </p>
                                </div>

                              </div>
                              <div class="row">
                                <div class="form-group col-sm">
                                  <p>Course Major
                                    <input class="form-control" type="text" name="colmajor" value="<?php echo $res['major']; ?>">
                                  </p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-sm">
                                  <p>College  
                                    <select class="form-control" id="degree" name="ccol"> 
                                      <option value="<?php echo $res['college_id'] ?>" selected=""><?php echo ' ' .$res['coldesc']. ' (' .$res['coltitle']. ')'; ?></option>
                                      <?php while($row=mysqli_fetch_array($query)){  ?>
                                       <option value="<?php echo $row['college_id'] ?>"><?php echo ' ' .$row['description']. ' (' .$row['title']. ')'; ?></option>
                                      <?php } ?>
                                    </select> </p>
                                  </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-sm">
                                  <p>Type  
                                    <select class="form-control" id="degree" name="ctype"> 
                                      <option value="<?php echo $res["student_type"] ?>" selected=""><?php echo $res["student_type"] ?></option>
                                      <?php 
                                        if ($res["student_type"]=="Graduate") {
                                            echo "<option value ='Undergraduate'>Undergraduate</option>";
                                        }else{
                                            echo "<option value ='Graduate'>Graduate</option>";
                                        }
                                      ?>

                                    </select> </p>
                                  </div>
                                </div>

                              
</div>


       <div class="modal-footer">
         <button class="btnsend btn btn-success" type="submit" name="submit">Update</button>
         <button type="btncancel" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
     </form>
   </div>
 </div>
</div>


