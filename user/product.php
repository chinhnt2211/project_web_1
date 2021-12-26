<!-- Header -->
<?php require_once "./includes/header.php" ?>
<!-- Process-content -->
<?php
function check_id(){
    if (isset($_GET["id"]) && show_product_infor($_GET["id"])) {
        return show_product_infor($_GET["id"]);
    } else {
        header("location:../index.php");
        return "";
    }
}

function show_product_infor($id){
    $sql = "select * from SANPHAM
    where id = '$id'";
    $result = select($sql)[0];
    return $result;
}

function name_producer(){
    $id = check_id()["id_nhasanxuat"];
    $sql = "select ten from NHASANXUAT
    where id = '$id'";
    $result = select($sql)[0];
    return $result;
}
?>
<!-- Content -->
<style>
    @import url("./assets/css/product.css");
</style>
<div class="container-content">
    <div class="container-product">
        <?php
        $item = check_id();
        ?>
        <div class="">
            <div class="image-product" style="background-image: url('<?= $item['anh'] ?>');"></div>
        </div>
        <div class="container-description">
            <div class="name-product">
                <h1><?= $item['ten'] ?></h1>
            </div>
            <div class="cost"><?= $item['gia'] ?> $</div>
            <div class="name_company">
                <h3><?= name_producer()['ten'] ?> </h3>
            </div>
            <div class="description">
                <p><?= $item['mota'] ?></p>
            </div>
            <div class="button-save">
                <a href="add_cart_product.php?cart=<?=$_GET["id"] ?>">Thêm vào giỏ hàng</a>
            </div>

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
<!-- Footer -->
<?php require_once "./includes/footer.php" ?>