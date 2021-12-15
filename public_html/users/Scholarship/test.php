<?php
  include_once('../../php/connect_db.php');
  if($result = mysqli_query($conn,"SELECT * FROM login_credentials WHERE username = '235'")){
    echo 'ENDS';
    $row = mysqli_fetch_assoc($result);
    $dbpass = $row['password'];
    if(password_verify('123', $dbpass)){
      // die(json_encode(array("statusCode"=>"success")));
      echo 'S';
    }else{
      echo 'F';
      // die(json_encode(array("statusCode"=>"wrong_password")));
    }
  }

  echo 'END';