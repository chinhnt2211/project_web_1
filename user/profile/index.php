<!-- Header -->
<?php require_once("../includes/header.php") ?>

<!-- Content -->
<div class="container-content">
    <ul>
        <li><a href="">Hồ sơ</a></li>
        <li><a href="./order.php">Đơn mua</a></li>
        <li><a href="./notice.php">Thông báo</a></li>
    </ul>
    <form action="./process/process_profile.php" method="POST" enctype="multipart/form-data">
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