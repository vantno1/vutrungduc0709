<?php
    include('../connect.php');
    $id = $_GET['id'];

    // Lấy thông tin về ảnh để xóa
    $sql = "SELECT * FROM places WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'];

    // Xóa ảnh khỏi thư mục
    $targetDirectory = "../../images/places/";
    $imagePath = $targetDirectory . $image;
    unlink($imagePath);

    // Xóa dữ liệu trong cơ sở dữ liệu
    $sql = "DELETE FROM places WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('location:../place/view.php');
?>
