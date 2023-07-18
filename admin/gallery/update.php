<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="../../images/icon-web.jpg" type="image/gif">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    </link>
    <title>Admin</title>
    <style>
        .fix-label {
            width: 250px;
            margin-bottom: 5px
        }
    </style>
</head>

<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">

        <a class="navbar-brand ml-5" href="../index.php">
            <img src="../assets/images/logo.png" width="80" height="80" alt="Swiss Collection">
            <span style="font-size:20px;color:white">Hello Admin</span>

        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

        <div class="user-cart">
            <a href="logout.php" style="text-decoration:none;">
                <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>
        </div>
    </nav>
    <div class="container-header">
        <a href="view.php" class="link">Sửa/Xóa</a>
    </div>
    <?php
    // Kết nối database
    include('../connect.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM gallery WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    ?>
    <?php foreach ($result as $row) : ?>
        <h2 style="font-size: 25px; padding: 10px 10px 0; justify-content: center; display: flex;">Sửa</h2>

        <form method="POST" class="form" style="padding: 25px;" enctype="multipart/form-data">
            <h2>Sửa gallery</h2>
            <label>Image: <img style="width: 100px" src="../../images/gallery/<?php echo $row['image'] ?>" class="fix-label" name="old_image"></label><br>
            <label>New Image: <input type="file" class="fix-label" name="image"></label><br>
            <label>Name: <input type="text" value="<?php echo $row['name'] ?>" class="fix-label" name="name"></label><br>
            <label>Short Description: <input type="text" value="<?php echo $row['short_des'] ?>" class="fix-label" name="short_des"></label><br>
            <label>Title: <input type="text" value="<?php echo $row['title'] ?>" class="fix-label" name="title"></label><br>
            <label style="align-items: center; display: flex;">Description:
                <textarea style="width: 450px; height: 150px; margin-bottom: 5px;" name="des"><?php echo $row['description'] ?></textarea>
            </label><br>
            <input type="submit" value="Update" name="update">
        </form>
    <?php endforeach ?>
    <?php
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $name = $_POST['name'];
        $short_des = $_POST['short_des'];
        $des = $_POST['des'];

        // Kiểm tra xem người dùng đã chọn tải lên ảnh mới hay chưa
        if (!empty($_FILES["image"]["name"])) {
            // Xóa ảnh cũ
            $oldImage = $row['image'];
            $oldImagePath = "../../images/gallery/" . $oldImage;
            unlink($oldImagePath);

            // Xử lý ảnh mới
            $targetDirectory = "../../images/gallery/"; // Đường dẫn thư mục lưu trữ ảnh
            $targetFileName = basename($_FILES["image"]["name"]); // Tên file ảnh
            $targetFilePath = $targetDirectory . $targetFileName; // Đường dẫn đầy đủ của file ảnh

            // Di chuyển ảnh vào thư mục đích
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $sql = "UPDATE `gallery` SET title='$title',name='$name', short_des='$short_des', description='$des', image='$targetFileName' WHERE id='$id'";
            } else {
                echo "Lỗi khi tải lên ảnh";
                exit;
            }
        } else {
            // Không có ảnh mới được tải lên, chỉ cập nhật các thông tin khác
            $sql = "UPDATE `gallery` SET title='$title',name='$name', short_des='$short_des', description='$des' WHERE id='$id'";
        }

        if ($conn->query($sql) === TRUE) {
            header('location:../gallery/view.php');
        } else {
            echo "Sửa thất bại " . $conn->error;
        }

        $conn->close();
    }
    ?>

</body>

</html>