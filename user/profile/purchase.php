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
$number_bill_in_page = 5; //Số sản phẩm trên 1 trang là 8
$number_pages = ceil($number_bill / $number_bill_in_page);
$offset = $number_bill_in_page * ($page - 1);

$bills = select("SELECT id, tongtien FROM HOADON
WHERE id_khachhang = '$_SESSION[id]'
LIMIT $number_bill_in_page 
OFFSET $offset");
?>
<!-- Content -->
<style>
    @import url("./assets/css/purchase.css");
</style>
<div class="container_content">
    <div class="row">
        <div class="menu col-3">
            <ul>
                <li><a href="./index.php">Chỉnh sửa thông tin cá nhân</a></li>
                <li><a href="">Đơn mua</a></li>
                <li><a href="./notice.php">Thông báo</a></li>
            </ul>
        </div>
        <div class="container_form_update col-9">
        </div>
    </div>
    <ul class="list-items">
        <?php foreach ($bills as $each) { ?>
            <li>
                <div class="items">
                    <?php
                    $sum = 0;
                    $result = select("SELECT SANPHAM.ten, SANPHAM.anh, SANPHAM.gia, HOADON.trangthaidon, HOADONCHITIET.soluong FROM ((HOADON
                            INNER JOIN HOADONCHITIET ON HOADON.id = HOADONCHITIET.id_hoadon ) 
                            INNER JOIN SANPHAM ON HOADONCHITIET.id_sanpham= SANPHAM.id) 
                            WHERE HOADON.id = '$each[id]'");
                    ?>
                    <div class="wrapper-bill">
                        <a href="./bill.php?id=<?= $each['id']?>">
                            <div class="wrapper-items">
                                <?php foreach ($result as $item) { ?>
                                    <div class="item">
                                        <div class="image-product" style="background-image: url('<?= $item['anh'] ?>');"></div>
                                        <div><?= $item['ten'] ?></div>
                                        <div>x<?= $item['soluong'] ?></div>
                                        <div><?= $item['gia'] * $item['soluong'] ?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </a>
                        <div><?= $each['tongtien'] ?></div>
                        <br>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
    <div class="page-number">
        <?php for ($i = 1; $i <= $number_pages; $i++) { ?>
            <a href="?page=<?= $i ?>"><?= $i ?></a>
        <?php } ?>
    </div>
</div>
<!-- Footer -->
<?php require_once("../includes/footer.php"); ?>