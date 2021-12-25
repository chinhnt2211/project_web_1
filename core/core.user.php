<?php
session_status() !== PHP_SESSION_ACTIVE && session_start();

require_once __DIR__ ."/interact.database.php"; 
require_once __DIR__ ."/session.user.php";
