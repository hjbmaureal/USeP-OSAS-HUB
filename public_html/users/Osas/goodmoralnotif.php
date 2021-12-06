<?php 

include('conn.php');

$user_id= $_GET['rn'];

          $user_check_query="SELECT usertype from login_credentials";
          $result2=mysqli_query($conn,$user_check_query);
          $request=mysqli_fetch_assoc($result2);

          $notif_body = 'Your request for Good Moral has been approved.';

          if($request['usertype']=='Student'){
            $result3=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$user_id', '$notif_body',now(),'../users/Student/index.php', 'Delivered')");
          }
          if($request['usertype']=='Alumni'){
            $result3=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$user_id', '$notif_body',now(),'../users/Alumni/index.php', 'Delivered')");
          }
          

        
      header("Location: ReqGoodMoral.php");
		exit();
?>