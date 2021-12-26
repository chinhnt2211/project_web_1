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

$data = [
    "hoten" => $name,
    "sodienthoai" => $phone_number,
    "diachi" => "",
    "email" => $email,
    "matkhau" => $password,
    "anh" => $avatar,
    "token" => $token
];
$sql = "select count(*) from KHACHHANG
where email = '$email'";
if(select($sql)[0]['count(*)'] > 0 ){
    $_SESSION['error_account'] = 'Email đã tồn tại';
    header('location: ../signup.php');
    exit;
}else{
    insert("KHACHHANG",$data);
    $sql = "select id from KHACHHANG
    where email = '$email'";
    $_SESSION["id"] = select($sql)[0]["id"];
    $_SESSION["name"] = $name;
    $_SESSION["avatar"] = $avatar; 
    header("location: ../../index.php");

}