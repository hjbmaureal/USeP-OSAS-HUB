<?php
session_start();
include("conn.php");

unset($_SESSION['id']);
header('location:index.php');

?>
