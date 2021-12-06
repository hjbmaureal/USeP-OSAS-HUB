<div class="modal fade " class="school_org" id="detail<?php echo $res['college_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $res['college_id']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <?php
      $uid = $res['college_id'];

      ?>
      <form method="post" action="php/update_college.php">
        <div class="modal-body c">

          <div class="container">

            <h6 class="font-weight-bold">College Name:</h6> 

            <input class="form-control" type="text" name="title" value="<?php echo $res['title']; ?>">
            <br>

            <h6 class="font-weight-bold">College Description:</h6> 
            <input class="form-control" type="text" name="description" value="<?php echo $res['description']; ?>">
            <input type="hidden" name="ID" value="<?php echo $uid ?>">
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


