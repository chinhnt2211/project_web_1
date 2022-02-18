<?php
require_once(__DIR__ . "/../../core/core.php");

// kiểm tra thông tin id xem tồn tại không

$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
$kiemtra = query("SELECT * FROM NHASANXUAT WHERE id = '{$id}'");

if ($kiemtra->num_rows === 0) {
    header("Location: ./brand.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    delete("NHASANXUAT", "id='{$id}'");
    header("Location: ./brand.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng điều khiển</title>
    <link rel="stylesheet" href="../assets/css/index2.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div id="wrap">

<<<<<<< HEAD:admin/brand/brand_delete.php
        <div class="header">
            <div class="max h-full mx-auto p-10">
                Quản trị hệ thống
            </div>
        </div>

        <div class="nav">
            <div class="max flex justify-between mx-auto h-full p-10">
                <div class="nav-menu">
                    <a href="./">Trang chủ</a>
                </div>
                <span><?= $sname ?></span>
                <div class="nav-user">
                    <a href="../logout.php">Thoát</a>
                </div>
            </div>
        </div>
=======
        <?php include(__DIR__ . "/includes/head.php"); ?>
>>>>>>> origin/main:admin/brand_delete.php

        <div class="flex-1">

            <div class="max mx-auto flex flex-row">
                <div class="content-left p-10" style="overflow: auto;">
                    <ul>
                        <li><a href="../"><i class="fas fa-lg fa-tachometer-alt"></i> Tổng quát</a></li>
                        <li class="current"><a href="./brand.php"><i class="fas fa-lg fa-copyright"></i> Nhà sản xuất</a></li>
                        <li><a href="../product/product.php"><i class="fas fa-lg fa-cookie-bite"></i> Sản phẩm</a></li>
                        <li><a href="../user/user.php"><i class="fas fa-lg fa-user"></i> Khách hàng</a></li>
                        <li><a href="../staff/staff.php"><i class="fas fa-lg fa-user-tie"></i> Nhân viên</a></li>
                        <li><a href="../cart/cart.php"><i class="fas fa-lg fa-shopping-cart"></i> Đơn hàng</a></li>
                    </ul>
                </div>
                <div class="flex-1 p-10">
                    <h1><i class="fas fa-minus-circle"></i> Xoá danh mục</h1>

                    <div class="box mt-10 p-10">
                        <form action="" method="POST">
                            <div>
                                Bạn có muốn Xoá nhà sản xuất <b><?= $kiemtra->fetch_assoc()["ten"]; ?></b> không?
                            </div>
                            <div class="mt-10 flex items-center">
                                <input type="submit" class="button button-red" value="Đồng ý" /> <a href="./brand.php" class="button ml-10">Huỷ bỏ</a>
                            </div>
                        </form>
                    </div>

                    <div class="box mt-10 p-10">
                        <a href="./brand.php">Quay lại</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>