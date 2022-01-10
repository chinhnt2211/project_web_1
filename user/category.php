<!-- Header -->
<?php require_once('./includes/header.php'); ?>
<!-- Process - Content -->
<?php
if(!isset($_GET['category'])){
    header("location: ./index.php");
}else{
    $category = $_GET['category'];
}
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
$number_products = select("SELECT count(*) FROM SANPHAM 
INNER JOIN THELOAI ON SANPHAM.id_theloai = THELOAI.id
WHERE THELOAI.id = '$category' ")[0]["count(*)"];
$number_products_in_page = 15; //Số sản phẩm trên 1 trang là 8
$number_pages = ceil($number_products / $number_products_in_page);
if ($page > $number_pages) {
    $page = $number_pages;
}
$offset = $number_products_in_page * ($page - 1);
$sql = "SELECT SANPHAM.id, SANPHAM.ten, SANPHAM.gia, SANPHAM.anh, THELOAI.ten AS ten_theloai FROM SANPHAM
    INNER JOIN THELOAI ON SANPHAM.id_theloai = THELOAI.id  
    WHERE THELOAI.id = '$category'
    LIMIT $number_products_in_page OFFSET $offset";
$result = select($sql);
?>
<!-- Content -->
<style>
    @import url("./assets/css/category.css");
</style>
<div class="content-view container-content">
    <div class="content-view main-content">
        <div class="content-view item-feed">
            <div class="content-view item-feed-header">
                <span class="header-title"><?= $result[0]["ten_theloai"] ?> (<?= $number_products ?>)</span>
            </div>
            <div class="content-view list">
                <?php foreach ($result as $item) { ?>
                    <a href="./product.php?id=<?= $item['id'] ?>" class="item">
                        <div class="content-view item-image-wrap">
                            <div class="item-image" style="background-image: url('<?= $item['anh'] ?>');"></div>
                        </div>
                        <div class="content-view item-title">
                            <span class="title-text"><?= $item['ten'] ?></span>
                        </div>
                        <div class="content-view item-price">
                            <span class="content-text-v2 price-text"><?= number_format($item['gia'], 0, '.', ',') ?></span>
                            <span class="content-text-v2 symbol-text">đ</span>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="content-view page-number">
            <?php if ($number_pages > 1) { ?>
                <?php if ($page == 1) { ?>
                    <a class="page-number-title next" href="?page=<?= $page + 1 ?>&&find=<?= $find ?>"><i class="fas fa-angle-double-right"></i></a>
                    <span class="header-page-number">Trang <?= $page ?></span>
                    <a class="page-number-title"></a>
                <?php } else if ($page > 1 && $page < $number_pages) { ?>
                    <a class="page-number-title next" href="?page=<?= $page + 1 ?>&&find=<?= $find ?>"><i class="fas fa-angle-double-right"></i></a>
                    <span class="header-page-number">Trang <?= $page ?></span>
                    <a class="page-number-title pre" href="?page=<?= $page - 1 ?>&&find=<?= $find ?>"><i class="fas fa-angle-double-right"></i></a>
                <?php } else { ?>
                    <a class="page-number-title"></a>
                    <span class="header-page-number">Trang <?= $page ?></span>
                    <a class="page-number-title pre" href="?page=<?= $page - 1 ?>&&find=<?= $find ?>"><i class="fas fa-angle-double-right"></i></a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Footer -->
<!-- <?php require_once("./includes/footer.php"); ?> -->