<!-- Header -->
<?php require_once('./includes/header.php'); ?>
<!-- Process - Content -->
<?php
if (isset($_GET['find'])) {
    $find = $_GET["find"];
} else {
    $find = "";
}

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$numberProducts = select("SELECT count(*) FROM SANPHAM WHERE ten LIKE '%$find%'")[0]["count(*)"];
$numberProductsInPage = 12; //Số sản phẩm trên 1 trang là 15
$numberPages = ceil($numberProducts / $numberProductsInPage);
$offset = $numberProductsInPage * ($page - 1);
$sql = "SELECT * FROM SANPHAM
    WHERE ten LIKE '%$find%'
    LIMIT $numberProductsInPage OFFSET $offset";
$result = select($sql);
?>
<!-- Content -->
<style>
    @import url("./assets/css//index.css");
</style>
<div class="container-content">
    <ul class="list-items">
        <?php foreach ($result as $item) { ?>
            <li>
                <div class="items">
                    <a href="./product.php?id=<?= $item['id'] ?>">
                        <div class="image-item" style="background-image: url('<?= $item['anh'] ?>');"></div>
                        <p class="name-item"><?= $item['ten'] ?></p>
                    </a>
                    <p class="cost-item"><?= $item['gia'] ?></p>
                    <a href="add_cart_home.php?cart=<?= $item['id']?>">Thêm vào giỏ hàng</a>
                </div>
            </li>
        <?php } ?>
    </ul>
    <div class="page-number">
        <?php for ($i = 1; $i <= $numberPages; $i++) { ?>
            <a href="?page=<?= $i ?>&&find=<?= $find ?>"><?= $i ?></a>
        <?php } ?>
    </div>
</div>
<!-- Footer -->
<?php require_once("./includes/footer.php"); ?>