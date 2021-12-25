<?php
require_once(__DIR__."/../core/core.php");

if($id === NULL){
    // Test nen sua cho nay
    header("Location: ./login.php");
    die();
}

$dulieu = select("SELECT * FROM nhasanxuat");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng điều khiển</title>
    <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>
    <h1>
        Bảng điều khiển
    </h1>
    <ul>
        <li><a href="./">Danh mục</a></li>
        <li class="active"><a href="./brand.php">Nhà sản xuất</a></li>
        <li><a href="./product.php">Sản phẩm</a></li>
        <li><a href="./user.php">Người dùng</a></li>
        <li><a href="./staff.php">Nhân sự</a></li>
        <li><a href="./cart.php">Giỏ hàng</a></li>
    </ul>
    <div class="toolbar">
        <div>
            <a href="./brand_add.php">Thêm nhà sản xuất</a>
        </div>
        <div>
            <form action=""><input type="search" name="search"><input type="submit" value="Tìm kiếm"></form>
        </div>
    </div>

    <div class="result">

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tên danh mục</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dulieu as $item){ ?>
                <tr>
                    <td><?=$item["id"]?></td>
                    <td><?=$item["ten"]?></td>
                    <td>Sửa | Xoá</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>

</html>