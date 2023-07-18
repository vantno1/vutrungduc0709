<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];
require('../connect.php');

// Kiểm tra tên đăng nhập có tồn tại không
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);

if ($rows === 0) {
    header('location: ../index.php?errora');
    exit;
}

// Lấy mật khẩu trong database ra
$row = mysqli_fetch_array($result);

// So sánh 2 mật khẩu có trùng khớp hay không
$hashedPassword = md5($password); // Mã hóa mật khẩu nhập vào bằng MD5

if ($hashedPassword != $row['password']) {
    header('location:../index.php?error');
    exit;
}

// Đăng nhập thành công
$_SESSION['id'] = $row['id'];
$_SESSION['fullname'] = $row['fullname'];
$_SESSION['email'] = $row['email'];
$_SESSION['username'] = $row['username'];
$_SESSION['role'] = $row['role'];

// role là 1 thì đến trang admin
if ($row['role'] === "1") {
    header('location:../admin/index.php');
} else {
    // đến trang user
    header('location:../user.php');
}
