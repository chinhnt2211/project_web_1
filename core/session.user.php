<?php
// Kiem tra SESSION va COOKIE 
if (isset($_COOKIE["remember"]) && empty($_SESSION['id'])){
    $token = $_COOKIE["remember"];
    $sql = "select id, hoten, anh from KHACHHANG
        where token = '$token'";
    $_SESSION['id'] = executeResult($sql)['id'];
    $_SESSION['name'] = executeResult($sql)['hoten'];
    $_SESSION['avatar'] = executeResult($sql)['anh'];
};
