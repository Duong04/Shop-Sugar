<?php 
require('./sql/connect.php');
session_start();
if(isset($_GET['news_id'])){
    $id = $_GET['news_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUGAR MOBILE</title>
    <link rel="icon" href="./assets/img/logo/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/newsDetail.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./responsive/header.css">
    <link rel="stylesheet" href="./responsive/footer.css">
    <link rel="stylesheet" href="./responsive/detailNews.css">
</head>
<body>
    <main>
        <header>
        <?php include('header.php'); ?>
        </header>
        <!-- container -->
        <div class="container">
            <?php
            $query = mysqli_query($conn,"SELECT * FROM news AS n INNER JOIN users AS u ON u.user_id = n.user_id where news_id = $id");
            $row = mysqli_fetch_array($query);
            $createdateSQL = $row['createdate'];
            $timestamp = strtotime($createdateSQL);
            $date = date('d/m/Y', $timestamp);

            ?>
            <h1><?php echo $row['title'] ?></h1>
            <div class="info">
                <span class="info-user"><?php echo $row['username'] ?></span>
                <span class="info-hours">Ngày đăng: <?php echo $date ?></span>
            </div>
            <div class="btn">
                <button><i class="fa-regular fa-thumbs-up"></i> Like</button>
                <button>Chia sẻ</button>
            </div>
            <div class="img-main">
                <img src="<?php echo $row['image'] ?>" alt="">
            </div>
            <div class="content">
                <?php echo $row['content'] ?>
            </div>
        </div>
        <section>
            <h2>Các bài viết liên quan</h2>
            <ul>
            <?php
            $query = mysqli_query($conn,"SELECT * FROM news AS n INNER JOIN users AS u ON u.user_id = n.user_id ORDER BY rand() limit 6");
            while ($row = mysqli_fetch_array($query)){
                $createdateSQL = $row['createdate'];
                $timestamp = strtotime($createdateSQL);
                $date = date('d/m/Y', $timestamp);
            ?>
                <li><a href="newsDetail.php?news_id=<?php echo $row['news_id']; ?>">
                    <div class="news-img"><img src="<?php echo $row['image'] ?>" alt=""></div>
                    <div class="news-title"><p><?php echo $row['title'] ?></p></div>
                    <div class="info">
                        <span class="info-hours">Ngày đăng: <?php echo $date ?></span>
                    </div>
                </a></li>
                <?php } ?>
            </ul>
        </section>
        <footer>
        <?php include('footer.php'); ?>
        </footer>
        <div class="cap">
            <h5>© 2023 copy right duongntpd07645</h5>
        </div>
    </main>
    <script src="./assets/js/header.js"></script>
</body>
</html>