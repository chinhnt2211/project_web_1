<!--Header -->
<?php require_once "../includes/header.php" ?>
<!-- Process - Purchase -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (select("SELECT count(*) FROM HOADON WHERE id = '$id'") != 0) {
        $sum = 0;
        $result = select("SELECT * FROM ((HOADON
        INNER JOIN HOADONCHITIET ON HOADON.id = HOADONCHITIET.id_hoadon ) 
        INNER JOIN SANPHAM ON HOADONCHITIET.id_sanpham= SANPHAM.id) 
        WHERE HOADON.id = '$id'");
    } else {
        header("location: ./purchase.php");
    }
} else {
    header("location: ./purchase.php");
}
?>

<div class="container-content">
    <div class="wrapper-bill">
        <div class="wrapper-items">
            <?php foreach ($result as $item) { ?>
                <a href="../product.php?id=<?=$item['id_sanpham']?>">
                    <div class="item">
                        <div class="image-product" style="background-image: url('<?= $item['anh'] ?>');"></div>
                        <div><?= $item['ten'] ?></div>
                        <div>x<?= $item['soluong'] ?></div>
                        <div><?= $item['gia'] * $item['soluong'] ?></div>
                    </div>
                </a>
            <?php } ?>
            <div><?= $result[0]['tongtien'] ?></div>
        </div>
        <div class="wrapper-info">
            <div class="wrapper-status">
                <div><?= $result[0]['trangthai'] ?></div>
            </div>
            <div class="wrapper-user-info">
                <div><?= $result[0]['hotennhan'] ?></div>
                <div><?= $result[0]['sodienthoainhan'] ?></div>
                <div><?= $result[0]['thoigiandat'] ?></div>
            </div>

        </div>
        <br>
    </div>
</div>