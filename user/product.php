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
    $result = select("SELECT SANPHAM.ten, SANPHAM.mota, SANPHAM.xuatxu, SANPHAM.ngayramat, SANPHAM.anh, SANPHAM.gia, THELOAI.ten AS theloai, NHASANXUAT.ten AS nhasanxuat FROM ((SANPHAM  
    INNER JOIN THELOAI ON SANPHAM.id_theloai = THELOAI.id)
    INNER JOIN NHASANXUAT ON SANPHAM.id_nhasanxuat = NHASANXUAT.id)
    WHERE SANPHAM.id = '$id'")[0];
    return $result;
}
$item = check_id();
// Thông số sản phẩm 
$sql = "SELECT CAUHINH.ten AS ten_cauhinh, CAUHINHCHITIET.giatri AS giatri_cauhinh, NHOMCAUHINH.ten AS ten_nhomcauhinh  FROM ((CAUHINHCHITIET
INNER JOIN CAUHINH ON CAUHINHCHITIET.id_cauhinh = CAUHINH.id)
INNER JOIN NHOMCAUHINH ON CAUHINH.id_nhomcauhinh = NHOMCAUHINH.id)
WHERE CAUHINHCHITIET.id_sanpham = '$_GET[id]'
ORDER BY ten_nhomcauhinh ASC";
$model = select($sql);

// Nhận xét - Đánh giá
$sql = "SELECT DANHGIA.chatluong AS chatluong, DANHGIA.hoten AS hoten, DANHGIA.nhanxet AS nhanxet, DANHGIA.thoigian AS thoigian, KHACHHANG.anh AS anh FROM DANHGIA 
INNER JOIN KHACHHANG ON DANHGIA.id_khachhang = KHACHHANG.id
WHERE (DANHGIA.id_sanpham = '$_GET[id]') AND ((DANHGIA.nhanxet IS NOT NULL) OR (DANHGIA.chatluong IS NOT NULL))
ORDER BY DANHGIA.thoigian DESC";
$reviews = select($sql);
$quantity_reviews = sizeof($reviews);
$sum_point = 0;
$rating_five = 0;
$rating_four = 0;
$rating_three = 0;
$rating_two = 0;
$rating_one = 0;
foreach ($reviews as $each) {
    $sum_point += $each['chatluong'];
    if ($each['chatluong'] == 1) {
        $rating_one++;
    }
    if ($each['chatluong'] == 2) {
        $rating_two++;
    }
    if ($each['chatluong'] == 3) {
        $rating_three++;
    }
    if ($each['chatluong'] == 4) {
        $rating_four++;
    }
    if ($each['chatluong'] == 5) {
        $rating_five++;
    }
}
$average_point = ($quantity_reviews) != 0 ? round($sum_point / $quantity_reviews, 1) : 0; //Điểm số chất lượng trung bình

function check_review_user()
{
    if (isset($_SESSION['id'])) {
        $sql = "SELECT DANHGIA.id AS id, HOADON.thoigiandat AS thoigiandat FROM DANHGIA
        INNER JOIN HOADON ON DANHGIA.id_hoadon = HOADON.id 
        WHERE (DANHGIA.id_sanpham = '$_GET[id]') AND (DANHGIA.id_khachhang = '$_SESSION[id]') AND (DANHGIA.thoigian IS NULL)";
        $result = select($sql);
        if (sizeof($result) > 0) {
            return $result[0];
        } else {
            return false;
        }
    } else {
        return false;
    }
    return false;
}

