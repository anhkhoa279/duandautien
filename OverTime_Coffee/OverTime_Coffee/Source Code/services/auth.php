<?php
require_once "database.php";
class Auth {
    function getUserByUsername($username) {
        $db = new db();
        $query = "SELECT * from user where username = ?";
        $result = $db->runQuery($query, 's', array($username));
        return $result;
    }

    function getTokenByUsername($username,$expired) {
	    $db = new db();
	    $query = "SELECT * from token_login where username = ? and is_expired = ?";
	    $result = $db->runQuery($query, 'si', array($username, $expired));
	    return $result;
    }

    function insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date) {
        $db = new db();
        $query = "INSERT INTO token_login (username, password_hash, selector_hash, expiry_date) values (?, ?, ?,?)";
        $result = $db->runQuery($query, 'ssss', array($username, $random_password_hash, $random_selector_hash, $expiry_date));
        return $result;
    }

    function markAsExpired($tokenId) {
        $db = new db();
        $query = "UPDATE token_login SET is_expired = ? WHERE id = ?";
        $expired = 1;
        $result = $db->runQuery($query, 'ii', array($expired, $tokenId));
        return $result;
    }

    function removeCookie () {
        if (!empty($_COOKIE["username"])) {
            setcookie("username", "", time() - 3600);
        }
        if (!empty($_COOKIE["random_password"])) {
            setcookie("random_password", "", time() - 3600);
        }
        if (!empty($_COOKIE["random_selector"])) {
            setcookie("random_selector", "", time() - 3600);
        }
    }
}
?>