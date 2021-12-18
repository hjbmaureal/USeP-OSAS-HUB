<?php  
//check.php  
$connect = mysqli_connect("localhost", "root", "", "backupdb-3"); 
if(isset($_POST["username"]))
{
 $username = mysqli_real_escape_string($connect, $_POST["username"]);
 $query = "SELECT * FROM login_credentials WHERE username = '".$username."' AND account_status='Active'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}
?>