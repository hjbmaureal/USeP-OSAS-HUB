<?php   include("../../conn.php");

                              $id = $_POST['id'];
                              $tab = mysqli_query($conn,"SELECT * from org_applications where ID='$id'");

                                         
                              while($res = mysqli_fetch_array($tab)) {
                              echo '
                              <p class="text-black">Organization Name: <b><input type="text" name="name" style="border:none;" value="'.$res['Org_Name'].'"></b></p>
                              <p id="type">Organization Type: <input type="text" name="type" style="border:none;" value="'.$res['Type'].'"></p>
                                <div class=" tile remarks-container container p-3 mt-3">
                                 <div class="row">
                                  <div class="col-sm-9"> 
                                    <div class="row">
                                      <div class="col-sm">
                                        Type of File:
                                        <select class="bootstrap-select bss mb-2 ww" name="file">
                                          <option class="select-item" value="1" selected="selected" disabled="">Select Option</option>
                                          <option class="select-item" value="Application Letter">Application Letter</option>
                                          <option class="select-item" value="Mission Vission Statement">Mission Vission Statement</option>
                                          <option class="select-item" value="Notarized Affidavit of Leadership">Notarized Affidavit of Leadership</option>
                                          <option class="select-item" value="Resolution">Resolution</option>
                                          <option class="select-item" value="Letter of Permission">Letter of Permission</option>
                                          <option class="select-item" value="Letter of Consent">Letter of Consent</option>
                                          <option class="select-item" value="List of Officers and Members">List of Officers and Members</option>
                                          <option class="select-item" value="Constitutional by Laws">Constitutional by Laws</option>
                                          <option class="select-item" value="Office Logo">Office Logo</option>
                                          <option class="select-item" value="Letter of Intent">Letter of Intent</option>
                                          
                                        </select>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col">
                                       <div class="tile-body blocking w-100">
                                        <textarea class="remarks-textarea w-100" name="message" placeholder="Write message here..."></textarea>
                                      </div>    
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-3 ">
                                  <label class="control-label text-white mt-2" >-</label>
                                  <div class="tile-body">
                                  <div class="item image-upload " >
                                    <div class="text-center dropzone remarks-upload img card text-center btn btn-light orgbox ">
                                      <label for="file-input2">
                                  
                                      <input class="file-input2 style"  id="file-input2" type="file" name="image" onchange="ssvalue2()" style="margin-top: -500px; margin-bottom: 10px; font-size:8px; " />
                                      <div class="mx-auto">
                                       <img src="../../images/files.png" for="file-input2" class="card-img-top imgbx" style="height:50px; width:50px;"  alt="..."/></div> 
                                      <input class="file-input2" type="text" name="image" value="No Image Selected" id="input2" style="border-style: none;
                                      background: transparent;" disabled >
                                      
                                      
                                      <?echo $name_array[$i]?>  
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