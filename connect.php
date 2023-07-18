<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'doantotnghiep_travel';
$conn = mysqli_connect($server, $user, $pass, $database);
mysqli_query($conn, 'set names utf8');

if ($conn->connect_error) {
    die("Ket noi ko thanh cong" . $conn->connect_error);
}
