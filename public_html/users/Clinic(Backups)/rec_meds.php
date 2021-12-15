<?php 
include("conn.php");
$user_id = '11111';
if(isset($_POST['medstypes2'])) { 
    $id = $_POST['id'];
    
    $sql = mysqli_query($conn, "SELECT * from request_list where request_id = $id");
    while($res = mysqli_fetch_array($sql)) { 
    $name = $res['fullname'];
    $course = $res['course_department'];
    $purpose = $res['purpose'];
    $patient_id = $res['patient_id'];

    }

        if(isset($_POST['medstypes2'])){
              $medscount=$_POST['medstypes2'];
                    $x=1;$xx=20;$xxx=40;$xxxx=60;$xxxxx=80;$xxxxxx=100;
                                
                            while ($x <=$medscount) {                                     
                                              
              $qu = "SELECT * FROM tbl_drugs ";
                            $resul =mysqli_query($db,$qu) or die('Error, query failed');
                            if( mysqli_num_rows($resul) != 0)                         
                                                          {
                                                                  
                                  echo"<table><tr>
                                                                     <td>
                                    <div class='input-group' style='margin-bottom:10px;' >
                                                                      <span class='input-group-addon'>Medicine</span>
                                                                       <select style='height:35px' name='$x' id='drugname'  >
                                                              ";
                                                                while($found = mysqli_fetch_array($resul))
                                                             {
                                                                      $Mname = $found['Name'];
                                    $strength = $found['Strength'];
                                    $meds = $found['Medstype'];
                                    
                                                            echo"<option value='$Mname'>$Mname ($strength) $meds </option>";                  
                                                               
                                 } 
                                 echo" </select> </div></td>
                                 <td>
                                 <div class='input-group' style='margin-bottom:10px;' >
                                                                      <span class='input-group-addon'>Quantity</span>
                                                                      <input type='number' name='$xx' value='' style='width:100px;height:35px'>
                                                                     </div></td>
                                                                    <td>
                                 <div class='input-group' style='margin-bottom:10px;' >
                                                                      <span class='input-group-addon'>Times a day</span>
                                                                       <select style='height:35px' name='$xxx'   >
                                                              
                                                        <option>OD</option>
                                                        <option>BD</option>
                                                        <option>TDS</option>
                                                        <option>QDS</option>
                                                        <option>TDD</option>
                                                        <option>STAT</option>
                                                        <option>OTHER</option>
                                                        </select>  
                                                      </div></td>
                                                                     
                                 <td>
                                 
                                                                     <td>                               
                                                                      <input type='hidden' name='repeatimes' value='$medscount' style='width:50px;height:35px'>
                                                                     </td></tr></table>";
                              }
                                              
                                                  
                             $x=$x+1;$xx=$xx+1;$xxx=$xxx+1;$xxxx=$xxxx+1;$xxxxx=$xxxxx+1;$xxxxxx=$xxxxxx+1;
                           }
                
 }
