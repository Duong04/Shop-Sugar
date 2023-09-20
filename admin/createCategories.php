<?php 
require('../sql/connect.php');
session_start();
if(isset($_POST['category-name'])){
    if(isset($_SESSION['user_id'])){
        $category_name = $_POST['category-name'];
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO categories(category_name,user_id,createday) VALUES ('$category_name',$user_id,NOW())";
        if(mysqli_query($conn,$query)){
            header('location: categories.php');
            mysqli_close($conn);
        }else{
            echo 'Thêm không thành công';
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
    <link rel="icon" href="../assets/img/logo/logo2.png" type="image/x-icon">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        form{
            width: 500px;
            height: 250px;
            box-shadow: 0 0 10px #ccc;
            margin: 30px auto;
            display: flex;
            flex-direction: column;
        }

        h2{
            text-align: center;
            margin-top: 20px;
        }

        .btn,
        .categories{
            width: 90%;
            margin: 10px auto;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        input{
            padding-left: 10px;
            height: 38px;
            border: none;
            border: 2px solid #ccc;
        }

        .link-img input{
            border: none;
            padding: 0;
        }

        input:focus{
            border: none;
            border: 2px solid #1a6ed8;
            outline: none;
        }

        button{
            height: 40px;
            font-size: 1.2rem;
            border: none;
            transition: all ease 0.4s;
            border: 2px solid #1a6ed8;
            background-color: #fff;
            color: #1a6ed8;
            cursor: pointer;
        }
        
        button:hover{
            background-color: #1a6ed8;
            color: #fff;
            border: 2px solid #1a6ed8;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Thêm danh mục tại đây</h2>
        <div class="categories">
            <label for="category-name">Tên danh mục</label>
            <input id="category-name" name="category-name" type="text" placeholder="Nhập tên danh mục">
        </div>
        <div class="btn">
            <button>Thêm</button>
        </div>
    </form>
</body>
</html>