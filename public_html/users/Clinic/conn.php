<?php

$conn = new mysqli('localhost', 'root', '', 'osasdb_latest4');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
