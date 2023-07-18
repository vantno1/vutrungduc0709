<?php
// Kết nối đến cơ sở dữ liệu
require '../connect.php';

// Kiểm tra xem có dữ liệu được gửi từ form hay không
// Lấy dữ liệu từ form
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Thực hiện insert vào bảng "contacts"
$sql = "INSERT INTO contacts (name, email, phone, subject, message)
            VALUES ('$name', '$email', '$number', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    header('location:../index.php?contact_done#contact');
    exit();
} else {
    header('location:../index.php?contact_fail#contact');
    echo "Lỗi: " . $conn->error;
}
