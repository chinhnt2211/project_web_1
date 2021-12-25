<?php
require_once __DIR__."/../../../core/core.user.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql_check_email = "select count(*) from KHACHHANG
where email = '$email'";
$sql_check_password = "select matkhau from KHACHHANG
where email = '$email'";

// die($sql_check_email);
if(executeResult($sql_check_email)['count(*)'] == 0 ){
    header('location: ../signin.php?error_email=Email không tồn tại');
    exit;
}else if(executeResult($sql_check_password)['matkhau'] != $password ){
    header('location: ../signin.php?error_password=Mật khẩu không chính xác');
    exit;
}else{
    $sql = "select id, hoten, anh, token from KHACHHANG
    where email = '$email' and matkhau = '$password'";
    $user = executeResult($sql);
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['hoten'];
    $_SESSION['avatar'] = $user['anh'];
    if(isset($_POST['remember'])){
        setcookie('remember', $user['token'], time() + (86400*30),"/");
    };
    header("location: ../../index.php");
}