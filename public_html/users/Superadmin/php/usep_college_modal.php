<div class="modal fade " class="school_org" id="details<?php echo $res['college_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $res['college_id']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <?php
      include('../../conn.php');
      $uid = $res['college_id'];
      $query = mysqli_query($conn,"SELECT * FROM college") ;
      while($row=mysqli_fetch_array($query)){
        $colname=$res['title'];
        $coldesc=$res['description'];




      }
      ?>

      <div class="modal-body c">

        <div class="container">

          <h6 class="font-weight-bold">College Name: <span class="font-weight-lighter ml-2"> <?php echo $colname ?></span></h6> 
          <h6 class="font-weight-bold">College Description: <span class="font-weight-lighter ml-2"> <?php echo $coldesc ?></span></h6> 

        </div>
</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

    </div>
  </div>
</div>
</div>