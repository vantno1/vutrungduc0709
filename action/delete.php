<?php
    include('../connect.php');
    // lấy ra id
    $id = $_GET['id'];
    $sql = "DELETE FROM order_product WHERE id=$id;";

    // thuc thi delete
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('location:../book.php');
