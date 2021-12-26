<?php
require_once __DIR__."/../../../core/core.user.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql_check_email = "select count(*) from KHACHHANG
where email = '$email'";
$sql_check_password = "select matkhau from KHACHHANG
where email = '$email'";

if(select($sql_check_email)[0]['count(*)'] == 0 ){
    header('location: ../signin.php?error_email=Email không tồn tại');
    exit;
}else if(select($sql_check_password)[0]['matkhau'] != $password ){
    header('location: ../signin.php?error_password=Mật khẩu không chính xác');
    exit;
}else{
    $sql = "select id, hoten, anh, token from KHACHHANG
    where email = '$email' and matkhau = '$password'";
    $user = select($sql)[0];
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['hoten'];
    $_SESSION['avatar'] = $user['anh'];
    if(isset($_POST['remember'])){
        setcookie('remember', $user['token'], time() + (86400*30),"/");
    };
    header("location: ../../index.php");
}