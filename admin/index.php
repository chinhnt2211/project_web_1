<?php
require_once(__DIR__ . "/../core/core.php");

if ($sid === NULL) {
    // Test nen sua cho nay
    header("Location: ./login.php");
    exit();
}

$dulieu = select("SELECT * FROM theloai");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng điều khiển</title>
    <link rel="stylesheet" href="./assets/css/index2.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
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
            <div class="nav-user">
                Thoát
            </div>
        </div>
    </div>

    <div class="flex-1">

        <div class="max mx-auto flex flex-row">
            <div class="content-left p-10" style="overflow: auto;">
                <ul>
                    <li class="current"><a href="./"><i class="fas fa-lg fa-tachometer-alt"></i> Tổng quát</a></li>
                    <li><a href="./category.php"><i class="fas fa-lg fa-folder"></i> Danh mục</a></li>
                    <li><a href="./brand.php"><i class="fas fa-lg fa-copyright"></i> Nhà sản xuất</a></li>
                    <li><a href="./product.php"><i class="fas fa-lg fa-cookie-bite"></i> Sản phẩm</a></li>
                    <li><a href="./user.php"><i class="fas fa-lg fa-user"></i> Khách hàng</a></li>
                    <li><a href="./staff.php"><i class="fas fa-lg fa-user-tie"></i> Nhân viên</a></li>
                    <li><a href="./cart.html"><i class="fas fa-lg fa-shopping-cart"></i> Đơn hàng</a></li>
                </ul>
            </div>
            <div class="flex-1 p-10">
                <h1><i class="fas fa-tachometer-alt"></i> Tổng quát</h1>
                <div class="box p-10 mt-10">
                    Tạm chưa có thông tin gì
                </div>
            </div>
        </div>

    </div>

</body>

</html>