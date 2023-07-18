<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Đăng ký</title>
    <link rel="stylesheet" href="./css/styledangky.css">
</head>

<body>
    <section class="sign-up" id="sign-up">
        <h1 class="heading">
            <span>s</span>
            <span>i</span>
            <span>g</span>
            <span>n</span>
            <span class="space"></span>
            <span>u</span>
            <span>p</span>
        </h1>
        <div class="row">
            <div class="image">
                <img src="images/book4.webp" alt="">
            </div>
            <form action="action/reg.php" method="post">
                <div class="inputBox">
                    <h3>Họ và tên</h3>
                    <input type="text" placeholder="Full Name" name="fullname" required>
                </div>
                <div class="inputBox">
                    <h3>Tên Đăng nhập</h3>
                    <input type="text" placeholder="" name="username" required>
                </div>
                <div class="inputBox">
                    <h3>Mật khẩu</h3>
                    <input type="password" placeholder="" name="password" required>
                </div>
                <div class="inputBox">
                    <h3>Email</h3>
                    <input type="email" name="email" required>
                </div>
                <div class="inputBox">
                    <h3>Phone</h3>
                    <input type="number" name="phone" required>
                </div>
                <div class="inputBox">
                    <h3>Giới tính:</h3>
                    <select id="gender" name="gender" required>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                    </select><br><br>
                </div>
                <div class="inputBox">
                    <h3>Địa chỉ</h3>
                    <input type="text" name="address" required>
                </div>
                <input type="submit" class="btn" value="Đăng ký" name="btn-reg">
                <a href="index.php?login">Trang chủ</a>
            </form>
        </div>
    </section>
</body>

</html>