             <div class="modal fade " id="released<?php echo $res['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document" style="position: absolute;transform: translate(80%, 0%);" >
                    <div class="modal-content" id="content<?php echo $id ?>" style="width: 1100px">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">&nbsp; Employment Certificate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body c" >

<form action="emp_submit.php" method="POST" enctype="multipart/form-data">
  <h4 align="center"> FOR THE PROPOSED APOINTEE </h4>
 <table id="emp_table">
  <tr>
    <th style="border-left: solid">NAME (Last Name, First Name, Name Extension (if any) and Middle Name)</th>
    <th style="border-right: solid"></th>
    <th >AGENCY/ADDRESS</th>
    <th style="border-right: solid"></th>
  </tr>
<input type="text" name="request_id" id="request_id" value="<?php echo $id ?>" hidden>
  <tr>
   <td style="border-left: solid"> <input type="text" name="cfullname" id="cfullname" value="<?php echo $res['fullname']; ?>"></td>
   <td style="border-right: solid"></td>
   <td> <input type="text" name="agency_address" > </td>
   <td style="border-right: solid"></td>
  </tr>

  <tr>
    <td style="border-left: solid;border-top: solid">ADDRESS</td>
       <td style="border-right: solid;border-top: solid"> </td>
          <td></td>
             <td style="border-right: solid"></td>
  </tr>

    <tr>
    <td style="border-left: solid"><input type="text" name="address" value="<?php echo $res['address']; ?>"></td>
       <td style="border-right: solid"></td>
          <td></td>
             <td style="border-right: solid"></td>

  </tr>

  <tr>
    <td style="width: 30%;border-left: solid;border-top: solid">AGE</td>
    <td style="border-right: solid;border-top: solid">SEX</td>
    <td style="border-top: solid">CIVIL STATUS</td>
    <td style="border-right: solid;border-top: solid">PROPOSED POSITION</td>

  </tr>

    <tr>
    <td style="width: 30%;border-left: solid;border-bottom: solid"><input type="text" name="age" value="<?php echo $res['age']; ?>"></td>
    <td style="border-bottom: solid;border-right: solid"> <input type="text" name="sex" value="<?php echo $res['sex']; ?>"></td>
    <td style="border-bottom: solid"> <input type="text" name="civil_status" value="<?php echo $res['civil_status']; ?>"></td>
    <td style="border-bottom: solid;border-right: solid"> <input type="text" name="proposed_position" value=""></td>

  </tr>


</table>
<br><br>
<hr style="height: 2px;background-color: black">
<br>

<h4 align="center">FOR THE LICENSED GOVERNMENT PHYSICIAN</h4>
<table id="emp_table">
  <td><p align="center">I hereby certify that I have reviewed and evaluated the attached examination results, personally examined the
above named individual and found him/her to be physically and medically <input type="checkbox" class="box" id="" name="stats[]" value="FIT">FIT / <input type="checkbox"  class="box" id="" name="stats[]" value="UNFIT">UNFIT for employment</p></td>
</table>

<?php 
$qu = "SELECT DISTINCT concat(first_name,' ',last_name)as fullname,e_signature, medical_specialty,license_number,ptr_no,s2 FROM staff where position='Doctor'";
$result = $conn->query($qu);
?>
<select name="name" ID="name" onchange="myFunction()" class="form-control" style="width: 150px">
<option value="Select">Select</option>
<?php

while($r = mysqli_fetch_array($result))
{ 
  $image = base64_encode($r['e_signature']);
    echo "<option data-fullname='$r[fullname]' data-sig='$image'  data-med_spec='$r[medical_specialty]' data-license='$r[license_number]' data-ptr='$r[ptr_no]'  value='$r[fullname]'> $r[fullname] </option>";

}
?> 
<!-- <label>Address</label><input type="text" name="sig" id="sig"/>
<label>Contact</label><input type="text" name="med_spec" id="med_spec"/>
<label>license</label><input type="text" name="license" id="license"/>
<label>ptr</label><input type="text" name="ptr" id="ptr"/>
 -->
<table id="emp_table">
  <tr>
  <td>SIGNATURE over PRINTED NAME OF LICENSED GOVERNMENT PHYSICIAN: </td>
  <td>OTHER INFORMATION ABOUT THE PROPOSED APPOINTEE: </td>
</tr>
<tr>
  <td><img src="image/no_sig.png" name="imageID" id="imageID" width="150px" height="50px"/> <input type="hidden" id="image_text" name="image_text" value=""/><br><input type="text" name="fullname" id="fullname"> </td>
  <td><input type="text" name="other_info" id="" value=""> </td>
</tr>

</table>

<table id="emp_table">
  <tr>
    <td>AGENCY/Affiliation of Licensed Government Physician:</td>
    <td></td>
</tr>
  <tr>
    <td><input type="text" name="affliate" value=""></td>

</tr>

<tr>
  <td>LICENSE NO. </td>
  <td>HEIGHT (M) Bare Foot</td>
  <td>WEIGHT (KG) Stripped</td>
  <td>BLOOD TYPE</td>
</tr>

<tr>
  <td><input type="text" name="license" id="license" value=""></td>
  <td><input type="text" name="height" value=""></td>
  <td><input type="text" name="weight" value=""></td>
  <td><input type="text" name="bloodtype" value=""></td>
</tr>


</table>

<table id="emp_table">
  <tr>
    <td>OFFICIAL DESIGNATION</td>
    <td>DATE EXAMINED</td>
</tr>
  <tr>
    <td><input type="text" name="med_spec" id="med_spec" value=""></td>
    <td><input type="text" name="date" value=""></td>
</tr>

</table>






<br>

<button type="submit" style="float: right;" onclick="sweetAlert('Certificate released successfully', 'Server Request Successful!', 'success');" class="btn btn-success" name="submit">Release</button>
</form>



                      <div class="container" id="container" >
                      <div class = "head">  

                      </div>
                           
                          </div>   
                        </div>
                    


                    </div>

                  </div>
                </div>   
<style type="text/css">
  #emp_table{
    width: 100%;height: 100%;
  }
  #emp_table input[type="text"]{
    border-right: none; border-left: none;border-top: none;width: 100%;outline-style: none;
  }
  #emp_table tr:hover{
   background-color: white !important;
  }
  #emp_table td{
    border-style: none;
  }
  #emp_table th{
    border-top: solid;border-right: none;
  }
</style>




 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('.box').on('change', function() {
   $('.box').not(this).prop('checked', false);
   
});
});
    function myFunction(){
        var name = $('#name').find(':selected').data('fullname');
        var signature = $('#name').find(':selected').data('sig');
        var medical_spec = $('#name').find(':selected').data('med_spec');
        var license_number = $('#name').find(':selected').data('license');
        var ptr = $('#name').find(':selected').data('ptr');
        $('#fullname').val(name);
        $('#sig').val(signature);
        $('#med_spec').val(medical_spec);
        $('#license').val(license_number);
        $('#ptr').val(ptr);
        $("#imageID").attr('src','data:image/png;base64,'+ signature);
        $('#image_text').attr('value', signature);
    }
</script>

