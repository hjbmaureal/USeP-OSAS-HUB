<?php
include("connect.php");
    include('conn.php');
session_start();
  if(!isset($_SESSION['id'])){
  echo '<script> alert("Please Login first!!!") 
  window.location="../../index.php";
  </script>';
    
}?>
<!DOCTYPE html>
<html>
<head>
      <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
      <!-- Twitter meta-->
      <meta property="twitter:card" content="summary_large_image">
      <meta property="twitter:site" content="@pratikborsadiya">
      <meta property="twitter:creator" content="@pratikborsadiya">
      <!-- Open Graph Meta-->
      <meta property="og:type" content="website">
      <meta property="og:site_name" content="Vali Admin">
      <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
      <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
      <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
      <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
       <link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Student Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">

      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <script>
    function printDiv(prescript){
      var printContents = document.getElementById(prescript).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;

    }
  </script>
  <style>
                   @media screen {

                        #printSection {

                            

                        }

                    }

                    @media print {

                        body * {

                            

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
                          width: 50%;

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



                       /** footer {page-break-after: left;} */


                    @page {

                    }
                        
                        

                        

                    }

                </style>
<body class="app sidebar-mini rtl" style="background-color: #fff;" onload="window.print()">

<?php


$id = $_SESSION['id'];

if (isset($_POST['print'])) {
  $prescription_id= $_POST['prescription_id'];
  $id = $_SESSION['id'];

  $db = mysqli_connect("localhost","root","","backupdb-3");

                        $sql = "SELECT prescription_list.*, consultation_type.consultation_type as type from prescription_list join consultation_type on consultation_type.type_id=prescription_list.consultation_type where patient_id=('$id') and prescription_id=('$prescription_id')";


                    $res = $db->query($sql);
                    $cnt=1;
                    
                    while($row = $res->fetch_assoc()) {
                      $prescription_id = $row['prescription_id'];
                      $image_data=$row['e_signature'];

?>

<div id="prescript">
<div class="container" id="container">

<img id="logo" src="image/logo.png"  style="position: absolute;transform: translate(100px, 370px);opacity: .15 " />

                      <div class = "head">  
                        <br>
                        
                        <h6 class="font-weight-bold">Republic of the Philippines</h6> 
                        <h6 class="font-weight-bold" style= "font-family: Old English Text MT; font-size: 20px;">University of Southeastern Philippines</h6>
                        <h6 class="font-weight-bold">Tagum-Mabini Campus</h6> 
                        <h6 class="font-weight-bold">Apokon, Tagum City</h6> 
                        <br>
                      </div>
                        <hr width=”50%″ size="10" style="border: 1px solid #8064a2;">
                        <hr width=”50%″ size="10" style="border: 1px solid #8064a2;">
                       
                       
                        
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
                                    <div style="text-align: right; margin-right: 15%;">
                                    <object id="e_sig" data="data:image/jpeg;base64,<?php echo base64_encode($image_data); ?>" width="100px" height="100px" style="margin-bottom: -80px;position: sticky;   margin-right:390px;"></div>
                                    <div style="text-align: right; margin-right: -6%; ">
                                      <img id="e_sig" src="image/no_sig.png" alt="E-signature" width="150px" height="30px" style="margin-bottom: -80px;margin-right:420px;"></div>
                                    </object>
                                  </div>
                                  </div>
                            </div>
                                
                                
                          
                          <div style="display: inline-block; text-align: right; margin-left: 120px;" id="other" >
                            <h6 class="font-weight-bold"><input type="text" readonly="" value="<?php echo $row['prescribing_doctor_name']; ?>"  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;cursor: default; width: 250px; font-weight: bold;"></h6> </input>

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
<?php 
  }
}?>

</body>
</html>