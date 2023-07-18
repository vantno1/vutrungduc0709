<?php
session_start();
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
    <title>Product</title>
    <style>
        #filter-form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;
        }
    </style>
</head>

<body>
    <!------------------------ header section starts ------------------>
    <?php include('header.php'); ?>
    <!---------------------- header section end ------------------------------->
    <!-- ------------------- Home section start ---------------------------- -->
    <section class="home" id="home">
        <div class="content">
            <h3>Hứa hẹn. Không thể quên.</h3>
            <p>Hãy cùng chúng tôi chinh phục những điểm đến tuyệt vời. </p>

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
    <!-- -------------------  filter section start -------------------------- -->

    <div class="filter-container">
        <form id="filter-form" method="POST">
            <div>
                <label>Sắp xếp theo giá:</label>
                <select name="typeFilter">
                    <option value="all" <?php if ((!isset($_POST['typeFilter']) || $_POST['typeFilter'] == 'all') && (!isset($_GET['search']))) echo 'selected'; ?>>Tất cả</option>
                    <option value="random" <?php if (isset($_POST['typeFilter']) && $_POST['typeFilter'] == 'random') echo 'selected'; ?>>Nổi bật</option>
                    <option value="desc" <?php if (isset($_POST['typeFilter']) && $_POST['typeFilter'] == 'desc') echo 'selected'; ?>>Cao đến thấp</option>
                    <option value="asc" <?php if (isset($_POST['typeFilter']) && $_POST['typeFilter'] == 'asc') echo 'selected'; ?>>Thấp đến cao</option>
                </select>
            </div>
            <div>
                <label>Sản phẩm / trang:</label>
                <select name="itemsPerPage">
                    <option value="6" <?php if (isset($_POST['itemsPerPage']) && $_POST['itemsPerPage'] == '6') echo 'selected'; ?>>6</option>
                    <option value="12" <?php if (isset($_POST['itemsPerPage']) && $_POST['itemsPerPage'] == '12') echo 'selected'; ?>>12</option>
                    <option value="18" <?php if (isset($_POST['itemsPerPage']) && $_POST['itemsPerPage'] == '18') echo 'selected'; ?>>18</option>
                </select>
            </div>
            <div>
                <button type="submit" name="filter">Lọc</button>
            </div>
        </form>

    </div>
    <!-- <div id="result">
    </div> -->

    <!-- -------------------  filter section end -------------------------- -->

    <!-- -------------------  packages section start ---------------------------- -->

    <?php
    if (isset($_GET['no_search'])) {
        echo
        "<div style='padding-top:20px;font-size: 16px;display: flex;justify-content: center;align-items: center;'>
        <span style='color:red'>
            Không tìm thấy kết quả chính xác.
        </span>
        </div>";
    }
    ?>
    <section class="package" id="package">
        <?php
        include('connect.php');
        // Lấy ra giá trị của biến $itemsPerPage nếu không có giá trị thì lấy là 6 
        $itemsPerPage = $_POST['itemsPerPage'] ?? 6;

        // Xác định trang hiện tại
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        // Tính toán giá trị offset dựa trên trang hiện tại
        $offset = ($currentPage - 1) * $itemsPerPage;

        // Kiểm tra xem có tham số tìm kiếm được truyền hay không
        if (isset($_GET['search'])) {
            // Lấy giá trị tìm kiếm từ tham số trong URL
            $search = $_GET['search'];

            $sql = "SELECT * FROM products WHERE name LIKE '%$search%' LIMIT $offset, $itemsPerPage";
        }
        // Kiểm tra xem có tham số lọc được truyền hay không
        elseif (isset($_POST['filter'])) {
            // Lấy giá trị lọc từ tham số trong URL
            $type = $_POST['typeFilter'];
            if ($type == 'desc') {
                // Sắp xếp sản phẩm theo giá giảm dần với tham số trang và item trên 1 trang
                $sql = "SELECT * FROM products ORDER BY price DESC LIMIT $offset, $itemsPerPage";
            } elseif ($type == 'asc') {
                // Sắp xếp sản phẩm theo giá tăng dần với tham số trang và item trên 1 trang
                $sql = "SELECT * FROM products ORDER BY price ASC LIMIT $offset, $itemsPerPage";
            } elseif ($type == 'random') {
                $sql = "SELECT * FROM products ORDER BY RAND() LIMIT $offset, $itemsPerPage";
            } else {
                // Lấy ra tất cả sản phẩm với tham số trang và item trên 1 trang
                $sql = "SELECT * FROM products LIMIT $offset, $itemsPerPage";
            }
        } else {
            // Lấy ra tất cả sản phẩm với tham số trang và item trên 1 trang
            $sql = "SELECT * FROM products LIMIT $offset, $itemsPerPage";
        }

        $result = mysqli_query($conn, $sql);
        ?>
        <?php if (mysqli_num_rows($result) > 0) : ?>
            <?php foreach ($result as $row) : ?>
                <div class="package-content-items">
                    <div class="package-content-item">
                        <a href="detail.php?id=<?php echo $row['id']; ?>"><img src="images/product/<?php echo $row['image']; ?>" alt=""></a>
                        <div class="package-describe-item">
                            <a href="detail.php?id=<?php echo $row['id']; ?>">
                                <h4><?php echo $row['name']; ?></h4>
                            </a>
                            <div class="packages-describe">
                                <i class="fas fa-user-check"></i>
                                <span><?php echo $row['guest']; ?> Guest</span>
                                <i class="fa-solid fa-bed"></i>
                                <span><?php echo $row['bed']; ?> Bed</span>
                                <i class="fa-solid fa-bath"></i>
                                <span><?php echo $row['bathroom']; ?> Bathroom</span>
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
                                <p style="position:relative;right:30px;min-width:90px">Start From <sup>$<?php echo $row['price']; ?></sup> <span>/Night</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <!-- -------------------  packages section start ---------------------------- -->
    <!-- -------------------  pagination section start ---------------------------  -->
    <div class="pagination">
        <div class="pagination">
            <!-- Tạo phân trang -->
            <?php if (mysqli_num_rows($result) > 0) : ?>
                <?php
                // Lấy tổng số sản phẩm từ cơ sở dữ liệu
                $totalItems = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));

                // Tính toán số trang
                $totalPages = ceil($totalItems / $itemsPerPage);
                ?>

                <?php if ($currentPage > 1) : ?>
                    <a href="?page=<?php echo $currentPage - 1; ?>">Previous</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="?page=<?php echo $i; ?>" <?php if ($i == $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages) : ?>
                    <a href="?page=<?php echo $currentPage + 1; ?>">Next</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- -------------------  pagination section end ---------------------------  -->
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
<script src="js/script.js"></script>
<script src="js/index.js"></script>
<script>
    flatpickr("#myID", {});
</script>