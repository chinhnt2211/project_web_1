<?php
require_once(__DIR__ . "/../core/core.php");

<<<<<<< HEAD
session_destroy();
=======
@session_destroy();

>>>>>>> origin/main
header("Location: ./login.php");