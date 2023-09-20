<?php 
require('./sql/connect.php');
if(isset($_GET['otp'])){
    $otp = $_GET['otp'];
}
$checkTokenQuery = "select * from users where otp = '$otp'";
$result = mysqli_query($conn, $checkTokenQuery);
$user = mysqli_fetch_assoc($result);
$email = $user['email'];
if (isset($_POST['psw'])) {
    $password = $_POST['psw'];
    $hashedpsw = password_hash($password, PASSWORD_DEFAULT);
    $confirm = $_POST['confirm-psw'];
        if (password_verify($confirm, $hashedpsw)) {
            $updatePasswordQuery = "UPDATE users SET password = '$hashedpsw', otp = NULL WHERE email = '$email'";
            if (mysqli_query($conn, $updatePasswordQuery)) {
                header('location: login.php');
            }
        } else {
            $messages = 'Bạn nhập mật khẩu chưa đúng';
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
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container{
            width: 100%;
            height: 100vh;
            background-color: #fff;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container .form{
            color: #fff;
            position: relative;
            margin: auto;
            width: 400px;
            height: 320px;
            border: 2px solid #108fd8;
            border-radius: 15px;
        }

        .form h2{
            color: #108fd8;
            text-shadow: 0 0 3px #fff;
            text-align: center;
            padding-top: 16px;
            font-size: 1.2rem;
        }

        .confirm-password,
        .password,
        .email{
            width: 90%;
            margin: 10px auto;
            display: flex;
            flex-direction: column;
            color: #000;
        }

        .form input{
            margin: 10px 0 0;
            height: 38px;
            padding-left: 10px;
            border-radius: 8px;
            border: none;
            border: 2px solid #ccc;
        }

        .form input:focus{
            border: none;
            outline: none;
            box-shadow: 0 0 10px #00d4ff;
        }

        a{
            text-decoration: none;
            color: #755339;
        }

        a:hover{
            text-decoration: underline;
        }
        
        .btn{
            width: 90%;
            margin:20px auto;
        }

        .btn button{
            position: relative;
            width: 100%;
            height: 40px;
            border: none;
            background-color: #fff;
            border-radius: 8px;
            cursor: pointer;
            background-color: #108fd8;
            font-weight: 600;
            color: #fff;
            font-size: 1.1rem;
        }

        .btn button:hover{
            opacity: 0.8;
        }

        .link{
            text-align: center;
            margin-top: 10px;
        }

        .erorr{
            width: 90%;
            margin: 10px auto;
            color: red;
        }

    </style>
</head>
<body>
<div class="container">
        <div class="form">
            <h2>Đặt lại mật khẩu</h2>
            <form action="" method="POST">
                <div class="password">
                    <label for="psw">Password</label>
                    <input type="password" id="psw" name="psw" placeholder="Mật khẩu" required>
                </div>
                <div class="confirm-password">
                    <label for="confirm-psw">Confirm password</label>
                    <input type="password" id="confirm-psw" name="confirm-psw" placeholder="Nhập lại mật khẩu" required>
                </div>
                <div class="btn">
                    <button>Cập nhật</button>
                </div>
                <div class="erorr">
                    <?php 
                    if(isset($messages)){
                        echo $messages;
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>