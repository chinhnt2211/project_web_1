<?php
require_once("./process/process.php");
?>

<!-- Header -->
<?php require_once('./includes/header.php') ?>
<!-- Content -->
<div class="container-content">
    <ul class="list-items">
        <?php
        foreach (show_product() as $item) {
        ?>
            <li>
                <div class="items">
                    <a href="./product/index.php?id=<?= $item['id'] ?>">
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

