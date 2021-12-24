<?php
session_start();
require_once("./process/process_product.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container row">
        <!-- Content -->
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
                        <p><?= $item['mota']?></p>
                    </div>
                    <div class="button-save">
                        <button>Thêm vào giỏ hàng</button>
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
    </div>
</body>

</html>