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
                        <td><?= $each['price'] ?></td>
                        <td>
                            <a href="process_cart.php?id_dec=<?= $id ?>">-</a>
                            <?= $each['quantity'] ?>
                            <a href="process_cart.php?id_inc=<?= $id ?>">+</a>
                        </td>
                        <td><?= $each['quantity'] * $each['price'] ?></td>
                        <td><a href="process_cart.php?delete=<?= $id ?>">Xóa</a></td>
                    </tr>
                    <?php $sum += $each['quantity'] * $each['price'] ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <?php if (!empty($_SESSION['cart'])) { ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?= $sum ?></td>
                        <td>
                            <button class="buy">Đặt mua</button>
                        </td>
                    </tr>
                <?php $_SESSION["tongtien"] = $sum;
                } ?>
            </tfoot>
        </table>
        <div class="form-order">
            <form action="./process_cart.php" method="POST">
                <br>
                <input type="text" value="<?= $name ?>" name="name">
                <br>
                <input type="number" value="<?= $phone_number ?>" name="phone_number">
                <br>
                <input type="text" value="<?= $address ?>" name="address">
                <button>Đặt Mua</button>
            </form>
        </div>
    </div>
</div>