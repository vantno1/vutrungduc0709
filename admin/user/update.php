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
    // Ket not db
    include('../connect.php');
    $id = $_GET['id'];
    $sql = "select * from users where ID=$id";
    $result = mysqli_query($conn, $sql);
    ?>
    <?php foreach ($result as $row) : ?>
        <h2 style="font-size:25px;padding:10px 10px 0;justify-content:center;display:flex">Sửa</h2>

        <form method="POST" class="form" style="padding:25px">
            <h2>Sửa người dùng</h2>
            <label>Email: <input type="text" value="<?php echo $row['email'] ?>" style="width:250px; margin-bottom:5px" name="email"></label><br />
            <label>Username: <input type="text" value="<?php echo $row['username'] ?>" style="width:250px; margin-bottom:5px" name="username"></label><br />
            <label>Address: <input type="text" value="<?php echo $row['address'] ?>" style="width:250px; margin-bottom:5px" name="address"></label><br />
            <!-- <label>Password: <input type="text" value="<?php echo $row['password'] ?>" style="width:250px; margin-bottom:5px" name="password"></label><br/> -->
            <!-- <label>Role: <input type="text" value="<?php echo $row['role'] ?>" style="width:250px; margin-bottom:5px" name="level"></label><br> -->
            <input type="submit" value="Update" name="update">
        <?php endforeach ?>
        <?php
        if (isset($_POST['update'])) {
            $id = $_GET['id'];
            $email = $_POST['email'];
            $un = $_POST['username'];
            $add = $_POST['address'];
            // Ket not db
            include('../connect.php');
            $sql = "UPDATE `users` SET email='$email', username='$un', address='$add' WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                header('location:../user/view.php');
            } else {
                echo "Sửa thất bại " . $conn->error;
            }
            $conn->close();
        }
        ?>
        </form>
</body>

</html>