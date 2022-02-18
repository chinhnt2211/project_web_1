<?php
require_once(__DIR__ . "/../../core/core.php");

// hiển thị lỗi, nếu có lỗi
$error_message = "";

// kiểm tra thông tin form nhập đủ ko
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $hoten = isset($_POST["hoten"]) ? addslashes($_POST["hoten"]) : NULL;
    $sdt = isset($_POST["sdt"]) ? addslashes($_POST["sdt"]) : NULL;
    $diachi = isset($_POST["diachi"]) ? addslashes($_POST["diachi"]) : NULL;
    $email = isset($_POST["email"]) ? addslashes($_POST["email"]) : NULL;
    $matkhau = isset($_POST["matkhau"]) ? addslashes($_POST["matkhau"]) : NULL;
    $anh = isset($_POST["anh"]) ? addslashes($_POST["anh"]) : NULL;

    if ($hoten && $sdt && $diachi && $email && $matkhau && $anh) {

        // kiểm tra tên này đã được dùng chưa?
        $kiemtra = query("SELECT * FROM KHACHHANG WHERE email = '{$email}'");

        if ($kiemtra->num_rows === 0) {

            $hashmd5 = md5($matkhau);

            insert("KHACHHANG", [
                "hoten" => $hoten,
                "sodienthoai" => $sdt,
                "anh" => $anh,
                "diachi" => $diachi,
                "email" => $email,
                "matkhau" => $hashmd5
            ]);

            header("Location: ./user.php");
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
    <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body>
    <h1>
        Bảng điều khiển
    </h1>
    <ul>
        <li><a href="../"><i class="fas fa-lg fa-tachometer-alt"></i> Tổng quát</a></li>
        <li><a href="../brand/brand.php"><i class="fas fa-lg fa-copyright"></i> Nhà sản xuất</a></li>
        <li><a href="../product/product.php"><i class="fas fa-lg fa-cookie-bite"></i> Sản phẩm</a></li>
        <li class="current"><a href="./user.php"><i class="fas fa-lg fa-user"></i> Khách hàng</a></li>
        <li><a href="../staff/staff.php"><i class="fas fa-lg fa-user-tie"></i> Nhân viên</a></li>
        <li><a href="../cart/cart.php"><i class="fas fa-lg fa-shopping-cart"></i> Đơn hàng</a></li>
    </ul>

    <h1>Thêm người dùng</h1>
    <div class="form">
        <form action="" method="POST">
            <?php if ($error_message !== "") { ?>
                <div style="border: 2px dashed orange;background: #fff5e2;color: #e99700;padding: 5px 10px;margin: 10px 0px;">
                    <?= $error_message ?>
                </div>
            <?php } ?>
            Họ tên:<br>
            <input name="hoten" type="text" /><br>
            Số điện thoại:<br>
            <input name="sdt" type="text" /><br>
            Địa chỉ:<br>
            <input name="diachi" type="text" /><br>
            Email:<br>
            <input name="email" type="email" /><br>
            Mật khẩu:<br>
            <input name="matkhau" type="text" /><br>
            Ảnh:<br>
            <input name="anh" type="text" /><br>
            <input type="submit" value="Thêm người dùng" />
        </form>
        <a href="./user.php">Quay lại</a>
    </div>
</body>

</html>