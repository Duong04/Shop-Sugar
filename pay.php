<?php
session_start();
if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['address'])){
    $to_Mail = $_POST['email'];
    $subject = "Đơn hàng của bạn";
    $message = "Cảm ơn bạn đã mua hàng ở chúng tôi, sản phẩm bạn đã đặt:\n";
    foreach ($_SESSION['cart'] as $cart_item) {
        $productName = $cart_item['product_name'];
        $message .= "- $productName\n";
    }
    $header = "From: shopsugar309@gmail.com";
    if(mail($to_Mail,$subject,$message,$header)){
        unset($_SESSION['cart']);
        header('location: cart.php');
    } else {
        echo 'Gửi thất bại!';
    }
}

if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $totalPrice = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUGAR MOBILE</title>
    <link rel="icon" href="./assets/img/logo/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/pay.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
</head>
<body>
    <main>
        <header>
        <?php include('header.php'); ?>
        </header>
        <!-- article -->
        <div class="container">
            <article>
                <div class="content-article">
                    <h3>Sugar shop</h3>
                    <h5>Thông tin giao hàng</h5>
                    <form action="" method="POST">
                        <div class="my-info">
                            <div class="name">
                                <input type="text" name="name" placeholder="Họ và tên" required>
                            </div>
                            <div class="email">
                                <input type="email" name="email" placeholder="email" required>
                            </div>
                            <div class="phone">
                                <input type="text" name="phone" placeholder="Số điện thoại" required>
                            </div>
                            <div class="address">
                                <input type="text" name="address" placeholder="Địa chỉ" required>
                            </div>
                        </div>
                    <div class="ship-method">
                        <h5>Phương thức vận chuyển</h5>
                        <div class="ship-price">
                            <span>Ship nhanh, an toàn</span>
                            <span>100.000<sup>đ</sup></span>
                        </div>
                    </div>
                    <div class="pay-method">
                        <h5>Phương thức thanh toán</h5>
                        <div class="pay-item">
                            <div class="cod-pay">
                                <div class="tick-circle">
                                    <i id="i1" class="fa-solid fa-circle"></i>
                                </div>
                                <div class="cod-item">
                                    <img src="./assets/img/cod.svg" alt="">
                                    <p>Thanh toán khi nhận hàng (COD)</p>
                                </div>
                            </div>
                            <div class="text-pay">
                                <p>Cảm ơn bạn đã tin dùng mua hàng tại <b>Shop sugar</b></p>
                                <p>Chúng mình sẽ sớm liên hệ với bạn để Xác Nhận Đơn Hàng qua điện thoại trước khi giao hàng.</p>
                            </div>
                            <div class="pay-bank">
                                <div class="tick-circle">
                                    <i id="i2" class="fa-regular fa-circle"></i>
                                </div>
                                <div class="cod-item">
                                    <img src="./assets/img/other.svg" alt="">
                                    <p>Chuyển khoản qua ngân hàng</p>
                                </div>
                            </div>
                            <div class="info-bank">
                                <p>Số tài khoản: <b>91930092004</b></p>
                                <p>Chủ tài khoản: <b>Nguyễn Thành Đường</b></p>
                                <p>Ngân hàng thụ hưởng: TP Bank (Tiên Phong bank)</p>
                                <p>
                                    Khách hàng vui lòng điền nội dung chuyển khoản theo cú pháp : [Mã đơn hàng] - [Số điện thoại] - [Tên người nhận]
                                    VD : 888333 - Nguyễn Văn A - 0908654321
                                </p>
                                <p>Ở trên là các bước xác nhận tham chiếu nội dung thanh toán của bạn</p>
                                <p>Sau khi chuyển thành công, vui long chụp màn hình gửi vào zalo: <b>0815416086</b> để xác nhận thông tin thanh toán</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-click">
                        <div class="change-cart">
                            <a href="./cart.php"><i class="fa-solid fa-arrow-right fa-rotate-180"></i> Giỏ hàng</a>
                        </div>
                            <button>Hoàn tất đơn hàng</button>
                        </form>
                    </div>
                </div>
            </article>
            <aside>
                <div class="product">
                    <?php
                    foreach ($_SESSION['cart'] as $item) {
                        $productPrice = $item['price'];
                        $productname = $item['product_name'];
                        $productImage = $item['image_url'];
                        $totalPrice += $productPrice; 
                    ?>
                    <div class="product-item">
                        <div class="product-img">
                            <img src=<?php echo $productImage; ?> alt="">
                            <span>1</span>
                        </div>
                        <div class="name-product">
                            <h4><?php echo $productname; ?></h4>
                        </div>
                        <div class="price"><span><?php echo number_format($productPrice,0,',','.'); ?></span><sup>đ</sup></div>
                    </div>
                    <?php } ?>
                </div>
                <div class="voucher">
                    <form action="">
                        <input type="text" placeholder="Mã giảm giá">
                        <button>Sử dụng</button>
                    </form>
                </div>
                <div class="prepare">
                    <div class="price-product">
                        <span>Tạm tính</span>
                        <p><span><?php echo number_format($totalPrice,0,',','.'); ?></span><sup>đ</sup></p>
                    </div>
                    <div class="price-ship">
                        <span>Tiền vận chuyển</span>
                        <p><span>100.000</span><sup>đ</sup></p>
                    </div>
                </div>
                <div class="sum-price">
                    <span>Tổng cộng</span>
                    <p><span><?php $num = $totalPrice + 100000; echo number_format($num,0,',','.'); ?></span><sup>đ</sup></p>
                </div>
                <?php } ?>
            </aside>
        </div>
    </main>
    <script src="./assets/js/pay.js"></script>
</body>
</html>