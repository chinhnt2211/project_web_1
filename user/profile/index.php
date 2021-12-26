<!-- Header -->
<?php require_once "../includes/header.php" ?>
<!-- Process-Content -->
<?php require_once "./process_profile.php" ?>
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
    <br>
    <p>
    <?php if(isset($_SESSION["error"])){
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
    }?>
    </p>
    <form action="./index.php" method="POST" enctype="multipart/form-data">
        <div class="form_update">
            <p>
                <label class="">Họ và tên
                    <input type="text" name="name" value="<?= $name ?>">
                </label>
            </p>
            <p>
                <label>Số điện thoại
                    <input type="number" name="phone_number" value="<?= $phone_number ?>">
                </label>
            </p>
            <p>
                <label>Địa chỉ
                    <input type="text" name="address" value="<?= $address ?>">
                </label>
            </p>
            <p>
                <label>Ảnh
                    <input type="file" name="avatar" accept=".jpg, .png, .jpeg, .gif" ">
                </label>
            </p>
            <button class=" save-info" type="submit" onclick="return checkForm()">Lưu</button>
        </div>
    </form>
</div>
<!-- Footer -->
<?php require_once("../includes/footer.php"); ?>