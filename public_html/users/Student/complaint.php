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
  include('conn.php');
 
if(isset($_POST['submit'])) {    
    $student_id = $_POST['student_id']; 
    $date_submitted = $_POST['date_submitted']; 
    $date_incident = $_POST['date_incident']; 
    $location = $_POST['location']; 
    $time = $_POST['time']; 
    $name = $_POST['name']; 
    $designation = $_POST['designation']; 
    $details = $_POST['details']; 
    $witness1 = $_POST['witness1']; 
    $witness2 = $_POST['witness2']; 
    $witness3 = $_POST['witness3'];

      $result = mysqli_query($conn, "SELECT * FROM list_of_semester where status='Active'");
             $row = mysqli_fetch_assoc($result);
                $sem_year = $row['semester'] .' '. $row['year'];
    
$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$admin_id= $request['staff_id'];

$notif_body = "A student filed a complaint.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$admin_id', '$notif_body',now(),'../users/Osas/Complaints.php', 'Delivered')");
       
$sql = mysqli_query($conn, "call AddComplaint('$date_submitted','$date_incident','$time','$location','$name','$designation','$details','$witness1','$witness2','$witness3','Pending','$student_id', '$sem_year' )");
  
//$query=mysqli_query($con,"call registration('$fname','$email','$password')");
        //char2x rani hahahahha
// echo $student_id . ' '; 
//     echo $date_submitted . ' '; 
//     echo $date_incident . ' '; 
//     echo $location . ' '; 
//     echo $time . ' '; 
//     echo $name . ' '; 
//     echo $designation . ' '; 
//     echo $details . ' '; 
//     echo $witness1 . ' '; 
//     echo $witness2 . ' '; 
//     echo $witness3 . ' ';

//     if (!$sql) {
//                  echo "Affected rows: " . $conn -> affected_rows;
//                 }
        if($sql){
               echo '<script>
   swal({
  title: "Complaint Submitted!",
  text: "Server Request Success",
  type: "success"
}, function () {
  setTimeout(function () {
     window.location.href="Discipline-Complaints.php";
  }, 2000);
});
      </script>';        }
        else{
          echo '<script>
   swal({
  title: "Complaint Submission Failed!",
  text: "Server Request Failed",
  type: "warning"
}, function () {
  setTimeout(function () {
     window.location.href="Discipline-Complaints.php";
  }, 2000);
});
      </script>';
        }
        
    }
 ?>
  </body>
  </html>

