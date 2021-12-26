<?php
// Kiem tra SESSION va COOKIE 
if (isset($_COOKIE["remember"]) && empty($_SESSION['id'])){
    $token = $_COOKIE["remember"];
    $sql = "select id, hoten, anh from KHACHHANG
        where token = '$token'";
    $_SESSION['id'] = select($sql)[0]['id'];
    $_SESSION['name'] = select($sql)[0]['hoten'];
    $_SESSION['avatar'] = select($sql)[0]['anh'];
};
