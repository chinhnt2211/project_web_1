<!-- Header -->
<?php require_once("../includes/header.php") ?>
<!-- Process-Content -->
<?php
// Kiem tra thong tin thay doi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = addslashes($_POST['name']);
    $phone_number = addslashes($_POST['phone_number']);
    $address = addslashes($_POST['address']);
    if (isset($_POST['avatar'])) {
        $avatar = $_POST['avatar'];
    } else {
        $avatar = $_SESSION['avatar'];
    }
    $id = $_SESSION['id'];
    $sql = "update KHACHHANG 
    set 
        hoten = '$name' , sodienthoai = '$phone_number' , diachi = '$address' , anh = '$avatar'
    where 
        id = '$id'";
    execute($sql);
    $_SESSION['name'] = $name;
    $_SESSION['avatar'] = $avatar;
    header("location: ../index.php");
}
?>

<!-- Content -->
<style>
    @import url("./assets/css/index.css");
</style>
<div class="container-content">
    <ul>
        <li><a href="">Hồ sơ</a></li>
        <li><a href="./order.php">Đơn mua</a></li>
        <li><a href="./notice.php">Thông báo</a></li>
    </ul>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <div class="form_update">
            <p>
                <label class="">Họ và tên
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>Số điện thoại
                    <input type="number" name="phone_number">
                </label>
            </p>
            <p>
                <label>Địa chỉ
                    <input type="text" name="address">
                </label>
            </p>
            <p>
                <label>Ảnh
                    <input type="file" name="avatar">
                </label>
            </p>
            <button class="save-info" type="submit" onclick="return checkForm()">Lưu</button>
        </div>
    </form>
</div>
<!-- Footer -->
<?php require_once("../includes/footer.php"); ?>