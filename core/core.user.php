<?php
session_status() !== PHP_SESSION_ACTIVE && session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

require_once __DIR__ ."/interact.database.php"; 
require_once __DIR__ ."/session.user.php";
