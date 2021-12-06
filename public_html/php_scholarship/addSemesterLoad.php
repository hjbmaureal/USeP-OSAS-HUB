<?php

  include_once("connect_db.php");

  if(isset($_POST["submit"])){
    $course = $_POST['loadCourse'];
    $college = $_POST['loadCollege'];
    $semester = $_POST['loadSemester'];
    $year = $_POST['loadYear'];
    
    $query = mysqli_query($conn, "INSERT into semester_load values('','$course','$college','$semester','$year')");
    header("Location: ../users/Scholarship/curriculum.php?status=success");
  }else{
    header("Location: ../users/Scholarship/curriculum.php?status=failed");
  }