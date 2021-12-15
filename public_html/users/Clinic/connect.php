<?php

$db = new mysqli('localhost', 'root', '', 'backupdb-3');

if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
