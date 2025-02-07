<?php
    if(isset($_POST['sign-up-button'])) {
        header("location: /signUp.php");
    exit;
    }

    if(isset($_POST['login-button'])) {
        header("location: /login.php");
    exit;
    }
?>