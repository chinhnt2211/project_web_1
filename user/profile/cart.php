<!-- Header -->
<?php require_once("../includes/header.php") ?>
<!-- Process - Content -->
<?php
if (!isset($_SESSION["id"])) {
    header("location: ../index.php");
}
$cart = $_SESSION['cart'];
// Thong tin nguoi dung
$user_info = select("SELECT * FROM KHACHHANG
WHERE id = '$_SESSION[id]'")[0];
$name = $user_info["hoten"];
$phone_number = $user_info["sodienthoai"];
$address = $user_info["diachi"];


$sum = 0;
?>
<!-- Content -->
<style>
    @import url("./assets/css/cart.css");
</style>
<div class="container-content">
    <div class="content-view main-content">
        <div class="content-view main-menu">
            <div class="user-image" style="background-image: url('<?= $_SESSION['avatar'] ?>')"></div>
            <div class="content-view user-service">
                <a class="service" href="./index.php">
                    <div class="service-icon"><i class="fas fa-user-alt"></i></div>
                    <div class="service-title"><span>Hồ sơ</span></div>
                </a>
                <a class="service" href="">
                    <div class="service-icon"><i class="fas fa-shopping-basket"></i></div>
                    <div class="service-title active"><span>Giỏ hàng</span></div>
                </a>
                <a class="service" href="./purchase.php">
                    <div class="service-icon"><i class="fas fa-wallet"></i></div>
                    <div class="service-title"><span>Đơn mua</span></div>
                </a>
            </div>
        </div>
        <div class="content-view main-spot" action="./index.php" method="POST" enctype="multipart/form-data">
            <table>
                <thead>
                    <th></th>
                    <th>Tên</th>
                    <th>Giá(đồng)</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền(đồng)</th>
                    <th>Xóa</th>
                </thead>
                <tbody id="table-tbody-cart">
                    <?php foreach ($cart as $id => $each) : ?>
                        <tr>
                            <td class="td-image-product">
                                <div class="image-product" style="background-image: url('<?= $each['image'] ?>');"></div>
                            </td>
                            <td class="td-name-product"><span><?= $each['name'] ?></span></td>
                            <td class="td-price-product">
                                <span class="span-price">
                                    <?= number_format($each['price'], 0, '.', ',') ?>
                                </span>
                            </td>
                            <td class="td-quantity-product">
                                <button class="btn-update-quantity" data-id="<?= $id ?>" data-type="decrease"><span>-</span></button>
                                <span class="span-quantity">
                                    <?= $each['quantity'] ?>
                                </span>
                                <button class="btn-update-quantity" data-id="<?= $id ?>" data-type="increase"><span>+</span></button>
                            </td>
                            <td class="td-sum-product">
                                <span class="span-sum">
                                    <?= number_format($each['quantity'] * $each['price'], 0, '.', ',') ?>
                                </span>
                            </td>
                            <td class="td-delete-product">
                                <button class="btn-update-quantity" data-id="<?= $id ?>" data-type="delete">Xóa</button>
                            </td>
                        </tr>
                        <?php $sum += $each['quantity'] * $each['price'] ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot id="table-tfoot-cart">
                    <?php if (!empty($_SESSION['cart'])) { ?>
                        <tr class="total-cart">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span class="span-total">
                                    <?= number_format($sum, 0, '.', ',') ?>
                                </span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="background: #ee4d2d; border:0;">Đặt Hàng</button>
                            </td>
                        </tr>
                    <?php $_SESSION["total"] = $sum;
                    } ?>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" name="form-buy-product">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Thông tin mua hàng </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" name="close-form-buy">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-view main-spot" action="./index.php" method="POST">
                    <div class="content-view form-profile">
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
                        <div class="error-message">
                            <span class="error-message-span">
                            </span>
                        </div>
                        <div class="total-price">
                            <span>Tổng tiền: <?= number_format($sum, 0, '.', ',') ?></span>
                            đ
                        </div>
                    </div>
                    <div class="btn-save">
                        <button class="save-info">Mua hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="./assets/js/cart.js"></script>
<!-- Footer -->
<?php require_once("../includes/footer.php") ?>