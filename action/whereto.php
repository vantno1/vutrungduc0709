<?php
// Kết nối đến cơ sở dữ liệu
require '../connect.php';

// Lấy dữ liệu từ form
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$place = $_POST['place_name'];
$guests = $_POST['number_of_guests'];
$arrivals = $_POST['arrivals'];
$leaving = $_POST['leaving'];

// Thực hiện insert vào bảng "books"
$sql = "INSERT INTO books (fullname,email,place_name, number_of_guests, arrivals, leaving)
        VALUES ('$fullname','$email','$place', '$guests', '$arrivals', '$leaving')";

if ($conn->query($sql) === TRUE) {
    header('location:../index.php?book_done#book');
} else {
    echo "Lỗi: " . $conn->error;
}
