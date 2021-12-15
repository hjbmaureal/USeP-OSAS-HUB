<?php  
//check.php  
include('connect.php');
if(isset($_POST["app_date"],$_POST["start_time"],$_POST["end_time"]))
{

  $start_time = mysqli_real_escape_string($db, $_POST["start_time"]);
   $end_time = mysqli_real_escape_string($db, $_POST["end_time"]);
    $dateapp = mysqli_real_escape_string($db, $_POST["app_date"]);
 $query = "SELECT * FROM consultation WHERE  appointment_date='$dateapp' AND appointment_timefrom ='$start_time' AND appointment_timeto='$end_time'";
 $result = mysqli_query($db, $query);
 echo mysqli_num_rows($result);
}
?>