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
    <link rel="stylesheet" href="./assets/css/product.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./responsive/header.css">
    <link rel="stylesheet" href="./responsive/footer.css">
    <link rel="stylesheet" href="./responsive/product.css">
</head>
<body>
    <main>
        <header>
        <?php include('header.php'); ?>
        </header>
        <!-- banner -->
        <div class="banner1">
            <div class="banner-item">
                <a href=""><img src="./assets/img/laptop/banner/img1.png" alt=""></a>
            </div>   
            <div class="banner-item">
                <a href=""><img src="./assets/img/mobile/banner/img1.png" alt=""></a>
            </div>  
            <div class="banner-item">
                <a href=""><img src="./assets/img/tablet/banner/img5.png" alt=""></a>
            </div> 
            <div class="banner-item">
                <a href=""><img src="./assets/img/clock/banner/img1.png" alt=""></a>
            </div> 
            <div class="banner-item">
                <a href=""><img src="./assets/img/laptop/banner/img2.png" alt=""></a>
            </div>   
        </div>
        <!-- link-product -->
        <div class="link-info">
            <div id="link-info-product" class="link-info-product">
                <div class="link-info-item">
                    <div class="link-info-item-child">
                        <div class="div1"><a href="#phone"><i class="fa-solid fa-mobile"></i></a></div>
                        <div class="div2">Phone</div>
                    </div>
                    <div class="link-info-item-child">
                        <div class="div1"><a href="#gaming"><i class="fa-solid fa-gamepad"></i></a></div>
                        <div class="div2">Gaming</div>
                    </div>
                    <div class="link-info-item-child">
                        <div class="div1"><a href="#macbook"><i class="fa-brands fa-apple"></i></a></div>
                        <div class="div2">MacBook</div>
                    </div>
                    <div class="link-info-item-child">
                        <div class="div1"><a href="#tablet"><i class="fa-solid fa-tablet"></i></a></div>
                        <div class="div2">Tablet</div>
                    </div>
                    <div class="link-info-item-child">
                        <div class="div1"><a href="#clock"><i class="fa-regular fa-clock"></i></a></div>
                        <div class="div2">Clock</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- article -->
        <article>
            <section id="phone">
                <div class="deal">
                    <div class="deal-soc">
                        <a href="">
                            <span>Giảm tới 5.000.000<sup>đ</sup></span>
                            <img src="./assets/img/laptop/deal/desk-1200x90.png" alt="">
                        </a>
                    </div>
                    <div class="slide-deal-soc">
                        <?php 
                           $results = mysqli_query($conn,"SELECT * FROM products WHERE product_name like '%Điện thoại%'");
                           while($row = mysqli_fetch_assoc($results)){
                            $product_id = $row['product_id'];
                            $images = $row['image_url'];
                            $productname = $row['product_name'];
                            $price = $row['price'];
                            $oldprice = $row['old_price'];
                            $info1 = $row['info1'];
                            $info2 = $row['info2'];
                            $formattedPrice = number_format($price, 0, ',', '.');
                            $formattedOldPrice = number_format($oldprice, 0, ',', '.');
                            $price = $row['price'];
                            $oldprice = $row['old_price'];
                            $info1 = $row['info1'];
                            $info2 = $row['info2'];

                            if ($oldprice != 0) {
                                $sale = ((($price - $oldprice ) / $oldprice) * 100);
                            } else {
                                $sale = "";
                            }
                            $saleInt = round(intval($sale),2)."%";

                        ?>
                        <div class="deal-item">
                            <span>Trả góp 0%</span>
                            <a href="detail.php?product_id=<?php echo $row['product_id'] ?>">
                                <div class="deal-img">
                                    <img src=<?php echo $images; ?> alt="">
                                </div>
                                <div class="deal-name"><h6><?php echo $productname; ?></h6></div>
                                <div class="deal-detail">
                                    <span><?php echo $info1 ?></span>
                                    <span><?php echo $info2 ?></span>
                                </div>
                                <div class="old-price">
                                    <del><?php $formattedOldPriceMain =  $formattedOldPrice > 0 ? $formattedOldPrice.'<sup>đ</sup>' : ''; echo $formattedOldPriceMain ?></del>
                                    <span><?php $saleMain = $oldprice > 0 ? $saleInt : ''; echo $saleMain ?></span>
                                </div>
                                <div class="price">
                                    <h6><?php echo $formattedPrice ?><sup>đ</sup></h6>
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
                                <button name="add-cart" type="submit"><i class="fa-solid fa-cart-shopping"></i> <span>Thêm vào giỏ hàng</span></button>
                            </form>
                        </div>
                        <?php }; mysqli_free_result($results); ?>
                    </div>
                </div>
            </section>
            <!-- gaming -->
            <section id="gaming">
                <div class="gaming-child">
                    <div class="gaming">
                        <div id="gm" class="gaming-banner">
                            <a href=""><img src="./assets/img/laptop/gaming/banner-gaming-desk-1200x200.png" alt=""></a>
                            <a href=""><img src="./assets/img/laptop/gaming/sis-mua-som-desk-1200x200.png" alt=""></a>
                        </div>
                        <div class="gaming-product">
                        <?php 
                           $results = mysqli_query($conn,"SELECT * FROM products WHERE category_id = 11");
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
                            <div class="gaming-item">
                                <span>Trả góp 0%</span>
                                <a href="detail.php?product_id=<?php echo $row['product_id'] ?>">
                                    <div class="gaming-img">
                                        <img src="<?php echo $images ?>" alt="">
                                    </div>
                                    <div class="gaming-name"><h6><?php echo $productname ?></h6></div>
                                    <div class="gaming-detail">
                                        <span><?php echo $info1 ?></span>
                                        <span><?php echo $info2 ?></span>
                                    </div>
                                    <div class="old-price">
                                        <del><?php $formattedOldPriceMain =  $formattedOldPrice > 0 ? $formattedOldPrice.'<sup>đ</sup>' : ''; echo $formattedOldPriceMain ?></del>
                                        <span><?php $saleMain = $oldprice > 0 ? $saleInt : ''; echo $saleMain ?></span>
                                    </div>
                                    <div class="price">
                                    <h6><?php echo $formattedPrice ?><sup>đ</sup></h6>
                                    </div>
                                    <div class="evaluate">
                                        <span class="sp1">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        </span>
                                        <span class="sp2">(<?php $start = rand(000,999); echo $start ?>)</span>
                                    </div>
                                </a>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                    <button name="add-cart" type="submit"><i class="fa-solid fa-cart-shopping"></i> <span>Thêm vào giỏ hàng</span></button>
                                </form>
                            </div>
                            <?php }; mysqli_free_result($results); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- macbook -->
            <section id="macbook">
                <div class="macbook">
                    <div class="banner-mac">
                        <a href="">
                            <img src="./assets/img/laptop/macbook/sis-air-m1-desk-18390-1200x200.png" alt="">
                        </a>
                        <a href="">
                            <img src="./assets/img/laptop/macbook/sis-mac-1416-39990-desk-1200x200.png" alt="">
                        </a>
                    </div>
                    <div class="mac-product">
                        <?php 
                        $results = mysqli_query($conn,"SELECT * FROM products WHERE category_id = 13");
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
                        <div class="mac-item">
                            <span>Trả góp 0%</span>
                            <a href="detail.php?product_id=<?php echo $row['product_id']; ?>">
                                <div class="mac-img">
                                    <img src="<?php echo $images; ?>" alt="">
                                </div>
                                <div class="mac-name"><h6><?php echo $productname ?><sup>đ</sup></h6></div>
                                <div class="mac-detail">
                                    <span><?php echo $info1; ?></span>
                                    <span><?php echo $info1; ?></span>
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
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </span>
                                    <span class="sp2">(<?php $start = rand(000,999); echo $start ?>)</span>
                                </div>
                            </a>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                <button name="add-cart" type="submit"><i class="fa-solid fa-cart-shopping"></i> <span>Thêm vào giỏ hàng</span></button>
                            </form>
                        </div>
                        <?php }; mysqli_free_result($results); ?>
                    </div>
                </div>
            </section>    
            <!-- office -->
            <section id="tablet">
                <div class="office">
                    <div class="banner-office">
                        <a href="">
                            <img src="./assets/img/laptop/office/sis-mua-som-desk-1200x200-2.png" alt="">
                        </a>
                        <a href="">
                            <img src="./assets/img/tablet/banner/img1.png" alt="">
                        </a>
                    </div>
                    <div class="office-product">
                        <?php 
                        $results = mysqli_query($conn,"SELECT * FROM products WHERE category_id = 12 ORDER BY RAND() LIMIT 8");
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
                                    <img src="<?php echo $images; ?>" alt="">
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
                                <button name="add-cart" type="submit"><i class="fa-solid fa-cart-shopping"></i> <span>Thêm vào giỏ hàng</span></button>
                            </form>
                        </div>
                        <?php }; mysqli_free_result($results); ?>
                </div>
            </section>
            <!-- techninal -->
            <section id="clock">
                <div class="technical">
                    <div style="background-color: #000;" class="banner-technical">
                        <a href="">
                            <img src="./assets/img/product/clock/THE-THAO-CHUYEN-NGHIEP-1200x200.png" alt="">
                        </a>
                    </div>
                    <section class="section2">
                        <div class="product-casio">
                            <div class="banner-section2">
                                <a href=""><img src="./assets/img/clock/section2/banner.png" alt=""></a>
                            </div>
                            <div class="product-casio-child">
                                <div class="slide-product">
                                    <?php 
                                    $results = mysqli_query($conn,"SELECT * FROM products WHERE category_id = 15");
                                    while($row = mysqli_fetch_assoc($results)){
                                        $images = $row['image_url'];
                                        $productname = $row['product_name'];
                                        $price = $row['price'];
                                        $oldprice = $row['old_price'];
                                        $formattedPrice = number_format($price, 0, ',', '.');
                                        $formattedOldPrice = number_format($oldprice, 0, ',', '.');
                                        if ($oldprice != 0) {
                                            $sale = ((($price - $oldprice ) / $oldprice) * 100);
                                        } else {
                                            $sale = "";
                                        }
                                        $saleInt = round(intval($sale),2)."%";
                                    ?>
                                    <div class="product-item">
                                        <a href="detail.php?product_id=<?php echo $row['product_id']; ?>">
                                            <div class="product-img">
                                                <img src="<?php echo $images; ?>" alt="">
                                            </div>
                                            <div class="name-product">
                                                <h4><?php echo $productname; ?></h4>
                                            </div>
                                            <div class="old-price">
                                                <del><?php $formattedOldPriceMain =  $formattedOldPrice > 0 ? $formattedOldPrice.'<sup>đ</sup>' : ''; echo $formattedOldPriceMain ?></del>
                                                <span><?php $saleMain = $oldprice > 0 ? $saleInt : ''; echo $saleMain ?></span>
                                            </div>
                                            <div class="product-price">
                                                <h4><?php echo $formattedPrice; ?><sup>đ</sup></h4>
                                            </div>
                                        </a>
                                        <form action="cart.php" method="post">
                                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                            <button name="add-cart" type="submit"><i class="fa-solid fa-cart-shopping"></i> <span>Thêm vào giỏ hàng</span></button>
                                        </form>
                                    </div>
                                    <?php }; mysqli_free_result($results); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
            <!-- brand -->
            <section class="brand-page">
                <h5>CHUYÊN TRANG THƯƠNG HIỆU</h5>
                <div class="slide-brand2">
                    <div class="brand-item">
                        <a href=""><img src="./assets/img/laptop/brand/img1.webp" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href=""><img src="./assets/img/laptop/brand/img2.webp" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href=""><img src="./assets/img/laptop/brand/img3.webp" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href=""><img src="./assets/img/laptop/brand/img4.webp" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href=""><img src="./assets/img/laptop/brand/img5.webp" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href=""><img src="./assets/img/laptop/brand/img6.webp" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href=""><img src="./assets/img/laptop/brand/img7.webp" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href=""><img src="./assets/img/laptop/brand/img8.webp" alt=""></a>
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
    <script src="./assets/js/product.js"></script>
    <script src="./assets/js/header.js"></script>
</body>
</html>