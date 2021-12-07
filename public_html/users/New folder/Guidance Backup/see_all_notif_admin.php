<?php
include('conn.php');
include('session_admin.php');
$id=$_SESSION['id'];
   if (isset($_GET['link'])) {
     $link=$_GET['link'];
   
    $for_link="SELECT * from notif where user_id='$id'";
    	$result=mysqli_query($conn,$for_link);
    if($result = mysqli_query($conn,$for_link)){
    	while ($row = mysqli_fetch_assoc($result)) { 
    					$notif_id=$row['notif_id'];
    					$date=$row['_time'];
                      $update_notif_status="UPDATE notif set message_status='Seen', _time='$date' where notif_id='$notif_id'";
                      $result2=mysqli_query($conn,$update_notif_status);
                      if($result2){
                        header("location:".$link."");
                      }
                      else{
                        echo '<script>
                                  alert("Failed");
                                </script>';
                               
                      }
                    }
                }
header("location:".$link."");
  }           
?>