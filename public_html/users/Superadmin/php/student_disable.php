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

include("conn.php");
if (isset($_POST['eid'])){

  $User_id= $_POST['eid'];
  $stats= $_POST['stats'];
  $username= 'superadmin';
  $password= $_POST['password'];

  $stmt = $conn->prepare("SELECT username, password FROM superadmin WHERE username = ?");
        $stmt->bind_param('i', $username);
        $stmt->execute();
        $stmt->bind_result($id, $pass);
        $stmt->store_result();
  while($row = $stmt->fetch()){
    if(password_verify($password, $pass)){
                
               if($stats == "Active"){                
                $msg = "#Activated";
                $sql2="UPDATE student SET account_status ='$stats' WHERE Student_id = '$User_id' ";
            $conn->query($sql2);
            echo '<script>
              swal({
                title: "The Account Has Been Activated",
                type: "success"
                }, function () {
                  setTimeout(function () {
                    window.location.href="../StudentAccounts.php";
                    }, 500);
                    });
                    </script>';
                    
            }
            else{                
                $msg = "#Disabled";
                mysqli_query($conn, "UPDATE student SET account_status = '$stats' WHERE Student_id = '$User_id' ");
                echo '<script>
            swal({
              title: "The Account Has Been Disabled",
              type: "success"
              }, function () {
                setTimeout(function () {
                  window.location.href="../StudentAccounts.php";
                  }, 500);
                  });
                  </script>'; 
            }
                
            
}else{
     echo '<script>
            swal({
              title: "Activate/Disable Failed.",
              text: "Invalid username or password",
              type: "warning"
              }, function () {
                setTimeout(function () {
                  window.location.href="../StudentAccounts.php";
                  }, 500);
                  });
                  </script>'; 
                    
                  }
}



    

         /*SELECT EMAIL ADDRESS*/
    //      $sqlselect=mysqli_query($conn,"SELECT * FROM personal_info where User_id='".$User_id."'");
    // $prorow=mysqli_fetch_array($sqlselect);
         
    //      mail($prorow['email_add'], 'USeP Email', $name." ".'Your account is activated');
/*echo '<script type="text/javascript">';
echo 'alert("Activate/Disable Failed. Invalid password");';*/
//echo 'window.location= "StudentAccounts.php";';
echo '</script>';
}else{echo "error";}
?>