<?php
require_once(__DIR__."/../core/core.php");

// hiển thị lỗi, nếu có lỗi
$error_message = "";

// kiểm tra thông tin form nhập đủ ko
if($_SERVER["REQUEST_METHOD"] === "POST"){

    $ten = isset($_POST["ten"]) ? addslashes($_POST["ten"]) : NULL;

    if($ten){

        // kiểm tra tên này đã được dùng chưa?
        $kiemtra = query("SELECT * FROM theloai WHERE ten = '{$ten}'");

        if($kiemtra->num_rows === 0){
            insert("theloai", [
                "ten" => $ten
            ]);

            header("Location: /admin/");
        }else{
            $error_message = "Tên này đã được tạo rồi, chọn tên khác đi";
        }

    }else{
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
        <li class="active"><a href="./">Danh mục</a></li>
        <li><a href="./brand.php">Nhà sản xuất</a></li>
        <li><a href="./product.php">Sản phẩm</a></li>
        <li><a href="./user.php">Người dùng</a></li>
        <li><a href="./staff.php">Nhân sự</a></li>
        <li><a href="./cart.php">Giỏ hàng</a></li>
    </ul>
    
    <h1>Thêm danh mục</h1>
    <div class="form">
        <form action="" method="POST">
            Tên danh mục:<br>
            <input name="ten" type="text" />
            <br>
            <input type="submit" value="Thêm danh mục"/>
        </form>
        <a href="./">Quay lại</a>
    </div>
</body>

</html>