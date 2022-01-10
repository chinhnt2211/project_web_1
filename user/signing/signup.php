<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Document</title>
</head>

<body">
    <div class="content-wrapper">
        <div class="content">
            <div class="signup-wrapper shadow-box">
                <div class="company-details ">

                    <div class="shadow"></div>
                    <div class="wrapper-1">
                        <h1 class="title">Tech Market</h1>
                        <div class="slogan">Welcome!</div>
                    </div>

                </div>
                <div class="signup-form ">
                    <div class="wrapper-2">
                        <div class="form-title">Đăng kí ngay hôm nay!</div>
                        <div class="form">
                            <form method="POST" action="./process/process_signup.php">
                                <p class="content-item">
                                    <label>Họ và tên
                                        <input type="text" placeholder="Nguyễn Văn A" name="fullname" autocomplete="off">
                                        <p class="error_name"></p>
                                    </label>
                                </p>
                                <p class="content-item">
                                    <label>Email
                                        <input type="text" placeholder="nguyenvana@email.com" name="email" autocomplete="off">
                                        <p class="error_email">
                                            <?php
                                            if (isset($_SESSION["error_account"])) {
                                                echo $_SESSION["error_account"];
                                                unset($_SESSION["error_account"]);
                                            }
                                            ?>
                                        </p>
                                    </label>
                                </p>
                                <p class="content-item">
                                    <label>Số điện thoại
                                        <input type="number" placeholder="0123456789" name="phone_number" autocomplete="off">
                                        <p class="error_phone_number"></p>
                                    </label>
                                </p>
                                <p class="content-item">
                                    <label class="input-password">Mật khẩu
                                        <input type="password" placeholder="*****" name="password" autocomplete="off" required>
                                        <span class="show-password"><i class="far fa-eye"></i></span>
                                        <p class="notice-password">(*)Mật khẩu từ 6-20 ký tự chứa ít nhất 1 chữ <br> số, chứ hoa và chữ thường</p>
                                        <p class="error_password"></p>
                                    </label>
                                </p>
                                <p class="content-item ">
                                    <label class="input-password">Nhập lại mật khẩu
                                        <input type="password" placeholder="*****" name="password_again" autocomplete="off" required>
                                        <span class="show-password-again"><i class="far fa-eye"></i></span>
                                        <p class="error_password_again"></p>
                                    </label>
                                </p>
                                <button type="button" class="signup btn-signup">Đăng kí</button>
                                <a href="./signin.php" class="login">Đăng nhập</a>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </body>
    <script src="./assets/js/signup.js"></script>

</html>