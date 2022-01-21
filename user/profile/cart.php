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
                <a class="service" href="">
                    <div class="service-icon"><i class="fas fa-user-alt"></i></div>
                    <div class="service-title"><span>Hồ sơ</span></div>
                </a>
                <a class="service" href="./cart.php">
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
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Xóa</th>
                </thead>
                <tbody>
                    <?php foreach ($cart as $id => $each) : ?>
                        <tr>
                            <td>
                                <div class="image-product" style="background-image: url('<?= $each['image'] ?>');"></div>
                            </td>
                            <td><?= $each['name'] ?></td>
                            <td>
                                <span class="span-price">
                                    <?= number_format($each['price'], 0, '.', ',') ?>
                                </span>
                            </td>
                            <td>
                                <button class="btn-update-quantity" data-id="<?= $id ?>" data-type="decrease">-</button>
                                <span class="span-quantity">
                                    <?= $each['quantity'] ?>
                                </span>
                                <button class="btn-update-quantity" data-id="<?= $id ?>" data-type="increase">+</button>
                            </td>
                            <td>
                                <span class="span-sum">
                                    <?= number_format($each['quantity'] * $each['price'], 0, '.', ',') ?>
                                </span>
                            </td>
                            <td>
                                <button class="btn-update-quantity" data-id="<?= $id ?>" data-type="delete">Xóa</button>
                            </td>
                        </tr>
                        <?php $sum += $each['quantity'] * $each['price'] ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
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
                    <?php $_SESSION["tongtien"] = $sum;
                    } ?>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="container-cart">
        <table>
            <thead>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Xóa</th>
            </thead>
            <tbody>
                <?php foreach ($cart as $id => $each) : ?>
                    <tr>
                        <td>
                            <div class="image-product" style="background-image: url('<?= $each['image'] ?>');"></div>
                        </td>
                        <td><?= $each['name'] ?></td>
                        <td>
                            <span class="span-price">
                                <?= number_format($each['price'], 0, '.', ',') ?>
                            </span>
                        </td>
                        <td>
                            <button class="btn-update-quantity" data-id="<?= $id ?>" data-type="decrease">-</button>
                            <span class="span-quantity">
                                <?= $each['quantity'] ?>
                            </span>
                            <button class="btn-update-quantity" data-id="<?= $id ?>" data-type="increase">+</button>
                        </td>
                        <td>
                            <span class="span-sum">
                                <?= number_format($each['quantity'] * $each['price'], 0, '.', ',') ?>
                            </span>
                        </td>
                        <td>
                            <button class="btn-update-quantity" data-id="<?= $id ?>" data-type="delete">Xóa</button>
                        </td>
                    </tr>
                    <?php $sum += $each['quantity'] * $each['price'] ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
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
                <?php $_SESSION["tongtien"] = $sum;
                } ?>
            </tfoot>
        </table>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Thông tin mua hàng </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="content-view main-spot" action="./index.php" method="POST" enctype="multipart/form-data">
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
                            <span>
                                <?php
                                if (isset($_SESSION["error"])) {
                                    echo "*" . $_SESSION["error"];
                                };
                                ?>
                            </span>
                        </div>
                        <div class="total-price">
                            <span>Tổng tiền: <?= number_format($sum, 0, '.', ',') ?></span>
                            đ
                        </div>
                    </div>
                    <div class="btn-save">
                        <button class="save-info" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $(".btn-update-quantity").click(function() {
            let btn = $(this);
            let id = $(this).data("id");
            let type = $(this).data("type");
            $.ajax({
                    type: "GET",
                    url: "./process/process_cart.php",
                    data: {
                        id,
                        type
                    },
                    // dataType: "dataType",
                })
                .done(function(data) {
                    let parent_tr = btn.parents('tr');
                    let quantity = parseInt(parent_tr.find('.span-quantity').text());
                    let price = parseInt(parent_tr.find('.span-price').text());
                    let sum = parseInt(parent_tr.find('.span-sum').text());
                    let total = parseInt($('.span-total').text());

                    switch (data) {
                        case "increase":
                            quantity++;
                            total = total + price;
                            sum = sum + price;
                            parent_tr.find('.span-quantity').text(quantity);
                            parent_tr.find('.span-sum').text(sum);
                            $('.span-total').text(total);
                            break;
                        case "decrease":
                            quantity--;
                            total = total - price;
                            sum = sum - price;
                            parent_tr.find('.span-quantity').text(quantity);
                            parent_tr.find('.span-sum').text(sum);
                            $('.span-total').text(total);
                            break;
                        case "delete":
                            total = total - price * quantity;
                            if (total == 0) {
                                $('tr.total-cart').remove();
                            }
                            parent_tr.remove();
                            break;
                        default:
                            break;
                    }
                });
        })
    });
</script>
<!-- Footer -->
<?php require_once("../includes/footer.php") ?>