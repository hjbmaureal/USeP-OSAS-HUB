
<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
<div class="modal fade " id="exampleModalLong1<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h6 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF"><?php echo htmlentities($row['consultation_type']);?></h6>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      
                      <div class="modal-body c">
                        
                        <div class="container" style="border: 1px solid black; margin-top: 10px; padding: 20px; border-radius: 10px;">
                              <div class="id-picture"><img src="image/female_user.png" style="max-width: 100%;">
                              
                              <a href="user-profiles.php?ID_Number=<?php echo $row["patient_id"]; ?>"><button class="btn btn-danger btn-sm" style="width: 100%; margin-top: 5px; font-size: 10px;"><i class="fas fa-exclamation-triangle"></i> View Medical Info/History
                              </button></a></div>

                              <h5 class="font-weight-bold" style="margin-bottom: 20px; margin-top: 10px;">Patient Basic Information</h5> 
                              <h6 class="font-weight-bold">ID Number: <span class="font-weight-lighter ml-6"> <?php echo htmlentities($row['patient_id']);?></span></h6> 
                              <h6 class="font-weight-bold">Name: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['name']);?></span></h6> 
                              <h6 class="font-weight-bold">Civil Status: <span class="font-weight-lighter ml-6">  <?php echo htmlentities($row['civil_status']);?></span></h6> 
                              <h6 class="font-weight-bold">Sex: <span class="font-weight-lighter ml-2"><?php echo htmlentities($row['sex']);?></span></h6>
                              <h6 class="font-weight-bold">Course/Department: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['section']);?></span></h6>
                              <h6  class="font-weight-bold">Year level: <span class="font-weight-lighter ml-2"> <?php echo htmlentities($row['year_level']);?></span></h6>
<form method="post">                            
                         <br>
                         <br>
                          
              
                       
          

                         <br><br>

                         <h6 class="font-weight-bold">Diagnosis: </h6> 
                            <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" name="diagnosis" rows="4" placeholder="Type diagnosis here..." required="required" ></textarea>
                                      </div>
                          </div>
                         
                          <h6 class="font-weight-bold">Treatment: </h6> 
                            <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" name="treatment" rows="3" placeholder="Type treatment here..." required="required" ></textarea>
                                      </div>
                            </div>
                      
                          <h6 class="font-weight-bold">Remarks: </h6> 
                           <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" name="remarks" rows="3" placeholder="Type your remarks here..." required="required" ></textarea>
                        <br><br>


                                <h6 class="font-weight-bold">Prescription: </h6> 
                               <div class=""> 

                                          <b>Select Medication:</b>
                                            <select  name="art_fotoselect" id="art_fotoselect" class="form-control" style="height: 35px;width: 250px" data-table="reports-list">
                                          
                                                 <?php
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from item_list");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['item_name']);?>"><?php echo htmlentities($result['item_name']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                                                  </select> 

                                      &ensp;&ensp;&ensp;&ensp;

                                      <h6 class="font-weight-bold">Quantity: </h6>  
                                          <input  type="number" name="quan" id="quan" class="form-control" ></input>
                                           <div>
                                            <button type="button" name="Add" id="Add" class="btn btn-success">Add</button></div>

                                       &ensp;&ensp;&ensp;&ensp;

                                      <h6 class="font-weight-bold">Prescriptions: </h6> 
                                      <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" name="art_testo" id="i251x" rows="4" placeholder="If no prescription provided just put N/A..."></textarea>
                                        
                                        &ensp;&ensp;&ensp;&ensp;


                                      <h6 class="font-weight-bold">Dose & Interval: </h6> 
                                      <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <textarea class="form-control rounded-10" name="guide" id="guide" rows="4" placeholder="If no Dose & Interval provided just put N/A..."></textarea>
                                     </div> 

                                     &ensp;
                                     <b>Recommend Doctor:</b>
                                     &ensp;&ensp;
                                            <select  name="doctor" id="doctor" class="form-control" style="height: 35px;width: 250px" data-table="reports-list">

                                          
                                                 <?php
                                                 $Doctor="Doctor";
                                                  // Feching active mode of communication
                                                  $sql=mysqli_query($db,"select * from staffdetails where position='$Doctor'");
                                                  while($result=mysqli_fetch_array($sql))
                                                  {    
                                                  ?>
                                                  <option class="select-item" value="<?php echo htmlentities($result['fullname']);?>"><?php echo htmlentities($result['fullname']);?></option>
                                                  <?php }
                                                  
                                                  ?>
                                                  </select>
                              <div class="form-row">
                                      </div>
                                      <input type="hidden" name="Status" value="Completed"></input>
                          </div>   
                        </div>
                          </div><input class="form-check-input" type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">
                      </div>
                  
                      <div class="modal-footer">
                        <button type="submit" name="Submit" class="btn btn-success" >Save</button>
                      </div></form>
                    </div>
                  </div>
                </div>

<?php


  if(isset($_POST['Submit'])){   
    $id = $_POST['id'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];
    $remarks = $_POST['remarks'];
    $pressum = $_POST['art_testo'];
    $guide = $_POST['guide'];
    $status = "Completed";
    $doctor = $_POST['doctor'];
    // checker
    if(empty($diagnosis)|| empty($treatment)|| empty($remarks)) { 

        
        if(empty($diagnosis)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }  
        if(empty($treatment)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($remarks)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        
        //insert syntax
        $result ="UPDATE consultation 
                  SET diagnosis='$diagnosis',status='$status', treatment='$treatment', remarks='$remarks',prescription_details='$pressum',dose_interval='$guide',recommended_doctor='$doctor',prescription_date_issued=now()
                  WHERE id ='$id'";
          if ($db->query($result) === TRUE) {
       
          echo '<script>
                swal({
                title: "Added successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:2000,
                closeOnClickOutside: false,
                closeOnEsc: false,
                }).then(function() {
              window.location = "Admin-ListOfConsultation.php";
            })
     </script>';
         
    
    }else{

    echo '<script>
        swal({
        title: "Something went wrong...",
        text: "Server Request Failed!",
        type:"error",
        icon: "error",
        button: false,
        timer:2000,
        closeOnClickOutside: false,
        closeOnEsc: false,
        })
       </script>';

}
}
}
?>

 
        
<script>
function getDay(val) {
  type: "POST",
  url: "getDay.php",
  data:'date='+val,
  success: function(data){
    $("#datestatus").html(data);
  }
  });
}

</script>
<script>


Art_AddFotoz = (e) => {
    var b = "Quantity = ";
    document.querySelector('#i251x').value += document.querySelector('#art_fotoselect').value+"\r\n";
    document.querySelector('#i251x').value += b+document.querySelector('#quan').value+"\r\n";
    }

    document.querySelector("#Add").addEventListener('click',()=>{
    Art_AddFotoz(this)


    })

</script>

