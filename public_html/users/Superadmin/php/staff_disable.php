<?php 

include("conn.php");
if (isset($_POST['eid'])){

  $User_id= $_POST['eid'];
  $stats= $_POST['stats'];
  $username= 'superadmin';
  $password= $_POST['password'];

  $stmt = $conn->prepare("SELECT username, password FROM superadmin WHERE username = ?");
        $stmt->bind_param('i', $username);
        $stmt->execute();
        $stmt->bind_result($id, $pass);
        $stmt->store_result();
  while($row = $stmt->fetch()){
    if($username == $id && $password == $pass){
                
               if($stats == "Active"){                
                $msg = "#Activated";
                $sql2="UPDATE staff SET account_status ='$stats' WHERE staff_id = '$User_id' ";
            $conn->query($sql2);
                    echo '<script type="text/javascript">';
                    echo 'alert("The Account Has Been Activated");';
                    echo 'window.location= "../Faculty_Staff_Accounts.php";';
                    echo '</script>';
            }
            else{                
                $msg = "#Disabled";
                mysqli_query($conn, "UPDATE staff SET account_status = '$stats' WHERE staff_id = '$User_id' ");
                    echo '<script type="text/javascript">';
                    echo 'alert("The Account Has Been Disabled");';
                    echo 'window.location= "../Faculty_Staff_Accounts.php";';
                    echo '</script>';
            }
                
            
}else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Activate/Disable Failed. Invalid username or password");';
                    echo 'window.location= "../Faculty_Staff_Accounts.php";';
                    echo '</script>';
                  }
}



    

         /*SELECT EMAIL ADDRESS*/
    //      $sqlselect=mysqli_query($conn,"SELECT * FROM personal_info where User_id='".$User_id."'");
    // $prorow=mysqli_fetch_array($sqlselect);
         
    //      mail($prorow['email_add'], 'USeP Email', $name." ".'Your account is activated');
echo '<script type="text/javascript">';
echo 'alert("Activate/Disable Failed. Invalid password");';
//echo 'window.location= "StudentAccounts.php";';
echo '</script>';
}else{echo "error";}
?>