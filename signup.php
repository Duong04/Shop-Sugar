<?php
session_start();
require('./sql/connect.php');
if(isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['confirm-psw']) && isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $hashedpsw = password_hash($psw, PASSWORD_DEFAULT);
    $confirmPsw = $_POST['confirm-psw'];
    $checkEmailQuery = "select * from users where email = '$email'";
    $emailResult = mysqli_query($conn, $checkEmailQuery);
    if(mysqli_num_rows($emailResult)){
        $message = 'Tài khoản này đã có người đăng ký';
    }else{
        if(password_verify($confirmPsw, $hashedpsw)) {
        $query = "insert into users(email,username, password, role, createday, status) 
                  VALUES('$email','$name', '$hashedpsw', 'user', NOW(), 'Chưa kích hoạt')";    
        
            if(mysqli_query($conn, $query)) {
                $to_Mail = $email;
                $subject = 'Xác nhận đăng ký';
                $message = 'Nhấn vào liên kết sau để xác nhận đăng ký: http://localhost/PHP/asgm/confirm.php';
                $headers = "From: tinhdz3092004@gmail.com";
                if (mail($to_Mail, $subject, $message, $headers)) {
                    echo '<script>alert("Vui lòng check mail xác nhận để đăng ký hoàn tất")</script>';
                }
            } else {
                $messages = 'Có lỗi xảy ra khi thêm dữ liệu';
            }
        } else {
        $messages = 'mật khẩu không khớp mời bạn nhập lại';
        }
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
    <link rel="stylesheet" href="./assets/css/signup.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
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
                    <h3>Đăng ký</h3>
                    <form action="" method="POST">
                        <div class="your-name">
                            <label for="name">Họ và tên (<span style="color: var(--red-color);"> * </span>)</label>
                            <input name="name" type="text" id="name" placeholder="Họ và tên" required>
                        </div>
                        <div class="email-phone">
                            <label for="email">Email (<span style="color: var(--red-color);"> * </span>)</label>
                            <input name="email" type="email" id="email" placeholder="Email của bạn" required>
                        </div>
                        <div class="password">
                            <label for="psw">Mật khẩu (<span style="color: var(--red-color);"> * </span>)</label>
                            <input name="psw" id="psw" type="password" placeholder="Mật khẩu" required>
                            <i id="eye" class="fa-regular fa-eye-slash"></i>
                        </div>
                        <span id="erorr"></span>
                        <div class="password">
                            <label for="psw2">Nhập lại mật khẩu (<span style="color: var(--red-color);"> * </span>)</label>
                            <input name="confirm-psw" id="psw2" type="password" placeholder="nhập lại mật khẩu" required>
                            <i id="eye2" class="fa-regular fa-eye-slash"></i>
                        </div>
                        <span id="erorr2"></span>
                        <div class="messages">
                            <?php if(isset($messages)){echo $messages;} ?>
                        </div>
                        <div class="btn-signup">
                            <button>Đăng ký</button>
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
                            <p>Bạn đã có tài khoản? <a href="./login.php">Đăng nhập</a></p>
                        </div>
                        <div class="check-box">
                            <input type="checkbox" required>
                            <span>Bằng việc đăng ký, bạn đã đồng ý về <a href="">điều khoản dịch vụ</a> & <a href="">chính sách bảo mật</a></span>
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
    <script src="./assets/js/signup.js"></script>
</body>
</html>