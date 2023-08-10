<?php 
require('connect.php');
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $otp = rand(111111,999999);
    $updateTokenQuery = "update users set otp = '$otp' where email = '$email'";
    if(mysqli_query($conn,$updateTokenQuery)){
        $to_Mail = $email;
        $subject = 'Resetpassword';
        $message = 'Nhấn vào liên kết sau để đổi mật khẩu: http://localhost/PHP/asgm/resetPsw.php?otp=' . $otp;
        $headers = "From: tinhdz3092004@gmail.com";
        if (mail($to_Mail, $subject, $message, $headers)) {
            echo '<script>alert("Vui lòng check mail để lấy mã otp đặt lại pass")</script>';
        }        
    }  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUGAR PHONE</title>
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/forgotPsw.css">
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
            <div class="form">
                <a class="change" href="./login.php"><i class="fa-solid fa-arrow-right fa-rotate-180"></i></a>
                <h4>PHỤC HỒI MẬT KHẨU</h4>
                <form action="" method="POST">
                    <div class="input">
                        <input name="email" type="email" required placeholder="Nhập emal của bạn">
                    </div>
                    <div class="btn-submit">
                        <button>Gửi</button>
                    </div>
                </form>
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
</body>
</html>