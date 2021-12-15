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

  $quer = "SELECT * FROM org_filess WHERE Org_pres_gov like '%$by%'";
   $ress = mysqli_query($conn,$quer);
   $roww = mysqli_fetch_array($ress);


        
        if($filesub==" WFP Letter"){
        if(isset($_FILES['filee'])){
        $pdf_name = $_FILES['filee']['name'];
        $pdf_size = $_FILES['filee']['size'];
       $pdf_tmp = $_FILES['filee']['tmp_name'];
       $path = "Org_Files/".$pdf_name;
       $movepdf = move_uploaded_file($pdf_tmp,$path);

       $query = "UPDATE org_filess set WFP=' '  where Org_pres_gov like '%$by%'";
      $run = mysqli_query($conn,$query);

       $query1 = "UPDATE org_filess set WFP='$pdf_name'  where Org_pres_gov like '%$by%'";
      $run1 = mysqli_query($conn,$query1);

      $by1= $_SESSION['id'];
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by1%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['Org_Name'];


$admin_id= $request['staff_id'];

$notif_body = "The organization ".$org_name." responded to a remarks in Student Organization.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$admin_id', '$notif_body',now(),'../users/Osas/UnrecognizedOrg.php', 'Delivered')");

     
      echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Org-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='WFP Letter' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_filess set status = 0  where Org_pres_gov like '%$by%'";
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
                                                  window.location.href="Org-files.php";
                                                  }, 500);
                                               });

                                                </script>';
                                                
                                        }}

       
      
       if($filesub==" PPMP"){
        if(isset($_FILES['filee'])){
        $pdf_name1 = $_FILES['filee']['name'];
        $pdf_size1 = $_FILES['filee']['size'];
       $pdf_tmp1 = $_FILES['filee']['tmp_name'];
       $path1 = "Org_Files/".$pdf_name1;
       $movepdf1 = move_uploaded_file($pdf_tmp1,$path1);

        $query = "UPDATE org_filess set PPMP=' '  where Org_pres_gov like '%$by%'";
      $run = mysqli_query($conn,$query);

       $query1fun = "UPDATE org_filess set PPMP='$pdf_name1'  where Org_pres_gov like '%$by%'";
      $run1fun = mysqli_query($conn,$query1fun);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['Org_Name'];


$admin_id= $request['staff_id'];

$notif_body = "The organization ".$org_name." responded to a remarks in Student Organization.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$admin_id', '$notif_body',now(),'../users/Osas/UnrecognizedOrg.php', 'Delivered')");

      echo '<script> 
                                        swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Org-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='PPMP' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_filess set status = 0  where Org_pres_gov like '%$by%'";
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
                                                  window.location.href="Org-files.php";
                                                  }, 500);
                                               });

                                                </script>';

          }
       }
       if($filesub==" AccomRep"){
        if(isset($_FILES['filee'])){
        $pdf_name2 = $_FILES['filee']['name'];
        $pdf_size2 = $_FILES['filee']['size'];
       $pdf_tmp2 = $_FILES['filee']['tmp_name'];
       $path2 = "Org_Files/".$pdf_name2;
       $movepdf2 = move_uploaded_file($pdf_tmp2,$path2);

       $query2 = "UPDATE org_filess set AccomRep=' '  where Org_pres_gov like '%$by%'";
      $run2 = mysqli_query($conn,$query2);
      $query2fun = "UPDATE org_filess set AccomRep='$pdf_name2'  where Org_pres_gov like '%$by%'";
      $run2fun = mysqli_query($conn,$query2fun);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['Org_Name'];


$admin_id= $request['staff_id'];

$notif_body = "The organization ".$org_name." responded to a remarks in Student Organization.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$admin_id', '$notif_body',now(),'../users/Osas/UnrecognizedOrg.php', 'Delivered')");

echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Org-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='AccomRep' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_filess set status = 0  where Org_pres_gov like '%$by%'";
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
                                                  window.location.href="Org-files.php";
                                                  }, 500);
                                               });

                                                </script>';

    }

       }
       if($filesub==" ActionPlan"){
        if(isset($_FILES['filee'])){
        $pdf_name3 = $_FILES['filee']['name'];
        $pdf_size3 = $_FILES['filee']['size'];
       $pdf_tmp3 = $_FILES['filee']['tmp_name'];
       $path3 = "Org_Files/".$pdf_name3;
       $movepdf3 = move_uploaded_file($pdf_tmp3,$path3);

       $query3del = "UPDATE org_filess set ActionPlan=' '  where Org_pres_gov like '%$by%'";
      $run3del = mysqli_query($conn,$query3del);


       $query3 = "UPDATE org_filess set ActionPlan='$pdf_name3'  where Org_pres_gov like '%$by%'";
      $run3 = mysqli_query($conn,$query3);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['Org_Name'];


$admin_id= $request['staff_id'];

$notif_body = "The organization ".$org_name." responded to a remarks in Student Organization.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$admin_id', '$notif_body',now(),'../users/Osas/UnrecognizedOrg.php', 'Delivered')");
        echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Org-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='ActionPlan' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_filess set status = 0  where Org_pres_gov like '%$by%'";
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
                                                  window.location.href="Org-files.php";
                                                  }, 500);
                                               });

                                                </script>';

        }
       }
       if($filesub==" AFS"){
        if(isset($_FILES['filee'])){
        $pdf_name4 = $_FILES['filee']['name'];
        $pdf_size4 = $_FILES['filee']['size'];
       $pdf_tmp4 = $_FILES['filee']['tmp_name'];
       $path4 = "Org_Applications/".$pdf_name4;
       $movepdf4 = move_uploaded_file($pdf_tmp4,$path4);

       $query4del = "UPDATE org_filess set AFS=' '  where Org_pres_gov like '%$by%'";
      $run4del = mysqli_query($conn,$query4del);

       $query4 = "UPDATE org_filess set AFS='$pdf_name4'  where Org_pres_gov like '%$by%'";
      $run4 = mysqli_query($conn,$query4);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['Org_Name'];


$admin_id= $request['staff_id'];

$notif_body = "The organization ".$org_name." responded to a remarks in Student Organization.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$admin_id', '$notif_body',now(),'../users/Osas/UnrecognizedOrg.php', 'Delivered')");

      echo '<script> 
                                                    swal({
                                                      
                                                      type: "success",
                                                      title: "File sumbitted successfully",
                                                      showConfirmButton: true
                                                     }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="Org-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='AFS' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE org_filess set status = 0  where Org_pres_gov like '%$by%'";
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
                                                  window.location.href="Org-files.php";
                                                  }, 500);
                                               }); ';

}
       }
      
       
       

      
       
    
       

      
    
}
 

             ?>






  </body>
 

  </html>
