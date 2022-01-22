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
                    <li><a href="./"><i class="fas fa-lg fa-tachometer-alt"></i> Tổng quát</a></li>
                    <li class="current"><a href="./category.php"><i class="fas fa-lg fa-folder"></i> Danh mục</a></li>
                    <li><a href="./brand.php"><i class="fas fa-lg fa-copyright"></i> Nhà sản xuất</a></li>
                    <li><a href="./product.php"><i class="fas fa-lg fa-cookie-bite"></i> Sản phẩm</a></li>
                    <li><a href="./user.php"><i class="fas fa-lg fa-user"></i> Khách hàng</a></li>
                    <li><a href="./staff.php"><i class="fas fa-lg fa-user-tie"></i> Nhân viên</a></li>
                    <li><a href="./cart.html"><i class="fas fa-lg fa-shopping-cart"></i> Đơn hàng</a></li>
                </ul>
            </div>
            <div class="flex-1 p-10">
                <h1><i class="fas fa-lg fa-folder"></i> Danh mục</h1>
                <div class="mt-10">
                    <a class="button button-green" href="./category_add.php"><i class="fas fa-plus"></i> Thêm danh mục</a>
                </div>
                <div class="box mt-10">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dulieu as $item) { ?>
                                <tr>
                                    <td><?= $item["id"] ?></td>
                                    <td><?= $item["ten"] ?></td>
                                    <td> <a title="Sửa" href="./category_edit.php?id=<?= $item["id"] ?>"><i class="fas fa-edit color-blue"></i></a> <a title="Xoá" href="./category_delete.php?id=<?= $item["id"] ?>"><i class="fas fa-minus-circle"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</body>

</html>