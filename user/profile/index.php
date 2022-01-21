<!-- Header -->
<?php require_once "../includes/header.php" ?>
<!-- Process-Content -->
<?php require_once "./process/process_index.php" ?>
<!-- Content -->
<style>
    @import url("./assets/css/index.css");
</style>
<div class="content-view container-content">
    <div class="content-view main-content">
        <div class="content-view main-menu">
            <div class="user-image" style="background-image: url('<?= $_SESSION['avatar'] ?>')"></div>
            <div class="content-view user-service">
                <a class="service" href="">
                    <div class="service-icon"><i class="fas fa-user-alt"></i></div>
                    <div class="service-title active"><span>Hồ sơ</span></div>
                </a>
                <a class="service" href="./cart.php">
                    <div class="service-icon"><i class="fas fa-shopping-basket"></i></div>
                    <div class="service-title"><span>Giỏ hàng</span></div>
                </a>
                <a class="service" href="./purchase.php">
                    <div class="service-icon"><i class="fas fa-wallet"></i></div>
                    <div class="service-title"><span>Đơn mua</span></div>
                </a>
            </div>
        </div>
        <form class="content-view main-spot" action="./index.php" method="POST" enctype="multipart/form-data">
            <div class="content-view form-profile">
                <div class="label-form">
                    <span>Hồ Sơ Của Tôi</span>
                    <br>
                    Quản lý thông tin hồ sơ để bảo mật tài khoản
                </div>
                <div class="form-input">
                    <span>Email</span>
                    <div><?= $email ?></div>
                </div>
                <div class="form-input">
                    <span>Họ và Tên</span>
                    <input type="text" name="name" value="<?= $name ?>">
                </div>
                <div class="form-input">
                    <span>Số điện thoại</span>
                    <input type="number" name="phone_number" value="<?= $phone_number ?>">
                </div>
                <div class="form-input">
                    <span>Địa chỉ</span>
                    <input type="text" name="address" value="<?= $address ?>">
                </div>
                <div class="form-input">
                    <span>Ảnh</span>
                    <input type="file" name="avatar" accept=".jpg, .png, .jpeg, .gif">
                </div>
                <div class="form-input">
                    <span>Giới tính</span>
                    <?php switch ($gender) {
                        case 0: ?>
                            <input type="radio" name="gender" value="0" checked>
                            <div class="gender">Nam</div>
                            <input type="radio" name="gender" value="1">
                            <div class="gender">Nữ</div>
                            <input type="radio" name="gender" value="2">
                            <div class="gender">Giới tính khác</div>
                        <?php break;
                        case 1: ?>
                            <input type="radio" name="gender" value="0">
                            <div class="gender">Nam</div>
                            <input type="radio" name="gender" value="1" checked>
                            <div class="gender">Nữ</div>
                            <input type="radio" name="gender" value="2">
                            <div class="gender">Giới tính khác</div>
                        <?php break;
                        case 2: ?>
                            <input type="radio" name="gender" value="0">
                            <div class="gender">Nam</div>
                            <input type="radio" name="gender" value="1">
                            <div class="gender">Nữ</div>
                            <input type="radio" name="gender" value="2" checked>
                            <div class="gender">Giới tính khác</div>
                        <?php break;
                        default: ?>
                            <input type="radio" name="gender" value="0" checked>
                            <div class="gender">Nam</div>
                            <input type="radio" name="gender" value="1">
                            <div class="gender">Nữ</div>
                            <input type="radio" name="gender" value="2">
                            <div class="gender">Giới tính khác</div>
                    <?php break;
                    } ?>
                </div>
                <div class="form-input">
                    <span>Ngày sinh</span>
                    <div class="fallbackDatePicker">
                        <div class="select-birthday">
                            <label for="day">Ngày</label>
                            <select id="day" name="day">
                                <?php for ($i = 1; $i <= $dayNum; $i++) { ?>
                                    <?php if ($i == $day) { ?>
                                        <option selected><?= $i ?> </option>
                                    <?php } else { ?>
                                        <option><?= $i ?> </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="select-birthday">
                            <label for="month">Tháng</label>
                            <select id="month" name="month">
                                <?php for ($i = 1; $i <= 12; $i++) { ?>
                                    <?php if ($i == $month) { ?>
                                        <option selected><?= $i ?> </option>
                                    <?php } else { ?>
                                        <option><?= $i ?> </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="select-birthday">
                            <label for="year">Năm</label>
                            <select id="year" name="year">
                                <?php for ($i = (int)date('Y'); $i >= (int)date('Y') - 100; $i--) { ?>
                                    <?php if ($i == $year) { ?>
                                        <option selected><?= $i ?> </option>
                                    <?php } else { ?>
                                        <option><?= $i ?> </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="error-message">
                    <span>
                        <?php
                        if (isset($_SESSION["error"])) {
                            echo "*" . $_SESSION["error"];
                        };
                        ?>
                    </span>
                </div>
            </div>
            <div class="btn-save">
                <button class="save-info" type="submit">Lưu</button>
            </div>
        </form>
    </div>
    <p>

    </p>
</div>
<script src="./assets//js/index.js"></script>
<!-- Footer -->
<?php require_once("../includes/footer.php"); ?>