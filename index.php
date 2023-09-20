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
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
</head>
<body>
    <main>
        <header>
        <?php include('header.php'); ?>
        </header>
        <!-- banner -->
        <div class="banner">
            <a href=""><img src="./assets/img/banner/main-banner.webp" alt=""></a>
        </div>
        <div class="slide-banner">
            <div class="banner-item">
                <a href=""><img src="./assets/img/banner/img1.webp" alt=""></a>
            </div>
            <div class="banner-item">
                <a href=""><img src="./assets/img/banner/img2.webp" alt=""></a>
            </div>
            <div class="banner-item">
                <a href=""><img src="./assets/img/banner/img3.webp" alt=""></a>
            </div>
            <div class="banner-item">
                <a href=""><img src="./assets/img/banner/img5.webp" alt=""></a>
            </div>
            <div class="banner-item">
                <a href=""><img src="./assets/img/banner/img6.webp" alt=""></a>
            </div>
        </div>
        <!-- article -->
        <article>
            <section class="section1">
                    <div class="section1-item">
                        <a href="">
                            <img src="./assets/img/section1/img1.webp" alt="">
                            <span>GALAXY S22 ULTRA 128GB</span>
                        </a>
                    </div>
                    <div class="section1-item">
                        <a href="">
                            <img src="./assets/img/section1/img2.webp" alt="">
                            <span>MUA SỚM RẺ HƠN</span>
                        </a>
                    </div>
                    <div class="section1-item">
                        <a href="">
                            <img src="./assets/img/section1/img3.webp" alt="">
                            <span>TABLET GIÁ RẺ QUÁ</span>
                        </a>
                    </div>
            </section>
            <!-- section2 -->
            <section class="section2">
                <div class="banner-weekend">
                    <a href="">
                        <img src="./assets/img/banner/banner-maker.webp" alt="">
                    </a>
                </div>
                <div class="image-slide">
                    <?php 
                    $results = mysqli_query($conn,"SELECT * FROM products WHERE event = 'cuối tuần giá rẻ quá'");
                    while($row = mysqli_fetch_assoc($results)){
                        $images = $row['image_url'];
                        $productname = $row['product_name'];
                        $price = $row['price'];
                        $oldprice = $row['old_price'];
                        $formattedPrice = number_format($price, 0, ',', '.');
                        if ($oldprice != 0) {
                            $sale = ((($price - $oldprice ) / $oldprice) * 100);
                        } else {
                            $sale = "";
                        }
                        $saleInt = round(intval($sale),2)."%";
                    ?>
                    <div class="image-item">
                        <span class="install">Trả góp 0%</span>
                        <a href="detail.php?product_id=<?php echo $row['product_id'] ?>">
                            <div class="image">
                                <img src="<?php echo $images ?>" alt="">
                            </div>
                            <div class="info-product">
                                <span><?php echo $productname ?></span>
                                <div class="sale-price">
                                    <span class="price"><?php echo $formattedPrice ?></span>
                                    <div><?php $saleMain = $oldprice > 0 ? '<div class="sale">'.$saleInt.'</div>' : ''; echo $saleMain ?></div>
                                </div>
                            </div>
                            <div class="evaluate">
                                <span class="span1">4.6</span>
                                &nbsp;
                                <i class="fa-solid fa-star"></i>
                                &ensp;
                                &nbsp;
                                <span class="span2">(<?php $start = rand(000,999); echo $start ?>)</span>
                            </div>
                        </a>
                    </div>
                    <?php } 
                    mysqli_free_result($results);
                    ?>
                </div>
            </section>
            <section class="section3">
                <h3>TUẦN LỄ XIAOMI</h3>
                <div class="slide-show-img">
                    <div class="img-item">
                        <a href="">
                            <img src="./assets/img/section3/img1.webp" alt="">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="">
                            <img src="./assets/img/section3/img2.webp" alt="">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="">
                            <img src="./assets/img/section3/img3.webp" alt="">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="">
                            <img src="./assets/img/section3/img4.webp" alt="">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="">
                            <img src="./assets/img/section3/img5.webp" alt="">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="">
                            <img src="./assets/img/section3/img6.webp" alt="">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="">
                            <img src="./assets/img/section3/img7.webp" alt="">
                        </a>
                    </div>
                </div>
                <!-- --------------------- -->
                <div class="slide-img-product">
                    <?php 
                    $results = mysqli_query($conn, "SELECT * FROM products WHERE product_name like '%xiaomi%'");
                    while ($row = mysqli_fetch_assoc($results)){
                        $images = $row['image_url'];
                        $productname = $row['product_name'];
                        $price = $row['price'];
                        $oldprice = $row['old_price'];
                        $formattedPrice = number_format($price, 0, ',', '.');
                        if ($oldprice != 0) {
                            $sale = ((($price - $oldprice ) / $oldprice) * 100);
                        } else {
                            $sale = "";
                        }
                        $saleInt = round(intval($sale),2)."%";
                    ?>
                    <div class="image-item-xiaomi">
                        <span class="install-xiaomi">Trả góp 0%</span>
                        <a href="detail.php?product_id=<?php echo $row['product_id'] ?>">
                            <div class="image-xiaomi">
                            <img src="<?php echo $images; ?>" alt="">
                            </div>
                            <div class="info-product-xiaomi">
                                <span><?php echo $productname; ?></span>
                                <div class="sale-price">
                                    <span class="price"><?php echo $formattedPrice ?></span>
                                    <div><?php $saleMain = $oldprice > 0 ? '<div class="sale">'.$saleInt.'</div>' : ''; echo $saleMain ?></div>
                                </div>
                            </div>
                            <div class="evaluate-xiaomi">
                                <span class="span1">4.3</span>
                                &nbsp;
                                <i class="fa-solid fa-star"></i>
                                &ensp;
                                &nbsp;
                                <span class="span2">(<?php $start = rand(000,999); echo $start ?>)</span>
                            </div>
                        </a>
                    </div>
                    <?php } mysqli_free_result($results); ?>
                </div>
            </section>
            <!-- -------------- -->
            <section class="section4">
                <h3>XU HƯỚNG MUA SẮM</h3>
                <div class="shopping-trend">
                    <div class="shopping-trend-item">
                        <a href="">
                            <img src="./assets/img/section4/img1.webp" alt="">
                            <p class="p1">Galaxy S22 Ultra GIÁ SỐC</p>
                            <p class="p2">Giá chỉ 17.990.000đ</p>
                        </a>
                    </div>
                    <div class="shopping-trend-item">
                        <a href="">
                            <img src="./assets/img/section4/img2.webp" alt="">
                            <p class="p1">Đại tiệc Gaming Acer</p>
                            <p class="p2">Chỉ từ 14.990.000đ</p>
                        </a>
                    </div>
                    <div class="shopping-trend-item">
                        <a href="">
                            <img src="./assets/img/section4/img3.webp" alt="">
                            <p class="p1">BeFit Watch Fit</p>
                            <p class="p2">Chỉ 890.000đ</p>
                        </a>
                    </div>
                </div>
            </section>
            <!-- -------------------- -->
            <section class="section5">
                <h3>GỢI Ý HÔM NAY</h3>
                <div class="btn-click">
                    <div id="btn1" class="btn-click-item active">
                        <img src="./assets/img/brn-click/btn1.webp" alt="">
                        <span>Cho bạn</span>
                    </div>
                    <div id="btn2"class="btn-click-item">
                        <img src="./assets/img/brn-click/btn2.webp" alt="">
                        <span>Laptop gaming</span>
                    </div>
                    <div id="btn3" class="btn-click-item">
                        <img src="./assets/img/brn-click/btn3.webp" alt="">
                        <span>Tablet giá rẻ</span>
                    </div>
                </div>
                <div class="box">
                    <div id="box-item" class="none active">
                        <div class="box-item-child">
                            <?php 
                               $results = mysqli_query($conn, "SELECT * FROM products WHERE product_id <= 25 ORDER BY RAND() LIMIT 12");
                                while ($row = mysqli_fetch_assoc($results)){
                                    $urlimg = $row['image_url'];
                                    $product_name = $row['product_name'];
                                    $price = $row['price'];
                                    $oldprice = $row['old_price'];
                                    $formattedPrice = number_format($price, 0, ',', '.');
                                    if ($oldprice != 0) {
                                        $sale = ((($price - $oldprice ) / $oldprice) * 100);
                                    } else {
                                        $sale = "";
                                    }
                                    $saleInt = round(intval($sale),2)."%";
                            ?>
                            <div class="box-phone">
                                <span class="install-phone">Trả góp 0%</span>
                                <a href="detail.php?product_id=<?php echo $row['product_id'] ?>">
                                    <div class="image-phone">
                                        <img src="<?php echo $urlimg; ?>" alt="">
                                    </div>
                                    <div class="info-product-phone">
                                        <span><?php echo $product_name; ?></span>
                                        <div class="sale-price-phone">
                                            <span class="price-phone"><?php echo $formattedPrice; ?></span>
                                            <div><?php $saleMain = $oldprice > 0 ? '<div class="sale-phone">'.$saleInt.'</div>' : ''; echo $saleMain ?></div>
                                        </div>
                                    </div>
                                    <div class="evaluate-phone">
                                        <span class="span1">4.5</span>
                                        &nbsp;
                                        <i class="fa-solid fa-star"></i>
                                        &ensp;
                                        &nbsp;
                                        <span class="span2">(<?php $start = rand(000,999); echo $start ?>)</span>
                                    </div>
                                </a>
                            </div>
                            <?php }; mysqli_free_result($results); ?>
                        </div>
                    </div>
                    <div id="box-item2" class="none">
                        <div class="box-item-child">
                        <?php 
                               $results = mysqli_query($conn, "SELECT * FROM products WHERE category_id = 11");
                                while ($row = mysqli_fetch_assoc($results)){
                                    $urlimg = $row['image_url'];
                                    $product_name = $row['product_name'];
                                    $price = $row['price'];
                                    $oldprice = $row['old_price'];
                                    $formattedPrice = number_format($price, 0, ',', '.');
                                    if ($oldprice != 0) {
                                        $sale = ((($price - $oldprice ) / $oldprice) * 100);
                                    } else {
                                        $sale = "";
                                    }
                                    $saleInt = round(intval($sale),2)."%";
                            ?>
                            <div class="box-phone">
                                <span class="install-phone">Trả góp 0%</span>
                                <a href="detail.php?product_id=<?php echo $row['product_id'] ?>">
                                    <div class="image-phone">
                                        <img src="<?php echo $urlimg; ?>" alt="">
                                    </div>
                                    <div class="info-product-phone">
                                        <span><?php echo $product_name; ?></span>
                                        <div class="sale-price-phone">
                                            <span class="price-phone"><?php echo $formattedPrice; ?></span>
                                            <div><?php $saleMain = $oldprice > 0 ? '<div class="sale-phone">'.$saleInt.'</div>' : ''; echo $saleMain ?></div>
                                        </div>
                                    </div>
                                    <div class="evaluate-phone">
                                        <span class="span1">4.5</span>
                                        &nbsp;
                                        <i class="fa-solid fa-star"></i>
                                        &ensp;
                                        &nbsp;
                                        <span class="span2">(<?php $start = rand(000,999); echo $start ?>)</span>
                                    </div>
                                </a>
                            </div>
                            <?php }; mysqli_free_result($results); ?>
                        </div>
                    </div>
                    <div id="box-item3" class="none">
                        <div class="box-item-child">
                        <?php 
                               $results = mysqli_query($conn, "SELECT * FROM products WHERE category_id = 12");
                                while ($row = mysqli_fetch_assoc($results)){
                                    $urlimg = $row['image_url'];
                                    $product_name = $row['product_name'];
                                    $price = $row['price'];
                                    $oldprice = $row['old_price'];
                                    $formattedPrice = number_format($price, 0, ',', '.');
                                    if ($oldprice != 0) {
                                        $sale = ((($price - $oldprice ) / $oldprice) * 100);
                                    } else {
                                        $sale = "";
                                    }
                                    $saleInt = round(intval($sale),2)."%";
                            ?>
                            <div class="box-phone">
                                <span class="install-phone">Trả góp 0%</span>
                                <a href="detail.php?product_id=<?php echo $row['product_id'] ?>">
                                    <div class="image-phone">
                                        <img src="<?php echo $urlimg; ?>" alt="">
                                    </div>
                                    <div class="info-product-phone">
                                        <span><?php echo $product_name; ?></span>
                                        <div class="sale-price-phone">
                                            <span class="price-phone"><?php echo $formattedPrice; ?></span>
                                            <div><?php $saleMain = $oldprice > 0 ? '<div class="sale-phone">'.$saleInt.'</div>' : ''; echo $saleMain ?></div>
                                        </div>
                                    </div>
                                    <div class="evaluate-phone">
                                        <span class="span1">4.5</span>
                                        &nbsp;
                                        <i class="fa-solid fa-star"></i>
                                        &ensp;
                                        &nbsp;
                                        <span class="span2">(<?php $start = rand(000,999); echo $start ?>)</span>
                                    </div>
                                </a>
                            </div>
                            <?php }; mysqli_free_result($results); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ------------------------------ -->
            <section class="section6">
                <h3>CHUYÊN TRANG THƯƠNG HIỆU</h3>
                <div class="slide-brand">
                    <div class="slide-brand-item">
                        <a href=""><img src="./assets/img/section6/img1.webp" alt=""></a>
                    </div>
                    <div class="slide-brand-item">
                        <a href=""><img src="./assets/img/section6/img2.webp" alt=""></a>
                    </div>
                    <div class="slide-brand-item">
                        <a href=""><img src="./assets/img/section6/img3.webp" alt=""></a>
                    </div>
                    <div class="slide-brand-item">
                        <a href=""><img src="./assets/img/section6/img4.webp" alt=""></a>
                    </div>
                </div>
            </section>
            <!-- ----------------------- -->
            <section class="section7">
                <h3>CHUỖI MỚI DEAL KHỦNG</h3>
                <div class="slide-deal">
                    <div class="slide-deal-item">
                        <a href=""><img src="./assets/img/section7/img1.webp" alt=""></a>
                    </div>
                    <div class="slide-deal-item">
                        <a href=""><img src="./assets/img/section7/img2.webp" alt=""></a>
                    </div>
                    <div class="slide-deal-item">
                        <a href=""><img src="./assets/img/section7/img3.webp" alt=""></a>
                    </div>
                    <div class="slide-deal-item">
                        <a href=""><img src="./assets/img/section7/img4.webp" alt=""></a>
                    </div>
                    <div class="slide-deal-item">
                        <a href=""><img src="./assets/img/section7/img5.webp" alt=""></a>
                    </div>
                </div>
            </section>
        </article>
        <!-- footer -->
        <footer>
            <?php include('footer.php'); ?>
        </footer>
        <div class="cap">
            <h5>© 2023 copy right duongntpd07645</h5>
        </div>
    </main>
    <div id="scroll" class="scroll">
        <a href="#">
            <i class="fa-solid fa-arrow-down fa-rotate-180"></i>
        </a>
    </div>
    <!-- javascript -->
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/homee.js"></script>
</body>
</html>