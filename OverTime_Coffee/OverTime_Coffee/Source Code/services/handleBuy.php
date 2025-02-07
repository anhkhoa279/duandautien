<?php
if (isset($_POST["act-buy"])) {
    include_once "./services/database.php";
    $db = new db();

    $username = $_SESSION["user"];
    $coffee = $_POST["coffee"] ?? '';
    $cake = $_POST["CAKE"] ?? '';
    $soluong = $_POST["so-luong-mua"] ?? '';
    $tonggia = $_POST["tong-gia"] ?? '';
    $current_time = time();
    $current_date = date("Y-m-d H:i:s", $current_time);

    $query = "INSERT INTO history (username, food, type, so_luong, tong_gia, thoi_gian) values (?, ?, ?, ?, ?, ?)";

    if (!empty($coffee)) {
        $result = $db->runQuery($query, 'sssiis', array($username, $coffee, "coffee", $soluong, $tonggia, $current_date));
    } elseif (!empty($cake)) {
        $result = $db->runQuery($query, 'sssiis', array($username, $cake, "cake", $soluong, $tonggia, $current_date));
    }

    echo "<div class='alert alert-success'>Thành công mua ! Cảm ơn bạn đã tin tưởng OverTime Coffee !</div>";
}
?>