<?php
include('conn.php');
if(isset($_POST['open_notif'])){
    $notif_id= $_POST['notif_id'];
    $for_link="SELECT * from notif where notif_id='$notif_id'";
      $result=mysqli_query($conn,$for_link);
      while ($row = mysqli_fetch_assoc($result)) { 
              $date=$row['time'];
                      $update_notif_status="UPDATE notif set message_status='Seen', time='$date' where notif_id='$notif_id'";
                      $result2=mysqli_query($conn,$update_notif_status);
                      if($result2){
                        header("location:".$row['link']."");
                      }
                      else{
                        echo '<script>
                                  alert("Failed");
                                </script>';
                      }
                    }
                }
?>