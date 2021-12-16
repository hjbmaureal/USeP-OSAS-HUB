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
    if (isset($_POST['submit'])){
      $sid = $_POST['staff_id'];  
      $lname= $_POST['lname'];
      $fname= $_POST['fname'];
      $mname= $_POST['mname'];
      $suffix= $_POST['suffix'];
      $exten= $_POST['exten'];
      $sex= $_POST['sex'];
      $nationality= $_POST['nationality'];
      $civil= $_POST['civil'];
      $birthdate= $_POST['birthdate'];
      $email= $_POST['email'];
      $contact= $_POST['contact'];
      $password = $_POST['password'];
      $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $employment= $_POST['employment'];
      $address = $_POST['address'];
      $religion = $_POST['religion'];
      $title = $_POST['title'];
        
        $sql="UPDATE staff SET 
        title = '$title', 
        last_name = '$lname', 
        first_name = '$fname', 
        middle_name = '$mname', 
        suffix = '$suffix', 
        extension = '$exten', 
        sex = '$sex', 
        civil_status = '$civil', 
        birthdate = '$birthdate', 
        email_add = '$email', 
        phone_num = '$contact', 
        religion = '$religion', 
        nationality = '$nationality', 
        address = '$address', 
        employment_status = '$employment',
        password = '$hashed_pass'
        WHERE staff_id = '$sid' ";

    $query = $conn->query($sql);
    if (!$query) {
       echo '<script>
       swal({
          title: "Update Failed.",
          text: "Unable to update data. Try again.",
          type: "warning"
          }, function () {
            setTimeout(function () {
              window.location.href="../Faculty_Staff_Accounts.php";
              }, 500);
              });
              </script>'; 
              $_conn['error'] = $conn->error;
              echo $conn->error;

          }else{
            echo '<script>
            swal({
              title: "Updated Successfully",
              text: "Data has been updated.",
              type: "success"
              }, function () {
                setTimeout(function () {
                  window.location.href="../Faculty_Staff_Accounts.php";
                  }, 500);
                  });
                  </script>'; 
              }}
          ?>