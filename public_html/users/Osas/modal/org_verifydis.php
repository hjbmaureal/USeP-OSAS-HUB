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
                  
                                <div class="container">
                                  <h6>Coordinator Password:</h6>
                                  <input class="form-control" type="password" id="pass" name="pass" placeholder="Input your password" required>  
                    

                                  <input type="hidden" name="coor_id" value="'.$coor_id.'">
                                  <input type="hidden" name="eid" value="'.$id.'">
                                 
                                  
                                  </div>

                                </div>

                    
                    
                  
                ';

?>