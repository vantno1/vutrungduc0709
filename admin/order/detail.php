<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../images/icon-web.jpg" type="image/gif">
    <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../plugins/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    </link>
    <title>Admin</title>
</head>

<body>
    <?php
    include "../adminHeader.php";
    include "../sidebar.php";
    ?>
    <div class="container-header">
        <a href="../index.php" class="link">Trang chủ</a>
    </div>
    <h2 style="font-size:25px;padding:10px 10px 0;justify-content:center;display:flex">Sửa / Xóa</h2>
    <table class="table_form">
        <?php
        if (isset($_GET['success'])) {
            echo "<span style='font-size:16px;color: green;'>Update Status thành công</span>";
        }
        ?>
        <tr>
            <th class="table_item">ID</th>
            <th class="table_item">Full Name</th>
            <th class="table_item">Email</th>
            <th class="table_item">Address</th>
            <th class="table_item">Phone</th>
            <th class="table_item">Passport</th>
            <th class="table_item">Request</th>
            <th class="table_item">Product Name</th>
            <th class="table_item">Image</th>
            <th class="table_item">Price</th>
            <th class="table_item">Total</th>
            <th class="table_item">Stauts</th>
            <th class="table_item">Update</th>
        </tr>
        <?php
        // Kết nối database
        include('../connect.php');
        $id = $_GET['id'];
        // truy vấn để lấy ra các giá trị trùng khớp từ bảng orders và products
        $sql = "SELECT orders.*, products.image, products.name, products.price
        FROM orders
        JOIN products ON orders.product_id = products.id
        WHERE orders.id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <tr>
            <td class="table_item"><?php echo $row['id']; ?></td>
            <td class="table_item"><?php echo $row['fullname']; ?></td>
            <td class="table_item"><?php echo $row['email']; ?></td>
            <td class="table_item"><?php echo $row['address']; ?></td>
            <td class="table_item"><?php echo $row['phone']; ?></td>
            <td class="table_item"><?php echo $row['passport']; ?></td>
            <td class="table_item"><?php echo $row['request']; ?></td>
            <td class="table_item"><?php echo $row['name']; ?></td>
            <td class="table_item">
                <img style="width:80px" src="../../images/product/<?php echo $row['image']; ?>" alt="">
            </td>
            <td class="table_item"><?php echo $row['price']; ?></td>
            <td class="table_item"><?php echo $row['price'] * $row['quantity'] ?></td>
            <form method="POST" action="status_function.php">
                <td class="table_item">
                    <select name="status">
                        <option value="0" <?php if ($row["status"] == 0) echo 'selected'; ?>>Pending</option>
                        <option value="1" <?php if ($row["status"] == 1) echo 'selected'; ?>>Success</option>
                        <option value="2" <?php if ($row["status"] == 2) echo 'selected'; ?>>Cancel</option>
                    </select>
                </td>
                <td class="table_item">
                    <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" name="submit" value="Update">
                </td>
            </form>
        </tr>
    </table>
    <a style="margin-left:30px" href="view.php">Quay lại</a>
</body>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</html>