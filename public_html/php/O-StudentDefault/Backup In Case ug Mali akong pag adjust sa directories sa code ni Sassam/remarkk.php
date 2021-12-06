<?php 
   include("conn.php");

                              $id = $_POST['id'];
                              $tab = mysqli_query($conn,"SELECT * from remarks_apply where Submitted_by='$id' and status = 0" );

                             

                                         
                              while($res = mysqli_fetch_array($tab)) {
                              echo '
                              <div class="tile" style="border-radius:5px;">
                              <h5 class="modal-title" id="exampleModalLabel">Remark:&emsp;<input type="text" name="by" style="border:none; width:300px;" value="'.$res['file'].'"></h5>
                              <div class="container">
                              
                                  <div class="row">
                                        <div class="form-group col-sm">
                                           <p style="font-weight: bolder;">Comment Details:

                                               <textarea class="form-control" id="exampleTextarea" rows="7" disable="" >'.$res['message'].'</textarea>
                                       </div></p>

                                           <br>              
                                    <div class="tile" >
                                       
                                          <p style="font-weight: bolder;">Attachments:</p>
                                           
                                            <div class="col-sm">
                                              <button class=" btn btn-secondary btn-sm" >
                                              <img src="../M-Admin/Remarks/'.$res['image'].'" style="width:100px;"/></button> 
                                            </div>
                                    </div>

                                   </div>
                                    <div style="top: 20px;">
                                    <p style="font-weight: bolder;">Attach new file</p>
                                       
                                           
                                                   <input class="file-input11" id="file-input11" type="file" name="filee" onchange="ssvalue11()" style="margin-top: -100px; margin-bottom: 30px;" /> 
                                                   <input type="text" name="" id="" value=""  style="border-style: none;background: transparent;" disabled >
                                                                 
                                                         
                                                                 
                                                             

                                             </div>
                                       </div>
                                    </div>
                                     
                                 
                            </div> 
                            </div>
                            ';

         }
      ?>
     <script>
                                        function ssvalue11() {
                                          var val = document.getElementById("file-input11").value.replace("C:\\fakepath\\", "");
                                          document.getElementById("input11").value = val;
                                        }
                                      </script>