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
$number_products = select("SELECT count(*) FROM SANPHAM 
INNER JOIN THELOAI ON SANPHAM.id_theloai = THELOAI.id
WHERE (SANPHAM.ten LIKE '%$find%') OR (THELOAI.ten LIKE '%$find%') ")[0]["count(*)"];
$number_products_in_page = 15; //Số sản phẩm trên 1 trang là 8
$number_pages = ceil($number_products / $number_products_in_page);
if ($page > $number_pages) {
    $page = $number_pages;
}
$offset = $number_products_in_page * ($page - 1);
$sql = "SELECT SANPHAM.id, SANPHAM.ten, SANPHAM.gia, SANPHAM.anh FROM SANPHAM
    INNER JOIN THELOAI ON SANPHAM.id_theloai = THELOAI.id  
    WHERE (SANPHAM.ten LIKE '%$find%') OR (THELOAI.ten LIKE '%$find%') 
    LIMIT $number_products_in_page OFFSET $offset";
$result = select($sql);
?>
<!-- Content -->
<style>
    @import url("./assets/css/index.css");
</style>
<div class="content-view container-content">
    <div class="content-view banner-content">
        <div class="content-view homepage-carousel">
            <div class="wrapper-slide-banner">
                <div class="swiper-wrapper" style="width: 3390px;  -webkit-animation: slide 14s ease infinite;">
                    <style>
                        @-webkit-keyframes slide {
                            20% {
                                margin-left: 0px;
                            }

                            30% {
                                margin-left: -1130px;
                            }

                            50% {
                                margin-left: -1130px;
                            }

                            60% {
                                margin-left: -2260px;
                            }

                            80% {
                                margin-left: -2260px;
                            }
                        }
                    </style>
                    <div class="swiper-slide" style="width: 1130px;">
                        <a href="">
                            <div class="image-slide" style="background-image: url('https://images.fpt.shop/unsafe/fit-in/1200x300/fptshop.com.vn/Uploads/Originals/2021/12/31/637765862721982296_F-C1_1200x300.png');"></div>
                        </a>
                    </div>
                    <div class="swiper-slide" style="width: 1130px;">
                        <a href="">
                            <div class="image-slide" style="background-image: url('https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/12/31/637765865291495045_F-C1_1200x300%20(7).png');"></div>
                        </a>
                    </div>
                    <div class="swiper-slide" style="width: 1130px;">
                        <a href="">
                            <div class="image-slide" style="background-image: url('https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/12/17/637753296218362071_F-C1_1200x300@2x.png');"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-view grid-line-1">
            <div class="content-view grid">
                <div class="content-view grid-header">
                    <img class="rax-image header-icon" data-once="true" src="//gw.alicdn.com/imgextra/i4/O1CN01jTlFyP28oQtHGhBp5_!!6000000007979-2-tps-32-32.png_.webp">
                    <span class="content-text-v2 grid-title">Đang giảm giá</span>
                </div>
                <div class="content-view grid-content" style="background: url(&quot;https://img.alicdn.com/imgextra/i2/O1CN010DBuyg1LkqcCrN3MF_!!6000000001338-2-tps-630-400.png&quot;);">
                    <div class="content-view ads-items">
                        <a href="" target="_blank" class="ads-item">
                            <img class="rax-image item-image" data-once="true" src="//gw.alicdn.com/tps/O1CN014Zs5uz1unbbZv5nOl_!!6000000006082-0-yinhe.jpg_140x10000Q75.jpg_.webp" style="width: 135px; height: 135px;">
                            <div class="content-view ads-item-price">
                                <img class="rax-image price-bg" data-once="true" src="//gw.alicdn.com/imgextra/i3/O1CN01NSyhuI1WiymA6tB9B_!!6000000002823-2-tps-200-52.png_110x10000.jpg_.webp" style="width: 100px; height: 26px;">
                                <span class="ads-price-text">
                                    60.9<em>￥</em>
                                </span>
                            </div>
                        </a>
                        <a href="" target="_blank" class="ads-item">
                            <img class="rax-image item-image" data-once="true" src="//gw.alicdn.com/tps/O1CN011yBz9d1MjlLVDweFf_!!6000000001471-0-yinhe.jpg_140x10000Q75.jpg_.webp" style="width: 135px; height: 135px;">
                            <div class="content-view ads-item-price">
                                <img class="rax-image price-bg" src="//gw.alicdn.com/imgextra/i3/O1CN01NSyhuI1WiymA6tB9B_!!6000000002823-2-tps-200-52.png_110x10000.jpg_.webp" style="width: 100px; height: 26px;">
                                <span class="ads-price-text">
                                    369<em>￥</em>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-view grid">
                <div class="content-view grid-header">
                    <img class="rax-image header-icon" data-once="true" src="//gw.alicdn.com/imgextra/i4/O1CN01jTlFyP28oQtHGhBp5_!!6000000007979-2-tps-32-32.png_.webp">
                    <span class="content-text-v2 grid-title">Bán tốt nhất</span>
                </div>
                <div class="content-view grid-content" style="background: url('https://img.alicdn.com/imgextra/i3/O1CN010X8HiG1seKIlw0LqR_!!6000000005791-2-tps-630-400.png');">
                    <div class="content-view ads-items">
                        <a href="" target="_blank" class="ads-item">
                            <img class="rax-image item-image" data-once="true" src="//gw.alicdn.com/tps/O1CN014Zs5uz1unbbZv5nOl_!!6000000006082-0-yinhe.jpg_140x10000Q75.jpg_.webp" style="width: 135px; height: 135px;">
                            <div class="content-view ads-item-price">
                                <img class="rax-image price-bg" data-once="true" src="//gw.alicdn.com/imgextra/i3/O1CN01NSyhuI1WiymA6tB9B_!!6000000002823-2-tps-200-52.png_110x10000.jpg_.webp" style="width: 100px; height: 26px;">
                                <span class="ads-price-text">
                                    60.9<em>￥</em>
                                </span>
                            </div>
                        </a>
                        <a href="" target="_blank" class="ads-item">
                            <img class="rax-image item-image" data-once="true" src="//gw.alicdn.com/tps/O1CN011yBz9d1MjlLVDweFf_!!6000000001471-0-yinhe.jpg_140x10000Q75.jpg_.webp" style="width: 135px; height: 135px;">
                            <div class="content-view ads-item-price">
                                <img class="rax-image price-bg" src="//gw.alicdn.com/imgextra/i3/O1CN01NSyhuI1WiymA6tB9B_!!6000000002823-2-tps-200-52.png_110x10000.jpg_.webp" style="width: 100px; height: 26px;">
                                <span class="ads-price-text">
                                    369<em>￥</em>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!---->
        </div>
    </div>
    <div class="content-view main-content">
        <div class="content-view item-feed">
            <div class="content-view item-feed-header">
                <span class="header-title">Tất cả sản phẩm (<?= $number_products ?>)</span>
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
<?php require_once("./includes/footer.php"); ?>