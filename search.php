<?php
include('connect.php');

// Lấy giá trị tìm kiếm từ trường nhập
$search = $_GET['search'];

// Truy vấn để tìm theo tên trong bảng "products"
$sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
$result = $conn->query($sql);

// Chuyển hướng đến trang "product.php" với tham số tìm kiếm
if ($result->num_rows > 0) {
    $searchParams = urlencode($search);
    header("location: product.php?search=$searchParams");
    exit();
} else {
    header("location: product.php?no_search");
    exit();
}

// Đóng kết nối
// $conn->close();
