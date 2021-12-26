<?php
require_once(__DIR__ . "/../core/core.php");

// kiểm tra thông tin id xem tồn tại không

$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
$kiemtra = query("SELECT * FROM nhasanxuat WHERE id = '{$id}'");

if ($kiemtra->num_rows === 0) {
    header("Location: ./brand.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    delete("nhasanxuat", "id='{$id}'");
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

    <h1>Xoá nhà sản xuất</h1>
    <div class="form">
        <form action="" method="POST">
            Bạn có muốn Xoá nhà sản xuất <b><?=$kiemtra->fetch_assoc()["ten"];?></b> không?
            <br>
            <input type="submit" value="Xác nhận" />
        </form>
        <a href="./brand.php">Quay lại</a>
    </div>
</body>

</html>