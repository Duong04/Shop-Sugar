<?php
require('connect.php');
if(isset($_GET['category_id'])){
    $id = $_GET['category_id'];
}

if(isset($_POST['submit'])){
    if($_POST['submit'] === 'xoa'){
        if(mysqli_query($conn, "DELETE FROM categories WHERE category_id = $id")){
            header("location: categories.php");
        }else{
            echo 'Xóa không thành công';
        }
    }else{
        header('location:categories.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUGAR PHONE</title>
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