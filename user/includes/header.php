<?php
ob_start();
require_once __DIR__ . "/../../core/core.user.php";
?>
<!-- Process - Header -->
<!DOCTYPE html>
<html lang="en" style="background-image: url('<?= DOMAIN ?>user/includes/assets/images/background.jpg');">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= DOMAIN ?>user/includes/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body style="background-color:unset;">
    <!-- Header -->
    <header class="container-header">
        <div class="container-header-top">
            <div class="wrapper-header-top">
                <div class="left">
                    <div class="logo-menu">
                        <div class="logo">
                            <a href="<?= DOMAIN ?>">
                                <div class="image-logo" style="background-image: url(https://salt.tikicdn.com/ts/upload/ae/f5/15/2228f38cf84d1b8451bb49e2c4537081.png);">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="form-search">
                        <form class="wrapper-search" method="get" action="<?= DOMAIN ?>user/index.php">
                            <input type="text" name="find" placeholder="Tìm sản phẩm, danh mục hay thương hiệu mong muốn ..." value="<?php if (isset($_GET["find"])) echo $_GET["find"] ?>" class="input-search">
                            <button class="btn-search">
                                <i class="fas fa-search fa-lg"></i>
                                TÌm kiếm
                            </button>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <?php if (isset($_SESSION["id"])) { ?>
                        <div class="wrapper-account-user">
                            <div class="avatar-user">
                                <div style="background-image: url('<?= $_SESSION['avatar'] ?>')"></div>
                            </div>
                            <span class="account">
                                <span class="account-label-1">Tài Khoản</span>
                                <span class="account-label-2"><?= $_SESSION["name"] ?><i class="fas fa-caret-down"></i></span>
                            </span>
                            <div class="wrapper-account-menu toggler">
                                <a href="<?= DOMAIN ?>user/profile/index.php">
                                    <p class="account-menu-title">Hồ sơ</p>
                                </a>
                                <a href="<?= DOMAIN ?>user/profile/purchase.php">
                                    <p class="account-menu-title">Đơn mua của tôi</p>
                                </a>
                                <a href="<?= DOMAIN ?>user/signing/signout.php">
                                    <p class="account-menu-title">Đăng xuất</p>
                                </a>
                            </div>
                        </div>
                        <a href="<?= DOMAIN ?>user/profile/cart.php" class="wrapper-cart-user">
                            <div class="cart-user">
                                <div class="cart-icon">
                                    <i class="fas fa-shopping-cart fa"></i>
                                    <span>0</span>
                                </div>
                                <span class="cart-text">Giỏ hàng</span>
                            </div>
                        </a>
                    <?php } else { ?>
                        <a class="wrapper-account-user" href="<?= DOMAIN ?>user/signing/signin.php">
                            <div class="avatar-user"><i class="far fa-user"></i></div>
                            <span class="account">
                                <span class="account-label-1">Đăng nhập/Đăng Ký</span>
                                <span class="account-label-2">Tài khoản<i class="fas fa-caret-down"></i></span>
                            </span>
                        </a>
                        <a href="<?= DOMAIN ?>user/signing/signin.php" class="wrapper-cart-user">
                            <div class="cart-user">
                                <div class="cart-icon">
                                    <i class="fas fa-shopping-cart fa"></i>
                                    <span>0</span>
                                </div>
                                <span class="cart-text">Giỏ hàng</span>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <nav class="container-header-bottom">
            <div class="wrapper-bottom">
                <ul class="bottom-menu">
                    <li>
                        <a href="<?= DOMAIN ?>user/category.php?category=3">
                            <i class="fas fa-mobile-alt"></i>
                            Điện thoại
                        </a>
                    </li>
                    <li>
                        <a href="<?= DOMAIN ?>user/category.php?category=5">
                            <i class="fas fa-laptop"></i>
                            Laptop
                        </a>
                    </li>
                    <li>
                        <a href="<?= DOMAIN ?>user/category.php?category=2">
                            <i class="fas fa-tablet-alt"></i>
                            Tablet
                        </a>
                    </li>
                    <li>
                        <a href="<?= DOMAIN ?>user/category.php?category=1">
                            <i class="fas fa-desktop"></i>
                            Máy tính bàn
                        </a>
                    </li>
                    <li>
                        <a href="<?= DOMAIN ?>user/category.php?category=4">
                            <i class="fas fa-microchip"></i>
                            Linh kiện máy tính
                        </a>
                    </li>
                    <li>
                        <a href="<?= DOMAIN ?>user/category.php?category=7">
                            <i class="fas fa-blender"></i>
                            Đồ gia dụng
                        </a>
                    </li>
                    <li>
                        <a href="<?= DOMAIN ?>user/category.php?category=8">
                            <i class="fas fa-gamepad"></i>
                            Thiết bị chơi game
                        </a>
                    </li>
                    <li>
                        <a href="<?= DOMAIN ?>user/category.php?category=6">
                            <i class="fas fa-headphones-alt"></i>
                            Phụ kiện
                        </a>
                    </li>
                    <li>
                        <a href="<?= DOMAIN ?>user/category.php?category=9">
                            <i class="fas fa-print"></i>
                            Thiết bị văn phòng
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>