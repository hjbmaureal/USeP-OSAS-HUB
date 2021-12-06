<?php
  session_start();
  include('conn.php');

 
// Removing session data
if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
}

if(isset($_SESSION['usertype'])){
    unset($_SESSION['usertype']);
}

if(isset($_SESSION['offfice'])){
    unset($_SESSION['office']);
}
  session_destroy();
  header('location:index.php');
?>