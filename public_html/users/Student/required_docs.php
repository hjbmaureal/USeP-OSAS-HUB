             <div class="modal fade " id="requiredlab<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" id="content<?php echo $id ?>">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">&nbsp; LAB REQUEST SLIP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c" id="printThis">
                      <div class="container" id="container">
                      <div class = "head">  
                        
                        <h6 class="font-weight-bold">Republic of the Philippines</h6> 
                        <h6 class="font-weight-bold" style= "font-family: Old English Text MT;">University of Southeastern Philippines</h6>
                        <h6 class="font-weight-bold">Tagum-Mabini Campus</h6> 
                        <h6 class="font-weight-bold">Apokon, Tagum City</h6> 
                        <br>
                        <hr width=”75%″ size="10">
                        <hr width=”75%″ size="10">
                       
                        <h6 class="font-weight-bold">MEDICAL-DENTAL UNIT</h6> 
                        <h6 class="font-weight-bold">LABORATORY REQUEST</h6> 
                      </div>
                      <br>
                        <h6>Date: <span class="font-weight-lighter ml-2"> 2021-07-19</span></h6>
                        <h6>Name: <span class="font-weight-lighter ml-2"> <?php echo $res['fullname']; ?></span></h6>

                         <br> 
                         <h6 class="font-weight-bold">Required Lab Test: </h6> 
                         <?php
                        if($res['CBC'] == 1){
                          echo '<input type="checkbox"checked disabled>
                        <label for="">CBC</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">CBC</label><br>';

                        }
                        ?>

                        
                        <?php
                        if($res['PLATELET'] == 1){
                          echo '<input type="checkbox"checked disabled>
                        <label for="">PLATELET</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">PLATELET</label><br>';

                        }
                        ?>
                        <?php
                        if($res['HEMOTOCRIT'] == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">HEMATOCRIT</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">HEMOTOCRIT</label><br>';

                        }
                        ?>
                        <?php
                        if($res['HEMOGLOBIN'] == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">HEMOGLOBIN</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">HEMOGLOBIN</label><br>';

                        }
                        ?>

                        <?php
                        if($res['Urinalysis'] == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Urinalysis</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Urinalysis</label><br>';

                        }
                        ?>

                        <?php
                        if($res['Fecalysis'] == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Fecalysis</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Fecalysis</label><br>';

                        }
                        ?>

                        <?php
                        if($res['FBS'] == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Fasting Blood Sugar (FBS)</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Fasting Blood Sugar (FBS)</label><br>';

                        }
                        ?>

                        <?php
                        if($res['sua'] == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Serum Uric Acid</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Serum Uric Acid</label><br>';

                        }
                        ?>

                        <?php
                        if($res['Creatinine'] == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Creatinine</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Creatinine</label><br>';

                        }
                        ?>

                        <?php
                        if($res['Lipid'] == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Lipid Profile</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Lipid Profile</label><br>';

                        }
                        ?>

                        <?php
                        if($res['SGOT'] == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">SGOT</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">SGOT</label><br>';

                        }
                        ?>

                        <?php
                        if($res['SGPT'] == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">SGPT</label><br>';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">SGPT</label><br>';

                        }
                        ?>

                        <?php
                        if($res['others'] == 1){
                          echo '<input type="checkbox" checked disabled>
                        <label for="">Others</label><br>
                        <textarea placeholder="'.$res['other_text'].'" id="other_text" name="other_text" style="width: 100%; height: auto " disabled></textarea>

                        ';

                        }else{
                          echo '<input type="checkbox">
                        <label for="">Others</label><br>';

                        }
                        ?>

                        
                          <br>
                          <br>
                          <div id="requested">
                          <h6 class="font-weight-bold" style="text-align: center;margin-left:60%">Requested by: <input type="text" readonly="" value="Sir Jet"  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;background-color: #F5F5F5;cursor: default;"></h6> 
                        </div>
                          <br>
                           
                          </div>   
                        </div>
                    
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btnPrint<?php echo $id ?>">Print</button>
                      </div>
                      <img src="image/logo.png"  style="position: absolute;transform: translate(100px, 350px);opacity: .10 " />
                    </div>

                  </div>
                </div>   
                
                 <script type="text/javascript">

                    document.getElementById("btnPrint<?php echo $id ?>").onclick = function () {

                                    printElement(document.getElementById("content<?php echo $id ?>"));

                                };

                                function printElement(elem) {

                                    var domClone = elem.cloneNode(true);

                                    

                                    var $printSection = document.getElementById("printSection");

                                    

                                    if (!$printSection) {

                                        var $printSection = document.createElement("div");

                                        $printSection.id = "printSection";

                                        document.body.appendChild($printSection);

                                    }

                                    

                                    $printSection.innerHTML = "";

                                    $printSection.appendChild(domClone);

                                    window.print();

                                }

                </script>

                <style>
                   @media screen {

                        #printSection {

                            display: none;

                        }

                    }

                    @media print {

                        body * {

                            visibility: hidden;

                        }

                        #printSection,

                        #printSection *,#container {

                            visibility: visible;
                            max-height: 100%;
                            

                        }

                        #printSection {

                            position: absolute;

                            left: 0;

                            top: 0;


                            
                        }
                        .close{
                          display: none;
                        }
                        #container{
                          
                        }
                        .btn{
                          display: none;
                        }
                        #printSection, #container{

                        }
                        .head,hr,.modal-dialog,#requested{
                          width: 47%;
                        }
                        .modal-content{
                          width: 51%;
                        }


                        
                        

                        

                    }

                </style>