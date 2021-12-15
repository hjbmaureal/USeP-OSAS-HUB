<?php
  include_once('connect_db.php');

  $user_id = $_POST['user_id'];
  $password = $_POST['password'];

  if($result = mysqli_query($conn,"SELECT * FROM login_credentials WHERE username = '$user_id'")){
    $row = mysqli_fetch_assoc($result);
    $dbpass = $row['password'];
    if(password_verify($password, $dbpass)){
      die(json_encode(array("statusCode"=>"success")));
    }else{
      die(json_encode(array("statusCode"=>"wrong_password")));
    }
  }
