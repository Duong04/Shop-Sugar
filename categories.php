<?php 
require('connect.php');
$results = mysqli_query($conn,'SELECT * FROM categories');
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
            width: 800px;
            margin:30px auto;
        }

        a{
            text-decoration: none;
        }

        th{
            background-color: #1b74e4;
            color: #fff;
        }

        td:nth-child(4),
        td:nth-child(5){
            width: 70px;
        }

        td,th{
            padding: 10px;
            border: 2px solid #CCC;
        }

        td:nth-child(1), td:nth-child(3){
            width: 100px;
            text-align: center;
        }
        
        td:nth-child(4) a{
            color: #188038;
        }

        td:nth-child(5) a{
            color: red;
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
        <a href="createCategories.php">+ Thêm danh mục</a>
        <a href="home.php">Trang chủ</a>
    </div>
    <table>
        <tr>
            <th>Categoryid</th>
            <th>Category name</th>
            <th>User id</th>
            <th colspan="2">Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($results)){
            echo "<tr>
                    <td>" . $row["category_id"] . "</td>
                    <td>" . $row["category_name"] . "</td>
                    <td>" . $row["user_id"] . "</td>
                    <td><a href='updateCategories.php?category_id=".$row['category_id']."'><i class='fas fa-pencil-alt'></i> Sửa</a></td>
                    <td><a href='deleteCategories.php?category_id=".$row['category_id']."'> <i class='fas fa-trash'></i> Xóa</a></td>    
                </tr>";
        } ?>
    </table>
</body>
</html>