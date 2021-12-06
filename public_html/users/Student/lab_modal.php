<div class="modal fade " id="SubmitLabModal<?php echo $res['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="RequestModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">&nbsp;SUBMIT LAB RESULT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c">
                        <div class="container" style="border: 2px solid black; border-radius: 10px; padding: 25px; background-color: #F5F5F5">
                      <div class = "head">  
                        
                        <h6 class="font-weight-bold">Republic of the Philippines</h6> 
                        <h6 class="font-weight-bold" style= "font-family: Old English Text MT;">University of Southeastern Philippines</h6>
                        <h6 class="font-weight-bold">Tagum-Mabini Campus</h6> 
                        <h6 class="font-weight-bold">Apokon, Tagum City</h6> 
                        <br>
                        <hr width=”75%″ size="10">
                        <hr width=”75%″ size="10">
                      </div>
                      <form method="POST" action="student_submit_lab.php" enctype="multipart/form-data"> 
                      <input type="text" name="id" value="<?php echo $id ?>"hidden ></input>
                        <h6 class="font-weight-bold">Date: <input type="text" name="date" readonly="" value="<?php echo(date('Y/m/d'))?>"  style="border:none;outline: none;background-color: #F5F5F5;cursor: default;"></input></h6> 
                        <br>
                        <h6 class="font-weight-bold">Please submit the following:</h6> 
                        <?php
                        if($cbc == 1){
                          echo '<input type="checkbox"checked disabled>
                        <label for="">CBC</label><br>
                        <input class="form-control" style="height: 50%;" type="file" name="cbc" required />
                        ';


                        }else{
                          echo '<input type="checkbox" disabled>
                        <label for="">CBC</label><br>';

                        }
                        ?>

                        
                        <?php
                        if($plate == 1){
                          echo '<input type="checkbox"checked disabled>
                        <label for="">PLATELET</label><br>
                        <input class="form-control" style="height: 50%;" type="file" name="plate" required/>
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">PLATELET</label><br>';

                        }
                        ?>
                        <?php
                        if($hema == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">HEMATOCRIT</label><br>
                        <input class="form-control" style="height: 50%;" type="file" name="hema" required />
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">HEMOTOCRIT</label><br>';

                        }
                        ?>
                        <?php
                        if($hemo == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">HEMOGLOBIN</label><br>
                        <input class="form-control" style="height: 50%;" type="file" name="hemo" required />   

                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">HEMOGLOBIN</label><br>';

                        }
                        ?>

                        <?php
                        if($urine == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Urinalysis</label><br>
                        <input class="form-control" style="height: 50%;" type="file" name="urine" required />   

                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Urinalysis</label><br>';

                        }
                        ?>

                        <?php
                        if($fecal == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Fecalysis</label><br>
                        <input class="form-control" style="height: 50%;" type="file" name="fecal" required />
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Fecalysis</label><br>';

                        }
                        ?>

                        <?php
                        if($fbs == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Fasting Blood Sugar (FBS)</label><br>
                        <input class="form-control" style="height: 50%;" type="file" name="fbs" required />
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Fasting Blood Sugar (FBS)</label><br>';

                        }
                        ?>

                        <?php
                        if($sua == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Serum Uric Acid</label><br>

                        <input class="form-control" style="height: 50%;" type="file" name="sua"  required/>   
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Serum Uric Acid</label><br>';

                        }
                        ?>

                        <?php
                        if($creat == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Creatinine</label><br>
                        <input class="form-control" style="height: 50%;" type="file" name="creat" required/>
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Creatinine</label><br>';

                        }
                        ?>

                        <?php
                        if($lip == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Lipid Profile</label><br>
                        <input class="form-control" style="height: 50%;" type="file" name="lip" required />   ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Lipid Profile</label><br>';

                        }
                        ?>

                        <?php
                        if($sgot == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">SGOT</label><br>
                        <input class="form-control" style="height: 50%;" type="file" name="sgot" required />
                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">SGOT</label><br>';

                        }
                        ?>

                        <?php
                        if($sgpt == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">SGPT</label><br>
                        <input class="form-control" style="height: 50%;" type="file" name="sgpt" required/>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">SGPT</label><br>';

                        }
                        ?> 

                        <?php
                        if($others == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Others</label><br>
                        <textarea placeholder="'.$other_text.'" id="other_text" name="other_text" style="width: 100%; height: auto " disabled></textarea>
                        <input class="form-control" style="height: 50%;" type="file" name="others" required />

                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Others</label><br>';

                        }
                        ?>

                        <br>      
                        <br>

                        </div>
                 
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-success" >Submit</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div> 