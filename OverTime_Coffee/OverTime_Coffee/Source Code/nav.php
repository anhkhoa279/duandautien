<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script>
$(document).ready(function() {
    $('.nav-logo').click(function() {
        window.location = "./index.php"
    });
    $('.nav-home').click(function() {
        window.location = "./index.php"
    });
    $('.nav-menu').click(function() {
        window.location = "./menu.php"
    });
});
</script>

<style>
.nav-main {
    /* background: rgb(0, 0, 0);
    background: linear-gradient(171deg, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.09576330532212884) 100%); */
    background-color: black;
    padding-left: 100px;
    padding-right: 100px;

    .nav-logo {
        color: white;
        font-family: "Clicker Script";
        font-size: 25px;
    }

    .username {
        text-decoration: none;
        font-size: 20px;
    }

    .nav-logo,
    .nav-home,
    .nav-menu {
        cursor: pointer;
    }
}
</style>

<div class="nav-main d-flex justify-content-between align-items-center pt-2 pb-2">
    <div class="nav-logo col-3">OverTime Coffee</div>
    <div class="action col-6 d-flex justify-content-evenly text-white">
        <div class="nav-home">Trang chủ</div>
        <div class="nav-menu">Menu</div>
    </div>
    <div class="login-signup col-3 d-flex text-white justify-content-end align-items-center">
        <div class="login-nav <?php if(isset($_SESSION["user"])) { echo "d-none"; } ?>">
            <a href="./login.php" class="btn text-white">Đăng nhập</a>
        </div>
        <div class="sign-up-nav ms-3 <?php if(isset($_SESSION["user"])) { echo "d-none"; } ?>">
            <a href="./signUp.php" class="btn btn-outline-warning">Đăng ký</a>
        </div>
        <a href="./user-page.php"
            class="username text-white <?php if(!isset($_SESSION["user"])) { echo "d-none"; } ?> ">
            <?php if(isset($_SESSION["user"])) { echo $_SESSION["user"]; } ?>
        </a>
    </div>
</div>