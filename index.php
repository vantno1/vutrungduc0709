<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!------------------------ header section starts ------------------>
    <?php include('header.php'); ?>

    <!---------------------- header section end ------------------------------->

    <!-------------------------- Home section stars ------------------------>

    <section class="home" id="home">
        <div class="content">
            <h3>adventure is worthwhile!</h3>
            <p>discovery new places with us, adventure awaits</p>
            <a href="discovery.php" class="btn">discover more</a>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="images/video-3.mp4"></span>
            <span class="vid-btn" data-src="images/video-6.mp4"></span>
            <span class="vid-btn" data-src="images/video-2.mp4"></span>
            <span class="vid-btn" data-src="images/video-4.mp4"></span>
            <span class="vid-btn" data-src="images/video-5.mp4"></span>
        </div>

        <div class="video-container">
            <video src="images/video-3.mp4" id="video-slider" loop autoplay muted></video>
        </div>
    </section>

    <!-------------------------- Home section end ------------------------>

    <!--------------------- Book section start ------------------------>
    <section class="book" id="book">
        <h1 class="heading">
            <span>b</span>
            <span>o</span>
            <span>o</span>
            <span>k</span>
            <span class="space"></span>
            <span>n</span>
            <span>o</span>
            <span>w</span>
        </h1>
        <div class="row">
            <div class="image">
                <img src="images/book3.jpg" alt="">
            </div>
            <form action="action/whereto.php" method="post">
                <input name="fullname" type="hidden" value="<?php echo $_SESSION['fullname'] ?? ''; ?>" required>
                <input name="email" type="hidden" value="<?php echo $_SESSION['email'] ?? ''; ?>" required>
                <div class="inputBox">
                    <h3>where to</h3>
                    <input type="text" name="place_name" placeholder="place name" required>
                </div>
                <div class="inputBox">
                    <h3>how many</h3>
                    <input type="number" name="number_of_guests" placeholder="number of guests" required>
                </div>
                <div class="inputBox">
                    <h3>arrivals</h3>
                    <input type="date" name="arrivals" required>
                </div>
                <div class="inputBox">
                    <h3>leaving</h3>
                    <input type="date" name="leaving" required>
                </div>
                <?php
                // Kiểm tra xem người dùng đã đăng nhập chưa
                if (isset($_SESSION['id'])) {
                    // Người dùng đã đăng nhập, cho phép đặt
                    echo '<input type="submit" class="btn" value="Book Now">';
                } else {
                    // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
                    echo '<a href="?login"><input style="text-align: center;" type="" class="btn" value="Book Now"></a><br>';
                }
                ?>
                <?php
                if (isset($_GET['book_done'])) {
                    echo "<span style='font-size:16px;color: green;'>Đặt thành công</span>";
                }
                ?>
            </form>
        </div>
    </section>

    <!--------------------- Book section end ------------------------>

    <!-- ------------------- Packages section start ------------------- -->
    <section class="packages" id="packages">
        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>
        <div class="box-container">
            <?php
            include('connect.php');
            $sql = "select * from places";
            $result = mysqli_query($conn, $sql);
            ?>
            <?php foreach ($result as $row) : ?>
                <div class="box">
                    <img src="images/places/<?php echo $row['image']; ?>" alt="">
                    <div class="content">
                        <h3> <i class="fas fa-map-marker-alt"></i> <?php echo $row['country']; ?> </h3>
                        <p><?php echo $row['short_des']; ?></p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="price">$<?php echo $row['price']; ?> <span>$<?php echo $row['old_price']; ?></span></div>
                        <a href="discovery.php" class="btn">discovery now</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>

    <!-- ------------------- Packages section send ------------------- -->

    <!-- --------------------Services section starts ------------------ -->

    <section class="services" id="services">

        <h1 class="heading">
            <span>s</span>
            <span>e</span>
            <span>r</span>
            <span>v</span>
            <span>i</span>
            <span>c</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="box-container">
            <div class="box">
                <i class="fas fa-hotel"></i>
                <h3>Mu hotel</h3>
                <p>Khach san mu</p>
            </div>
            <div class="box">
                <i class="fas fa-utensils"></i>
                <h3>food and drinks</h3>
                <p>Thuc an mu</p>
            </div>
            <div class="box">
                <i class="fas fa-bullhorn"></i>
                <h3>safety guide</h3>
                <p>huong dan du lich </p>
            </div>
            <div class="box">
                <i class="fas fa-globe-asia"></i>
                <h3>around the world</h3>
                <p>Thuc an mu</p>
            </div>
            <div class="box">
                <i class="fas fa-plane"></i>
                <h3>fastest travel</h3>
                <p>Thuc an mu</p>
            </div>
            <div class="box">
                <i class="fas fa-hiking"></i>
                <h3>adventures</h3>
                <p>Thuc an mu</p>
            </div>
        </div>
    </section>
    <!-- --------------------Services section end ------------------ -->

    <!-- --------------------Gallery section end ------------------ -->
    <section class="gallery" id="gallery">
        <h1 class="heading">
            <span>g</span>
            <span>a</span>
            <span>l</span>
            <span>l</span>
            <span>e</span>
            <span>r</span>
            <span>y</span>
        </h1>
        <div class="box-container">
            <?php
            include('connect.php');
            // lấy ra tất cả dữ liệu từ bảng galley
            $sql = "select * from gallery";
            $result = mysqli_query($conn, $sql);
            ?>
            <?php foreach ($result as $row) : ?>
                <div class="box">
                    <img src="images/gallery/<?php echo $row['image']; ?>" alt="">
                    <div class="content">
                        <h3><?php echo $row['name']; ?></h3>
                        <p><?php echo $row['short_des']; ?></p>
                        <a href="gallery.php?id=<?php echo $row['id']; ?>" class="btn">see more</a>
                    </div>
                </div>
            <?php endforeach ?>

            <!--- --------------- Places 9 --------------------- -->
            <!-- <div class="box">
                <img src="images/p-9.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Chua thay noi nao dep nhu noi nay</p>
                    <a href="gallery.php" class="btn">see more</a>
                </div>
            </div> -->
        </div>
    </section>
    <!-- --------------------Gallery section end ------------------ -->

    <!-- --------------------Review section start ------------------ -->

    <section class="review" id="review">
        <h1 class="heading">
            <span>r</span>
            <span>e</span>
            <span>v</span>
            <span>i</span>
            <span>e</span>
            <span>w</span>
        </h1>
        <div class="swiper-container review-slider">
            <div class="swiper-wrapper">
                <!-- ------Slider 1 -------- -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic1.jpg" alt="">
                        <h3>Start lord</h3>
                        <p>Chuyến du lịch tuyệt vời! Đội ngũ hỗ trợ chuyên nghiệp và nhiệt tình. Tôi đã có những trải nghiệm đáng nhớ và không thể quên</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- ------Slider 2 -------- -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic2.jpg" alt="">
                        <h3>Iron Man</h3>
                        <p>Tôi rất hài lòng với dịch vụ của công ty du lịch này. Hành trình được tổ chức rất chu đáo và các điểm tham quan đều rất thú vị.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- ------Slider 3 -------- -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic3.jpg" alt="">
                        <h3>Vu Trung Duc</h3>
                        <p>Đây là lần đầu tiên tôi đi du lịch cùng công ty này và tôi hoàn toàn mãn nhãn. Hướng dẫn viên rất tận tâm và nhiệt huyết.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- ------Slider 4 -------- -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic4.jpg" alt="">
                        <h3>JVmind</h3>
                        <p>Tôi đã khám phá những địa điểm tuyệt đẹp và trải nghiệm văn hóa độc đáo. Tôi chắc chắn sẽ quay lại và khuyên bạn bè tham gia cùng</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- ------Slider 5 -------- -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic5.jpg" alt="">
                        <h3>Kylian Mbappe</h3>
                        <p>Dịch vụ chuyên nghiệp và đáng tin cậy. Tôi đã có một kỳ nghỉ tuyệt vời cùng gia đình.Sẽ ủng hộ nhiều hơn trong tương lai.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- ------Slider 6 -------- -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic6.jpg" alt="">
                        <h3>Casemiro</h3>
                        <p>Công ty du lịch này cung cấp những chuyến đi tuyệt vời với giá trị tuyệt hảo. Tôi đã thực sự hài lòng về dịch vụ ở đây.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- ------Slider 7 -------- -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic7.png" alt="">
                        <h3>Vu Trung Duc</h3>
                        <p>Toi dat phong o day roi , noi nay dep tuyet voi</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- --------------------Review section end ------------------ -->

    <!-- --------------------Contact section start ------------------ -->

    <section class="contact" id="contact">
        <h1 class="heading">
            <span>c</span>
            <span>o</span>
            <span>n</span>
            <span>t</span>
            <span>a</span>
            <span>c</span>
            <span>t</span>
        </h1>
        <div class="row">
            <div class="image">
                <img src="./images/plane.jpg" alt="">
            </div>

            <?php
            $showForm = true;

            if (isset($_SESSION['id'])) {
                require 'connect.php';
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM users WHERE ID = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

                if ($row) {
                    $showForm = true;
                }
            }

            if ($showForm) {
            ?>
                <form action="action/contact.php" method="post">
                    <div class="inputBox">
                        <input type="text" placeholder="name" name="name" value="<?php echo $row['fullname'] ?? ''; ?>">
                        <input type="email" placeholder="email" name="email" value="<?php echo $row['email'] ?? ''; ?>">
                    </div>
                    <div class="inputBox">
                        <input type="number" placeholder="number" name="number">
                        <input type="text" placeholder="subject" name="subject">
                    </div>
                    <textarea placeholder="message" name="message" id="" cols="30" rows="10"></textarea>
                    <input type="submit" class="btn" name="submit" value="send message">
                    <?php
                    if (isset($_GET['contact_done'])) {
                        echo "<span style='font-size:16px;color: green;'>Gửi thành công</span>";
                    } elseif (isset($_GET['contact_fail'])) {
                        echo "<span style='font-size:16px;color: red;'>Gửi thất bại</span>";
                    }
                    ?>
                </form>
            <?php
            }
            ?>

        </div>
    </section>

    <!-- --------------------Contact section end ------------------ -->

    <!-- --------------------Brand section start ------------------ -->

    <section class="brand-container">
        <div class="swiper-contaniner brand-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box"> <img src="./images/1.png" alt=""> </div>
                <div class="swiper-slide box"> <img src="./images/2.png" alt=""> </div>
                <div class="swiper-slide box"> <img src="./images/3.png" alt=""> </div>
                <div class="swiper-slide box"> <img src="./images/4.png" alt=""> </div>
                <div class="swiper-slide box"> <img src="./images/logoducky2.png" alt=""> </div>
                <div class="swiper-slide box"> <img src="./images/6.png" alt=""> </div>
            </div>
        </div>
    </section>
    <!-- --------------------Brand section end ------------------ -->

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


    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="js/script.js"></script>
</body>

</html>