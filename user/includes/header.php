<?php
require_once(__DIR__ . "/../lib/php/functions.php");
require_once(__DIR__ . "/../lib/core/core.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= DOMAIN ?>user/includes/assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <!-- Header -->
    <div class="container-header">
        <h1>Xin chào</h1>
        <?php
        checkCookie(isset($_COOKIE['remember']));
        if (isset($_SESSION["id"])) {
            echo $_SESSION["name"];
        ?>
            <div class="avatar" style="background-image: url('<?= $_SESSION['avatar'] ?>')"></div>
            <br>
            <a href="<?= DOMAIN ?>user/index.php">Trang chu</a>
            <br>
            <a href="<?= DOMAIN ?>user/profile/index.php">Chỉnh sửa thông tin người dùng</a>
            <br>
            <a href="<?= DOMAIN ?>user/profile/cart.php">Giỏ hàng</a>
            <br>
            <a href="<?= DOMAIN ?>user/signing/signout.php">Đăng xuất</a>
        <?php
        } else {
        ?>
            <a href="<?= DOMAIN ?>user/signing/signin.php">Đăng nhập</a>
            <br>
            <a href="<?= DOMAIN ?>user/signing/signup.php">Đăng ký</a>
        <?php
        }
        ?>
        <form method="get" action="<?= DOMAIN ?>user/index.php">
            <input type="text" name="find" value="<?php if (isset($_GET["find"])) echo $_GET["find"] ?>">
            <button>TÌm kiếm</button>
        </form>
    </div>