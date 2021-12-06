<?php
  include_once("connect_db.php");
  if(isset($_POST['changeSemester'])){
    $month = date('m');
    if($month == 8){ // AUGUST FIRST SEMESTER
      echo 'August';
    }else if($month == 1){ //JANUARY SECOND SEMESTER
      echo 'January';
    }else if($month == 6){ // JUNE SUMMER
      echo 'June';
    }
  }