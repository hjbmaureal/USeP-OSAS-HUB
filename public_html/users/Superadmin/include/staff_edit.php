<?php 

include("conn.php");
if (isset($_POST['submit'])){

  $sid= $_POST['sid'];
  $lname= $_POST['lname'];
  $fname= $_POST['fname'];
  $mname= $_POST['mname'];
  $suffix= $_POST['suffix'];
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

  
    $sql="UPDATE staff SET first_name = '$fname', middle_name = '$mname', last_name = '$lname', suffix = '$suffix', position = '$position', sex = '$sex', religion = '$religion', nationality = '$nationality', civil_status = '$civil', birthdate = '$birthdate', birthplace = '$birthplace', email_add = '$email', phone_num = '$contact', type = '$type', dept_id = '$department', office_id = '$office', employment_status = '$employment', college_id = '$college', access_level = '$level' WHERE staff_id = '$sid' ";
    
         $query = $conn->query($sql);
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
}else{echo "error";}
?>