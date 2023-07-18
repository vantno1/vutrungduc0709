<?php
require '../connect.php';
session_start();

if (isset($_POST['btn-reg'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    if (!empty($username) && !empty($fullname) && !empty($phone) && !empty($password) && !empty($email) && !empty($address) && !empty($gender)) {
        $sql = "INSERT INTO `users`(`fullname`,`username`,`password`,`email`,`address`,`phone`,`gender`)
        VALUES('$fullname','$username',md5('$password'),'$email','$address','$phone','$gender')";

        if ($conn->query($sql) === TRUE) {
            echo "Đăng ký thành công!";
            header("location: ../index.php?success");
            exit();
        } else {
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "Vui lòng nhập đầy đủ thông tin trước khi đăng ký.
        <a href='dangky.php'>Thử lại</a>";
    }
}
?>
