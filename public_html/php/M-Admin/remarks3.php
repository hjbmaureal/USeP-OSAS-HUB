<?php   include("conn.php");

                              $id = $_POST['id'];
                              $tab = mysqli_query($conn,"SELECT * from org_filess where ID='$id'");

                                         
                              while($res = mysqli_fetch_array($tab)) {
                              echo '
                              <p class="text-black">Organization Name: <b><input type="text" name="name" style="border:none;" value="'.$res['Org'].'"></b></p>
                              <p id="type">Organization Type: <input type="text" name="type" style="border:none;" value="'.$res['Type'].'"></p>
          <div class=" tile remarks-container container p-3 mt-3">
           <div class="row">
            <div class="col-sm-9"> 
              <div class="row">
                <div class="col-sm">
                  Type of File:
                  <select class="bootstrap-select bss mb-2 ww" id="select-box" name="file">
                    <option class="select-item" value="1" disabled="">Select Option</option>
                    <option class="select-item" value="Accomplishment Reports">Accomplishment Reports</option>
                    <option class="select-item" value="Action Plan">Action Plan</option>
                    <option class="select-item" value="Audited Financial Statement">Audited Financial Statement</option>
                    <option class="select-item p-1" value="" disabled="">---------------------------------------------</option>
                    <option class="select-item" value="List of Officers w/Contact No.">List of Officers w/Contact No.</option>
                    <option class="select-item" value="List of Members">List of Members</option>
                    <option class="select-item" value="Notarized Affidavit of the Adviser">Notarized Affidavit of the Adviser</option>
                    <option class="select-item" value="Notarized Affidavit of the President">Notarized Affidavit of the President</option>
                    <option class="select-item" value="Action & Financial Plan">Action & Financial Plan </option>
                    <option class="select-item" value="CBL with Official Logo">CBL with Official Logo</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col">
                 <div class="tile-body blocking w-100"> <span id="majorf" style="display: none;">Major Findings:</span>
                  <textarea class="remarks-textarea w-100" placeholder="Write message here..." name="message"></textarea>
                </div>   
                <div class="tile-body blocking w-100" style="display:none;" id="minorfindings"><span id="minorf">Minor Findings:</span>
                  <textarea class="remarks-textarea w-100" placeholder="Write message here..."></textarea>
                </div>  
              </div>
            </div>
          </div>
          
           <div class="col-sm-3 ">
                                  <label class="control-label text-white mt-2" >-</label>
                                  <div class="tile-body">
                                  <div class="item image-upload " >
                                    <div class="text-center dropzone remarks-upload img card text-center btn btn-light orgbox ">
                                      <label for="file-input2" >
                                  
                                      <input class="file-input2 style"  id="file-input2" type="file" name="image" onchange="ssvalue2()" style="margin-top: -500px; margin-bottom: 10px; font-size:8px; " />
                                      <div class="mx-auto">
                                       <img src="../image/files.png" for="file-input2" class="card-img-top imgbx" style="height:50px; width:50px;"  alt="..."/></div> 
                                      <input class="file-input2" type="text" name="image" value="No Image Selected" id="input2" style="border-style: none;
                                      background: transparent;" disabled >
                                      
                                      
                                   
                      </div>
      
                                    
                                     
                        ';}?>
<head>
  <style>
      .style{
        border-style: none;
        background: transparent;
      }
  </style>
</head>
<script>
      function ssvalue2() {
      var val = document.getElementById("file-input2").value.replace("C:\\fakepath\\", "");
      document.getElementById("input2").value = val;
    }
  </script>