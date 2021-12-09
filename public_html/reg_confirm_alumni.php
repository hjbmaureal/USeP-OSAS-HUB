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
    $course = $_POST['course'];
    $major = $_POST['major'];
    $year = $_POST['year'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];



    $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $pass = $_POST['password'];

    $location = addslashes(file_get_contents($_FILES["id_pic"]["tmp_name"]));
    /*$location2 = addslashes(file_get_contents($_FILES["prof_pic"]["tmp_name"]));*/



    
if ($major == "null") {
     $course_sql = "SELECT course_id FROM course WHERE name = '".$course."' and major is null";  
}else{
    $course_sql = "SELECT course_id FROM course WHERE name = '".$course."' and major = '".$major."'";
}
    $result = $conn->query($course_sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $course_id = $row['course_id']; 
    }
    }   
    /*
        
            echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
        }
    } else {
        echo "0 results";
    }*/

    $datenow =  date("Y-m-d");


    $sql = "INSERT INTO alumni (
    id,
    course_id,
    first_name,
    last_name,
    middle_name,
    suffix,
    email_add,
    contact,
    last_sy_attended,
    password,
    school_id_pic,
    date_registered,
    date_verified)
    VALUES (
    '$id_num',
    '$course_id',
    '$first_name',
    '$last_name',
    '$middle_name',
    '$ex_suff',
    '$email', 
    '$phone', 
    '$year', 
    '$pass', 
    '$location',  
    '$datenow', 
    '$datenow' );";

    /*$result=mysqli_query($conn,$sql) or die (mysqli_error($conn));




    header('Location:index.php');*/

     if($conn->query($sql)){
      $_conn['success'] = 'Updated successfully';

      //Notification
      $user_id= 1;
      $notif_body = "Alumni Accounts has new pre-registered alumni.";
      $notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$user_id', '$notif_body',now(),'PreAlumni.php', 'Delivered')");
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
          }
          else{ 
            $_conn['error'] = $conn->error;
            echo $conn->error;
            echo $course. ' '. $major;
            die($sql);

            echo '<script>
            swal({
              title: "Registration Failed!",
              text: "Try again.",
              type: "warning"
              }, function () {
                setTimeout(function () {
                  window.location.href="index.php";
                  }, 500);
                  });
                  </script>'; 
                }

              }
              else{
                echo '<script>
                swal({
                  title: "Registration Failed",
                  text: "Try again.",
                  type: "warning"
                  }, function () {
                    setTimeout(function () {
                      window.location.href="index.php";
                      }, 500);
                      });
                      </script>'; 
                    }

                    ?>









