<?php
if (isset($_POST["account-sign-up"])) {
    $username = $_POST["username"] ?? '';
    $fullname = $_POST["fullname"] ?? '';
    $email = $_POST["email"] ?? '';
    $phone = $_POST["phone"] ?? '';
    $password = $_POST["password"] ?? '';
    $passwordRepeat = $_POST["co-password"] ?? '';
    $errors = [];

    if (empty($fullname) || strlen($fullname) < 3) {
        $errors[] = "Họ tên không hợp lệ !!!";
    }
    if (strlen($phone) < 10 || strlen($phone) > 11) {
        $errors[] = "Số điện thoại không hợp lệ !!!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không hợp lệ";
    }
    if (strlen($password) < 8) {
        $errors[] = "Mật khẩu phải từ 8 kí tự";
    }
    if ($password !== $passwordRepeat) {
        $errors[] = "Mật khẩu không khớp";
    }

    include_once "database.php";
    
    $database = new db();
    $query = "SELECT * FROM user WHERE username = ?";
    $result = $database->runQuery($query, 's', array($username));
    if (! empty($result)) {
        $errors[] = "Username đã tồn tại!";
    }

    $query = "SELECT * FROM user WHERE email = ?";
    $result = $database->runQuery($query, 's', array($email));
    if (! empty($result)) {
        $errors[] = "Email đã tồn tại!";
    }

    if (empty($errors)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username, fullname, email, phone, password) VALUES (?, ?, ?, ?, ?)";
        $result = $database->runQuery($query, 'sssss', array($username, $fullname, $email, $phone, $passwordHash));
        
        require_once "auth.php";
        $auth = new Auth();
        
        $_SESSION["user"] = $username;

        $cookie_expiration_time = time() + (30 * 24 * 60 * 60);
        
        setcookie("username", $username, $cookie_expiration_time);

        $random_password = bin2hex(random_bytes(16));
        setcookie("random_password", $random_password, $cookie_expiration_time);

        $random_selector = bin2hex(random_bytes(16));
        setcookie("random_selector", $random_selector, $cookie_expiration_time);

        $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
        $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

        $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);
        $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);

        header("Location: ../index.php");
    }
}
?>