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

                        #date {
                          margin-left:-22%;
                        }

                        .modal-header, .modal-footer {
                          display: none;
                        }


                        
                        

                        

                    }

                </style>
<body class="app sidebar-mini rtl" style="background-color: #fff;" onload="window.print()">

<?php


$id = $_SESSION['id'];

if (isset($_POST['print'])) {
  $request_id= $_POST['request_id'];
  $id = $_SESSION['id'];

  $db = mysqli_connect("localhost","root","","backupdb-3");

                        $sql = "SELECT * from request_list where patient_id=('$id') AND request_type='Medical Certificate' and request_id='$request_id'";


                    $res = $db->query($sql);
                    $cnt=1;
                    
                    while($row = $res->fetch_assoc()) {
                      $prescription_id = $row['prescription_id'];
                      $image_data=$row['e_signature'];

?>

<div class="modal-body c" id="printThis">
                      <div class="container">
                      <div class = "head">  
                        
                        <br>
                        <h6 class="font-weight-bold" style= "font-family: Calibri; font-size: 16px;">UNIVERSITY OF SOUTHEASTERN PHILIPPINES</h6>
                        <h6 style= "font-family: Calibri;">Tagum-Mabini Campus</h6> 
                        <h6 style= "font-family: Calibri;">Apokon, Tagum City</h6> 
                        <br>
                  
                       
                        <h6 class="font-weight-bold" style= "font-family: Calibri; font-size: 16px;">MEDICAL-DENTAL UNIT</h6> 
                        <h6 class="font-weight-bold" style="font-family: Calibri; font-size: 16px; color: red">LABORATORY REQUEST</h6> 
                      </div>
                      <br>
                        <h6>Name: <span class="font-weight-lighter ml-1"><input type="text" readonly="" value="<?php echo $res['fullname']; ?>"  style="font-weight: bold; font-size: 15px;text-align:left;border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 370px;"></input></h6>

                          <h6>Address:<br>
                            <textarea name="address" 
                              id="address"
                              readonly="" 
                              rows="3" 
                              style=
                                 "font-size: 15px;
                                  font-weight: bold;
                                  border-left:none;
                                  border-right: none;
                                  border-top: none;
                                  outline: none;cursor: default;
                                  height: 50px;
                                  width: 430px;
                                  border-width: 2px;
                                  ">
                              <?php echo $res['address']; ?>
                            </textarea>
                        </h6>
                        <div class="row" id="asd" style="position: static;">
                        <div class="col-sm-6" id="age">
                                <h6>Age/Sex:
                                  
                                    <input type="text" 
                                    readonly="" 
                                    value="<?php 
                                    echo $res['age']. " / ";
                                    echo $res['sex']; ?>"  
                                    style="
                                      font-size: 15px;
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
                              <h6>Date: <input type="text" readonly="" value="<?php echo $res['date_requested']; ?>" style="font-weight: bold;text-align: left; font-size: 15px; border-left:none;border-right: none;border-top: none;outline: none;cursor: default;width: 115px; position: sticky;"></input></h6>
                          </div>
                        </div>

                         <br> 
                         <h6 class="font-weight-bold">Required Lab Test: </h6> 
                         <b>
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

                        </b>
                          <br>
                          <br>
                          <div id="requested">
                          <h6 class="font-weight-bold" style="text-align: center;margin-left:60%">Requested by: <input type="text" readonly="" value="<?php echo $staff_name ?>"  style="text-align: center;border-left:none;border-right: none;border-top: none;outline: none;background-color: #F5F5F5;cursor: default;"></h6> 
                        </div>
                          <br>
                           
                          </div>   
                        </div>
<?php 
  }
}?>

</body>
</html>