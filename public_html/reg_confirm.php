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

if(isset($_POST['submit'])) {   

    $id_num = $_POST['id_num'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $ex_suff = $_POST['ex_suff'];
    $gender = $_POST['gender'];
    $civil = $_POST['civil'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $studenttype = $_POST['studenttype'];
    $birthday =date('Y-m-d',strtotime($_POST['birthday']));
    $birth_place = $_POST['birth_place'];
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];

    $blckNo = $_POST['blckNo'];
    $street = $_POST['street'];
    $prk = $_POST['prk'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zcode = $_POST['zcode'];

    $course = $_POST['course'];;
    $major = $_POST['major'];
    $section = $_POST['section'];
    $year = $_POST['year'];
    $studenttype = $_POST['studenttype'];

    $null = 'N/A';

    $sdfLivingWithUpdate = $_POST['sdfLivingWithUpdate'];
   /* $sdfLivingWithSpecifyUpdate = $_POST['sdfLivingWithSpecifyUpdate'];
    $sdfContactNumberUpdate = $_POST['sdfContactNumberUpdate'];
    $sdfCityAddressUpdate = $_POST['sdfCityAddressUpdate'];

     $sdfParentNameUpdate = $_POST['sdfParentNameUpdate'];
      $sdfParentOccupationUpdate = $_POST['sdfParentOccupationUpdate'];
      $sdfParentContactNumberUpdate = $_POST['sdfParentContactNumberUpdate'];
      $sdfParentAddressUpdate = $_POST['sdfParentAddressUpdate'];   */

   if((!empty($_POST['sdfContactNumberUpdate'])) && (!empty($_POST['sdfCityAddressUpdate'])) ){
      $sdfContactNumberUpdate = $_POST['sdfContactNumberUpdate'];
      $sdfCityAddressUpdate = $_POST['sdfCityAddressUpdate'];
  }else{
      $sdfContactNumberUpdate = "N/A";
      $sdfCityAddressUpdate = "N/A";
  }

      if((!empty($_POST['sdfLivingWithSpecifyUpdate'])) ){
      $sdfLivingWithSpecifyUpdate = $_POST['sdfLivingWithSpecifyUpdate'];
      $sdfContactNumberUpdate = $_POST['sdfContactNumberUpdate'];
      $sdfCityAddressUpdate = $_POST['sdfCityAddressUpdate'];
  }else{
      $sdfLivingWithSpecifyUpdate = "N/A";
      $sdfContactNumberUpdate = "N/A";
      $sdfCityAddressUpdate = "N/A";
  }

  if((isset($_POST['sdfParentNameUpdate'])) && (isset($_POST['sdfParentOccupationUpdate'])) && (isset($_POST['sdfParentContactNumberUpdate'])) && (isset($_POST['sdfParentAddressUpdate'])) ){
      $sdfParentNameUpdate = $_POST['sdfParentNameUpdate'];
      $sdfParentOccupationUpdate = $_POST['sdfParentOccupationUpdate'];
      $sdfParentContactNumberUpdate = $_POST['sdfParentContactNumberUpdate'];
      $sdfParentAddressUpdate = $_POST['sdfParentAddressUpdate'];
  }else{
      $sdfParentNameUpdate = "N/A";
      $sdfParentOccupationUpdate = "N/A";
      $sdfParentContactNumberUpdate = "N/A";
      $sdfParentAddressUpdate = "N/A";
  }

$location3 = addslashes(file_get_contents($_FILES["id_pic"]["tmp_name"]));
  $location = addslashes(file_get_contents($_FILES["id_pic"]["tmp_name"]));
  $sdfSpouseUpdate = $_POST['sdfSpouseUpdate'];
  $sdfSpouseOccupationUpdate = $_POST['sdfSpouseOccupationUpdate'];

  $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $pass = $_POST['password'];

/*  $fileinfo=PATHINFO($_FILES["id_pic"]["name"]);
  $ext = $fileinfo['extension'];

  $fileinfo2=PATHINFO($_FILES["cor"]["name"]);
  $ext2 = $fileinfo2['extension'];

  if(empty($fileinfo['filename'])){
    $location="";
}
if($ext != "png" && $ext != "jpeg" && $ext != "jpg" && $ext != "PNG" && $ext != "JPEG" && $ext != "JPG"){
    $msg = "?status=err";
    header("Location: reg.php".$msg);
    exit();
}
if($ext2 != "pdf" && $ext != "PDF"){
    $msg = "?status=err";
    header("Location: reg.php".$msg);
    exit();
}
else{
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    $newFilename2=$fileinfo2['filename'] ."_". time() . ".".$fileinfo2['extension'];
    move_uploaded_file($_FILES["id_pic"]["tmp_name"],"docs/student_id/" . $newFilename);
    move_uploaded_file($_FILES["cor"]["tmp_name"],"docs/student_cor/".$newFilename2);
    $location="student_id/" . $newFilename;
    $location2="student_cor/".$newFilename2;
}*/


    $fileinfo2=PATHINFO($_FILES["cor"]["name"]);
    $newFilename2=$fileinfo2['filename'] ."_". time() . ".".$fileinfo2['extension'];
    move_uploaded_file($_FILES["cor"]["tmp_name"],"registration-files/student_cor/".$newFilename2);
    $location2="student_cor/".$newFilename2;

if ($major == "null") {
     $course_sql = "SELECT course_id FROM course WHERE name = '".$course."' and major is null";  
}else{
    $course_sql = "SELECT course_id FROM course WHERE name = '".$course."' and major = '".$major."'";
}

//$course_sql = "SELECT course_id FROM course WHERE name = '".$course."' and major = '".$major."' or major is null";
    $result = $conn->query($course_sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $course_id = $row['course_id']; 
    }
    }   

// Prepare an insert statement
$sql = "call spRegisterStudent(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt,"ssssssssssssssssssssssssssssssssssssssss",
        $id_num,
        $last_name,
        $first_name,
        $middle_name,
        $ex_suff,
        $blckNo,
        $street,
        $prk,
        $barangay,
        $city,
        $province,
        $zcode,
        $gender,
        $civil,
        $religion,
        $nationality,
        $birthday,
        $birth_place,
        $course_id,
        $year,
        $section,
        $email,
        $phone,
        $studenttype,
        $sdfLivingWithUpdate,
        $null,
        $sdfLivingWithSpecifyUpdate,
        $sdfCityAddressUpdate,
        $sdfContactNumberUpdate,
        $null,
        $sdfParentNameUpdate,
        $sdfParentOccupationUpdate,
        $sdfParentAddressUpdate,
        $sdfParentContactNumberUpdate,
        $sdfSpouseUpdate,
        $sdfSpouseOccupationUpdate,
        $null,
        $pass,
        $location3,
        $location2);
    
        if(mysqli_stmt_execute($stmt)){

            //Notification
      $user_id= 1;
      $notif_body = "Student Accounts has new pre-registered student.";
      $notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$user_id', '$notif_body',now(),'PreStudent.php', 'Delivered')");

         echo '<script>
      swal({
        title: "Registration Complete",
        text: "Please wait for email confirmation. ",
        type: "success"
        }, function () {
          setTimeout(function () {
            window.location.href="index.php";
            }, 500);
            });
            </script>';
    } else{
          die (mysqli_error($conn)); 
        echo '<script>
            swal({
             title: "Sorry! Please try again.",
              text: "An error has occured upon submitting the form.",
              type: "warning"
              }, function () {
                setTimeout(function () {
                  window.location.href="reg.php";
                  }, 500);
                  });
                  </script>'; 
    }
} else{
     die (mysqli_error($conn)); 
    echo '<script>
            swal({
              title: "Sorry, please try again.",
              text: "An error has occured upon submitting the form1.",
              type: "warning"
              }, function () {
                setTimeout(function () {
                  window.location.href="reg.php";
                  }, 500);
                  });
                  </script>'; 
}

        // Attempt to execute the prepared statement
   /* if(mysqli_stmt_execute($stmt)){
        echo "<div class='collapse'>Records inserted successfully.</div>";
    } else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
    }
} else{
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);
}*/


/*header('Location:index.php');*/

}
?>

