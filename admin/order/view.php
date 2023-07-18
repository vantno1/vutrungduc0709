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
  <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" style="padding: 10px;">
    <label for="search">Tìm kiếm theo Email:</label>
    <input type="text" name="search" id="search">
    <input type="submit" value="Tìm kiếm">
  </form>
  <table class="table_form">
    <tr>
      <th class="table_item">ID</th>
      <th class="table_item">Email</th>
      <th class="table_item">Phone</th>
      <th class="table_item">Address</th>
      <th class="table_item">Product Id</th>
      <th class="table_item">Stauts</th>
      <th class="table_item">Detail</th>
      <th class="table_item">Delete</th>
    </tr>
    <?php
    include('../connect.php');
    if (isset($_GET['search'])) {
      $search = $_GET['search'];
      // Thực hiện truy vấn tìm kiếm với tên người dùng
      $sql = "SELECT * FROM orders WHERE email LIKE '%$search%'";
    } else {
      // Nếu không có từ khóa tìm kiếm, hiển thị tất cả dữ liệu
      $sql = "SELECT * FROM orders";
    }
    $result = mysqli_query($conn, $sql);
    $stt = 1;
    ?>
    <tr>
      <?php if (mysqli_num_rows($result) > 0) : ?>

        <?php foreach ($result as $row) : ?>
          <td class="table_item"><?php echo $stt++ ?></td>
          <td class="table_item"><?php echo $row['email']; ?></td>
          <td class="table_item"><?php echo $row['phone']; ?></td>
          <td class="table_item"><?php echo $row['address']; ?></td>
          <td class="table_item"><?php echo $row['product_id']; ?></td>
          <td class="table_item">
            <?php
            if ($row["status"] == 0) {
              echo '<span style="color: #ffa500;">Pending</span>';
            } elseif ($row["status"] == 1) {
              echo '<span style="color:green">Success</span>';
            } else {
              echo '<span style="color:red">Cancel</span>';
            }
            ?>
          </td>
          <td class="table_item"><a href="detail.php?id=<?php echo $row['id'] ?>">Detail</a></td>
          <td class="table_item"><a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</a></td>
    </tr>
  <?php endforeach ?>
<?php else : ?>
  <tr>
    <td colspan="7">No record found. <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Vui lòng thử lại</a>.</td>
  </tr>
<?php endif ?>
  </table>
</body>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</html>