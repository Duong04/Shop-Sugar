<?php 
require('./sql/connect.php');
$results = mysqli_query($conn,'SELECT * FROM products AS p INNER JOIN categories AS c ON c.category_id = p.category_id');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUGAR MOBILE</title>
    <link rel="icon" href="./assets/img/logo/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Inclusive+Sans&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Inclusive Sans', sans-serif;
        }

        body{
            display: flex;
            justify-content: space-between;
        }

        aside{
            width: 12%;
            height: 100vh;
            background-color: #f3f2ee;
            position: sticky;
            top: 0;
            overflow-y: auto;
        }

        .home-page{
            margin-left: 10px;
            margin-top: 40px;
        }

        .home-page a{
            font-size: 1.2rem;
            font-weight: 700;
            color: #ffd946;
        }

        .view-category{
            margin-left: 10px;
            margin-top: 20px;
            display:  flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .view-category a{
            color: #000;
            padding: 10px;
            font-weight: 600;
        }

        .view-category a:hover{
            background-color: #ffd946;
        }

        article{
            width: 85%;
        }

        article h2{
            padding-top: 20px;
            font-size: 1.9rem;
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
            background-color: #f3f2ee;
            color: #000;
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
            float: right;
            margin: 30px 20px;
        }

        .create a{
            padding: 5px;
            background-color: #f3f2ee;
            color: #000;
        }

        .create a:hover{
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <aside>
        <div class="home-page">
            <a href="./index.php"><i class="fa-solid fa-house"></i> Home</a>
        </div>
        <div class="view-category">
            <a href="products.php">Xem sản phẩm</a>
            <a href="categories.php">Xem danh mục</a>
            <a href="adNews.php">Xem tin tức</a>
        </div>
    </aside>
    <article>
        <h2>Trang sản phẩm</h2>
        <div class="create">
            <a href="createProduct.php">+ Thêm sản phẩm</a>
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
                        <td><img src="../<?php echo $row["image_url"] ?>" alt=""></td>
                        <td><?php echo $row["category_id"] ?></td>
                        <td><?php echo $row["category_name"] ?></td>
                        <td><a href='updateProduct.php?product_id=<?php echo $row['product_id'] ?>'><i class='fas fa-pencil-alt'></i> Sửa</a></td>
                        <td><a href='deleteProduct.php?product_id=<?php echo $row['product_id'] ?>'> <i class='fas fa-trash'></i> Xóa</a></td>    
                    </tr>
            <?php } ?>
        </table>
    </article>
</body>
</html>