<?php
session_start();
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
    <link rel="stylesheet" href="./style/login-signup.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
</head>

<body>
    <div class="login-signup">
        <div class="container pt-4">
            <form action="./services/handler.php" method="post" class="content d-flex mx-auto">
                <div class="sign-up">
                    <div class="logo">
                        <img src="./assets/signup.png" />
                    </div>
                    <div class="click">
                        <div class="detail">New Here?</div>
                        <input type='submit' name='sign-up-button' value='Sign Up' class='btn-login-signup' />
                    </div>
                </div>
                <div class="login">
                    <div class="logo">
                        <img src="/assets/login.png" />
                    </div>
                    <div class="click">
                        <div class="detail text-white">Already Have an Account ?</div>
                        <input type='submit' name='login-button' value='Login' class='btn-login-signup' />
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>