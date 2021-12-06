<?php 

include("../../../conn.php");
if (isset($_POST['student_id'])){

  $sid= $_POST['student_id'];
  //$AccountStatus= $_POST['AccountStatus'];
  $lname= $_POST['lname'];
  $fname= $_POST['fname'];
  $mname= $_POST['mname'];
  $suffix= $_POST['suffix'];
  $course= $_POST['course'];
  $level= $_POST['level'];
  $section= $_POST['section'];
  //$pic= $_POST['pic'];
  $sex= $_POST['sex'];
  $civil= $_POST['civil'];
  $birthdate= $_POST['birthdate'];
  $birthplace= $_POST['birthplace'];
  $email= $_POST['email'];
  $phone= $_POST['phone'];
  $religion= $_POST['religion'];
  $nationality= $_POST['nationality'];
  $houses= $_POST['houses'];
  $streets= $_POST['streets'];
  $prk= $_POST['prk'];
  $brgy= $_POST['brgy'];
  $city= $_POST['city'];
  $province= $_POST['province'];
  $zip= $_POST['zip'];
  //$section= $_POST['section'];
  $orgname= $_POST['orgname'];
  $position= $_POST['position'];
  //$type= $_POST['type'];
  //$college= $_POST['college'];
  $living= $_POST['living'];
  $othersspecify= $_POST['othersspecify'];
  $guardiancontact= $_POST['guardiancontact'];
  $cityaddress= $_POST['cityaddress'];
  $parentname= $_POST['parentname'];
  $parentoccupation= $_POST['parentoccupation'];
  $parentcontact= $_POST['parentcontact'];
  $parentaddress= $_POST['parentaddress'];
  $spousename= $_POST['spousename'];
  $spouseoccupation= $_POST['spouseoccupation'];
  $status= $_POST['status'];

     $query = mysqli_query($conn, "call UpdateStudentDetails('$sid','$lname','$fname','$mname','$suffix','$houses','$streets','$prk','$brgy','$city','$province','$zip','$nationality','$civil','$religion','$sex','$phone','$birthdate','$birthplace','$email','$section','$level','$living','$othersspecify','$guardiancontact','$cityaddress','$parentname','$parentoccupation','$parentcontact','$parentaddress','$spousename','$spouseoccupation')");
    
          if (!$query) {
                 echo '<script type="text/javascript">'; 
                    echo 'alert("Data has not been forwarded");'; 
                    echo 'window.location= "../StudentAccounts.php";';
                    echo '</script>';
                }
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Data has been forwarded");'; 
                    echo 'window.location= "../StudentAccounts.php";';
                    echo '</script>';
                  }else{echo "error";}
?>