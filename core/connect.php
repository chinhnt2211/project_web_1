<?php
require_once __DIR__ . "/config.php";

$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// set charset thành utf8mb4
$mysqli->set_charset("utf8mb4");
