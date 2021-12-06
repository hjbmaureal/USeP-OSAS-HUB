<?php
  include_once("connect_db.php");
  if(isset($_POST["addProvider"])){
    $scholarship_org = $_POST['scholarship_org_input'];
    $scholarship_name = $_POST['scholarship_name_input'];
    $scholarship_type = $_POST['scholarship_type_input'];
    $scholarship_status = $_POST['scholarship_status_input'];
    $scholarship_amount=$_POST['scholarship_amount_input'];

    $stmt = $conn->prepare("call addProvider(?,?,?,?,?)");
    $stmt->bind_param("sssss", $scholarship_org, $scholarship_name, $scholarship_type, $scholarship_status, $scholarship_amount);
    $stmt->execute();

    header("Location: ../users/Scholarship/provider-list.php?status=success");
  }else{
    header("Location: ../users/Scholarship/provider-list.php?status=failed");
  }