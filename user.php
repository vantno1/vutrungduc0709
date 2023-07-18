<?php
session_start();
// nếu chưa đăng nhập thì trở lại trang dangky
if (empty($_SESSION['id'])) {
    header('location:dangky.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- đến trang index -->
    <?php header('location:../index.php') ?>
</body>

</html>