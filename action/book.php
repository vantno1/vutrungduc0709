<?php
session_start();
require('../connect.php');

if (isset($_POST['book'])) {
    // Lấy thông tin sản phẩm từ form
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $product_price = $_POST['price'];

    // Kiểm tra xem product_id đã tồn tại trong bảng order_product chưa
    $check_sql = "SELECT * FROM order_product WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) == 0) {
        // Thực hiện truy vấn INSERT để thêm dữ liệu vào bảng order_product
        $insert_sql = "INSERT INTO order_product (user_id, product_id, price) VALUES ('$user_id', '$product_id', '$product_price')";

        if (mysqli_query($conn, $insert_sql)) {
            // Nếu thêm thành công, chuyển hướng về trang "book.php" hoặc trang giỏ hàng
            header("location: ../book.php");
            exit();
        } else {
            // Nếu có lỗi xảy ra, hiển thị thông báo lỗi
            echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // Thông báo lỗi khi product_id đã tồn tại trong bảng order_product
        header("location: ../book.php?added");
        exit();
    }
} else {
    echo "Error";
}
