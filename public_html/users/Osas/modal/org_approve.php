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
      <title>Super Admin | USeP Virtual Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../css/superadmin/main_main.css">
      <link rel="stylesheet" type="text/css" href="../css/superadmin/upstyle_main.css">
      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  </head>
  <body>
<?php 
include('../conn.php');
if (isset($_POST['pass'])){
  $coor_id = $_POST['coor_id'];
  $pass= $_POST['pass'];
  $stmt = $conn->prepare("SELECT * FROM staff WHERE staff_id = ?");  
  $stmt->bind_param("i", $coor_id);
  $stmt->execute();
  $user = $stmt->get_result()->fetch_assoc();


  if ($user && password_verify($pass, $user['password'])){
        $User_id= $_POST['eid'];
                                          
        $tab = mysqli_query($conn,"SELECT * from org_applications where ID='$User_id'");
        $res = mysqli_fetch_array($tab);

                if($res){
                      $name = $res['Org_Name'];
                      $idd =  $res['ID'];
                      $gov =  $res['Org_President_Governor'];
                      $adviser =  $res['Org_Adviser'];
                      $type =  $res['Type'];
                      $logo = $res['Logo'];
                      $submittedby= $res['Submitted_by'];

                                            

                            if ($type == "Govt. Funded"){

                                $query = "INSERT INTO govt_funded_org(org_name,id,org_pres_gov,org_adviser,type,logo) VALUES('$name','$idd','$gov','$adviser','$type','$logo')";
                                $run = mysqli_query($conn, $query);
                                $queryadd = "INSERT INTO approve_funded(org_name,id,org_pres_gov,org_adviser,type) VALUES('$name','$idd','$gov','$adviser','$type')";
                                $runadd = mysqli_query($conn, $queryadd);
                                          

                                            if($run){
                                                    $query1 = "DELETE FROM org_applications WHERE ID ='$idd' ";
                                                 $run1 = mysqli_query($conn, $query1);
                                             echo '<script>
                                                  swal({
                                                    title: "'.$name.' : Approved",
                                                    type: "success"
                                                  }, function () {
                                                  setTimeout(function () {
                                                  window.location.href="../NewOrgApplicants.php";
                                                  }, 500);
                                                  });
                                                  </script>';
                                                $querr = mysqli_query($conn,"SELECT * FROM approve_funded where ID = '$idd'");
                                                 $runaddd = mysqli_fetch_array($querr);

$notif_body = "Congratulations! The Org Application you filed has been approved.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$submittedby', '$notif_body',now(),'../users/Student/Home-Orgs.php', 'Delivered')"); 
                                                 
                                              }
                                            else{
                                              
                                                  echo '<script>
          swal({
            title: "Approved:",
            text: "'.$name.'",
            type: "success"
            }, function () {
              setTimeout(function () {
               window.location.href="../NewOrgApplicants.php";
               }, 500);
               });
               </script>'; 

                                                
                                        }
                              }
                              if ($type == "Non-Govt. Funded"){
                                            $query = "INSERT INTO non_govt_funded_org(org_name,id,org_pres_gov,org_adviser,type,logo) VALUES('$name','$idd','$gov','$adviser','$type','$logo')";
                                            $run = mysqli_query($conn, $query);
                                            $queryadd = "INSERT INTO approve_funded(org_name,id,org_pres_gov,org_adviser,type) VALUES('$name','$idd','$gov','$adviser','$type')";
                                            $runadd = mysqli_query($conn, $queryadd);

                                            if($run){
                                                $query12 = "DELETE FROM org_applications WHERE ID ='$idd' ";
                                                 $run12 = mysqli_query($conn, $query12);
                                                  echo '<script>
                                                      swal({
                                                      title: "'.$name.' : Approved",
                                                      type: "success"
                                                      }, function () {
                                                      setTimeout(function () {
                                                      window.location.href="../NewOrgApplicants.php";
                                                      }, 500);
                                                      });
                                                      </script>';
                                                $notif_body = "Congratulations! The Org Application you filed has been approved.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$submittedby', '$notif_body',now(),'../users/Student/Home-Orgs.php', 'Delivered')");
                                                 
                                                  }
                                else{
                                      echo '<script>
                                            swal({
                                                title: "Not Approved",
                                                type: "warning"
                                            }, function () {
                                            setTimeout(function () {
                                            window.location.href="../NewOrgApplicants.php";
                                            }, 500);
                                            });
                                            </script>';
                                                
                                        }
                              }
                      }
      }
                                          

   else{
      
          echo '<script>
          swal({
            title: "Invalid Password",
            text: "Try again.",
            type: "warning"
            }, function () {
              setTimeout(function () {
               window.location.href="../NewOrgApplicants.php";
               }, 500);
               });
               </script>'; 
             } 
}  
             ?>






  </body>
  </html>
