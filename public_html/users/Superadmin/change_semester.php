<?php 
include('conn.php');
$currSemesterYear = "";
  if(isset($_POST['changeSemester'])){
    $month = date('m');
    $august_year = date('Y').'-'.date('Y') + 1;
    $january_june_year = date('Y') - 1 .'-'.date('Y');

    //temporary ra ni for testing, manual input ra
    $month = 6;
    $january_june_year = "2021-2022";

    // printf($august_year);
    // printf($january_june_year);
    $stmt = $conn->prepare("call ScholarshipChangeSemesterEvent(?,?)");
    if($month == 8){ // AUGUST FIRST SEMESTER
      //CHANGESEMESTEREVENT
      $check = $stmt->bind_param("ss",$month, $august_year);
    }else if($month == 1){ // JANUARY SECOND SEMESTER
      //CHANGESEMESTEREVENT
      $check = $stmt->bind_param("ss",$month, $january_june_year);
    }else if($month == 6){ // JUNE SUMMER/OFF SEMESTER
      //CHANGESEMESTEREVENT
      $check = $stmt->bind_param("ss",$month, $january_june_year);
    }
    $stmt->execute();
  }
 ?>