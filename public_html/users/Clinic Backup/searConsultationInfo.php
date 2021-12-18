<?php 
include('conn.php');
if (isset($_POST['id'])) {
$id=$_POST['id']; 
$sql="SELECT name,patient_id, problems, consultation_type.type_id, consultation_type.consultation_type FROM `consultation_details` JOIN consultation_type on consultation_details.consultation_type=consultation_type.type_id WHERE consultation_id='$id'";
  $result = mysqli_query($conn, $sql);
  $count=mysqli_num_rows($result);
  if ($count) { while ($row = mysqli_fetch_assoc($result)){ 
    // code...
  ?>      
              
                             <h6 class="font-weight-bold">Consultation Type: </h6> 
                             <input type="text" name="type" id="type" style="height: 35px; width: 300px;" value="<?php echo $row['consultation_type'];?>"disabled></input>
                             <input type="text" name="patientID" id="patientID" value="<?php echo $row['patient_id'];?>" hidden>
                             <br><br>
                              <h6 class="font-weight-bold">Problem:</h6>    
                              <textarea id="cc" 
                                name="cc" 
                                rows="4" 
                                disabled="" 
                                style="width: 425px;">
                                <?php echo $row['problems'];?>
                              </textarea> <br>
  <?php }}else{ ?>
              
                <h6 class="font-weight-bold">Consultation Type: </h6> 
                              <input type="text" name="type" id="type" value="SORRY! NO RECORD FOUND!" disabled=""/>
                              <input type="text" name="patientID" id="patientID" hidden>
                  <h6 class="font-weight-bold">Problem:</h6>    
                              <input type="text" class="form-group" id="cc" name="cc" value="SORRY! NO RECORD FOUND!" disabled="" /><br>


  <?php }?>


   
<?php }
?>

<script type="text/javascript">
  document.getElementById('cc').innerHTML = document.getElementById('cc').innerHTML.trim();
</script>