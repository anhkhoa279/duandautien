<?php
if (isset($_SESSION["user"])) {
   header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/login.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
</head>

<body>
    <div class="login">
        <?php
            include_once "nav.php";
        ?>
        <div class="container pt-5">
            <div class="content col-5 mx-auto">
                <img src="./assets/login-text.png" />
                <?php
                    include "./services/handleLogin2.php";
                ?>
                <form action="" method="post">
                    <div class="username form-login">
                        <input type="input" class="input-login" placeholder="Username" name="username" required
                            autocomplete="off" />
                        <label for="username" class="label-login">Username</label>
                    </div>
                    <div class="password form-login">
                        <input type="password" class="input-login" placeholder="Mật khẩu" name="password" required
                            autocomplete="off" />
                        <label for="password" class="label-login">Mật khẩu</label>
                    </div>
                    <div class="mt-3">
                        <input type="checkbox" name="remember" <?php if(isset($_COOKIE["user"])) { ?> checked
                            <?php } ?> />
                        <label for="remember" class="text-white">Lưu tài khoản</label>
                    </div>
                    <div class="click-login mt-5">
                        <input type='submit' name='account-login' value='Đăng nhập' class='btn-login' />
                    </div>
                </form>
                <form action="./services/handler.php" method="post"
                    class="sign-up d-flex text-white gap-2 justify-content-center mt-2">
                    <div>Bạn là người mới?</div>
                    <input type='submit' name='sign-up-button' value='Đăng ký nào !' class='sign-up-text' />
                </form>
            </div>
        </div>
    </div>
</body>

</html>