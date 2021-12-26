<?php
require_once(__DIR__ . "/../core/core.php");

// hiển thị lỗi, nếu có lỗi
$error_message = "";

// kiểm tra thông tin id xem tồn tại không
$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
$kiemtra = query("SELECT * FROM khachhang WHERE id = '{$id}'");
$dulieu = $kiemtra->fetch_assoc();

if ($kiemtra->num_rows === 0) {
    header("Location: ./user.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $hoten = isset($_POST["hoten"]) ? addslashes($_POST["hoten"]) : NULL;
    $sdt = isset($_POST["sdt"]) ? addslashes($_POST["sdt"]) : NULL;
    $diachi = isset($_POST["diachi"]) ? addslashes($_POST["diachi"]) : NULL;
    $email = isset($_POST["email"]) ? addslashes($_POST["email"]) : NULL;
    $matkhau = isset($_POST["matkhau"]) ? addslashes($_POST["matkhau"]) : NULL;
    $anh = isset($_POST["anh"]) ? addslashes($_POST["anh"]) : NULL;

    if ($hoten && $sdt && $diachi && $email && $matkhau && $anh) {

        // kiểm tra tên này đã được dùng chưa?
        $kiemtra = query("SELECT * FROM khachhang WHERE email = '{$email}' and id != '{$id}'");

        if ($kiemtra->num_rows === 0) {

            $hashmd5 = md5($matkhau);

            $data = [
                "hoten" => $hoten,
                "sodienthoai" => $sdt,
                "anh" => $anh,
                "diachi" => $diachi,
                "email" => $email
            ];
            

            if ($matkhau != NULL)
                $data["matkhau"] = $hashmd5;

            update("khachhang", $data, "id = '{$id}'");

            header("Location: ./user.php");
            exit();
        } else {
            $error_message = "Tên email này đã được tạo rồi, chọn tên khác đi";
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
        <li><a href="./product.php">Sản phẩm</a></li>
        <li class="active"><a href="./user.php">Người dùng</a></li>
        <li><a href="./staff.php">Nhân sự</a></li>
        <li><a href="./cart.php">Giỏ hàng</a></li>
    </ul>

    <h1>Sửa người dùng</h1>
    <div class="form">
        <form action="" method="POST">
            <?php if ($error_message !== "") { ?>
                <div style="border: 2px dashed orange;background: #fff5e2;color: #e99700;padding: 5px 10px;margin: 10px 0px;">
                    <?= $error_message ?>
                </div>
            <?php } ?>
            Họ tên:<br>
            <input name="hoten" type="text" value="<?= $dulieu["hoten"] ?>" /><br>
            Số điện thoại:<br>
            <input name="sdt" type="text" value="<?= $dulieu["sodienthoai"] ?>" /><br>
            Địa chỉ:<br>
            <input name="diachi" type="text" value="<?= $dulieu["diachi"] ?>" /><br>
            Email:<br>
            <input name="email" type="email" value="<?= $dulieu["email"] ?>" /><br>
            Mật khẩu:<br>
            <input name="matkhau" type="text" value="" /><br>
            Ảnh:<br>
            <input name="anh" type="text" value="<?= $dulieu["anh"] ?>" /><br>
            <input type="submit" value="Sửa người dùng" />
        </form>
        <a href="./user.php">Quay lại</a>
    </div>
</body>

</html>