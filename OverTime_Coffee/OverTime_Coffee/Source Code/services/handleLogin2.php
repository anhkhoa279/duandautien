<?php
session_start();
require_once "auth.php";

$auth = new Auth();

require_once "token_validate.php";

if ($isLoggedIn) {
    header("Location: ../index.php");
}
if (isset($_POST["account-login"])) {
    $isAuthenticated = false;
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';
    $user = $auth->getUserByUsername($username);
    if (!empty($user)) {
        if (password_verify($password, $user[0]["password"])) {
            $isAuthenticated = true;
        }
        if ($isAuthenticated) {
            $_SESSION["user"] = $user[0]["username"];
            if (! empty($_POST["remember"])) {
                setcookie("username", $username, $cookie_expiration_time);
    
                $random_password = bin2hex(random_bytes(16));
                setcookie("random_password", $random_password, $cookie_expiration_time);
    
                $random_selector = bin2hex(random_bytes(16));
                setcookie("random_selector", $random_selector, $cookie_expiration_time);
    
                $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
                $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);
    
                $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);
    
                $userToken = $auth->getTokenByUsername($username, 0);
                if (! empty($userToken[0]["id"])) {
                    $auth->markAsExpired($userToken[0]["id"]);
                }
                $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
            } else {
                $auth->removeCookie();
            }
            header("Location: ../index.php");
        }
    } else {
        echo "<div class='alert alert-danger'>Username or Password is wrong!</div>";
    }
}
?>