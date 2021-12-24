<?php
require_once(__DIR__. "/../db/dbhelpler.php") ;

function createAccessToken($email, $password)
{
    $timestamp = time();
    $str = "$email" + "$timestamp" + "$password";
    return md5($str);
}

function checkCookie($boolean){
    if ($boolean) {
        $token = $_COOKIE["remember"];
        $sql = "select id, hoten, anh from KHACHHANG
        where token = '$token'";
        $_SESSION['id'] = executeResult($sql)['id'];
        $_SESSION['name'] = executeResult($sql)['hoten'];
        $_SESSION['avatar'] = executeResult($sql)['anh'];
    };
}