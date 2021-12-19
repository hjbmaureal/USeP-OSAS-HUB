 

 <link rel="stylesheet" type="text/css" href="css/clinic_style.css">
             <div class="modal fade " id="requiredlab<?php echo $prescription_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document" >
                    <div class="modal-content" id="content<?php echo $prescription_id ?>" style="width: 100%;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">&nbsp; PRESCRIPTION </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                     
                      <div class="modal-body" id="prescript">
                      <div class="container" id="container">



                      <div class = "head">  
                        <br>
                        
                        <h6 class="font-weight-bold">Republic of the Philippines</h6> 
                        <h6 class="font-weight-bold" style= "font-family: Old English Text MT; font-size: 20px;">University of Southeastern Philippines</h6>
                        <h6 class="font-weight-bold">Tagum-Mabini Campus</h6> 
                        <h6 class="font-weight-bold">Apokon, Tagum City</h6> 
                        <br>
                      </div>
                        <hr width=”100%″ size="10" style="border: 1px solid #8064a2;">
                        <hr width=”100%″ size="10" style="border: 1px solid #8064a2;">
                       
                       
                        
                        <h6 style="margin-left: 10px;">Name: <span class="font-weight-lighter ml-1"><input type="text" readonly="" value="<?php echo $row['patient_name']; ?>"  style="font-family: Calibri; font-weight: bold; font-size: 17px;text-align:left;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 370px;"></input></h6>
                        <h6 style="margin-left: 10px;">Address:<br>
                            <textarea name="address" 
                              id="address"
                              readonly="" 
                              rows="3" 
                              style=
                                 "font-family: Calibri; 
                                  font-size: 16px;
                                  font-weight: bold;
                                  border-left:none;
                                  border-right: none;
                                  border-top: none;
                                  outline: none;cursor: default;
                                  height: 50px;
                                  width: 430px;
                                  border-width: 2px;
                                  ">
                              <?php echo wordwrap ($row['address'], 65, "\n"); ?>
                            </textarea>
                        </h6>
                        <div class="row" id="asd" style="position: static;">
                          <div class="col-sm-6" id="age">
                                <h6 style="margin-left: 10px;">Age/Sex:
                                  
                                    <input type="text" 
                                    readonly="" 
                                    value="<?php 
                                    echo $row['age']. " / ";
                                    echo $row['sex']; ?>"  
                                    style="
                                      font-family: Calibri; 
                                      font-size: 17px;
                                      font-weight: bold;
                                      text-align:left;
                                      border-left:none;
                                      border-right: none;
                                      border-top: none;
                                      outline: none;
                                      cursor: default;
                                      width: 130px; 
                                      position: sticky;">
                                    </input>
                               
                                </h6>
                          </div>

           
                          <div class="col-sm-6" id="date">
                              <h6>Date: <input type="text" readonly="" value="<?php echo $row['date']; ?>" style="font-family: Calibri; font-weight: bold;text-align: left; font-size: 17px; border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 115px; position: sticky;"></input></h6>
                          </div>
                        </div>
                        <br>
                        <img class="pr" src="image/pr.png" alt="img" width="20%">
                         <br>

                          <h6 class="font-weight-bold" style="margin-left: 5%; font-family: Courier New; font-weight:  bold; font-size: 18px;"><?php echo nl2br($row['prescription_details']);?> </h6> 
                         <br>
                             <br>
                             <br>
                               <div class="col-sm">
                                <div class="form-group">
                                    <div style="text-align: right; margin-right: 12%; ">
                                    <object class="sign" data="data:image/jpeg;base64,<?php echo base64_encode($image_data); ?>" width="100px" height="100px" style="margin-bottom: -200px;position: sticky;" ></div>
                                    <div style="text-align: right; margin-right: -6%; ">
                                      <img id="e_sig" src="image/no_sig.png" alt="E-signature" width="150px" height="30px" style="margin-bottom: -250px;"></div>
                                    </object>
                                  </div>
                                  </div>
                            </div>
                                
                          
                          <div style="display: inline-block; text-align: right; margin-left: 120px; margin-top: 120px;" id="other" >
                            <h6 class="font-weight-bold"><input type="text" readonly="" value="<?php echo " ".$row['professional_honorific']." ".$row['prescribing_doctor_name'].", ".$row['extension']; ?>"  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default; width: 250px;"></h6> </input>

                      <h6 class="font-weight-normal">Lic. No.: <span class="font-weight-lighter ml-2"></span><input type="text" readonly="" value="<?php echo $row['license_number']; ?>"  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 250px;"></input>
                      </h6> 
                      <h6 class="font-weight-normal">PTR No.: <span class="font-weight-lighter ml-2"></span><input type="text" readonly="" value="<?php echo $row['ptr_no']; ?>"  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 250px;"></input>
                      </h6>
                      <h6 class="font-weight-normal">S2.: <span class="font-weight-lighter ml-2"></span><input type="text" readonly="" value="<?php echo $row['s2']; ?>"  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 250px;"></input>
                      </h6>
                      
          

                    </div>


                          <br>
                          <br>
                     
                          </div>   
                        </div>
                    
   
                      <div class="modal-footer">
                      
                        <button type="submit" class="btn btn-success" id="btnPrint<?php echo $prescription_id ?>" name="print">Print</button>
                      
                        
                      </div>

                      <img id="logo" src="image/logo.png"  style="position: absolute;transform: translate(100px, 370px);opacity: .15 " />
                    </div>
                  </div>
                  </div>
                </div>   

<script type="text/javascript">
  document.getElementById('address').innerHTML = document.getElementById('address').innerHTML.trim();
</script>

 <script type="text/javascript">

                    document.getElementById("btnPrint<?php echo $prescription_id ?>").onclick = function () {

                                    printElement(document.getElementById("content<?php echo $prescription_id ?>"));

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

                            left: 2%;

                            top: 1%;


                            
                        }
                        .close{
                          display: none;
                        }

                        .btn{
                          display: none;
                        }
                        #printSection, #container{
                          width: 55%;

                        }
                        .head,hr,.modal-dialog,#requested{
                          width: 47%;
                        }
                        hr{
                          margin-left: 10px !important;
                        }
                        .modal-content{
                          width: 50%;
                        }
                        .pr{
                          width: 10%;
                          height: 10%;
                          
                        }
                        #other{
                          margin-left: 165px!important;
                        }

                        .modal-title, .modal-header, .modal-footer {
                          display: none;
                        }

                        #date {
                          margin-left:-22%;
                        }

                        .sign {
                          margin-right: 52% ;
                        }

                        #e_sig {
                          display: none;
                        }



                       /** footer {page-break-after: left;} */


                    @page {

                    }
                        
                        

                        

                    }

                </style>