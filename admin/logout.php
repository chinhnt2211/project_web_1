<?php
require_once(__DIR__ . "/../core/core.php");

@session_destroy();

header("Location: ./login.php");