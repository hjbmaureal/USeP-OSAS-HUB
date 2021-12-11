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
$currSemesterYear = "";
$month= "";
$august_year="";
$january_june_year="";
  if(isset($_POST['changeSemester'])){
    $month = date('m');
    $august_year1 = date('Y');
    $august_year2 = date('Y') + 1;
    $august_year = $august_year1.'-'.$august_year2;
    $january_june_year = date('Y') - 1 .'-'.date('Y');

    $username= 'superadmin';
  $pass= $_POST['pass'];
  $stmt = $conn->prepare("SELECT * FROM superadmin WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $user = $stmt->get_result()->fetch_assoc();


  if (password_verify($pass, $user['password'])){
    $stmt = $conn->prepare("call ScholarshipChangeSemesterEvent(?,?)");
    if($month == 8){ // AUGUST FIRST SEMESTER
      //CHANGESEMESTEREVENT
      $check = $stmt->bind_param("ss",$month, $august_year);
    }else if($month == 1){ // JANUARY SECOND SEMESTER
      //CHANGESEMESTEREVENT
      $check = $stmt->bind_param("ss",$month, $january_june_year);
    }else if($month == 6){ // JUNE SUMMER/OFF SEMESTER
      //CHANGESEMESTEREVENT
      $check = $stmt->bind_param("ss",$month, $january_june_year);
    }
    $stmt->execute();
    if($stmt){
     /* echo '<script>swal("You have successfully changed semester!", "Welcome to our new Semester", "success"), function () {
              setTimeout(function () {
               window.location.href="../index.php";
               }, 500);
               }</script>';*/
      echo '<script>
          swal({
            title: "You have successfully changed semester!",
            text: "Welcome to our new Semester.",
            type: "success"
            }, function () {
              setTimeout(function () {
               window.location.href="../index.php";
               }, 500);
               });
               </script>';
    }else{
      echo '<script>
          swal({
            title: "Change semester Failed.",
            type: "warning"
            }, function () {
              setTimeout(function () {
               window.location.href="../index.php";
               }, 500);
               });
               </script>';
    }
  }else{
    echo '<script>
          swal({
            title: "Invalid Password",
            text: "Try again.",
            type: "warning"
            }, function () {
              setTimeout(function () {
               window.location.href="../index.php";
               }, 500);
               });
               </script>';
  }
    

   

    //temporary ra ni for testing, manual input ra
    //$month = 6;
    /*$january_june_year = "2021-2022";*/

    // printf($august_year);
    // printf($january_june_year);
    
  }


    ?>
     <script src="../../../js/jquery-3.3.1.min.js"></script>
      <script src="../../../js/popper.min.js"></script>
      <script src="../../../js/bootstrap.min.js"></script>
      <script src="../../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../../js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="../../../js/plugins/sweetalert.min.js"></script>
  </body>
  </html>