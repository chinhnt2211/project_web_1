<?php
session_start();
require_once("../../lib/db/dbhelpler.php");
require_once("../../lib/php/functions.php");

$name = addslashes($_POST['name']);
$phone_number = addslashes($_POST['phone_number']);
$address = addslashes($_POST['address']);
if(isset($_POST['avatar'])){
    $avatar = $_POST['avatar'];
}else{
    $avatar = $_SESSION['avatar'];
}
$id = $_SESSION['id'];
$sql = "update KHACHHANG 
set hoten = '$name' , sodienthoai = '$phone_number' , diachi = '$address' , anh = '$avatar'
where id = '$id'";
execute($sql);
$_SESSION['name'] = $name;
$_SESSION['avatar'] = $avatar;
header("location: ../index.php");
