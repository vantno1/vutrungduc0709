<?php
session_start();
if (empty($_SESSION['id'])) {
    header('location:../index.php?login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Profile</title>
</head>

<body>
    <!------------------------ header section starts ------------------>
    <?php include('header.php'); ?>
    <!---------------------- header section end ------------------------------->
    <!-- ------------------- Home section start ---------------------------- -->

    <div class="container">
        <h1 style="margin-right:250px">User Profile</h1>
        <div class="profile">
            <!-- <div class="profile-image">
                <img id="previewImage" src="./images/pic5.jfif" alt="Preview" class="preview-image">
                <input type="file" id="profileImage" accept="image/*" onchange="previewProfileImage(event)">
                <label for="profileImage" class="edit-profile-image-btn">Update profile image</label>
            </div> -->
            <div class="profile-details">
                <?php
                include('connect.php');
                if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    $sql = "SELECT * FROM users WHERE id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                } else {
                    echo 'Something wrong happend';
                }
                ?>
                <form action="action/update_profile.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input style=" padding: 8px;border: 1px solid #ccc;" type="text" id="name" name="fullname" required value="<?php echo $row['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input style=" padding: 8px;border: 1px solid #ccc;" type="email" id="email" name="email" required value="<?php echo $row['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input style=" padding: 8px;border: 1px solid #ccc;" type="text" id="username" name="username" required value="<?php echo $row['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea style=" padding: 8px;border: 1px solid #ccc;" id="address" name="address" rows="4" required><?php echo $row['address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input style=" padding: 8px;border: 1px solid #ccc;" type="number" id="phone" name="phone" required value="<?php echo $row['phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" required>
                            <option value="male" <?php if ($row['gender'] === 'male') echo 'selected'; ?>>Male</option>
                            <option value="female" <?php if ($row['gender'] === 'female') echo 'selected'; ?>>Female</option>
                            <option value="other" <?php if ($row['gender'] === 'other') echo 'selected'; ?>>Other</option>
                        </select>
                    </div>
                    <button type="submit">Update my profile</button>
                </form>
                <div style="padding:15px 0">
                    <?php
                    if (isset($_GET['profile_fail'])) {
                        echo "<span style='font-size:16px;color: #ff0000c9;'>Có lỗi xảy ra.</span>";
                    }
                    if (isset($_GET['profile_success'])) {
                        echo "<span style='font-size:16px;color:green'>Cập nhật Profile thành công</span>";
                    }
                    ?>
                </div>
            </div>
            <?php
            include('connect.php');
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $sql = "SELECT orders.*, products.image, products.name, products.price
                FROM orders
                JOIN products ON orders.product_id = products.id
                WHERE orders.user_id = '$id'";
                $result = mysqli_query($conn, $sql);
            } else {
                echo 'Something wrong happend';
            }
            ?>
            <div class="order-history">
                <h2>Order History</h2>
                <ul>
                    <?php if (mysqli_num_rows($result) > 0) : ?>
                        <?php foreach ($result as $row) : ?>
                            <li>
                                <div class="order-info">
                                    <div class="order-date"><?php echo $row["created_at"] ?></div>
                                    <div class="order-items"><?php echo $row["name"] ?></div>
                                    <div class="order-total">$<?php echo $row["price"] ?></div>
                                    <div class="order-items">
                                        <?php
                                        if ($row["status"] == 0) {
                                            echo '<span style="color: #ffa500;">Pending</span>';
                                        } elseif ($row["status"] == 1) {
                                            echo '<span style="color:green">Success</span>';
                                        } else {
                                            echo '<span style="color:red">Cancel</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach ?>
                    <?php else : ?>
                        <p style="font-size:13px">
                            Bạn chưa có đơn hàng nào
                        </p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- -------------------  packages section start ---------------------------- -->

    <!-- --------------------Footer section start ------------------ -->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>about us</h3>
                <p>We are a team of passionate travelers dedicated to providing you with unforgettable experiences and making your dream vacations a reality. We strive to offer exceptional journeys and ensure customer satisfaction.</p>
            </div>

            <div class="box">
                <h3>branch locations</h3>
                <a href="#">VietNam</a>
                <a href="#">India</a>
                <a href="#">USA</a>
                <a href="#">Japan</a>
                <a href="#">France</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">book</a>
                <a href="#">packages</a>
                <a href="#">services</a>
                <a href="#">gallery</a>
                <a href="#">review</a>
                <a href="#">contact</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">instagram</a>
                <a href="#">twitter</a>
                <a href="#">linkedin</a>
            </div>

        </div>
        <h1 class="credit">created by <span>Vu Trung Duc</span>| UDPM1K12</h1>
    </section>

    <!-- --------------------Footer section end ------------------ -->


</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="js/index.js"></script>
<script src="js/script.js"></script>
<script>
    flatpickr("#myID", {});
</script>