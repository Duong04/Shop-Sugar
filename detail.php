<?php 
require('./sql/connect.php');
session_start();

if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];

    $query = mysqli_query($conn, "SELECT * from products where product_id = $id");
    $row = mysqli_fetch_assoc($query);
    $price = $row['price'];
    $old_price = $row['old_price'];
    $description = $row['description'];
    $formattedPrice = number_format($price, 0, ',', '.');
    $formattedOldPrice = number_format($old_price, 0, ',', '.');
    if ($old_price != 0) {
        $sale = ((($price - $old_price ) / $old_price) * 100);
    } else {
        $sale = "";
    }
    $saleInt = round(intval($sale),2)."%";
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
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
    <link rel="stylesheet" href="./assets/css/details.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./responsive/header.css">
    <link rel="stylesheet" href="./responsive/footer.css">
    <link rel="stylesheet" href="./responsive/detail.css">
</head>
<body>
    <main>
        <header>
        <?php include('header.php'); ?>
        </header>
        <div class="container">
            <h2 id="title-product"><?php echo $row['product_name'] ?></h2>
            <div class="price-product-mobile">
                <div class="div1"><h3 id="price"><?php echo $formattedPrice ?></h3><sup>đ</sup></div>
                <div class="div2"><del id="old-price"><?php $formattedOldPriceMain = $formattedOldPrice > 0 ? $formattedOldPrice.'<sup>đ</sup>' : ''; echo $formattedOldPriceMain ?></del></div>
                <span id="percent"><?php $saleMain = $old_price > 0 ? $saleInt : ''; echo $saleMain ?></span>
            </div>
            <hr>
            <div class="container-child">
                <article>
                    <div class="product">
                        <div class="img-far">
                            <img id="images" src="<?php echo $row['image_url']; ?>" alt="">
                        </div>
                        <div class="img-child">
                            <div class="text-img">
                                <div id="img-item" class="img-item">
                                    <i class="fa-solid fa-medal"></i>
                                </div>
                                <h5>Điểm nổi bật</h5>
                            </div>
                            <div class="text-img">
                                <div id="img-item2" class="img-item">
                                    <i class="fa-solid fa-box-open"></i>
                                </div>
                                <h5>Hình mở hộp</h5>
                            </div>
                            <div class="text-img">
                                <div id="img-item3" class="img-item">
                                    <i class="fa-solid fa-gears"></i>
                                </div>
                                <h5>Thông số kĩ thuật</h5>
                            </div>
                            <div class="text-img">
                                <div id="img-item4" class="img-item">
                                    <i class="fa-solid fa-pen-clip"></i>
                                </div>
                                <h5>Thông tin sản phẩm</h5>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-child">
                            <div class="text">
                                <span class="sp1"><i class="fa-solid fa-arrows-rotate"></i></span>
                                <span class="sp2">Hư gì đổi nấy <b>12 tháng</b> tại 3371 siêu thị toàn quốc (miễn phí tháng đầu) </span>
                            </div>
                            <div class="text">
                                <span class="sp1"><i class="fa-solid fa-shield-halved"></i></i></span>
                                <span class="sp2">Bảo hành <b>chính hãng điện thoại 1 năm</b> tại các trung tâm bảo hành hãng </span>
                            </div>
                            <div class="text">
                                <span class="sp1"><i class="fa-solid fa-box"></i></i></span>
                                <span class="sp2">Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Cây lấy sim, Cáp Lightning - Type C </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2>Thông tin sản phẩm</h2>
                        <div class="description">
                            <?php
                               echo $description;
                            ?>
                            <div class="before"></div>
                        </div>
                        <div class="btn-view-all">
                            <button>Xem thêm <i class="fa-solid fa-caret-down fa-rotate-270"></i></button>
                        </div>
                    </div>
                </article>
                <aside>
                    <div class="price-product">
                        <div class="div1"><h3 id="price"><?php echo $formattedPrice ?></h3><sup>đ</sup></div>
                        <div class="div2"><del id="old-price"><?php $formattedOldPriceMain = $formattedOldPrice > 0 ? $formattedOldPrice.'<sup>đ</sup>' : ''; echo $formattedOldPriceMain ?></del></div>
                        <span id="percent"><?php $saleMain = $old_price > 0 ? $saleInt : ''; echo $saleMain ?></span>
                    </div>
                    <div class="box-sale">
                        <div class="sale-title">
                            <h4>Khuyến mãi</h4>
                            <p>Giá và khuyến mãi dự kiến áp dụng đến 23:00 | 16/07</p>
                        </div>
                        <div class="box-text">
                            <div class="box-text-item">
                                <div class="span1">1</div>
                                <div class="span2">Thu cũ Đổi mới: Giảm đến 2 triệu (Tuỳ model máy cũ, Không kèm các hình thức thanh toán online, mua kèm)</div>
                            </div>
                            <div class="box-text-item">
                                <div class="span1">2</div>
                                <div class="span2">Nhập mã MMTGDD giảm 2% tối đa 200.000đ khi thanh toán qua MOMO</div>
                            </div>
                            <div class="box-text-item">
                                <div class="span1">3</div>
                                <div class="span2">Nhập mã VNPAY789 giảm tối đa 150K cho đơn hàng từ 05 Triệu thanh toán qua VNPAY</div>
                            </div>
                            <div class="box-text-item">
                                <div class="span1">4</div>
                                <div class="span2">Giảm 100,000đ Cho Đơn Hàng Từ 10 Triệu Khi Thanh Toán Quét Mã SmartPay QR Bằng Ứng Dụng Ngân Hàng</div>
                            </div>
                        </div>
                    </div>
                    <div class="quickdelivery">
                        <div class="location">
                            <a href=""><i class="fa-solid fa-location-dot"></i> Chọn địa chỉ nhận hàng</a> để biết thời gian nào
                        </div>
                        <div class="store">
                            <a href=""><i class="fa-solid fa-store"></i> Xem siêu thị có hàng</a>
                        </div>
                    </div>
                    <hr>
                    <div class="pay-product">
                        <h4>Thanh toán</h4>
                        <form action="cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                            <button name="add-cart" type="submit"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                    <div class="endow">
                        <div class="title-endow">
                            <p><b>3 ưu đãi thêm</b> dự kiến áp dụng đến 23:00 | 31/10</p>
                        </div>
                        <div class="endow-text">
                            <div class="endow-text-item">
                                <span  class="span1"><i class="fa-solid fa-circle-check"></i></span>
                                <span  class="span2">Mua 1 số iPad giảm đến 50% (Không kèm khuyến mãi khác của iPad)</span>
                            </div>
                            <div class="endow-text-item">
                                <span  class="span1"><i class="fa-solid fa-circle-check"></i></span>
                                <span  class="span2">Mua Pin sạc dự phòng giảm 20% (Không áp dụng khuyến mãi khác)</span>
                            </div>
                            <div class="endow-text-item">
                                <span  class="span1"><i style="color: var(--red-color);" class="fa-solid fa-gift"></i></span>
                                <span  class="span2">
                                    Tặng cho khách lần đầu mua hàng online tại web <a target="_blank" href="https://www.bachhoaxanh.com">BachhoaXanh.com</a>
                                    <ul>
                                        <li>Mã giảm <b>100.000đ áp dụng đơn hàng từ 500.000đ</b></li>
                                        <li>Đại siêu thị Online với <b>15.000</b> sản phẩm tiêu dùng, thịt, cá, rau…</li>
                                        <li><b>FREEship</b> đơn hàng từ 300.000đ hoặc thành viên VÀNG</li>
                                        <li>Giao nhanh trong <b>2 giờ</b></li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        <!-- section product -->
        <section class="section-product">
            <h2>Xem thêm sản phẩm khác</h2>
            <div class="slide-product">
                <?php 
                $results = mysqli_query($conn,"SELECT * FROM products ORDER BY RAND() LIMIT 16");
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
                <div class="product-item">
                    <span>Trả góp 0%</span>
                    <a href="detail.php?product_id=<?php echo $row['product_id']; ?>">
                        <div class="product-img">
                            <img src="<?php echo $images; ?>" alt="">
                        </div>
                        <div class="product-name"><h6><?php echo $productname; ?></h6></div>
                        <div class="product-detail">
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
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="sp2"><?php $start = rand(000,999); echo $start; ?></span>
                        </div>
                    </a>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        <button name="add-cart" type="submit"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
                    </form>
                </div>
                <?php }; mysqli_free_result($results); ?>
            </div>
        </section>
        <!-- footer -->
        <footer>
        <?php include('footer.php'); ?>
        </footer>
        <div class="cap">
            <h5>© 2023 copy right duongntpd07645</h5>
        </div>
        <div class="view-description">
            <div class="description-all">
                <div class="description-child">
                    <?php echo $description ?>
                </div>
            </div>
            <div class="btn-close">
                <button><i class="fa-solid fa-x"></i> Đóng</button>
            </div>
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
    <script src="./assets/js/details.js"></script>
    <script src="./assets/js/header.js"></script>
</body>
</html>