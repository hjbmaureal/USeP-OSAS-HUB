 

 <link rel="stylesheet" type="text/css" href="css/clinic_style.css">
             <div class="modal fade " id="requiredlab<?php echo $consult_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document" >
                    <div class="modal-content" id="content<?php echo $consult_id ?>" style="width: 100%;">
                      <div class="modal-header" style="background-color: #2B4550">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FFFFFF">&nbsp; PRESCRIPTION </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                     
                      <div class="modal-body" id="prescript">
                      <div class="container" id="container">


                      <div class = "head">  
                        
                        
                        <h6 class="font-weight-bold">Republic of the Philippines</h6> 
                        <h6 class="font-weight-bold" style= "font-family: Old English Text MT;">University of Southeastern Philippines</h6>
                        <h6 class="font-weight-bold">Tagum-Mabini Campus</h6> 
                        <h6 class="font-weight-bold">Apokon, Tagum City</h6> 
                        <br>
                      </div>
                        <hr width=”50%″ size="10">
                        <hr width=”50%″ size="10">
                       
                        
                        <h6>Name: <span class="font-weight-lighter ml-1"><input type="text" readonly="" value="<?php echo $row['name']; ?>"  style="font-family: Courier New; font-weight:  bold;text-align:left;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 380px;"></input></h6>
                        <h6>Address: <span class="font-weight-lighter ml-1"><input type="text" readonly="" value="<?php echo $row['address']; ?>"  style="font-family: Courier New;font-weight:  bold;text-align: left;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 370px;"></input></span></h6>
                        <div class="row">
                          <div class="col-lg-4">
                                <h6>Age: <span class="font-weight-lighter ml-1"><input type="text" readonly="" value="<?php echo $row['age']; ?> "  style="font-family: Courier New; font-weight:  bold;text-align: left;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 80px; position: absolute;"></input></span></h6>
                          </div>

                          <div class="col-lg-4">
                              <h6>Sex: <span class="font-weight-lighter ml-1"><input type="text" readonly="" value="<?php echo $row['sex']; ?>"  style="font-family: Courier New;font-weight:  bold;text-align: left;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 80px; position: absolute;"></input></span></h6>
                          </div>
                       
                          <div class="col-lg-4">
                              <h6>Date: <span class="font-weight-lighter ml-1"><input type="text" readonly="" value="<?php echo $row['prescription_date_issued']; ?>" style="font-family: Courier New; font-weight: bold;text-align: left; border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 80px; position: absolute;"></input></span></h6>
                          </div>
                        </div>

                        <img class="pr" src="image/pr.png" alt="img" width="20%">
                         <br>
                  
                       
                          <h6 class="font-weight-bold" style="margin-left: 5%; font-family: Courier New; font-weight:  bold; font-size: 16px;"><?php echo nl2br ($row['prescription_details']);?> </h6> 
                          
                          <div style="display: inline-block; text-align: right; margin-left: 120px; margin-top: 120px;" id="other" >
                            <h6 class="font-weight-bold"><input type="text" readonly="" value="CHRYSTELLER O. CLET, MD. FPAFP"  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default; width: 250px;"></h6> <br></input>

                      <h6 class="font-weight-normal">Lic. No.<span class="font-weight-lighter ml-2"></span><input type="text" readonly="" value=""  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 250px;"></input>
                      </h6> 
                      <h6 class="font-weight-normal">PTR No. <span class="font-weight-lighter ml-2"></span><input type="text" readonly="" value=""  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 250px;"></input>
                      </h6>
                      <h6 class="font-weight-normal">S2. <span class="font-weight-lighter ml-2"></span><input type="text" readonly="" value=""  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 250px;"></input>
                      </h6>
                      
          

                    </div>


                          <br>
                          <br>
                     
                          </div>   
                        </div>
                    
   
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-success" id="btnPrint<?php echo $consult_id ?>">Print</button>
                      </div>
                      <img id="logo" src="image/logo.png"  style="position: absolute;transform: translate(100px, 350px);opacity: .15 " />
                    </div>
                  </div>
                  </div>
                </div>   

 <script type="text/javascript">

                    document.getElementById("btnPrint<?php echo $consult_id ?>").onclick = function () {

                                    printElement(document.getElementById("content<?php echo $consult_id ?>"));

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

                        .btn{
                          display: none;
                        }
                        #printSection, #container{
                          width: 50%;

                        }
                        .head,hr,.modal-dialog,#requested{
                          width: 47%;
                        }
                        hr{
                          margin-left: 10px !important;
                        }
                        .modal-content{
                          width: 51%;
                        }
                        .pr{
                          width: 10%;
                          height: 10%;
                          
                        }
                        #other{
                          margin-left: 165px!important;
                        }

                       /** footer {page-break-after: left;} */


                    @page {

                    }
                        
                        

                        

                    }

                </style>