<?php
$mysqli = new mysqli("localhost", "root", "", "project_web_1"); // default password => ""

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}