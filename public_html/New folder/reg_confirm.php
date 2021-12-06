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

    $course = isset($_POST['major']) ? $_POST['major'] : $_POST['course'];
    $section = $_POST['section'];
    $year = $_POST['year'];
    $studenttype = $_POST['studenttype'];

    $null = 'NULL';

    $sdfLivingWithUpdate = $_POST['sdfLivingWithUpdate'];

    if((isset($_POST['sdfLivingWithSpecifyUpdate'])) || (isset($_POST['sdfContactNumberUpdate'])) || (isset($_POST['sdfCityAddressUpdate'])) ){
      $sdfLivingWithSpecifyUpdate = $_POST['sdfLivingWithSpecifyUpdate'];
      $sdfContactNumberUpdate = $_POST['sdfContactNumberUpdate'];
      $sdfCityAddressUpdate = $_POST['sdfCityAddressUpdate'];
  }else{
      $sdfLivingWithSpecifyUpdate = "NULL";
      $sdfContactNumberUpdate = "NULL";
      $sdfCityAddressUpdate = "NULL";
  }

  if((isset($_POST['sdfParentNameUpdate'])) && (isset($_POST['sdfParentOccupationUpdate'])) && (isset($_POST['sdfParentContactNumberUpdate'])) && (isset($_POST['sdfParentAddressUpdate'])) ){
      $sdfParentNameUpdate = $_POST['sdfParentNameUpdate'];
      $sdfParentOccupationUpdate = $_POST['sdfParentOccupationUpdate'];
      $sdfParentContactNumberUpdate = $_POST['sdfParentContactNumberUpdate'];
      $sdfParentAddressUpdate = $_POST['sdfParentAddressUpdate'];
  }else{
      $sdfParentNameUpdate = "NULL";
      $sdfParentOccupationUpdate = "NULL";
      $sdfParentContactNumberUpdate = "NULL";
      $sdfParentAddressUpdate = "NULL";
  }
  
  $sdfSpouseUpdate = $_POST['sdfSpouseUpdate'];
  $sdfSpouseOccupationUpdate = $_POST['sdfSpouseOccupationUpdate'];

  $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $pass = $_POST['password'];


  $file = "";
    if(!file_exists($_FILES['id_pic']['tmp_name']) || !is_uploaded_file($_FILES['id_pic']['tmp_name'])) {
        $file = "";
    } else {
        $file = addslashes(file_get_contents($_FILES["id_pic"]["tmp_name"]));
    }


  // $fileinfo=PATHINFO($_FILES["id_pic"]["name"]);
  // $ext = $fileinfo['extension'];

  $fileinfo2=PATHINFO($_FILES["cor"]["name"]);
  $ext2 = $fileinfo2['extension'];

//   if(empty($fileinfo['filename'])){
//     $location="";
// }
// if($ext != "png" && $ext != "jpeg" && $ext != "jpg" && $ext != "PNG" && $ext != "JPEG" && $ext != "JPG"){
//     $msg = "?status=err";
//     header("Location: reg.php".$msg);
//     exit();
// }
if($ext2 != "pdf" && $ext != "PDF"){
    $msg = "?status=err";
    header("Location: reg.php".$msg);
    exit();
}
else{
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    $newFilename2=$fileinfo2['filename'] ."_". time() . ".".$fileinfo2['extension'];
    move_uploaded_file($_FILES["id_pic"]["tmp_name"],"docs/student_id/" . $newFilename);
    move_uploaded_file($_FILES["cor"]["tmp_name"],"registration-files/student_cor/".$newFilename2);
    $location="../../images/student_id/" . $newFilename;
    $location2="../../registration-files/student_cor/".$newFilename2;
}




// Prepare an insert statement
$sql = "call spRegisterStudent(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

if($stmt = mysqli_prepare($conn, $sql)){
     //   Bind variables to the prepared statement as parameters
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
        $course,
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
        $hashed_pass,
        $file,
        $location2);
    
      //Notification
      $user_id= 1;
      $notif_body = "Student Accounts has new pre-registered student.";
      $notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$user_id', '$notif_body',now(),'PreStudent.php', 'Delivered')");
      //  Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        echo "<div class='collapse'>Records inserted successfully.</div>";
    } else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
    }
} else{
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);
}


header('Location:index.php');

}
?>




