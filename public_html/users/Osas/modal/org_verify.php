<?php
                include("../conn.php");
                session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'OSAS'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
                              
$btn = $_POST['btn'];
                              $coor_id=$_SESSION['id'];
                              $id = $_POST['id'];
                              $sqlselect=mysqli_query($conn,"SELECT * FROM org_applications where ID='$id'");            
                              $prorow = mysqli_fetch_array($sqlselect);



                              echo '
                  
                    <div class="modal-header">

                      <h3 class="modal-title" id="exampleModalLongTitle"></h3>

                          <h5 class="modal-title" id="exampleModalLongTitle">Verify password</h5>
                          
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button></div>
                              <div class="modal-body c">
                                <div class="container">
                                  <h6>Coordinator Password:</h6>
                                  <input class="form-control" type="password" id="pass" name="pass" placeholder="Input your password" required>  
                    

                                  <input type="hidden" name="eid" value="'.$id.'">
                                  <input type="hidden" name="coor_id" value="'.$coor_id.'">
                                 
                                  
                                 
                                </div>

                              </div>
                    
                    
                  
                ';

?>