<?php

  include_once("connect_db.php");
  if(isset($_POST['update-provider'])){
    $status = $_POST['setStatus'];
    echo $status;
    foreach($_POST['select'] AS $value){
      $stmt = $conn->prepare("UPDATE scholarship_program SET program_status = ? WHERE program_id = ?");
      $stmt->bind_param("ss", $status, $value);
      $stmt->execute();
    }
    header("Location: ../users/Scholarship/provider-list.php?operation=success");
  }