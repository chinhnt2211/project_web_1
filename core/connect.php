<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "project_web_1"); // default password => ""

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// set charset thành utf8mb4
$mysqli->set_charset("utf8mb4");