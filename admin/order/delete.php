<?php
    include('../connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM orders WHERE id=$id;";

    // thuc thi delete
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('location:../order/view.php');
