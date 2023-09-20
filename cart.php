<?php 
require('./sql/connect.php');
session_start();
if (isset($_POST['add-cart'])) {
    $product_id = $_POST['product_id'];
    $result = mysqli_query($conn, "SELECT * FROM products WHERE product_id = '$product_id'");
    $product = mysqli_fetch_assoc($result);

    // Thêm sản phẩm vào giỏ hàng
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $cart_item = array(
        'image_url' => $product['image_url'],
        'product_id' => $product['product_id'],
        'product_name' => $product['product_name'],
        'price' => $product['price'],
        'old_price' => $product['old_price']
    );
    
    $_SESSION['cart'][] = $cart_item;

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
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
</head>
<body>
    <main>
        <header>
        <?php include('header.php'); ?>
        </header>
        <!-- article -->
        <article>
            <div class="content">
                <?php
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                ?>
                <div class="cart-far">
                    <div class="cart-product">
                        <table class="tb1">
                            <thead>
                                <tr>
                                    <th style="padding-left: 10px;">Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $item) {   
                                ?>
                                <tr class="product-item">
                                    <td>
                                        <div class="product-img">
                                            <img src=<?php echo $item['image_url'] ?> alt="">
                                        </div>
                                        <div class="product-name">
                                            <h5><?php echo $item['product_name']; ?></h5>
                                            <div class="price">
                                                <span class="new-price"><?php echo number_format($item['price'], 0, ',', '.'); ?><sup>đ</sup></span>
                                                <del class="old-price"><?php echo number_format($item['old_price'], 0, ',', '.'); ?><sup>đ</sup></del>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input">
                                            <button class="quantity-button-01" onclick="decreaseQuantity(0)">-</button>
                                            <input class="quantity-input" type="number" value="1" min="1" max="10" id="quantity-product1" onchange="updateTotalPrice()">
                                            <button class="quantity-button-02" onclick="increaseQuantity(0)">+</button>
                                        </div>
                                    </td>
                                    <td><a href="remove_cart_item.php?product_id=<?php echo $item['product_id']; ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                                </tr>
                                <?php } }; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pay-product">
                        <div class="price-pay">
                            <span>Tổng tiền</span>
                            <p><span id="total-price"><?php 
                            $totalPrice = 0;
                            if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $cart_item) {
                                   $totalPrice += $cart_item['price']; // Thêm giá sản phẩm vào tổng tiền
                               }
                               echo number_format($totalPrice, 0, ',', '.');;
                            }
                            ?></span><sup>đ</sup></p>
                        </div>
                        <div class="btn-pay">
                            <a href="./pay.php">Thanh toán</a>
                        </div>
                    </div>
                </div>
                <?php }else { ?>
                    <div class="cart-empty">
                    <div class="icon-cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <p>Không có sản phẩm nào trong giỏ hàng</p>
                    <div class="return-home">
                        <a href="index.php">Quay về trang chủ</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </article>
        <!-- footer -->
        <footer>
        <?php include('footer.php'); ?>
        </footer>
        <div class="cap">
            <h5>© 2023 copy right duongntpd07645</h5>
        </div>
    </main>
    <script src="./assets/js/cart.js"></script>
</body>
</html>