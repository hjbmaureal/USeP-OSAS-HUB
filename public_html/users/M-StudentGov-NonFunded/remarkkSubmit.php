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

$org_name=$org['org_name'];


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

$org_name=$org['org_name'];


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

$org_name=$org['org_name'];


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

$org_name=$org['org_name'];


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

$org_name=$org['org_name'];


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

 if($filesub==" AccomRepAccre"){
        if(isset($_FILES['filee'])){
        $pdf_name2 = $_FILES['filee']['name'];
        $pdf_size2 = $_FILES['filee']['size'];
       $pdf_tmp2 = $_FILES['filee']['tmp_name'];
       $path2 = "Org_Files/".$pdf_name2;
       $movepdf2 = move_uploaded_file($pdf_tmp2,$path2);

       $querydel2 = "UPDATE accre_files set AccomRep=' '  where Org_President_Governor like '%$by%'";
      $rundel2 = mysqli_query($conn,$querydel2);
      $query2fun = "UPDATE accre_files set AccomRep='$pdf_name2'  where Org_President_Governor like '%$by%'";
      $run2fun = mysqli_query($conn,$query2fun);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['org_name'];


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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='AccomRepAccre' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE accre_files set status = 0  where Org_President_Governor like '%$by%'";
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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                               });

                                                </script>';

    }

       }
       if($filesub==" AFSAccre"){
        if(isset($_FILES['filee'])){
        $pdf_name4 = $_FILES['filee']['name'];
        $pdf_size4 = $_FILES['filee']['size'];
       $pdf_tmp4 = $_FILES['filee']['tmp_name'];
       $path4 = "Org_Applications/".$pdf_name4;
       $movepdf4 = move_uploaded_file($pdf_tmp4,$path4);

       $query4del = "UPDATE accre_files set AFS=' '  where Org_President_Governor like '%$by%'";
      $run4del = mysqli_query($conn,$query4del);

       $query4 = "UPDATE accre_files set AFS='$pdf_name4'  where Org_President_Governor like '%$by%'";
      $run4 = mysqli_query($conn,$query4);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['org_name'];


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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='AFSAccre' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE accre_files set status = 0  where Org_President_Governor like '%$by%'";
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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                               }); ';

}
       }

        if($filesub==" Lists_officers"){
        if(isset($_FILES['filee'])){
        $pdf_name5 = $_FILES['filee']['name'];
        $pdf_size5 = $_FILES['filee']['size'];
       $pdf_tmp5 = $_FILES['filee']['tmp_name'];
       $path5 = "Accre_Files/".$pdf_name5;
       $movepdf5 = move_uploaded_file($pdf_tmp5,$path5);

       $query5del = "UPDATE accre_files set Lists_officers=' '  where Org_President_Governor like '%$by%'";
      $run5del = mysqli_query($conn,$query5del);

       $query5 = "UPDATE accre_files set Lists_officers='$pdf_name5'  where Org_President_Governor like '%$by%'";
      $run5 = mysqli_query($conn,$query5);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['org_name'];


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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Lists_officers' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE accre_files set status = 0  where Org_President_Governor like '%$by%'";
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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                               }); ';

}

}
if($filesub==" Lists_members"){
        if(isset($_FILES['filee'])){
        $pdf_name6 = $_FILES['filee']['name'];
        $pdf_size6 = $_FILES['filee']['size'];
       $pdf_tmp6 = $_FILES['filee']['tmp_name'];
       $path6 = "Accre_Files/".$pdf_name6;
       $movepdf6 = move_uploaded_file($pdf_tmp6,$path6);

       $query6del = "UPDATE accre_files set Lists_officers=' '  where Org_President_Governor like '%$by%'";
      $run6del = mysqli_query($conn,$query6del);

       $query6 = "UPDATE accre_files set Lists_members='$pdf_name6'  where Org_President_Governor like '%$by%'";
      $run6 = mysqli_query($conn,$query6);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['org_name'];


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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Lists_members' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE accre_files set status = 0  where Org_President_Governor like '%$by%'";
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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                               }); ';

}

}
if($filesub==" Aff_adviser"){
        if(isset($_FILES['filee'])){
        $pdf_name7 = $_FILES['filee']['name'];
        $pdf_size7 = $_FILES['filee']['size'];
       $pdf_tmp7 = $_FILES['filee']['tmp_name'];
       $path7 = "Accre_Files/".$pdf_name7;
       $movepdf7 = move_uploaded_file($pdf_tmp7,$path7);

       $query7del = "UPDATE accre_files set Aff_adviser=' '  where Org_President_Governor like '%$by%'";
      $run7del = mysqli_query($conn,$query7del);

       $query7 = "UPDATE accre_files set Aff_adviser='$pdf_name7'  where Org_President_Governor like '%$by%'";
      $run7 = mysqli_query($conn,$query7);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['org_name'];


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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Aff_adviser' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE accre_files set status = 0  where Org_President_Governor like '%$by%'";
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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                               }); ';

}
}
if($filesub==" Aff_high_officer"){
        if(isset($_FILES['filee'])){
        $pdf_name8 = $_FILES['filee']['name'];
        $pdf_size8 = $_FILES['filee']['size'];
       $pdf_tmp8 = $_FILES['filee']['tmp_name'];
       $path8 = "Accre_Files/".$pdf_name8;
       $movepdf8 = move_uploaded_file($pdf_tmp8,$path8);

       $query8del = "UPDATE accre_files set Aff_high_officer=' '  where Org_President_Governor like '%$by%'";
      $run8del = mysqli_query($conn,$query8del);

       $query8 = "UPDATE accre_files set Aff_high_officer='$pdf_name8'  where Org_President_Governor like '%$by%'";
      $run8 = mysqli_query($conn,$query8);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['org_name'];


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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='Aff_high_officer' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE accre_files set status = 0  where Org_President_Governor like '%$by%'";
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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                               }); ';

}

}
if($filesub==" AFP"){
        if(isset($_FILES['filee'])){
        $pdf_name9 = $_FILES['filee']['name'];
        $pdf_size9 = $_FILES['filee']['size'];
       $pdf_tmp9 = $_FILES['filee']['tmp_name'];
       $path9 = "Accre_Files/".$pdf_name9;
       $movepdf9 = move_uploaded_file($pdf_tmp9,$path9);

       $query9del = "UPDATE accre_files set AFP=' '  where Org_President_Governor like '%$by%'";
      $run9del = mysqli_query($conn,$query9del);

       $query9 = "UPDATE accre_files set AFP='$pdf_name9'  where Org_President_Governor like '%$by%'";
      $run9 = mysqli_query($conn,$query9);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['org_name'];


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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='AFP' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE accre_files set status = 0  where Org_President_Governor like '%$by%'";
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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                               }); ';

}

}      
if($filesub==" CBL_logo"){
        if(isset($_FILES['filee'])){
        $pdf_name0 = $_FILES['filee']['name'];
        $pdf_size0 = $_FILES['filee']['size'];
       $pdf_tmp0 = $_FILES['filee']['tmp_name'];
       $path0 = "Accre_Files/".$pdf_name0;
       $movepdf0 = move_uploaded_file($pdf_tmp0,$path0);

        $query0del = "UPDATE accre_files set CBL_logo=' '  where Org_President_Governor like '%$by%'";
      $run0del = mysqli_query($conn,$query0del);

       $query0 = "UPDATE accre_files set CBL_logo='$pdf_name0'  where Org_President_Governor like '%$by%'";
      $run0 = mysqli_query($conn,$query0);

      
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$org_check_query="SELECT * from approve_funded where Org_pres_gov like '%$by%'";
$org_result=mysqli_query($conn,$org_check_query);
$org=mysqli_fetch_assoc($org_result);

$org_name=$org['org_name'];


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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                                  });
                                                   </script>';
                                                   $updateStat = "UPDATE remarks_apply SET status = 1 WHERE file='CBL_logo' and Submitted_by like '%$by%'";
                                                   $upres = mysqli_query($conn,$updateStat);
                                                   $query0 = "UPDATE accre_files set status = 0  where Org_President_Governor like '%$by%'";
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
                                                  window.location.href="Accre-files.php";
                                                  }, 500);
                                               }); ';

}
}
      
       
       

      
       
    
       

      
    
}
 

             ?>






  </body>
 

  </html>
