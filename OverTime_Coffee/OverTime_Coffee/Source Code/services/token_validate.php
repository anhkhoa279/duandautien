<?php
require_once "auth.php";

$auth = new Auth();

$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);
$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);
$isLoggedIn = false;

if (! empty($_SESSION["user"])) {
    $isLoggedIn = true;
} else if (! empty($_COOKIE["username"]) && ! empty($_COOKIE["random_password"]) && ! empty($_COOKIE["random_selector"])) {
    $isPasswordVerified = false;
    $isSelectorVerified = false;
    $isExpiryDateVerified = false;
    $userToken = $auth->getTokenByUsername($_COOKIE["username"],0);

    if (password_verify($_COOKIE["random_password"], $userToken[0]["password_hash"])) {
        $isPasswordVerified = true;
    }

    if (password_verify($_COOKIE["random_selector"], $userToken[0]["selector_hash"])) {
        $isSelectorVerified = true;
    }

    if($userToken[0]["expiry_date"] >= $current_date) {
        $isExpiryDateVerified = true;
    }

    if (!empty($userToken[0]["id"]) && $isPasswordVerified && $isSelectorVerified && $isExpiryDateVerified) {
        $isLoggedIn = true;
    } else {
        if(!empty($userToken[0]["id"])) {
            $auth->markAsExpired($userToken[0]["id"]);
        }
        $auth->removeCookie();
    }
}
?>