?>
<!-- Content -->
<style>
    @import url("./assets/css/product.css");
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
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
                        <div class="rating-point"><?= $average_point ?></div>
                    </div>
                    <div class="rating-quantity">
                        <div class="quantity"><?= $quantity_reviews ?></div>
                        <div class="text">Đánh giá</div>
                    </div>
                </div>
                <div class="wrapper-price">
                    <span class="header-price">₫<?= number_format($item['gia'], 0, '.', ',') ?></span>
                </div>
            </div>
            <div class="content-view item-feed-buy">
                <div class="item-select-quantity">
                    <div class="item-title-quantity">Số lượng</div>
                    <div class="item-btn-quantity">
                        <div class="input-quantity">
                            <input class="minus is-form" type="button" value="-">
                            <input aria-label="quantity" class="input-qty" min="1" name="quantity" type="number" value="1">
                            <input class="plus is-form" type="button" value="+">
                        </div>
                    </div>
                </div>
                <div class="item-btn-buy">
                    <input type="hidden" name="id-product" value="<?= $_GET["id"] ?>">
                    <?php if (isset($_SESSION["id"])) { ?>
                        <button data-id-product="<?= $_GET["id"] ?>" class="btn-add-to-cart">Thêm vào giỏ hàng</button>
                    <?php } else { ?>
                        <button onclick="location.href='<?= DOMAIN ?>user/signing/signin.php'" type="button">Thêm vào giỏ hàng</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="content-view container-description">
        <div class="wrapper-description" style="margin-top:20px">
            <p><?= nl2br($item['mota']) ?></p>
        </div>
    </div>
    <!-- Reviews -->
    <div class="content-view review-rating-wrapper">
        <h2 class="title-review">
            Đánh giá & Nhận xét <?= $item['ten'] ?>
            <span><?= $quantity_reviews ?></span>
        </h2>
        <div class="review-body">
            <div class="review-body-wrapper">
                <div class="rating-point-wrapper">
                    <p>Đánh Giá Trung Bình</p>
                    <div class="point"><?= $average_point ?>/5</div>
                    <div class="stars-rating" style="--rating: <?= $average_point ?>;"></div>
                </div>
                <div class="rating-chart-wrapper">
                    <div class="rating-chart-content">
                        <div class="c-progress-item">
                            <label>
                                <p>5</p>
                                <span class="star"></span>
                            </label>
                            <div class="c-progress-bar">
                                <span class="c-progress-value" style="width: <?= ($quantity_reviews != 0) ? (($rating_five / $quantity_reviews) * 100) : 0 ?>%;">
                                </span>
                            </div>
                            <span><?= $rating_five ?></span>
                        </div>
                        <div class="c-progress-item">
                            <label>
                                <p>4</p>
                                <span class="star"></span>
                            </label>
                            <div class="c-progress-bar">
                                <span class="c-progress-value" style="width: <?= ($quantity_reviews != 0) ? (($rating_four / $quantity_reviews) * 100) : 0 ?>%;">
                                </span>
                            </div>
                            <span><?= $rating_four ?></span>
                        </div>
                        <div class="c-progress-item">
                            <label>
                                <p>3</p>
                                <span class="star"></span>
                            </label>
                            <div class="c-progress-bar">
                                <span class="c-progress-value" style="width: <?= ($quantity_reviews != 0) ? (($rating_three / $quantity_reviews) * 100) : 0 ?>%;">
                                </span>
                            </div>
                            <span><?= $rating_three ?></span>
                        </div>
                        <div class="c-progress-item">
                            <label>
                                <p>2</p>
                                <span class="star"></span>
                            </label>
                            <div class="c-progress-bar">
                                <span class="c-progress-value" style="width: <?= ($quantity_reviews != 0) ? (($rating_two / $quantity_reviews) * 100) : 0 ?>%;">
                                </span>
                            </div>
                            <span><?= $rating_two ?></span>
                        </div>
                        <div class="c-progress-item">
                            <label>
                                <p>1</p>
                                <span class="star"></span>
                            </label>
                            <div class="c-progress-bar">
                                <span class="c-progress-value" style="width: <?= ($quantity_reviews != 0) ? (($rating_one / $quantity_reviews) * 100) : 0 * 100 ?>%;">
                                </span>
                            </div>
                            <span><?= $rating_one ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-view review-content-container">
        <?php
        $user_reviews = check_review_user();
        if ($user_reviews) {
        ?>
            <form class="user-review-wrapper" method="post" action="./process_product.php">
                <input type="hidden" name="id-product" value="<?= $_GET["id"] ?>">
                <input type="hidden" name="id-review" value="<?= $user_reviews['id'] ?>">
                <input type="hidden" name="rating-star" value="1">
                <div class="avatar-user-review" style="background-image: url('<?= $_SESSION['avatar'] ?>');"></div>
                <div class="user-review-content">
                    <div class="name-user-review">Gửi đánh giá cho đơn hàng bạn đã mua ngày (<?= date("d/m/Y", strtotime($user_reviews['thoigiandat'])) ?>)</div>
                    <span>
                        Bạn chấm sản phẩm này bao nhiêu sao?
                    </span>
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating-star" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4" name="rating-star" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3" name="rating-star" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2" name="rating-star" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1" name="rating-star" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                    </fieldset>
                </div>
                <div class="user-review-input">
                    <textarea name="comment" id="" cols="30" rows="10" placeholder="Gửi nhận xét về sản phẩm của bạn ở đây"></textarea>
                    <button type="submit" id="submit-review-user">Gửi đánh giá</button>
                </div>
            </form>
        <?php }; ?>
        <?php foreach ($reviews as $each) { ?>
            <div class="review-input-wrapper">
                <div class="avatar-user-review" style="background-image: url('<?= $each['anh'] ?>');"></div>
                <div class="user-review-content">
                    <div class="name-user-review"><?= $each['hoten'] ?> <span class="time-review">-<?= date("d/m/Y", strtotime($each['thoigian'])) ?>-</span></div>
                    <div class="stars-rating" style="--rating: <?= $each['chatluong'] ?>;"></div>
                    <p><?= $each['nhanxet'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./assets/js/product.js" type="text/javascript"></script>
<!-- Footer -->
<?php require_once "./includes/footer.php" ?>