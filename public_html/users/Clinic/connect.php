<?php

$db = new mysqli('localhost', 'root', '', 'backupdb-3');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

?>
