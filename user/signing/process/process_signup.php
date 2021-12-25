<?php
require_once __DIR__."/../../../core/core.user.php";

function createAccessToken($email, $password){
    $timestamp = time();
    $str = "$email" + "$timestamp" + "$password";
    return md5($str);
}

$name = addslashes($_POST['fullname']);
$email = addslashes($_POST['email']);
$phone_number = addslashes($_POST['phone_number']);
$password = addslashes($_POST['password']);
$avatar = DOMAIN.'user/signing/assets/image/avatar_default.png';
$token = createAccessToken($email,$password);
$sql = "insert into KHACHHANG (hoten,sodienthoai,diachi,email,matkhau,anh,token)
values('$name' , '$phone_number' , '' , '$email' , '$password' , '$avatar', '$token')";

$sql_check = "select count(*) from KHACHHANG
where email = '$email'";
if(executeResult($sql_check)['count(*)'] > 0 ){
    $_SESSION['error_account'] = 'Email đã tồn tại';
    header('location: ../signup.php');
    exit;
}else{
    execute($sql);
    $sql = "select id from KHACHHANG
    where email = '$email'";
    $_SESSION["id"] = executeResult($sql)["id"];
    $_SESSION["name"] = $name;
    $_SESSION["avatar"] = $avatar; 
    header("location: ../../index.php");

}