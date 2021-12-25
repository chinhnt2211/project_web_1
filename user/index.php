<!-- Header -->
<?php require_once('./includes/header.php'); ?>
<!-- Process - Content -->
<?php
function check_find(){
    if (isset($_GET['find'])) {
        $find = $_GET["find"];
    } else {
        $find = "";
    }
    return $find;
}
function show_product(){
    $find = check_find();
    $sql = "select * from SANPHAM
    where ten like '%$find%'";
    $result = executeResultAll($sql);
    return $result;
}
?>
<!-- Content -->
<style>
    @import url("./assets/css//index.css");
</style>
<div class="container-content">
    <ul class="list-items">
        <?php
        foreach (show_product() as $item) {
        ?>
            <li>
                <div class="items">
                    <a href="./product.php?id=<?= $item['id'] ?>">
                        <div class="image-item" style="background-image: url('<?= $item['anh'] ?>');"></div>
                        <p class="name-item"><?= $item['ten'] ?></p>
                    </a>
                    <p class="cost-item"><?= $item['gia'] ?></p>
                    <button>Thêm</button>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>
<!-- Footer -->
<?php require_once("./includes/footer.php"); ?>