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
      <link rel="icon" href="../image/logo.png" type="image/gif" sizes="16x16">
      <title>Student | USeP Virtual Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../../css/main_main.css">
          <link rel="stylesheet" type="text/css" href="../../css/upstyle_main.css">
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  
  </head>
  <body>
<?php 
include 'conn.php';
error_reporting(0);
if(isset($_POST['postbtn'])){

    $by = $_POST['submitted_by'];
   $date = date('y-m-d h:i:s');
   $filee = $_POST['filee'];
   $filesub = $_POST['by'];

   $quer = "SELECT * FROM org_applications WHERE Submitted_by like '$by'";
   $ress = mysqli_query($conn,$quer);
   $roww = mysqli_fetch_array($ress);

  if ($roww){  
      
        
       if($filesub==" Application Letter"){
        if(isset($_FILES['filee'])){  
        $pdf_name = $_FILES['filee']['name'];
        $pdf_size = $_FILES['filee']['size'];
       $pdf_tmp = $_FILES['filee']['tmp_name'];
       $path = "Org_Applications/".$pdf_name;
       $movepdf = move_uploaded_file($pdf_tmp,$path);

       $querydel = "UPDATE org_applications set App_letter=' '  where Submitted_by like '$by'";
      $rundel = mysqli_query($conn,$querydel);

       $query = "UPDATE org_applications set App_letter='$pdf_name'  where Submitted_by like '$by'";
      $run = mysqli_query($conn,$query);
     
      echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Application Letter' and Submitted_by = '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_applications set status = 0  where Submitted_by ='$by'";
                                                    $run0 = mysqli_query($conn,$query0);
      
                                        }
                                        else{
                                            echo '<script>
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "File not submitted successfully",
                                                    showConfirmButton: true
                                                  }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                               });

                                                </script>';
                                                
                                        }}

       
      
       if($filesub==" Mission Vission Statement"){
        if(isset($_FILES['filee'])){
        $pdf_name1 = $_FILES['filee']['name'];
        $pdf_size1 = $_FILES['filee']['size'];
       $pdf_tmp1 = $_FILES['filee']['tmp_name'];
       $path1 = "Org_Applications/".$pdf_name1;
       $movepdf1 = move_uploaded_file($pdf_tmp1,$path1);

       $query1del = "UPDATE org_applications set MVS=''  where Submitted_by like '$by'";
      $run1del = mysqli_query($conn,$query1del);

       $query1 = "UPDATE org_applications set MVS='$pdf_name1'  where Submitted_by like '$by'";
      $run1 = mysqli_query($conn,$query1);

      echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Mission Vission Statement' and Submitted_by = '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_applications set status = 0  where Submitted_by ='$by'";
                                                    $run0 = mysqli_query($conn,$query0);
      
                                        }
                                        else{
                                            echo '<script>
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "File not submitted successfully",
                                                    showConfirmButton: true
                                                  }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                               });

                                                </script>';

          }
       }
       if($filesub==" Notarized Affidavit of Le"){
        if(isset($_FILES['filee'])){
        $pdf_name2 = $_FILES['filee']['name'];
        $pdf_size2 = $_FILES['filee']['size'];
       $pdf_tmp2 = $_FILES['filee']['tmp_name'];
       $path2 = "Org_Applications/".$pdf_name2;
       $movepdf2 = move_uploaded_file($pdf_tmp2,$path2);

       $query2del = "UPDATE org_applications set Aff_Lead=' '  where Submitted_by like '$by'";
      $run2del = mysqli_query($conn,$query2del);

       $query2 = "UPDATE org_applications set Aff_Lead='$pdf_name2'  where Submitted_by like '$by'";
      $run2 = mysqli_query($conn,$query2);

echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Notarized Affidavit of Le' and Submitted_by = '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_applications set status = 0  where Submitted_by ='$by'";
                                                    $run0 = mysqli_query($conn,$query0);
      
                                        }
                                        else{
                                            echo '<script>
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "File not submitted successfully",
                                                    showConfirmButton: true
                                                  }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                               });

                                                </script>';

    }

       }
       if($filesub==" Resolution"){
        if(isset($_FILES['filee'])){
        $pdf_name3 = $_FILES['filee']['name'];
        $pdf_size3 = $_FILES['filee']['size'];
       $pdf_tmp3 = $_FILES['filee']['tmp_name'];
       $path3 = "Org_Applications/".$pdf_name3;
       $movepdf3 = move_uploaded_file($pdf_tmp3,$path3);

       $query3del = "UPDATE org_applications set Resolution=' '  where Submitted_by like '$by'";
      $run3del = mysqli_query($conn,$query3del);


       $query3 = "UPDATE org_applications set Resolution='$pdf_name3'  where Submitted_by like '$by'";
      $run3 = mysqli_query($conn,$query3);
        echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Resolution' and Submitted_by = '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_applications set status = 0  where Submitted_by ='$by'";
                                                    $run0 = mysqli_query($conn,$query0);
      
                                        }
                                        else{
                                            echo '<script>
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "File not submitted successfully",
                                                    showConfirmButton: true
                                                  }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                               });

                                                </script>';

        }
       }
       if($filesub==" Letter of Permission"){
        if(isset($_FILES['filee'])){
        $pdf_name4 = $_FILES['filee']['name'];
        $pdf_size4 = $_FILES['filee']['size'];
       $pdf_tmp4 = $_FILES['filee']['tmp_name'];
       $path4 = "Org_Applications/".$pdf_name4;
       $movepdf4 = move_uploaded_file($pdf_tmp4,$path4);

       $query4del = "UPDATE org_applications set Letter_Permission=' '  where Submitted_by like '$by'";
      $run4del = mysqli_query($conn,$query4del);

       $query4 = "UPDATE org_applications set Letter_Permission='$pdf_name4'  where Submitted_by like '$by'";
      $run4 = mysqli_query($conn,$query4);

      echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Letter of Permission' and Submitted_by = '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_applications set status = 0  where Submitted_by ='$by'";
                                                    $run0 = mysqli_query($conn,$query0);
      
                                        }
                                        else{
                                            echo '<script>
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "File not submitted successfully",
                                                    showConfirmButton: true
                                                  }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                               }); ';

}
       }
       if($filesub==" Letter of Consent"){
        if(isset($_FILES['filee'])){
        $pdf_name5 = $_FILES['filee']['name'];
        $pdf_size5 = $_FILES['filee']['size'];
       $pdf_tmp5 = $_FILES['filee']['tmp_name'];
       $path5 = "Org_Applications/".$pdf_name5;
       $movepdf5 = move_uploaded_file($pdf_tmp5,$path5);

       $query5del = "UPDATE org_applications set Letter_content=' '  where Submitted_by like '$by'";
      $run5del = mysqli_query($conn,$query5del);

       $query5 = "UPDATE org_applications set Letter_content='$pdf_name5'  where Submitted_by like '$by'";
      $run5 = mysqli_query($conn,$query5);

      echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Letter of Consent' and Submitted_by = '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_applications set status = 0  where Submitted_by ='$by'";
                                                    $run0 = mysqli_query($conn,$query0);
      
                                        }
                                        else{
                                            echo '<script>
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "File not submitted successfully",
                                                    showConfirmButton: true
                                                  }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                               });

                                                </script>';

}
       }
       if($filesub==" List of Officers and Memb"){
        if(isset($_FILES['filee'])){
        $pdf_name6 = $_FILES['filee']['name'];
        $pdf_size6 = $_FILES['filee']['size'];
       $pdf_tmp6 = $_FILES['filee']['tmp_name'];
       $path6 = "Org_Applications/".$pdf_name6;
       $movepdf6 = move_uploaded_file($pdf_tmp6,$path6);

       $query6del = "UPDATE org_applications set Lists=' '  where Submitted_by like '$by'";
      $run6del = mysqli_query($conn,$query6del);

       $query6 = "UPDATE org_applications set Lists='$pdf_name6'  where Submitted_by like '$by'";
      $run6 = mysqli_query($conn,$query6);

      echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='List of Officers and Memb' and Submitted_by = '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_applications set status = 0  where Submitted_by ='$by'";
                                                    $run0 = mysqli_query($conn,$query0);
      
                                        }
                                        else{
                                            echo '<script>
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "File not submitted successfully",
                                                    showConfirmButton: true
                                                  }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                               });

                                                </script>';

}
       }
       if($filesub==" Constitutional by Laws"){
        if(isset($_FILES['filee'])){
        $pdf_name7 = $_FILES['filee']['name'];
        $pdf_size7 = $_FILES['filee']['size'];
       $pdf_tmp7 = $_FILES['filee']['tmp_name'];
       $path7 = "Org_Applications/".$pdf_name7;
       $movepdf7 = move_uploaded_file($pdf_tmp7,$path7);

       $query7del = "UPDATE org_applications set ConsLaw=' '  where Submitted_by like '$by'";
      $run7del = mysqli_query($conn,$query7del);

       $query7 = "UPDATE org_applications set ConsLaw='$pdf_name7'  where Submitted_by like '$by'";
      $run7 = mysqli_query($conn,$query7);

      echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Constitutional by Laws' and Submitted_by = '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_applications set status = 0  where Submitted_by ='$by'";
                                                    $run0 = mysqli_query($conn,$query0);
      
                                        }
                                        else{
                                            echo '<script>
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "File not submitted successfully",
                                                    showConfirmButton: true
                                                  }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                               });

                                                </script>';
}

       }
       if($filesub==" Office Logo"){
        if(isset($_FILES['filee'])){
        $pdf_name8 = $_FILES['filee']['name'];
        $pdf_size8 = $_FILES['filee']['size'];
       $pdf_tmp8 = $_FILES['filee']['tmp_name'];
       $path8 = "Org_Applications/".$pdf_name8;
       $movepdf8 = move_uploaded_file($pdf_tmp8,$path8);

       $query8del = "UPDATE org_applications set Logo=' '  where Submitted_by like '$by'";
      $run8del = mysqli_query($conn,$query8del);

       $query8 = "UPDATE org_applications set Logo='$pdf_name8'  where Submitted_by like '$by'";
      $run8 = mysqli_query($conn,$query8);

      echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Office Logo' and Submitted_by = '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_applications set status = 0  where Submitted_by ='$by'";
                                                    $run0 = mysqli_query($conn,$query0);
      
                                        }
                                        else{
                                            echo '<script>
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "File not submitted successfully",
                                                    showConfirmButton: true
                                                  }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                               });

                                                </script>';

}
       }
       if($filesub==" Letter of Intent"){
        if(isset($_FILES['filee'])){
        $pdf_name9 = $_FILES['filee']['name'];
        $pdf_size9 = $_FILES['filee']['size'];
       $pdf_tmp9 = $_FILES['filee']['tmp_name'];
       $path9 = "Org_Applications/".$pdf_name9;
       $movepdf9 = move_uploaded_file($pdf_tmp9,$path9);

       $query9del = "UPDATE org_applications set Letter_intent=' '  where Submitted_by like '$by'";
      $run9del = mysqli_query($conn,$query9del);

       $query9 = "UPDATE org_applications set Letter_intent='$pdf_name9'  where Submitted_by like '$by'";
      $run9 = mysqli_query($conn,$query9);

      echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Letter of Intent' and Submitted_by = '$by'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_applications set status = 0  where Submitted_by ='$by'";
                                                    $run0 = mysqli_query($conn,$query0);
      
                                        }
                                        else{
                                            echo '<script>
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "File not submitted successfully",
                                                    showConfirmButton: true
                                                  }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Apply-Org.php";
                                                  }, 500);
                                               });

                                                </script>';
}

       }
    
       

      
    
}
 
}
             ?>






  </body>
 

  </html>
