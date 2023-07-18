<header>
    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="index.php" class="logo"><span>T</span>ravel</a>

    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="#packages">packages</a>
        <a href="#gallery">gallery</a>
        <a href="#review">review</a>
        <a href="contact.php">contact</a>
        <a href="product.php">product</a>
        <a href="book.php"><i style="font-size: 20px; color:white;margin-left:5px" class="fa-solid fa-cart-shopping"></i></a>
        <span id="cartCount" style="width:18px;height:18px;color: #fff;font-size: 12px;border-radius: 50%;position:relative;bottom:15px;right:10px">
            <?php
            include('connect.php');
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $result = mysqli_query($conn, "SELECT COUNT(id) AS total FROM order_product WHERE user_id = $id");
                $row = mysqli_fetch_array($result);
                $total_records = $row['total'];
                echo $total_records;
            } else {
                echo '0';
            }
            ?>
        </span>
    </nav>

    <?php if (empty($_SESSION['id'])) { ?>
        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn"></i>
        </div>
    <?php } else { ?>
        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn" style="display:none"></i>
        </div>
        <a style="color:#ffa500" href="profile.php">
            <h1>Hello, <?php echo $_SESSION['username'] ?></h1>
        </a>
        <a style="color: white;font-size: 20px" href="action/logout.php">
            Logout<i style="margin-left:8px" class="fa-solid fa-right-from-bracket"></i>
        </a>
    <?php } ?>

    <form style="margin:0" action="search.php" method="GET" class="search-bar-container">
        <input type="search" id="search-bar" name="search" placeholder="search here...">
        <label class="fas fa-search"><button type="submit"></button></label>
    </form>
</header>

<?php
$activeClass = isset($_GET['errora']) || isset($_GET['error']) || isset($_GET['success']) || isset($_GET['login']) ? 'active' : '';
?>

<!-- Login form container -->
<div class="login-form-container <?php echo $activeClass; ?>">
    <i class="fas fa-times" id="form-close"></i>

    <form action="action/login.php" method="POST">
        <h3>Đăng nhập</h3>
        <input type="email" name="email" class="box" placeholder="Nhập email của bạn" required>
        <input type="password" name="password" class="box" placeholder="Nhập mật khẩu của bạn" required>
        <input type="submit" name="btn-login" value="Đăng nhập ngay" class="btn">
        <input type="checkbox" id="remember">
        <label for="remember">Ghi nhớ tôi</label>
        <p>Quên mật khẩu?<a href="#">Nhấn vào đây</a></p>
        <p>Bạn chưa có tài khoản? <a href="dangky.php">Đăng ký ngay</a></p>
        <?php
        if (isset($_GET['errora'])) {
            echo "<span style='font-size:16px;color: #ff0000c9;'>Tên đăng nhập của bạn không đúng.<a href='index.php'>Thử lại</span>";
        }
        if (isset($_GET['error'])) {
            echo "<span style='font-size:16px;color:#ff0000c9'>Mật khẩu của bạn không đúng.<a href='index.php'>Thử lại</span>";
        }
        if (isset($_GET['success'])) {
            echo "<span style='font-size:16px;color:green'>Đăng ký thành công</span>";
        }
        ?>
    </form>
</div>