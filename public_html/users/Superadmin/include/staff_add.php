
<?php
include("conn.php");
if(isset($_POST['submit'])) { 
    $lname= $_POST['lname'];
  $fname= $_POST['fname'];
  $mname= $_POST['mname'];
  $suffix= $_POST['suffix'];
  $exten= $_POST['exten'];
  //$pic= $_POST['pic'];
  $sex= $_POST['sex'];
  $religion= $_POST['religion'];
  $nationality= $_POST['nationality'];
  $civil= $_POST['civil'];
  $birthdate= $_POST['birthdate'];
  $birthplace= $_POST['birthplace'];
  $email= $_POST['email'];
  $contact= $_POST['contact'];
  //$section= $_POST['section'];
  $position= $_POST['position'];
  $college= $_POST['college'];
  $type= $_POST['type'];
  $office= $_POST['office'];
  $employment= $_POST['employment'];
  $department = $_POST['department'];
  $level = $_POST['level'];

    $password = $_POST['password'];

    $fileinfo=PATHINFO($_FILES["id_pic"]["name"]);
    $ext = $fileinfo['extension'];


    if(empty($fileinfo['filename'])){
        $location="";
    }

    $query = mysqli_query($conn, "INSERT INTO staff (office_id, dept_id, college_id, title, last_name, first_name, middle_name, suffix, extension, sex, civil_status, birthdate, birthplace, email_add, phone_num, religion, nationality, address, type, position, access_level, employment_status, account_status, e_signature, pic, date_submitted, date_verified, password, pathinfo) VALUES ('$office', '$department', '$college', '', '$lname', '$fname', '$mname', '$suffix', '$exten', '$sex', '$civil', '$birthdate', '$birthplace', '$email', '$contact', '$religion', '$nationality', '', '$type', '$position', '$level', '$employment', 'Activate', NULL, '$location', now(), NULL, '$password', 0) ");

          if (!$query) {
                 echo '<script type="text/javascript">'; 
                    echo 'alert("Data has not been forwarded");'; 
                    echo 'window.location= "Faculty_Staff_Accounts.php";';
                    echo '</script>';
                }
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Data has been forwarded");'; 
                    echo 'window.location= "Faculty_Staff_Accounts.php";';
                    echo '</script>';
    }else{
	echo'sss';}
 ?>