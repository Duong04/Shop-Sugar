<?php 
require('connect.php');
$results = mysqli_query($conn,'SELECT * FROM products');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUGAR PHONE</title>
    <style>
        .create{
            width: 400px;
            margin: auto;
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .create a{
            padding: 10px;
            text-decoration: none;
            background-color: #ccc;
            color: #108fd8;
        }

        .create a:hover{
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="create">
        <a href="products.php">Xem sản phẩm</a>
        <a href="categories.php">Xem danh mục</a>
    </div>
</body>
</html>