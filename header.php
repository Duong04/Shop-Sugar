            <nav>
                <div class="logo">
                    <a href="./index.php"><img src="./assets/img/logo/logo2.png" alt=""></a>
                </div>
                <div class="search-menu">
                    <div class="search-menu-item">
                        <label for="search-block" class="search-mobile"><i class="fa-solid fa-magnifying-glass"></i></label>
                        <div class="search">
                            <form action="search.php" method="GET">
                                <input name="search" required type="text" placeholder="Bạn muốn tìm gì...">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="signup-login-cart">
                        <?php
                        if(!isset($_SESSION['username'])){
                        ?>
                            <div class="signup-login">
                                <div class="sign-up">
                                    <a href="./signup.php">Đăng ký</a>
                                </div>
                                <span>|</span>
                                <div class="login">
                                    <a href="./login.php">Đăng nhập</a>
                                </div>
                            </div>
                        <?php } ?>
                            <div class="cart">
                                <a href="./cart.php"><i class="fa-solid fa-cart-shopping"></i> <span>Giỏ hàng</span></a>
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
                            <li><a href="./news.php">Tin tức</a></li>
                            <li><a href="">Liên hệ</a></li>
                            <li><a href="">Đơn hàng</a></li>
                        </ul>
                        <?php
                        if(isset($_SESSION['username'])){
                        ?>
                        <div class="account">
                            <div class="name-avatar">
                                <div class="avatar"><i class="fa-solid fa-user"></i></div>
                                <h4><?php echo $_SESSION['username']; ?> <i class="fa-solid fa-caret-down"></i></h4>
                            </div>
                            <div class="logout">
                                <?php 
                                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                                ?>
                                <div class="admin-2">
                                    <a href="./products.php">admin</a>
                                </div>
                                <?php } ?>
                                <div class="logout-child">
                                    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                                </div>
                            </div>
                            <?php }else{ ?>
                                <div class="name-avatar">
                                    <div class="avatar"><i class="fa-solid fa-user"></i></div>
                                    <h4>Tài khoản</h4>
                                </div>
                        </div>
                        <?php } ?>
                    </menu>
                </div>
                <input hidden type="checkbox" name="" id="nav-bar-block">
                <label for="nav-bar-block" class="nav-bar"><i class="fa-solid fa-bars"></i></label>
                <label for="nav-bar-block" class="menu-mobile"></label>
                <div class="menu-2">
                    <ul class="menu-child">
                        <li><a href="./index.php">Trang chủ</a></li>
                        <li><a href="./product.php">Sản phẩm</a></li>
                        <li><a href="">Liên hệ</a></li>
                        <li><a href="">Tin tức</a></li>
                        <li><a href="">Đơn hàng</a></li>
                    </ul>
                    <label for="nav-bar-block" class="close"><i class="fa-solid fa-x"></i> Đóng</label>
                </div>
                <input hidden type="checkbox" name="" id="search-block">
                <div class="search-2">
                    <h1>Tìm kiếm tại đây</h1>
                    <form action="search.php" method="GET">
                        <input name="search" type="text" required placeholder="Bạn muốn tìm gì...">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <label for="search-block" class="close-search"><i class="fa-solid fa-x"></i> Đóng</label>
                </div>
            </nav>