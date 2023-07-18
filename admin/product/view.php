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
  <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="search-form" style="padding: 10px;">
    <label for="search">Tìm kiếm theo tên:</label>
    <input type="text" name="search" id="search">
    <input type="submit" value="Tìm kiếm">
  </form>

  <!-- Bảng hiển thị dữ liệu -->
  <table class="table_form">
    <tr>
      <th class="table_item">ID</th>
      <th class="table_item">Image</th>
      <th class="table_item">Name</th>
      <th class="table_item">Guest</th>
      <th class="table_item">Bed</th>
      <th class="table_item">Bathroom</th>
      <th class="table_item">Title</th>
      <th class="table_item">Short Description</th>
      <th class="table_item">Edit</th>
      <th class="table_item">Delete</th>
    </tr>

    <?php
    include('../connect.php');

    // Xử lý tìm kiếm
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
    $searchQuery = "SELECT * FROM products WHERE name LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $searchQuery);

    if (mysqli_num_rows($result) > 0) {
      foreach ($result as $row) :
    ?>
        <tr>
          <td class="table_item"><?php echo $row['id']; ?></td>
          <td class="table_item"><img style="width:80px" src="../../images/product/<?php echo $row['image']; ?>" alt=""></td>
          <td class="table_item"><?php echo $row['name']; ?></td>
          <td class="table_item"><?php echo $row['guest']; ?></td>
          <td class="table_item"><?php echo $row['bed']; ?></td>
          <td class="table_item"><?php echo $row['bathroom']; ?></td>
          <td class="table_item"><?php echo $row['title']; ?></td>
          <td class="table_item"><?php echo $row['short_des']; ?></td>
          <td class="table_item"><a href="update.php?id=<?php echo $row['id'] ?>">Edit</a></td>
          <td class="table_item">
            <a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</a>
          </td>
        </tr>
      <?php endforeach ?>
    <?php } else { ?>
      <!-- Hiển thị thông báo khi không tìm thấy kết quả -->
      <tr>
        <td colspan="11">No record found. <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Vui lòng thử lại</a>.</td>
      </tr>
    <?php } ?>
  </table>

</body>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</html>