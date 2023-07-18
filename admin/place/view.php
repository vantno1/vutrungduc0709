<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../images/icon-web.jpg" type="image/gif">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/fontawesome/fontawesome.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Admin</title>
</head>

<body>
  <?php
  include "../adminHeader.php";
  include "../sidebar.php";
  ?>
  <div class="container-header">
    <a href="create.php" class="link" id="float-up">Thêm</a>
    <a href="view.php" class="link">Sửa/Xóa</a>
    <a href="../index.php" class="link">Trang chủ</a>
    <a href="#float-down" class="link">
      <i class="fa fa-angle-down"></i>
    </a>
  </div>
  <h2 style="font-size:25px;padding:10px 10px 0;justify-content:center;display:flex">Sửa / Xóa</h2>
  <!-- Biểu mẫu tìm kiếm -->
  <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" style="padding: 10px;">
    <label for="search">Tìm kiếm theo đất nước:</label>
    <input type="text" name="search" id="search">
    <input type="submit" value="Tìm kiếm">
  </form>

  <!-- Bảng hiển thị dữ liệu -->
  <table class="table_form">
    <tr>
      <th class="table_item">ID</th>
      <th class="table_item">Image</th>
      <th class="table_item">Country</th>
      <th class="table_item">Place</th>
      <th class="table_item">Price</th>
      <th class="table_item">Old Price</th>
      <th class="table_item noExl">Short Description</th>
      <th class="table_item">Edit</th>
      <th class="table_item">Delete</th>
    </tr>

    <?php
    include('../connect.php');

    // Kiểm tra nếu có từ khóa tìm kiếm được gửi từ biểu mẫu
    if (isset($_GET['search'])) {
      $search = $_GET['search'];
      // Thực hiện truy vấn tìm kiếm với tên địa điểm
      $sql = "SELECT * FROM places WHERE country LIKE '%$search%'";
    } else {
      // Nếu không có từ khóa tìm kiếm, hiển thị tất cả dữ liệu
      $sql = "SELECT * FROM places";
    }

    $result = mysqli_query($conn, $sql);
    ?>

    <?php if (mysqli_num_rows($result) > 0) : ?>
      <?php foreach ($result as $row) : ?>
        <tr>
          <td class="table_item"><?php echo $row['id']; ?></td>
          <td class="table_item"><img style="width:80px" src="../../images/places/<?php echo $row['image']; ?>" style="width:100px" alt=""></td>
          <td class="table_item"><?php echo $row['country']; ?></td>
          <td class="table_item"><?php echo $row['place']; ?></td>
          <td class="table_item"><?php echo $row['price']; ?></td>
          <td class="table_item"><?php echo $row['old_price']; ?></td>
          <td class="table_item"><?php echo $row['short_des']; ?></td>
          <td class="table_item"><a href="update.php?id=<?php echo $row['id'] ?>">Edit</a></td>
          <td class="table_item">
            <a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</a>
          </td>
        </tr>
      <?php endforeach ?>
    <?php else : ?>
      <tr>
        <td colspan="9">No record found. <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Vui lòng thử lại</a>.</td>
      </tr>
    <?php endif ?>
  </table>

</body>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</html>