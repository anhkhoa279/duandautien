<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/index.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.cappuccino, .chailatte, .macchiato, .expresso').click(function() {
            let clickedClass = $(this).attr('class').split(' ')[0];
            localStorage.setItem('clickedButton', clickedClass);
            window.location = './menu.php';
        });

        $('.to-menu').click(function() {
            window.location = './menu.php';
        });

        $('.to-login').click(function() {
            window.location = './login.php';
        });
    });
    </script>
</head>

<body>
    <div class="header">
        <?php
            include_once "nav.php";
        ?>
        <div class="container">
            <div class="content col-5 d-flex flex-column text-white">
                <div class="content-1">Chào mừng bạn đến với<div>
                        <div class="coffee mt-5 mb-5">
                            <img src="./assets/Coffee.png" />
                        </div>
                        <div class="content-2">Cám ơn bạn đã chọn OverTime, chúc bạn một ngày tốt lành! Hãy lựa chọn
                            một ly cà phê yêu thích hoặc chiếc bánh ngọt hấp dẫn để thưởng thức trọn vẹn hương vị tại
                            OverTime Coffee.
                        </div>
                        <div class="order-now mt-4">
                            <button type="button" class="to-menu btn btn-warning">Mua Ngay</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="introduce">
                <div class="container d-flex align-items-center">
                    <div class="intro-left col-6 d-flex flex-column">
                        <div class="title">Khám phá loại cà phê ngon nhất</div>
                        <div class="detail mt-3 mb-3">OverTime là một quán cà phê cung cấp cho bạn loại cà phê chất
                            lượng giúp tăng năng suất và giúp bạn cải thiện tâm trạng. Uống một tách cà phê thì tốt,
                            nhưng uống một tách cà phê thật thì tuyệt hơn. Không còn nghi ngờ gì nữa, bạn sẽ thích loại
                            cà phê này hơn những loại khác mà bạn từng nếm thử.
                        </div>
                    </div>
                    <div class="intro-right col-6 d-flex justify-content-end">
                        <img src="./assets/cup-coffee.png" />
                    </div>
                </div>
            </div>
            <div class="coffee-style">
                <div class="container">
                    <div class="title text-center">Hãy cảm nhận sự hòa quyện của cà phê</div>
                    <div class="detail text-center mt-4 mb-5">Khám phá tất cả các hương vị cà phê cùng chúng tôi. Luôn
                        có một tách cà phê mới đáng để trải nghiệm</div>
                    <div class="coffee d-flex gap-3">
                        <div class="cappuccino col-3 bg-coffee">
                            <img src="./assets/cappuccino.png" />
                            <div class="coffee-name text-center mt-3">Cappuccino</div>
                            <div class="detail text-center mt-2 mb-2">Coffee 50% | Milk 50%</div>
                            <div class="price text-center mb-4">30.000 VND</div>
                            <div class="order text-center">
                                <button type="button" class="btn btn-warning">Mua Ngay</button>
                            </div>
                        </div>
                        <div class="chailatte col-3 bg-coffee">
                            <img src="./assets/chailattle.png" />
                            <div class="coffee-name text-center mt-3">ChaiLatte</div>
                            <div class="detail text-center mt-2 mb-2">Coffee 50% | Milk 50%</div>
                            <div class="price text-center mb-4">30.000 VND</div>
                            <div class="order text-center">
                                <button type="button" class="btn btn-warning">Mua Ngay</button>
                            </div>
                        </div>
                        <div class="macchiato col-3 bg-coffee">
                            <img src="./assets/macchiato.png" />
                            <div class="coffee-name text-center mt-3">Macchiato</div>
                            <div class="detail text-center mt-2 mb-2">Coffee 50% | Milk 50%</div>
                            <div class="price text-center mb-4">40.000 VND</div>
                            <div class="order text-center">
                                <button type="button" class="btn btn-warning">Mua Ngay</button>
                            </div>
                        </div>
                        <div class="expresso col-3 bg-coffee">
                            <img src="./assets/expresso.png" />
                            <div class="coffee-name text-center mt-3">Expresso</div>
                            <div class="detail text-center mt-2 mb-2">Coffee 50% | Milk 50%</div>
                            <div class="price text-center mb-4">30.000 VND</div>
                            <div class="order text-center">
                                <button type="button" class="btn btn-warning">Mua Ngay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="why-different mt-5 mb-5">
                <div class="container">
                    <div class="title text-center">Tại sao cà phê chúng tôi lại khác biệt<div>
                            <div class="detail text-center mt-4 mb-5">Chúng tôi không chỉ pha cà phê cho bạn, chúng tôi
                                làm cho ngày của bạn trở nên tuyệt vời!
                            </div>
                            <div class="reason d-flex gap-3">
                                <div class="beans col-3 bg-why-beans pt-5 pb-5">
                                    <img class="mx-auto d-block" src="./assets/coffee-beans.png" />
                                    <div class="title text-center mt-3 mb-3">Hạt cà phê</div>
                                    <div class="detail text-center mx-auto col-6">Mang lại hương vị tuyệt vời</div>
                                </div>
                                <div class="quality col-3 pt-5 pb-5 bg-why-2">
                                    <img class="mx-auto d-block" src="./assets/badge.png" />
                                    <div class="title text-center mt-3 mb-3">Chất lượng</div>
                                    <div class="detail text-center mx-auto col-6">Luôn ưu tiên chất lượng cà phê tốt
                                        nhất
                                    </div>
                                </div>
                                <div class="extraordinary col-3 pt-5 pb-5 bg-why-2">
                                    <img class="mx-auto d-block" src="./assets/coffee-cup.png" />
                                    <div class="title text-center mt-3 mb-3">Đặc biệt</div>
                                    <div class="detail text-center mx-auto col-6">Mang tới sự mới lạ cho khách hàng
                                    </div>
                                </div>
                                <div class="best-price col-3 pt-5 pb-5 bg-why-2">
                                    <img class="mx-auto d-block" src="./assets/best-price.png" />
                                    <div class="title text-center mt-3 mb-3">Giá cả</div>
                                    <div class="detail text-center mx-auto col-6">Vừa phải, vừa đảm bảo cho bạn một ly
                                        cà phê
                                    </div>
                                </div>
                                <div class="great-ideas text-center mt-5 mb-2">Great ideas start with great coffee, Lets
                                    help
                                    you
                                    achieve
                                    that</div>
                                <div class="get-started text-center mb-3">Get started today.</div>
                                <div class="join-us text-center">
                                    <button type="button" class="to-login btn btn-warning">Tham Gia Ngay</button>
                                </div>
                            </div>
                        </div>
                        <div class="get-a-chance">
                            <div class="container d-flex align-items-center">
                                <div class="content col-5">
                                    <div class="title text-white">Đây là cơ hội đặc biệt để bắt đầu ngày mới tràn đầy
                                        năng
                                        lượng
                                        với
                                        cà phê.
                                    </div>
                                    <div class="detail col-8 text-white mt-3 mb-4">Cơ hội độc nhất để trải nghiệm buổi
                                        sáng
                                        tuyệt
                                        vời cùng hương vị cà phê đẳng cấp.
                                    </div>
                                    <div class="order-now">
                                        <button type="button" class="to-menu btn btn-warning">Mua Ngay</button>
                                    </div>
                                </div>
                                <div class="g-image col-6 d-flex justify-content-end">
                                    <img src="./assets/get-a-chance-cup.png" />
                                </div>
                            </div>
                        </div>
                        <div class="perfection-feedback mt-5 mb-5">
                            <div class="container">
                                <div class="title text-center">Sự hoàn hảo tại OverTime Coffee luôn dành cho khách hàng
                                </div>
                                <div class="detail text-center mt-3 mb-5">Một số đánh giá về cà phê và bánh của tiệm
                                </div>
                                <div class="main col-10 mx-auto">
                                    <div class="tick">
                                        <img src="./assets/tick.png" />
                                    </div>
                                    <div class="main-text text-center col-9 mx-auto">Overtime Coffee là nơi lý tưởng cho
                                        những ai muốn tìm kiếm một không gian ấm cúng và thư giãn. Với ánh đèn vàng dịu
                                        nhẹ và phong cách trang trí vintage, quán tạo cảm giác gần gũi, thân thiện ngay
                                        từ cái nhìn đầu tiên.
                                        Ngoài
                                        các loại cà phê được pha chế tỉ mỉ, quán còn phục vụ các loại bánh ngọt thơm
                                        ngon,
                                        phù
                                        hợp
                                        để thưởng thức trong các buổi gặp mặt, làm việc hoặc thậm chí là thời gian thư
                                        giãn
                                        một
                                        mình. Dù bạn đến để làm việc hay thư giãn, Overtime Coffee hứa hẹn sẽ là một góc
                                        nhỏ
                                        đáng
                                        nhớ giữa nhịp sống hối hả.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="subscribe pt-5 pb-5">
                            <div class="container">
                                <div class="title text-white text-center">Đăng ký để biết thêm về Over Time Coffee
                                </div>
                                <div class="detail text-white text-center mt-4 mb-5">Đừng bỏ lỡ những ưu đãi đặc biệt
                                    mới nhất của chúng tôi</div>
                                <div class="enter-email">
                                    <form class="form-subscribe mx-auto">
                                        <input type="email" class="email-field" placeholder="E-Mail" />
                                        <button type="button" class="btn-subscribe">Đăng ký</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
    include_once "footer.php"
    ?>
</body>


</html>