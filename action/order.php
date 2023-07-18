<?php
require('../connect.php');

if (isset($_POST['payment'])) {
    // Lấy thông tin sản phẩm từ form
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $passport = $_POST['passport'];
    $request = $_POST['request'];
    $quantity = 1;
    $user_id = $_POST['user_id'];
    $product_ids = $_POST['product_id'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    $success = true; // Biến kiểm tra thành công

    foreach ($product_ids as $product_id) {

        // Thực hiện truy vấn INSERT để thêm dữ liệu vào bảng orders
        $insert_sql = "INSERT INTO orders 
        (phone, address, fullname, email, passport, request, quantity, created_at, updated_at, product_id, user_id) 
                       VALUES ('$phone', '$address', '$fullname', '$email', '$passport', '$request', 
                       '$quantity', '$created_at', '$updated_at', '$product_id', '$user_id')";

        if (!mysqli_query($conn, $insert_sql)) {
            // Nếu có lỗi xảy ra, gán biến kiểm tra thành công là false và hiển thị thông báo lỗi
            $success = false;
            echo "Error: " . mysqli_error($conn);
            break; // Dừng vòng lặp nếu có lỗi
        }
    }

    if ($success) {
        // Xóa các trường từ bảng order_product
        foreach ($product_ids as $product_id) {
            $delete_sql = "DELETE FROM order_product WHERE product_id = '$product_id'";
            mysqli_query($conn, $delete_sql);
        }

        // Chuyển hướng về trang "thankyou.php" hoặc trang hoàn thành đơn hàng
        header("location: ../thankyou.php");
        exit();
    }
}
