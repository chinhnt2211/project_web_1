<?php
// bật session lên nào
session_status() !== PHP_SESSION_ACTIVE && session_start();
// kết nối các hàm tương tác với csdl
require_once __DIR__ . "/interact.database.php";
// session này dành cho bên nhân viên, quản lý ở mục /admin
require_once __DIR__ . "/session.staff.php";



// chĩ cần require file này vào là dùng được