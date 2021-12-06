<?php
  session_start();
  function checkSessionAuth($session, $userType){
    if(!$session || !$userType){
      die(header("Location: ../../index.php?login-first"));
    }
    // check if staff office matches
    if($userType == "Coordinator"){
      checkStaff($userType);
    }else{
      checkStudent($userType);
    }
  }

  function checkStaff($userType){
    if($userType != "Coordinator"){
      session_unset();
      session_destroy();
      die(header("Location: ../../index.php?illegal-cross-page"));
    }
  }
  function checkStudent($userType){
    if($userType != "Student"){
      session_unset();
      session_destroy();
      die(header("Location: ../../index.php?illegal-cross-page"));
    }
  }
  //check session time
  function checkSessionTime(){
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
      // last request was more than 30 minutes ago
      session_unset();     // unset $_SESSION variable for the run-time 
      session_destroy();   // destroy session data in storage
      die(header("Location: ../../index.php?session-timed-out"));
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
  }

  if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    die(header("Location: ../index.php?logged-out"));
  }