<?php
require('../connect.php');
if (isset($_POST['submit'])) {
    $status = $_POST['status'];
    $order_id = $_POST['order_id'];

    // Thực hiện truy vấn UPDATE để cập nhật trạng thái
    $update_sql = "UPDATE orders SET status = '$status' WHERE id = '$order_id'";
    if (mysqli_query($conn, $update_sql)) {
        // sau khi thành công
        header("Location: detail.php?id=$order_id&success");
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
