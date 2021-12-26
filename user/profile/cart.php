<!-- Header -->
<?php require_once("../includes/header.php") ?>
<!-- Process - Content -->
<?php
if (!isset($_SESSION["id"])) {
    header("location: ../index.php");
}
$cart = $_SESSION['cart'];
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
                <?php foreach($cart as $id => $result): ?>
                    <tr>
                        <td><div class="image-product" style="background-image: url('<?= $result['image']?>');"></div></td>
                        <td><?= $result['name'] ?></td>
                        <td><?= $result['price'] ?></td>
                        <td>
                            <a href="process_cart.php?id_dec=<?= $id ?>">-</a>
                            <?= $result['quantity'] ?>
                            <a href="process_cart.php?id_inc=<?= $id ?>">+</a>
                        </td>
                        <td><?= $result['quantity']*$result['price'] ?></td>
                        <td><a href="process_cart.php?delete=<?= $id?>">Xóa</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>