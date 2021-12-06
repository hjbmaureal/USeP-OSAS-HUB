<?php
  include_once("connect_db.php");
  if(isset($_POST['updateProvider'])){

    $scholarship_id = $_POST['scholarship_id_update'];
    $scholarship_org = $_POST['scholarship_org_update'];
    $scholarship_name = $_POST['scholarship_name_update'];
    $scholarship_type = $_POST['scholarship_type_update'];
    $scholarship_status = $_POST['scholarship_status_update'];
    $scholarship_amount = $_POST['scholarship_amount_update'];

    $stmt = $conn->prepare("UPDATE scholarship_program SET program_provider = ?, program_name = ?, type = ?, program_status = ?, amount = ? WHERE program_id = ?");
    $stmt->bind_param("ssssss", $scholarship_org, $scholarship_name, $scholarship_type, $scholarship_status,$scholarship_amount,$scholarship_id);
    $stmt->execute();
    header("Location: ../users/Scholarship/provider-list.php?operation=success");
  }