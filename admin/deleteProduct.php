<?php
require('../sql/connect.php');
if(isset($_GET['product_id'])){
    $id = $_GET['product_id'];
}

if(isset($_POST['submit'])){
    if($_POST['submit'] === 'xoa'){
        if(mysqli_query($conn, "DELETE FROM products WHERE product_id = $id")){
            header("location: index.php");
        }else{
            echo 'Xóa không thành công';
        }
    }else{
        header('location:products.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUGAR MOBILE</title>
    <link rel="icon" href="../assets/img/logo/logo2.png" type="image/x-icon">
    <style>
        form{
            width: 150px;
            margin: auto;
            display: flex;
            justify-content: space-between;
        }
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Bạn có chắc chắn muốn xóa</h2>
    <form action="" method="post">
        <button name="submit" value="xoa">Xóa</button>
        <button name="submit" value="huy">Hủy</button>
    </form>
</body>
</html>