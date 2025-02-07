<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: ./index.php");
   exit();
}
include "./services/handleSignup.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/signup.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
</head>

<body>
    <div class="sign-up">
        <?php include_once "nav.php";?>
        <div class="container d-flex justify-content-center">
            <div class="content col-7 mt-3">
                <img src="./assets/signup-text.png" />
                <form action="./signUp.php" method="post">
                    <div class="d-flex gap-5">
                        <div class="username form-sign-up">
                            <input type="input" class="input-signup" placeholder="Username" name="username" required
                                autocomplete="off" />
                            <label for="username" class="label-signup">Username</label>
                        </div>
                        <div class="fullname form-sign-up">
                            <input type="input" class="input-signup" placeholder="Họ và tên" name="fullname" required
                                autocomplete="off" />
                            <label for="fullname" class="label-signup">Họ và tên</label>
                        </div>
                    </div>
                    <div class="email form-sign-up">
                        <input type="input" class="input-signup" placeholder="Email" name="email" required
                            autocomplete="off" />
                        <label for="email" class="label-signup">Email</label>
                    </div>
                    <div class="phone form-sign-up">
                        <input type="input" class="input-signup" placeholder="SĐT" name="phone" required
                            autocomplete="off" />
                        <label for="phone" class="label-signup">SĐT</label>
                    </div>
                    <div class="password form-sign-up">
                        <input type="password" class="input-signup" placeholder="Mật khẩu" name="password" required
                            autocomplete="off" />
                        <label for="password" class="label-signup">Mật khẩu</label>
                    </div>
                    <div class="co-password form-sign-up">
                        <input type="password" class="input-signup" placeholder="Nhập lại mật khẩu" name="co-password"
                            required autocomplete="off" />
                        <label for="co-password" class="label-signup">Nhập lại mật khẩu</label>
                    </div>
                    <div class="click-sign-up mt-5">
                        <input type='submit' name='account-sign-up' value='Đăng ký' class='btn-sign-up' />
                    </div>
                </form>
                <form action="./services/handler.php" method="post"
                    class="login d-flex text-white gap-2 justify-content-center mt-2">
                    <div>Đã có tài khoản?</div>
                    <input type='submit' name='login-button' value='Đăng nhập' class='login-text' />
                </form>
            </div>
            <div class="anounce mt-5">
                <?php
             if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo '<div class="alert alert-danger">' . $error .'</div>';
                }
            }
            ?>
            </div>
        </div>
    </div>
</body>

</html>