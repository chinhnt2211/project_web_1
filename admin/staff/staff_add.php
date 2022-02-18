<?php
require_once(__DIR__ . "/../../core/core.php");

// hiển thị lỗi, nếu có lỗi
$error_message = "";

// kiểm tra thông tin form nhập đủ ko
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    echo $hoten = isset($_POST["hoten"]) ? addslashes($_POST["hoten"]) : NULL;
    echo $sdt = isset($_POST["sdt"]) ? addslashes($_POST["sdt"]) : NULL;
    echo $diachi = isset($_POST["diachi"]) ? addslashes($_POST["diachi"]) : NULL;
    echo $email = isset($_POST["email"]) ? addslashes($_POST["email"]) : NULL;
    echo $matkhau = isset($_POST["matkhau"]) ? addslashes($_POST["matkhau"]) : NULL;
    echo $anh = isset($_POST["anh"]) ? addslashes($_POST["anh"]) : NULL;
    echo $capdo = isset($_POST["capdo"]) ? addslashes($_POST["capdo"]) : NULL;

    if ($hoten && $sdt && $diachi && $email && $matkhau && $anh) {

        // kiểm tra tên này đã được dùng chưa?
        $kiemtra = query("SELECT * FROM NHANVIEN WHERE email = '{$email}'");

        if ($kiemtra->num_rows === 0) {

            $hashmd5 = md5($matkhau);

            insert("NHANVIEN", [
                "hoten" => $hoten,
                "sodienthoai" => $sdt,
                "anh" => $anh,
                "diachi" => $diachi,
                "email" => $email,
                "matkhau" => $hashmd5,
                "capdo" => $capdo
            ]);

            header("Location: ./staff.php");
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
    <link rel="stylesheet" href="../assets/css/index2.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div id="wrap">

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
        <div class="flex-1">
            <div class="max mx-auto flex flex-row">
                <div class="content-left p-10" style="overflow: auto;">
                    <ul>
                        <li><a href="../"><i class="fas fa-lg fa-tachometer-alt"></i> Tổng quát</a></li>
                        <li><a href="../brand/brand.php"><i class="fas fa-lg fa-copyright"></i> Nhà sản xuất</a></li>
                        <li><a href="../product/product.php"><i class="fas fa-lg fa-cookie-bite"></i> Sản phẩm</a></li>
                        <li><a href="../user/user.php"><i class="fas fa-lg fa-user"></i> Khách hàng</a></li>
                        <li class="current"><a href="./staff.php"><i class="fas fa-lg fa-user-tie"></i> Nhân viên</a></li>
                        <li><a href="../cart/cart.php"><i class="fas fa-lg fa-shopping-cart"></i> Đơn hàng</a></li>
                    </ul>
                </div>
                <div class="flex-1 p-10">
                    <h1><i class="fas fa-edit"></i> Thêm nhân sự</h1>
                    <div class="box mt-10 p-10">
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
                            Cấp độ:<br>
                            <select name="capdo">
                                <option value="1">Nhân viên</option>
                                <option value="0">Quản lý</option>
                            </select><br>
                            <input type="submit" value="Thêm người dùng" class="button button-blue mt-10" />
                        </form>
                    </div>
                    <div class="box mt-10 p-10">
                        <a href="./staff.php">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>