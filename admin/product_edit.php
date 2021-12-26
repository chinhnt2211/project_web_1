<?php
require_once(__DIR__ . "/../core/core.php");

// hiển thị lỗi, nếu có lỗi
$error_message = "";

// kiểm tra thông tin id xem tồn tại không
$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
$kiemtra = query("SELECT * FROM sanpham WHERE id = '{$id}'");
$dulieu = $kiemtra->fetch_assoc();

if ($kiemtra->num_rows === 0) {
    header("Location: ./product.php");
    exit();
}

$dulieu_nsx = select("SELECT * FROM nhasanxuat");
$dulieu_tl = select("SELECT * FROM theloai");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $ten = isset($_POST["ten"]) ? addslashes($_POST["ten"]) : NULL;
    $tl = isset($_POST["tl"]) ? addslashes($_POST["tl"]) : NULL;
    $nsx = isset($_POST["nsx"]) ? addslashes($_POST["nsx"]) : NULL;
    $mota = isset($_POST["mota"]) ? addslashes($_POST["mota"]) : NULL;
    $gia = isset($_POST["gia"]) ? addslashes($_POST["gia"]) : NULL;
    $anh = isset($_POST["anh"]) ? addslashes($_POST["anh"]) : NULL;

    if ($ten && $tl && $nsx && $mota && $gia && $anh) {

        // kiểm tra tên này đã được dùng chưa?
        $kiemtra = query("SELECT * FROM sanpham WHERE ten = '{$ten}' and id_nhasanxuat = '{$nsx}' and id_theloai = '{$tl}' and id != '{$id}'");

        if ($kiemtra->num_rows === 0) {
            update(
                "sanpham",
                [
                    "ten" => $ten,
                    "mota" => $mota,
                    "anh" => $anh,
                    "gia" => $gia,
                    "id_nhasanxuat" => $nsx,
                    "id_theloai" => $tl
                ],
                "id='{$id}'"
            );

            header("Location: ./product.php");
            exit();
        } else {
            $error_message = "Tên này đã được tạo rồi, chọn tên khác đi";
        }
    } else {
        $error_message = "Vui lòng nhập đủ thông tin";
    }
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
        <li><a href="./brand.php">Nhà sản xuất</a></li>
        <li class="active"><a href="./product.php">Sản phẩm</a></li>
        <li><a href="./user.php">Người dùng</a></li>
        <li><a href="./staff.php">Nhân sự</a></li>
        <li><a href="./cart.php">Giỏ hàng</a></li>
    </ul>

    <h1>Sửa nhầ sản xuất</h1>
    <div class="form">
        <form action="" method="POST">
            <?php if ($error_message !== "") { ?>
                <div style="border: 2px dashed orange;background: #fff5e2;color: #e99700;padding: 5px 10px;margin: 10px 0px;">
                    <?= $error_message ?>
                </div>
            <?php } ?>
            Tên sản phẩm:<br>
            <input name="ten" type="text" value="<?= $dulieu["ten"]; ?>" />
            <br>
            Danh mục:<br>
            <select name="tl">
                <?php foreach ($dulieu_tl as $item) { ?>
                    <option <?php if ($dulieu["id_theloai"] === $item["id"]) {
                                echo "selected";
                            } ?> value="<?= $item["id"] ?>"><?= $item["ten"] ?></option>
                <?php } ?>
            </select><br>
            Nhà sản xuất:<br>
            <select name="nsx">
                <?php foreach ($dulieu_nsx as $item) { ?>
                    <option <?php if ($dulieu["id_nhasanxuat"] === $item["id"]) {
                                echo "selected";
                            } ?> value="<?= $item["id"] ?>"><?= $item["ten"] ?></option>
                <?php } ?>
            </select>
            <hr>
            Mô tả sản phẩm:<br>
            <textarea name="mota"><?= $dulieu["mota"]; ?></textarea>
            <br>
            Đơn giá:<br>
            <input type="number" name="gia" value="<?= $dulieu["gia"]; ?>">
            <br>
            Ảnh sản phẩm:<br>
            <input type="text" name="anh" value="<?= $dulieu["anh"]; ?>">
            <br>
            <input type="submit" value="Sửa sản phẩm" />
        </form>
        <a href="./product.php">Quay lại</a>
    </div>
</body>

</html>