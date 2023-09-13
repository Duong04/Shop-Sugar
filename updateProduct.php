<?php 
require('connect.php');
if(isset($_GET['product_id'])){
    $id = $_GET['product_id'];
}

$results =  mysqli_query($conn,"select * from products where product_id=$id");
$row = mysqli_fetch_assoc($results);

if(isset($_POST['product-name']) && isset($_FILES['image-file']) && isset($_POST['price']) && isset($_POST['mota'])){
    $picture = $_FILES['image-file'];
    $path = './uploadFiles';
    $productname = $_POST['product-name'];
    $price = $_POST['price'];
    $oldprice = $_POST['old-price'];
    $info = $_POST['info'];
    $info2 = $_POST['info2'];
    $event = $_POST['event'];
    $description = $_POST['mota'];
    $category_id = $_POST['category-id'];
    
    if (!is_dir($path))
        mkdir($path);

    if (move_uploaded_file($picture['tmp_name'], $path . '/' . $picture['name'])) {
        $query = "UPDATE products SET product_name = '$productname', image_url = '$path/{$picture['name']}', price = $price,old_price = $oldprice,
        info1 = '$info', info2 = '$info2', description = '$description', category_id = $category_id, createdate = NOW() WHERE product_id = $id";
        if(mysqli_query($conn, $query)){
            header('location: products.php');
        }
    } else {
        echo 'Upload file không thành công!';
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
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form{
            width: 1000px;
            height: auto;
            box-shadow: 0 0 10px #ccc;
            display: flex;
            flex-direction: column;
        }

        h2{
            text-align: center;
            margin-top: 20px;
        }

        select,
        .btn,
        .mota,
        .price,
        .link-img,
        .name-product{
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

        textarea :focus,
        input:focus{
            border: none;
            border: 2px solid #1a6ed8;
            outline: none;
        }

        textarea{
            padding: 0 10px;
            border: none;
            border: 2px solid #ccc;
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
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Cập nhật sản phẩm tại đây</h2>
        <div class="name-product">
            <label for="name-product">Tên sản phẩm</label>
            <input value="<?php echo $row['product_name'] ?>" id="name-product" name="product-name" type="text" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="link-img">
            <label for="imgs">Tải ảnh lên</label>
            <input value="<?php echo $row['image_url'] ?>" id="img-file" type="file" name="image-file">
        </div>
        <div class="price">
            <label for="price">Nhập giá sản phẩm</label>
            <input value="<?php echo $row['price'] ?>" id="price" type="text" name="price" placeholder="Nhập giá tiền tại đây">
        </div>
        <div class="price">
            <label for="old-price">Nhập giá sản phẩm cũ</label>
            <input value="<?php echo $row['old_price'] ?>" id="old-price" type="text" name="old-price" placeholder="Nhập giá sản phẩm ban cũ">
        </div>
        <div class="price">
            <label for="event">Sự kiện</label>
            <input value="<?php echo $row['event'] ?>" id="event" type="text" name="event" placeholder="Nhập sự kiện nếu có">
        </div>
        <div class="price">
            <label for="info">Nhập thông tin sản phẩm</label>
            <input value="<?php echo $row['info1'] ?>" id="info" type="text" name="info" placeholder="Nhập thông tin sản phẩm">
        </div>
        <div class="price">
            <label for="info2">Nhập thông tin sản phẩm</label>
            <input value="<?php echo $row['info2'] ?>" id="info2" type="text" name="info2" placeholder="Nhập thông tin sản phẩm">
        </div>
        <div class="mota">
            <label for="mota">Mô tả sẩn phẩm</label>
            <textarea name="mota" id="mota" cols="30" rows="35" placeholder="Mô tả sản phẩm"><?php echo $row['description'] ?></textarea>
        </div>
        <select name="category-id" id="category-id">
            <?php 
            $results = mysqli_query($conn,"SELECT * FROM categories");
            while($row = mysqli_fetch_assoc($results)){
                $category_id = $row['category_id'];
                $category_name = $row['category_name'];
            ?>
            <option value="<?php echo $category_id ?>"><?php echo $category_name ?></option>
            <?php }; mysqli_free_result($results); ?>
        </select>
        <div class="btn">
            <button>Cập nhật</button>
        </div>
    </form>
    <script src="https://cdn.tiny.cloud/1/lm94w71x7bk3e924wuj5c0cooyi12egh4anvtmqxxviltkd4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: 'textarea',
        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss textcolor backgroundcolor',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough image forecolor backcolor| link media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
        });
    </script>
</body>
</html>