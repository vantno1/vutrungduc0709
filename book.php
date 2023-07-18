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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/book.css">
    <style>
        .fix-input {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            border: 1px solid #c4bfbf;
            border-radius: 5px;
            height: 48px
        }

        .no-record {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            padding-top: 50px
        }

        .exist-order {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 50px;
            font-size: 15px;
        }

        #delete-button {
            padding: 13px;
            background-color: #c7923e;
            border-radius: 5px;
            margin-left: 20px;
            color: white;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <!------------------------ header section starts ------------------>
    <?php include('header.php'); ?>
    <!---------------------- header section end ------------------------------->
    <section class="title" id="title">
        <h1>Booking Now</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
        <div class="exist-order">
            <?php
            if (isset($_GET['added'])) {
                echo "<span style='color: red;'>Product already exist in your cart</span>";
            }
            ?>
        </div>
    </section>

    <section class="detail" id="detail">
        <div class="detail-left">
            <div class="bill-detail">
                <?php
                if (isset($_SESSION['id'])) {
                    require 'connect.php';
                    $id = $_SESSION['id'];
                    $sql = "SELECT * FROM users WHERE ID = $id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                }
                ?>
                <form action="action/order.php" method="post">
                    <h2>Billing Details</h2>
                    <input type="hidden" value="<?php echo $row['id'] ?>">

                    <!-- <div class="name-group">
                        <div class="name-field">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" name="first-name" placeholder="Input your First Name in Here" required>
                        </div>

                        <div class="name-field">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" name="last-name" placeholder="Input your Last Name in Here" required>
                        </div>
                    </div> -->
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" readonly name="fullname" value="<?php echo $row['fullname'] ?>" required placeholder="Input your Full Name in Here">

                    <label for="email">Email Address</label>
                    <input type="email" id="email" readonly name="email" value="<?php echo $row['email'] ?>" required placeholder="Input your Email Address in Here">

                    <label for="phone">Phone Number</label>
                    <input class="fix-input" type="number" id="phone" name="phone" value="<?php echo $row['phone'] ?>" required placeholder="Input your Phone Number in Here">

                    <label for="passport">Passport Number </label>
                    <input class="fix-input" type="number" id="passport" name="passport" required placeholder="Input your Passport Number in Here">

                    <label for="address">Address</label>
                    <input type="text" id="address" value="<?php echo $row['address'] ?>" name="address" required placeholder="Input your Address in Here">
                    <!-- <input type="submit" value="Đặt phòng"> -->
            </div>
            <div class="extra">
                <div style="max-width: 100%;margin: 40px;">
                    <!-- <h3>Total</h3>
                    <span class="price">$ </span> -->

                    <!-- <div class="facilitation">
                        <input type="checkbox" id="airport-pickup" name="airport-pickup">
                        <label for="airport-pickup" style="margin-top: 4px;">Đón sân bay</label>
                        <span class="price">+ Rp. 230.00</span>
                    </div>

                    <div class="facilitation">
                        <input type="checkbox" id="activity" name="activity">
                        <label for="activity" style="margin-top: 4px;">Hoạt động</label>
                        <span class="price">+ Rp. 230.00</span>
                    </div>

                    <div class="facilitation">
                        <input type="checkbox" id="massage-spa" name="massage-spa">
                        <label for="massage-spa" style="margin-top: 4px;">Massage và Spa</label>
                        <span class="price">+ Rp. 230.00</span>
                    </div> -->
                    <h3 style="margin-top: 34px;">Special Request</h3>
                    <textarea style="margin-top: 16px;" name="request" id="" cols="30" rows="10" placeholder="Input your Special Request in Here"></textarea>
                </div>
            </div>
            <div class="agree">
                <input type="checkbox" name="" id="">
                <label for="" style=" margin-bottom: 10px;">I have agree to the rules, Terms and Conditions.</label>
            </div>
            <div class="button">
                <button type="submit" name="payment">Continue to Payment</button>
            </div>
        </div>
        <div class="detail-right">
            <?php
            require('connect.php');
            $user_id = $_SESSION['id'] ?? null;

            if ($user_id) {
                $sql = "SELECT * FROM order_product WHERE user_id = '$user_id'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                        $product_sql = "SELECT * FROM products WHERE id = '$product_id'";
                        $product_result = mysqli_query($conn, $product_sql);
                        $product_row = mysqli_fetch_array($product_result);
                        // Hiển thị thông tin sản phẩm
            ?>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                        <input type="hidden" name="product_id[]" value="<?php echo $product_row['id']; ?>">
                        <input type="hidden" name="price" value="<?php echo $product_row['price']; ?>">
                        <div class="package-content-items">
                            <div class="package-content-item">
                                <img src="images/product/<?php echo $product_row['image']; ?>" alt="">
                                <div class="package-describe-item">
                                    <h4><?php echo $product_row['name']; ?></h4>
                                    <div class="packages-describe">
                                        <i class="fas fa-user-check"></i>
                                        <span><?php echo $product_row['guest']; ?> Guest</span>
                                        <i class="fa-solid fa-bed"></i>
                                        <span><?php echo $product_row['bed']; ?> Bed</span>
                                        <i class="fa-solid fa-bath"></i>
                                        <span><?php echo $product_row['bathroom']; ?> Bathroom</span>
                                    </div>
                                    <div class="packages-describe">
                                        <a id="delete-button" href="action/delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            Remove
                                        </a>
                                    </div>
                                    <div class="package-describe-bot">
                                        <a href="detail.php?id=<?php echo $product_row['id']; ?>"><button>View</button></a>
                                        <p>Start From <sup>$<?php echo $product_row['price']; ?></sup> <span>/Night</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                } else {
                    echo '<h3 class="no-record">No record found</h3>';
                }
            } else {
                echo '<h3 class="no-record">No record found</h3>';
            }
            ?>
            <?php
            $total = 0; // Khởi tạo biến tổng giá trị
            foreach ($result as $product_row) {
                $price = $product_row['price']; // Giá sản phẩm
                $total += $price; // Cộng dồn giá trị của từng sản phẩm vào biến tổng
            }
            ?>

            <div style="padding:20px 5px">
                <h1 style="font-size:20px">Total: <span>$<?php echo $total; ?></span></h1>
            </div>
        </div>
        </form>

    </section>

    <!-- --------------------Footer section start ------------------ -->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>about us</h3>
                <p>Con gi de noi khi ma chung toi qua tuyet voi</p>
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
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

</html>