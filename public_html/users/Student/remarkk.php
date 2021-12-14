<?php 
                        include("conn.php");

                              $id = $_POST['id'];
                              $tab = mysqli_query($conn,"SELECT * from remarks_apply where status=0 and ID ='$id' " );             
                              $res = mysqli_fetch_array($tab);
                                ?>
                              
                              <div class="modal-header" style="margin-bottom: 10px; padding: 0px;">
                                 <h5 class="modal-title" id="exampleModalLabel"><b> <?php echo $res['org_name']; ?> </b></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="tile" style="border-radius:5px; margin-bottom: 0px;">
                                  <h5 class="modal-title" id="exampleModalLabel">Remark:&emsp;<input type="text" name="by" style="border:none; width:300px;" value=" <?php echo $res['file'];?>"></h5>
                                  <div class="container">
                              
                                      <div class="row">
                                        <div class="form-group col-md-9">
                                           <p style="font-weight: bolder;">Comment Details:

                                               <textarea class="form-control" id="exampleTextarea" rows="7" disable="" > <?php echo $res['message']; ?></textarea>
                                               </p>
                                       </div>
                                      <div class="col-md-3">
                                          <p style="font-weight: bolder; margin-bottom:0px;">Attachments:</p>             
                                          <div class="tile" style="height:160px;">
                                           <div>
                                                <label style="font-size: 2px; color: white;"><?php echo $res['image']; ?></label>
                                            </div>
                                        <div style="margin-left: 20px; margin-top: -35px;">
                                                <a href="Apply-Org.php?file_id=<?php echo $res['Submitted_by'];?>&image=<?php echo $res['image'];?>"><button type="button"  style="margin-top:0px; border-style:none;"> <img name="image" src="../Osas/Remarks/<?php echo $res['image']; ?>" style="width:90px; border-radius: 5px; padding: 0px; margin-bottom: 0px; margin-top: 0px; margin-left: -15px;"/></button></a>
                                        </div>    
                                             
                                          </div>
                                      </div>

                                   </div>
                                    <div style="top: 0px;">
                                        <p style="font-weight: bolder;">Attach new file</p>
                                                   <input class="file-input11" id="file-input11" type="file" name="filee" onchange="ssvalue11()" style="margin-top: -100px; margin-bottom: 30px;" required="" /> 
                                                   <input type="text" name="" id="" value=""  style="border-style: none;background: transparent;" disabled >
                                          <script>
                                    function ssvalue11() {
                                    var val = document.getElementById("file-input11").value.replace("C:\\fakepath\\", "");
                                    document.getElementById("input11").value = val;
                                    }
                               </script>
                           </div>
                                       </div>
                                    </div>
                               