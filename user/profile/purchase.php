<!--Header -->
<?php require_once "../includes/header.php" ?>
<!-- Process - Purchase -->
<?php
// Phan trang hoa don
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$number_bill = select("SELECT count(*) FROM HOADON
WHERE id_khachhang = '$_SESSION[id]'")[0]["count(*)"];
$number_bill_in_page = 5; //Số sản phẩm trên 1 trang là 5
$number_pages = ceil($number_bill / $number_bill_in_page);
$offset = $number_bill_in_page * ($page - 1);

$bills = select("SELECT id, tongtien FROM HOADON
WHERE id_khachhang = '$_SESSION[id]'
ORDER BY id DESC
LIMIT $number_bill_in_page 
OFFSET $offset");

?>
<!-- Content -->
<style>
    @import url("./assets/css/purchase.css");
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
                <a class="service" href="./cart.php">
                    <div class="service-icon"><i class="fas fa-shopping-basket"></i></div>
                    <div class="service-title"><span>Giỏ hàng</span></div>
                </a>
                <a class="service" href="">
                    <div class="service-icon"><i class="fas fa-wallet"></i></div>
                    <div class="service-title active"><span>Đơn mua</span></div>
                </a>
            </div>
        </div>
        <div class="content-view main-spot">
            <?php foreach ($bills as $each) { ?>
                <div class="container-table">
                    <table>
                        <?php
                        $result = select("SELECT SANPHAM.ten, SANPHAM.anh, SANPHAM.gia, HOADON.trangthaidon, HOADON.tongtien, HOADON.thoigiandat, HOADONCHITIET.soluong FROM ((HOADON
                        INNER JOIN HOADONCHITIET ON HOADON.id = HOADONCHITIET.id_hoadon ) 
                        INNER JOIN SANPHAM ON HOADONCHITIET.id_sanpham= SANPHAM.id) 
                        WHERE HOADON.id = '$each[id]'");
                        $bill_item = select("SELECT * FROM HOADON WHERE id='$each[id]'");
                        ?>
                        <thead>
                            <th style="text-align:left">Đơn hàng</th>
                            <th style="font-weight:normal; text-align:left"><?= date('d - m - Y', strtotime($result[0]['thoigiandat'])) ?></th>
                            <th></th>
                            <?php if ($bill_item[0]['trangthaidon'] == 0) { ?>
                                <th style="font-weight:normal; color: #ee4d2d;">Đã hủy</th>
                            <?php } elseif ($bill_item[0]['trangthaidon'] == 1) { ?>
                                <th style="font-weight:normal; color: #26aa99;">Đang chờ</th>
                            <?php } elseif ($bill_item[0]['trangthaidon'] == 2) { ?>
                                <th style="font-weight:normal; color: #26aa99;">Đã duyệt</th>
                            <?php } elseif ($bill_item[0]['trangthaidon'] == 3) { ?>
                                <th style="font-weight:normal; color: #26aa99;">Đang giao</th>
                            <?php } elseif ($bill_item[0]['trangthaidon'] == 4) { ?>
                                <th style="font-weight:normal; color: #26aa99;">Đã nhận</th>
                            <?php } ?>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $item) : ?>
                                <tr>
                                    <td class="td-image-product">
                                        <div class="image-product" style="background-image: url('<?= $item['anh'] ?>');"></div>
                                    </td>
                                    <td class="td-name-product"><span><?= $item['ten'] ?></span></td>
                                    <td class="td-quantity-product">
                                        <span class="span-quantity">
                                            x<?= $item['soluong'] ?>
                                        </span>
                                    </td>
                                    <td class="td-sum-product">
                                        <span class="span-sum">
                                            <?= number_format($item['gia'] * $item['soluong'], 0, '.', ',') ?> đ
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr class="total-cart">
                                <td></td>
                                <td>Tổng tiền</td>
                                <td>
                                    <span class="span-total">
                                        <?= number_format($result[0]['tongtien'], 0, '.', ',') ?> đ
                                    </span>
                                </td>
                                <td id="submit-bill">
                                    <?php if ($bill_item[0]['trangthaidon'] == 3) { ?>
                                        <form method="GET" action="./process/process_pruchase.php">
                                            <input type="hidden" value="<?= $each['id'] ?>" name="id">
                                            <button class="btn btn-primary" style="background: #ee4d2d; border:0; height: 40px;" type="submit">Đã Nhận</button>
                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <?php } ?>
            <div class="container-table">
                <div class="content-view page-number">
                    <?php if ($number_pages > 1) { ?>
                        <?php if ($page == 1) { ?>
                            <a class="page-number-title next" href="?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right"></i></a>
                            <span class="header-page-number">Trang <?= $page ?></span>
                            <a class="page-number-title"></a>
                        <?php } else if ($page > 1 && $page < $number_pages) { ?>
                            <a class="page-number-title next" href="?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right"></i></a>
                            <span class="header-page-number">Trang <?= $page ?></span>
                            <a class="page-number-title pre" href="?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-right"></i></a>
                        <?php } else { ?>
                            <a class="page-number-title"></a>
                            <span class="header-page-number">Trang <?= $page ?></span>
                            <a class="page-number-title pre" href="?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-right"></i></a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php require_once("../includes/footer.php"); ?>