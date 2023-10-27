<?php 
require('./sql/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUGAR MOBILE</title>
    <link rel="icon" href="./assets/img/logo/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/news.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./responsive/header.css">
    <link rel="stylesheet" href="./responsive/footer.css">
    <link rel="stylesheet" href="./responsive/news.css">
</head>
<body>
    <main>
        <header>
        <?php include('header.php'); ?>
        </header>
        <!-- container -->
        <div class="container">
            <!-- article -->
            <article>
                <h2>Tin mới nhất</h2>
                <?php 
                $results = mysqli_query($conn,"SELECT * FROM news ORDER BY createdate DESC LIMIT 1");
                $row = mysqli_fetch_assoc($results); 
                $id = $row['news_id'];
                ?>
                <div class="post">
                    <a href="newsDetail.php?news_id=<?php echo $row['news_id']; ?>">
                        <div class="post-img">
                            <img src="<?php echo $row['image'] ?>" alt="">
                        </div>
                        <div class="post-title">
                            <h3><?php echo $row['title'] ?></h3>
                        </div>
                        <div class="post-text">
                            <?php echo $row['content'] ?>
                        </div>
                    </a>
                </div>
            </article>
            <!-- aside -->
            <aside>
                <h2>Tin hot</h2>
                <div class="aside-item">
                <?php 
                $results = mysqli_query($conn,'SELECT * FROM news AS n INNER JOIN users AS u ON u.user_id = n.user_id ORDER BY RAND() LIMIT 3');
                while($row = mysqli_fetch_assoc($results)){
                    $createdateSQL = $row['createdate'];
                    $timestamp = strtotime($createdateSQL);
                    $date = date('d/m/Y', $timestamp);
                ?>
                    <div class="post-hot">
                        <a href="newsDetail.php?news_id=<?php echo $row['news_id']; ?>">
                            <div class="post-hot-img">
                                <img src="<?php echo $row['image'] ?>" alt="">
                            </div>
                            <div class="post-hot-title">
                                <h3><?php echo $row['title'] ?></h3>
                            </div>
                            <div class="info">
                                <span class="info-user"><?php echo $row['username'] ?></span>
                                <span class="info-hours">Ngày đăng: <?php echo $date ?></span>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                </div>
            </aside>
        </div>
        <div class="tail-page">
            <?php 
            $results = mysqli_query($conn,'SELECT * FROM news AS n INNER JOIN users AS u ON u.user_id = n.user_id LIMIT 8');
            while($row = mysqli_fetch_assoc($results)){
                $createdateSQL = $row['createdate'];
                $timestamp = strtotime($createdateSQL);
                $date = date('d/m/Y', $timestamp);
            ?>
            <div class="post-tail-page">
                <a href="newsDetail.php?news_id=<?php echo $row['news_id']; ?>">
                    <div class="post-tail-img">
                        <img src="<?php echo $row['image'] ?>" alt="">
                    </div>
                    <div class="post-tail-text">
                        <div class="post-tail-title">
                            <h3><?php echo $row['title'] ?></h3>
                        </div>
                        <div class="info">
                            <span class="info-user"><?php echo $row['username'] ?></span>
                            <span class="info-hours">Ngày đăng: <?php echo $date ?></span>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
        <!-- footer -->
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