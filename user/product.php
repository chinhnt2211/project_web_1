<!-- Header -->
<?php require_once "./includes/header.php" ?>
<!-- Process-content -->
<?php
function check_id()
{
    if (empty($_GET["id"])) {
        header("location: ./index.php");
        return "";
    } else if (show_product_infor($_GET["id"])) {
        return show_product_infor($_GET["id"]);
    } else {
        header("location:./index.php");
        return "";
    }
}
function show_product_infor($id)
{
    $result = select("SELECT SANPHAM.ten, SANPHAM.mota, SANPHAM.anh, SANPHAM.gia, THELOAI.ten AS theloai, NHASANXUAT.ten AS nhasanxuat FROM ((SANPHAM  
    INNER JOIN THELOAI ON SANPHAM.id_theloai = THELOAI.id)
    INNER JOIN NHASANXUAT ON SANPHAM.id_nhasanxuat = NHASANXUAT.id)
    WHERE SANPHAM.id = '$id'")[0];
    return $result;
}
?>
<?php $item = check_id(); ?>
<!-- Content -->
<style>
    @import url("./assets/css/product.css");
</style>
<div class="container-content">
    <div class="content-view main-content">
        <div class="content-view wrapper-item-image">
            <div class="item-image" style="background-image: url('<?= $item['anh'] ?>');"></div>
        </div>
        <div class="content-view item-feed">
            <div class="content-view item-feed-header">
                <span class="header-title"><?= $item['ten'] ?></span>
                <div class="rating">
                    <div class="rating-star">
                        <div class="rating-point">4.6</div>
                    </div>
                    <div class="rating-quantity">
                        <div class="quantity">29</div>
                        <div class="text">Đánh giá</div>
                    </div>
                </div>
                <div class="wrapper-price">
                    <span class="header-price">₫<?= number_format($item['gia'], 0, '.', ',') ?></span>
                </div>
            </div>
            <form class="content-view item-feed-buy" action="add_cart_product.php" method="GET">
                <div class="item-select-quantity">
                    <div class="item-title-quantity">Số lượng</div>
                    <div class="item-btn-quantity">
                        <div class="input-quantity">
                            <input class="minus is-form" type="button" value="-">
                            <input aria-label="quantity" class="input-qty" min="1" name="quantity" type="number" value="1">
                            <input class="plus is-form" type="button" value="+">
                        </div>
                        <div>900 sản phẩm có sẵn</div>
                    </div>
                </div>
                <div class="item-btn-buy">
                    <input type="hidden" name="id_cart" value="<?= $_GET["id"] ?>">
                    <?php if (isset($_SESSION["id"])) { ?>
                        <button>Thêm vào giỏ hàng</button>
                    <?php }else{ ?>
                        <button onclick="location.href='<?= DOMAIN ?>user/signing/signin.php'" type="button">Thêm vào giỏ hàng</button>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
    <div class="content-view container-description">
        <div class="container-specifications">
            <ul class="content-view">
                <li>
                    <span>Thể loại</span>
                    <p><?= $item['theloai'] ?></p>
                </li>
                <li>
                    <span>Nhà sản xuất</span>
                    <p><?= $item['nhasanxuat'] ?></p>
                </li>
                <li>
                    <span>Xuất xứ</span>
                    <p>Trung Quốc</p>
                </li>
                <li>
                    <span>Thời gian ra mắt</span>
                    <p>07/2021</p>
                </li>
            </ul>
            <a href="">Xem chi tiết thông số kĩ thuật</a>
        </div>
        <div class="wrapper-description">
            <p><?= nl2br($item['mota']) ?></p>
        </div>
    </div>
    <!-- Reviews -->
    <!-- <div class="container-reviews row">
                <div class="reviews-user row">
                    <div class="username">Nguyen Van A</div>
                    <form action="">
                        <textarea name="reviews"></textarea>
                        <button>Đánh giá</button>
                    </form>
                </div>
                <div class="reviews-others">
                    <ul>
                        <li>
                            <div class="username">Nguyễn Văn B</div>
                            <div class="reviews">Sản phẩm này siêu quá :3 </div>
                        </li>
                    </ul>
                </div>
            </div> -->
</div>
<script src="./assets/js/product.js"></script>
<!-- Footer -->
<?php require_once "./includes/footer.php" ?>