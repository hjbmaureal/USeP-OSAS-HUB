             <div class="modal fade " id="labresult<?php echo $res['request_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">&nbsp; LAB REQUEST SLIP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container" style="border: 2px solid black; border-radius: 10px; padding: 25px;">
                      <div class = "head">  
                        
                        <h6 class="font-weight-bold">Republic of the Philippines</h6> 
                        <h6 class="font-weight-bold" style= "font-family: Old English Text MT;">University of Southeastern Philippines</h6>
                        <h6 class="font-weight-bold">Tagum-Mabini Campus</h6> 
                        <h6 class="font-weight-bold">Apokon, Tagum City</h6> 
                        <br>
                        <hr width=”75%″ size="10">
                        <hr width=”75%″ size="10">
                       
                        <h6 class="font-weight-bold">MEDICAL-DENTAL UNIT</h6> 
                        <h6 class="font-weight-bold" style="color: red;">LABORATORY REQUEST</h6> 
                      </div>
                      <br>
                      <form method="POST" action="verify.php">
                        <input type="" name="id" value="<?php echo $res['request_id']?>" hidden />
                        <h6>Date: <span class="font-weight-bold ml-2" > <?php echo $res['date_requested']; ?></span></h6>
                        <h6>Name: <span class="font-weight-bold ml-2"> <?php echo $res['fullname']; ?></span></h6>

                         <br> 
                         <h6 class="font-weight-bold">Required Lab Test: </h6> 
                         <?php
                        if($res['CBC'] == 1 && !empty($res['cbc_loc'])){
                          echo '<input type="checkbox"checked disabled>
                        <label for="">CBC</label><br>
                        <a href="'.$res['cbc_loc'].'"> View Lab Result</a>
                        <br>



                        ';


                        }else{
                          echo '<input type="checkbox">
                        <label for="">CBC</label><br>';

                        }
                        ?>

                        
                        <?php
                        if($res['PLATELET'] == 1 && !empty($res['platelet_loc'])){
                          echo '<input type="checkbox"checked disabled>
                        <label for="">PLATELET</label><br>
                        <a href="'.$res['platelet_loc'].'"> View Lab Result</a>
                        <br>
                        ';


                        }else{
                          echo '<input type="checkbox">
                        <label for="">PLATELET</label><br>';

                        }
                        ?>
                        <?php
                        if($res['HEMOTOCRIT'] == 1 && !empty($res['hema_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">HEMATOCRIT</label><br>
                        <a href="'.$res['hema_loc'].'"> View Lab result</a>
                        <br>
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">HEMOTOCRIT</label><br>';

                        }
                        ?>
                        <?php
                        if($res['HEMOGLOBIN'] == 1 && !empty($res['hemo_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">HEMOGLOBIN</label><br>
                        <a href="'.$res['hemo_loc'].'"> View Lab Result</a>
                        <br>
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">HEMOGLOBIN</label><br>';

                        }
                        ?>

                        <?php
                        if($res['Urinalysis'] == 1 && !empty($res['urine_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Urinalysis</label><br>
                        <a href="'.$res['urine_loc'].'"> View Lab Result</a>
                        <br>
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Urinalysis</label><br>';

                        }
                        ?>

                        <?php
                        if($res['Fecalysis'] == 1 && !empty($res['fecal_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Fecalysis</label><br>
                        <a href="'.$res['fecal_loc'].'"> View Lab Result</a>
                        <br>
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Fecalysis</label><br>';

                        }
                        ?>

                        <?php
                        if($res['FBS'] == 1 && !empty($res['fbs_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Fasting Blood Sugar (FBS)</label><br>
                        <a href="'.$res['fbs_loc'].'"> View Lab Result</a>
                        <br>';


                        }else{
                          echo '<input type="checkbox">
                        <label for="">Fasting Blood Sugar (FBS)</label><br>';

                        }
                        ?>

                        <?php
                        if($res['sua'] == 1 && !empty($res['sua_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Serum Uric Acid</label><br>
                        <a href="'.$res['sua_loc'].'"> View Lab Result</a>
                        <br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Serum Uric Acid</label><br>';

                        }
                        ?>

                        <?php
                        if($res['Creatinine'] == 1 && !empty($res['creat_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Creatinine</label><br>
                        <a href="'.$res['creat_loc'].'"> View Lab Result</a>
                        <br>
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Creatinine</label><br>';

                        }
                        ?>

                        <?php
                        if($res['Lipid'] == 1 && !empty($res['lipid_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Lipid Profile</label><br>
                        <a href="'.$res['lipid_loc'].'"> View Lab Result</a>
                        <br>
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Lipid Profile</label><br>';

                        }
                        ?>

                        <?php
                        if($res['SGOT'] == 1 && !empty($res['sgot_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">SGOT</label><br>
                        <a href="'.$res['sgot_loc'].'"> View Lab Result</a>
                        <br>
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">SGOT</label><br>';

                        }
                        ?>

                        <?php
                        if($res['SGPT'] == 1 && !empty($res['sgpt_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">SGPT</label><br>
                        <a href="'.$res['sgpt_loc'].'"> View Lab Result</a>
                        <br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">SGPT</label><br>';

                        }
                        ?>

                        <?php
                        if($res['blood_test'] == 1 && !empty($res['blood_test_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Blood Test</label><br>
                        <a href="'.$res['blood_test_loc'].'"> View Lab Result</a>
                        <br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Blood Test</label><br>';

                        }
                        ?>

                        <?php
                        if($res['chest_xray'] == 1 && !empty($res['chest_xray_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Chest X-ray</label><br>
                        <a href="'.$res['chest_xray_loc'].'"> View Lab Result</a>
                        <br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Chest X-ray</label><br>';

                        }
                        ?>

                        <?php
                        if($res['drug_test'] == 1 && !empty($res['drug_test_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Drug Test</label><br>
                        <a href="'.$res['drug_test_loc'].'"> View Lab Result</a>
                        <br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Drug Test</label><br>';

                        }
                        ?>

                        <?php
                        if($res['psychological_test'] == 1 && !empty($res['psychological_test_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Psychological Test </label><br>
                        <a href="'.$res['psychological_test_loc'].'"> View Lab Result</a>
                        <br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Psychological Test</label><br>';

                        }
                        ?>

                        <?php
                        if($res['NPE'] == 1 && !empty($res['NPE_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Neuro-Psychiatric Examination (if applicable)</label><br>
                        <a href="'.$res['NPE_loc'].'"> View Lab Result</a>
                        <br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Neuro-Psychiatric Examination (if applicable)</label><br>';

                        }
                        ?>

                        <?php
                        if($res['others'] == 1 && !empty($res['others_loc'])){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Others</label><br>
                        <textarea placeholder="'.$res['other_text'].'" id="other_text" name="other_text" style="width: 100%; height: auto " disabled></textarea>
                        <a href="'.$res['others_loc'].'"> View Lab Result</a>
                        <br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">SGPT</label><br>';

                        }
                        ?>

                        
                          <br>
                          <br>
                          <h6 class="font-weight-bold" style="text-align: center;margin-left:60%">Requested by: <input type="text" readonly="" value="<?php echo $res['requested_by']; ?>"  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default; height: 35px; width:auto;"></h6> 
                          <br>
                           
                          </div>   
                        </div>
                    
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success"  name="submit" >Verify</button>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>   