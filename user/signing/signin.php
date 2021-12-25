<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/signin.css">
    <title>Document</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content">
            <div class="login-wrapper shadow-box">
                <div class="company-details ">
                    <div class="shadow"></div>
                    <div class="wrapper-1">
                        <h1 class="title">Tech Market</h1>
                        <div class="slogan">Welcome!</div>
                    </div>
                </div>
                <div class="login-form ">
                    <div class="wrapper-2">
                        <div class="form-title">Đăng nhập</div>
                        <div class="form">
                            <form method="POST" action="./process/process_signin.php">
                                <p class="content-item">
                                    <label>Email
                                        <input type="text" placeholder="nguyenvana@email.com" name="email" required>
                                        <p class="error_email">
                                            <?php
                                            if (isset($_GET["error_email"])) echo $_GET["error_email"];
                                            ?>
                                        </p>
                                    </label>
                                </p>
                                <p class="content-item">
                                    <label class="input-password">Mật khẩu
                                        <input type="password" placeholder="*****" name="password" autocomplete="off" required>
                                        <span class="show-password"><i class="far fa-eye"></i></span>
                                        <p class="error_password">
                                            <?php
                                            if (isset($_GET["error_password"])) echo $_GET["error_password"];
                                            ?>
                                        </p>
                                    </label>
                                </p>
                                <p class="content-item">
                                    <label>
                                        <input type="checkbox" name="remember">
                                        Ghi nhớ đăng nhập
                                    </label>
                                </p>
                                <button type="submit" class="login" onclick="return checkForm()">Đăng nhập</button>
                                <a href="./signup.php" class="signup">Đăng Kí</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="./assets/js/signin.js"></script>

</html>