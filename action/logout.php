<?php
session_start();

// Xóa các biến session
session_unset();

// Hủy bỏ phiên làm việc
session_destroy();

// Chuyển hướng người dùng về trang đăng nhập hoặc trang chủ
header("location: ../index.php"); // Điều hướng về trang đăng nhập
// header("Location: index.php"); // Điều hướng về trang chủ
exit();
