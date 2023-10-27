<?php 
require('./sql/connect.php');
session_start();

if(isset($_GET['news_id'])){
    $id = $_GET['news_id'];
}

$results =  mysqli_query($conn,"select * from news where news_id=$id");
$row = mysqli_fetch_assoc($results);

if(isset($_POST['title']) && isset($_FILES['image-file']) && isset($_POST['content'])){
    if(isset($_SESSION['user_id'])){
        $picture = $_FILES['image-file'];
        $path = './uploadFiles';
        $title = $_POST['title'];
        $content = $_POST['content'];
        $user_id = $_SESSION['user_id'];;
        
        if (!is_dir($path))
            mkdir($path);
    
        if (move_uploaded_file($picture['tmp_name'], $path . '/' . $picture['name'])) {
            $query = "UPDATE news SET title = '$title', image = '$path/{$picture['name']}', content = '$content', createDate = now(),user_id = $user_id where news_id = $id";
            if(mysqli_query($conn, $query)){
                header('location: adNews.php');
            }
        } else {
            echo 'Upload file không thành công!';
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

        .btn,
        .content,
        .link-img,
        .title{
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
        <h2>Thêm bài viết tại đây</h2>
        <div class="title">
            <label for="title">Tiêu đề bài viết</label>
            <input value="<?php echo $row['title'] ?>" id="title" name="title" type="text" placeholder="Tiêu đề bài viết">
        </div>
        <div class="link-img">
            <label for="imgs">Tải ảnh lên</label>
            <input value="<?php echo $row['image'] ?>" id="img-file" type="file" name="image-file">
        </div>
        <div class="content">
            <label for="content">Nội dung bài viết</label>
            <textarea name="content" id="content" cols="30" rows="35" placeholder="Nội dung bài viết"><?php echo $row['content'] ?></textarea>
        </div>
        <div class="btn">
            <button>Thêm</button>
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