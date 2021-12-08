<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_demo_user.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <div class="container row">
        <!-- Header -->
        <div class="container_header row col-10">
            <!-- Header Part 1 -->
            <div class="row header_part_1" style="height: 90px;">
                <div class="col-2 logo_header " style="height: 100px;"></div>
                <div class="col-7">
                    <form action="" class="search_bar row">
                        <input class="col-10" type="text" placeholder="Tìm kiếm..." name="search" style="height: 40px;">
                        <button class="col-1" name="button_search">
                            Search
                        </button>
                    </form>
                </div>
                <div class="col-3 row user_bar">
                    <i class="bi bi-person-circle col-1"></i>
                    <a class="col-9" href="">
                        <p>Đăng nhập hoặc Đăng kí</p>
                    </a>
                </div>
            </div>
            <!-- Header Part 2 -->
            <div class="row header_part_2">
                <div class="col-11 nav_bar">
                    <ul class="row">
                        <li><a href=""><i class="bi bi-house-door"></i> Trang chủ</a></li>
                        <li><a href=""><i class="bi bi-laptop"></i> Latop</a></li>
                        <li><a href=""><i class="bi bi-headset"></i> Phụ kiện</a></li>
                        <li><a href=""><i class="bi bi-headset"></i> Phụ kiện</a></li>
                        <li><a href=""><i class="bi bi-headset"></i> Phụ kiện</a></li>
                        <li><a href=""><i class="bi bi-headset"></i> Phụ kiện</a></li>
                        <li><a href=""><i class="bi bi-headset"></i> Phụ kiện</a></li>
                        <li><a href=""><i class="bi bi-headset"></i> Phụ kiện</a></li>

                    </ul>
                </div>
                <div class="col-1 row cart_header">
                    <a href="">
                        <i class="bi bi-cart3"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Slideshow -->
        <div id="slideshow">
                <div class="slide-wrapper">
                    <a href=""><div class="slide" style="background-image: url('https://images.pexels.com/photos/2382325/pexels-photo-2382325.jpeg');"></div></a>
                    <a href=""><div class="slide" style="background-image: url('https://images.pexels.com/photos/3578393/pexels-photo-3578393.jpeg');"></div></a>
                    <a href=""><div class="slide" style="background-image: url('https://images.pexels.com/photos/4484184/pexels-photo-4484184.jpeg');"></div></a>
                </div>
        </div>
        <!-- Title - content -->
        <div class="title_content">
            <p>Phụ Kiện</p>
        </div>
       <!-- Content -->
        <div class="container_content row col-10">
            <!-- Item -->
            <div class="item_content col-12">
                <ul class="col-12 row">
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                    <li class="col-2 item">
                        <a href="">
                            <div class="image_item" style=" background-image: url('./item_test.jpg'); background-color: pink;"></div>
                        </a>
                        <p>Raiden Shogun</p>
                        <div class="add_cart row">
                            <div class="cost_item col-10">100$</div>
                            <button class="col-2"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-12 row pagination-outter">
                <ul class="pagination">
                    <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href="">>></a></li>
                </ul>
            </div>
        </div>
        <!-- Footer -->
        <div class="container_footer row col-12" style="height: 120px; background-color : black">
            <p>Đây là Footer</p>
        </div>
    </div>

</body>

</html>