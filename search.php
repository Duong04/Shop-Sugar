<?php
session_start();
require('./sql/connect.php');
if(isset($_GET['search'])){
    $searchData = $_GET['search'];
    $results = mysqli_query($conn, "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id WHERE product_name LIKE '%$searchData%' or category_name LIKE '%$searchData%'");
    $numResults = mysqli_num_rows($results);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SUGAR MOBILE</title>
    <link rel="icon" href="./assets/img/logo/logo2.png" type="image/x-icon">
    <link rel="icon" href="./assets/img/iphone-afraid.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/search.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./responsive/header.css">
    <link rel="stylesheet" href="./responsive/footer.css">
    <link rel="stylesheet" href="./responsive/search.css">
</head>
<body>
    <main>
        <header>
            <?php include('header.php') ?>
        </header>
        <article>
        <h1>Kết quả tìm kiếm cho "<?php echo $searchData; ?>"</h1>
            <div class="product">
                <?php 
                if($numResults > 0){
                while($row = mysqli_fetch_assoc($results)){
                    $images = $row['image_url'];
                    $productname = $row['product_name'];
                    $price = $row['price'];
                    $oldprice = $row['old_price'];
                    $info1 = $row['info1'];
                    $info2 = $row['info2'];
                    $formattedPrice = number_format($price, 0, ',', '.');
                    $formattedOldPrice = number_format($oldprice, 0, ',', '.');
                    if ($oldprice != 0) {
                        $sale = ((($price - $oldprice ) / $oldprice) * 100);
                    } else {
                        $sale = "";
                    }
                    $saleInt = round(intval($sale),2)."%";
                ?>
                <div class="office-item">
                    <span>Trả góp 0%</span>
                    <a href="detail.php?product_id=<?php echo $row['product_id']; ?>">
                        <div class="office-img">
                            <img src="<?php echo $images ?> "alt="">
                        </div>
                        <div class="office-name"><h6><?php echo $productname; ?></h6></div>
                        <div class="office-detail">
                            <span><?php echo $info1; ?></span>
                            <span><?php echo $info2; ?></span>
                        </div>
                        <div class="old-price">
                            <del><?php $formattedOldPriceMain =  $formattedOldPrice > 0 ? $formattedOldPrice.'<sup>đ</sup>' : ''; echo $formattedOldPriceMain ?></del>
                            <span><?php $saleMain = $oldprice > 0 ? $saleInt : ''; echo $saleMain ?></span>
                        </div>
                        <div class="price">
                            <h6><?php echo $formattedPrice; ?><sup>đ</sup></h6>
                        </div>
                        <div class="evaluate">
                            <span class="sp1">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i style="color: #eaeaea;" class="fa-solid fa-star"></i>
                            </span>
                            <span class="sp2">(<?php $start = rand(000,999); echo $start ?>)</span>
                        </div>
                    </a>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        <button name="add-cart" type="submit"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
                    </form>
                </div>
                <?php }}else{ ?>
                    <div>kHÔNG CÓ KẾT QUẢ TÌM KIẾM PHÙ HỢP!</div>
                    <?php } ?>
            </div>
        </article>
        <footer>
            <?php include('footer.php') ?>
        </footer>
        <div class="cap">
            <h5>© 2023 copy right duongntpd07645</h5>
        </div>
    </main>
    <script src="./assets/js/header.js"></script>
</body>
</html>