<?php
require_once(__DIR__ . "/../core/core.php");

if ($sid === NULL) {
    // Test nen sua cho nay
    header("Location: ./login.php");
    die();
}

$dulieu = select("SELECT sp.*, nsx.ten as nsx_ten, tl.ten as tl_ten FROM sanpham sp INNER JOIN nhasanxuat nsx ON sp.id_nhasanxuat = nsx.id INNER JOIN theloai tl ON tl.id = sp.id_theloai");
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
        <li><a href="./brand.php">Nhà sản xuất</a></li>
        <li class="active"><a href="./product.php">Sản phẩm</a></li>
        <li><a href="./user.php">Người dùng</a></li>
        <li><a href="./staff.php">Nhân sự</a></li>
        <li><a href="./cart.php">Giỏ hàng</a></li>
    </ul>
    <div class="toolbar">
        <div>
            <a href="./product_add.php">Thêm sản phẩm</a>
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
                    <td>Tên sản phẩm</td>
                    <td>Mô tả</td>
                    <td>Ảnh</td>
                    <td>Giá</td>
                    <td>Nhà sản xuất</td>
                    <td>Danh mục</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dulieu as $item) { ?>
                    <tr>
                        <td><?= $item["id"] ?></td>
                        <td><?= $item["ten"] ?></td>
                        <td><?= $item["mota"] ?></td>
                        <td><img src="<?= $item["anh"] ?>" /></td>
                        <td><?= $item["gia"] ?></td>
                        <td><?= $item["nsx_ten"] ?></td>
                        <td><?= $item["tl_ten"] ?></td>
                        <td> <a href="./product_edit.php?id=<?= $item["id"] ?>">Sửa</a> | <a href="./product_delete.php?id=<?= $item["id"] ?>">Xoá</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>

</html>