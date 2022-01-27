<?php
require_once(__DIR__ . "/../core/core.php");

// hiển thị lỗi, nếu có lỗi
$error_message = "";

// kiểm tra thông tin id xem tồn tại không
$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
$kiemtra = query("SELECT sp.*, nsx.id as nsxid, nsx.ten as nsxten, tl.id as tlid, tl.ten as tlten FROM SANPHAM sp INNER JOIN NHASANXUAT nsx ON (nsx.id = sp.id_nhasanxuat) INNER JOIN THELOAI tl ON (sp.id_theloai = tl.id) WHERE sp.id = '{$id}'");
$dulieu = $kiemtra->fetch_assoc();

if ($kiemtra->num_rows === 0) {
    header("Location: ./product.php");
    exit();
}

$dulieu_nsx = select("SELECT * FROM NHASANXUAT");
$dulieu_tl = select("SELECT * FROM THELOAI");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $ten = isset($_POST["ten"]) ? addslashes($_POST["ten"]) : NULL;
    $tl = isset($_POST["tl"]) ? addslashes($_POST["tl"]) : NULL;
    $nsx = isset($_POST["nsx"]) ? addslashes($_POST["nsx"]) : NULL;
    $mota = isset($_POST["mota"]) ? addslashes($_POST["mota"]) : NULL;
    $gia = isset($_POST["gia"]) ? addslashes($_POST["gia"]) : NULL;
    $anh = isset($_POST["anh"]) ? addslashes($_POST["anh"]) : NULL;

    if ($ten && $tl && $nsx && $mota && $gia && $anh) {

        // kiểm tra tên này đã được dùng chưa?
        $kiemtra = query("SELECT * FROM SANPHAM WHERE ten = '{$ten}' and id_NHASANXUAT = '{$nsx}' and id_THELOAI = '{$tl}' and id != '{$id}'");

        if ($kiemtra->num_rows === 0) {
            update(
                "SANPHAM",
                [
                    "ten" => $ten,
                    "mota" => $mota,
                    "anh" => $anh,
                    "gia" => $gia,
                    "id_NHASANXUAT" => $nsx,
                    "id_THELOAI" => $tl
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
    <link rel="stylesheet" href="./assets/css/index2.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
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
                        <li><a href="./brand.php"><i class="fas fa-lg fa-copyright"></i> Nhà sản xuất</a></li>
                        <li class="current"><a href="./product.php"><i class="fas fa-lg fa-cookie-bite"></i> Sản phẩm</a></li>
                        <li><a href="./user.php"><i class="fas fa-lg fa-user"></i> Khách hàng</a></li>
                        <li><a href="./staff.php"><i class="fas fa-lg fa-user-tie"></i> Nhân viên</a></li>
                        <li><a href="./cart.html"><i class="fas fa-lg fa-shopping-cart"></i> Đơn hàng</a></li>
                    </ul>
                </div>
                <div class="flex-1 p-10">
                    <h1><i class="fas fa-edit"></i> Chỉnh sửa sản phẩm</h1>

                    <div class="box mt-10 p-10">

                        <form action="" method="POST">
                            <?php if ($error_message !== "") { ?>
                                <div style="border: 2px dashed orange;background: #fff5e2;color: #e99700;padding: 5px 10px;margin: 10px 0px;">
                                    <?= $error_message ?>
                                </div>
                            <?php } ?>
                            Tên sản phẩm:<br>
                            <input name="ten" type="text" value="<?= $dulieu["ten"]; ?>" />
                            <br>
                            Danh mục<strong>(<span id="danhmuc_title"><?= $dulieu["tlten"]; ?></span>)</strong>:<br>
                            <input type="text" id="danhmuc_auto" placeholder="Chọn danh mục" value="<?= $dulieu["tlten"]; ?>"><br>
                            <input type="hidden" name="tl" id="danhmuc_value" value="<?= $dulieu["tlid"] ?>">


                            Nhà sản xuất<strong>(<span id="nhasanxuat_title"><?= $dulieu["nsxten"] ?></span>)</strong>:<br>
                            <input type="text" id="nhasanxuat_auto" placeholder="Chọn nhà sản xuất" value="<?= $dulieu["nsxten"]; ?>"><br>
                            <input type="hidden" name="nsx" id="nhasanxuat_value" value="<?= $dulieu["nsxid"] ?>">


                            Mô tả sản phẩm:<br>
                            <textarea name="mota"><?= $dulieu["mota"]; ?></textarea>
                            <br>
                            Đơn giá:<br>
                            <input type="number" name="gia" value="<?= $dulieu["gia"]; ?>">
                            <br>
                            Ảnh sản phẩm:<br>
                            <input type="text" name="anh" value="<?= $dulieu["anh"]; ?>">
                            <br>
                            <input type="submit" class="button button-green" value="Chỉnh sửa" />
                        </form>
                    </div>

                    <div class="box mt-10 p-10">
                        <a href="./product.php">Quay lại</a>
                    </div>
                </div>
            </div>

        </div>
        <script>
            $(function() {
                $("#danhmuc_auto").autocomplete({
                    source: "./api/layDanhSachDanhMuc.php",
                    minLength: 0,
                    select: function(e, ui) {
                        $("#danhmuc_title").text(ui.item.value);
                        $("#danhmuc_value").val(ui.item.id);
                    }
                }).focus(function() {
                    $(this).autocomplete('search', $(this).val())
                }).on("input", function() {
                    $("#danhmuc_title").text("Chưa chọn");
                    $("#danhmuc_value").val("");
                })

                $("#nhasanxuat_auto").autocomplete({
                    source: "./api/layDanhSachNhaSanXuat.php",
                    minLength: 0,
                    select: function(e, ui) {
                        $("#nhasanxuat_title").text(ui.item.value);
                        $("#nhasanxuat_value").val(ui.item.id);
                    }
                }).focus(function() {
                    $(this).autocomplete('search', $(this).val())
                }).on("input", function() {
                    $("#nhasanxuat_title").text("Chưa chọn");
                    $("#nhasanxuat_value").val("");
                })
            });
        </script>
    </div>

</body>

</html>