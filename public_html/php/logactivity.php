<?php 

    if (isset($_REQUEST['pageaction'])){
        $activity = $_REQUEST['pageaction'];
        $title = $_REQUEST['pagetitle'];
        log_activity($activity,$page);
    }
    
    function log_activity ($pageaction, $pagetitle){
    include '../conn.php';
        if(session_id() == '') {
            session_start();
        }
    	$ID = $_SESSION["id"];
        $name = $_SESSION["fullname"];
        $usertype =  $_SESSION['usertype'];
        $action = $pageaction;
        $page_name = $pagetitle;
        $datetime = date('Y/h/m h:i:s');
        $ip_address = strip_tags(file_get_contents('http://checkip.dyndns.com/'));
        $final = str_replace("Current IP CheckCurrent IP Address: ","",$ip_address);
        
        $sql = "INSERT INTO activity_log (User_id, Username, User_type ,IP_address,Date_Time ,Activity, Page) VALUES ('$ID','$name','$usertype','$final','$datetime','$action','$page_name')";
    	if ($conn->query($sql) === TRUE) {
          
        } else {
          
        }
    }