<?php 
require('connect.php');
$results = mysqli_query($conn,'SELECT * FROM products AS p INNER JOIN categories AS c ON c.category_id = p.category_id');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUGAR PHONE</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            margin: 30px auto;
        }

        a{
            text-decoration: none;
        }

        img{
            width: 100%;
        }

        th{
            background-color: #1b74e4;
            color: #fff;
        }

        td:nth-child(3),
        td:nth-child(5),
        td:nth-child(6){
            width: 70px;
        }

        td,th{
            padding: 10px;
            border: 2px solid #CCC;
        }

        td:nth-child(1), td:nth-child(4){
            width: 60px;
            text-align: center;
        }
        
        td:nth-child(6) a{
            color: #188038;
        }

        td:nth-child(7) a{
            color: red;
        }

        td:nth-child(5){
            width: 200px;
        }

        td:nth-child(6),td:nth-child(7){
            width: 100px;
            text-align: center;
        }
        td a:hover{
            text-decoration: underline;
        }

        .create{
            width: 80%;
            margin: auto;
            display: flex;
            justify-content: space-between;
        }

        .create a{
            padding: 5px;
            background-color: #ccc;
        }

        .create a:hover{
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="create">
        <a href="createProduct.php">+ Thêm sản phẩm</a>
        <a href="home.php">Trang chủ</a>
    </div>
    <table>
        <tr>
            <th>Id</th>
            <th>Product name</th>
            <th>Image</th>
            <th>Category id</th>
            <th>Category name</th>
            <th colspan="2">Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($results)){?>
                <tr>
                    <td><?php echo $row["product_id"] ?></td>
                    <td><?php echo $row["product_name"] ?></td>
                    <td><img src="<?php echo $row["image_url"] ?>" alt=""></td>
                    <td><?php echo $row["category_id"] ?></td>
                    <td><?php echo $row["category_name"] ?></td>
                    <td><a href='updateProduct.php?product_id="<?php echo $row['product_id'] ?>"'><i class='fas fa-pencil-alt'></i> Sửa</a></td>
                    <td><a href='deleteProduct.php?product_id="<?php echo $row['product_id'] ?>"'> <i class='fas fa-trash'></i> Xóa</a></td>    
                </tr>
        <?php } ?>
    </table>
</body>
</html>