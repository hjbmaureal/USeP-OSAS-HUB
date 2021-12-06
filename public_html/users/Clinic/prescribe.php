
 
 <div class="modal fade " id="PrescribeModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">Patient ID: &nbsp;<?php echo htmlentities($row['patient_id']);?></h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #FFFFFF" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                    <div class="modal-body c">
                        


                        <div class="container" style="border: 1px solid black; margin-top: 10px; padding: 20px; border-radius: 10px;">
                             
                        <form action="save.php" method="post">   
                         <br>
                         <br>
                         <input name="patient_id" value="<?php echo htmlentities($row['patient_id']);?>" hidden>
  
           <form method="post" action="register.php" enctype='multipart/form-data' id="submit-form">
      
                  
   <p style="text-align: -webkit-auto;">
              <span style="color: rgb(60, 58, 64); font-family: 'Palatino Linotype', serif; line-height: 19px; font-size: 18px;">
            &nbsp;<span lang="EN-GB" style="line-height: 107%;">
              How many types of medicine do you want to prescribe?
               <select style='width:18%;' class="open-11" id="medscount2"  >
                                               <option value="0">0</option>
                                                 <option value="1">1</option>
                                               <option value="2">2</option>
                                               <option value="3">3</option>
                                               <option value="4">4</option>
                                               <option value="5">5</option>
                                               <option value="6">6</option>
                                               <option value="7">7</option>
                                               <option value="8">8</option>
                                               <option value="9">9</option>
                                               <option class="10">10</option>
                                               
                                                                              
                    </select>
        </span></span>
       
                     
             
             
                    </p> 
             <p style="text-align: -webkit-auto;">
              
              <span style="font-size: 18px;">
                <span style="color: rgb(60, 58, 64);">
              &nbsp; &nbsp; &nbsp; &nbsp; 
              
              <span lang="EN-GB" style="line-height: 19px; font-family: 'Palatino Linotype', serif;">&nbsp;&nbsp;
                
                
                    
                    <span class="meds2"></span>
                    
                     </span>
                     </span></span></p>
                     <p style="text-align: -webkit-auto;">
              <span style="color: rgb(60, 58, 64); font-family: 'Palatino Linotype', serif; line-height: 19px; font-size: 18px;">
            &nbsp;<span lang="EN-GB" style="line-height: 107%;">Do you want to add prescription comment?
        </span></span>
       
                     
             
             <label class="art-checkbox">                 
                      <input type="checkbox" name="" class="open-yes4">
                      <span style="font-size: 18px;">Yes</span> &nbsp; &nbsp;
                      </label>
                 <label class="art-checkbox">
                  <input type="checkbox" name="" class="open-no4">
                 <span style="font-size: 18px;">No</span> &nbsp; &nbsp; </label>
             
             </span></p>           
             
             <p style="text-align: -webkit-auto;">
              
              <span style="font-size: 18px;">
                <span style="color: rgb(60, 58, 64);">
              &nbsp; &nbsp; &nbsp; &nbsp; 
              
              <span lang="EN-GB" style="line-height: 19px; font-family: 'Palatino Linotype', serif;">&nbsp;&nbsp;
                    <span class="historyinstruction4"></span>
                     </span>
                     </span></span></p>
         
         
         <p style="text-align: -webkit-auto;">
          
          
          
          <span style="color: rgb(60, 58, 64); font-family: 'Palatino Linotype', serif; font-size: 18px; line-height: 16px;">
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
            <span class="schoolbackground4"></span>
             </span>
             </p>
                    
       <input type="hidden"  id='mypatientid22' name='mypatientid22'/>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Submit" value="addmembe" name="sendadmissions">
          &nbsp;<button type="button" class="btn btn-danger" data-dismiss="modal" value='Close' ><i class="fa fa-close"></i></button>
        
      </div>


                   
                      
                          
                           <div class="form-row">
                                      <div class="form-group col-md-12">
                                          
                        <br>

                               <h6 class="font-weight-bold">Prescription: </h6> 
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                      <textarea id="preslist" class="preslist" required="required" name="preslist" rows="6" placeholder="&nbsp;Type your Prescription here" style="width: 100%; border-radius: 5px;"></textarea>
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
        
        
<script type="text/javascript">
function getDay(val) {
  type: "POST",
  url: "getDay.php",
  data:'date='+val,
  success: function(data){
    $("#datestatus").html(data);
  }
  };


 $(document).on("click", ".open-11", function () { //user clicks on button
                                    
        var medsnumber = document.getElementById("medscount2").value;
      
                    $(".meds").html("");
                    $.ajax({
        type : 'POST',
        url : "rec_meds.php",
        data : {
          medstypes2 : medsnumber
        },
        success : function(result) {
                   
                   $(".meds2").html(result);
        }
      });

    
          });
</script>

