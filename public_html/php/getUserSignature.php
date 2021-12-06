<?php 
	session_start();
    $data = array($_SESSION['user_signature']);
	echo  json_encode($data);