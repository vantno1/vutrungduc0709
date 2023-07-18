<?php
session_start();
if ($_SESSION['role'] != 1) {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../images/icon-web.jpg" type="image/gif">
        <link rel="stylesheet" href="./../plugins/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="./../plugins/fontawesome/fontawesome.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        </link>
    </head>
</head>

<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">

        <a class="navbar-brand ml-5" href="./index.php">
            <img src="./assets/images/logo.png" width="80" height="80" alt="Swiss Collection">
            <span style="font-size:20px;color:white">Hello Admin</span>
        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

        <div class="user-cart">
            <a href="logout.php" style="text-decoration:none;">
                <i class="fa fa-sign-in-alt mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>
        </div>
    </nav>
    <!-- Sidebar -->
    <div class="sidebar" id="mySidebar">
        <div class="side-header">
            <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection">
            <h5 style="margin-top:10px;">Hello Admin
            </h5>
        </div>

        <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="./index.php"><i class="fa fa-home"></i> Dashboard</a>
        <a href="user/view.php"><i class="fa fa-users"></i> User</a>
        <a href="place/view.php"><i class="fa fa-th-large"></i> Place</a>
        <a href="gallery/view.php"><i class="fa fa-th"></i> Gallery</a>
        <a href="product/view.php"><i class="fa fa-list"></i> Product</a>
        <a href="order/view.php"><i class="fa fa-list"></i> Order</a>
        <a href="message/view.php"><i class="fa fa-list"></i> Message</a>

    </div>
    <div id="main">
        <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
    </div>
    <div id="main-content" class="container allContent-section py-4">
        <div class="row" style="display: flex;align-items: center;">
            <div class="col-sm-3">
                <div class="card">
                    <a href="user/view.php" class="black">
                        <i class="fa fa-users mb-2" style="font-size: 70px;"></i>
                    </a>
                    <h4 style="color:white;">Total User</h4>
                    <h5 style="color:white;">
                        <?php
                        include('connect.php');
                        $result = mysqli_query($conn, 'select count(id) as total from users where role = 0');
                        $row = mysqli_fetch_array($result);
                        $total_records = $row['total'];
                        ?>
                        <?php echo $total_records ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <a href="message/view.php" class="black">
                        <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    </a>
                    <h4 style="color:white;">Total Message</h4>
                    <h5 style="color:white;">
                        <?php
                        include('connect.php');
                        $result = mysqli_query($conn, 'select count(id) as total from contacts');
                        $row = mysqli_fetch_array($result);
                        $total_records = $row['total'];
                        ?>
                        <?php echo $total_records ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <a href="place/view.php" class="black">
                        <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    </a>
                    <h4 style="color:white;">Total Place</h4>
                    <h5 style="color:white;">
                        <?php
                        include('connect.php');
                        $result = mysqli_query($conn, 'select count(id) as total from places');
                        $row = mysqli_fetch_array($result);
                        $total_records = $row['total'];
                        ?>
                        <?php echo $total_records ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <a href="gallery/view.php" class="black">
                        <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    </a>
                    <h4 style="color:white;">Total Gallery</h4>
                    <h5 style="color:white;">
                        <?php
                        include('connect.php');
                        $result = mysqli_query($conn, 'select count(id) as total from gallery');
                        $row = mysqli_fetch_array($result);
                        $total_records = $row['total'];
                        ?>
                        <?php echo $total_records ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <a href="product/view.php" class="black">
                        <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    </a>
                    <h4 style="color:white;">Total Product</h4>
                    <h5 style="color:white;">
                        <?php
                        include('connect.php');
                        $result = mysqli_query($conn, 'select count(id) as total from products');
                        $row = mysqli_fetch_array($result);
                        $total_records = $row['total'];
                        ?>
                        <?php echo $total_records ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <a href="order/view.php" class="black">
                        <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    </a>
                    <h4 style="color:white;">Total Order</h4>
                    <h5 style="color:white;">
                        <?php
                        include('connect.php');
                        $result = mysqli_query($conn, 'select count(id) as total from orders');
                        $row = mysqli_fetch_array($result);
                        $total_records = $row['total'];
                        ?>
                        <?php echo $total_records ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script> -->
    <!-- <script src="./../plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="./../plugins/bootstrap/bootstrap.min.js"></script>
    <script src="./../plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script> -->

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.getElementById("main-content").style.marginLeft = "250px";
            document.getElementById("main").style.display = "none";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.getElementById("main").style.display = "block";
        }
    </script>
</body>

</html>