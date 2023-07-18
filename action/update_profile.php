<?php
// Kết nối với cơ sở dữ liệu và các xử lý khác
require('../connect.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST['user_id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    // Thực hiện truy vấn UPDATE để cập nhật dữ liệu trong bảng users
    $update_sql = "UPDATE users 
                   SET fullname = '$fullname', email = '$email', username = '$username', 
                   address = '$address', phone = '$phone', gender = '$gender' 
                   WHERE id = '$user_id'";

    // Thực hiện truy vấn SQL để cập nhật bảng users
    $result = mysqli_query($conn, $update_sql);

    if ($result) {
        header('location:../profile.php?profile_success');
    } else {
        // Xử lý lỗi nếu có
        header('location:../profile.php?profile_fail');
    }
}
