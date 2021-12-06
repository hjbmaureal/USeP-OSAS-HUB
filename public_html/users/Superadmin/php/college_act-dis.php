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
include('../../../conn.php');
if (isset($_POST['pass'])){

  $pass= $_POST['pass'];
  $stmt = $conn->prepare("SELECT * FROM superadmin WHERE password = ?");
  $stmt->bind_param("i", $pass);
  $stmt->execute();
  $user = $stmt->get_result()->fetch_assoc();


  if ($user && $pass==$user['password']){
    $User_id= $_POST['eid'];
    $stats= $_POST['status'];

    if ($stats == "Enabled") {
      $stats = "Disabled";
    }else{
      $stats = "Enabled";}

      $sql="UPDATE college SET status ='$stats' WHERE college_id= '$User_id' ";
      !$query = $conn->query($sql);

      echo '<script>
      swal({
        title: "Update Successful",
        type: "success"
        }, function () {
          setTimeout(function () {
           window.location.href="../Usep_College.php";
           }, 500);
           });
           </script>';

         }else{
          echo '<script>
          swal({
            title: "Invalid Password",
            text: "Try again.",
            type: "warning"
            }, function () {
              setTimeout(function () {
               window.location.href="../Usep_College.php";
               }, 500);
               });
               </script>'; 
             }   }else{
                echo '<script>
          swal({
            title: "Invalid Password",
            text: "Try again.",
            type: "warning"
            }, function () {
              setTimeout(function () {
               window.location.href="../Usep_College.php";
               }, 500);
               });
               </script>'; 
             }
             ?>


<!--
header('location: Usep_Department.php');
}else{echo "error";}-->




  </body>
  </html>
