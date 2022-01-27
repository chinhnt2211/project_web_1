<?php
require_once(__DIR__ . "/../core/core.php");

// hiển thị lỗi, nếu có lỗi
$error_message = "";

// kiểm tra thông tin id xem tồn tại không
$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
$kiemtra = query("SELECT * FROM NHASANXUAT WHERE id = '{$id}'");
$dulieu = $kiemtra->fetch_assoc();

if ($kiemtra->num_rows === 0) {
    header("Location: ./brand.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $ten = isset($_POST["ten"]) ? addslashes($_POST["ten"]) : NULL;

    if ($ten) {

        // kiểm tra tên này đã được dùng chưa?
        $kiemtra = query("SELECT * FROM NHASANXUAT WHERE ten = '{$ten}' and id != '{$id}'");

        if ($kiemtra->num_rows === 0) {
            update(
                "NHASANXUAT",
                [
                    "ten" => $ten
                ],
                "id='{$id}'"
            );

            header("Location: ./brand.php");
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
    <link rel="stylesheet" href="./assets/css/index2.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div id="wrap">

        <?php include(__DIR__ . "/includes/head.php"); ?>

        <div class="flex-1">

            <div class="max mx-auto flex flex-row">
                <div class="content-left p-10" style="overflow: auto;">
                    <ul>
                        <li><a href="./"><i class="fas fa-lg fa-tachometer-alt"></i> Tổng quát</a></li>
                        <li><a href="./category.php"><i class="fas fa-lg fa-folder"></i> Danh mục</a></li>
                        <li class="current"><a href="./brand.php"><i class="fas fa-lg fa-copyright"></i> Nhà sản xuất</a></li>
                        <li><a href="./product.php"><i class="fas fa-lg fa-cookie-bite"></i> Sản phẩm</a></li>
                        <li><a href="./user.php"><i class="fas fa-lg fa-user"></i> Khách hàng</a></li>
                        <li><a href="./staff.php"><i class="fas fa-lg fa-user-tie"></i> Nhân viên</a></li>
                        <li><a href="./cart.html"><i class="fas fa-lg fa-shopping-cart"></i> Đơn hàng</a></li>
                    </ul>
                </div>
                <div class="flex-1 p-10">
                    <h1><i class="fas fa-edit"></i> Sửa tên nhà sản xuất</h1>

                    <div class="box mt-10 p-10">
                        <form action="" method="POST">
                            <?php if ($error_message !== "") { ?>
                                <div style="border: 2px dashed orange;background: #fff5e2;color: #e99700;padding: 5px 10px;margin: 10px 0px;">
                                    <?= $error_message ?>
                                </div>
                            <?php } ?>
                            Tên danh mục:<br>
                            <input name="ten" type="text" value="<?= $dulieu["ten"]; ?>" class="mt-10" placeholder="Nhập nội dung..." />
                            <br>
                            <input type="submit" value="Chỉnh sửa" class="button button-blue mt-10" />
                        </form>
                    </div>

                    <div class="box mt-10 p-10">
                        <a href="./brand.php">Quay lại</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>