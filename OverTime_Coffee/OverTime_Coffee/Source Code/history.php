<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ./index.php");
    exit();
}
include_once "./services/database.php";
$db = new db();
$username = $_SESSION["user"];

$item_per_page = 9;
$query = "SELECT * FROM history WHERE username = ?";
$result = $db->runQuery($query, 's', array($username));
$totalItems = count($result);
$totalPage = ceil($totalItems / $item_per_page)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/history.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet' />
</head>

<body>
    <div class="history">
        <?php
            include_once "nav.php";
        ?>
        <div class="container">
            <div class="content">
                <div class="title">Lịch Sử</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sản Phẩm</th>
                            <th scope="col">Loại</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Giá tiền</th>
                            <th scope="col">Ngày Mua</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['page'])) { 
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        $start = ($page - 1) * $item_per_page;
                        $query = "SELECT * FROM history WHERE username = ? LIMIT ?, ?";
                        $result = $db->runQuery($query, 'sii', array($username, $start, $item_per_page));
                        
                        if (!empty($result)) {
                            foreach ($result as $index => $item) {
                                echo '<tr>';
                                echo '<td>' . $index+1 . '</td>';
                                echo '<td>' . $item["food"] . '</td>';
                                echo '<td>' . $item["type"] . '</td>';
                                echo '<td>' . $item["so_luong"] . '</td>';
                                echo '<td>' . $item["tong_gia"] . '.000 VND</td>';
                                echo '<td>' . $item["thoi_gian"] . '</td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                    </tbody>
                </table>
                <nav class="d-flex justify-content-center">
                    <ul class="pagination pag-bg">
                        <?php
                        for ($i = 1; $i < $totalPage+1; $i++) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>

</html>