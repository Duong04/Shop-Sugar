            <nav>
                <div class="logo">
                    <a href="./index.php"><img src="./assets/img/logo/logo2.png" alt=""></a>
                </div>
                <div class="search-menu">
                    <div class="search-menu-item">
                        <div class="search">
                            <form action="search.php" method="GET">
                                <input name="search" type="text" placeholder="Bạn muốn tìm gì...">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="signup-login-cart">
                            <div class="signup-login">
                                <div class="sign-up">
                                    <a href="./signup.php">Đăng ký</a>
                                </div>
                                <span>|</span>
                                <div class="login">
                                    <a href="./login.php">Đăng nhập</a>
                                </div>
                            </div>
                            <div class="cart">
                                <a href="./cart.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
                                <div class="cart-item"> 
                                        <?php
                                        $countCart = 0;

                                        if (isset($_SESSION['cart'])) {
                                            $countCart = count($_SESSION['cart']); 
                                        }
                                        
                                        $cartItemCount = $countCart > 0 ? '<span class="number-cart">' . $countCart . '</span>' : '';
                                        echo $cartItemCount;
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <menu>
                        <ul class="menu">
                            <li><a href="./index.php">Trang chủ</a></li>
                            <li><a href="./product.php">Sản phẩm</a></li>
                            <li><a href="">Liên hệ</a></li>
                            <li><a href="">Tin tức</a></li>
                            <li><a href="">Đơn hàng</a></li>
                        </ul>
                        <?php
                        if(isset($_SESSION['username'])){
                        ?>
                        <div class="account">
                            <div class="name-avatar">
                                <div class="avatar"><i class="fa-solid fa-user"></i></div>
                                <h4><?php echo $_SESSION['username']; ?></h4>
                            </div>
                            <div class="logout">
                                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                            </div>
                            <?php }else{ ?>
                                <div class="name-avatar">
                                    <div class="avatar"><i class="fa-solid fa-user"></i></div>
                                    <h4>Tài khoản</h4>
                                </div>
                        </div>
                        <?php } ?>
                    </menu>
                        <?php 
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                        ?>
                        <div class="admin">
                            <a href="./admin/index.php">admin</a>
                        </div>
                        <?php } ?>
                </div>
            </nav>