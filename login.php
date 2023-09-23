<?php 
session_start();
require('./sql/connect.php');
if (isset($_POST['email']) && isset($_POST['psw'])){
    $email = $_POST["email"];
    $password = $_POST["psw"];
    $sql_check_user = "select * from users where email = '$email'";
    $result = mysqli_query($conn, $sql_check_user);
    $user = mysqli_fetch_array($result);
    $psw = $user['password'];
    if($user !== null){
        if ($user["status"] == "Đã kích hoạt") {
            if (password_verify($password,$psw)) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: index.php");
                mysqli_close($conn);
            } else {
                $erorr = "Mật khẩu không đúng.";
            }
        } else {
            $erorr = "Tài khoản chưa kích hoạt";
        }
    }else{
        $erorr = "Tài khoản không tồn tại";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUGAR MOBILE</title>
    <link rel="icon" href="./assets/img/logo/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./responsive/header.css">
    <link rel="stylesheet" href="./responsive/footer.css">
    <link rel="stylesheet" href="./responsive/login.css">
</head>
<body>
    <main>
        <header>
        <?php include('header.php'); ?>
        </header>
        <!-- article -->
        <article>
            <div class="main-form">
                <div class="form-img">
                    <img src="./assets/img/login/TGDD-540x270.png" alt="">
                </div>
                <div class="form">
                    <h3>Đăng nhập</h3>
                    <form action="" method="post">
                        <div class="email-phone">
                            <input name="email" type="email" placeholder="Email của bạn" required>
                        </div>
                        <div class="password">
                            <input name="psw" id="psw" type="password" required placeholder="Mật khẩu">
                            <i id="eye" class="fa-regular fa-eye-slash"></i>
                        </div>
                        <div class="error">
                            <?php if(isset($erorr)){
                                echo $erorr;
                            }  ?>
                        </div>
                        <div class="btn-login">
                            <button>Đăng nhập</button>
                        </div>
                        <div class="forgot-password">
                            <a href="./forgotPsw.php">Bạn quên mật khẩu?</a>
                        </div>
                        <div class="or">
                            <span class="sp1"></span>
                            <span class="sp2">Hoặc</span>
                            <span class="sp3"></span>
                        </div>
                        <div class="btn-fb-gg">
                            <button class="btn-fb"><img src="./assets/img/login/logo/logo1.png" alt=""> Facebook</button>
                            <button class="btn-gg"><img src="./assets/img/login/logo/logo2.png" alt=""> Google</button>
                        </div>
                        <div class="change-signup">
                            <p>Bạn chưa có tài khoản? <a href="./signup.php">Đăng ký</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </article>
        <!-- footer -->
        <footer>
        <?php include('footer.php'); ?>
        </footer>
        <div class="cap">
            <h5>© 2023 copy right duongntpd07645</h5>
        </div>
    </main>
    <script src="./assets/js/login.js"></script>
    <script src="./assets/js/header.js"></script>
</body>
</html>