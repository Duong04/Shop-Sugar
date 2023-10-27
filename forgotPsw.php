<?php 
require('./sql/connect.php');
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $otp = rand(111111,999999);
    $updateTokenQuery = "update users set otp = '$otp' where email = '$email'";
    if(mysqli_query($conn,$updateTokenQuery)){
            require './PHPMailer/src/Exception.php';
            require './PHPMailer/src/PHPMailer.php';
            require './PHPMailer/src/SMTP.php';
            $mail = new PHPMailer\PHPMailer\PHPMailer;

            try {
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com';                     
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'tinhdz3092004@gmail.com';                    
                $mail->Password   = 'goyc mujp vsqq xvqt';                               
                $mail->SMTPSecure = 'ssl';            
                $mail->Port       = 465;                                   
                
                //Recipients
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('tinhdz3092004@gmail.com', 'Sugar mobile');
                $mail->addAddress($email); 
                $mail->isHTML(true);                            
                $mail->Subject = 'Reset password';
                $mail->Body    = 'Nhấn vào liên kết sau để đổi mật khẩu: http://localhost/php/asgm/resetPsw.php?otp=' . $otp;
                $mail->AltBody = 'Nhấn vào liên kết sau để đổi mật khẩu: http://localhost/php/asgm/resetPsw.php?otp=' . $otp;
                
                $mail->send();
                echo "<script>alert('Vui lòng check mail để lấy mã otp đặt lại pass');</script>";
            } catch (Exception $e) {
                echo "Tạm thời không gửi mail được: {$mail->ErrorInfo}";
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
    <link rel="stylesheet" href="./assets/css/forgotPsw.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./responsive/header.css">
    <link rel="stylesheet" href="./responsive/footer.css">
    <link rel="stylesheet" href="./responsive/forgotPsw.css">
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
    <script src="./assets/js/header.js"></script>
</body>
</html>