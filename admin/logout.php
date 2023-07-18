<?php
session_start();

// Xóa các biến session
session_unset();

// Hủy bỏ phiên làm việc
session_destroy();

header('location:../index.php');
exit();
