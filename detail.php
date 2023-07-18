<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/detail.css">
    <title>Detail</title>
</head>

<body>
    <!------------------------ header section starts ------------------>
    <?php include('header.php'); ?>
    <!---------------------- header section end ------------------------------->
    <!-- --------------------- section detail start ----------------- -->
    <?php
    include('connect.php');
    if (isset($_GET["id"])) {
        // lấy ra chi tiết sản phẩm dựa trên id đc truyền từ url
        $id = $_GET["id"];
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
        } else {
            // nếu ko có id đc truyền thì trở lại trang product
            echo "<script>window.location.href = 'product.php';</script>";
            exit;
        }
    } else {
        // nếu ko có id đc truyền thì trở lại trang product
        echo "<script>window.location.href = 'product.php';</script>";
        exit;
    }
    ?>
    <section class="detail" id="detail">
        <div class="detail-container">
            <div class="detail-content">
                <h1><?php echo $row['name'] ?> </h1>
                <p style="font-style: italic;"><?php echo $row['short_des'] ?></p>
                <div class="detail-content-icon">
                    <i class="fas fa-user-check"></i>
                    <span> <?php echo $row['guest'] ?> Guest</span>
                    <i class="fa-solid fa-bed"></i>
                    <span> <?php echo $row['bed'] ?> Bed</span>
                    <i class="fa-solid fa-bath"></i>
                    <span> <?php echo $row['bathroom'] ?> Bathroom</span>
                    <!-- <h3><?php echo $row['title'] ?> </h3> -->
                    <p style="font-size: 20px;margin-top:30px;color:#000"><?php echo $row['description'] ?></p>
                </div>
                <p style="margin-bot:20px">Start From <sup>$<?php echo $row['price'] ?></sup> <span>/Night</span></p>
            </div>
            <div class="detail-img">
                <img src="images/product/<?php echo $row['image'] ?>" alt="">
            </div>
        </div>
    </section>
    <!-- --------------------- section detail end ----------------- -->



    <!-- --------------------- section Room Availability  start ------------------- -->
    <section class="room">

        <div class="calendar">
            <div class="calendar-header">
                <h2 class="calendar-title">Tháng 7, 2023</h2>
            </div>
            <div class="calendar-body">
                <div class="calendar-month">
                    <div class="calendar-month-prev" onclick="previousMonth()">&#8249;</div>
                    <div class="calendar-month-next" onclick="nextMonth()">&#8250;</div>
                    <h3 id="current-month">Tháng 7, 2023</h3>
                </div>
                <div class="calendar-weekdays">
                    <div class="calendar-weekday">CN</div>
                    <div class="calendar-weekday">T2</div>
                    <div class="calendar-weekday">T3</div>
                    <div class="calendar-weekday">T4</div>
                    <div class="calendar-weekday">T5</div>
                    <div class="calendar-weekday">T6</div>
                    <div class="calendar-weekday">T7</div>
                </div>
                <div class="calendar-days" id="calendar-days">
                    <!-- Các ngày sẽ được tạo và cập nhật thông qua JavaScript -->
                </div>
            </div>
            <div id="room-status">
                <h3>Số phòng còn trống: <span id="available-rooms">10</span></h3>
            </div>
        </div>
        <?php if (isset($_SESSION['id'])) { ?>
            <form action="action/book.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row['id'] ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                <button type="submit" name="book">Đặt tour</button>
            </form>
        <?php } else { ?>
            <button>Đặt tour</button>
        <?php } ?>
    </section>
    <!-- --------------------- section Room Availability end ------------------- -->

    <!-- --------------------- section Similiar Rooms  start ------------>
    <section class="similar-room" id="similar-room">
        <h4>Similiar Tours</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat elit sed pretium, egestas sed sit.</p>
        <div class="similar-rooms">
            <?php
            include('connect.php');
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
                $result = mysqli_query($conn, $sql);
            }
            ?>
            <?php while ($row = mysqli_fetch_array($result)) : ?>
                <div class="similar-room-container">
                    <div class="package-content-item">
                        <a href="detail.php?id=<?php echo $row['id']; ?>"><img src="images/product/<?php echo $row['image'] ?>" alt=""></a>
                        <div class="package-describe-item">
                            <a href="detail.php?id=<?php echo $row['id']; ?>">
                                <h4><?php echo $row['name'] ?></h4>
                            </a>
                            <div class="packages-describe">
                                <i class="fas fa-user-check"></i>
                                <span> <?php echo $row['guest'] ?> Guest</span>
                                <i class="fa-solid fa-bed"></i>
                                <span> <?php echo $row['bed'] ?> Bed</span>
                                <i class="fa-solid fa-bath"></i>
                                <span> <?php echo $row['bathroom'] ?> Bathroom</span>
                            </div>
                            <div class="package-describe-bot">
                                <?php
                                // Kiểm tra xem người dùng đã đăng nhập chưa
                                if (isset($_SESSION['id'])) {
                                    // Người dùng đã đăng nhập, cho phép đặt
                                    echo '
                                    <form action="action/book.php" method="post">
                                        <input type="hidden" name="product_id" value="' . $row['id'] . '">
                                        <input type="hidden" name="user_id" value="' . $_SESSION['id'] . '">
                                        <input type="hidden" name="price" value="' . $row['price'] . '">
                                        <button type="submit" name="book">Book now</button>
                                    </form>';
                                } else {
                                    // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
                                    echo '<a href="index.php?login"><button>Book now</button></a><br>';
                                }
                                ?>
                                <p>Start From <sup>$<?php echo $row['price'] ?></sup> <span>/Night</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>

        </div>
    </section>

    <!-- --------------------- section Similiar Rooms  end ------------>
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

</body>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="js/calendar.js"></script>
<script src="js/script.js"></script>

</html>