<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/menu.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        let clickedClass = localStorage.getItem('clickedButton');
        if (clickedClass) {
            setTimeout(function() {
                $('.' + clickedClass).click();
                localStorage.removeItem('clickedButton');
            }, 1000);
        }

        $('.add-cart').click(function() {
            let img = $(this).data('img');
            let name = $(this).data('name');
            let type = $(this).data('type');
            let price = $(this).data('price');
            let content =
                '<img class="mx-auto d-block" src="' + img + '" />' +
                '<div class="text-center mt-3">' +
                '<div class="text-capitalize" value="' + name + '" name="' + type + '">' + name +
                '</div>' +
                '<label>Số lượng : </label>' +
                '<select class="so-luong-select">' +
                '<option value="1">1</option>' +
                '<option value="2">2</option>' +
                '<option value="3">3</option>' +
                '<option value="4">4</option>' +
                '<option value="5">5</option>' +
                '<option value="6">6</option>' +
                '<option value="7">7</option>' +
                '<option value="8">8</option>' +
                '<option value="9">9</option>' +
                '<option value="10">10</option>' +
                '<option value="11">11</option>' +
                '<option value="12">12</option>' +
                '<option value="13">13</option>' +
                '<option value="14">14</option>' +
                '<option value="15">15</option>' +
                '<option value="16">16</option>' +
                '<option value="17">17</option>' +
                '<option value="18">18</option>' +
                '<option value="19">19</option>' +
                '<option value="20">20</option>' +
                '</select>' +
                '<div class="price">Giá : ' + price + '.000 VND</div>' +
                '</div>';
            $('.input-sl').html(content);

            let footer =
                '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>' +
                '<button data-price="' + price + '" data-img="' + img + '" data-name="' + name +
                '" data-type="' + type +
                '" type="button" class="buy-btn btn btn-warning" data-bs-toggle="modal" data-bs-target="#confirm-buy">Nhập thông tin mua</button>';
            $('.add-to-cart-footer').html(footer);
        });

        $(document).on('click', '.buy-btn', function() {
            $.ajax({
                url: 'services/get-session.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var session = response.data;
                    } else {
                        window.location = "./login-signup.php";
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX request failed:', error);
                }
            });

            let img = $(this).data('img');
            let name = $(this).data('name');
            let type = $(this).data('type');
            let quantity = $('.so-luong-select').val();
            let price = $(this).data('price');
            let cost = quantity * price;
            let content =
                '<div class="content">' +
                '<img class="mx-auto d-block" src="' + img + '" />' +
                '<div class="text-center mt-3">' +

                '<input type="hidden" value="' + name + '" name="' + type + '"/>' +
                '<div class="text-capitalize">Sản phẩm : ' + name + '</div>' +

                '<input type="hidden" name="so-luong-mua" value="' + quantity + '" />' +
                '<div>Số lượng : ' + quantity + '</div>' +

                '<input type="hidden" name="tong-gia" value="' + cost + '" />' +
                '<div>Tổng : ' + cost + '.000 VND</div>' +
                '</div>' +
                '</div>';
            $('.buy-body').append(content);
        });

        $(document).on('click', '.close-buy-btn', function() {
            $(this).closest('.modal').find('.buy-body .content').remove();
        });
    });
    </script>


</head>

<body>
    <div class="menu">
        <?php
            include_once "nav.php";
        ?>
        <div class="container pt-5 pb-5">
            <div class="title text-center">MENU</div>
            <div class="select-food">
                <form method="post" class="d-flex justify-content-center gap-5 mt-5 mb-5">
                    <input type='submit' name='choose' value='COFFEE' class='btn btn-warning' />
                    <input type='submit' name='choose' value='CAKE' class='btn btn-warning' />
                </form>
            </div>
            <?php
                include_once "./services/handleBuy.php";
            ?>
            <div class="coffee d-flex gap-3 flex-wrap justify-content-center">
                <?php
                include_once "./services/database.php";
                $db = new db();
                $choose = $_POST['choose'] ?? '';
                if (isset($_POST['choose'])) {
                    $choose = $_POST['choose'];
                    $query = "SELECT * from $choose";
                } else {
                    $choose = "coffee";
                    $query = "SELECT * from $choose";
                }
	            $result = $db->runBaseQuery($query);
                
                if (!empty($result)) {
                    foreach ($result as $item) {
                        echo '<div class="col-3 bg-coffee" method="post">';
                        echo '<img src="' . $item['img_name'] . '" />';
                        echo '<div class="coffee-name text-center mt-3 text-capitalize">' . $item['name'] . '</div>';
                        echo '<div class="price text-center mb-4">' . $item['price'] . '.000 VND</div>';
                        echo '<div class="d-flex justify-content-center mb-3">';
                        echo '<button data-price="' . $item['price'] . '" data-img="' . $item['img_name'] . '" data-name="' . $item['name'] . '" data-type="' . $choose . '" type="button" class="' . $item['name'] . ' add-cart btn btn-warning" data-bs-toggle="modal" data-bs-target="#add-to-cart">Mua</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="modal fade" id="add-to-cart" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <form method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Sản Phẩm</h5>
                            </div>
                            <div class="modal-body input-sl">
                            </div>
                            <div class="modal-footer add-to-cart-footer">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="modal fade" id="confirm-buy" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <form method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Điền thông tin</h5>
                            </div>
                            <div class="modal-body buy-body">
                                <?php
                                include_once "./services/auth.php";
                                $auth = new Auth();
                                $username = $_SESSION["user"];
                                $user = $auth->getUserByUsername($username);
                                ?>
                                <div class="mb-3">
                                    <label class="form-label">Họ tên : </label>
                                    <input value="<?php echo $user[0]["fullname"] ?>" type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SĐT : </label>
                                    <input value="<?php echo $user[0]["phone"] ?>" type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Địa chỉ : </label>
                                    <textarea class="form-control" rows="3"><?php echo $user[0]["address"] ?></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="close-buy-btn btn btn-secondary"
                                    data-bs-dismiss="modal">Đóng</button>
                                <button name="act-buy" type="submit" class="btn btn-warning act-buy-btn">Mua</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <?php
        include_once "footer.php"
    ?>
</body>

</html>