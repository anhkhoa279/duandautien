<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ./login-signup.php");
 }
if (isset($_POST["log-out"])) {
    include_once "./services/auth.php";
    $auth = new Auth();
    $auth->removeCookie();
    session_destroy();
    header("Location: ./index.php");
}
include_once "./services/token_validate.php";

$username = $_SESSION["user"];
$user = $auth->getUserByUsername($username);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/user-page.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
</head>

<body>
    <div class="user-page">
        <?php
            include_once "nav.php";
        ?>
        <div class="container pt-3 d-flex gap-5">
            <div class="left col-4">
                <div class="user mx-auto">
                    <div class="img-user">
                        <img src="./assets/user.png" />
                    </div>
                    <div class="name-user text-center mt-5">
                        <?php
                    echo $_SESSION["user"];
                    ?>
                    </div>
                </div>
            </div>

            <div class="right col-8">
                <?php
                        if (isset($_POST["change"])) {
                            $address = $_POST["address"];
                            $fullname = $_POST["fullname"];
                            $phone = $_POST["phone"];
                            if (empty($fullname) || strlen($fullname) < 3) {
                                $error = "Họ tên không hợp lệ !!!";
                            } elseif (strlen($phone) < 10 || strlen($phone) > 11) {
                                $error = "Số điện thoại không hợp lệ !!!";
                            }
                            if (empty($error)) {
                                include_once "./services/database.php";
                            
                            $db = new db();
                            $query = "UPDATE user SET fullname = ?, phone = ?, address = ? WHERE username = ?";
                            $result = $db->runQuery($query, 'ssss', array($fullname, $phone, $address, $username));
                            header("Refresh:0");
                            }
                        }
                ?>
                <form method="post">
                    <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label class="form-label">Username : </label>
                        <input value="<?php echo $user[0]["username"] ?>" type="text" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Họ tên : </label>
                        <input name="fullname" value="<?php echo $user[0]["fullname"] ?>" type="text"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SĐT : </label>
                        <input name="phone" value="<?php echo $user[0]["phone"] ?>" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Địa chỉ : </label>
                        <textarea name="address" class="form-control"
                            rows="3"><?php echo $user[0]["address"] ?></textarea>
                        <input class="btn btn-success" name="change" type="submit" value="Lưu thay đổi">
                    </div>
                </form>
                <div class="history mb-3">
                    <a class="btn btn-primary" href="./history.php">Lịch sử mua hàng</a>
                </div>
                <div class="logout">
                    <form method="post">
                        <input class="btn btn-danger" name="log-out" type="submit" value="Đăng xuất">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>