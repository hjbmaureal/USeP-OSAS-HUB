<div class="modal fade " class="school_org" id="dept-detail-update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     <form id="dept-detail-update-form">
        <div class="modal-body c">

          <div class="container">

            <h6 class="font-weight-bold"><h6>College Name</h6>
              <select type="text" name="d_name" id="d_name" class="form-control" required>
              <option style="color:white" selected></option> 
              <?php
                  $result1=mysqli_query($conn, "SELECT * FROM college");               
                  while($resu = mysqli_fetch_array($result1)) { 
                      $value1= $resu['college_id']; ?>
                      <option class="select-item" value="<?php echo $value1; ?>"><?php echo $resu['description'];?></option>
                <?php } ?>
              </select>
            <h6 class="font-weight-bold">Department Name:</h6> 

            <input class="form-control" type="text" name="deptname" >
            <br>
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


