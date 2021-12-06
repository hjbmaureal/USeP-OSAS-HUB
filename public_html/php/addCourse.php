<?php
  include_once("connect_db.php");

  if(isset($_POST['submit'])){
    $subject_code=$_POST['subjectCode'];
    $subject_desc=$_POST['subjectDescription'];
    $subject_college=$_POST['subjectCollege'];
    $subject_course=$_POST['subjectCourse'];
    $subject_sem=$_POST['subjectSemester'];
    $subject_units=$_POST['subjectUnits'];
    $subject_year=$_POST['subjectYear'];
    $table_id;

    $query=mysqli_query($conn,"SELECT semester_load_id from semester_load where 
        course=$subject_course and semester_taken=$subject_sem and year_taken=$subject_year");

    while($row=mysqli_fetch_array($query)){
        $table_id=$row['semester_load_id'];
    }

    $query1=mysqli_query($conn,"insert into $table_id values(
        '$subject_code',
        '$subject_desc',
        '$subject_units')");

    header("Location: ../users/Scholarship/curriculum.php?status=success");
  }else{
    header("Location: ../users/Scholarship/curriculum.php?status=error");
  }