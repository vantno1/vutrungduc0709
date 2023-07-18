<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Contact</title>
</head>
<body>
   <?php include('header.php'); ?>
   <!-- ------------------- Home section start ---------------------------- -->
   <section class="home" id="home">
        <div class="content">
            <h3>Khám phá. Khám phá. Trải nghiệm.</h3>
            <p>Mở ra những cung đường mới, khám phá những trải nghiệm độc đáo. </p>

        </div>

        <div class="controls">
            <span class="img-btn active" data-src="images/egypt/eg-7.jpg"></span>
            <span class="img-btn" data-src="images/egypt/eg-8.jpg"></span>
            <span class="img-btn" data-src="images/egypt/eg-9.jpg"></span>
            <span class="img-btn" data-src="images/egypt/eg-10.jpg"></span>
            <span class="img-btn" data-src="images/egypt/eg-1.jpg"></span>
        </div>

        <div class="img-container">
            <img src="./images/egypt/eg-7.jpg" id="img-slider" alt="">
        </div>
    </section>

    <!-------------------------- Home section end ------------------------>
      <!-- -------------------  book section  start ---------------------------- -->
      <section class="book" id="book">
        <div class="wrapper">
            <div class="book-content-items row">
                <div class="book-content-item">
                    <i class="fas fa-map-marked-alt"></i>
                    <input type="text" placeholder="Bạn muốn đi đâu...">
                </div>
                <div class="book-content-item">
                    <i class="fas fa-calendar-alt"></i>
                    <input id="myID" type="text" placeholder="Ngày đến">
                </div>
                <div class="book-content-item">
                    <i class="fas fa-calendar-alt"></i>
                    <input id="myID" type="text" placeholder="Ngày về">
                </div>
                <div class="book-content-item">
                    <i class="fas fa-user-check"></i>
                    <input type="text" placeholder="Số lượng">
                </div>
                <div class="book-content-item">
                    <button>Book</button>
                </div>

            </div>
        </div>
    </section>
    <!-- -------------------  book section end ---------------------------- -->
    <section class="contact">
        <div class="map">
        <iframe style="  width: 100%; height: 500px; position: relative; right: 40px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.77942344538!2d105.81134147852613!3d21.00147723072523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac9b3f23b42b%3A0x49fa01aaa06d239b!2sVinhomes%20Royal%20City!5e0!3m2!1svi!2sus!4v1689238306254!5m2!1svi!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
        <div class="contact-container">
            <h2>Liên hệ</h2>
            <span>Địa chỉ chúng tôi</span>
            <p>Vinhomes Royal City, 72 Đ. Nguyễn Trãi, Thượng Đình, Thanh Xuân, Hà Nội</p>
            <span>Email chúng tôi</span>
            <p>vutrungduc1309@gmail.com</p>
            <span>Điện thoại</span>
            <p>+84 (038) 7875421</p>
            <span>Thời gian làm việc</span>
            <p>Thứ 2 đến thứ 6 hàng tuần từ 8h đến 16h ; Thứ 7 và Chủ nhật từ 9h30 đến 17h30</p>
            <h3>Gửi thắc mắc cho chúng tôi</h3>
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
    <div class="footer">
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
    </div>

    <!-- --------------------Footer section end ------------------ -->






   <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
   <script src="js/script.js"></script>
</body>
</html>